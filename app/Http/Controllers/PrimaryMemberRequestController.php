<?php

namespace App\Http\Controllers;

use App\Models\CompanySchoolProfile;
use App\Models\Family;
use App\Models\FamilyName;
use App\Models\Member;
use App\Models\PrimaryMemberRequest;
use App\Models\User;
use App\Models\UserPackage;
use Illuminate\Http\Request;

class PrimaryMemberRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $primary = PrimaryMemberRequest::with(['familyname','primary.user','newprimary.user'])->get();
        //return $primary;
        return view('admin.primaryrequest.index',compact('primary'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrimaryMemberRequest  $primaryMemberRequest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $primary = PrimaryMemberRequest::with(['familyname','primary.user','newprimary.user'])->find($id);
        return view('admin.primaryrequest.show',compact('primary'));
    }

    public function approve($id){
        $primaryrequest = PrimaryMemberRequest::find($id);
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
        // $primary = Member::find($request->member_id);
        // $familyname = $primary->family_name;
        // $primary->member_type = 'Dependent Member';
        // $primary->family_name = null;
        // $primary->update();

        // $newprimary = Member::find($request->family_id);
        // $newprimary->member_type = 'Primary Member';
        // $newprimary->family_name = $familyname;
        // $newprimary->update();

        // $family = Family::where('user_id',$request->member_id)->where('family_id',$request->family_id)->first();
        // $family->user_id = $request->family_id;
        // $family->family_id = $request->member_id;
        // $family->update();

        // $families = Family::where('user_id',$request->member_id)->get();
        // foreach($families as $item){
        //     $item->user_id = $request->family_id;
        //     $item->update();
        // }

        // $userpackage = UserPackage::where('member_id',$request->member_id)->get();
        // foreach($userpackage as $item){
        //     $item->member_id = $request->family_id;
        //     $item->update();
        // }

        // $primary = PrimaryMemberRequest::find($id);
        // $primary->status = 1;
        // $approved = $primary->update();
        // if($approved){
        //     return redirect()->back()->with('success','Approved Successfully.');
        // }
    }

    public function reject(Request $request,$id){
        $primary = PrimaryMemberRequest::find($id);
        $primary->status = 2;
        $primary->reject_reason = $request->reject_reason;
        $rejected = $primary->update();
        if($rejected){
            return redirect()->back()->with('success','Rejected Successfully.');
        }
    }
}
