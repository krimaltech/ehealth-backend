@extends('admin.master')

@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Company Details</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Company Details</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection
@section('content')
<style>
    #map{
        height: 500px;
        z-index: 0;
    }
    .fileinput-upload {
        display: none;
    }

    .btn-file {
        z-index: 0 !important;
    }
</style>
    @if($details->brochure == null)
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#brochure">
        <i class="icon-plus2 mr-1"></i>Upload e-brochure
    </button>
    <!-- Modal -->
    <div class="modal fade" id="brochure" tabindex="-1" role="dialog" aria-labelledby="brochureTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="brochureTitle">Upload e-brochure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('ebrochure',$details->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" class="file-input" name="brochure" required>
                            <span class="mt-1"><i>(File must be of type .pdf)</i> </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>            
            </div>
        </div>
    </div>
    @else
    <a href="{{route('details.show',$details->id)}}" class="btn btn-success mb-2"> <i class="icon-eye2 mr-1"></i>View e-brochure</a>
    @endif
    <div class="card">
        <div class="card-header border-bottom">
            <h3 class="card-title">Company Details</h3>
        </div>
        <div class="card-body mt-4">
            <div class="row">
                <div class="col-md-6 h-100">
                    <input type="text" name="latitude" id="latitude" value="{{$details->latitude}}" hidden>
                    <input type="text" name="longitude" id="longitude" value="{{$details->longitude}}" hidden>
                    <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle" style="height:100px;width:auto" src="/images/blue-logo.png" height="100" width="120" alt="{{$details->name}}" />
                    </div>
                    <ul class="list-group list-group-unbordered my-3 shadow">
                        <li class="list-group-item justify-content-between">
                            <b>Name</b> <span class="text-primary" id="name">{{$details->name}}</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                            <b>Phone No.</b> <span class="text-primary">{{$details->phone_no}}</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                            <b>Email</b> <span class="text-primary">{{$details->email}}</span>
                        </li>
                        <li class="list-group-item justify-content-between">
                            <b>Address</b> <span class="text-primary">{{$details->address}}</span>
                        </li>
                        @if($details->wesbite != null)
                        <li class="list-group-item justify-content-between">
                            <b>Website</b> <span class="text-primary">{{ $details->website }}</span>
                        </li>
                        @endif
                        @if($details->facebook != null)
                        <li class="list-group-item justify-content-between">
                            <b>Facebook URL</b> <span class="text-primary">{{ $details->facebook }}</span>
                        </li>
                        @endif
                        @if($details->instagram != null)
                        <li class="list-group-item justify-content-between">
                            <b>Instagram URL</b> <span class="text-primary">{{ $details->instagram }}</span>
                        </li>
                        @endif
                        @if($details->linkedin != null)
                        <li class="list-group-item justify-content-between">
                            <b>LinkedIn URL</b> <span class="text-primary">{{ $details->linkedin }}</span>
                        </li>
                        @endif
                        @if($details->youtube != null)
                        <li class="list-group-item justify-content-between">
                            <b>YouTube URL</b> <span class="text-primary">{{ $details->youtube }}</span>
                        </li>
                        @endif
                        @if($details->twitter != null)
                        <li class="list-group-item justify-content-between">
                            <b>Twitter URL</b> <span class="text-primary">{{ $details->twitter }}</span>
                        </li>
                        @endif
                        @if($details->tiktok != null)
                        <li class="list-group-item justify-content-between">
                            <b>TikTok URL</b> <span class="text-primary">{{ $details->tiktok }}</span>
                        </li>
                        @endif
                        <a href="{{route('details.edit',$details->id)}}" class="btn btn-primary mx-1">Edit</a>
                    </ul>
                </div>
                <div class="maps col-md-6 h-100">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
<script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
<script src="/global_assets/js/demo_pages/fileinput.min.js"></script>
<script>
    var longitude = document.getElementById('longitude').value;
    var latitude = document.getElementById('latitude').value;
    var name = document.getElementById('name').innerText;
    var map = L.map('map').setView([latitude, longitude], 20);
    var marker = L.marker([latitude, longitude]).addTo(map);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    L.marker([latitude, longitude]).addTo(map)
        .bindPopup(name)
        .openPopup();
</script>
@endsection
