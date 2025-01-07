<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\Member;
use App\Models\Nurse;
use App\Models\Referral;
use App\Models\RoleUser;
use App\Models\User;
use App\Models\UserVerify;
use App\Models\Vendor;
use App\Models\VendorType;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $random;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }

    public function showRegistrationForm()
    {
        $departments = Department::all();
        $vendors = VendorType::all();
        return view('auth.register', compact('departments', 'vendors'));
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed',
            'regex:/[a-z]/',      // must contain at least one lowercase letter
            'regex:/[A-Z]/',      // must contain at least one uppercase letter
            'regex:/[0-9]/',      // must contain at least one digit
            'regex:/[@$!%*#?&]/'],
            'phone' => ['required', 'unique:users'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $referrer = Referral::where("referral_email", $data['email'])->first();
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            // 'role' => $data['role'],
            'is_verified' => $data['is_verified'],
            'referrer_id' => $referrer ? $referrer->gd_id : null,
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $user = $this->create($request->all());
        event(new Registered($user));
        // $token = Str::random(64);

        // UserVerify::create([
        //     'user_id' => $user->id,
        //     'token' => $token
        // ]);

        // Mail::to($request->email)->send(new VerifyEmail($token));
        // if ($user->role == 3) {
        //     $vendor = new Employee();
        //     $vendor->gender = $request->gender;
        //     $vendor->image = $request->image;
        //     $vendor->address = $request->address;
        //     $vendor->employee_type = $request->employee_type;
        //     $saved = $vendor->save();
        // }
        // if ($user->role == 4) {
        //     $doctor = new Doctor();
        //     $doctor->doctor_id = $user->id;
        //     $doctor->nmc_no = $request->nmc_no;
        //     $doctor->gender = $request->gender;
        //     $doctor->department = $request->department;
        //     $doctor->salutation = $request->salutation;
        //     $doctor->qualification = $request->qualification;
        //     $doctor->year_practiced = $request->year_practiced;
        //     $doctor->address = $request->address;
        //     $doctor->specialization = $request->specialization;
        //     if ($request->hasFile('image')) {
        //         $fileNameExt = $request->file('image')->getClientOriginalName();
        //         $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
        //         $fileExt = $request->file('image')->getClientOriginalExtension();
        //         $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
        //         $request->file('image')->storeAs('public/images', $fileNameToStore);
        //         $pathToStore =  asset('storage/images/' . $fileNameToStore);
        //         $doctor->image_path = $pathToStore;
        //         $doctor->image = $fileNameToStore;
        //     }
        //     if ($request->hasFile('file')) {
        //         $fileNameExt = $request->file('file')->getClientOriginalName();
        //         $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
        //         $fileExt = $request->file('file')->getClientOriginalExtension();
        //         $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
        //         $request->file('file')->storeAs('public/files', $fileNameToStore);
        //         $pathToStore =  asset('storage/files/' . $fileNameToStore);
        //         $doctor->file_path = $pathToStore;
        //         $doctor->file = $fileNameToStore;
        //     }
        //     $name = str_replace(' ', '-', $request->name);
        //     $doctor->slug =  'doctor-' . $name . '-' . $this->random;
        //     $saved = $doctor->save();
        // }
        // if ($user->role == 5) {
        //     $vendor = new Vendor();
        //     $vendor->vendor_id = $user->id;
        //     $vendor->vendor_type = $request->vendor_type;
        //     $vendor->address = $request->address;
        //     if ($request->hasFile('image')) {
        //         $fileNameExt = $request->file('image')->getClientOriginalName();
        //         $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
        //         $fileExt = $request->file('image')->getClientOriginalExtension();
        //         $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
        //         $request->file('image')->storeAs('public/images', $fileNameToStore);
        //         $pathToStore =  asset('storage/images/' . $fileNameToStore);
        //         $vendor->image_path = $pathToStore;
        //         $vendor->image = $fileNameToStore;
        //     }
        //     if ($request->hasFile('file')) {
        //         $fileNameExt = $request->file('file')->getClientOriginalName();
        //         $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
        //         $fileExt = $request->file('file')->getClientOriginalExtension();
        //         $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
        //         $request->file('file')->storeAs('public/files', $fileNameToStore);
        //         $pathToStore =  asset('storage/files/' . $fileNameToStore);
        //         $vendor->file_path = $pathToStore;
        //         $vendor->file = $fileNameToStore;
        //     }
        //     $name = str_replace(' ', '-', $request->name);
        //     $vendor->slug =  'vendor-' . $name . '-' . $this->random;
        //     $saved = $vendor->save();
        // }

        // if ($user->role == 6) {
            $member = new Member();
            $member->member_id = $user->id;
            $name = str_replace(' ', '-', $user->name);
            $member->slug =  'member-' . $name . '-' . $this->random;
            $saved =  $member->save();
            if($saved)
            {
                $user_role = new RoleUser();
                $user_role->user_id = $user->id;
                $user_role->role_id = 6;
                $user_role->save();
            }
            if ($user->referrer_id != NULL) {
                $referrer = Referral::where("referral_email", $user->email)->first();
                $referrer->status = 1;
                $saved =  $referrer->save();
            }
        // }
        // }
        // if ($user->role == 7) {
        //     $nurse = new Nurse();
        //     $nurse->nurse_id = $user->id;
        //     $nurse->nnc_no = $request->nnc_no;
        //     $nurse->gender = $request->gender;
        //     $nurse->qualification = $request->qualification;
        //     $nurse->year_practiced = $request->year_practiced;
        //     $nurse->address = $request->address;
        //     if ($request->hasFile('image')) {
        //         $fileNameExt = $request->file('image')->getClientOriginalName();
        //         $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
        //         $fileExt = $request->file('image')->getClientOriginalExtension();
        //         $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
        //         $request->file('image')->storeAs('public/images', $fileNameToStore);
        //         $pathToStore =  asset('storage/images/' . $fileNameToStore);
        //         $nurse->image_path = $pathToStore;
        //         $nurse->image = $fileNameToStore;
        //     }
        //     if ($request->hasFile('file')) {
        //         $fileNameExt = $request->file('file')->getClientOriginalName();
        //         $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
        //         $fileExt = $request->file('file')->getClientOriginalExtension();
        //         $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
        //         $request->file('file')->storeAs('public/files', $fileNameToStore);
        //         $pathToStore =  asset('storage/files/' . $fileNameToStore);
        //         $nurse->file_path = $pathToStore;
        //         $nurse->file = $fileNameToStore;
        //     }
        //     $name = str_replace(' ', '-', $request->name);
        //     $nurse->slug =  'nurse-' . $name . '-' . $this->random;
        //     $saved = $nurse->save();
        // }
        // if ($user->role == 9) {
        //     $driver = new Driver();
        //     $driver->driver_id = $user->id;
        //     $driver->address = $request->address;
        //     if ($request->hasFile('image')) {
        //         $fileNameExt = $request->file('image')->getClientOriginalName();
        //         $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
        //         $fileExt = $request->file('image')->getClientOriginalExtension();
        //         $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
        //         $request->file('image')->storeAs('public/images', $fileNameToStore);
        //         $pathToStore =  asset('storage/images/' . $fileNameToStore);
        //         $driver->image_path = $pathToStore;
        //         $driver->image = $fileNameToStore;
        //     }
        //     if ($request->hasFile('file')) {
        //         $fileNameExt = $request->file('file')->getClientOriginalName();
        //         $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
        //         $fileExt = $request->file('file')->getClientOriginalExtension();
        //         $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
        //         $request->file('file')->storeAs('public/files', $fileNameToStore);
        //         $pathToStore =  asset('storage/files/' . $fileNameToStore);
        //         $driver->file_path = $pathToStore;
        //         $driver->file = $fileNameToStore;
        //     }
        //     $name = str_replace(' ', '-', $request->name);
        //     $driver->slug =  'driver-' . $name . '-' . $this->random;
        //     $saved =  $driver->save();
        // }
        if ($saved) {
            return response()->json(['status' => true, 'route' => route('login')]);
        }
}
}