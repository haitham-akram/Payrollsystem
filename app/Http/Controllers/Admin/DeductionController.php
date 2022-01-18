<?php

namespace App\Http\Controllers\Admin;

use App\models\Deduction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Employee;

class DeductionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deductions = Deduction::select('*')->get();
        return view('admin.deduction.deductions')->with('deductions', $deductions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deduction.add_deduction');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee = Employee::where('id', '=', $request->eid)->first();
        $base = $employee->contract->base;
        $deduction = $request->tax +
            $request->leave +
            $request->provident +
            $request->welfare +
            $request->loan;
        // dd($deduction >= $base);
        if ($deduction >= $base) {
            return redirect()->back()->with(['error' => "Deduction Can't Be Greater Or Equal Base Salary."]);
            // dd('error');
        } else {
            Deduction::create([
                'id' => $request->id,
                'employee_id' => $request->eid,
                'tax_deduction' => $request->tax,
                'leave_deduction' => $request->leave,
                'Provident_Fund' => $request->provident,
                'welfare_Fund' => $request->welfare,
                'loan_deduction' => $request->loan,
            ]);
            return redirect()->back()->with(['success' => "Create oparation done successfully"]);
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
        $current = Deduction::where('id', '=', $id)->first();
        if (!$current) {
            return redirect()->back()->with(['error' => "Deduction Not Found"]);
        }
        return view('admin.deduction.edit_deduction')->with('current', $current);
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
        $current = Deduction::where('id', '=', $id)->first();
        if (!$current) {
            return redirect()->back()->with(['error' => "Deduction Not Found"]);
        }
        $current->update([
            'id' => $request->id,
            'employee_id' => $request->eid,
            'tax_deduction' => $request->tax,
            'leave_deduction' => $request->leave,
            'Provident_Fund' => $request->provident,
            'welfare_Fund' => $request->welfare,
            'loan_deduction' => $request->loan,
        ]);
        $id = $request->id;
        return redirect()->route('deduction.edit', $id)->with(['success' => "Edit oparation done successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $current = Deduction::where('id', '=', $id)->first();
        if (!$current) {
            return redirect()->back()->with(['error' => "Deduction Not Found"]);
        }
        $current->delete();
        return redirect()->back()->with(['success' => "delete oparation done successfully"]);
    }
}
