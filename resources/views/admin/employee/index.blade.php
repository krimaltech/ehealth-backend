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
                        <img src="{{ $employee->image_path }}" alt="" height="200px"
                            width="250px">
                        <div class="my-3">
                            <h6 class="mb-0">
                                @if ($employee->sub_role_id == 7)
                                   RN. 
                                @endif{{ $employee->user->name }}</h6>
                            <h6 class="text-primary">{{ $employee->user->email }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="text-right mt-1">
                        @if ($employee->user->kyc == null)
                            <a href="{{ route('kyc.create') }}" class="btn btn-success px-4">
                                KYC</a>
                        @elseif($employee->user->kyc->status == 0)
                            <a href="{{ route('kyc.create') }}" class="btn btn-success px-4">
                                KYC</a>
                        @else
                            <button class="btn btn-success">KYC verified</button>
                        @endif
                        <a href="{{ route('employee.edit', $employee->slug) }}" class="btn btn-primary px-4"><i
                                class="icon-pen mr-1"></i> Edit Profile</a>
                    </div>
                    <div class="card my-3 p-3 shadow-1">
                        <h4 class="card-title" style="border-bottom: 3px solid #007bff">My Profile</h4>
                        <table class="table table-borderless">
                            <tr>
                                <th>Employee Id</th>
                                <td>{{ $employee->employee_code }}</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>
                                    @if ($employee->sub_role_id == 7)
                                    RN. 
                                 @endif{{ $employee->salutation }}{{ $employee->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $employee->user->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $employee->user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $employee->gender }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $employee->address }}</td>
                            </tr>
                            <tr>
                                <th>Employee Type</th>
                                @if ($employee->user->subrole != null)
                                    <td>{{ $employee->user->subroles->subrole }}</td>
                                @else
                                    <td></td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
