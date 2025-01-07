<?php

namespace App\Http\Controllers;

use App\Models\SubRole;
use Illuminate\Http\Request;

class SubRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subroles = SubRole::all();
        return view('admin.subrole.index', compact("subroles"));
    }

    public function store(Request $request)
    {
        $subrole = new SubRole();
        $subrole->role_id = 3;
        $subrole->subrole = $request->subrole;
        $subrole->percentage = $request->percentage;
        $subrole->save();
        return redirect()->route('permission.index')->with('success', 'Employee Sub Role Added Successfully');
    }
    public function update(Request $request, $id)
    {
        $subrole = SubRole::findOrFail($id);
        $request->validate([
            'subrole' => 'required',
            // 'percentage' => 'required|numeric|between:0,100',
        ]);
        $subrole->subrole = $request->subrole;
        $subrole->update();
        return redirect()->route('permission.index')->with('success', 'Employee Sub Role Updated Successfully');
    }
}
