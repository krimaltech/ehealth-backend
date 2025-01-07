@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Doctor Profile</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Doctor Profile</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <style>
        th,
        td {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .checked {
            color: orange;
        }

        #map {
            height: 500px;
            z-index: 0;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <div class="text-center">
                        <img src="{{ $doctor->image_path }}" alt="" height="150px" width="150px"
                            class="rounded-circle">
                    </div>
                    <div class="text-center mt-2">
                        <h6 class="mb-0">{{ $doctor->salutation }} {{ $doctor->user->name }}</h6>
                        <h6 class="text-primary">{{ $doctor->specialization }}</h6>
                    </div>
                    <table class="table table-borderless mx-3 my-4">
                        <tr>
                            <th>Doctor Type</th>
                            <td>Consultant Doctor</td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td>{{ $doctor->department == null ? '' : $doctor->departments->department }}</td>
                        </tr>
                        <tr>
                            <th>Qualification</th>
                            <td>{{ $doctor->qualification }}</td>
                        </tr>
                        <tr>
                            <th>Years Practiced</th>
                            <td>{{ $doctor->year_practiced }}</td>
                        </tr>
                        @if ($doctor->hospital != null)
                            @if ($doctor->hospital != 'null')
                                <tr>
                                    <th>Hospital</th>
                                    <td>
                                        @foreach ($doctor->hospital as $item)
                                            @foreach ($hospital as $hos)
                                                @if ($hos->id == $item)
                                                    {{ $hos->name }}
                                                @endif
                                            @endforeach
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            @else
                                <tr></tr>
                            @endif
                        @endif
                    </table>
                </div>
                <div class="col-md-7">
                    <div class="text-right">
                        @if ($doctor->user->kyc == null)
                            <a href="{{ route('kyc.create') }}" class="btn btn-success px-4">
                                <i class="icon-add"></i> KYC Add</a>
                        @else
                            <a href="{{ route('kyc.view') }}" class="btn btn-primary px-4">
                                </i> <i class="icon-eye"> </i> KYC View</a>
                        @endif

                        <a href="{{ route('doctorprofile.edit', $doctor->slug) }}" class="btn btn-primary px-4"><i
                                class="icon-pen mr-1"></i> Edit Profile</a>
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#exampleModalCenter">
                            <i class="icon-eye"></i>
                        </button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Profile Update Information</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ol>
                                        <li>Benefit of Profile Update</li>
                                        <li>Benefit of Profile Update</li>
                                        <li>Benefit of Profile Update</li>
                                        <li>Benefit of Profile Update</li>
                                        <li>Benefit of Profile Update</li>
                                        <li>Benefit of Profile Update</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card my-3 p-3 shadow-1">
                        <h4 class="card-title" style="border-bottom: 3px solid #007bff">My Profile</h4>
                        <table class="table table-borderless">
                            <tr>
                                <th>NMC/NAMC/NHPC No.</th>
                                <td>{{ $doctor->nmc_no }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $doctor->user->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $doctor->user->phone }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $doctor->gender }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $doctor->address }}</td>
                            </tr>
                            <tr>
                                <th>Consultation Fee</th>
                                <td>Rs. {{ $doctor->fee }}</td>
                            </tr>
                            <tr>
                                <th>Average Rating</th>
                                <td>
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="icon-star-full2 @if ($doctor->averageRating >= $i) checked @endif"></i>
                                    @endfor
                                </td>
                            <tr>
                                <th>Average Reviews</th>
                                <td>{{ $doctor->averageReview }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <h3 class="mb-4"><b> Doctor Location</b></h3>
            <div class="shadow border border-3 p-3 rounded my-3">
                <div id="map"></div>
            </div>
        </div>
    </div>


    <input type="hidden" id="latitude" value="{{ $doctor->latitude }}">
    <input type="hidden" id="longitude" value="{{ $doctor->longitude }}">
@endsection

@section('custom-script')
    <script>
        var hospitals = @json($hospital);

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
            //hospital added
            for (item of hospitals) {
                // alert(item.image_path)
                var myIcon = L.icon({
                    iconUrl: item.image_path,
                    iconSize: [55, 55]
                })

                new L.marker([item.latitude, item.longitude], {
                    icon: myIcon
                }).addTo(map).bindPopup(item.name)

            }

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

                //hospital added
                for (item of hospitals) {

                    var myIcon = L.icon({
                        iconUrl: item.image_path,
                        iconSize: [55, 55]
                    })

                    new L.marker([item.latitude, item.longitude], {
                        icon: myIcon
                    }).addTo(map).bindPopup(item.name)

                }
            }
        }
    </script>
@endsection
