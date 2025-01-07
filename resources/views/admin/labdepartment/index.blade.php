@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Lab Department</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Lab Department</span>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#departmentModalCenter">
                Add Lab Department
            </button>
            <!-- Modal -->
            <div class="modal fade" id="departmentModalCenter" tabindex="-1" role="dialog" aria-labelledby="departmentModalCenterTitle" aria-hidden="true">
                <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Lab Department</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('labdepartment.store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Lab Department Name</label>
                                    <input type="text" class="form-control" name="department" required>
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
                        <th>Lab Department</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($labdepartment as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->department}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editdepartmentModalCenter_{{$item->id}}">
                                    <i class="icon-pen"></i> 
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="editdepartmentModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editdepartmentModalCenter_{{$item->id}}Title" aria-hidden="true">
                                    <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Lab Department</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('labdepartment.update',$item->id)}}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Lab Department Name</label>
                                                        <input type="text" class="form-control" name="department" value="{{$item->department}}" required>
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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection