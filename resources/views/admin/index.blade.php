@extends('admin.master')
@section('header')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                @can('Superadmin')
                    <h4 class="font-weight-semibold"><i class="icon-arrow-left52 mr-2"></i> <span
                            class="font-weight-semibold">Home</span> - Superadmin</h4>
                @elsecan('Admin')
                    <h4 class="font-weight-semibold"><i class="icon-arrow-left52 mr-2"></i> <span
                            class="font-weight-semibold">Home</span> - Admin</h4>
                @elsecan('Employee')
                    <h4 class="font-weight-semibold"><i class="icon-arrow-left52 mr-2"></i> <span
                            class="font-weight-semibold">Home</span> - Employee</h4>
                @elsecan('Doctor')
                    <h4 class="font-weight-semibold"><i class="icon-arrow-left52 mr-2"></i> <span
                            class="font-weight-semibold">Home</span> - Doctor</h4>
                @elsecan('Vendor')
                    <h4 class="font-weight-semibold"><i class="icon-arrow-left52 mr-2"></i> <span
                            class="font-weight-semibold">Home</span> - Vendor</h4>
                @elsecan('User')
                    <h4 class="font-weight-semibold"><i class="icon-arrow-left52 mr-2"></i> <span
                            class="font-weight-semibold">Home</span> - User</h4>
                @elsecan('Driver')
                    <h4 class="font-weight-semibold"><i class="icon-arrow-left52 mr-2"></i> <span
                            class="font-weight-semibold">Home</span> - Driver</h4>
                @endcan
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Dashboard</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
@endsection

@section('content')
@can('Admin')
<div class="row">
    <div class="col-lg-2">

        <!-- Members online -->
        <div class="card text-white" style="background-color: #063B9D">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="font-weight-semibold mb-0">{{ $users }}</h3>
                    <a href="{{ route('users.users') }}" class="align-self-center ml-auto" style="color: white"><i
                            class="icon-eye"></i> view</a>
                </div>

                <div>
                    Total Users
                </div>
            </div>

            <div class="container-fluid">
                <div id="members-online"></div>
            </div>
        </div>
        <!-- /members online -->

    </div>
    <div class="col-lg-2">

        <!-- Members online -->
        <div class="card text-white" style="background-color: #063B9D">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="font-weight-semibold mb-0">{{ $doctors }}</h3>
                    <a href="{{ route('doctorlist.index') }}" class="align-self-center ml-auto" style="color: white"><i
                            class="icon-eye"></i> view</a>
                </div>

                <div>
                    Total Doctors
                </div>
            </div>

            <div class="container-fluid">
                <div id="members-online"></div>
            </div>
        </div>
        <!-- /members online -->

    </div>

    <div class="col-lg-2">

        <!-- Members online -->
        <div class="card text-white" style="background-color: #063B9D">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="font-weight-semibold mb-0">{{ $vendor }}</h3>
                    <a href="{{ route('users.vendordetail') }}" class="align-self-center ml-auto" style="color: white"><i
                            class="icon-eye"></i> view</a>
                </div>

                <div>
                    Total Vendors
                </div>
            </div>

            <div class="container-fluid">
                <div id="members-online"></div>
            </div>
        </div>
        <!-- /members online -->

    </div>
    <div class="col-lg-2">

        <!-- Members online -->
        <div class="card text-white" style="background-color: #063B9D">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="font-weight-semibold mb-0">{{ $driver }}</h3>
                    <a href="{{ route('ambulance.index') }}" class="align-self-center ml-auto" style="color: white"><i
                            class="icon-eye"></i> view</a>
                </div>

                <div>
                    Total Driver
                </div>
            </div>

            <div class="container-fluid">
                <div id="members-online"></div>
            </div>
        </div>
        <!-- /members online -->

    </div>
    <div class="col-lg-2">

        <!-- Members online -->
        <div class="card text-white" style="background-color: #063B9D">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="font-weight-semibold mb-0">{{ $employee }}</h3>
                    <a href="{{ route('users.index') }}" class="align-self-center ml-auto" style="color: white"><i
                            class="icon-eye"></i> view</a>
                </div>

                <div>
                    Total Employee
                </div>
            </div>

            <div class="container-fluid">
                <div id="members-online"></div>
            </div>
        </div>
        <!-- /members online -->

    </div>
    <div class="col-lg-2">

        <!-- Members online -->
        <div class="card text-white" style="background-color: #063B9D">
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="font-weight-semibold mb-0">{{ $teams }}</h3>
                    <a href="{{ route('team.index') }}" class="align-self-center ml-auto" style="color: white"><i
                            class="icon-eye"></i> view</a>
                </div>

                <div>
                    Total Advisors
                </div>
            </div>

            <div class="container-fluid">
                <div id="members-online"></div>
            </div>
        </div>
        <!-- /members online -->

    </div>
