<div class="chart_container" id="daily_analytics_chart_{{$chartId}}"></div>

<script type="text/javascript" src="{{asset('global_assets/linechart/loader.js')}}"></script>
{{-- <script>
    google.charts.load('current', {
        'packages': ['corechart']
    });
    google.charts.setOnLoadCallback(dailydrawChart_{{ $chartId }});

    function dailydrawChart_{{ $chartId }}() {
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Total Viewers'],
            @if(count($chartData) > 0)
                @foreach ($chartData as $d)
                    ['{{ \Carbon\Carbon::parse($d['created_at'])->format("Y-m-d") }}', {{ $d['count'] }}],
                @endforeach
            @else
                ['No data available', 0]
            @endif
        ]);

        var options = {
            title: '{{ $chartTitle }} (Daily Stats)',
            colors: ['#3366CC'],
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
        var chart = new google.visualization.LineChart(document.getElementById('daily_analytics_chart_{{ $chartId }}'));

        chart.draw(data, options);
    }
</script> --}}
{{-- <script>
    $('#daily-{{$id}}-tab').on('shown.bs.tab', function (e,$chartId) {
        // Get the chart container element
        var chartContainer = document.getElementById('daily_analytics_chart_{{ $chartId }}');

        // Resize the chart container
        var newWidth = chartContainer.offsetWidth;
        var newHeight = chartContainer.offsetHeight;

        // Create the chart data and options
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Total Visitors', 'New Visitors', 'Returning Visitors'],
            @if(count($chartData) > 0)
                @foreach ($chartData as $visitor)
                    ['{{\Carbon\Carbon::parse($visitor['date'])->format("M d, Y")}}', {{ $visitor['total'] }}, {{ $visitor['new'] }},
                        {{ $visitor['return'] }}
                    ],
                @endforeach
            @else
                ['No data available', 0, 0, 0]
            @endif
        ]);

        var options = {
            title: '{{ $chartTitle }} (Daily Stats)',
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
</script> --}}
<script>
    $('#vacancy-tab').on('shown.bs.tab', function (e,$chartId) {
        // Get the chart container element
        var chartContainer = document.getElementById('daily_analytics_chart_{{ $chartId }}');

        // Resize the chart container
        var newWidth = chartContainer.offsetWidth;
        var newHeight = chartContainer.offsetHeight;

        // Create the chart data and options
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Total Visitors', 'New Visitors', 'Returning Visitors'],
            @if(count($chartData) > 0)
                @foreach ($chartData as $visitor)
                    ['{{\Carbon\Carbon::parse($visitor['date'])->format("M d, Y")}}', {{ $visitor['total'] }}, {{ $visitor['new'] }},
                        {{ $visitor['return'] }}
                    ],
                @endforeach
            @else
                ['No data available', 0, 0, 0]
            @endif
        ]);

        var options = {
            title: '{{ $chartTitle }} (Daily Stats)',
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
<script>
    $('#v-pills-{{$id}}-tab').on('shown.bs.tab', function (e,$chartId) {
        // Get the chart container element
        var chartContainer = document.getElementById('daily_analytics_chart_{{ $chartId }}');

        // Resize the chart container
        var newWidth = chartContainer.offsetWidth;
        var newHeight = chartContainer.offsetHeight;

        // Create the chart data and options
        var data = google.visualization.arrayToDataTable([
            ['Date', 'Total Visitors', 'New Visitors', 'Returning Visitors'],
            @if(count($chartData) > 0)
                @foreach ($chartData as $visitor)
                    ['{{\Carbon\Carbon::parse($visitor['date'])->format("M d, Y")}}', {{ $visitor['total'] }}, {{ $visitor['new'] }},
                        {{ $visitor['return'] }}
                    ],
                @endforeach
            @else
                ['No data available', 0, 0, 0]
            @endif
        ]);

        var options = {
            title: '{{ $chartTitle }}',
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