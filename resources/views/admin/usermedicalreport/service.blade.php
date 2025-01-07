@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Pathology Report</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Pathology Report</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
@if($services != null && !$services->isEmpty())
    <div class="row">
        @foreach ($services as $key => $value)
            @foreach ($value->take(1) as $item)
            <div class="col-md-3">
                <a href="{{route('usermedicalreport.report',$key)}}">
                    <div class="card">
                        <div class="card-body text-center">
                            {{$item->service->service_name}} Report
                        </div>
                    </div>
                </a>
            </div>  
            @endforeach                                      
        @endforeach
    </div>  
@else
<h5 class="text-danger">No Pathology reports found.</h5>
@endif     
@endsection