</div>
<div class="card">
    <div class="card-header">
        <h2 class="card-title">User Statistics</h2>
        <hr>
        <form action="{{ route('home') }}" method="GET">
            <div class="row">
                <div class="col-md-2">
                    <select name="role_type" class="form-control">
                        <option value="User">User</option>
                        <option value="Doctor">Doctor</option>
                        <option value="Vendor">Vendor</option>
                        <option value="Driver">Driver</option>
                    </select>
                </div>
                <div class="col-md-2">         
                    <button class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>
    <div class="card-body">
        <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-4">
                <div id="piechart" style="width: 350px; height: 400px;"></div>
            </div>
            <div class="col-md-4">
                <p class="text-end">Average age:{{ $averageAge }}</p>
                <div id="curve_chart" style="width: 350px; height: 400px"></div>
            </div>
            <div class="col-md-4">
                <div id="package" style="width: 350px; height: 400px"></div>
            </div>
        </div>
    </div>
</div>
@endcan
@canany(['Admin','Human Resource','Digital Marketing'])
<div>
    @include('admin.analytics.index')
</div>
@endcanany
    @can('Admin')
        <div class="row">
            {{-- <div class="col-lg-4">
                <div class="card-body">
                    <div id="piechart_3d" style="height: 200px;"></div>
                </div>
            </div> --}}
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                        <h4 class="card-title" style="font-weight: 700">Screening Details</h4>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Filter by Date
                            </button>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <form action="{{ route('home') }}" class="px-3 py-2" id="dateform">
                                    <div class="form-group">
                                        <label for="">Date</label>
                                        <input type="date" name="date" class="form-control" id="date"
                                            min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table datatable-colvis-basic">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Family Name</th>
                                    <th>User</th>
                                    <th>Package (Family Size)</th>
                                    <th>Screening</th>
                                    <th>Screening Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($packages as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->familyname->family_name }}</td>
                                        <td>{{ $item->familyname->primary->member->name }}</td>
                                        <td>{{ $item->package->package_type }} ({{ $item->familyfee->family_size }}
                                            {{ $item->familyfee->family_size > 1 ? 'members' : 'member' }})</td>
                                        <td>{{ $item->dates->last()->screening->screening }}</td>
                                        <td>{{ $item->dates->last()->screening_date }}</td>
                                        <td>
                                            <a href="{{ route('activated.show', $item->id) }}" class="btn btn-primary">
                                                <i class="icon-eye2"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                        <h4 class="card-title" style="font-weight: 700">Location Wise Analytics</h4>
                    </div>
                    <div class="card-body">
                        <table class="table datatable-colvis-basic">
                            <thead>
                                <tr>
                                    <th>S.N.</th>
                                    <th>Location</th>
                                    <th>Total Visitors</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($visitor as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->location }}</td>
                                        <td>{{ $item->total }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
        </div>
    @endcan
    {{-- @can('Vendor')
        <div class="row">
            <div class="col-lg-3">

                <!-- Members online -->
                <div class="card text-white" style="background-color: #063B9D">
                    <div class="card-body">
                        <div class="d-flex">
                            <h3 class="font-weight-semibold mb-0">{{ $products }}</h3>
                            <a href="{{ route('product.index') }}" class="align-self-center ml-auto" style="color: white"><i
                                    class="icon-eye"></i> view</a>
                        </div>

                        <div>
                            Total Products
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div id="members-online"></div>
                    </div>
                </div>
                <!-- /members online -->

            </div>
            <div class="col-lg-3">

                <!-- Members online -->
                <div class="card text-white" style="background-color: #063B9D">
                    <div class="card-body">
                        <div class="d-flex">
                            <h3 class="font-weight-semibold mb-0">{{ $orders }}</h3>
                            <a href="{{ route('product.index') }}" class="align-self-center ml-auto" style="color: white"><i
                                    class="icon-eye"></i> view</a>
                        </div>

                        <div>
                            Total Orders
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div id="members-online"></div>
                    </div>
                </div>
                <!-- /members online -->

            </div>
        </div>
    @endcan --}}


    @can('Doctor')
        <div class="card">
            <div class="card-body">
            </div>
        </div>
    @endcan
@endsection
@section('custom-script')
    {{-- <script type="text/javascript">
        google.charts.load("current", {
            packages: ["corechart"]
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                @php
                    foreach ($bargraph as $item) {
                        echo "['" . $item->roles->role_type . "'," . $item->total . '],';
                    }
                @endphp
            ]);

            var options = {
                title: 'My Daily Activities',
                is3D: true,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
            chart.draw(data, options);
        }
    </script> --}}
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['User', 'Registered per Gender'],
                @php
                    foreach ($gender as $item) {
                        echo "['" . $item->gender . "'," . $item->total . '],';
                    }
                @endphp
        ]);

        var options = {
          title: 'Gender Wise User'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Age', 'Total'],
          @php
                    foreach ($age_array as $item) {
                        echo "['" . $item['key'] . "'," . $item['value'] . '],';
                    }
                @endphp
        ]);

        var options = {
          title: 'Age Wise User',
          curveType: 'function',
          legend: { position: 'bottom' },
          colors: ['red'],
          
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['User', 'Registered per Gender'],
                @php
                    foreach ($package_brought as $item) {
                        echo "['" . $item->package_status . "'," . $item->total . '],';
                    }
                @endphp
        ]);

        var options = {
          title: 'User Package Status'
        };

        var chart = new google.visualization.PieChart(document.getElementById('package'));

        chart.draw(data, options);
      }
    </script>
@endsection
