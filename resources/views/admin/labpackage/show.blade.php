@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Lab Package</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('labpackage.index') }}" class="breadcrumb-item">Lab Package</a>
                    <span class="breadcrumb-item active">View</span>
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
        <h5><b>{{$labpackage->package_name}}</b></h5>
        <p class="text-secondary">Rs. {{$labpackage->price}}</p>
    </div>
    <div class="card-body">
        <h5><b>Package Contents</b></h5>
        <div class="row">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h6><b>Lab Profiles</b></h6>
                        <ul>
                            @foreach ($labpackage->labcontents as $item)
                                @if($item->labtest == null)
                                    <li>
                                        {{$item->labprofile->profile_name}}
                                        @if(!$item->labprofile->labtest->isEmpty())
                                        (
                                            @foreach ($item->labprofile->labtest as $test)
                                                {{$test->tests}}
                                                @if($loop->last)                                    
                                                @else
                                                    ,
                                                @endif
                                            @endforeach
                                            )
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h6><b>Lab Tests</b></h6>
                        <ul>
                            @foreach ($labpackage->labcontents as $item)
                                @if($item->labprofile == null)
                                    <li>{{$item->labtest->tests}}</li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection