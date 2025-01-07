<?php

namespace App\Http\Controllers;

use App\Models\BookService;
use App\Models\Employee;
use App\Models\Member;
use App\Models\ServiceReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member_id = Member::where('member_id',Auth::user()->id)->pluck('id');
        $services = BookService::where('member_id',$member_id)->with('service')->get();
        return view('admin.myservice.index',compact('services'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BookService  $bookService
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = BookService::with(['service.tests','member.user'])->find($id);
        $report = ServiceReport::where('book_id',$id)->with('test')->get();
        //return $report;
        return view('admin.myservice.show',compact('service','report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BookService  $bookService
     * @return \Illuminate\Http\Response
     */
    public function edit(BookService $bookService)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BookService  $bookService
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookService $bookService)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BookService  $bookService
     * @return \Illuminate\Http\Response
     */
    public function destroy(BookService $bookService)
    {
        //
    }
    public function payment($id){
        $service = BookService::find($id);
        $service->status = 1;
        $service->booking_status = 'Scheduled';
        $service->update();
        return redirect()->back()->with('success','Payment Completed');
    }

    public function services(){
        if (Gate::any(['SuperAdmin', 'Admin'])) {
            $services = BookService::with(['service','tests.test','member.user','lab.user'])->get();
            $labs = Employee::with('user')->whereHas('user',function($query){
                $query->where('is_verified',1)->where('subrole',2);
            })->get();
            $report = [];
            foreach($services as $serv){
                $report[$serv->id] = ServiceReport::where('book_id',$serv->id)->count();
            }
            return view('admin.servicebookings.index',compact('services','report','labs'));
        }
        elseif(Gate::allows('Lab Technician')){
            $lab = Employee::where('employee_id',Auth::user()->id)->first();
            $services = BookService::with(['service','member.user'])->where('labtechnician_id',$lab->id)->where('status',1)->get();
            $report = [];
            foreach($services as $serv){
                $report[$serv->id] = ServiceReport::where('book_id',$serv->id)->count();
            }
            return view('admin.servicebookings.index',compact('services','report'));
        }
        else {
            return view('viewnotfound');
        }
    }

    public function createReport($id){
        if (Gate::allows('Lab Technician')) {
            $service = BookService::with(['service.tests','tests.test','member.user'])->find($id);
            //return $service;
            return view('admin.servicebookings.report',compact('service'));
        }
        else {
            return view('viewnotfound');
        }
    }

    public function uploadReport(Request $request){
        //return $request;
        // if($request->test_id){
            // foreach ($request->test_id as $key=>$t) {
            //     $test = new ServiceReport();
            //     $test->book_id = $request->book_id;
            //     $test->test_id = $t;
            //     foreach( $request->min_range as $value=>$val){
            //         if($key == $value){
            //             $test->min_range = $val;
            //         }
            //     }
            //     foreach( $request->max_range as $value=>$val){
            //         if($key == $value){
            //             $test->max_range = $val;
            //         }
            //     }
            //     foreach( $request->value as $value=>$val){
            //         if($key == $value){
            //             $test->value = $val;
            //         }
            //     }
            //     $test->save();
            // }
        // }
        // else{
            // $test = new ServiceReport();
            // $test->book_id = $request->book_id;
            // if ($request->hasFile('report')) {
            //     $fileNameExt = $request->file('report')->getClientOriginalName();
            //     $fileName = pathinfo($fileNameExt, PATHINFO_FILENAME);
            //     $fileExt = $request->file('report')->getClientOriginalExtension();
            //     $fileNameToStore = $fileName . '_' . time() . '.' . $fileExt;
            //     $request->file('report')->storeAs('public/images', $fileNameToStore);
            //     $pathToStore =  asset('storage/images/'.$fileNameToStore);
            //     $test->report_path = $pathToStore;
            //     $test->report = $fileNameToStore;
            // }
            // $test->save();
        // }
        if($request->test_result_type == 'Range'){
            foreach ($request->test_id as $key=>$t) {
                $test = new ServiceReport();
                $test->book_id = $request->book_id;
                $test->test_id = $t;
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
            }
        } 
        else if($request->test_result_type == 'Value'){
            foreach ($request->test_id as $key => $t) {
                $test = new ServiceReport();
                $test->book_id = $request->book_id;
                $test->test_id = $t;
                foreach ($request->result as $value => $val) {
                    if ($key == $value) {
                        $test->result = $val;
                    }
                }
                $test->save();
            }
        }
        else if($request->test_result_type == 'Value and Image'){
            foreach ($request->test_id as $key => $t) {
                $test = new ServiceReport();
                $test->book_id = $request->book_id;
                $test->test_id = $t;
                foreach ($request->result as $value => $val) {
                    if ($key == $value) {
                        $test->result = $val;
                    }
                }
                $test->save();
            }
            $test = new ServiceReport();
            $test->book_id = $request->book_id;
            if (env('STORAGE_TYPE') == 'native') {
                $test->report = storeImageLaravel($request, 'report', 'report_path')[0];
                $test->report_path = storeImageLaravel($request, 'report', 'report_path')[1];
            } else {
                $test->report = storeImageStorage($request, 'report', 'report_path')[0];
                $test->report_path = storeImageStorage($request, 'report', 'report_path')[1];
            }
            $test->save();
        }
        else if($request->test_result_type == 'Image'){
            $test = new ServiceReport();
            $test->book_id = $request->book_id;
            if (env('STORAGE_TYPE') == 'native') {
                $test->report = storeImageLaravel($request, 'report', 'report_path')[0];
                $test->report_path = storeImageLaravel($request, 'report', 'report_path')[1];
            } else {
                $test->report = storeImageStorage($request, 'report', 'report_path')[0];
                $test->report_path = storeImageStorage($request, 'report', 'report_path')[1];
            }
            $test->save();
        }
        $book = BookService::find($request->book_id);
        $book->booking_status = 'Completed';
        $book->update();
        return redirect()->route('servicebookings.index')->with('success','Test Report Added Successfully.');
    }

    public function viewReport($id){
        if (Gate::any(['SuperAdmin', 'Admin', 'Lab Technician'])) {
            $service = BookService::with(['service.tests','tests.test','member.user'])->find($id);
            $report = ServiceReport::where('book_id',$id)->with('test')->get();
            return view('admin.servicebookings.view',compact('service','report'));
        }
        else {
            return view('viewnotfound');
        }
    }

    public function assignLab(Request $request,$id){
        if (Gate::any(['SuperAdmin', 'Admin'])) {
            $services = BookService::find($id);
            $services->labtechnician_id = $request->labtechnician_id;
            $updated = $services->update();
            if($updated){
                return redirect()->back()->with('success', 'Lab Technician Assigned.');
            }
        }
        else {
            return view('viewnotfound');
        }
    }
}
