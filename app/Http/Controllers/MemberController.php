<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Family;
use App\Models\Member;
use App\Models\ReportFile;
use App\Models\UploadReport;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('User')) {
            $member = Member::where('member_id', Auth::user()->id)->first();
            $family = Family::where('family_id', $member->id)->with('user_2')->first();
            $report = UploadReport::where('member_id', $member->id)->count();
        } else {

            return view('viewnotfound');
        }
        return view("admin.member.index", compact('member', 'family', 'report'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if (Gate::allows('User')) {

            $member = Member::where('slug', $slug)->first();
        } else {

            return view('viewnotfound');
        }
        return view("admin.member.edit", compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
        ]);
        $member = Member::with('member')->where('slug', $slug)->first();
        $familyName = Member::where('family_name', $request->family_name)->first();
        if ($member->member_type == null) {
            if ($request->member_type == 'Primary Member') {
                if ($familyName != null) {
                    $request->validate([
                        'family_name' => 'unique:members'
                    ]);
                }
            } else if ($request->member_type == 'Dependent Member') {
                if ($familyName == null) {
                    $request->validate([
                        'family_name' => 'exists:members'
                    ], [
                        'family_name.exists' => 'The family name does not exist.'
                    ]);
                }
            }
        }
        $member->gender = $request->gender;
        $member->address = $request->address;
        $member->dob = $request->dob;
        $member->blood_group = $request->blood_group;
        $member->country = $request->country;
        $member->weight = $request->weight;
        $member->height = $request->height;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $member->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $member->image = $images[0];
                $member->image_path = $images[1];
            }

            if ($request->hasFile('image')) {
                $destination1 = 'public/images/' . $member->file;
                if (Storage::exists($destination1)) {
                    Storage::delete($destination1);
                };
                $images1 = storeImageLaravel($request, 'file', 'file_path');
                $member->image = $images1[0];
                $member->image_path = $images1[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $member->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $member->image = $images[0];
                $member->image_path = $images[1];
            }
            if ($request->hasFile('file')) {
                $destination1 = 'images/' . $member->file;
                Storage::disk('minio')->delete($destination1);
                $images1 = storeImageStorage($request, 'file', 'file_path');
                $member->file = $images1[0];
                $member->file_path = $images1[1];
            }
        }
        $name = str_replace(' ', '-', $request->name);
        $member->slug =  'member-' . $name . '-' . $this->random;
        if ($member->member_type == null) {
            $member->member_type = $request->member_type;
            if ($request->member_type == 'Primary Member') {
                $member->family_name = $request->family_name;
            }
            if ($request->member_type == 'Dependent Member') {
                $family = new Family();
                $family->user_id = $familyName->id;
                $family_id = Member::where('member_id', Auth::user()->id)->first()->id;
                $family->family_id = $family_id;
                $family->save();
            }
        }
        $member->save();
        $member_id = $member->member_id;
        $edit_member = User::findOrFail($member_id);
        $edit_member->name = $request->name;
        $edit_member->email = $request->email;
        $edit_member->phone = $request->phone;
        $edit_member->save();
        return redirect()->route('member.index')->with("success", "Member Updated Sucessfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }

    public function updatebp($id, Request $request)
    {
        $request->validate([
            'upper' => 'required',
            'lower' => 'required',
        ]);
        $member = Member::find($id);
        $member->bp = $request->upper . '/' . $request->lower;
        $member->bp_updated_date = Carbon::now()->format('Y-m-d');
        $updated = $member->save();
        if ($updated) {
            return redirect()->back()->with('success', 'Blood Pressure Updated Successfully.');
        }
    }

    public function upload($id)
    {
        $member = Member::find($id);
        $department = Department::all();
        return view('admin.member.upload', compact('department', 'member'));
    }
    public function editupload($reportid)
    {
        $report = UploadReport::find($reportid);
        // return $report;
        $member = Member::find($report->member_id);
        // return $member;
        $department = Department::all();
        $reportFiles = ReportFile::where('report_id', $reportid)->get();
        // return $reportFiles;
        return view('admin.member.editUpload', compact('department', 'member', 'report', 'reportFiles'));
    }

    public function uploadStore(Request $request)
    {
        $request->validate([
            'report_type' => 'required',
            'department' => 'required',
            'doctor' => 'required',
            'report' => 'required'
        ]);
        $report = new UploadReport();
        $report->member_id = $request->member_id;
        $report->report_type = $request->report_type;
        $report->department = $request->department;
        $report->doctor = $request->doctor;
        $report->save();
        if ($request->hasFile('report')) {
            foreach ($request->report as $file) {
                $reportfile = new ReportFile();
                $reportfile->report_id = $report->id;
                $fileNameExt = $file->getClientOriginalName();
                $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
                $fileExt = $file->getClientOriginalExtension();
                $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
                $file->storeAs('public/images', $fileNameToStore);
                $pathToStore =  asset('storage/images/' . $fileNameToStore);
                $reportfile->report_path = $pathToStore;
                $reportfile->report = $fileNameToStore;
                $reportfile->save();
            }
        }
        return redirect()->route('member.index')->with('success', 'Medical Report Uploaded Successfully.');
    }

    public function view($id)
    {
        $report = UploadReport::where('member_id', $id)->with(['reportfiles', 'departments'])->get();
        //return $report;
        return view('admin.member.viewreport', compact('report'));
    }
}
