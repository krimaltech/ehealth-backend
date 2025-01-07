<?php

namespace App\Http\Controllers;

use App\Models\ScreeningDate;
use Illuminate\Http\Request;

class VerifyDateController extends Controller
{
    public function verify($id){
        $screening = ScreeningDate::find($id);
        $screening->is_verified = 1;
        $screening->update();
        return redirect()->back()->with('success','Lab Screening Date Confirmed.');
    }

    public function reschedule(Request $request,$id){
        $screening = ScreeningDate::find($id);
        $screening->screening_date = $request->screening_date;
        $screening->is_verified = 1;
        $screening->update();
        return redirect()->back()->with('success','Lab Screening Date Rescheduled.');
    }
}
