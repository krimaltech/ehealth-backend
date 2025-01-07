@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Doctor List</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('doctorlist.index') }}" class="breadcrumb-item">Doctor List</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<style>
    .doctor-list .card, .doctor-list .card-body{
        border-radius: 15px;
    }
    .doctor-list h5, .doctor-list h3{
        font-weight: 500;
    }
    .appointment-text{
        color:rgb(155, 153, 153);
    }
    .appointment-text:hover{
        text-decoration: underline;
    }
</style>
    <div class="row doctor-list">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if(($doctor->image != null))
                    <div>
                        <img src="{{$doctor->image_path}}" alt="" class="rounded-circle" width="125px">
                        <h3 class="my-3"><b> {{$doctor->salutation}}{{$doctor->user->name}}</b></h3>
                    </div>
                    @else
                    <div>
                        <img src="/images/profile.png" alt="" class="rounded-circle" width="125px">
                        <h3 class="my-3"><b> {{$doctor->salutation}}{{$doctor->user->name}}</b></h3>
                    </div>
                    @endif
                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span>NMC No. {{$doctor->nmc_no}}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span>{{$doctor->departments->department}} Department</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span>{{$doctor->user->phone}}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span>{{$doctor->user->email}}</span></p>
                                </div>
                                @if($doctor->address != null)
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span>{{$doctor->address}}</span></p>
                                </div>
                                @endif
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span>{{$doctor->year_practiced	}} Years Experience</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span>{{$doctor->gender}} </span></p>
                                </div>
                                @if($doctor->fee != null)
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span>Consultation Fee: Rs.{{$doctor->fee}} </span></p>
                                </div>
                                @endif
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4"><b>About Doctor</b></h3>
                    <div class="mb-3">
                        <h5>Specialization</h5>
                        <p>{{$doctor->specialization}}</p>
                    </div>
                    <div class="mb-3">
                        <h5>Qualification</h5>
                        <p>{{$doctor->qualification}}</p>
                    </div>
                    @if($doctor->hospital != null)
                        @if($doctor->hospital != "null")
                        <div class="mb-3">
                            <h5>Hospital Practices</h5>
                            @foreach ($doctor->hospital as $item)
                                @foreach ($hospital as $hos)
                                    @if($hos->id == $item)
                                    <p><i class="icon-arrow-right5"></i>{{ $hos->name }}</p>
                                    @endif
                                @endforeach
                            @endforeach
                        </div>
                        @endif
                    @endif
                </div>
            </div>
        </div> 
    </div>
    <div class="card">
        <div class="card-body">
            <h3 class="mb-4">Appointments</h3>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="scheduled-tab" data-toggle="tab" href="#scheduled" role="tab" aria-controls="scheduled" aria-selected="true">Scheduled<span class="badge badge-warning ml-2">{{$scheduled_count}}</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="completed" aria-selected="false">Completed<span class="badge badge-success ml-2">{{$completed_count}}</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="cancelled-tab" data-toggle="tab" href="#cancelled" role="tab" aria-controls="cancelled" aria-selected="false">Cancelled<span class="badge badge-danger ml-2">{{$cancelled_count}}</span></a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="scheduled" role="tabpanel" aria-labelledby="scheduled-tab">
                    <table class="table table-bordered table-hover datatable-colvis-basic">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>User</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Patient Condition/Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($scheduled as $item)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->member->user->name}}</td>
                                    <td>{{$item->slot->bookings->date}}</td>
                                    <td>{{$item->slot->slot}}</td>
                                    <td>{{$item->messages}}</td>
                                    <td>
                                        <a href="{{route('doctorlist.details',$item->id)}}" class="btn btn-primary"><i class="icon-eye2"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                    <table class="table table-bordered table-hover datatable-colvis-basic">
                        <thead>
                           <tr>
                                <th>S.N.</th>
                                <th>User</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Patient Condition/Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($completed as $item)
                               <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->member->user->name}}</td>
                                    <td>{{$item->slot->bookings->date}}</td>
                                    <td>{{$item->slot->slot}}</td>
                                    <td>{{$item->messages}}</td>
                                    <td>
                                        <a href="{{route('doctorlist.details',$item->id)}}" class="btn btn-primary"><i class="icon-eye2"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="cancelled" role="tabpanel" aria-labelledby="cancelled-tab">
                    <table class="table table-bordered table-hover datatable-colvis-basic">
                        <thead>
                           <tr>
                                <th>S.N.</th>
                                <th>User</th>
                                <th>Appointment Date</th>
                                <th>Appointment Time</th>
                                <th>Patient Condition/Message</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cancelled as $item)
                               <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->member->user->name}}</td>
                                    <td>{{$item->slot->bookings->date}}</td>
                                    <td>{{$item->slot->slot}}</td>
                                    <td>{{$item->messages}}</td>
                                    @if($item->booking_status == 'Cancelled')
                                    <td>
                                        <span class="badge badge-pill badge-danger">Cancelled</span>
                                    </td>
                                    @elseif($item->booking_status == 'Rejected')
                                    <td>
                                        <span class="badge badge-pill badge-warning">Rejected</span>
                                    </td>
                                    @endif
                                    <td>
                                        <a href="{{route('doctorlist.details',$item->id)}}" class="btn btn-primary"><i class="icon-eye2"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
