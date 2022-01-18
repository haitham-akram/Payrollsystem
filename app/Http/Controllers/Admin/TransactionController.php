<?php

namespace App\Http\Controllers\Admin;

use App\models\Employee;
use App\Mail\payment_mail;
use App\models\Transaction;
use Illuminate\Http\Request;
use PDF;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::select('id', 'fname', 'lname', 'type', 'total')->get();
        return view('admin.transaction.transactions')->with('employees', $employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.transaction.create_transaction');
    }

    public function generatePDF($id)
    {
        // $amount, $month, $name, $address
        $currentTransaction =  Transaction::where('id', '=', $id)->first();

        $employee = $currentTransaction->employee;

        $amount = $currentTransaction->amount;

        $month = $currentTransaction->month;

        $name = $employee->fname . ' ' . $employee->lname;

        $address = $employee->address;

        // dd($employee);
        $data = [
            'University' => 'Islamic University Of Gaza',
            'Address' => 'Palestine',
            'City' => 'Gaza',
            'Owner_name' => 'Department of Finance',
            'State_ZIP' => '9700',
            'Amount' => $amount,
            'Date' => $month,
            'Employee_name' => $name,
            'DESCRIPTION' => 'Salary For ' . $month,
            'Employee_address' => $address,
            'Check_No' => $currentTransaction->id,
            'Bank_Name' => 'Islamic Bank Of Gaza',
        ];
        $pdf = PDF::loadView('pdfs.cheque2', $data);

        return $pdf->download('Cheque.pdf');
    }

    public function send_email($email, $Method, $month, $amount, $id)
    {
        if ($Method == 'Cheque') {
            $data = [
                'title' => 'Payment Was Made By Cheque',
                'body' => 'This Is The Cheque worth of ' . $amount . '$ For ' . $month . '.',
                'pdf_link' => route('pdf.download', $id),
                'method' => 'Cheque'
            ];
        } else if ($Method == 'Back Account') {
            $data = [
                'title' => 'Payment Was Made By Back Account',
                'body' => 'We Sent The Salary worth of ' . $amount . '$ To Your Bank Account Go To Your Bank Account And Check Your Balance.',
                'method' => 'Back Account'
            ];
        }
        Mail::to($email)->send(new payment_mail($data));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->id;
        $eid = $request->eid;
        $month = $request->month;
        $employee = Employee::select('id', 'fname', 'lname', 'type', 'total', 'email')->where('id', '=', $eid)->first();
        $total = $employee->total;

        if ($employee->type == 'Full time') {
            $tax =  $employee->deduction->tax_deduction;
            $leave = $employee->deduction->leave_deduction;
            $provident_Fund = $employee->deduction->Provident_Fund;
            $welfare_Fund = $employee->deduction->welfare_Fund;
            $loan = $employee->deduction->loan_deduction;
            $deduction = $tax + $leave + $provident_Fund + $welfare_Fund + $loan;
            $base = $employee->contract->base;
            $amount = $base - $deduction;
            $total = $total + $amount;
            $method = $employee->payment_info->methode;
            $notify_email = $employee->payment_info->notify_email;
            Transaction::create([
                'id' => $id,
                'employee_id' => $eid,
                'amount' => $amount,
                'month' => $month,
            ]);
            $employee->update([
                'total' => $total,
            ]);
            //sending email if the employee choose to be notfied
            if ($notify_email == 1) {
                $this->send_email($employee->email, $method, $month, $amount, $id);
            }
            return redirect()->back()->with(['success' => "Transaction oparation done successfully"]);
        } else if ($employee->type == 'Casual') {
            collect($timecards =  $employee->timecard);
            $num_hours = 0;
            foreach ($timecards as $timecard) {

                $returnMonth = substr($timecard->month, 0, 7);
                //dd($returnMonth);
                if ($returnMonth == $month) {
                    $num_hours = $num_hours + substr($timecard->hours_num, 0, 2);
                }
            }

            $method = $employee->payment_info->methode;
            $paid_per_hour = $employee->contract->paid_per_hour;
            $amount = $num_hours * $paid_per_hour;
            $total = $total + $amount;
            $remaining_hours = $employee->contract->hours_num;
            Transaction::create([
                'id' => $id,
                'employee_id' => $eid,
                'amount' => $amount,
                'month' => $month,
            ]);
            $employee->update([
                'total' => $total,
                'remaining_hours' => $remaining_hours,
            ]);
            //sending email
            $this->send_email($employee->email, $method, $month, $amount, $id);
            return redirect()->back()->with(['success' => "Transaction oparation done successfully"]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::select('id', 'fname', 'lname', 'type', 'total')->where('id', '=', $id)->first();
        return view('admin.transaction.show_transaction')->with('employee', $employee);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaction = Transaction::where('id', '=', $id)->first();
        if (!$transaction) {
            return redirect()->back()->with(['erorr' => 'transaction not found']);
        }
        return view('admin.transaction.edit_transaction')->with('transaction', $transaction);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::where('id', '=', $id)->first();
        $transaction->update([
            'id' => $request->id,
            'employee_id' => $request->eid,
            'month' => $request->month,
        ]);
        $id = $request->id;
        return redirect()->route('transaction.edit', $id)->with(['success' => "Edit oparation done successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = Transaction::where('id', '=', $id)->first();
        if (!$transaction) {
            return redirect()->back()->with(['erorr' => 'transaction not found']);
        }
        $month = $transaction->month;
        $eid = $transaction->employee_id;
        $employee = Employee::select('id', 'fname', 'lname', 'type', 'total')->where('id', '=', $eid)->first();
        $total = $employee->total;
        // DD($total);
        if ($employee->type == 'Full time') {
            $tax =  $employee->deduction->tax_deduction;
            $leave = $employee->deduction->leave_deduction;
            $provident_Fund = $employee->deduction->Provident_Fund;
            $welfare_Fund = $employee->deduction->welfare_Fund;
            $loan = $employee->deduction->loan_deduction;
            $deduction = $tax + $leave + $provident_Fund + $welfare_Fund + $loan;
            $base = $employee->contract->base;
            $amount = $base - $deduction;
            $total = $total - $amount;
            $employee->update([
                'total' => $total,
            ]);
            $transaction->delete();
            return redirect()->back()->with(['success' => "Delete oparation done successfully"]);
        } else if ($employee->type == 'Casual') {
            collect($timecards =  $employee->timecard);
            $num_hours = 0;
            foreach ($timecards as $timecard) {
                $returnMonth = substr($timecard->month, 0, 7);
                if ($returnMonth == $month) {
                    $num_hours = $num_hours + substr($timecard->hours_num, 0, 2);
                }
            }
            $paid_per_hour = $employee->contract->paid_per_hour;
            $amount = $num_hours * $paid_per_hour;
            $total = $total - $amount;
            //dd($total);
            $employee->update([
                'total' => $total,
            ]);
            $transaction->delete();
            return redirect()->back()->with(['success' => "Delete oparation done successfully"]);
        }
    }
}
