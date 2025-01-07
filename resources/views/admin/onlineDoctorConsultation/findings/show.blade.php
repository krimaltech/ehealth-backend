@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Online Doctor Consultation</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('onlineDoctorConsultation.findingsIndex') }}" class="breadcrumb-item">Online Doctor Consultation</a>
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
        <h6 style="font-weight: 600">User, Package and Screening Details</h6>
        <table class="table">
            <tbody>
                <tr>
                    <th width="50%">User</th>
                    <td>{{$report->members->user->name }}</td>
                </tr>
                <tr>
                    <th width="50%">Family Name</th>
                    <td>{{$report->screeningdate->userpackage->familyname->family_name}}</td>
                </tr>
                <tr>
                    <th width="50%">Package</th>
                    <td>{{$report->screeningdate->userpackage->package->package_type}}</td>
                </tr>
                <tr>
                    <th width="50%">Screening</th>
                    <td>{{$report->screeningdate->screening->screening}}</td>
                </tr>
                <tr>
                    <th width="50%">Skip Reason</th>
                    <td>{!!$report->homeskip->reason!!}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h6 style="font-weight: 600">Meeting Details</h6>
        <table class="table">
            <tbody>
                <tr>
                    <th width="50%">Meeting Date and Time</th>
                    <td>{{$report->online->start_time }}</td>
                </tr>
                <tr>
                    <th width="50%">Assigned Doctor</th>
                    <td>{{$report->online->doctor->user->name}} ({{$report->online->doctor->user->phone}})</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@if(!$report->advice->isEmpty())
    <div class="card">
        <div class="card-body">
            <h6 style="font-weight:600">Report Findings</h6>
            <p>{!!$report->advice[0]->feedback!!}</p>
            @if($report->advice[0]->file != null)
            <div>
                <h6 style="font-weight:600">Related Reports</h6>
                <a href="{{ $report->advice[0]->file_path }}" target="_blank">
                    <h6 class="mb-2">Click here to view full document</h6>
                </a>
                <iframe src="{{ $report->advice[0]->file_path }}" frameborder="0" width="100%"
                    height="400px"></iframe>
            </div>
            @endif
        </div>
    </div>
@endif
@endsection