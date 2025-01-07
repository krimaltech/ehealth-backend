<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Mail\ContactInformationMail;
use App\Models\BookingNotification;
use App\Models\ContactInformation;
use App\Models\StoreToken;
use App\Models\TopicBasedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class NotificationApiController extends Controller
{
    public function store(Request $request)
    {
        $auth = auth()->user();
        DB::table('storetoken')->where('user_id', $auth->id)->delete();
        $token = new StoreToken();
        $token->user_id = auth()->user()->id;
        $token->device_key = $request->device_key;
        $token->platform = $request->platform;
        $token->save();
        return response()->json(['message' => 'Token successfully stored.']);
    }

    public function store_topic_wise_fcm(Request $request)
    {
        TopicBasedNotification::where('device_key', $request->device_key)->delete();
        $token = new TopicBasedNotification();
        $token->device_key = $request->device_key;
        $token->save();
        return response()->json(['message' => 'Token successfully stored.']);
    }

    public function sendWebNotification(){
        $user = StoreToken::where('user_id',auth()->user()->id)->first();
        $notification_id = $user->device_key;
        $title = "Greeting Notification";
        $message = "Have a good day!";
        $type = "Notification";
        $res = send_notification_FCM($notification_id, $title, $message,$type);
        return $res;
        
     }
    public function bookingNotification(Request $request)
    {
        $user = Auth::user()->id;
        $type = $request->type;
        $bookingNotification = BookingNotification::where('user_id', $user)->where('type',$type)->get();
        return $bookingNotification;
    }

    public function notification_view($type, $id){
        $notification= BookingNotification::where([['type',$type],['id',$id]])->firstOrFail();
        $notification->watched='seen';
        $notification->update();
        return response()->json(["status" => "true","notification" => $notification]);
    }

    public function contact_information(Request $request){
        $notification = new ContactInformation();
        $notification->first_name = $request->first_name;
        $notification->last_name = $request->last_name;
        $notification->phone = $request->phone;
        $notification->email = $request->email;
        $notification->subject = $request->subject;
        $notification->message = $request->message;
        $notification->save();
        $data = [
            'first_name' => $notification->first_name,
            'last_name' => $notification->last_name,
            'phone' => $notification->phone,
            'email' => $notification->email,
            'subject' => $notification->subject,
            'message' => $notification->message,
        ];
        Mail::to('info@ghargharmadoctor.com')->send(new ContactInformationMail($data));//info@ghargharmadoctor.com
        return response()->json(["status" => "true","notification" => $notification]);
    }
}
