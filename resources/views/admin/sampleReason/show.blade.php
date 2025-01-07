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
                    <a href="{{ route('sampleReason.index') }}" class="breadcrumb-item">First Sample Uncollected Reason</a>
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
                                <th width="50%">Screening Date</th>
                                <td>{{$reason->screening_date}}</td>
                            </tr>
                            <tr>
                                <th width="50%">Screening Time</th>
                                <td>{{$reason->screening_time}}</td>
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
                <p><span style="font-weight: 500">Total Sample Uncollection :</span> {{count($reason->nosample)}}</p>
            </div>
            <table class="table table-bordered datatable-colvis-basic ">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Family Member</th>
                        <th>Phone No.</th>
                        <th>Reason</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reason->nosample as $item)
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
        @if($reason->additional_screening_status == 1)
            <div class="card-footer text-right">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#followupDateModalCenter">
                    Assign Lab Follow Up Date
                </button>
            </div>
            <div class="modal fade" id="followupDateModalCenter" tabindex="-1" role="dialog" aria-labelledby="followupDateModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Assign Lab Follow Up Date</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('sampleReason.store',$reason->id)}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Screening Date</label>
                                    <input type="date" required name="additional_screening_date" class="form-control" id="screening_date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Screening Time</label>
                                    <input type="time" name="additional_screening_time" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="card-body">
                <h6 style="font-weight:600" class="mb-4">Lab Follow Up Details</h6>
                <p class="mb-0"><span style="font-weight: 500">Screening Date : </span>{{$reason->additional_screening_date}}</p>
                <p><span style="font-weight: 500">Screening Time : </span>{{$reason->additional_screening_time}}</p>
            </div>
        @endif
    </div>
@endsection