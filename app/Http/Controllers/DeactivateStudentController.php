<?php

namespace App\Http\Controllers;

use App\Models\DeactivateStudent;
use App\Models\Family;
use App\Models\FamilyName;
use App\Models\Member;
use App\Models\PackageFee;
use App\Models\StoreToken;
use App\Models\User;
use App\Models\UserPackage;
use Illuminate\Http\Request;

class DeactivateStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deactivate = DeactivateStudent::orderBY('created_at','desc')->with(['profile','students'])->withCount('students')->get();
        return view('admin.deactivate.index',compact('deactivate'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $deactivate = DeactivateStudent::with(['profile','students'])->find($request->deactivate);
        $studentIds = $deactivate->students->pluck('user_id');
        $users = User::whereIn('id',$studentIds)->get();
        $members =  Member::whereIn('member_id',$studentIds)->get();
        $memberIds = $members->pluck('id');
        $families = Family::whereIn('member_id',$memberIds)->get();
        foreach($users as $data){
            $data->is_verified = 0;
            $data->update();
        }
        foreach($members as $member){
            $member->member_type = null;
            $member->update();
        }
        foreach($families as $family){
            $family->delete();
        }

        $deactivate->status = 1;
        $deactivate->update();

        $familyname = FamilyName::where('primary_member_id',$deactivate->profile->member_id)->first();
        $userpackage = UserPackage::where('familyname_id',$familyname->id)->with('familyname')->latest()->first();
        if($userpackage != null && $userpackage->package_status == 'Not Booked'){
            $primaryId = $userpackage->familyname->primary_member_id;
            $family_size = Family::where('family_id',$familyname->id)->where('approved',1)->where('payment_status',1)->count();        
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

        return redirect()->back()->with('success','Student Deactivation Request Approved.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeactivateStudent  $deactivateStudent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $deactivate = DeactivateStudent::with(['profile','students'])->withCount('students')->find($id);
        return view('admin.deactivate.show',compact('deactivate'));
    }

    public function reject(Request $request,$id){
        $request->validate([
            'reject_reason' => 'required',
        ]);
        $deactivate = DeactivateStudent::find($id);
        $deactivate->status = 2;
        $deactivate->reject_reason = $request->reject_reason;
        $updated = $deactivate->update();
        if($updated){
            return redirect()->back()->with('success','Student Deactivation Request Rejected.');
        }
    }
}
