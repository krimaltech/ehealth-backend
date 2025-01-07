<?php

namespace App\Http\Controllers;

use App\Models\BookLabtest;
use App\Models\BookLabtestReport;
use App\Models\Employee;
use App\Models\LabTest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookLabtestController extends Controller
{
    protected $random;

    public function __construct()
    {
        $this->random = substr(str_shuffle("0123456789"), 0, 6);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::any(['SuperAdmin', 'Admin'])) {
            $bookings = BookLabtest::with(['member.user','lab.user','labprofile.labtest','labtest'])->get();
            $labs = Employee::with('user')->whereHas('user',function($query){
                $query->where('is_verified',1)->where('subrole',2);
            })->get();
            $report = [];
            foreach($bookings as $book){
                $report[$book->id] = BookLabtestReport::where('book_id',$book->id)->count();
            }
            return view('admin.labtestbookings.index',compact('bookings','labs','report'));
        }
        elseif(Gate::allows('Lab Technician')){
            $lab = Employee::where('employee_id',Auth::user()->id)->first();
            $bookings = BookLabtest::with(['member.user','labprofile.labtest','labtest'])->where('labtechnician_id',$lab->id)->where('status',1)->get();
            $report = [];
            foreach($bookings as $book){
                $report[$book->id] = BookLabtestReport::where('book_id',$book->id)->count();
            }
            return view('admin.labtestbookings.index',compact('bookings','report'));
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
    public function create($id)
    {
        if (Gate::allows('Lab Technician')) {
            $bookings = BookLabtest::with(['member.user','labprofile.labtest','labtest'])->find($id);
            //return $bookings;
            return view('admin.labtestbookings.create',compact('bookings'));
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
        //return $request;
        if($request->labtest_id){
            foreach ($request->labtest_id as $key=>$t) {               
                if($request->test_result_type[$key] == 'Range'){
                    $test = new BookLabtestReport();
                    $test->book_id = $request->book_id;
                    $test->labtest_id = $t;
                    foreach( $request->min_range as $value=>$val){
                        if($key == $value){
                            $test->min_range = $val;
                        }
                    }
                    foreach( $request->max_range as $value=>$val){
                        if($key == $value){
                            $test->max_range = $val;
                        }
                    }
                    foreach( $request->value as $value=>$val){
                        if($key == $value){
                            $test->value = $val;
                        }
                    }
                    $test->save();
                }else if($request->test_result_type[$key] == 'Value'){
                    if(array_key_exists($key,$request->labvalue_id) && array_key_exists($key,$request->result)){
                        foreach($request->labvalue_id[$key] as $labvaluekey => $labvalue){
                            $test = new BookLabtestReport();
                            $test->book_id = $request->book_id;
                            $test->labtest_id = $t;
                            $test->labvalue_id = $labvalue;
                            $test->result = $request->result[$key][$labvaluekey];
                            $test->save();
                        }
                    }
                }else if($request->test_result_type[$key] == 'Value and Image'){
                    if(array_key_exists($key,$request->labvalue_id) && array_key_exists($key,$request->result)){
                        foreach($request->labvalue_id[$key] as $labvaluekey => $labvalue){
                            $test = new BookLabtestReport();
                            $test->book_id = $request->book_id;
                            $test->labtest_id = $t;
                            $test->labvalue_id = $labvalue;
                            $test->result = $request->result[$key][$labvaluekey];
                            $test->save();
                        }
                    }
                    $test = new BookLabtestReport();
                    $test->book_id = $request->book_id;
                    $test->labtest_id = $t;
                    if (array_key_exists($key,$request->report)) {
                        $fileNameExt = $request->file('report')[$key]->getClientOriginalName();
                        $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
                        $fileExt = $request->file('report')[$key]->getClientOriginalExtension();
                        $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
                        $request->file('report')[$key]->storeAs('public/images', $fileNameToStore);
                        $pathToStore =  asset('storage/images/'.$fileNameToStore);
                        $test->report_path = $pathToStore;
                        $test->report = $fileNameToStore;
                    }
                    $test->save();
                }else if($request->test_result_type[$key] == 'Image'){
                    $test = new BookLabtestReport();
                    $test->book_id = $request->book_id;
                    $test->labtest_id = $t;
                    if (array_key_exists($key,$request->report)) {
                        $fileNameExt = $request->file('report')[$key]->getClientOriginalName();
                        $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
                        $fileExt = $request->file('report')[$key]->getClientOriginalExtension();
                        $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
                        $request->file('report')[$key]->storeAs('public/images', $fileNameToStore);
                        $pathToStore =  asset('storage/images/'.$fileNameToStore);
                        $test->report_path = $pathToStore;
                        $test->report = $fileNameToStore;
                    }
                    $test->save();
                }
            }
        }else{
            if($request->test_result_type == 'Range'){
                $test = new BookLabtestReport();
                $test->book_id = $request->book_id;
                $test->min_range = $request->min_range;
                $test->max_range = $request->max_range;
                $test->value = $request->value;
                $test->save();
            }
            else if($request->test_result_type == 'Value'){
                foreach ($request->labvalue_id as $key => $labvalue) {
                    $test = new BookLabtestReport();
                    $test->book_id = $request->book_id;
                    $test->labvalue_id = $labvalue;
                    foreach( $request->result as $value=>$val){
                        if($key == $value){
                            $test->result = $val;
                        }
                    }
                    $test->save();
                }
            }
            else if($request->test_result_type == 'Value and Image'){
                foreach ($request->labvalue_id as $key => $labvalue) {
                    $test = new BookLabtestReport();
                    $test->book_id = $request->book_id;
                    $test->labvalue_id = $labvalue;
                    foreach( $request->result as $value=>$val){
                        if($key == $value){
                            $test->result = $val;
                        }
                    }
                    $test->save();
                }
                $test = new BookLabtestReport();
                $test->book_id = $request->book_id;
                if ($request->hasFile('report')) {
                    $fileNameExt = $request->file('report')->getClientOriginalName();
                    $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
                    $fileExt = $request->file('report')->getClientOriginalExtension();
                    $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
                    $request->file('report')->storeAs('public/images', $fileNameToStore);
                    $pathToStore =  asset('storage/images/'.$fileNameToStore);
                    $test->report_path = $pathToStore;
                    $test->report = $fileNameToStore;
                }
                $test->save();
            }
            else if($request->test_result_type == 'Image'){
                $test = new BookLabtestReport();
                $test->book_id = $request->book_id;
                if ($request->hasFile('report')) {
                    $fileNameExt = $request->file('report')->getClientOriginalName();
                    $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
                    $fileExt = $request->file('report')->getClientOriginalExtension();
                    $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
                    $request->file('report')->storeAs('public/images', $fileNameToStore);
                    $pathToStore =  asset('storage/images/'.$fileNameToStore);
                    $test->report_path = $pathToStore;
                    $test->report = $fileNameToStore;
                }
                $test->save();
            }
        }

        $book = BookLabtest::find($request->book_id);
        $book->booking_status = 'Completed';
        $book->report_date = Carbon::now();
        $book->update();
        return redirect()->route('labtestbookings.index')->with('success','Lab Report Added Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookLabtest  $bookLabtest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::any(['SuperAdmin', 'Admin', 'Lab Technician'])) {
            $bookings = BookLabtest::with(['member.user','labprofile.labtest','labtest'])->find($id);
            if($bookings->labprofile_id != null){
                $reports = BookLabtestReport::where('book_id',$id)->with(['labvalue','labtest'])->get()->groupBy(['labtest.test_result_type','labtest_id']);
            }else{
                $reports = BookLabtestReport::where('book_id',$id)->with('labvalue')->get();
            }
            $labtests = LabTest::get()->keyBy('id');
            //return $reports;
            return view('admin.labtestbookings.show',compact('bookings','reports','labtests'));
        }
        else {
            return view('viewnotfound');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookLabtest  $bookLabtest
     * @return \Illuminate\Http\Response
     */
    public function edit(BookLabtest $bookLabtest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookLabtest  $bookLabtest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookLabtest $bookLabtest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookLabtest  $bookLabtest
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookLabtest $bookLabtest)
    {
        //
    }

    public function assignLab(Request $request,$id){
        if (Gate::any(['SuperAdmin', 'Admin'])) {
            $booking = BookLabtest::find($id);
            $booking->labtechnician_id = $request->labtechnician_id;
            $updated = $booking->update();
            if($updated){
                return redirect()->back()->with('success', 'Lab Technician Assigned.');
            }
        }
        else {
            return view('viewnotfound');
        }
    }

    public function sample(Request $request,$id)
    {
        if (Gate::allows('Lab Technician')) {
            $booking = BookLabtest::find($id);
            $booking->sample_no = Carbon::parse($request->sample_date)->format('Y').'-'.$this->random;
            $booking->sample_date = Carbon::parse($request->sample_date)->format('Y-m-d H:i:s');
            $booking->booking_status = 'Sample Collected';
            $updated = $booking->update();
            if($updated){
                return redirect()->back()->with('success', 'Sample Date Added.');
            }
        }
        else {
            return view('viewnotfound');
        }
    }

}
