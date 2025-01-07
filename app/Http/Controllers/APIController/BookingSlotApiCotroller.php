<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Mail\BookingMail;
use App\Models\AppointmentCompleted;
use App\Models\Booking;
use App\Models\BookingNotification;
use App\Models\BookingReview;
use App\Models\Doctor;
use App\Models\FollowUp;
use App\Models\ForwardReport;
use App\Models\Hospital;
use App\Models\Member;
use App\Models\SearchHistory;
use App\Models\Slots;
use App\Models\StoreToken;
use App\Models\UploadMedicalHistory;
use App\Models\User;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class BookingSlotApiCotroller extends Controller
{

    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }

    public function index(Request $request)
    {
        if ($request->slug) {
            $id = Auth::user()->id;
            $user = Member::where('member_id', $id)->first();
            $booking = BookingReview::where('user_id', $user->id)->where('slug', $request->slug)->with(['slot.bookings.doctor.user', 'doctor_profile.departments', 'meeting', 'report'])->first();
        } else {
            $id = Auth::user()->id;
            $user = Member::where('member_id', $id)->first();
            $booking = BookingReview::where('user_id', $user->id)->with(['slot.bookings.doctor.user', 'doctor_profile', 'meeting', 'report'])->get();
        }

        return response()->json($booking);
    }

    public function time()
    {
        $time = Doctor::with('bookings.slots')->where('doctor_id', auth()->user()->id)->get();
        return response()->json($time);
    }

    public function review(Request $request)
    {
        $request->validate([
            'booking_id' => 'required',
            'doctor_id' => 'required',
            'messages' => 'required',
        ]);
        $booking = new BookingReview();
        $id = Auth::user()->id;
        $users = Member::where('member_id', $id)->first();
        $booking->user_id = $users->id;
        $booking->booking_id = $request->booking_id;
        $booking->doctor_id = $request->doctor_id;
        $booking->doctor_service_type = $request->doctor_service_type;
        $booking->messages = $request->messages;
        $name = str_replace(' ', '-', 'GDBooking');
        $booking->slug = $name . '-' . $this->random;
        $booking->status = 0;
        $booking->booking_status = 'Not Scheduled';
        $booking->save();
        $user_details = User::where('id', Auth::user()->id)->first();
        $doctor = Doctor::with('user')->where('id', $request->doctor_id)->first();
        // push notification to doctor
        $doctor_notify = StoreToken::where('user_id', $doctor->doctor_id)->first();
        if ($doctor_notify) {
            $notification_id = $doctor_notify->device_key;
            $title = "Doctor Booked Notification ";
            $message = "Your have been booked by" . " " . $user_details->name;
            $type = "Doctor Booked";
            send_notification_FCM($notification_id, $title, $message, $type);
        }
        // push notification to user
        $user_notify = StoreToken::where('user_id', auth()->user()->id)->first();
        if ($user_notify) {
            $notification_id = $user_notify->device_key;
            $title = "Doctor Booked Notification ";
            $message = "You Booked Dr." . " " . $doctor->user->name;
            $type = "User-Doctor-Booking";
            send_notification_FCM($notification_id, $title, $message, $type);
        }
        //sms to doctor
        $usertext = "Appointment Booked BY:" . " " . $user_details->name . " " . " Phone Number:" . " " . $user_details->phone . " " . "https://ghargharmadoctor.page.link/doctorhomepage";

        send_sms($doctor->user->phone, $usertext);

        //sms to user
        $doctortext = "You Booked Dr. " . " " . $doctor->user->name . " " . " Phone Number:" . " " . $doctor->user->phone . " " . "https://ghargharmadoctor.page.link/doctorhomepage";

        send_sms($user_details->phone, $doctortext);

        //store user  notification
        $bookingNotification = new BookingNotification();
        $bookingNotification->user_id = Auth::user()->id;
        $bookingNotification->image = $users->image_path;
        $bookingNotification->title = "Booking Notification";
        $bookingNotification->body = "You booked Dr." . $doctor->user->name . " " . "on" . " " . $doctor->user->created_at->format('Y-m-d');
        $bookingNotification->type = "User-Doctor-Booking";
        $bookingNotification->save();
        //store doctor  notification
        $bookingNotification = new BookingNotification();
        $bookingNotification->user_id = $doctor->user->id;
        $bookingNotification->image = $doctor->image_path;
        $bookingNotification->title = "Booking Notification";
        $bookingNotification->body = "You have been booked by " . $user_details->name . " " . "on" . " " . $user_details->created_at->format('Y-m-d');
        $bookingNotification->type = "Doctor Booked";
        $bookingNotification->save();
        return response()->json([$booking]);
    }

    public function date(Request $request)
    {
        $slug = $request->slug;
        $keyword = $request->keyword;
        $department = $request->department;
        $mintime = $request->mintime;
        $maxtime = $request->maxtime;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $distance = $request->distance;
        $hospital = $request->hospital;
        $member_id = $request->member_id;
        if ($keyword) {
            $searchHistory = new SearchHistory();
            $searchHistory->user_id = $request->user_id;
            $searchHistory->query = $keyword;
            $searchHistory->type = $request->type;
            $searchHistory->save();
        }
        $booking = Doctor::whereNotNull('created_at')->with(['bookings', 'departments', 'user', 'bookings.slots.appointments'])
            ->when($slug, function ($query) use ($slug) {
                return $query->where('slug', $slug);
            })
            ->when($department, function ($query) use ($department) {
                return $query->where('department', $department);
            })
            ->when($keyword, function ($query) use ($keyword) {
                $query->whereHas('user', function ($q) use ($keyword) {
                    return $q->where('name', 'LIKE', '%' . $keyword . '%');
                });
            })
            ->when($maxtime && $mintime, function ($query) use ($maxtime, $mintime) {
                $query->whereHas('bookings.slots', function ($q) use ($mintime, $maxtime) {
                    return $q->whereBetween('expiry_date', [$mintime, $maxtime]);
                });
            })
            ->when($hospital, function ($query) use ($hospital) {
                return $query->whereJsonContains('hospital', $hospital);
            })
            ->when($member_id, function ($query) use ($member_id) {
                return $query->where('doctor_id','!=',$member_id);
            })
            ->when($latitude && $longitude && $distance, function ($query) use ($latitude, $longitude, $distance) {
                return $query->select('*', DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                + sin(radians(" . $latitude . ")) * sin(radians(latitude))) AS distance"))->having('distance', '<=', $distance);
            })
            ->paginate(12)->withQueryString();
        return response()->json($booking);
    }

    public function cancleByDoctor($id, Request $request)
    {
        $booking = BookingReview::find($id);
        $booking->booking_status = 'Rejected';
        $booking->cancel_reason = $request->cancel_reason;
        $doctor_id = $booking->doctor_id;
        $doctor = Doctor::with('user')->where('id', $doctor_id)->first();
        $text = "Appointment Rejected By:" . " " . $doctor->user->name . " " . " Phone Number:" . " " . $doctor->user->phone . " " . "https://ghargharmadoctor.page.link/doctorhomepage";
        $saved = $booking->update();
        if ($saved) {
            $user = StoreToken::where('user_id', $booking->member->member_id)->first();

            //store user  notification
            $bookingNotification = new BookingNotification();
            $bookingNotification->user_id = $booking->member->member_id;
            $bookingNotification->image = $booking->doctor_profile->image_path;
            $bookingNotification->title = "Booking Notification";
            $bookingNotification->body = $text;
            $bookingNotification->type = "User-Doctor-Booking";
            $bookingNotification->save();

            if ($user) {
                $title = "Appointment Rejected ";
                $notification_id = $user->device_key;
                $type = "Doctor Cancel";
                $res = send_notification_FCM($notification_id, $title, $text, $type);
            } else {
                $res = [];
            }
            send_sms($user->phone, $text);
            return response()->json([
                "status" => "true"
            ], 200);
        }
    }

    public function cancleByUser($id, Request $request)
    {
        $booking = BookingReview::find($id);
        $doctorPhone = Doctor::with('user')->where('id', $booking->doctor_id)->first()->user->phone;
        $booking->booking_status = 'Cancelled';
        $booking->cancel_reason = $request->cancel_reason;
        $userPhone = $booking->member->user->phone;
        $text = "Appointment Cancelled By:" . " " . $booking->member->user->name . " " . " Phone Number:" . " " . $userPhone . " " . "https://ghargharmadoctor.page.link/doctorhomepage";
        $saved = $booking->update();
        if ($saved) {
            $user = StoreToken::where('user_id', $booking->doctor_profile->doctor_id)->first();

            //store user  notification
            $bookingNotification = new BookingNotification();
            $bookingNotification->user_id = $booking->doctor_profile->doctor_id;
            $bookingNotification->image = $booking->member->image_path;
            $bookingNotification->title = "Booking Notification";
            $bookingNotification->body = $text;
            $bookingNotification->type = "Booking";
            $bookingNotification->save();

            if ($user) {
                $title = "Appointment Rejected ";
                $notification_id = $user->device_key;
                $type = "Doctor Cancel";
                $res = send_notification_FCM($notification_id, $title, $text, $type);
            } else {
                $res = [];
            }

            send_sms($doctorPhone, $text);
            return response()->json([
                "status" => "true"
            ], 200);
        }
    }

    public function appointmentStatus(Request $request)
    {
        $status = $request->status;
        $id = auth()->user()->id;
        $user_id = Member::where('member_id', $id)->first();
        $bookings = BookingReview::where('booking_status', $status)->where('user_id', $user_id)->orderBy('created_at', 'desc')->get();
        return $bookings;
    }

    public function payment(Request $request)
    {
        if($request->token){
            //payment verification (app)
            $khaltiVerify = Helper::khaltiVerify($request);
            if (isset($khaltiVerify['idx'])) {
                $booking = BookingReview::find($request->input('id'));
                $booking->status = 1;
                $booking->booking_status = 'Scheduled';
                $booking->payment_method = 'Khalti';
                $booking->payment_date = Carbon::now();
                $id = auth()->user()->id;
                $user_id = Member::with('user')->where('member_id', $id)->first();   
    
                $update = $booking->update();
                $medical = new AppointmentCompleted();
                $medical->booking_id = $booking->id;
                $medical->save();
                if ($update) {
                    $otherbookings = BookingReview::where('booking_id', $booking->booking_id)->where('id', '!=', $booking->id)->get();
                    foreach ($otherbookings as $item) {
                        $item->booking_status = 'Slot Unavailable';
                        $item->update();
                    }
                    $slot = Slots::find($booking->booking_id);
                    $slot->delete();
    
                    $mailData = [
                        'booking_status' => $booking->booking_status,
                        'payment_method' => $booking->payment_method,
                        'body' => 'Your Booking Payment Completed.',
                        'payment_date' => $booking->payment_date,
                        'payment_amount' => $booking->doctor_profile->fee,
                    ];
                    $booking = BookingReview::findOrFail($booking->id);
                    $pdf = Pdf::loadView('admin.invoice.bookinginvoice', compact('booking'))->setOptions(['defaultFont' => 'sans-serif']);
    
                    Mail::to(auth()->user()->email)->send(new BookingMail($mailData, $pdf));
                }
                return response()->json([
                    'success' => 'Doctor Appointment Scheduled.',
                ]);
    
            } 
            else {
                return response()->json([
                    'error' => 'Something went Wrong.',
                ]);
            }
        }else{
            //payment verification (web)
            $khaltiLookup = Helper::khaltiLookup($request->pidx);
            $responseData = $khaltiLookup->getData();
            if(isset($responseData->status) && $responseData->status === 'Completed'){
                $booking = BookingReview::find($request->input('id'));
                $booking->status = 1;
                $booking->booking_status = 'Scheduled';
                $booking->payment_method = 'Khalti';
                $booking->payment_date = Carbon::now();
                $id = auth()->user()->id;
                $user_id = Member::with('user')->where('member_id', $id)->first();


                $update = $booking->update();
                $medical = new AppointmentCompleted();
                $medical->booking_id = $booking->id;
                $medical->save();
                if ($update) {
                    $otherbookings = BookingReview::where('booking_id', $booking->booking_id)->where('id', '!=', $booking->id)->get();
                    foreach ($otherbookings as $item) {
                        $item->booking_status = 'Slot Unavailable';
                        $item->update();
                    }
                    $slot = Slots::find($booking->booking_id);
                    $slot->delete();

                    $mailData = [
                        'booking_status' => $booking->booking_status,
                        'payment_method' => $booking->payment_method,
                        'body' => 'Your Booking Payment Completed.',
                        'payment_date' => $booking->payment_date,
                        'payment_amount' => $booking->doctor_profile->fee,
                    ];
                    $booking = BookingReview::findOrFail($booking->id);
                    $pdf = Pdf::loadView('admin.invoice.bookinginvoice', compact('booking'))->setOptions(['defaultFont' => 'sans-serif']);

                    Mail::to(auth()->user()->email)->send(new BookingMail($mailData, $pdf));
                }
                return response()->json([
                    'success' => 'Doctor Appointment Scheduled.',
                ]);
            } else {
                return response()->json([
                    'error' => 'Payment Pending.',
                ],400);
            }
        }        
    }

    // public function scheduled()
    // {
    //     $doctor = Doctor::where('doctor_id',Auth::user()->id)->first();
    //     $bookings = BookingReview::where('booking_status', 'Scheduled')->with(['slot.bookings', 'meeting'])->where('doctor_id',$doctor->id)->get();
    //     return response()->json($bookings);
    // }

    // public function completed()
    // {
    //     $doctor = Doctor::where('doctor_id',Auth::user()->id)->first();
    //     $bookings = BookingReview::where('booking_status', 'Completed')->with(['slot.bookings', 'report'])->where('doctor_id',$doctor->id)->get();
    //     return response()->json($bookings);
    // }

    // public function rejected()
    // {
    //     $doctor = Doctor::where('doctor_id',Auth::user()->id)->first();
    //     $bookings = BookingReview::where('booking_status', 'Rejected')->with('slot.bookings')->where('doctor_id',$doctor->id)->get();
    //     return response()->json($bookings);
    // }

    public function appointment()
    {
        $doctor = Doctor::where('doctor_id', Auth::user()->id)->first();
        $bookings = BookingReview::with(['slot.bookings', 'member.user', 'report'])->where('doctor_id', $doctor->id)->get();
        return response()->json($bookings);
    }

    public function doctorHospital()
    {
        $involved_hospital = Doctor::select('hospital')->where('doctor_id', auth()->user()->id)->first();
        if ($involved_hospital->hospital == NULL) {
            $hospital = [];
        } else {
            $hospital = Hospital::whereIn('id', $involved_hospital->hospital)->get();
        }

        return response()->json($hospital);
    }

    public function doctorBookingSlots(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
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
        $checktime = Booking::where('start_time', '<=', $request->date . " " . $request->end_time . ":" . "00")->where('end_time', '>=', $request->date . " " . $request->start_time . ":" . "00")->where('doctor_id', $doctor->id)->first();
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
            return response()->json(['success' => 'Doctor Schedule Added Successfully']);
        } else {
            return response()->json(['error' => 'This times slots already present']);
        }
    }

    public function getDoctorBookingSlots()
    {
        $booking = Doctor::with(['bookings' => function ($query) {
            $query->where('date', '>=', Carbon::now()->format('Y-m-d'));
        }, 'bookings.times', 'user'])->where('doctor_id', auth()->user()->id)->first();
        return response()->json($booking);
    }

    public function premedicalReport(Request $request)
    {
        $password = $request->password;
        if (Hash::check($password, Auth::user()->password)) {
            $member = Member::where('member_id', Auth::user()->id)->first();
            $booking = BookingReview::where('slug', $request->slug)->first();
            $forward = ForwardReport::where('booking_id', $booking->id)->pluck('report_id');

            if ($forward != null) {
                $reports = UploadMedicalHistory::where('member_id', $member->id)->whereNotIn('id', $forward)->get();
            } else {
                $reports = UploadMedicalHistory::where('member_id', $member->id)->get();
            }
            return response()->json($reports);
        } else {
            return response()->json(['message' => 'The password did not match.']);
        }
    }

    public function forwardReport(Request $request, $slug)
    {
        $booking = BookingReview::where('slug', $slug)->first();
        foreach ($request->report_id as $report) {
            $forward = new ForwardReport();
            $forward->booking_id = $booking->id;
            $forward->report_id = $report;
            $saved = $forward->save();
        }
        if ($saved) {
            return response()->json(['success' => 'Report Forwarded Successfully.']);
        }
    }

    public function followUpDate()
    {
        $id = Auth::user()->id;
        $users = Member::where('member_id', $id)->first();
        $followup = FollowUp::with('followupdate.user')->where('user_id', $users->id)->get();
        return response()->json($followup);
    }
}
