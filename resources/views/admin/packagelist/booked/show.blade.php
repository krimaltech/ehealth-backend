@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Activated (Add First Screening) Package List</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('booked.index') }}" class="breadcrumb-item">Activated (Add First Screening) Package List</a>
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
                            <th colspan="3">Family Name : {{$package->familyname->family_name}}</th>
                        </tr>
                        <tr>
                            <th>S.N.</th>
                            <th width="48%">Members</th>
                            <th width="48%">Phone No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{$package->familyname->primary->member->name}} <br/> ({{$package->familyname->primary->member_type}})</td>
                            <td>{{$package->familyname->primary->member->phone}}</td>
                        </tr>
                        @if(count($package->familyname->family) > 0)
                            @foreach ($package->familyname->family as $item)
                                <tr>
                                    <td>{{$loop->iteration + 1}}</td>
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
</div>

@endsection
