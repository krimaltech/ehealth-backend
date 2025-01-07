<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\RelationManager;
use App\Models\RoleUser;
use Illuminate\Http\Request;

class RelationManagerApiController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }

    public function store(Request $request)
    {
        $request->validate([
            'gender' => 'required',
            'address' => 'required',
            'image' => 'required',
            'file' => 'required',
        ]);
        $relationmanager = new RelationManager();
        $relationmanager->slug =  'relation-manager-' . '-' . $this->random;
        $relationmanager->user_id = auth()->user()->id;
        $employee_code = Employee::where('employee_code',$request->marketing_supervisor_id)->first();
        if (!$employee_code) {
            $relationmanager->marketing_supervisor_id = NULL;
        } else {
            $relationmanager->marketing_supervisor_id = $employee_code->id;
        }
        
        $relationmanager->gender = $request->gender;
        $relationmanager->address = $request->address;
        $relationmanager->rm_tag = "Relationship Officer";
            if ($request->image) {
                $image = $request->image;
                if(env('STORAGE_TYPE') == 'minio'){
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($image, $destinationPath); 
                    $relationmanager->image_path = $imageUpload['path'];
                    $relationmanager->image = $imageUpload['file'];
                }else{
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($image,$folderPath);                    
                    $relationmanager->image_path = $imageUpload['path'];
                    $relationmanager->image = $imageUpload['file'];
                }
            }
            if ($request->file) {
                $imagefile = $request->file;
                if(env('STORAGE_TYPE') == 'minio'){
                    $destinationPath = 'images/';
                    $imageUpload = Helper::minio_upload($imagefile, $destinationPath); 
                    $relationmanager->file_path = $imageUpload['path'];
                    $relationmanager->file = $imageUpload['file'];
                }else{
                    $folderPath = "storage/images/"; //path location                
                    $imageUpload = Helper::native_upload($imagefile,$folderPath);                    
                    $relationmanager->file_path = $imageUpload['path'];
                    $relationmanager->file = $imageUpload['file'];
                }
            }
            if (RelationManager::where('user_id', '=', auth()->user()->id)->exists() && RoleUser::where('user_id', auth()->user()->id)->count() == 2) {
                return response()->json(['error' => "You have already filled a form"],400);
             }
        $saved = $relationmanager->save();
        if($saved){
            return response()->json(['message'=>'Relationmanager Added Successfully']);
        }
    }



}
