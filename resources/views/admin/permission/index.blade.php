@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Permission</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Permission</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>All Sub Roles</h4>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#store-types">
                Add Sub Roles
            </button>
            <div class="modal fade" id="store-types" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <form action="{{ route('subrole.store') }}" method="POST">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Add Sub Role</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">

                                    <label for="role_type" class="required">Sub Role:</label>
                                    <input type="text" id="relation" class="form-control" name="subrole"
                                        value="{{ old('subrole') }}" required />
                                    @error('subrole')
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
        <div class="card-body">
            @foreach ($subroles as $item)
                @if ($item->permission != null)
                    <a href="{{ route('permission.edit', $item->id) }}" class="btn btn-success"
                        style="margin: 6px">{{ $item->subrole }}</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" style="margin-left: -9px;"
                        data-target="#exampleModalCenter{{ $item->id }}">
                        <i class="icon-pen  mr-1"></i>
                    </button>
                @else
                    <a href="{{ route('permission.create', $item->id) }}" class="btn btn-danger"
                        style="margin: 6px">{{ $item->subrole }}</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" style="margin-left: -9px;"
                        data-target="#exampleModalCenter{{ $item->id }}">
                        <i class="icon-pen  mr-1"></i>
                    </button>
                @endif
                <div class="modal fade" id="exampleModalCenter{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Update Refer Percentage</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="{{ route('subrole.update', $item->id) }}">
                                @csrf
                                @method('PATCH')
                                <div class="modal-body">
                                    <input type="text" name="subrole" value="{{ $item->subrole }}"
                                        class="form-control" />
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
