<?php

namespace App\Http\Controllers;

use App\Models\FitnessType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FitnessTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('Fitness')) {
            $type = FitnessType::all();
            return view('admin.fitnesstype.index',compact('type'));
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
        if (Gate::allows('Fitness')) {
            return view('admin.fitnesstype.create');
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
        if (Gate::allows('Fitness')) {
            $request->validate([
                'fitness_name' => 'required',
            ]);
            $type = new FitnessType();
            $type->vendor_id = auth()->user()->id;
            $type->fitness_name = $request->fitness_name;
            $saved = $type->save();
            if ($saved) {
                return redirect()->route('fitnesstype.index')->with('success', 'Fitness Type Added Successfully.');
            }
        } else {

            return view('viewnotfound');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FitnessType  $fitnessType
     * @return \Illuminate\Http\Response
     */
    public function show(FitnessType $fitnessType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FitnessType  $fitnessType
     * @return \Illuminate\Http\Response
     */
    public function edit(FitnessType $fitnessType, $id)
    {
        if (Gate::allows('Fitness')) {
            $type = FitnessType::findOrFail($id);
            return view('admin.fitnesstype.edit',compact('type'));
        } else {

            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FitnessType  $fitnessType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::allows('Fitness')) {
            $request->validate([
                'fitness_name' => 'required',
            ]);
            $type = FitnessType::findOrFail($id);
            $type->fitness_name = $request->fitness_name;
            $saved = $type->save();
            if ($saved) {
                return redirect()->route('fitnesstype.index')->with('success', 'Fitness Type Added Successfully.');
            }
        } else {

            return view('viewnotfound');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FitnessType  $fitnessType
     * @return \Illuminate\Http\Response
     */
    public function destroy(FitnessType $fitnessType)
    {
        //
    }
}
