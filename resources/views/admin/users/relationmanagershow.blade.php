@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Relationship Officer Details</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{route('users.relationmanagerdetail')}}" class="breadcrumb-item">Relationship Officer List</a>
                    <span class="breadcrumb-item active">Relationship Officer Details</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="row">
            <div class="col-md-6">
                <h2>Relationship Officer Image</h2>
                <img src="{{$relationmanager->image_path}}" alt=""  width="400px" height="500px">
            </div>
            <div class="col md 6">
                <h2>Relationship Officer File</h2>
                <a href="{{$relationmanager->file_path}}" target="_blank"><h6 class="mb-0">Click here to view document</h6></a>
                <iframe src="{{$relationmanager->file_path}}" frameborder="0" width="400px" height="500px"></iframe>
            </div>
            @if ($relationmanager->agreement_file == NULL)
            <div class="col-md-6">
                <form action="{{route('users.relationmanagerupload', $relationmanager->id)}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2>Upload Agreement File</h2>
                        </div>
                        <div class="card-body">
                            <input type="file" name="agreement_file" class="form-control">
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
            @else
            <div class="col md 6">
                <h2>Agreement File</h2>
                <a href="{{$relationmanager->agreement_file_path}}" target="_blank"><h6 class="mb-0">Click here to view document</h6></a>
                <iframe src="{{$relationmanager->agreement_file_path}}" frameborder="0" width="400px" height="500px"></iframe>
            </div>
            @endif
        </div>
    </div>
@endsection