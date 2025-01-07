@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Expo And Events</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('expo.index') }}" class="breadcrumb-item">Expo And Events</a>
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
        <form method="POST" action="{{ route('expo.update',$expo->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Expo Or Events Title<code>*</code></label>
                            <input type="text" class="form-control" name="title" value="{{ $expo->title }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Start Date<code>*</code></label>
                            <input type="date" class="form-control" name="start_date" value="{{ $expo->start_date }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">End Date<code>*</code></label>
                            <input type="date" class="form-control" name="end_date" value="{{ $expo->end_date }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Address<code>*</code></label>
                            <input type="text" class="form-control" name="address" value="{{ $expo->address }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Latitude <code>*</code></label>
                            <input type="text" class="form-control" name="latitude" id="latitude" readonly value="{{ $expo->latitude }}">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Longitude <code>*</code></label>
                            <input type="text" class="form-control" name="longitude" id="longitude" readonly value="{{ $expo->longitude }}">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="form-group">
                            <label class="form-label">Description<code>*</code></label>
                            <textarea class="summernote form-control" name="description" cols="30" rows="10">{{ $expo->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <label class="form-label">Logo<code>*</code></label><br>
                        <input type="file" name="image" onchange="readURL(this)">
                        <img src="" height="150px" width="250px" id="selectedImage" style="display: none;">
                        @error('image')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                        
                            <label class="form-label" for="">Priority</label>
                                <input type="checkbox" name="priority"
                                    @isset($expo) @if ($expo->priority == 1) checked @endif @endisset />
                        
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div id="map"></div>
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

@section('custom-script')
    <!-- Summernote -->
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote()
        })
    </script>
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
                ).addTo(map).bindPopup('Drag Me')
                .openPopup();

            marker.on("dragend", function(e) {
                document.getElementById("latitude").value = marker.getLatLng().lat;
                document.getElementById("longitude").value = marker.getLatLng().lng;
            });
        }
    </script>
@endsection
