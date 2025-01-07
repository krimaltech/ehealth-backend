@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Investor</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('relationmanager.index') }}" class="breadcrumb-item">Investor</a>
                    <span class="breadcrumb-item active">Show</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <style>
        .alert {
            padding-top: 2px;
            padding-bottom: 2px;
        }
    </style>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="text-center">
                            <img src="{{ $investor->member->image_path }}" alt="" height="200px"
                                width="250px">
                            <div class="my-3">
                                <h6 class="mb-0">{{ $investor->member->user->name }}</h6>
                                <h6 class="text-primary">{{ $investor->member->user->email }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">

                        <div class="card my-3 p-3 shadow-1">
                            <h4 class="card-title" style="border-bottom: 3px solid #007bff">Our Investor Details</h4>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $investor->member->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $investor->member->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $investor->member->user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $investor->member->address }}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{ $investor->member->gender }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('custom-script')

@endsection
