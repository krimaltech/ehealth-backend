<?php

namespace App\Http\Controllers;

use App\Models\FitnessPricing;
use App\Models\FitnessType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FitnessPricingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('Fitness')) {
            $pricing = FitnessPricing::with('fitnesstype')->get();
            return view('admin.fitnessprice.index',compact('pricing'));
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
            $type = FitnessType::all();
            return view('admin.fitnessprice.create',compact('type'));
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
                'fitness_name_id' => 'required',
                'one_month' => 'required',
                'three_month' => 'required',
                'six_month' => 'required',
                'one_year' => 'required',
            ]);
            $pricing = new FitnessPricing();
            $pricing->vendor_id = auth()->user()->id;
            $pricing->fitness_name_id = $request->fitness_name_id;
            $pricing->one_month = $request->one_month;
            $pricing->three_month = $request->three_month;
            $pricing->six_month = $request->six_month;
            $pricing->one_year = $request->one_year;
            $saved = $pricing->save();
            if ($saved) {
                return redirect()->route('fitness-price.index')->with('success', 'Fitness Type Added Successfully.');
            }
        } else {

            return view('viewnotfound');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FitnessPricing  $fitnessPricing
     * @return \Illuminate\Http\Response
     */
    public function show(FitnessPricing $fitnessPricing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FitnessPricing  $fitnessPricing
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::allows('Fitness')) {
            $type = FitnessType::all();
            $pricing = FitnessPricing::findOrFail($id);
            return view('admin.fitnessprice.edit',compact('pricing','type'));
        } else {

            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FitnessPricing  $fitnessPricing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::allows('Fitness')) {
            $request->validate([
                'fitness_name_id' => 'required',
                'one_month' => 'required',
                'three_month' => 'required',
                'six_month' => 'required',
                'one_year' => 'required',
            ]);
            $pricing = FitnessPricing::findOrFail($id);
            $pricing->fitness_name_id = $request->fitness_name_id;
            $pricing->one_month = $request->one_month;
            $pricing->three_month = $request->three_month;
            $pricing->six_month = $request->six_month;
            $pricing->one_year = $request->one_year;
            $saved = $pricing->save();
            if ($saved) {
                return redirect()->route('fitness-price.index')->with('success', 'Fitness Type Updated Successfully.');
            }
        } else {

            return view('viewnotfound');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FitnessPricing  $fitnessPricing
     * @return \Illuminate\Http\Response
     */
    public function destroy(FitnessPricing $fitnessPricing)
    {
        //
    }
}
