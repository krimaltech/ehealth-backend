<?php

namespace App\Http\Controllers;

use App\Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Helper;

class DetailController extends Controller
{
    private $path = 'public/images/';

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456hdgafshgdfahaiudvfgybsauydgafueGFHFVDAHSFH"), 0, 5);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = Detail::get();
        return view('admin.detail.index', compact('details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Detail::count() > 0) {
            return redirect()->route('detail.index');
        }
        return view('admin.detail.create');
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
            'title_en' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);
        $detail = new Detail;
        $detail->user_id = Auth::user()->id;
        foreach (Helper::languageAll() as $language) {
            $detail->{"title_" . $language->code} = $request->{"title_" . $language->code};
            $detail->{"description_" . $language->code} = $request->{"description_" . $language->code};
            $detail->{"address_" . $language->code} = $request->{"address_" . $language->code};
        }
        $detail->phone = $request->phone;
        $detail->email = $request->email;
        $detail->darta_no = $request->darta_no;
        $detail->facebook = $request->facebook;
        $detail->youtube = $request->youtube;
        $detail->instagram = $request->instagram;
        $detail->twitter = $request->twitter;
        if ($request->hasFile('image')) {
            $destination = 'public/images/' . $detail->image;
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            $request->file('image')->storeAs('public/images', $fileNameToStore);
            $pathToStore =  asset('storage/images/' . $fileNameToStore);
            $detail->image_path = $pathToStore;
            $detail->image = $fileNameToStore;
        }

        $detail->save();
        return redirect()->route('detail.index')->with('success', 'News Portal detail added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        return redirect()->route('detail.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        return view('admin.detail.create', compact('detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        $request->validate([
            'title_en' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
        ]);
        foreach (Helper::languageAll() as $language) {
            $detail->{"title_" . $language->code} = $request->{"title_" . $language->code};
            $detail->{"description_" . $language->code} = $request->{"description_" . $language->code};
            $detail->{"address_" . $language->code} = $request->{"address_" . $language->code};
        }
        $detail->phone = $request->phone;
        $detail->email = $request->email;
        $detail->darta_no = $request->darta_no;
        $detail->facebook = $request->facebook;
        $detail->youtube = $request->youtube;
        $detail->instagram = $request->instagram;
        $detail->twitter = $request->twitter;
        if ($request->image) {
            $oldImage = $this->path . $detail->image;
            if (Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
            $imageName = $this->random . '_' . $request->image->getClientOriginalName();
            $uploadFile = $request->file('image')->storeAs($this->path, $imageName);
            $detail->image = $imageName;
        }

        $detail->update();
        return redirect()->route('detail.index')->with('success', 'News Portal detail updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        $oldImage = $this->path . $detail->image;
        if (Storage::exists($oldImage)) {
            Storage::delete($oldImage);
        }
        $detail->delete();
        return redirect()->route('detail.index')->with('success', 'Company detail deleted successfully');
    }
}
