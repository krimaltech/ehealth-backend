@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">{{$service->service_name}} - Report</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('usermedicalreport.index') }}" class="breadcrumb-item">Pathology Report</a>
                    <span class="breadcrumb-item active">{{$service->service_name}}</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<style>
    @media only screen and (min-width: 769px) and (max-width:1000px) {
        .report #curve_chart{
            width: 320px;
        }
    }
    @media only screen and (max-width: 500px) {
        .report #curve_chart{
            width: 350px;
        }
    }
    @media only screen and (max-width: 500px) {
        .report #curve_chart{
            width: 350px;
        }
    }
    @media only screen and (max-width: 400px) {
        .report #curve_chart{
            width: 250px;
        }
    }
</style>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <input type="hidden" name="service_id" id="service" value="{{$service->id}}">
                    <input type="hidden" name="test_result_type" id="test_result_type" value="{{$service->test_result_type}}">
                    <select name="screening_id" id="screening" class="form-control">
                        @foreach ($userpackage->package->screening as $item)
                            <option value="{{$item->id}}">{{$item->screening}}</option>
                        @endforeach
                    </select>
                    {{-- @foreach($tests->take(1) as $item)
                    @if($item->test == null)
                    <div id="report" class="mt-4">
                        <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                        View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                    </div>
                    @else
                    <table class="table table-striped mt-4">
                        <thead style="background-color:#063b9d;color:white">
                            <tr>
                                <th>Test</th>
                                <th>Range</th>
                                <th>Unit</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody id="results">
                            @foreach($tests as $item)
                                <tr>
                                    <td><a class="test" style="cursor: pointer" id="{{$item->test_id}}"  onClick="getId(this.id)">{{$item->test->tests}}</a></td>
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
                    @endif
                    @endforeach --}}
                    @if($service->test_result_type == 'Range')
                        <table class="table table-striped mt-4 table-responsive">
                            <thead style="background-color:#063b9d;color:white">
                                <tr>
                                    <th>Test</th>
                                    <th>Range</th>
                                    <th>Unit</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody id="results">
                                @foreach($tests as $item)
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
                    @elseif($service->test_result_type == 'Value')
                        <table class="table table-striped mt-4 table-responsive">
                            <thead style="background-color:#063b9d;color:white">
                                <tr>
                                    <th>Test Particulars</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody id="results">
                                @foreach($tests as $item)
                                    <tr>
                                        <td><a class="test" id="{{$item->test_id}}">{{$item->test->tests}}</a></td>
                                        <td>{{$item->result}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @elseif($service->test_result_type == 'Value and Image')
                        <table class="table table-striped mt-4 table-responsive">
                            <thead style="background-color:#063b9d;color:white">
                                <tr>
                                    <th>Test Particulars</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody id="results">
                                @foreach($tests as $item)
                                    @if($item->test != null)
                                    <tr>
                                        <td><a class="test" id="{{$item->test_id}}">{{$item->test->tests}}</a></td>
                                        <td>{{$item->result}}</td>
                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                        @foreach ($tests as $item)
                            @if($item->test == null)
                                <div id="report" class="mt-4">
                                    <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                                    View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                </div>
                            @endif
                        @endforeach
                    @elseif($service->test_result_type == 'Image')
                        @foreach ($tests as $item)
                            @if($item->test == null)
                                <div id="report" class="mt-4">
                                    <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                                    View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </div>
                <div class="col-md-6  text-center" >
                    <div id="curve_chart" style="height: 300px"></div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('custom-script')
    <script>
        $(document).ready(function(){
            $('#screening').on('change',function(){
                let screening = $(this).val();
                let service = $('#service').val();
                let test_result_type = $('#test_result_type').val();
                $.ajax({
                    type :'get',
                    url : '/admin/usermedicalreport/' + service  + '/' + screening ,
                    success:function(data) {
                        //console.log(data); 
                        if(data.length == 0){
                            $('#report').empty();
                            $('#report').append(
                                `<h5>No Test Report</h5>`
                            );
                            $('#results').empty();
                            $('#results').append(
                                ` <tr>
                                    <td colspan='2'>No Test Particulars</td>
                                </tr>`
                            );
                        }else{
                            $('#results').empty();
                            $('#report').empty();
                            if(test_result_type == 'Range'){
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
                                })
                            }
                            else if(test_result_type  == 'Value'){
                                data.forEach(element => {
                                    $('#results').append(
                                        `<tr>
                                            <td><a class="test" id="${element['test_id']}">${element['test']['tests']}</a></td>
                                            <td> ${element['result']} </td>   
                                        </tr>`
                                    );
                                })
                            }
                            else if(test_result_type  == 'Value and Image'){
                                data.forEach(element => {
                                    if(element['test'] == null){
                                        $('#report').append(
                                            `<iframe src="${element['report_path']}" width="100%" height="500px"></iframe>
                                            View Full Test Report <a href="${element['report_path']}" target="_blank">Click here</a>`
                                        );
                                    }
                                })
                                data.forEach(element => {
                                    if(element['test'] != null){
                                        $('#results').append(
                                            `<tr>
                                                <td><a class="test" id="${element['test_id']}">${element['test']['tests']}</a></td>
                                                <td> ${element['result']} </td>   
                                            </tr>`
                                        );
                                    }
                                })
                            }
                            else if(test_result_type == 'Image'){
                                data.forEach(element => {
                                    if(element['test'] == null){
                                        $('#report').append(
                                            `<iframe src="${element['report_path']}" width="100%" height="500px"></iframe>
                                            View Full Test Report <a href="${element['report_path']}" target="_blank">Click here</a>`
                                        );
                                    }
                                })
                            }
                        }
                        // if(data.length == 0){
                        //     $('#report').empty();
                        //     $('#results').empty();
                        // }else{
                        //     $('#results').empty();
                        //     if(data[0].test == null){
                        //         $('#report').empty();
                        //         data.forEach(element => {
                        //             $('#report').append(
                        //             `<iframe src="${element['report_path']}" width="100%" height="500px"></iframe>
                        //             View Full Test Report <a href="${element['report_path']}" target="_blank">Click here</a>`
                        //             );
                        //         });
                        //     }else{
                        //         $('#results').empty();
                        //         data.forEach(element => {
                        //             var value = '';
                        //             if(element['value'] > element['max_range'] || element['value'] < element['min_range'] ){
                        //                 value = `<td class="text-danger"> ${element['value']} </td>`;
                        //             }
                        //             else{
                        //                 value = `<td> ${element['value']} </td>          `
                        //             }
                        //             $('#results').append(
                        //                 `<tr>
                        //                     <td><a class="test" id="${element['test_id']}" onClick="getId(this.id)" style="cursor: pointer">${element['test']['tests']}</a></td>
                        //                     <td> ${element['min_range']} - ${element['max_range']} </td>
                        //                     <td> ${element['test']['unit']} </td>  
                        //                     ${value}  
                        //                 </tr>`
                        //             );
                        //         });
                        //     }
                        // }
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