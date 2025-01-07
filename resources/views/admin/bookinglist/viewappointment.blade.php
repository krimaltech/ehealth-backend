@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Appointments</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{route('appointment.index')}}" class="breadcrumb-item">Appointments</a>
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
        <div class="row">
            <div class="col-md-6">
                <h3 class="mb-3">Patient Details</h3>
                <div class="mb-3">
                    <p>Name : {{$booking->member->user->name}}</p>
                    <p>Email : {{$booking->member->user->email}}</p>
                    <p>Phone : {{$booking->member->user->phone}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="mb-3">Appointment Details</h3>
                <table class="table">
                    <tr>
                        <th>Appointment Date</th>
                        <td>{{$booking->slot->bookings->date}}</td>
                    </tr> 
                    <tr>
                        <th>Appointment Time</th>
                        <td>{{$booking->slot->slot}}</td>
                    </tr>
                    <tr>
                        <th>Appointment Status</th>
                        @if($booking->booking_status == 'Cancelled')
                        <td>
                            <span class="badge badge-pill badge-danger">Cancelled</span>
                        </td>
                        @elseif($booking->booking_status == 'Completed')
                        <td>
                            <span class="badge badge-pill badge-success">Completed</span>
                        </td>
                        @elseif($booking->booking_status == 'Scheduled')
                        <td>
                            <span class="badge badge-pill badge-warning">Scheduled</span>
                        </td>
                        @elseif($booking->booking_status == 'Rejected')
                        <td>
                            <span class="badge badge-pill badge-danger">Rejected</span>
                        </td>
                        @elseif($booking->booking_status == 'Not Scheduled')
                        <td>
                            <span class="badge badge-pill badge-dark">Not Scheduled</span>
                        </td>
                        @endif
                    </tr>
                    <tr>
                        <th>Payment Status</th>
                        @if($booking->status == 0)
                        <td>
                            <span class="badge badge-pill badge-danger">Payment Due</span>
                        </td>
                        @else
                        <td>
                            <span class="badge badge-pill badge-success">Completed</span>
                        </td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
        <div class="my-3">
            <h3>User Message</h3>
            <p>{{$booking->messages}}</p>
        </div>  
        @if($booking->cancel_reason != null)
        <div class="my-3">
            <h3>Appointment Cancellation</h3>
            <p>{!!$booking->cancel_reason!!}</p>
        </div>
        @endif
    </div>
</div>
@if($booking->booking_status == 'Completed' && $booking->report != null)
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">Patient Record</h3>
        @if($booking->report->history != null)  
        <div class="my-3">
            <h5>History</h5>
            <p>{!!$booking->report->history!!}</p>
        </div>
        @endif
        @if($booking->report->examination != null)  
        <div class="my-3">
            <h5>Examination</h5>
            <p>{!!$booking->report->examination!!}</p>
        </div>
        @endif
        @if($booking->report->treatment != null)  
        <div class="my-3">
            <h5>Treatment</h5>
            <p>{!!$booking->report->treatment!!}</p>
        </div>
        @endif
        @if($booking->report->progress != null)  
        <div class="my-3">
            <h5>Progress Note</h5>
            <p>{!!$booking->report->progress!!}</p>
        </div>
        @endif
        @if($booking->report->image != null)
        <div class="my-3">
            <h5>Related documents</h5>
            @if(pathinfo($booking->report->image, PATHINFO_EXTENSION) == 'pdf')
            <a href="{{$booking->report->image_path}}" target="_blank"><h6 class="mb-0">Click here to view document</h6></a>
            <iframe src="{{$booking->report->image_path}}" frameborder="0" width="600px" height="600px"></iframe>
            @elseif(pathinfo($booking->report->image, PATHINFO_EXTENSION) == 'png' || 'jpg' || 'jpeg')
            <a href="{{$booking->report->image_path}}" target="_blank"><img src="{{$booking->report->image_path}}" alt="Related Image" class="img-fluid"></a>
            @endif
        </div>
        @endif
    </div>
</div>
@endif
@if(!$booking->forwardreports->isEmpty())
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">Patient Premedical Reports</h3>
        <div class="row">
            @foreach ($booking->forwardreports as $item)
                <div class="col-lg-6">
                    <a href="{{$item->report->report_path}}" target="_blank"><h6 class="mb-0">Click here to view document</h6></a>
                    <iframe src="{{$item->report->report_path}}" frameborder="0" width="400px" height="500px"></iframe>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@if($booking->userreview != null)
<div class="card">
    <div class="card-body">
        <h3>Doctor Feedback to Patient</h3>
        <div class="card">
            <div class="card-body">
                {{$booking->userreview->comment}}
            </div>
        </div>
    </div>
</div>
@endif
@endsection
