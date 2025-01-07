<?php

namespace App\Http\Controllers;

use App\Models\NurseBooking;
use Illuminate\Http\Request;

class NurseBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nurseBooking = NurseBooking::where('status',1)->with(['member.user','shift.nurse.user'])->get();
        return view('admin.nursebooking.index',compact('nurseBooking'));
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
     * @param  \App\Models\NurseBooking  $nurseBooking
     * @return \Illuminate\Http\Response
     */
    public function show(NurseBooking $nurseBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NurseBooking  $nurseBooking
     * @return \Illuminate\Http\Response
     */
    public function edit(NurseBooking $nurseBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NurseBooking  $nurseBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NurseBooking $nurseBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NurseBooking  $nurseBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy(NurseBooking $nurseBooking)
    {
        //
    }
}
