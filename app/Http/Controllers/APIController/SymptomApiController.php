<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Symptom;
use Illuminate\Http\Request;

class SymptomApiController extends Controller
{
    public function index()
    {
        $symptom = Symptom::all();
        return response()->json($symptom);
    }
}