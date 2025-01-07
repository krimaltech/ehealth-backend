<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\CompanyDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Gate::any(checkPermission("14"))) {
            $about = CompanyDetails::first();
            return view('admin.about.index',compact('about'));
        }
        else {
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
         if (Gate::any(checkPermission("14"))) {
            return view('admin.about.create');
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
        $request->validate([
            'what_we_do' => 'required',
            'mission' => 'required',
            'goal' => 'required',
            'tagline' => 'required',
            'vision' => 'required',
            'objective' => 'required',
        ]);

        $about = CompanyDetails::first();
        $about->what_we_do = $request->what_we_do;
        $about->mission = $request->mission;
        $about->goal = $request->goal;
        $about->tagline = $request->tagline;
        $about->vision = $request->vision;
        $about->objective = $request->objective;
        $saved = $about->save();
        if($saved){
            return redirect()->route('about.index')->with('success','About Details Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         if (Gate::any(checkPermission("14"))) {
            $about = CompanyDetails::find($id);
            return view('admin.about.edit',compact('about'));
        }
        else {
            return view('viewnotfound');
        }   

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'what_we_do' => 'required',
            'mission' => 'required',
            'goal' => 'required',
            'tagline' => 'required',
            'vision' => 'required',
            'objective' => 'required',
        ]);

        $about = CompanyDetails::find($id);
        $about->what_we_do = $request->what_we_do;
        $about->mission = $request->mission;
        $about->goal = $request->goal;
        $about->tagline = $request->tagline;
        $about->vision = $request->vision;
        $about->objective = $request->objective;
        $saved = $about->save();
        if($saved){
            return redirect()->route('about.index')->with('success','About Details Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\About  $about
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
