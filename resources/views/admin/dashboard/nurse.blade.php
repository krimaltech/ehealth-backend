@extends('admin.master')

@section('header')
    <script src="{{ asset('assets/js/plotly.js') }}"></script>
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">

                <h4 class="font-weight-semibold"><i class="icon-arrow-left52 mr-2"></i> <span
                        class="font-weight-semibold">Home</span> - Nurse</h4>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/admin" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Dashboard</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <style>
        .list-icons i {
            font-size: 50px;
        }

        .pull-right {
            text-align: right;
            margin: 5px;
        }
    </style>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card text-white" style="background-color: #063B9D">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">{{$scheduled}}</h3>
                                <a href="{{ route('nursebooking.index') }}" class="align-self-center ml-auto"
                                    style="color: white"><i class="icon-eye"></i> view</a>
                            </div>

                            <div>
                                Total Scheduled
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-white" style="background-color: #063B9D">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">{{$completed}}</h3>
                                <a href="{{ route('nursebooking.index') }}" class="align-self-center ml-auto"
                                    style="color: white"><i class="icon-eye"></i> view</a>
                            </div>

                            <div>
                                Total Completed
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="card text-white" style="background-color: #063B9D">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">{{$patient}}</h3>
                                <a href="{{ route('nursebooking.index') }}" class="align-self-center ml-auto"
                                    style="color: white"><i class="icon-eye"></i> view</a>
                            </div>

                            <div>
                                Total Patients
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection