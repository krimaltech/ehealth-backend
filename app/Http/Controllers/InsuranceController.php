<?php

namespace App\Http\Controllers;

use App\Models\Insurance;
use App\Models\InsuranceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InsuranceController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("26"))) {
            $insurance = Insurance::first();
            return view('admin.latestInsurance.insurance.index', compact('insurance'));
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
        if (Gate::any(checkPermission("26"))) {
            return view('admin.latestInsurance.insurance.create');
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
            'company_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $insurance = new Insurance();
        $insurance->company_name = $request->company_name;
        $insurance->address = $request->address;
        $insurance->phone = $request->phone;       
        $name = str_replace(' ', '-', $insurance->company_name);
        $insurance->slug = 'insurance-' . $name . '-' . $this->random;
        $saved = $insurance->save();
        if ($saved) {
            return redirect()->route('insurance.index')->with('success', 'Insurance Added Successfully');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if (Gate::any(checkPermission("26"))) {
            $insurance = Insurance::where('slug', $slug)->first();
            return view('admin.latestInsurance.insurance.edit', compact('insurance'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'company_name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $insurance = Insurance::where('slug', $slug)->first();
        $insurance->company_name = $request->company_name;
        $insurance->address = $request->address;
        $insurance->phone = $request->phone;       
        $name = str_replace(' ', '-', $insurance->company_name);
        $insurance->slug = 'insurance-' . $name . '-' . $this->random;
        $saved = $insurance->update();
        if ($saved) {
            return redirect()->route('insurance.index')->with('success', 'Insurance Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Insurance  $insurance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insurance $insurance)
    {
        //
    }
}
