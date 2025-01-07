@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Company / School Profile</span>
                </h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Company / School Profile</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        {{-- <div class="card-header border-bottom">
            <a href="{{ route('company-profile.create') }}" type="button" class="btn btn-primary">
                Add School / Company Profile
            </a>
        </div> --}}
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>User Name</th>
                        <th>Owner Name</th>
                        <th>Contact Number</th>
                        <th>Profile Type</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($companySchoolProfile as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user_name }}</td>
                            <td>{{ $item->owner_name }}</td>
                            <td>{{ $item->contact_number }}</td>
                            <td>{{ $item->types }}</td>
                            <td>
                                @if ($item->status == 'pending')
                                    <span class="badge bg-danger">{{ $item->status }}</span>
                                @elseif($item->status == 'rejected')
                                    <span class="badge bg-primary">{{ $item->status }}</span>
                                @else
                                    <span class="badge bg-success">{{ $item->status }}</span>
                                @endif
                            </td>
                            <td>
                                {{-- <a href="{{ route('company-profile.edit', $item->id) }}" class="btn btn-primary"><i
                                        class="icon-pen"></i> </a> --}}
                                <a href="{{ route('company-profile.show', $item->id) }}" class="btn btn-primary"><i
                                        class="icon-eye"></i> </a>
                                @if ($item['member']['files'] ?? null !== null)
                                    @if ($item['member']['files']['status'] == 2)
                                        <a href="{{ route('company-profile.verify', $item->id) }}" class="btn btn-danger">
                                            Students Rejected
                                        </a>
                                    @elseif ($item['member']['files']['status'] == 1)
                                        <a href="{{ route('company-profile.verify', $item->id) }}" class="btn btn-success">
                                            Students Approved
                                        </a>
                                    @else
                                        <a href="{{ route('company-profile.verify', $item->id) }}" class="btn btn-primary">
                                            View Student Details
                                        </a>
                                    @endif
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
