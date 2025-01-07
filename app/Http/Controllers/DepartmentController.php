<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("25"))) {
            $department = Department::all();
            $symptoms = Symptom::all();
            // return $symptoms;
            // return $department;
            return view('admin.department.index', compact('department', 'symptoms'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::any(checkPermission("25"))) {
            $symptoms = Symptom::all();
            return View('admin.department.create', compact('symptoms'));
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
            "department" => "required",
            "department_nepali" => "required",
            "symptoms" => "required",
        ]);
        $department = new Department();
        $department->department = $request->department;
        $department->department_nepali = $request->department_nepali;
        $department->symptoms = $request->symptoms;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $department->image = $images[0];
                $department->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $department->image = $images[0];
                $department->image_path = $images[1];
            }
        }
        $department->save();
        return redirect()->route('department.index')->with('success', 'Department Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department, $id)
    {
        if (Gate::any(checkPermission("25"))) {
            $department = Department::findOrFail($id);
            // return $department;
            $symptoms = Symptom::all();
            return view('admin.department.edit', compact('department', 'symptoms'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "department" => "required",
            "department_nepali" => "required",
            "symptoms" => "required",
        ]);
        $department = Department::findOrFail($id);
        $department->department = $request->department;
        $department->department_nepali = $request->department_nepali;
        $department->symptoms = $request->symptoms;
        if (env('STORAGE_TYPE') == 'native') {
            $destination = 'public/images/' . $department->image;
            if (Storage::exists($destination)) {
                Storage::delete($destination);
            };
            $images = storeImageLaravel($request, 'image', 'image_path');
            $department->image = $images[0];
            $department->image_path = $images[1];
        } else {
            $destination = 'images/' . $department->image;
            Storage::disk('minio')->delete($destination);
            $images = storeImageLaravel($request, 'image', 'image_path');
            $department->image = $images[0];
            $department->image_path = $images[1];
        }
        $department->save();
        return redirect()->route('department.index')->with('success', 'Department Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        //
    }
}
