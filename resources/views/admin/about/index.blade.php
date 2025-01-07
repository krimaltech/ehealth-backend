@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">About Us</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">About Us</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection
@section('content')
    <div class="card">
        <div class="card-header border-bottom mb-3">
            @if(($about->what_we_do && $about->mission && $about->goal) == null)
            <a href="{{route('about.create')}}" type="button" class="btn btn-primary">
                Add About Details
            </a>
            @else
            <a href="{{route('about.edit',$about->id)}}" type="button" class="btn btn-primary">
                Edit About Details
            </a>
            @endif
        </div>
        <div class="card-body">
            <h3>Tagline</h3>
            <p>{{$about->tagline}}</p>
        </div>
        <div class="card-body">
            <h3>What We Do</h3>
            <p>{!!$about->what_we_do!!}</p>
        </div>
        <div class="card-body">
            <h3>Mission</h3>
            <p>{!!$about->mission!!}</p>
        </div>
        <div class="card-body">
            <h3>Vision</h3>
            <p>{!!$about->vision!!}</p>
        </div>
        <div class="card-body">
            <h3>Goal</h3>
            <p>{!!$about->goal!!}</p>
        </div>
        <div class="card-body">
            <h3>Objective</h3>
            <p>{!!$about->objective!!}</p>
        </div>
    </div>
@endsection
