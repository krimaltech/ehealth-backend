<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Models\InsuranceClaim;
use App\Models\InsuranceDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class InsuranceClaimController extends Controller
{
    protected $random;

    public function __construct()
	{
		$this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("26"))) {
            $insuranceClaim = InsuranceClaim::with(['user','claim','insurance.insurancetype'])->where('claiming_user_id',null)->get();
            return view('admin.latestInsurance.insuranceclaim.index',compact('insuranceClaim'));
        } else {

            return view('viewnotfound');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InsuranceClaim  $insuranceClaim
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (Gate::any(checkPermission("26"))) {
            $insuranceClaim = InsuranceClaim::with('user')->where('slug',$slug)->first();
            return view('admin.latestInsurance.insuranceclaim.show',compact('insuranceClaim'));
        } else {

            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InsuranceClaim  $insuranceClaim
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $insuranceClaim = InsuranceClaim::where('slug',$slug)->first();
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $insuranceClaim->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $insuranceClaim->image = $images[0];
                $insuranceClaim->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $insuranceClaim->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $insuranceClaim->image = $images[0];
                $insuranceClaim->image_path = $images[1];
            }
        }
        $name = str_replace(' ', '-', $insuranceClaim->insurance->insurance_type);
        $insuranceClaim->slug = 'insurance-claim-'.$name.'-'.$this->random;
        $saved = $insuranceClaim->save();
        if($saved){
            return redirect()->route('insuranceclaim.index')->with('success','Insurance Claimed Successfully');
        }
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
                // $claimedInsurance = InsuranceDetails::where('user_id',$insuranceClaim->user_id)->first();
                // if ($insuranceClaim->insurance->insurance_type == 1) {
                //     $claimedInsurance->accidental_death = $claimedInsurance->accidental_death - $insuranceClaim->claim_amount;
                //     $claimedInsurance->total_insurance_amount = $claimedInsurance->total_insurance_amount - $insuranceClaim->claim_amount;
                //     $claimedInsurance->save();
                // }
                // if ($insuranceClaim->insurance->insurance_type == 2) {
                //     $claimedInsurance->accidental_disability = $claimedInsurance->accidental_disability - $insuranceClaim->claim_amount;
                //     $claimedInsurance->total_insurance_amount = $claimedInsurance->total_insurance_amount - $insuranceClaim->claim_amount;
                //     $claimedInsurance->save();
                // }
                // if ($insuranceClaim->insurance->insurance_type == 3) {
                //     $claimedInsurance->critical_illness = $claimedInsurance->critical_illness - $insuranceClaim->claim_amount;
                //     $claimedInsurance->total_insurance_amount =  $claimedInsurance->total_insurance_amount-$insuranceClaim->claim_amount;
                //     $claimedInsurance->save();
                // }
                // if ($insuranceClaim->insurance->insurance_type == 4) {
                //     $claimedInsurance->accidental_medicine_reimbursement = $claimedInsurance->accidental_medicine_reimbursement - $insuranceClaim->claim_amount;
                //     $claimedInsurance->total_insurance_amount = $claimedInsurance->total_insurance_amount - $insuranceClaim->claim_amount;
                //     $claimedInsurance->save();
                // }
                // if ($insuranceClaim->insurance->insurance_type == 5) {
                //     $claimedInsurance->accidental_weekly_indeminity = $claimedInsurance->accidental_weekly_indeminity - $insuranceClaim->claim_amount;
                //     $claimedInsurance->total_insurance_amount = $claimedInsurance->total_insurance_amount - $insuranceClaim->claim_amount;
                //     $claimedInsurance->save();
                // }
                // if ($insuranceClaim->insurance->insurance_type == 6) {
                //     $claimedInsurance->medical_opd_and_ins$insuranceClaimization = $claimedInsurance->medical_opd_and_ins$insuranceClaimization - $insuranceClaim->claim_amount;
                //     $claimedInsurance->total_insurance_amount = $insuranceClaim->claim_amount - $claimedInsurance->total_insurance_amount;
                //     $claimedInsurance->save();
                // }
                // if ($insuranceClaim->insurance->insurance_type == 7) {
                //     $claimedInsurance->funeral_and_dead_body_management = $claimedInsurance->funeral_and_dead_body_management - $insuranceClaim->claim_amount;
                //     $claimedInsurance->total_insurance_amount = $claimedInsurance->total_insurance_amount - $insuranceClaim->claim_amount;
                //     $claimedInsurance->save();
                // }
            }
            if ($insuranceClaim->insurance_status == 'Rejected') {
                $insuranceClaim->rejected_date = Carbon::now();
            }
            $insuranceClaim->save();
            return redirect()->route('insuranceclaim.index')->with('success','Status changed Successfully');
        } else {

            return view('viewnotfound');
        }
    }
}
