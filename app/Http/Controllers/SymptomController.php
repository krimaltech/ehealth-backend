<?php

namespace App\Http\Controllers;

use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class SymptomController extends Controller
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
        if (Gate::any(checkPermission("25"))) {
            $symptoms = Symptom::orderBy('id', 'desc')->get();
            return view('admin.symptom.index', compact('symptoms'));
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
        if (Gate::any(checkPermission("25"))) {
            return view('admin.symptom.create');
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
            'name' => 'required',
            'name_nepali' => 'required',
            'image' => 'required',
        ]);
        $symptom = new Symptom();
        $symptom->name = $request->name;
        $symptom->name_nepali = $request->name_nepali;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $symptom->image = $images[0];
                $symptom->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $symptom->image = $images[0];
                $symptom->image_path = $images[1];
            }
        }
        $saved  = $symptom->save();


        if ($saved) {
            return redirect()->route('symptom.index')->with('success', 'Symptom Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function show(Symptom $symptom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Gate::any(checkPermission("25"))) {
            $symptom = Symptom::find($id);
            return view('admin.symptom.edit', compact('symptom'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required',
            'name_nepali' => 'required',
        ]);
        $symptom =  Symptom::find($id);
        $symptom->name = $request->name;
        $symptom->name_nepali = $request->name_nepali;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $symptom->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $symptom->image = $images[0];
                $symptom->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $symptom->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $symptom->image = $images[0];
                $symptom->image_path = $images[1];
            }
        }
        $saved  = $symptom->save();


        if ($saved) {
            return redirect()->route('symptom.index')->with('success', 'Symptom Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Symptom  $symptom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::any(checkPermission("25"))) {
            $symptom = Symptom::find($id);
            $delete = $symptom->delete();

            if ($delete) {
                return redirect()->route('symptom.index')->with('success', 'Symptom Deleted Successfully');
            }
        } else {
            return view('viewnotfound');
        }
    }
}
