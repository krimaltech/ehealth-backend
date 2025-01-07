@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">First Sample Uncollected Reason</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">First Sample Uncollected Reason</span>
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
                        <th>Family Name (Total Members)</th>
                        <th>Package</th>
                        <th>Screening</th>
                        <th>No. of sample uncollection</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reason as $item)                      
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->userpackage->familyname->family_name}} ({{count($item->userpackage->familyname->family) + 1}})</td>
                            <td>{{$item->userpackage->package->package_type}}</td>
                            <td>{{$item->screening->screening}}</td>
                            <td>{{count($item->nosample)}}</td>
                            @if($item->additional_screening_status  == 0)
                                <td>
                                    <span class="badge badge-success">
                                        Date Assigned
                                    </span>
                                </td>
                            @else
                                <td>
                                    <span class="badge badge-warning">
                                        Date Not Assigned
                                    </span>
                                </td>
                            @endif
                            <td>
                                <a href="{{route('sampleReason.show',$item->id)}}" class="btn btn-primary">
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