<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use App\Models\VacancyVisit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VacancyApiController extends Controller
{
    public function index(Request $request){
        if($request->slug){
            $vacancy = Vacancy::where('slug',$request->slug)->with('vacancyskill.skill')->first();
            // $visit = VacancyVisit::where('vacancy_id',$vacancy->id)->whereDate('created_at',Carbon::today()->format('Y-m-d'))->first();
            // if($visit != null){
            //     $visit->count++;
            //     $visit->update();
            // }else{
            //     $vacancyvisit = new VacancyVisit();
            //     $vacancyvisit->vacancy_id = $vacancy->id;
            //     $vacancyvisit->count = 1;
            //     $vacancyvisit->save();
            // }
            $ip = $request->ip();
            if($ip != null){
                $existingVisitor = VacancyVisit::where('vacancy_id',$vacancy->id)->where('ip_address', $ip)->first();
                if($existingVisitor != null){
                    $vacancyvisit = new VacancyVisit();
                    $vacancyvisit->vacancy_id = $vacancy->id;
                    $vacancyvisit->ip_address = $ip;
                    $vacancyvisit->visit_status = 1;
                    $vacancyvisit->save();
                }else{
                    $vacancyvisit = new VacancyVisit();
                    $vacancyvisit->vacancy_id = $vacancy->id;
                    $vacancyvisit->ip_address = $ip;
                    $vacancyvisit->visit_status = 0;
                    $vacancyvisit->save();
                }
            }
        }else{
            $vacancy = Vacancy::where('status',1)->where('job_deadline','>=',Carbon::now()->format('Y-m-d'))->with('vacancyskill.skill')->orderBy('order','ASC')->get();
        }
        return response()->json($vacancy);
    }
}
