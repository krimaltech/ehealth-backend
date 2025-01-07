@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Doctor Screening Form</span>
                </h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('doctor-screening-form.index') }}" class="breadcrumb-item">Doctor Screening Form</a>
                    <span class="breadcrumb-item active">Show</span>
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
            <h4>Dental Screening Details</h4>
            <div class="row">
                <div class="col-md-4">
                    <h6><strong>1. Personal Information</strong></h6>
                    <table class="table">
                        <h6><strong>1. Personal Information</strong></h6>
                        <tr>
                            <th>Name</th>
                            <td>{{$doctorScreeningForm->campaignuser->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$doctorScreeningForm->campaignuser->email}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$doctorScreeningForm->campaignuser->phone}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$doctorScreeningForm->campaignuser->address}}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{$doctorScreeningForm->campaignuser->gender}}</td>
                        </tr>
                        <tr>
                            <th>DOB</th>
                            <td>{{\Carbon\Carbon::parse($doctorScreeningForm->campaignuser->dob)->format('M d, Y')}} </td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td>{{\Carbon\Carbon::parse($doctorScreeningForm->campaignuser->dob)->diffInYears(\Carbon\Carbon::now())}} </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-8">
                    <h6><strong>2. Screening Information</strong></h6>
                    <table class="table">
                        <h6><strong>2. Screening Details</strong></h6>
                        <tr>
                            <th>Chief Complaint:</th>
                            <td>{!! $doctorScreeningForm->chief_complaint !!}</td>
                        </tr>
                        <tr>
                            <th>Investigation:</th>
                            <td>{!! $doctorScreeningForm->investigation !!}</td>
                        </tr>
                        <tr>
                            <th>Treatment / Medication:</th>
                            <td>{!! $doctorScreeningForm->treatment_medication !!}</td>
                        </tr>
                        <tr>
                            <th>Advice</th>
                            <td>{!! $doctorScreeningForm->prevention !!}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
