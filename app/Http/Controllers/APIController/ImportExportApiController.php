<?php

namespace App\Http\Controllers\APIController;

use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Models\ImportFile;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class ImportExportApiController extends Controller
{
    public function getImport(){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $import = ImportFile::where('member_id',$member->id)->first();
        return response()->json($import);
    }

    public function import(Request $request){
        $member = Member::where('member_id',Auth::user()->id)->first();
        $previousImport = ImportFile::where('member_id',$member->id)->first();
        if($previousImport == null){
            $import = new ImportFile();
            if($member->member_type == 'Primary Member'){
                $import->member_id = $member->id;
                if ($request->file) {
                    $fileName = $member->user->user_name;
                    $fileExt = $request->file('file')->getClientOriginalExtension();
                    $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
                    if(env('STORAGE_TYPE') == 'minio'){
                        $path = $request->file('file')->storeAs('files', $fileNameToStore ,'minio');
                        $image_name = basename($path);
                        $image_path = Storage::disk('minio')->url($path);
                        $import->file_path = $image_path;
                        $import->file = $image_name;
                    }else{
                        $request->file('file')->storeAs('public/files', $fileNameToStore);
                        $pathToStore =  asset('storage/files/'.$fileNameToStore);
                        $import->file_path = $pathToStore;
                        $import->file = $fileNameToStore;
                    }                   
                }
                $import->save();
                return response()->json(['success'=>'File Imported Successfully.']);
            }else{
                return response()->json(['message' => [
                    'error' => ['You cannot import file.']
                ]],400);
            }
        }else{
            if($member->member_type == 'Primary Member'){
                $previousImport->member_id = $member->id;
                $previousImport->status = 0;
                if ($request->file) {
                    $fileName = $member->user->user_name;
                    $fileExt = $request->file('file')->getClientOriginalExtension();
                    $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
                    if(env('STORAGE_TYPE') == 'minio'){
                        $destination = 'files/' . $previousImport->file;
                        Storage::disk('minio')->delete($destination);
                        $path = $request->file('file')->storeAs('files', $fileNameToStore ,'minio');
                        $image_name = basename($path);
                        $image_path = Storage::disk('minio')->url($path);
                        $previousImport->file_path = $image_path;
                        $previousImport->file = $image_name;
                    }else{
                        $destination = 'public/files/'.$previousImport->file;
                        if(Storage::exists($destination)){
                            Storage::delete($destination);
                        };
                        $request->file('file')->storeAs('public/files', $fileNameToStore);
                        $pathToStore =  asset('storage/files/'.$fileNameToStore);
                        $previousImport->file_path = $pathToStore;
                        $previousImport->file = $fileNameToStore;
                    }  

                }
                $previousImport->update();
                return response()->json(['success'=>'File Imported Successfully.']);
            }else{
                return response()->json(['message' => [
                    'error' => ['You cannot import file.']
                ]],400);
            }
        }
    }
}
