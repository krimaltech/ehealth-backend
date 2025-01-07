@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Nurse Bookings</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Nurse Bookings</span>
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
                        <th>User Name</th>
                        <th>Phone</th>
                        <th>Shift</th>
                        <th>Book Date</th>
                        <th>Messages</th>
                        <th>Booking Status</th>
                        <th>Payment Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($nurseBooking as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->member->user->name}}</td>
                            <td>{{$item->member->user->phone}}</td>
                            <td>{{$item->shift->shift}}</td>
                            <td>{{$item->shift->date}}</td>
                            <td>{{$item->messages}}</td>
                            <td>{{$item->booking_status}}</td>
                            @if($item->status == 1)
                            <td>Completed</td>
                            @endif
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#recordModal_{{ $item->id }}">
                                    <i class="icon-upload"></i>
                                </button>
                                <div class="modal fade" id="recordModal_{{ $item->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="recordModalModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Add Nursing Record</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('nursebooking.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="booking_id" value="{{ $item->id }}">
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Date<code>*</code></label>
                                                                <input type="date" name="date" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Time<code>*</code></label>
                                                                <input type="time" name="time" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Pulse Rate/Minute<code>*</code></label>
                                                                <input type="number" name="pulse_rate" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Respiratory Rate/Minute<code>*</code></label>
                                                                <input type="number" name="respiratory_rate" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Temperature(°C)<code>*</code></label>
                                                                <input type="number" name="temperature" class="form-control" required step=".01">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Blood Pressure<code>*</code></label>
                                                                <div class="d-flex align-items-center">
                                                                    <input type="integer" name="upper" class="form-control" placeholder="Upper No."
                                                                        required>
                                                                    <span class="px-2">/</span>
                                                                    <input type="integer" name="lower" class="form-control" placeholder="Lower No."
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label for="">Description<code>*</code></label>
                                                                <textarea name="description" class="summernote form-control" cols="30" required></textarea>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{route('nursebooking.show',$item->id)}}" class="btn btn-primary"><i class="icon-eye2"></i> </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('custom-script')
    <!-- Summernote -->
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote()
        })
    </script>
@endsection

