@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add</span>-Refer</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('referral.index') }}" class="breadcrumb-item">Refer</a>
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
        <form method="POST" action="{{ route('referral.store') }}" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">First Name<code>*</code></label>
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Last Name<code>*</code></label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Address</label>
                            <input type="text"  name="address" class="form-control" value="{{ old('address') }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Referral Email</label>
                            <input type="email"  name="referral_email" class="form-control" value="{{ old('referral_email') }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Referral Phone</label>
                            <input type="number"  name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>
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
