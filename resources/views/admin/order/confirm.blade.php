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
                        <th>Order Number</th>
                        <th>Order Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->created_at->diffForHumans() }}</td>
                            @if ($item->payment_status === 'unpaid')
                            <td><span class="badge bg-danger">{{ $item->payment_status }}</span></td>
                            @else
                            <td><span class="badge bg-success">{{ $item->payment_status }}</span></td>
                            @endif
                            <td>{{ $item->order_number }}</td>
                            <td><span class="badge bg-success">{{ $item->status }}</span></td>
                            <td>
                                <a href="{{route('order.details',$item->id)}}" class="btn btn-primary"><i class="icon-eye"></i></a>
                                {{-- @if ($item->status == 'pending')
                                <a href="{{route('order.confirmed',$item->id)}}" class="btn btn-primary"><i class="icon-checkmark"></i></a>
                                @endif --}}
                                <a href="{{route('order.invoice',$item->id)}}" class="btn btn-primary"><i class="icon-file-pdf"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
