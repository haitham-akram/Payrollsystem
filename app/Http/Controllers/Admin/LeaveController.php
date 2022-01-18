<?php

namespace App\Http\Controllers\Admin;

use App\models\Leave;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leaves = Leave::select('*')->get();
        return view('admin.leave.leaves')->with('leaves', $leaves);
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
        Leave::create([
            'id' => $request->id,
            'employee_id' => $request->eid,
            'balance' => $request->balance,
            'month' => $request->month,
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
        $leave = Leave::where('id', '=', $id)->first();

        return  view('admin.leave.editLeaves')->with('leave', $leave);
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
        $current = Leave::where('id', '=', $id);
        if (!$current) {
            return redirect()->back()->with(['error' => "Leave Not Found"]);
        }
        $current->update([
            'id' => $request->id,
            'employee_id' => $request->eid,
            'balance' => $request->balance,
            'month' => $request->month,
        ]);
        $id = $request->id;
        return redirect()->route('leave.edit', $id)->with(['success' => "Edit oparation done successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $current = Leave::where('id', '=', $id);
        if (!$current) {
            return redirect()->back()->with(['error' => "Leave Not Found"]);
        }
        $current->delete();
        return redirect()->back()->with(['success' => "delete oparation done successfully"]);
    }
}
