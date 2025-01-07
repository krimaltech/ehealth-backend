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
                    <a href="{{ route('completed.index') }}" class="breadcrumb-item">Completed Appointment List </a>
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
                    <p>Name : {{$completed->member->user->name}}</p>
                    <p>Email : {{$completed->member->user->email}}</p>
                    <p>Phone : {{$completed->member->user->phone}}</p>
                </div>
            </div>
            <div class="col-md-6">
                <h3 class="mb-3">Appointment Details</h3>
                <table class="table">
                    <tr>
                        <th>Appointment Date</th>
                        <td>{{$completed->slot->bookings->date}}</td>
                    </tr> 
                    <tr>
                        <th>Appointment Time</th>
                        <td>{{$completed->slot->slot}}</td>
                    </tr>
                    <tr>
                        <th>Service Type</th>
                        <td>{{$completed->doctor_service_type}}</td>
                    </tr>
                    <tr>
                        <th>Payment Method</th>
                        <td><span class="badge badge-success">{{$completed->payment_method}}</span></td>
                    </tr>
                    <tr>
                        <th>Payment Date</th>
                        <td>{{$completed->payment_date}}</td>
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
            <p>{{$completed->messages}}</p>
        </div>    
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">Patient Record</h3>
        @if($examination->history != null)  
        <div class="my-3">
            <h5>History</h5>
            <p>{!!$examination->history!!}</p>
        </div>
        @endif
        @if($examination->examination != null)  
        <div class="my-3">
            <h5>Examination</h5>
            <p>{!!$examination->examination!!}</p>
        </div>
        @endif
        @if($examination->treatment != null)  
        <div class="my-3">
            <h5>Treatment</h5>
            <p>{!!$examination->treatment!!}</p>
        </div>
        @endif
        @if($examination->progress != null)  
        <div class="my-3">
            <h5>Progress Note</h5>
            <p>{!!$examination->progress!!}</p>
        </div>
        @endif
        @if($examination->image != null)
        <div class="my-3">
            <h5>Related documents</h5>
            @if(pathinfo($examination->image, PATHINFO_EXTENSION) == 'pdf')
            <a href="{{$examination->image_path}}" target="_blank"><h6 class="mb-0">Click here to view document</h6></a>
            <iframe src="{{$examination->image_path}}" frameborder="0" width="600px" height="600px"></iframe>
            @elseif(pathinfo($examination->image, PATHINFO_EXTENSION) == 'png' || 'jpg' || 'jpeg')
            <a href="{{$examination->image_path}}" target="_blank"><img src="{{$examination->image_path}}" alt="Related Image" class="img-fluid"></a>
            @endif
        </div>
        @endif
    </div>
</div>
@if(!$completed->forwardreports->isEmpty())
<div class="card">
    <div class="card-body">
        <h3 class="mb-3">Patient Premedical Reports</h3>
        <div class="row">
            @foreach ($completed->forwardreports as $item)
                <div class="col-lg-6">
                    <a href="{{$item->report->report_path}}" target="_blank"><h6 class="mb-0">Click here to view document</h6></a>
                    <iframe src="{{$item->report->report_path}}" frameborder="0" width="400px" height="500px"></iframe>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
@if($completed->userreview == null)
<div class="card">
    <div class="card-body">
        <h4>Your feedback to this patient</h4>
        <form action="{{route('completed.userreview',$completed->id)}}" method="POST">
            @csrf
            <div class="form-group">
                <textarea name="comment" id="" rows="3" class="form-control" placeholder="Write your review for this patient" required>{{old('comment')}}</textarea>
            </div>
            <div class="text-right">
                <button class="btn btn-primary" type="submit">
                    Post Review
                </button>
            </div>
        </form>
    </div>
</div>
@endif
@endsection