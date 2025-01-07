<?php

namespace App\Http\Controllers;

use App\Models\Nurse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class NurseListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $nurse = Nurse::with(['user'])->get();
            return view('admin.nurselist.index', compact('nurse'));
        } else {

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $nurse = Nurse::with(['user'])->find($id);
            // $hospital = Hospital::all();
            // $scheduled = BookingReview::where('booking_status', 'Scheduled')->where('doctor_id', $id)->with(['slot', 'user'])->get();
            // $completed = BookingReview::where('booking_status', 'Completed')->where('doctor_id', $id)->with(['slot', 'user'])->get();
            // $cancelled = BookingReview::where('booking_status', 'Cancelled')->where('doctor_id', $id)->with(['slot', 'user'])->get();
            // $scheduled_count = BookingReview::where('booking_status', 'Scheduled')->where('doctor_id', $id)->with(['slot', 'user'])->count();
            // $completed_count = BookingReview::where('booking_status', 'Completed')->where('doctor_id', $id)->with(['slot', 'user'])->count();
            // $cancelled_count = BookingReview::where('booking_status', 'Cancelled')->where('doctor_id', $id)->with(['slot', 'user'])->count();
            // return view('admin.nurselist.show', compact('doctor', 'hospital', 'scheduled', 'completed', 'cancelled', 'scheduled_count', 'completed_count', 'cancelled_count'));
            return view('admin.nurselist.show', compact('nurse'));
        } else {

            return view('viewnotfound');
        }
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
        //
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