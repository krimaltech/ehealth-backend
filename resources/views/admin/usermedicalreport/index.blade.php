@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Pathology Report</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Pathology Report</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
@if($userpackage != null)
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header border-bottom">
                    <div class="row">
                        <div class="col-md-6">
                            <select name="screening" id="screening" class="form-control">
                                @foreach ($userpackage->package->screening as $item)
                                    <option value="{{$item->id}}">{{$item->screening}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="checkup" id="checkup" class="form-control">
                                @foreach ($services as $item)
                                    <option value="{{$item->id}}">{{$item->service_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-3">
                    <table class="table table-striped">
                        <thead style="background-color:#063b9d;color:white">
                            <tr>
                                <th>Test</th>
                                <th>Range</th>
                                <th>Unit</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody id="results">
                            @foreach($test as $item)
                                <tr>
                                    <td><a class="test" style="cursor: pointer" id="{{$item->test_id}}" onClick="getId(this.id)">{{$item->test->tests}}</a></td>
                                    <td>{{$item->min_range}} - {{$item->max_range}}</td>
                                    <td>{{$item->test->unit}}</td>
                                    @if($item->value > $item->max_range || $item->value < $item->min_range)
                                    <td class="text-danger">{{$item->value}}</td>
                                    @else
                                    <td>{{$item->value}}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6" >
            <div class="card">
                <div class="card-body" >
                    <div id="curve_chart" style="height: 300px"></div>
                </div>
            </div>
        </div>
    </div>
@else
    <h5 class="text-danger">No Pathology reports found.</h5>
@endif
    {{-- <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header border-bottom">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="hidden" id="service" value="{{$serv->id}}">
                            <select name="quarter" id="quarter" class="form-control">
                                @foreach ($quarter as $item)
                                    <option value="{{$item->id}}" @if($item->id == 1) selected @endif>{{$item->quarter}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body mt-3">
                    <table class="table table-striped">
                        <thead style="background-color:#063b9d;color:white">
                            <tr>
                                <th>Test</th>
                                <th>Range</th>
                                <th>Unit</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody id="results">
                            @foreach ($test as $item)
                                <tr>
                                    <td>{{$item->test->tests}}</td>
                                    <td>{{$item->test->min_range}} - {{$item->test->max_range}}</td>
                                    <td>{{$item->test->unit}}</td>
                                    <td>{{$item->value}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6" >
            <div class="card">
                <div class="card-body" >
                    <div id="curve_chart" style="height: 300px"></div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('custom-script')
    <script>
        $(document).ready(function(){
            $('#screening').on('change',function(){
                let screening = $(this).val();
                $('#checkup').empty();
                $('#checkup').append('<option value="" selected disabled>--Select Checkup--</option>');
                $.ajax({
                    type :'get',
                    url : '/admin/usermedicalreport/' + screening ,
                    success:function(data) {
                        //console.log(data);                       
                        data.forEach(element => {
                            $('#checkup').append(
                                `<option value="${element['id']}">${element['service_name']}</option>`
                            );
                        });
                    }
                })
            })
            $('#checkup').on('change',function(){
                let screening = $('#screening').val();
                let checkup = $(this).val();
                $.ajax({
                    type :'get',
                    url : '/admin/usermedicalreport/' + screening + '/' +checkup,
                    success:function(data) {
                        //console.log(data);
                        $('#results').empty();
                        data.forEach(element => {
                            var value = '';
                            if(element['value'] > element['max_range'] || element['value'] < element['min_range'] ){
                                value = `<td class="text-danger"> ${element['value']} </td>`;
                            }
                            else{
                                value = `<td> ${element['value']} </td>          `
                            }
                            $('#results').append(
                                `<tr>
                                    <td><a class="test" id="${element['test_id']}" onClick="getId(this.id)" style="cursor: pointer">${element['test']['tests']}</a></td>
                                    <td> ${element['min_range']} - ${element['max_range']} </td>
                                    <td> ${element['test']['unit']} </td>  
                                    ${value}  
                                </tr>`
                            );
                        });
                    }
                })
            })
        })

    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        function getId(test_id){
            google.charts.load('current', {'packages':['corechart']})
            //alert(test_id);
            $.ajax({
                type :'get',
                url : '/admin/usermedicalreport/checkup/chart/' + test_id ,
                success:function(res) {
                    //console.log(res);
                    var data = new google.visualization.DataTable();
                    data.addColumn("string",'Month');
                    data.addColumn("number",'Min');
                    data.addColumn("number",'Max');
                    data.addColumn("number",'Result');
                    for (var i = 0; i < res.chart_data.length; i++) {
                        data.addRow([res.chart_data[i][0],parseFloat(res.chart_data[i][1]),parseFloat(res.chart_data[i][2]),parseFloat(res.chart_data[i][3])]);
                    }

                    var options = {
                    title: res.name.tests,
                    curveType: 'function',
                    legend: { position: 'bottom' },
                    pointSize: 5,
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                    chart.draw(data, options);
                }
            })
        }
    </script>
@endsection