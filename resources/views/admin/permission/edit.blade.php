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
                    <a href="{{ route('permission.index') }}" class="breadcrumb-item">Permission</a>
                    <span class="breadcrumb-item active">Add</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <style>
        <style>
        .alert {
            padding-top: 2px;
            padding-bottom: 2px;
        }
    </style>
    <div class="card">
        <form method="POST" action="{{ route('permission.update',$permissions->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Role<code>*</code></label>
                            <select name="role_id" id="" class="form-control" readonly>
                                @foreach($roles as $item)
                                <option value="{{$item->id}}" @if($item->id == $permissions->role_id) selected @endif>{{$item->role_type}}</option>
                                @endforeach
                            </select>
                            @error('title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Sub-Roles<code>*</code></label>
                            <select name="sub_role_id" id="" class="form-control">
                                @foreach ($subrole as $item)
                                    <option value="{{$item->id}}" @if($item->id == $permissions->sub_role_id) selected @endif>{{$item->subrole}}</option>
                                @endforeach
                            </select>
                            @error('title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <h1>Permission<code>*</code></h1>
                    <div class="col-lg-12">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Category</th>
                                    <th>Sub Category</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permission as $items)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="{{$items->id}}" name="permission_id[]" @if (in_array($items->id,$permissions->permission_id)) checked @endif>
                                            <label class="form-check-label" >
                                                <h4>{{$items->permission_title}}</h4>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        @foreach ($items->categories as $item)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="{{$item->id}}" name="permission_id[]" @if (in_array($item->id,$permissions->permission_id)) checked @endif>
                                            <label class="form-check-label" >
                                                <h4>{{$item->permission_title}}</h4>
                                            </label>
                                        </div>
                                        @endforeach
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
@endsection
