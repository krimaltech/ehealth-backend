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
                    <a href="{{ route('medicalreport.index') }}" class="breadcrumb-item">Pathology Report</a>
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
            <table class="table datatable-colvis-basic">
                <thead>
                    <tr>
                        <th width="50%">Members</th>
                        <th width="50%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($package->dates->last()->reports as $item)
                    <tr>
                        <td>{{$item->members->user->name}} <br/> @if($item->members->member_type == 'Primary Member')({{$item->members->member_type}})@endif</td>
                        <td>
                            <a href="{{route('medicalreport.viewchart',[$id,$item->member_id])}}" class="btn btn-primary">
                                View Chart Report
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @foreach ($package->dates as $date)
        <div class="card">
            <div class="card-header py-3 mb-3" style="background-color:#063b9d;color:white">
                <h6 style="font-weight:600" class="mb-0">{{$date->screening->screening}}</h6>
            </div>
            <div class="card-body">
                <h6 style="font-weight:600">Screening Details</h6>
                <table class="table table-bordered mt-4">
                    <tbody>
                        <tr>
                            <th>Subscription Package</th>
                            <th>Screening</th>
                            <th>Lab Visit Date and Time</th>
                            <th>Screening Status</th>
                            @if($date->additional_screening_status ==  0)
                                <th>Lab Follow Up Date and Time</th>
                            @endif
                        </tr>
                        <tr>
                            <td>{{$package->package->package_type}}</td>
                            <td>{{$date->screening->screening}}</td>  
                            <td>{{$date->screening_date}} {{$date->screening_time}}</td> 
                            <td>
                                @if($date->status == 'Pending') 
                                    <span class="badge badge-warning">
                                        In Progress 
                                    </span> 
                                @elseif($date->status == 'Completed') 
                                    <span class="badge badge-success">
                                        {{$date->status}} 
                                    </span> 
                                @else
                                    <span class="badge badge-warning">
                                        {{$date->status}} 
                                    </span> 
                                @endif
                            </td> 
                            @if($date->additional_screening_status ==  0)
                                <td>{{$date->additional_screening_date}} {{$date->additional_screening_time}}</td>
                            @endif
                        </tr>
                    </tbody>
                </table>   
                <h6 style="font-weight:600" class="mt-4">Family Details</h6>
                <table class="table table-bordered datatable-colvis-basic">
                    @if(count($date->reports) > 0)
                        <thead>
                            @if($package->package_id == 10)
                                <tr>
                                    <th colspan="6">
                                        Family Name : {{$package->familyname->family_name}} <br>
                                        Primary Member Name/Email/Phone : {{$package->familyname->primary->user->name}}/{{$package->familyname->primary->user->email}}/{{$package->familyname->primary->user->phone}}  
                                    </th>
                                </tr>
                            @else
                                <tr>
                                    <th colspan="6">Family Name : {{$package->familyname->family_name}}</th>
                                </tr>
                            @endif
                            <tr>
                                <th>S.N.</th>
                                <th width="18%">Members</th>
                                <th width="18%">Sample No.</th>
                                <th width="18%">Phone No.</th>
                                <th width="18%">Status</th>
                                <th width="18%">Actions</th>
                            </tr>
                        </thead>
                    @else
                        <thead>
                            @if($package->package_id == 10)
                                <tr>
                                    <th colspan="3">
                                        Family Name : {{$package->familyname->family_name}} <br>
                                        Primary Member Name/Email/Phone : {{$package->familyname->primary->user->name}}/{{$package->familyname->primary->user->email}}/{{$package->familyname->primary->user->phone}}  
                                    </th>
                                </tr>
                            @else
                                <tr>
                                    <th colspan="3">Family Name : {{$package->familyname->family_name}}</th>
                                </tr>
                            @endif
                            <tr>
                                <th>S.N.</th>
                                <th width="48%">Members</th>
                                <th width="48%">Phone No.</th>
                            </tr>
                        </thead>
                    @endif
                    <tbody>
                        @if(count($date->reports) > 0)
                            @foreach ($date->reports as $item)
                                @if($item->nosample == null || $date->additional_screening_status == 1)
                                    @if($date->screening_date <= \Carbon\Carbon::now()->format('Y-m-d') && $package->package_status == 'Activated')
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->members->user->name}} <br/> @if($item->members->member_type == 'Primary Member')({{$item->members->member_type}})@endif</td>
                                            <td>
                                                <span class="badge badge-success">
                                                    {{$item->sample_no}}
                                                </span>
                                            </td>
                                            <td>{{$item->members->user->phone}}</td>
                                            <td>
                                                @if($item->status == 'Report Verified' || $item->status == 'Report Completed')
                                                    <span class="text-success" style="font-weight:500"><i class="icon-checkmark3 mr-1"></i>Report Verified</span>
                                                @else
                                                    <span class="text-info" style="font-weight:500">{{$item->status}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->sample_date == null)
                                                    @canany(['Lab Technician','GD Nurse'])
                                                        @foreach($date->employees->whereIn('type',['Lab Technician','Lab Nurse']) as $emp)
                                                            @if($emp->employee_id == $employee->id)
                                                                @if($item->nosample == null)
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sampleModalCenter_{{$item->id}}">
                                                                        <i class="icon-plus-circle2"></i>
                                                                    </button>
                                                                    
                                                                    <div class="modal fade" id="sampleModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="sampleModalCenter_{{$item->id}}Title" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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
                                                                                            <input id="sample_date" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d H:i:s')}}" readonly>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Any information regarding sample collection</label>
                                                                                            <textarea name="sample_info" cols="30" rows="10" class="form-control summernote"></textarea>
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

                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#noSampleModalCenter_{{$item->id}}">
                                                                        <i class="icon-cross2"></i>
                                                                    </button>

                                                                    <div class="modal fade" id="noSampleModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="noSampleModalCenter_{{$item->id}}Title" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Sample Not Collected Reason</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form action="{{route('medicalreport.sampleNotStore')}}" method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden" name="medicalreport_id" value="{{$item->id}}">
                                                                                    <input type="hidden" name="screeningdate_id" value="{{$item->screeningdate_id}}">
                                                                                    <input type="hidden" name="familyname_id" value="{{$package->familyname->id}}">
                                                                                    <input type="hidden" name="additional_collection_status" value="0">
                                                                                    <div class="modal-body">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Provide reason for sample not collection<code>*</code></label>
                                                                                            <textarea name="reason" class="summernote form-control" cols="30" rows="10" required></textarea>
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
                                                                @else
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewReasonModal_{{$item->id}}">
                                                                    View Reason
                                                                    </button>
                                                                    <div class="modal fade" id="viewReasonModal_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="viewReasonModal_{{$item->id}}Title" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Sample Not Collected Reason</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="alert alert-info">Reason: {!!$item->nosample->reason!!}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endcan
                                                @endif
                                                <a href="{{route('medicalreport.show', [$package->id,$item->id])}}" class="btn btn-primary">
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
                                                {{-- @can(['Lab Technician'])
                                                    @if($item->status == 'Draft Report')
                                                        <a href="{{route('medicalreport.edit',[$package->id,$item->id])}}" class="btn btn-primary">
                                                            <i class="icon-pen"></i>
                                                        </a>
                                                    @endif
                                                @endcan--}}
                                            </td>
                                        </tr>
                                    @else
                                        <tr style="background-color: rgba(236, 240, 241, 0.5);
                                        pointer-events: none;
                                        width: 100%;"  aria-disabled="true" >
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->members->user->name}} <br/> @if($item->members->member_type == 'Primary Member')({{$item->members->member_type}})@endif</td>
                                            <td>
                                                <span class="badge badge-success">
                                                    {{$item->sample_no}}
                                                </span>
                                            </td>
                                            <td>{{$item->members->user->phone}}</td>
                                            <td>
                                                <span class="badge badge-secondary">Screening Activation In Progrss</span>
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endif
                                @else
                                    @if($date->additional_screening_date <= \Carbon\Carbon::now()->format('Y-m-d') && $package->package_status == 'Activated')
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$item->members->user->name}} <br/> @if($item->members->member_type == 'Primary Member')({{$item->members->member_type}})@endif</td>
                                            <td>
                                                <span class="badge badge-success">
                                                    {{$item->sample_no}}
                                                </span>
                                            </td>
                                            <td>{{$item->members->user->phone}}</td>
                                            <td>
                                                @if($item->status == 'Report Verified' || $item->status == 'Report Completed')
                                                    <span class="text-success" style="font-weight:500"><i class="icon-checkmark3 mr-1"></i>Report Verified</span>
                                                @else
                                                    <span class="text-info" style="font-weight:500">{{$item->status}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->sample_date == null)
                                                    @canany(['Lab Technician','GD Nurse'])
                                                        @foreach($date->employees->whereIn('type',['Lab Technician','Lab Nurse']) as $emp)
                                                            @if($emp->employee_id == $employee->id)
                                                                @if($item->additionalnosample == null )
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sampleModalCenter_{{$item->id}}">
                                                                        <i class="icon-plus-circle2"></i>
                                                                    </button>
                                                                    
                                                                    <div class="modal fade" id="sampleModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="sampleModalCenter_{{$item->id}}Title" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
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
                                                                                            <input type="datetime-local" name="sample_date" id="sample_date" class="form-control" max="{{\Carbon\Carbon::now()->format('Y-m-d\TH:i')}}" required>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Any information regarding sample collection<code>*</code></label>
                                                                                            <textarea name="sample_info" cols="30" rows="10" class="form-control summernote"></textarea>
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

                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#noSampleModalCenter_{{$item->id}}">
                                                                        <i class="icon-cross2"></i>
                                                                    </button>

                                                                    <div class="modal fade" id="noSampleModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="noSampleModalCenter_{{$item->id}}Title" aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Sample Not Collected Reason</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <form action="{{route('medicalreport.sampleNotStore')}}" method="POST">
                                                                                    @csrf
                                                                                    <input type="hidden" name="medicalreport_id" value="{{$item->id}}">
                                                                                    <input type="hidden" name="screeningdate_id" value="{{$item->screeningdate_id}}">
                                                                                    <input type="hidden" name="familyname_id" value="{{$package->familyname->id}}">
                                                                                    <input type="hidden" name="additional_collection_status" value="1">
                                                                                    <div class="modal-body">
                                                                                        <div class="form-group">
                                                                                            <label class="form-label">Provide reason for sample not collection<code>*</code></label>
                                                                                            <textarea name="reason" class="summernote form-control" cols="30" rows="10" required></textarea>
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
                                                                @else
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#viewReasonModal_{{$item->id}}">
                                                                    View Reason
                                                                    </button>
                                                                    <div class="modal fade" id="viewReasonModal_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="viewReasonModal_{{$item->id}}Title" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Sample Not Collected Reason</h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <div class="alert alert-info">Reason: {!!$item->additionalnosample->reason!!}</div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @endcan
                                                @endif
                                                <a href="{{route('medicalreport.show', [$package->id,$item->id])}}" class="btn btn-primary">
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
                                            <td>{{$item->members->user->name}} <br/> @if($item->members->member_type == 'Primary Member')({{$item->members->member_type}})@endif</td>
                                            <td>
                                                <span class="badge badge-success">
                                                    {{$item->sample_no}}
                                                </span>
                                            </td>
                                            <td>{{$item->members->user->phone}}</td>
                                            <td>
                                                <span class="badge badge-secondary">Follow Up Activation In Progrss</span>
                                            </td>
                                            <td></td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        @else
                            @if($package->package_id != 10)
                                <tr>
                                    <td>1</td>
                                    <td>{{$package->familyname->primary->member->name}} <br/> ({{$package->familyname->primary->member_type}})</td>
                                    <td>{{$package->familyname->primary->member->phone}}</td>
                                </tr>
                            @endif
                            @if(count($package->familyname->family) > 0)
                                @foreach ($package->familyname->family as $item)
                                    <tr>
                                        @if($package->package_id != 10)
                                            <td>{{$loop->iteration + 1}}</td>
                                        @else
                                            <td>{{$loop->iteration}}</td>
                                        @endif
                                        <td>{{$item->member->user->name}}</td>
                                        <td>{{$item->member->user->phone}}</td>
                                    </tr>
                                @endforeach
                            @endif
                        @endif
                    </tbody>
                </table>            
            </div>
        </div>
    @endforeach    
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