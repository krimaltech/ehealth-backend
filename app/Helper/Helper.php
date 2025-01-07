<?php

namespace App\Helper;

use App\Detail;
use App\Contact;
use App\Visitor;

use DateTime;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Auth;
use App;
use App\Models\Ambulance;
use App\Models\BecomePrimaryMember;
use App\Models\BookingNotification;
use App\Models\BookingReview;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\ExpoAndEvent;
use App\Models\Family;
use App\Models\FamilyName;
use App\Models\Hospital;
use App\Models\InsuranceClaim;
use App\Models\KnowYourCustomer;
use App\Models\Member;
use App\Models\MemberLeaveRequest;
use App\Models\Newsmodel\Advertisement;
use App\Models\Newsmodel\Gallery;
use App\Models\Newsmodel\Language;
use App\Models\Newsmodel\Menu;
use App\Models\Newsmodel\News;
use App\Models\Nurse;
use App\Models\Package;
use App\Models\PrimaryMemberRequest;
use App\Models\Referral;
use App\Models\RelationManager;
use App\Models\RemoveFamilyRequest;
use App\Models\RoleUser;
use App\Models\SchooStudentEmail;
use App\Models\Service;
use App\Models\Symptom;
use App\Models\Team;
use App\Models\Trip;
use App\Models\UpgradeOrDowngradeRo;
use App\Models\UploadMedicalHistoryConsultation;
use App\Models\User;
use App\Models\UserPackage;
use App\Models\UserUserPackage;
use App\Models\Vendor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Pratiksh\Nepalidate\Facades\NepaliDate;

class Helper
{

    static function newsinfo()
    {
        return Detail::first();
    }

    static function contactdata()
    {
        return Contact::where('seen', 0)->latest()->get();
    }

