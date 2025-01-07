<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
class LanguageSwitching extends Controller
{
     public function index(Request $request)
    {
      App::setLocale($request->lang);
         \Session::put('lang', $request->input('locale'));

        return redirect()->back();

    }

    public function change($lang)
    {
        App::setLocale($lang);
        \Session::put('lang', $lang);
        return app()->getLocale();
        return redirect()->route("home");

    }

    public function locale($lang)
    {    
        App::setLocale($lang);
        \Session::put('lang', $lang);
        return redirect()->back();

    }
}
