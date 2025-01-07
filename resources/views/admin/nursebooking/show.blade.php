@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Nursing Record</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('nursebooking.index') }}" class="breadcrumb-item">Nurse Bookings</a>
                    <span class="breadcrumb-item active">Nursing Record</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <style>
        .nurse_record .card-header{
            background-color:#063b9d
        }
        .nurse_record .card-title{
            font-weight:700;
            text-transform:uppercase;
        }
        .nurse_record .patient_details p{
            color:#063b9d;
            font-weight: 600;
        }
        .nurse_record .patient_details p span{
            color:#333;
        }
    </style>
    <div class="card nurse_record" >
        <div class="card-header text-center">
            <h4 class="card-title text-white">Nursing Record</h4>
        </div>
        <div class="card-body">
            <div class="row patient_details my-3">
                <div class="col-md-4">
                    <p>Name: <span>{{$report->member->user->name}}</span></p>
                    <p>Sex: <span>{{$report->member->gender}}</span></p>
                    <p>Blood Group: <span>{{$report->member->blood_group}}</span></p>
                </div>
                <div class="col-md-4">
                    <p>Contact No.: <span>{{$report->member->user->phone}}</span></p>
                    <p>DOB: <span>{{$report->member->dob}}</span></p>
                    <p>Height: <span>{{$report->member->height}}</span></p>
                </div>
                <div class="col-md-4">
                    <p>Address: <span>{{$report->member->address}}</span></p>
                    <p>Age: 
                        <span>
                            @php
                                $dob_year = \Carbon\Carbon::now()->format('Y') - \Carbon\Carbon::createFromTimeStamp(strtotime($report->member->dob))->isoFormat('Y');
                                echo $dob_year;
                            @endphp    
                        </span>
                    </p>
                    <p>Weight: <span>{{$report->member->weight}}</span></p>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>P./min</th>
                        <th>R.R/min</th>
                        <th>T.°C</th>
                        <th>BP. mmHg</th>
                        <th>Nursing Report</th>
                        <th>Nurse</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($report->reports as $item)
                    <tr>
                        <td>{{$item->date}}</td>
                        <td>{{$item->time}}</td>
                        <td>{{$item->pulse_rate}}</td>
                        <td>{{$item->respiratory_rate}}</td>
                        <td>{{$item->temperature}}</td>
                        <td>{{$item->bp}}</td>
                        <td>{!!$item->description!!}</td>
                        <td>{{$report->shift->nurse->user->name}}</td>
                    </tr>
                    @endforeach                   
                </tbody>
            </table>
        </div>
    </div>
@endsection