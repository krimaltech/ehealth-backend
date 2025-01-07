@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">External Medical History</span>
                </h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">External Medical History</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        @can('Admin')
            <div class="card-header border-bottom">
                <form action="{{ route('upload_medical_history_consultation.index', ['package' => 'package']) }}"
                    method="GET">
                    <div class="row">
                        <div class="col-md-3">
                            <select name="package" id="" class="form-control">
                                <option value=""><--select package user or all--></option>
                                <option value="package" @if ($package_user == 'package') selected @endif>Package User</option>
                                <option value="all" @if ($package_user == 'all') selected @endif>All</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
            </div>
        @endcan
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Gd-Id</th>
                        @can('Admin')
                            <th>User Name</th>
                            <th>Doctor Name</th>
                        @endcan
                        <th>Package Bought</th>
                        <th>Published Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consultation as $item)
                        @if ($package_user == 'package')
                            @if (Helper::check_userpackage($item->member_id) == 1)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->member->gd_id }}</td>
                                    @can('Admin')
                                        <td>{{ $item->member->user->name }}</td>
                                        <td>
                                            @if ($item->doctor_reject_reason != null)
                                            {{ $item->doctor->user->name ?? ' ' }}<br>
                                            <button disabled="disabled" class="badge badge-pill badge-danger">Rejected by
                                                Doctor</button>
                                            @elseif ($item->reject_reason != null)
                                            {{ $item->doctor->user->name ?? ' ' }}<br>
                                                <button disabled="disabled" class="badge badge-pill badge-danger">Rejected by
                                                    Admin</button>
                                            @else
                                            {{ $item->doctor->user->name ?? ' ' }}
                                            @endif
                                        </td>
                                    @endcan
                                    @if (Helper::check_userpackage($item->member_id) == 1)
                                        <td><button class="btn btn-success">Package Bought</button></td>
                                    @else
                                        <td><button class="btn btn-danger">Package Not Bought</button></td>
                                    @endif
                                    <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                    @if ($item->check_date != null)
                                        <td>
                                            <button disabled="disabled" class="btn btn-success">Completed</button>
                                        </td>
                                    @elseif ($item->doctor_reject_reason != null && $item->reject_reason == null)
                                        <div class="col-md-3">
                                            <td>
                                                @canany(['SuperAdmin','Admin'])
                                                    <a href="{{ route('upload_medical_history_consultation.show', $item->id) }}"
                                                        class="btn btn-primary"><i class="icon-eye"></i> </a>
                                                @endcan
                                                <button disabled="disabled" class="btn btn-secondary">Pending</button>
                                            </td>
                                        </div>
                                    @elseif ($item->reject_reason != null)
                                        <div class="col-md-3">
                                            <td>
                                                <button disabled="disabled" class="btn btn-danger">Rejected</button>
                                                <span style='color:red'>{{ $item->reject_reason }}</span>
                                            </td>
                                        </div>
                                    @else
                                        <td>
                                            <a href="{{ route('upload_medical_history_consultation.show', $item->id) }}"
                                                class="btn btn-primary"><i class="icon-eye"></i> </a>
                                            <button disabled="disabled" class="btn btn-secondary">Pending</button>
                                        </td>
                                    @endif
                                </tr>
                            @endif
                        @else
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->member->gd_id }}</td>
                                @can('Admin')
                                    <td>{{ $item->member->user->name }}</td>
                                    <td>{{ $item->doctor->user->name ?? ' ' }}</td>
                                @endcan
                                @if (Helper::check_userpackage($item->member_id) == 1)
                                    <td><button class="btn btn-success">Package Bought</button></td>
                                @else
                                    <td><button class="btn btn-danger">Package Not Bought</button></td>
                                @endif
                                <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                @if ($item->check_date != null)
                                    <td>
                                        <button disabled="disabled" class="btn btn-success">Completed</button>
                                    </td>
                                @elseif ($item->reject_reason != null)
                                    <td>
                                        <button disabled="disabled" class="btn btn-danger">Rejected</button>
                                    </td>
                                @else
                                    <td>
                                        <button disabled="disabled" class="btn btn-secondary">Pending</button>
                                    </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
