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
        <form method="POST" action="{{ route('shipping.update',$shipping->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card">
                <div class="card-header">
                    <h3>Shipping Information</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Shipping Type<code>*</code></label>
                                <input type="text" required class="form-control" name="shipping_type"
                                    value="{{old('shipping_type') ?? $shipping->shipping_type }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Minimum Value<code>*</code></label>
                                <input type="number" required min="0" class="form-control" name="minimum" value="{{ old('minimun') ?? $shipping->minimum }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Maximum Value<code>*</code></label>
                                <input type="number" min="0" required class="form-control" name="maximum" value="{{ old('maximum') ?? $shipping->maximum }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Price<code>*</code></label>
                                <input type="number" min="0" step="0.01" required class="form-control" name="price" value="{{old('price') ?? $shipping->price }}">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Status<code>*</code></label>
                                <select name="status" class="form-control" required>
                                    <option value="" disable selected>--select--</option>
                                    <option value="active" @if ($shipping->status == 'active') selected @endif>Active</option>
                                    <option value="inactive" @if ($shipping->status == 'inactive') selected @endif>In Active</option>
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
