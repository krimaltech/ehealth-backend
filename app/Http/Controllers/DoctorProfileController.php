<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Hospital;
use App\Models\RoleUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class DoctorProfileController extends Controller
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
        if (Gate::allows('Doctor')) {
            $doctor = Doctor::where('doctor_id', Auth::user()->id)->with('user.kyc')->first();
            // return $doctor;
            $hospital = Hospital::find($doctor->hospital);
            return view('admin.doctorprofile.index', compact('doctor', 'hospital'));
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
        // return $request;
        $request->validate([
            'nmc_no' => 'required',
            // 'doctor_id' => 'required|doctor_id|unique:doctors,doctor_id,',
            'salutation' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'qualification' => 'required',
            'year_practiced' => 'required',
            'address' => 'required',
            'specialization' => 'required',
            // 'fee' => 'required',
        ]);
        $doctor = new Doctor();
        $doctor->nmc_no = $request->nmc_no;
        $doctor->doctor_id = auth()->user()->id;
        $doctor->salutation = $request->salutation;
        $doctor->gender = $request->gender;
        $doctor->department = $request->department;
        $doctor->qualification = $request->qualification;
        $doctor->year_practiced = $request->year_practiced;
        $doctor->address = $request->address;
        $doctor->specialization = $request->specialization;
        $doctor->fee = $request->fee;
        $doctor->latitude = $request->latitude;
        $doctor->longitude = $request->longitude;
        $doctor->hospital = $request->hospital;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $doctor->image = $images[0];
                $doctor->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $doctor->image = $images[0];
                $doctor->image_path = $images[1];
            }
        }
        $doctor->slug =  'doctor-' . '-' . $this->random;
        $doctor->save();
        return redirect()->route('home')->with('success', 'Profile Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        if (Gate::allows('Doctor')) {
            $doctor = Doctor::where('slug', $slug)->first();
            $departments = Department::all();
            $hospital = Hospital::all();
            return view('admin.doctorprofile.edit', compact('doctor', 'departments', 'hospital'));
        } else {

            return view('viewnotfound');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'nmc_no' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'salutation' => 'required',
            'gender' => 'required',
            'department' => 'required',
            'qualification' => 'required',
            'year_practiced' => 'required',
            'address' => 'required',
            'specialization' => 'required',
            'fee' => 'required',
        ]);
        $doctor = Doctor::where('slug', $slug)->first();
        $doctor->nmc_no = $request->nmc_no;
        $doctor->salutation = $request->salutation;
        $doctor->gender = $request->gender;
        $doctor->department = $request->department;
        $doctor->qualification = $request->qualification;
        $doctor->year_practiced = $request->year_practiced;
        $doctor->address = $request->address;
        $doctor->specialization = $request->specialization;
        $doctor->fee = $request->fee;
        $doctor->latitude = $request->latitude;
        $doctor->longitude = $request->longitude;
        $doctor->hospital = $request->hospital;
        if ($request->image) {
            if (env('STORAGE_TYPE') == 'native') {
                if ($request->hasFile('image')) {
                    $destination = 'public/images/' . $doctor->image;
                    if (Storage::exists($destination)) {
                        Storage::delete($destination);
                    };
                    $images = storeImageLaravel($request, 'image', 'image_path');
                    $doctor->image = $images[0];
                    $doctor->image_path = $images[1];
                }
            } else {
                if ($request->hasFile('image')) {
                    $destination = 'images/' . $doctor->image;
                    Storage::disk('minio')->delete($destination);
                    $images = storeImageStorage($request, 'image', 'image_path');
                    $doctor->image = $images[0];
                    $doctor->image_path = $images[1];
                }
            }
        }
        $saved = $doctor->save();

        // $user = User::find($doctor->doctor_id);
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->phone = $request->phone;
        // $saved = $user->save();
        if ($saved) {
            return redirect()->route('doctorprofile.index')->with('success', 'Profile Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
