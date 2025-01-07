@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Global Form</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Global Form</span>
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
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kycs as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->first_name }} {{ $item->middle_name }} {{ $item->last_name }}</td>
                            <td>{{ $item->mobile_number }}</td>
                            <td>{{ $item->email }}</td>
                            @if ($item->status == 'Pending')
                                <td><button class="btn btn-warning">In Progress</button> </td>
                            @elseif($item->status == 'Active')
                                <td><button class="btn btn-success">Verified</button> </td>
                            @else
                                <td><button class="btn btn-danger">Rejected</button> </td>
                            @endif
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu dropdown-menu">
                                        <a href="{{ route('kyc.admin_show', $item->slug) }}" class="dropdown-item">View
                                            Global Form</a>
                                        <a href="{{ route('kyc.bankform', $item->slug) }}" class="dropdown-item">Bank
                                            Form</a>
                                        <a href="{{ route('kyc.insurance', $item->slug) }}"class="dropdown-item">Insurance
                                            Form</a>

                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
