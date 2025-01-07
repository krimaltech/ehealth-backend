<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\InsuranceDetails;
use App\Models\Member;
use App\Models\PackageFee;
use App\Models\PackageInsuranceDetail;
use App\Models\RemoveFamilyRequest;
use App\Models\StoreToken;
use App\Models\UserPackage;
use Illuminate\Http\Request;

class RemoveFamilyRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $remove = RemoveFamilyRequest::with(['family.primary.user','member.user'])->get();
        return view('admin.removerequest.index',compact('remove'));
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
     * @param  \App\Models\RemoveFamilyRequest  $removeFamilyRequest
     * @return \Illuminate\Http\Response
     */
    public function show(RemoveFamilyRequest $removeFamilyRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RemoveFamilyRequest  $removeFamilyRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(RemoveFamilyRequest $removeFamilyRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RemoveFamilyRequest  $removeFamilyRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RemoveFamilyRequest $removeFamilyRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RemoveFamilyRequest  $removeFamilyRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(RemoveFamilyRequest $removeFamilyRequest)
    {
        //
    }

    public function approve($id){
        $remove = RemoveFamilyRequest::find($id);
        $member = Member::find($remove->member_id);
        $member->member_type = null;
        $member->update();
        
        $userpackage = UserPackage::where('familyname_id',$remove->family_id)->with('familyname')->latest()->first();
        $family = Family::where('family_id',$remove->family_id)->where('member_id',$remove->member_id)->first();
        if($family->additional_status == 1){
            if($userpackage != null){
                $userpackage->additonal_members = $userpackage->additonal_members - 1;
                $userpackage->update();
            }
        }
        $family->delete();

        if($userpackage != null && $userpackage->package_status == 'Not Booked'){
            $primaryId = $userpackage->familyname->primary_member_id;
            $family_size = Family::where('family_id',$remove->family_id)->where('approved',1)->where('payment_status',1)->count() + 1;        
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

        $remove->status = 1;
        $approved = $remove->update();
        if($approved){
            return redirect()->back()->with('success','Remove Request Approved.');
        }
    }

    public function reject(Request $request,$id){
        $remove = RemoveFamilyRequest::find($id);
        $remove->status = 2;
        $remove->reject_reason = $request->reject_reason;
        $rejected = $remove->update();
        if($rejected){
            return redirect()->back()->with('success','Remove Request Rejected.');
        }
    }
}
