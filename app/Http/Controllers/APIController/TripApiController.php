<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Models\DriverNotification;
use App\Models\MedicalSupport;
use App\Models\Member;
use App\Models\StoreToken;
use App\Models\Trip;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TripApiController extends Controller
{
    public function index()
    {
        $driver = Driver::where('driver_id', auth()->user()->id)->first();
        if ($driver) {
            $trips = Trip::with('user_address:id,pick_up_latitude,pick_up_longitude', 'ambulance_fare', 'driver_key', 'user_key')->where('driver_id', $driver->id)->get();
            return response()->json($trips);
        } else {
            $trips = [];
            return response()->json($trips);
        }
    }

    public function userTrip()
    {
        $member = Member::where('member_id', auth()->user()->id)->first();
        if ($member) {
            $trips = Trip::with('user_address:id,pick_up_latitude,pick_up_longitude', 'ambulance_fare', 'driver_key', 'user_key')->where('user_id', $member->id)->get();
            return response()->json($trips);
        } else {
            $trips = [];
            return response()->json($trips);
        }
    }

    public function driverList()
    {
        $drivers = Driver::with('driver')->where('activeStatus', 1)->get();
        return response()->json($drivers);
    }

    public function store(Request $request)
    {
        $trip = new Trip();
        $trip->date = Carbon::now()->format('Y-m-d');
        $trip->start_time = Carbon::now()->format('g:i:A');
        $driver = Driver::where('driver_id', Auth::user()->id)->first();
        $trip->driver_id = $driver->id;
        $driver->status = 2; //in trip
        $driver->save();
        $notification = DriverNotification::where('driver_id', $driver->id)->where('status', 'pending')->first();
        $notification->status = 'approved';
        $notification->update();
        $trip->user_id = $notification->user_id;
        $trip->notification_id = $notification->id;
        $trip->ambulamce_fare_id = 1;
        $trip->driver_source_longitude = $request->driver_source_longitude;
        $trip->driver_source_latitude = $request->driver_source_latitude;
        $trip->status = 1; // status for driver has involved in trip
        $saved = $trip->save();
        if ($saved) {
            $notification_id = $request->notification_id;
            $title = "Driver Accepted Request";
            $body = "Driver Is On The Way";
            $status = $request->status;
            send_ambulance_notification($notification_id, $title, $body, $status);
        }
        return response()->json(["message" => "trip added"]);
    }

    public function driverArrived(Request $request, $id)
    {
        $trip =  Trip::find($id);
        $trip->status = 2; // driver has arrived status
        $saved = $trip->save();
        if ($saved) {
            $driver = Driver::where('id', $request->driver_id)->first();
            $user = StoreToken::where('user_id', $driver->driver_id)->first();
            $notification_id = $user->device_key;
            $title = "Driver Has Arrived";
            $body = "Driver Is On The Location";
            $status = $request->status;
            send_ambulance_notification($notification_id, $title, $body, $status);
        }
        return response()->json(["message" => "Driver Has Arrived"]);
    }

    public function driverFinishedTrip(Request $request, $id)
    {
        $trip =  Trip::find($id);
        $trip->status = 4; // driver has finished and trip
        $saved = $trip->save();
        if ($saved) {
            $user = Member::where('member_id', auth()->user()->id)->first();
            $user = StoreToken::where('user_id', $user->user_id)->first();
            $notification_id = $user->device_key;
            $title = "Trip Finished Trip";
            $body = "User Has Finished An Trip";
            $status = $request->status;
            send_ambulance_notification($notification_id, $title, $body, $status);
        }
        return response()->json(["message" => "User Has Finished an trip"]);
    }
    public function userFinishedTrip(Request $request, $id)
    {
        $trip =  Trip::find($id);
        $trip->status = 4; // user has finished and trip
        $saved = $trip->save();
        if ($saved) {
            $driver = Driver::where('driver_id', auth()->user()->id)->first();
            $user = StoreToken::where('user_id', $driver->driver_id)->first();
            $notification_id = $user->device_key;
            $title = "Driver Has Arrived";
            $body = "Driver Is On The Location";
            $status = $request->status;
            send_ambulance_notification($notification_id, $title, $body, $status);
        }
        return response()->json(["message" => "User Has Finished an trip"]);
    }

    public function finishTrip($id)
    {
        $trip =  Trip::find($id);
        $trip->end_time = Carbon::now();
        $trip->status = 3; //driver has finished a trip status
        $trip->save();
        $driver = Driver::where('driver_id', $trip->driver_id)->first();
        $driver->status = 1;  //free
        $driver->save();
        return response()->json(["message" => "trip finished"]);
    }

    public function updateDriverLocation(Request $request, $id)
    {
        $driver = Driver::where('driver_id', $id)->first();
        $notification_id = $request->notification_id;
        $driver->latitude = $request->latitude;
        $driver->longitude = $request->longitude;
        $time = Carbon::now()->toDateTimeString();
        postDriverLocation($notification_id, $request->latitude, $request->longitude, $time);
        $driver->update();
        return response()->json(["message" => "driver location updated"]);
    }

    public function updateDriverStatus($id)
    {
        $driver = Driver::where('driver_id', $id)->first();
        $driver->activeStatus == 1 ? $driver->activeStatus = 0 : $driver->activeStatus = 1;
        $driver->update();
        return response()->json(["message" => "driver active status updated "]);
    }

    public function driverNotification(Request $request)
    {
        $bookingNotification = new DriverNotification();
        $user = Member::where('member_id', auth()->user()->id)->with('user')->first();
        $bookingNotification->user_id = $user->id;
        $bookingNotification->driver_id = $request->driver_id;
        $bookingNotification->pick_up_longitude = $request->pick_up_longitude;
        $bookingNotification->pick_up_latitude = $request->pick_up_latitude;
        $bookingNotification->distance = $request->distance;
        $bookingNotification->price = $request->price;
        $bookingNotification->title = "Driver Booked Notification ";
        $bookingNotification->body = "Your have been booked by " . $user->user->name . " " . "on" . " " . $user->user->created_at->format('Y-m-d');
        $bookingNotification->save();
        return response()->json($bookingNotification);
    }

    public function getdriverNotification()
    {
        $driver = Driver::where('driver_id', Auth::user()->id)->first();
        $driverNotification = DriverNotification::with('user_profile.user')->where('driver_id', $driver->id)->first();
        $user_id = Member::where('id', $driverNotification->user_id)->first();
        $token = StoreToken::where('user_id', $user_id->member_id)->first();
        if ($driverNotification) {
            return response()->json(["driver_details" => $driverNotification, "fcm" => $token]);
        } else {
            return response()->json([]);
        }
    }
    public function getUserNotification()
    {
        $user = Member::where('member_id', Auth::user()->id)->first();
        $driverNotification = DriverNotification::with('driver_profile.driver')->where('user_id', $user->id)->first();
        if ($driverNotification) {
            return response()->json(["user_details" => $driverNotification]);
        } else {
            return response()->json([]);
        }
    }

    public function getMedicalAssistance()
    {
        $medicalSupport = MedicalSupport::all();
        return response()->json($medicalSupport);
    }

    public function storeBookingDetails(Request $request)
    {
        //         $args = http_build_query(array(
        //     'token' => $request->input('token'),
        //     'payment_amount' => $request->input('payment_amount')
        // ));
        // $url = 'https://khalti.com/api/v2/payment/verify/';
        // // # Make the call using API.
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $key = getenv('KHALTI_API_SECRET');
        // $headers = ['Authorization: Key ' . $key];
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // // Response
        // $response = curl_exec($ch);
        // $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // curl_close($ch);
        // $res = json_decode($response, true);
        // //return $res;

        // if (isset($res['idx'])) {
        $trip =  Trip::find($request->input('id'));
        $trip->patient_name = $request->patient_name;
        $trip->patient_number = $request->patient_number;
        $trip->visitor_name = $request->visitor_name;
        $trip->visitor_number = $request->visitor_number;
        $trip->total_km_covered = $request->total_km_covered;
        $trip->total_time_consumed = $request->total_time_consumed;
        $trip->medical_support = $request->medical_support;
        $trip->payment_date = Carbon::now();
        $trip->payment_method = $request->payment_method;
        $trip->payment_amount = $request->payment_amount;
        $trip->destination_longitude = $request->destination_longitude;
        $trip->destination_latitude = $request->destination_latitude;
        $trip->update();
        // }
        return response()->json(['success' => 'Form Submitted Sucessfully']);
    }

    public function extendsTrip(Request $request, $id)
    {
        //$args = http_build_query(array(
        //     'token' => $request->input('token'),
        //     'extended_payment_amount' => $request->input('extended_payment_amount')
        // ));
        // $url = 'https://khalti.com/api/v2/payment/verify/';
        // // # Make the call using API.
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $key = getenv('KHALTI_API_SECRET');
        // $headers = ['Authorization: Key ' . $key];
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // // Response
        // $response = curl_exec($ch);
        // $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // curl_close($ch);
        // $res = json_decode($response, true);
        // //return $res;

        // if (isset($res['idx'])) {
        $trip =  Trip::findOrFail($request->input('id'));
        $trip->extended_total_km_covered = $request->extended_total_km_covered;
        $trip->extended_total_time_consumed = $request->extended_total_time_consumed;
        $trip->extended_longitude = $request->extended_longitude;
        $trip->extended_latitude = $request->extended_latitude;
        $trip->extended_payment_method = $request->extended_payment_method;
        $trip->extended_payment_amount = $request->extended_payment_amount;
        $saved = $trip->update();
        // }
        if ($saved) {
            return response()->json(['success' => 'Trip Extended Sucessfully']);
        }
    }

    public function hospitalization(Request $request, $id)
    {
        $trip =  Trip::find($id);
        $trip->hospital_name = $request->hospital_name;
        $trip->doctor_name = $request->doctor_name;
        if ($request->hospitalization_file) {
            $image = $request->hospitalization_file;
            if(env('STORAGE_TYPE') == 'minio'){
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath); 
                $trip->hospitalization_file_path = $imageUpload['path'];
                $trip->hospitalization_file = $imageUpload['file'];
            }else{
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image,$folderPath);                    
                $trip->hospitalization_file_path = $imageUpload['path'];
                $trip->hospitalization_file = $imageUpload['file'];
            }
        }
        $trip->update();
        return response()->json(["message" => "hopitalization form filled"]);
    }
}
