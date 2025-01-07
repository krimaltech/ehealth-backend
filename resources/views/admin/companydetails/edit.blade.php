@extends('admin.master')

@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit</span> - Company Details</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{route('details.index')}}" class="breadcrumb-item">Company Details</a>
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
    .alert{
        padding-top:2px;
        padding-bottom:2px;
    }
    #map {
        height: 580px;
        z-index: 0;
    }
</style>
    <div class="card">
        <form method="POST" action="{{route('details.update',$details->id)}}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Name<code>*</code></label>
                            <input type="text" name="name" class="form-control" value="{{old('name') ?? $details->name}}" required>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone_no">Phone no.<code>*</code></label>
                            <input type="number" name="phone_no" class="form-control" value="{{old('phone_no') ?? $details->phone_no}}"  required>
                            @error('phone_no')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">Email<code>*</code></label>
                            <input type="email" name="email" class="form-control" value="{{old('email') ?? $details->email}}" required>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="address">Address<code>*</code></label>
                            <input type="text" name="address" required class="form-control" value="{{old('address') ?? $details->address}}">
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="website">Website<code>*</code></label>
                            <input type="text" name="website" class="form-control" value="{{old('website') ?? $details->website}}">
                            @error('website')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <h6 style="font-weight:600" class="mb-4">Social Links</h6>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="facebook">Facebook URL</label>
                                <input type="text" name="facebook" class="form-control" value="{{old('facebook') ?? $details->facebook}}">
                                @error('facebook')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="instagram">Instagram URL</label>
                                <input type="text" name="instagram" class="form-control" value="{{old('instagram') ?? $details->instagram}}">
                                @error('instagram')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="linkedin">LinkedIn URL</label>
                                <input type="text" name="linkedin" class="form-control" value="{{old('linkedin') ?? $details->linkedin}}">
                                @error('linkedin')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="youtube">YouTube URL</label>
                                <input type="text" name="youtube" class="form-control" value="{{old('youtube') ?? $details->youtube}}">
                                @error('youtube')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="twitter">Twitter URL</label>
                                <input type="text" name="twitter" class="form-control" value="{{old('twitter') ?? $details->twitter}}">
                                @error('twitter')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tiktok">TikTok URL</label>
                                <input type="text" name="tiktok" class="form-control" value="{{old('tiktok') ?? $details->tiktok}}">
                                @error('tiktok')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="latitude">Latitude</label>
                            <input type="text" name="latitude" class="form-control" id="latitude" value="{{old('latitude') ?? $details->latitude}}" readonly>
                            @error('latitude')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="longitude">Longitude</label>
                            <input type="text" name="longitude" class="form-control" id="longitude" value="{{old('longitude') ?? $details->longitude}}" readonly>
                            @error('longitude')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>   
                </div>              
                <div class="shadow border border-3 p-3 rounded my-3">
                    <div id="map"></div>
                </div>
            </div>
            <!-- /.card-body -->
    
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
    
        </form>
    </div>
@endsection

@section('custom-script')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#selectedImage').attr('src', e.target.result);
                $('#selectedImage').css('display', 'block');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#selectedImage').change(function() {
        readURL(this);
    })
</script>
<script>
    window.onload = function() {
        getLocation();
    };

    var tileLayer = new L.TileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }
    );

    pre_lon = document.getElementById("longitude").value;
    pre_lat = document.getElementById("latitude").value;

    if (pre_lat && pre_lon) {
        var map = new L.Map("map", {
            center: [pre_lat, pre_lon],
            zoom: 20,
            layers: [tileLayer],
            scrollWheelZoom: false
        });

        var marker = L.marker(
            [pre_lat, pre_lon], {
                draggable: true,
            }
        ).addTo(map).bindTooltip('Drag me to select location').openTooltip();

        marker.on("dragend", function(e) {
            document.getElementById("latitude").value = marker.getLatLng().lat;
            document.getElementById("longitude").value = marker.getLatLng().lng;
        });
    } else {
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            var map = new L.Map("map", {
                center: [position.coords.latitude, position.coords.longitude],
                zoom: 20,
                layers: [tileLayer],
                scrollWheelZoom: false
            });

            var marker = L.marker(
                [position.coords.latitude, position.coords.longitude], {
                    draggable: true,
                }
            ).addTo(map).bindTooltip('Drag me to select location').openTooltip();

            marker.on("dragend", function(e) {
                document.getElementById("latitude").value = marker.getLatLng().lat;
                document.getElementById("longitude").value = marker.getLatLng().lng;
            });
        }
    }
</script>
@endsection