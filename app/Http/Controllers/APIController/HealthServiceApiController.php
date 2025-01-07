<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\BookService;
use App\Models\BookServiceTest;
use App\Models\Member;
use App\Models\Service;
use App\Models\ServiceReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HealthServiceApiController extends Controller
{
    public function index(){
        $service = Service::with('tests')->get();
        return response()->json($service);
    }

    public function bookService(Request $request){
        $service = new BookService();
        $member = Member::where('member_id',Auth::user()->id)->first();
        $service->member_id = $member->id;
        $service->service_id = $request->service_id;
        $service->date = $request->date;
        $service->time = Carbon::createFromFormat('H:i',$request->time)->format('g:i A');
        if($request->status == 0){
            $service->status = 0;
            $service->booking_status = 'Not Scheduled';
        }
        if($request->status == 1){
            $service->status = 1;
            $service->booking_status = 'Scheduled';
        }
        $service->price = $request->price;
        $saved = $service->save();
        if($request->test_id){
            foreach($request->test_id as $testId){
                $test = new BookServiceTest();
                $test->book_service_id = $service->id;
                $test->test_id = $testId;
                $test->save();
            }
        }
        if($saved){
            return response()->json($service);
        }
    }

    public function payment(Request $request)
    {
        // $args = http_build_query(array(
        //     'token' => $request->input('token'),
        //     'amount' => $request->input('amount')
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
            $booking = BookService::find($request->input('id'));
            $booking->status = 1;
            $booking->booking_status = 'Scheduled';
            $booking->payment_method = 'Khalti';
            $booking->payment_date = Carbon::now();
            $booking->update();
            return response()->json([ 
                'success' => 'Lab Test Booked succesfully.',
            ]);
        // } else {
        //     return response()->json([
        //         'error' => 'Something went Wrong.',
        //     ]);
        // }
    }

    public function labTest(Request $request){
        if($request->id){
            $member_id = Member::where('member_id',Auth::user()->id)->pluck('id');
            // $services = BookService::where('member_id',$member_id)->where('id',$request->id)->with('service.tests')->first();
            // $reports = ServiceReport::where('book_id',$services->id)->with('test')->get();
            $services = BookService::where('member_id',$member_id)->where('id',$request->id)->with(['tests.test','labreports.test','service.tests'])->first();
            return response()->json($services);
        }else{
            $member_id = Member::where('member_id',Auth::user()->id)->pluck('id');
            $services = BookService::where('member_id',$member_id)->with('service.tests')->get();
            return response()->json($services);
        }
    }
}
