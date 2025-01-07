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
                    <a href="{{ route('medicalreport.view',$id) }}" class="breadcrumb-item">Screening and Family Details</a>
                    <span class="breadcrumb-item active">View Chart Report</span>
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
        <table class="table">
            <tr>
                <td width="33.33%">                
                    <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Name: </span>{{$member->user->name}}</p>
                </td>
                <td width="33.33%">
                    <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Sex: </span>{{$member->gender}}</p>            
                </td>
                <td width="33.33%">
                    <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Blood Group: </span>{{$member->blood_group}}</p>
                </td>
            </tr>
            <tr>               
                <td width="33.33%">                
                    <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Contact No.: </span>{{$member->user->phone}}</p>
                </td>                 
                <td width="33.33%">                
                    <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Address: </span>{{$member->address}}</p>
                </td>                 
                <td width="33.33%">
                    <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">DOB: </span>{{$member->dob}}</p>          
                </td>
            </tr>
            <tr>
                <td width="33.33%">
                    <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Age: </span>
                        @php
                        $dob_year = \Carbon\Carbon::now()->format('Y') - \Carbon\Carbon::createFromTimeStamp(strtotime($member->dob))->isoFormat('Y');
                        echo $dob_year;
                        @endphp
                    </p>         
                </td>
                <td width="33.33%">                        
                    <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Weight: </span>
                        @if($member->weight != null)
                            {{$member->weight}}kg
                        @endif
                    </p>                        
                </td>
                <td width="33.33%">
                    <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Height: </span>
                        @if($member->height_feet != null && $member->height_inch != null)
                            {{$member->height_feet}} ft {{$member->height_inch}} in
                        @endif                       
                    </p>
                </td>
            </tr>
        </table>
    </div>
</div>
<hr>
<h5 style="font-weight: 500;color:#0d59a7" class="text-center">View Test Chart</h5>
<hr>
@if(count($chart) > 0)
    <div class="row">
            @foreach ($chart as $item)
                <div class="col-md-6 mb-3">
                    @include('admin.medicalreport.actualchart', ['chartId' => 'chart'.$item["labtest"]["id"], 'chartTitle' => $item["labtest"]["tests"] , 'report' => $item['report']])
                </div>
            @endforeach
    </div>
@else
    <div class="alert alert-danger">
        No Test Report Uploaded Yet.
    </div>
@endif
@endsection