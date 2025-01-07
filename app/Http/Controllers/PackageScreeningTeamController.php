<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\PackageScreeningTeam;
use App\Models\ScreeningDate;
use Illuminate\Http\Request;

class PackageScreeningTeamController extends Controller
{
    public function editTeam(){
        return view('admin.packagelist.screeningteam.edit');
    }

    //fetch lab team members which were assigned and are available in the requested date
    public function labTeam(Request $request){
        $date = $request->labdate;
        $team = PackageScreeningTeam::with('screeningdate')->whereIn('type',['Lab Technician','Lab Nurse'])->whereHas('screeningdate',function($query) use($date){
            $query->where('screening_date',$date)->where('status','Lab Visit Pending');
        })->get()->groupBy('employee_id');
        $employee = array_keys($team->toArray());
        $labteam = Employee::whereIn('id',$employee)->with('user')->get();
        $newlabteam = Employee::whereIn('sub_role_id',[2,7])->whereNotIn('id',$employee)->with('user')->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        return response()->json(['labteam'=>$labteam , 'newlabteam'=>$newlabteam]);
    }

    //update lab team member
    public function updateLabTeam(Request $request){
        $request->validate([
            'labdate' => 'required',
            'assignedlab_id' => 'required',
            'newlab_id' => 'required',
        ]);
        $date = $request->labdate;
        $team = PackageScreeningTeam::with('screeningdate')->where('employee_id',$request->assignedlab_id)->whereIn('type',['Lab Technician','Lab Nurse'])
            ->whereHas('screeningdate',function($query) use($date){
                $query->where('screening_date',$date)->where('status','Lab Visit Pending');
            })->get();
        $employee = Employee::where('id',$request->newlab_id)->first();
        foreach($team as $emp){
            $emp['employee_id'] = $request->newlab_id;
            $emp['type'] = ($employee->sub_role_id == 2) ? 'Lab Technician' : 'Lab Nurse';
            $emp->save();
        }
        return redirect()->back()->with('success','Screening Lab Employee Switched.');
    }

    //fetch doctor and fitness team members which were assigned and are available in the requested date
    public function doctorTeam(Request $request){
        $date = $request->doctordate;
        $team = PackageScreeningTeam::with('screeningdate')->whereNotIn('type',['Lab Technician','Lab Nurse'])->whereHas('screeningdate',function($query) use($date){
            $query->where('screening_date',$date)->where('status','Doctor Visit');
        })->get()->groupBy('employee_id');
        $employee = array_keys($team->toArray());
        $doctorteam = Employee::whereIn('id',$employee)->with(['departments','user'])->get();
        $newdoctorteam = Employee::whereIn('sub_role_id',[6,14,18])->whereNotIn('id',$employee)->with(['departments','user'])->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        return response()->json(['doctorteam'=>$doctorteam , 'newdoctorteam'=>$newdoctorteam]);
    }

    //update doctor or fitness team member
    public function updateDoctorTeam(Request $request){
        $request->validate([
            'doctordate' => 'required',
            'assigneddoctor_id' => 'required',
            'newdoctor_id' => 'required',
        ]);
        $date = $request->doctordate;
        $team = PackageScreeningTeam::with('screeningdate')->where('employee_id',$request->assigneddoctor_id)->whereNotIn('type',['Lab Technician','Lab Nurse'])
            ->whereHas('screeningdate',function($query) use($date){
                $query->where('screening_date',$date)->where('status','Doctor Visit');
            })->get();
        foreach($team as $emp){
            $emp['employee_id'] = $request->newdoctor_id;
            $emp->save();
        }
        return redirect()->back()->with('success','Screening Doctor and Advisor Employee Switched.');
    }

    //team member for next lab team screening
    public function team(Request $request){
        $screening = ScreeningDate::where('screening_date',$request->screening_date)->where('status','Pending')->with(['employees'=>function($query){
            $query->where('type','Lab Technician');
        }])->get();
        $emp = [];
        if(count($screening) != 0){
            foreach($screening as $item){
                foreach($item->employees as $employee){
                    if(!in_array($employee->employee_id, $emp)){                        
                        $emp[] = $employee->employee_id;
                    }
                }
            }
        }
        $lab = Employee::whereNotIn('id',$emp)->with(['user','departments','subrole'])->where('sub_role_id',2)->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        return response()->json($lab);
    }

    //team member for next doctor team screening
    public function doctor(Request $request){
        if($request->consultation_type == 0){
            $screening = ScreeningDate::where('screening_date',$request->screening_date)->where('status','Pending')->with('employees')->get();
            $emp = [];
            if(count($screening) != 0){
                foreach($screening as $item){
                    foreach($item->employees as $employee){
                        if(!in_array($employee->employee_id, $emp)){                        
                            $emp[] = $employee->employee_id;
                        }
                    }
                }
            }
            $doctor = Employee::whereNotIn('id',$emp)->with(['user','departments','subrole'])->where('sub_role_id',6)->where('department',1)->whereHas('user',function($query){
                $query->where('is_verified',1);
            })->get();
            $dentist = Employee::whereNotIn('id',$emp)->with(['user','departments','subrole'])->where('sub_role_id',6)->where('department',2)->whereHas('user',function($query){
                $query->where('is_verified',1);
            })->get();
            $eye = Employee::whereNotIn('id',$emp)->with(['user','departments','subrole'])->where('sub_role_id',6)->where('department',3)->whereHas('user',function($query){
                $query->where('is_verified',1);
            })->get();
            $dietician = Employee::whereNotIn('id', $emp)->with(['user','departments','subrole'])->where('sub_role_id',18)->whereHas('user',function($query){
                $query->where('is_verified',1);
            })->get();
            $fitness = Employee::whereNotIn('id',$emp)->with(['user','departments','subrole'])->where('sub_role_id',14)->whereHas('user',function($query){
                $query->where('is_verified',1);
            })->get();
            return response()->json(['doctor'=> $doctor, 'dentist'=>$dentist,'eye' => $eye,'dietician'=> $dietician,'fitness'=>$fitness]);
        }
        if($request->consultation_type == 1){
            $screening = ScreeningDate::where('screening_date',$request->screening_date)->where('status','Pending')->with(['employees'=>function($query){
                $query->where('type','!=','Lab Technician');
            }])->get();
            $emp = [];
            if(count($screening) != 0){
                foreach($screening as $item){
                    foreach($item->employees as $employee){
                        if(!in_array($employee->employee_id, $emp)){                        
                            $emp[] = $employee->employee_id;
                        }
                    }
                }
            }
            $doctor = Employee::whereNotIn('id',$emp)->with(['user','departments','subrole'])->where('sub_role_id',6)->whereHas('user',function($query){
                $query->where('is_verified',1);
            })->get();
            return response()->json($doctor);
        }
    }
}
