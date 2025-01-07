<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\SubRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(['Superadmin','Admin'])) {
            $permission = RolePermission::with('role_type','sub_role_type')->get();
            $subroles = SubRole::with('permission')->get();
            return view('admin.permission.index', compact('permission','subroles'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        if (Gate::any(['Superadmin','Admin'])) {
            $roles = Role::where('id',3)->get();
            $subrole = SubRole::where('id',$id)->get();
            $permission = Permission::with('categories')->whereNull('sub_category')->orderBy('permission_title','asc')->get();
            return view('admin.permission.create', compact('roles', 'permission','subrole'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_id' => 'required',
            'permission_id' => 'required'
        ]);
        $permission = new RolePermission();
        $permission->role_id = $request->role_id;
        $permission->sub_role_id = $request->sub_role_id;
        $permission->permission_id = $request->permission_id;
        $permission->save();
        return redirect()->route('permission.index')->with('success', 'Permission Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::any(['Superadmin','Admin'])) {
            $roles = Role::where('id',3)->get();
            $subrole = SubRole::where('id',$id)->get();
            $permission = Permission::with('categories')->whereNull('sub_category')->orderBy('permission_title','asc')->get();
            $permissions = RolePermission::where('sub_role_id',$id)->first();
            return view('admin.permission.edit', compact('roles', 'permission', 'permissions','subrole'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $request->validate([
            'role_id' => 'required',
            'permission_id' => 'required'
        ]);
        $permission = RolePermission::findOrFail($id);
        $permission->role_id = $request->role_id;
        $permission->sub_role_id = $request->sub_role_id;
        $permission->permission_id = $request->permission_id;
        $permission->save();
        return redirect()->route('permission.index')->with('success', 'Permission Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }
}
