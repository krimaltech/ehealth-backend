<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewNotFound extends Controller
{
    public function viewnotfound()
    {
        return view('viewnotfound');
    }
}
