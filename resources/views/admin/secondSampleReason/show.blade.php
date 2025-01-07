@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Second Sample Uncollected Reason</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('secondSampleReason.index') }}" class="breadcrumb-item">Second Sample Uncollected Reason</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 style="font-weight: 600">Subscription Package Details</h6>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th width="50%">Package</th>
                                <td>{{$reason->userpackage->package->package_type}}</td>
                            </tr>
                            <tr>
                                <th width="50%">Total Visits</th>
                                <td>{{$reason->userpackage->package->visits}}</td>
                            </tr>
                            <tr>
                                <th width="50%">Family Name</th>
                                <td>{{$reason->userpackage->familyname->family_name}}</td>
                            </tr>
                            <tr>
                                <th width="50%">Primary Member</th>
                                <td>{{$reason->userpackage->familyname->primary->user->name}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card h-100">
                <div class="card-body">
                    <h6 style="font-weight: 600">Screening Details</h6>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th width="50%">Screening</th>
                                <td>{{$reason->screening->screening}}</td>
                            </tr>
                            <tr>
                                <th width="50%">Follow Up Date</th>
                                <td>{{$reason->additional_screening_date}}</td>
                            </tr>
                            <tr>
                                <th width="50%">Follow Up Time</th>
                                <td>{{$reason->additional_screening_time}}</td>
                            </tr>
                            <tr>
                                <th width="50%">Assigned Employee</th>
                                <td>
                                    @foreach ($reason->employees as $item)
                                        <p>{{$item->employee->user->name}}</p>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h6 style="font-weight: 600" class="mb-4">Sample Uncollection Details</h6>
            <div>
                <p class="mb-0"><span style="font-weight: 500">Total Family Members :</span> {{count($reason->userpackage->familyname->family) + 1}}</p>
                <p><span style="font-weight: 500">Total Sample Uncollection :</span> {{count($reason->additionalnosample)}}</p>
            </div>
            <table class="table table-bordered datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Family Member</th>
                        <th>Phone No.</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reason->additionalnosample as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->medicalreport->members->user->name}}</td>
                            <td>{{$item->medicalreport->members->user->phone}}</td>
                            <td>{!!$item->reason!!}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection