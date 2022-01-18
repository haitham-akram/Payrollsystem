<?php

namespace App\Http\Controllers\FullTime;

use Carbon\Carbon;
use App\models\Leave;
use App\models\Payment;
use App\models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FullTimePaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $current_date = Carbon::now('EET');
        $month = $current_date->month;
        if (strlen((string)$month) == 1) {
            $month = '0' . $month;
        }
        $current_month =  $current_date->year . '-' . $month;
        $employee = Employee::select('id', 'fname', 'lname')->where('id', '=', $id)->first();
        $leave =  Leave::where('employee_id', '=', $id)->where('month', '=', $current_month)->first();
        return view('fulltime.payment.index')->with('current', $employee)->with('leave', $leave);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::select('id', 'fname', 'lname')->where('id', '=', $id)->first();
        return view('fulltime.payment.edit')->with('current', $employee);
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
        $current_payment = Payment::where('id', '=', $id)->first();
        if (!$current_payment) {
            return redirect()->back()->with(['error' => 'Payment Information not found']);
        }
        $status = 0;
        if ($request->notify == 'on') {
            $status = 1;
        }

        $current_payment->update([
            'bank_account' => $request->account,
            'methode' => $request->method,
            'notify_email' => $status,
        ]);
        return redirect()->back()->with(['success' => "Edit oparation done successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
