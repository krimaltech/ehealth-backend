<style>
     .chart_container {
        width: 100%;
        height: 400px;
    }

    @media (max-width: 767px) {
        .chart_container {
            height: 300px;
        }
    }

    @media (max-width: 480px) {
        .chart_container {
            height: 200px;
        }
    }
</style>
<div class="card h-100">
    <div class="card-header">
        <h6 style="font-weight: 500;color:#0d59a7">{{$chartTitle}}</h6>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th>Reference Range</th>
                <td>{{$report[0]['min_range']}} - {{$report[0]['max_range']}}</td>
            </tr>
            @foreach ($report as $item)
                <tr>
                    <th>{{$item['screening']['screening']}} Result</th>
                    <td>{{$item['value']}}</td>
                </tr>
            @endforeach
        </table>
        <div class="chart_container" id="{{$chartId}}" class="mx-auto"></div>
    </div>
</div>

<script type="text/javascript" src="{{asset('global_assets/linechart/loader.js')}}"></script>
<script>
    google.charts.load('current', { 'packages': ['corechart'] });
    google.charts.setOnLoadCallback(drawChart_{{ $chartId }});

    function drawChart_{{ $chartId }}() {
    var data = google.visualization.arrayToDataTable([
        ['Month', 'Min', 'Max',' Result'],
        @foreach($report as $d)
        ['{{$d['month']}}', {{$d['min_range']}}, {{$d['max_range']}}, {{$d['value']}}],
        @endforeach
    ]);

    var options = {
        title: '{{ $chartTitle }}',
        curveType: 'function',
        pointSize: 5,
        legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('{{ $chartId }}'));

    chart.draw(data, options);
    }

</script> 