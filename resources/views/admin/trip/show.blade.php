@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Trip</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Trip</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-white header-elements-inline" style="background-color:#063B9D ">
                    Trips Details
                </div>
                <div class="card-body">
                    <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                        <div>
                            <ul class="list list-unstyled mb-0">
                                <li>Start Time</li>
                                <li>End Time</li>
                                <li>Patient Name</li>
                                <li>Patient Number</li>
                                <li>Visitor Name</li>
                                <li>Visitor Number</li>
                                <li>Total KM Comsumed</li>
                                <li>Total Time Consumed</li>
                                <li>Payment Method</li>
                                <li>Payment Status</li>
                            </ul>
                        </div>

                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                            <ul class="list list-unstyled mb-0">
                                <li><span class="font-weight-semibold">{{ $trips->start_time }}</span></li>
                                <li><span class="font-weight-semibold">{{ $trips->end_time }}</span></li>
                                <li><span class="badge badge-success">{{ $trips->patient_name }}</span></li>
                                <li><span class="badge badge-success">{{ $trips->patient_number }}</span></li>
                                <li><span class="font-weight-semibold">{{ $trips->visitor_name }}</span></li>
                                <li><span class="font-weight-semibold">{{ $trips->visitor_number }}</span></li>
                                <li><span
                                        class="font-weight-semibold">{{ $trips->total_km_covered }}</span>
                                </li>
                                <li><span class="font-weight-semibold">{{ $trips->total_time_consumed }}</span></li>
                                <li><span class="font-weight-semibold">{{ $trips->payment_method }}</span></li>
                                <li><span class="font-weight-semibold">{{ $trips->payment_amount }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-white header-elements-inline" style="background-color:#063B9D ">
                    Drivers Details
                </div>
                <div class="card-body">
                    <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                        <div>
                            <ul class="list list-unstyled mb-0">
                                <li>Driver Name</li>
                                <li>Driver Number</li>
                                <li>Driver Email</li>
                            </ul>
                        </div>

                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                            <ul class="list list-unstyled mb-0">
                                <li><span class="font-weight-semibold">{{ $trips->driverProfile->driver->name }}</span></li>
                                <li><span class="font-weight-semibold">{{ $trips->driverProfile->driver->phone }}</span></li>
                                <li><span class="font-weight-semibold">{{ $trips->driverProfile->driver->email }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header text-white header-elements-inline" style="background-color:#063B9D ">
                    Users Details
                </div>
                <div class="card-body">
                    <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                        <div>
                            <ul class="list list-unstyled mb-0">
                                <li>User Name</li>
                                <li>User Number</li>
                                <li>User Email</li>
                            </ul>
                        </div>

                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                            <ul class="list list-unstyled mb-0">
                                <li><span class="font-weight-semibold">{{ $trips->userProfile->member->name }}</span></li>
                                <li><span class="font-weight-semibold">{{$trips->userProfile->member->phone }}</span></li>
                                <li><span class="font-weight-semibold">{{ $trips->userProfile->member->email }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
