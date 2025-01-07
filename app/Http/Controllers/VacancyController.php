<?php

namespace App\Http\Controllers;

use App\Models\JobSkill;
use App\Models\Vacancy;
use App\Models\VacancySkill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class VacancyController extends Controller
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
         if (Gate::any(checkPermission("19"))) {
            $vacancy = Vacancy::orderBy('order','ASC')->get();
            return view('admin.vacancy.index',compact('vacancy'));
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
         if (Gate::any(checkPermission("19"))) {
            $skills = JobSkill::all();
            return view('admin.vacancy.create',compact('skills'));
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
            'job_title' => 'required',
            'job_requirements' => 'required',
            'job_type' => 'required',
            'no_of_vacancy' => 'required',
            'experience' => 'required',
            'job_deadline' => 'required',
            'status' => 'required',
            'link' => 'required',
            'salary' => 'required',
            'education_level' => 'required',
            'job_location' => 'required',
            'skills' => 'required',
            'seo_keyword' => 'required',
            'seo_description' => 'required',
            'slug' => 'required|unique:vacancies',
        ]);

        $vacancy = new Vacancy();
        $vacancy->job_title = $request->job_title;
        $vacancy->job_type = $request->job_type;
        $vacancy->no_of_vacancy = $request->no_of_vacancy;
        $vacancy->experience = $request->experience;
        $vacancy->job_deadline = $request->job_deadline;
        $vacancy->job_description = $request->job_description;
        $vacancy->job_responsibility = $request->job_responsibility;
        $vacancy->job_requirements = $request->job_requirements;
        $vacancy->status = $request->status;
        $vacancy->form_link = $request->link;
        $vacancy->salary = $request->salary;
        if($request->salary == 'Amount(Range)'){
            $vacancy->salary_range = $request->salary_range;
        }else{
            $vacancy->salary_range = null;
        }
        $vacancy->education_level = $request->education_level;
        $vacancy->job_location = $request->job_location;
        // $vacancy->slug = 'vacancy'.'-'.$this->random;
        $vacancy->slug = $request->slug;
        $vacancy->seo_keyword = $request->seo_keyword;
        $vacancy->seo_description = $request->seo_description;
        $saved = $vacancy->save();

        foreach($request->skills as $item){
            $vacancyskill = new VacancySkill();
            $vacancyskill->vacancy_id = $vacancy->id;
            $vacancyskill->skill_id = $item;
            $vacancyskill->save();
        }

        if($saved){
            return redirect()->route('vacancy.index')->with('success','Vacancy Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
         if (Gate::any(checkPermission("19"))) {
            $vacancy = Vacancy::where('slug',$slug)->with('vacancyskill.skill')->first();
            return view('admin.vacancy.show',compact('vacancy'));
        }
        else {
            return view('viewnotfound');
        }   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
         if (Gate::any(checkPermission("19"))) {
            $vacancy = Vacancy::where('slug',$slug)->with('vacancyskill.skill')->first();
            $vacancyskill =  $vacancy->vacancyskill->pluck('skill_id')->toArray();
            $skills = JobSkill::all();
            return view('admin.vacancy.edit',compact('vacancy','skills','vacancyskill'));
        }
        else {
            return view('viewnotfound');
        }   

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // return $request->skills;
        // if($request->editskills == null && $request->skills == null){
        //     return redirect()->back()->with('error','Job Skill field is required.');
        // }
        $vacancy = Vacancy::where('slug',$slug)->first();
        $request->validate([
            'job_title' => 'required',
            'job_requirements' => 'required',
            'job_type' => 'required',
            'no_of_vacancy' => 'required',
            'skills' => 'required',
            'experience' => 'required',
            'job_deadline' => 'required',
            'status' => 'required',
            'link' => 'required',
            'salary' => 'required',
            'education_level' => 'required',
            'job_location' => 'required',
            'slug' => 'required|unique:vacancies,slug,'.$vacancy->id,
        ]);

        $vacancy->job_title = $request->job_title;
        $vacancy->job_type = $request->job_type;
        $vacancy->no_of_vacancy = $request->no_of_vacancy;
        $vacancy->experience = $request->experience;
        $vacancy->job_deadline = $request->job_deadline;
        $vacancy->job_description = $request->job_description;
        $vacancy->job_responsibility = $request->job_responsibility;
        $vacancy->job_requirements = $request->job_requirements;
        $vacancy->status = $request->status;
        $vacancy->form_link = $request->link;
        $vacancy->salary = $request->salary;
        if($request->salary == 'Amount(Range)'){
            $vacancy->salary_range = $request->salary_range;
        }else{
            $vacancy->salary_range = null;
        }
        $vacancy->education_level = $request->education_level;
        $vacancy->job_location = $request->job_location;
        // $title = str_replace(' ', '-', $request->job_title);
        // $job_title = str_replace('/', '-', $title);
        // $vacancy->slug = $job_title.'-'.$this->random;
        $vacancy->slug = $request->slug;
        $saved = $vacancy->save();

        if($request->skills){
            $skills = VacancySkill::where('vacancy_id',$vacancy->id)->get()->pluck('skill_id')->toArray();
            foreach($request->skills as $item){
                if(!in_array($item,$skills)){
                    $vacancyskill = new VacancySkill();
                    $vacancyskill->vacancy_id = $vacancy->id;
                    $vacancyskill->skill_id = $item;
                    $vacancyskill->save();
                }
            }
            $vacancyskills  = VacancySkill::where('vacancy_id',$vacancy->id)->whereNotIn('skill_id',$request->skills)->get();
            foreach($vacancyskills as $item){
                $item->delete();
            }
        }

        if($saved){
            return redirect()->route('vacancy.index')->with('success','Vacancy Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vacancy = Vacancy::find($id);
        $deleted = $vacancy->delete();
        if($deleted){
            return response()->json(['success'=>'Vacancy Deleted Successfully']);
        } 
    }

    public function updateStatus($id){
        $vacancy = Vacancy::find($id);
        $status = !$vacancy->status;
        $vacancy->status = !$vacancy->status;
        $vacancy->update();
        return response()->json(['success' => 'Status Updated Successfully.','status'=>$status,'id' => $id]);
    }

    public function orderCreate(){
        $vacancy = Vacancy::where('status',1)->where('job_deadline','>=',Carbon::now()->format('Y-m-d'))->with('vacancyskill.skill')->get();
        return view('admin.vacancy.order',compact('vacancy'));
    }

    public function orderStore(Request $request){

        foreach($request->order as $vacancyId=>$order){
            $vacancy = Vacancy::find($vacancyId);
            $vacancy->order = $order;
            $vacancy->update();
        }
        return redirect()->route('vacancy.index')->with('success','Order Added Successfully.');
    }

    public function checkSlug(Request $request){
        if($request->id){
            $check = Vacancy::where('slug',$request->slug)->where('id','!=',$request->id)->first();
            if($check){
                return response()->json(true);
            }else{
                return response()->json(false);
            }
        }else{
            $check = Vacancy::where('slug',$request->slug)->first();
            if($check){
                return response()->json(true);
            }else{
                return response()->json(false);
            }
        }
    }

    public function updateSeo(Request $request, $slug){
        $request->validate([
            'seo_keyword' => 'required',
            'seo_description' => 'required'
        ]);
        $vacancy = Vacancy::where('slug',$slug)->first();
        $vacancy->seo_keyword = $request->seo_keyword;
        $vacancy->seo_description = $request->seo_description;
        $vacancy->update();
        return redirect()->route('vacancy.index')->with('success','Vacancy SEO Updated Successfully.');
    }
}
