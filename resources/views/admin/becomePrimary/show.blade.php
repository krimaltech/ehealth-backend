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
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('becomeprimary.index') }}" class="breadcrumb-item">Primary Change Request</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    @if($primary->status == 0)
        <div class="mb-3">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#approveModalCenter_{{$primary->id}}">
                Approve
            </button>
            <div class="modal fade" id="approveModalCenter_{{$primary->id}}" tabindex="-1" role="dialog" aria-labelledby="approveModalCenter_{{$primary->id}}Title" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Confirm Approval </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('becomeprimary.approve',$primary->id)}}" method="POST">
                            @csrf
                            <div class="modal-body">
                                <h6>Are you sure that you want to approve this request?</h6>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#rejectModal">
                Reject
            </button>
            <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="rejectModalLabel">Add Reject Reason</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="{{route('becomeprimary.reject',$primary->id)}}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Reject Reason</label>
                                <textarea name="reject_reason" id="" cols="30" rows="3" class="form-control"></textarea>
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
        </div>
    @elseif($primary->status == 1)
        <div class="mb-3">
            <span class="badge badge-success"><h6 class="mb-0" style="font-size: 0.875rem">Approved</h6></span>
        </div>
    @elseif($primary->status == 2)
        <div class="mb-3">
            <span class="badge badge-danger"><h6 class="mb-0" style="font-size: 0.875rem">Rejected</h6></span>
            <span class="ml-2"><b>Reject Reason: </b><span class="text-danger">{{$primary->reject_reason}}</span></span>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Change Details</h5>
        </div>
        <div class="card-body">   
            <p><b>Family Name: </b>{{$primary->familyname->family_name}}</p>
            <p><b>Primary member family relation with new primary member: </b>{{$primary->family_relation}}</p>
            {{-- @if($primary->primary->family_name != null )
            <p><b>Family Name: </b>{{$primary->primary->family_name}}</p>
            @elseif($primary->newprimary->family_name != null )           
            <p><b>Family Name: </b>{{$primary->newprimary->family_name}}</p>
            @endif --}}
            <p><b>Change Reason: </b>{{$primary->change_reason}}</p>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Primary Member</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="25%">Name</th>
                        <th width="25%">Phone No.</th>
                        <th width="25%">Email</th>
                        <th width="25%">Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$primary->primary->user->name}}</td>
                        <td>{{$primary->primary->user->phone}}</td>
                        <td>{{$primary->primary->user->email}}</td>
                    </tr>
                </tbody>
            </table>       
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">New Primary Member Request</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th width="25%">Name</th>
                        <th width="25%">Phone No.</th>
                        <th width="25%">Email</th>
                        <th width="25%">Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{$primary->newprimary->user->name}}</td>
                        <td>{{$primary->newprimary->user->phone}}</td>
                        <td>{{$primary->newprimary->user->email}}</td>
                    </tr>
                </tbody>
            </table>       
        </div>
    </div>
    @if($primary->death_case == 1)
    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Death Certificate</h5>
        </div>
        <div class="card-body">
            <iframe src="{{$primary->death_certificate_path}}" frameborder="0" height="600" width="600"></iframe>     
        </div>
    </div>
    @endif
@endsection
