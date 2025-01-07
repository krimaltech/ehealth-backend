@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Lab Test Bookings</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Lab Test Bookings</span>
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
                        <th>Member</th>
                        <th>Lab Profile</th>
                        <th>Lab Test</th>
                        <th>Booked Date</th>
                        <th>Booked Time</th>
                        <th>Amount</th>
                        <th>Payment Status</th>
                        <th>Booking Status</th>
                        @can('Admin')
                        <th>Assigned To</th>
                        @endcan
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->member->user->name}}</td>
                        @if($item->labprofile_id != null)
                            <td>
                                {{$item->labprofile->profile_name}}
                            </td> 
                            <td>
                                <ul class="mb-0"  style="padding-inline-start: 20px;">
                                @foreach ($item->labprofile->labtest as $test)
                                    <li>{{$test->tests}}</lI>
                                @endforeach
                                </ul>
                            </td>
                            @else
                            <td></td>
                        @endif
                        @if($item->labtest_id != null)
                        <td>{{$item->labtest->tests}}</td>
                        @endif                        
                        <td>{{$item->date}}</td>
                        <td>{{$item->time}}</td>
                        <td>Rs. {{$item->price}}</td>
                        @if($item->status == 0)
                            <td>
                                <span class="text-danger">Pending</span>
                            </td>
                            @else
                            <td>
                                <span class="text-success">Completed</span>
                            </td>
                        @endif
                        @if($item->booking_status == 'Cancelled')
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
                            @elseif($item->booking_status == 'Sample Collected')
                            <td>
                                <span class="badge badge-pill badge-warning">Sample Collected</span>
                            </td>
                            @elseif($item->booking_status == 'Not Scheduled')
                            <td>
                                <span class="badge badge-pill badge-dark">Not Scheduled</span>
                            </td>
                        @endif
                        @can('Admin')
                        <td>{{$item->labtechnician_id != null ? $item->lab->user->name :''}}</td>
                        @endcan
                        @if($item->status == 1)
                            @if($item->labtechnician_id == null)
                                @can('Admin')
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#assignModalCenter_{{$item->id}}">
                                        Assign Lab Technician
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="assignModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="assignModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-sm  modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="assignModalLongTitle"> Assign Lab Technician</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('labtestbookings.assignlab',$item->id)}}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-body">
                                                        <label for="">Lab Technician</label>
                                                        <select name="labtechnician_id" id="" class="form-control">
                                                            <option value="">-- Assign Lab Technician --</option>
                                                            @foreach ($labs as $item)
                                                                <option value="{{$item->id}}">{{$item->user->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Assign</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                @endcan
                            @else
                                @foreach ($report as $key => $value)
                                    @if($key == $item->id)
                                        @if($value == 0)
                                            @can('Lab Technician')
                                                @if($item->booking_status == 'Scheduled')
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter_{{$item->id}}">
                                                        <i class="icon-plus-circle2 mr-1"></i> Sample Date
                                                    </button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter_{{$item->id}}Title" aria-hidden="true">
                                                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Sample Collection Date</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{route('labtestbookings.sample',$item->id)}}" method="POST">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <div class="modal-body">
                                                                        <div class="form-group">
                                                                            <label for="">Sample Collected Date</label>
                                                                            <input type="datetime-local" name="sample_date" class="form-control" value="" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                                    </div>
                                                                </form>                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                @endif
                                                @if($item->booking_status == 'Sample Collected')
                                                <td>
                                                    <a href="{{route('labtestbookings.create',$item->id)}}" class="btn btn-primary"><i class="icon-file-upload mr-1"></i>Upload Test Report</a>
                                                </td>
                                                @endif
                                            @endcan
                                            @canany(['SuperaAdmin','Admin'])
                                            <td></td>
                                            @endcan
                                        @else
                                        <td>
                                            <a href="{{route('labtestbookings.show',$item->id)}}" class="btn btn-success"><i class="icon-eye2 mr-1"></i>View Test Report</a>
                                        </td>
                                        @endif
                                    @endif                            
                                @endforeach     
                            @endif                   
                        @else
                            <td></td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection