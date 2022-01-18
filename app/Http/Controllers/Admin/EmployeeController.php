<?php

namespace App\Http\Controllers\Admin;

use App\models\Employee;
use App\models\Payment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::where('type', '=', 'Full time')->get();
        $casual_employees = Employee::where('type', '=', 'Casual')->get();
        return view('admin.employee.employees')->with('employees', $employees)->with('casual_employees', $casual_employees);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employee.addEmployee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Employee::create([
            'id' => $request->ID,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'doj' => $request->doj,
            'phone' => $request->phone,
            'address' => $request->address,
            'dno' => $request->dno,
            'designation' => $request->designation,
            'email' => $request->email,
            'type' => $request->type,

        ]);
        User::create([
            'emplayee_id' => $request->ID,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        Payment::create([
            'emplayee_id' => $request->ID,
            'bank_account' => $request->account,
            'methode' => $request->method,
        ]);

        return redirect()->back()->with(['success' => "Create oparation done successfully"]);
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
        $current = Employee::where('id', '=', $id)->first();
        $current_payment = Payment::where('employee_id', '=', $id)->first();
        $current_user = User::where('employee_id', '=', $id)->first();
        if (!$current_user) {
            return redirect()->back()->with(['erorr' => 'User not found']);
        }
        if (!$current) {
            return redirect()->back()->with(['erorr' => 'Employee not found']);
        }
        if (!$current_payment) {
            return redirect()->back()->with(['erorr' => 'Payment not found']);
        }
        // dd($current_payment);
        return view('admin.employee.edit')->with('current', $current)->with('current_payment', $current_payment)->with('current_user', $current_user);
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
        $current = Employee::where('id', '=', $id)->first();
        $current_payment = Payment::where('employee_id', '=', $id)->first();
        $current_user = User::where('employee_id', '=', $id)->first();
        if (!$current_user) {
            return redirect()->back()->with(['erorr' => 'User not found']);
        }
        if (!$current) {
            return redirect()->back()->with(['erorr' => 'Employee not found']);
        }
        if (!$current_payment) {
            return redirect()->back()->with(['erorr' => 'Payment not found']);
        }
        $current_user->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);
        $current->update([
            'id' => $request->ID,
            'fname' => $request->fname,
            'lname' => $request->lname,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'doj' => $request->doj,
            'phone' => $request->phone,
            'address' => $request->address,
            'dno' => $request->dno,
            'designation' => $request->designation,
            'email' => $request->email,
            'type' => $request->type,

        ]);

        $current_payment->update([
            'employee_id' => $request->ID,
            'bank_account' => $request->account,
            'methode' => $request->method,
        ]);
        $id = $request->ID;
        return redirect()->route('employee.edit', $id)->with(['success' => "Edit oparation done successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $current_payment = Payment::where('employee_id', '=', $id)->first();
        if (!$current_payment) {
            return redirect()->back()->with(['erorr' => 'Payment not found']);
        }
        $current_user = User::where('employee_id', '=', $id)->first();
        if (!$current_user) {
            return redirect()->back()->with(['erorr' => 'User not found']);
        }
        $current = Employee::where('id', '=', $id);
        if (!$current) {
            return redirect()->back()->with(['erorr' => 'Employee not found']);
        }
        $current_payment->delete();
        $current_user->delete();
        $current->delete();
        return redirect()->back()->with(['success' => "Delete oparation done successfully"]);
    }
}
