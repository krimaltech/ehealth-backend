<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\KnowYourCustomer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class KYCApiController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }
    public function viewGloablForm()
    {
        $global_form = KnowYourCustomer::where('user_id', auth()->user()->id)->with(['perm_province','perm_district','perm_municipality','perm_ward','temp_province','temp_district','temp_municipality','temp_ward'])->first();
        return response()->json($global_form);
    }
    public function personal_information(Request $request)
    {
        // return auth()->user()->id;
        try {
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
            ]);
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
            $kyc->form_status  = 'personal-information';

            $saved = $kyc->save();
            $user = User::find(Auth()->user()->id);
            $user->global_form_id = $kyc->id;
            $user->save();

            if ($saved) {
                return response()->json([
                    "status"=> "true",
                    "kyc_id" => $kyc->id
                ]);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }
    }

    public function address_information(Request $request, $id)
    {
        try {
            $request->validate([
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
            ]);
            $kyc = KnowYourCustomer::findOrFail($id);
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
            $kyc->form_status  = 'address-information';
            $saved = $kyc->update();
            if ($saved) {
                return response()->json(200);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }
    }
    public function professional_information(Request $request,$id)
    {
        // return auth()->user()->id;
        try {
            $request->validate([
                'father_full_name' => 'required',
                'mother_full_name' => 'required',
                'grandfather_full_name' => 'required',
                'grandmother_full_name' => 'required',
                'max_amount_per_tansaction' => 'required',
                'number_of_monthly_transaction' => 'required',
                'monthly_amount_of_transaction' => 'required',
                'number_of_yearly_transaction' => 'required',
                'yearly_amount_of_transaction' => 'required',
                'education' => 'required',
                'identification_type' => 'required',
                'identification_no' => 'required',
                'citizenship_date' => 'required',
                'citizenship_issue_district' => 'required',
            ]);
            $kyc = KnowYourCustomer::findOrFail($id);
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
            $kyc->form_status  = 'professional-information';
           
            $saved = $kyc->update();

            if ($saved) {
                return response()->json(200);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }
    }

    public function declaration_and_services(Request $request,$id)
    {
        try {
            $request->validate([
                //
            ]);
            $kyc = KnowYourCustomer::findOrFail($id);
            //nominee details
            $kyc->nominee_name  = $request->nominee_name;
            $kyc->nominee_father_name  = $request->nominee_father_name;
            $kyc->nominee_grandfather_name  = $request->nominee_grandfather_name;
            $kyc->nominee_relation  = $request->nominee_relation;
            $kyc->nominee_citizenship_issued_place  = $request->nominee_citizenship_issued_place;
            $kyc->nominee_citizenship_number  = $request->nominee_citizenship_number;
            $kyc->nominee_citizenship_issued_date  = $request->nominee_citizenship_issued_date;
            $kyc->nominee_birthdate  = $request->nominee_birthdate;
            $kyc->nominee_permanent_address  = $request->nominee_permanent_address;
            $kyc->nominee_current_address  = $request->nominee_current_address;
            $kyc->nominee_phone_number  = $request->nominee_phone_number;
            //beneficiary details
            $kyc->beneficiary_name  = $request->beneficiary_name;
            $kyc->beneficiary_address  = $request->beneficiary_address;
            $kyc->beneficiary_contact_number  = $request->beneficiary_contact_number;
            $kyc->beneficiary_relation  = $request->beneficiary_relation;
            //clecklist
            $kyc->are_you_nrn  = $request->are_you_nrn;
            $kyc->us_citizen  = $request->us_citizen;
            $kyc->us_residence  = $request->us_residence;
            $kyc->criminal_offence  = $request->criminal_offence;
            $kyc->green_card  = $request->green_card;
            $kyc->account_in_other_banks  = $request->account_in_other_banks;
            $kyc->service_form  = $request->service_form;
            $kyc->form_status  = 'declaration-and-services';

            $saved = $kyc->update();
            if ($saved) {
                return response()->json(200);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }
    }
    public function upload_document(Request $request,$id)
    {
        try {
            $request->validate([
                'latitude' => 'required',
                'longitude' => 'required',

                'citizenship_front' => 'required',
                'citizenship_front' => 'required',
                'citizenship_back' => 'required',
            ]);
            $kyc = KnowYourCustomer::findOrFail($id);
            //personal location
            $kyc->latitude  = $request->latitude;
            $kyc->longitude  = $request->longitude;
            if ($request->self_image) {
                $image = $request->self_image;
                if(env('STORAGE_TYPE') == 'minio'){
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($image, $destinationPath); 
                    $kyc->self_image_path = $imageUpload['path'];
                    $kyc->self_image = $imageUpload['file'];
                }else{
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($image,$folderPath);                    
                    $kyc->self_image_path = $imageUpload['path'];
                    $kyc->self_image = $imageUpload['file'];
                }
            }
            if ($request->citizenship_front) {
                $image = $request->citizenship_front;
                if(env('STORAGE_TYPE') == 'minio'){
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($image, $destinationPath); 
                    $kyc->citizenship_front_path = $imageUpload['path'];
                    $kyc->citizenship_front = $imageUpload['file'];
                }else{
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($image,$folderPath);                    
                    $kyc->citizenship_front_path = $imageUpload['path'];
                    $kyc->citizenship_front = $imageUpload['file'];
                }
            }
            if ($request->citizenship_back) {
                $image = $request->citizenship_back;
                if(env('STORAGE_TYPE') == 'minio'){
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($image, $destinationPath); 
                    $kyc->citizenship_back_path = $imageUpload['path'];
                    $kyc->citizenship_back = $imageUpload['file'];
                }else{
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($image,$folderPath);                    
                    $kyc->citizenship_back_path = $imageUpload['path'];
                    $kyc->citizenship_back = $imageUpload['file'];
                }
            }
            $kyc->form_status  = 'upload-document';
            $saved = $kyc->update();

            if ($saved) {
                return response()->json(200);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }
    }

    public function kyc_status()
    {
        // return auth()->user();
        $kycstatus = KnowYourCustomer::where('user_id', auth()->user()->id)->first();
        if ($kycstatus == NULL || $kycstatus->form_status != 'upload-document') {
            return response()->json(['message' => 'kyc form not submitted.']);
        } elseif ($kycstatus->form_status == 'upload-document') {
            if ($kycstatus->status == 'Pending') {
                return response()->json(['message' => 'kyc not verified.']);
            } elseif ($kycstatus->status == 'Active') {
                return response()->json(['message' => 'kyc verified.']);
            } elseif ($kycstatus->status == 'Rejected') {
                return response()->json(['kyc' => $kycstatus, 'message' => 'kyc rejected.']);
            }
        }        
    }

    public function update(Request $request, $id)
    {
        try {
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
            $kyc = KnowYourCustomer::findOrFail($id);
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
            $kyc->nominee_name  = $request->nominee_name;
            $kyc->nominee_father_name  = $request->nominee_father_name;
            $kyc->nominee_grandfather_name  = $request->nominee_grandfather_name;
            $kyc->nominee_relation  = $request->nominee_relation;
            $kyc->nominee_citizenship_issued_place  = $request->nominee_citizenship_issued_place;
            $kyc->nominee_citizenship_number  = $request->nominee_citizenship_number;
            $kyc->nominee_citizenship_issued_date  = $request->nominee_citizenship_issued_date;
            $kyc->nominee_birthdate  = $request->nominee_birthdate;
            $kyc->nominee_permanent_address  = $request->nominee_permanent_address;
            $kyc->nominee_current_address  = $request->nominee_current_address;
            $kyc->nominee_phone_number  = $request->nominee_phone_number;
            //beneficiary details
            $kyc->beneficiary_name  = $request->beneficiary_name;
            $kyc->beneficiary_address  = $request->beneficiary_address;
            $kyc->beneficiary_contact_number  = $request->beneficiary_contact_number;
            $kyc->beneficiary_relation  = $request->beneficiary_relation;
            //clecklist
            $kyc->are_you_nrn  = $request->are_you_nrn;
            $kyc->us_citizen  = $request->us_citizen;
            $kyc->us_residence  = $request->us_residence;
            $kyc->criminal_offence  = $request->criminal_offence;
            $kyc->green_card  = $request->green_card;
            $kyc->account_in_other_banks  = $request->account_in_other_banks;
            $kyc->service_form  = $request->service_form;
            $kyc->status  = 'Pending';

            $kyc->latitude  = $request->latitude;
            $kyc->longitude  = $request->longitude;
            if ($request->self_image) {
                $image = $request->self_image;
                if(env('STORAGE_TYPE') == 'minio'){
                    Storage::disk('minio')->delete('images/'.$kyc->self_image);
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($image, $destinationPath); 
                    $kyc->self_image_path = $imageUpload['path'];
                    $kyc->self_image = $imageUpload['file'];
                }else{
                    $deleteDestinationPath = 'public/images/' . $kyc->self_image;
                    if (Storage::exists($deleteDestinationPath)) {
                        Storage::delete($deleteDestinationPath);
                    }
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($image,$folderPath);                    
                    $kyc->self_image_path = $imageUpload['path'];
                    $kyc->self_image = $imageUpload['file'];
                }
            }
            if ($request->citizenship_front) {
                $image = $request->citizenship_front;
                if(env('STORAGE_TYPE') == 'minio'){
                    Storage::disk('minio')->delete('images/'.$kyc->citizenship_front);
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($image, $destinationPath); 
                    $kyc->citizenship_front_path = $imageUpload['path'];
                    $kyc->citizenship_front = $imageUpload['file'];
                }else{
                    $deleteDestinationPath = 'public/images/' . $kyc->citizenship_front;
                    if (Storage::exists($deleteDestinationPath)) {
                        Storage::delete($deleteDestinationPath);
                    }
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($image,$folderPath);                    
                    $kyc->citizenship_front_path = $imageUpload['path'];
                    $kyc->citizenship_front = $imageUpload['file'];
                }
            }
            if ($request->citizenship_back) {
                $image = $request->citizenship_back;
                if(env('STORAGE_TYPE') == 'minio'){
                    Storage::disk('minio')->delete('images/'.$kyc->citizenship_back);
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($image, $destinationPath); 
                    $kyc->citizenship_back_path = $imageUpload['path'];
                    $kyc->citizenship_back = $imageUpload['file'];
                }else{
                    $deleteDestinationPath = 'public/images/' . $kyc->citizenship_back;
                    if (Storage::exists($deleteDestinationPath)) {
                        Storage::delete($deleteDestinationPath);
                    }
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($image,$folderPath);                    
                    $kyc->citizenship_back_path = $imageUpload['path'];
                    $kyc->citizenship_back = $imageUpload['file'];
                }
            }
            $saved = $kyc->update();
            if ($saved) {
                return response()->json(200);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }
    }
}
