@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">My Packages</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">My Packages</span>
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
                        <th>Package Type</th>
                        <th>No. of Visits</th>
                        <th>Booked Date & Time</th>
                        <th>Payment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->package->package_type}}</td>
                        <td>{{$item->package->visits}}</td>
                        @if($item->status == 0)
                        <td class="text-danger">
                            Not Booked
                        </td>
                        @else
                        <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($item->payment_date))->isoFormat('MMM Do YYYY (H:m A)') ?></td>
                        @endif
                        @if($item->status == 0)
                        <td>
                            <span class="badge badge-pill badge-danger">Pending</span>
                        </td>
                        @else
                        <td>
                            <span class="badge badge-pill badge-success">Completed</span>
                        </td>
                        @endif
                        <td>
                            <a href="{{route('userpackage.show',$item->slug)}}" class="btn btn-primary"><i class="icon-eye2"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection