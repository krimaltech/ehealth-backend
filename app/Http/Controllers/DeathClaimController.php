<?php

namespace App\Http\Controllers;

use App\Models\DeathClaim;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeathClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("26"))) {
            $insuranceClaim = DeathClaim::with('insurance')->get();
            return view('admin.latestInsurance.deathClaim.index',compact('insuranceClaim'));
        } else {
            return view('viewnotfound');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeathClaim  $deathClaim
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::any(checkPermission("26"))) {
            $insuranceClaim = DeathClaim::with('user')->find($id);
            return view('admin.latestInsurance.deathClaim.show',compact('insuranceClaim'));
        } else {
            return view('viewnotfound');
        }
    }


    public function changeStatus(Request $request, $id)
    {
        if (Gate::any(checkPermission("26"))) {
            $insuranceClaim = DeathClaim::with('insurance')->find($id);
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
            return redirect()->route('deathclaim.index')->with('success','Status changed Successfully');
        } else {
            return view('viewnotfound');
        }
    }
}
