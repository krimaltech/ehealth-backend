@extends('admin.master')

@section('header')
    <link rel="stylesheet" href="/global_assets/countrycode/css/intlTelInput.css">
    <link rel="stylesheet" href="/global_assets/countrycode/css/isValidNumber.css">
    <link rel="stylesheet" href="/global_assets/countrycode/css/prism.css">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit</span> - Nurse Profile
                </h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('nurse.index') }}" class="breadcrumb-item">Nurse Profile</a>
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
    </style>
    <style>
        #map {
            height: 580px;
            z-index: 0;
        }
    </style>
    <div class="card">
        <form method="POST" action="{{ route('nurse.update', $nurse->slug) }}" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">NNC Number <code>*</code></label>
                            <input type="number" class="form-control" placeholder="NNC Number" name="nnc_no"
                                value="{{ $nurse->nnc_no }}">
                            @error('nnc_no')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Name <code>*</code></label>
                            <input type="text" class="form-control" name="name" value="{{ $nurse->user->name }}">
                            @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Email <code>*</code></label>
                            <input type="email" class="form-control" name="email" value="{{ $nurse->user->email }}">
                            @error('email')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Phone <code>*</code></label>
                            <input type="tel" id="phone1" class="form-control @error('phone') is-invalid @enderror"
                                name="phone" value="{{ $nurse->user->phone }}">
                            <span id="valid-msg1" class="hide valid">✓ Valid</span>
                            <span id="error-msg1" class="hide error"></span>
                            {{-- <input type="number" class="form-control" name="phone" value="{{$nurse->user->phone}}"> --}}
                            @error('phone')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Gender <code>*</code></label>
                            <select class="form-control" name="gender">
                                <option value="" selected disabled>--select--</option>
                                <option value="Male" @if ($nurse->gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if ($nurse->gender == 'Female') selected @endif>Female</option>
                                <option value="Other" @if ($nurse->gender == 'Other') selected @endif>Other</option>
                            </select>
                            @error('gender')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Address <code>*</code></label>
                            <input type="text" class="form-control" name="address" value="{{ $nurse->address }}">
                            @error('address')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Qualification <code>*</code></label>
                            <input type="text" class="form-control" name="qualification"
                                value="{{ $nurse->qualification }}">
                            @error('qualification')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Years Practiced <code>*</code></label>
                            <input type="number" class="form-control" name="year_practiced"
                                value="{{ $nurse->year_practiced }}">
                            @error('year_practiced')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Fee <code>*</code></label>
                            <input type="number" class="form-control" name="fee" value="{{ $nurse->fee }}">
                            @error('fee')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Latitude <code>*</code></label>
                            <input type="text" class="form-control" name="latitude" id="latitude"
                                value="{{ $nurse->latitude }}" readonly>
                            @error('latitude')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Longitude <code>*</code></label>
                            <input type="text" class="form-control" name="longitude" id="longitude"
                                value="{{ $nurse->longitude }}" readonly>
                            @error('longitude')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">Your Photo</label><br>
                        <img src="{{ asset('/storage/images/' . $nurse->image) }}" alt="" height="200px"
                            width="250px">
                        <input type="file" name="image" onchange="readURL(this)">
                        <img src="" height="200px" width="250px" id="selectedImage" style="display: none;">
                        @error('image')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
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
    <script src="/global_assets/countrycode/js/intlTelInput.js"></script>
    <script src="/global_assets/countrycode/js/isValidNumber.js"></script>
    <script src="/global_assets/countrycode/js/prism.js"></script>
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
            ).addTo(map);

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
                ).addTo(map);

                marker.on("dragend", function(e) {
                    document.getElementById("latitude").value = marker.getLatLng().lat;
                    document.getElementById("longitude").value = marker.getLatLng().lng;
                });
            }
        }
    </script>
@endsection
