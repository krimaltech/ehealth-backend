<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Doctor;

class TopDoctorsApiController extends Controller
{
    public function index()
    {
        $doctor = Doctor::with(['user','departments','bookings.slots'])->get();
        return response()->json($doctor);
    }
}
