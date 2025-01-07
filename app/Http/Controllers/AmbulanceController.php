<?php

namespace App\Http\Controllers;

use App\Models\Ambulance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AmbulanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("27"))) {
            $ambulance = Ambulance::all();
            return view('admin.ambulance.index',compact('ambulance'));
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
        if (Gate::any(checkPermission("27"))) {
            return view('admin.ambulance.create');
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
            'title' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'price' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $ambulance = new Ambulance();
        $ambulance->title = $request->title;
        $ambulance->phone = $request->phone;
        $ambulance->address = $request->address;
        $ambulance->price = $request->price;
        $ambulance->latitude = $request->latitude;
        $ambulance->longitude = $request->longitude;
        $saved = $ambulance->save();
        if($saved){
            return redirect()->route('ambulance.index')->with('success','Ambulance Added Successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ambulance  $ambulance
     * @return \Illuminate\Http\Response
     */
    public function show(Ambulance $ambulance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ambulance  $ambulance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::any(checkPermission("27"))) {
            $ambulance = Ambulance::find($id);
            return view('admin.ambulance.edit',compact('ambulance'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ambulance  $ambulance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'price' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        $ambulance = Ambulance::find($id);
        $ambulance->title = $request->title;
        $ambulance->phone = $request->phone;
        $ambulance->address = $request->address;
        $ambulance->price = $request->price;
        $ambulance->latitude = $request->latitude;
        $ambulance->longitude = $request->longitude;
        $updated = $ambulance->save();
        if($updated){
            return redirect()->route('ambulance.index')->with('success','Ambulance Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ambulance  $ambulance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ambulance $ambulance)
    {
        //
    }
}
