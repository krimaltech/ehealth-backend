@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Role</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Role</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <!-- Basic example -->
    <div class="card">
        <div class="card-body">
            <div class="row">
                    <!-- Button trigger modal -->
                    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#store-types">
                        Add Role
                    </button> --}}
                <div class="col-sm-6 text-right">
                    <!-- Modal -->
                    <div class="modal fade" id="store-types" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <form action="{{ route('role.store') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Role</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">

                                            <label for="role_type" class="required">Role:</label>
                                            <input type="text" id="relation"
                                                class="form-control" name="role_type" value="{{ old('role_type') }}" required />
                                            @error('role_type')
                                                <h6 style="color: red">{{ $message }}</h6>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="modal fade" id="store-types" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <form action="{{ route('role.store') }}" method="POST">
                                @csrf
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Add Role</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">

                                            <label for="name" class="required">Role:</label>
                                            <input type="text" class="form-control" name="role_type" value="{{ old('role_type') }}" required />
                                            @error('role_type')
                                                <h6 style="color: red">{{ $message }}</h6>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table class="table datatable-colvis-basic">
            <thead>
                <tr>
                    <td>S.N</td>
                    <td>Roles</td>
                    {{-- <td>Action</td> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($role as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->role_type }}</td>
                        {{-- <td style="display: flex;">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update-types_{{$item->id}}">
                                Edit
                            </button>
                            <div class="modal fade" id="update-types_{{$item->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form action="{{ route('role.update', $item->id) }}" method="POST">
                                        @csrf
                                        @method('patch')
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalCenterTitle">Edit Role
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">

                                                    <label for="role_type" class="required">Role:</label>
                                                    <input type="text"  id="relation"
                                                        class="form-control" name="role_type" value="{{ $item->role_type }}"
                                                        required />
                                                    @error('role_type')
                                                        <h6 style="color: red">{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic example -->
@endsection