    static function visitorcount()
    {
        $client  = request()->ip();
        $country  = "Unknown";

        if (filter_var($client, FILTER_VALIDATE_IP)) {
            $ip = $client;
        } elseif (filter_var($forward, FILTER_VALIDATE_IP)) {
            $ip = $forward;
        } else {
            $ip = $remote;
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://www.geoplugin.net/json.gp?ip=" . $ip);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $ip_data_in = curl_exec($ch); // string
        curl_close($ch);

        $ip_data = json_decode($ip_data_in, true);
        $ip_data = str_replace('&quot;', '"', $ip_data);

        if ($ip_data && $ip_data['geoplugin_countryName'] != null) {
            $country = $ip_data['geoplugin_countryName'];
        }

        //  return request()->userAgent();
        $uris = $_SERVER['REQUEST_URI'];
        $uris = $uris . '/';
        //   $value=print_r(explode('/',$uris));
        $amit = explode('/', $uris, -1);
        $count = count($amit);
        $url = $amit[$count - 1];
        if ($url == '')
            $url = 'home';

        $abc = Visitor::where('ip', $ip)->where('country', $country)->where('slug', $url)->first();

        if (!empty($abc)) {
            $date_1 = new DateTime($abc->updated_at);
            $date_2 = new DateTime(Carbon::now());

            $intravel = $date_2->diff($date_1)->format("%a");
            if ($intravel > 0) {

                $article = News::where('slug', $url)->first();
                if (!empty($article)) {
                    $article->views = $article->views + 1;
                    $article->update();
                    $abc->updated_at = Carbon::now();
                    $abc->update();
                }
            }
        } else {

            $visitor = new Visitor;
            $visitor->ip = $ip;
            $visitor->country = $country;
            $visitor->slug = $url;
            $visitor->save();
            $article = News::where('slug', $url)->first();
            if (!empty($article)) {
                $article->views = $article->views + 1;
                $article->update();
            }
        }
    }



    static function currentLanguage()
    {
        $locale = App::getLocale();
        if (\Session::has('lang')) {
            $locale = \Session::get('lang');
        }
        $language = NewsmodelLanguage::where("code", $locale)->first();
        if (empty($language)) {
            $language = Language::where("code", env('DEFAULT_LANGUAGE', 'en'))->first();
        }
        return $language;
    }

    static function languageFromCode($code)
    {
        return Language::where("code", $code)->first();
    }

    static function languageAll()
    {
        return Language::orderby('id', 'asc')->get();
    }
    static function languageActive()
    {
        return Language::where("status", true)->orderby('id', 'asc')->get();
    }

    static function unseen_kyc()
    {
        return KnowYourCustomer::where('form_status','upload-document')->where('status', 'Pending')->count();
    }

    static function doctor_schedule()
    {
        $doctor = Doctor::where('doctor_id', auth()->user()->id)->first();
        $schedule = BookingReview::where('doctor_id', $doctor->id ?? "")->where('booking_status', 'Scheduled')->count();
        $complete = BookingReview::where('doctor_id', $doctor->id ?? "")->where('booking_status', 'Completed')->count();
        $cancel = BookingReview::where('doctor_id', $doctor->id ?? "")->whereIn('booking_status', ['Rejected','Cancelled'])->count();
        return  $doctorschedule = collect(['schedule' => $schedule, 'complete' => $complete, 'cancel' => $cancel]);
    }

    static function admin_alert()
    {
        // $doctors = Doctor::count();
        // $symptoms = Symptom::count();
        // $departments = Department::count();

        // $ambulances = Ambulance::count();
        // $drivers = Driver::count();
        // $trips = Trip::count();

        $bookeds = UserPackage::where('package_status', 'Activated')->whereDoesntHave('dates')->count();
        // $pendings = UserPackage::where('package_status', 'Activated')->count();
        $activateds = UserPackage::where('package_status', 'Activated')->has('dates')->count();
        $deactivateds = UserPackage::where('package_status', 'Deactivated')->count();
        $notbookeds = UserPackage::where('package_status', 'Not Booked')->count();
        $consultation = UserPackage::where('package_status', 'Activated')->whereHas('dates',function($q){
            $q->where('status','Report Generated');
        })->count();
        $total_packages = UserPackage::count();
        $insuranceClaims= InsuranceClaim::where('insurance_status','Pending')->count();
        $notifications= BookingNotification::distinct('type')->get(['type']);

      foreach($notifications as $index=>$notification)
      {
             $notifications[$index]->total= BookingNotification::where([['watched','unseen'],['type',$notification->type]])->count();
      }

      //member
    //   $teams= Team::count();
    //   $nurses= Nurse::count();
      $appointments= BookingReview::where('payment_date',date('Y-m-d'))->count();
    //   $hospitals= Hospital::count();
    //   $refers= Referral::count();
      

      //our packages
    //    $packages= Package::count();
    //    $services= Service::count();

      return collect([
            // 'doctors' => $doctors, 'symptoms' => $symptoms, 'departments' => $departments,
            //  'ambulances' => $ambulances, 'drivers' => $drivers, 'trips' => $trips, 
            'insuranceClaims' => $insuranceClaims,'bookeds' => $bookeds,
            'activateds' => $activateds, 'deactivateds' => $deactivateds, 'notbookeds' => $notbookeds, 'total_packages' => $total_packages,
            'notifications'=>$notifications,'appointments'=>$appointments, 'consultation' => $consultation
            // 'teams'=>$teams,'nurses'=>$nurses,'hospitals'=>$hospitals,
            // 'refers'=>$refers,'packages'=>$packages,'services'=>$services
        ]);
    }

    static function servicesform(){
        return collect(["ATM","Internet Banking","Mobile Banking"]);
    }

    static function switch_role()
    {
        return RoleUser::where('user_id',auth()->user()->id )->count();
    }
    static function role_count($id)
    {
        return RoleUser::where('user_id',$id )->count();
    }

    static function schedule_data()
    {
        $doctor = Doctor::where('doctor_id',auth()->user()->id)->first();
        return BookingReview::where('booking_status','Scheduled')->where('id',$doctor->id)->count();
    }

    static function is_exclusive()
    {
        return Vendor::where('is_exculsive',2)->where('vendor_id',auth()->user()->id)->first();
    }
    static function is_phaymacy()
    {
        return Vendor::where('vendor_type',2)->where('vendor_id',auth()->user()->id)->first();
    }

    static function manage_user()
    {
        return Employee::where('sub_role_id',12)->where('employee_id',auth()->user()->id)->first();
    }

    static function remove_family_request()
    {
        return RemoveFamilyRequest::where('status',0)->count();
    }
    static function member_leave_request()
    {
        return MemberLeaveRequest::where('status',1)->count();
    }
    static function primary_change_request()
    {
        return PrimaryMemberRequest::where('status',0)->count();
    }
    static function relationship_manager()
    {
        return RelationManager::where('user_id', auth()->user()->id)->where('rm_tag','Relationship Manager')->count();
    }
    static function upgrade_or_downgrade($id)
    {
        return UpgradeOrDowngradeRo::where('status',NULL)->where('relation_manager_id',$id)->count();
    }
    static function relationship_manager_upgrade_case1()
    {
        return RelationManager::with('relation_manager')->whereHas('relation_manager', function ($query) {
            $query->where('referrer_id',auth()->user()->id);
        })->count();
    }
    static function relationship_manager_upgrade_case2()
    {
       return UserUserPackage::with('user.referrer', 'package_name.package', 'package_name.payment')->whereHas('user', function ($query) {
            $query->where('referrer_id', auth()->user()->id);
        })->count();
    }
    static function is_hr()
    {
        return User::where('subrole',16)->count();
    }
    static function become_primary_request()
    {
        return BecomePrimaryMember::where('status',0)->count();
    }
    static function check_userpackage($memberId)
    {
        $member = Member::find($memberId);
        if($member->member_type == 'Primary Member'){
            $familyname  = FamilyName::where('primary_member_id',$member->id)->first();
            $userpackage = UserPackage::where('familyname_id',$familyname->id)->whereIn('package_status',['Pending','Activated'])->latest()->first();
            if($userpackage != null){
                $check = 1;
            }else{
                $check = 0;
            }
        }elseif($member->member_type == 'Dependent Member'){
            $family = Family::where('member_id',$member->id)->where('approved',1)->where('payment_status',1)->first();
            if($family){
                $familyname  = FamilyName::find($family->family_id);
                $userpackage = UserPackage::where('familyname_id',$familyname->id)->whereIn('package_status',['Pending','Activated'])->latest()->first();
                if($userpackage != null){
                    $check = 1;
                }else{
                    $check = 0;
                }
            }else{
                $check = 0;
            }
        }else{
            $check = 0;
        }
        return $check;
    }

    static function external_medical_history()
    {
        return UploadMedicalHistoryConsultation::where('status',0)->where('is_packaged','1')->count();
    }
    static function external_medical_history_doctor()
    {
        $employee  = Employee::where('employee_id',auth()->user()->id)->first();
        return UploadMedicalHistoryConsultation::where('status',0)->where('doctor_id',$employee->id)->where('is_packaged','1')->count();
    }

    static function native_upload($image, $folderPath){
        $image_parts = explode(";base64,", $image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $uniqid = uniqid();
        $file = $folderPath . $uniqid . '.' . $image_type;
        file_put_contents($file, $image_base64);
        $path = asset($file);
        $imagefile =  $uniqid . '.' . $image_type;
        return collect(['file' => $imagefile , 'path' => $path]);
    }

    static function minio_upload($image,$destinationPath){
        $image_parts = explode(";base64,", $image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $file = time() . Str::random(10) . '.' . $image_type;
        $path = $destinationPath.$file;
        Storage::disk('minio')->put($path , $image_base64);
        $imagepath = Storage::disk('minio')->url($path);
        return collect(['file' => $file,'path'=>$imagepath]);
    }

    static function get_minio($files){
        $urls = [];
        foreach($files as $key=>$file){
            $path = 'images/'.$file;
            $urls[$key] = Storage::disk('minio')->url($path);
        }
        return $urls;
    }
    // static function get_minio($image){
    //     $path = 'images/'.$image;
    //     $geturl = Storage::disk('minio')->url($path);
    //     return $geturl;
    // }

    static function uploadCsv($row, $id, $familyname, $username, $payment_status){
        $user = new User([
            'first_name' => $row['first_name'],
            'middle_name' => $row['middle_name'],
            'last_name' => $row['last_name'],
            'name' => $row['first_name'] .' '. $row['middle_name'] .' '.  $row['last_name'],
            'is_verified' => 0,
            'is_school' => 0,
            'user_name' => $username.'-',
            'password' => Hash::make('12345'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $user->save();

        $role = new RoleUser([
            'user_id' => $user->id,
            'role_id' => 6
        ]);
        $role->save();

        $member = new Member([
            'member_id' => $user->id,
            'gd_id' => NULL,
            'slug' => 'member-' . str_replace(' ', '-', $user->name) . '-' . substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3),
            'gender' => $row['gender'],
            'dob' => Carbon::createFromFormat('d/m/Y', $row['dob'])->format('Y/m/d'),
            'address' => $row['address'],
            'member_type' => 'Dependent Member'
        ]);
        $member->save();

        $member->gd_id = 'GD-'.$member->id;
        $member->update();

        $family = new Family([
            'family_id' => $familyname,
            'member_id' => $member->id,
            'approved' => 1,
            'primary_request' => 1,
            'payment_status' => $payment_status,
        ]);
        $family->save();

        $contact_details = new SchooStudentEmail([
            'member_id' => $member->id,
            'parent_email' => $row['parent_email'],
            'parent_phone' => $row['parent_phone'],
            'year' => csv_year(),
            'class' => $row['class'],
            'section' => $row['section'],
            'roll' => $row['roll'],
            'primary_member_id' => $id,
        ]);
        $contact_details->save();


        $user->user_name = $username.'-'.csv_year().'-'.$row['class'].'-'.$row['section'].'-'.$row['roll'];
        $user->update();
    }

    static function eng_to_nep_date($date){
        return NepaliDate::create(\Carbon\Carbon::parse($date))->toBS();
    }

    static function khaltiVerify(Request $request){
        $args = http_build_query(array(
            'token' => $request->input('token'),
            'amount' => $request->input('amount')
        ));
        $url = 'https://khalti.com/api/v2/payment/verify/';
        // # Make the call using API.
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $key = getenv('KHALTI_API_SECRET');
        $headers = ['Authorization: Key ' . $key];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // Response
        $response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        $res = json_decode($response, true);
        return $res;
    }

    static function initiateKhalti(Request $request){
        $data = array(
            "return_url" => $request->input('return_url'),
            "website_url" => $request->input('website_url'),
            "amount" => $request->input('amount'),
            "purchase_order_id" => $request->input('purchase_order_id'),
            "purchase_order_name" => $request->input('purchase_order_name'),
            "customer_info" => $request->input('customer_info'),
        );
        $jsonData = json_encode($data);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://khalti.com/api/v2/epayment/initiate/',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => array(
                'Authorization: key '. env('KHALTI_API_SECRET'),
                'Content-Type: application/json',
            ),
        ));
    
        $response = curl_exec($curl);    
        curl_close($curl);
        $res = json_decode($response);
        return $res;
    }

    static function khaltiLookup($pidx){
        $apiUrl = 'https://khalti.com/api/v2/epayment/lookup/';
        $postData = [
            'pidx' => $pidx,
        ];
        $headers = [
            'Authorization' => 'Key '.env('KHALTI_API_SECRET'),
            'Content-Type' => 'application/json',
        ];

        $response = Http::withHeaders($headers)->post($apiUrl, $postData);

        // Check the response status code
        if ($response->successful()) {
            $responseData = $response->json();
            return response()->json($responseData);
        } else {
            return response()->json(['error' => 'Failed to communicate with the API'], 500);
        }
    }

}
