<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CheckVersion;
use Illuminate\Http\Request;

class CheckVersionController extends Controller
{
    public function index()
    {
        $check_version = CheckVersion::orderBy('created_at','desc')->get();
        return view('admin.checkversion.index', compact('check_version'));
    }

    public function store(Request $request)
    {
        $check_version = new CheckVersion();
        $check_version->updated_date = $request->updated_date;
        $check_version->status = $request->status;
        $check_version->version = $request->version;
        $check_version->save();
        return redirect()->route("check-version.index")->with('success','New Version Updated Successfully');
    }

    public function update(Request $request, $id)
    {
        $check_version = CheckVersion::findOrFail($id);
        $check_version->updated_date = $request->updated_date;
        $check_version->status = $request->status;
        $check_version->version = $request->version;
        $check_version->save();
        return redirect()->route('check-version.index')->with('success','New Version Updated Successfully');
    }
}
