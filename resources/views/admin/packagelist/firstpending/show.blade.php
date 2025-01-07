@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">First Screening Pending Package List</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('pending.index') }}" class="breadcrumb-item">First Screening Pending Package List</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 style="font-weight:600">Family Details</h6>
                <table class="table table-bordered datatable-colvis-basic">
                    <thead>
                        <tr>
                            <th colspan="2">Family Name : {{$package->familyname->family_name}}</th>
                        </tr>
                        <tr>
                            <th width="50%">Members</th>
                            <th width="50%">Phone No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$package->familyname->primary->member->name}} <br/> ({{$package->familyname->primary->member_type}})</td>
                            <td>{{$package->familyname->primary->member->phone}}</td>
                        </tr>
                        @if(count($package->familyname->family) > 0)
                            @foreach ($package->familyname->family as $item)
                                <tr>
                                    <td>{{$item->member->user->name}}</td>
                                    <td>{{$item->member->user->phone}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>                             
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 style="font-weight:600">Subscription Package Details</h6>
                <table class="table table-bordered mt-4">
                    <tbody>
                        <tr>
                            <th>Package</th>
                            <td>{{$package->package->package_type}}</td>
                        </tr>
                        <tr>
                            <th>Joined Date</th>
                            <td>{{$package->booked_date}}</td>
                        </tr>
                        <tr>
                            <th>Expiry Date</th>
                            <td>{{$package->expiry_date}}</td>
                        </tr>
                        <tr>
                            <th>Package Status</th>
                            <td>{{$package->package_status}}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            @if($package->status == 0)
                            <td> 
                                <span class="badge text-danger">Payment Due</span>
                            </td>
                            @else
                            <td>
                                <span class="badge text-success">Paid</span>
                            </td>
                            @endif
                        </tr>
                        <tr>
                            <th>Payment Interval</th>
                            <td>{{$package->payment[0]->payment_interval}}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>{{$package->payment[0]->payment_method}}</td>
                        </tr>
                    </tbody>
                </table>   
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 style="font-weight:600">Screening Details</h6>
                <div class="mt-4">
                    <p><span style="font-weight:500">Screening :</span> {{$package->dates[0]->screening->screening}}</p>
                    <p><span style="font-weight:500">Screening Date :</span> {{$package->dates[0]->screening_date}}</p>  
                    <p><span style="font-weight:500">Screening Time :</span> {{$package->dates[0]->screening_time ?? $package->dates[0]->screening_time }}</p>  
                </div>
                <h6 style="font-weight:600" class="mt-4 mb-3">Screening Team Details</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 style="font-weight:600;background-color:#063b9d;color:white" class="p-2 rounded">Diagnostic and Lab Team</h6>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Employee</th>
                                            <th>Employee Type</th>
                                            <th>Phone No.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($labteam as $item)
                                        <tr>
                                            <td>{{$item->employee->user->name}}</td>
                                            <td>{{$item->type}}</td>
                                            <td>{{$item->employee->user->phone}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 style="font-weight:600;background-color:#063b9d;color:white" class="p-2 rounded">Nurse Team</h6>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Employee</th>
                                            <th>Employee Type</th>
                                            <th>Phone No.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctorteam as $item)
                                        <tr>
                                            <td>{{$item->employee->user->name}}</td>
                                            <td>{{$item->type}}</td>
                                            <td>{{$item->employee->user->phone}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h6 style="font-weight:600;background-color:#063b9d;color:white" class="p-2 rounded">Doctor and Advisors Team</h6>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Employee</th>
                                            <th>Employee Type</th>
                                            <th>Phone No.</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctorteamsecond as $item)
                                        <tr>
                                            <td>{{$item->employee->user->name}}</td>
                                            <td>{{$item->type}}</td>
                                            <td>{{$item->employee->user->phone}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}
                </div>       
            </div>
        </div>
    </div>
</div>

@endsection
