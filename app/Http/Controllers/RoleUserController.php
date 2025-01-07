<?php

namespace App\Http\Controllers;

use App\Models\RoleUser;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_role = RoleUser::with('roles:id,role_type','users:id,name,email,phone','employee:id,employee_id,employee_code')->get();
        return view("admin.role_user.index",compact('user_role'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function show(RoleUser $roleUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function edit(RoleUser $roleUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RoleUser $roleUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RoleUser  $roleUser
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user_role = RoleUser::findOrFail($id);
        $user_role->delete();
        return redirect()->route('user-role.index')->with('success',"Role Temporary Deleted Successfully");
    }

    public function archive()
    {
        $user_role = RoleUser::withTrashed()->with('roles:id,role_type','users:id,name')->whereNotNull('deleted_at')->get();
        return view("admin.role_user.archive",compact('user_role'));
    }
    public function retrive($id)
    {
        RoleUser::withTrashed()->find($id)->restore();
        return redirect()->route('user-role.index')->with('success',"Role Archive Successfully");
    }
}
