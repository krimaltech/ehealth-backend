@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Activated Package List</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('activated.index') }}" class="breadcrumb-item">Activated Package List</a>
                    <span class="breadcrumb-item active">View</span>
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
            <div>
                <h4>Family Details</h4>
                <table class="table table-bordered datatable-colvis-basic">
                    <thead>
                        <tr>
                            <th>Family Name</th>
                            <th>User</th>
                            <th>Phone No.</th>
                            {{-- <th>First Screening Date</th>
                            <th>Screening Status</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$package->familyname->family_name}}</td>
                            <td>{{$package->familyname->primary->member->name}}</td>
                            <td>{{$package->familyname->primary->member->phone}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div  class="mt-5">
                <h4>Subscription Package Details</h4>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Package</th>
                            <th>Booked Date</th>
                            <th>Expiry Date</th>
                            <th>Package Status</th>
                            <th>Payment Status</th>
                            <th>Extended Days</th>
                            {{-- <th>First Screening Date</th>
                            <th>Screening Status</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$package->package->package_type}}</td>
                            <td>{{$package->booked_date}}</td>
                            <td>{{$package->expiry_date}}</td>
                            <td>{{$package->package_status}}</td>
                            @if($package->status == 0)
                            <td> 
                                <span class="badge text-danger">Payment Due</span>
                            </td>
                            @else
                            <td>
                                <span class="badge text-success">Completed</span>
                            </td>
                            @endif
                            @foreach($package->payment->take(1) as $payment)                                
                                <td>{{$payment->grace_days != null? $payment->grace_days : 0}} days</td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="mt-5">
                <h4 >Screening Dates</h4>
                <table class="table table-bordered">
                    <tr>
                        <th>Screening</th>
                        <th>Screening Date</th>
                        <th>Screening Status</th>
                        <th>Actions</th>
                    </tr>
                    @foreach ($package->dates as $item)
                    <tr>
                        <td>{{$item->screening->screening}}</td>
                        <td>{{$item->screening_date}}</td>
                        <td>{{$item->status}}</td> 
                        @if ($item->status == 'Pending')
                        @foreach($package->payment->take(1) as $payment) 
                        <td>
                            @if($payment->grace_days != null)
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#rescheduleModal">
                                Reschedule Screening Date
                            </button>
                            <div class="modal fade" id="rescheduleModal" tabindex="-1" role="dialog" aria-labelledby="rescheduleModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="rescheduleModalTitle">Reschedule Screening Date</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="{{route('reschedule',$item->id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">New Screening Date</label>
                                                <input type="date" name="screening_date" class="form-control" id="screening_date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
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
                            @else
                            <a href="{{route('activated.changeStatus',$item->id)}}" class="btn btn-primary">
                                Change Status
                            </a>
                            @endif
                        </td>
                        @endforeach
                        @endif
                    </tr>
                    @endforeach
                </table>
            </div>           
        </div>
    </div>
@endsection
