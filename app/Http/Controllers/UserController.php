<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Mail\EmployeeAccountVerification;
use App\Models\Doctor;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\EmployeeType;
use App\Models\Member;
use App\Models\Nurse;
use App\Models\RelationManager;
use App\Models\Role;
use App\Models\RoleUser;
use App\Models\SubRole;
use App\Models\User;
use App\Models\UserVerify;
use App\Models\Vendor;
use App\Models\VendorAgreement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
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
        if (Gate::any(['Superadmin', 'Admin', 'Employee'])) {
            $roles = Role::all();
            foreach (Auth::user()->roles as $key) {
                if ($key->id == 2) {
                    $users = User::orderBy('created_at', 'desc')->with(['roles', 'subroles', 'kyc'])->whereHas('roles', function ($query) {
                        $query->where('role_type', "Employee");
                    })->get();
                }
            }
            if (Auth::user()->subrole == 8) {
                $users = User::orderBy('created_at', 'desc')->with(['roles', 'subroles'])->where('subrole', 9)->get();
            }
            if (Auth::user()->subrole == 9) {
                $users = User::orderBy('created_at', 'desc')->with(['roles', 'subroles', 'kyc'])->where('subrole', 10)->get();
            }
            // if (Auth::user()->subrole == 10) {
            //     $users = User::with(['roles', 'subroles', 'kyc'])->where('subrole', 11)->get();
            // }
            // if (Auth::user()->subrole == 11) {
            //     $users = User::with(['roles', 'subroles', 'kyc'])->where('subrole', 12)->get();
            // }
            return view('admin.users.index', compact('roles', 'users'));
        } else {
            return view('viewnotfound');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userIndex()
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $roles = Role::all();
            foreach (Auth::user()->roles as $key) {
                if ($key->id == 2) {
                    $users = User::orderBy('created_at', 'desc')->with(['roles', 'subroles', 'kyc'])->whereHas('roles', function ($query) {
                        $query->where('role_type', "User");
                    })->get();
                    // return $users;
                }
            }
            return view('admin.users.users', compact('roles', 'users'));
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
        if (Gate::any(['Superadmin', 'Admin'])) {
            $employee_types =  EmployeeType::all();
            $subrole = SubRole::where('role_id', 3)->get();
            return view('admin.users.create', compact('employee_types', 'subrole'));
        } elseif (Gate::any(['Employee'])) {
            $employee_types =  EmployeeType::all();
            if (Auth::user()->subrole == 8) {
                $subrole = SubRole::where('role_id', 3)->where('id', 9)->get();
            }
            if (Auth::user()->subrole == 9) {
                $subrole = SubRole::where('role_id', 3)->where('id', 10)->get();
            }
            if (Auth::user()->subrole == 10) {
                $subrole = SubRole::where('role_id', 3)->where('id', 11)->get();
            }
            if (Auth::user()->subrole == 11) {
                $subrole = SubRole::where('role_id', 3)->where('id', 12)->get();
            }
            if (Auth::user()->subrole == 12) {
                $subrole = SubRole::where('role_id', 3)->where('id', 13)->get();
            }

            return view('admin.users.create', compact('employee_types', 'subrole'));
        } {

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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => [
                'required', 'string', 'min:8', 'confirmed',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/',
            ],
            'password_confirmation' => 'required',
            'subrole' => 'required',
            'employee_code' => 'unique:employees'
        ]);

        $user = new User();
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->name =  $request->first_name . ' ' . $request->middle_name . " " . $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password =  Hash::make($request->password);
        $user->subrole = $request->subrole;
        $user->is_verified = 0;
        $userSaved = $user->save();
        if ($userSaved) {
            $employee = new Employee();
            $employee->employee_id = $user->id;
            $employee->gd_id = "GD-" . $user->id;
            $employee->sub_role_id = $request->subrole;
            $employee->is_user = $request->is_user;
            $employee->percentage = 10;
            $employee->employee_code = $request->employee_code;
            $employee->head_employee_id = auth()->user()->id;
            $name = str_replace(' ', '-', $request->name);
            $employee->slug =  'employee-' . $name . '-' . $this->random;
            if (env('STORAGE_TYPE') == 'native') {
                if ($request->hasFile('image')) {
                    $images = storeImageLaravel($request, 'image', 'image_path');
                    $employee->image = $images[0];
                    $employee->image_path = $images[1];
                }
                if ($request->hasFile('file')) {
                    $images = storeImageLaravel($request, 'file', 'file_path');
                    $employee->file = $images[0];
                    $employee->file_path = $images[1];
                }
                if ($request->hasFile('nda_file')) {
                    $images = storeImageLaravel($request, 'nda_file', 'nda_file_path');
                    $employee->nda_file = $images[0];
                    $employee->nda_file_path = $images[1];
                }
            } else {
                if ($request->hasFile('image')) {
                    $images = storeImageStorage($request, 'image', 'image_path');
                    $employee->image = $images[0];
                    $employee->image_path = $images[1];
                }
                if ($request->hasFile('file')) {
                    $images = storeImageStorage($request, 'file', 'file_path');
                    $employee->file = $images[0];
                    $employee->file_path = $images[1];
                }
                if ($request->hasFile('nda_file')) {
                    $images = storeImageStorage($request, 'nda_file', 'nda_file_path');
                    $employee->nda_file = $images[0];
                    $employee->nda_file_path = $images[1];
                }
            }

            $EmployeeSaved = $employee->save();
        }
        $employee_code = Employee::where('employee_id', $user->id)->first();
        if ($request->subrole == 10) {
            $employee_code->employee_code = 'GD-MS' . '-' . $employee_code->id;
            $employee_code->save();
        }
        if ($EmployeeSaved) {
            $user_role = new RoleUser();
            $user_role->user_id = $user->id;
            $user_role->role_id = 3;
            $user_role->save();
        }
        $token = Str::random(64);

        UserVerify::create([
            'user_id' => $user->id,
            'token' => $token
        ]);
        // $company_profile = CompanyDetails::first();
        $maildata = [
            'token' => $token,
            'email' => $user->email,
            'password' => $request->password,
            // 'logo' => $company_profile->
        ];

        Mail::to($request->email)->send(new EmployeeAccountVerification($maildata));
        if ($EmployeeSaved) {
            return redirect()->route('users.index')->with('success', 'Employee User Added Successfully');
        }
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
    public function edit($id)
    {
        $user = User::find($id);
        // return $user;
        $employee = Employee::where('employee_id', $id)->first();
        // return $employee;
        $employee_types =  EmployeeType::all();
        $subrole = SubRole::where('role_id', 3)->get();
        return view('admin.users.edit', compact('employee_types', 'employee', 'user', 'subrole'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subrole' => 'required',
        ]);

        $user =  User::find($id);
        $user->first_name = $request->first_name;
        $user->middle_name = $request->middle_name;
        $user->last_name = $request->last_name;
        $user->name =  $request->first_name . ' ' . $request->middle_name . " " . $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $saved = $user->save();

        $employee =  Employee::where('employee_id', $id)->first();
        $employee->employee_id = $user->id;
        $employee->percentage = $request->percentage;
        $employee->employee_code = $request->employee_code;
        $saved = $employee->update();
        if ($saved) {
            return redirect()->route('users.index')->with('success', 'Employee User Updated Successfully');
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
        $user = User::find($id);
        $user->delete();
        return redirect()->route('users.index');
        return $id;
        return 'success';
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $user = DB::table('users')->where('id', $id)->first();
        $status = $user->is_verified == 1 ? 0 : 1;

        $changeStockStatus = DB::table('users')->where('id', $id)
            ->update(['is_verified' => $status]);
        if ($changeStockStatus) {
            return response()->json(['id' => $id, 'value' => $status]);
        }
    }

    public function calorie()
    {
        if (Gate::allows('User')) {
            $member = Member::where('member_id', Auth::user()->id)->first();
            $age = '';
            if ($member->dob != null) {
                $age = Carbon::now()->format('Y') - substr($member->dob, 0, 4);
            }
            return view('admin.idealhealth.calorie', compact('member', 'age'));
        } else {
            return view('viewnotfound');
        }
    }

    public function calculateCalorie(Request $request)
    {
        $request->validate([
            'gender' => 'required',
            'age' => 'required',
            'weight' => 'required',
            'height' => 'required',
            'activity' => 'required',
        ]);
        $gender = $request->gender;
        $age = $request->age;
        $weight = $request->weight;
        $height = $request->height * 100;
        $activity = $request->activity;

        if ($gender == 'Male') {
            $bmr = 10 * $weight + 6.25 * $height - 5 * $age + 5;
        }
        if ($gender == 'Female') {
            $bmr = 10 * $weight + 6.25 * $height - 5 * $age - 161;
        }

        if ($activity == 'Sedentary') {
            $calories = $bmr * 1.2;
        } elseif ($activity == 'Lightly active') {
            $calories = $bmr *  1.4;
        } elseif ($activity == 'Moderately active') {
            $calories = $bmr *  1.6;
        } elseif ($activity == 'Very active') {
            $calories = $bmr *  1.75;
        } elseif ($activity == 'Extra active') {
            $calories = $bmr *  2;
        } elseif ($activity == 'Professional athlete') {
            $calories = $bmr *  2.4;
        }
        return response()->json($calories);
    }
    public function doctorDetail()
    {
        if (Gate::any(checkPermission("3"))) {
            $doctor = Doctor::orderBy('created_at', 'desc')->get();
            return view('admin.users.doctordetail', compact('doctor'));
        } else {
            return view('viewnotfound');
        }
    }


    public function nursedetails()
    {
        if (Gate::any(checkPermission("5"))) {

            $nurses = Nurse::orderBy('created_at', 'desc')->get();
            return view('admin.users.nursedetails', compact('nurses'));
        } else {
            return view('viewnotfound');
        }
    }

    public function driverdetails()
    {
        if (Gate::any(checkPermission("6"))) {

            $drivers = Driver::orderBy('created_at', 'desc')->get();
            return view('admin.users.driverdetails', compact('drivers'));
        } else {
            return view('viewnotfound');
        }
    }

    public function relationManagerDetails()
    {
        if (Gate::any(checkPermission("13"))) {
            $check_employees = Employee::where('employee_id', auth()->user()->id)->first();
            if ($check_employees) {
                $employees = Employee::where('sub_role_id', 10)->get();
                $relation_manager = RelationManager::orderBy('created_at', 'desc')->with('employee_code:id,employee_code')->where('marketing_supervisor_id', $check_employees->id)->get();
            } else {
                $employees = Employee::where('sub_role_id', 10)->get();
                $relation_manager = RelationManager::orderBy('created_at', 'desc')->with('employee_code:id,employee_code')->get();
            }
            return view('admin.users.relationmanagerdetail', compact('relation_manager', 'employees'));
        } else {
            return view('viewnotfound');
        }
    }
    public function addMsCode(Request $request, $id)
    {
        if (Gate::any(checkPermission("13"))) {
            $relation_manager = RelationManager::findOrFail($id);
            $relation_manager->marketing_supervisor_id = $request->marketing_supervisor_id;
            $relation_manager->update();
            return redirect()->back()->with('success', 'MS CODE Successfully added');
        } else {
            return view('viewnotfound');
        }
    }

    public function roleupdate($role, $id)
    {
        if (Gate::any(checkPermission("13"))) {
            if (Helper::role_count($id) == 2) {
                $user_role = RoleUser::where('user_id', $id)->with('roles')->first();
                return response()->json(['error' => $user_role->roles->role_type . ' Role Already Assigned']);
            } else {
                $user_role = new RoleUser();
                $user_role->user_id = $id;
                $user_role->role_id = $role;
                $user_role->save();
                $role_first = RoleUser::where('user_id', $id)->first();
                $role_second = RoleUser::where('user_id', $id)->skip(1)->first();
                $temp = 0;
                $temp = $role_first->role_id;
                $role_first->role_id = $role_second->role_id;
                $role_second->role_id = $temp;
                $role_first->save();
                $role_second->save();
                return response()->json(['success' => 'User Role Assigned Successfully']);
            }


            return view('viewnotfound');
        }
    }
    public function vendorDetail()
    {
        if (Gate::any(checkPermission("4"))) {
            $vendor = Vendor::orderBy('created_at', 'desc')->get();
            return view('admin.users.vendordetail', compact('vendor'));
        } else {
            return view('viewnotfound');
        }
    }
    public function isExclusive($id)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $vendor = Vendor::findOrFail($id);
            if ($vendor->is_exculsive = 1) {
                $vendor->is_exculsive = 2;
                $vendor->update();
                return response()->json(['success' => "Exclusive Vendor Role Assigned Successfuly"]);
            }
        } else {
            return view('viewnotfound');
        }
    }

    public function isNormal($id)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $vendor = Vendor::findOrFail($id);
            if ($vendor->is_exculsive = 2) {
                $vendor->is_exculsive = 1;
                $vendor->update();
                return response()->json(['success' => "Normal Vendor Role Assigned Successfuly"]);
            }
        } else {
            return view('viewnotfound');
        }
    }

    public function vendorShow($id)
    {
        if (Gate::any(checkPermission("4"))) {
            $vendor = Vendor::findOrFail($id);
            return view('admin.users.vendorshow', compact('vendor'));
        } else {
            return view('viewnotfound');
        }
    }
    public function doctorShow($id)
    {
        if (Gate::any(checkPermission("3"))) {
            $doctor = Doctor::findOrFail($id);
            return view('admin.users.doctroshow', compact('doctor'));
        } else {
            return view('viewnotfound');
        }
    }
    public function nurseShow($id)
    {
        if (Gate::any(checkPermission("5"))) {
            $nurse = Nurse::findOrFail($id);
            return view('admin.users.nurse_show', compact('nurse'));
        } else {
            return view('viewnotfound');
        }
    }
    public function driverShow($id)
    {
        if (Gate::any(checkPermission("6"))) {
            $driver = Driver::findOrFail($id);
            return view('admin.users.driver_show', compact('driver'));
        } else {
            return view('viewnotfound');
        }
    }
    public function relationManagerShow($id)
    {
        if (Gate::any(checkPermission("13"))) {
            $relationmanager = RelationManager::findOrFail($id);
            return view('admin.users.relationmanagershow', compact('relationmanager'));
        } else {
            return view('viewnotfound');
        }
    }

    public function vendorUpload(Request $request, $id)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $vendor = Vendor::findOrFail($id);
            if (env('STORAGE_TYPE') == 'native') {
                if ($request->hasFile('agreement_file')) {
                    $images = storeImageLaravel($request, 'agreement_file', 'agreement_file_path');
                    $vendor->agreement_file = $images[0];
                    $vendor->agreement_file_path = $images[1];
                }
            } else {
                if ($request->hasFile('agreement_file')) {
                    $images = storeImageStorage($request, 'agreement_file', 'agreement_file_path');
                    $vendor->agreement_file = $images[0];
                    $vendor->agreement_file_path = $images[1];
                }
            }
            $vendor->save();
            return redirect()->back()->with('success', 'Agreement Paper Signed Successfully');
        } else {
            return view('viewnotfound');
        }
    }
    public function doctorUpload(Request $request, $id)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $doctor = Doctor::findOrFail($id);
            if (env('STORAGE_TYPE') == 'native') {
                if ($request->hasFile('agreement_file')) {
                    $images = storeImageLaravel($request, 'agreement_file', 'agreement_file_path');
                    $doctor->agreement_file = $images[0];
                    $doctor->agreement_file_path = $images[1];
                }
            } else {
                if ($request->hasFile('agreement_file')) {
                    $images = storeImageStorage($request, 'agreement_file', 'agreement_file_path');
                    $doctor->agreement_file = $images[0];
                    $doctor->agreement_file_path = $images[1];
                }
            }
            $doctor->save();
            return redirect()->back()->with('success', 'Agreement Paper Signed Successfully');
        } else {
            return view('viewnotfound');
        }
    }

    public function nurseUpload(Request $request, $id)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $nurse = Nurse::findOrFail($id);
            if (env('STORAGE_TYPE') == 'native') {
                if ($request->hasFile('agreement_file')) {
                    $images = storeImageLaravel($request, 'agreement_file', 'agreement_file_path');
                    $nurse->agreement_file = $images[0];
                    $nurse->agreement_file_path = $images[1];
                }
            } else {
                if ($request->hasFile('agreement_file')) {
                    $images = storeImageStorage($request, 'agreement_file', 'agreement_file_path');
                    $nurse->agreement_file = $images[0];
                    $nurse->agreement_file_path = $images[1];
                }
            }
            $nurse->save();
            return redirect()->back()->with('success', 'Agreement Paper Signed Successfully');
        } else {
            return view('viewnotfound');
        }
    }

    public function driverUpload(Request $request, $id)
    {
        if (Gate::any(['Superadmin', 'Admin'])) {
            $driver = Driver::findOrFail($id);
            if (env('STORAGE_TYPE') == 'native') {
                if ($request->hasFile('agreement_file')) {
                    $images = storeImageLaravel($request, 'agreement_file', 'agreement_file_path');
                    $driver->agreement_file = $images[0];
                    $driver->agreement_file_path = $images[1];
                }
            } else {
                if ($request->hasFile('agreement_file')) {
                    $images = storeImageStorage($request, 'agreement_file', 'agreement_file_path');
                    $driver->agreement_file = $images[0];
                    $driver->agreement_file_path = $images[1];
                }
            }
            $driver->save();
            return redirect()->back()->with('success', 'Agreement Paper Signed Successfully');
        } else {
            return view('viewnotfound');
        }
    }
    public function relationManagerUpload(Request $request, $id)
    {
        if (Gate::any(checkPermission("13"))) {
            $relationmanager = RelationManager::findOrFail($id);
            if (env('STORAGE_TYPE') == 'native') {
                if ($request->hasFile('agreement_file')) {
                    $images = storeImageLaravel($request, 'agreement_file', 'agreement_file_path');
                    $relationmanager->agreement_file = $images[0];
                    $relationmanager->agreement_file_path = $images[1];
                }
            } else {
                if ($request->hasFile('agreement_file')) {
                    $images = storeImageStorage($request, 'agreement_file', 'agreement_file_path');
                    $relationmanager->agreement_file = $images[0];
                    $relationmanager->agreement_file_path = $images[1];
                }
            }
            $relationmanager->save();
            return redirect()->back()->with('success', 'Agreement Paper Signed Successfully');
        } else {
            return view('viewnotfound');
        }
    }

    public function vendorAgreement($id)
    {
        $vendor = Vendor::with('agreement', 'types')->find($id);
        return view('admin.users.vendoragreement', compact('vendor'));
    }

    public function approveAgreement(Request $request)
    {
        $agreement = VendorAgreement::with('vendor')->find($request->agreement);
        $agreement->status = 1;
        $agreement->commencement_date = Carbon::now();
        $agreement->update();
        $pdf = Pdf::loadView('admin.vendor.agreement', compact('agreement'));
        Storage::put('public/pdf/Agreement_' . str_replace(' ', '_', $agreement->vendor->store_name) . '_' . $agreement->id . '.pdf', $pdf->output());
        $vendor = Vendor::find($agreement->vendor_id);
        $vendor->agreement_file = 'Agreement_' . str_replace(' ', '_', $agreement->vendor->store_name) . '_' . $agreement->id . '.pdf';
        $vendor->agreement_file_path = asset('storage/pdf/Agreement_' . str_replace(' ', '_', $agreement->vendor->store_name) . '_' . $agreement->id . '.pdf');
        $updated = $vendor->update();

        if ($updated) {
            return redirect()->back()->with('success', 'Agreement Commenced Successfully.');
        }
    }

    public function deactivateEmployee(Request $request)
    {
        $id = $request->id;
        $user = User::where('id', $id)->first();
        $user->is_verified = 0;
        $user->update();
        if ($user) {
            $member = Employee::where('employee_id', $id)->first();
            $member->percentage = 0;
            $member->is_user = NULL;
            $member->update();
        }
        if ($user) {
            return response()->json(['success' => 'Employee Deactivate Successfully']);
        }
    }

    public function activateEmployee(Request $request)
    {
        $id = $request->id;
        $user = User::where('id', $id)->first();
        $user->is_verified = 1;
        $user->update();
        if ($user) {
            $member = Employee::where('employee_id', $id)->first();
            $member->percentage = $request->percentage;
            $member->update();
        }
        if ($user) {
            return response()->json(['success' => 'Employee Activate Successfully']);
        }
    }
}
