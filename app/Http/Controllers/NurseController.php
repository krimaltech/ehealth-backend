<?php

namespace App\Http\Controllers;

use App\Models\Hospital;
use App\Models\Nurse;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class NurseController extends Controller
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
        if (Gate::allows('Nurse')) {
            $nurse = Nurse::where('nurse_id', Auth::user()->id)->with('user.kyc')->first();
            // return $nurse;
            return view('admin.nurse.index', compact('nurse'));
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
        // return $request->user()->id;
        $request->validate([
            'nnc_no' => 'required',
            // 'nurse_id' => 'required|nurse_id|unique:nurses,nurse_id,',
            'gender' => 'required',
            'qualification' => 'required',
            'year_practiced' => 'required',
            'address' => 'required',
            // 'fee' => 'required',
        ]);
        $nurse = new Nurse();
        $nurse->nnc_no = $request->nnc_no;
        $nurse->nurse_id = $request->user()->id;
        $nurse->gender = $request->gender;
        $nurse->qualification = $request->qualification;
        $nurse->year_practiced = $request->year_practiced;
        $nurse->address = $request->address;
        $nurse->fee = $request->fee;
        $nurse->latitude = $request->latitude;
        $nurse->longitude = $request->longitude;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $nurse->image = $images[0];
                $nurse->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $nurse->image = $images[0];
                $nurse->image_path = $images[1];
            }
        }
        $nurse->slug =  'nurse-' . '-' . $this->random;
        $saved = $nurse->save();


        return redirect()->route('home')->with('success', 'Profile Updated Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function show(Nurse $nurse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if (Gate::allows('Nurse')) {
            $nurse = Nurse::where('slug', $slug)->first();
            return view('admin.nurse.edit', compact('nurse'));
        } else {
            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'nnc_no' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'gender' => 'required',
            'qualification' => 'required',
            'year_practiced' => 'required',
            'address' => 'required',
            'fee' => 'required',
        ]);
        $nurse = Nurse::where('slug', $slug)->first();
        $nurse->nnc_no = $request->nnc_no;
        $nurse->gender = $request->gender;
        $nurse->qualification = $request->qualification;
        $nurse->year_practiced = $request->year_practiced;
        $nurse->address = $request->address;
        $nurse->fee = $request->fee;
        $nurse->latitude = $request->latitude;
        $nurse->longitude = $request->longitude;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $nurse->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $nurse->image = $images[0];
                $nurse->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $nurse->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $nurse->image = $images[0];
                $nurse->image_path = $images[1];
            }
        }
        $name = str_replace(' ', '-', $request->name);
        $nurse->slug =  'nurse-' . $name . '-' . $this->random;
        $saved = $nurse->save();

        $user = User::find($nurse->nurse_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $saved = $user->save();
        if ($saved) {
            return redirect()->route('nurse.index')->with('success', 'Profile Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nurse  $nurse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nurse $nurse)
    {
        //
    }
}
