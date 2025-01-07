<?php

namespace App\Http\Controllers;

use App\Mail\ReferFriends;
use App\Models\Referral;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class ReferralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(['Admin','Employee','RO'])) {
            if (auth()->user()->id==2) {
                $referral = Referral::with('refferal')->get();
            } else {
                $referral = Referral::where('gd_id',auth()->user()->id)->get();
            }
            
            return view('admin.referral.index',compact('referral'));
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
        if (Gate::any(['Admin','Employee','RO'])) {
            return view('admin.referral.create');
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
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'referral_email' => 'required|unique:referrals',
        ]);
        $referral = new Referral();
        $referral->first_name = $request->first_name;
        $referral->last_name = $request->last_name;
        $referral->address = $request->address;
        $referral->referral_email = $request->referral_email;
        $referral->gd_id = auth()->user()->id;
        $referral->email = auth()->user()->email;
        $referral->phone = $request->phone;
        $referral->status = "new member";
        $refer = [
            "name" => $request->first_name,
            "mobile_url" => "https://ghargharmadoctor.page.link/registerPage" . "?" . "referrer_id=" . $request->referral_email."&" . "phone=" . $request->phone,
            "web_url" => env('REACT_URL'). "?" . "referrer_id=" . $request->referral_email."&" . "phone=" . $request->phone
        ];
        $checkphone = User::where('phone', $request->phone)->first();
        if ($checkphone) {
            $referral->status = "existing member";
            $referral->save();
            return redirect()->route('referral.create')->withErrors('Duplicate Phone Appeared');
        }
        $check = User::where('email', $request->referral_email)->first();
        if ($check) {
            $referral->status = "existing member";
            $referral->save();
            return redirect()->route('referral.create')->withErrors('Duplicate Email Appeared');
        }
        Mail::to($request->referral_email)->send(new ReferFriends($refer));
        send_sms($request->phone,"You Have Been Referred To Sign In To Join GD"." ".env('REACT_URL') . "?" . "referrer_id=" . $request->referral_email."&" . "phone=" . $request->phone);
        $saved = $referral->save();
        if($saved){
            return redirect()->route('referral.index')->with('success','Referral Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function show(Referral $referral)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function edit(Referral $referral, $id)
    {
        if (Gate::any(['Admin','Employee'])) {
            $referral = Referral::findOrFail($id);
            return view('admin.referral.edit',compact('referral'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Referral $referral, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'referral_email' => 'required',
        ]);

        $referral = Referral::findOrFail($id);
        $referral->first_name = $request->first_name;
        $referral->last_name = $request->last_name;
        $referral->address = $request->address;
        $referral->referral_email = $request->referral_email;
        $referral->gd_id = $request->gd_id;
        $referral->email = $request->email;
        $saved = $referral->save();
        if($saved){
            return redirect()->route('referral.index')->with('success','Referral Added Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Referral  $referral
     * @return \Illuminate\Http\Response
     */
    public function destroy(Referral $referral)
    {
        //
    }
}
