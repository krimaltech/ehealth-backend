@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">View</span> -Service</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('service.index') }}" class="breadcrumb-item">Service</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-header border-bottom py-2">
                <h3 class="card-title">Test Service Details</h3>
            </div>
            <div class="card-body my-3">
                <div>
                    <h5 class="mb-0">Service Name: {{$service->service_name}}</h5>
                    @if($service->price != null)
                    <p>Price: Rs. {{$service->price}}</p>
                    @endif
                </div>
                <div class="mt-3">
                    <h5 class="mb-0">Description</h5>
                    <span>{!!$service->description!!}</span>  
                </div>
            </div>
        </div>
        @if(count($tests) != 0)
            @if($service->test_result_type == 'Range')
                <div class="card">
                    <div class="card-header border-bottom py-2">
                        <h3 class="card-title">Test Particulars</h3>
                    </div>
                    <div class="card-body my-3">
                        <table class="table table-striped table-bordered">
                            <thead style="background-color:#063b9d;color:white">
                                <tr>
                                    <th rowspan="2">Test</th>
                                    <th colspan="3" class="text-center">Male Range</th>
                                    <th colspan="3" class="text-center">Female Range</th>
                                    <th colspan="3" class="text-center">Child Range</th>
                                    <th rowspan="2">Unit</th>
                                    <th rowspan="2">Price</th>
                                </tr>
                                <tr>
                                    <th>Normal</th>
                                    <th>Amber</th>
                                    <th>Risk</th>
                                    <th>Normal</th>
                                    <th>Amber</th>
                                    <th>Risk</th>
                                    <th>Normal</th>
                                    <th>Amber</th>
                                    <th>Risk</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tests as $item)
                                    <tr>
                                        <td>{{$item->tests}}</td>
                                        <td>{{$item->male_min_range}} - {{$item->male_max_range}}</td>
                                        <td>{{$item->male_amber_min_range}} - {{$item->male_amber_max_range}}</td>
                                        <td>{{$item->male_red_min_range}} - {{$item->male_red_max_range}}</td>
                                        <td>{{$item->female_min_range}} - {{$item->female_max_range}}</td>
                                        <td>{{$item->female_amber_min_range}} - {{$item->female_amber_max_range}}</td>
                                        <td>{{$item->female_red_min_range}} - {{$item->female_red_max_range}}</td>
                                        <td>{{$item->child_min_range}} - {{$item->child_max_range}}</td>
                                        <td>{{$item->child_amber_min_range}} - {{$item->child_amber_max_range}}</td>
                                        <td>{{$item->child_red_min_range}} - {{$item->child_red_max_range}}</td>
                                        <td>{{$item->unit}}</td>
                                        <td>Rs. {{$item->price}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            @elseif($service->test_result_type == 'Value')
                <div class="card">
                    <div class="card-header border-bottom py-2">
                        <h3 class="card-title">Test Particulars</h3>
                    </div>
                    <div class="card-body my-3">
                        <table class="table table-striped">
                            <tbody>
                                @foreach ($tests as $item)
                                    <tr>
                                        <td>{{$item->tests}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>    
            @elseif($service->test_result_type == 'Value and Image')
                <div class="card">
                    <div class="card-header border-bottom py-2">
                        <h3 class="card-title">Test Particulars</h3>
                    </div>
                    <div class="card-body my-3">
                        <table class="table table-striped">
                            <tbody>
                                @foreach ($tests as $item)
                                    <tr>
                                        <td>{{$item->tests}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div> 
            @endif     
        @endif     
    </div>
@endsection