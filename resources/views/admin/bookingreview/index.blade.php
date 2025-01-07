@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Booking Details</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Booking Details</span>
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
                        <th>Doctor Name</th>
                        <th>Appointment Date</th>
                        <th>Appointment Time</th>
                        <th>Payment Status</th>
                        <th>Appointment Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->doctor_profile->user->name }}</td>
                            <td>{{ $item->slot->bookings->date }}</td>
                            <td>{{ $item->slot->slot }}</td>
                            @if ($item->status == 0)
                                <td class="text-danger">
                                    Pending
                                </td>
                            @else
                                <td class="text-success">
                                    Completed
                                </td>
                            @endif
                            @if ($item->booking_status == 'Cancelled')
                                <td>
                                    <span class="badge badge-pill badge-danger">Cancelled</span>
                                </td>
                            @elseif($item->booking_status == 'Completed')
                                <td>
                                    <span class="badge badge-pill badge-success">Completed</span>
                                </td>
                            @elseif($item->booking_status == 'Scheduled')
                                <td>
                                    <span class="badge badge-pill badge-warning">Scheduled</span>
                                </td>
                            @elseif($item->booking_status == 'Not Scheduled')
                                <td>
                                    <span class="badge badge-pill badge-dark">Not Scheduled</span>
                                </td>
                            @endif
                            <td>
                                <a href="{{ route('bookingreview.show', $item->slug) }}" class="btn btn-primary"><i
                                        class="icon-eye2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
