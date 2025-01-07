<?php

namespace App\Http\Controllers;

use App\Mail\CampaignMail;
use App\Models\Campaign;
use App\Models\CampaignUser;
use App\Models\RegisterCampaignUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;


class CampaignUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verifyPhone(Request $request){
        $user = CampaignUser::where('phone',$request->data)->get();
        if ($user->isNotEmpty()) {
            return response()->json($user);
        } else {
            return response()->json(['error' => 'User not found']);
        }
    }

    public function getProfile(Request $request){
        $user = CampaignUser::find($request->data);
        return response()->json($user);
    }

    public function index()
    {
        $campaignUser = RegisterCampaignUser::with(['campaignuser','campaign'])->whereHas('campaign',function($query){
            $query->where('status',1);
        })->latest()->get();
        $status = 1;
        return view('admin.campaignUsers.index',compact('campaignUser','status'));
    }

    public function completedCampaignUsers(Request $request)
    {
        $campaign = Campaign::where('status',0)->latest()->get();
        $status = 0;       
        if($request->title || $request->start_date || $request->end_date || $request->address || $request->status){
            $title = $request->title;
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $address = $request->address;
            $stat = $request->status;
            $campaignUser = RegisterCampaignUser::with(['campaignuser','campaign'])
                ->whereHas('campaign',function($query){
                    $query->where('status',0);
                })
                ->when($title, function ($query) use ($title) {
                    return $query->where('campaign_id', $title);
                })
                ->when($start_date && $end_date, function ($query) use ($start_date,$end_date) {
                    return $query->whereDate('created_at', '>=', $start_date)->whereDate('created_at', '<=', $end_date);
                })
                ->when($address, function ($query) use ($address) {
                    return $query->whereHas('campaignuser',function($q) use($address){
                        $q->where('address','like', '%' . $address . '%');
                    });
                })
                ->when($stat, function ($query) use ($stat) {
                    return $query->where('status', $stat);
                })
                ->latest()->get();
        }else{
            $title = null;
            $start_date = null;
            $end_date = null;
            $address = '';
            $stat = '';
            $campaignUser = RegisterCampaignUser::with(['campaignuser','campaign'])->whereHas('campaign',function($query){
                $query->where('status',0);
            })->latest()->get();
        }
        return view('admin.campaignUsers.index',compact('campaignUser','status','campaign','title','start_date','end_date','address','stat'));       
    }

    public function create()
    {
        $campaign = Campaign::where('status',1)->latest()->get();
        return view('admin.campaignUsers.create',compact('campaign'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'campaign_id' => 'required'
        ]);

        if($request->campaign_user_id != null){
            $existing_register = RegisterCampaignUser::where('campaign_id', $request->campaign_id)->where('campaign_user_id',$request->campaign_user_id)->first();
            if($existing_register){
                return redirect()->back()->with('error','User already registered in the campaign');
            }else{
                $register =  new RegisterCampaignUser();
                $register->campaign_id = $request->campaign_id;
                $register->status = 1;
                $register->campaign_user_id = $request->campaign_user_id;
                $check_data = RegisterCampaignUser::where('campaign_id',$request->campaign_id)->exists();
                $campaign = Campaign::find($request->campaign_id);
                if ($check_data) {
                    $lastId = RegisterCampaignUser::where('campaign_id',$request->campaign_id)->orderBy('id', 'desc')->first()->user_name;
                    $lastIncreament = explode("-", $lastId);
                    $integerId = end($lastIncreament);
                    $intIds = $integerId + 1;
                    $register->user_name = 'CAMPAIGN-'. $campaign->campaign_no .'-' . $intIds;
                } else {
                    $register->user_name = 'CAMPAIGN-'. $campaign->campaign_no .'-' . 1;
                }
                $register->save();
            }
        }else{
            $campaignUser = new CampaignUser();       
            $campaignUser->first_name = $request->first_name;
            $campaignUser->middle_name = $request->middle_name;
            $campaignUser->last_name = $request->last_name;
            if($request->middle_name){
                $campaignUser->name =  $request->first_name . ' ' . $request->middle_name . " " . $request->last_name;
            }else{
                $campaignUser->name =  $request->first_name . " " . $request->last_name;
            }
            $campaignUser->gender = $request->gender;
            $campaignUser->dob = $request->dob;
            $campaignUser->dob_bs = $request->dob_bs;
            $campaignUser->email = $request->email;
            $campaignUser->phone = $request->phone;
            $campaignUser->address = $request->address;
            $campaignUser->parent_id = $request->parent_id;
            $campaignUser->class = $request->class;
            $campaignUser->user_type = $request->user_type;
            $campaignUser->occupation = $request->occupation;
            $saved = $campaignUser->save();

            $register =  new RegisterCampaignUser();
            $register->campaign_id = $request->campaign_id;
            $register->campaign_user_id = $campaignUser->id;
            $register->status = 1;
            $check_data = RegisterCampaignUser::where('campaign_id',$request->campaign_id)->exists();
            $campaign = Campaign::find($request->campaign_id);
            if ($check_data) {
                $lastId = RegisterCampaignUser::where('campaign_id',$request->campaign_id)->orderBy('id', 'desc')->first()->user_name;
                $lastIncreament = explode("-", $lastId);
                $integerId = end($lastIncreament);
                $intIds = $integerId + 1;
                $register->user_name = 'CAMPAIGN-'. $campaign->campaign_no .'-' . $intIds;
            } else {
                $register->user_name = 'CAMPAIGN-'. $campaign->campaign_no .'-' . 1;
            }
            $register->save();
        }

        return redirect()->route('campaignusers.index')->with('success','Campaign User Added Successsfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CampaignUser  $campaignUser
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $screening = RegisterCampaignUser::with(['campaignuser','campaign','nurse','doctor','ophthalmologist','dentist','dietician','physio'])->find($id);
        // return $screening;
        return view('admin.campaignUsers.show',compact('screening'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CampaignUser  $campaignUser
     * @return \Illuminate\Http\Response
     */
    public function edit(CampaignUser $campaignUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CampaignUser  $campaignUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CampaignUser $campaignUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CampaignUser  $campaignUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(CampaignUser $campaignUser)
    {
        //
    }

    public function generateReport(Request $request){
        $ids =  explode(",", $request->ids);
        foreach($ids as $id){
            $screening = RegisterCampaignUser::with([
                        'campaignuser', 'campaign', 'nurse.doctor.user',
                        'doctor.doctor.user', 'ophthalmologist.doctor.user', 
                        'dentist.doctor.user', 'dietician.doctor.user', 
                        'physio.doctor.user'])
                        ->find($id);
            $name = str_replace(' ','-',$screening->campaignuser->name);
            $pdf = Pdf::loadView('admin.campaignUsers.report', compact('screening'));
            Storage::put('public/pdf/'.$screening->user_name.'-'.$name.'.pdf', $pdf->output());
            $screening->pdf = $screening->user_name.'-'.$name.'.pdf';
            $screening->pdf_path = asset('storage/pdf/'.$screening->user_name.'-'.$name.'.pdf'); 
            $screening->status = 2;
            $screening->save();

            if($screening->campaignuser->email){
                $mailData = [
                    'body' => $screening->campaign->title .' Screening Report',
                    'pdf' => $screening->pdf_path
                ];
                $pdf = 'public/pdf/' . $screening->pdf;
                Mail::to($screening->campaignuser->email)->send(new CampaignMail($mailData, $pdf));
            }
        } 
        return response()->json(['success' => 'Report Generated Successfully.']);
    }

    public function sendReportEmail($id){
        $screening = RegisterCampaignUser::find($id);
        if($screening->campaignuser->email){
            $mailData = [
                'body' => $screening->campaign->title .' Screening Report',
                'pdf' => $screening->pdf_path
            ];
            $pdf = 'public/pdf/' . $screening->pdf;
            Mail::to($screening->campaignuser->email)->send(new CampaignMail($mailData, $pdf));
        }

        return redirect()->back()->with('success','Report Sent Via Email Successfully.');
    }

}
