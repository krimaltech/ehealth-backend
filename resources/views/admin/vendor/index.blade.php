@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Vendor Profile</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Vendor Profile</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <style>
        th,
        td {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        .checked{
            color: orange;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <img src="{{ asset('/storage/images/' . $vendor->image) }}" alt="" height="200px"
                            width="250px">
                        <div class="my-3">
                            <h6 class="mb-0">{{ $vendor->user->name }}</h6>
                            <h6 class="text-primary">{{ $vendor->user->email }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="text-right mt-1">
                        @if ($vendor->user->kyc == null)
                            <a href="{{ route('kyc.create') }}" class="btn btn-success px-4">
                              <i class="icon-add"></i>  KYC Add</a>
                        @else
                        <a href="{{ route('kyc.view') }}" class="btn btn-primary px-4">
                            </i> <i class="icon-eye"> </i> KYC View</a>
                        @endif
                        <a href="{{ route('vendor.edit', $vendor->slug) }}" class="btn btn-primary px-4"><i
                                class="icon-pen mr-1"></i> Edit Profile</a>
                    </div>
                    <div class="card my-3 p-3 shadow-1">
                        <h4 class="card-title" style="border-bottom: 3px solid #007bff">My Profile</h4>
                        <table class="table table-borderless">
                            <tr>
                                <th>Name</th>
                                <td>{{ $vendor->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $vendor->user->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $vendor->user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $vendor->address }}</td>
                            </tr>
                            <tr>
                                <th>Type</th>
                                <td>{{ $vendor->types->vendor_type }}</td>
                            </tr>
                            <tr>
                                <th>Average Rating</th>
                                <td>
                                    @for($i=1;$i<=5;$i++)
                                    <i class="icon-star-full2 @if($vendor->averageRating>=$i) checked @endif"></i>
                                    @endfor
                                </td>
                            <tr>
                                <tr>
                                    <th>Followers</th>
                                   
                                        <td>{{ $vendor->follower_count }}</td>
                                    
                                <tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
