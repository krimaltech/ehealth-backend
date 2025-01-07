<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryApiController extends Controller
{
    public function index(){
        $enquiry = Enquiry::first();
        return response()->json($enquiry);
    }
}
