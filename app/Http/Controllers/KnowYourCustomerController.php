<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Family;
use App\Models\FamilyName;
use App\Models\InsuranceDetails;
use App\Models\KnowYourCustomer;
use App\Models\Member;
use App\Models\Municipality;
use App\Models\PackageInsuranceDetail;
use App\Models\PackagePayment;
use App\Models\Province;
use App\Models\StoreToken;
use App\Models\User;
use App\Models\UserPackage;
use App\Models\Ward;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class KnowYourCustomerController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }
    // public function checkControllerPermission()
    // {
    //     $items = array("SuperAdmin","Admin");
    //     $permission = RolePermission::with('sub_role_type')->whereJsonContains('permission_id',["2"])->get();
    //     foreach($permission as $item)
    //     {
    //         $items[] = $item->sub_role_type->subrole;
    //     }
    //     return $items;
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $kycs = KnowYourCustomer::all();
    //     return view("admin.kyc.index", compact('kycs'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->global_form_id != null) {

            return $this->edit();
        }
        $provinces = Province::all();
        return view("admin.kyc.create", compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'account_branch' => 'required',
            'currency' => 'required',
            'mobile_number' => 'required',
            'nationality' => 'required',
            'email' => 'required',
            'country' => 'required',

            'temp_house_number' => 'required',
            'temp_province_id' => 'required',
            'temp_district_id' => 'required',
            'temp_municipality_id' => 'required',
            'temp_ward_id' => 'required',
            'temp_location' => 'required',

            'perm_house_number' => 'required',
            'perm_province_id' => 'required',
            'perm_district_id' => 'required',
            'perm_municipality_id' => 'required',
            'perm_ward_id' => 'required',
            'perm_location' => 'required',

            'work_status' => 'required',
            'account_purpose' => 'required',
            'source_of_income' => 'required',
            'annual_income' => 'required',
            'occupation' => 'required',

            'latitude' => 'required',
            'longitude' => 'required',

            'citizenship_front' => 'required|mimes:jpeg,png,jpg,gif',
            'citizenship_back' => 'required|mimes:jpeg,png,jpg,gif',
            'self_image' => 'required|mimes:jpeg,png,jpg,gif',
        ]);

        // return $request;
        $kyc = new KnowYourCustomer();
        $kyc->user_id  = auth()->user()->id;
        $kyc->salutation  = $request->salutation;
        $kyc->first_name  = $request->first_name;
        $kyc->slug = $request->first_name . 'kyc' . '-' . $this->random;
        $kyc->middle_name  = $request->middle_name;
        $kyc->last_name  = $request->last_name;
        $kyc->gender  = $request->gender;
        $kyc->nationality  = $request->nationality;
        $kyc->birth_date  = $request->birth_date;
        $kyc->account_branch  = $request->account_branch;
        $kyc->currency  = $request->currency;
        $kyc->mobile_number  = $request->mobile_number;
        $kyc->email  = $request->email;
        $kyc->country  = $request->country;
        //temporary address
        $kyc->temp_house_number  = $request->temp_house_number;
        $kyc->temp_province_id  = $request->temp_province_id;
        $kyc->temp_district_id  = $request->temp_district_id;
        $kyc->temp_municipality_id  = $request->temp_municipality_id;
        $kyc->temp_ward_id  = $request->temp_ward_id;
        $kyc->temp_location  = $request->temp_location;
        //permanent address
        $kyc->perm_house_number  = $request->perm_house_number;
        $kyc->perm_province_id  = $request->perm_province_id;
        $kyc->perm_district_id  = $request->perm_district_id;
        $kyc->perm_municipality_id  = $request->perm_municipality_id;
        $kyc->perm_ward_id  = $request->perm_ward_id;
        $kyc->perm_location  = $request->perm_location;
        //occupation
        $kyc->work_status  = $request->work_status;
        $kyc->account_purpose  = $request->account_purpose;
        $kyc->source_of_income  = $request->source_of_income;
        $kyc->annual_income  = $request->annual_income;
        $kyc->occupation  = $request->occupation;
        $kyc->pan_number  = $request->pan_number;
        $kyc->organization_name  = $request->organization_name;
        $kyc->designation  = $request->designation;
        $kyc->organization_address  = $request->organization_address;
        $kyc->organization_number  = $request->organization_number;
        // family details
        $kyc->father_full_name  = $request->father_full_name;
        $kyc->mother_full_name  = $request->mother_full_name;
        $kyc->grandfather_full_name  = $request->grandfather_full_name;
        $kyc->grandmother_full_name  = $request->grandmother_full_name;
        $kyc->husband_wife_full_name  = $request->husband_wife_full_name;
        $kyc->marital_status  = $request->marital_status;
        //transaction
        $kyc->max_amount_per_tansaction  = $request->max_amount_per_tansaction;
        $kyc->number_of_monthly_transaction  = $request->number_of_monthly_transaction;
        $kyc->monthly_amount_of_transaction  = $request->monthly_amount_of_transaction;
        $kyc->number_of_yearly_transaction  = $request->number_of_yearly_transaction;
        $kyc->yearly_amount_of_transaction  = $request->yearly_amount_of_transaction;
        //education
        $kyc->education  = $request->education;
        //identification details
        $kyc->identification_type  = $request->identification_type;
        $kyc->identification_no  = $request->identification_no;
        $kyc->citizenship_date  = $request->citizenship_date;
        $kyc->citizenship_issue_district  = $request->citizenship_issue_district;
        //nominee details
        $kyc->nominee_name  = $request->is_nominee ? $request->nominee_name : null;
        $kyc->nominee_father_name  = $request->is_nominee ? $request->nominee_father_name : null;
        $kyc->nominee_grandfather_name  = $request->is_nominee ? $request->nominee_grandfather_name : null;
        $kyc->nominee_relation  = $request->is_nominee ? $request->nominee_relation : null;
        $kyc->nominee_citizenship_issued_place  = $request->is_nominee ? $request->nominee_citizenship_issued_place : null;
        $kyc->nominee_citizenship_number  = $request->is_nominee ? $request->nominee_citizenship_number : null;
        $kyc->nominee_citizenship_issued_date  = $request->is_nominee ? $request->nominee_citizenship_issued_date : null;
        $kyc->nominee_birthdate  = $request->is_nominee ? $request->nominee_birthdate : null;
        $kyc->nominee_permanent_address  = $request->is_nominee ? $request->nominee_permanent_address : null;
        $kyc->nominee_current_address  = $request->is_nominee ? $request->nominee_current_address : null;
        $kyc->nominee_phone_number  = $request->is_nominee ? $request->nominee_phone_number : null;
        //beneficiary details
        $kyc->beneficiary_name  = $request->is_beneficiary ? $request->beneficiary_name : null;
        $kyc->beneficiary_address  = $request->is_beneficiary ?  $request->beneficiary_address : null;
        $kyc->beneficiary_contact_number  = $request->is_beneficiary ?  $request->beneficiary_contact_number : null;
        $kyc->beneficiary_relation  = $request->is_beneficiary ?  $request->beneficiary_relation : null;
        //clecklist
        $kyc->are_you_nrn  = $request->are_you_nrn ? 1 : 0;
        $kyc->us_citizen  = $request->us_citizen ? 1 : 0;
        $kyc->us_residence  = $request->us_residence ? 1 : 0;
        $kyc->criminal_offence  = $request->criminal_offence ? 1 : 0;
        $kyc->green_card  = $request->green_card ? 1 : 0;
        $kyc->account_in_other_banks  = $request->account_in_other_banks ? 1 : 0;
        $kyc->service_form  = implode(",", $request->service_form);

        $kyc->latitude  = $request->latitude;
        $kyc->longitude  = $request->longitude;
        $kyc->status = 'Pending';
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('self_image')) {
                $image = storeImageLaravel($request, 'self_image', 'self_image_path');
                $kyc->self_image = $image[0];
                $kyc->self_image_path = $image[1];
            }

            if ($request->hasFile('citizenship_front')) {
                $image1 = storeImageLaravel($request, 'citizenship_front', 'citizenship_front_path');
                $kyc->citizenship_front = $image1[0];
                $kyc->citizenship_front_path = $image1[1];
            }

            if ($request->hasFile('citizenship_back')) {
                $image2 = storeImageLaravel($request, 'citizenship_back', 'citizenship_back_path');
                $kyc->citizenship_back = $image2[0];
                $kyc->citizenship_back_path = $image2[1];
            }
        } else {
            if ($request->hasFile('self_image')) {
                $image = storeImageStorage($request, 'self_image', 'self_image_path');
                $kyc->self_image = $image[0];
                $kyc->self_image_path = $image[1];
            }

            if ($request->hasFile('citizenship_front')) {
                $image1 = storeImageStorage($request, 'citizenship_front', 'citizenship_front_path');
                $kyc->citizenship_front = $image1[0];
                $kyc->citizenship_front_path = $image1[1];
            }

            if ($request->hasFile('citizenship_back')) {
                $image2 = storeImageStorage($request, 'citizenship_back', 'citizenship_back_path');
                $kyc->citizenship_back = $image2[0];
                $kyc->citizenship_back_path = $image2[1];
            }
        }

        if (KnowYourCustomer::where('user_id', auth()->user()->id)->exists()) {
            return redirect()->route('home')->withErrors('KYC Already Submitted.');
        }
        $saved = $kyc->save();
        $user = User::find(Auth()->user()->id);
        $user->global_form_id = $kyc->id;
        $user->save();
        if ($saved) {
            return redirect()->route('kyc.view')->with('success', 'KYC added successfully');
            // return redirect()->route('kyc.index')->with('success', 'KYC Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KnowYourCustomer  $knowYourCustomer
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = auth()->user();
        $kyc = KnowYourCustomer::findOrFail($user->global_form_id);
        return view("admin.kyc.show", compact('kyc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KnowYourCustomer  $knowYourCustomer
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = auth()->user();
        $kyc = KnowYourCustomer::where('status', 'Rejected')->findOrFail($user->global_form_id);
        $provinces = Province::get(['id', 'english_name']);
        $temp_districts = District::where('province_id', $kyc->temp_province_id)->get(['id', 'english_name']);
        $temp_municipalities = Municipality::where('district_id', $kyc->temp_district_id)->get(['id', 'english_name']);
        $temp_wards = Ward::where('municipalities_id', $kyc->temp_municipality_id)->get(['id', 'ward_name']);
        $perm_districts = District::where('province_id', $kyc->perm_province_id)->get(['id', 'english_name']);
        $perm_municipalities = Municipality::where('district_id', $kyc->perm_district_id)->get(['id', 'english_name']);
        $perm_wards = Ward::where('municipalities_id', $kyc->perm_municipality_id)->get(['id', 'ward_name']);
        return view('admin.kyc.edit', compact(
            "kyc",
            "provinces",
            "temp_districts",
            "temp_municipalities",
            "temp_wards",
            "perm_districts",
            "perm_municipalities",
            "perm_wards"
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KnowYourCustomer  $knowYourCustomer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KnowYourCustomer $knowYourCustomer)
    {
        // return $request;
        $user = auth()->user();
        $kyc = KnowYourCustomer::where('status', 'Rejected')->findOrFail($user->global_form_id);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'birth_date' => 'required',
            'account_branch' => 'required',
            'currency' => 'required',
            'mobile_number' => 'required',
            'nationality' => 'required',
            'email' => 'required',
            'country' => 'required',

            'temp_house_number' => 'required',
            'temp_province_id' => 'required',
            'temp_district_id' => 'required',
            'temp_municipality_id' => 'required',
            'temp_ward_id' => 'required',
            'temp_location' => 'required',

            'perm_house_number' => 'required',
            'perm_province_id' => 'required',
            'perm_district_id' => 'required',
            'perm_municipality_id' => 'required',
            'perm_ward_id' => 'required',
            'perm_location' => 'required',

            'work_status' => 'required',
            'account_purpose' => 'required',
            'source_of_income' => 'required',
            'annual_income' => 'required',
            'occupation' => 'required',

            'latitude' => 'required',
            'longitude' => 'required',

        ]);

        $kyc->salutation  = $request->salutation;
        $kyc->first_name  = $request->first_name;
        $kyc->middle_name  = $request->middle_name;
        $kyc->last_name  = $request->last_name;
        $kyc->gender  = $request->gender;
        $kyc->nationality  = $request->nationality;
        $kyc->birth_date  = $request->birth_date;
        $kyc->account_branch  = $request->account_branch;
        $kyc->currency  = $request->currency;
        $kyc->mobile_number  = $request->mobile_number;
        $kyc->email  = $request->email;
        $kyc->country  = $request->country;
        //temporary address
        $kyc->temp_house_number  = $request->temp_house_number;
        $kyc->temp_province_id  = $request->temp_province_id;
        $kyc->temp_district_id  = $request->temp_district_id;
        $kyc->temp_municipality_id  = $request->temp_municipality_id;
        $kyc->temp_ward_id  = $request->temp_ward_id;
        $kyc->temp_location  = $request->temp_location;
        //permanent address
        $kyc->perm_house_number  = $request->perm_house_number;
        $kyc->perm_province_id  = $request->perm_province_id;
        $kyc->perm_district_id  = $request->perm_district_id;
        $kyc->perm_municipality_id  = $request->perm_municipality_id;
        $kyc->perm_ward_id  = $request->perm_ward_id;
        $kyc->perm_location  = $request->perm_location;
        //occupation
        $kyc->work_status  = $request->work_status;
        $kyc->account_purpose  = $request->account_purpose;
        $kyc->source_of_income  = $request->source_of_income;
        $kyc->annual_income  = $request->annual_income;
        $kyc->occupation  = $request->occupation;
        $kyc->pan_number  = $request->pan_number;
        $kyc->organization_name  = $request->organization_name;
        $kyc->designation  = $request->designation;
        $kyc->organization_address  = $request->organization_address;
        $kyc->organization_number  = $request->organization_number;
        // family details
        $kyc->father_full_name  = $request->father_full_name;
        $kyc->mother_full_name  = $request->mother_full_name;
        $kyc->grandfather_full_name  = $request->grandfather_full_name;
        $kyc->grandmother_full_name  = $request->grandmother_full_name;
        $kyc->husband_wife_full_name  = $request->husband_wife_full_name;
        $kyc->marital_status  = $request->marital_status;
        //transaction
        $kyc->max_amount_per_tansaction  = $request->max_amount_per_tansaction;
        $kyc->number_of_monthly_transaction  = $request->number_of_monthly_transaction;
        $kyc->monthly_amount_of_transaction  = $request->monthly_amount_of_transaction;
        $kyc->number_of_yearly_transaction  = $request->number_of_yearly_transaction;
        $kyc->yearly_amount_of_transaction  = $request->yearly_amount_of_transaction;
        //education
        $kyc->education  = $request->education;
        //identification details
        $kyc->identification_type  = $request->identification_type;
        $kyc->identification_no  = $request->identification_no;
        $kyc->citizenship_date  = $request->citizenship_date;
        $kyc->citizenship_issue_district  = $request->citizenship_issue_district;
        //nominee details
        $kyc->nominee_name  = $request->is_nominee ? $request->nominee_name : null;
        $kyc->nominee_father_name  = $request->is_nominee ? $request->nominee_father_name : null;
        $kyc->nominee_grandfather_name  = $request->is_nominee ? $request->nominee_grandfather_name : null;
        $kyc->nominee_relation  = $request->is_nominee ? $request->nominee_relation : null;
        $kyc->nominee_citizenship_issued_place  = $request->is_nominee ? $request->nominee_citizenship_issued_place : null;
        $kyc->nominee_citizenship_number  = $request->is_nominee ? $request->nominee_citizenship_number : null;
        $kyc->nominee_citizenship_issued_date  = $request->is_nominee ? $request->nominee_citizenship_issued_date : null;
        $kyc->nominee_birthdate  = $request->is_nominee ? $request->nominee_birthdate : null;
        $kyc->nominee_permanent_address  = $request->is_nominee ? $request->nominee_permanent_address : null;
        $kyc->nominee_current_address  = $request->is_nominee ? $request->nominee_current_address : null;
        $kyc->nominee_phone_number  = $request->is_nominee ? $request->nominee_phone_number : null;
        //beneficiary details
        $kyc->beneficiary_name  = $request->is_beneficiary ? $request->beneficiary_name : null;
        $kyc->beneficiary_address  = $request->is_beneficiary ?  $request->beneficiary_address : null;
        $kyc->beneficiary_contact_number  = $request->is_beneficiary ?  $request->beneficiary_contact_number : null;
        $kyc->beneficiary_relation  = $request->is_beneficiary ?  $request->beneficiary_relation : null;
        //clecklist
        $kyc->are_you_nrn  = $request->are_you_nrn ? 1 : 0;
        $kyc->us_citizen  = $request->us_citizen ? 1 : 0;
        $kyc->us_residence  = $request->us_residence ? 1 : 0;
        $kyc->criminal_offence  = $request->criminal_offence ? 1 : 0;
        $kyc->green_card  = $request->green_card ? 1 : 0;
        $kyc->account_in_other_banks  = $request->account_in_other_banks ? 1 : 0;
        $kyc->service_form  = implode(",", $request->service_form);

        $kyc->latitude  = $request->latitude;
        $kyc->longitude  = $request->longitude;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('citizenship_back')) {
                $destination = 'public/images/' . $kyc->self_image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $image = storeImageLaravel($request, 'self_image', 'self_image_path');
                $kyc->self_image = $image[0];
                $kyc->self_image_path = $image[1];
            }

            if ($request->hasFile('citizenship_back')) {
                $destination1 = 'public/images/' . $kyc->letter;
                if (Storage::exists($destination1)) {
                    Storage::delete($destination1);
                };
                $image1 = storeImageLaravel($request, 'citizenship_front', 'citizenship_front_path');
                $kyc->citizenship_front = $image1[0];
                $kyc->citizenship_front_path = $image1[1];
            }

            if ($request->hasFile('citizenship_back')) {
                $destination2 = 'public/images/' . $kyc->investor_image;
                if (Storage::exists($destination2)) {
                    Storage::delete($destination2);
                };
                $image2 = storeImageLaravel($request, 'citizenship_back', 'citizenship_back_path');
                $kyc->citizenship_back = $image2[0];
                $kyc->citizenship_back_path = $image2[1];
            }
        } else {
            if ($request->hasFile('self_image')) {
                $destination = 'images/' . $kyc->self_image;
                Storage::disk('minio')->delete($destination);
                $image = storeImageStorage($request, 'self_image', 'self_image_path');
                $kyc->self_image = $image[0];
                $kyc->self_image_path = $image[1];
            }

            if ($request->hasFile('citizenship_front')) {
                $destination1 = 'images/' . $kyc->citizenship_front;
                Storage::disk('minio')->delete($destination1);
                $image1 = storeImageStorage($request, 'citizenship_front', 'citizenship_front_path');
                $kyc->citizenship_front = $image1[0];
                $kyc->citizenship_front_path = $image1[1];
            }

            if ($request->hasFile('citizenship_back')) {
                $destination2 = 'images/' . $kyc->citizenship_back;
                Storage::disk('minio')->delete($destination2);
                $image2 = storeImageStorage($request, 'citizenship_back', 'citizenship_back_path');
                $kyc->citizenship_back = $image2[0];
                $kyc->citizenship_back_path = $image2[1];
            }
        }
        $kyc->status = 'Pending';
        $saved = $kyc->update();

        if ($saved) {
            return redirect()->route('kyc.view')->with('success', 'Global Form updated successfully');
            // return redirect()->route('kyc.index')->with('success', 'KYC Added Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KnowYourCustomer  $knowYourCustomer
     * @return \Illuminate\Http\Response
     */
    // public function destroy(KnowYourCustomer $knowYourCustomer)
    // {
    //     //
    // }

    // public function verify($id)
    // {
    //     $kyc = KnowYourCustomer::find($id);
    //     $kyc->status = 1;
    //     $save = $kyc->save();
    //     if ($save) {
    //         return redirect()->route('users.index')->with('success', 'KYC Verified Successfully');
    //     }
    // }


    public function admin_index()
    {
        if (Gate::any(checkPermission("2")) || Gate::any('Superadmin', 'Admin')) {
            $kycs = KnowYourCustomer::where('form_status', 'upload-document')->orderby('created_at', 'desc')->get();
            return view('admin.kyc_admin.index', compact("kycs"));
        } else {
            return view('viewnotfound');
        }
    }

    public function admin_show($slug)
    {
        if (Gate::any(checkPermission("2"))) {
            $kyc = KnowYourCustomer::where('slug', $slug)->firstOrFail();
            return view('admin.kyc_admin.show', compact("kyc"));
        } else {
            return view('viewnotfound');
        }
    }

    public function admin_reject(Request $request, $slug)
    {
        $kyc = KnowYourCustomer::where('slug', $slug)->firstOrFail();
        $kyc->status = 'Rejected';
        $kyc->reject_reason = $request->reject_reason;
        $kyc->update();
        $user_device_key  = StoreToken::where('user_id', $kyc->user_id)->first();
        if ($user_device_key) {
            $title = "KYC Rejected Notification";
            $text = "You KYC has been '$kyc->status'. '$kyc->reject_reason'";
            $notification_id = $user_device_key->device_key;
            $type = 'kyc';
            send_notification_FCM($notification_id, $title, $text, $type);
        }
        return redirect()->route('kyc.admin_show', ['slug' => $slug])->with('success', 'KYC Rejected Successfully');
    }

    public function admin_verify($slug)
    {
        $kyc = KnowYourCustomer::where('slug', $slug)->firstOrFail();
        $kyc->status = 'Active';
        $save = $kyc->update();
        $member = Member::where('member_id', $kyc->user_id)->first();
        if ($member->member_type == 'Primary Member') {
            $familyname = FamilyName::where('primary_member_id', $member->id)->first();
            $userpackage =  UserPackage::where('familyname_id', $familyname->id)->where('package_status', 'Pending')->latest()->first();

            //activate package after global form is approved
            if ($userpackage != null) {
                $userpackage->package_status = 'Activated';
                $userpackage->activated_date = Carbon::now()->format('Y-m-d');
                $userpackage->expiry_date = Carbon::now()->addMonthsNoOverflow(12)->subDay()->toDateString();
                $userpackage->update();
                $insuranceDetails = PackageInsuranceDetail::where('userpackage_id', $userpackage->id)->where('user_id', $kyc->user_id)->first();
                $insuranceDetails->status = 1;
                $insuranceDetails->update();

                //payment date and payment expiry date according to the package activation date
                $payment = PackagePayment::where('userpackage_id', $userpackage->id)->first();
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
                $payment->update();
            }
        }
        if ($member->member_type == 'Dependent Member') {
            $family = Family::where('member_id', $member->id)->where('approved', 1)->where('payment_status', 1)->first();
            $userpackage =  UserPackage::where('familyname_id', $family->family_id)->whereIn('package_status', ['Pending', 'Activated'])->latest()->first();
            if ($userpackage != null) {
                $insuranceDetails = PackageInsuranceDetail::where('userpackage_id', $userpackage->id)->where('user_id', $kyc->user_id)->first();
                $insuranceDetails->status = 1;
                $insuranceDetails->update();
            }
        }
        $user_device_key  = StoreToken::where('user_id', $kyc->user_id)->first();
        if ($user_device_key) {
            $title = "KYC Approved Notification";
            $text = "You KYC has been approved";
            $notification_id = $user_device_key->device_key;
            $type = 'kyc';
            send_notification_FCM($notification_id, $title, $text, $type);
        }
        if ($save) {
            return redirect()->route('kyc.admin_show', ['slug' => $slug])->with('success', 'KYC Verified Successfully');
        }

        //comment because of change in flow of global form 
        // $kyc = KnowYourCustomer::where('slug', $slug)->firstOrFail();
        // $kyc->status = 'Active';
        // $save = $kyc->update();
        // $member = Member::where('member_id', $kyc->user_id)->first();
        // if($member->member_type == 'Primary Member'){
        //     $familyname = FamilyName::where('primary_member_id',$member->id)->first();
        //     $userpackage =  UserPackage::where('familyname_id',$familyname->id)->where('package_status','Pending')->latest()->first();
        //     if($userpackage != null){
        //         $userpackage->package_status = 'Booked';
        //         $userpackage->update();
        //         $insuranceDetails = InsuranceDetails::where('userpackage_id',$userpackage->id)->where('user_id',$kyc->user_id)->first();
        //         $insuranceDetails->status = 1;
        //         $insuranceDetails->update();
        //     }
        // }
        // if($member->member_type == 'Dependent Member'){
        //     $family = Family::where('member_id',$member->id)->where('approved',1)->where('payment_status',1)->first();
        //     $userpackage =  UserPackage::where('familyname_id',$family->family_id)->where('package_status','Pending')->orWhere('package_status','Booked')->orWhere('package_status','Activated')->latest()->first();
        //     if($userpackage != null){
        //         $insuranceDetails = InsuranceDetails::where('userpackage_id',$userpackage->id)->where('user_id',$kyc->user_id)->first();
        //         $insuranceDetails->status = 1;
        //         $insuranceDetails->update();
        //     }
        // }
        // $user_device_key  = StoreToken::where('user_id', $kyc->user_id)->first();
        // if ($user_device_key) {
        //     $title = "KYC Approved Notification";
        //     $text = "You KYC has been approved";
        //     $notification_id = $user_device_key->device_key;
        //     $type = 'kyc';
        //     send_notification_FCM($notification_id, $title, $text, $type);
        // }
        // if ($save) {
        //     return redirect()->route('kyc.admin_show', ['slug' => $slug])->with('success', 'KYC Verified Successfully');
        // }
    }

    public function bankform($slug)
    {
        $kyc = KnowYourCustomer::where('slug', $slug)->firstOrFail();
        return view('admin.kyc_admin.bankform', compact("kyc"));
    }

    public function insurance($slug)
    {
        $kyc = KnowYourCustomer::where('slug', $slug)->firstOrFail();
        return view('admin.kyc_admin.insurance', compact("kyc"));
    }

    public function uploadForm(Request $request, $slug)
    {
        $kyc = KnowYourCustomer::where('slug', $slug)->firstOrFail();
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('nic_file')) {
                $images = storeImageLaravel($request, 'nic_file', 'nic_file_path');
                $kyc->nic_file = $images[0];
                $kyc->nic_file_path = $images[1];
            }
            if ($request->hasFile('insurance_file')) {
                $images = storeImageLaravel($request, 'insurance_file', 'insurance_file_path');
                $kyc->insurance_file = $images[0];
                $kyc->insurance_file_path = $images[1];
            }
        } else {
            if ($request->hasFile('nic_file')) {
                $images = storeImageStorage($request, 'nic_file', 'nic_file_path');
                $kyc->nic_file = $images[0];
                $kyc->nic_file_path = $images[1];
            }
            if ($request->hasFile('insurance_file')) {
                $images = storeImageStorage($request, 'insurance_file', 'insurance_file_path');
                $kyc->insurance_file = $images[0];
                $kyc->insurance_file_path = $images[1];
            }
        }

        $kyc->update();
        return redirect()->route('kyc.admin_show', ['slug' => $slug])->with('success', 'Files Uploaded Successfully');
    }
}
