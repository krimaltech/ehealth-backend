@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">{{$notification->type}} Notification</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('notification.index',['type'=>$notification->type]) }}" class="breadcrumb-item"> {{$notification['type']}}</a>
                    <span class="breadcrumb-item active">{{$notification->title}}</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-header ">
            <h2>{{$notification->title}}</h2>
        </div>
        <div class="card-body">

            <div class="card">
                <div class="card-body">
                    <p>{!!$notification->body !!}</p>
                    <object data="{{$notification->image}}" width="300" height="200"></object>
                </div>
            </div>
            
        </div>
    </div>
@endsection
