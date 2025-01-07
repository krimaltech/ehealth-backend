<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WebAnalyticsController extends Controller
{
    public function index(){
        if (Gate::any(['Superadmin','Admin'])) {
            $all = Visitor::count();
            $new = Visitor::where('visit_status',0)->count();
            $return = Visitor::where('visit_status',1)->count();
            $allvisitors = Visitor::selectRaw('DATE(created_at) as date, COUNT(*) as total, COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();        
            $dailyvisitors = Visitor::whereDate('created_at',Carbon::now()->format('Y-m-d'))->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
            //week from monday to sunday
            $startDate = Carbon::now()->startOfWeek()->format('Y-m-d');  
            $endDate = Carbon::now()->endOfWeek()->format('Y-m-d');  
            $weeklyvisitors = Visitor::whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate)->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
            
            $monthstartDate = Carbon::now()->startOfMonth()->format('Y-m-d');  
            $monthendDate = Carbon::now()->endOfMonth()->format('Y-m-d');
            $monthlyvisitors = Visitor::whereDate('created_at', '>=', $monthstartDate)->whereDate('created_at', '<=', $monthendDate)->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
            
            $yearstartDate = Carbon::now()->startOfYear()->format('Y-m-d');  
            $yearendDate = Carbon::now()->endOfYear()->format('Y-m-d');
            $yearlyvisitors = Visitor::whereDate('created_at', '>=', $yearstartDate)->whereDate('created_at', '<=', $yearendDate)->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();

            $vacancies = Vacancy::with('visits')->get();
            foreach ($vacancies as $vacancy) {
                $views = $vacancy->visits->sum('count');
                $vacancy['views'] = $views;
                $dailyvisits = $vacancy->visits()->whereDate('created_at', Carbon::now()->format('Y-m-d'))->get();
                $weeklyvisits = $vacancy->visits()->whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate)->get();
                $monthlyvisits = $vacancy->visits()->whereDate('created_at', '>=', $monthstartDate)->whereDate('created_at', '<=', $monthendDate)->get();
                $vacancy['daily_visits'] = $dailyvisits;
                $vacancy['weekly_visits'] = $weeklyvisits;
                $vacancy['monthly_visits'] = $monthlyvisits;
            }
            return view('admin.analytics.web.index',compact('all','new','return','allvisitors','dailyvisitors','weeklyvisitors','monthlyvisitors','yearlyvisitors','vacancies'));
        }
        else {
            return view('viewnotfound');
        }   
    }
}
