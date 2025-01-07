<?php

namespace App\Http\Controllers;

use App\Models\BookingReview;
use App\Models\Doctor;
use App\Models\DoctorList;
use App\Models\Hospital;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DoctorListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("25"))) {
            $doctor = Doctor::with(['user','departments'])->get();
            return view('admin.doctorlist.index',compact('doctor'));
        }
        else {

            return view('viewnotfound');
        }
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
     * @param  \App\Models\DoctorList  $doctorList
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::any(checkPermission("25"))) {
            $doctor = Doctor::with(['user','departments'])->find($id);
            $hospital = Hospital::all();
            $scheduled = BookingReview::where('booking_status','Scheduled')->where('doctor_id',$id)->with(['slot','member.user'])->get();
            $completed = BookingReview::where('booking_status','Completed')->where('doctor_id',$id)->with(['slot','member.user'])->get();
            $cancelled = BookingReview::whereIn('booking_status',['Cancelled','Rejected'])->where('doctor_id',$id)->with(['slot','member.user'])->get();
            $scheduled_count = BookingReview::where('booking_status','Scheduled')->where('doctor_id',$id)->with(['slot','member.user'])->count();
            $completed_count = BookingReview::where('booking_status','Completed')->where('doctor_id',$id)->with(['slot','member.user'])->count();
            $cancelled_count = BookingReview::whereIn('booking_status',['Cancelled','Rejected'])->where('doctor_id',$id)->with(['slot','member.user'])->count();
            return view('admin.doctorlist.show',compact('doctor','hospital','scheduled','completed','cancelled','scheduled_count','completed_count','cancelled_count'));
        }
        else {

            return view('viewnotfound');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DoctorList  $doctorList
     * @return \Illuminate\Http\Response
     */
    public function edit(DoctorList $doctorList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DoctorList  $doctorList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DoctorList $doctorList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DoctorList  $doctorList
     * @return \Illuminate\Http\Response
     */
    public function destroy(DoctorList $doctorList)
    {
        //
    }

    public function details($id){
         if (Gate::any(checkPermission("25"))) {
            $booking = BookingReview::with(['member.user','slot.bookings','doctor_profile.user','report'])->find($id);
            // $user = Member::where('member_id',$booking->user_id)->first();
            return view('admin.doctorlist.details',compact('booking'));
        }
        else {

            return view('viewnotfound');
        }
    }
}
