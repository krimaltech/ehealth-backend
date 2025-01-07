@extends('admin.master')

@section('header')
    <link rel="stylesheet" href="/global_assets/countrycode/css/intlTelInput.css">
    <link rel="stylesheet" href="/global_assets/countrycode/css/isValidNumber.css">
    <link rel="stylesheet" href="/global_assets/countrycode/css/prism.css">
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit</span> - Doctor Profile
                </h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('doctorprofile.index') }}" class="breadcrumb-item">Doctor Profile</a>
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
        <form method="POST" action="{{ route('doctorprofile.update', $doctor->slug) }}" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">

                <div class="row">
                    <div class="col-lg-12">
                        <h3>1. Personal Information</h3>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">NMC/NAMC/NHPC Number <code>*</code></label>
                            <input type="number" class="form-control" placeholder="NMC/NAMC/NHPC Number" name="nmc_no"
                                value="{{ $doctor->nmc_no }}">
                            @error('nmc_no')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Salutation <code>*</code></label>
                            <select class="form-control" name="salutation">
                                <option value="" selected disabled>--select--</option>
                                <option value="Dr." @if ($doctor->salutation == 'Dr.') selected @endif>Dr.</option>
                                <option value="Asst. Prof." @if ($doctor->salutation == 'Asst. Prof.') selected @endif>Asst. Prof.
                                </option>
                                <option value="Prof." @if ($doctor->salutation == 'Prof.') selected @endif>Prof.</option>
                            </select>
                            @error('salutation')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Name <code>*</code></label>
                            <input type="text" class="form-control" name="name" value="{{ $doctor->user->name }}">
                            @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Country<code>*</code></label>
                            <input type="text" class="form-control" name="country" value="{{ $doctor->country }}">
                            @error('country')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Date Of Birth<code>*</code></label>
                            <input type="date" class="form-control" name="date_of_birth"
                                value="{{ $doctor->date_of_birth }}" max="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                            @error('date_of_birth')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Nationality<code>*</code></label>
                            <input type="text" class="form-control" name="nationality"
                                value="{{ $doctor->nationality }}">
                            @error('nationality')
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
                                <option value="Male" @if ($doctor->gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if ($doctor->gender == 'Female') selected @endif>Female</option>
                                <option value="Other" @if ($doctor->gender == 'Other') selected @endif>Other</option>
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
                            <label class="form-label">Citizenship Issue Date<code>*</code></label>
                            <input type="date" class="form-control" name="citizenship_issue_date"
                                value="{{ $doctor->citizenship_issue_date }}" max="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                            @error('citizenship_issue_date')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Citizenship Number<code>*</code></label>
                            <input type="text" class="form-control" name="citizenship_number"
                                value="{{ $doctor->citizenship_number }}" >
                            @error('citizenship_number')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <h3>2. Contact Information</h3>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Email <code>*</code></label>
                            <input type="email" class="form-control" name="email"
                                value="{{ $doctor->user->email }}">
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
                            <input type="tel" id="phone1"
                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                value="{{ $doctor->user->phone }}">
                            <span id="valid-msg1" class="hide valid">✓ Valid</span>
                            <span id="error-msg1" class="hide error"></span>
                            {{-- <input type="number" class="form-control" name="phone" value="{{$doctor->user->phone}}"> --}}
                            @error('phone')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Department <code>*</code></label>
                            <select class="form-control" name="department">
                                <option value="" selected disabled>--select--</option>
                                @foreach ($departments as $item)
                                    <option value="{{ $item->id }}" @if ($doctor->department == $item->id) selected @endif>
                                        {{ $item->department }}</option>
                                @endforeach
                            </select>
                            @error('department')
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
                                value="{{ $doctor->year_practiced }}">
                            @error('year_practiced')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Address <code>*</code></label>
                            <input type="text" class="form-control" name="address" value="{{ $doctor->address }}">
                            @error('address')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Consultation Fee <code>*</code></label>
                            <input type="number" class="form-control" name="fee" value="{{ $doctor->fee }}">
                            @error('fee')
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
                                value="{{ $doctor->qualification }}">
                            @error('qualification')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Specialization <code>*</code></label>
                            <input type="text" class="form-control" name="specialization"
                                value="{{ $doctor->specialization }}">
                            @error('specialization')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Hospital </label>
                            <select class="form-control multiselect" multiple="multiple" name="hospital[]">

                                @if ($doctor->hospital == null || $doctor->hospital == 'null')
                                    @foreach ($hospital as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @else
                                    @foreach ($hospital as $item)
                                        <option value="{{ $item->id }}"
                                            @if (in_array($item->id, $doctor->hospital)) selected @endif>
                                            {{ $item->name }}</option>
                                    @endforeach
                                @endif

                            </select>
                            @error('department')
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
                                value="{{ $doctor->latitude }}" readonly>
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
                                value="{{ $doctor->longitude }}" readonly>
                            @error('longitude')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">Your Photo</label><br>
                        <img src="{{ $doctor->image_path }}" alt="{{ $doctor->image }}" height="200px" width="250px" style="border: solid">
                        <input type="file" name="image" onchange="readURL(this)">
                        <img src="" height="200px" width="250px" id="selectedImage" style="display: none; border: solid">
                        @error('image')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Hospital Affiliations<code>*</code></label>
                            <textarea class="summernote form-control" name="hospital_affiliations" cols="30" rows="10">{{ $doctor->hospital_affiliations }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Experiences<code>*</code></label>
                            <textarea class="summernote form-control" name="experiences" cols="30" rows="10">{{ $doctor->experiences }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Awards & Recognition<code>*</code></label>
                            <textarea class="summernote form-control" name="awards_and_recognition" cols="30" rows="10">{{ $doctor->awards_and_recognition }}</textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Research Journal<code>*</code></label>
                            <textarea class="summernote form-control" name="research_journal" cols="30" rows="10">{{ $doctor->research_journal }}</textarea>
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
    <!-- Summernote -->
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote()
        })
    </script>
    {{-- <script>
        $(document).ready(function(){
            $('.addBtn').on('click',function(){
                var div = '<div class="input-group mb-3 " id="hospitalInput">' +
                            ' <input type="text" class="form-control" name="hospital[]">' +
                            ' <button class="btn btn-outline-danger removeBtn" type="button" id="button-addon2"><i class="icon-minus2"></i></button>' +
                         '</div>'
                $('#group').append(div);
            })
            $("#group").on('click', '.removeBtn', function() {
                $(this).parent().remove();
            });
        })
    </script> --}}
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
