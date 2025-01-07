<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\BookingReview;
use App\Models\BookService;
use Illuminate\Http\Request;

class PaymentApiController extends Controller
{
    public function verify(Request $request)
    {
        //hit the khalit server
        $args = http_build_query(array(
        'token' => $request->input('token'),
        'amount' => $request->input('amount')
        ));
        $url = 'https://khalti.com/api/v2/payment/verify/';
        // # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $key = getenv('KHALTI_API_SECRET');
        $headers = ['Authorization: Key '.$key];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $res = json_decode($response, true);
        //return $res;
        if(isset($res['idx'])) {
            if($request->input('title')=='Appointment'){
                $booking = BookingReview::find($request->input('id'));
                $booking->status = 1;
                $booking->booking_status = 'Scheduled';
                $booking->update();
                return response()->json([ 
                    'success' => 'Your Account is succesfully credited.',
                ]);
            }
            if($request->input('title')=='Service'){
                $booking = BookService::find($request->input('id'));
                $booking->status = 1;
                $booking->booking_status = 'Scheduled';
                $booking->update();
                return response()->json([ 
                    'success' => 'Your Account is succesfully credited.',
                ]);
            }
        }else{
            return response()->json([ 
                'error' => 'Something went Wrong.',
            ]);
        }
    }

    public function initiatePayment(Request $request){
        $response = Helper::initiateKhalti($request);
        return response()->json($response);
    }

}
