@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Doctor Screening Feedback</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Doctor Screening Feedback</span>
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
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Employee Name</th>
                        <th>User Name</th>
                        <th>Package</th>
                        <th>Screening</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($review as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->employee->user->name}}</td>
                            <td>{{$item->member->user->name}}</td>
                            <td>{{$item->dates->userpackage->package->package_type}}</td>
                            <td>{{$item->dates->screening->screening}}</td>
                            <td>{{$item->comment}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection