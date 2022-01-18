<?php

namespace App\Http\Controllers\FullTime;

use App\User;
use App\models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class FullTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $current = Employee::where('id', '=', $id)->first();
        $current_user = User::where('employee_id', '=', $id)->first();
        return view('fulltime.profile.index')->with('current', $current)->with('current_user', $current_user);
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
        $current = Employee::where('id', '=', $id)->first();
        if (!$current) {
            return redirect()->back()->with(['erorr' => 'There is Error your Information are not found']);
        }
        $current_user = User::where('employee_id', '=', $id)->first();
        if (!$current_user) {
            return redirect()->back()->with(['erorr' => 'There is Error your Information are not found']);
        }
        return view('fulltime.profile.edit')->with('current', $current)->with('current_user', $current_user);
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
        if (!$current) {
            return redirect()->back()->with(['erorr' => 'There is Error your Information']);
        }
        $current_user = User::where('employee_id', '=', $id)->first();
        if (!$current_user) {
            return redirect()->back()->with(['erorr' => 'There is Error your Information are not found']);
        }
        $current->update([
            'fname' => $request->fname,
            'lname' => $request->lname,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email,

        ]);
        $current_user->update([
            'username' => $request->username,
            'password' => Hash::make($request->password),
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
