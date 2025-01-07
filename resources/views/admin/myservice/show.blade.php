@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">View</span> - My Services</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('myservice.index') }}" class="breadcrumb-item">My Services</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<style>
    ol{
        padding-inline-start: 15px;
    }
    .doctor .table th{
        width:250px;
    }
</style>
    <div class="card my-3">
        <div class="card-header border-bottom py-1" style="background-color: #063b9d">
            <h3 class="card-title text-white">Service Booking Details</h3>
        </div>
        <div class="card-body mt-4">
            <div class="row">
                <div class="col-md-7 doctor">
                    <h4>1. Service Details</h4>
                    <table class="table my-3">
                        <tr>
                            <th>Service</th>
                            <td>{{$service->service->service_name}}</td>
                        </tr>
                        <tr>
                            <th>Amount</th>
                            <td>Rs. {{$service->service->price}}</td>
                        </tr>
                    </table>
                    
                </div>
                <div class="col-md-5">
                    <div>    
                        <h4>2. Booking Details</h4>     
                        <table class="table my-3 table-bordered">
                            <tr>
                                <th>Booked Date</th>
                                <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($service->date))->isoFormat('MMM Do Y') ?></td>
                            </tr>
                            <tr>
                                <th>Booking Time</th>
                                <td>{{$service->time}}</td>
                            </tr>
                            <tr>
                                <th>Appointment Status</th>
                                <td>{{$service->booking_status}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-5">
                        <p style="font-size:1.25rem">3. Payment Status: 
                            @if($service->status == 0)
                            <span class="badge badge-danger" style="font-size:1rem"> Pending</span>
                            @else
                            <span class="badge badge-success" style="font-size:1rem"> Completed</span>  
                            @endif     
                        </p>    
                        @if($service->status == 0)
                        <div class="card mt-4">
                            <div class="card-body">
                                <h4 style="border-bottom:2px solid #063b9d">Pay for your appointment</h4>
                                <div class="my-4">
                                    <h5>Rs. {{$service->service->price}}</h5>  
                                    <form action="{{route('myservice.payment',$service->id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success">Complete Payment</button>
                                    </form>                                  
                                </div>
                            </div>                      
                        </div>  
                        @endif      
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(!$report->isEmpty())
    <div class="card">
        <div class="card-header border-bottom py-1" style="background-color: #063b9d">
            <h3 class="card-title text-white">Test Report</h3>
        </div>
        <div class="card-body mt-3">
            <h5>{{$service->service->service_name}} Report</h5>
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
                        <div id="report">
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
    @endif
@endsection