<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PackageFee;
use App\Rules\UniqueFamilySize;
use Illuminate\Http\Request;

class PackageFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $package = Package::find($id);
        return view('admin.packagefee.create',compact('package'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->package_id == 7 || $request->package_id == 8 || $request->package_id == 9 || $request->package_id == 10 || $request->package_id == 11){
            $min_size = $request->min_size;
            $max_size = $request->max_size;
            $registration_fee = $request->registration_fee;
            $monthly_fee = $request->monthly_fee;
            $allfee = [];
            for($i = $min_size; $i <= $max_size; $i++){
                $total_registration = $i * $registration_fee;
                $fee = new PackageFee();
                $fee->package_id = $request->package_id;
                $fee->family_size = $i;
                $fee->one_registration_fee = $total_registration;
                $fee->one_monthly_fee = $monthly_fee;
                $allfee[] = $fee->attributesToArray();
            }
            $saved  = PackageFee::insert($allfee);
        }
        else{
            $request->validate([
                'family_size' => ['array', new UniqueFamilySize],
            ]);
            $count = count($request->family_size);
            for($i = 0; $i < $count ; $i++){
                $fee = new PackageFee();
                $fee->package_id = $request->package_id;
                $fee->family_size = $request->family_size[$i];
                $fee->one_registration_fee = $request->one_registration_fee[$i];
                $fee->one_monthly_fee = $request->one_monthly_fee[$i];
                $saved = $fee->save();
            }    
        }   
        if($saved){
            return redirect()->route('package.index')->with('success','Fee Details Added Successfully');
        }

        //comment because of changes (continuation fee not needed)
        /* if($request->package_id == 6 || $request->package_id == 7){
                $min_size = $request->min_size;
                $max_size = $request->max_size;
                $registration_fee = $request->registration_fee;
                $monthly_fee = $request->monthly_fee;
                $allfee = [];
                for($i = $min_size; $i <= $max_size; $i++){
                    $total_registration = $i * $registration_fee;
                    $fee = new PackageFee();
                    $fee->package_id = $request->package_id;
                    $fee->family_size = $i;
                    $fee->one_registration_fee = $total_registration;
                    $fee->two_continuation_fee = $total_registration;
                    $fee->three_continuation_fee = $total_registration;
                    $fee->one_monthly_fee = $monthly_fee;
                    $fee->two_monthly_fee = $monthly_fee;
                    $fee->three_monthly_fee = $monthly_fee;
                    $allfee[] = $fee->attributesToArray();
                    // $saved = $fee->save();
                }
                $saved  = PackageFee::insert($allfee);
            }
            else{
                $count = count($request->family_size);
                for($i = 0; $i < $count ; $i++){
                    $fee = new PackageFee();
                    $fee->package_id = $request->package_id;
                    $fee->family_size = $request->family_size[$i];
                    $fee->one_registration_fee = $request->one_registration_fee[$i];
                    $fee->two_continuation_fee = $request->two_continuation_fee[$i];
                    $fee->three_continuation_fee = $request->three_continuation_fee[$i];
                    $fee->one_monthly_fee = $request->one_monthly_fee[$i];
                    $fee->two_monthly_fee = $request->two_monthly_fee[$i];
                    $fee->three_monthly_fee = $request->three_monthly_fee[$i];
                    $saved = $fee->save();
                }    
            }   
            if($saved){
                return redirect()->route('package.index')->with('success','Fee Details Added Successfully');
            }
        */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PackageFee  $packageFee
     * @return \Illuminate\Http\Response
     */
    public function show(PackageFee $packageFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PackageFee  $packageFee
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);
        $fee = PackageFee::where('package_id',$id)->get();
        return view('admin.packagefee.edit',compact('package','fee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PackageFee  $packageFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request )
    { 
        if($request->package_id == 7 || $request->package_id == 8 || $request->package_id == 9 || $request->package_id == 10 || $request->package_id == 11){
            $monthly_fee = $request->monthly_fee;
            $registration_fee = $request->registration_fee;
            $fees = PackageFee::where('package_id',$request->package_id)->get();
            foreach($fees as $item){
                $total_registration = $item->family_size * $registration_fee;
                $item->one_registration_fee = $total_registration;
                $item->one_monthly_fee = $monthly_fee;
                $saved = $item->update();
            }
        }else{
            $request->validate([
                'family_size' => ['array', new UniqueFamilySize],
            ]);
            foreach($request->family_size as $key=>$size){
                $fee = PackageFee::find($key);
                $fee->package_id = $request->package_id;
                $fee->family_size = $size;
                foreach($request->one_registration_fee as $registration => $value){
                    if($key == $registration){
                        $fee->one_registration_fee = $value;
                    }
                }
                foreach($request->one_monthly_fee as $monthly => $val){
                    if($key == $monthly){
                        $fee->one_monthly_fee = $val;
                    }
                }
                $saved = $fee->save();
            }
            if($request->new_family_size){
                $count = count($request->new_family_size);
                for($i = 0; $i < $count ; $i++){
                    $fee = new PackageFee();
                    $fee->package_id = $request->package_id;
                    $fee->family_size = $request->new_family_size[$i];
                    $fee->one_registration_fee = $request->new_one_registration_fee[$i];
                    $fee->one_monthly_fee = $request->new_one_monthly_fee[$i];
                    $saved = $fee->save();
                }    
            }
        }
        if($saved){
            return redirect()->route('package.index')->with('success','Fee Details Updated Successfully');
        }
        //comment because of changes (continuation fee not needed)
        // if($request->package_id == 6 || $request->package_id == 7){
        //     $monthly_fee = $request->monthly_fee;
        //     $saved = PackageFee::where('package_id',$request->package_id)->update(['one_monthly_fee' => $monthly_fee,'two_monthly_fee' => $monthly_fee,'three_monthly_fee' => $monthly_fee]);
        // }else{
        //     foreach($request->family_size as $key=>$size){
        //         $fee = PackageFee::find($key);
        //         $fee->package_id = $request->package_id;
        //         $fee->family_size = $size;
        //         foreach($request->one_registration_fee as $registration => $value){
        //             if($key == $registration){
        //                 $fee->one_registration_fee = $value;
        //             }
        //         }
        //         foreach($request->two_continuation_fee as $continuation => $value){
        //             if($key == $continuation){
        //                 $fee->two_continuation_fee = $value;
        //             }
        //         }
        //         foreach($request->three_continuation_fee as $continuation => $value){
        //             if($key == $continuation){
        //                 $fee->three_continuation_fee = $value;
        //             }
        //         }
        //         foreach($request->one_monthly_fee as $monthly => $val){
        //             if($key == $monthly){
        //                 $fee->one_monthly_fee = $val;
        //             }
        //         }
        //         foreach($request->two_monthly_fee as $monthly => $val){
        //             if($key == $monthly){
        //                 $fee->two_monthly_fee = $val;
        //             }
        //         }
        //         foreach($request->three_monthly_fee as $monthly => $val){
        //             if($key == $monthly){
        //                 $fee->three_monthly_fee = $val;
        //             }
        //         }
        //         $saved = $fee->save();
        //     }
        // }
        // if($saved){
        //     return redirect()->route('package.index')->with('success','Fee Details Updated Successfully');
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PackageFee  $packageFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(PackageFee $packageFee)
    {
        //
    }
}
