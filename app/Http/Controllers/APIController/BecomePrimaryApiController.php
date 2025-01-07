<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\BecomePrimaryMember;
use App\Models\BookingNotification;
use App\Models\Family;
use App\Models\FamilyName;
use App\Models\Member;
use App\Models\StoreToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class BecomePrimaryApiController extends Controller
{
    public function index(){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $change = BecomePrimaryMember::where('newmember_id',$member->id)->with(['familyname','primary.user','newprimary.user'])->get();
        // foreach($change as $item){
        //     $files = [
        //         'death_certificate_path'=>$item->death_certificate,
        //     ];
        //     $urls = Helper::get_minio($files);
        //     foreach($urls as $key=>$url){
        //         $item->$key = $url;
        //     }
        // }
        return response()->json($change);
    }
    
    public function change(Request $request){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $family = Family::where('member_id',$member->id)->with('familyname')->first();
        if($family){
            $becomePrimary = BecomePrimaryMember::where('family_id',$family->family_id)->where('newmember_id',$member->id)->where('status',0)->first();
            if($becomePrimary){
                return response()->json(['message' => [
                    'error' => ['You have already requested for primary member change.']
                ]],400);  
            }else{
                try{
                    $request->validate([
                        'change_reason' => 'required',
                        'family_relation' => 'required',
                        'death_case' => 'required',
                    ]);
                    $primary = new BecomePrimaryMember();
                    $primary->family_id = $family->family_id;
                    $primary->member_id = $family->familyname->primary_member_id;
                    $primary->newmember_id = $member->id;
                    $primary->family_relation = $request->family_relation;
                    $primary->change_reason = $request->change_reason;
                    $primary->status = 0;
                    $primary->death_case = $request->death_case;
                    if($request->death_case == 1){
                        $request->validate([
                            'death_certificate' => 'required'
                        ]);
                        if ($request->death_certificate) {
                            $image = $request->death_certificate;
                            if(env('STORAGE_TYPE') == 'minio'){
                                $destinationPath = 'images/';
                                $imageUpload = Helper::minio_upload($image, $destinationPath); 
                                $primary->death_certificate_path = $imageUpload['path'];
                                $primary->death_certificate = $imageUpload['file'];
                            }else{
                                $folderPath = "storage/images/"; //path location                
                                $imageUpload = Helper::native_upload($image,$folderPath);                    
                                $primary->death_certificate_path = $imageUpload['path'];
                                $primary->death_certificate = $imageUpload['file'];
                            }
                        }
                    }
                    $saved = $primary->save();
        
                    $title = "Primary Change Notification ";
                    $message = "Primary member change request was made by ".Auth::user()->name.'.';
                    $type = "Primary Change";
                    $familyname = FamilyName::with(['primary','family.member'])->find($family->family_id);
                    $primaryId = $familyname->primary->member_id;
                    $familyIds = $familyname->family->pluck('member.member_id');
                    $ids = $familyIds->push($primaryId);
                    $users = StoreToken::whereIn('user_id', $ids)->get();
                    $notification_ids = $users->pluck('device_key');
                    $sent = send_bulk_notification_FCM($notification_ids, $title, $message, $type);
                    if($sent){        
                        foreach($users as $user){
                            $changeNotification = new BookingNotification();
                            $changeNotification->user_id = $user->user_id;
                            $changeNotification->image = $user->user->member->image_path;
                            $changeNotification->title = $title;
                            $changeNotification->body = $message;
                            $changeNotification->type = $type;
                            $changeNotification->save();
                        }   
                    }
        
                    if($saved){
                        return response()->json([
                            'success' => 'Change Request Made Successfully! Please wait for admin approval.'
                        ]);
                    }
                } catch (ValidationException $th) {
                    return response([
                        "message" => $th->errors(),
                    ], 400);
                }
            }
        }else{
            return response()->json(['message' => [
                'error' => ['You are not a part of any family.']
            ]],400);  
        }
    }
}
