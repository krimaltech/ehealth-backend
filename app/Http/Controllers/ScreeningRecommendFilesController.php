<?php

namespace App\Http\Controllers;

use App\Models\ScreeningRecommendFiles;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ScreeningRecommendFilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $screeningRecommendFiles = ScreeningRecommendFiles::all();
        return view('admin.screeningrecommendfiles.index',compact('screeningRecommendFiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.screeningrecommendfiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->file('image') as $images) {
            $screeningRecommendFiles = new ScreeningRecommendFiles();
            $screeningRecommendFiles->category = $request->category;
            $screeningRecommendFiles->title = $request->title;
            $fileNameExt = $images->getClientOriginalName();
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            $fileExt = $images->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            $images->storeAs('public/images', $fileNameToStore);
            $pathToStore =  asset('storage/images/' . $fileNameToStore);
            $screeningRecommendFiles->image_path = $pathToStore;
            $screeningRecommendFiles->image = $fileNameToStore;
            $screeningRecommendFiles->save();
        }
        return redirect()->route('screening-recommend-files.index')->with('success','Files Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ScreeningRecommendFiles  $screeningRecommendFiles
     * @return \Illuminate\Http\Response
     */
    public function show(ScreeningRecommendFiles $screeningRecommendFiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ScreeningRecommendFiles  $screeningRecommendFiles
     * @return \Illuminate\Http\Response
     */
    public function edit(ScreeningRecommendFiles $screeningRecommendFiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ScreeningRecommendFiles  $screeningRecommendFiles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ScreeningRecommendFiles $screeningRecommendFiles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ScreeningRecommendFiles  $screeningRecommendFiles
     * @return \Illuminate\Http\Response
     */
    public function destroy(ScreeningRecommendFiles $screeningRecommendFiles)
    {
        //
    }
}
