@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Driver</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('driver.index') }}" class="breadcrumb-item">Driver</a>
                    <span class="breadcrumb-item active">Edit</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <style>
        .alert {
            padding-top: 2px;
            padding-bottom: 2px;
        }

        #map {
            height: 580px;
            z-index: 0;
        }
    </style>
    <div class="card">
        <form method="POST" action="{{ route('driver.update', $driver->id) }}" class="form-horizontal"
            enctype="multipart/form-data">
            @method('PATCH')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label"> Name<code>*</code></label>
                            <input type="text" class="form-control" name="name" required value="{{old('name') ?? $driver->driver->name }}">
                            @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Phone<code>*</code></label>
                            <input type="text" class="form-control" required name="phone" value="{{old('phone') ?? $driver->driver->phone }}">
                            @error('phone')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Email <code>*</code></label>
                            <input type="text" class="form-control" name="email" required value="{{old('email') ?? $driver->driver->email }}">
                            @error('email')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">
                                Address<code>*</code>
                            </label>
                            <input type="text" class="form-control" required name="address" value="{{old('address') ?? $driver->address }}">
                            @error('address')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">
                                Salary<code>*</code>
                            </label>
                            <input type="number" step="0.01" min="0" class="form-control" name="salary" value="{{old('salary') ?? $driver->salary }}">
                            @error('salary')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">
                                Status<code>*</code>
                            </label>
                            <input type="text" class="form-control" name="status" value="{{ $driver->status }}">
                            @error('status')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div> --}}

                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
@endsection
