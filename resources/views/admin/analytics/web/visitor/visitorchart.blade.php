
<h5 style="font-weight:600" class="mb-3">Web Visitor Analytics</h5>
<div class="visitors">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="daily-tab" data-toggle="tab" href="#daily" role="tab"
                aria-controls="daily" aria-selected="true">Today</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="weekly-tab" data-toggle="tab" href="#weekly" role="tab"
                aria-controls="weekly" aria-selected="false">This Week</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="monthly-tab" data-toggle="tab" href="#monthly" role="tab"
                aria-controls="monthly" aria-selected="false">This Month</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="yearly-tab" data-toggle="tab" href="#yearly" role="tab"
                aria-controls="yearly" aria-selected="false">This Year</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="all-tab" data-toggle="tab" href="#all" role="tab"
                aria-controls="all" aria-selected="false">All</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="daily" role="tabpanel" aria-labelledby="daily-tab">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#3366CC !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>Overall Page Visits</h5>
                        <p class="numbers">{{ $dailyvisitors->sum('total') }}</p>
                        @if($webPercent['dailyTotalPercent'] > 0)
                            <p class="text-success">+ {{$webPercent['dailyTotalPercent']}}%</p>
                        @elseif($webPercent['dailyTotalPercent'] < 0)
                            <p class="text-danger">{{$webPercent['dailyTotalPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$webPercent['dailyTotalPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#DC3912 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>New Visitors</h5>
                        <p class="numbers">{{ $dailyvisitors->sum('new') }}</p>
                        @if($webPercent['dailyNewPercent'] > 0)
                            <p class="text-success">+ {{$webPercent['dailyNewPercent']}}%</p>
                        @elseif($webPercent['dailyNewPercent'] < 0)
                            <p class="text-danger">{{$webPercent['dailyNewPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$webPercent['dailyNewPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#FF9900 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning Visitors</h5>
                        <p class="numbers">{{ $dailyvisitors->sum('return') }}</p>
                        @if($webPercent['dailyReturnPercent'] > 0)
                            <p class="text-success">+ {{$webPercent['dailyReturnPercent']}}%</p>
                        @elseif($webPercent['dailyReturnPercent'] < 0)
                            <p class="text-danger">{{$webPercent['dailyReturnPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$webPercent['dailyReturnPercent']}}%</p>
                        @endif
                    </div>
                </div>
            </div>
            {{-- <div class="card">
                <div class="card-body">
                    <div class="chart_container" id="daily_analytics_chart"></div>
                </div>
            </div> --}}
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
                            @foreach ($dailyLocation as $item)
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
        </div>
        <div class="tab-pane fade" id="weekly" role="tabpanel" aria-labelledby="weekly-tab">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#3366CC !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>Overall Page Visits</h5>
                        <p class="numbers">{{ $weeklyvisitors->sum('total') }}</p>
                        @if($webPercent['weeklyTotalPercent'] > 0)
                            <p class="text-success">+ {{$webPercent['weeklyTotalPercent']}}%</p>
                        @elseif($webPercent['weeklyTotalPercent'] < 0)
                            <p class="text-danger">{{$webPercent['weeklyTotalPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$webPercent['weeklyTotalPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#DC3912 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>New Visitors</h5>
                        <p class="numbers">{{ $weeklyvisitors->sum('new') }}</p>
                        @if($webPercent['weeklyNewPercent'] > 0)
                            <p class="text-success">+ {{$webPercent['weeklyNewPercent']}}%</p>
                        @elseif($webPercent['weeklyNewPercent'] < 0)
                            <p class="text-danger">{{$webPercent['weeklyNewPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$webPercent['weeklyNewPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#FF9900 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning Visitors</h5>
                        <p class="numbers">{{ $weeklyvisitors->sum('return') }}</p>
                        @if($webPercent['weeklyReturnPercent'] > 0)
                            <p class="text-success">+ {{$webPercent['weeklyReturnPercent']}}%</p>
                        @elseif($webPercent['weeklyReturnPercent'] < 0)
                            <p class="text-danger">{{$webPercent['weeklyReturnPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$webPercent['weeklyReturnPercent']}}%</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="chart_container" id="weekly_analytics_chart"></div>
                </div>
            </div>
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
                            @foreach ($weeklyLocation as $item)
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
        </div>
        <div class="tab-pane fade" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#3366CC !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>Overall Page Visits</h5>
                        <p class="numbers">{{ $monthlyvisitors->sum('total') }}</p>
                        @if($webPercent['monthlyTotalPercent'] > 0)
                            <p class="text-success">+ {{$webPercent['monthlyTotalPercent']}}%</p>
                        @elseif($webPercent['monthlyTotalPercent'] < 0)
                            <p class="text-danger">{{$webPercent['monthlyTotalPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$webPercent['monthlyTotalPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#DC3912 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>New Visitors</h5>
                        <p class="numbers">{{ $monthlyvisitors->sum('new') }}</p>
                        @if($webPercent['monthlyNewPercent'] > 0)
                            <p class="text-success">+ {{$webPercent['monthlyNewPercent']}}%</p>
                        @elseif($webPercent['monthlyNewPercent'] < 0)
                            <p class="text-danger">{{$webPercent['monthlyNewPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$webPercent['monthlyNewPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#FF9900 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning Visitors</h5>
                        <p class="numbers">{{ $monthlyvisitors->sum('return') }}</p>
                        @if($webPercent['monthlyReturnPercent'] > 0)
                            <p class="text-success">+ {{$webPercent['monthlyReturnPercent']}}%</p>
                        @elseif($webPercent['monthlyReturnPercent'] < 0)
                            <p class="text-danger">{{$webPercent['monthlyReturnPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$webPercent['monthlyReturnPercent']}}%</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="chart_container" id="monthly_analytics_chart"></div>
                </div>
            </div>
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
                            @foreach ($monthlyLocation as $item)
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
        </div>
        <div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#3366CC !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>Overall Page Visits</h5>
                        <p class="numbers">{{ $yearlyvisitors->sum('total') }}</p>
                        @if($webPercent['yearlyTotalPercent'] > 0)
                            <p class="text-success">+ {{$webPercent['yearlyTotalPercent']}}%</p>
                        @elseif($webPercent['yearlyTotalPercent'] < 0)
                            <p class="text-danger">{{$webPercent['yearlyTotalPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$webPercent['yearlyTotalPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#DC3912 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>New Visitors</h5>
                        <p class="numbers">{{ $yearlyvisitors->sum('new') }}</p>
                        @if($webPercent['yearlyNewPercent'] > 0)
                            <p class="text-success">+ {{$webPercent['yearlyNewPercent']}}%</p>
                        @elseif($webPercent['yearlyNewPercent'] < 0)
                            <p class="text-danger">{{$webPercent['yearlyNewPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$webPercent['yearlyNewPercent']}}%</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#FF9900 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning Visitors</h5>
                        <p class="numbers">{{ $yearlyvisitors->sum('return') }}</p>
                        @if($webPercent['yearlyReturnPercent'] > 0)
                            <p class="text-success">+ {{$webPercent['yearlyReturnPercent']}}%</p>
                        @elseif($webPercent['yearlyReturnPercent'] < 0)
                            <p class="text-danger">{{$webPercent['yearlyReturnPercent']}}%</p>
                        @else
                            <p class="text-secondary">{{$webPercent['yearlyReturnPercent']}}%</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="chart_container" id="yearly_analytics_chart"></div>
                </div>
            </div>
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
                            @foreach ($yearlyLocation as $item)
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
        </div>
        <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#3366CC !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#3366CC"><i class="icon-users mr-1"></i>Overall Page Visits</h5>
                        <p class="numbers">{{ $allvisitors->sum('total') }}</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#DC3912 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#DC3912"><i class="icon-users mr-1"></i>New Visitors</h5>
                        <p class="numbers">{{ $allvisitors->sum('new') }}</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="text-center py-3 border bg-white"
                        style="border-color:#FF9900 !important;border-radius:20px">
                        <h5 class="mb-0" style="color:#FF9900"><i class="icon-users mr-1"></i>Returning Visitors</h5>
                        <p class="numbers">{{ $allvisitors->sum('return') }}</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="chart_container" id="analytics_chart"></div>
                </div>
            </div>
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
                            @foreach ($allLocation as $item)
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
        </div>
    </div>
</div>


<script type="text/javascript" src="{{asset('global_assets/linechart/loader.js')}}"></script>
<!--All visitors-->
<script>
    $('#all-tab').on('shown.bs.tab', function (e) {
        // Get the chart container element
        var chartContainer = document.getElementById('analytics_chart');

        // Resize the chart container
        var newWidth = chartContainer.offsetWidth;
        var newHeight = chartContainer.offsetHeight;

        // Create the chart data and options
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Total Visitors', 'New Visitors', 'Returning Visitors'],
            @if(count($allvisitors) > 0)
                @foreach ($allvisitors as $visitor)
                    ['{{\Carbon\Carbon::parse($visitor['date'])->format("M d, Y")}}', {{ $visitor['total'] }}, {{ $visitor['new'] }},
                        {{ $visitor['return'] }}
                    ],
                @endforeach
            @else
                ['No data available', 0, 0, 0]
            @endif
        ]);

        var options = {
            title: 'Overall Website Visitors Analytics',
            colors: ['#3366CC', '#DC3912', '#FF9900'],
            pointSize: 5,
            legend: {
                position: 'bottom'
            },
            vAxis: {
                title: 'Viewers',
                minValue: 0,
                format: '0'
            },
            chartArea: {
                left: '5%',
                top: '10%',
                width: '90%',
                height: '80%'
            },
            chartMargins: {
                left: 0,
                right: 0
            },
        };

        // Create the chart
        var chart = new google.visualization.LineChart(chartContainer);

        // Draw the chart
        chart.draw(data, options);
    });    
</script>
<!--Daily visitors-->
{{-- <script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Total Visitors', 'New Visitors', 'Returning Visitors'],
            @if(count($dailyvisitors) > 0)
                @foreach ($dailyvisitors as $visitor)
                    ['{{\Carbon\Carbon::parse($visitor['date'])->format("M d, Y")}}', {{ $visitor['total'] }}, {{ $visitor['new'] }},
                        {{ $visitor['return'] }}
                    ],
                @endforeach
            @else
                ['No data available', 0, 0, 0]
            @endif
        ]);

        var options = {
            title: 'Today Website Visitors Analytics',
            colors: ['#3366CC', '#DC3912', '#FF9900'],
            pointSize: 5,
            legend: {
                position: 'bottom'
            },
            vAxis: {
                title: 'Visitors',
                minValue: 0,
                format: '0'
            },
            chartArea: {
                left: '5%',
                top: '10%',
                width: '90%',
                height: '80%'
            },
            chartMargins: {
                left: 0,
                right: 0
            },
        };

        var chart = new google.visualization.LineChart(document.getElementById('daily_analytics_chart'));

        chart.draw(data, options);

        // Add an event listener for tab changes
        $('#daily-tab').on('shown.bs.tab', function(e) {
            var chartContainer = document.getElementById('daily_analytics_chart');
            // Get the new dimensions of the chart container element
            var newWidth = chartContainer.offsetWidth;
            var newHeight = chartContainer.offsetHeight;

            // Update the chart options with the new dimensions
            options.width = newWidth;
            options.height = newHeight;

            // Draw the chart again with the new dimensions
            chart.draw(data, options);
        });
    }
</script> --}}
<!--Weekly visitors-->
<script>
    $('#weekly-tab').on('shown.bs.tab', function (e) {
        // Get the chart container element
        var chartContainer = document.getElementById('weekly_analytics_chart');

        // Resize the chart container
        var newWidth = chartContainer.offsetWidth;
        var newHeight = chartContainer.offsetHeight;

        // Create the chart data and options
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Total Visitors', 'New Visitors', 'Returning Visitors'],
            @if(count($weeklyvisitors) > 0)
                @foreach ($weeklyvisitors as $visitor)
                    ['{{\Carbon\Carbon::parse($visitor['date'])->format("M d, Y")}}', {{ $visitor['total'] }}, {{ $visitor['new'] }},
                        {{ $visitor['return'] }}
                    ],
                @endforeach
            @else
                ['No data available', 0, 0, 0]
            @endif
        ]);

        var options = {
            title: 'Weekly Website Visitors Analytics',
            colors: ['#3366CC', '#DC3912', '#FF9900'],
            pointSize: 5,
            legend: {
                position: 'bottom'
            },
            vAxis: {
                title: 'Viewers',
                minValue: 0,
                format: '0'
            },
            chartArea: {
                left: '5%',
                top: '10%',
                width: '90%',
                height: '80%'
            },
            chartMargins: {
                left: 0,
                right: 0
            },
        };

        // Create the chart
        var chart = new google.visualization.LineChart(chartContainer);

        // Draw the chart
        chart.draw(data, options);
    });   
</script>
<!--Monthly visitors-->
<script>
    $('#monthly-tab').on('shown.bs.tab', function (e) {
        // Get the chart container element
        var chartContainer = document.getElementById('monthly_analytics_chart');

        // Resize the chart container
        var newWidth = chartContainer.offsetWidth;
        var newHeight = chartContainer.offsetHeight;

        // Create the chart data and options
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Total Visitors', 'New Visitors', 'Returning Visitors'],
            @if(count($monthlyvisitors) > 0)
                @foreach ($monthlyvisitors as $visitor)
                    ['{{\Carbon\Carbon::parse($visitor['date'])->format("M d, Y")}}', {{ $visitor['total'] }}, {{ $visitor['new'] }},
                        {{ $visitor['return'] }}
                    ],
                @endforeach
            @else
                ['No data available', 0, 0, 0]
            @endif
        ]);

        var options = {
            title: 'Monthly Website Visitors Analytics',
            colors: ['#3366CC', '#DC3912', '#FF9900'],
            pointSize: 5,
            legend: {
                position: 'bottom'
            },
            vAxis: {
                title: 'Viewers',
                minValue: 0,
                format: '0'
            },
            chartArea: {
                left: '5%',
                top: '10%',
                width: '90%',
                height: '80%'
            },
            chartMargins: {
                left: 0,
                right: 0
            },
        };

        // Create the chart
        var chart = new google.visualization.LineChart(chartContainer);

        // Draw the chart
        chart.draw(data, options);
    });    
</script>
<!--Yearly visitors-->
<script>
    $('#yearly-tab').on('shown.bs.tab', function (e) {
        // Get the chart container element
        var chartContainer = document.getElementById('yearly_analytics_chart');

        // Resize the chart container
        var newWidth = chartContainer.offsetWidth;
        var newHeight = chartContainer.offsetHeight;

        // Create the chart data and options
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Total Visitors', 'New Visitors', 'Returning Visitors'],
            @if(count($yearlyvisitors) > 0)
                @foreach ($yearlyvisitors as $visitor)
                    ['{{\Carbon\Carbon::parse($visitor['date'])->format("M d, Y")}}', {{ $visitor['total'] }}, {{ $visitor['new'] }},
                        {{ $visitor['return'] }}
                    ],
                @endforeach
            @else
                ['No data available', 0, 0, 0]
            @endif
        ]);

        var options = {
            title: 'Yearly Website Visitors Analytics',
            colors: ['#3366CC', '#DC3912', '#FF9900'],
            pointSize: 5,
            legend: {
                position: 'bottom'
            },
            vAxis: {
                title: 'Viewers',
                minValue: 0,
                format: '0'
            },
            chartArea: {
                left: '5%',
                top: '10%',
                width: '90%',
                height: '80%'
            },
            chartMargins: {
                left: 0,
                right: 0
            },
        };

        // Create the chart
        var chart = new google.visualization.LineChart(chartContainer);

        // Draw the chart
        chart.draw(data, options);
    });    
</script>