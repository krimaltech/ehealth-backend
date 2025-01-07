<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Mail\ReferFriends;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReferralController extends Controller
{
    public function index()
    {
        $referral = Referral::where('gd_id', auth()->user()->id)->get();
        return $referral;
    }

    public function referralFriend(Request $request)
    {
        $request->validate([
            'referral_email' => 'required',
        ]);
        $referral = new Referral();
        $referral->first_name = $request->first_name;
        $referral->last_name = $request->last_name;
        $referral->address = $request->address;
        $referral->referral_email = $request->referral_email;
        $referral->gd_id = $request->gd_id;
        $referral->email = $request->email;
        $referral->phone = $request->phone;
        $referral->status = "new member";

        $refer = [
            "name" => $request->first_name,
            "mobile_url" => "https://ghargharmadoctor.page.link/registerPage" . "?" . "email=" . $request->referral_email."&". $request->phone."&"."full_name=".$request->first_name." ". $request->last_name,
            "web_url" => env('REACT_URL').'/register'. "?" . "email=" . $request->referral_email."&"."phone=".$request->phone."&"."full_name=".$request->first_name." ". $request->last_name
        ];
        $checkphone = User::where('phone', $request->phone)->first();
        if ($checkphone) {
            $referral->status = "existing member";
            $referral->save();
            return response()->json(['message' => 'Duplicate Phone number could not be send.'], 500);
        }
        $check = User::where('email', $request->referral_email)->first();
        if ($check) {
            $referral->status = "existing member";
            $referral->save();
            return response()->json(['message' => 'Duplicate Email could not be send.'], 500);
        }
        Mail::to($request->referral_email)->send(new ReferFriends($refer));
        send_sms($request->phone,"You Have Been Referred To Sign In To Join GD"." ".env('REACT_URL').'/register'. "?" . "email=" . $request->referral_email."&"."phone=".$request->phone."&"."full_name=".$request->first_name." ". $request->last_name);
        $saved = $referral->save();
        if ($saved) {
            return response()->json(['message' => 'Success'], 200);
        }
    }

    public function destroy($id)
    {
        $referral = Referral::findOrFail($id);
        $referral->delete();
        return response(['message' => 'Referral Deleted Successfully'], 200);
    }

    public function referredBy()
    {
        $referral = Referral::with('refferal.subroles')->where('referral_email', auth()->user()->email)->get();
        return $referral;
    }
}
