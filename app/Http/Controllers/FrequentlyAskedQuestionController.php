<?php

namespace App\Http\Controllers;

use App\Models\FrequentlyAskedQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class FrequentlyAskedQuestionController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(checkPermission("14"))) {
            $frequentlyAskedQuestion = FrequentlyAskedQuestion::all();
            return view('admin.frequentlyaskedquestion.index',compact('frequentlyAskedQuestion'));
        }
        else {
            return view('viewnotfound');
        }  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::any(checkPermission("14"))) {
            return view('admin.frequentlyaskedquestion.create');
        }
        else {
            return view('viewnotfound');
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $frequentlyAskedQuestion = new FrequentlyAskedQuestion();
        $frequentlyAskedQuestion->question = $request->question;
        $frequentlyAskedQuestion->slug = 'faq-'.$this->random;
        $frequentlyAskedQuestion->answer = $request->answer;
        $frequentlyAskedQuestion->save();
        return redirect()->route('frequentlyaskedquestion.index')->with('success','Frequently Asked Question Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FrequentlyAskedQuestion  $frequentlyAskedQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(FrequentlyAskedQuestion $frequentlyAskedQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FrequentlyAskedQuestion  $frequentlyAskedQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit(FrequentlyAskedQuestion $frequentlyAskedQuestion,$id)
    {
        if (Gate::any(checkPermission("14"))) {
            $frequentlyAskedQuestion = FrequentlyAskedQuestion::findOrFail($id);
            return view('admin.frequentlyaskedquestion.edit',compact('frequentlyAskedQuestion'));
        }
        else {
            return view('viewnotfound');
        }  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FrequentlyAskedQuestion  $frequentlyAskedQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FrequentlyAskedQuestion $frequentlyAskedQuestion, $id)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $frequentlyAskedQuestion = FrequentlyAskedQuestion::findOrFail($id);
        $frequentlyAskedQuestion->question = $request->question;
        $frequentlyAskedQuestion->answer = $request->answer;
        $frequentlyAskedQuestion->save();
        return redirect()->route('frequentlyaskedquestion.index')->with('success','Frequently Asked Question Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FrequentlyAskedQuestion  $frequentlyAskedQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrequentlyAskedQuestion $frequentlyAskedQuestion)
    {
        //
    }
}
