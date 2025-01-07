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
                    <a href="{{ route('findings.reportIndex') }}" class="breadcrumb-item">Pathology Report</a>
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
            <h6 style="font-weight:600">Screening Details</h6>
            <table class="table table-bordered mt-4">
                <tbody>
                    <tr>
                        <th width="20%">Subscription Package</th>
                        <th width="20%">Screening</th>
                        <th width="20%">Lab Visit Date</th>
                        <th width="20%">Doctor Visit Date</th>
                        <th width="20%">Status</th>
                    </tr>
                    <tr>
                        <td>{{$package->package->package_type}}</td>
                        <td>{{$package->dates[0]->screening->screening}}</td>  
                        <td>{{$package->dates[0]->screening_date}}</td>  
                        <td>{{$package->dates[0]->doctorvisit_date}}</td>  
                        <td>
                            @if($package->dates[0]->status == 'Completed') 
                                <span class="badge badge-success">
                                    {{$package->dates[0]->status}} 
                                </span> 
                            @else
                                <span class="badge badge-warning">
                                    {{$package->dates[0]->status}} 
                                </span> 
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>   
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h6 style="font-weight:600">Family Details</h6>
            <table class="table table-bordered datatable-colvis-basic">
                <thead>
                    <tr>
                        <th colspan="3">Family Name : {{$package->familyname->family_name}}</th>
                    </tr>
                    <tr>
                        <th width="33%">Members</th>
                        <th width="33%">Phone No.</th>
                        <th width="33%">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($package->dates[0]->reports as $report)
                    <tr>
                        <td>{{$report->members->user->name}} <br/> @if($report->members->member_type == 'Primary Member')({{$report->members->member_type}})@endif</td>
                        <td>{{$report->members->user->phone}}</td>
                        <td>
                            @if($report->sample_date == null)
                                <span class="badge badge-warning">
                                    Skipped
                                </span>
                            @else
                                <a href="{{route('findings.report',[$package->id,$package->dates[0]->id,$report->member_id])}}" class="btn btn-primary">
                                    <i class="icon-eye2 mr-1"></i>View Report
                                </a>     
                                @if($report->status == 'Consultation Report')
                                    @if(!$package->dates[0]->feedback->contains(function($feedback) use($report,$employee) {
                                        return $feedback->member_id == $report->member_id && $feedback->employee_id == $employee->id;
                                    }))
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModalCenter_{{$report->screeningdate_id}}">
                                            <i class="icon-pencil7 mr-1"></i>Give Feedback
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="feedbackModalCenter_{{$report->screeningdate_id}}" tabindex="-1" role="dialog" aria-labelledby="feedbackModalCenter_{{$report->screeningdate_id}}Title" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Give Feedback</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('screeningemployeereview.store')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="screeningdate_id" value="{{$report->screeningdate_id}}">
                                                        <input type="hidden" name="member_id" value="{{$report->member_id}}">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="">Your Feedback</label>
                                                                <textarea name="comment" cols="30" rows="5" class="form-control" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                    @endif
                                @endif                           
                            @endif                           
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>   
            
            {{--Comment because online consultation was removed--}}
            {{-- <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        @if ($package->dates[0]->consultation_type == 2 && count($package->dates[0]->online) > 0)
                            <th colspan="4">Family Name : {{$package->familyname->family_name}}</th>
                        @else
                            <th colspan="3">Family Name : {{$package->familyname->family_name}}</th>
                        @endif
                    </tr>
                    <tr>

                        @if ($package->dates[0]->consultation_type == 2 && count($package->dates[0]->online) > 0)
                            <th width="25%">Members</th>
                            <th width="25%">Phone No.</th>
                            <th width="25%">Meeting Time</th>
                            <th width="25%">Actions</th>
                        @else
                            <th width="33%">Members</th>
                            <th width="33%">Phone No.</th>
                            <th width="33%">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @if ($package->dates[0]->consultation_type == 1)
                        @foreach ($package->dates[0]->reports as $report)
                        <tr>
                            <td>{{$report->members->user->name}} <br/> @if($report->members->member_type == 'Primary Member')({{$report->members->member_type}})@endif</td>
                            <td>{{$report->members->user->phone}}</td>
                            <td>
                                <a href="{{route('findings.report',[$package->id,$package->dates[0]->id,$report->member_id])}}" class="btn btn-primary">
                                    <i class="icon-eye2 mr-1"></i>View Report
                                </a>     
                                @if($report->status == 'Consultation Report')
                                    @if(!$package->dates[0]->feedback->contains(function($feedback) use($report,$employee) {
                                        return $feedback->member_id == $report->member_id && $feedback->employee_id == $employee->id;
                                    }))
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModalCenter_{{$report->screeningdate_id}}">
                                            <i class="icon-pencil7 mr-1"></i>Give Feedback
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="feedbackModalCenter_{{$report->screeningdate_id}}" tabindex="-1" role="dialog" aria-labelledby="feedbackModalCenter_{{$report->screeningdate_id}}Title" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Give Feedback</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('screeningemployeereview.store')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="screeningdate_id" value="{{$report->screeningdate_id}}">
                                                        <input type="hidden" name="member_id" value="{{$report->member_id}}">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="">Your Feedback</label>
                                                                <textarea name="comment" cols="30" rows="5" class="form-control" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                    @endif
                                @endif                           
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    @if ($package->dates[0]->consultation_type == 2)
                        @foreach ($package->dates[0]->online as $report)
                        <tr>
                            <td>{{$report->member->user->name}} <br/> @if($report->member->member_type == 'Primary Member')({{$report->member->member_type}})@endif</td>
                            <td>{{$report->member->user->phone}}</td>
                            <td>{{$report->start_time}}</td>
                            <td>
                                <a href="{{route('findings.report',[$package->id,$package->dates[0]->id,$report->member_id])}}" class="btn btn-primary">
                                    <i class="icon-eye2 mr-1"></i>View Report
                                </a>  
                                @if(count($package->dates[0]->reports[0]->advice) == 0)                           
                                <a href="{{$report->start_url}}" class="btn btn-primary" target="_blank">
                                    <i class="icon-play mr-1"></i>Start Meeting
                                </a>   
                                @endif    
                                @if($report->status == 'Consultation Report')
                                    @if(!$package->dates[0]->feedback->contains(function($feedback) use($report,$employee) {
                                        return $feedback->member_id == $report->member_id && $feedback->employee_id == $employee->id;
                                    }))
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#feedbackModalCenter_{{$report->screeningdate_id}}">
                                            <i class="icon-pencil7 mr-1"></i>Give Feedback
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="feedbackModalCenter_{{$report->screeningdate_id}}" tabindex="-1" role="dialog" aria-labelledby="feedbackModalCenter_{{$report->screeningdate_id}}Title" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Give Feedback</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('screeningemployeereview.store')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="screeningdate_id" value="{{$report->screeningdate_id}}">
                                                        <input type="hidden" name="member_id" value="{{$report->member_id}}">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="">Your Feedback</label>
                                                                <textarea name="comment" cols="30" rows="5" class="form-control" required></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                    @endif
                                @endif                     
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table> --}}
        </div>
    </div>
@endsection