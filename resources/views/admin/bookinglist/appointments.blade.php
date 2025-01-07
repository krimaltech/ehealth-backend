@php
    $name ? $name : '';
@endphp


@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Appointments</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Appointments</span>
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
            <form method="POST" action="{{ route('appointment.search') }}">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="search by user"
                                value="{{ $name }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="text" class="form-control" name="doctor" placeholder="search by doctor"
                                value="{{ $doctor }}">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="date" class="form-control" name="date"
                                placeholder="search by appointment date" value="{{ $date }}">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control">search</button>
                        </div>
                    </div>
                </div>
            </form>


        </div>
        <table class="table table-bordered table-hover datatable-colvis-basic">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>User</th>
                    <th>Doctor</th>
                    <th>Doctor department</th>
                    <th>Appointment Date</th>
                    <th>Appointment Time</th>
                    <th>Payment Status</th>
                    <th>Appointment Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->member->user->name }}</td>
                        <td>{{ $item->doctor_profile->user->name }}</td>
                        <td>{{ $item->doctor_profile->departments->department }}</td>
                        <td>{{ $item->slot->bookings->date }}</td>
                        <td>{{ $item->slot->slot }}</td>
                        @if ($item->status == 0)
                            <td>
                                <span class="badge badge-pill badge-danger">Payment Due</span>
                            </td>
                        @else
                            <td>
                                <span class="badge badge-pill badge-success">Completed</span>
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
                        @elseif($item->booking_status == 'Rejected')
                            <td>
                                <span class="badge badge-pill badge-danger">Rejected</span>
                            </td>
                        @else
                            <td>
                                <span class="badge badge-pill badge-dark">Not Scheduled</span>
                            </td>
                        @endif
                        <td>
                            <a href="{{ route('appointment.show', $item->id) }}" class="btn btn-primary"><i
                                    class="icon-eye2"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
@endsection
