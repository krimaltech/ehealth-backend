@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Rejected Pathology Report</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('rejectReport.index') }}" class="breadcrumb-item">Rejected Pathology Report</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    @if($rejectReport->report->status != 'Report Published')
    <div class="alert alert-danger">
        <p><span style="font-weight:600">Reject Reason : </span>{!!$rejectReport->reject_reason!!}</p>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <h6><b>User Details</b></h6>
                    <div class="mt-4">
                        <p><b>Name :</b> {{$rejectReport->report->members->user->name}}<br/></p>
                        <p><b>DOB :</b> {{$rejectReport->report->members->dob}}<br/></p>
                        <p><b>Gender :</b> {{$rejectReport->report->members->gender}}<br/></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h6><b>Screening Details</b></h6>
                    <div class="mt-4">
                        <p><b>Subscription Package :</b> {{$rejectReport->report->screeningdate->userpackage->package->package_type}}<br/></p>
                        <p><b>Screening :</b> {{$rejectReport->report->screeningdate->screening->screening}}<br/></p>
                        <p><b>Screening Date :</b> {{\Carbon\Carbon::parse($rejectReport->report->screeningdate->screening_date)->format('Y/m/d')}}<br/></p>
                        @if($rejectReport->report->screeningdate->doctorvisit_date != null)
                            <p><b>Doctor Visit Date :</b> {{\Carbon\Carbon::parse($rejectReport->report->screeningdate->doctorvisit_date)->format('Y/m/d')}}<br/></p>
                        @endif
                        <p><span style="font-weight:500">Screening Time :</span> {{$rejectReport->report->screeningdate->screening_time ?? $rejectReport->report->screeningdate->screening_time }}</p> 
                    </div>
                </div>
                <div class="col-md-4">
                    <h6><b>Report Details</b></h6>
                    <div class="mt-4">
                        <p><b>Sample No. :</b> {{$rejectReport->report->sample_no}}<br/></p>
                        @if($rejectReport->report->sample_date != null)
                            <p><b>Sample Collected Date :</b> {{\Carbon\Carbon::parse($rejectReport->report->sample_date)->format('Y/m/d g:i A')}}<br/></p>
                        @endif
                        @if($rejectReport->report->collected_by != null)
                            <p><b>Sample Collected By :</b> {{$rejectReport->report->collectedby->user->name}}<br/></p>
                        @endif
                        @if($rejectReport->report->report_date != null)
                            <p><b>Report Date :</b> {{\Carbon\Carbon::parse($rejectReport->report->report_date)->format('Y/m/d g:i A')}}<br/></p>
                            <p><b>Reporting By :</b> {{$rejectReport->report->lab->user->name}}<br/></p>
                        @endif
                    </div>
                </div>
            </div>   
        </div>
        <hr>
            <h6 style="font-weight:600" class="mx-auto">Pathology Report</h6>
        <hr>
        @if($rejectReport->report->status != 'Report Published')
        <div class="card-body">
            <h6 style="font-weight:600;color:#2196f3" class="mx-auto">Edit Uploaded Test</h6>
            @if(count($profiles) > 0)
                <div class="mt-2 mb-4">
                    <p>Lab Profiles</p>
                    @foreach ($profiles as $item)
                        <a href="{{route('rejectReport.edit',['id'=>$item->id, 'rejectId' => $rejectReport->id , 'type' => 'profile'])}}" class="btn btn-primary">
                            {{$item->profile_name}}
                        </a>
                    @endforeach
                </div>
            @endif
            @if(count($tests) > 0)
                <div class="mt-2 mb-4">
                    <p>Lab Tests</p>
                    @foreach ($tests as $item)
                        <a href="{{route('rejectReport.edit',['id'=>$item->id, 'rejectId' => $rejectReport->id , 'type' => 'test'])}}" class="btn btn-primary">
                            {{$item->tests}}
                        </a>
                    @endforeach
                </div>
            @endif
            @if(!$skipProfiles->isEmpty() || !$skipTests->isEmpty())
                <h6 style="font-weight:600;color:#2196f3" class="mx-auto">Edit Skipped Test</h6>
                @if(!$skipProfiles->isEmpty())
                    <div class="mt-2 mb-4">
                        <p>Lab Profiles</p>
                        @foreach ($skipProfiles as $item)
                            <a href="{{route('rejectReport.create',['id'=>$item->id, 'rejectId' => $rejectReport->id, 'type' => 'profile'])}}" class="btn btn-primary">
                                {{$item->profile->profile_name}}
                            </a>
                        @endforeach
                    </div>
                @endif
                @if(!$skipTests->isEmpty())
                    <div class="mt-2 mb-4">
                        <p>Lab Tests</p>
                        @foreach ($skipTests as $item)
                            <a href="{{route('rejectReport.create',['id'=>$item->id, 'rejectId' => $rejectReport->id, 'type' => 'test'])}}" class="btn btn-primary">
                                {{$item->test->tests}}
                            </a>
                        @endforeach
                    </div>
                @endif
            @endif
        </div>
        <div class="card-footer text-right">
            <form action="{{route('medicalreport.publish')}}" method="POST">
                @csrf
                <input type="hidden" name="report_id" value="{{$rejectReport->report_id}}">
                <button type="submit" class="btn btn-success">Publish Report</button>
            </form> 
        </div>
        @else
            <div class="alert alert-success text-center">
                Report Published Successsfully.
            </div>
        @endif
    </div>
@endsection
