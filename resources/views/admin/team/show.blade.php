@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">View</span> -Team Member</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('team.index') }}" class="breadcrumb-item">Our Team</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<style>
    th, td{
        padding-left:0 !important;
        padding-right:0 !important;
    }
</style>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="text-center my-3">
                        <img src="{{$team->image_path}}" alt="" height="250px" width="250px" class="rounded-circle">
                        <div class="my-3">
                            <h6 class="mb-0">{{$team->name}}</h6>
                            <h6 class="text-primary">{{$team->position}}</h6>
                        </div>                       
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card my-3 p-3 shadow-1">
                        <h4 class="card-title" style="border-bottom: 3px solid #007bff">Team Member Profile</h4>
                        <table class="table table-borderless">
                            <tr>
                                <th>Team Category</th>
                                <td>{{$team->category->category_name}}</td>
                            </tr>
                            <tr>
                                <th>Advisor ID</th>
                                <td>{{$team->member_id}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{$team->email}}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{$team->phone_no}}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{$team->address}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection