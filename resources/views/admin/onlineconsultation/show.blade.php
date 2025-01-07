@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Online Consultation View</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Online Consultation View</span>
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
            <table class="table table-borderless">
                <tr>
                    <th>Start Time</th>
                    <td>{{ $onlineConsultation->start_time }}</td>
                </tr>
                <tr>
                    <th>End Time</th>
                    <td>{{ $onlineConsultation->end_time }}</td>
                </tr>
                <tr>
                    <th>Member Name</th>
                    <td>{{ $onlineConsultation->member->user->name }}</td>
                </tr>
                <tr>
                    <th>Doctor Name</th>
                    <td>{{ $onlineConsultation->doctor->user->name }}</td>
                </tr>
                <tr>
                    <th>History</th>
                    <td>{{ $onlineConsultation->history }}</td>
                </tr>
                <tr>
                    <th>Examination</th>
                    <td>{{ $onlineConsultation->examination }}</td>
                </tr>
                <tr>
                    <th>Treatment</th>
                    <td>{{ $onlineConsultation->treatment }}</td>
                </tr>
                <tr>
                    <th>Progress</th>
                    <td>{{ $onlineConsultation->progress }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection
