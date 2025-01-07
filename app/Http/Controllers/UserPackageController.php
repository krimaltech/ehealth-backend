<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Member;
use App\Models\ScreeningService;
use App\Models\UserPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserPackageController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('User')) {
            $user = Member::where('member_id',Auth::user()->id)->first();
            if($user->member_type == 'Primary Member'){
                $packages = UserPackage::where('member_id', $user->id)->get();
            }
            else if($user->member_type == 'Dependent Member'){
                $primaryId = Family::where('family_id',$user->id)->where('rejected',1)->first();
                if($primaryId != null){
                    $packages = UserPackage::where('member_id', $primaryId->user_id)->get();
                }else{
                    $packages = [];
                }
            }else{
                $packages = [];
            }
            return view('admin.userpackage.index',compact('packages'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        if (Gate::allows('User')) {
            $member = Member::where('member_id',Auth::user()->id)->first();
            $package = UserPackage::where('slug',$slug)->with('package.screening')->first();
            $screenings = [];
            $date = $package->payment_date;
            foreach($package->package->screening as $item){
                $screenings[$item->screening] = Carbon::parse($date)->addMonths(12/$package->package->visits);
                $date = $screenings[$item->screening];
            }
            $remaining = Carbon::now()->diffInDays($package->expiry_date, false); 
            if($remaining <= 0){
                $remaining = 0;
            }
            $total = Carbon::parse($package->expiry_date)->diffInDays($package->payment_date);
            $completed = $total-$remaining;
           // return $package;
            return view('admin.userpackage.show',compact('package','remaining','completed','member','screenings'));
        } else {

            return view('viewnotfound');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPackage $userPackage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserPackage $userPackage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPackage  $userPackage
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPackage $userPackage)
    {
        //
    }

    public function payment($slug, Request $request){
        if (Gate::allows('User')) {
            $package = UserPackage::where('slug',$slug)->first();
            $package->status = 1;
            $package->payment_date = Carbon::now();
            $package->payment_interval = $request->payment_interval;
            if($package->payment_interval == 'Monthly'){
                $package->expiry_date = Carbon::now()->addMonth();
            }
            elseif($package->payment_interval == 'Quarterly'){
                $package->expiry_date = Carbon::now()->addMonths(3);
            }
            elseif($package->payment_interval == 'Half Yearly'){
                $package->expiry_date = Carbon::now()->addMonths(6);
            }
            elseif($package->payment_interval == 'Yearly'){
                $package->expiry_date = Carbon::now()->addMonths(12);
            }
            $package->update();
            return redirect()->back()->with('success','Payment Completed and Package Booked.');
        } else {
            return view('viewnotfound');
        }
    }
}
