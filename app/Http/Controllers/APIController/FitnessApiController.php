<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\FitnessBooking;
use App\Models\FitnessPricing;
use App\Models\FitnessType;
use App\Models\Member;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FitnessApiController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }
    public function fitnessCategory()
    {
        $fitness = FitnessType::where('vendor_id', auth()->user()->id)->get();
        return response()->json($fitness);
    }

    public function fitnessPricing(Request $request)
    {
        $vendor_id = $request->vendor_id;
        if($vendor_id)
        {
            $fitness = FitnessPricing::where('vendor_id', $vendor_id)->with('fitnesstype')->get();
        }else
        {
            $fitness = FitnessPricing::with('fitnesstype')->get();
        }
        return response()->json($fitness);
    }

    public function getFitnessBooking()
    {
        $id = auth()->user()->id;
        $user = Member::with('user')->where('member_id', $id)->first();
        $fitness = FitnessBooking::where('user_id', $user->id)->with('fitnessprice.fitnesstype')->get();
        return response()->json($fitness);
    }

    public function fitnessBooking(Request $request)
    {
        $id = auth()->user()->id;
        $user = Member::where('member_id', $id)->first();
        $fitness = new FitnessBooking();
        $fitness->user_id = $user->id;
        $fitness->slug = Carbon::now().$this->random;
        $fitness->booking_date = Carbon::now();
        $fitness->membership_type = $request->membership_type;
        $fitness->joining_date = $request->joining_date;
        $fitness->end_of_membership_date = Carbon::now();
        $fitness->total_amount = $request->total_amount;
        $fitness->payment_method = 'Khalti';
        $fitness->payment_status = 'unpaid';
        $fitness->status = 'pending';
        $fitness->save();
        return response()->json($fitness);
    }

    public function fitnessPayment(Request $request)
    {
        if($request->token){
            //payment verification (app)
            $khaltiVerify = Helper::khaltiVerify($request);
            if (isset($khaltiVerify['idx'])) {
                $fitness = FitnessBooking::find($request->input('id'));
                $fitness->payment_date = Carbon::now();
                $fitness->payment_method = 'Khalti';
                $fitness->payment_status = 'paid';
                $fitness->status = 'joined';
                $fitness->total_amount = $request->total_amount;
                $fitness->update();

                return response()->json([
                    'success' => 'Fitness Amount Paid Successfully.',
                ]);
            } else {
                return response()->json([
                    'error' => 'Something went Wrong.',
                ]);
            }
        }else{
            //payment verification (web)
            $khaltiLookup = Helper::khaltiLookup($request->pidx);
            $responseData = $khaltiLookup->getData();
            if(isset($responseData->status) && $responseData->status === 'Completed'){
                $fitness = FitnessBooking::find($request->input('id'));
                $fitness->payment_date = Carbon::now();
                $fitness->payment_method = 'Khalti';
                $fitness->payment_status = 'paid';
                $fitness->status = 'joined';
                $fitness->total_amount = $request->total_amount;
                $fitness->update();

                return response()->json([
                    'success' => 'Fitness Amount Paid Successfully.',
                ]);
            } else {
                return response()->json([
                    'error' => 'Payment Pending.',
                ],400);
            }
        }
    }
}
