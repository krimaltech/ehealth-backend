<?php

namespace App\Http\Controllers\APIController;

use App\Events\FamilyEvent;
use App\Http\Controllers\Controller;
use App\Models\Family;
use App\Models\FamilyName;
use App\Models\FamilyRequest;
use App\Models\Member;
use App\Models\MemberLeaveRequest;
use App\Models\PackageFee;
use App\Models\PrimaryMemberRequest;
use App\Models\RemoveFamilyRequest;
use App\Models\StoreToken;
use App\Models\User;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FamilyApiController extends Controller
{
    //get family name
    public function family(){
        $member = Member::where('member_id',Auth::user()->id)->first();
        if($member->member_type == 'Primary Member'){
            $family = FamilyName::where('primary_member_id',$member->id)->first();
            return response()->json($family);
        }else{
            $family = Family::where('member_id',$member->id)->with('familyname')->first();
            return response()->json($family);
        }
    }

    public function index()
    {
        $member = Member::where('member_id',Auth::user()->id)->first();
        $family='';
        if($member->member_type == 'Primary Member'){
            $id = $member->id;
            $family = Family::with(['familyname.primary.user','member.user','remove'=>function($query){
                $query->latest();
            }])->whereHas('familyname',function($query) use($id){
                $query->where('primary_member_id',$id);
            })->get();
        }else{
            $family = Family::where('member_id',$member->id)->with(['familyname.primary.user','member.user','leave'=>function($query){
                $query->latest();
            }])->get();
        }
        return response()->json($family);
    }

    //join family request by primary to none type of member
    public function store(Request $request)
    {
        $mem = Member::where('member_id',Auth::user()->id)->first();
        $user = User::where('phone', $request->phone)->first();
        if($user != null){
            if($user->is_verified == 1){
                if($user->id !== Auth::user()->id){
                    $sentToken = StoreToken::where('user_id',Auth::user()->id)->first();
                    $receivedToken = StoreToken::where('user_id',$user->id)->first();
                    $member = Member::where('member_id',$user->id)->first();
                    if($mem->member_type == 'Primary Member'){
                        $familyname = FamilyName::where('primary_member_id',$mem->id)->first();
                        $userpackage = UserPackage::where('familyname_id', $familyname->id)->with('package.fees')->latest()->first();
                        //check the package family limit before sending the request
                        if($userpackage){
                            $fees = $userpackage->package->fees->sortByDesc('family_size')->first();
                            if($fees){
                                if($userpackage->package_id != 10){
                                    $family = Family::where('family_id',$familyname->id)->get()->count() + 1;
                                }else{
                                    $family = Family::where('family_id',$familyname->id)->get()->count();
                                }
                                if($family == $fees->family_size){
                                    return response()->json(['message' => [
                                        'error' => ['Your family size has exceeded the package family limit.']
                                    ]],400);  
                                }
                            }
                        }
                        if($member->member_type == null){
                            $familyrequest = Family::where('family_id',$familyname->id)->where('member_id',$member->id)->where('approved',0)->first();
                            if($familyrequest == null){
                                $family = new Family();
                                $family->family_id = $familyname->id;
                                $family->member_id = $member->id;
                                $family->primary_request = 1;
                                $family->family_relation = $request->family_relation;
                                $family->save();

                                if($sentToken){
                                    addFamilyViaQR($sentToken->device_key,'Request Sent');
                                }
                                if($receivedToken){
                                    addFamilyViaQR($receivedToken->device_key,'Request Received');
                                }
                                return response()->json(['success' => 'Family Request Sent Successfully.']);
                            }else{
                                return response()->json(['message' => [
                                    'error' => ['Request Already Sent.']
                                ]],400);
                            }
                            // cannot send request request primary to primary member
                        }elseif($member->member_type == 'Primary Member'){
                            return response()->json(['message' => [
                                'error' => ['You cannot send family request to this user. This user is already linked with another family.']
                            ]],400);
                            // cannot send request request primary to dependent member
                        }else{
                            return response()->json(['message' => [
                                'error' => ['You cannot send family request to this user. This user is already linked with another family.']
                            ]],400);
                        }
                    }elseif($mem->member_type == null){
                        $userpackage = UserPackage::where('member_id', $mem->id)->with('package.fees')->latest()->first();
                        //check the package family limit before sending the request
                        if($userpackage){
                            $fees = $userpackage->package->fees->sortByDesc('family_size')->first();
                            if($fees){
                                $sentFamily = FamilyRequest::where('sent_id',$mem->id)->get()->count();
                                $receivedfamily = FamilyRequest::where('received_id',$mem->id)->get()->count();
                                if($sentFamily + $receivedfamily + 1 == $fees->family_size){
                                    return response()->json(['message' => [
                                        'error' => ['Your family size has exceeded the package family limit.']
                                    ]],400);  
                                }
                            }
                        }
                        if($member->member_type == null){
                            $userpackage2 = UserPackage::where('member_id', $member->id)->with('package.fees')->latest()->first();
                            //check the package family limit before sending the request
                            if($userpackage2){
                                $fees2 = $userpackage2->package->fees->sortByDesc('family_size')->first();
                                if($fees2){
                                    $sentFamily2 = FamilyRequest::where('sent_id',$member->id)->get()->count();
                                    $receivedfamily2 = FamilyRequest::where('received_id',$member->id)->get()->count();
                                    if($sentFamily2 + $receivedfamily2 + 1 == $fees2->family_size){
                                        return response()->json(['message' => [
                                            'error' => ['The package family limit of the member you sent request to has exceeded.']
                                        ]],400);  
                                    }
                                }
                            }
                            $familyRequest = FamilyRequest::where('sent_id',$mem->id)->where('received_id',$member->id)->where('approved',0)->first();
                            if($familyRequest  == null){
                                $family = new FamilyRequest();
                                $family->sent_id = $mem->id;
                                $family->received_id = $member->id;
                                $family->approved = 0;
                                $family->save();

                                if($sentToken){
                                    addFamilyViaQR($sentToken->device_key,'Request Sent');
                                }
                                if($receivedToken){
                                    addFamilyViaQR($receivedToken->device_key,'Request Received');
                                }
                                return response()->json(['success' => 'Family Request Sent Successfully.']);
                            }else{
                                return response()->json(['message' => [
                                    'error' => ['Request Already Sent.']
                                ]],400);
                            }
                        }elseif($member->member_type == 'Primary Member'){
                            $familyname2 = FamilyName::where('primary_member_id',$member->id)->first();
                            $userpackage2 = UserPackage::where('familyname_id', $familyname2->id)->with('package.fees')->latest()->first();
                            //check the package family limit before sending the request
                            if($userpackage2){
                                $fees2 = $userpackage2->package->fees->sortByDesc('family_size')->first();
                                if($fees2){
                                    if($userpackage2->package_id != 10){
                                        $family2 = Family::where('family_id',$familyname2->id)->get()->count() + 1;
                                    }else{
                                        $family2 = Family::where('family_id',$familyname2->id)->get()->count();
                                    }                                    if($family2 == $fees2->family_size){
                                        return response()->json(['message' => [
                                            'error' => ['The package family limit of the member you sent request to has exceeded.']
                                        ]],400);  
                                    }
                                }
                            }

                            $mem->member_type = 'Dependent Member' ;
                            $mem->save(); 

                            $families = Family::where('member_id',$mem->id)->get();
                            foreach($families as $fam){
                                $fam->delete();
                            }                

                            $receiverequests = FamilyRequest::where('received_id', $mem->id)->get();
                            $sendrequests = FamilyRequest::where('sent_id', $mem->id)->get();
                            foreach($receiverequests as $item){
                                $item->delete();
                            }
                            foreach($sendrequests as $item){
                                $item->delete();
                            }

                            //delete all packages purchased by dependent member
                            $dependentmemberpackage = UserPackage::where('member_id',$mem->id)->get();
                            foreach($dependentmemberpackage as $item){
                                $item->delete();
                            }

                            $familyName = FamilyName::where('primary_member_id',$member->id)->first();
                            $familyRequest = Family::where('family_id',$familyName->id)->where('member_id',$mem->id)->where('approved',0)->first();
                            if($familyRequest == null){
                                $family = new Family();
                                $family->family_id = $familyName->id;
                                $family->member_id = $mem->id;
                                $family->save();
                                if($sentToken){
                                    addFamilyViaQR($sentToken->device_key,'Request Sent');
                                }
                                if($receivedToken){
                                    addFamilyViaQR($receivedToken->device_key,'Request Received');
                                }
                                return response()->json(['success' => 'Family Request Sent Successfully.']);
                            }else{
                                return response()->json(['message' => [
                                    'error' => ['Request Already Sent.']
                                ]],400);
                            }                      
                        }else{
                            return response()->json(['message' => [
                                'error' => ['You cannot send family request to this user. This user is already linked with another family.']
                            ]],400);                        
                        }
                    }elseif($mem->member_type == 'Dependent Member'){
                        return response()->json(['message' => [
                            'error' => ['You cannot send family request to this user. This user is already linked with another family.']
                        ]],400);
                    }
                }else{
                    return response()->json(['message' => [
                        'error' => ['You cannot send family request to yourself.']
                    ]],400);
                }
            }else{
                send_sms($request->phone,'Verify your GD account so that others can connect with you.');
                return response()->json(['message' => [
                    'error' => ['This user is not verified.You cannot send family request to this user.']
                ]],400);
            }
        }else{
            send_sms($request->phone,'Join GD https://react.ghargharmadoctor.com/register');
            return response()->json(['message' => [
                'error' => ['User not registered. An SMS has been sent for registration. Please try again later.']
            ]],400);
        }              
    }

    //approve by primary and dependent
    public function approved(Request $request)
    {
        $id = $request->id;
        $family = Family::find($id);
        $member = Member::where('member_id',Auth::user()->id)->first();
        $userpackage = UserPackage::where('familyname_id', $family->family_id)->latest()->first();
        if($family->primary_request == 0 && $member->member_type == 'Primary Member'){             
            if($userpackage != null ){
                //update family_id (family size) in userpackage if package status is 'Not Booked' in case of additional family members
                if($userpackage->package_status == 'Not Booked'){
                    $family->approved = 1;
                    $family->payment_status = 1;
                    $family->update();
                    $family_members = Family::where('family_id', $family->family_id)->where('approved', 1)->count();
                    $family_size = $family_members + 1;
                    $packagefee = PackageFee::where('package_id', $userpackage->package_id)->where('family_size', $family_size)->first();
                    $userpackage->family_id = $packagefee->id;
                    $userpackage->update();
                    return response()->json([
                        'message' => 'Family Request Approved'
                    ]);
                }
                // if package booked, activated or deactivated,then first make member payment in order to join family
                else if($userpackage->package_status == 'Pending' || $userpackage->package_status == 'Booked' || $userpackage->package_status == 'Activated' ){
                    return response()->json(['message' => 'Payment Due']);
                }
                else if($userpackage->package_status == 'Deactivated'){
                    return response()->json(['message' => 'Deactivated']);
                }
            }else{
                $family->approved = 1;
                $family->payment_status = 1;
                $family->update();
                return response()->json([
                    'message' => 'Family Request Approved'
                ]);
            }
        }
        if($family->primary_request == 1 && $member->member_type == null){
            $member = Member::find($family->member_id);
            $member->member_type = 'Dependent Member' ;
            $member->save();

            //delete all packages purchased by dependent member
            $dependentmemberpackage = UserPackage::where('member_id',$member->id)->get();
            foreach($dependentmemberpackage as $item){
                $item->delete();
            }
               
            if($userpackage != null ){
                if($userpackage->package_status == 'Not Booked'){
                    $family->approved = 1;
                    $family->payment_status = 1;
                    $family->update();
                    //remove other request except this one
                    $families = Family::where('member_id',$family->member_id)->where('id','!=',$id)->get();
                    foreach($families as $fam){
                        $fam->delete();
                    }

                    $receiverequests = FamilyRequest::where('received_id', $member->id)->get();
                    $sendrequests = FamilyRequest::where('sent_id', $member->id)->get();
                    foreach($receiverequests as $item){
                        $item->delete();
                    }
                    foreach($sendrequests as $item){
                        $item->delete();
                    }

                    $family_members = Family::where('family_id', $family->family_id)->where('approved', 1)->where('payment_status',1)->count();
                    $family_size = $family_members + 1;
                    $packagefee = PackageFee::where('package_id', $userpackage->package_id)->where('family_size', $family_size)->first();
                    $userpackage->family_id = $packagefee->id;
                    $userpackage->update();
                    return response()->json([
                        'message' => 'Family Request Approved'
                    ]);
                }
                else if($userpackage->package_status == 'Pending' || $userpackage->package_status == 'Booked' || $userpackage->package_status == 'Activated' || $userpackage->package_status == 'Pending' ){
                    $family->approved = 1;
                    $family->payment_status = 0;
                    $family->update();
                    //remove other request except this one
                    $families = Family::where('member_id',$family->member_id)->where('id','!=',$id)->get();
                    foreach($families as $fam){
                        $fam->delete();
                    }
                    $receiverequests = FamilyRequest::where('received_id', $member->id)->get();
                    $sendrequests = FamilyRequest::where('sent_id', $member->id)->get();
                    foreach($receiverequests as $item){
                        $item->delete();
                    }
                    foreach($sendrequests as $item){
                        $item->delete();
                    }
                    return response()->json([
                        'message' => 'Family Request Approved! But Payment Due.'
                    ]);
                }
                else if($userpackage->package_status == 'Deactivated'){
                    $family->approved = 1;
                    $family->payment_status = 0;
                    $family->update();
                    //remove other request except this one
                    $families = Family::where('member_id',$family->member_id)->where('id','!=',$id)->get();
                    foreach($families as $fam){
                        $fam->delete();
                    }
                    $receiverequests = FamilyRequest::where('received_id', $member->id)->get();
                    $sendrequests = FamilyRequest::where('sent_id', $member->id)->get();
                    foreach($receiverequests as $item){
                        $item->delete();
                    }
                    foreach($sendrequests as $item){
                        $item->delete();
                    }
                    return response()->json([
                        'message' => 'Family Request Approved! But Payment Due.'
                    ]);
                }
            }else{
                $family->approved = 1;
                $family->payment_status = 1;
                $family->update();
                //remove other request except this one
                $families = Family::where('member_id',$family->member_id)->where('id','!=',$id)->get();
                foreach($families as $fam){
                    $fam->delete();
                }

                $receiverequests = FamilyRequest::where('received_id', $member->id)->get();
                $sendrequests = FamilyRequest::where('sent_id', $member->id)->get();
                foreach($receiverequests as $item){
                    $item->delete();
                }
                foreach($sendrequests as $item){
                    $item->delete();
                }

                return response()->json([
                    'message' => 'Family Request Approved'
                ]);
            }
        }
    }

    //reject by primary and dependent(family request)
    public function reject($id){   
        $family = Family::find($id);
        $member = Member::where('member_id',Auth::user()->id)->first();
        if($family->primary_request == 0 && $member->member_type == 'Primary Member'){
            $member = Member::find($family->member_id);
            $member->member_type = null;
            $member->save();
            $family->delete($id); 
            return response()->json([
                'success' => 'Family Request Rejected!'
            ]);
        }
        else{
            $family->delete($id);  
            return response()->json([
                'success' => 'Family Request Rejected!'
            ]);
        }
    }

    //cancel by primary or dependent (family request)
    public function cancel($id){   
        $family = Family::find($id);
        $member = Member::where('member_id',Auth::user()->id)->first();
        if($family->primary_request == 1 && $member->member_type == 'Primary Member'){
            $family->delete($id);  
            return response()->json([
                'success' => 'Family Request Cancelled!'
            ]);
        }else{
            $member = Member::find($family->member_id);
            $member->member_type  = null;
            $member->save();
            $family->delete($id);  
            return response()->json([
                'success' => 'Family Request Cancelled!'
            ]);
        } 
    }

    //remove request by primary
    public function removeRequest(Request $request,$id){   
        $member = Member::where('member_id',Auth::user()->id)->first();
        $familyname = FamilyName::where('primary_member_id',$member->id)->first();
        $family = Family::find($id);
        if($family->family_id == $familyname->id){
            $remove = new RemoveFamilyRequest();
            $remove->member_id = $family->member_id;
            $remove->family_id = $family->family_id;
            $remove->remove_reason = $request->remove_reason;
            $remove->status = 0;
            $saved = $remove->save();
            if($saved){
                return response()->json([
                    'success' => 'Remove Request Made Successfully! Please wait for admin approval.'
                ]);
            }
        }else{
            return response()->json(['message' => [
                'error' => ['Remove Request cannot be made.']
            ]],400);
        }
    }

    //switch primary member request by primary
    public function changePrimary(Request $request){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $family = FamilyName::where('primary_member_id',$member->id)->first();
        $primary = new PrimaryMemberRequest();
        $primary->family_id = $family->id;
        $primary->member_id = $member->id;
        $primary->newmember_id = $request->newmember_id;
        $primary->family_relation = $request->family_relation;
        $primary->change_reason = $request->change_reason;
        $primary->status = 0;
        $saved = $primary->save();
        if($saved){
            return response()->json([
                'success' => 'Change Request Made Successfully! Please wait for admin approval.'
            ]);
        }
    }

    //api to get primary member change list and if already made request cannot make another
    public function changePrimaryList(){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $change = PrimaryMemberRequest::where('member_id',$member->id)->where('status',0)->with(['familyname','primary','newprimary.user'])->latest()->first();
        return response()->json($change);
    }

    //get all family leave request by primary
    public function viewLeaveRequest(){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $leave = [];
        if($member->member_type == 'Primary Member'){
            $familyId = FamilyName::where('primary_member_id',$member->id)->first()->id;
            $leave = MemberLeaveRequest::where('family_id',$familyId)->with('member.user')->get();
            return response()->json($leave);
        }elseif($member->member_type == 'Dependent Member'){
            $familyId = Family::where('member_id',$member->id)->where('approved',1)->first();
            $leave = MemberLeaveRequest::where('family_id',$familyId)->where('member_id',$member->id)->with('member.user')->latest()->first();
            return response()->json($leave);
        }else{
            return response()->json($leave);
        }
    }

    //leave request by dependent member
    public function leaveRequest(Request $request){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $family = Family::where('member_id',$member->id)->first();
        $leave = new MemberLeaveRequest();
        $leave->family_id = $family->family_id;
        $leave->member_id = $member->id;
        $leave->leave_reason = $request->leave_reason;
        $leave->status = 0;
        $saved = $leave->save();
        if($saved){
            return response()->json([
                'success' => 'Leave Request Made Successfully! Please wait for primary member approval.'
            ]);
        }
    }

    //approve leave request by primary member
    public function approveLeaveRequest(Request $request){
        $leaveid = $request->id;
        $leave = MemberLeaveRequest::find($leaveid);
        $leave->status = 1;
        $approved = $leave->update();
        if($approved){
            return response()->json([
                'success' => 'Leave Request Approved! Please wait for admin approval.'
            ]);
        }
    }

    //reject leave request by primary member
    public function rejectLeaveRequest(Request $request,$id){
        $leave = MemberLeaveRequest::find($id);
        $leave->status = 2;
        $leave->reject_reason = $request->reject_reason;
        $rejected = $leave->update();
        if($rejected){
            return response()->json([
                'success' => 'Leave Request Rejected!'
            ]);
        }
    }
    //add family relation by primary member
    public function addRelation(Request $request,$id){
        $family = Family::find($id);
        $family->family_relation = $request->family_relation;
        $saved = $family->update();
        if($saved){
            return response()->json([
                'success' => 'Family Relation Added!'
            ]);
        }
    }

    public function myRequest(){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $familyrequest = FamilyRequest::where('sent_id',$member->id)->with(['sendmember.user','receivemember.user'])->where('approved',0)->get();
        return response()->json($familyrequest);
    }

    public function familyRequest(){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $familyrequest = FamilyRequest::where('received_id',$member->id)->with(['sendmember.user','receivemember.user'])->where('approved',0)->get();
        return response()->json($familyrequest);
    }

    public function acceptFamilyRequest(Request $request){
        //before accepting check for family 
        $id = $request->id;
        $familyrequest = FamilyRequest::find($id);
        $member = Member::with('user')->find($familyrequest->sent_id);
        $member->member_type = 'Primary Member';
        $member->update();

        $dependentmember = Member::with('user')->find($familyrequest->received_id);
        $dependentmember->member_type = 'Dependent Member';
        $dependentmember->update();

        
        $families = Family::where('member_id',$member->id)->orWhere('member_id',$dependentmember->id)->get();
        foreach($families as $fam){
            $fam->delete();
        }

        //create family name from primary member
        $familyname = new FamilyName();
        $familyname->primary_member_id = $member->id;
        $familyname->family_name = $member->user->last_name.$member->id;
        $familyname->save();

        $family = new Family();
        $family->family_id = $familyname->id;
        $family->member_id = $familyrequest->received_id;
        $family->approved = 1;
        $family->payment_status = 1;
        $family->primary_request = 1;
        $family->save();

        //make updates in package purchased by primary member
        $primarymemberpackage = UserPackage::where('member_id',$member->id)->with('familyfee')->latest()->first();
        if($primarymemberpackage != null){
            $primarymemberpackage->familyname_id = $familyname->id;
            $primarymemberpackage->member_id = null;
            $family_size = $primarymemberpackage->familyfee->family_size + 1;
            $packagefee = PackageFee::where('package_id', $primarymemberpackage->package_id)->where('family_size', $family_size)->first();
            $primarymemberpackage->family_id = $packagefee->id;
            $primarymemberpackage->update();
        }

        //delete all packages purchased by dependent member
        $dependentmemberpackage = UserPackage::where('member_id',$dependentmember->id)->get();
        foreach($dependentmemberpackage as $item){
            $item->delete();
        }

        //delete all other request sent or received by dependent and received by primary member
        $receiverequests = FamilyRequest::where('received_id', $dependentmember->id)->orWhere('received_id',$member->id)->get();
        $sendrequests = FamilyRequest::where('sent_id', $dependentmember->id)->get();
        foreach($receiverequests as $item){
            $item->delete();
        }
        foreach($sendrequests as $item){
            $item->delete();
        }

        $primarysendrequests = FamilyRequest::where('sent_id', $member->id)->get();
        foreach($primarysendrequests as $item){
            $family = new Family();
            $family->family_id = $familyname->id;
            $family->member_id = $item->received_id;
            $family->approved = 0;
            $family->primary_request = 1;
            $family->save(); 
            $item->delete();   
        }

        $familyrequest->delete();
        return response()->json([ 'message' => 'Family Request Approved. You have become the dependent member of '.$member->user->name.'.']);
    }

    public function rejectfamilyRequest($id){
        $familyrequest = FamilyRequest::find($id);
        $familyrequest->delete();
        return response()->json([
            'success' => 'Family Request Rejected!'
        ]);

    }

    public function cancelfamilyRequest($id){
        $familyrequest = FamilyRequest::find($id);
        $familyrequest->delete();
        return response()->json([
            'success' => 'Family Request Cancelled!'
        ]);
    }

    public function countRequest(){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $familymembers = 0;
        $myrequest = 0;
        $familyrequest = 0;
        $leave = 0;
        if($member->member_type == 'Primary Member'){
            $familyname = FamilyName::where('primary_member_id',$member->id)->with('primary.school_profile')->first();
            if($familyname->primary->school_profile != null){
                $familymembers = Family::where('family_id',$familyname->id)->where('approved',1)->count();
            }else{
                $familymembers = Family::where('family_id',$familyname->id)->where('approved',1)->count() + 1;
            }
            $myrequest = Family::where('family_id',$familyname->id)->where('approved',0)->where('primary_request',1)->count();
            $familyrequest = Family::where('family_id',$familyname->id)->where('approved',0)->where('primary_request',0)->count();
            $leave = MemberLeaveRequest::where('family_id',$familyname->id)->where('status',0)->count();
        }else if($member->member_type == null){
            $myfamilyrequest = FamilyRequest::where('sent_id',$member->id)->where('approved',0)->count();
            $myprimaryrequest =  Family::where('member_id',$member->id)->where('primary_request',0)->where('approved',0)->count();
            $familymemberrequest = FamilyRequest::where('received_id',$member->id)->where('approved',0)->count();
            $primaryrequest = Family::where('member_id',$member->id)->where('primary_request',1)->where('approved',0)->count();
            $myrequest= $myfamilyrequest + $myprimaryrequest;
            $familyrequest= $familymemberrequest + $primaryrequest;
        }
        return response()->json(['memberCount'=>$familymembers,'familyRequest'=>$familyrequest,'myRequest'=>$myrequest, 'leaveRequest' => $leave]);
    }

    public function qrscan(Request $request){
        event(new FamilyEvent($request->id,$request->phone));
        return 'Event send success';
    }
}
