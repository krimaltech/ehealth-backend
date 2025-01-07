<?php

namespace App\Http\Controllers;

use App\Models\InsuranceClaim;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeathInsuranceClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("26"))) {
            $insuranceClaim = InsuranceClaim::with('insurance.insurancetype')->where('claiming_user_id','!=',null)->get();
            return view('admin.latestInsurance.deathinsuranceclaim.index',compact('insuranceClaim'));
        } else {

            return view('viewnotfound');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (Gate::any(checkPermission("26"))) {
            $insuranceClaim = InsuranceClaim::with('user')->where('slug',$slug)->first();
            return view('admin.latestInsurance.deathinsuranceclaim.show',compact('insuranceClaim'));
        } else {

            return view('viewnotfound');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function changeStatus(Request $request, $slug)
    {
        if (Gate::any(checkPermission("26"))) {
            $insuranceClaim = InsuranceClaim::with('insurance')->where('slug',$slug)->first();
            $insuranceClaim->insurance_status = $request->insurance_status;
            if ($insuranceClaim->insurance_status == 'Approved') {
                $insuranceClaim->approved_date = Carbon::now();
            }
            if ($insuranceClaim->insurance_status == 'Claim Settelled') {
                $insuranceClaim->setelled_date = Carbon::now();
            }
            if ($insuranceClaim->insurance_status == 'Rejected') {
                $insuranceClaim->rejected_date = Carbon::now();
            }
            $insuranceClaim->save();
            return redirect()->route('deathinsuranceclaim.index')->with('success','Status changed Successfully');
        } else {

            return view('viewnotfound');
        }
    }
}
