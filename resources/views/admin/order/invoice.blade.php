@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Order Details</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Order Details</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection
@section('content')
    <style>
        body {
            width: 100%;
            height: auto;
            overflow: visible;
        }

        ::-webkit-scrollbar {
            display: none;
        }

        .page-header {
            display: none;
        }

        .navbar-toggler {
            display: none !important;
        }

        .navbar {
            display: none !important;
        }

        .sidebar {
            display: none !important;
        }

        /* .print {
                        display: none !important;
                    }
                    .bank{
                        -webkit-print-color-adjust: exact !important;
                    } */
    </style>

    <body>
        <div class="section" style="display: flex; justify-content: space-between;">
            <div class="rectangle" style="width: 134px; height: 62px; background-color:#52C8F4;position: relative;">
                <p style="position: absolute; top: 5px;left: 8px; font-size: 18px;"><img src="{{ asset('/images/blue-logo.png') }}" alt="logo" width="100px" height="100px"></p>
            </div>
            <div class="unpaid" style="width: 134px; height: 82px; background-color: #C80C0C;position: relative;">
                <p style="font-size: 28px; color: white; position: absolute; top: 2px; left: 18px; font-weight: bold;">
                    UNPAID</p>
            </div>
        </div>
        <div class="address">
            <p style="text-align: right;">Ghargharmadoctor Pvt.Ltd.<br>
                VAT No : 606601586 <br>
                Phone : +977 9869421801 <br>
                Email : ghargharmadoctor@gmail.com <br>
                Web : www.ghargharmadoctor.com</p>
        </div>
        <div class="secondcontent"
            style="width: 100%;
    height: 150px;
    left: -3px;
    top: 200px;background: #423f3f; margin-top: 80px;">
            <p style="color: #C6DFF6; font-size: 18px; padding-top: 10px; margin-left: 25px;">Invoice to :</p>
            <p style="color: white; margin-left: 25px;padding-top:0;">Transaction no. : #{{ $order->order_number }} <br>
                Order date : {{ $order->created_at->format('D/M/Y') }} <br>
                Mail : {{ $order->user->email }} <br>
                ATTN : {{ $order->user->name }} <br>
                Address : Kathmandu, Nepal</p>
        </div>
        <table class="border" style="width: 100%;margin-top: 80px;">
            <thead style="background-color: #52C8F4; color: black;">
                <tr>
                    <th>S.N</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order['products'] as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->productName }}</td>
                        <td>{{ $item->pivot->quantity }}</td>
                        <td>{{ $item->sale_price }}</td>
                        <td>{{ $item->sale_price * $item->pivot->quantity }}</td>
                    </tr>
                @endforeach
                <thead style="background-color: #52C8F4; color: black;">
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>subtotal</th>
                        <th>Rs.{{ $order->sub_total }}</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>vat(13%)</th>
                        @php
                            $vat = 0;
                            $vat = $order->subtotal * 0.13;
                        @endphp
                        <th>{{ $vat }}</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>shipping charge</th>
                        <th>Rs.{{ $order->shipping->price }}</th>
                    </tr>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Total</th>
                        <th>Rs.{{ $order->total_amount }}</th>
                    </tr>
                </thead>
            </tbody>
        </table>
        <div class="line" style="height: 0;width: 200px; border: 1px solid black;margin-top: 80px;margin-left: 85%;">
            <p style="text-align: center;">Authorized person <br>Designation</p>
        </div>
        <div class="last" style="text-align: center; margin-top: 80px;">PDF Generated on :
            {{ $order->created_at->format('D/M/Y') }}</div>

        ​
    </body>
@endsection
