<?php

namespace App\Http\Controllers;

use App\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Str;
use Auth;
use Helper;
class MemberController extends Controller
{
    private $path='public/images/';

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456hdgafshgdfahaiudvfgybsauydgafueGFHFVDAHSFH"), 0, 5);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members= Member::orderBy('position','asc')->get();
        return view('admin.member.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.member.create');
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
            'name_en'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);

        $member= new Member;
        $member->user_id=Auth::user()->id;
        foreach (Helper::languageAll() as $language) {
           $member->{"name_" . $language->code} = $request->{"name_" . $language->code};
           $member->{"address_" . $language->code} = $request->{"address_" . $language->code};
           $member->{"description_" . $language->code} = $request->{"description_" . $language->code};
           $member->{"post_" . $language->code} = $request->{"post_" . $language->code};
         }
        $member->phone=$request->phone;
        $member->email=$request->email;
        $member->status=$request->status ? 1:0;
        $member->position= Member::count();
        if ($request->image) {
            $imageName = $this->random . '_' . $request->file('image')->getClientOriginalName();
            $uploadFile = $request->file('image')->storeAs($this->path, $imageName);
            $member->image = $imageName;
        }

        $member->save();

    return redirect()->route('member.index')->with('success','Member added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        return view('admin.member.create',compact('member'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Memeber  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name_en'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);
       
        foreach (Helper::languageAll() as $language) {
           $member->{"name_" . $language->code} = $request->{"name_" . $language->code};
           $member->{"address_" . $language->code} = $request->{"address_" . $language->code};
           $member->{"description_" . $language->code} = $request->{"description_" . $language->code};
           $member->{"post_" . $language->code} = $request->{"post_" . $language->code};
         }
        $member->phone=$request->phone;
        $member->email=$request->email;
        $member->status=$request->status ? 1:0;
        if ($request->image) {
            $oldImage = $this->path. $member->image;
            if (Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }

            $imageName = $this->random . '_' . $request->file('image')->getClientOriginalName();
            $uploadFile = $request->file('image')->storeAs($this->path, $imageName);
            $member->image = $imageName;
        }

        $member->update();

    return redirect()->route('member.index')->with('success','Member updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $oldImage = $this->path.$member->image;
            if (Storage::exists($oldImage)) {
                Storage::delete($oldImage);
            }
         $member->delete();

       return redirect()->route('member.index')->with('success','Member deleted successfully');
    }

public function reorder(Request $request){
  foreach($request->id as $index=>$id){
    $data= Member::where('id',$id)->first();
    $data->position=$request->position[$index];
    $data->update();
  }
  return redirect()->route('member.index')->with('success','Member reorder successfully ');
}
}
