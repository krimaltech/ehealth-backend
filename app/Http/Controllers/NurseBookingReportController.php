<?php

namespace App\Http\Controllers;

use App\Models\NurseBooking;
use App\Models\NurseBookingReport;
use Carbon\Carbon;
use Illuminate\Http\Request;

class NurseBookingReportController extends Controller
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
        $report = new NurseBookingReport();
        $report->booking_id = $request->booking_id;
        $report->date = $request->date;
        $report->time = Carbon::createFromFormat('H:i',$request->time)->format('g:i A');
        $report->pulse_rate = $request->pulse_rate;
        $report->respiratory_rate = $request->respiratory_rate;
        $report->temperature = $request->temperature;
        $report->bp = $request->upper.'/'.$request->lower;
        $report->description = $request->description;
        $saved = $report->save();

        $booking = NurseBooking::find($request->booking_id);
        $booking->booking_status = 'Completed';
        $booking->update();
        if($saved){
            return redirect()->back()->with('success','Nursing Record Added Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NurseBookingReport  $nurseBookingReport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = NurseBooking::with(['member.user','shift.nurse.user','reports'])->find($id);
        return view('admin.nursebooking.show',compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NurseBookingReport  $nurseBookingReport
     * @return \Illuminate\Http\Response
     */
    public function edit(NurseBookingReport $nurseBookingReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NurseBookingReport  $nurseBookingReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NurseBookingReport $nurseBookingReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NurseBookingReport  $nurseBookingReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(NurseBookingReport $nurseBookingReport)
    {
        //
    }
}
