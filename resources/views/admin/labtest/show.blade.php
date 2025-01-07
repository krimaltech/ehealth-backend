@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Lab Test</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('labtest.index') }}" class="breadcrumb-item">Lab Test</a>
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
            <h6><b>Lab Test Details</b></h6>
            <table class="table mt-4">
                <tbody>
                    <tr>
                        <td><b>Lab Test</b></td>
                        <td>{{$labtest->tests}}</td>
                    </tr>
                    <tr>
                        <td><b>Lab Department</b></td>
                        <td>{{$labtest->labdepartment->department}}</td>
                    </tr>
                    @if($labtest->profile_id != null)
                    <tr>
                        <td><b>Lab Profile</b></td>
                        <td>{{ $labtest->labprofile->profile_name }}</td>
                    </tr>
                    @endif
                    <tr>
                        <td><b>Test Code</b></td>
                        <td>{{$labtest->code}}</td>
                    </tr>
                    @if($labtest->unit != null)
                    <tr>
                        <td><b>Unit</b></td>
                        <td>{{$labtest->unit}}</td>
                    </tr>
                    @endif
                    @if($labtest->price != null)
                    <tr>
                        <td><b>Price</b></td>
                        <td>Rs. {{$labtest->price}}</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    @if($labtest->test_result_type == 'Range')
    <div class="card">
        <div class="card-body">
            <h6><b>Range Details</b></h6>
            <table class="table table-bordered table-responsive-sm">
                <thead>
                    <tr>
                        <th rowspan="2">Type</th>
                        <th colspan="2" class="text-center">Normal Range</th>
                        <th colspan="2" class="text-center">Amber Range</th>
                        <th colspan="2" class="text-center">Risk Range</th>
                    </tr>
                    <tr>
                        <th class="text-center">Min Range</th>
                        <th class="text-center">Max Range</th>
                        <th class="text-center">Min Range</th>
                        <th class="text-center">Max Range</th>
                        <th class="text-center">Min Range</th>
                        <th class="text-center">Max Range</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Male</td>
                        <td>{{$labtest->male_min_range}}</td>
                        <td>{{$labtest->male_max_range}}</td>
                        <td>{{$labtest->male_amber_min_range}}</td>
                        <td>{{$labtest->male_amber_max_range}}</td>
                        <td>{{$labtest->male_red_min_range}}</td>
                        <td>{{$labtest->male_red_max_range}}</td>                       
                    </tr>
                    <tr>
                        <td>Female</td>
                        <td>{{$labtest->female_min_range}}</td>
                        <td>{{$labtest->female_max_range}}</td>
                        <td>{{$labtest->female_amber_min_range}}</td>
                        <td>{{$labtest->female_amber_max_range}}</td>
                        <td>{{$labtest->female_red_min_range}}</td>
                        <td>{{$labtest->female_red_max_range}}</td>      
                    </tr>
                    <tr>
                        <td>Child</td>
                        <td>{{$labtest->child_min_range}}</td>
                        <td>{{$labtest->child_max_range}}</td>
                        <td>{{$labtest->child_amber_min_range}}</td>
                        <td>{{$labtest->child_amber_max_range}}</td>
                        <td>{{$labtest->child_red_min_range}}</td>
                        <td>{{$labtest->child_red_max_range}}</td>      
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @elseif($labtest->test_result_type == 'Value' || $labtest->test_result_type == 'Value and Image')
    <div class="card">
        <div class="card-body">
            <h6><b>Test Particulars Details</b></h6>
            <ul>
                @foreach ($labtest->labvalue as $item)
                    <li>{{$item->result_name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
@endsection