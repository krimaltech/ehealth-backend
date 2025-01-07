<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;
use App\Models\UploadMedicalHistoryConsultation;
use Illuminate\Http\Request;

class UploadMedicalHistoryConsultationController extends Controller
{
    public function index(Request $request)
    {
        $package_user = $request->package;
        $employee = Employee::where('employee_id', auth()->user()->id)->first();
        if (!empty($employee)) {
            $consultation = UploadMedicalHistoryConsultation::orderBy('created_at', 'desc')->with('member.user','doctor.user','medical_report')->where('doctor_id', $employee->id)->get();
        } else {
            $consultation = UploadMedicalHistoryConsultation::orderBy('created_at', 'desc')->with('member.user','doctor.user','medical_report')->get();
        }
        return view('admin.upload_medical_history_consultation.index', compact('consultation','package_user'));
    }

    public function show($id)
    {
        $department = Department::all();
        $doctor = Employee::where('sub_role_id',6)->with('user')->get();
        $consultation = UploadMedicalHistoryConsultation::with('member.user','doctor.user','medical_report','department')->findOrFail($id);
        return view('admin.upload_medical_history_consultation.show', compact('consultation','doctor','department'));
    }

    public function upload(Request $request, $id)
    {
        $consultation = UploadMedicalHistoryConsultation::findOrFail($id);
        $consultation->check_date = $request->check_date;
        $consultation->hospital = $request->hospital;
        $consultation->doctor_name = $request->salutation." ".$request->doctor_name;
        $consultation->doctor_nmc = $request->doctor_nmc;
        $consultation->observation = $request->observation;
        $consultation->finding = $request->finding;
        $consultation->medication = $request->medication;
        if ($request->department_id == "Other") {
            $consultation->department_id = NULL;
        } else {
            $consultation->department_id = $request->department_id;
        }
        
        $consultation->is_other = $request->is_other;
        $consultation->status = 1;
        $consultation->update();
        return redirect()->back()->with('success', 'Consultation updated successfully');
    }

    public function reject_reason(Request $request, $id)
    {
        $consultation = UploadMedicalHistoryConsultation::findOrFail($id);
        $consultation->reject_reason = $request->reject_reason;
        $consultation->status = 2;
        $consultation->update();
        return redirect()->back()->with('success', 'Consultation rejected successfully');
    }
    
    public function reject_reason_doctor(Request $request, $id)
    {
        $consultation = UploadMedicalHistoryConsultation::findOrFail($id);
        $consultation->doctor_reject_reason = $request->doctor_reject_reason;
        $consultation->update();
        return redirect()->back()->with('success', 'Consultation rejected successfully');
    }

    public function assign_doctor(Request $request, $id)
    {
        $consultation = UploadMedicalHistoryConsultation::findOrFail($id);
        if ($consultation->doctor_reject_reason != NULL) {
            $consultation->doctor_id = $request->doctor_id;
            $consultation->reject_reason = NULL;
            $consultation->doctor_reject_reason = NULL;
            $consultation->status = 0;
        } else {
            $consultation->doctor_id = $request->doctor_id;
        }
        $consultation->update();
        return redirect()->back()->with('success', 'Doctor Assigned successfully');
    }
}
