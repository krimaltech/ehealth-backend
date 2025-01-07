@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Family Member</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('family_referred.index') }}" class="breadcrumb-item">Family Member</a>
                    <span class="breadcrumb-item active">Add</span>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-white header-elements-inline" style="background-color:#063B9D ">
                                User Details
                            </div>
                            <div class="card-body">
                                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                    <div>
                                        <ul class="list list-unstyled mb-0">
                                            <li>User Name</li>
                                            <li>User Email</li>
                                            <li>User Phone</li>
                                        </ul>
                                    </div>
            
                                    <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                                        <ul class="list list-unstyled mb-0">
                                            <li><span class="font-weight-semibold">{{ $incentiveManager->user->name }}</span></li>
                                            <li><span class="font-weight-semibold">{{ $incentiveManager->user->email }}</span></li>
                                            <li><span class="font-weight-semibold">{{ $incentiveManager->user->phone }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header text-white header-elements-inline" style="background-color:#063B9D ">
                                Relationship Officer Details
                            </div>
                            <div class="card-body">
                                <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                                    <div>
                                        <ul class="list list-unstyled mb-0">
                                            <li>User Name</li>
                                            <li>User Email</li>
                                            <li>User Phone</li>
                                            <li>Role Type</li>
                                        </ul>
                                    </div>
            
                                    <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                                        <ul class="list list-unstyled mb-0">
                                            <li><span class="font-weight-semibold">{{ $incentiveManager->user->referrer->name ?? ""}}</span></li>
                                            <li><span class="font-weight-semibold">{{ $incentiveManager->user->referrer->email ?? "" }}</span></li>
                                            <li><span class="font-weight-semibold">{{ $incentiveManager->user->referrer->phone ?? "" }}</span></li>
                                            <li><span class="font-weight-semibold">{{ $incentiveManager->user->referrer->roles[0]->role_type ?? " " }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-white header-elements-inline" style="background-color:#063B9D ">
                        Package Details
                    </div>
                    <div class="card-body">
                        <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                            <div>
                                <ul class="list list-unstyled mb-0">
                                    <li>Package Name</li>
                                    <li>Package Status</li>
                                    <li>Booking Date</li>
                                    <hr>
                                    <li>Payment Method</li>
                                    <li class="font-weight-bold">Incentive per family</li>
                                </ul>
                            </div>
    
                            <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                                <ul class="list list-unstyled mb-0">
                                    <li><span class="font-weight-semibold">{{ $incentiveManager->package_name->package->package_type }}</span></li>
                                    <li><span class="font-weight-semibold">{{ $incentiveManager->package_name->package_status }}</span></li>
                                    <li><span class="font-weight-semibold">{{ $incentiveManager->package_name->booked_date }}</span></li>
                                    <hr>
                                    @foreach ($incentiveManager->package_name->payment as $item)
                                    <li><span class="font-weight-bold">{{ $item->payment_method }}</span></li>
                                    <li><span class="font-weight-bold">{{ $total = $item->monthly_amount }}</span></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection