@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Shipping</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('shipping.index') }}" class="breadcrumb-item">Shipping</a>
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
        .alert {
            padding-top: 2px;
            padding-bottom: 2px;
        }
    </style>
    <div class="card">
        <form method="POST" action="{{ route('shipping.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header">
                    <h3>Shipping Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Shipping Type<code>*</code></label>
                                <input type="text" class="form-control" required name="shipping_type"
                                    value="{{ old('citizenship_no') }}">
                                @error('type')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Minimum Value<code>*</code></label>
                                <input type="number"  min="0" class="form-control" required name="minimum" value="{{ old('minimum') }}">
                                @error('minimum')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Maximum Value<code>*</code></label>
                                <input type="number" min="0" class="form-control" required name="maximum" value="{{ old('maximum') }}">
                                @error('maximum')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Price<code>*</code></label>
                                <input type="number" step="0.01" min="0" class="form-control" required name="price" value="{{ old('price') }}">
                                @error('citizenship_no')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Status<code>*</code></label>
                                <select name="status" class="form-control" required>
                                    <option value="" disable selected>--select--</option>
                                    <option value="active" @if(old('status')=='active') selected @endif>Active</option>
                                    <option value="inactive" @if(old('status')=='inactive') selected @endif>In Active</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
@endsection
