@extends('admin.master')

@section('header')
    <script src="{{ asset('assets/js/plotly.js') }}"></script>
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">

                <h4 class="font-weight-semibold"><i class="icon-arrow-left52 mr-2"></i> <span
                        class="font-weight-semibold">Home</span> - Vendor</h4>

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

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card text-white" style="background-color: #063B9D">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">{{$card_data['product']}}</h3>
                                <a href="{{ route('product.index') }}" class="align-self-center ml-auto"
                                    style="color: white"><i class="icon-eye"></i> view</a>
                            </div>

                            <div>
                               Total Product
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card text-white" style="background-color: #063B9D">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">{{$card_data['tag']}}</h3>
                                <a href="{{ route('tags.index') }}" class="align-self-center ml-auto"
                                    style="color: white"><i class="icon-eye"></i> view</a>
                            </div>

                            <div>
                                Total Tags
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card text-white" style="background-color: #063B9D">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">{{$card_data['slider']}}</h3>
                                <a href="{{ route('vendorslider.index') }}" class="align-self-center ml-auto"
                                    style="color: white"><i class="icon-eye"></i> view</a>
                            </div>

                            <div>
                                Total Slider
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="card text-white" style="background-color: #063B9D">
                        <div class="card-body">
                            <div class="d-flex">
                                <h3 class="font-weight-semibold mb-0">{{$card_data['order']}}</h3>
                                <a href="{{ route('order.index') }}" class="align-self-center ml-auto"
                                    style="color: white"><i class="icon-eye"></i> view</a>
                            </div>

                            <div>
                                Total Orders
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div id='orderBarGraph'></div>
           
        </div>
    </div>

    
@endsection

@section('custom-script')
<script src="{{ asset('assets/js/plotly.js') }}"></script>
    <script>
        var data = @json($bargraph);
        //   alert(data.length)
        var t = [];
        var d = [];

        for (var i = 0; i < data.length; i++) {
            t.push(data[i].date);
            d.push(data[i].views);
        }

        var trace1  = {
            x: t,
            y: d,
            mode: 'lines+markers',
            type: 'scatter'
     
        };
        var data = [trace1];
        var layout = {
            title: 'Daily Product Orders Line Chart',
            height: 350,
            xaxis: {
                title: 'Date'
            },
            yaxis: {
                title: 'Total Orders '
            },
            // showlegend: false,
        }
        var config = {
            responsive: true
        }

        Plotly.newPlot('orderBarGraph', data, layout, config,{showSendToCloud:true} );
    </script>
@endsection
