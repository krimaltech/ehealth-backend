<?php

namespace App\Http\Controllers;

use App\Models\MedicalSupport;
use Illuminate\Http\Request;

class MedicalSupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicalSupport = MedicalSupport::all();
        return view('admin.medicalsupport.index',compact('medicalSupport'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.medicalsupport.create');
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
            'price' => 'required',
        ]);
        $medicalSupport = new MedicalSupport();
        $medicalSupport->title  = $request->title;
        $medicalSupport->price  = $request->price;
        $saved = $medicalSupport->save();
        if($saved){
            return redirect()->route('medicalsupport.index')->with('success','Medical Support Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicalSupport  $medicalSupport
     * @return \Illuminate\Http\Response
     */
    public function show(MedicalSupport $medicalSupport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MedicalSupport  $medicalSupport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medicalSupport = MedicalSupport::findOrFail($id);
        return view('admin.medicalsupport.edit',compact('medicalSupport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicalSupport  $medicalSupport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required',
        ]);
        $medicalSupport = MedicalSupport::findOrFail($id);
        $medicalSupport->title  = $request->title;
        $medicalSupport->price  = $request->price;
        $saved = $medicalSupport->save();
        if($saved){
            return redirect()->route('medical-support.index')->with('success','Medical Support Added Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicalSupport  $medicalSupport
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicalSupport $medicalSupport)
    {
        //
    }
}
