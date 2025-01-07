<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\MedicalReport;
use App\Models\Member;
use App\Models\PackageScreening;
use App\Models\Screening;
use App\Models\ScreeningService;
use App\Models\Service;
use App\Models\Test;
use App\Models\UserPackage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserMedicalReportController extends Controller
{
    // public function index(){
    //     if (Gate::allows('User')) {
    //         $user = Member::where('member_id',Auth::user()->id)->first();
    //         $userpackage = UserPackage::where('member_id',$user->id)->with('package.screening')->latest()->first();
    //         //return $userpackage;
    //         if($userpackage != null){
    //             foreach($userpackage->package->screening->take(1) as $screening){
    //                 $screeningServices = ScreeningService::where('screening_id',$screening->id)->first();
    //                 $services = [];
    //                 $count = 0;
    //                 $test = [];
    //                 if($screeningServices != null){
    //                     foreach (json_decode($screeningServices->service_id) as $item){
    //                         $service = Service::find($item);
    //                         $services[$count++] = $service;
    //                     }
    //                     $test = MedicalReport::where('member_id',$user->id)->where('userpackage_id',$userpackage->id)->where('screening_id',$screening->id)->where('service_id',$services[0]->id)->with('test')->get();
    //                 }
    //                 return view('admin.usermedicalreport.index',compact('services','userpackage','test'));
    //             }
    //         }else{
    //             return view('admin.usermedicalreport.index',compact('userpackage'));
    //         }
    //     }
    //     else {
    //         return view('viewnotfound');
    //     }  
    // }

    // public function getCheckupList($screening){
    //     if (Gate::allows('User')) {
    //         $checkup = ScreeningService::where('screening_id',$screening)->first();
    //         $services = [];
    //         $count = 0;
    //         foreach (json_decode($checkup->service_id) as $item){
    //             $service = Service::find($item);
    //             $services[$count++] = $service;
    //         }
    //     return response()->json($services);
    //     }
    //     else {
    //         return view('viewnotfound');
    //     }  
    // }

    // public function getResult($screening, $service){
    //     if (Gate::allows('User')) {
    //         $user = Member::where('member_id',Auth::user()->id)->first();
    //         $userpackage = UserPackage::where('member_id',$user->id)->latest()->first();
    //         $test = MedicalReport::where('member_id',$user->id)->where('userpackage_id',$userpackage->id)->where('screening_id',$screening)->where('service_id',$service)->with('test')->get();
    //         return response()->json($test);
    //     }
    //     else {
    //         return view('viewnotfound');
    //     }  
    // }

    // public function getChart($test){
    //     if (Gate::allows('User')) {
    //         $test_name = Test::where('id',$test)->first();
    //         $user = Member::where('member_id',Auth::user()->id)->first();
    //         $userpackage = UserPackage::where('member_id',$user->id)->latest()->first();
    //         $chart = MedicalReport::where('member_id',$user->id)->where('userpackage_id',$userpackage->id)->where('test_id',$test)->with('test')->get();
    //         $chart_data = [];
    //         foreach($chart as $val){
    //             array_push($chart_data ,[$val->created_at->format('M'),$val->min_range,$val->max_range,$val->value]);
    //             // $chart_data .= "['" .$val->created_at->format('M'). "'," .$val->test->min_range. "," .$val->test->max_range. "," .$val->value. "],";
    //         }
    //         return response()->json(['chart_data'=>$chart_data,'name' => $test_name]);
    //     }
    //     else {
    //         return view('viewnotfound');
    //     }  
    // }

    public function index(){
        if (Gate::allows('User')) {
            $user = Member::where('member_id',Auth::user()->id)->first();
            $userpackage = '';
            if($user->member_type == 'Primary Member'){
                $userpackage = UserPackage::where('member_id', $user->id)->with('package.screening')->latest()->first();  
            } else if($user->member_type == 'Dependent Member'){
                $primaryId = Family::where('family_id',$user->id)->where('rejected',1)->first();
                $userpackage = UserPackage::where('member_id', $primaryId->user_id)->with('package.screening')->latest()->first();
            }    
            $services =  '';
            if($userpackage != null){
                $services = MedicalReport::where('member_id',$user->id)->where('userpackage_id',$userpackage->id)->with(['service','userpackage'])->get()->groupBy('service_id');
            }
            //return $services;
            return view('admin.usermedicalreport.service',compact('services','userpackage'));
        }
        else {
            return view('viewnotfound');
        }  
    }

    public function report($id){
        if (Gate::allows('User')) {
            $service = Service::find($id);
            $user = Member::where('member_id',Auth::user()->id)->first();
            if($user->member_type == 'Primary Member'){
                $userpackage = UserPackage::where('member_id', $user->id)->with('package.screening')->latest()->first();  
            } else if($user->member_type == 'Dependent Member'){
                $primaryId = Family::where('family_id',$user->id)->where('rejected',1)->first();
                $userpackage = UserPackage::where('member_id', $primaryId->user_id)->with('package.screening')->latest()->first();
            }   
            //return $userpackage;
            $tests = MedicalReport::where('member_id',$user->id)->where('userpackage_id',$userpackage->id)->where('screening_id',1)->where('service_id',$id)->with('test')->get();
            //return $tests;
            return view('admin.usermedicalreport.report',compact('userpackage','tests','service'));
        }
        else {
            return view('viewnotfound');
        }  
    }

    public function getResult($service, $screening){
        if (Gate::allows('User')) {
            $user = Member::where('member_id',Auth::user()->id)->first();
            if($user->member_type == 'Primary Member'){
                $userpackage = UserPackage::where('member_id', $user->id)->with('package.screening')->latest()->first();  
            } else if($user->member_type == 'Dependent Member'){
                $primaryId = Family::where('family_id',$user->id)->where('rejected',1)->first();
                $userpackage = UserPackage::where('member_id', $primaryId->user_id)->with('package.screening')->latest()->first();
            } 
            $test = MedicalReport::where('member_id',$user->id)->where('userpackage_id',$userpackage->id)->where('screening_id',$screening)->where('service_id',$service)->with('test')->get();
            return response()->json($test);
        }
        else {
            return view('viewnotfound');
        }  
    }

    public function getChart($test){
        if (Gate::allows('User')) {
            $test_name = Test::where('id',$test)->first();
            $user = Member::where('member_id',Auth::user()->id)->first();
            if($user->member_type == 'Primary Member'){
                $userpackage = UserPackage::where('member_id', $user->id)->with('package.screening')->latest()->first();  
            } else if($user->member_type == 'Dependent Member'){
                $primaryId = Family::where('family_id',$user->id)->where('rejected',1)->first();
                $userpackage = UserPackage::where('member_id', $primaryId->user_id)->with('package.screening')->latest()->first();
            } 
            $chart = MedicalReport::where('member_id',$user->id)->where('userpackage_id',$userpackage->id)->where('test_id',$test)->with('test')->get();
            $chart_data = [];
            foreach($chart as $val){
                array_push($chart_data ,[$val->created_at->format('M'),$val->min_range,$val->max_range,$val->value]);
                // $chart_data .= "['" .$val->created_at->format('M'). "'," .$val->test->min_range. "," .$val->test->max_range. "," .$val->value. "],";
            }
            return response()->json(['chart_data'=>$chart_data,'name' => $test_name]);
        }
        else {
            return view('viewnotfound');
        }  
    }
}
