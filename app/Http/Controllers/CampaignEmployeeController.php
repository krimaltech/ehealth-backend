<?php

namespace App\Http\Controllers;

use App\Models\CampaignEmployee;
use App\Models\Employee;
use App\Models\SwitchCampaignEmployee;
use Illuminate\Http\Request;

class CampaignEmployeeController extends Controller
{
    public function getEmployee(Request $request){
        $emp = Employee::find($request->data);
        if($emp->sub_role_id == 7){
            $employee = Employee::with(['user','departments','subrole'])->where('id','!=', $emp->id)->where('sub_role_id',7)->whereHas('user',function($query){
                $query->where('is_verified',1);
            })->get();
        }elseif($emp->sub_role_id == 18){
            $employee = Employee::with(['user','departments','subrole'])->where('id','!=', $emp->id)->where('sub_role_id',18)->whereHas('user',function($query){
                $query->where('is_verified',1);
            })->get();
        }else{           
            $employee = Employee::with(['user','departments','subrole'])->where('id','!=', $emp->id)->where('sub_role_id',6)->where('department',$emp->department)->whereHas('user',function($query){
                $query->where('is_verified',1);
            })->get();
        }
        return response()->json($employee);
    }

    public function switch(Request $request){
        $request->validate([
            'new_employee_id' => 'required',
            'reason' => 'required',
        ]);
        $switch = new SwitchCampaignEmployee();
        $switch->campaign_id = $request->campaign_id;
        $switch->employee_id = $request->employee_id;
        $switch->new_employee_id = $request->new_employee_id;
        $switch->reason = $request->reason;
        $switch->save();

        $campaignEmployee = CampaignEmployee::where('campaign_id',$request->campaign_id)->where('employee_id',$request->employee_id)->first();
        $campaignEmployee->employee_id = $request->new_employee_id;
        $campaignEmployee->update();

        return redirect()->back()->with('success','Employee Switched Successfully.');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $request->validate([
            'doctor' => 'required',
            'dentist' => 'required',
            'dietician' => 'required',
            'ophthalmologist' => 'required',
            'physiotherapist' => 'required',
            'nurse' => 'required',
        ]);

        $data = $request->except('_token');
        $values = [];
        foreach($data as $key=>$value){
            array_push($values,$value);
        }

        foreach($values as $item){
            $emp = new CampaignEmployee();
            $emp->campaign_id = $id;
            $emp->employee_id = $item;
            $emp->save();
        }

        return redirect()->back()->with('success','Employees Assigned Successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CampaignEmployee  $campaignEmployee
     * @return \Illuminate\Http\Response
     */
    public function show(CampaignEmployee $campaignEmployee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CampaignEmployee  $campaignEmployee
     * @return \Illuminate\Http\Response
     */
    public function edit(CampaignEmployee $campaignEmployee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CampaignEmployee  $campaignEmployee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CampaignEmployee $campaignEmployee)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CampaignEmployee  $campaignEmployee
     * @return \Illuminate\Http\Response
     */
    public function destroy(CampaignEmployee $campaignEmployee)
    {
        //
    }
}
