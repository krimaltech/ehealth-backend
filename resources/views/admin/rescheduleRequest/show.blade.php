@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">View</span> - Home Visit Reschedule Request</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('rescheduleRequest.index') }}" class="breadcrumb-item">Home Visit Reschedule Request</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<div class="mb-2">
    @if($reschedule->status == 0)
    <span class="badge badge-pill badge-warning">
        Pending
    </span>
    @else
    <span class="badge badge-pill badge-success">
        Approved
    </span>
    @endif
</div>
<div class="card">
    <div class="card-body">
        <h6 style="font-weight:600">Subscription Package Details</h6>
        <table class="table">
            <tbody>
                <tr>
                    <th width="50%">Package</th>
                    <td>{{$reschedule->userpackage->package->package_type}}</td>
                </tr>
                <tr>
                    <th width="50%">Screening</th>
                    <td>{{$reschedule->screeningdate->screening->screening}}</td>
                </tr>
                <tr>
                    <th width="50%">Family Name</th>
                    <td>{{$reschedule->userpackage->familyname->family_name}}</td>
                </tr>
                <tr>
                    <th width="50%">Primary Member</th>
                    <td>{{$reschedule->userpackage->familyname->primary->user->name}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@if($reschedule->status == 0)
<div class="row">
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 style="font-weight:600">Home Visit Date Assigned by GD</h6>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Date</th>
                            <td>{{$reschedule->screeningdate->doctorvisit_date}}</td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>{{$reschedule->screeningdate->doctorvisit_time}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card h-100">
            <div class="card-body">
                <h6 style="font-weight:600">Home Visit Reschedule Requested Date</h6>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Date</th>
                            <td>{{$reschedule->date}}</td>
                        </tr>
                        <tr>
                            <th>Time</th>
                            <td>{{$reschedule->time}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@else
    <div class="card">
        <div class="card-body">
            <h6 style="font-weight:600">Rescheduled Screening Date</h6>
            <table class="table">
                <tbody>
                    <tr>
                        <th width="50%">Date</th>
                        <td>{{$reschedule->screeningdate->doctorvisit_date}}</td>
                    </tr>
                    <tr>
                        <th width="50%">Time</th>
                        <td>{{$reschedule->screeningdate->doctorvisit_time}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endif
@if($reschedule->status == 0)
    <div class="text-right">
        <button type="button" class="btn btn-success mt-3" data-toggle="modal" data-target="#approveModalCenter">
            Approve
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="approveModalCenter" tabindex="-1" role="dialog" aria-labelledby="approveModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Approve Schedule Change Request</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('rescheduleRequest.approve',$reschedule->id)}}" method="post">
                    @csrf
                    <div class="modal-body">
                        Do you really want to approve this schedule change request?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Approve</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endif
@endsection