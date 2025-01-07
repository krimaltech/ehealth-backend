<?php

namespace App\Http\Controllers;

use App\Models\TeamCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TeamCategoryController extends Controller
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
         if (Gate::any(['Superadmin','Admin'])) {
            $category = TeamCategory::all();
            return view('admin.teamcategory.index',compact('category'));
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
         if (Gate::any(['Superadmin','Admin'])) {
            return view('admin.teamcategory.create');
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
            'category_name' => 'required'
        ]);
        $category = new TeamCategory();
        $category->category_name = $request->category_name;
        $name = str_replace(' ', '-', $request->category_name);
        $category_name = str_replace('/', '-', $name);
        $category->slug = $category_name.'-'.$this->random;
        $saved = $category->save();
        if($saved){
            return redirect()->route('teamcategory.index')->with('success','Team Category Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeamCategory  $teamCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TeamCategory $teamCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeamCategory  $teamCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
         if (Gate::any(['Superadmin','Admin'])) {
            $category = TeamCategory::where('slug',$slug)->first();
            return view('admin.teamcategory.edit',compact('category'));
        }
        else {
            return view('viewnotfound');
        }   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeamCategory  $teamCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'category_name' => 'required'
        ]);
        $category = TeamCategory::where('slug',$slug)->first();
        $category->category_name = $request->category_name;
        $name = str_replace(' ', '-', $request->category_name);
        $category_name = str_replace('/', '-', $name);
        $category->slug = $category_name.'-'.$this->random;
        $saved = $category->save();
        if($saved){
            return redirect()->route('teamcategory.index')->with('success','Team Category Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeamCategory  $teamCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamCategory $teamCategory)
    {
        //
    }
}
