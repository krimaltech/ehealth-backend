@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Profile</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Profile</span>
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
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <img src="{{ asset('/storage/images/' . $relationmanager->image) }}" alt="" height="200px"
                            width="250px">
                        <div class="my-3">
                            <h6 class="mb-0">{{ $relationmanager->relation_manager->name }}</h6>
                            <h6 class="text-primary">{{ $relationmanager->relation_manager->email }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="text-right mt-1">
                        <a href="{{ route('relationmanager.edit', $relationmanager->id) }}" class="btn btn-primary px-4"><i
                                class="icon-pen mr-1"></i> Edit Profile</a>
                    </div>
                    <div class="card my-3 p-3 shadow-1">
                        <h4 class="card-title" style="border-bottom: 3px solid #007bff">My Profile</h4>
                        <table class="table table-borderless">
                            <tr>
                                <th>Relationship Officer ID:</th>
                                <td>RO -{{ $relationmanager->id }}</td>
                            </tr>
                            <tr>
                                <th>Position:</th>
                                <td>{{ $relationmanager->rm_tag }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>{{ $relationmanager->relation_manager->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $relationmanager->relation_manager->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $relationmanager->relation_manager->phone }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $relationmanager->gender }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $relationmanager->address }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><span class="badge badge-success">Active</span></td>
                            </tr>
                            <tr>
                                <th>Head Name:</th>
                                <td>{{ $relationmanager->employee_code->user->name}}</td>
                            </tr>
                            <tr>
                                <th>Head Email:</th>
                                <td>{{ $relationmanager->employee_code->user->email}}</td>
                            </tr>
                            <tr>
                                <th>Head Phone:</th>
                                <td>{{ $relationmanager->employee_code->user->phone}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
