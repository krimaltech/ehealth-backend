@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Search Report</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('report.searchReport') }}" class="breadcrumb-item">Search Report</a>
                    <span class="breadcrumb-item active">Report</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <style>
        .appointment-details .card, .appointment-details .card-body{
            border-radius: 15px;
        }
        .appointment-details h5, .appointment-details h3{
            font-weight: 500;
        }
    </style>
    <div class="appointment-details">
        <div class="card">
            <div class="card-body">
                <h3 class="mb-3">Patient Details</h3>
                <div class="row">
                    <input type="hidden" id="member" value="{{$user->id}}">
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        @if(($user->image != null))
                        <div class="text-center">
                            <img src="{{asset('storage/images/'.$user->image)}}" alt="" width="250px">
                            <h4 class="my-3">{{$user->member->name}}</b></h4>
                        </div>
                        @else
                        <div class="text-center">
                            <img src="/images/profile.png" alt="" width="250px">
                            <h4 class="my-3">{{$user->member->name}}</h4>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{{$user->member->name}}</td>
                            </tr> 
                            <tr>
                                <th>Email</th>
                                <td>{{$user->member->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$user->member->phone}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$user->address}}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{$user->gender}}</td>
                            </tr>
                            <tr>
                                <th>Blood Group</th>
                                <td>{{$user->blood_group}}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td>{{$user->dob}}</td>
                            </tr>
                        </table>
                    </div>
                </div>                       
            </div>
        </div>  
        @if(!$report->isEmpty())
            @if(!$tests->isEmpty())
                <div class="card">
                    <div class="card-body">
                        <h6 style="font-weight:600;color:#063b9d" class="mb-4">View Test Chart</h6>
                        <div class="form-group">
                            <select name="test" id="test" class="form-control select-search" onchange="getTest()">
                                <option value="" selected disabled>--Select Test--</option>
                                @foreach($tests as $test)
                                <option value="{{$test->id}}">{{$test->tests}} @if($test->profile_id != null)({{$test->labprofile->profile_name}})@endif</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="curve_chart" style="height: 300px;width:100%"></div>
                    </div>
                </div>
            @endif
            @foreach ($report as $item)
                <div class="card">
                    <div class="card-body">
                        <h6 style="font-weight: 600">{{$item->reportdetail->screeningdate->userpackage->package->package_type}} ({{$item->reportdetail->screeningdate->screening->screening}})</h6>
                        <p style="font-weight: 600">Report Date : {{$item->reportdetail->report_date}}</p>
                        <embed src="{{asset($item->report_path)}}" class="mb-3" type="application/pdf" width="100%" height="600px" />                   
                    </div>
                </div>
            @endforeach
        @else
            <div class="alert alert-danger">
                No Pathology Reports Found.
            </div>
        @endif
        {{-- @if(!$report->isEmpty())
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3">Package Pathology Report</h3>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach ($report->take(1) as $key=>$item)
                            @foreach ($services as $item)
                                @if($key == $item->id)
                                <li class="nav-item">
                                    <a class="nav-link active" id="service{{$key}}-tab" data-toggle="tab" href="#service{{$key}}" role="tab" aria-controls="service{{$key}}" aria-selected="true">{{$item->service_name}}</a>
                                </li>
                                @endif
                            @endforeach
                        @endforeach
                        @foreach ($report->skip(1) as $key=>$item)
                            @foreach ($services as $item)
                                @if($key == $item->id)
                                <li class="nav-item">
                                    <a class="nav-link" id="service{{$key}}-tab" data-toggle="tab" href="#service{{$key}}" role="tab" aria-controls="service{{$key}}" aria-selected="true">{{$item->service_name}}</a>
                                </li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @foreach ($report->take(1) as $key=>$value)
                        <div class="tab-pane fade show active" id="service{{$key}}" role="tabpanel" aria-labelledby="service{{$key}}-tab">
                            @foreach ($value as $val)
                                <div class="my-4 card">
                                    <div class="card-header d-flex justify-content-between">    
                                        <span class="card-title"><b>Screening: </b><span style="color:#2196f3">{{$val->screening->screening}}</span></span>                        
                                        <span class="card-title"><b>Report Date:</b> <span style="color:#2196f3">{{\Carbon\Carbon::parse($val->created_at)->format('Y-m-d')}}</span></span>
                                    </div>
                                    @if($val->service->test_result_type=='Range')
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Test</th>
                                                    <th>Range</th>
                                                    <th>Unit</th>
                                                    <th>Result</th>
                                                </tr>
                                            </thead>
                                            <tbody id="results">
                                                @foreach($val->labreports as $item)
                                                    <tr>
                                                        <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                        <td>{{$item->min_range}} - {{$item->max_range}}</td>
                                                        <td>{{$item->test->unit}}</td>
                                                        @if($item->value > $item->max_range || $item->value < $item->min_range)
                                                        <td class="text-danger">{{$item->value}}</td>
                                                        @else
                                                        <td>{{$item->value}}</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @elseif($val->service->test_result_type == 'Value')
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Test Particulars</th>
                                                    <th>Result</th>
                                                </tr>
                                            </thead>
                                            <tbody id="results">
                                                @foreach($val->labreports as $item)
                                                    <tr>
                                                        <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                        <td>{{$item->result}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @elseif($val->service->test_result_type == 'Image')
                                        @foreach ($val->labreports as $item)
                                            @if($item->test == null)
                                                <div id="report">
                                                    <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                                                    View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                                </div>
                                            @endif
                                        @endforeach
                                    @elseif($val->service->test_result_type == 'Value and Image')
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Test Particulars</th>
                                                    <th>Result</th>
                                                </tr>
                                            </thead>
                                            <tbody id="results">
                                                @foreach($val->labreports as $item)
                                                    @if($item->test != null)
                                                    <tr>
                                                        <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                        <td>{{$item->result}}</td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @foreach ($val->labreports as $item)
                                            @if($item->test == null)
                                                <div id="report">
                                                    <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                                                    View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>                          
                            @endforeach
                        </div>
                        @endforeach
                        @foreach ($report->skip(1) as $key=>$value)
                        <div class="tab-pane fade" id="service{{$key}}" role="tabpanel" aria-labelledby="service{{$key}}-tab">
                            @foreach ($value as $val)                            
                                <div class="my-4 card">
                                    <div class="card-header d-flex justify-content-between">    
                                        <span class="card-title"><b>Screening: </b><span style="color:#2196f3">{{$val->screening->screening}}</span></span>                        
                                        <span class="card-title"><b>Report Date:</b> <span style="color:#2196f3">{{\Carbon\Carbon::parse($val->created_at)->format('Y-m-d')}}</span></span>
                                    </div>
                                    @if($val->service->test_result_type=='Range')
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Test</th>
                                                    <th>Range</th>
                                                    <th>Unit</th>
                                                    <th>Result</th>
                                                </tr>
                                            </thead>
                                            <tbody id="results">
                                                @foreach($val->labreports as $item)
                                                    <tr>
                                                        <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                        <td>{{$item->min_range}} - {{$item->max_range}}</td>
                                                        <td>{{$item->test->unit}}</td>
                                                        @if($item->value > $item->max_range || $item->value < $item->min_range)
                                                        <td class="text-danger">{{$item->value}}</td>
                                                        @else
                                                        <td>{{$item->value}}</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @elseif($val->service->test_result_type == 'Value')
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Test Particulars</th>
                                                    <th>Result</th>
                                                </tr>
                                            </thead>
                                            <tbody id="results">
                                                @foreach($val->labreports as $item)
                                                    <tr>
                                                        <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                        <td>{{$item->result}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @elseif($val->service->test_result_type == 'Image')
                                        @foreach ($val->labreports as $item)
                                            @if($item->test == null)
                                                <div id="report">
                                                    <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                                                    View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                                </div>
                                            @endif
                                        @endforeach
                                    @elseif($val->service->test_result_type == 'Value and Image')
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Test Particulars</th>
                                                    <th>Result</th>
                                                </tr>
                                            </thead>
                                            <tbody id="results">
                                                @foreach($val->labreports as $item)
                                                    @if($item->test != null)
                                                    <tr>
                                                        <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                        <td>{{$item->result}}</td>
                                                    </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                        @foreach ($val->labreports as $item)
                                            @if($item->test == null)
                                                <div id="report">
                                                    <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                                                    View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        @endforeach
                        Previous Code
                        @foreach ($report->take(1) as $key=>$screenings)
                            <div class="tab-pane fade show active" id="service{{$key}}" role="tabpanel" aria-labelledby="service{{$key}}-tab">
                                @foreach ($screenings as $screening => $value)
                                    @foreach ($value as $date => $val)
                                    <div class="my-4 card">
                                        <div class="card-header">                            
                                            <h6 class="card-title">Report Date: <span style="color:#2196f3">{{$date}}</span></h6>
                                        </div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Test</th>
                                                    <th>Range</th>
                                                    <th>Unit</th>
                                                    <th>Result</th>
                                                </tr>
                                            </thead>
                                            <tbody id="results">
                                                @foreach($val as $item)
                                                    <tr>
                                                        <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                        <td>{{$item->min_range}} - {{$item->max_range}}</td>
                                                        <td>{{$item->test->unit}}</td>
                                                        @if($item->value > $item->max_range || $item->value < $item->min_range)
                                                        <td class="text-danger">{{$item->value}}</td>
                                                        @else
                                                        <td>{{$item->value}}</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @endforeach
                                @endforeach
                            </div>
                            @endforeach
                            @foreach ($report->skip(1) as $key=>$screenings)
                            <div class="tab-pane fade" id="service{{$key}}" role="tabpanel" aria-labelledby="service{{$key}}-tab">
                                @foreach ($screenings as $screening => $value)
                                    @foreach ($value as $date => $val)
                                    <div class="my-4 card">
                                        <div class="card-header">                            
                                            <h6 class="card-title">Report Date: <span style="color:#2196f3">{{$date}}</span></h6>
                                        </div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Test</th>
                                                    <th>Range</th>
                                                    <th>Unit</th>
                                                    <th>Result</th>
                                                </tr>
                                            </thead>
                                            <tbody id="results">
                                                @foreach($val as $item)
                                                    <tr>
                                                        <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                        <td>{{$item->min_range}} - {{$item->max_range}}</td>
                                                        <td>{{$item->test->unit}}</td>
                                                        @if($item->value > $item->max_range || $item->value < $item->min_range)
                                                        <td class="text-danger">{{$item->value}}</td>
                                                        @else
                                                        <td>{{$item->value}}</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @endforeach
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        @if(!$single_report->isEmpty())
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3">Individual Pathology Report</h3>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach ($single_report->take(1) as $key=>$item)
                            @foreach ($services as $item)
                                @if($key == $item->id)
                                <li class="nav-item">
                                    <a class="nav-link active" id="single_service{{$key}}-tab" data-toggle="tab" href="#single_service{{$key}}" role="tab" aria-controls="single_service{{$key}}" aria-selected="true">{{$item->service_name}}</a>
                                </li>
                                @endif
                            @endforeach
                        @endforeach
                        @foreach ($single_report->skip(1) as $key=>$item)
                            @foreach ($services as $item)
                                @if($key == $item->id)
                                <li class="nav-item">
                                    <a class="nav-link" id="single_service{{$key}}-tab" data-toggle="tab" href="#single_service{{$key}}" role="tab" aria-controls="single_service{{$key}}" aria-selected="true">{{$item->service_name}}</a>
                                </li>
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @foreach ($single_report->take(1) as $key=>$value)
                            <div class="tab-pane fade show active" id="single_service{{$key}}" role="tabpanel" aria-labelledby="single_service{{$key}}-tab">
                                @foreach ($value as $val)
                                    <div class="my-4 card">
                                        <div class="card-header">                            
                                            <span class="card-title">Report Date: <span style="color:#2196f3">{{\Carbon\Carbon::parse($val->created_at)->format('Y-m-d')}}</span></h6>
                                        </div>
                                        @if($val->service->test_result_type=='Range')
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Test</th>
                                                        <th>Range</th>
                                                        <th>Unit</th>
                                                        <th>Result</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="results">
                                                    @foreach($val->labreports as $item)
                                                        <tr>
                                                            <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                            <td>{{$item->min_range}} - {{$item->max_range}}</td>
                                                            <td>{{$item->test->unit}}</td>
                                                            @if($item->value > $item->max_range || $item->value < $item->min_range)
                                                            <td class="text-danger">{{$item->value}}</td>
                                                            @else
                                                            <td>{{$item->value}}</td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @elseif($val->service->test_result_type == 'Value')
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Test Particulars</th>
                                                        <th>Result</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="results">
                                                    @foreach($val->labreports as $item)
                                                        <tr>
                                                            <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                            <td>{{$item->result}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @elseif($val->service->test_result_type == 'Image')
                                            @foreach ($val->labreports as $item)
                                                @if($item->test == null)
                                                    <div id="report">
                                                        <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                                                        View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @elseif($val->service->test_result_type == 'Value and Image')
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Test Particulars</th>
                                                        <th>Result</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="results">
                                                    @foreach($val->labreports as $item)
                                                        @if($item->test != null)
                                                        <tr>
                                                            <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                            <td>{{$item->result}}</td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @foreach ($val->labreports as $item)
                                                @if($item->test == null)
                                                    <div id="report">
                                                        <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                                                        View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach  
                            </div>
                        @endforeach
                        @foreach ($single_report->skip(1) as $key=>$value)
                            <div class="tab-pane fade" id="single_service{{$key}}" role="tabpanel" aria-labelledby="single_service{{$key}}-tab">
                                @foreach ($value as $val)
                                    <div class="my-4 card">
                                        <div class="card-header">                            
                                            <span class="card-title">Report Date: <span style="color:#2196f3">{{\Carbon\Carbon::parse($val->created_at)->format('Y-m-d')}}</span></span>
                                        </div>
                                        @if($val->service->test_result_type=='Range')
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Test</th>
                                                        <th>Range</th>
                                                        <th>Unit</th>
                                                        <th>Result</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="results">
                                                    @foreach($val->labreports as $item)
                                                        <tr>
                                                            <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                            <td>{{$item->min_range}} - {{$item->max_range}}</td>
                                                            <td>{{$item->test->unit}}</td>
                                                            @if($item->value > $item->max_range || $item->value < $item->min_range)
                                                            <td class="text-danger">{{$item->value}}</td>
                                                            @else
                                                            <td>{{$item->value}}</td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @elseif($val->service->test_result_type == 'Value')
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Test Particulars</th>
                                                        <th>Result</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="results">
                                                    @foreach($val->labreports as $item)
                                                        <tr>
                                                            <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                            <td>{{$item->result}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @elseif($val->service->test_result_type == 'Image')
                                            @foreach ($val->labreports as $item)
                                                @if($item->test == null)
                                                    <div id="report">
                                                        <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                                                        View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @elseif($val->service->test_result_type == 'Value and Image')
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Test Particulars</th>
                                                        <th>Result</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="results">
                                                    @foreach($val->labreports as $item)
                                                        @if($item->test != null)
                                                        <tr>
                                                            <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                            <td>{{$item->result}}</td>
                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            @foreach ($val->labreports as $item)
                                                @if($item->test == null)
                                                    <div id="report">
                                                        <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                                                        View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                        Previous Code
                        @foreach ($single_report->take(1) as $key=>$value)
                                <div class="tab-pane fade show active" id="single_service{{$key}}" role="tabpanel" aria-labelledby="single_service{{$key}}-tab">
                                    @foreach ($value as $date=>$val)
                                        <div class="my-4 card">
                                            <div class="card-header">                            
                                                <h6 class="card-title">Report Date: <span style="color:#2196f3">{{$date}}</span></h6>
                                            </div>
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Test</th>
                                                        <th>Range</th>
                                                        <th>Unit</th>
                                                        <th>Result</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="results">
                                                    @foreach($val as $item)
                                                        <tr>
                                                            <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                            <td>{{$item->min_range}} - {{$item->max_range}}</td>
                                                            <td>{{$item->test->unit}}</td>
                                                            @if($item->value > $item->max_range || $item->value < $item->min_range)
                                                            <td class="text-danger">{{$item->value}}</td>
                                                            @else
                                                            <td>{{$item->value}}</td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endforeach  
                                </div>
                            @endforeach
                            @foreach ($single_report->skip(1) as $key=>$value)
                            <div class="tab-pane fade" id="single_service{{$key}}" role="tabpanel" aria-labelledby="single_service{{$key}}-tab">
                                @foreach ($value as $date => $val)
                                    <div class="my-4 card">
                                        <div class="card-header">                            
                                            <h6 class="card-title">Report Date: <span style="color:#2196f3">{{$date}}</span></h6>
                                        </div>
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Test</th>
                                                    <th>Range</th>
                                                    <th>Unit</th>
                                                    <th>Result</th>
                                                </tr>
                                            </thead>
                                            <tbody id="results">
                                                @foreach($val as $item)
                                                    <tr>
                                                        <td style="color:#2196f3">{{$item->test->tests}}</td>
                                                        <td>{{$item->min_range}} - {{$item->max_range}}</td>
                                                        <td>{{$item->test->unit}}</td>
                                                        @if($item->value > $item->max_range || $item->value < $item->min_range)
                                                        <td class="text-danger">{{$item->value}}</td>
                                                        @else
                                                        <td>{{$item->value}}</td>
                                                        @endif
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach 
                    </div>
                </div>
            </div>
        @endif
        @if($report->isEmpty() && $single_report->isEmpty())
            <div class="alert alert-danger">
                No Pathology Reports Found.
            </div>
        @endif --}}
    </div>
@endsection

@section('custom-script')
    <script type="text/javascript" src="{{asset('global_assets/linechart/loader.js')}}"></script>
    <script>
        function getTest(){
            var member = document.getElementById('member').value;
            var test = document.getElementById('test').value;
            $.ajax({
                type :'get',
                url : '/admin/medicalreport/overall-chart/'+ test +'/' + member ,
                success:function(res) {
                    //console.log(res);
                    google.charts.load('current', {packages:['corechart'], 'callback' : function(){
                        var data = new google.visualization.DataTable();
                        data.addColumn("string",'Month');
                        data.addColumn("number",'Min');
                        data.addColumn("number",'Max');
                        data.addColumn("number",'Result');
                        for (var i = 0; i < res.chart.length; i++) {
                            data.addRow([res.chart[i][0],parseFloat(res.chart[i][1]),parseFloat(res.chart[i][2]),parseFloat(res.chart[i][3])]);
                        }

                        var options = {
                            title: res.name,
                            curveType: 'function',
                            legend: { position: 'bottom' },
                            pointSize: 5,
                        };

                        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                        chart.draw(data, options);
                    }});
                }
            })
        }
    </script>
@endsection

