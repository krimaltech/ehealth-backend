@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Test Report</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{route('servicebookings.index')}}" class="breadcrumb-item">Lab Test Report</a>
                    <span class="breadcrumb-item active">Test Report</span>
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
                <div class="col-md-12">
                    <h4>User Details</h4>
                    <div class="my-4">
                        <p><b>Name :</b> {{$service->member->user->name}}<br/></p>
                        <p><b>Email :</b> {{$service->member->user->email}}<br/></p>
                        <p><b>Phone :</b> {{$service->member->user->phone}}<br/></p>
                        <p><b>DOB :</b> {{$service->member->dob}}<br/></p>
                        <p><b>Gender :</b> {{$service->member->gender}}<br/></p>
                    </div>
                </div>
                <div class="col-md-12">
                    <h4>Service Details: {{$service->service->service_name}}</h4>
                    @if ($service->service->test_result_type == 'Range')
                        <div class="test_result">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered table-hover" id="page">
                                        <thead>
                                            <tr style="background-color:#063B9D; color:white">
                                                <th>Test</th>
                                                <th>Range</th>
                                                <th>Unit</th>
                                                <th>Result</th>
                                            </tr>
                                        </thead>
                                        <tbody id="results">    
                                            @foreach ($report as $item)
                                                <tr>
                                                    <td>{{$item->test->tests}}</td>
                                                    <td>{{$item->min_range}} - {{$item->max_range}}</td>
                                                    <td>{{$item->test->unit}}</td>
                                                    <td>{{$item->value}}</td>
                                                </tr>
                                            @endforeach                                      
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @elseif ($service->service->test_result_type == 'Value')
                        <div class="test_result">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered table-hover" id="page">
                                        <thead>
                                            <tr style="background-color:#063B9D; color:white">
                                                <th>Test Particulars</th>
                                                <th>Result</th>
                                            </tr>
                                        </thead>
                                        <tbody id="results">    
                                            @foreach ($report as $item)
                                                <tr>
                                                    <td>{{$item->test->tests}}</td>
                                                    <td>{{$item->result}}</td>
                                                </tr>
                                            @endforeach                                      
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @elseif ($service->service->test_result_type == 'Value and Image')
                        <div class="test_result">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered table-hover" id="page">
                                        <thead>
                                            <tr style="background-color:#063B9D; color:white">
                                                <th>Test Particulars</th>
                                                <th>Result</th>
                                            </tr>
                                        </thead>
                                        <tbody id="results">    
                                            @foreach ($report as $item)
                                                @if($item->test != null)
                                                    <tr>
                                                        <td>{{$item->test->tests}}</td>
                                                        <td>{{$item->result}}</td>
                                                    </tr>
                                                @endif
                                            @endforeach                                      
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="upload_report my-3">
                            <div class="row">
                                <div class="col-md-8 text-center">
                                    @foreach ($report as $item)
                                        @if($item->test == null)
                                            <div id="report" class="mt-4">
                                                <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                                                View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @elseif ($service->service->test_result_type == 'Image')
                        <div class="upload_report my-3">
                            <div class="row">
                                <div class="col-md-8 text-center">
                                    @foreach ($report as $item)
                                        @if($item->test == null)
                                            <div id="report" class="mt-4">
                                                <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                                                View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    {{-- @if(!$service->service->tests->isEmpty())
                    <div class="test_result">
                        <div class="row">
                            <div class="col-md-6">
                                <table class="table table-bordered table-hover" id="page">
                                    <thead>
                                        <tr style="background-color:#063B9D; color:white">
                                            <th class="col-md-3">Test</th>
                                            <th class="col-md-3">Range</th>
                                            <th class="col-md-3">Unit</th>
                                            <th class="col-md-3">Result</th>
                                        </tr>
                                    </thead>
                                    <tbody id="results">    
                                        @foreach ($report as $item)
                                            <tr>
                                                <td>{{$item->test->tests}}</td>
                                                <td>{{$item->min_range}} - {{$item->max_range}}</td>
                                                <td>{{$item->test->unit}}</td>
                                                <td>{{$item->value}}</td>
                                            </tr>
                                        @endforeach                                      
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="upload_report">
                        <div class="row">
                            <div class="col-md-8 text-center">
                                @foreach ($report as $item)
                                <div id="report" class="mt-4">
                                    <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                                    View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
@endsection
