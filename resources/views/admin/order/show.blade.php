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
        <div class="col-lg-6">
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
                                <li>Cancel Reason</li>
                                <li>Description</li>
                                <li>Total Amount</li>
                            </ul>
                        </div>

                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                            <ul class="list list-unstyled mb-0">
                                <li><span class="font-weight-semibold">{{ $order->orders->order_number }}</span></li>
                                <li><span class="font-weight-semibold">{{ $order->orders->user->name }}</span></li>
                                <li><span class="badge badge-success">{{ $order->orders->payment_method }}</span></li>
                                <li><span class="badge badge-success">{{ $order->orders->status }}</span></li>
                                <li><span class="font-weight-semibold">{{ $order->orders->phone }}</span></li>
                                <li><span class="font-weight-semibold">{{ $order->orders->address }}</span></li>
                                <li><span
                                        class="font-weight-semibold">{{ $order->orders->created_at->format('Y-m-d') }}</span>
                                </li>
                                <li><span class="font-weight-semibold">{{ $order->orders->cancel_reason }}</span></li>
                                <li><span class="font-weight-semibold">{{ $order->orders->description }}</span></li>
                                <li><span class="font-weight-semibold">{{ $order->orders->total_amount }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                            </ul>
                        </div>

                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                            <ul class="list list-unstyled mb-0">
                                <li><span class="font-weight-semibold">{{ $order->products->productName }}</span></li>
                                <li><span class="font-weight-semibold">{{ $order->products->actualRate }}</span></li>
                                <li><span class="font-weight-semibold">{{ $order->products->sale_price }}</span></li>
                                <li><span class="font-weight-semibold">{{ $order->products->discountPercent }}</span></li>
                                <li><span class="font-weight-semibold">{{ $order->products->averageRating }}</span></li>
                                <li><span class="font-weight-semibold">{{ $order->products->stock }}</span></li>
                                @if ($order->products->featured === 1)
                                <li><span class="badge badge-success">featured</span></li>
                                @else
                                <li><span class="badge badge-danger">un featured</span></li>
                                @endif
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-white header-elements-inline" style="background-color:#063B9D ">
                    User Product Details
                </div>
                <div class="card-body">
                    <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                        <div>
                            <ul class="list list-unstyled mb-0">
                                <li>Product Image</li>
                            </ul>
                        </div>

                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                            <ul class="list list-unstyled mb-0">
                                <li><span class="font-weight-semibold"></span><img
                                        src="{{ asset('/storage/images/' . $order->products->image) }}" alt=""
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
    </div>
@endsection
