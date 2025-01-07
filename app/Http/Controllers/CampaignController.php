<?php

namespace App\Http\Controllers;

use App\Exports\ExportRegisterCampaignUser;
use App\Models\Campaign;
use App\Models\Employee;
use App\Models\RegisterCampaignUser;
use App\Models\SwitchCampaignEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CampaignController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyzABCDEFGHIJKLMNOPQRSTVWXYZ"), 0, 3);
    }

    public function getCampaign(Request $request){
        $campaign = Campaign::with(['registercampaign' => function ($query) {
            $query->whereHas('campaignuser', function ($subquery) {
                $subquery->where('user_type', 'Parent');
            });
        },'registercampaign.campaignuser'])->find($request->data);
        return response()->json($campaign);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->data;
        $campaign = Campaign::find($id);
        $campaign->status = ($campaign->status == 1) ? 0 : 1;
        $campaign->update();
        return redirect()->back()->with('success','Campaign Completed Successfully.');
    }

    public function userList(Request $request){
        if(Auth::user()->employee->sub_role_id == 7){
            $users = RegisterCampaignUser::where('campaign_id',$request->data)->with(['campaignuser','nurse'])->get();
        }else{
            $users = RegisterCampaignUser::where('campaign_id',$request->data)->with('campaignuser',$request->type)->whereHas('nurse')->get();
        }
        return response()->json($users);
    }

    public function getProfile(Request $request){
        $user = RegisterCampaignUser::where('campaign_id',$request->campaign)->where('campaign_user_id',$request->user)->with('campaignuser')->first();
        return response()->json($user);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campaign = Campaign::with('employees')->where('status',1)->latest()->get();
        $doctor = Employee::with(['user','departments','subrole'])->where('sub_role_id',6)->where('department',1)->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        $dentist = Employee::with(['user','departments','subrole'])->where('sub_role_id',6)->where('department',2)->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        $eye = Employee::with(['user','departments','subrole'])->where('sub_role_id',6)->where('department',3)->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        $dietician = Employee::with(['user','departments','subrole'])->where('sub_role_id',18)->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        $physiotherapist = Employee::with(['user','departments','subrole'])->where('sub_role_id',6)->where('department',18)->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        $nurse = Employee::with(['user','departments','subrole'])->where('sub_role_id',7)->whereHas('user',function($query){
            $query->where('is_verified',1);
        })->get();
        $status = 1;
        return view('admin.campaign.index',compact('campaign','doctor','dentist','eye','dietician','physiotherapist','nurse', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.campaign.create');
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
            'campaign_no' => 'required|unique:campaigns',
            'campaign_type'  => 'required',
            'title' => 'required',
            'address' => 'required',
            'venue' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
        ]);

        $campaign = new Campaign();
        $campaign->campaign_no = $request->campaign_no;
        $campaign->campaign_type = $request->campaign_type;
        $campaign->title = $request->title;
        $campaign->address = $request->address;
        $campaign->venue = $request->venue;
        $campaign->description = $request->description;
        $campaign->start_date = $request->start_date;
        $campaign->end_date = $request->end_date;

        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $images = storeImageLaravel($request, 'image', 'image_path');
                $campaign->image = $images[0];
                $campaign->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $images = storeImageStorage($request, 'image', 'image_path');
                $campaign->image = $images[0];
                $campaign->image_path = $images[1];
            }
        }

        $title = str_replace(' ', '-', $request->title);
        $campaign->slug = 'campaign-' . $title . '-' . $this->random;
        $saved = $campaign->save();
        if($saved){
            return redirect()->route('campaign.index')->with('success', 'Campaign Added Successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campaign = Campaign::with(['employees.employee.user','switch.employee.user','switch.newemployee.user'])->find($id);
        return view('admin.campaign.show',compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campaign = Campaign::find($id);
        return view('admin.campaign.edit',compact('campaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'campaign_no' => 'required|unique:campaigns,campaign_no,' . $id,
            'campaign_type'  => 'required',
            'title' => 'required',
            'address' => 'required',
            'venue' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
        ]);

        $campaign = Campaign::find($id);
        $campaign->campaign_no = $request->campaign_no;
        $campaign->campaign_type = $request->campaign_type;
        $campaign->title = $request->title;
        $campaign->address = $request->address;
        $campaign->venue = $request->venue;
        $campaign->description = $request->description;
        $campaign->start_date = $request->start_date;
        $campaign->end_date = $request->end_date;

        if (env('STORAGE_TYPE') == 'native') {
            if ($request->hasFile('image')) {
                $destination = 'public/images/' . $campaign->image;
                if (Storage::exists($destination)) {
                    Storage::delete($destination);
                };
                $images = storeImageLaravel($request, 'image', 'image_path');
                $campaign->image = $images[0];
                $campaign->image_path = $images[1];
            }
        } else {
            if ($request->hasFile('image')) {
                $destination = 'images/' . $campaign->image;
                Storage::disk('minio')->delete($destination);
                $images = storeImageStorage($request, 'image', 'image_path');
                $campaign->image = $images[0];
                $campaign->image_path = $images[1];
            }
        }

        $title = str_replace(' ', '-', $request->title);
        $campaign->slug = 'campaign-' . $title . '-' . $this->random;
        $saved = $campaign->save();
        if($saved){
            return redirect()->route('campaign.index')->with('success', 'Campaign Updated Successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Campaign  $campaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Campaign $campaign)
    {
        //
    }

    public function exportUsers(Request $request){
        return Excel::download(new ExportRegisterCampaignUser, 'campaignusers.xlsx');
    }

    public function completedCampaign()
    {
        $campaign = Campaign::with('employees')->where('status',0)->latest()->get();
        $status = 0;
        return view('admin.campaign.index',compact('campaign','status'));
    }
}
