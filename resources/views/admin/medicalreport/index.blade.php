@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Pathology Report</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Pathology Report</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    {{-- <div class="card">
        <div class="card-body">
            <table class="table table-bordered datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>   
                        <th>Sample No.</th>                     
                        <th>Family Name</th>
                        <th>User</th>
                        <th>Package</th>
                        <th>Screening</th>
                        <th>Screening Date</th>
                        <th>Report Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sample as $item)
                        @if($item->screeningdate->screening_date <= \Carbon\Carbon::now()->format('Y-m-d') && $item->screeningdate->userpackage->package_status == 'Activated')
                        <tr>
                            <td>{{$loop->iteration}}</td>                            
                            <td><span class="badge badge-success" style="font-size:13px">{{$item->sample_no}}</span></td>
                            <td>{{$item->screeningdate->userpackage->familyname->family_name}}</td>
                            <td>{{$item->members->user->name}}</td>
                            <td>{{$item->screeningdate->userpackage->package->package_type}}</td>
                            <td>{{$item->screeningdate->screening->screening}}</td>
                            <td>{{$item->screeningdate->screening_date}}</td>
                            <td>{{$item->status}}</td>
                            <td>
                                @if($item->sample_date == null)
                                    @canany(['Lab Technician','GD Nurse'])
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sampleModalCenter_{{$item->id}}">
                                        <i class="icon-plus-circle2"></i>
                                    </button>
                                      
                                    <div class="modal fade" id="sampleModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="sampleModalCenter_{{$item->id}}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Sample Collected Date</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('medicalreport.sampleStore')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="report" value="{{$item->id}}">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="form-label">Sample Collected Date and Time<code>*</code></label>
                                                            <input type="datetime-local" name="sample_date" id="sample_date" step=1 class="form-control" min="{{\Carbon\Carbon::now()->format('Y-m-d H:i:s')}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endcan
                                @endif
                                <a href="{{route('medicalreport.show', $item->id)}}" class="btn btn-primary">
                                    <i class="icon-eye2"></i>
                                </a>
                                @canany(['SuperAdmin','Admin'])
                                    @if($item->status == 'Sample Collected')
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sampleModalCenter_{{$item->id}}">
                                        <i class="icon-check"></i> Sample Deposited
                                    </button>
                                    <div class="modal fade" id="sampleModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="sampleModalCenter_{{$item->id}}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Confirm Sample Deposit </h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('medicalreport.deposited')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="report" value="{{$item->id}}">
                                                    <div class="modal-body">
                                                        <h6>Are you sure that the user's sample has been deposited in the lab?</h6>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Confirm</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endcan
                            </td>
                        </tr>
                        @else
                        <tr style="background-color: rgba(236, 240, 241, 0.5);
                        pointer-events: none;
                        width: 100%;"  aria-disabled="true" >
                            <td>{{$loop->iteration}}</td>
                            <td><span class="badge badge-success" style="font-size:13px">{{$item->sample_no}}</span></td>
                            <td>{{$item->screeningdate->userpackage->familyname->family_name}}</td>
                            <td>{{$item->members->user->name}}</td>
                            <td>{{$item->screeningdate->userpackage->package->package_type}}</td>
                            <td>{{$item->screeningdate->screening->screening}}</td>
                            <td>{{$item->screeningdate->screening_date}}</td>
                            <td>{{$item->status}}</td>
                            <td>
                                <span class="badge badge-secondary">Screening Activation Pending</span>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Family Name</th>
                        <th>User</th>
                        <th>Package <br/>(Family Size)</th>
                        <th>Booked Date</th>
                        <th>Payment Status</th>
                        <th>Latest Screening</th>
                        <th>Lab Visit Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->familyname->family_name}}</td>
                        <td>{{$item->familyname->primary->member->name}}</td>
                        <td>{{$item->package->package_type??''}} <br/>({{$item->familyname->family->count() + 1}} {{$item->familyname->family->count()+1 > 1  ? 'members' : 'member'}})</td>
                        <td>{{$item->booked_date}}</td>
                        @if($item->status == 0)
                        <td> 
                            <span class="badge text-danger">Payment Due</span>
                        </td>
                        @else
                        <td>
                            <span class="badge text-success">Completed</span>
                        </td>
                        @endif
                        <td>{{$item->dates->last()->screening->screening}}</td>
                        <td>{{$item->dates->last()->screening_date}}</td>
                        <td>
                            @if($item->dates->last()->status == 'Pending') 
                                <span class="badge badge-warning">
                                    In Progress 
                                </span> 
                            @elseif($item->dates->last()->status == 'Completed') 
                                <span class="badge badge-success">
                                    {{$item->dates->last()->status}} 
                                </span> 
                            @else
                                <span class="badge badge-warning">
                                    {{$item->dates->last()->status}} 
                                </span> 
                            @endif
                        </td>
                        <td>
                            <a href="{{route('medicalreport.view',$item->id)}}" class="btn btn-primary">
                                <i class="icon-eye2"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
