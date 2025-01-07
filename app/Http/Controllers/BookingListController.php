<?php

namespace App\Http\Controllers;

use App\Models\AppointmentCompleted;
use App\Models\BookingReview;
use App\Models\Doctor;
use App\Models\FollowUp;
use App\Models\Meeting;
use App\Models\User;
use App\Models\UserReview;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookingListController extends Controller
{
    public function scheduled()
    {
        if (Gate::allows('Doctor')) {
            $doctor = Doctor::where('doctor_id',Auth::user()->id)->first();
            $bookings = BookingReview::where('booking_status', 'Scheduled')->with(['slot.bookings', 'meeting','member.user','report'])->where('doctor_id',$doctor->id)->get();
            return view('admin.bookinglist.scheduled', compact('bookings'));
        } else {
            return view('viewnotfound');
        }
    }

    public function changeCompleted($id, Request $request)
    {
        if (Gate::allows('Doctor')) {
            $booking = BookingReview::find($id);
            $booking->booking_status = 'Scheduled';
            $booking->update();
            $medical = AppointmentCompleted::where('booking_id',$booking->id)->first();
            $medical->booking_id = $booking->id;
            $medical->history = $request->history;
            $medical->examination = $request->examination;
            $medical->treatment = $request->treatment;
            $medical->progress = $request->progress;

            if($request->image){
                if (env('STORAGE_TYPE') == 'native') {
                    $medical->image = storeImageLaravel($request, 'image', 'image_path')[0];
                    $medical->image_path = storeImageLaravel($request, 'image', 'image_path')[1];
                } else {
                    $medical->image = storeImageStorage($request, 'image', 'image_path')[0];
                    $medical->image_path = storeImageStorage($request, 'image', 'image_path')[1];
                }
            }
            $saved = $medical->update();
            if ($saved) {
                if ($request->followUpDate) {
                    $followup = new FollowUp();
                    $followup->followUpDate = $request->followUpDate;
                    $followup->user_id = $booking->user_id;
                    $followup->doctor_id = $booking->doctor_id;
                    $followup->save();
                }
                return redirect()->back()->with('success', 'Appointment Completed');
            }
        } else {
            return view('viewnotfound');
        }
    }

    public function changeToCompleted($id, Request $request)
    {
        if (Gate::allows('Doctor')) {
            $booking = BookingReview::find($id);
            $booking->booking_status = 'Completed';
            $booking->update();

            $meeting = Meeting::where('booking_id', $id)->first();
            $meeting->end_time = Carbon::now();
            $meeting->update();

            return redirect()->route('completed.index')->with('success', 'Appointment Completed');
        } else {
            return view('viewnotfound');
        }
    }

    public function changeCancelled($id, Request $request)
    {
        if (Gate::allows('Doctor')) {
            $booking = BookingReview::find($id);
            $booking->booking_status = 'Rejected';
            $booking->cancel_reason = $request->cancel_reason;

            $doctorId = $booking->doctor_profile->doctor_id;
            $doctorPhoneNo = User::where('id', $doctorId)->first()->phone;

            send_sms($doctorPhoneNo, 'Your Appointment is cancelled successfully.');
            $saved = $booking->update();
            if ($saved) {
                return redirect()->route('cancelled.index')->with('success', 'Appointment Cancelled');
            }
        } else {
            return view('viewnotfound');
        }
    }   

    public function completed()
    {
        if (Gate::allows('Doctor')) {
            $doctor = Doctor::where('doctor_id',Auth::user()->id)->first();
            $bookings = BookingReview::where('booking_status', 'Completed')->where('doctor_id',$doctor->id)->get();
            return view('admin.bookinglist.completed', compact('bookings'));
        } else {
            return view('viewnotfound');
        }
    }

    public function cancelled()
    {
        if (Gate::allows('Doctor')) {
            $doctor = Doctor::where('doctor_id',Auth::user()->id)->first();
            $bookings = BookingReview::whereIn('booking_status', ['Rejected','Cancelled'])->where('doctor_id',$doctor->id)->get();
            return view('admin.bookinglist.cancelled', compact('bookings'));
        } else {
            return view('viewnotfound');
        }
    }

    public function completedDetails($id)
    {
        if (Gate::allows('Doctor')) {
            $completed = BookingReview::with(['member','forwardreports.report','userreview'])->find($id);
            $examination = AppointmentCompleted::where('booking_id',$completed->id)->first();
            return view('admin.bookinglist.completedetails', compact('completed','examination'));
        } else {
            return view('viewnotfound');
        }
    }

    public function scheduledDetails($id)
    {
        if (Gate::allows('Doctor')) {
            $scheduled = BookingReview::with(['member','forwardreports.report'])->find($id);
            return view('admin.bookinglist.scheduledetails', compact('scheduled'));
        } else {
            return view('viewnotfound');
        }
    }

    public function appointments()
    {
        $name = '';
        $doctor = '';
        $date = '';
        if (Gate::any(['Superadmin', 'Admin'])) {
            $bookings = BookingReview::with('doctor_profile.user', 'doctor_profile.departments', 'member.user', 'slot.bookings')->get();
            //return $bookings;
            return view('admin.bookinglist.appointments', compact('bookings', 'name', 'doctor', 'date'));
        } else {
            return view('viewnotfound');
        }
    }

    public function viewAppointment($id)
    {

        if (Gate::any(checkPermission("25"))) {
            $booking = BookingReview::with(['member.user','forwardreports.report','report','userreview'])->find($id);
            //return $booking;
            return view('admin.bookinglist.viewappointment', compact('booking'));
        } else {
            return view('viewnotfound');
        }
    }

    public function searchAppointment(Request $request)
    {
        $name = ($request->name ? $request->name : '');
        $doctor = ($request->doctor ? $request->doctor : '');
        $date = ($request->date ? $request->date : '');

    //     $query= BookingReview::with('doctor_profile.user', 'doctor_profile.departments', 'user')->query();
    //     if($request->name){
    //         $query->whereHas('user', function ($query) use ($name) {
    //             $query->where('name', 'LIKE', '%' . $name . '%');
    //         })->get();
    //     }
    //     if($request->doctor){
    //        $query->whereHas('doctor_profile.user', function ($query) use ($doctor) {
    //             $query->where('name', 'LIKE', '%' . $doctor . '%');
    //         })->get();
    //     }
    //     if ($request->date) {
    //         $query->whereHas('slot.bookings', function ($query) use ($date) {
    //             $query->where('date', 'LIKE', '%' . $date . '%');
    //         })->get();
    //     }
    //    $bookings= $query->get();

   
       
        if (Gate::any(checkPermission("25"))) {
            $bookings = BookingReview::with('doctor_profile.user', 'doctor_profile.departments', 'member.user', 'slot.bookings')
                ->when($name, function ($query) use ($name) {
                    $query->whereHas('member.user', function ($q) use ($name) {
                        return $q->where('name', 'LIKE', '%' . $name . '%');
                    });
                })
                ->when($doctor, function ($query) use ($doctor) {
                    $query->whereHas('doctor_profile.user', function ($q) use ($doctor) {
                        return $q->where('name', 'LIKE', '%' . $doctor . '%');
                    });
                })
                ->when($date, function ($query) use ($date) {
                    $query->whereHas('slot.bookings', function ($q) use ($date) {
                        return $q->where('date', 'LIKE', '%' . $date . '%');
                    });
                })
            ->get();
         
            return view('admin.bookinglist.appointments', compact('bookings', 'name', 'doctor', 'date'));
        } else {
            return view('viewnotfound');
        }
    }

    public function userReview(Request $request,$id){
        $request->validate([
            'comment'=> 'required'
        ]);
        $booking = BookingReview::find($id);
        $review = new UserReview();
        $review->user_id = $booking->user_id;
        $review->doctor_id = $booking->doctor_id;
        $review->appointment_id = $id;
        $review->comment = $request->comment;
        $review->status = 0;
        $saved = $review->save();
        if($saved){
            return redirect()->back()->with('success','Review posted successfully.');
        }
    }
}