<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\RoleUser;
use App\Models\StoreToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class DoctorProfileController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }


    public function index()
    {
        $user_id = Auth::user()->id;
        $doctor = Doctor::with(['user', 'departments'])->where('doctor_id', $user_id)->first();
        // $files = [
        //     'image_path'=>$doctor->image,
        //     'file_path'=>$doctor->file
        // ];
        // $urls = Helper::get_minio($files);
        // foreach($urls as $key=>$url){
        //     $doctor->$key = $url;
        // }
        return response()->json($doctor);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'nmc_no' => 'required',
                'gender' => 'required',
                'qualification' => 'required',
                'year_practiced' => 'required',
                'address' => 'required',
                // 'fee' => 'required',
            ]);
            $doctor = new Doctor();
            $doctor->slug = "doctor". $this->random;
            $doctor->doctor_id = auth()->user()->id;
            $doctor->nmc_no = $request->nmc_no;
            $doctor->salutation = $request->salutation;
            $doctor->gender = $request->gender;
            $doctor->department = $request->department;
            $doctor->qualification = $request->qualification;
            $doctor->year_practiced = $request->year_practiced;
            $doctor->address = $request->address;
            $doctor->specialization = $request->specialization;
            $doctor->fee = $request->fee;
            $doctor->hospital = $request->hospital;
            if ($request->image) {
                $image = $request->image;
                if(env('STORAGE_TYPE') == 'minio'){
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($image, $destinationPath); 
                    $doctor->image_path = $imageUpload['path'];
                    $doctor->image = $imageUpload['file'];
                }else{
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($image,$folderPath);                    
                    $doctor->image_path = $imageUpload['path'];
                    $doctor->image = $imageUpload['file'];
                }
            }
            if ($request->file) {
                $imagefile = $request->file;
                if(env('STORAGE_TYPE') == 'minio'){
                    $destinationPath = 'images/';
                    $fileUpload = Helper::minio_upload($imagefile, $destinationPath); 
                    $doctor->file_path = $fileUpload['path'];
                    $doctor->file = $fileUpload['file'];
                }else{
                    $folderPath = "storage/images/"; //path location                
                    $fileUpload = Helper::native_upload($imagefile,$folderPath);                    
                    $doctor->file_path = $fileUpload['path'];
                    $doctor->file = $fileUpload['file'];
                }
            }
            $name = str_replace(' ', '-', $request->name);
            $doctor->slug =  'doctor-' . $name . '-' . $this->random;
            if (Doctor::where('doctor_id', '=', auth()->user()->id)->exists() && RoleUser::where('user_id', auth()->user()->id)->count() == 2) {
                return response()->json(['error' => "You have already filled a form"],400);
             }
            $saved = $doctor->save();

            // $user = User::find($doctor->doctor_id);
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->phone = $request->phone;
            // $saved = $user->save();
            // if($saved)
            // {
            //     $user_role = new RoleUser();
            //     $user_role->user_id = auth()->user()->id;
            //     $user_role->role_id = 4;
            //     $user_role->save();
            // }
            if ($saved) {
                return response()->json([
                    "status" => "true"
                ], 200);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'nmc_no' => 'required',
                'gender' => 'required',
                'qualification' => 'required',
                'year_practiced' => 'required',
                'address' => 'required',
                // 'fee' => 'required',
            ]);
            $doctor = Doctor::findOrFail($id);
            $doctor->nmc_no = $request->nmc_no;
            $doctor->salutation = $request->salutation;
            $doctor->gender = $request->gender;
            $doctor->department = $request->department;
            $doctor->qualification = $request->qualification;
            $doctor->year_practiced = $request->year_practiced;
            $doctor->address = $request->address;
            $doctor->specialization = $request->specialization;
            $doctor->fee = $request->fee;
            $doctor->hospital = $request->hospital;
            if ($request->image) {
                $image = $request->image;
                if(env('STORAGE_TYPE') == 'minio'){
                    //return Storage::disk('minio')->exists('images/'.$doctor->image);
                    Storage::disk('minio')->delete('images/'.$doctor->image);
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($image, $destinationPath); 
                    $doctor->image_path = $imageUpload['path'];
                    $doctor->image = $imageUpload['file'];
                }else{
                    $deleteDestinationPath = 'public/images/' . $doctor->image;
                    if (Storage::exists($deleteDestinationPath)) {
                        Storage::delete($deleteDestinationPath);
                    }
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($image,$folderPath);                    
                    $doctor->image_path = $imageUpload['path'];
                    $doctor->image = $imageUpload['file'];
                }
            }
            if ($request->file) {
                $imagefile = $request->file;
                if(env('STORAGE_TYPE') == 'minio'){
                    //return Storage::disk('minio')->exists('images/'.$doctor->file);
                    Storage::disk('minio')->delete('images/'.$doctor->file);
                    $destinationPath = 'images/';
                    $fileUpload = Helper::minio_upload($imagefile, $destinationPath); 
                    $doctor->file_path = $fileUpload['path'];
                    $doctor->file = $fileUpload['file'];
                }else{
                    $deleteDestinationPath = 'public/images/' . $doctor->file;
                    if (Storage::exists($deleteDestinationPath)) {
                        Storage::delete($deleteDestinationPath);
                    }
                    $folderPath = "storage/images/"; //path location                
                    $fileUpload = Helper::native_upload($imagefile,$folderPath);                    
                    $doctor->file_path = $fileUpload['path'];
                    $doctor->file = $fileUpload['file'];
                }
            }
            $saved = $doctor->update();

            // $user = User::find($doctor->doctor_id);
            // $user->name = $request->name;
            // $user->email = $request->email;
            // $user->phone = $request->phone;
            // $saved = $user->save();
            // if($saved)
            // {
            //     $user_role = new RoleUser();
            //     $user_role->user_id = auth()->user()->id;
            //     $user_role->role_id = 4;
            //     $user_role->save();
            // }
            if ($saved) {
                return response()->json([
                    "status" => "true"
                ], 200);
            }
        } catch (ValidationException $th) {
            return response([
                "message" => $th->errors(),
            ], 400);
        }
    }
    public function updateLocation(Request $request, $id)
    {
        $doctor_id = auth()->user()->id;
        $location = Doctor::where('doctor_id', $doctor_id)->first();
        $location->longitude = $request->longitude;
        $location->latitude = $request->latitude;
        $updated = $location->update();
        $user_device_key  = StoreToken::where('user_id', $doctor_id)->first();
        if ($updated) {
            $text = "Locaiton Updated";
            $title = "You have successfully updated your locaiton";
            $notification_id = $user_device_key->device_key;
            $res = send_notification_FCM($notification_id, $title, $text,'doctor-updated');

            return response()->json(['success' => 'Location Updated Successfully.']);
        }
    }
}
