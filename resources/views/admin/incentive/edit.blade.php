@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Incentive Manager</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('incentive.index') }}" class="breadcrumb-item">Incentive Manager</a>
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

        #map {
            height: 580px;
            z-index: 0;
        }
    </style>
    <div class="card">
        <form method="POST" action="{{ route('incentive.update',$incentiveManager->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Incentive Receiver<code>*</code></label>
                            <select name="incentive_receiver" class="form-control">
                                <option value=""><--select--></option>
                                @foreach ($incetiveReceiver as $item)
                                <option value="{{$item->id}}" {{$item->id == $incentiveManager->incentive_receiver ? "selected" : " "}}>{{$item->subrole}}</option>
                                @endforeach
                            </select>
                            @error('incentive_receiver')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Package Type<code>*</code></label>
                            <select name="package_type" class="form-control">
                                <option value=""><<--select-->></option>
                                <option value="individual" {{ $incentiveManager->package_type == "individual" ? 'selected' : "" }}>Individual Package</option>
                                <option value="corporate" {{ $incentiveManager->package_type == "corporate" ? 'selected' : "" }}>Corporate Package</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Minimum Range<code>*</code></label>
                            <input type="number" min="0" class="form-control" name="minimum" value="{{$incentiveManager->minimum}}">
                            @error('minimum')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Maximum Range<code>*</code></label>
                            <input type="number" min="0" class="form-control" name="maximum" placeholder="1" value="{{$incentiveManager->maximum}}">
                            @error('maximum')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Incentive Percentage<code>*</code></label>
                            <input type="text" class="form-control" name="incentive_percentage" placeholder="1" value="{{$incentiveManager->incentive_percentage}}">
                            @error('incentive_percentage')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
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
