<?php

namespace App\Http\Controllers;

use App\Models\IncentiveManager;
use App\Models\SubRole;
use App\Models\UserUserPackage;
use Illuminate\Http\Request;

class IncentiveManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $incentiveManager = IncentiveManager::with('incentivereceiver')->get();
        return view('admin.incentive.index', compact('incentiveManager'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $incetiveReceiver = SubRole::whereIn('id', [11, 12])->get();
        return view('admin.incentive.create', compact('incetiveReceiver'));
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
            'incentive_receiver' => 'required',
            'incentive_percentage' => 'required',
            'minimum' => 'required',
            'package_type' => 'required',
            'maximum' => 'required',
        ]);
        $incentiveManager = new IncentiveManager();
        $incentiveManager->incentive_receiver  = $request->incentive_receiver;
        $incentiveManager->incentive_percentage  = $request->incentive_percentage;
        $incentiveManager->minimum  = $request->minimum;
        $incentiveManager->package_type  = $request->package_type;
        $incentiveManager->maximum  = $request->maximum;
        $incentiveManager->save();
        return redirect()->route('incentive.index')->with('success', 'Incentive Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\IncentiveManager  $incentiveManager
     * @return \Illuminate\Http\Response
     */
    public function familyReferredDetails(Request $request)
    {
        $start = $request->start;
        $end = $request->end;
        if ($start && $end) {
            $incentiveManager = UserUserPackage::where('status', 'unpaid')->with('user.referrer.subroles', 'package_name.package', 'package_name.payment')->whereBetween('created_at', [$start, $end])->whereHas('user', function ($query) {
                $query->where('referrer_id', auth()->user()->id);
            })->get();
        } else {
            $incentiveManager = UserUserPackage::where('status', 'unpaid')->with('user.referrer.subroles', 'package_name.package', 'package_name.payment')->whereHas('user', function ($query) {
                $query->where('referrer_id', auth()->user()->id);
            })->get();
        }
        return view('admin.incentivecalculation.show', compact('incentiveManager', 'start', 'end'));
    }

    public function familyReferredDetail(Request $request, $id)
    {

        if (IncentiveManager::exists()) {
            $start = $request->start;
            $end = $request->end;
            if ($start && $end) {
                $incentiveManager = UserUserPackage::where('status', 'unpaid')->with('user.referrer.subroles', 'package_name.package', 'package_name.payment')->whereBetween('created_at', [$start, $end])->whereHas('user', function ($query) use ($id) {
                    $query->where('referrer_id', $id);
                })->get();
            } else {
                $incentiveManager = UserUserPackage::where('status', 'unpaid')->with('user.referrer.subroles', 'package_name.package', 'package_name.payment')->whereHas('user', function ($query) use ($id) {
                    $query->where('referrer_id', $id);
                })->get();
            }

            //Family Incentive calculation
            $first_incentiveCalculation = UserUserPackage::where('package_type', 'individual')->where('status', 'unpaid')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->take(10)->get();
            $first_individual = 0;
            foreach ($first_incentiveCalculation as $item) {
                if ($item->package_type == 'individual') {
                    $first_individual = $first_individual + $item->incentive_amount;
                }
            }
            $second_incentiveCalculation = UserUserPackage::where('package_type', 'individual')->where('status', 'unpaid')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->skip(10)->take(25)->get();
            $second_individual = 0;
            foreach ($second_incentiveCalculation as $item) {
                if ($item->package_type == 'individual') {
                    $second_individual = $second_individual + $item->incentive_amount;
                }
            }

            $third_incentiveCalculation = UserUserPackage::where('package_type', 'individual')->where('status', 'unpaid')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->skip(35)->take(10)->get();
            $third_individual = 0;
            foreach ($third_incentiveCalculation as $item) {
                if ($item->package_type == 'individual') {
                    $third_individual = $third_individual + $item->incentive_amount;
                }
            }
            $fourth_incentiveCalculation = UserUserPackage::where('package_type', 'individual')->where('status', 'unpaid')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->skip(45)->take(8)->get();
            $fourth_individual = 0;
            foreach ($fourth_incentiveCalculation as $item) {
                if ($item->package_type == 'individual') {
                    $fourth_individual = $fourth_individual + $item->incentive_amount;
                }
            }
            $fifth_incentiveCalculation = UserUserPackage::where('package_type', 'individual')->where('status', 'unpaid')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->skip(53)->take(1000)->get();
            $fifth_individual = 0;
            foreach ($fifth_incentiveCalculation as $item) {
                if ($item->package_type == 'individual') {
                    $fifth_individual = $fifth_individual + $item->incentive_amount;
                }
            }

            $individual_first = UserUserPackage::where('package_type', 'individual')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->take(10)->get()->count();

            $individual_second = UserUserPackage::where('package_type', 'individual')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->skip(10)->take(25)->get()->count();
            $minimun_second = $individual_second + 10;

            $individual_third = UserUserPackage::where('package_type', 'individual')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->skip(35)->take(10)->get()->count();
            $minimun_third = $individual_third + 35;

            $individual_fourth = UserUserPackage::where('package_type', 'individual')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->skip(45)->take(8)->get()->count();
            $minimun_fourth = $individual_fourth + 45;

            $individual_fifth = UserUserPackage::where('package_type', 'individual')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->skip(53)->take(1000)->get()->count();
            $minimun_fifth = $individual_fifth + 54;

            $first_incentive_individual = IncentiveManager::where('package_type','individual')->where('minimum', '>=', $individual_first)->orWhere('maximum', '>=', $individual_first)->first();
            $second_incentive_individual = IncentiveManager::where('package_type','individual')->where('minimum', '>=', $minimun_second)->orWhere('maximum', '>=', $minimun_second)->first();
            $third_incentive_individual = IncentiveManager::where('package_type','individual')->where('minimum', '>=', $minimun_third)->orWhere('maximum', '>=', $minimun_third)->first();
            $fourth_incentive_individual = IncentiveManager::where('package_type','individual')->where('minimum', '>=', $minimun_fourth)->orWhere('maximum', '>=', $minimun_fourth)->first();
            $fifth_incentive_individual = IncentiveManager::where('package_type','individual')->where('minimum', '>=', $minimun_fifth)->orWhere('maximum', '>=', $minimun_fifth)->first();


            if ($individual_first <= 10) {
                $amount_individual_first = $first_individual * $first_incentive_individual->incentive_percentage / 100;
            }
            if ($individual_second <= 35) {
                $second_percentage = $individual_second * $second_incentive_individual->incentive_percentage;
                $second_total_amount = $second_percentage / 100;
                $add_second_total_amount = 0.4 + $second_total_amount;
                $amount_individual_second = $add_second_total_amount * $second_individual;
            }
            if ($individual_third <= 45) {
                $third_percentage =  $individual_third * $third_incentive_individual->incentive_percentage;
                $third_total_amount = 0.05 + 0.4 + $third_percentage / 100;
                $amount_individual_third = $third_total_amount * $third_individual;
            }
            if ($individual_fourth <= 53) {
                $fourth_percentage = $individual_fourth * $fourth_incentive_individual->incentive_percentage;
                $fourth_total_amount = 0.04 + 0.05 + 0.4 + $fourth_percentage / 100;
                $amount_individual_fourth = $fourth_total_amount * $fourth_individual;
            }

            if ($individual_fifth < 1000) {
                $fifth_percentage = $individual_fifth * $fifth_incentive_individual->incentive_percentage;
                $fifth_total_amount = 53 / 100;
                $amount_individual_fifth = $fifth_total_amount * $fifth_individual;
            }
            $total_amount_calculated_individual = $amount_individual_first + $amount_individual_second + $amount_individual_third + $amount_individual_fourth + $amount_individual_fifth;

            //Corporate Incentive Calculation
            $first_incentiveCalculation_corporate = UserUserPackage::where('package_type', 'corporate')->where('status', 'unpaid')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->take(5)->get();
            $first_corporate = 0;
            foreach ($first_incentiveCalculation_corporate as $item) {
                if ($item->package_type == 'corporate') {
                    $first_corporate = $first_corporate + $item->incentive_amount;
                }
            }

            $second_incentiveCalculation_corporate = UserUserPackage::where('package_type', 'corporate')->where('status', 'unpaid')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->skip(5)->take(10)->get();
            $second_corporate = 0;
            foreach ($second_incentiveCalculation_corporate as $item) {
                if ($item->package_type == 'corporate') {
                    $second_corporate = $second_corporate + $item->incentive_amount;
                }
            }
            
            $third_incentiveCalculation_corporate = UserUserPackage::where('package_type', 'corporate')->where('status', 'unpaid')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->skip(15)->take(10)->get();
            $third_corporate = 0;
            foreach ($third_incentiveCalculation_corporate as $item) {
                if ($item->package_type == 'corporate') {
                    $third_corporate = $third_corporate + $item->incentive_amount;
                }
            }
            
            $fourth_incentiveCalculation_corporate = UserUserPackage::where('package_type', 'corporate')->where('status', 'unpaid')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->skip(25)->take(1000)->get();
            $fourth_corporate = 0;
            foreach ($fourth_incentiveCalculation_corporate as $item) {
                if ($item->package_type == 'corporate') {
                    $fourth_corporate = $fourth_corporate + $item->incentive_amount;
                }
            }

            $corporate_first = UserUserPackage::where('package_type', 'corporate')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->take(5)->get()->count();

            $corporate_second = UserUserPackage::where('package_type', 'corporate')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->skip(5)->take(10)->get()->count();

            $corporate_third = UserUserPackage::where('package_type', 'corporate')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->skip(15)->take(10)->get()->count();

            $corporate_fourth = UserUserPackage::where('package_type', 'corporate')->with('user.referrer')->whereHas('user', function ($query) use ($id) {
                $query->where('referrer_id', $id);
            })->skip(25)->take(1000)->get()->count();

            if ($corporate_first <= 5) {
                $amount_corporate_first = $first_corporate * 0.04;
            }
            if ($corporate_second <= 15) {
                $second_percentage_corporate = $corporate_second * 0.1;
                $second_total_amount_corporate = $second_percentage_corporate + 4;
                $second_total_amount_divide = $second_total_amount_corporate / 100;
                $amount_corporate_second = $second_total_amount_divide * $second_corporate;
            }
            if ($corporate_third <= 25) {
                $third_percentage_corporate = $corporate_third * 0.1;
                $third_total_amount_corporate = $third_percentage_corporate + 5;
                $third_total_amount_divide = $third_total_amount_corporate / 100;
                $amount_corporate_third = $third_total_amount_divide * $third_corporate;
            }
            if ($corporate_fourth <= 1000) {
                $fourth_total_amount_divide = 7 / 100;
                $amount_corporate_fourth = $fourth_total_amount_divide * $fourth_corporate;
            }

            $total_amount_calculated_corporate = $amount_corporate_first + $amount_corporate_second + $amount_corporate_third + $amount_corporate_fourth;
            return view('admin.incentivecalculation.payment', compact('incentiveManager', 'start', 'end', 'id', 'total_amount_calculated_individual','total_amount_calculated_corporate'));
        } else {
            return redirect()->route('incentive.index')->withErrors('Fill The Incentie Percentage First.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IncentiveManager  $incentiveManager
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $incetiveReceiver = SubRole::whereIn('id', [11, 12])->get();
        $incentiveManager = IncentiveManager::findOrFail($id);
        return view('admin.incentive.edit', compact('incentiveManager', 'incetiveReceiver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IncentiveManager  $incentiveManager
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'incentive_receiver' => 'required',
            'incentive_percentage' => 'required',
            'minimum' => 'required',
        ]);
        $incentiveManager = IncentiveManager::with('incentivereceiver')->find($id);
        $incentiveManager->incentive_receiver  = $request->incentive_receiver;
        $incentiveManager->incentive_percentage  = $request->incentive_percentage;
        $incentiveManager->minimum  = $request->minimum;
        $incentiveManager->package_type  = $request->package_type;
        $incentiveManager->maximum  = $request->maximum;

        $incentiveManager->save();
        return redirect()->route('incentive.index')->with('success', 'Incentive Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IncentiveManager  $incentiveManager
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncentiveManager $incentiveManager)
    {
        //
    }

    public function calculationIndex(IncentiveManager $incentiveManager)
    {
        $incentiveManager = UserUserPackage::with('user', 'package_name.package')->get();
        return view('admin.incentivecalculation.index', compact('incentiveManager'));
    }

    public function familyReferred()
    {
        $incentiveManager = UserUserPackage::with('user.referrer', 'package_name.package', 'package_name.payment')->whereHas('user', function ($query) {
            $query->where('referrer_id', auth()->user()->id);
        })->get();
        return view("admin.incentivecalculation.referred", compact('incentiveManager'));
    }

    public function myRofamilyReferred()
    {
        $incentiveManager = UserUserPackage::with('user.referrer', 'package_name.package', 'package_name.payment')->whereHas('user', function ($query) {
            $query->where('referrer_id', "!=", NULL);
        })->get();
        return view("admin.incentivecalculation.ms", compact('incentiveManager'));
    }
    public function familyReferredSingle($id)
    {
        $incentiveManager = UserUserPackage::with('user.referrer.subroles', 'package_name.package', 'package_name.payment')->findOrFail($id);
        if (
            $incentiveManager->package_name->package->package_type == "Basic Membership" ||
            $incentiveManager->package_name->package->package_type == "Silver Membership" ||
            $incentiveManager->package_name->package->package_type == "Gold Membership" ||
            $incentiveManager->package_name->package->package_type == "Platinum Membership" ||
            $incentiveManager->package_name->package->package_type == "VIP Membership"
        ) {
            $incentive = IncentiveManager::where('package_type', "individual")->first();
        } else {
            $incentive = IncentiveManager::where('package_type', "corporate")->first();
        }
        return view("admin.incentivecalculation.singlefamily", compact('incentiveManager', 'incentive'));
    }
}
