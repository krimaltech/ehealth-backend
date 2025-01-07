<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Mail\PackageModelMail;
use App\Mail\PackagePaidModelMail;
use App\Mail\UserPackagePayment;
use App\Models\AdditionalMemberPayment;
use App\Models\AdditionalPackagePayment;
use App\Models\BookingNotification;
use App\Models\Family;
use App\Models\FamilyName;
use App\Models\FamilyRequest;
use App\Models\KnowYourCustomer;
use App\Models\Member;
use App\Models\Package;
use App\Models\PackageFee;
use App\Models\PackageInsuranceDetail;
use App\Models\PackageNotification;
use App\Models\PackagePayment;
use App\Models\StoreToken;
use App\Models\TransactionStatement;
use App\Models\User;
use App\Models\UserPackage;
use App\Models\UserUserPackage;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserPackageApiController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }

    public function index()
    {
        $months = 0;
        $remaining = 0;
        $total = 0;
        $completed = 0;
        $package = null;
        $prepay = false;
        $expire = false;
        $extended_date = null;
        $user = Member::where('member_id',Auth::user()->id)->first();
        $id = $user->id;
        if($user->member_type == 'Primary Member'){
            $family = FamilyName::where('primary_member_id',$user->id)->first();
            $package = UserPackage::where('familyname_id', $family->id)->with(['familyname.primary.member','package.fees','familyfee','dates.screening','dates.employees.employee.user','dates.reports' => function($qry) use($id){
                $qry->where('member_id',$id);
            },'dates.online'=>function($q) use($id){
                $q->where('member_id',$id);
            },'payment' => function($query){
                $query->latest();
            },'requests','dates.reports.homeskip.employee.user','dates.reports.online.doctor.user','dates.reports.advice.team.employee.user','dates.reports.nosample','dates.reports.additionalnosample'])->latest()->first();
        } else if ($user->member_type == 'Dependent Member') {
            $family = Family::where('member_id', $user->id)->where('approved', 1)->where('payment_status',1)->first();
            if ($family != null) {
                $package = UserPackage::where('familyname_id', $family->family_id)->with(['familyname.primary.member', 'package.fees', 'familyfee', 'dates.screening','dates.employees.employee.user','dates.reports' => function($qry) use($id){
                    $qry->where('member_id',$id);
                }, 'dates.online'=>function($q) use($id){
                    $q->where('member_id',$id);
                },'payment' => function ($query) {
                    $query->latest();
                },'requests','dates.reports.homeskip.employee.user','dates.reports.online.doctor.user','dates.reports.advice.team.employee.user','dates.reports.nosample','dates.reports.additionalnosample'])->latest()->first();
            }
        } else if ($user->member_type == null) {
            $package = UserPackage::where('member_id', $user->id)->with(['familyname.primary.member', 'package.fees', 'familyfee', 'dates.screening', 'dates.employees.employee.user','dates.reports' => function($qry) use($id){
                $qry->where('member_id',$id);
            },'dates.online'=>function($q) use($id){
                $q->where('member_id',$id);
            },'payment' => function ($query) {
                $query->latest();
            },'requests','dates.reports.homeskip.employee.user','dates.reports.online.doctor.user','dates.reports.advice.team.employee.user','dates.reports.nosample','dates.reports.additionalnosample'])->latest()->first();
        }
        if ($package != null) {
            //for payment interval dropdown
                foreach ($package->payment as $payment){
                    if ($payment->payment_interval == 'Monthly') {
                        $months += 1;
                    } else if ($payment->payment_interval == 'Quarterly') {
                        $months += 3;
                    } else if ($payment->payment_interval == 'Half_Yearly') {
                        $months += 6;
                    } else if ($payment->payment_interval == 'Yearly') {
                        $months += 12;
                    }
                }
            if($package->package_status == 'Pending' || $package->package_status == 'Booked'){
                foreach($package->payment->take(1) as $payment){
                    if ($payment->payment_interval == 'Monthly') {
                        $remaining = 30;
                    } else if ($payment->payment_interval == 'Quarterly') {
                        $remaining = 90;
                    } else if ($payment->payment_interval == 'Half_Yearly') {
                        $remaining = 182;
                    } else if ($payment->payment_interval == 'Yearly') {
                        $remaining = 365;
                    }
                }
            }
            //to get the remaining days of package
            if ($package->package_status == 'Activated') {
                if ($package->payment->count() == 1) {
                    //for package remaining and completed days
                    $expiry = Carbon::parse($package->payment[0]->expiry_date)->addDay();
                    $remaining = Carbon::today()->diffInDays($expiry, false);
                    if ($remaining <= 0) {
                        $remaining = 0;
                    }
                    $total = $expiry->diffInDays($package->payment[0]->payment_date);
                    $completed = $total - $remaining;
                    //check expire status
                    if(Carbon::parse($package->expiry_date) == Carbon::parse($package->payment[0]->expiry_date)){
                        $date = Carbon::parse($package->expiry_date)->addDay()->subDays(2);
                        $period = CarbonPeriod::create($date, Carbon::parse($package->expiry_date)->addDay(),CarbonPeriod::EXCLUDE_END_DATE);
                        foreach($period as $per){
                            $dates[] = $per->format('Y-m-d');
                        }
                        if(in_array(Carbon::today()->format('Y-m-d'),$dates)){
                            $expire = true;
                        } 
                    }
                    //check prepayment status
                    elseif($expiry->diffInDays(Carbon::today()->format('Y-m-d'),false) < 0 || $expiry->diffInDays(Carbon::today()->format('Y-m-d'),false) >= -7) {
                        $date = $expiry->subDays(7);
                        $period = CarbonPeriod::create($date, Carbon::parse($package->payment[0]->expiry_date)->addDay(),CarbonPeriod::EXCLUDE_END_DATE);
                        foreach($period as $per){
                            $dates[] = $per->format('Y-m-d');
                        }
                        if(in_array(Carbon::today()->format('Y-m-d'),$dates)){
                            $prepay = true;
                        } 
                    }
                }else{
                    foreach($package->payment->take(1) as $payment){
                        //for package remaining and completed days
                        $expiry_date = Carbon::parse($payment->expiry_date)->addDay();
                        if($payment->prepay_status == 1){
                            $remaining = Carbon::today()->diffInDays($expiry_date,false);
                            if($remaining <= 0){
                                $remaining = 0;
                            }
                            $total = $expiry_date->diffInDays($payment->created_at->format('Y-m-d'));
                            $completed = $total-$remaining;
                        } else{
                            $remaining = Carbon::today()->diffInDays($expiry_date,false);
                            if($remaining <= 0){
                                $remaining = 0;
                            }
                            $total = $expiry_date->diffInDays($payment->payment_date);
                            $completed = $total-$remaining;
                        }
                        //check expire status
                        if(Carbon::parse($package->expiry_date) == Carbon::parse($payment->expiry_date)){
                            $date = Carbon::parse($package->expiry_date)->addDay()->subDays(2);
                            $period = CarbonPeriod::create($date, Carbon::parse($package->expiry_date)->addDay(),CarbonPeriod::EXCLUDE_END_DATE);
                            foreach($period as $per){
                                $dates[] = $per->format('Y-m-d');
                            }
                            if(in_array(Carbon::today()->format('Y-m-d'),$dates)){
                                $expire = true;
                            } 
                        }
                        //check prepayment status
                        elseif($expiry_date->diffInDays(Carbon::now()->format('Y-m-d'),false) < 0 && $expiry_date->diffInDays(Carbon::now()->format('Y-m-d'),false) >= -7) {
                            $date = $expiry_date->subDays(7);
                            $period = CarbonPeriod::create($date, Carbon::parse($payment->expiry_date)->addDay() ,CarbonPeriod::EXCLUDE_END_DATE);
                            foreach($period as $per){
                                $dates[] = $per->format('Y-m-d');
                            }
                            if(in_array(Carbon::now()->format('Y-m-d'),$dates)){
                                $prepay = true;
                            } 
                        }
                    }  
                }
                //for grace period remaining and completed days
                    if ($package->grace_period == 1) {
                        $days = Carbon::parse($payment->expiry_date)->addDay()->diffInDays(Carbon::today());
                        $extended_date = Carbon::parse($payment->expiry_date)->addDays(3)->format('Y-m-d');
                        if ($days == 0) {
                            $remaining = 3;
                            $completed = 0;
                        } elseif ($days == 1) {
                            $remaining = 2;
                            $completed = 1;
                        } elseif ($days == 2) {
                            $remaining = 1;
                            $completed = 2;
                        } else {
                            $remaining = 0;
                            $completed = 3;
                        }
                    } elseif ($package->grace_period == 2) {
                        $remaining = 0;
                    }
            }
        }
        return response()->json(['package'=>$package,'month_count' => $months,'remainingDays'=>$remaining, 'completedDays' => $completed,'prepay'=>$prepay, 'extended_date' => $extended_date,'expire'=>$expire]);       
    }

    public function store(Request $request)
    {
        $member =  Member::with('user')->where('member_id', Auth::user()->id)->first();
        if($member->gender == null && $member->dob == null){
            return response()->json(['message' => 'Please update your profile.']);
        }
        if ($member->member_type == 'Primary Member') {
            $familyname = FamilyName::where('primary_member_id', $member->id)->first();
            $family = Family::where('family_id', $familyname->id)->where('approved', 1)->count();
            if($request->package_id != 10){
                if ($family > 0) {
                    $family_size = $family + 1;
                } else {
                    $family_size = 1;
                }
            }else{
                if ($family > 0) {
                    $family_size = $family;
                } else {
                    $family_size = 0;
                }
            }

            $mypackage = UserPackage::where('familyname_id', $familyname->id)->with(['familyname.primary.member', 'package.fees', 'familyfee', 'payment' => function ($query) {
                $query->latest();
            }])->latest()->first();
            //to check if package already booked
            if ($mypackage != null && $mypackage->package_status == 'Not Booked' ) {
                return response()->json(['message' => 'Your previous booked package will be switched with this package.'], 409);
            } 
            else if ($mypackage != null && $mypackage->package_status != 'Expired') {
                return response()->json(['message' => 'You have already booked a package.'], 409);
            } 
            else {
                $packagefee = PackageFee::where('package_id', $request->package_id)->where('family_size', $family_size)->first();
                $min = PackageFee::where('package_id', $request->package_id)->min('family_size');
                $max = PackageFee::where('package_id', $request->package_id)->max('family_size');
                if ($packagefee == null) {
                    return response()->json(['message' => 'The family size must be between ' . $min . ' to ' . $max . '.']);
                } else {
                    $package = new UserPackage();
                    $package->familyname_id = $familyname->id;
                    $package->package_id = $request->package_id;
                    $package->family_id = $packagefee->id;
                    $package->renew_status = $request->renew_status;
                    $package->year = $request->year;
                    $package->package_status = 'Not Booked';
                    $name = str_replace(' ', '-', 'package-booking');
                    $package->slug = $name . '-' . $this->random;
                    $saved = $package->save();

                    if ($saved) {
                        if($request->package_id != 10){
                            $family = Family::where('family_id', $familyname->id)->where('approved', 0)->with('member')->get();
                            $familyIds = $family->where('primary_request', 0)->pluck('member.member_id');
                            foreach($family as $fam){
                                if($fam->member->member_type == 'Dependent Member'){
                                    $member = Member::find($fam->member_id);
                                    $member->member_type = null;
                                    $member->update();
                                }
                                $fam->delete();
                            }
                            if(!$family->isEmpty()){
                                if(!$familyIds->isEmpty()){
                                    $title = "Request Notification";
                                    $message = "Your family request to ".$member->user->name." has been deleted.";
                                    $type = "Family Request";
                                    $users = StoreToken::whereIn('user_id', $familyIds)->get();
                                    $notification_ids = $users->pluck('device_key');
                                    $sent = send_bulk_notification_FCM($notification_ids, $title, $message, $type);
                                    if($sent){        
                                        foreach($users as $user){
                                            $requestNotification = new BookingNotification();
                                            $requestNotification->user_id = $user->user_id;
                                            $requestNotification->image = $user->user->member->image_path;
                                            $requestNotification->title = $title;
                                            $requestNotification->body = $message;
                                            $requestNotification->type = $type;
                                            $requestNotification->save();
                                        }   
                                    }
                                }
                                $userr = StoreToken::where('user_id', $member->member_id)->first();
                                if($userr){
                                    $notification_id = $userr->device_key;
                                    $titles = "Request Notification";
                                    $messages = "All pending family requests have been deleted.";
                                    $types = "Family Request";
                                    send_notification_FCM($notification_id, $titles, $messages, $types);
        
                                    $requestNotification = new BookingNotification();
                                    $requestNotification->user_id = $member->member_id;
                                    $requestNotification->image = $member->image_path;
                                    $requestNotification->title = $titles;
                                    $requestNotification->body = $messages;
                                    $requestNotification->type = $types;
                                    $requestNotification->save();
                                }
                            }
                        }
                        $mailData = [
                            'title' => 'Package Order Number' . '' . $package->slug,
                            'body' => 'Your Package Order Has Been Posted',
                            'package_name' => $package->package->package_type,
                            'package_fees' => $package->package->package_type,
                            'name' => $package->familyname->primary->user->name,
                            'email' => $package->familyname->primary->user->email,
                            'date' => $package->created_at->format('d/M/Y'),
                            'url' => 'https://react.ghargharmadoctor.com/user/mypackages'
                        ];
                        $package = UserPackage::findOrFail($package->id);
                        $pdf = Pdf::loadView('admin.invoice.userpackageinvoice', compact('mailData'))->setOptions(['defaultFont' => 'sans-serif']);

                        Mail::to($mailData['email'])->send(new PackageModelMail($mailData, $pdf));

                        $packageNotification = new PackageNotification();
                        $packageNotification->user_id = $member->user->id;
                        $packageNotification->package_id = $request->package_id;
                        $packageNotification->title = "Package Notification ";
                        $packageNotification->body =   $member->user->name . " " . "booked package: " . Package::find($request->package_id)->package_type;
                        $packageNotification->save();
                        return response()->json($package);
                    }
                }
            }
        } else if ($member->member_type == 'Dependent Member') {
            return response()->json(['message' => 'Dependent Member cannot buy package.']);
        } else if ($member->member_type == null) {
            $mypackage = UserPackage::where('member_id', $member->id)->with(['package.fees', 'familyfee'])->latest()->first();
            if ($mypackage != null && $mypackage->package_status != 'Expired') {
                return response()->json(['message' => 'You have already booked a package.'], 409);
            }else {
                $packagefee = PackageFee::where('package_id', $request->package_id)->where('family_size', 1)->first();
                $min = PackageFee::where('package_id', $request->package_id)->min('family_size');
                $max = PackageFee::where('package_id', $request->package_id)->max('family_size');
                if ($packagefee == null) {
                    return response()->json(['message' => 'The family size must be between ' . $min . ' to ' . $max . '.']);
                } else {
                    $package = new UserPackage();
                    $package->member_id = $member->id;
                    $package->package_id = $request->package_id;
                    $package->family_id = $packagefee->id;
                    $package->renew_status = $request->renew_status;
                    $package->year = $request->year;
                    $package->package_status = 'Not Booked';
                    $name = str_replace(' ', '-', 'package-booking');
                    $package->slug = $name . '-' . $this->random;
                    $saved = $package->save();
                    if ($saved) {
                        $sentRequest = FamilyRequest::where('sent_id', $member->id)->get();
                        $receivedRequest = FamilyRequest::where('received_id', $member->id)->with('sendmember')->get();
                        if(!$receivedRequest->isEmpty()){
                            $familyIds = $receivedRequest->pluck('sendmember.member_id');
                            $title = "Request Notification";
                            $message = "Your family request to ".$member->user->name." has been deleted.";
                            $type = "Family Request";
                            $users = StoreToken::whereIn('user_id', $familyIds)->get();
                            $notification_ids = $users->pluck('device_key');
                            $sent = send_bulk_notification_FCM($notification_ids, $title, $message, $type);
                            if($sent){        
                                foreach($users as $user){
                                    $requestNotification = new BookingNotification();
                                    $requestNotification->user_id = $user->user_id;
                                    $requestNotification->image = $user->user->member->image_path;
                                    $requestNotification->title = $title;
                                    $requestNotification->body = $message;
                                    $requestNotification->type = $type;
                                    $requestNotification->save();
                                }   
                            }
                            foreach($receivedRequest as $received){
                                $received->delete();
                            }
                        }
                        if(!$sentRequest->isEmpty() || !$receivedRequest->isEmpty()){
                            foreach($sentRequest as $send){
                                $send->delete();
                            }
                            $userr = StoreToken::where('user_id', $member->member_id)->first();
                            if($userr){
                                $notification_id = $userr->device_key;
                                $titles = "Request Notification";
                                $messages = "All pending family requests have been deleted.";
                                $types = "Family Request";
                                send_notification_FCM($notification_id, $titles, $messages, $types);
    
                                $requestNotification = new BookingNotification();
                                $requestNotification->user_id = $member->member_id;
                                $requestNotification->image = $member->image_path;
                                $requestNotification->title = $titles;
                                $requestNotification->body = $messages;
                                $requestNotification->type = $types;
                                $requestNotification->save();
                            }
                        }
                        $mailData = [
                            'title' => 'Package Order Number' . '' . $package->slug,
                            'body' => 'Your Package Order Has Been Posted',
                            'package_name' => $package->package->package_type,
                            'package_fees' => $package->package->package_type,
                            'name' => $package->member->user->name,
                            'email' => $package->member->user->email,
                            'date' => $package->created_at->format('d/M/Y'),
                            'url' => 'https://react.ghargharmadoctor.com/user/mypackages'
                        ];
                        $package = UserPackage::findOrFail($package->id);
                        $pdf = Pdf::loadView('admin.invoice.userpackageinvoice', compact('mailData'))->setOptions(['defaultFont' => 'sans-serif']);

                        Mail::to($mailData['email'])->send(new PackageModelMail($mailData, $pdf));


                        $packageNotification = new PackageNotification();
                        $packageNotification->user_id = $member->user->id;
                        $packageNotification->package_id = $request->package_id;
                        $packageNotification->title = "Package Notification ";
                        $packageNotification->body =   $member->user->name . " " . "booked package: " . Package::find($request->package_id)->package_type;
                        $packageNotification->save();
                        return response()->json($package);
                    }
                }
            }
        }
    }

    public function payment(Request $request)
    {
        if($request->token){
            //payment verification (app)
            $khaltiVerify = Helper::khaltiVerify($request);
            if (isset($khaltiVerify['idx'])) {
                $package = UserPackage::with(['familyname.primary.member.insurance','familyname.family.member.user.insurance','member'])->find($request->input('id'));
                $payments = PackagePayment::where('userpackage_id', $package->id)->latest()->first();
                $user = Member::where('member_id',Auth::user()->id)->first();
                $kycstatus = KnowYourCustomer::where('user_id',Auth::user()->id)->first();

                if ($payments == null) {
                    //make primary member if package payment is done.
                    if($package->familyname_id == null){
                        $member = Member::find($package->member_id);
                        $member->member_type = 'Primary Member';
                        $member->update();

                        $familyname = new FamilyName();
                        $familyname->primary_member_id = $member->id;
                        $familyname->family_name = $member->user->last_name.$member->id;
                        $familyname->save();  

                        $families = Family::where('member_id',$member->id)->get();
                        foreach($families as $fam){
                            $fam->delete();
                        }
                        $primaryreceiverequests = FamilyRequest::where('received_id', $member->id)->get();
                        $primarysendrequests = FamilyRequest::where('sent_id', $member->id)->get();
                        foreach($primaryreceiverequests as $item){
                            $item->delete();
                        }
                        foreach($primarysendrequests as $item){
                            $item->delete();
                        }
                        $package->familyname_id = $familyname->id;
                        $package->member_id = null;
                        $package->status = 1;
                        if($package->package_id == 10){
                            $package->package_status = 'Activated';
                            $package->activated_date = Carbon::now()->format('Y-m-d');
                            $package->expiry_date = Carbon::now()->addMonthsNoOverflow(12)->subDay()->toDateString();
                        }else{
                            if($kycstatus == null || $kycstatus->status == 'Pending' || $kycstatus->status == 'Rejected'){
                                $package->package_status = 'Pending';
                            }elseif($kycstatus->status == 'Active'){
                                $package->package_status = 'Activated';
                                $package->activated_date = Carbon::now()->format('Y-m-d');
                                $package->expiry_date = Carbon::now()->addMonthsNoOverflow(12)->subDay()->toDateString();
                            }
                        }
                    
                        $package->booked_date = Carbon::now();
                        $package->update();
                        $package = UserPackage::with(['familyname.primary.member.insurance','familyname.family.member.user.insurance','member'])->find($request->input('id'));
                    }else{
                        $package->status = 1;
                        if($package->package_id == 10){
                            $package->package_status = 'Activated';
                            $package->activated_date = Carbon::now()->format('Y-m-d');
                            $package->expiry_date = Carbon::now()->addMonthsNoOverflow(12)->subDay()->toDateString();
                        }else{
                            if($kycstatus == null || $kycstatus->status == 'Pending' || $kycstatus->status == 'Rejected'){
                                $package->package_status = 'Pending';
                            }elseif($kycstatus->status == 'Active'){
                                $package->package_status = 'Activated';
                                $package->activated_date = Carbon::now()->format('Y-m-d');
                                $package->expiry_date = Carbon::now()->addMonthsNoOverflow(12)->subDay()->toDateString();
                            }
                        }
                        $package->booked_date = Carbon::now();
                        $package->update();
                    }

                    $payment = new PackagePayment();
                    $payment->userpackage_id = $package->id;
                    $payment->payment_interval = $request->input('payment_interval');
                    $payment->payment_method = 'Khalti';
                    $payment->monthly_amount = $request->input('monthly_amount');
                    $payment->amount = $request->input('amount')/100;
                    $payment->paidmember_id = $user->id;
                    $payment->prepay_status = 0;
                    if($package->package_id == 10){
                        $payment->payment_date = Carbon::now()->format('Y-m-d');
                        if ($payment->payment_interval == 'Monthly') {
                            $payment->expiry_date = Carbon::now()->addMonthNoOverflow()->subDay()->toDateString();
                        } elseif ($payment->payment_interval == 'Quarterly') {
                            $payment->expiry_date = Carbon::now()->addMonthsNoOverflow(3)->subDay()->toDateString();
                        } elseif ($payment->payment_interval == 'Half_Yearly') {
                            $payment->expiry_date = Carbon::now()->addMonthsNoOverflow(6)->subDay()->toDateString();
                        } elseif ($payment->payment_interval == 'Yearly') {
                            $payment->expiry_date = Carbon::now()->addMonthsNoOverflow(12)->subDay()->toDateString();
                        }
                    }else{
                        if($kycstatus != null && $kycstatus->status == 'Active'){
                            $payment->payment_date = Carbon::now()->format('Y-m-d');
                            if ($payment->payment_interval == 'Monthly') {
                                $payment->expiry_date = Carbon::now()->addMonthNoOverflow()->subDay()->toDateString();
                            } elseif ($payment->payment_interval == 'Quarterly') {
                                $payment->expiry_date = Carbon::now()->addMonthsNoOverflow(3)->subDay()->toDateString();
                            } elseif ($payment->payment_interval == 'Half_Yearly') {
                                $payment->expiry_date = Carbon::now()->addMonthsNoOverflow(6)->subDay()->toDateString();
                            } elseif ($payment->payment_interval == 'Yearly') {
                                $payment->expiry_date = Carbon::now()->addMonthsNoOverflow(12)->subDay()->toDateString();
                            }
                        }
                    }

                    $saved = $payment->save();

                    $primary = FamilyName::find($package->familyname_id);
                    $primary->online_consultation = $package->package->online_consultation;
                    $primary->update();

                    $allFamily = Family::where('family_id',$package->familyname_id)->where('approved',1)->where('payment_status',1)->with('member')->get();
                    foreach($allFamily as $item){
                        $item->online_consultation = $package->package->online_consultation;
                        $item->save();
                        if($package->package_id == 10){
                            $usr = User::find($item->member->member_id);
                            $usr->is_verified = 1;
                            $usr->update();
                        }
                    }

                    if($saved)
                    {
                        if (
                            $package->package_id == 1 ||
                            $package->package_id == 2 ||
                            $package->package_id == 3 ||
                            $package->package_id == 4 ||
                            $package->package_id == 5 ||
                            $package->package_id == 6
                        ) {
                            $userusr= new UserUserPackage();
                            $userusr->user_id=$request->user()->id;
                            $userusr->user_package_id = $package->id;
                            $userusr->incentive_amount = $request->monthly_amount;
                            $userusr->package_type = 'individual';
                            $userusr->status = 'unpaid';
                            $userusr->save();
                        } else {
                            $userusr= new UserUserPackage();
                            $userusr->user_id=$request->user()->id;
                            $userusr->user_package_id = $package->id;
                            $userusr->incentive_amount = $request->monthly_amount;
                            $userusr->package_type = 'corporate';
                            $userusr->status = 'unpaid';
                            $userusr->save();
                        }

                        if($package->package_id != 10){
                            $age = Carbon::now()->format('Y') - substr($user->dob, 0, 4);
                            if($age < 60){
                                $primaryInsurance = new PackageInsuranceDetail();
                                $primaryInsurance->user_id = Auth::user()->id;
                                $primaryInsurance->userpackage_id = $package->id;
                                if($kycstatus == null || $kycstatus->status == 'Pending' || $kycstatus->status == 'Rejected'){
                                    $primaryInsurance->status = 0;
                                }else{
                                    $primaryInsurance->status = 1;
                                }
                                $primaryInsurance->save();
                            }
                            foreach($package->familyname->family as $family){
                                $familyuser = Member::find($family->member_id);
                                $kycs = KnowYourCustomer::where('user_id',$familyuser->member_id)->first();
                                $familyage = Carbon::now()->format('Y') - substr($familyuser->dob, 0, 4);
                                if($familyage < 60){
                                    $familyInsurance = new PackageInsuranceDetail();
                                    $familyInsurance->user_id = $family->member->member_id;
                                    $familyInsurance->userpackage_id = $package->id;
                                    if($kycs == null || $kycs->status == 'Pending' || $kycs->status == 'Rejected'){
                                        $familyInsurance->status = 0;
                                    }else{
                                        $familyInsurance->status = 1;
                                    }
                                    $familyInsurance->save();
                                }
                            }
                        
                        }

                        $mailData = [
                            'userpackage_id' => $payment->userpackage_id,
                            'package_name' => $payment->userpack->package->package_type,
                            'payment_date' => $payment->payment_date,
                            'body' => 'Your Package Payment Completed.',
                            'payment_amount' => $payment->amount,
                            'payment_method' => 'Khalti',
                            'payment_interval' => $payment->payment_interval,
                            'email' => $payment->userpack->familyname->primary->user->email,
                            'name' => $payment->userpack->familyname->primary->user->name,
                            'date' => $payment->created_at->format('d/M/Y'),
                        ];
                        $package = PackagePayment::findOrFail($payment->id);
                        $pdf = Pdf::loadView('admin.invoice.packagepayementinvoice', compact('mailData'))->setOptions(['defaultFont' => 'sans-serif']);

                        Mail::to($mailData['email'])->send(new UserPackagePayment($mailData, $pdf));
                        
                        $statement = new TransactionStatement();
                        $statement->date = Carbon::now();
                        $statement->user_id = auth()->user()->id;
                        $statement->name = auth()->user()->name;
                        $statement->address = 'Kathmandu';
                        $statement->amount = $request->amount;
                        $statement->status = 'Completed';
                        $statement->payment_method = 'Khalti';
                        $statement->channel = 'WEB';
                        $statement->service_name = 'Package';
                        $statement->save();

                        return response()->json([
                            'success' => 'Package Payment Completed.',
                        ]);
                    } 
                }else{
                    //activate insurance after payment
                    if($package->package_status == 'Deactivated' && $package->package_id != 10){
                        $primaryinsurance = PackageInsuranceDetail::where('userpackage_id',$package->id)->where('user_id',$package->familyname->primary->member_id)->first();
                        $primaryinsurance->status = 1;   //insurance activate
                        $primaryinsurance->update();

                        foreach($package->familyname->family as $family){
                            $familyinsurance =  PackageInsuranceDetail::where('userpackage_id',$package->id)->where('user_id',$family->member->member_id)->first();
                            if($familyinsurance){
                                $kycs = KnowYourCustomer::where('user_id',$family->member->member_id)->first();
                                if($kycs != null && $kycs->status == 'Active'){
                                    $familyinsurance->status = 1;  //insurance activate
                                    $familyinsurance->update();
                                }
                            }
                        }
                    }
                    $package->status = 1;
                    $package->package_status = 'Activated';
                    $package->grace_period = 0;
                    $package->update();

                    $payment = new PackagePayment();
                    $payment->userpackage_id = $package->id;
                    $payment->payment_interval = $request->input('payment_interval');
                    $payment->payment_method = 'Khalti';
                    $payment->monthly_amount = $request->input('monthly_amount');
                    $payment->amount = $request->input('amount')/100;
                    $payment->payment_date = Carbon::parse($payments->expiry_date)->addDay();
                    $payment->prepay_status = $request->input('prepay_status');
                    $payment->paidmember_id = $user->id;
                    if($request->prepay_status == 1){
                        $expiry = Carbon::parse($payments->expiry_date)->addDay();
                        $days = Carbon::today()->diffInDays($expiry);
                        if($payment->payment_interval == 'Monthly'){
                            $payment->expiry_date = $expiry->addMonthNoOverflow()->subDay()->toDateString();
                            $payment->prepay_days = $days;
                        }
                        elseif($payment->payment_interval == 'Quarterly'){
                            $payment->expiry_date = $expiry->addMonthsNoOverflow(3)->subDay()->toDateString();
                            $payment->prepay_days = $days;
                        }
                        elseif($payment->payment_interval == 'Half_Yearly'){
                            $payment->expiry_date = $expiry->addMonthsNoOverflow(6)->subDay()->toDateString();
                            $payment->prepay_days = $days;
                        }
                        elseif($payment->payment_interval == 'Yearly'){
                            $payment->expiry_date = $expiry->addMonthsNoOverflow(12)->subDay()->toDateString();
                            $payment->prepay_days = $days;
                        }
                    }else{
                        $expiry = Carbon::parse($payments->expiry_date)->addDay();
                        $days = Carbon::today()->diffInDays($expiry);
                        if($payment->payment_interval == 'Monthly'){
                            $payment->expiry_date = $expiry->addMonthNoOverflow()->subDay()->toDateString();
                            $payment->grace_days = $days;
                        }
                        elseif($payment->payment_interval == 'Quarterly'){
                            $payment->expiry_date = $expiry->addMonthsNoOverflow(3)->subDay()->toDateString();
                            $payment->grace_days = $days;
                        }
                        elseif($payment->payment_interval == 'Half_Yearly'){
                            $payment->expiry_date = $expiry->addMonthsNoOverflow(6)->subDay()->toDateString();
                            $payment->grace_days = $days;
                        }
                        elseif($payment->payment_interval == 'Yearly'){
                            $payment->expiry_date = $expiry->addMonthsNoOverflow(12)->subDay()->toDateString();
                            $payment->grace_days = $days;
                        }
                    }
                    $saved = $payment->save();

                    // $primary = new MemberPayment();
                    // $primary->payment_id = $payment->id;
                    // $primary->member_id = $user->id;
                    // $primary->save();

                    // foreach($package->familyname->family as $family){
                    //     $familyuser = Member::find($family->member_id);
                    //     $dependent = new MemberPayment();
                    //     $dependent->payment_id = $payment->id;
                    //     $dependent->member_id = $familyuser->id;
                    //     $dependent->save();
                    // }

                    if($saved){

                        $mailData = [
                            'userpackage_id' => $payment->userpackage_id,
                            'package_name' => $payment->userpack->package->package_type,
                            'payment_date' => $payment->payment_date,
                            'body' => 'Your Package Re-Payment Completed.',
                            'payment_amount' => $payment->amount,
                            'payment_method' => 'Khalti',
                            'payment_interval' => $payment->payment_interval,
                            'email' => $payment->userpack->familyname->primary->user->email,
                            'name' => $payment->userpack->familyname->primary->user->name,
                            'date' => $payment->created_at->format('d/M/Y'),
                        ];
                        $package = PackagePayment::findOrFail($payment->id);
                        $pdf = Pdf::loadView('admin.invoice.packagepayementinvoice', compact('mailData'))->setOptions(['defaultFont' => 'sans-serif']);
                        
                        $statement = new TransactionStatement();
                        $statement->date = Carbon::now();
                        $statement->user_id = auth()->user()->id;
                        $statement->name = auth()->user()->name;
                        $statement->address = 'Kathmandu';
                        $statement->amount = $request->amount;
                        $statement->status = 'Completed';
                        $statement->payment_method = 'Khalti';
                        $statement->channel = 'WEB';
                        $statement->service_name = 'Package';
                        $statement->save();

                        return response()->json([ 
                            'success' => 'Subscription Payment Completed.',
                        ]);
                    }
                
                }
            } else {
                return response()->json([
                    'error' => 'Something went Wrong.',
                ]);
            }
        }else{
            //payment verification (web)
            $khaltiLookup = Helper::khaltiLookup($request->pidx);
            $responseData = $khaltiLookup->getData();
            if(isset($responseData->status) && $responseData->status === 'Completed'){
                $package = UserPackage::with(['familyname.primary.member.insurance','familyname.family.member.user.insurance','member'])->find($request->input('id'));
                $payments = PackagePayment::where('userpackage_id', $package->id)->latest()->first();
                $user = Member::where('member_id',Auth::user()->id)->first();
                $kycstatus = KnowYourCustomer::where('user_id',Auth::user()->id)->first();

                if ($payments == null) {
                    //make primary member if package payment is done.
                    if($package->familyname_id == null){
                        $member = Member::find($package->member_id);
                        $member->member_type = 'Primary Member';
                        $member->update();

                        $familyname = new FamilyName();
                        $familyname->primary_member_id = $member->id;
                        $familyname->family_name = $member->user->last_name.$member->id;
                        $familyname->save();  

                        $families = Family::where('member_id',$member->id)->get();
                        foreach($families as $fam){
                            $fam->delete();
                        }
                        $primaryreceiverequests = FamilyRequest::where('received_id', $member->id)->get();
                        $primarysendrequests = FamilyRequest::where('sent_id', $member->id)->get();
                        foreach($primaryreceiverequests as $item){
                            $item->delete();
                        }
                        foreach($primarysendrequests as $item){
                            $item->delete();
                        }
                        $package->familyname_id = $familyname->id;
                        $package->member_id = null;
                        $package->status = 1;
                        if($package->package_id == 10){
                            $package->package_status = 'Activated';
                            $package->activated_date = Carbon::now()->format('Y-m-d');
                            $package->expiry_date = Carbon::now()->addMonthsNoOverflow(12)->subDay()->toDateString();
                        }else{
                            if($kycstatus == null || $kycstatus->status == 'Pending' || $kycstatus->status == 'Rejected'){
                                $package->package_status = 'Pending';
                            }elseif($kycstatus->status == 'Active'){
                                $package->package_status = 'Activated';
                                $package->activated_date = Carbon::now()->format('Y-m-d');
                                $package->expiry_date = Carbon::now()->addMonthsNoOverflow(12)->subDay()->toDateString();
                            }
                        }
                    
                        $package->booked_date = Carbon::now();
                        $package->update();
                        $package = UserPackage::with(['familyname.primary.member.insurance','familyname.family.member.user.insurance','member'])->find($request->input('id'));
                    }else{
                        $package->status = 1;
                        if($package->package_id == 10){
                            $package->package_status = 'Activated';
                            $package->activated_date = Carbon::now()->format('Y-m-d');
                            $package->expiry_date = Carbon::now()->addMonthsNoOverflow(12)->subDay()->toDateString();
                        }else{
                            if($kycstatus == null || $kycstatus->status == 'Pending' || $kycstatus->status == 'Rejected'){
                                $package->package_status = 'Pending';
                            }elseif($kycstatus->status == 'Active'){
                                $package->package_status = 'Activated';
                                $package->activated_date = Carbon::now()->format('Y-m-d');
                                $package->expiry_date = Carbon::now()->addMonthsNoOverflow(12)->subDay()->toDateString();
                            }
                        }
                        $package->booked_date = Carbon::now();
                        $package->update();
                    }

                    $payment = new PackagePayment();
                    $payment->userpackage_id = $package->id;
                    $payment->payment_interval = $request->input('payment_interval');
                    $payment->payment_method = 'Khalti';
                    $payment->monthly_amount = $request->input('monthly_amount');
                    $payment->amount = $request->input('amount')/100;
                    $payment->paidmember_id = $user->id;
                    $payment->prepay_status = 0;
                    if($package->package_id == 10){
                        $payment->payment_date = Carbon::now()->format('Y-m-d');
                        if ($payment->payment_interval == 'Monthly') {
                            $payment->expiry_date = Carbon::now()->addMonthNoOverflow()->subDay()->toDateString();
                        } elseif ($payment->payment_interval == 'Quarterly') {
                            $payment->expiry_date = Carbon::now()->addMonthsNoOverflow(3)->subDay()->toDateString();
                        } elseif ($payment->payment_interval == 'Half_Yearly') {
                            $payment->expiry_date = Carbon::now()->addMonthsNoOverflow(6)->subDay()->toDateString();
                        } elseif ($payment->payment_interval == 'Yearly') {
                            $payment->expiry_date = Carbon::now()->addMonthsNoOverflow(12)->subDay()->toDateString();
                        }
                    }else{
                        if($kycstatus != null && $kycstatus->status == 'Active'){
                            $payment->payment_date = Carbon::now()->format('Y-m-d');
                            if ($payment->payment_interval == 'Monthly') {
                                $payment->expiry_date = Carbon::now()->addMonthNoOverflow()->subDay()->toDateString();
                            } elseif ($payment->payment_interval == 'Quarterly') {
                                $payment->expiry_date = Carbon::now()->addMonthsNoOverflow(3)->subDay()->toDateString();
                            } elseif ($payment->payment_interval == 'Half_Yearly') {
                                $payment->expiry_date = Carbon::now()->addMonthsNoOverflow(6)->subDay()->toDateString();
                            } elseif ($payment->payment_interval == 'Yearly') {
                                $payment->expiry_date = Carbon::now()->addMonthsNoOverflow(12)->subDay()->toDateString();
                            }
                        }
                    }

                    $saved = $payment->save();

                    $primary = FamilyName::find($package->familyname_id);
                    $primary->online_consultation = $package->package->online_consultation;
                    $primary->update();

                    $allFamily = Family::where('family_id',$package->familyname_id)->where('approved',1)->where('payment_status',1)->with('member')->get();
                    foreach($allFamily as $item){
                        $item->online_consultation = $package->package->online_consultation;
                        $item->save();
                        if($package->package_id == 10){
                            $usr = User::find($item->member->member_id);
                            $usr->is_verified = 1;
                            $usr->update();
                        }
                    }

                    if($saved)
                    {
                        if (
                            $package->package_id == 1 ||
                            $package->package_id == 2 ||
                            $package->package_id == 3 ||
                            $package->package_id == 4 ||
                            $package->package_id == 5 ||
                            $package->package_id == 6
                        ) {
                            $userusr= new UserUserPackage();
                            $userusr->user_id=$request->user()->id;
                            $userusr->user_package_id = $package->id;
                            $userusr->incentive_amount = $request->monthly_amount;
                            $userusr->package_type = 'individual';
                            $userusr->status = 'unpaid';
                            $userusr->save();
                        } else {
                            $userusr= new UserUserPackage();
                            $userusr->user_id=$request->user()->id;
                            $userusr->user_package_id = $package->id;
                            $userusr->incentive_amount = $request->monthly_amount;
                            $userusr->package_type = 'corporate';
                            $userusr->status = 'unpaid';
                            $userusr->save();
                        }

                        if($package->package_id != 10){
                            $age = Carbon::now()->format('Y') - substr($user->dob, 0, 4);
                            if($age < 60){
                                $primaryInsurance = new PackageInsuranceDetail();
                                $primaryInsurance->user_id = Auth::user()->id;
                                $primaryInsurance->userpackage_id = $package->id;
                                if($kycstatus == null || $kycstatus->status == 'Pending' || $kycstatus->status == 'Rejected'){
                                    $primaryInsurance->status = 0;
                                }else{
                                    $primaryInsurance->status = 1;
                                }
                                $primaryInsurance->save();
                            }
                            foreach($package->familyname->family as $family){
                                $familyuser = Member::find($family->member_id);
                                $kycs = KnowYourCustomer::where('user_id',$familyuser->member_id)->first();
                                $familyage = Carbon::now()->format('Y') - substr($familyuser->dob, 0, 4);
                                if($familyage < 60){
                                    $familyInsurance = new PackageInsuranceDetail();
                                    $familyInsurance->user_id = $family->member->member_id;
                                    $familyInsurance->userpackage_id = $package->id;
                                    if($kycs == null || $kycs->status == 'Pending' || $kycs->status == 'Rejected'){
                                        $familyInsurance->status = 0;
                                    }else{
                                        $familyInsurance->status = 1;
                                    }
                                    $familyInsurance->save();
                                }
                            }
                        
                        }

                        $mailData = [
                            'userpackage_id' => $payment->userpackage_id,
                            'package_name' => $payment->userpack->package->package_type,
                            'payment_date' => $payment->payment_date,
                            'body' => 'Your Package Payment Completed.',
                            'payment_amount' => $payment->amount,
                            'payment_method' => 'Khalti',
                            'payment_interval' => $payment->payment_interval,
                            'email' => $payment->userpack->familyname->primary->user->email,
                            'name' => $payment->userpack->familyname->primary->user->name,
                            'date' => $payment->created_at->format('d/M/Y'),
                        ];
                        $package = PackagePayment::findOrFail($payment->id);
                        $pdf = Pdf::loadView('admin.invoice.packagepayementinvoice', compact('mailData'))->setOptions(['defaultFont' => 'sans-serif']);

                        Mail::to($mailData['email'])->send(new UserPackagePayment($mailData, $pdf));
                        
                        $statement = new TransactionStatement();
                        $statement->date = Carbon::now();
                        $statement->user_id = auth()->user()->id;
                        $statement->name = auth()->user()->name;
                        $statement->address = 'Kathmandu';
                        $statement->amount = $request->amount;
                        $statement->status = 'Completed';
                        $statement->payment_method = 'Khalti';
                        $statement->channel = 'WEB';
                        $statement->service_name = 'Package';
                        $statement->save();

                        return response()->json([
                            'success' => 'Package Payment Completed.',
                        ]);
                    } 
                }else{
                    //activate insurance after payment
                    if($package->package_status == 'Deactivated' && $package->package_id != 10){
                        $primaryinsurance = PackageInsuranceDetail::where('userpackage_id',$package->id)->where('user_id',$package->familyname->primary->member_id)->first();
                        $primaryinsurance->status = 1;   //insurance activate
                        $primaryinsurance->update();

                        foreach($package->familyname->family as $family){
                            $familyinsurance =  PackageInsuranceDetail::where('userpackage_id',$package->id)->where('user_id',$family->member->member_id)->first();
                            if($familyinsurance){
                                $kycs = KnowYourCustomer::where('user_id',$family->member->member_id)->first();
                                if($kycs != null && $kycs->status == 'Active'){
                                    $familyinsurance->status = 1;  //insurance activate
                                    $familyinsurance->update();
                                }
                            }
                        }
                    }
                    $package->status = 1;
                    $package->package_status = 'Activated';
                    $package->grace_period = 0;
                    $package->update();

                    $payment = new PackagePayment();
                    $payment->userpackage_id = $package->id;
                    $payment->payment_interval = $request->input('payment_interval');
                    $payment->payment_method = 'Khalti';
                    $payment->monthly_amount = $request->input('monthly_amount');
                    $payment->amount = $request->input('amount')/100;
                    $payment->payment_date = Carbon::parse($payments->expiry_date)->addDay();
                    $payment->prepay_status = $request->input('prepay_status');
                    $payment->paidmember_id = $user->id;
                    if($request->prepay_status == 1){
                        $expiry = Carbon::parse($payments->expiry_date)->addDay();
                        $days = Carbon::today()->diffInDays($expiry);
                        if($payment->payment_interval == 'Monthly'){
                            $payment->expiry_date = $expiry->addMonthNoOverflow()->subDay()->toDateString();
                            $payment->prepay_days = $days;
                        }
                        elseif($payment->payment_interval == 'Quarterly'){
                            $payment->expiry_date = $expiry->addMonthsNoOverflow(3)->subDay()->toDateString();
                            $payment->prepay_days = $days;
                        }
                        elseif($payment->payment_interval == 'Half_Yearly'){
                            $payment->expiry_date = $expiry->addMonthsNoOverflow(6)->subDay()->toDateString();
                            $payment->prepay_days = $days;
                        }
                        elseif($payment->payment_interval == 'Yearly'){
                            $payment->expiry_date = $expiry->addMonthsNoOverflow(12)->subDay()->toDateString();
                            $payment->prepay_days = $days;
                        }
                    }else{
                        $expiry = Carbon::parse($payments->expiry_date)->addDay();
                        $days = Carbon::today()->diffInDays($expiry);
                        if($payment->payment_interval == 'Monthly'){
                            $payment->expiry_date = $expiry->addMonthNoOverflow()->subDay()->toDateString();
                            $payment->grace_days = $days;
                        }
                        elseif($payment->payment_interval == 'Quarterly'){
                            $payment->expiry_date = $expiry->addMonthsNoOverflow(3)->subDay()->toDateString();
                            $payment->grace_days = $days;
                        }
                        elseif($payment->payment_interval == 'Half_Yearly'){
                            $payment->expiry_date = $expiry->addMonthsNoOverflow(6)->subDay()->toDateString();
                            $payment->grace_days = $days;
                        }
                        elseif($payment->payment_interval == 'Yearly'){
                            $payment->expiry_date = $expiry->addMonthsNoOverflow(12)->subDay()->toDateString();
                            $payment->grace_days = $days;
                        }
                    }
                    $saved = $payment->save();

                    // $primary = new MemberPayment();
                    // $primary->payment_id = $payment->id;
                    // $primary->member_id = $user->id;
                    // $primary->save();

                    // foreach($package->familyname->family as $family){
                    //     $familyuser = Member::find($family->member_id);
                    //     $dependent = new MemberPayment();
                    //     $dependent->payment_id = $payment->id;
                    //     $dependent->member_id = $familyuser->id;
                    //     $dependent->save();
                    // }

                    if($saved){

                        $mailData = [
                            'userpackage_id' => $payment->userpackage_id,
                            'package_name' => $payment->userpack->package->package_type,
                            'payment_date' => $payment->payment_date,
                            'body' => 'Your Package Re-Payment Completed.',
                            'payment_amount' => $payment->amount,
                            'payment_method' => 'Khalti',
                            'payment_interval' => $payment->payment_interval,
                            'email' => $payment->userpack->familyname->primary->user->email,
                            'name' => $payment->userpack->familyname->primary->user->name,
                            'date' => $payment->created_at->format('d/M/Y'),
                        ];
                        $package = PackagePayment::findOrFail($payment->id);
                        $pdf = Pdf::loadView('admin.invoice.packagepayementinvoice', compact('mailData'))->setOptions(['defaultFont' => 'sans-serif']);
                        
                        $statement = new TransactionStatement();
                        $statement->date = Carbon::now();
                        $statement->user_id = auth()->user()->id;
                        $statement->name = auth()->user()->name;
                        $statement->address = 'Kathmandu';
                        $statement->amount = $request->amount;
                        $statement->status = 'Completed';
                        $statement->payment_method = 'Khalti';
                        $statement->channel = 'WEB';
                        $statement->service_name = 'Package';
                        $statement->save();

                        return response()->json([ 
                            'success' => 'Subscription Payment Completed.',
                        ]);
                    }
                
                }
            } else {
                return response()->json([
                    'error' => 'Payment Pending.',
                ],400);
            }
        }
    }

    //get total family size of current user
    public function calculate($id)
    {
        $member = Member::where('member_id', Auth::user()->id)->first();
        if($member->member_type == null){
            $packagefee = PackageFee::where('package_id', $id)->where('family_size', 1)->first();
            if ($packagefee) {
                return response()->json(['packagefee' => $packagefee, 'message' => 'success']);
            } else {
                $newPackagefee = PackageFee::where('package_id', $id)->get()->sortByDesc('family_size');
                $newMin = PackageFee::where('package_id', $id)->min('family_size');
                $newMax = PackageFee::where('package_id', $id)->max('family_size');
                return response()->json(['packagefee' => $newPackagefee[0],'message' => 'The family size must be between ' . $newMin . ' to ' . $newMax . '.']);
            }
        }elseif($member->member_type == 'Dependent Member'){
            $familyid = Family::where('member_id',$member->id)->where('approved',1)->first();
            if($familyid){
                $userpackage = UserPackage::where('familyname_id',$familyid->family_id)->where('package_id',$id)->latest()->first();
                if($userpackage != null){
                    if($userpackage->package_status == 'Not Booked'){
                        $packagefee = PackageFee::find($userpackage->family_id);
                        return response()->json(['packagefee' => $packagefee, 'message' => 'Dependent Member cannot buy package.']);
                    }elseif($userpackage->package_status == 'Expired'){
                        if($id != 10){
                            $family = Family::where('family_id', $familyid->family_id)->where('approved', '1')->where('payment_status',1)->count() + 1;
                        }else{
                            $family = Family::where('family_id', $familyid->family_id)->where('approved', '1')->where('payment_status',1)->whereHas('member.user',function($query){
                                $query->where('is_verified',1);
                            })->count();
                        }
                        $packagefee = PackageFee::where('package_id', $id)->where('family_size', $family)->first();
                        if ($packagefee) {
                            return response()->json(['packagefee' => $packagefee, 'message' => 'Dependent Member cannot buy package.']);
                        } else {
                            $newPackagefee = PackageFee::where('package_id', $id)->get()->sortByDesc('family_size');
                            $newMin = PackageFee::where('package_id', $id)->min('family_size');
                            $newMax = PackageFee::where('package_id', $id)->max('family_size');
                            return response()->json(['packagefee' => $newPackagefee[0],'message' => 'Dependent Member cannot buy package.']);
                        }
                    }else{
                        if($userpackage->package_id != 10){
                            $family = Family::where('family_id', $familyid->family_id)->where('approved', '1')->where('payment_status',1)->count() + 1;
                            $packagefee = PackageFee::find($userpackage->family_id);
                            $packagefee->family_size = $family;
                            return response()->json(['packagefee' => $packagefee, 'message' => 'Dependent Member cannot buy package.']);
                        }else{
                            $family = Family::where('family_id', $familyid->family_id)->where('approved', '1')->where('payment_status',1)->whereHas('member.user',function($query){
                                $query->where('is_verified',1);
                            })->count();
                            $packagefee = PackageFee::find($userpackage->family_id);
                            $packagefee->family_size = $family;
                            return response()->json(['packagefee' => $packagefee, 'message' => 'Dependent Member cannot buy package.']);
                        }
                    }
                }else{
                    if($id != 10){
                        $family = Family::where('family_id', $familyid->family_id)->where('approved', '1')->where('payment_status',1)->count() + 1;
                    }else{
                        $family = Family::where('family_id', $familyid->family_id)->where('approved', '1')->where('payment_status',1)->count();
                    }
                    $packagefee = PackageFee::where('package_id', $id)->where('family_size', $family)->first();
                    if ($packagefee) {
                        return response()->json(['packagefee' => $packagefee, 'message' => 'Dependent Member cannot buy package.']);
                    } else {
                        $newPackagefee = PackageFee::where('package_id', $id)->get()->sortByDesc('family_size');
                        $newMin = PackageFee::where('package_id', $id)->min('family_size');
                        $newMax = PackageFee::where('package_id', $id)->max('family_size');
                        return response()->json(['packagefee' => $newPackagefee[0],'message' => 'Dependent Member cannot buy package.']);
                    }
                }
            }else{
                $packagefee = PackageFee::where('package_id', $id)->get()->sortByDesc('family_size');
                $newMin = PackageFee::where('package_id', $id)->min('family_size');
                $newMax = PackageFee::where('package_id', $id)->max('family_size');
                return response()->json(['packagefee' => $packagefee[0],'message' => 'Dependent Member cannot buy package.']);
            }
        }elseif($member->member_type == 'Primary Member'){
            $familyid = FamilyName::where('primary_member_id', $member->id)->first();
            $userpackage = UserPackage::where('familyname_id',$familyid->id)->where('package_id',$id)->latest()->first();
            if($userpackage != null){
                if($userpackage->package_status == 'Not Booked'){
                    $packagefee = PackageFee::find($userpackage->family_id);
                    return response()->json(['packagefee' => $packagefee, 'message' => 'success']);
                }elseif($userpackage->package_status == 'Expired'){
                    if($id != 10){
                        $family = Family::where('family_id', $familyid->id)->where('approved', '1')->where('payment_status',1)->count() + 1;
                    }else{
                        $family = Family::where('family_id', $familyid->id)->where('approved', '1')->where('payment_status',1)->whereHas('member.user',function($query){
                            $query->where('is_verified',1);
                        })->count();
                    }
                    $packagefee = PackageFee::where('package_id', $id)->where('family_size', $family)->first();
                    if ($packagefee) {
                        return response()->json(['packagefee' => $packagefee, 'message' => 'success']);
                    } else {
                        $newPackagefee = PackageFee::where('package_id', $id)->get()->sortByDesc('family_size');
                        $newMin = PackageFee::where('package_id', $id)->min('family_size');
                        $newMax = PackageFee::where('package_id', $id)->max('family_size');
                        return response()->json(['packagefee' => $newPackagefee[0],'message' => 'The family size must be between ' . $newMin . ' to ' . $newMax . '.']);
                    }
                }else{
                    if($userpackage->package_id != 10){
                        $family = Family::where('family_id', $familyid->id)->where('approved', '1')->where('payment_status',1)->count() + 1;
                        $packagefee = PackageFee::find($userpackage->family_id);
                        $packagefee->family_size = $family;
                        return response()->json(['packagefee' => $packagefee, 'message' => 'success']);
                    }else{
                        $family = Family::where('family_id', $familyid->id)->where('approved', '1')->where('payment_status',1)->whereHas('member.user',function($query){
                            $query->where('is_verified',1);
                        })->count();
                        $packagefee = PackageFee::find($userpackage->family_id);
                        $packagefee->family_size = $family;
                        return response()->json(['packagefee' => $packagefee, 'message' => 'success']);
                    }
                }
            }else{
                if($id != 10){
                    $family = Family::where('family_id', $familyid->id)->where('approved', '1')->where('payment_status',1)->count() + 1;
                }else{
                    $family = Family::where('family_id', $familyid->id)->where('approved', '1')->where('payment_status',1)->count();
                }
                $packagefee = PackageFee::where('package_id', $id)->where('family_size', $family)->first();
                if ($packagefee) {
                    return response()->json(['packagefee' => $packagefee, 'message' => 'success']);
                } else {
                    $newPackagefee = PackageFee::where('package_id', $id)->get()->sortByDesc('family_size');
                    $newMin = PackageFee::where('package_id', $id)->min('family_size');
                    $newMax = PackageFee::where('package_id', $id)->max('family_size');
                    return response()->json(['packagefee' => $newPackagefee[0],'message' => 'The family size must be between ' . $newMin . ' to ' . $newMax . '.']);
                }
            }
        }
    }

    //initial payment calculation part of additional family member
    public function calculateInitialPayment(Request $request){
        // bulk added members payment calculation
        $count = $request->family_count;
        $user = Member::where('member_id',Auth::user()->id)->first();
        $family = FamilyName::where('primary_member_id',$user->id)->withCount('family')->first();
        $userpackage = UserPackage::where('familyname_id',$family->id)->with(['familyfee','payment' => function($query){
            $query->latest();
        }])->latest()->first();
        if($userpackage->package_id == 10){
            $familyCount = $family->family_count;
        }else{
            $familyCount = $family->family_count + 1;
        }
        $interval = $userpackage->payment[0]->payment_interval;

        //additional family member payment calculation if package booked but not activated
        if($userpackage->package_status == 'Booked' || $userpackage->package_status == 'Pending'){
            if($userpackage->package_id == 1 || $userpackage->package_id == 7){
                $enrollment = 3000;
            }
            elseif($userpackage->package_id == 8){
                $enrollment = 4000;
            }
            elseif($userpackage->package_id == 9){
                $enrollment = 6000;
            }
            elseif($userpackage->package_id == 10){
                $enrollment = 1000;
            }
            else{
                if($familyCount > $userpackage->familyfee->family_size){
                    $fee = PackageFee::where('package_id',$userpackage->package_id)->where('family_size',$familyCount)->first();
                    $enrollment = $fee->one_registration_fee/ $familyCount;
                }else{
                    $enrollment = $userpackage->familyfee->one_registration_fee/ $familyCount;
                }
            }
            if($familyCount > $userpackage->familyfee->family_size){
                $fee = PackageFee::where('package_id',$userpackage->package_id)->where('family_size',$familyCount)->first();
                $daily = $fee->one_monthly_fee/ 30;
            }
            else{
                $daily = $userpackage->familyfee->one_monthly_fee/ 30;
            }
            if($interval == 'Monthly'){
                $paymentDays =  30;
                $discount = 0;
            }else if($interval == 'Quarterly'){
                $paymentDays =  90;
                $discount = 1;
            }else if($interval == 'Half_Yearly'){
                $paymentDays =  182;
                $discount = 2;
            }else if($interval == 'Yearly'){
                $paymentDays =  365;
                $discount = 5;
            }  
            $dailyFee = $daily * $paymentDays * $count;
            $discountedFee = $discount/100 * $dailyFee;
            $totalMonthlyFee = $dailyFee - $discountedFee;
            $total = $enrollment * $count + $totalMonthlyFee;

        }
        //additional family member payment calculation if package activated 
        else{
            if($userpackage->package_id == 1 || $userpackage->package_id == 7){
                $enrollment = 3000;
            }
            elseif($userpackage->package_id == 8){
                $enrollment = 4000;
            }
            elseif($userpackage->package_id == 9){
                $enrollment = 6000;
            }
            elseif($userpackage->package_id == 10){
                $enrollment = 1000;
            }
            else{
                if($familyCount > $userpackage->familyfee->family_size){
                    $fee = PackageFee::where('package_id',$userpackage->package_id)->where('family_size',$familyCount)->first();
                    $enrollment = $fee->one_registration_fee/ $familyCount;
                }else{
                    $enrollment = $userpackage->familyfee->one_registration_fee/ $familyCount;
                }
            }
            if($familyCount > $userpackage->familyfee->family_size){
                $fee = PackageFee::where('package_id',$userpackage->package_id)->where('family_size',$familyCount)->first();
                $daily = $fee->one_monthly_fee/ 30;
            }
            else{
                $daily = $userpackage->familyfee->one_monthly_fee/ 30;
            }
            $paymentDays =  Carbon::today()->diffInDays(Carbon::parse($userpackage->payment[0]->expiry_date)->addDay(), false);
            if($interval == 'Monthly'){
                $discount = 0;
            }else if($interval == 'Quarterly'){
                $discount = 1;
            }else if($interval == 'Half_Yearly'){
                $discount = 2;
            }else if($interval == 'Yearly'){
                $discount = 5;
            }  
            $dailyFee = $daily * $paymentDays * $count;
            $discountedFee = $discount/100 * $dailyFee;
            $totalMonthlyFee = $dailyFee - $discountedFee;
            $total = $enrollment * $count + $totalMonthlyFee;
        }
        return response()->json(['userpackage'=>$userpackage,'enrollment_fee'=>round($enrollment,2),'daily_fee'=> round($daily,2),'payment_days' => $paymentDays, 'discount' => $discount, 'discount_amount'=> round($discountedFee,2), 'total_payment' => round($total,2)]);
        
        // single added member payment calculation
        // $user = Member::where('member_id',Auth::user()->id)->first();
        // $family = FamilyName::where('primary_member_id',$user->id)->first();
        // $userpackage = UserPackage::where('familyname_id',$family->id)->with(['familyfee','payment' => function($query){
        //     $query->latest();
        // }])->latest()->first();

        // //additional family member payment calculation if package booked but not activated
        // if($userpackage->package_status == 'Booked' || $userpackage->package_status == 'Pending'){
        //     $interval = $userpackage->payment[0]->payment_interval;
        //     if($userpackage->package_id == 1 || $userpackage->package_id == 7){
        //         $enrollment = 3000;
        //     }
        //     elseif($userpackage->package_id == 8){
        //         $enrollment = 4000;
        //     }
        //     elseif($userpackage->package_id == 9){
        //         $enrollment = 6000;
        //     }
        //     elseif($userpackage->package_id == 10){
        //         $enrollment = 1000;
        //     }
        //     else{
        //         $enrollment = $userpackage->familyfee->one_registration_fee/ $userpackage->familyfee->family_size;
        //     }
        //     $daily = $userpackage->familyfee->one_monthly_fee/ 30;
        //     if($interval == 'Monthly'){
        //         $paymentDays =  30;
        //         $total = $enrollment + $daily * $paymentDays;
        //     }else if($interval == 'Quarterly'){
        //         $paymentDays =  90;
        //         $total = $enrollment + $daily * $paymentDays;
        //     }else if($interval == 'Half_Yearly'){
        //         $paymentDays =  182;
        //         $total = $enrollment + $daily * $paymentDays;
        //     }else if($interval == 'Yearly'){
        //         $paymentDays =  365;
        //         $total = $enrollment + $daily * $paymentDays;
        //     }            

        //     //comment because of removal of continuation fee 
        //     // if($userpackage->renew_status == 1){
        //     //     $enrollment = $userpackage->familyfee->one_registration_fee/ $userpackage->familyfee->family_size;
        //     //     $daily = $userpackage->familyfee->one_monthly_fee/ 30;
        //     //     if($interval == 'Monthly'){
        //     //         $paymentDays =  30;
        //     //         $total = $enrollment + $daily * $paymentDays;
        //     //     }else if($interval == 'Quarterly'){
        //     //         $paymentDays =  90;
        //     //         $total = $enrollment + $daily * $paymentDays;
        //     //     }else if($interval == 'Half_Yearly'){
        //     //         $paymentDays =  182;
        //     //         $total = $enrollment + $daily * $paymentDays;
        //     //     }else if($interval == 'Yearly'){
        //     //         $paymentDays =  365;
        //     //         $total = $enrollment + $daily * $paymentDays;
        //     //     }                
        //     // }
        //     // elseif($userpackage->renew_status == 2){
        //     //     $enrollment = $userpackage->familyfee->two_continuation_fee/ $userpackage->familyfee->family_size;
        //     //     $daily = $userpackage->familyfee->two_monthly_fee/ 30;
        //     //     if($interval == 'Monthly'){
        //     //         $paymentDays =  30;
        //     //         $total = $enrollment + $daily * $paymentDays;
        //     //     }else if($interval == 'Quarterly'){
        //     //         $paymentDays =  90;
        //     //         $total = $enrollment + $daily * $paymentDays;
        //     //     }else if($interval == 'Half_Yearly'){
        //     //         $paymentDays =  182;
        //     //         $total = $enrollment + $daily * $paymentDays;
        //     //     }else if($interval == 'Yearly'){
        //     //         $paymentDays =  365;
        //     //         $total = $enrollment + $daily * $paymentDays;
        //     //     }      
        //     // }
        //     // elseif($userpackage->renew_status == 3){
        //     //     $enrollment = $userpackage->familyfee->three_continuation_fee/ $userpackage->familyfee->family_size;
        //     //     $daily = $userpackage->familyfee->three_monthly_fee/ 30;
        //     //     if($interval == 'Monthly'){
        //     //         $paymentDays =  30;
        //     //         $total = $enrollment + $daily * $paymentDays;
        //     //     }else if($interval == 'Quarterly'){
        //     //         $paymentDays =  90;
        //     //         $total = $enrollment + $daily * $paymentDays;
        //     //     }else if($interval == 'Half_Yearly'){
        //     //         $paymentDays =  182;
        //     //         $total = $enrollment + $daily * $paymentDays;
        //     //     }else if($interval == 'Yearly'){
        //     //         $paymentDays =  365;
        //     //         $total = $enrollment + $daily * $paymentDays;
        //     //     }    
        //     // }
        // }
        // //additional family member payment calculation if package activated 
        // else{
        //     if($userpackage->package_id == 1 || $userpackage->package_id == 7){
        //         $enrollment = 3000;
        //     }
        //     elseif($userpackage->package_id == 8){
        //         $enrollment = 4000;
        //     }
        //     elseif($userpackage->package_id == 9){
        //         $enrollment = 6000;
        //     }
        //     elseif($userpackage->package_id == 10){
        //         $enrollment = 1000;
        //     }
        //     else{
        //         $enrollment = $userpackage->familyfee->one_registration_fee/ $userpackage->familyfee->family_size;
        //     }
        //     $daily = $userpackage->familyfee->one_monthly_fee/ 30;
        //     $paymentDays =  Carbon::today()->diffInDays(Carbon::parse($userpackage->payment[0]->expiry_date)->addDay(), false);
        //     $total = $enrollment + $daily * $paymentDays;

        //     //comment because of removal of continuation fee 
        //     // if($userpackage->renew_status == 1){
        //     //     $enrollment = $userpackage->familyfee->one_registration_fee/ $userpackage->familyfee->family_size;
        //     //     $daily = $userpackage->familyfee->one_monthly_fee/ 30;
        //     //     $paymentDays =  Carbon::today()->diffInDays($userpackage->payment[0]->expiry_date, false);
        //     //     $total = $enrollment + $daily * $paymentDays;
        //     // }
        //     // elseif($userpackage->renew_status == 2){
        //     //     $enrollment = $userpackage->familyfee->two_continuation_fee/ $userpackage->familyfee->family_size;
        //     //     $daily = $userpackage->familyfee->two_monthly_fee/ 30;
        //     //     $paymentDays =  Carbon::today()->diffInDays($userpackage->payment[0]->expiry_date, false);
        //     //     $total = $enrollment + $daily * $paymentDays;
        //     // }
        //     // elseif($userpackage->renew_status == 3){
        //     //     $enrollment = $userpackage->familyfee->three_continuation_fee/ $userpackage->familyfee->family_size;
        //     //     $daily = $userpackage->familyfee->three_monthly_fee/ 30;
        //     //     $paymentDays =  Carbon::today()->diffInDays($userpackage->payment[0]->expiry_date, false);
        //     //     $total = $enrollment + $daily * $paymentDays;
        //     // }
        // }
        // return response()->json(['userpackage'=>$userpackage,'enrollment_fee'=>round($enrollment,2),'daily_fee'=> round($daily,2),'payment_days' => $paymentDays, 'total_payment' => round($total,2)]);
    }

    //initial payment of additional family member
    public function initialAdditionalPayment(Request $request){
        if($request->token){
            //payment verification (app)
            $khaltiVerify = Helper::khaltiVerify($request);
            if (isset($khaltiVerify['idx'])) {
                $user = Member::where('member_id',Auth::user()->id)->first();
                $payment = new AdditionalPackagePayment();
                $payment->userpackage_id = $request->userpackage_id;
                $payment->payment_days = $request->input('payment_days');
                $payment->payment_method = 'Khalti';
                $payment->payment_date = Carbon::now();
                $payment->amount = $request->input('amount')/100;
                $payment->paidmember_id = $user->id;
                $saved = $payment->save();

                if($saved){
                    // bulk added members payment calculation
                    $package = UserPackage::find($request->input('userpackage_id'));
                    $family = Family::whereIn('id',$request->input('family_id'))->get();
                    $count = 0;
                    foreach($family as $fy){
                        $member = Member::with('user')->find($fy->member_id);
                        if($member->member_type == null){
                            $member->member_type = 'Dependent Member' ;
                            $member->update();
        
                            $families = Family::where('member_id',$fy->member_id)->where('id','!=',$fy->id)->get();
                            foreach($families as $fam){
                                $fam->delete();
                            }
                        }
                        $member->user->is_verified = 1;
                        $member->user->update();
                            
                        $fy->approved = 1;            
                        $fy->payment_status = 1;            
                        $fy->additional_status = 1;            
                        $fy->online_consultation = $package->package->online_consultation;            
                        $fy->update();

                        if($package->package_id != 10){
                            $age = Carbon::now()->format('Y') - substr($member->dob, 0, 4);
                            if($age < 60){
                                $insurance = new PackageInsuranceDetail();
                                $insurance->user_id = $member->member_id;
                                $insurance->userpackage_id = $package->id;
                                $insurance->status = 0;
                                $insurance->save();
                            }
                        }

                        $additional = new AdditionalMemberPayment();
                        $additional->additionalpayment_id = $payment->id;
                        $additional->member_id = $member->id;
                        $additional->save();
                        
                        $count++;
                    }
                    
                    $familyCount = Family::where('family_id',$package->familyname_id)->where('approved',1)->where('payment_status',1)->count();
                    if($package->package_id != 10){
                        $familyCount = $familyCount + 1;
                    }
            
                    if($familyCount > $package->familyfee->family_size){
                        $packagefee = PackageFee::where('package_id',$package->package_id)->where('family_size',$familyCount)->first();
                        $package->family_id = $packagefee->id;
                    }
                    $package->additonal_members = $package->additonal_members + $count;
                    $package->update();

                    return response()->json([
                        'success' => 'Payment Completed.',
                    ]);

                    // single added member payment calculation
                    // $package = UserPackage::find($request->input('userpackage_id'));
                    // $family = Family::find($request->input('family_id'));
                    // $member = Member::find($family->member_id);
                    // if($member->member_type == null){
                    //     $member->member_type = 'Dependent Member' ;
                    //     $member->update();

                    //     $families = Family::where('member_id',$family->member_id)->where('id','!=',$request->input('family_id'))->get();
                    //     foreach($families as $fam){
                    //         $fam->delete();
                    //     }
                    // }    

                    // $family->approved = 1;            
                    // $family->payment_status = 1;            
                    // $family->online_consultation = $package->package->online_consultation;            
                    // $family->update();
        
                    // $package->additonal_members = $package->additonal_members + 1;
                    // $package->update();

                    // // $kycs = KnowYourCustomer::where('user_id',$member->member_id)->first();
                    // if($package->package_id != 10){
                    //     $age = Carbon::now()->format('Y') - substr($member->dob, 0, 4);
                    //     if($age < 60){
                    //         $insurance = new PackageInsuranceDetail();
                    //         $insurance->user_id = $member->member_id;
                    //         $insurance->userpackage_id = $package->id;
                    //         // if($kycs == null || $kycs->status == 'Pending' || $kycs->status == 'Rejected'){
                    //         //     $insurance->status = 0;
                    //         // }else{
                    //         //     $insurance->status = 1;
                    //         // }
                    //         $insurance->status = 0;
                    //         $insurance->save();
                    //     }
                    // }

                    // return response()->json([
                    //     'success' => 'Payment Completed.',
                    // ]);
                }
            } else {
                return response()->json([
                    'error' => 'Something went Wrong.',
                ]);
            }
        }else{
            //payment verification (web)
            $khaltiLookup = Helper::khaltiLookup($request->pidx);
            $responseData = $khaltiLookup->getData();
            if(isset($responseData->status) && $responseData->status === 'Completed'){
                $user = Member::where('member_id',Auth::user()->id)->first();
                $payment = new AdditionalPackagePayment();
                $payment->userpackage_id = $request->userpackage_id;
                $payment->payment_days = $request->input('payment_days');
                $payment->payment_method = 'Khalti';
                $payment->payment_date = Carbon::now();
                $payment->amount = $request->input('amount')/100;
                $payment->paidmember_id = $user->id;
                $saved = $payment->save();
            } else {
                return response()->json([
                    'error' => 'Payment Pending.',
                ],400);
            }
        }
    }

    //additional family member payment calculation according to the selected payment interval of subscription package 
    // public function calculateAdditionalPayment(Request $request,$id){
    //     $userpackage = UserPackage::with(['familyfee','payment' => function($query){
    //         $query->latest();
    //     }])->find($id);

    //     $daily = $userpackage->familyfee->one_monthly_fee/30;

    //     //comment because of removal of continuation fee 
    //     // if($userpackage->renew_status == 1){
    //     //     $daily = $userpackage->familyfee->one_monthly_fee/30;
    //     // }elseif($userpackage->renew_status == 2){
    //     //     $daily = $userpackage->familyfee->two_monthly_fee/30;
    //     // }elseif($userpackage->renew_status == 3){
    //     //     $daily = $userpackage->familyfee->three_monthly_fee/30;
    //     // }
        
    //     if($userpackage->grace_period == 0){
    //         if($request->payment_interval == 'Monthly'){
    //             $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthNoOverflow()->subDay()->toDateString();
    //             $paymentDays = Carbon::today()->diffInDays($date,false);
    //         }
    //         elseif($request->payment_interval == 'Quarterly'){
    //             $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthsNoOverflow(3)->subDay()->toDateString();
    //             $paymentDays = Carbon::today()->diffInDays($date,false);
    //         }
    //         elseif($request->payment_interval == 'Half_Yearly'){
    //             $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthsNoOverflow(6)->subDay()->toDateString();
    //             $paymentDays = Carbon::today()->diffInDays($date,false);
    //         }
    //         elseif($request->payment_interval == 'Yearly'){
    //             $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthsNoOverflow(12)->subDay()->toDateString();
    //             $paymentDays = Carbon::today()->diffInDays($date,false);
    //         }
    //     }else{
    //         if($request->payment_interval == 'Monthly'){
    //             $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthNoOverflow()->subDay()->toDateString();
    //             $paymentDays = Carbon::parse($userpackage->payment[0]->expiry_date)->addDay()->diffInDays($date,false);
    //         }
    //         elseif($request->payment_interval == 'Quarterly'){
    //             $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthsNoOverflow(3)->subDay()->toDateString();
    //             $paymentDays = Carbon::parse($userpackage->payment[0]->expiry_date)->addDay()->diffInDays($date,false);
    //         }
    //         elseif($request->payment_interval == 'Half_Yearly'){
    //             $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthsNoOverflow(6)->subDay()->toDateString();
    //             $paymentDays = Carbon::parse($userpackage->payment[0]->expiry_date)->addDay()->diffInDays($date,false);
    //         }
    //         elseif($request->payment_interval == 'Yearly'){
    //             $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthsNoOverflow(12)->subDay()->toDateString();
    //             $paymentDays = Carbon::parse($userpackage->payment[0]->expiry_date)->addDay()->diffInDays($date,false);
    //         }
    //     }
       
    //     $total = $userpackage->additonal_members * $daily * $paymentDays;
    //     return response()->json(['userpackage_id'=>$userpackage->id,'daily_fee'=> round($daily,2),'payment_days' => $paymentDays, 'total_payment' => round($total,2)]);
    // }

    //additional family member payment calculation, new member payment calculation according to the selected payment interval of subscription package 
    public function calculateJointPayment(Request $request,$id){
        $count = $request->family_count;
        $user = Member::where('member_id',Auth::user()->id)->first();
        $family = FamilyName::where('primary_member_id',$user->id)->withCount('family')->first();
        $userpackage = UserPackage::with(['familyfee','payment' => function($query){
            $query->latest();
        }])->find($id);
        if($userpackage->package_id == 10){
            $familyCount = $family->family_count;
        }else{
            $familyCount = $family->family_count + 1;
        }
        if($userpackage->package_id == 1 || $userpackage->package_id == 7){
            $enrollment = 3000;
        }
        elseif($userpackage->package_id == 8){
            $enrollment = 4000;
        }
        elseif($userpackage->package_id == 9){
            $enrollment = 6000;
        }
        elseif($userpackage->package_id == 10){
            $enrollment = 1000;
        }
        else{
            if($familyCount > $userpackage->familyfee->family_size){
                $fee = PackageFee::where('package_id',$userpackage->package_id)->where('family_size',$familyCount)->first();
                $enrollment = $fee->one_registration_fee/ $familyCount;
            }else{
                $enrollment = $userpackage->familyfee->one_registration_fee/ $familyCount;
            }
        }
        if($familyCount > $userpackage->familyfee->family_size){
            $fee = PackageFee::where('package_id',$userpackage->package_id)->where('family_size',$familyCount)->first();
            $daily = $fee->one_monthly_fee/ 30;
        }
        else{
            $daily = $userpackage->familyfee->one_monthly_fee/ 30;
        } 
        //comment because of removal of continuation fee 
        // if($userpackage->renew_status == 1){
        //     $daily = $userpackage->familyfee->one_monthly_fee/30;
        //     $enrollment = $userpackage->familyfee->one_registration_fee/ $userpackage->familyfee->family_size;
        // }elseif($userpackage->renew_status == 2){
        //     $daily = $userpackage->familyfee->two_monthly_fee/30;
        //     $enrollment = $userpackage->familyfee->two_continuation_fee/ $userpackage->familyfee->family_size;
        // }elseif($userpackage->renew_status == 3){
        //     $daily = $userpackage->familyfee->three_monthly_fee/30;
        //     $enrollment = $userpackage->familyfee->three_continuation_fee/ $userpackage->familyfee->family_size;
        // }
        
        if($userpackage->grace_period == 0){
            if($request->payment_interval == 'Monthly'){
                $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthNoOverflow()->subDay()->toDateString();
                $paymentDays = Carbon::today()->diffInDays($date,false);
                $discount = 0;
            }
            elseif($request->payment_interval == 'Quarterly'){
                $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthsNoOverflow(3)->subDay()->toDateString();
                $paymentDays = Carbon::today()->diffInDays($date,false);
                $discount = 1;
            }
            elseif($request->payment_interval == 'Half_Yearly'){
                $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthsNoOverflow(6)->subDay()->toDateString();
                $paymentDays = Carbon::today()->diffInDays($date,false);
                $discount = 2;
            }
            elseif($request->payment_interval == 'Yearly'){
                $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthsNoOverflow(12)->subDay()->toDateString();
                $paymentDays = Carbon::today()->diffInDays($date,false);
                $discount = 5;
            }
        }else{
            if($request->payment_interval == 'Monthly'){
                $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthNoOverflow()->subDay()->toDateString();
                $paymentDays = Carbon::parse($userpackage->payment[0]->expiry_date)->addDay()->diffInDays($date,false);
                $discount = 0;
            }
            elseif($request->payment_interval == 'Quarterly'){
                $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthsNoOverflow(3)->subDay()->toDateString();
                $paymentDays = Carbon::parse($userpackage->payment[0]->expiry_date)->addDay()->diffInDays($date,false);
                $discount = 1;
            }
            elseif($request->payment_interval == 'Half_Yearly'){
                $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthsNoOverflow(6)->subDay()->toDateString();
                $paymentDays = Carbon::parse($userpackage->payment[0]->expiry_date)->addDay()->diffInDays($date,false);
                $discount = 2;
            }
            elseif($request->payment_interval == 'Yearly'){
                $date = Carbon::parse($userpackage->payment[0]->expiry_date)->addMonthsNoOverflow(12)->subDay()->toDateString();
                $paymentDays = Carbon::parse($userpackage->payment[0]->expiry_date)->addDay()->diffInDays($date,false);
                $discount = 5;
            }
        }
        $dailyFee = $daily * $paymentDays * $count;
        $discountedFee = $discount/100 * $dailyFee;
        $totalMonthlyFee = $dailyFee - $discountedFee;
        $totalNewAdditional = $enrollment * $count + $totalMonthlyFee;
        return response()->json(['userpackage_id'=>$userpackage->id,'enrollment_fee'=>round($enrollment,2),'daily_fee'=> round($daily,2),'payment_days' => $paymentDays, 'discount' => $discount, 'discount_amount'=> round($discountedFee,2),'total_newadditonal_payment' => round($totalNewAdditional,2)]);
    }

    public function jointPayment(Request $request)
    {
        if($request->token){
            //payment verification (app)
            $khaltiVerify = Helper::khaltiVerify($request);
            if (isset($khaltiVerify['idx'])) {
                $package = UserPackage::with(['familyname.primary.member.insurance','familyname.family.member.user.insurance'])->find($request->input('id'));
                $payments = PackagePayment::where('userpackage_id', $package->id)->latest()->first();
                $user = Member::where('member_id',Auth::user()->id)->first();
                //insurance activate
                if($package->package_id != 10){
                    $primaryinsurance = PackageInsuranceDetail::where('userpackage_id',$package->id)->where('user_id',$package->familyname->primary->member_id)->first();
                    if($primaryinsurance->status != 0){
                        $primaryinsurance->status = 1;
                        $primaryinsurance->update();
                    }

                    foreach($package->familyname->family as $family){
                        $familyinsurance =  PackageInsuranceDetail::where('userpackage_id',$package->id)->where('user_id',$family->member->member_id)->first();
                        if($familyinsurance->status != 0){
                            $familyinsurance->status = 1;
                            $familyinsurance->update();
                        }
                    }
                }
                //package activate
                $package->status = 1;
                $package->package_status = 'Activated';
                $package->grace_period = 0;
                $package->update();

                //subscription payment store
                $payment = new PackagePayment();
                $payment->userpackage_id = $package->id;
                $payment->payment_interval = $request->input('payment_interval');
                $payment->payment_method = 'Khalti';
                $payment->amount = $request->input('package_amount');
                $payment->payment_date = Carbon::parse($payments->expiry_date)->addDay();
                $payment->paidmember_id = $user->id;
                $expiry = Carbon::parse($payments->expiry_date)->addDay();
                $days = Carbon::today()->diffInDays($expiry);
                if($payment->payment_interval == 'Monthly'){
                    $payment->expiry_date = Carbon::parse($payments->expiry_date)->addMonthNoOverflow()->subDay()->toDateString();
                    $payment->grace_days = $days;
                }
                elseif($payment->payment_interval == 'Quarterly'){
                    $payment->expiry_date = Carbon::parse($payments->expiry_date)->addMonthsNoOverflow(3)->subDay()->toDateString();
                    $payment->grace_days = $days;
                }
                elseif($payment->payment_interval == 'Half_Yearly'){
                    $payment->expiry_date = Carbon::parse($payments->expiry_date)->addMonthsNoOverflow(6)->subDay()->toDateString();
                    $payment->grace_days = $days;
                }
                elseif($payment->payment_interval == 'Yearly'){
                    $payment->expiry_date = Carbon::parse($payments->expiry_date)->addMonthsNoOverflow(12)->subDay()->toDateString();
                    $payment->grace_days = $days;
                }
                $saved = $payment->save();

                //additional member payment
                // if($request->input('additionalamount') != 0){
                //     $additionalPayment = new AdditionalPackagePayment();
                //     $additionalPayment->userpackage_id = $package->id;
                //     $additionalPayment->payment_days = $request->input('payment_days');
                //     $additionalPayment->payment_method = 'Khalti';
                //     $additionalPayment->payment_date = Carbon::now();
                //     $additionalPayment->amount = $request->input('additionalamount');
                //     $additionalPayment->paidmember_id = $user->id;
                //     $saved =$additionalPayment->save();
                // }

                //new additional member payment
                $newadditionalPayment = new AdditionalPackagePayment();
                $newadditionalPayment->userpackage_id = $package->id;
                $newadditionalPayment->payment_days = $request->input('payment_days');
                $newadditionalPayment->payment_method = 'Khalti';
                $newadditionalPayment->payment_date = Carbon::now();
                $newadditionalPayment->amount = $request->input('new_additional_amount');
                $newadditionalPayment->paidmember_id = $user->id;
                $saved =$newadditionalPayment->save();

                if($saved){
                    // bulk added members payment
                    $family = Family::whereIn('id',$request->input('family_id'))->get();
                    $count = 0;
                    foreach($family as $fy){
                        $member = Member::with('user')->find($fy->member_id);
                        if($member->member_type == null){
                            $member->member_type = 'Dependent Member' ;
                            $member->update();
        
                            $families = Family::where('member_id',$fy->member_id)->where('id','!=',$fy->id)->get();
                            foreach($families as $fam){
                                $fam->delete();
                            }
                        }
                        $member->user->is_verified = 1;
                        $member->user->update();
                            
                        $fy->approved = 1;            
                        $fy->payment_status = 1;            
                        $fy->additional_status = 1;            
                        $fy->online_consultation = $package->package->online_consultation;            
                        $fy->update();

                        if($package->package_id != 10){
                            $age = Carbon::now()->format('Y') - substr($member->dob, 0, 4);
                            if($age < 60){
                                $insurance = new PackageInsuranceDetail();
                                $insurance->user_id = $member->member_id;
                                $insurance->userpackage_id = $package->id;
                                $insurance->status = 0;
                                $insurance->save();
                            }
                        }

                        $additional = new AdditionalMemberPayment();
                        $additional->additionalpayment_id = $newadditionalPayment->id;
                        $additional->member_id = $member->id;
                        $additional->save();
                        
                        $count++;
                    }
                    $familyCount = Family::where('family_id',$package->familyname_id)->where('approved',1)->where('payment_status',1)->count();
                    if($package->package_id != 10){
                        $familyCount = $familyCount + 1;
                    }
            
                    if($familyCount > $package->familyfee->family_size){
                        $packagefee = PackageFee::where('package_id',$package->package_id)->where('family_size',$familyCount)->first();
                        $package->family_id = $packagefee->id;
                    }
                    $package->additonal_members = $package->additonal_members + $count;
                    $package->update();

                    return response()->json([
                        'success' => 'Payment Completed.',
                    ]);
                    // single added member payment
                    // $family = Family::find($request->input('family_id'));
                    // $member = Member::find($family->member_id);
                    // $member->member_type = 'Dependent Member' ;
        
                    // $families = Family::where('member_id',$family->member_id)->where('id','!=',$request->input('family_id'))->get();
                    // foreach($families as $fam){
                    //     $fam->delete();
                    // }
                    // $family->approved = 1;            
                    // $family->update();

                    // $package->additonal_members = $package->additonal_members + 1;
                    // $package->update();

                    // if($package->package_id != 10){
                    //     $age = Carbon::now()->format('Y') - substr($member->dob, 0, 4);
                    //     // $kycs = KnowYourCustomer::where('user_id',$member->member_id)->first();
                    //     if($age < 60){
                    //         $insurance = new PackageInsuranceDetail();
                    //         $insurance->user_id = $member->member_id;
                    //         $insurance->userpackage_id = $package->id;
                    //         // if($kycs == null || $kycs->status == 'Pending' || $kycs->status == 'Rejected'){
                    //         //     $insurance->status = 0;
                    //         // }else{
                    //         //     $insurance->status = 1;
                    //         // }
                    //         $insurance->status = 0;
                    //         $insurance->save();
                    //     }
                    // }
                }
            } else {
                return response()->json([
                    'error' => 'Something went Wrong.',
                ]);
            } 
        }else{
            //payment verification (web)
            $khaltiLookup = Helper::khaltiLookup($request->pidx);
            $responseData = $khaltiLookup->getData();
            if(isset($responseData->status) && $responseData->status === 'Completed'){
                $package = UserPackage::with(['familyname.primary.member.insurance','familyname.family.member.user.insurance'])->find($request->input('id'));
                $payments = PackagePayment::where('userpackage_id', $package->id)->latest()->first();
                $user = Member::where('member_id',Auth::user()->id)->first();
                //insurance activate
                if($package->package_id != 10){
                    $primaryinsurance = PackageInsuranceDetail::where('userpackage_id',$package->id)->where('user_id',$package->familyname->primary->member_id)->first();
                    if($primaryinsurance->status != 0){
                        $primaryinsurance->status = 1;
                        $primaryinsurance->update();
                    }

                    foreach($package->familyname->family as $family){
                        $familyinsurance =  PackageInsuranceDetail::where('userpackage_id',$package->id)->where('user_id',$family->member->member_id)->first();
                        if($familyinsurance->status != 0){
                            $familyinsurance->status = 1;
                            $familyinsurance->update();
                        }
                    }
                }
                //package activate
                $package->status = 1;
                $package->package_status = 'Activated';
                $package->grace_period = 0;
                $package->update();

                //subscription payment store
                $payment = new PackagePayment();
                $payment->userpackage_id = $package->id;
                $payment->payment_interval = $request->input('payment_interval');
                $payment->payment_method = 'Khalti';
                $payment->amount = $request->input('package_amount');
                $payment->payment_date = Carbon::parse($payments->expiry_date)->addDay();
                $payment->paidmember_id = $user->id;
                $expiry = Carbon::parse($payments->expiry_date)->addDay();
                $days = Carbon::today()->diffInDays($expiry);
                if($payment->payment_interval == 'Monthly'){
                    $payment->expiry_date = Carbon::parse($payments->expiry_date)->addMonthNoOverflow()->subDay()->toDateString();
                    $payment->grace_days = $days;
                }
                elseif($payment->payment_interval == 'Quarterly'){
                    $payment->expiry_date = Carbon::parse($payments->expiry_date)->addMonthsNoOverflow(3)->subDay()->toDateString();
                    $payment->grace_days = $days;
                }
                elseif($payment->payment_interval == 'Half_Yearly'){
                    $payment->expiry_date = Carbon::parse($payments->expiry_date)->addMonthsNoOverflow(6)->subDay()->toDateString();
                    $payment->grace_days = $days;
                }
                elseif($payment->payment_interval == 'Yearly'){
                    $payment->expiry_date = Carbon::parse($payments->expiry_date)->addMonthsNoOverflow(12)->subDay()->toDateString();
                    $payment->grace_days = $days;
                }
                $saved = $payment->save();

                //additional member payment
                // if($request->input('additionalamount') != 0){
                //     $additionalPayment = new AdditionalPackagePayment();
                //     $additionalPayment->userpackage_id = $package->id;
                //     $additionalPayment->payment_days = $request->input('payment_days');
                //     $additionalPayment->payment_method = 'Khalti';
                //     $additionalPayment->payment_date = Carbon::now();
                //     $additionalPayment->amount = $request->input('additionalamount');
                //     $additionalPayment->paidmember_id = $user->id;
                //     $saved =$additionalPayment->save();
                // }

                //new additional member payment
                $newadditionalPayment = new AdditionalPackagePayment();
                $newadditionalPayment->userpackage_id = $package->id;
                $newadditionalPayment->payment_days = $request->input('payment_days');
                $newadditionalPayment->payment_method = 'Khalti';
                $newadditionalPayment->payment_date = Carbon::now();
                $newadditionalPayment->amount = $request->input('new_additional_amount');
                $newadditionalPayment->paidmember_id = $user->id;
                $saved =$newadditionalPayment->save();

                if($saved){
                    // bulk added members payment
                    $family = Family::whereIn('id',$request->input('family_id'))->get();
                    $count = 0;
                    foreach($family as $fy){
                        $member = Member::with('user')->find($fy->member_id);
                        if($member->member_type == null){
                            $member->member_type = 'Dependent Member' ;
                            $member->update();
        
                            $families = Family::where('member_id',$fy->member_id)->where('id','!=',$fy->id)->get();
                            foreach($families as $fam){
                                $fam->delete();
                            }
                        }
                        $member->user->is_verified = 1;
                        $member->user->update();
                            
                        $fy->approved = 1;            
                        $fy->payment_status = 1;            
                        $fy->additional_status = 1;            
                        $fy->online_consultation = $package->package->online_consultation;            
                        $fy->update();

                        if($package->package_id != 10){
                            $age = Carbon::now()->format('Y') - substr($member->dob, 0, 4);
                            if($age < 60){
                                $insurance = new PackageInsuranceDetail();
                                $insurance->user_id = $member->member_id;
                                $insurance->userpackage_id = $package->id;
                                $insurance->status = 0;
                                $insurance->save();
                            }
                        }

                        $additional = new AdditionalMemberPayment();
                        $additional->additionalpayment_id = $newadditionalPayment->id;
                        $additional->member_id = $member->id;
                        $additional->save();
                        
                        $count++;
                    }
                    $familyCount = Family::where('family_id',$package->familyname_id)->where('approved',1)->where('payment_status',1)->count();
                    if($package->package_id != 10){
                        $familyCount = $familyCount + 1;
                    }
            
                    if($familyCount > $package->familyfee->family_size){
                        $packagefee = PackageFee::where('package_id',$package->package_id)->where('family_size',$familyCount)->first();
                        $package->family_id = $packagefee->id;
                    }
                    $package->additonal_members = $package->additonal_members + $count;
                    $package->update();

                    return response()->json([
                        'success' => 'Payment Completed.',
                    ]);
                    // single added member payment
                    // $family = Family::find($request->input('family_id'));
                    // $member = Member::find($family->member_id);
                    // $member->member_type = 'Dependent Member' ;
        
                    // $families = Family::where('member_id',$family->member_id)->where('id','!=',$request->input('family_id'))->get();
                    // foreach($families as $fam){
                    //     $fam->delete();
                    // }
                    // $family->approved = 1;            
                    // $family->update();

                    // $package->additonal_members = $package->additonal_members + 1;
                    // $package->update();

                    // if($package->package_id != 10){
                    //     $age = Carbon::now()->format('Y') - substr($member->dob, 0, 4);
                    //     // $kycs = KnowYourCustomer::where('user_id',$member->member_id)->first();
                    //     if($age < 60){
                    //         $insurance = new PackageInsuranceDetail();
                    //         $insurance->user_id = $member->member_id;
                    //         $insurance->userpackage_id = $package->id;
                    //         // if($kycs == null || $kycs->status == 'Pending' || $kycs->status == 'Rejected'){
                    //         //     $insurance->status = 0;
                    //         // }else{
                    //         //     $insurance->status = 1;
                    //         // }
                    //         $insurance->status = 0;
                    //         $insurance->save();
                    //     }
                    // }
                }
            } else {
                return response()->json([
                    'error' => 'Payment Pending.',
                ],400);
            }
        }
    }

    //for package renew case
    public function checkfamilysize($id){
        $member = Member::where('member_id', Auth::user()->id)->first();
        $familyid = FamilyName::where('primary_member_id', $member->id)->first();
        $userpackage = UserPackage::with('familyfee')->find($id);
        if($userpackage->package_id != 10){
            $totalfamily = Family::where('family_id', $familyid->id)->where('approved', '1')->count() + 1;
        }else{
            $totalfamily = Family::where('family_id', $familyid->id)->where('approved', '1')->whereHas('member.user',function($query){
                $query->where('is_verified',1);
            })->count();
        }
        $packagefee = PackageFee::where('package_id', $userpackage->package_id)->where('family_size', $totalfamily)->first();
        if ($packagefee) {
            return response()->json(['packagefee' => $packagefee,'message' => 'success']);
            // $packageMembers = $userpackage->familyfee->family_size + $userpackage->additonal_members;
            // if($totalfamily == $packageMembers){
            //     return response()->json(['packagefee' => $packagefee,'message' => 'success']);
            // }else{
            //     return response()->json(['message' => 'You cannot renew the package due to additional family members. Please buy package.']); 
            // }
        } else {
            $min = PackageFee::where('package_id', $userpackage->package_id)->min('family_size');
            $max = PackageFee::where('package_id', $userpackage->package_id)->max('family_size');
            return response()->json(['message' => 'The family size must be between ' . $min . ' to ' . $max . '.']);
        }
       
    }

    public function discardPackage(){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $familyname = FamilyName::where('primary_member_id',$member->id)->first();
        if($familyname){
            $userpackage = UserPackage::where('familyname_id',$familyname->id)->where('package_status','Not Booked')->latest()->first();
        }else{
            $userpackage = UserPackage::where('member_id',$member->id)->latest()->first();
        }
        $deleted = $userpackage->delete();
        if($deleted){
            return response()->json(['success' => 'Your previous booked package has been switched with this package.']);
        }
    }
}
