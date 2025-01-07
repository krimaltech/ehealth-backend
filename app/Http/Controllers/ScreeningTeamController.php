<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\ScreeningTeam;
use App\Models\ScreeningTeamName;
use Illuminate\Http\Request;

class ScreeningTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $screeningteams= ScreeningTeamName::with('screeningteam')->get();
        $employees= Employee::whereIn('sub_role_id',[2,6])->get();
        return view('admin.screeningteam.index',compact("employees","screeningteams"));
    }

    public function store(Request $request)
    {
        // return $request;
       $request->validate([
        'name'=>'required|unique:screening_team_names',
        'employees'=>'required',
       ]);
       $team= new ScreeningTeamName();
       $team->name= $request->name;
       $team->save();

       foreach($request->employees as $imp){
        $screening= new ScreeningTeam();
        $screening->screening_team_name_id= $team->id;
        $screening->employee_id =$imp;
        $screening->save();
    }
        return redirect()->route('steam.index')->with('success','Screening Team added successfully');
       
    }

    public function edit($id)
    {
         $team= ScreeningTeamName::with(['screeningteam'])->findOrfail($id);
         $screeningid=$team->screeningteam->pluck('id');
         $screeningid= str_replace(array('[',']'),'',$screeningid);
        $employees= Employee::whereIn('sub_role_id',[2,6])->get();
        return view('admin.screeningteam.edit',compact("employees","team","screeningid"));
    }

  

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScreeningTeam  $screeningTeam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|unique:screening_team_names,name,'.$id,
            'employees'=>'required',
           ]);
           $team=  ScreeningTeamName::findOrFail($id);
           $team->name= $request->name;
           $team->update();
           ScreeningTeam::where('screening_team_name_id',$id)->delete();
           foreach($request->employees as $imp){
            $screening= new ScreeningTeam();
            $screening->screening_team_name_id= $team->id;
            $screening->employee_id =$imp;
            $screening->save();
        }
            return redirect()->route('steam.index')->with('success','Screening Team updated successfully');
    }

  
}
