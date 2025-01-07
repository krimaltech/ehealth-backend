@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Primary Change Request</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Primary Change Request</span>
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
                    <th>Family Name</th>
                    <th>Primary Member</th>
                    <th>New Primary Member Request</th>
                    <th>Change Cause</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($primary as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->familyname->family_name}}</td>
                        <td>{{$item->primary->user->name}}</td>
                        <td>{{$item->newprimary->user->name}}</td>
                        <td>
                            @if($item->death_case == 0)
                                <span class="text-success">Other</span>
                            @else
                                <span class="text-danger">Death</span>
                            @endif
                        </td>
                        <td>
                            @if($item->status == 0)
                            <span class="badge badge-secondary">Pending</span>
                            @elseif($item->status == 1)
                            <span class="badge badge-success">Approved</span>
                            @elseif($item->status == 2)
                            <span class="badge badge-danger">Rejected</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('becomeprimary.show',$item->id)}}" class="btn btn-primary"><i class="icon-eye2"></i> </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
