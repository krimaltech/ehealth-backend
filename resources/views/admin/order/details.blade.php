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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-white header-elements-inline" style="background-color:#063B9D ">
                    User Order Details
                </div>
                <div class="card-body">
                    <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                        <div>
                            <ul class="list list-unstyled mb-0">
                                <li>Order Number</li>
                                <li>User Name</li>
                                <li>Payment Method</li>
                                <li>Payment Status</li>
                                <li>Phone Number</li>
                                <li>Address</li>
                                <li>Order Date</li>
                                <li>Total Amount</li>
                                <li>Cancel Reason</li>
                                <li>Description</li>
                            </ul>
                        </div>

                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                            <ul class="list list-unstyled mb-0">
                                <li><span class="font-weight-semibold">{{ $order->order_number }}</span></li>
                                <li><span class="font-weight-semibold">{{ $order->user->name }}</span></li>
                                <li><span class="badge badge-success">{{ $order->payment_method }}</span></li>
                                <li><span class="badge badge-success">{{ $order->status }}</span></li>
                                <li><span class="font-weight-semibold">{{ $order->phone }}</span></li>
                                <li><span class="font-weight-semibold">{{ $order->address }}</span></li>
                                <li><span
                                        class="font-weight-semibold">{{ $order->created_at->format('Y-m-d') }}</span>
                                </li>
                                <li><span class="font-weight-semibold">{{ $order->total_amount }}</span></li>
                                <li><span class="font-weight-semibold">{{ $order->cancel_reason }}</span></li>
                                <li><span class="font-weight-semibold">{{ $order->description }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($order['products'] as $item)
            
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header text-white header-elements-inline" style="background-color:#063B9D ">
                    User Product Details
                </div>
                <div class="card-body">
                    <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                        <div>
                            <ul class="list list-unstyled mb-0">
                                <li>Product Name</li>
                                <li>Actual Amount</li>
                                <li>Selling Amount</li>
                                <li>Discount Percent</li>
                                <li>Average Rating</li>
                                <li>Stock</li>
                                <li>featured</li>
                                <li>Product Image</li>
                            </ul>
                        </div>

                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                            <ul class="list list-unstyled mb-0">
                                <li><span class="font-weight-semibold">{{ $item->productName }}</span></li>
                                <li><span class="font-weight-semibold">{{ $item->actualRate }}</span></li>
                                <li><span class="font-weight-semibold">{{ $item->sale_price }}</span></li>
                                <li><span class="font-weight-semibold">{{ $item->discountPercent }}</span></li>
                                <li><span class="font-weight-semibold">{{ $item->averageRating }}</span></li>
                                <li><span class="font-weight-semibold">{{ $item->stock }}</span></li>
                                @if ($item->featured === 1)
                                <li><span class="badge badge-success">featured</span></li>
                                @else
                                <li><span class="badge badge-danger">un featured</span></li>
                                @endif
                                <li><span class="font-weight-semibold"></span><img
                                    src="{{ asset('/storage/images/' . $item->image) }}" alt=""
                                    height="150px" width="150px" class="rounded-circle"></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <span class="text-muted">Last updated 12 mins ago</span>
                    <span class="d-inline-flex align-items-center">
                        <i class="icon-star-full2 font-size-base text-warning ml-1"></i>
                        <i class="icon-star-full2 font-size-base text-warning ml-1"></i>
                        <i class="icon-star-full2 font-size-base text-warning ml-1"></i>
                        <i class="icon-star-full2 font-size-base text-warning ml-1"></i>
                        <i class="icon-star-full2 font-size-base text-warning ml-1"></i>
                        <span class="text-muted ml-2">(24)</span>
                    </span>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
