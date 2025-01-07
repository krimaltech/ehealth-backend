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
                    <span class="breadcrumb-item active">Investor</span>
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
            <a href="{{ route('investor.create') }}" type="button" class="btn btn-primary">
                Add Investor
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($investor as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->member->user->first_name }}</td>
                            <td>{{ $item->member->user->last_name }}</td>
                            <td>{{ $item->member->user->phone }}</td>
                            <td>{{ $item->member->user->email }}</td>
                            @if ($item->status == 0)
                                <td><button class="btn btn-danger">unverified</button> </td>
                            @else
                                <td><button class="btn btn-success">verified</button> </td>
                            @endif
                            <td>
                                <a href="{{ route('investor.show', $item->id) }}" class="btn btn-primary"><i
                                        class="icon-eye"></i> </a>
                                <a href="{{ route('investor.edit', $item->id) }}" class="btn btn-primary"><i
                                        class="icon-pen"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
