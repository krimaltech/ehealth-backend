<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\RoleUser;
use App\Models\VendorType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PartnerController extends Controller
{
    public function becomeOurPartner()
    {
      if (Gate::allows('User')) {
        $departments = Department::all();
        $vendors = VendorType::all();
        return view('admin.partner.create',compact('departments', 'vendors'));
    } else {

        return view('viewnotfound');
    }

    }
    public function switchRole()
    {
      if (Gate::any(['User','Vendor','Doctor','Driver','Nurse'])) {
        $switch_role = RoleUser::where('user_id',auth()->user()->id)->get();
        return view('admin.partner.index',compact('switch_role'));
    } else {

        return view('viewnotfound');
    }

    }
    
    public function changeRole()
    {
        if (Gate::any(['User','Vendor','Doctor','Driver','Nurse'])) {
            $role_first = RoleUser::where('user_id',auth()->user()->id)->first();
            $role_second = RoleUser::where('user_id',auth()->user()->id)->skip(1)->first();
            $temp = 0;
            $temp = $role_first->role_id;
            $role_first->role_id = $role_second->role_id;
            $role_second->role_id = $temp;
            $role_first->save();
            $role_second->save();
            return redirect()->route('home')->with('success' , 'Role Changed Successfully');
        } else {
    
            return view('viewnotfound');
        }
    }
}
