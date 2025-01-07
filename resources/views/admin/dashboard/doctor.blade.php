@extends('admin.master')

@section('header')
    <script src="{{ asset('assets/js/plotly.js') }}"></script>
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">

                <h4 class="font-weight-semibold"><i class="icon-arrow-left52 mr-2"></i> <span
                        class="font-weight-semibold">Home</span> - Doctor</h4>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="/admin" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Dashboard</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <style>
        .list-icons i {
            font-size: 50px;
        }

        .pull-right {
            text-align: right;
            margin: 5px;
        }
    </style>

    @php $d_sch= Helper::doctor_schedule(); @endphp
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card text-white" style="background-color: #063B9D">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">{{ $d_sch['schedule'] }}</h3>
                                <a href="{{ route('scheduled.index') }}" class="align-self-center ml-auto"
                                    style="color: white"><i class="icon-eye"></i> view</a>
                            </div>

                            <div>
                                Total Scheduled
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-white" style="background-color: #063B9D">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">{{ $d_sch['complete'] }}</h3>
                                <a href="{{ route('completed.index') }}" class="align-self-center ml-auto"
                                    style="color: white"><i class="icon-eye"></i> view</a>
                            </div>

                            <div>
                                Total Completed Schedule
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card text-white" style="background-color: #063B9D">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">{{ $d_sch['cancel'] }}</h3>
                                <a href="{{ route('cancelled.index') }}" class="align-self-center ml-auto"
                                    style="color: white"><i class="icon-eye"></i> view</a>
                            </div>

                            <div>
                                Total Cancelled Schedule
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card text-white" style="background-color: #063B9D">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">{{ count($patients) }}</h3>
                                <a href="{{ route('patient.index') }}" class="align-self-center ml-auto"
                                    style="color: white"><i class="icon-eye"></i> view</a>
                            </div>

                            <div>
                                Total Patients
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <div id='doctorReview'></div>
            {{-- {{$doctor}}
        {{$bookingReviews}} --}}
        </div>
    </div>
@endsection
@section('custom-script')
    <script>
        var data = @json($bookingReviews);
        //   alert(data.length)
        var t = [];
        var d = [];

        for (var i = 0; i < data.length; i++) {
            t.push(data[i].date);
            d.push(data[i].views);
        }

        var data = [{
            x: t,
            y: d,
            type: 'bar'
        }];

        var layout = {
            title: 'Doctor Reviews',
            height: 490,
            xaxis: {
                title: 'Date'
            },
            yaxis: {
                title: 'Total Reviews '
            },
        }
        var config = {
            responsive: true
        }

        Plotly.newPlot('doctorReview', data, layout, config);
    </script>
@endsection
