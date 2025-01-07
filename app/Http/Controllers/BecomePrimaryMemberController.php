<?php

namespace App\Http\Controllers;

use App\Models\BecomePrimaryMember;
use App\Models\CompanySchoolProfile;
use App\Models\Family;
use App\Models\FamilyName;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;

class BecomePrimaryMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $primary = BecomePrimaryMember::with(['familyname','primary.user','newprimary.user'])->get();
        //return $primary;
        return view('admin.becomePrimary.index',compact('primary'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrimaryMemberRequest  $primaryMemberRequest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $primary = BecomePrimaryMember::with(['familyname','primary.user','newprimary.user'])->find($id);
        return view('admin.becomePrimary.show',compact('primary'));
    }
    
    public function approve($id){
        $primaryrequest = BecomePrimaryMember::find($id);
        $primary = Member::find($primaryrequest->member_id);
        $primary->member_type = 'Dependent Member';
        $primary->update();

        $newprimary = Member::find($primaryrequest->newmember_id);
        $newprimary->member_type = 'Primary Member';
        $newprimary->update();

        
        $profile = CompanySchoolProfile::where('member_id', $primary->id)->first();
        if($profile && $profile->types == 'corporate'){
            $profile->member_id = $newprimary->id;
            $profile->update();

            $primaryUser = User::find($primary->member_id);
            $username = $primaryUser->user_name;
            $newprimaryUser = User::find($newprimary->member_id);
            $newUsername = $newprimaryUser->user_name;
            $primaryUser->user_name = $newUsername;
            $newprimaryUser->user_name = $username;
            $primaryUser->update();
            $newprimaryUser->update();
        }

        $familyname = FamilyName::find($primaryrequest->family_id);
        $consultation =  $familyname->online_consultation;
        $familyname->primary_member_id = $primaryrequest->newmember_id;
        $familyname->update();

        $family = Family::where('family_id',$primaryrequest->family_id)->where('member_id',$primaryrequest->newmember_id)->first();
        $newConsultation = $family->online_consultation;
        $family->member_id = $primaryrequest->member_id;
        $family->family_relation = $primaryrequest->family_relation;
        $family->online_consultation = $consultation;
        $family->update();

        $familyname->online_consultation = $newConsultation;
        $familyname->update();
        
        $primaryrequest->status = 1;
        $approved = $primaryrequest->update();
        if($approved){
            return redirect()->back()->with('success','Approved Successfully.');
        }
    }

    public function reject(Request $request,$id){
        $primary = BecomePrimaryMember::find($id);
        $primary->status = 2;
        $primary->reject_reason = $request->reject_reason;
        $rejected = $primary->update();
        if($rejected){
            return redirect()->back()->with('success','Rejected Successfully.');
        }
    }
}
