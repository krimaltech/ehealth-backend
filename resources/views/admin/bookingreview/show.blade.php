@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">View</span> - My Appointments</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('bookingreview.index') }}" class="breadcrumb-item">My Appointments</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<style>
    ol{
        padding-inline-start: 15px;
    }
    .doctor .table th{
        width:250px;
    }
</style>
    <div class="card my-3">
        <div class="card-header border-bottom" style="background-color: #063b9d">
            <h3 class="card-title text-white">Appointment Details</h3>
        </div>
        <div class="card-body mt-4">
            <div class="row">
                <div class="col-md-7 doctor">
                    <h4>1. Doctor Details</h4>
                    <div class="text-center">
                        <img src="{{asset('/storage/images/'.$booking->doctor_profile->image)}}" alt=""height="150px" width="150px" class="rounded-circle">
                    </div>
                    <table class="table my-3">
                        <tr>
                            <th>NMC No.</th>
                            <td>{{$booking->doctor_profile->nmc_no}}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{$booking->doctor_profile->salutation}} {{$booking->doctor_profile->user->name}}</td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td>{{$booking->doctor_profile->departments->department}}</td>
                        </tr>
                        <tr>
                            <th>Qualification</th>
                            <td>{{$booking->doctor_profile->qualification}}</td>
                        </tr>
                        <tr>
                            <th>Experience</th>
                            <td>{{$booking->doctor_profile->year_practiced}} years</td>
                        </tr>
                        <tr>
                            <th>Consultation Fee</th>
                            <td>Rs. 1000</td>
                        </tr>
                    </table>
                    
                </div>
                <div class="col-md-5">
                    <div>    
                        <h4>2. Appointment Details</h4>     
                        <table class="table my-3 table-bordered">
                            <tr>
                                <th>Appointment Date</th>
                                <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($booking->slot->expiry_date))->isoFormat('MMM Do Y') ?></td>
                            </tr>
                            <tr>
                                <th>Appointment Time</th>
                                <td>{{$booking->slot->slot}}</td>
                            </tr>
                            <tr>
                                <th>Appointment Status</th>
                                <td>{{$booking->booking_status}}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="mt-5">
                        <p style="font-size:1.25rem">3. Payment Status: 
                            @if($booking->status == 0)
                            <span class="badge badge-danger" style="font-size:1rem"> Pending</span>
                            @else
                            <span class="badge badge-success" style="font-size:1rem"> Completed</span>  
                            @endif     
                        </p>    
                        @if($booking->status == 0)
                        <div class="card mt-4">
                            <div class="card-body">
                                <h4 style="border-bottom:2px solid #063b9d">Pay for your appointment</h4>
                                <div class="my-4">
                                    <h5>Rs. 1000</h5>
                                    <form action="{{route('bookingreview.payment',$booking->slug)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success">Complete Payment</button>
                                    </form>
                                </div>
                            </div>                      
                        </div>  
                        @endif      
                    </div>
                </div>
                
                <div class="col-md-12">
                    @if($booking->description != null)  
                    <div class="my-3">
                        <h3>Doctor Recommendation</h3>
                        <p>{!!$booking->description!!}</p>
                    </div>
                    @endif
                    @if($booking->image != null)
                    <div class="my-3">
                        <h3>Related documents</h3>
                        @if(pathinfo($booking->image, PATHINFO_EXTENSION) == 'pdf')
                        <a href="{{$booking->image_path}}" target="_blank"><h6 class="mb-0">Click here to view document</h6></a>
                        <iframe src="{{$booking->image_path}}" frameborder="0" width="600px" height="600px"></iframe>
                        @elseif(pathinfo($booking->image, PATHINFO_EXTENSION) == 'png' || 'jpg' || 'jpeg')
                        <a href="{{$booking->image_path}}" target="_blank"><img src="{{$booking->image_path}}" alt="Related Image" class="img-fluid"></a>
                        @endif
                    </div>
                    @endif
                </div> 
                @if($booking->cancel_reason != null)
                <div class="col-md-12">
                    <h3>Appointment Cancellation</h3>
                    <p>{!!$booking->cancel_reason!!}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection