<?php

namespace App\Http\Controllers;

use App\Models\GdFeedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GdFeedbackController extends Controller
{
    public function index()
    {
        if (Gate::any(checkPermission("28"))) {
            $feedback = GdFeedback::with('member.user')->get();
            return view('admin.feedback.gdfeedback.index',compact('feedback'));
        } else {
            return view('viewnotfound');
        }
    }
  
}
