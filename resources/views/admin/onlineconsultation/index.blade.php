@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Online Consultation</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Online Consultation</span>
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
                        <th>User Name</th>
                        <th>Start Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($onlineConsultation as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->member->user->name }}</td>
                            <td>{{ $item->start_time }}</td>
                            <td>
                                @if ($item->status == 0)
                                    <button class="btn btn-danger">Meeting Not Completed</button>
                                @else
                                    <button class="btn btn-success">Meeting Completed</button>
                                @endif
                            </td>
                            @if ($item->status == 0)
                                <td>
                                    <a href="{{ $item->join_url }}" class="btn btn-primary">Join Meeting</a>
                                    <button class="btn btn-primary" type="button" class="dropdown-item" data-toggle="modal"
                                        data-target="#scheduleCompletedModal_{{ $item->id }}">
                                        <i class="icon-plus-circle2"></i>Add Medical Note
                                    </button>
                                </td>
                            @else
                                <td>
                                    <a href="{{ route('onlineconsultation.show', $item->id) }}" class="btn btn-primary"><i
                                            class="icon-eye"></i></a>
                                </td>
                            @endif
                            <!--Medical Note Modal-->
                            <div class="modal fade" id="scheduleCompletedModal_{{ $item->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="scheduleCompletedModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Add your recommendation or
                                                pescription</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('onlineconsultation.completed', $item->id) }}" method="post"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">History</label>
                                                    <textarea type="text" name="history" id="history" class="summernote form-control" cols="30" rows="8"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Examination</label>
                                                    <textarea type="text" name="examination" id="examination" class="summernote form-control" cols="30"
                                                        rows="8"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Treatment</label>
                                                    <textarea type="text" name="treatment" id="treatment" class="summernote form-control" cols="30" rows="8"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Progress</label>
                                                    <textarea type="text" name="progress" id="progress" class="summernote form-control" cols="30" rows="8"></textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
