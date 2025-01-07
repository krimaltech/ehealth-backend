<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
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
        $employee = Employee::where('employee_id', Auth::user()->id)->with('user.subroles', 'user.kyc')->first();
        return view('admin.employee.index', compact('employee'));
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
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $employee_types = EmployeeType::all();
        $employee = Employee::where('slug', $slug)->first();
        $departments = Department::all();
        return view('admin.employee.edit', compact('employee_types', 'employee', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        if (Auth::user()->subrole == 6) {
            $request->validate([
                'nmc_no' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'image' => 'mimes:jpg,jpeg,png',
                'signature' => 'mimes:jpg,jpeg,png',
            ]);
            $employee = Employee::where('slug', $slug)->first();
            $employee->nmc_no = $request->nmc_no;
            $employee->salutation = $request->salutation;
            $employee->gender = $request->gender;
            $employee->address = $request->address;
            $employee->department = $request->department;
            $employee->qualification = $request->qualification;
            $employee->year_practiced = $request->year_practiced;
            $employee->specialization = $request->specialization;
            if (env('STORAGE_TYPE') == 'native') {
                if ($request->hasFile('image')) {
                    $destination = 'public/images/' . $employee->image;
                    if (Storage::exists($destination)) {
                        Storage::delete($destination);
                    };
                    $images = storeImageLaravel($request, 'image', 'image_path');
                    $employee->image = $images[0];
                    $employee->image_path = $images[1];
                }

                if ($request->hasFile('file')) {
                    $destination1 = 'public/images/' . $employee->file;
                    if (Storage::exists($destination1)) {
                        Storage::delete($destination1);
                    };
                    $images1 = storeImageLaravel($request, 'file', 'file_path');
                    $employee->file = $images1[0];
                    $employee->file_path = $images1[1];
                }

                if ($request->hasFile('signature')) {
                    $destination2 = 'public/images/' . $employee->signature;
                    if (Storage::exists($destination2)) {
                        Storage::delete($destination2);
                    };
                    $images2 = storeImageLaravel($request, 'signature', 'signature_path');
                    $employee->signature = $images2[0];
                    $employee->signature_path = $images2[1];
                }
            } else {
                if ($request->hasFile('image')) {
                    $destination = 'images/' . $employee->image;
                    Storage::disk('minio')->delete($destination);
                    $images = storeImageStorage($request, 'image', 'image_path');
                    $employee->image = $images[0];
                    $employee->image_path = $images[1];
                }

                if ($request->hasFile('file')) {
                    $destination1 = 'images/' . $employee->file;
                    Storage::disk('minio')->delete($destination1);
                    $images1 = storeImageStorage($request, 'file', 'file_path');
                    $employee->file = $images1[0];
                    $employee->file_path = $images1[1];
                }

                if ($request->hasFile('signature')) {
                    $destination2 = 'images/' . $employee->signature;
                    Storage::disk('minio')->delete($destination2);
                    $images2 = storeImageStorage($request, 'signature', 'signature_path');
                    $employee->signature = $images2[0];
                    $employee->signature_path = $images2[1];
                }

                
            }

            $name = str_replace(' ', '-', $request->name);
            $employee->slug =  'employee-' . $name . '-' . $this->random;
            $saved = $employee->save();
            if ($saved) {
                $user = User::where('id', $employee->employee_id)->first();
                $user->first_name = $request->first_name;
                $user->middle_name = $request->middle_name;
                $user->last_name = $request->last_name;
                $user->name = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;
                $user->update();
            }
        } elseif (Auth::user()->subrole == 7) {
            $request->validate([
                'nnc_no' => 'required',
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'image' => 'mimes:jpg,jpeg,png',
                'signature' => 'mimes:jpg,jpeg,png',
            ]);
            $employee = Employee::where('slug', $slug)->first();
            $employee->nnc_no = $request->nnc_no;
            $employee->gender = $request->gender;
            $employee->address = $request->address;
            $employee->qualification = $request->qualification;
            $employee->year_practiced = $request->year_practiced;
            if (env('STORAGE_TYPE') == 'native') {
                if ($request->hasFile('image')) {
                    $destination = 'public/images/' . $employee->image;
                    if (Storage::exists($destination)) {
                        Storage::delete($destination);
                    };
                    $images = storeImageLaravel($request, 'image', 'image_path');
                    $employee->image = $images[0];
                    $employee->image_path = $images[1];
                }

                if ($request->hasFile('file')) {
                    $destination1 = 'public/images/' . $employee->file;
                    if (Storage::exists($destination1)) {
                        Storage::delete($destination1);
                    };
                    $images1 = storeImageLaravel($request, 'file', 'file_path');
                    $employee->file = $images1[0];
                    $employee->file_path = $images1[1];
                }

                if ($request->hasFile('signature')) {
                    $destination2 = 'public/images/' . $employee->signature;
                    if (Storage::exists($destination2)) {
                        Storage::delete($destination2);
                    };
                    $images2 = storeImageLaravel($request, 'signature', 'signature_path');
                    $employee->signature = $images2[0];
                    $employee->signature_path = $images2[1];
                }
            } else {
                if ($request->hasFile('image')) {
                    $destination = 'images/' . $employee->image;
                    Storage::disk('minio')->delete($destination);
                    $images = storeImageStorage($request, 'image', 'image_path');
                    $employee->image = $images[0];
                    $employee->image_path = $images[1];
                }

                if ($request->hasFile('file')) {
                    $destination1 = 'images/' . $employee->file;
                    Storage::disk('minio')->delete($destination1);
                    $images1 = storeImageStorage($request, 'file', 'file_path');
                    $employee->file = $images1[0];
                    $employee->file_path = $images1[1];
                }

                if ($request->hasFile('signature')) {
                    $destination2 = 'images/' . $employee->signature;
                    Storage::disk('minio')->delete($destination2);
                    $images2 = storeImageStorage($request, 'signature', 'signature_path');
                    $employee->signature = $images2[0];
                    $employee->signature_path = $images2[1];
                }
            }
            $name = str_replace(' ', '-', $request->name);
            $employee->slug =  'employee-' . $name . '-' . $this->random;
            $saved = $employee->save();
            if ($saved) {
                $user = User::where('id', $employee->employee_id)->first();
                $user->first_name = $request->first_name;
                $user->middle_name = $request->middle_name;
                $user->last_name = $request->last_name;
                $user->name = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;
                $user->update();
            }
        } else {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required',
                'phone' => 'required',
                'gender' => 'required',
                'address' => 'required',
                'image' => 'mimes:jpg,jpeg,png',
                'signature' => 'mimes:jpg,jpeg,png',
            ]);
            $employee = Employee::where('slug', $slug)->first();
            $employee->gender = $request->gender;
            $employee->address = $request->address;
            if (env('STORAGE_TYPE') == 'native') {
                if ($request->hasFile('image')) {
                    $destination = 'public/images/' . $employee->image;
                    if (Storage::exists($destination)) {
                        Storage::delete($destination);
                    };
                    $images = storeImageLaravel($request, 'image', 'image_path');
                    $employee->image = $images[0];
                    $employee->image_path = $images[1];
                }

                if ($request->hasFile('file')) {
                    $destination1 = 'public/images/' . $employee->file;
                    if (Storage::exists($destination1)) {
                        Storage::delete($destination1);
                    };
                    $images1 = storeImageLaravel($request, 'file', 'file_path');
                    $employee->file = $images1[0];
                    $employee->file_path = $images1[1];
                }

                if(Auth::user()->subrole == 18){
                    if ($request->hasFile('signature')) {
                        $destination2 = 'public/images/' . $employee->signature;
                        if (Storage::exists($destination2)) {
                            Storage::delete($destination2);
                        };
                        $images2 = storeImageLaravel($request, 'signature', 'signature_path');
                        $employee->signature = $images2[0];
                        $employee->signature_path = $images2[1];
                    }
                }
            } else {
                if ($request->hasFile('image')) {
                    $destination = 'images/' . $employee->image;
                    Storage::disk('minio')->delete($destination);
                    $images = storeImageStorage($request, 'image', 'image_path');
                    $employee->image = $images[0];
                    $employee->image_path = $images[1];
                }

                if ($request->hasFile('file')) {
                    $destination1 = 'images/' . $employee->file;
                    Storage::disk('minio')->delete($destination1);
                    $images1 = storeImageStorage($request, 'file', 'file_path');
                    $employee->file = $images1[0];
                    $employee->file_path = $images1[1];
                }

                if(Auth::user()->subrole == 18){
                    if ($request->hasFile('signature')) {
                        $destination2 = 'images/' . $employee->signature;
                        Storage::disk('minio')->delete($destination2);
                        $images2 = storeImageStorage($request, 'signature', 'signature_path');
                        $employee->signature = $images2[0];
                        $employee->signature_path = $images2[1];
                    }
                }
            }
            $name = str_replace(' ', '-', $request->name);
            $employee->slug =  'employee-' . $name . '-' . $this->random;
            $saved = $employee->save();
        }
        if ($saved) {
            $user = User::where('id', $employee->employee_id)->first();
            $user->first_name = $request->first_name;
            $user->middle_name = $request->middle_name;
            $user->last_name = $request->last_name;
            $user->name = $request->first_name . ' ' . $request->middle_name . ' ' . $request->last_name;
            $user->update();
        }
        if ($saved) {
            return redirect()->route('employee.index')->with('success', 'employee Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
    }
}
