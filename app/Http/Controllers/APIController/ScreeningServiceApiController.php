<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\PackageScreening;
use App\Models\ScreeningService;
use App\Models\Service;
use Illuminate\Http\Request;

class ScreeningServiceApiController extends Controller
{
    // public function index(){
    //     $raw_services = ScreeningService::all();
    //     $services = [];
    //     $count = 0;
        
    //     foreach($raw_services as $serv){
    //         $services[$count]['id'] = $serv->id;
    //         $services[$count]['screening_id'] = $serv->screening_id;
    //         $services[$count]['screening'] = $serv->screening->screening;
    //         $services[$count]['category'] = $serv->category;
    //         $serv_count = 0;
    //         foreach(json_decode($serv->service_id) as $s){
    //             $service = Service::find($s);
    //             $services[$count]['service_id'][$serv_count] = $service->service_name;
    //             $serv_count++;
    //         }           
    //         $count++;
    //     }
    //     return response()->json($services);
    // }

    // public function index($id){
    //     $screening = PackageScreening::where('package_id',$id)->where('screening_id',1)->first();
    //     $detail = ScreeningService::where('package_screening_id',$screening->id)->with(['package_screening.screening','test.service'])->get()->groupBy('service.service_name');
    //     $screenings = PackageScreening::where('package_id',$id)->where('screening_id','!=',1)->get();
    //     $followup_count = $screenings->count();
    //     foreach($screenings as $screening){
    //         $regular = ScreeningService::where('package_screening_id',$screening->id)->with(['package_screening.screening','test.service'])->get()->groupBy('service.service_name');
    //     }
    //     return response()->json(['detail' => $detail, 'followup' => $regular, 'followup_count' => $followup_count]);
    // }

    public function index($id){
        $detail = PackageScreening::where('package_id',$id)->where('screening_id',1)->with(['services.service','services.tests.test'])->first();
        $regular = PackageScreening::where('package_id',$id)->where('screening_id',2)->with(['services.service','services.tests.test'])->first();
        $screenings = PackageScreening::where('package_id',$id)->where('screening_id','!=',1)->get();
        $followup_count = $screenings->count();
        return response()->json(['detail' => $detail, 'followup' => $regular, 'followup_count' => $followup_count]);
    }
}
