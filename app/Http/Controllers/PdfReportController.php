<?php

namespace App\Http\Controllers;

use App\Models\MedicalReport;
use App\Models\Member;
use App\Models\ReportHistory;
use App\Models\Screening;
use App\Models\UserPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Pdf;

class PdfReportController extends Controller
{
    public function index(){
        $userpackages = UserPackage::with(['familyname.primary.user','familyname.family.member.user'])->where('package_status','Activated')->get();
        $reports = [];
        foreach($userpackages as $userpackage){
            $reports[$userpackage->id] = MedicalReport::where('userpackage_id',$userpackage->id)->get()->groupBy('member_id');
        }
        $members = [];  
        foreach($reports as $key=>$value){
            foreach($value as $memberid=>$report){
                $members[] = Member::find($memberid);
            }
        }   
        $pdf =  ReportHistory::all();
        return view('admin.medicalreport.pdf.index',compact('reports','members','pdf'));
    }

    public function fetchScreening($id){
        $userpackage = MedicalReport::where('member_id',$id)->first();
        $report = MedicalReport::where('userpackage_id',$userpackage->userpackage_id)->where('member_id',$id)->get()->groupBy('screening_id');
        $screenings = Screening::all();
        $allscreenings = [];
        foreach($report as $key=>$value){
            foreach($screenings as $screening){
                if($screening->id == $key){
                    $allscreenings[$key] = $screening->screening;
                }
            }
        }
        return response()->json($allscreenings);
    }

    public function generatePdf(Request $request){
        $member = Member::with('user')->find($request->member_id);
        $name = str_replace(' ','_',$member->user->name);
        $screenings = Screening::find($request->screening_id);
        $screening = str_replace(' ','_',$screenings->screening);
        $userpackage = MedicalReport::where('member_id',$request->member_id)->first();
        $report = MedicalReport::where('userpackage_id',$userpackage->userpackage_id)->where('member_id',$request->member_id)->where('screening_id',$request->screening_id)->with(['service','labreports.test'])->get();
        // $report = MedicalReport::where('userpackage_id',$userpackage->userpackage_id)->where('member_id',$request->member_id)->where('screening_id',$request->screening_id)->with('test')->get()->groupBy(['service.test_result_type','service.service_name',function($date){ return $date->created_at->format('Y-m-d');}]);
        //return $report;
        //return view('admin.medicalreport.pdf.pdfView', compact('report','member','screenings'));

        $reportpdf = new ReportHistory();
        $reportpdf->member_id = $request->member_id;      
        $pdf = Pdf::loadView('admin.medicalreport.pdf.pdfView', compact('report','member','screenings'));
        Storage::put('public/pdf/Pathology_Report_'.$name.'_'.$screening.'_'.$userpackage->userpackage_id.'.pdf', $pdf->output());
        $reportpdf->report = 'Pathology_Report_'.$name.'_'.$screening.'_'.$userpackage->userpackage_id.'.pdf'; 
        $reportpdf->report_path = asset('storage/pdf/Pathology_Report_'.$name.'_'.$screening.'_'.$userpackage->userpackage_id.'.pdf'); 
        $saved = $reportpdf->save();
        if($saved){
            return redirect()->back()->with('success','Report Pdf generated successfully');
        }
    }
}
