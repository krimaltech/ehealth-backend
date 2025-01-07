<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\Slots;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('Doctor')) {
            $booking = Doctor::with('bookings.times.hospitals:id,name')->where('doctor_id', auth()->user()->id)->get();
            return view("admin.booking.index", compact('booking'));
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
        if (Gate::allows('Doctor')) {
            $involved_hospital = Doctor::select('hospital')->where('doctor_id', auth()->user()->id)->first();
            if ($involved_hospital->hospital == NULL) {
                $hospital = [];
            } else {
                $hospital = Hospital::whereIn('id', $involved_hospital->hospital)->get();
            }
            return view('admin.booking.create', compact('hospital'));
        } else {

            return view('viewnotfound');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required|after_or_equal:start_time',
        ]);
        $booking = new Booking();
        $booking->date = $request->date;
        $id = Auth::user()->id;
        $doctor = Doctor::where('doctor_id', $id)->first();
        $booking->doctor_id = $doctor->id;
        $start_time = request('start_time');
        $end_time = request('end_time');
        if ($request->service_type == 'In Video') {
            $limit = '15 minutes';
        } else {
            $limit = '30 minutes';
        }
        $booking->start_time = $request->date . " " . $request->start_time . ":" . "00";
        $booking->end_time = $request->date . " " . $request->end_time . ":" . "00";
        $checktime = Booking::where('start_time','<=', $request->date . " " . $request->end_time . ":" . "00")->where('end_time', '>=', $request->date . " " . $request->start_time . ":" . "00")->where('doctor_id', $doctor->id)->first();
        if (!$checktime) {
            $booking->save();
            $today =   $request->date . "$start_time";
            $tomorrow =   $request->date  . "$end_time";
            $period = new CarbonPeriod(new Carbon($today), $limit, new Carbon($tomorrow));
            foreach ($period as $item) {
                $slot = new Slots();
                $slot->slot_id = $booking->id;
                $slot->expiry_date = $item;
                $slot->slot = $item->format('g:i A');
                $slot->hospital = $request->hospital;
                $slot->service_type = $request->service_type;
                $slot->save();
            }
            return redirect()->route('booking.index')->with('success', 'Doctor Schedule Added Successfully');
        }else{
            return redirect()->back()->withErrors('This times slots already present');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
