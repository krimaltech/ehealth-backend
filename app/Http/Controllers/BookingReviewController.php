<?php

namespace App\Http\Controllers;

use App\Models\AppointmentCompleted;
use App\Models\Booking;
use App\Models\BookingReview;
use App\Models\Member;
use App\Models\Slots;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookingReviewController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('User')) {
            $id = Auth::user()->id;
            $user = Member::where('member_id', $id)->first();
            $booking = BookingReview::where('user_id', $user->id)->with('slot')->get();
            return view('admin.bookingreview.index', compact('booking'));
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
        if (Gate::allows('User')) {
            return view('admin.bookingreview.create');
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
            'booking_id' => 'required',
            'doctor_id' => 'required',
            'messages' => 'required',
        ]);
        $booking = new BookingReview();
        $booking->user_id = Auth::user()->id;
        $booking->booking_id = $request->booking_id;
        $booking->messages = $request->messages;
        $name = str_replace(' ', '-', 'GDBooking');
        $booking->slug =  $name . '-' . $this->random;
        $saved = $booking->save();
        if ($saved) {
            return redirect()->route('bookingreview.index')->with('success', 'Booking Review Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookingReview  $bookingReview
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (Gate::allows('User')) {
            $booking = BookingReview::where('slug', $slug)->with('slot', 'doctor_profile.user', 'doctor_profile.departments')->first();
            //return $booking;
            return view('admin.bookingreview.show', compact('booking'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookingReview  $bookingReview
     * @return \Illuminate\Http\Response
     */
    public function edit(BookingReview $bookingReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookingReview  $bookingReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookingReview $bookingReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookingReview  $bookingReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookingReview $bookingReview)
    {
        //
    }

    public function payment($slug)
    {
        if (Gate::allows('User')) {
            $booking = BookingReview::where('slug', $slug)->first();
            $booking->status = 1;
            $booking->booking_status = 'Scheduled';
            $booking->update();
            $medical = new AppointmentCompleted();
            $medical->booking_id = $booking->id;
            $medical->save();
            return redirect()->back()->with('success', 'Payment Completed');
        } else {
            return view('viewnotfound');
        }
    }
}