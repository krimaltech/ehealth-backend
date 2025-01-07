@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Student Activation</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{route('activate.index')}}" class="breadcrumb-item">Student Activation</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection


@section('content')
    <div class="mb-3">
        Status : 
        @if($activate->status == 0)
        <span class="badge badge-warning">
            Pending
        </span>
        @elseif($activate->status == 1)
        <span class="badge badge-success">
            Approved
        </span>
        @else
        <span class="badge badge-danger">
            Rejected
        </span>
        @endif
    </div>
    @if($activate->reject_reason != null)
    <div class="alert alert-danger">
        Reject Reason: {!!$activate->reject_reason!!}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 style="font-weight: 500">School Profile</h5>
            <table class="table">
                <tbody>
                    <tr>
                        <th width="30%">School Name</th>
                        <td>{{$activate->profile->company_name}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Owner Name</th>
                        <td>{{$activate->profile->owner_name}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Contact Number</th>
                        <td>{{$activate->profile->contact_number}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Address</th>
                        <td>{{$activate->profile->company_address}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Primary Member</th>
                        <td>{{$activate->profile->member->user->name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 style="font-weight: 500">Student Activation</h5>
            <div class="alert alert-info">Activation Reason: {{$activate->activate_reason}}</div>
            <table class="table table-bordered datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>Student Username</th>
                        <th>Student Name</th>
                        <th>Year</th>
                        <th>Class</th>
                        <th>Section</th>
                        <th>Roll</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$activate->deactivate->user->user_name}}</td>
                        <td>{{$activate->deactivate->user->name}}</td>
                        <td>{{$activate->deactivate->user->member->school->year}}</td>
                        <td>{{$activate->deactivate->user->member->school->class}}</td>
                        <td>{{$activate->deactivate->user->member->school->section}}</td>
                        <td>{{$activate->deactivate->user->member->school->roll}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @if($activate->status == 0)
        <div class="text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#approveModalCenter">
                Approve
            </button>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModalCenter">
                Reject
            </button>
        </div>
        <div class="modal fade" id="approveModalCenter" tabindex="-1" role="dialog" aria-labelledby="approveModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Confirm Approval </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('activate.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="activate" value="{{$activate->id}}">
                        <div class="modal-body">
                            <h6>Are you sure that you want to approve this activation request?</h6>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Reject Activation Request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('activate.reject',$activate->id)}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Reject Reason</label>
                                <textarea name="reject_reason" class="summernote form-control" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Reject</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('custom-script')
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            toolbar:[['style', ['bold', 'italic']], //Specific toolbar display
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],] 

        });
    });
    </script>
@endsection