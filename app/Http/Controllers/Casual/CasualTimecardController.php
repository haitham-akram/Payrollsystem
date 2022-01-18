<?php

namespace App\Http\Controllers\Casual;

use Carbon\Carbon;
use App\models\Employee;
use App\models\Timecard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CasualTimecardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $current = Employee::select('id', 'fname', 'lname', 'remaining_hours')->where('id', '=', $id)->first();
        $remaining_hours = $current->remaining_hours;
        //dd($remaining_hours);
        $base_hours = $current->contract->hours_num;
        $timecards = Timecard::where('employee_id', '=', $id)->get();

        return view('casual.timecard.index')->with('current', $current)->with('timecards', $timecards);
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
    public function store(Request $request, $id)
    {
        $employee = Employee::where('id', '=', $id)->first();

        //getting time
        $current_date = Carbon::now('EET');
        //->toDateTimeString()
        $hour = $current_date->hour;
        $min = $current_date->minute;
        if (strlen((string)$hour) == 1) {
            $hour = '0' . $hour;
        }
        $sec = $current_date->second;
        $time = $hour . ':' . $min . ':' . $sec;
        $month = $current_date->month;
        if (strlen((string)$month) == 1) {
            $month = '0' . $month;
        }
        $Day = $current_date->day;
        if (strlen((string)$Day) == 1) {
            $Day = '0' . $Day;
        }
        $date =  $current_date->year . '-' . $month . '-' . $Day;
        //dd($date);
        if ($employee->remaining_hours > 0) {
            Timecard::create([
                'employee_id' => $id,
                'startTime' => $time,
                'endTime' => '00:00:00',
                'hours_num' => 0,
                'month' => $date,
            ]);
            return redirect()->back()->with(['success' => "Starting New Timecard Successfully"]);
        } else if ($employee->remaining_hours <= 0) {
            return redirect()->back()->with(['error' => "There Is No Working Time Left."]);
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
        $employee = Employee::where('id', '=', $id)->first();
        //dd($employee);
        $current_date = Carbon::now('EET');
        $hour = $current_date->hour;
        $min = $current_date->minute;
        if (strlen((string)$hour) == 1) {
            $hour = '0' . $hour;
        }
        $sec = $current_date->second;
        $time = $hour . ':' . $min . ':' . $sec;
        $month = $current_date->month;
        if (strlen((string)$month) == 1) {
            $month = '0' . $month;
        }
        $Day = $current_date->day;
        if (strlen((string)$Day) == 1) {
            $Day = '0' . $Day;
        }
        $date =  $current_date->year . '-' . $month . '-' . $Day;
        $current = Timecard::where('month', '=', $date)->where('endTime', '=', '00:00:00')->latest('startTime')->first();
        //DD($current);
        if (!$current) {
            return redirect()->back()->with(['error' => "There No Timecard To End Tracking it."]);
        }

        $startTime = $current->startTime;

        $startHour = substr($startTime, 0, 2);

        //spending hours
        $current_date->subHours($startHour);
        $totalhour = $current_date->hour;
        if (strlen((string)$totalhour) == 1) {
            $Day = '0' . $totalhour;
        }
        //spending minutes
        $total_min = $current_date->minute;
        $totalTime = $totalhour . ':' . $total_min;
        //remaining time
        $Ehours = $employee->remaining_hours;
        $Emin = $employee->remaining_min;
        //calculating remaining time




        if ($Ehours > $totalhour) {
            $remaining_hour = $Ehours - $totalhour;

            $remaining = $remaining_hour;
            // dd("first case " . $remaining . ' total time ' . $totalTime);
            $employee->update([
                'remaining_hours' => $remaining_hour,
            ]);
            $current->update([
                'endTime' => $time,
                'hours_num' => $totalTime,
            ]);
            return redirect()->back()->with(['success' => "Tracking Your Timecard Done Successfully."]);
        } else if ($Ehours <= $totalhour) {
            $remaining_hour = $Ehours;
            $remaining = $remaining_hour;

            //dd("third case " . $remaining . ' total time ' . $totalTime);
            $employee->update([
                'remaining_hours' => 0,
            ]);
            $current->update([
                'endTime' => $time,
                'hours_num' => $totalTime,
            ]);
            return redirect()->back()->with(['success' => "Tracking Your Timecard Done Successfully. But You have exceeded the remaining hours and minutes limit, so only the remaining hours and minutes will be counted."]);
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
        $current = Timecard::where('id', '=', $id)->first();
        if (!$current) {
            return redirect()->back()->with(['error' => "Can't Find The TimeCard"]);
        }
        $hours = $current->hours_num;
        $returnHour = substr($hours, 0, 2);
        //  dd($returnHour);
        $employee = $current->employee;

        $employee->update([
            'remaining_hours' => $returnHour,
        ]);
        $current->delete();
        return redirect()->back()->with(['success' => "Deleting Timecard Done Successfully."]);
    }
}
