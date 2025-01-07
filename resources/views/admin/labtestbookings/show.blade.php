@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Lab Test Bookings</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{route('labtestbookings.index')}}" class="breadcrumb-item">Lab Test Bookings</a>
                    <span class="breadcrumb-item active">View Report</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h6><b>User Details</b></h6>
                    <div class="mt-4">
                        <p><b>Name :</b> {{$bookings->member->user->name}}<br/></p>
                        <p><b>Email :</b> {{$bookings->member->user->email}}<br/></p>
                        <p><b>Phone :</b> {{$bookings->member->user->phone}}<br/></p>
                        <p><b>DOB :</b> {{$bookings->member->dob}}<br/></p>
                        <p><b>Gender :</b> {{$bookings->member->gender}}<br/></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h6><b>Booking Details</b></h6>
                    @if($bookings->labtest_id == null)
                    <div class="mt-4">
                        <p><b>Profile Name :</b> {{$bookings->labprofile->profile_name}}<br/></p>
                        <p><b>Department :</b> {{$bookings->labprofile->labdepartment->department}}<br/></p>
                        <p><b>Price :</b> Rs.{{$bookings->labprofile->price}}<br/></p>
                        <p><b>Included Tests :</b></p>
                        <ul>
                            @foreach ($bookings->labprofile->labtest as $item)
                                <li>{{$item->tests}}</li>
                            @endforeach
                        </ul>
                        <p><b>Booked Date :</b> {{$bookings->date}}</p>
                        <p><b>Booked Time :</b> {{$bookings->time}}</p>
                    </div>
                    @endif
                    @if($bookings->labprofile_id == null)
                    <div class="mt-4">
                        <p><b>Lab Test Name :</b> {{$bookings->labtest->tests}}<br/></p>
                        <p><b>Department :</b> {{$bookings->labtest->labdepartment->department}}<br/></p>
                        <p><b>Price :</b> Rs.{{$bookings->labtest->price}}<br/></p>
                        <p><b>Booked Date :</b> {{$bookings->date}}</p>
                        <p><b>Booked Time :</b> {{$bookings->time}}</p>
                    </div>
                    @endif
                </div>
                <div class="col-md-4">
                    <h6><b>Report Details</b></h6>
                    <div class="mt-4">
                        <p><b>Sample No. :</b> {{$bookings->sample_no}}<br/></p>
                        <p><b>Sample Date :</b> {{\Carbon\Carbon::parse($bookings->sample_date)->format('Y/m/d g:i A')}}<br/></p>
                        <p><b>Reporting Date :</b> {{\Carbon\Carbon::parse($bookings->report_date)->format('Y/m/d g:i A')}}<br/></p>
                        <p><b>Reporting By :</b> {{$bookings->lab->user->name}}<br/></p>
                    </div>
                </div>
            </div>           
        </div>
        @if($bookings->labtest_id == null)
        <div class="card-body">
            <h6><b>{{$bookings->labprofile->profile_name}} Report</b></h6>
            @foreach ($reports as $type=>$value)
                @foreach ($value as $key=>$report)
                    @if($type == 'Range')
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h6><b>Test Name:</b> {{$labtests[$key]->tests}}</h6>
                                <table class="table table-bordered table-hover" id="page">
                                    <thead>
                                        <tr style="background-color:#063B9D; color:white">
                                            <th>Test</th>
                                            <th>Range</th>
                                            <th>Unit</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>    
                                        @foreach ($report as $item)
                                            <tr>
                                                <td>{{$item->labtest->tests}}</td>
                                                <td>{{$item->min_range}} - {{$item->max_range}}</td>
                                                <td>{{$item->labtest->unit}}</td>
                                                <td>{{$item->value}}</td>
                                            </tr>
                                        @endforeach                                                                                                                 
                                    </tbody>
                                </table>
                            </div>   
                        </div>
                    @elseif($type == 'Value')
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h6><b>Test Name:</b> {{$labtests[$key]->tests}}</h6>
                                <table class="table table-bordered table-hover" >
                                    <thead>
                                        <tr style="background-color:#063B9D; color:white">
                                            <th>Test Particulars</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>  
                                        @foreach ($report as $item)
                                        <tr>
                                            <td>{{$item->labvalue->result_name}}</td>
                                            <td>{{$item->result}}</td>
                                        </tr>
                                        @endforeach                                               
                                                                            
                                    </tbody>
                                </table>
                            </div>   
                        </div>
                    @elseif($type == 'Value and Image')
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h6><b>Test Name:</b> {{$labtests[$key]->tests}}</h6>
                                <table class="table table-bordered table-hover" >
                                    <thead>
                                        <tr style="background-color:#063B9D; color:white">
                                            <th>Test Particulars</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>  
                                        @foreach ($report as $item)
                                            @if($item->report == null)
                                            <tr>
                                                <td>{{$item->labvalue->result_name}}</td>
                                                <td>{{$item->result}}</td>
                                            </tr>
                                            @endif
                                        @endforeach                         
                                    </tbody>
                                </table>
                            </div>  
                        </div>
                        <div class="upload_report my-3">
                            <h6><b>Related Files</b></h6>
                            <div class="row">
                                <div class="col-md-8">
                                    @foreach ($report as $item)
                                        @if($item->report != null)
                                            <div id="report">
                                                <iframe src="{{$item->report_path}}" width="100%" height="400px"></iframe>
                                                View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @elseif($type == 'Image')
                        <div class="upload_report my-3">
                            <h6><b>Test Name:</b> {{$labtests[$key]->tests}}</h6>
                            <div class="row">
                                <div class="col-md-8">
                                    @foreach ($report as $item)
                                        <div id="report">
                                            <iframe src="{{$item->report_path}}" width="100%" height="400px"></iframe>
                                            View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach             
            @endforeach             
        </div>
        @endif
        @if($bookings->labprofile_id == null)
        <div class="card-body">
            <h6><b>{{$bookings->labtest->tests}} Report</b></h6>
            @if ($bookings->labtest->test_result_type == 'Range')
                <div class="row mt-4">
                    <div class="col-md-6">
                        <table class="table table-bordered table-hover" >
                            <thead>
                                <tr style="background-color:#063B9D; color:white">
                                    <th>Test</th>
                                    <th>Range</th>
                                    <th>Unit</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach ($reports as $item)
                                <tr>
                                    <td>{{$bookings->labtest->tests}}</td>
                                    <td>{{$item->min_range}} - {{$item->max_range}}</td>
                                    <td>{{$bookings->labtest->unit}}</td>
                                    <td>{{$item->value}}</td>
                                </tr>    
                                @endforeach                              
                            </tbody>
                        </table>
                    </div>
                </div>
                @elseif($bookings->labtest->test_result_type == 'Value')
                <div class="row mt-4">
                    <div class="col-md-6">
                        <table class="table table-bordered table-hover" >
                            <thead>
                                <tr style="background-color:#063B9D; color:white">
                                    <th>Test Particulars</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody>  
                                @foreach ($reports as $item)
                                <tr>
                                    <td>{{$item->labvalue->result_name}}</td>
                                    <td>{{$item->result}}</td>
                                </tr>
                                @endforeach                                               
                            </tbody>
                        </table>
                    </div>
                </div>
                @elseif($bookings->labtest->test_result_type == 'Value and Image')
                <div class="row mt-4">
                    <div class="col-md-6">
                        <table class="table table-bordered table-hover" >
                            <thead>
                                <tr style="background-color:#063B9D; color:white">
                                    <th>Test Particulars</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $item)
                                    @if($item->labvalue_id != null)
                                    <tr>
                                        <td>{{$item->labvalue->result_name}}</td>
                                        <td>{{$item->result}}</td>
                                    </tr>
                                    @endif
                                @endforeach                                               
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="upload_report my-3">
                    <h6><b>Related Files</b></h6>
                    <div class="row">
                        <div class="col-md-8 text-center">
                            @foreach ($reports as $item)
                                @if($item->labvalue_id == null)
                                    <div id="report">
                                        <iframe src="{{$item->report_path}}" width="100%" height="400px"></iframe>
                                        View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                @elseif($bookings->labtest->test_result_type == 'Image')
                <div class="upload_report my-3">
                    <div class="row">
                        <div class="col-md-8 text-center">
                            @foreach ($reports as $item)
                                <div id="report">
                                    <iframe src="{{$item->report_path}}" width="100%" height="400px"></iframe>
                                    View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
        @endif
    </div>
@endsection
