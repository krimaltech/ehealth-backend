@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Update Version</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Update Version</span>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#store-types">
                    Update Version
                </button>
                <div class="col-sm-6 text-right">
                    <!-- Modal -->
                    <div class="modal fade" id="store-types" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <form action="{{ route('check-version.store') }}" method="POST">
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
                                            <label for="role_type" class="required">Updated Date:</label>
                                            <input type="date" id="relation" class="form-control" name="updated_date"
                                                value="{{ old('updated_date') }}" required />
                                            @error('updated_date')
                                                <h6 style="color: red">{{ $message }}</h6>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="status" class="required">Status:</label>
                                            <select name="status" class="form-control">
                                                <option value="">
                                                    <-select->
                                                </option>
                                                <option value="0">Skip</option>
                                                <option value="1">Force</option>
                                            </select>
                                            @error('status')
                                                <h6 style="color: red">{{ $message }}</h6>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="role_type" class="required">Version:</label>
                                            <input type="text" id="relation" class="form-control" name="version"
                                                value="{{ old('version') }}" required />
                                            @error('version')
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
                    <td>Version</td>
                    <td>Updated Date</td>
                    <td>Status</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($check_version as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->version }}</td>
                        <td>{{ $item->updated_date }}</td>
                        <td>{{ $item->status }}</td>
                        <td style="display: flex;">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#update-types_{{ $item->id }}">
                                Edit
                            </button>
                            <div class="modal fade" id="update-types_{{ $item->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <form action="{{ route('check-version.update', $item->id) }}" method="POST">
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
                                                    <label for="role_type" class="required">Updated Date:</label>
                                                    <input type="date" id="relation" class="form-control" name="updated_date"
                                                        value="{{ $item->updated_date }}" required />
                                                    @error('updated_date')
                                                        <h6 style="color: red">{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="status" class="required">Status:</label>
                                                    <select name="status" class="form-control">
                                                        <option value="">
                                                            <-select->
                                                        </option>
                                                        <option value="0" @if ($item->status == 0) selected @endif>Skip</option>
                                                        <option value="1" @if ($item->status == 1) selected @endif>Force</option>
                                                    </select>
                                                    @error('status')
                                                        <h6 style="color: red">{{ $message }}</h6>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="version" class="required">Version:</label>
                                                    <input type="text" id="relation" class="form-control" name="version"
                                                        value="{{ $item->version }}" required />
                                                    @error('version')
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

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic example -->
@endsection
