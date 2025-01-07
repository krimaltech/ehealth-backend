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
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Date Of Order</th>
                        <th>Payment Status</th>
                        <th>Product Name</th>
                        <th>Product Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->orders->created_at->format('Y-d-m') }}</td>
                            @if ($item->orders->payment_status === 'unpaid')
                            <td><span class="badge bg-danger">{{ $item->orders->payment_status }}</span></td>
                            @else
                            <td><span class="badge bg-success">{{ $item->orders->payment_status }}</span></td>
                            @endif
                            <td>{{ $item->products->productName }}</td>
                            @if ($item->orders->status === 'pending')
                            <td><span class="badge bg-info">{{ $item->orders->status }}</span></td>
                            @elseif ($item->orders->status === 'delivered')
                            <td><span class="badge bg-success">{{ $item->orders->status }}</span></td>
                            @elseif ($item->orders->status === 'cancelled')
                            <td><span class="badge bg-danger">{{ $item->orders->status }}</span></td>
                            @else
                            <td><span class="badge bg-primary">{{ $item->orders->status }}</span></td>
                            @endif
                            <td><a href="{{route('order.show',$item->id)}}" class="btn btn-primary"><i class="icon-eye"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
