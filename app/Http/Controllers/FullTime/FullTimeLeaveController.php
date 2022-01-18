<?php

namespace App\Http\Controllers\FullTime;

use Carbon\Carbon;
use App\models\Leave;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FullTimeLeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        $current_date = Carbon::now('EET');
        $month = $current_date->month;
        if (strlen((string)$month) == 1) {
            $month = '0' . $month;
        }
        $current_month =  $current_date->year . '-' . $month;
        $leave =  Leave::where('employee_id', '=', $id)->where('month', '=', $current_month)->first();
        $leave_num = $request->num_leave;
        if ($leave_num > $leave->balance) {
            return redirect()->back()->with(['error' => 'Your Requested Leave Number Should Be Less Than Your Leave Balance.']);
        } else {
            $num = $leave->balance - $leave_num;
            $leave->update([
                'balance' => $num,
            ]);
            return redirect()->back()->with(['success' => $leave_num . ' Days of your Leave Balance have been deducted successfully.']);
        }
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
