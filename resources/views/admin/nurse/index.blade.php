@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Nurse Profile</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Nurse Profile</span>
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
    </style>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="text-center">
                        <img src="{{  $nurse->image_path }}" alt="" height="150px"
                            width="150px" class="rounded-circle">
                    </div>
                    <div class="text-center mt-2">
                        <h6 class="mb-0">{{ $nurse->user->name }}</h6>
                    </div>
                    <table class="table table-borderless mx-3 my-4">
                        <tr>
                            <th>Nurse Type</th>
                            <td>Homecare Nurse</td>
                        </tr>
                        <tr>
                            <th>Qualification</th>
                            <td>{{ $nurse->qualification }}</td>
                        </tr>
                        <tr>
                            <th>Years Practiced</th>
                            <td>{{ $nurse->year_practiced }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-7">
                    <div class="text-right">
                        @if ($nurse->user->kyc == null)
                        <a href="{{ route('kyc.create') }}" class="btn btn-success px-4">
                          <i class="icon-add"></i>  KYC Add</a>
                    @else
                    <a href="{{ route('kyc.view') }}" class="btn btn-primary px-4">
                        </i> <i class="icon-eye"> </i> KYC View</a>
                    @endif
                        <a href="{{ route('nurse.edit', $nurse->slug) }}" class="btn btn-primary px-4"><i
                                class="icon-pen mr-1"></i> Edit Profile</a>
                    </div>
                    <div class="card my-3 p-3 shadow-1">
                        <h4 class="card-title" style="border-bottom: 3px solid #007bff">My Profile</h4>
                        <table class="table table-borderless">
                            <tr>
                                <th>NNC No.</th>
                                <td>{{ $nurse->nnc_no }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $nurse->user->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $nurse->user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $nurse->gender }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $nurse->address }}</td>
                            </tr>
                            @if ($nurse->fee != null)
                                <tr>
                                    <th>Consultation Fee</th>
                                    <td>Rs. {{ $nurse->fee }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
