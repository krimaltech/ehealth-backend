@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Student Deactivation</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Student Deactivation</span>
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
                        <th>School Name</th>
                        <th>Owner Name</th>
                        <th>Contact No.</th>
                        <th>No. of Student Deactivation</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deactivate as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->profile->company_name}}</td>
                            <td>{{$item->profile->owner_name}}</td>
                            <td>{{$item->profile->contact_number}}</td>
                            <td>
                                <span class="badge badge-info">
                                    {{$item->students_count}}
                                </span>
                            </td>
                            <td>
                                @if($item->status == 0)
                                <span class="badge badge-warning">
                                    Pending
                                </span>
                                @elseif($item->status == 1)
                                <span class="badge badge-success">
                                    Approved
                                </span>
                                @elseif($item->status == 2)
                                <span class="badge badge-danger">
                                    Rejected
                                </span>
                                @else
                                <span class="badge badge-danger">
                                    Cancelled
                                </span>
                                @endif
                            </td>
                            <td>
                                <a href="{{route('deactivate.show',$item->id)}}" class="btn btn-primary">
                                    <i class="icon-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
