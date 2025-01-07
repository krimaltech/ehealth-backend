<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Mail\SendSchoolStudentEmail;
use App\Mail\VerifyEmail;
use App\Models\AdditionalMemberPayment;
use App\Models\AdditionalPackagePayment;
use App\Models\CompanySchoolProfile;
use App\Models\DeactivateStudent;
use App\Models\Family;
use App\Models\SchooStudentEmail;
use App\Models\FamilyName;
use App\Models\Member;
use App\Models\PackageFee;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\UserPackage;
use App\Models\UserVerify;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class CompanyProfileApiController extends Controller
{
    protected $random;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }

    public function student_details(Request $request)
    {
        $member = Member::where('member_id', auth()->user()->id)->first();
        if ($request->year && $request->class) {
            $duplicateStudents = SchooStudentEmail::with('member.user', 'member.family')->whereHas('member.user', function ($query) {
                $query->where('is_verified', 1);
            })->where('primary_member_id', $member->id)->where('class', $request->class)->where('year', $request->year)->paginate();
        } else {
            $duplicateStudents = SchooStudentEmail::with('member.user', 'member.family')->whereHas('member.user', function ($query) {
                $query->where('is_verified', 1);
            })->where('primary_member_id', $member->id)->paginate();
        }
        return response()->json($duplicateStudents);
    }
    public function upload_company_profile(Request $request)
    {
        $companySchoolProfile = new CompanySchoolProfile();
        $member = Member::where('member_id', auth()->user()->id)->first();
        $companySchoolProfile->member_id = $member->id;
        if ($companySchoolProfile->types = 'corporate') {
            $check_data = CompanySchoolProfile::where('user_name', 'GD-KTM-C-1')->exists();
            if ($check_data) {
                $lastorderId = CompanySchoolProfile::orderBy('id', 'desc')->first()->user_name;
                $lastIncreament = explode("-", $lastorderId);
                $integerId = $lastIncreament[3];
                $intIds = $integerId + 1;
                $companySchoolProfile->user_name = 'GD-KTM-C-' . $intIds;
            } else {
                $companySchoolProfile->user_name = 'GD-KTM-C-1';
                $companySchoolProfile->types = 'corporate';
            }
        }
        $companySchoolProfile->owner_name = $request->owner_name;
        $companySchoolProfile->company_name = $request->company_name;
        $companySchoolProfile->company_address = $request->company_address;
        $companySchoolProfile->company_start_date = $request->company_start_date;
        $companySchoolProfile->description = $request->description;
        $companySchoolProfile->pan_number = $request->pan_number;
        $companySchoolProfile->contact_number = $request->contact_number;
        $companySchoolProfile->status = 'pending';

        if ($request->company_image) {
            $image = $request->company_image;
            if (env('STORAGE_TYPE') == 'minio') {
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath);
                $companySchoolProfile->company_image_path = $imageUpload['path'];
                $companySchoolProfile->company_image = $imageUpload['file'];
            } else {
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image, $folderPath);
                $companySchoolProfile->company_image_path = $imageUpload['path'];
                $companySchoolProfile->company_image = $imageUpload['file'];
            }
        }
        if ($request->paper_work_pdf) {
            $image = $request->paper_work_pdf;
            if (env('STORAGE_TYPE') == 'minio') {
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath);
                $companySchoolProfile->paper_work_pdf_path = $imageUpload['path'];
                $companySchoolProfile->paper_work_pdf = $imageUpload['file'];
            } else {
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image, $folderPath);
                $companySchoolProfile->paper_work_pdf_path = $imageUpload['path'];
                $companySchoolProfile->paper_work_pdf = $imageUpload['file'];
            }
        }
        if ($request->school_regd_file) {
            $image = $request->school_regd_file;
            if (env('STORAGE_TYPE') == 'minio') {
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath);
                $companySchoolProfile->school_regd_file_path = $imageUpload['path'];
                $companySchoolProfile->school_regd_file = $imageUpload['file'];
            } else {
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image, $folderPath);
                $companySchoolProfile->school_regd_file_path = $imageUpload['path'];
                $companySchoolProfile->school_regd_file = $imageUpload['file'];
            }
        }
        $saved = $companySchoolProfile->save();
        if ($saved) {
            return response()->json($companySchoolProfile);
        }
    }

    public function edit_company_profile(Request $request, $id)
    {
        $companySchoolProfile = CompanySchoolProfile::findOrFail($id);
        $companySchoolProfile->owner_name = $request->owner_name;
        $companySchoolProfile->company_name = $request->company_name;
        $companySchoolProfile->company_address = $request->company_address;
        $companySchoolProfile->company_start_date = $request->company_start_date;
        $companySchoolProfile->description = $request->description;
        $companySchoolProfile->pan_number = $request->pan_number;
        $companySchoolProfile->contact_number = $request->contact_number;
        $companySchoolProfile->status = 'pending';

        if ($request->company_image) {
            $image = $request->company_image;
            if (env('STORAGE_TYPE') == 'minio') {
                Storage::disk('minio')->delete('images/' . $companySchoolProfile->company_image);
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath);
                $companySchoolProfile->company_image_path = $imageUpload['path'];
                $companySchoolProfile->company_image = $imageUpload['file'];
            } else {
                $deleteDestinationPath = 'public/images/' . $companySchoolProfile->company_image;
                if (Storage::exists($deleteDestinationPath)) {
                    Storage::delete($deleteDestinationPath);
                }
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image, $folderPath);
                $companySchoolProfile->company_image_path = $imageUpload['path'];
                $companySchoolProfile->company_image = $imageUpload['file'];
            }
        }
        if ($request->paper_work_pdf) {
            $image = $request->paper_work_pdf;
            if (env('STORAGE_TYPE') == 'minio') {
                Storage::disk('minio')->delete('images/' . $companySchoolProfile->paper_work_pdf);
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath);
                $companySchoolProfile->paper_work_pdf_path = $imageUpload['path'];
                $companySchoolProfile->paper_work_pdf = $imageUpload['file'];
            } else {
                $deleteDestinationPath = 'public/images/' . $companySchoolProfile->paper_work_pdf;
                if (Storage::exists($deleteDestinationPath)) {
                    Storage::delete($deleteDestinationPath);
                }
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image, $folderPath);
                $companySchoolProfile->paper_work_pdf_path = $imageUpload['path'];
                $companySchoolProfile->paper_work_pdf = $imageUpload['file'];
            }
        }
        if ($request->school_regd_file) {
            $image = $request->school_regd_file;
            if (env('STORAGE_TYPE') == 'minio') {
                Storage::disk('minio')->delete('images/' . $companySchoolProfile->school_regd_file);
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath);
                $companySchoolProfile->school_regd_file_path = $imageUpload['path'];
                $companySchoolProfile->school_regd_file = $imageUpload['file'];
            } else {
                $deleteDestinationPath = 'public/images/' . $companySchoolProfile->school_regd_file;
                if (Storage::exists($deleteDestinationPath)) {
                    Storage::delete($deleteDestinationPath);
                }
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image, $folderPath);
                $companySchoolProfile->school_regd_file_path = $imageUpload['path'];
                $companySchoolProfile->school_regd_file = $imageUpload['file'];
            }
        }
        $saved = $companySchoolProfile->save();
        if ($saved) {
            return response()->json($companySchoolProfile);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required', 'string', 'min:8',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/',
            ],
            'phone' => ['required', 'unique:users'],
        ]);
    }
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'middle_name' => $data['middle_name'],
            'last_name' => $data['last_name'],
            'name' => $data['first_name'] . " " . $data['middle_name'] . " " . $data['last_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'is_verified' => $data['is_verified'],
            'is_school' => 0,
        ]);
    }
    public function upload_school_profile(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        $token = Str::random(64);

        UserVerify::create([
            'user_id' => $user->id,
            'token' => $token
        ]);

        Mail::to($request->email)->send(new VerifyEmail($token));
        event(new Registered($user));

        $member = new Member();
        $member->member_id = $user->id;
        $name = str_replace(' ', '-', $user->name);
        $member->slug =  'member-' . $name . '-' . $this->random;
        $saved = $member->save();
        $update_gd_id = Member::where('member_id', $user->id)->first();
        $update_gd_id->gd_id = 'GD-' . $member->id;
        $update_gd_id->update();
        if ($saved) {
            $user_role = new RoleUser();
            $user_role->user_id = $user->id;
            $user_role->role_id = 6;
            $user_role->save();
        }

        $companySchoolProfile = new CompanySchoolProfile();
        $member = Member::where('member_id', $member->member_id)->first();
        $companySchoolProfile->member_id = $member->id;
        $check_data = CompanySchoolProfile::where('user_name', 'GD-KTM-S-1')->exists();
        if ($check_data) {
            $lastorderId = CompanySchoolProfile::orderBy('id', 'desc')->first()->user_name;
            $lastIncreament = explode("-", $lastorderId);
            $integerId = $lastIncreament[3];
            $intIds = $integerId + 1;
            $companySchoolProfile->user_name = 'GD-KTM-S-' . $intIds;
        } else {
            $companySchoolProfile->user_name = 'GD-KTM-S-1';
        }
        $companySchoolProfile->types = 'school';
        $companySchoolProfile->owner_name = $request->owner_name;
        $companySchoolProfile->company_name = $request->company_name;
        $companySchoolProfile->company_address = $request->company_address;
        $companySchoolProfile->company_start_date = $request->company_start_date;
        $companySchoolProfile->description = $request->description;
        $companySchoolProfile->pan_number = $request->pan_number;
        $companySchoolProfile->contact_number = $request->contact_number;
        $companySchoolProfile->latitude = $request->latitude;
        $companySchoolProfile->longitude = $request->longitude;
        $companySchoolProfile->status = 'pending';

        if ($request->company_image) {
            $image = $request->company_image;
            if (env('STORAGE_TYPE') == 'minio') {
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath);
                $companySchoolProfile->company_image_path = $imageUpload['path'];
                $companySchoolProfile->company_image = $imageUpload['file'];
            } else {
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image, $folderPath);
                $companySchoolProfile->company_image_path = $imageUpload['path'];
                $companySchoolProfile->company_image = $imageUpload['file'];
            }
        }
        if ($request->paper_work_pdf) {
            $image = $request->paper_work_pdf;
            if (env('STORAGE_TYPE') == 'minio') {
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath);
                $companySchoolProfile->paper_work_pdf_path = $imageUpload['path'];
                $companySchoolProfile->paper_work_pdf = $imageUpload['file'];
            } else {
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image, $folderPath);
                $companySchoolProfile->paper_work_pdf_path = $imageUpload['path'];
                $companySchoolProfile->paper_work_pdf = $imageUpload['file'];
            }
        }
        if ($request->school_regd_file) {
            $image = $request->school_regd_file;
            if (env('STORAGE_TYPE') == 'minio') {
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath);
                $companySchoolProfile->school_regd_file_path = $imageUpload['path'];
                $companySchoolProfile->school_regd_file = $imageUpload['file'];
            } else {
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image, $folderPath);
                $companySchoolProfile->school_regd_file_path = $imageUpload['path'];
                $companySchoolProfile->school_regd_file = $imageUpload['file'];
            }
        }
        $saved = $companySchoolProfile->save();

        if ($saved) {
            return response()->json($companySchoolProfile);
        }
    }

    public function new_school(Request $request)
    {
        $companySchoolProfile = new CompanySchoolProfile();
        $member = Member::where('member_id', auth()->user()->id)->first();
        $companySchoolProfile->member_id = $member->id;
        $check_data = CompanySchoolProfile::where('user_name', 'GD-KTM-S-1')->exists();
        if ($check_data) {
            $lastorderId = CompanySchoolProfile::orderBy('id', 'desc')->first()->user_name;
            $lastIncreament = explode("-", $lastorderId);
            $integerId = $lastIncreament[3];
            $intIds = $integerId + 1;
            $companySchoolProfile->user_name = 'GD-KTM-S-' . $intIds;
        } else {
            $companySchoolProfile->user_name = 'GD-KTM-S-1';
        }
        $companySchoolProfile->types = 'school';
        $companySchoolProfile->owner_name = $request->owner_name;
        $companySchoolProfile->company_name = $request->company_name;
        $companySchoolProfile->company_address = $request->company_address;
        $companySchoolProfile->company_start_date = $request->company_start_date;
        $companySchoolProfile->description = $request->description;
        $companySchoolProfile->pan_number = $request->pan_number;
        $companySchoolProfile->contact_number = $request->contact_number;
        $companySchoolProfile->latitude = $request->latitude;
        $companySchoolProfile->longitude = $request->longitude;
        $companySchoolProfile->status = 'pending';

        if ($request->company_image) {
            $image = $request->company_image;
            if (env('STORAGE_TYPE') == 'minio') {
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath);
                $companySchoolProfile->company_image_path = $imageUpload['path'];
                $companySchoolProfile->company_image = $imageUpload['file'];
            } else {
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image, $folderPath);
                $companySchoolProfile->company_image_path = $imageUpload['path'];
                $companySchoolProfile->company_image = $imageUpload['file'];
            }
        }
        if ($request->paper_work_pdf) {
            $image = $request->paper_work_pdf;
            if (env('STORAGE_TYPE') == 'minio') {
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath);
                $companySchoolProfile->paper_work_pdf_path = $imageUpload['path'];
                $companySchoolProfile->paper_work_pdf = $imageUpload['file'];
            } else {
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image, $folderPath);
                $companySchoolProfile->paper_work_pdf_path = $imageUpload['path'];
                $companySchoolProfile->paper_work_pdf = $imageUpload['file'];
            }
        }
        if ($request->school_regd_file) {
            $image = $request->school_regd_file;
            if (env('STORAGE_TYPE') == 'minio') {
                $destinationPath = 'images/';
                $imageUpload = Helper::minio_upload($image, $destinationPath);
                $companySchoolProfile->school_regd_file_path = $imageUpload['path'];
                $companySchoolProfile->school_regd_file = $imageUpload['file'];
            } else {
                $folderPath = "storage/images/"; //path location                
                $imageUpload = Helper::native_upload($image, $folderPath);
                $companySchoolProfile->school_regd_file_path = $imageUpload['path'];
                $companySchoolProfile->school_regd_file = $imageUpload['file'];
            }
        }
        $saved = $companySchoolProfile->save();
        if ($saved) {
            return response()->json($companySchoolProfile);
        }
    }

    public function deactivateRequests($id)
    {
        $deactivate = DeactivateStudent::where('profile_id', $id)->with('students.user')->latest()->get();
        return response()->json($deactivate);
    }

    public function deactivated_student_details()
    {
        $member = Member::where('member_id', auth()->user()->id)->first();
        $deactivatedStudents = SchooStudentEmail::with('member.user.deactivate.activated')->whereHas('member.user', function ($query) {
            $query->where('is_verified', 0);
        })->whereDoesntHave('member.family')->where('primary_member_id', $member->id)->get();
        return response()->json($deactivatedStudents);
    }

    public function reactivatePaymentCalculation()
    {
        $user = Member::where('member_id', Auth::user()->id)->first();
        $family = FamilyName::where('primary_member_id', $user->id)->withCount('family')->first();
        $userpackage = UserPackage::where('familyname_id', $family->id)->with(['familyfee', 'payment' => function ($query) {
            $query->latest();
        }])->latest()->first();
        $interval = $userpackage->payment[0]->payment_interval;
        //reactivation payment calculation if package booked but not activated
        if ($userpackage->package_status == 'Booked' || $userpackage->package_status == 'Pending') {
            if ($family->family_count > $userpackage->familyfee->family_size) {
                $fee = PackageFee::where('package_id', $userpackage->package_id)->where('family_size', $family->family_count)->first();
                if ($fee) {
                    $daily = $fee->one_monthly_fee / 30;
                } else {
                    $max = PackageFee::where('package_id', $userpackage->package_id)->orderBy('family_size', 'desc')->first();
                    $daily = $max->one_monthly_fee / 30;
                }
            } else {
                $daily = $userpackage->familyfee->one_monthly_fee / 30;
            }
            if ($interval == 'Monthly') {
                $paymentDays =  30;
                $discount = 0;
            } else if ($interval == 'Quarterly') {
                $paymentDays =  90;
                $discount = 1;
            } else if ($interval == 'Half_Yearly') {
                $paymentDays =  182;
                $discount = 2;
            } else if ($interval == 'Yearly') {
                $paymentDays =  365;
                $discount = 5;
            }
            $dailyFee = $daily * $paymentDays;
            $discountedFee = $discount / 100 * $dailyFee;
            $total = $dailyFee - $discountedFee;
        }
        //reactivation payment calculation if package activated 
        else {
            if ($family->family_count  > $userpackage->familyfee->family_size) {
                $fee = PackageFee::where('package_id', $userpackage->package_id)->where('family_size', $family->family_count)->first();
                if ($fee) {
                    $daily = $fee->one_monthly_fee / 30;
                } else {
                    $max = PackageFee::where('package_id', $userpackage->package_id)->orderBy('family_size', 'desc')->first();
                    $daily = $max->one_monthly_fee / 30;
                }
            } else {
                $daily = $userpackage->familyfee->one_monthly_fee / 30;
            }
            $paymentDays =  Carbon::today()->diffInDays(Carbon::parse($userpackage->payment[0]->expiry_date)->addDay(), false);
            if ($interval == 'Monthly') {
                $discount = 0;
            } else if ($interval == 'Quarterly') {
                $discount = 1;
            } else if ($interval == 'Half_Yearly') {
                $discount = 2;
            } else if ($interval == 'Yearly') {
                $discount = 5;
            }
            $dailyFee = $daily * $paymentDays;
            $discountedFee = $discount / 100 * $dailyFee;
            $total = $dailyFee - $discountedFee;
        }
        return response()->json(['userpackage' => $userpackage, 'daily_fee' => round($daily, 2), 'payment_days' => $paymentDays, 'discount' => $discount, 'discount_amount' => round($discountedFee, 2), 'total_payment' => round($total, 2)]);
    }

    public function reactivatePayment(Request $request)
    {
        // $args = http_build_query(array(
        //     'token' => $request->input('token'),
        //     'amount' => $request->input('amount')
        // ));
        // $url = 'https://khalti.com/api/v2/payment/verify/';
        // // # Make the call using API.
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $args);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // $key = getenv('KHALTI_API_SECRET');
        // $headers = ['Authorization: Key ' . $key];
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // // Response
        // $response = curl_exec($ch);
        // $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // curl_close($ch);
        // $res = json_decode($response, true);
        // //return $res;

        // if (isset($res['idx'])) {
        $user = Member::where('member_id', Auth::user()->id)->first();
        $familyname = FamilyName::where('primary_member_id', $user->id)->first();
        $package = UserPackage::where('familyname_id', $familyname->id)->latest()->first();

        $payment = new AdditionalPackagePayment();
        $payment->userpackage_id = $package->id;
        $payment->payment_days = $request->input('payment_days');
        $payment->payment_method = 'Khalti';
        $payment->payment_date = Carbon::now();
        $payment->amount = $request->input('amount') / 100;
        $payment->paidmember_id = $user->id;
        $saved = $payment->save();

        if ($saved) {
            $usr = User::with('member')->find($request->user_id);
            $usr->is_verified = 1;
            $usr->update();
            $usr->member->member_type = 'Dependent Member';
            $usr->member->update();

            $family = new Family();
            $family->family_id = $familyname->id;
            $family->member_id = $usr->member->id;
            $family->approved = 1;
            $family->primary_request = 1;
            $family->payment_status = 1;
            $family->additional_status = 1;
            $family->save();

            $additional = new AdditionalMemberPayment();
            $additional->additionalpayment_id = $payment->id;
            $additional->member_id = $usr->member->id;
            $additional->save();

            $familyCount = Family::where('family_id', $package->familyname_id)->where('approved', 1)->where('payment_status', 1)->count();

            if ($familyCount > $package->familyfee->family_size) {
                $packagefee = PackageFee::where('package_id', $package->package_id)->where('family_size', $familyCount)->first();
                if ($packagefee) {
                    $package->family_id = $packagefee->id;
                } else {
                    $max = PackageFee::where('package_id', $package->package_id)->orderBy('family_size', 'desc')->first();
                    $package->family_id = $max->id;
                }
            }
            $package->additonal_members = $package->additonal_members + 1;
            $package->update();

            return response()->json([
                'success' => 'Payment Completed.',
            ]);
        }
        // } else {
        //     return response()->json([
        //         'error' => 'Something went Wrong.',
        //     ]);
        // }
    }

    public function cancel_deactivate_users(Request $request, $id)
    {
        try {
            $request->validate([
                'reject_reason' => 'required',
            ]);
            $deactivate = DeactivateStudent::find($id);
            $deactivate->reject_reason = $request->reject_reason;
            $deactivate->status = 3;
            $saved = $deactivate->update();
            if ($saved) {
                return response()->json(['message' => 'Students Deactivation Cancelled Successfully.']);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }
    }

    public function send_mail(Request $request)
    {
        $member = Member::where('member_id', auth()->user()->id)->first();
        $data = SchooStudentEmail::where('primary_member_id', $member->id)->with('member.user')->get();
        $input['subject'] = 'Test Email';

        foreach ($data as $key => $value) {
            $maildata = [
                'email' => $value->member->user->user_name,
                'password' => '12345',
            ];
            Mail::to($value->parent_email)->send(new SendSchoolStudentEmail($maildata));
        }
        echo "Mail send successfully !!";
    }
}
