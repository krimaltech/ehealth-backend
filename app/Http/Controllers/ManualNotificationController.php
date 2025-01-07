<?php

namespace App\Http\Controllers;

use App\Mail\ManualMail;
use App\Models\BookingNotification;
use App\Models\ManualNotification;
use App\Models\Member;
use App\Models\Package;
use App\Models\StoreToken;
use App\Models\User;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class ManualNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::any(['SuperAdmin','Admin'])){
            $manual = ManualNotification::with('user')->where('status',0)->get();
            return view('admin.notification.send.index',compact('manual'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::any(['SuperAdmin','Admin'])){
            $members = Member::with('user.usertoken')->whereHas('user',function($query){
                $query->where('is_verified',1)->has('usertoken');
            })->get();
            return view('admin.notification.send.create',compact('members'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'type' => 'required',
        ],[
            'type.required' => 'Choose at least one method of notification.'
        ]);
        if(array_key_exists('app',$request->type)){
            $title = $request->title;
            $message = $request->message;
            $users = StoreToken::whereIn('user_id', $request->user_id)->get();
            $notification_ids = $users->pluck('device_key');
            $type = 'Others';
            $sent = send_bulk_notification_FCM($notification_ids, $title, $message, $type);
            $response = json_decode($sent, true);
            if($response['success']){     
                foreach($users as $user){
                    $manual = new ManualNotification();
                    $manual->user_id = $user->user_id;
                    $manual->type = 'App';
                    $manual->title = $title;
                    $manual->message = $message;
                    $manual->status = 0;
                    $manual->save();

                    $bookingNotification = new BookingNotification();
                    $bookingNotification->user_id = $user->user_id;
                    $bookingNotification->title = $title;
                    $bookingNotification->body = $message;
                    $bookingNotification->type = "Others";
                    $bookingNotification->save();
                }
            }
        }
        if(array_key_exists('sms',$request->type)){
            $sms_text = $request->sms_text;
            $users = User::whereIn('id',$request->user_id)->get();
            $phones = $users->pluck('phone');
            $sent = send_multiple_sms($phones, $sms_text);
            $response = json_decode($sent, true);
            if($response['error'] == false){   
                foreach($users as $user){
                    $manual = new ManualNotification();
                    $manual->user_id = $user->id;
                    $manual->type = 'SMS';
                    $manual->sms_text = $sms_text;
                    $manual->status = 0;
                    $manual->save();
                }
            }
        }
        if(array_key_exists('email',$request->type)){
            $email_subject = $request->email_subject;
            $email_message = $request->email_message;
            $users = User::whereIn('id',$request->user_id)->get();
            foreach($users as $user){
                $mailData = [
                    'subject' => $email_subject,
                    'message' => $email_message,
                    'name' => $user->name,
                ];
                Mail::to($user->email)->send(new ManualMail($mailData));

                $manual = new ManualNotification();
                $manual->user_id = $user->id;
                $manual->type = 'Email';
                $manual->email_subject = $email_subject;
                $manual->email_message = $email_message;
                $manual->status = 0;
                $manual->save();
            }         
        }
        return redirect()->route('sendnotification.index')->with('success','Notification Sent Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManualNotification  $manualNotification
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Gate::any(['SuperAdmin','Admin'])){
            $manual = ManualNotification::with('user')->find($id);
            return view('admin.notification.send.show',compact('manual'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManualNotification  $manualNotification
     * @return \Illuminate\Http\Response
     */
    // public function destroy(ManualNotification $manualNotification)
    // {
    //     //
    // }

    public function filterIndex(){
        if(Gate::any(['SuperAdmin','Admin'])){
            $manual = ManualNotification::with('user')->where('status',1)->get();
            return view('admin.notification.filter.index',compact('manual'));
        } else {
            return view('viewnotfound');
        }
    }

    public function filterCreate(){
        if(Gate::any(['SuperAdmin','Admin'])){
            $packages = Package::all();
            return view('admin.notification.filter.create',compact('packages'));
        } else {
            return view('viewnotfound');
        }
    }

    public function filterStore(Request $request){
        // return $request;
        $request->validate([
            'package_id' => 'nullable|required_without_all:latitude,longitude,radius,platforms',    
            'latitude' => 'nullable|required_without_all:package_id,platforms',    
            'longitude' => 'nullable|required_without_all:package_id,platforms',    
            'radius' => 'nullable|required_without_all:package_id,platforms',
            'platforms' => 'nullable|required_without_all:package_id,latitude,longitude,radius',
            'type' => 'required',
        ],[
            'required_without_all' => 'Select at least one filter (Packages or Location and Radius)',
            'type.required' => 'Choose at least one method of notification.',
        ]);

        $packages = $request->package_id;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $radius = $request->radius;
        $platforms = $request->platforms;
        if($packages){
            $userpackages = UserPackage::whereIn('package_id',$packages)->where('package_status','Activated')->with(['familyname.primary','familyname.family.member'])->get();
            $userIds = [];
            foreach($userpackages as $userpackage){
                array_push($userIds,$userpackage->familyname->primary->member_id);
                if(count($userpackage->familyname->family) > 0){
                    foreach($userpackage->familyname->family as $family){
                        array_push($userIds,$family->member->member_id);
                    }
                } 
            }
            $filters = StoreToken::with('user.kyc')->whereIn('user_id',$userIds)
                    ->when($platforms, function ($query) use ($platforms) {
                        return $query->whereIn('platform', $platforms);
                    })
                    ->when($latitude && $longitude && $radius, function ($query) use ($latitude, $longitude, $radius) {
                        $query->whereHas('user', function ($qu) use ($latitude, $longitude, $radius) {
                            $qu->whereHas('kyc', function ($q) use ($latitude, $longitude, $radius) {
                                return $q->select('*', DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                                + sin(radians(" . $latitude . ")) * sin(radians(latitude))) AS distance"))->having('distance', '<=', $radius);
                            });
                        });
                    })->get();
                    //return $filters;
        }else{
            $filters = StoreToken::with('user.kyc')->whereHas('user.kyc')
                    ->when($platforms, function ($query) use ($platforms) {
                        return $query->whereIn('platform', $platforms);
                    })
                    ->when($latitude && $longitude && $radius, function ($query) use ($latitude, $longitude, $radius) {
                        $query->whereHas('user', function ($qu) use ($latitude, $longitude, $radius) {
                            $qu->whereHas('kyc', function ($q) use ($latitude, $longitude, $radius) {
                                return $q->select('*', DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                                + sin(radians(" . $latitude . ")) * sin(radians(latitude))) AS distance"))->having('distance', '<=', $radius);
                            });
                        });
                    })->get();
                    //return $filters;
        }
        if(!$filters->isEmpty()){
            if(array_key_exists('app',$request->type)){
                $title = $request->title;
                $message = $request->message;
                $notification_ids = $filters->pluck('device_key');
                $type = 'Others';
                $sent = send_bulk_notification_FCM($notification_ids, $title, $message, $type);
                $response = json_decode($sent, true);
                if($response != null && $response['success']){            
                    foreach($filters as $user){
                        $manual = new ManualNotification();
                        $manual->user_id = $user->user_id;
                        $manual->type = 'App';
                        $manual->title = $title;
                        $manual->message = $message;
                        $manual->status = 1;
                        $manual->save();
    
                        $bookingNotification = new BookingNotification();
                        $bookingNotification->user_id = $user->user_id;
                        $bookingNotification->title = $title;
                        $bookingNotification->body = $message;
                        $bookingNotification->type = "Others";
                        $bookingNotification->save();
                    }
                }
            }
            if(array_key_exists('sms',$request->type)){
                $sms_text = $request->sms_text;
                $raw_phones = $filters->pluck('user.phone','user_id');
                $phones = [];
                foreach($raw_phones as $userId => $phone){
                    array_push($phones,$phone);
                }
                $sent = send_multiple_sms($phones, $sms_text);
                $response = json_decode($sent, true);
                if($response['error'] == false){    
                    foreach($raw_phones as $userId => $phone){
                        $manual = new ManualNotification();
                        $manual->user_id = $userId;
                        $manual->type = 'SMS';
                        $manual->sms_text = $sms_text;
                        $manual->status = 1;
                        $manual->save();
                    }
                }
            }
            if(array_key_exists('email',$request->type)){
                $email_subject = $request->email_subject;
                $email_message = $request->email_message;
                $emails = $filters->pluck('user.email','user.id');
                foreach($emails as $userId=>$email){
                    $user = User::find($userId);
                    $mailData = [
                        'subject' => $email_subject,
                        'message' => $email_message,
                        'name' => $user->name,
                    ];
                    Mail::to($email)->send(new ManualMail($mailData));
                    
                    $manual = new ManualNotification();
                    $manual->user_id = $userId;
                    $manual->type = 'Email';
                    $manual->email_subject = $email_subject;
                    $manual->email_message = $email_message;
                    $manual->status = 1;
                    $manual->save();
                }         
            }
            return redirect()->back()->with('success','Notification Sent Successfully.');
        }else{
            return redirect()->back()->with('error','No records found with this filter.');
        }
    }

    public function filterShow($id)
    {
        if(Gate::any(['SuperAdmin','Admin'])){
            $manual = ManualNotification::with('user')->find($id);
            return view('admin.notification.filter.show',compact('manual'));
        } else {
            return view('viewnotfound');
        }
    }

    public function fetchCount(Request $request){
        $packages = $request->packages;
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $radius = $request->radius;
        $platforms = $request->platforms;
        if($packages){
            $userpackages = UserPackage::whereIn('package_id',$packages)->where('package_status','Activated')->with(['familyname.primary','familyname.family.member'])->get();
            $userIds = [];
            foreach($userpackages as $userpackage){
                array_push($userIds,$userpackage->familyname->primary->member_id);
                if(count($userpackage->familyname->family) > 0){
                    foreach($userpackage->familyname->family as $family){
                        array_push($userIds,$family->member->member_id);
                    }
                } 
            }
            $filters = StoreToken::with('user.kyc')->whereIn('user_id',$userIds)
                    ->when($platforms, function ($query) use ($platforms) {
                        return $query->whereIn('platform', $platforms);
                    })
                    ->when($latitude && $longitude && $radius, function ($query) use ($latitude, $longitude, $radius) {
                        $query->whereHas('user', function ($qu) use ($latitude, $longitude, $radius) {
                            $qu->whereHas('kyc', function ($q) use ($latitude, $longitude, $radius) {
                                return $q->select('*', DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                                + sin(radians(" . $latitude . ")) * sin(radians(latitude))) AS distance"))->having('distance', '<=', $radius);
                            });
                        });
                    })->get();
            return response()->json(count($filters));
        }else{
            $filters = StoreToken::with('user.kyc')->whereHas('user.kyc')
                    ->when($platforms, function ($query) use ($platforms) {
                        return $query->whereIn('platform', $platforms);
                    })
                    ->when($latitude && $longitude && $radius, function ($query) use ($latitude, $longitude, $radius) {
                        $query->whereHas('user', function ($qu) use ($latitude, $longitude, $radius) {
                            $qu->whereHas('kyc', function ($q) use ($latitude, $longitude, $radius) {
                                return $q->select('*', DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                                + sin(radians(" . $latitude . ")) * sin(radians(latitude))) AS distance"))->having('distance', '<=', $radius);
                            });
                        });
                    })->get();
            return response()->json(count($filters));
        }
    }
}
