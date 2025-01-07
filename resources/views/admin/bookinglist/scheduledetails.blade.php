@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Appointment Details</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('scheduled.index') }}" class="breadcrumb-item">Scheduled Appointment List </a>
                    <span class="breadcrumb-item active">Appointment Details</span>
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
                <div class="col-md-6">
                    <h3 class="mb-3">Patient Details</h3>
                    <div class="mb-3">
                        <p>Name : {{$scheduled->member->user->name}}</p>
                        <p>Email : {{$scheduled->member->user->email}}</p>
                        <p>Phone : {{$scheduled->member->user->phone}}</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <h3 class="mb-3">Appointment Details</h3>
                    <table class="table">
                        <tr>
                            <th>Appointment Date</th>
                            <td>{{$scheduled->slot->bookings->date}}</td>
                        </tr> 
                        <tr>
                            <th>Appointment Time</th>
                            <td>{{$scheduled->slot->slot}}</td>
                        </tr>
                        <tr>
                            <th>Service Type</th>
                            <td>{{$scheduled->doctor_service_type}}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td><span class="badge badge-success">{{$scheduled->payment_method}}</span></td>
                        </tr>
                        <tr>
                            <th>Payment Date</th>
                            <td>{{$scheduled->payment_date}}</td>
                        </tr>
                        <tr>
                            <th>Payment</th>
                            <td><span class="badge badge-success">Completed</span></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="my-3">
                <h3>User Message</h3>
                <p>{{$scheduled->messages}}</p>
            </div>                
        </div>
    </div>
    @if(!$scheduled->forwardreports->isEmpty())
    <div class="card">
        <div class="card-body">
            <h3 class="mb-3">Patient Premedical Reports</h3>
            <div class="row">
                @foreach ($scheduled->forwardreports as $item)
                    <div class="col-lg-6">
                        <a href="{{$item->report->report_path}}" target="_blank"><h6 class="mb-0">Click here to view document</h6></a>
                        <iframe src="{{$item->report->report_path}}" frameborder="0" width="400px" height="500px"></iframe>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
@endsection