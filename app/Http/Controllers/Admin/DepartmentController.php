<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments =  Department::select('*')->get();
        return view('admin.department.departments')->with('departments', $departments);
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
        $dno = $request->dno;
        $dname = $request->dname;
        Department::create([
            'dno' => $dno,
            'dname' => $dname,
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
        $current_department =  Department::where('dno', '=', $id)->first();
        return view('admin.department.edit_department')->with('department', $current_department);
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
        $current_department =  Department::where('dno', '=', $id)->first();
        if (!$current_department) {
            return redirect()->back()->with(['error' => "Department Not Found"]);
        }
        $current_department->update([
            'dno' => $request->dno,
            'dname' => $request->dname,
        ]);
        $id = $request->dno;
        return redirect()->route('department.edit', $id)->with(['success' => "Edit oparation done successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $current_department =  Department::where('dno', '=', $id)->first();
        if (!$current_department) {
            return redirect()->back()->with(['error' => "Department Not Found"]);
        }
        $current_department->delete();
        return redirect()->back()->with(['success' => "delete oparation done successfully"]);
    }
}
