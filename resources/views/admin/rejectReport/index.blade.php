@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Rejected Pathology Report</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Rejected Pathology Report</span>
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
                        <th>Package</th>
                        <th>Screening</th>
                        <th>User</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rejectReport as $reportId => $value)
                        @foreach ($value->take(1) as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->report->screeningdate->userpackage->familyname->family_name}}</td>
                                <td>{{$item->report->screeningdate->userpackage->package->package_type}}</td>
                                <td>{{$item->report->screeningdate->screening->screening}}</td>
                                <td>{{$item->report->members->user->name}}</td>
                                <td>
                                    <a href="{{route('rejectReport.show',$item->id)}}" class="btn btn-primary">
                                        <i class="icon-eye2"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
