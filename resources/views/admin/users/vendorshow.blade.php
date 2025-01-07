@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Vendor List</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Vendor Show</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 style="font-weight:600">Vendor Logo</h5>
            <img src="{{$vendor->image_path}}" alt="Logo" width="300px" height="300px">
        </div>
    </div>
    <div class="card">
        <div class="card-header border-bottom mb-3">
            <h5 style="font-weight:600">Vendor Documents</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <h5 style="font-weight:600">Company Registration</h5><br>
                    <a href="{{$vendor->file_path}}" target="_blank"><h6 class="mb-0">Click here to view document</h6></a>
                    <iframe src="{{$vendor->file_path}}" frameborder="0" width="100%" height="500px"></iframe>
                </div>
                <div class="col-md-4">
                    <h5 style="font-weight:600">IRD Document</h5><br>
                    <a href="{{$vendor->ird_path}}" target="_blank"><h6 class="mb-0">Click here to view document</h6></a>
                    <iframe src="{{$vendor->ird_path}}" frameborder="0" width="100%" height="500px"></iframe>
                </div>
                <div class="col-md-4">
                    <h5 style="font-weight:600">Tax Clearance</h5><br>
                    <a href="{{$vendor->tax_path}}" target="_blank"><h6 class="mb-0">Click here to view document</h6></a>
                    <iframe src="{{$vendor->tax_path}}" frameborder="0" width="100%" height="500px"></iframe>
                </div>
               
            </div>
        </div>
    </div>
    {{-- <div class="card">
        @if ($vendor->agreement_file == NULL)
        <form action="{{route('users.vendorupload', $vendor->id)}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="card-body">
                <h5 style="font-weight:600" for="">Upload Agreement File</h5>
                <input type="file" name="agreement_file" class="form-control">
            </div>
            <div class="card-footer">
                <input type="submit" class="btn btn-primary">
            </div>
        </form>
        @else
        <div class="card-body">            
            <a href="{{$vendor->agreement_file_path}}" target="_blank"><h6 class="mb-0">Click here to view document</h6></a>
            <iframe src="{{$vendor->agreement_file_path}}" frameborder="0" width="400px" height="500px"></iframe>
        </div>
        @endif
    </div> --}}
@endsection