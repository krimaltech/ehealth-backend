@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Student Deactivation</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{route('deactivate.index')}}" class="breadcrumb-item">Student Deactivation</a>
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
        @if($deactivate->status == 0)
        <span class="badge badge-warning">
            Pending
        </span>
        @elseif($deactivate->status == 1)
        <span class="badge badge-success">
            Approved
        </span>
        @elseif($deactivate->status == 2)
        <span class="badge badge-danger">
            Rejected
        </span>
        @else
        <span class="badge badge-danger">
            Cancelled
        </span>
        @endif
    </div>
    @if($deactivate->reject_reason != null)
    <div class="alert alert-danger">
        @if($deactivate->status == 2) Reject @elseif($deactivate->status == 3) Cancel @endif Reason: {!!$deactivate->reject_reason!!}
    </div>
    @endif
    <div class="card">
        <div class="card-body">
            <h5 style="font-weight: 500">School Profile</h5>
            <table class="table">
                <tbody>
                    <tr>
                        <th width="30%">School Name</th>
                        <td>{{$deactivate->profile->company_name}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Owner Name</th>
                        <td>{{$deactivate->profile->owner_name}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Contact Number</th>
                        <td>{{$deactivate->profile->contact_number}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Address</th>
                        <td>{{$deactivate->profile->company_address}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Primary Member</th>
                        <td>{{$deactivate->profile->member->user->name}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h5 style="font-weight: 500">Student Deactivation List</h5>
            <div class="alert alert-info">Deactivation Reason: {{$deactivate->deactivate_reason}}</div>
            <table class="table table-bordered datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Student Username</th>
                        <th>Student Name</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($deactivate->students as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->user->user_name}}</td>
                            <td>{{$item->user->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @if($deactivate->status == 0)
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
                    <form action="{{route('deactivate.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="deactivate" value="{{$deactivate->id}}">
                        <div class="modal-body">
                            <h6>Are you sure that you want to approve this deactivation request?</h6>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Reject Deactivation Request</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('deactivate.reject',$deactivate->id)}}" method="post">
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