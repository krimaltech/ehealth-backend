<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\InsuranceDetails;
use App\Models\Member;
use App\Models\MemberLeaveRequest;
use App\Models\PackageFee;
use App\Models\PackageInsuranceDetail;
use App\Models\StoreToken;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use PDO;

class MemberLeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leave = MemberLeaveRequest::where('status',1)->orWhere('status',3)->orWhere('status',4)->with(['family.primary.user','member.user'])->get();
        //return $leave;
        return view('admin.leaverequest.index',compact('leave'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MemberLeaveRequest  $memberLeaveRequest
     * @return \Illuminate\Http\Response
     */
    public function show(MemberLeaveRequest $memberLeaveRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MemberLeaveRequest  $memberLeaveRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(MemberLeaveRequest $memberLeaveRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MemberLeaveRequest  $memberLeaveRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MemberLeaveRequest $memberLeaveRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MemberLeaveRequest  $memberLeaveRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(MemberLeaveRequest $memberLeaveRequest)
    {
        //
    }

    public function approve($id){
        $leave = MemberLeaveRequest::find($id);
        $member = Member::find($leave->member_id);
        $member->member_type = null;
        $member->update();
        
        $userpackage = UserPackage::where('familyname_id',$leave->family_id)->latest()->first();
        $family = Family::where('family_id',$leave->family_id)->where('member_id',$leave->member_id)->first();
        if($family->additional_status == 1){
            if($userpackage != null){
                $userpackage->additonal_members = $userpackage->additonal_members - 1;
                $userpackage->update();
            }
        }
        $family->delete();

        if($userpackage != null && $userpackage->package_status == 'Not Booked'){
            $primaryId = $userpackage->familyname->primary_member_id;
            $family_size = Family::where('family_id',$leave->family_id)->where('approved',1)->where('payment_status',1)->count() + 1;        
            $packagefee = PackageFee::where('package_id',$userpackage->package_id)->where('family_size',$family_size)->first();
            if($packagefee == null){
                $userpackage->delete();
                $primaryMember = Member::with('user')->find($primaryId);
                $user = StoreToken::where('user_id', $primaryMember->member_id)->first();
                if ($user) {
                    $notification_id = $user->device_key;
                    $title = "Package Notification ";
                    $message = "Your booked package has been discarded as your family size has decreased more than the user package limit.";
                    $type = "Package Discard";
                    send_notification_FCM($notification_id, $title, $message, $type);
                }
            }else{
                $userpackage->family_id = $packagefee->id;
                $userpackage->update();
            }
        }

        $insurance = PackageInsuranceDetail::where('user_id',$member->member_id)->first();
        if($insurance != null){
            $insurance->delete();
        }

        $leave->status = 3;
        $approved = $leave->update();
        if($approved){
            return redirect()->back()->with('success','Leave Request Approved.');
        }
    }

    public function reject(Request $request,$id){
        $leave = MemberLeaveRequest::find($id);
        $leave->status = 4;
        $leave->reject_reason = $request->reject_reason;
        $rejected = $leave->update();
        if($rejected){
            return redirect()->back()->with('success','Leave Request Rejected.');
        }
    }
}
