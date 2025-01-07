<?php

namespace App\Http\Controllers;

use App\Models\AppOpenCount;
use App\Models\AuthenticationLog;
use App\Models\BookingReview;
use App\Models\Campaign;
use App\Models\Doctor;
use App\Models\DoctorScreeningForm;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\Member;
use App\Models\Nurse;
use App\Models\NurseScreeningForm;
use App\Models\NurseBooking;
use App\Models\NurseShift;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\RelationManager;
use App\Models\Tags;
use App\Models\Team;
use App\Models\Trip;
use App\Models\UserPackage;
use App\Models\UserUserPackage;
use App\Models\Vacancy;
use App\Models\Vendor;
use App\Models\VendorSlider;
use App\Models\Visitor;
use App\Traits\engnep;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Nilambar\NepaliDate\NepaliDate;

class HomeController extends Controller
{
    use engnep;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function log()
    {
        return DB::table('activity_log')->get();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        //    return $request->user();
        //    return auth()->user();
        $user = $request->user();
        foreach ($user->roles as $key) {
            if ($key->id == '4') {
                return $this->doctor_dashboard();
            }
            if ($key->id == '5') {
                return $this->vendor_dashboard();
            }
            if ($key->id == '9') {
                return $this->driver_dashboard();
            }
            if ($key->id == '7') {
                return $this->nurse_dashboard();
            }
            if ($key->id == '8') {
                return $this->ro_dashboard();
            }

            $users = Member::count();
            $doctors = Doctor::count();
            $driver = Driver::count();
            $teams = Team::count();
            $employee = Employee::count();
            $vendor = Vendor::count();
            $products = Product::where('user_id', auth()->user()->id)->count();

            $id = auth()->user()->id;
            // $user_id = Vendor::where('vendor_id', $id)->first()->id;
            // $orders = OrderProduct::groupBy('vendor_id')->where('vendor_id',$user_id)->count();
            // $bargraph = User::select('role', DB::raw('count(*) as total'))->groupBy('role')->with('roles')->get();
            $package_brought = UserPackage::select('package_status', DB::raw('count(*) as total'))->groupBy('package_status')->get();
            if ($request->role_type != NULL) {
                $gender = Member::select('gender', DB::raw('count(*) as total'))->groupBy('gender')->whereNotNull('gender')->with('user.roles')->whereHas('user.roles', function ($query) use ($request) {
                    $query->where('roles.role_type', $request->role_type);
                })->get();
            } else {
                $gender = Member::select('gender', DB::raw('count(*) as total'))->groupBy('gender')->whereNotNull('gender')->get();
            }

            $birthDates = Member::select('dob')->whereNotNull('dob')->pluck('dob')->toArray();
            $averageAge = 0;
            if (!empty($birthDates)) {
                // Convert birth dates to Carbon instances
                $carbonBirthDates = collect($birthDates)->map(function ($birthDate) {
                    return Carbon::parse($birthDate);
                });

                // Calculate the total number of years
                $totalYears = $carbonBirthDates->map(function ($carbonBirthDate) {
                    return $carbonBirthDate->diffInYears(Carbon::now());
                })->sum();

                // Calculate the average age
                $averageAge = floor($totalYears / count($birthDates));
            }

            $ranges = [ // the start of each age-range.
                '0-20' => 18,
                '20-40' => 25,
                '40-60' => 36,
                '60+' => 46
            ];
            if ($request->role_type != NULL) {
                $age_gap = Member::with('user.roles')->whereHas('user.roles', function ($query) use ($request) {
                    $query->where('roles.role_type', $request->role_type);
                })->get()->map(function ($user) use ($ranges) {
                    $age = Carbon::parse($user->dob)->age;
                    foreach ($ranges as $key => $breakpoint) {
                        if ($breakpoint >= $age) {
                            $user->range = $key;
                            break;
                        }
                    }

                    return $user;
                })
                    ->mapToGroups(function ($user, $key) {
                        return [$user->range => $user];
                    })
                    ->map(function ($group) {
                        return count($group);
                    })
                    ->sortKeys();
                $age_array = [];
                $age_key = $age_gap->keys();
                $count = 0;
                foreach ($age_key as $key) {
                    $age_array[$count]['key'] = $key;
                    $age_array[$count]['value'] = $age_gap[$key];
                    $count++;
                }
            } else {
                $age_gap = Member::get()->map(function ($user) use ($ranges) {
                    $age = Carbon::parse($user->dob)->age;
                    foreach ($ranges as $key => $breakpoint) {
                        if ($breakpoint >= $age) {
                            $user->range = $key;
                            break;
                        }
                    }

                    return $user;
                })
                    ->mapToGroups(function ($user, $key) {
                        return [$user->range => $user];
                    })
                    ->map(function ($group) {
                        return count($group);
                    })
                    ->sortKeys();
                $age_array = [];
                $age_key = $age_gap->keys();
                $count = 0;
                foreach ($age_key as $key) {
                    $age_array[$count]['key'] = $key;
                    $age_array[$count]['value'] = $age_gap[$key];
                    $count++;
                }
            }
            if ($request->date) {
                $date = $request->date;
                $packages = UserPackage::with(['familyname.primary.member', 'package', 'dates.screening'])->where('package_status', 'Activated')->whereHas('dates', function ($query) use ($date) {
                    $query->where('screening_date', $date)->where('status', 'Lab Visit Pending');
                })->get();
            } else {
                $packages = UserPackage::with(['familyname.primary.member', 'package', 'dates.screening'])->where('package_status', 'Activated')->whereHas('dates', function ($query) {
                    $query->where('screening_date', Carbon::now()->format('Y-m-d'))->where('status', 'Lab Visit Pending');
                })->get();
            }

            //web visitor analytics
            $allvisitors = Visitor::selectRaw('DATE(created_at) as date, COUNT(*) as total, COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
            $allLocation = Visitor::select('location', DB::raw('count(*) as total'))->groupBy('location')->whereNotNull('location')->get();

            $dailyvisitors = Visitor::whereDate('created_at', Carbon::now()->format('Y-m-d'))->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
            $dailyLocation = Visitor::whereDate('created_at', Carbon::now()->format('Y-m-d'))->select('location', DB::raw('count(*) as total'))->groupBy('location')->whereNotNull('location')->get();

            //week from monday to sunday
            $startDate = Carbon::now()->startOfWeek()->format('Y-m-d');
            $endDate = Carbon::now()->endOfWeek()->format('Y-m-d');
            $weeklyvisitors = Visitor::whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate)->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
            $weeklyLocation = Visitor::whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate)->select('location', DB::raw('count(*) as total'))->groupBy('location')->whereNotNull('location')->get();

            $monthstartDate = Carbon::now()->startOfMonth()->format('Y-m-d');
            $monthendDate = Carbon::now()->endOfMonth()->format('Y-m-d');
            $monthlyvisitors = Visitor::whereDate('created_at', '>=', $monthstartDate)->whereDate('created_at', '<=', $monthendDate)->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
            $monthlyLocation = Visitor::whereDate('created_at', '>=', $monthstartDate)->whereDate('created_at', '<=', $monthendDate)->select('location', DB::raw('count(*) as total'))->groupBy('location')->whereNotNull('location')->get();

            $yearstartDate = Carbon::now()->startOfYear()->format('Y-m-d');
            $yearendDate = Carbon::now()->endOfYear()->format('Y-m-d');
            $yearlyvisitors = Visitor::whereDate('created_at', '>=', $yearstartDate)->whereDate('created_at', '<=', $yearendDate)->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
            $yearlyLocation = Visitor::whereDate('created_at', '>=', $yearstartDate)->whereDate('created_at', '<=', $yearendDate)->select('location', DB::raw('count(*) as total'))->groupBy('location')->whereNotNull('location')->get();

            $webPercent = [];
            //to get gain or loss percentage (daily stats)
            $previousDailyVisitors =  Visitor::whereDate('created_at', Carbon::now()->subDay()->format('Y-m-d'))->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
            //daily total visitors
            $dailyTotal = $dailyvisitors->sum('total');
            $previousDailyTotal = $previousDailyVisitors->sum('total');
            if ($previousDailyTotal == 0) {
                $dailyTotalPercent = 0;
            } else {
                $dailyTotalPercent = round((($dailyTotal - $previousDailyTotal) / $previousDailyTotal) * 100, 2);
            }
            //daily new visitors
            $dailyNew = $dailyvisitors->sum('new');
            $previousDailyNew = $previousDailyVisitors->sum('new');
            if ($previousDailyNew == 0) {
                $dailyNewPercent = 0;
            } else {
                $dailyNewPercent = round((($dailyNew - $previousDailyNew) / $previousDailyNew) * 100, 2);
            }
            //daily returning visitors
            $dailyReturn = $dailyvisitors->sum('return');
            $previousDailyReturn = $previousDailyVisitors->sum('return');
            if ($previousDailyReturn == 0) {
                $dailyReturnPercent = 0;
            } else {
                $dailyReturnPercent = round((($dailyReturn - $previousDailyReturn) / $previousDailyReturn) * 100, 2);
            }

            //to get gain or loss percentage (weekly stats)
            $previousWeek = Carbon::now()->subWeek();
            $previousWeekStartDate = $previousWeek->startOfWeek()->format('Y-m-d');
            $previousWeekEndDate = $previousWeek->endOfWeek()->format('Y-m-d');

            $previousWeeklyVisitors =  Visitor::whereDate('created_at', '>=', $previousWeekStartDate)->whereDate('created_at', '<=', $previousWeekEndDate)->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
            //weekly total visitors
            $weeklyTotal = $weeklyvisitors->sum('total');
            $previousWeeklyTotal = $previousWeeklyVisitors->sum('total');
            if ($previousWeeklyTotal == 0) {
                $weeklyTotalPercent = 0;
            } else {
                $weeklyTotalPercent = round((($weeklyTotal - $previousWeeklyTotal) / $previousWeeklyTotal) * 100, 2);
            }
            //weekly new visitors
            $weeklyNew = $weeklyvisitors->sum('new');
            $previousWeeklyNew = $previousWeeklyVisitors->sum('new');
            if ($previousWeeklyNew == 0) {
                $weeklyNewPercent = 0;
            } else {
                $weeklyNewPercent = round((($weeklyNew - $previousWeeklyNew) / $previousWeeklyNew) * 100, 2);
            }
            //weekly returning visitors
            $weeklyReturn = $weeklyvisitors->sum('return');
            $previousWeeklyReturn = $previousWeeklyVisitors->sum('return');
            if ($previousWeeklyReturn == 0) {
                $weeklyReturnPercent = 0;
            } else {
                $weeklyReturnPercent = round((($weeklyReturn - $previousWeeklyReturn) / $previousWeeklyReturn) * 100, 2);
            }
            //to get gain or loss percentage (monthly stats)
            $previousMonth = Carbon::now()->subMonth();
            $previousMonthStartDate = $previousMonth->startOfMonth()->format('Y-m-d');
            $previousMonthEndDate = $previousMonth->endOfMonth()->format('Y-m-d');

            $previousMonthlyVisitors =  Visitor::whereDate('created_at', '>=', $previousMonthStartDate)->whereDate('created_at', '<=', $previousMonthEndDate)->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
            //monthly total visitors
            $monthlyTotal = $monthlyvisitors->sum('total');
            $previousMonthlyTotal = $previousMonthlyVisitors->sum('total');
            if ($previousMonthlyTotal == 0) {
                $monthlyTotalPercent = 0;
            } else {
                $monthlyTotalPercent = round((($monthlyTotal - $previousMonthlyTotal) / $previousMonthlyTotal) * 100, 2);
            }
            //monthly new visitors
            $monthlyNew = $monthlyvisitors->sum('new');
            $previousMonthlyNew = $previousMonthlyVisitors->sum('new');
            if ($previousMonthlyNew == 0) {
                $monthlyNewPercent = 0;
            } else {
                $monthlyNewPercent = round((($monthlyNew - $previousMonthlyNew) / $previousMonthlyNew) * 100, 2);
            }
            //monthly returning visitors
            $monthlyReturn = $monthlyvisitors->sum('return');
            $previousMonthlyReturn = $previousMonthlyVisitors->sum('return');
            if ($previousMonthlyReturn == 0) {
                $monthlyReturnPercent = 0;
            } else {
                $monthlyReturnPercent = round((($monthlyReturn - $previousMonthlyReturn) / $previousMonthlyReturn) * 100, 2);
            }
            //to get gain or loss percentage (yearly stats)
            $previousYear = Carbon::now()->subYear();
            $previousYearStartDate = $previousYear->startOfYear()->format('Y-m-d');
            $previousYearEndDate = $previousYear->endOfYear()->format('Y-m-d');

            $previousYearlyVisitors =  Visitor::whereDate('created_at', '>=', $previousYearStartDate)->whereDate('created_at', '<=', $previousYearEndDate)->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
            //yearly total visitors
            $yearlyTotal = $yearlyvisitors->sum('total');
            $previousYearlyTotal = $previousYearlyVisitors->sum('total');
            if ($previousYearlyTotal == 0) {
                $yearlyTotalPercent = 0;
            } else {
                $yearlyTotalPercent = round((($yearlyTotal - $previousYearlyTotal) / $previousYearlyTotal) * 100, 2);
            }
            //yearly new visitors
            $yearlyNew = $yearlyvisitors->sum('new');
            $previousYearlyNew = $previousYearlyVisitors->sum('new');
            if ($previousYearlyNew == 0) {
                $yearlyNewPercent = 0;
            } else {
                $yearlyNewPercent = round((($yearlyNew - $previousYearlyNew) / $previousYearlyNew) * 100, 2);
            }
            //yearly returning visitors
            $yearlyReturn = $yearlyvisitors->sum('return');
            $previousYearlyReturn = $previousYearlyVisitors->sum('return');
            if ($previousYearlyReturn == 0) {
                $yearlyReturnPercent = 0;
            } else {
                $yearlyReturnPercent = round((($yearlyReturn - $previousYearlyReturn) / $previousYearlyReturn) * 100, 2);
            }
            $webPercent['dailyTotalPercent'] = $dailyTotalPercent;
            $webPercent['dailyNewPercent'] = $dailyNewPercent;
            $webPercent['dailyReturnPercent'] = $dailyReturnPercent;
            $webPercent['weeklyTotalPercent'] = $weeklyTotalPercent;
            $webPercent['weeklyNewPercent'] = $weeklyNewPercent;
            $webPercent['weeklyReturnPercent'] = $weeklyReturnPercent;
            $webPercent['monthlyTotalPercent'] = $monthlyTotalPercent;
            $webPercent['monthlyNewPercent'] = $monthlyNewPercent;
            $webPercent['monthlyReturnPercent'] = $monthlyReturnPercent;
            $webPercent['yearlyTotalPercent'] = $yearlyTotalPercent;
            $webPercent['yearlyNewPercent'] = $yearlyNewPercent;
            $webPercent['yearlyReturnPercent'] = $yearlyReturnPercent;
            //android app analytics    
            $androidApps = AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'android');
            })->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            $dailyAndroidApps = AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'android');
            })->whereDate('created_at', Carbon::now()->format('Y-m-d'))->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            $weeklyAndroidApps = AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'android');
            })->whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate)->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            $monthlyAndroidApps = AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'android');
            })->whereDate('created_at', '>=', $monthstartDate)->whereDate('created_at', '<=', $monthendDate)->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            $yearlyAndroidApps = AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'android');
            })->whereDate('created_at', '>=', $yearstartDate)->whereDate('created_at', '<=', $yearendDate)->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            $androidPercent = [];
            //to get gain or loss percentage (daily stats)
            $previousDailyAndroid = AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'android');
            })->whereDate('created_at', Carbon::now()->subDay()->format('Y-m-d'))->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            //daily android app install
            $dailyAndroidInstall = $dailyAndroidApps->sum('install');
            $previousDailyAndroidInstall = $previousDailyAndroid->sum('install');
            if ($previousDailyAndroidInstall == 0) {
                $dailyAndroidInstallPercent = 0;
            } else {
                $dailyAndroidInstallPercent = round((($dailyAndroidInstall - $previousDailyAndroidInstall) / $previousDailyAndroidInstall) * 100, 2);
            }
            //daily android total visitors
            $dailyAndroidTotal = $dailyAndroidApps->sum('total');
            $previousDailyAndroidTotal = $previousDailyAndroid->sum('total');
            if ($previousDailyAndroidTotal == 0) {
                $dailyAndroidTotalPercent = 0;
            } else {
                $dailyAndroidTotalPercent = round((($dailyAndroidTotal - $previousDailyAndroidTotal) / $previousDailyAndroidTotal) * 100, 2);
            }
            //daily android new visitors
            $dailyAndroidNew = $dailyAndroidApps->sum('new');
            $previousDailyAndroidNew = $previousDailyAndroid->sum('new');
            if ($previousDailyAndroidNew == 0) {
                $dailyAndroidNewPercent = 0;
            } else {
                $dailyAndroidNewPercent = round((($dailyAndroidNew - $previousDailyAndroidNew) / $previousDailyAndroidNew) * 100, 2);
            }
            //daily android returning visitors
            $dailyAndroidReturn = $dailyAndroidApps->sum('return');
            $previousDailyAndroidReturn = $previousDailyAndroid->sum('return');
            if ($previousDailyAndroidReturn == 0) {
                $dailyAndroidReturnPercent = 0;
            } else {
                $dailyAndroidReturnPercent = round((($dailyAndroidReturn - $previousDailyAndroidReturn) / $previousDailyAndroidReturn) * 100, 2);
            }

            //to get gain or loss percentage (weekly stats)
            $previousWeeklyAndroid =  AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'android');
            })->whereDate('created_at', '>=', $previousWeekStartDate)->whereDate('created_at', '<=', $previousWeekEndDate)->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            //weekly android app install
            $weeklyAndroidInstall = $weeklyAndroidApps->sum('install');
            $previousWeeklyAndroidInstall = $previousWeeklyAndroid->sum('install');
            if ($previousWeeklyAndroidInstall == 0) {
                $weeklyAndroidInstallPercent = 0;
            } else {
                $weeklyAndroidInstallPercent = round((($weeklyAndroidInstall - $previousWeeklyAndroidInstall) / $previousWeeklyAndroidInstall) * 100, 2);
            }
            //weekly android total visitors
            $weeklyAndroidTotal = $weeklyAndroidApps->sum('total');
            $previousWeeklyAndroidTotal = $previousWeeklyAndroid->sum('total');
            if ($previousWeeklyAndroidTotal == 0) {
                $weeklyAndroidTotalPercent = 0;
            } else {
                $weeklyAndroidTotalPercent = round((($weeklyAndroidTotal - $previousWeeklyAndroidTotal) / $previousWeeklyAndroidTotal) * 100, 2);
            }
            //weekly android new visitors
            $weeklyAndroidNew = $weeklyAndroidApps->sum('new');
            $previousWeeklyAndroidNew = $previousWeeklyAndroid->sum('new');
            if ($previousWeeklyAndroidNew == 0) {
                $weeklyAndroidNewPercent = 0;
            } else {
                $weeklyAndroidNewPercent = round((($weeklyAndroidNew - $previousWeeklyAndroidNew) / $previousWeeklyAndroidNew) * 100, 2);
            }
            //weekly android returning visitors
            $weeklyAndroidReturn = $weeklyAndroidApps->sum('return');
            $previousWeeklyAndroidReturn = $previousWeeklyAndroid->sum('return');
            if ($previousWeeklyAndroidReturn == 0) {
                $weeklyAndroidReturnPercent = 0;
            } else {
                $weeklyAndroidReturnPercent = round((($weeklyAndroidReturn - $previousWeeklyAndroidReturn) / $previousWeeklyAndroidReturn) * 100, 2);
            }
            //to get gain or loss percentage (monthly stats)
            $previousMonthlyAndroid =  AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'android');
            })->whereDate('created_at', '>=', $previousMonthStartDate)->whereDate('created_at', '<=', $previousMonthEndDate)->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            //monthly android install visitors
            $monthlyAndroidInstall = $monthlyAndroidApps->sum('install');
            $previousMonthlyAndroidInstall = $previousMonthlyAndroid->sum('install');
            if ($previousMonthlyAndroidInstall == 0) {
                $monthlyAndroidInstallPercent = 0;
            } else {
                $monthlyAndroidInstallPercent = round((($monthlyAndroidInstall - $previousMonthlyAndroidInstall) / $previousMonthlyAndroidInstall) * 100, 2);
            }
            //monthly android total visitors
            $monthlyAndroidTotal = $monthlyAndroidApps->sum('total');
            $previousMonthlyAndroidTotal = $previousMonthlyAndroid->sum('total');
            if ($previousMonthlyAndroidTotal == 0) {
                $monthlyAndroidTotalPercent = 0;
            } else {
                $monthlyAndroidTotalPercent = round((($monthlyAndroidTotal - $previousMonthlyAndroidTotal) / $previousMonthlyAndroidTotal) * 100, 2);
            }
            //monthly android new visitors
            $monthlyAndroidNew = $monthlyAndroidApps->sum('new');
            $previousMonthlyAndroidNew = $previousMonthlyAndroid->sum('new');
            if ($previousMonthlyAndroidNew == 0) {
                $monthlyAndroidNewPercent = 0;
            } else {
                $monthlyAndroidNewPercent = round((($monthlyAndroidNew - $previousMonthlyAndroidNew) / $previousMonthlyAndroidNew) * 100, 2);
            }
            //monthly android returning visitors
            $monthlyAndroidReturn = $monthlyAndroidApps->sum('return');
            $previousMonthlyAndroidReturn = $previousMonthlyAndroid->sum('return');
            if ($previousMonthlyAndroidReturn == 0) {
                $monthlyAndroidReturnPercent = 0;
            } else {
                $monthlyAndroidReturnPercent = round((($monthlyAndroidReturn - $previousMonthlyAndroidReturn) / $previousMonthlyAndroidReturn) * 100, 2);
            }
            //to get gain or loss percentage (yearly stats)
            $previousYearlyAndroid = AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'android');
            })->whereDate('created_at', '>=', $previousYearStartDate)->whereDate('created_at', '<=', $previousYearEndDate)->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            //yearly android total visitors
            $yearlyAndroidInstall = $yearlyAndroidApps->sum('install');
            $previousYearlyAndroidInstall = $previousYearlyAndroid->sum('install');
            if ($previousYearlyAndroidInstall == 0) {
                $yearlyAndroidInstallPercent = 0;
            } else {
                $yearlyAndroidInstallPercent = round((($yearlyAndroidInstall - $previousYearlyAndroidInstall) / $previousYearlyAndroidInstall) * 100, 2);
            }
            //yearly android total visitors
            $yearlyAndroidTotal = $yearlyAndroidApps->sum('total');
            $previousYearlyAndroidTotal = $previousYearlyAndroid->sum('total');
            if ($previousYearlyAndroidTotal == 0) {
                $yearlyAndroidTotalPercent = 0;
            } else {
                $yearlyAndroidTotalPercent = round((($yearlyAndroidTotal - $previousYearlyAndroidTotal) / $previousYearlyAndroidTotal) * 100, 2);
            }
            //yearly android new visitors
            $yearlyAndroidNew = $yearlyAndroidApps->sum('new');
            $previousYearlyAndroidNew = $previousYearlyAndroid->sum('new');
            if ($previousYearlyAndroidNew == 0) {
                $yearlyAndroidNewPercent = 0;
            } else {
                $yearlyAndroidNewPercent = round((($yearlyAndroidNew - $previousYearlyAndroidNew) / $previousYearlyAndroidNew) * 100, 2);
            }
            //yearly android returning visitors
            $yearlyAndroidReturn = $yearlyAndroidApps->sum('return');
            $previousYearlyAndroidReturn = $previousYearlyAndroid->sum('return');
            if ($previousYearlyAndroidReturn == 0) {
                $yearlyAndroidReturnPercent = 0;
            } else {
                $yearlyAndroidReturnPercent = round((($yearlyAndroidReturn - $previousYearlyAndroidReturn) / $previousYearlyAndroidReturn) * 100, 2);
            }

            $androidPercent['dailyAndroidInstallPercent'] = $dailyAndroidInstallPercent;
            $androidPercent['dailyAndroidTotalPercent'] = $dailyAndroidTotalPercent;
            $androidPercent['dailyAndroidNewPercent'] = $dailyAndroidNewPercent;
            $androidPercent['dailyAndroidReturnPercent'] = $dailyAndroidReturnPercent;
            $androidPercent['weeklyAndroidInstallPercent'] = $weeklyAndroidInstallPercent;
            $androidPercent['weeklyAndroidTotalPercent'] = $weeklyAndroidTotalPercent;
            $androidPercent['weeklyAndroidNewPercent'] = $weeklyAndroidNewPercent;
            $androidPercent['weeklyAndroidReturnPercent'] = $weeklyAndroidReturnPercent;
            $androidPercent['monthlyAndroidInstallPercent'] = $monthlyAndroidInstallPercent;
            $androidPercent['monthlyAndroidTotalPercent'] = $monthlyAndroidTotalPercent;
            $androidPercent['monthlyAndroidNewPercent'] = $monthlyAndroidNewPercent;
            $androidPercent['monthlyAndroidReturnPercent'] = $monthlyAndroidReturnPercent;
            $androidPercent['yearlyAndroidInstallPercent'] = $yearlyAndroidInstallPercent;
            $androidPercent['yearlyAndroidTotalPercent'] = $yearlyAndroidTotalPercent;
            $androidPercent['yearlyAndroidNewPercent'] = $yearlyAndroidNewPercent;
            $androidPercent['yearlyAndroidReturnPercent'] = $yearlyAndroidReturnPercent;

            //ios app analytics    
            $iosApps = AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'ios');
            })->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            $dailyIosApps = AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'ios');
            })->whereDate('created_at', Carbon::now()->format('Y-m-d'))->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            $weeklyIosApps = AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'ios');
            })->whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate)->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            $monthlyIosApps = AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'ios');
            })->whereDate('created_at', '>=', $monthstartDate)->whereDate('created_at', '<=', $monthendDate)->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            $yearlyIosApps = AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'ios');
            })->whereDate('created_at', '>=', $yearstartDate)->whereDate('created_at', '<=', $yearendDate)->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            $iosPercent = [];
            //to get gain or loss percentage (daily stats)
            $previousDailyIos = AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'ios');
            })->whereDate('created_at', Carbon::now()->subDay()->format('Y-m-d'))->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            //daily ios app install
            $dailyIosInstall = $dailyIosApps->sum('install');
            $previousDailyIosInstall = $previousDailyIos->sum('install');
            if ($previousDailyIosInstall == 0) {
                $dailyIosInstallPercent = 0;
            } else {
                $dailyIosInstallPercent = round((($dailyIosInstall - $previousDailyIosInstall) / $previousDailyIosInstall) * 100, 2);
            }
            //daily ios total visitors
            $dailyIosTotal = $dailyIosApps->sum('total');
            $previousDailyIosTotal = $previousDailyIos->sum('total');
            if ($previousDailyIosTotal == 0) {
                $dailyIosTotalPercent = 0;
            } else {
                $dailyIosTotalPercent = round((($dailyIosTotal - $previousDailyIosTotal) / $previousDailyIosTotal) * 100, 2);
            }
            //daily ios new visitors
            $dailyIosNew = $dailyIosApps->sum('new');
            $previousDailyIosNew = $previousDailyIos->sum('new');
            if ($previousDailyIosNew == 0) {
                $dailyIosNewPercent = 0;
            } else {
                $dailyIosNewPercent = round((($dailyIosNew - $previousDailyIosNew) / $previousDailyIosNew) * 100, 2);
            }
            //daily ios returning visitors
            $dailyIosReturn = $dailyIosApps->sum('return');
            $previousDailyIosReturn = $previousDailyIos->sum('return');
            if ($previousDailyIosReturn == 0) {
                $dailyIosReturnPercent = 0;
            } else {
                $dailyIosReturnPercent = round((($dailyIosReturn - $previousDailyIosReturn) / $previousDailyIosReturn) * 100, 2);
            }

            //to get gain or loss percentage (weekly stats)
            $previousWeeklyIos =  AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'ios');
            })->whereDate('created_at', '>=', $previousWeekStartDate)->whereDate('created_at', '<=', $previousWeekEndDate)->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            //weekly ios app install
            $weeklyIosInstall = $weeklyIosApps->sum('install');
            $previousWeeklyIosInstall = $previousWeeklyIos->sum('install');
            if ($previousWeeklyIosInstall == 0) {
                $weeklyIosInstallPercent = 0;
            } else {
                $weeklyIosInstallPercent = round((($weeklyIosInstall - $previousWeeklyIosInstall) / $previousWeeklyIosInstall) * 100, 2);
            }
            //weekly ios total visitors
            $weeklyIosTotal = $weeklyIosApps->sum('total');
            $previousWeeklyIosTotal = $previousWeeklyIos->sum('total');
            if ($previousWeeklyIosTotal == 0) {
                $weeklyIosTotalPercent = 0;
            } else {
                $weeklyIosTotalPercent = round((($weeklyIosTotal - $previousWeeklyIosTotal) / $previousWeeklyIosTotal) * 100, 2);
            }
            //weekly ios new visitors
            $weeklyIosNew = $weeklyIosApps->sum('new');
            $previousWeeklyIosNew = $previousWeeklyIos->sum('new');
            if ($previousWeeklyIosNew == 0) {
                $weeklyIosNewPercent = 0;
            } else {
                $weeklyIosNewPercent = round((($weeklyIosNew - $previousWeeklyIosNew) / $previousWeeklyIosNew) * 100, 2);
            }
            //weekly ios returning visitors
            $weeklyIosReturn = $weeklyIosApps->sum('return');
            $previousWeeklyIosReturn = $previousWeeklyIos->sum('return');
            if ($previousWeeklyIosReturn == 0) {
                $weeklyIosReturnPercent = 0;
            } else {
                $weeklyIosReturnPercent = round((($weeklyIosReturn - $previousWeeklyIosReturn) / $previousWeeklyIosReturn) * 100, 2);
            }
            //to get gain or loss percentage (monthly stats)
            $previousMonthlyIos =  AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'ios');
            })->whereDate('created_at', '>=', $previousMonthStartDate)->whereDate('created_at', '<=', $previousMonthEndDate)->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            //monthly ios install visitors
            $monthlyIosInstall = $monthlyIosApps->sum('install');
            $previousMonthlyIosInstall = $previousMonthlyIos->sum('install');
            if ($previousMonthlyIosInstall == 0) {
                $monthlyIosInstallPercent = 0;
            } else {
                $monthlyIosInstallPercent = round((($monthlyIosInstall - $previousMonthlyIosInstall) / $previousMonthlyIosInstall) * 100, 2);
            }
            //monthly ios total visitors
            $monthlyIosTotal = $monthlyIosApps->sum('total');
            $previousMonthlyIosTotal = $previousMonthlyIos->sum('total');
            if ($previousMonthlyIosTotal == 0) {
                $monthlyIosTotalPercent = 0;
            } else {
                $monthlyIosTotalPercent = round((($monthlyIosTotal - $previousMonthlyIosTotal) / $previousMonthlyIosTotal) * 100, 2);
            }
            //monthly ios new visitors
            $monthlyIosNew = $monthlyIosApps->sum('new');
            $previousMonthlyIosNew = $previousMonthlyIos->sum('new');
            if ($previousMonthlyIosNew == 0) {
                $monthlyIosNewPercent = 0;
            } else {
                $monthlyIosNewPercent = round((($monthlyIosNew - $previousMonthlyIosNew) / $previousMonthlyIosNew) * 100, 2);
            }
            //monthly ios returning visitors
            $monthlyIosReturn = $monthlyIosApps->sum('return');
            $previousMonthlyIosReturn = $previousMonthlyIos->sum('return');
            if ($previousMonthlyIosReturn == 0) {
                $monthlyIosReturnPercent = 0;
            } else {
                $monthlyIosReturnPercent = round((($monthlyIosReturn - $previousMonthlyIosReturn) / $previousMonthlyIosReturn) * 100, 2);
            }
            //to get gain or loss percentage (yearly stats)
            $previousYearlyIos = AppOpenCount::whereHas('analytics', function ($query) {
                $query->where('platform', 'ios');
            })->whereDate('created_at', '>=', $previousYearStartDate)->whereDate('created_at', '<=', $previousYearEndDate)->selectRaw('DATE(created_at) as date, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `install`, SUM(count) as total, SUM(CASE WHEN status = 1 THEN count ELSE 0 END) as `new`, SUM(CASE WHEN status = 0 THEN count ELSE 0 END) as `return`')->groupBy('date')->get();
            //yearly ios total visitors
            $yearlyIosInstall = $yearlyIosApps->sum('install');
            $previousYearlyIosInstall = $previousYearlyIos->sum('install');
            if ($previousYearlyIosInstall == 0) {
                $yearlyIosInstallPercent = 0;
            } else {
                $yearlyIosInstallPercent = round((($yearlyIosInstall - $previousYearlyIosInstall) / $previousYearlyIosInstall) * 100, 2);
            }
            //yearly ios total visitors
            $yearlyIosTotal = $yearlyIosApps->sum('total');
            $previousYearlyIosTotal = $previousYearlyIos->sum('total');
            if ($previousYearlyIosTotal == 0) {
                $yearlyIosTotalPercent = 0;
            } else {
                $yearlyIosTotalPercent = round((($yearlyIosTotal - $previousYearlyIosTotal) / $previousYearlyIosTotal) * 100, 2);
            }
            //yearly ios new visitors
            $yearlyIosNew = $yearlyIosApps->sum('new');
            $previousYearlyIosNew = $previousYearlyIos->sum('new');
            if ($previousYearlyIosNew == 0) {
                $yearlyIosNewPercent = 0;
            } else {
                $yearlyIosNewPercent = round((($yearlyIosNew - $previousYearlyIosNew) / $previousYearlyIosNew) * 100, 2);
            }
            //yearly ios returning visitors
            $yearlyIosReturn = $yearlyIosApps->sum('return');
            $previousYearlyIosReturn = $previousYearlyIos->sum('return');
            if ($previousYearlyIosReturn == 0) {
                $yearlyIosReturnPercent = 0;
            } else {
                $yearlyIosReturnPercent = round((($yearlyIosReturn - $previousYearlyIosReturn) / $previousYearlyIosReturn) * 100, 2);
            }

            $iosPercent['dailyIosInstallPercent'] = $dailyIosInstallPercent;
            $iosPercent['dailyIosTotalPercent'] = $dailyIosTotalPercent;
            $iosPercent['dailyIosNewPercent'] = $dailyIosNewPercent;
            $iosPercent['dailyIosReturnPercent'] = $dailyIosReturnPercent;
            $iosPercent['weeklyIosInstallPercent'] = $weeklyIosInstallPercent;
            $iosPercent['weeklyIosTotalPercent'] = $weeklyIosTotalPercent;
            $iosPercent['weeklyIosNewPercent'] = $weeklyIosNewPercent;
            $iosPercent['weeklyIosReturnPercent'] = $weeklyIosReturnPercent;
            $iosPercent['monthlyIosInstallPercent'] = $monthlyIosInstallPercent;
            $iosPercent['monthlyIosTotalPercent'] = $monthlyIosTotalPercent;
            $iosPercent['monthlyIosNewPercent'] = $monthlyIosNewPercent;
            $iosPercent['monthlyIosReturnPercent'] = $monthlyIosReturnPercent;
            $iosPercent['yearlyIosInstallPercent'] = $yearlyIosInstallPercent;
            $iosPercent['yearlyIosTotalPercent'] = $yearlyIosTotalPercent;
            $iosPercent['yearlyIosNewPercent'] = $yearlyIosNewPercent;
            $iosPercent['yearlyIosReturnPercent'] = $yearlyIosReturnPercent;

            //vacancy analytics
            $vacancies = Vacancy::with('visits')->get();
            foreach ($vacancies as $vacancy) {
                $views = $vacancy->visits->count();
                $vacancy['views'] = $views;
                $allvisits = $vacancy->visits()->selectRaw('DATE(created_at) as date, COUNT(*) as total, COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
                $dailyvisits = $vacancy->visits()->whereDate('created_at', Carbon::now()->format('Y-m-d'))->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
                $weeklyvisits = $vacancy->visits()->whereDate('created_at', '>=', $startDate)->whereDate('created_at', '<=', $endDate)->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
                $monthlyvisits = $vacancy->visits()->whereDate('created_at', '>=', $monthstartDate)->whereDate('created_at', '<=', $monthendDate)->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
                $yearlyvisits = $vacancy->visits()->whereDate('created_at', '>=', $yearstartDate)->whereDate('created_at', '<=', $yearendDate)->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
                $vacancy['all_visits'] = $allvisits;
                $vacancy['daily_visits'] = $dailyvisits;
                $vacancy['weekly_visits'] = $weeklyvisits;
                $vacancy['monthly_visits'] = $monthlyvisits;
                $vacancy['yearly_visits'] = $yearlyvisits;

                $previousDailyVacancyVisitors = $vacancy->visits()->whereDate('created_at', Carbon::now()->subDay()->format('Y-m-d'))->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
                $previousWeeklyVacancyVisitors = $vacancy->visits()->whereDate('created_at', '>=', $previousWeekStartDate)->whereDate('created_at', '<=', $previousWeekEndDate)->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
                $previousMonthlyVacancyVisitors = $vacancy->visits()->whereDate('created_at', '>=', $previousMonthStartDate)->whereDate('created_at', '<=', $previousMonthEndDate)->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
                $previousYearlyVacancyVisitors = $vacancy->visits()->whereDate('created_at', '>=', $previousYearStartDate)->whereDate('created_at', '<=', $previousYearEndDate)->selectRaw('DATE(created_at) as date, COUNT(*) as total , COUNT(CASE WHEN visit_status = 0 THEN 1 ELSE NULL END) as `new`, COUNT(CASE WHEN visit_status = 1 THEN 1 ELSE NULL END) as `return`')->groupBy('date')->get();
                //daily total visitors
                $dailyVacancyTotal = $dailyvisits->sum('total');
                $previousDailyVacancyTotal = $previousDailyVacancyVisitors->sum('total');
                if ($previousDailyVacancyTotal == 0) {
                    $dailyVacancyTotalPercent = 0;
                } else {
                    $dailyVacancyTotalPercent = round((($dailyVacancyTotal - $previousDailyVacancyTotal) / $previousDailyVacancyTotal) * 100, 2);
                }
                //daily new visitors
                $dailyVacancyNew = $dailyvisits->sum('new');
                $previousDailyVacancyNew = $previousDailyVacancyVisitors->sum('new');
                if ($previousDailyVacancyNew == 0) {
                    $dailyVacancyNewPercent = 0;
                } else {
                    $dailyVacancyNewPercent = round((($dailyVacancyNew - $previousDailyVacancyNew) / $previousDailyVacancyNew) * 100, 2);
                }
                //daily returning visitors
                $dailyVacancyReturn = $dailyvisitors->sum('return');
                $previousDailyVacancyReturn = $previousDailyVacancyVisitors->sum('return');
                if ($previousDailyVacancyReturn == 0) {
                    $dailyVacancyReturnPercent = 0;
                } else {
                    $dailyVacancyReturnPercent = round((($dailyVacancyReturn - $previousDailyVacancyReturn) / $previousDailyVacancyReturn) * 100, 2);
                }
                //weekly total visitors
                $weeklyVacancyTotal = $weeklyvisits->sum('total');
                $previousWeeklyVacancyTotal = $previousWeeklyVacancyVisitors->sum('total');
                if ($previousWeeklyVacancyTotal == 0) {
                    $weeklyVacancyTotalPercent = 0;
                } else {
                    $weeklyVacancyTotalPercent = round((($weeklyVacancyTotal - $previousWeeklyVacancyTotal) / $previousWeeklyVacancyTotal) * 100, 2);
                }
                //weekly new visitors
                $weeklyVacancyNew = $weeklyvisits->sum('new');
                $previousWeeklyVacancyNew = $previousWeeklyVacancyVisitors->sum('new');
                if ($previousWeeklyVacancyNew == 0) {
                    $weeklyVacancyNewPercent = 0;
                } else {
                    $weeklyVacancyNewPercent = round((($weeklyVacancyNew - $previousWeeklyVacancyNew) / $previousWeeklyVacancyNew) * 100, 2);
                }
                //weekly returning visitors
                $weeklyVacancyReturn = $weeklyvisitors->sum('return');
                $previousWeeklyVacancyReturn = $previousWeeklyVacancyVisitors->sum('return');
                if ($previousWeeklyVacancyReturn == 0) {
                    $weeklyVacancyReturnPercent = 0;
                } else {
                    $weeklyVacancyReturnPercent = round((($weeklyVacancyReturn - $previousWeeklyVacancyReturn) / $previousWeeklyVacancyReturn) * 100, 2);
                }
                //monthly total visitors
                $monthlyVacancyTotal = $monthlyvisits->sum('total');
                $previousMonthlyVacancyTotal = $previousMonthlyVacancyVisitors->sum('total');
                if ($previousMonthlyVacancyTotal == 0) {
                    $monthlyVacancyTotalPercent = 0;
                } else {
                    $monthlyVacancyTotalPercent = round((($monthlyVacancyTotal - $previousMonthlyVacancyTotal) / $previousMonthlyVacancyTotal) * 100, 2);
                }
                //monthly new visitors
                $monthlyVacancyNew = $monthlyvisits->sum('new');
                $previousMonthlyVacancyNew = $previousMonthlyVacancyVisitors->sum('new');
                if ($previousMonthlyVacancyNew == 0) {
                    $monthlyVacancyNewPercent = 0;
                } else {
                    $monthlyVacancyNewPercent = round((($monthlyVacancyNew - $previousMonthlyVacancyNew) / $previousMonthlyVacancyNew) * 100, 2);
                }
                //monthly returning visitors
                $monthlyVacancyReturn = $monthlyvisitors->sum('return');
                $previousMonthlyVacancyReturn = $previousMonthlyVacancyVisitors->sum('return');
                if ($previousMonthlyVacancyReturn == 0) {
                    $monthlyVacancyReturnPercent = 0;
                } else {
                    $monthlyVacancyReturnPercent = round((($monthlyVacancyReturn - $previousMonthlyVacancyReturn) / $previousMonthlyVacancyReturn) * 100, 2);
                }
                //yearly total visitors
                $yearlyVacancyTotal = $yearlyvisits->sum('total');
                $previousYearlyVacancyTotal = $previousYearlyVacancyVisitors->sum('total');
                if ($previousYearlyVacancyTotal == 0) {
                    $yearlyVacancyTotalPercent = 0;
                } else {
                    $yearlyVacancyTotalPercent = round((($yearlyVacancyTotal - $previousYearlyVacancyTotal) / $previousYearlyVacancyTotal) * 100, 2);
                }
                //yearly new visitors
                $yearlyVacancyNew = $yearlyvisits->sum('new');
                $previousYearlyVacancyNew = $previousYearlyVacancyVisitors->sum('new');
                if ($previousYearlyVacancyNew == 0) {
                    $yearlyVacancyNewPercent = 0;
                } else {
                    $yearlyVacancyNewPercent = round((($yearlyVacancyNew - $previousYearlyVacancyNew) / $previousYearlyVacancyNew) * 100, 2);
                }
                //yearly returning visitors
                $yearlyVacancyReturn = $yearlyvisitors->sum('return');
                $previousYearlyVacancyReturn = $previousYearlyVacancyVisitors->sum('return');
                if ($previousYearlyVacancyReturn == 0) {
                    $yearlyVacancyReturnPercent = 0;
                } else {
                    $yearlyVacancyReturnPercent = round((($yearlyVacancyReturn - $previousYearlyVacancyReturn) / $previousYearlyVacancyReturn) * 100, 2);
                }
                $vacancy['dailyTotalPecent'] = $dailyVacancyTotalPercent;
                $vacancy['dailyNewPecent'] = $dailyVacancyNewPercent;
                $vacancy['dailyReturnPecent'] = $dailyVacancyReturnPercent;
                $vacancy['weeklyTotalPecent'] = $weeklyVacancyTotalPercent;
                $vacancy['weeklyNewPecent'] = $weeklyVacancyNewPercent;
                $vacancy['weeklyReturnPecent'] = $weeklyVacancyReturnPercent;
                $vacancy['monthlyTotalPecent'] = $monthlyVacancyTotalPercent;
                $vacancy['monthlyNewPecent'] = $monthlyVacancyNewPercent;
                $vacancy['monthlyReturnPecent'] = $monthlyVacancyReturnPercent;
                $vacancy['yearlyTotalPecent'] = $yearlyVacancyTotalPercent;
                $vacancy['yearlyNewPecent'] = $yearlyVacancyNewPercent;
                $vacancy['yearlyReturnPecent'] = $yearlyVacancyReturnPercent;
            }
            //Campaign Details
            // $campaign = Campaign::first();
            // $nurse_screening = NurseScreeningForm::where('campaign_user_id',$campaign->id)->count();
            // $doctor_screening = DoctorScreeningForm::where('campaign_user_id',$campaign->id)->count();

            return view('admin.index', compact(
                'users',
                'doctors',
                'driver',
                'teams',
                'packages',
                'allvisitors',
                'allLocation',
                'dailyvisitors',
                'dailyLocation',
                'weeklyvisitors',
                'weeklyLocation',
                'monthlyvisitors',
                'monthlyLocation',
                'yearlyvisitors',
                'yearlyLocation',
                'vacancies',
                'webPercent',
                'androidApps',
                'dailyAndroidApps',
                'weeklyAndroidApps',
                'monthlyAndroidApps',
                'yearlyAndroidApps',
                'androidPercent',
                'iosApps',
                'dailyIosApps',
                'weeklyIosApps',
                'monthlyIosApps',
                'yearlyIosApps',
                'iosPercent',
                'gender',
                'age_array',
                'package_brought',
                'vendor',
                'employee',
                'averageAge'
            ));
        }
    }

    public function doctor_dashboard()
    {
        $doctor = Doctor::where('doctor_id', auth()->user()->id)->firstOrFail();
        $bookingReviews = BookingReview::where('doctor_id', $doctor->id)->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
            ->groupBy('date')
            ->get();

        $doctor = Doctor::where('doctor_id', auth()->user()->id)->first()->id;
        $patient = BookingReview::where('doctor_id', $doctor)->where('status', 1)->with('member', 'slot.bookings')->get()->groupBy('user_id');
        $patients = [];
        foreach ($patient as $key => $value) {
            $patients[] = Member::where('member_id', $key)->with('member')->first();
        }


        return view('admin.dashboard.doctor', compact("doctor", "bookingReviews", "patients"));
    }
    public function vendor_dashboard()
    {
        $user = auth()->user();
        $vendor = Vendor::where('vendor_id', $user->id)->firstOrFail();

        $slider = VendorSlider::where('vendor_id', $vendor->id)->count();
        $tag = Tags::count();
        $order = OrderProduct::where('vendor_id', $vendor->id)->count();
        $product = Product::where('user_id', $user->id)->count();
        $card_data = collect(['slider' => $slider, 'order' => $order, 'tag' => $tag, 'product' => $product]);

        $bargraph = OrderProduct::where('vendor_id', $vendor->id)->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
            ->groupBy('date')
            ->get();

        return view('admin.dashboard.vendor', compact("card_data", "bargraph"));
    }

    public function driver_dashboard()
    {

        $user = auth()->user();
        $driver = Driver::where('driver_id', $user->id)->firstOrFail();

        $bargraph = Trip::where('driver_id', $driver->id)->where('status', 2)->select(DB::raw('DATE(date) as date'), DB::raw('count(*) as views'))
            ->groupBy('date')
            ->get();

        return view('admin.dashboard.driver', compact("bargraph"));
    }

    public function ro_dashboard()
    {
        $user = auth()->user();
        $relationmanager = RelationManager::with('relation_manager')->whereHas('relation_manager', function ($query) {
            $query->where('referrer_id', auth()->user()->id);
        })->count();
        $member = UserUserPackage::with('user.referrer', 'package_name.package', 'package_name.payment')->whereHas('user', function ($query) {
            $query->where('referrer_id', auth()->user()->id);
        })->count();
        $bargraph = UserUserPackage::where('user_id',  $user->id)->select('created_at', DB::raw('count(*) as count'))
            ->groupBy('created_at')
            ->get();
        return view('admin.dashboard.relation_manager', compact("bargraph", 'relationmanager', 'member'));
    }

    public function fetchdistrict($id)
    {
        return json_encode(DB::table('districts')->where('province_id', $id)->get());
    }

    public function fetchmun($id)
    {
        return json_encode(DB::table('municipalities')->where('district_id', $id)->get());
    }

    public function fetchward($id)
    {
        return json_encode(DB::table('wards')->where('municipalities_id', $id)->get());
    }

    public function authenticationlog()
    {
        $logs = AuthenticationLog::orderby('id', 'desc')->get();
        return view('admin.authenticationlog.index', compact("logs"));
    }

    public function nurse_dashboard()
    {
        $nurse = Nurse::where('nurse_id', auth()->user()->id)->firstOrFail();
        $shifts = NurseShift::where('nurse_id', $nurse->id)->pluck('id');
        $scheduled = NurseBooking::whereIn('nurseshift_id', $shifts)->where('booking_status', 'Scheduled')->count();
        $completed = NurseBooking::whereIn('nurseshift_id', $shifts)->where('booking_status', 'Completed')->count();
        $patient = NurseBooking::whereIn('nurseshift_id', $shifts)->where('status', 1)->get()->groupBy('member_id')->count();
        return view('admin.dashboard.nurse', compact('scheduled', 'completed', 'patient'));
    }
    public function showChangePasswordGet()
    {
        return view('auth.passwords.getchangepassword');
    }
    public function changePassword(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:8|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();

        return redirect()->back()->with("success", "Password successfully changed!");
    }

    public function convertDate(Request $request){
        $date = $this->nep_to_eng_num_convert($request->date);
        $obj = new NepaliDate();
        $explode = explode('-', $date);
        $cdate = $obj->convertBsToAd($explode[0], $explode[1], $explode[2]);
        if($cdate['month'] < 10){
            $cdate['month'] = '0'.$cdate['month'];
        }
        if($cdate['day'] < 10){
            $cdate['day'] = '0'.$cdate['day'];
        }
        $dob = $cdate['year'] . '-' . $cdate['month'] . '-' . $cdate['day'];
        return response()->json($dob);
    }
}
