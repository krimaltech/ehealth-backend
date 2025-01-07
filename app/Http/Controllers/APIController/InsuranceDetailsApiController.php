<?php

namespace App\Http\Controllers\APIController;

use App\Http\Controllers\Controller;
use App\Models\InsuranceClaim;
use App\Models\PackageInsuranceDetail;
use Illuminate\Support\Facades\Auth;

class InsuranceDetailsApiController extends Controller
{
    public function index(){
        $insurance = PackageInsuranceDetail::where('user_id',Auth::user()->id)->with('userpackage.package.coverage.insurancetype')->first();
        //return $insurance;
        if($insurance != null){
            $details = new \stdClass;
            $details->id = $insurance->id;
            $details->total = $insurance->userpackage->package->coverage->sum('amount');
            $claimed = InsuranceClaim::where('user_id',Auth::user()->id)->where('userpackage_id',$insurance->userpackage_id)->where('insurance_status','Claim Settelled')->get()->sum('claim_amount');
            $details->claimed = $claimed;
            $details->remaining = $details->total - $claimed;
            $claiminsurance = [];
            $count = 0;
            $claim = InsuranceClaim::where('user_id',Auth::user()->id)->where('userpackage_id',$insurance->userpackage_id)->where('insurance_status','Claim Settelled')->with('insurance')->get()->groupBy('insurance.id');
            $i = 1;
            foreach($insurance->userpackage->package->coverage as $type){
                if(in_array($type->id,array_keys($claim->toArray()))){
                    $claim_amount = 0;
                    $claiminsurance[$count]['id'] = $i++;
                    $claiminsurance[$count]['type'] = $type->insurancetype->type;
                    foreach($claim[$type->id] as $item){
                        $claim_amount += $item->claim_amount;
                    }
                    $claiminsurance[$count]['total'] = (int)$type->amount;
                    $claiminsurance[$count]['claimed'] = $claim_amount;
                    $claiminsurance[$count]['remaining'] = $type->amount - $claim_amount;
                    $count++;
                }else{
                    $claiminsurance[$count]['id'] = $i++;
                    $claiminsurance[$count]['type'] = $type->insurancetype->type;
                    $claiminsurance[$count]['total'] = (int)$type->amount;
                    $claiminsurance[$count]['claimed'] =  0;
                    $claiminsurance[$count]['remaining'] = (int)$type->amount;
                    $count++;
                }
            }
            $details->insurance = $claiminsurance;
            
            return response()->json($details);
        }else{   
            return response()->json(['message' => [
                'error' => ['Activated Insurance Unavailable']
            ]],400);
        }   
    }
}
