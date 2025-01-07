<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(['Superadmin', 'Vendor'])) {
            $tags = Tags::all();
            return view('admin.tags.index', compact('tags'));
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
        if (Gate::any(['Superadmin', 'Vendor'])) {
            return view('admin.tags.create');
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
            'tag_name' => 'required',
        ]);
        $tags = new Tags();
        $tags->tag_name = $request->tag_name;
        $tags->save();
        return redirect()->route('tags.index')->with('success', 'Tag Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function show(Tags $tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function edit(Tags $tags, $id)
    {
        if (Gate::any(['Superadmin', 'Vendor'])) {
            $tags = Tags::findOrFail($id);
            return view('admin.tags.edit', compact('tags'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tag_name' => 'required',
        ]);
        $tags = Tags::findOrFail($id);
        $tags->tag_name = $request->tag_name;
        $tags->save();
        return redirect()->route('tags.index')->with('success', 'Tag Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tags  $tags
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tags $tags)
    {
        $tags->delete();
        return redirect()->route('tags.index')->with('success', 'Tag Deleted Successfully');
    }
}