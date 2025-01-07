@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Online Doctor Consultation</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Online Doctor Consultation</span>
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
                        <th>User Name</th>
                        <th>Family Name</th>
                        <th>Package</th>
                        <th>Screening</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($report as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->members->user->name }}</td>
                            <td>{{ $item->screeningdate->userpackage->familyname->family_name }}</td>
                            <td>{{ $item->screeningdate->userpackage->package->package_type }}</td>
                            <td>{{ $item->screeningdate->screening->screening }}</td>
                            <td>
                                @if($item->online == null)
                                    <span class="badge badge-secondary">Meeting Not Scheduled</span>
                                @else
                                    <span class="badge badge-success">Meeting Scheduled</span>
                                    @if($item->online->status == 0)
                                        <span class="badge badge-secondary">Meeting Status : Pending</span>
                                    @else
                                        <span class="badge badge-success">Meeting Status : Completed</span>
                                    @endif
                                @endif
                            </td>
                            <td>
                                <a href="{{route('onlineDoctorConsultation.show',$item->id)}}" class="btn btn-primary">
                                    <i class="icon-eye2"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
