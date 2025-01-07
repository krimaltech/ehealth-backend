@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Family Leave Request</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Family Leave Request</span>
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
                    <th>Dependent Member</th>
                    <th>Leave Reason</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leave as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->family->family_name}}</td>
                        <td>{{$item->family->primary->user->name}}</td>
                        <td>{{$item->member->user->name}}</td>
                        <td>{{$item->leave_reason}}</td>
                        <td>
                            @if($item->status == 1)
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#approveModalCenter_{{$item->id}}">
                                Approve
                            </button>
                            <!-- Approve Modal -->
                            <div class="modal fade" id="approveModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="approveModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="approveModalLongTitle">Approve Leave Request</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('leaverequest.approve',$item->id)}}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <label for="">Do you really want to approve this leave request?</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success">Approve</button>
                                            </div>
                                        </form>                                    
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectModalCenter_{{$item->id}}">
                                Reject
                            </button>
                            <!-- Approve Modal -->
                            <div class="modal fade" id="rejectModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="rejectModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="rejectModalLongTitle">Reject Leave Request</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('leaverequest.reject',$item->id)}}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <label for="">Reject Reason</label>
                                                <textarea name="reject_reason" id="" cols="30" rows="3" class="form-control" required></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Reject</button>
                                            </div>
                                        </form>                                    
                                    </div>
                                </div>
                            </div>
                            @elseif($item->status == 3)
                            <span class="badge badge-success">Approved</span>
                            @elseif($item->status == 4)
                            <span class="badge badge-danger">Rejected</span>
                            <p style="font-size:12px" class="mb-0 text-danger">Reason : {{$item->reject_reason}}</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
