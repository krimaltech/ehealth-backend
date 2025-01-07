@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Patient Details</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('patient.index') }}" class="breadcrumb-item">Patient Details</a>
                    <span class="breadcrumb-item active">{{$member->user->name}}</span>
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
                    <div class="col-md-4 d-flex align-items-center justify-content-center">
                        @if(($member->image != null))
                        <div class="text-center">
                            <img src="{{$member->image_path}}" alt="" width="250px">
                            <h4 class="my-3">{{$member->user->name}}</b></h4>
                        </div>
                        @else
                        <div class="text-center">
                            <img src="/images/profile.png" alt="" width="250px">
                            <h4 class="my-3">{{$member->user->name}}</h4>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <td>{{$member->user->name}}</td>
                            </tr> 
                            <tr>
                                <th>Email</th>
                                <td>{{$member->user->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$member->user->phone}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$member->address}}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{$member->gender}}</td>
                            </tr>
                            <tr>
                                <th>Blood Group</th>
                                <td>{{$member->blood_group}}</td>
                            </tr>
                            <tr>
                                <th>Date of Birth</th>
                                <td>{{$member->dob}}</td>
                            </tr>
                        </table>
                    </div>
                </div>                       
            </div>
        </div>  
        {{-- @if(!$report->isEmpty())
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3">Pathology Report</h3>
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
                            @foreach ($single_report as $service=>$value)
                                @if($key == $service)
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
                                @endif
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
                            @foreach ($single_report as $service=>$value)
                                @if($key == $service)
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
                                @endif
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @elseif(!$single_report->isEmpty())
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3">Pathology Report</h3>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach ($single_report->take(1) as $key=>$item)
                            @foreach ($services as $item)
                                @if($key == $item->id)
                                <li class="nav-item">
                                    <a class="nav-link active" id="service{{$key}}-tab" data-toggle="tab" href="#service{{$key}}" role="tab" aria-controls="service{{$key}}" aria-selected="true">{{$item->service_name}}</a>
                                </li>
                                @endif
                            @endforeach
                        @endforeach
                        @foreach ($single_report->skip(1) as $key=>$item)
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
                        @foreach ($single_report->take(1) as $key=>$value)
                            <div class="tab-pane fade show active" id="service{{$key}}" role="tabpanel" aria-labelledby="service{{$key}}-tab">
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
                            <div class="tab-pane fade" id="service{{$key}}" role="tabpanel" aria-labelledby="service{{$key}}-tab">
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
        @endif --}}
        @if(!$report->isEmpty())
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-3">Package Pathology Report</h3>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach ($report->take(1) as $item)
                            <li class="nav-item">
                                <a class="nav-link active" id="service{{$item->id}}-tab" data-toggle="tab" href="#service{{$item->id}}" role="tab" aria-controls="service{{$item->id}}" aria-selected="true">{{$item->reportdetail->screeningdate->screening->screening}}</a>
                            </li>
                        @endforeach
                        @foreach ($report->skip(1) as $item)
                            <li class="nav-item">
                                <a class="nav-link" id="service{{$item->id}}-tab" data-toggle="tab" href="#service{{$item->id}}" role="tab" aria-controls="service{{$item->id}}" aria-selected="true">{{$item->reportdetail->screeningdate->screening->screening}}</a>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @foreach ($report->take(1) as $item)
                        <div class="tab-pane fade show active" id="service{{$item->id}}" role="tabpanel" aria-labelledby="service{{$item->id}}-tab">
                            <p>Click here to see full report: <a href="{{$item->report_path}}" target="_blank">View</a></p>
                            <iframe src="{{$item->report_path}}" frameborder="0" width="100%" height="800px"></iframe>
                        </div>
                        @endforeach
                        @foreach ($report->skip(1) as $item)
                        <div class="tab-pane fade" id="service{{$item->id}}" role="tabpanel" aria-labelledby="service{{$item->id}}-tab">
                            <p>Click here to see full report: <a href="{{$item->report_path}}" target="_blank">View</a></p>
                            <iframe src="{{$item->report_path}}" frameborder="0" width="100%" height="800px"></iframe>
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
                                        <h6 class="card-title">Report Date: <span style="color:#2196f3">{{\Carbon\Carbon::parse($val->created_at)->format('Y-m-d')}}</span></h6>
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
                                            <h6 class="card-title">Report Date: <span style="color:#2196f3">{{\Carbon\Carbon::parse($val->created_at)->format('Y-m-d')}}</span></h6>
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
                    </div>
                </div>
            </div>
        @endif
        @if($report->isEmpty() && $single_report->isEmpty())
            <div class="alert alert-danger">
                No Pathology Reports Found.
            </div>
        @endif
    </div>

@endsection