<?php

namespace App\Http\Controllers;

use App\Models\TermCondition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TermConditionController extends Controller
{
    public function index()
    {
        if (Gate::any(checkPermission("14"))) {
            $termcondition = TermCondition::get();
            return view('admin.termcondition.index', compact("termcondition"));
        }
        else {
            return view('viewnotfound');
        }  
    }


    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required',
            'policy' => 'required',
            'details' => 'required',
        ]);
        $termcondition = new TermCondition();

        $termcondition->type = $request->type;
        $termcondition->policy = $request->policy;
        $termcondition->details = $request->details;
        $termcondition->save();
        return redirect()->route('termcondition.index')->with('message', 'Testimonial submitted Successully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'type' => 'required',
            'policy' => 'required',
            'details' => 'required',
        ]);
        $termcondition = TermCondition::findOrFail($id);

        $termcondition->type = $request->type;
        $termcondition->policy = $request->policy;
        $termcondition->details = $request->details;
        $termcondition->save();
        return redirect()->route('termcondition.index')->with('message', 'Testimonial submitted Successully');
    }
}
