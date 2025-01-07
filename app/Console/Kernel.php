<?php

namespace App\Console;

use App\Helper\Helper;
use App\Mail\NotifyBeforHour;
use App\Models\BookingNotification;
use App\Models\BookingReview;
use App\Models\Doctor;
use App\Models\Family;
use App\Models\FollowUp;
use App\Models\Member;
use App\Models\PackageInsuranceDetail;
use App\Models\Slots;
use App\Models\StoreToken;
use App\Models\UploadMedicalHistoryConsultation;
use App\Models\User;
use App\Models\UserPackage;
use App\Models\WaterIntake;
use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            Slots::where('expiry_date', '<', Carbon::now()->toDateTimeString())->delete();

            $bookings = BookingReview::where('booking_status', 'Scheduled')->orWhere('booking_status', 'Completed')->get();

            foreach ($bookings as $item) {
                $slotId = $item->booking_id;
                $slot = Slots::where('id', $slotId)->first();

                $date1 = Carbon::parse($slot->expiry_date);
                $date2 = Carbon::now();
                $time = $date1->diffInMinutes($date2);

                if ($time == 60) {
                    $user = User::where('id', $item->user_id)->first();
                    $userEmail = $user->email;
                    $userPhone = $user->phone;

                    $d = $item->doctor_id;
                    $doctor = Doctor::where('id', $d)->first();
                    $doctorInfo = User::where('id', $doctor->doctor_id)->first();
                    Mail::to($userEmail)->send(new NotifyBeforHour());
                    send_sms($userPhone, ' Appointment pending for ' . $doctorInfo->name . '. Phone:' . $doctorInfo->phone . ' ' . 'https://ghargharmadoctor.page.link/doctorhomepage');
                }
            }
        })->everyMinute();


        //change package status
        $schedule->call(function () {
            $package = '';
            $package = UserPackage::with(['familyname.primary.member.insurance','familyname.family.member.user.insurance','dates'=> function ($query) {
                $query->latest();
            }, 'payment' => function ($query) {
                $query->latest();
            }])->where('package_status','Activated')->latest()->get();
            foreach ($package as $pkg) {       
                // for package expiration         
                if ($pkg->expiry_date != null && Carbon::parse($pkg->expiry_date)->addDay()->toDateString() <= Carbon::now()->toDateString()) {
                    $userpackage = UserPackage::find($pkg->id);
                    $userpackage->status = 1;
                    $userpackage->package_status = 'Expired';
                    $userpackage->update();

                    //expire insurance
                    if($userpackage->package_id != 10){
                        $primaryinsurance = PackageInsuranceDetail::where('userpackage_id',$pkg->id)->where('user_id',$userpackage->familyname->primary->member_id)->first();
                        if($primaryinsurance){
                            $primaryinsurance->delete();
                        }

                        foreach($userpackage->familyname->family as $family){
                            $familyinsurance =  PackageInsuranceDetail::where('userpackage_id',$pkg->id)->where('user_id',$family->member->member_id)->first();
                            if($familyinsurance){
                                $familyinsurance->delete();
                            }
                        }
                    }
                    
                    //package expired notification
                    $member = Member::find($userpackage->familyname->primary_member_id);
                    $user = StoreToken::where('user_id', $member->member_id)->first();
                    if($user != null){
                        $notification_id = $user->device_key;
                        $title = 'Package Expired';
                        $message = "Your subscription package has been expired.";
                        $type = 'Package Expired';
                        send_notification_FCM($notification_id, $title, $message, $type);
                    }
                } else {
                    foreach ($pkg->payment->take(1) as $payment) {
                        //for grace period
                        if ($payment->expiry_date != null && Carbon::parse($payment->expiry_date)->addDay()->toDateString() <= Carbon::now()->toDateString()){
                            if(Carbon::today()->diffInDays(Carbon::parse($payment->expiry_date)->addDay()) < 3){
                                $userpackage = UserPackage::find($pkg->id);
                                $userpackage->status = 1;
                                $userpackage->package_status = 'Activated';
                                $userpackage->grace_period = 1; // in grace period
                                $userpackage->update();

                                if($userpackage->package_id != 10){
                                    $primaryinsurance = PackageInsuranceDetail::where('userpackage_id',$pkg->id)->where('user_id',$userpackage->familyname->primary->member_id)->first();
                                    if($primaryinsurance && $primaryinsurance->status != 0){
                                        $primaryinsurance->status = 1;
                                        $primaryinsurance->update();
                                    }

                                    foreach($userpackage->familyname->family as $family){
                                        $familyinsurance =  PackageInsuranceDetail::where('userpackage_id',$pkg->id)->where('user_id',$family->member->member_id)->first();
                                        if($familyinsurance && $familyinsurance->status != 0){
                                            $familyinsurance->status = 1;
                                            $familyinsurance->update();
                                        }
                                    }
                                }
                                // $days = Carbon::parse($payment->expiry_date)->diffInDays(Carbon::today());
                                $extended_date = Carbon::parse($payment->expiry_date)->addDays(3)->format('Y-m-d');
                                // if ($days == 0) {
                                //     $remaining = 3;
                                // } elseif ($days == 1) {
                                //     $remaining = 2;
                                // } elseif ($days == 2) {
                                //     $remaining = 1;
                                // }
                                //grace period notification
                                $member = Member::find($userpackage->familyname->primary_member_id);
                                $user = StoreToken::where('user_id', $member->member_id)->first();

                                //uncomment this code after everyMinute is changed to daily
                                // if($user != null){
                                //     $notification_id = $user->device_key;
                                //     $title = 'Package Grace Period';
                                //     $message = "Your subscription package payment has been expired and extended until $extended_date.";
                                //     $type = 'Grace Period';
                                //     send_notification_FCM($notification_id, $title, $message, $type);
                                // }
                            }else{
                                $userpackage = UserPackage::find($pkg->id);
                                $userpackage->status = 0;
                                $userpackage->package_status = 'Deactivated';
                                $userpackage->grace_period = 2; // grace period exceeded
                                $userpackage->update();

                                foreach($userpackage->dates->reverse()->take(1) as $date){
                                    if($date->status == 'Pending' || $date->status == 'Lab In Progress'){
                                        $date->reschedule_status = 1;
                                        $date->update();
                                    }
                                }

                                //freeze insurance
                                if($userpackage->package_id != 10){
                                    $primaryinsurance = PackageInsuranceDetail::where('userpackage_id',$pkg->id)->where('user_id',$userpackage->familyname->primary->member_id)->first();
                                    if($primaryinsurance && $primaryinsurance->status != 0){
                                        $primaryinsurance->status = 2; //insurance freeze
                                        $primaryinsurance->update();
                                    }

                                    foreach($userpackage->familyname->family as $family){
                                        $familyinsurance =  PackageInsuranceDetail::where('userpackage_id',$pkg->id)->where('user_id',$family->member->member_id)->first();
                                        if($familyinsurance && $familyinsurance->status != 0){
                                            $familyinsurance->status = 2; //insurance freeze
                                            $familyinsurance->update();
                                        }
                                    }
                                }

                                //grace period end notification
                                $member = Member::find($userpackage->familyname->primary_member_id);
                                $user = StoreToken::where('user_id', $member->member_id)->first();
                                if($user != null){
                                    $notification_id = $user->device_key;
                                    $title = 'Package Grace Period Ended';
                                    $message = "Your subscription package grace period has ended. Your package and insurance have also been deactivated.";
                                    $type = 'Grace Period End';
                                    send_notification_FCM($notification_id, $title, $message, $type);
                                }
                            }
                        } 
                    }
                }
            }
        })->everyMinute(); //needs to be changed everyday at midnight i.e. daily()

        //comment because of change in the flow of package activation
        // $schedule->call(function () {
        //     $package = '';
        //     $package = UserPackage::with(['familyname.primary.member.insurance','familyname.family.member.user.insurance','dates'=> function ($query) {
        //         $query->latest();
        //     }, 'payment' => function ($query) {
        //         $query->latest();
        //     }])->whereIn('package_status',['Booked','Activated'])->latest()->get();
        //     foreach ($package as $pkg) {       
        //         // for package expiration         
        //         if ($pkg->expiry_date != null && $pkg->expiry_date <= Carbon::now()->toDateString()) {
        //             $userpackage = UserPackage::find($pkg->id);
        //             $userpackage->status = 1;
        //             $userpackage->package_status = 'Expired';
        //             $userpackage->update();

        //             //expire insurance
        //             $primaryinsurance = InsuranceDetails::where('userpackage_id',$pkg->id)->where('user_id',$userpackage->familyname->primary->member_id)->first();
        //             $primaryinsurance->delete();

        //             foreach($userpackage->familyname->family as $family){
        //                 $familyinsurance =  InsuranceDetails::where('userpackage_id',$pkg->id)->where('user_id',$family->member->member_id)->first();
        //                 $familyinsurance->delete();
        //             }
                    
        //             //package expired notification
        //             $member = Member::find($userpackage->familyname->primary_member_id);
        //             $user = StoreToken::where('user_id', $member->member_id)->first();
        //             if($user != null){
        //                 $notification_id = $user->device_key;
        //                 $title = 'Package Expired';
        //                 $message = "Your subscription package has been expired.";
        //                 $type = 'Package Expired';
        //                 send_notification_FCM($notification_id, $title, $message, $type);
        //             }
        //         } else {
        //             foreach ($pkg->payment->take(1) as $payment) {
        //                 //for grace period
        //                 if ($payment->expiry_date != null && $payment->expiry_date <= Carbon::now()->toDateString()){
        //                     if(Carbon::today()->diffInDays($payment->expiry_date) < 3){
        //                         $userpackage = UserPackage::find($pkg->id);
        //                         $userpackage->status = 1;
        //                         $userpackage->package_status = 'Activated';
        //                         $userpackage->grace_period = 1; // in grace period
        //                         $userpackage->update();

        //                         $primaryinsurance = InsuranceDetails::where('userpackage_id',$pkg->id)->where('user_id',$userpackage->familyname->primary->member_id)->first();
        //                         $primaryinsurance->status = 1;
        //                         $primaryinsurance->update();

        //                         foreach($userpackage->familyname->family as $family){
        //                             $familyinsurance =  InsuranceDetails::where('userpackage_id',$pkg->id)->where('user_id',$family->member->member_id)->first();
        //                             $familyinsurance->status = 1;
        //                             $familyinsurance->update();
        //                         }
        //                         // $days = Carbon::parse($payment->expiry_date)->diffInDays(Carbon::today());
        //                         $extended_date = Carbon::parse($payment->expiry_date)->addDays(3)->format('Y-m-d');
        //                         // if ($days == 0) {
        //                         //     $remaining = 3;
        //                         // } elseif ($days == 1) {
        //                         //     $remaining = 2;
        //                         // } elseif ($days == 2) {
        //                         //     $remaining = 1;
        //                         // }
        //                         //grace period notification
        //                         $member = Member::find($userpackage->familyname->primary_member_id);
        //                         $user = StoreToken::where('user_id', $member->member_id)->first();
        //                         if($user != null){
        //                             $notification_id = $user->device_key;
        //                             $title = 'Package Grace Period';
        //                             $message = "Your subscription package payment has been expired and extended until $extended_date.";
        //                             $type = 'Grace Period';
        //                             send_notification_FCM($notification_id, $title, $message, $type);
        //                         }
        //                     }else{
        //                         $userpackage = UserPackage::find($pkg->id);
        //                         $userpackage->status = 0;
        //                         $userpackage->package_status = 'Deactivated';
        //                         $userpackage->grace_period = 2; // grace period exceeded
        //                         $userpackage->update();

        //                         foreach($userpackage->dates->reverse()->take(1) as $date){
        //                             if($date->status == 'Pending' || $date->status == 'Lab In Progress'){
        //                                 $date->reschedule_status = 1;
        //                                 $date->update();
        //                             }
        //                         }

        //                         //freeze insurance
        //                         $primaryinsurance = InsuranceDetails::where('userpackage_id',$pkg->id)->where('user_id',$userpackage->familyname->primary->member_id)->first();
        //                         $primaryinsurance->status = 2; //insurance freeze
        //                         $primaryinsurance->update();

        //                         foreach($userpackage->familyname->family as $family){
        //                             $familyinsurance =  InsuranceDetails::where('userpackage_id',$pkg->id)->where('user_id',$family->member->member_id)->first();
        //                             $familyinsurance->status = 2; //insurance freeze
        //                             $familyinsurance->update();
        //                         }

        //                         //grace period end notification
        //                         $member = Member::find($userpackage->familyname->primary_member_id);
        //                         $user = StoreToken::where('user_id', $member->member_id)->first();
        //                         if($user != null){
        //                             $notification_id = $user->device_key;
        //                             $title = 'Package Grace Period Ended';
        //                             $message = "Your subscription package grace period has ended and your package has been deactivated.";
        //                             $type = 'Grace Period End';
        //                             send_notification_FCM($notification_id, $title, $message, $type);
        //                         }
        //                     }
        //                 } 
        //             }
        //         }
        //         // check the provided first screening date by admin with the current date, if matched activate package.
        //         if($pkg->status == 1 && $pkg->package_status == 'Booked' && $pkg->expiry_date > Carbon::now()->toDateString()){
        //             foreach ($pkg->dates->take(1) as $date) {
        //                 if ($date->screening_date == Carbon::today()->toDateString()) {
        //                     $userpackage = UserPackage::find($pkg->id);
        //                     $userpackage->package_status = 'Activated';
        //                     $userpackage->update();
        //                 }
        //             }
        //         }
        //         // $months = 0;
        //         // foreach ($pkg->payment as $payment) {
        //         //     if ($payment->payment_interval == 'Monthly') {
        //         //         $months += 1;
        //         //     } else if ($payment->payment_interval == 'Quarterly') {
        //         //         $months += 3;
        //         //     } else if ($payment->payment_interval == 'Half_Yearly') {
        //         //         $months += 6;
        //         //     } else if ($payment->payment_interval == 'Yearly') {
        //         //         $months += 12;
        //         //     }
        //         // }
        //         // if ($months == 12) {
        //         //     foreach ($pkg->payment->take(1) as $payment) {
        //         //         if ($payment->expiry_date != null && $payment->expiry_date < Carbon::now()->toDateString()) {
        //         //             $userpackage = UserPackage::find($pkg->id);
        //         //             $userpackage->status = 1;
        //         //             $userpackage->package_status = 'Expired';
        //         //             $userpackage->update();
        //         //         }
        //         //     }
        //         // } else {
        //         //     foreach ($pkg->payment->take(1) as $payment) {
        //         //         if ($payment->expiry_date != null && $payment->expiry_date < Carbon::now()->toDateString()) {
        //         //             $userpackage = UserPackage::find($pkg->id);
        //         //             $userpackage->status = 0;
        //         //             $userpackage->package_status = 'Deactivated';
        //         //             $userpackage->update();
        //         //         }
        //         //     }
        //         // }
        //     }
        // })->everyMinute();

        //follow up notify at 8 AM
        $schedule->call(function () {
            $todayDate = Carbon::now()->toDateString();
            $followUps = FollowUp::all();
            foreach ($followUps as $item) {
                $date = $item->followUpDate;
                if ($date == $todayDate) {
                    $userPhone = User::find($item->user_id)->phone;
                    send_sms($userPhone, ' Today is your follow Up ' . 'https://ghargharmadoctor.page.link/doctorhomepage');
                }
            }
        })->dailyAt('08:00');

        //package notification
        $schedule->call(function () {
            $package = '';
            $package = UserPackage::with(['familyname.primary.member','dates'=> function ($query) {
                $query->latest();
            }, 'payment' => function ($query) {
                $query->latest();
            }])->latest()->get();
            foreach ($package as $pkg) {       
                foreach ($pkg->payment->take(1) as $payment) {
                    if(Carbon::parse($pkg->expiry_date)->format('Y-m-d') != Carbon::today()->format('Y-m-d')){
                        //package payment expiration email in 7 days            
                        $emaildate = Carbon::parse($payment->expiry_date)->subDays(7)->format('Y-m-d');
                        if($emaildate == Carbon::today()->format('Y-m-d')){
                            //email of package payment expiration in 7 days
                        }

                        //package payment expiration sms in 2 days      
                        $smsdate = Carbon::parse($payment->expiry_date)->subDays(2)->format('Y-m-d');
                        if($smsdate == Carbon::today()->format('Y-m-d')){
                            //sms package payment expiration in 2 days
                        }

                        //package payment expired sms
                        if(Carbon::parse($payment->expiry_date)->format('Y-m-d') == Carbon::today()->format('Y-m-d')){
                            //sms package payment expired
                        }                            
                    }
                }
            }
        })->daily();       
        
        //expire not paid appointments if time slot passes
        $schedule->call(function () {
            $bookings = BookingReview::where('status', '0')->get();

            foreach ($bookings as $item) {
                $slotId = $item->booking_id;
                $slot = Slots::where('id', $slotId)->withTrashed()->first();
                if($slot->deleted_at != null && $slot->slot <= Carbon::now()->format('g:i A')){
                    $item->booking_status = 'Slot Expired';
                    $item->update();
                }
            }
        })->everyMinute();

        //reset water intake after a week
        $schedule->call(function () {
            $intakes = WaterIntake::all();
            foreach($intakes as $intake){
                $intake->week = $intake->week + 1;
                $intake->update();
                foreach($intake->days as $item){
                    $item->last_week_intake = $item->intake;
                    $item->intake = 0;
                    $item->update();
                }
            }
        })->weekly();

        $schedule->call(function () {
            $intakes = WaterIntake::with('intervals')->where('notification_status',1)->get();
            foreach($intakes as $intake){
                $member = Member::find($intake->member_id);
                $user = StoreToken::where('user_id', $member->member_id)->first();
                foreach($intake->intervals as $interval){
                    if (Carbon::parse($interval->time)->format('H:i') == Carbon::now()->format('H:i')) {
                        $notification_id = $user->device_key;
                        $title = 'Reminder';
                        $message = "It's time to drink water.";
                        $type = 'Drink Water';
                        send_notification_FCM($notification_id, $title, $message, $type);
                    }
                }
            }
        })->everyMinute();

        $schedule->call(function () {
            $update_status  = UploadMedicalHistoryConsultation::get();
            foreach ($update_status as $id) {
                if(Helper::check_userpackage($id->member_id) == 1)
                {
                    $id->is_packaged = 1;
                    $id->save();
                }
            }
        })->everyMinute();

        //birthday notification
        $schedule->call(function () {
            $members = Member::with('user')->whereHas('user',function($query){
                $query->where('is_verified',1);
            })->get();
            foreach($members as $member){
                if($member->dob != null && Carbon::parse($member->dob)->format('m-d') == Carbon::now()->format('m-d')){
                    $token = StoreToken::where('user_id',$member->member_id)->first();
                    if($token){
                        $title = "Happy Birthday";
                        $notification_id = $token->device_key;
                        $type = "Others";
                        $message = 'Wishing you a very happy birthday!';
                        send_notification_FCM($notification_id,$title,$message,$type);

                        $bookingNotification = new BookingNotification();
                        $bookingNotification->user_id = $token->user_id;
                        $bookingNotification->image = $member->image_path;
                        $bookingNotification->title = $title;
                        $bookingNotification->body = $message;
                        $bookingNotification->type = "Others";
                        $bookingNotification->save();
                    }
                    send_sms($member->user->phone , 'Happy Birthday! Today is a special day that marks the beginning of another year of your wonderful life. I hope this year is filled with joy, love, laughter, and wonderful memories.');
                }
            }
        })->dailyAt('7:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}