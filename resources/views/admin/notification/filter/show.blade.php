@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Filter Notification</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('filternotification.index') }}" class="breadcrumb-item">Filter Notification</a>
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
            <p><span style="font-weight:600">Name:</span> {{$manual->user->name}}</p>
            <p><span style="font-weight:600">Phone:</span> {{$manual->user->phone}}</p>
            <p><span style="font-weight:600">Email:</span> {{$manual->user->email}}</p>
            <p><span style="font-weight:600">Notification Type:</span> {{$manual->type}}</p>
            <div class="card">
                @if($manual->type == 'App')
                <div class="card-body">
                    <span style="font-weight:600">Title:</span><p>{{$manual->title}}</p>
                    <span style="font-weight:600">Message:</span><p>{{$manual->message}}</p>
                </div>
                @elseif($manual->type == 'SMS')
                <div class="card-body">
                    <span style="font-weight:600">SMS Text:</span><p>{{$manual->sms_text}}</p>
                </div>
                @else
                <div class="card-body">
                    <span style="font-weight:600">Subject:</span><p>{{$manual->email_subject}}</p>
                    <span style="font-weight:600">Message:</span><p>{{$manual->email_message}}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
