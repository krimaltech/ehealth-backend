@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Report Subject</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Report Subject</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reportSubjectModalCenter">
                Add Report Subject
            </button>
            <!-- Modal -->
            <div class="modal fade" id="reportSubjectModalCenter" tabindex="-1" role="dialog" aria-labelledby="reportSubjectModalCenterTitle" aria-hidden="true">
                <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Report Subject</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('reportsubject.store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Report Subject</label>
                                    <input type="text" class="form-control" name="subject" required>
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
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Report Subject</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subject as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->subject}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editReportSubjectModalCenter_{{$item->id}}">
                                    <i class="icon-pen"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="editReportSubjectModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editReportSubjectModalCenter_{{$item->id}}Title" aria-hidden="true">
                                    <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Report Subject</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('reportsubject.update',$item->id)}}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Report Subject</label>
                                                        <input type="text" class="form-control" name="subject" value="{{$item->subject}}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update changes</button>
                                                </div>
                                            </form>                      
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteReportSubjectModalCenter_{{$item->id}}">
                                    <i class="icon-trash"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="deleteReportSubjectModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteReportSubjectModalCenter_{{$item->id}}Title" aria-hidden="true">
                                    <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Confirm Deletion ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('reportsubject.destroy',$item->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <label for="">Are you sure you want to delete this report subject?</label>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                                </div>
                                            </form>                      
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection