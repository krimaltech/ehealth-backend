@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Doctor Scheduling</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Doctor Scheduling</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <a href="{{ route('booking.create') }}" type="button" class="btn btn-primary">
                Doctor Scheduling
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Date</th>
                        <th>Slots</th>
                        <th>Service Type</th>
                        <th>Hospital Name</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($booking as $item => $value)
                            @foreach ($value->bookings as $item1 => $value1)
                                @foreach ($value1->times as $item3)
                                <tr>
                                    <td>{{ $item3->id++ }}</td>
                                    <td>{{$value1->date}}</td>
                                    <td><a class="btn btn-primary btm-sm">{{ $item3->slot }}</a></td>
                                    <td>{{ $item3->service_type }}</td>
                                    <td>{{$item3->hospitals == null  ? $item3->hospitals : $item3->hospitals->name }}</td>
                                </tr>
                                @endforeach
                            @endforeach
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
