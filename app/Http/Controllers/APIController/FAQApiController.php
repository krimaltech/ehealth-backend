<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\FrequentlyAskedQuestion;
use Illuminate\Http\Request;

class FAQApiController extends Controller
{
    public function index()
    {
        $faq = FrequentlyAskedQuestion::all();
        return response()->json($faq);
    }
}
