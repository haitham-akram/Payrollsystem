<?php

namespace App\Http\Controllers\Admin;

use App\models\Contract;
use App\models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContractController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fullvalue = 'Full time';
        $casualvalue = 'Casual';

        $fullcontracts = Contract::whereHas('employee', function ($q) use ($fullvalue) {
            $q->select('fname', 'lname')->where('type', '=', $fullvalue);
        })->get();
        $casualcontracts = Contract::whereHas('employee', function ($q) use ($casualvalue) {
            $q->select('fname', 'lname')->where('type', '=', $casualvalue);
        })->get();
        return view('admin.contract.contracts')->with('fullContracts', $fullcontracts)->with('casualsContracts', $casualcontracts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contract.addContract');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employye = Employee::where('id', '=', $request->eid)->first();
        if ($employye->type == 'Full time') {
            Contract::create([
                'id' => $request->id,
                'base' => $request->base,
                'hours_num' => 0,
                'paid_per_hour' => 0,
                'employee_id' => $request->eid,
            ]);
        } elseif ($employye->type == 'Casual') {
            Contract::create([
                'id' => $request->id,
                'hours_num' => $request->hours_num,
                'paid_per_hour' => $request->paid_per_hour,
                'employee_id' => $request->eid,
                'base' => $request->hours_num * $request->paid_per_hour,
            ]);
            $employye->update([
                'remaining_hours' => $request->hours_num,
            ]);
        }

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
        $currentContract = Contract::where('id', '=', $id)->first();
        if (!$currentContract) {
            return redirect()->back()->with(['error' => "Contract Not Found"]);
        }
        return view('admin.contract.edit_contract')->with('contract', $currentContract);
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
        $currentContract = Contract::where('id', '=', $id)->first();
        if (!$currentContract) {
            return redirect()->back()->with(['error' => "Contract Not Found"]);
        }

        $employye = Employee::where('id', '=', $request->eid)->first();
        if ($employye->type == 'Full time') {
            $currentContract->update([
                'id' => $request->id,
                'base' => $request->base,
                'hours_num' => 0,
                'paid_per_hour' => 0,
                'employee_id' => $request->eid,
            ]);
        } elseif ($employye->type == 'Casual') {
            $currentContract->update([
                'id' => $request->id,
                'hours_num' => $request->hours_num,
                'paid_per_hour' => $request->paid_per_hour,
                'employee_id' => $request->eid,
                'base' => $request->hours_num * $request->paid_per_hour,
            ]);
        }
        $id = $request->id;
        return redirect()->route('contract.edit', $id)->with(['success' => "Edit oparation done successfully"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $currentContract = Contract::where('id', '=', $id)->first();
        if (!$currentContract) {
            return redirect()->back()->with(['error' => "Contract Not Found"]);
        }
        $currentContract->delete();
        return redirect()->back()->with(['success' => "delete oparation done successfully"]);
    }
}
