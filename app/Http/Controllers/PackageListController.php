<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\KnowYourCustomer;
use App\Models\MedicalReport;
use App\Models\Package;
use App\Models\PackagePayment;
use App\Models\PackageScreening;
use App\Models\PackageScreeningTeam;
use App\Models\Screening;
use App\Models\ScreeningDate;
use App\Models\User;
use App\Models\UserPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PackageListController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789"), 0, 3);
    }

    public function booked(Request $request)
    {
        $allpackages = Package::all();
        if (Gate::any(['Superadmin', 'Admin'])) {
            // $booked_date = $request['booked_date'] ?? "";
            // $package_name = $request['package_name'] ?? "";           
            if ($request->latitude || $request->longitude || $request->package){
                $latitude = $request->latitude;
                $longitude = $request->longitude;
                $package = $request->package;
                $packages = UserPackage::with(['package', 'familyname.primary.member.kyc', 'familyname.family', 'familyfee'])
                ->where('package_status', 'Activated')->whereDoesntHave('dates')
                ->when($package, function ($query) use ($package) {
                    return $query->where('package_id', $package);
                })
                ->when($latitude && $longitude, function ($query) use ($latitude, $longitude) {
                    return $query->whereHas('familyname', function ($qry) use ($latitude, $longitude) {
                        $qry->whereHas('primary', function ($query) use ($latitude, $longitude) {
                            $query->whereHas('member', function ($qu) use ($latitude, $longitude) {
                                $qu->whereHas('kyc', function ($q) use ($latitude, $longitude) {
                                    return $q->select('*', DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                    * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                                    + sin(radians(" . $latitude . ")) * sin(radians(latitude))) AS distance"))->having('distance', '<=', 5);
                                });
                            });
                        });
                    });
                })
                ->get();
            } else {
                $packages = UserPackage::with(['package', 'familyname.primary.member.kyc', 'familyname.family', 'familyfee'])->where('package_status', 'Activated')->whereDoesntHave('dates')->get();
            }
            return view('admin.packagelist.booked.index', compact('packages','allpackages'));
        } else {
            return view('viewnotfound');
        }
    }

    public function bookedShow($id)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $package = UserPackage::with(['familyname.primary.member', 'familyname.family.member.user', 'package', 'payment' => function ($query) {
                $query->latest();
            }])->find($id);
            return view('admin.packagelist.booked.show', compact('package'));
        } else {
            return view('viewnotfound');
        }
    }

    public function consultant(Request $request)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $allpackages = Package::all();    
            $allscreening = Screening::all();         
            if ($request->latitude || $request->longitude || $request->package || $request->screening || $request->date) {
                $latitude = $request->latitude;
                $longitude = $request->longitude;
                $package = $request->package;
                $screening = $request->screening;
                $date = $request->date;
                $packages = UserPackage::with(['package', 'familyname.primary.member.kyc', 'familyname.family',  'familyfee','dates'])
                ->where('package_status', 'Activated')
                ->when($package, function ($query) use ($package) {
                    return $query->where('package_id', $package)->whereHas('dates',function($q){
                        $q->where('status','Report Generated');
                    });
                })
                ->when($latitude && $longitude, function ($query) use ($latitude, $longitude) {
                    return $query->whereHas('familyname', function ($qry) use ($latitude, $longitude) {
                        $qry->whereHas('primary', function ($qy) use ($latitude, $longitude) {
                            $qy->whereHas('member', function ($qu) use ($latitude, $longitude) {
                                $qu->whereHas('kyc', function ($q) use ($latitude, $longitude) {
                                    return $q->select('*', DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                    * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                                    + sin(radians(" . $latitude . ")) * sin(radians(latitude))) AS distance"))->having('distance', '<=', 5);
                                });
                            });
                        });
                    })->whereHas('dates',function($qr){
                        $qr->where('status','Report Generated');
                    });
                })
                ->when($screening, function ($query) use ($screening) {
                    return $query->whereHas('dates',function($qy) use($screening){
                        $qy->where('screening_id',$screening)->where('status','Report Generated');
                    });
                })
                ->when($date, function ($query) use ($date) {
                    return $query->whereHas('dates',function($qy) use($date){
                        $qy->where('screening_date',$date)->where('status','Report Generated');
                    });
                })
                ->get();
                $type = PackageScreening::where('package_id',$request->package)->where('screening_id',$request->screening)->first();
                return view('admin.packagelist.consultation.index', compact('packages','allpackages','allscreening','type'));
            } else {
                $packages = UserPackage::with(['package', 'familyname.primary.member.kyc', 'familyname.family',  'familyfee', 'dates','dates.screening'])->where('package_status', 'Activated')->whereHas('dates',function($q){
                    $q->where('status','Report Generated')->latest();
                })->get();
                return view('admin.packagelist.consultation.index', compact('packages','allpackages','allscreening'));
            }
        } else {
            return view('viewnotfound');
        }
    }
    
    public function consultantShow($id)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $package = UserPackage::with(['familyname.primary.member', 'familyname.family.member.user', 'package', 'payment' => function ($query) {
                $query->latest();
            }])->find($id);
            return view('admin.packagelist.consultation.show', compact('package'));
        } else {
            return view('viewnotfound');
        }
    }

    public function pending()
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $packages = UserPackage::with(['package', 'familyname.primary.member.kyc', 'familyfee', 'dates'])->has('dates')->where('package_status', 'Booked')->get();
            return view('admin.packagelist.firstpending.index', compact('packages'));
        } else {
            return view('viewnotfound');
        }
    }

    public function pendingShow($id)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $package = UserPackage::with(['package', 'familyname.primary.member.kyc', 'familyfee', 'dates.screening'])->find($id);
            $labteam = PackageScreeningTeam::where('screeningdate_id', $package->dates[0]->id)->with('employee.user')->where('type', 'Lab Technician')->orWhere('type','Lab Nurse')->get();
            $doctorteam = PackageScreeningTeam::where('screeningdate_id', $package->dates[0]->id)->with('employee.user')->where('type', '!=', 'Lab Technician')->orWhere('type','!=', 'Lab Nurse')->get();
            // $doctorteamsecond = PackageScreeningTeam::where('screeningdate_id', $package->dates[1]->id)->with('employee.user')->where('type', '!=', 'Lab Technician')->get();
            return view('admin.packagelist.firstpending.show', compact('package', 'labteam', 'doctorteam'));
        } else {
            return view('viewnotfound');
        }
    }

    public function activated(Request $request)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $allpackages = Package::all();
            $allscreening = Screening::all();
            if ($request->latitude || $request->longitude || $request->package || $request->screening || $request->date) {
                $latitude = $request->latitude;
                $longitude = $request->longitude;
                $package = $request->package;
                $screening = $request->screening;
                $date = $request->date;
                $packages = UserPackage::with(['package', 'familyname.primary.member.kyc', 'familyname.family',  'familyfee','dates'])
                        ->where('package_status', 'Activated')                                            
                        ->when($package, function ($query) use ($package) {
                            return $query->where('package_id', $package)->whereHas('dates',function($qy){
                                $qy->where('status','Pending')->where('reschedule_status',0);
                            });
                        })
                        ->when($latitude && $longitude, function ($query) use ($latitude, $longitude) {
                            return $query->whereHas('familyname', function ($qry) use ($latitude, $longitude) {
                                $qry->whereHas('primary', function ($qy) use ($latitude, $longitude) {
                                    $qy->whereHas('member', function ($qu) use ($latitude, $longitude) {
                                        $qu->whereHas('kyc', function ($q) use ($latitude, $longitude) {
                                            return $q->select('*', DB::raw("6371 * acos(cos(radians(" . $latitude . "))
                                            * cos(radians(latitude)) * cos(radians(longitude) - radians(" . $longitude . "))
                                            + sin(radians(" . $latitude . ")) * sin(radians(latitude))) AS distance"))->having('distance', '<=', 5);
                                        });
                                    });
                                });
                            })->whereHas('dates',function($qr){
                                $qr->where('status','Pending')->where('reschedule_status',0);
                            });
                        })
                        ->when($screening, function ($query) use ($screening) {
                            return $query->whereHas('dates',function($qy) use($screening){
                                $qy->where('screening_id',$screening)->where('status','Pending')->where('reschedule_status',0);
                            });
                        })
                        ->when($date, function ($query) use ($date) {
                            return $query->whereHas('dates',function($qy) use($date){
                                $qy->where('screening_date',$date)->where('status','Pending')->where('reschedule_status',0);
                            });
                        })
                        ->get();
            } else {
                $packages = UserPackage::with(['package', 'familyname.primary.member', 'familyname.family',  'dates.screening'])->where('package_status', 'Activated')->whereHas('dates')->get();
            }
            return view('admin.packagelist.activated.index', compact('packages','allpackages','allscreening'));
        } else {
            return view('viewnotfound');
        }
    }

    public function activatedShow($id)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $package = UserPackage::with(['familyname.primary.member', 'familyname.family.member.user','package', 'dates.screening', 'dates.reports', 'dates.online.member.user','dates.employees.employee.user', 'payment' => function ($query) {
                $query->latest();
            }])->find($id);
            return view('admin.packagelist.activated.show', compact('package'));
        } else {
            return view('viewnotfound');
        }
    }

    public function deactivated()
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $packages = UserPackage::with(['package', 'familyname.primary.member', 'familyname.family'])->where('package_status', 'Deactivated')->get();
            //return $packages;
            return view('admin.packagelist.deactivated.index', compact('packages'));
        } else {
            return view('viewnotfound');
        }
    }

    public function deactivatedShow($id)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $package = UserPackage::with(['familyname.primary.member', 'package', 'dates.screening', 'dates.reports', 'dates.online.member.user','dates.employees.employee.user', 'payment' => function ($query) {
                $query->latest();
            }])->find($id);
            return view('admin.packagelist.deactivated.show', compact('package'));
        } else {
            return view('viewnotfound');
        }
    }

    public function notbooked()
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $packages = UserPackage::with(['package', 'familyname.primary.member', 'familyname.family'])->where('package_status', 'Not Booked')->get();
            //return $packages;
            return view('admin.packagelist.notbooked', compact('packages'));
        } else {
            return view('viewnotfound');
        }
    }

    public function storeDate(Request $request)
    {
       // return $request;
        $request->validate([
            'screening_date' => 'required',
            'ids' => 'required',
            'lab_ids' => 'required',
        ]);
        $labs =  explode(",", $request->lab_ids);
        $ids =  explode(",", $request->ids);

        foreach ($ids as $userpackage) {
            if($request->screening_id == 1){
                $date = new ScreeningDate();
                $date->userpackage_id = $userpackage;
                $date->screening_id = $request->screening_id;
                $date->screening_date = $request->screening_date;
                $date->status = 'Lab In Progress';
                // $date->consultation_type = $request->consultation_type;
                $saved = $date->save();
            }else{
                // $date = ScreeningDate::where('userpackage_id',$userpackage)->where('screening_id',$request->screening_id)->first();
                $date = ScreeningDate::where('userpackage_id',$userpackage)->where('status','Pending')->first();
                $date->status = 'Lab In Progress';
                $date->update();
            }

            foreach ($labs as $lab) {
                $team = new PackageScreeningTeam();
                $team->screeningdate_id = $date->id;
                $team->employee_id = $lab;
                $employee = Employee::find($lab);
                if($employee->sub_role_id == 2){
                    $team->type = 'Lab Technician';
                }else if($employee->sub_role_id == 7){
                    $team->type = 'Lab Nurse';
                }
                $team->save();
            }
            
            $package = UserPackage::with(['familyname.family'])->find($userpackage);

            //comment because of change in flow of global form and package activation
            // if($request->screening_id == 1){
            //     //update expiry date of package
            //     $package->expiry_date = Carbon::parse($date->screening_date)->addMonthsNoOverflow(12)->toDateString();
            //     $package->update();
    
            //     //payment date and payment expiry date according to the added screening date
            //     $payment = PackagePayment::where('userpackage_id', $userpackage)->first();
            //     $payment->payment_date = $request->screening_date;
            //     if ($payment->payment_interval == 'Monthly') {
            //         $payment->expiry_date = Carbon::parse($date->screening_date)->addMonthNoOverflow()->toDateString();
            //     } elseif ($payment->payment_interval == 'Quarterly') {
            //         $payment->expiry_date = Carbon::parse($date->screening_date)->addMonthsNoOverflow(3)->toDateString();
            //     } elseif ($payment->payment_interval == 'Half_Yearly') {
            //         $payment->expiry_date = Carbon::parse($date->screening_date)->addMonthsNoOverflow(6)->toDateString();
            //     } elseif ($payment->payment_interval == 'Yearly') {
            //         $payment->expiry_date = Carbon::parse($date->screening_date)->addMonthsNoOverflow(12)->toDateString();
            //     }
            //     $payment->update();
            // }
            if($package->package_id != 10){
                $sample = new MedicalReport();
                $sample->member_id = $package->familyname->primary_member_id;
                $sample->screeningdate_id = $date->id;
                $sample->sample_no = $package->familyname->primary_member_id.'-'.Carbon::now()->format('Y').'-'.$this->random;
                $sample->status = 'Sample to be collected';
                $saved = $sample->save();
            }
            foreach($package->familyname->family as $item){
                $sample = new MedicalReport();
                $sample->member_id = $item->member_id;
                $sample->screeningdate_id = $date->id;
                $sample->sample_no = $item->member_id.'-'.Carbon::now()->format('Y').'-'.$this->random;
                $sample->status = 'Sample to be collected';
                $saved = $sample->save();
            }
        }
        if ($saved) {
            return response()->json(['success' => 'Screening Date and Team Added Successfully.']);
        }
    }

    // public function show($id){
    // $package = UserPackage::with(['familyname.primary.member','package','dates.screening','payment' => function($query){
    //     $query->latest();
    // }])->find($id);
    //     //return $package;
    //     return view('admin.packagelist.show',compact('package'));
    // }

    public function changeStatus($id)
    {
        $date = ScreeningDate::find($id);
        $date->status = 'Completed';
        $updated = $date->update();
        
        $reports = MedicalReport::where('screeningdate_id',$id)->get();
        foreach($reports as $item){
            $item->status = 'Completed';
            $item->update();
        }

        $userpackage = UserPackage::with('package.screenings')->find($date->userpackage_id);
        foreach ($userpackage->package->screenings->skip($date->screening_id)->take(1) as $item) {
            $screening_date = Carbon::parse($date->screening_date)->addMonths(12 / $userpackage->package->visits);
            $sdate = new ScreeningDate();
            $sdate->userpackage_id = $date->userpackage_id;
            $sdate->screening_id = $item->id;
            $sdate->screening_date = $screening_date;
            $sdate->status = 'Pending';
            $sdate->is_verified = 0;
            $saved = $sdate->save();
        }
        return redirect()->back()->with('success', 'Screening completed successfully.');
    }

    public function reschedule(Request $request, $id)
    {
        $screening = ScreeningDate::find($id);
        $screening->screening_date = $request->screening_date;
        $screening->screening_time = null;
        $screening->status = 'Pending';
        $screening->reschedule_status = 0;
        $updated = $screening->update();

        $teams = PackageScreeningTeam::where('screeningdate_id',$screening->id)->get();
        foreach($teams as $team){
            $team->delete();
        }

        $report = MedicalReport::where('screeningdate_id',$id)->first();
        if($report != null){
            $report->delete();
        }
        if ($updated) {
            return redirect()->back()->with('success', 'Screening Date Rescheduled.');;
        }
    }

    public function getemployee(Request $request)
    {
        $screening = ScreeningDate::where('screening_date', $request->screening_date)->where('status', 'Lab In Progress')->with(['employees'=>function($query){
            $query->whereIn('type',['Lab Nurse','Lab Technician']);
        }])->get();
        $emp = [];
        if (count($screening) != 0) {
            foreach ($screening as $item) {
                foreach ($item->employees as $employee) {
                    if (!in_array($employee->employee_id, $emp)) {
                        $emp[] = $employee->employee_id;
                    }
                }
            }
        }
        $lab = Employee::whereNotIn('id', $emp)->with(['user', 'departments', 'subrole'])->whereIn('sub_role_id', [2,7])->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        // $nurse = Employee::whereNotIn('id', $emp)->with(['user', 'departments', 'subrole'])->where('sub_role_id', 7)->get();
        return response()->json(['lab' => $lab]);

        // $doctor = Employee::whereNotIn('id',$emp)->with(['user','departments','subrole'])->where('sub_role_id',6)->whereNotIn('department',[2,3,4])->get();
        // $dentist = Employee::whereNotIn('id',$emp)->with(['user','departments','subrole'])->where('sub_role_id',6)->where('department',2)->get();
        // $eye = Employee::whereNotIn('id',$emp)->with(['user','departments','subrole'])->where('sub_role_id',6)->where('department',3)->get();
        // $dietician = Employee::whereNotIn('id',$emp)->with(['user','departments','subrole'])->where('sub_role_id',6)->where('department',4)->get();
        // $fitness = Employee::whereNotIn('id',$emp)->with(['user','departments','subrole'])->where('sub_role_id',14)->get();

        // $tm= ScreeningDate::where('screening_date',$request->screening_date)->get();
        // $emp=[];
        //  foreach($tm as $ttm){
        //     if($ttm->employee_ids){
        //         $emp= array_merge($emp, $ttm->employee_ids);
        //     }

        //  }
        // //  return $emp;
        // $employees= Employee::whereNotIn('id',$emp)->with(['user','departments','subrole'])->whereIn('sub_role_id',[2,6])->get();
        // return response()->json($employees);
    }

    public function storeConsultationDate(Request $request)
    {
        $request->validate([
            'ids' => 'required',
            'screeningdateids' => 'required',
        ]);
        $doctors =  explode(",", $request->doctor_ids);
        $dentists =  explode(",", $request->dentist_ids);
        $dieticians =  explode(",", $request->dietician_ids);
        $ophthalmologists =  explode(",", $request->ophthalmologist_ids);
        $fitness =  explode(",", $request->fitness_ids);
        $nurses =  explode(",", $request->nurse_ids);
        $ids =  explode(",", $request->ids);
        $dateids =  explode(",", $request->screeningdateids);

        foreach ($dateids as $screeningDate) {
            $date = ScreeningDate::find($screeningDate);
            $date->doctorvisit_date = $request->doctorvisit_date;
            $date->status = 'Doctor Visit';
            $saved = $date->save();

            $reports = MedicalReport::where('screeningdate_id',$screeningDate)->get();
            foreach($reports as $item){
                $item->status = 'Doctor Visit';
                $item->update();
            }

            foreach ($doctors as $doctor) {
                $team = new PackageScreeningTeam();
                $team->screeningdate_id = $date->id;
                $team->employee_id = $doctor;
                $team->type = 'Doctor';
                $team->save();
            }
            foreach ($dentists as $dentist) {
                $team = new PackageScreeningTeam();
                $team->screeningdate_id = $date->id;
                $team->employee_id = $dentist;
                $team->type = 'Dentist';
                $team->save();
            }
            foreach ($dieticians as $dietician) {
                $team = new PackageScreeningTeam();
                $team->screeningdate_id = $date->id;
                $team->employee_id = $dietician;
                $team->type = 'Dietician';
                $team->save();
            }
            foreach ($ophthalmologists as $ophthalmologist) {
                $team = new PackageScreeningTeam();
                $team->screeningdate_id = $date->id;
                $team->employee_id = $ophthalmologist;
                $team->type = 'Ophthalmologist';
                $team->save();
            }
            foreach ($fitness as $fit) {
                $team = new PackageScreeningTeam();
                $team->screeningdate_id = $date->id;
                $team->employee_id = $fit;
                $team->type = 'Fitness Trainer';
                $team->save();
            }
            foreach ($nurses as $nurse) {
                $team = new PackageScreeningTeam();
                $team->screeningdate_id = $date->id;
                $team->employee_id = $nurse;
                $team->type = 'Nurse';
                $team->save();
            }
            // if($request->consultation_type == 1){
            //     $date->doctorvisit_date = $request->doctorvisit_date;
            //     $date->status = 'Doctor Visit';
            //     $date->consultation_type = $request->consultation_type;
            //     $saved = $date->save();

            //     $reports = MedicalReport::where('screeningdate_id',$screeningDate)->get();
            //     foreach($reports as $item){
            //         $item->status = 'Doctor Visit';
            //         $item->update();
            //     }
    
            //     foreach ($doctors as $doctor) {
            //         $team = new PackageScreeningTeam();
            //         $team->screeningdate_id = $date->id;
            //         $team->employee_id = $doctor;
            //         $team->type = 'Doctor';
            //         $team->save();
            //     }
            //     foreach ($dentists as $dentist) {
            //         $team = new PackageScreeningTeam();
            //         $team->screeningdate_id = $date->id;
            //         $team->employee_id = $dentist;
            //         $team->type = 'Dentist';
            //         $team->save();
            //     }
            //     foreach ($dieticians as $dietician) {
            //         $team = new PackageScreeningTeam();
            //         $team->screeningdate_id = $date->id;
            //         $team->employee_id = $dietician;
            //         $team->type = 'Dietician';
            //         $team->save();
            //     }
            //     foreach ($ophthalmologists as $ophthalmologist) {
            //         $team = new PackageScreeningTeam();
            //         $team->screeningdate_id = $date->id;
            //         $team->employee_id = $ophthalmologist;
            //         $team->type = 'Ophthalmologist';
            //         $team->save();
            //     }
            //     foreach ($fitness as $fit) {
            //         $team = new PackageScreeningTeam();
            //         $team->screeningdate_id = $date->id;
            //         $team->employee_id = $fit;
            //         $team->type = 'Fitness Trainer';
            //         $team->save();
            //     }
            //     foreach ($nurses as $nurse) {
            //         $team = new PackageScreeningTeam();
            //         $team->screeningdate_id = $date->id;
            //         $team->employee_id = $nurse;
            //         $team->type = 'Nurse';
            //         $team->save();
            //     }
            // }
            // if($request->consultation_type == 2){
            //     $date->doctorvisit_date = $request->online_date;
            //     $date->status = 'Doctor Visit';
            //     $date->consultation_type = $request->consultation_type;
            //     $saved = $date->save();

            //     $reports = MedicalReport::where('screeningdate_id',$screeningDate)->get();
            //     foreach($reports as $item){
            //         $item->status = 'Doctor Visit';
            //         $item->update();
            //     }

            //     $team = new PackageScreeningTeam();
            //     $team->screeningdate_id = $date->id;
            //     $team->employee_id = $request->doctor_id;
            //     $team->type = 'Doctor';
            //     $team->save();
            // }     
            
        }
        // foreach ($ids as $userpackage) {
        //     $date = new ScreeningDate();
        //     $date->userpackage_id = $userpackage;
        //     $date->screening_id = $request->screening_id;
        //     $date->screening_date = $request->screening_date;
        //     $date->consultation_type = $request->consultation_type;
        //     $saved = $date->save();

        //     foreach ($doctors as $doctor) {
        //         $team = new PackageScreeningTeam();
        //         $team->screeningdate_id = $date->id;
        //         $team->employee_id = $doctor;
        //         $team->type = 'Doctor';
        //         $team->save();
        //     }
        //     foreach ($dentists as $dentist) {
        //         $team = new PackageScreeningTeam();
        //         $team->screeningdate_id = $date->id;
        //         $team->employee_id = $dentist;
        //         $team->type = 'Dentist';
        //         $team->save();
        //     }
        //     foreach ($dieticians as $dietician) {
        //         $team = new PackageScreeningTeam();
        //         $team->screeningdate_id = $date->id;
        //         $team->employee_id = $dietician;
        //         $team->type = 'Dietician';
        //         $team->save();
        //     }
        //     foreach ($ophthalmologists as $ophthalmologist) {
        //         $team = new PackageScreeningTeam();
        //         $team->screeningdate_id = $date->id;
        //         $team->employee_id = $ophthalmologist;
        //         $team->type = 'Ophthalmologist';
        //         $team->save();
        //     }
        //     foreach ($fitness as $fit) {
        //         $team = new PackageScreeningTeam();
        //         $team->screeningdate_id = $date->id;
        //         $team->employee_id = $fit;
        //         $team->type = 'Fitness Trainer';
        //         $team->save();
        //     }

        //     //update expiry date of package
        //     $package = UserPackage::find($userpackage);
        //     $package->expiry_date = Carbon::parse($date->screening_date)->addMonthsNoOverflow(12)->toDateString();
        //     $package->update();

        //     //payment date and payment expiry date according to the added screening date
        //     $payment = PackagePayment::where('userpackage_id', $userpackage)->first();
        //     $payment->payment_date = $request->screening_date;
        //     if ($payment->payment_interval == 'Monthly') {
        //         $payment->expiry_date = Carbon::parse($date->screening_date)->addMonthNoOverflow()->toDateString();
        //     } elseif ($payment->payment_interval == 'Quarterly') {
        //         $payment->expiry_date = Carbon::parse($date->screening_date)->addMonthsNoOverflow(3)->toDateString();
        //     } elseif ($payment->payment_interval == 'Half_Yearly') {
        //         $payment->expiry_date = Carbon::parse($date->screening_date)->addMonthsNoOverflow(6)->toDateString();
        //     } elseif ($payment->payment_interval == 'Yearly') {
        //         $payment->expiry_date = Carbon::parse($date->screening_date)->addMonthsNoOverflow(12)->toDateString();
        //     }
        //     $payment->update();
        // }
        if ($saved) {
            return response()->json(['success' => 'Doctor Visit Date and Team Added Successfully.']);
        }
    }

    public function getConsultationEmployee(Request $request)
    {
        $screening = ScreeningDate::where('doctorvisit_date', $request->screening_date)->where('status', 'Doctor Visit')->with(['employees'=>function($query){
            $query->whereNotIn('type',['Lab Nurse','Lab Technician']);
        }])->get();
        $emp = [];
        if (count($screening) != 0) {
            foreach ($screening as $item) {
                foreach ($item->employees as $employee) {
                    if (!in_array($employee->employee_id, $emp)) {
                        $emp[] = $employee->employee_id;
                    }
                }
            }
        }
        $doctor = Employee::whereNotIn('id', $emp)->with(['user', 'departments', 'subrole'])->where('sub_role_id', 6)->where('department', 1)->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        $dentist = Employee::whereNotIn('id', $emp)->with(['user', 'departments', 'subrole'])->where('sub_role_id', 6)->where('department', 2)->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        $eye = Employee::whereNotIn('id', $emp)->with(['user', 'departments', 'subrole'])->where('sub_role_id', 6)->where('department', 3)->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        $dietician = Employee::whereNotIn('id', $emp)->with(['user','departments','subrole'])->where('sub_role_id',18)->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        $fitness = Employee::whereNotIn('id', $emp)->with(['user', 'departments', 'subrole'])->where('sub_role_id', 14)->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        $nurse = Employee::whereNotIn('id', $emp)->with(['user', 'departments', 'subrole'])->where('sub_role_id', 7)->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        return response()->json(['doctor' => $doctor, 'dentist' => $dentist, 'eye' => $eye, 'dietician' => $dietician, 'fitness' => $fitness, 'nurse' => $nurse]);
    }

    public function getScreening(Request $request){
        $screening = PackageScreening::where('package_id',$request->package_id)->with('screening')->get();
        return response()->json($screening);
    }

    public function notrelated(Request $request){
        $users = User::join('members', 'members.member_id', '=', 'users.id')->get(['users.*', 'members.*'])->whereNull('member_type');
        return view('admin.packagelist.notrelated',compact('users'));
    }

    public function screeningTime(Request $request,$id){
        $date = ScreeningDate::find($id);
        $date->screening_time = Carbon::parse($request->screening_time)->format('g:i A');
        $updated = $date->update();
        if($updated){
            return redirect()->back()->with('success','Screening Time Updated Successfully.');
        }
    }

    public function doctorTime(Request $request,$id){
        $date = ScreeningDate::find($id);
        $date->doctorvisit_time = Carbon::parse($request->doctorvisit_time)->format('g:i A');
        $updated = $date->update();
        if($updated){
            return redirect()->back()->with('success','Home Visit Time Updated Successfully.');
        }
    }
}
