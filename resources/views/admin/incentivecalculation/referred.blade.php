@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Family Member</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('family_referred.index') }}" class="breadcrumb-item">Family Member</a>
                    <span class="breadcrumb-item active">Add</span>
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
            <a href="{{route("family_referred.details")}}" type="button" class="btn btn-primary">
                View All Details
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>User Name</th>
                        <th>Package Name</th>
                        <th>Package Status</th>
                        <th>Global Form Status</th>
                        <th>Joining Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($incentiveManager as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->package_name->package->package_type }}</td>
                                                        <td><span class="badge badge-success">{{ $item->package_name->package_status }}</span></td>
                            @if ($item->user->global_form_id == null)
                                <td><span class="badge badge-danger">Global form not filled</span></td>
                            @else
                                <td><span class="badge badge-success">Global form filled</span></td>
                            @endif
                            <td>{{ $item->package_name->booked_date }}</td>
                            <td>
                                <a href="{{ route('family_referred_single.index', $item->id) }}" class="btn btn-primary"><i
                                        class="icon-eye"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
