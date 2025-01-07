<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\CompanySchoolProfile;
use App\Http\Controllers\Controller;
use App\Imports\ImportUsers;
use App\Models\FamilyName;
use App\Models\ImportFile;
use App\Models\Member;
use App\Models\SchooStudentEmail;
use App\Models\User;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Facades\Excel;

class CompanySchoolProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companySchoolProfile = CompanySchoolProfile::orderBy('created_at', 'desc')->with('member.files')->get();
        return view('admin.companyschoolprofile.index', compact('companySchoolProfile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Member::with('user')->get();
        return view('admin.companyschoolprofile.create', compact('user'));
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
            'member_id' => 'required'
        ]);
        $companySchoolProfile = new CompanySchoolProfile();
        $member = Member::find($request->member_id);
        $companySchoolProfile->member_id = $member->id;
        $check_data = CompanySchoolProfile::exists();
        if ($check_data) {
            $lastorderId = CompanySchoolProfile::orderBy('id', 'desc')->first()->user_name;
            $lastIncreament = explode("-", $lastorderId);
            $integerId = $lastIncreament[3];
            $intIds = $integerId + 1;
            $companySchoolProfile->user_name = 'GD-KTM-S-' . $intIds;
        } else {
            $companySchoolProfile->user_name = 'GD-KTM-S-1';
        }
        $companySchoolProfile->types = $request->types;
        $companySchoolProfile->owner_name = $request->owner_name;
        $companySchoolProfile->company_address = $request->company_address;
        $companySchoolProfile->company_start_date = $request->company_start_date;
        $companySchoolProfile->description = $request->description;
        $companySchoolProfile->pan_number = $request->pan_number;
        $companySchoolProfile->contact_number = $request->contact_number;
        if (env('STORAGE_TYPE') == 'native') {

            if ($request->hasFile('company_image')) {
                $images = storeImageLaravel($request, 'company_image', 'company_image_path');
                $companySchoolProfile->company_image = $images[0];
                $companySchoolProfile->company_image_path = $images[1];
            }

            if ($request->hasFile('paper_work_pdf')) {
                $images1 = storeImageLaravel($request, 'paper_work_pdf', 'paper_work_pdf_path');
                $companySchoolProfile->paper_work_pdf = $images1[0];
                $companySchoolProfile->paper_work_pdf_path = $images[1];
            }
        } else {

            if ($request->hasFile('company_image')) {
                $images = storeImageStorage($request, 'company_image', 'company_image_path');
                $companySchoolProfile->company_image = $images[0];
                $companySchoolProfile->company_image_path = $images[1];
            }

            if ($request->hasFile('paper_work_pdf')) {
                $images1 = storeImageStorage($request, 'paper_work_pdf', 'paper_work_pdf_path');
                $companySchoolProfile->paper_work_pdf = $images1[0];
                $companySchoolProfile->paper_work_pdf_path = $images[1];
            }
        }
        $saved = $companySchoolProfile->save();
        if ($saved) {
            return redirect()->route('company-profile.index')->with('success', 'Company School Profile Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanySchoolProfile  $companySchoolProfile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companySchoolProfile = CompanySchoolProfile::with('member.user', 'member.files')->findOrFail($id);
        return view('admin.companyschoolprofile.show', compact('companySchoolProfile'));
    }

    public function verify($id)
    {
        $companySchoolProfile = CompanySchoolProfile::with('member.files')->findOrFail($id);
        $schoolCsvExist = SchooStudentEmail::where('primary_member_id', $companySchoolProfile->member_id)->exists();
        $allStudents = SchooStudentEmail::with('member:id,member_id,gender,address,dob', 'member.user:id,user_name,name')->where('primary_member_id', $companySchoolProfile->member_id)->get();

        // Replace 'path_to_your_csv_file.csv' with the actual path to your CSV file
        $get_file = ImportFile::where('member_id', $companySchoolProfile->member_id)->first();

        if(env('STORAGE_TYPE') == 'minio'){
            $fileContents = file_get_contents($get_file->file_path);
            $contents = array_map('str_getcsv', explode("\n", $fileContents));
            $actualContents = array_filter($contents, function($innerArray) {
                return !(count($innerArray) === 1 && $innerArray[0] === null);
            });
            $actualContents = array_values($actualContents);
            $filteredArray = array($actualContents);
            $header = $filteredArray[0];
        }
        else{
            $file = 'public/files/' . $get_file->file;
            // Load the CSV file using the Excel facade
            $filteredArray = Excel::toCollection(new class implements ToCollection
            {
                public function collection($rows)
                {
                    return $rows;
                }
            }, $file);
            // Get the actual array data from the collection
            $header = $filteredArray[0]->toArray();
        }

        $firstArray = array_shift($header);
        $countArray = count($firstArray);
        $duplicateRows = [];
        $duplicateCsv = [];
        $nullValues = [];
        $duplicateRows2 = [];
        $rows = [];
        if ($countArray == 11) {
            // Remove the header row from the data array
            $rows = array_slice($header, 0);
            // Initialize an array to store encountered combinations
            $encounteredCombinations = [];

            // Iterate over the rows to check for duplicates
            foreach ($rows as $row) {
                $combination = implode('-', array_slice($row, 8, 4));

                if (in_array($combination, $encounteredCombinations)) {
                    $duplicateRows[] = $row;
                } else {
                    $encounteredCombinations[] = $combination;
                }
            }

            $keys = [
                "first_name",
                "middle_name",
                "last_name",
                "gender",
                "date_of_birth",
                "address",
                "parent_email",
                "parent_phone",
                "class",
                "section",
                "roll"
            ];
            // Add keys to each sub-array
            $updatedData = array_map(function ($item) use ($keys) {
                return array_combine($keys, $item);
            }, $rows);

            // Remove "first_name" and "last_name" keys from each sub-array
            $removedData = array_map(function ($item) {
                unset($item['first_name'], $item['middle_name'], $item['last_name'], $item['gender'], $item['date_of_birth'], $item['address'], $item['parent_email'], $item['parent_phone']);
                return $item;
            }, $updatedData);

            $existedData = SchooStudentEmail::select('primary_member_id', 'parent_email', 'parent_phone', 'year', 'class', 'section', 'roll')->where('primary_member_id', $companySchoolProfile->member_id)->get()->toArray();
            // Remove "primary_member_id" keys from each sub-array
            $removedExistedData = array_map(function ($item) {
                unset($item['primary_member_id'], $item['parent_email'], $item['parent_phone'], $item['year']);
                return $item;
            }, $existedData);

            $combinationDuplicate = collect($removedData)->map(function ($item) {
                return implode('-', array_values($item));
            })->toArray();
            $duplicateStudents = SchooStudentEmail::with('member:id,member_id,gender,address,dob', 'member.user:id,user_name,name,first_name,middle_name,last_name')->where('primary_member_id', $companySchoolProfile->member_id)->get();
            // Initialize an array to store encountered combinations

            $duplicateRows2 = collect($duplicateStudents)->filter(function ($item) use ($combinationDuplicate) {
                return in_array("{$item['class']}-{$item['section']}-{$item['roll']}", $combinationDuplicate);
            })->values()->all();

            $data = array_slice($header, 1);

            foreach ($data as $subArray) {
                for ($i = 0; $i < count($subArray); $i++) {
                    if ($i !== 1 && $subArray[$i] === null) {
                        $nullValues[] = $subArray;
                        break;
                    }
                }
            }
        }
        return view('admin.companyschoolprofile.verify', compact('rows', 'companySchoolProfile', 'duplicateRows', 'countArray', 'allStudents', 'schoolCsvExist', 'duplicateRows2', 'nullValues'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanySchoolProfile  $companySchoolProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanySchoolProfile $companySchoolProfile, $id)
    {
        $user = Member::with('user')->get();
        $companySchoolProfile = CompanySchoolProfile::findOrFail($id);
        return view('admin.companyschoolprofile.edit', compact('companySchoolProfile', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanySchoolProfile  $companySchoolProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanySchoolProfile $companySchoolProfile, $id)
    {
        $request->validate([
            'member_id' => 'required'
        ]);
        $companySchoolProfile = CompanySchoolProfile::findOrFail($id);
        $companySchoolProfile->owner_name = $request->owner_name;
        $companySchoolProfile->company_address = $request->company_address;
        $companySchoolProfile->company_start_date = $request->company_start_date;
        $companySchoolProfile->description = $request->description;
        $companySchoolProfile->pan_number = $request->pan_number;
        $companySchoolProfile->contact_number = $request->contact_number;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('company_image')) {
                $destination = 'public/images/' . $companySchoolProfile->company_image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'company_image', 'company_image_path');
                $companySchoolProfile->company_image = $images[0];
                $companySchoolProfile->company_image_path = $images[1];
            }
            if ($request->hasFile('paper_work_pdf')) {
                $destination1 = 'public/images/' . $companySchoolProfile->paper_work_pdf;
                if (Storage::exists($destination1)) {
                    Storage::delete($destination1);
                };
                $images1 = storeImageLaravel($request, 'paper_work_pdf', 'paper_work_pdf_path');
                $companySchoolProfile->paper_work_pdf = $images1[0];
                $companySchoolProfile->paper_work_pdf_path = $images[1];
            }
        } else {
            if ($request->hasFile('paper_work_pdf')) {
                $destination = 'images/' . $companySchoolProfile->company_image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'company_image', 'company_image_path');
                $companySchoolProfile->company_image = $images[0];
                $companySchoolProfile->company_image_path = $images[1];
            }
            if ($request->hasFile('paper_work_pdf')) {
                $destination1 = 'images/' . $companySchoolProfile->paper_work_pdf;
                Storage::disk('minio')->delete($destination1);
                $images1 = storeImageStorage($request, 'paper_work_pdf', 'paper_work_pdf_path');
                $companySchoolProfile->paper_work_pdf = $images1[0];
                $companySchoolProfile->paper_work_pdf_path = $images[1];
            }
        }
        $saved = $companySchoolProfile->update();
        if ($saved) {
            return redirect()->route('company-profile.index')->with('success', 'Company School Profile Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanySchoolProfile  $companySchoolProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanySchoolProfile $companySchoolProfile)
    {
        //
    }

    public function reject_profile(Request $request, $id)
    {
        $companySchoolProfile = CompanySchoolProfile::findOrFail($id);
        $companySchoolProfile->status = 'rejected';
        $companySchoolProfile->reject_reason = $request->reject_reason;
        $companySchoolProfile->update();
        return redirect()->route('company-profile.index')->with('success', 'Company School Profile Rejected Successfully');
    }

    public function reject_csv(Request $request, $id)
    {
        $companySchoolProfile = CompanySchoolProfile::findOrFail($id);
        $companySchoolProfile = ImportFile::where('member_id', $companySchoolProfile->member_id)->first();
        $companySchoolProfile->status = 2;
        $companySchoolProfile->reject_reason = $request->reject_reason;
        $companySchoolProfile->update();
        return redirect()->route('company-profile.index')->with('success', 'Company School CSV Rejected Successfully');
    }

    public function verify_profile($id)
    {
        $companySchoolProfile = CompanySchoolProfile::findOrFail($id);
        $companySchoolProfile->status = 'verified';
        $saved = $companySchoolProfile->update();

        if ($saved) {
            $member = Member::find($companySchoolProfile->member_id);
            if ($member->member_type == null) {
                $user = User::where('id', $member->member_id)->first();
                $user->user_name = $companySchoolProfile->user_name;
                $user->is_school = 0;
                $user->update();

                $member->member_type = 'Primary Member';
                $member->update();

                $familyname = new FamilyName();
                $familyname->primary_member_id = $member->id;
                $familyname->family_name = $user->last_name . $member->id;
                $familyname->save();
            }
        }
        return redirect()->route('company-profile.index')->with('success', 'Company School Profile Verified Successfully');
    }

    public function upload(Request $request, $id)
    {
        $member = Member::find($id);
        $familyname = FamilyName::where('primary_member_id', $id)->first();
        $user_name = $member->user->user_name;

        $userpackage = UserPackage::where('familyname_id', $familyname->id)->latest()->first();
        if ($userpackage != null) {
            if ($userpackage->package_status == 'Pending' || $userpackage->package_status == 'Activated' || $userpackage->package_status == 'Deactivated') {
                $payment_status = 0;
            } else {
                $payment_status = 1;
            }
        } else {
            $payment_status = 1;
        }
        $get_file = ImportFile::where('member_id', $member->id)->first();
        if(env('STORAGE_TYPE') == 'minio'){
            $fileContents = file_get_contents($get_file->file_path);
            $contents = array_map('str_getcsv', explode("\n", $fileContents));
            $keys = [
                "first_name",
                "middle_name",
                "last_name",
                "gender",
                "dob",
                "address",
                "parent_email",
                "parent_phone",
                "class",
                "section",
                "roll"
            ];
            $rows = array_slice($contents,1);
            $filtered = array_filter($rows, function($innerArray) {
                return !(count($innerArray) === 1 && $innerArray[0] === null);
            });
            $actualContents = array_map(function ($item) use ($keys) {
                return array_combine($keys, $item);
            }, $filtered);

            try{
                DB::beginTransaction();
                foreach($actualContents as $row){
                    Helper::uploadCsv($row, $id, $familyname->id, $user_name, $payment_status);
                }
                DB::commit(); 
                $file = ImportFile::where('member_id',$id)->first();
                $file->status = 1;
                $file->update();
            } catch (\Exception $e) {
                // Handle exceptions and errors, and optionally log them
                DB::rollBack();
                throw $e;
            }        
        }
        else{
            $csvFile = 'public/files/' . $get_file->file;

            try{
                DB::beginTransaction();

                Excel::import(new ImportUsers($id, $familyname->id, $user_name, $payment_status), $csvFile);
                
                DB::commit(); 
                $file = ImportFile::where('member_id',$id)->first();
                $file->status = 1;
                $file->update();
            } catch (\Exception $e) {
                // Handle exceptions and errors, and optionally log them
                DB::rollBack();
                throw $e;
            }      
        }

        return redirect()->back()->with('success', 'File Uploaded and Verified Successfully.');
    }
}
