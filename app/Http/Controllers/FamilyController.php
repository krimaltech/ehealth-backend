<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('User')) {
            $member = Member::where('member_id',Auth::user()->id)->first();
            $family = Family::where('user_id',$member->id)->with('user_1.member')->get();
            return view('admin.addfamily.index',compact('family'));
        } else {

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
        if (Gate::allows('User')) {
            return view('admin.addfamily.create');
        } else {

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
        $family = new Family();
        $family->user_id = Auth::user()->id;
        $service = $request->input('family_id');
        $user_id = User::where('phone', $service)->first()->id;
        $family->family_id = $user_id;
        $family->save();
        return redirect()->route('addfamily.index')->with('success','Family Requested Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function show(Family $family)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function edit(Family $family)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Family $family)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Family  $family
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
   
        $family = Family::find($id);
        $member = Member::find($family->family_id);
        $member->member_type  = null;
        $member->save();
        $family->delete($id);
      
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
    }
    public function approved(Request $request)
    {
        $id = $request->id;
        $family = Family::find($id);
        $family->approved = 1;
        $family->update();
        return response()->json(200);
    }

}
