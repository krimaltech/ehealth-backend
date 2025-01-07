<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("14"))) {
            $enquiry = Enquiry::all();
            return view('admin.enquiry.index',compact('enquiry'));
        }
        else {
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
        if (Gate::any(checkPermission("14"))) {
            $request->validate([
                'form_link' => 'required'
            ]);

            $enquiry = new Enquiry();
            $enquiry->form_link = $request->form_link;
            $saved = $enquiry->save();
            if($saved){
                return redirect()->back()->with('success','Enquiry Link Added Successfully.');
            }
        }
        else {
            return view('viewnotfound');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enquiry  $enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::any(checkPermission("14"))) {
            $request->validate([
                'form_link' => 'required'
            ]);

            $enquiry = Enquiry::find($id);
            $enquiry->form_link = $request->form_link;
            $updated = $enquiry->update();
            if($updated){
                return redirect()->back()->with('success','Enquiry Link Updated Successfully.');
            }
        }
        else {
            return view('viewnotfound');
        }
    }

}
