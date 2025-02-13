<?php
namespace App\Http\Controllers;

use App\Models\StoreToken;
use Illuminate\Http\Request;
class WebNotificationController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('home');
    }
  
    public function storeToken(Request $request)
    {
        $token = new StoreToken();
        $token->user_id = auth()->user()->id;
        $token->device_key = $request->token;
        $token->save();
        return response()->json(['Token successfully stored.']);
    }
  
    public function sendWebNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = StoreToken::whereNotNull('device_key')->pluck('device_key')->all();
          
        $serverKey = 'AAAAjLfxEKI:APA91bEoPP6wJ5TktNRK79frJ-4wDZeyhhoXbbEiBZiHbkOmwY8-H9EzP3dGElHp7QJ0xqqqdWQUyiDUqdu5VfFJB2YT4gd--eFYiMxuO75ycUv_8CfBp8wCAXDDRQPcAYD9CDR8LuGH';
  
        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,  
            ]
        ];
        $encodedData = json_encode($data);
    
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        // Disabling SSL Certificate support temporarly
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);        
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);
        // Execute post
        $result = curl_exec($ch);
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }        
        // Close connection
        curl_close($ch);
        // FCM response    
        return $result;
    }
}