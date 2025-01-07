<?php

namespace App\Http\Controllers;

use App\Mail\BecomeAnRelationManager;
use App\Models\Employee;
use App\Models\relationmanager;
use App\Models\RoleUser;
use App\Models\RoReferralCode;
use App\Models\UpgradeOrDowngradeRo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class RelationManagerController extends Controller
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
        $employee = Employee::where('employee_id', auth()->user()->id)->first();
        if ($employee) {
            $relationmanager = RelationManager::with('relation_manager')->where('marketing_supervisor_id', $employee->id)->get();
            return view("admin.relationmanager.index", compact('relationmanager'));
        } elseif (auth()->user()->id == 2) {
            $relationmanager = RelationManager::with('relation_manager')->get();
            return view("admin.relationmanager.index", compact('relationmanager'));
        } else {
            $relationmanager = RelationManager::with('relation_manager')->whereHas('relation_manager', function ($query) {
                $query->where('referrer_id', auth()->user()->id);
            })->get();
            return view("admin.relationmanager.index", compact('relationmanager'));
        }
    }

    public function profile()
    {
        $relationmanager = RelationManager::with('relation_manager.referrer', 'employee_code.user')->where('user_id', auth()->user()->id)->first();
        return view("admin.relationmanager.profile", compact('relationmanager'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.relationmanager.create');
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
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users',
            'password' => 'required|min:8|confirmed',
            'gender' => 'required',
            'address' => 'required',
            'image' => 'required',
            'file' => 'required',
        ]);

        // $user = new User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->phone = $request->phone;
        // $user->password =  Hash::make($request->password);
        // $user->is_verified = 0;
        // $user->save();
        // $relationmanager = new relationmanager();
        // $relationmanager->relationmanager_id = $user->id;
        // $relationmanager->slug = 'relationmanager-' . $user->name . '-' . $this->random;;
        // $relationmanager->save();
        // $user_role = new RoleUser();
        // $user_role->user_id = $user->id;
        // $user_role->role_id = 6;
        // $user_role->save();
        // $relationmanager = new RelationManager();
        // $relationmanager->slug =  'relation-manager-' . '-' . $this->random;
        // $relationmanager->user_id = $user->id;
        // $employee = Employee::where('employee_id', auth()->user()->id)->first();
        // $relationmanager->marketing_supervisor_id = $employee->id;
        // $relationmanager->gender = $request->gender;
        // $relationmanager->address = $request->address;
        // $relationmanager->rm_tag = 'Relationship Manager';
        // if ($request->hasFile('image')) {

        //     $fileNameExt = $request->file('image')->getClientOriginalName();
        //     $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
        //     $fileExt = $request->file('image')->getClientOriginalExtension();
        //     $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
        //     $request->file('image')->storeAs('public/images', $fileNameToStore);
        //     $pathToStore =  asset('storage/images/' . $fileNameToStore);
        //     $relationmanager->image_path = $pathToStore;
        //     $relationmanager->image = $fileNameToStore;
        // }
        // if ($request->hasFile('file')) {

        //     $fileNameExt = $request->file('file')->getClientOriginalName();
        //     $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
        //     $fileExt = $request->file('file')->getClientOriginalExtension();
        //     $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
        //     $request->file('file')->storeAs('public/images', $fileNameToStore);
        //     $pathToStore =  asset('storage/images/' . $fileNameToStore);
        //     $relationmanager->file_path = $pathToStore;
        //     $relationmanager->file = $fileNameToStore;
        // }
        // $saved = $relationmanager->save();
        // if ($saved) {
        //     return redirect()->route('relationmanager.index')->with('success', 'Relationmanager Added Successfully');
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RelationManager  $relationManager
     * @return \Illuminate\Http\Response
     */
    public function show(RelationManager $relationManager, $id)
    {
        $relationmanager = RelationManager::with('relation_manager')->findOrFail($id);
        $ro_status = UpgradeOrDowngradeRo::where("relation_manager_id", $relationmanager->id)->latest()->first();
        return view("admin.relationmanager.show", compact('relationmanager', 'ro_status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RelationManager  $relationManager
     * @return \Illuminate\Http\Response
     */
    public function edit(RelationManager $relationManager, $id)
    {
        $relationmanager = RelationManager::findOrFail($id);
        return view("admin.relationmanager.edit", compact('relationmanager'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RelationManager  $relationManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'gender' => 'required',
            'address' => 'required',
        ]);
        $relationmanager = RelationManager::findOrFail($id);
        $relationmanager->gender = $request->gender;
        $relationmanager->address = $request->address;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $relationmanager->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $relationmanager->image = $images[0];
                $relationmanager->image_path = $images[1];
            }

            if ($request->hasFile('image')) {
                $destination1 = 'public/images/' . $relationmanager->file;
                if (Storage::exists($destination1)) {
                    Storage::delete($destination1);
                };
                $images1 = storeImageLaravel($request, 'file', 'file_path');
                $relationmanager->image = $images1[0];
                $relationmanager->image_path = $images1[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $relationmanager->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $relationmanager->image = $images[0];
                $relationmanager->image_path = $images[1];
            }
            if ($request->hasFile('file')) {
                $destination1 = 'images/' . $relationmanager->file;
                Storage::disk('minio')->delete($destination1);
                $images1 = storeImageStorage($request, 'file', 'file_path');
                $relationmanager->file = $images1[0];
                $relationmanager->file_path = $images1[1];
            }
        }
        $saved = $relationmanager->update();
        if ($saved) {
            return redirect()->route('relationmanager.profile')->with('success', 'Relationmanager Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RelationManager  $relationManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(RelationManager $relationManager)
    {
        //
    }

    public function reffer_as_relation_manager(Request $request)
    {
        $employee_code = Employee::where('employee_id', auth()->user()->id)->first();
        $ro_referral_code = new RoReferralCode();
        if ($employee_code) {
            $ro_referral_code->user_id = auth()->user()->id;
            $ro_referral_code->employee_code = $employee_code->employee_code;
            $ro_referral_code->save();
            $refer_as_ro = [
                "name" => 'GD-MS' . '-' . $employee_code->id,
                "mobile_url" => "https://ghargharmadoctor.page.link/registerPage" . "?" . "marketing_supervisor_id=" . $employee_code->employee_code,
                "web_url" => env('REACT_URL') . '/become-partner' . "?" . "marketing_supervisor_id=" . $employee_code->employee_code,
            ];
            Mail::to($request->relation_manager_email)->send(new BecomeAnRelationManager($refer_as_ro));
        } else {
            $employee_code = RelationManager::with("employee_code")->where('user_id', auth()->user()->id)->first();
            $ro_referral_code->user_id = auth()->user()->id;
            $ro_referral_code->relation_manager_id = auth()->user()->id;
            $ro_referral_code->save();
            $refer_as_ro = [
                "name" => $employee_code->employee_code->employee_code,
                "mobile_url" => "https://ghargharmadoctor.page.link/registerPage" . "?" . "marketing_supervisor_id=" . $employee_code->employee_code->employee_code,
                "web_url" => env('REACT_URL') . '/become-partner' . "?" . "marketing_supervisor_id=" . $employee_code->employee_code->employee_code,
            ];
            Mail::to($request->relation_manager_email)->send(new BecomeAnRelationManager($refer_as_ro));
        }

        return redirect()->route('home')->with("success", "Email send Sucessfully");
    }

    public function view_all($id)
    {
        $relationmanager = RelationManager::findOrFail($id);
        $upgrade_file = UpgradeOrDowngradeRo::where('relation_manager_id', $relationmanager->id)->latest()->take(5)->get();
        return view('admin.relationmanager.viewall', compact('upgrade_file'));
    }
    public function upgrade_relation_manager($id)
    {
        $relationmanager = RelationManager::findOrFail($id);
        $relationmanager->rm_tag = 'Relationship Manager';
        $relationmanager->update();
        $change_status = UpgradeOrDowngradeRo::where('status', NULL)->first();
        $change_status->status = 'relationship-manager';
        $change_status->update();
        return response()->json(["success" => "Updated to Relationship Manager"]);
    }

    public function downgrade_relation_manager($id)
    {
        $relationmanager = RelationManager::findOrFail($id);
        $relationmanager->rm_tag = 'Relationship Officer';
        $relationmanager->update();
        $change_status = UpgradeOrDowngradeRo::where('status', NULL)->first();
        $change_status->status = 'relationship-officer';
        $change_status->update();
        return response()->json(["success" => "Updated to Relationship Officer"]);
    }

    public function upload_file_relation_manager(Request $request)
    {
        $relationmanager = new UpgradeOrDowngradeRo();
        $relationmanager->relation_manager_id = $request->relation_manager_id;
        $relationmanager->reason = $request->reason;
        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('level_file')) {
                $images = storeImageLaravel($request, 'level_file', 'level_file_path');
                $relationmanager->level_file = $images[0];
                $relationmanager->level_file_path = $images[1];
            }
        } else {
            if ($request->hasFile('level_file')) {
                $images = storeImageStorage($request, 'level_file', 'level_file_path');
                $relationmanager->level_file = $images[0];
                $relationmanager->level_file_path = $images[1];
            }
        }

        $relationmanager->save();
        return redirect()->back()->with('success', 'Upgrading Or Downgrading Relationship manager Successful');
    }

    public function reject_ro(Request $request, $id)
    {
        $relationmanager = RelationManager::findOrFail($id);
        $relationmanager->reject_reason = $request->reject_reason;
        $relationmanager->status = 'rejected';
        $relationmanager->save();
        return redirect()->back()->with('success', 'Relation Officer Rejected Successfully');
    }
}
