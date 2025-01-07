@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Assign Sample Drop Team</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Assign Sample Drop Team</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <a href="{{route('sampleDrop.create')}}" class="btn btn-primary">
                Assign Lab User
            </a>
        </div>
        <div class="card-body mt-3">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Family Name</th>
                        <th>Package</th>
                        <th>Screening</th>
                        <th>User</th>
                        <th>Assigned Lab User</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sample as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->familyname->family_name}}</td>
                            <td>{{$item->screeningdate->userpackage->package->package_type}}</td>
                            <td>{{$item->screeningdate->screening->screening}}</td>
                            <td>{{$item->medicalreport->members->user->name}}</td>
                            <td>{{$item->employee->user->name}}</td>
                            @if($item->collection_status == 1)
                            <td>
                                <span class="badge badge-success">
                                    Sample Collected
                                </span>
                            </td>
                            @else
                            <td>
                                <span class="badge badge-warning">
                                    Sample Collection In Progress
                                </span>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection