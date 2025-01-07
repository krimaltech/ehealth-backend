<?php

namespace App\Http\Controllers;

use App\Models\CompanyDetails;
use App\Models\ContactInformation;
use Illuminate\Http\Request;
use Illuminate\Routing\RedirectController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CompanyDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("14"))) {
            $details = CompanyDetails::first();
            return view('admin.companydetails.index', compact('details'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyDetails  $companyDetails
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $details = CompanyDetails::find($id);
        return view('admin.companydetails.view', compact('details'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyDetails  $companyDetails
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::any(checkPermission("14"))) {
            $details = CompanyDetails::find($id);
            return view('admin.companydetails.edit', compact('details'));
        } else {

            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyDetails  $companyDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone_no' => 'required',
            'email' => 'required',
            'address' => 'required',
            'website' => 'required',
            'facebook' => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'youtube' => 'nullable|url',
            'twitter' => 'nullable|url',
            'tiktok' => 'nullable|url',
        ]);
        $details = CompanyDetails::find($id);
        $details->name = $request->name;
        $details->phone_no = $request->phone_no;
        $details->email = $request->email;
        $details->address = $request->address;
        $details->facebook = $request->facebook;
        $details->website = $request->website;
        $details->latitude = $request->latitude;
        $details->longitude = $request->longitude;
        $details->instagram = $request->instagram;
        $details->linkedin = $request->linkedin;
        $details->youtube = $request->youtube;
        $details->twitter = $request->twitter;
        $details->tiktok = $request->tiktok;
        $saved = $details->save();
        if ($saved) {
            return redirect()->route('details.index')->with('success', 'Company Details Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyDetails  $companyDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyDetails $companyDetails)
    {
        //
    }

    public function upload(Request $request, $id)
    {
        $request->validate([
            'brochure' => 'required|mimes:pdf'
        ]);
        $details = CompanyDetails::find($id);
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('brochure')) {
            $images = storeImageLaravel($request, 'brochure', 'brochure_path');
            $details->brochure = $images[0];
            $details->brochure_path = $images[1];
            }
        } else {
            if ($request->hasFile('brochure')) {
            $images = storeImageStorage($request, 'brochure', 'brochure_path');
            $details->brochure = $images[0];
            $details->brochure_path = $images[1];
            }
        }
        $saved = $details->save();
        if ($saved) {
            return redirect()->back()->with('success', 'e-Brochure Uploaded Successfully');
        }
    }

    public function information()
    {
        if (Gate::any(checkPermission("14"))) {
            $contact = ContactInformation::all();
            return view('admin.companydetails.information', compact('contact'));
        } else {

            return view('viewnotfound');
        }
    }
}
