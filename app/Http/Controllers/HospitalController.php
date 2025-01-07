<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("25"))) {
            $hospital = Hospital::all();
            return view('admin.hospital.index', compact('hospital'));
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
            return view('admin.hospital.create');
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
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'image' => 'required',
        ]);
        $hospital = new Hospital();
        $hospital->name  = $request->name;
        $hospital->email  = $request->email;
        $hospital->phone  = $request->phone;
        $hospital->address  = $request->address;
        $hospital->latitude  = $request->latitude;
        $hospital->longitude  = $request->longitude;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $hospital->image = $images[0];
                $hospital->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $hospital->image = $images[0];
                $hospital->image_path = $images[1];
            }
        }
        $saved = $hospital->save();
        if ($saved) {
            return redirect()->route('hospital.index')->with('success', 'Hospital Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function show(Hospital $hospital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::any(checkPermission("25"))) {
            $hospital = Hospital::find($id);
            return view('admin.hospital.edit', compact('hospital'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $hospital = Hospital::find($id);
        $hospital->name  = $request->name;
        $hospital->email  = $request->email;
        $hospital->phone  = $request->phone;
        $hospital->address  = $request->address;
        $hospital->latitude  = $request->latitude;
        $hospital->longitude  = $request->longitude;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $hospital->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $hospital->image = $images[0];
                $hospital->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $hospital->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $hospital->image = $images[0];
                $hospital->image_path = $images[1];
            }
        }
        $saved = $hospital->save();
        if ($saved) {
            return redirect()->route('hospital.index')->with('success', 'Hospital Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hospital $hospital)
    {
        //
    }
}
