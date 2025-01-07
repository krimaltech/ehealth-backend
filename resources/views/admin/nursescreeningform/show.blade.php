@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Nurse Screening Form</span>
                </h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Nurse Screening Form</span>
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
            <h4>Nurse Screening Details</h4>
            <div class="row">
                <div class="col-md-4">
                    <table class="table">
                        <h6><strong>1. Personal Information</strong></h6>
                        <tr>
                            <th>Name</th>
                            <td>{{$nurseScreeningForm->campaignuser->name}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{$nurseScreeningForm->campaignuser->email}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{$nurseScreeningForm->campaignuser->phone}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{$nurseScreeningForm->campaignuser->address}}</td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td>{{$nurseScreeningForm->campaignuser->gender}}</td>
                        </tr>
                        <tr>
                            <th>DOB</th>
                            <td>{{\Carbon\Carbon::parse($nurseScreeningForm->campaignuser->dob)->format('M d, Y')}} </td>
                        </tr>
                        <tr>
                            <th>Age</th>
                            <td>{{\Carbon\Carbon::parse($nurseScreeningForm->campaignuser->dob)->diffInYears(\Carbon\Carbon::now())}} </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-8">
                    <h6><strong>2. Screening Information</strong></h6>
                    <table class="table">
                        <tr>
                            <th>Past Illness</th>
                            <td>{{ $nurseScreeningForm->past_illness }}</td>
                        </tr>
                        @if ($nurseScreeningForm->past_illness_comment != NULL)
                        <tr>
                            <th>Past Illness Comment</th>
                            <td>{{ $nurseScreeningForm->past_illness_comment }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Hospitalization</th>
                            <td>{{ $nurseScreeningForm->hospitalization }}</td>
                        </tr>
                        @if ($nurseScreeningForm->hospitalization_comment != NULL)
                        <tr>
                            <th>Hospitalization Comment</th>
                            <td>{{ $nurseScreeningForm->hospitalization_comment }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Injuries Or Accident</th>
                            <td>{{ $nurseScreeningForm->injuries_accident }}</td>
                        </tr>
                        @if ($nurseScreeningForm->injuries_accident_comment != NULL)
                        <tr>
                            <th>Injuries Or Accident Comment</th>
                            <td>{{ $nurseScreeningForm->injuries_accident_comment }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Surgeries</th>
                            <td>{{ $nurseScreeningForm->surgeries }}</td>
                        </tr>
                        @if ($nurseScreeningForm->surgeries_comment != NULL)
                        <tr>
                            <th>Surgeries Comment</th>
                            <td>{{ $nurseScreeningForm->surgeries_comment }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Temperature</th>
                            <td>{{ $nurseScreeningForm->temperature }} F</td>
                        </tr>
                        <tr>
                            <th>Pulse</th>
                            <td>{{ $nurseScreeningForm->pulse }} BPM</td>
                        </tr>
                        <tr>
                            <th>Resp</th>
                            <td>{{ $nurseScreeningForm->resp }} BPM</td>
                        </tr>
                        <tr>
                            <th>Spo2</th>
                            <td>{{ $nurseScreeningForm->spo2 }} %</td>
                        </tr>
                        <tr>
                            <th>Blood Pressure</th>
                            <td>{{ $nurseScreeningForm->bp }} mm/Hg</td>
                        </tr>
                        <tr>
                            <th>MUAC</th>
                            <td>{{ $nurseScreeningForm->muac }} cm</td>
                        </tr>
                        <tr>
                            <th>Height</th>
                            <td>{{ $nurseScreeningForm->height }} cm</td>
                        </tr>
                        <tr>
                            <th>Weight</th>
                            <td>{{ $nurseScreeningForm->weight }} kg</td>
                        </tr>
                        <tr>
                            <th>BMI</th>
                            <td>
                                @php
                                    $height_in_cm = $nurseScreeningForm->height / 100;
                                    $height_in_meter = $height_in_cm * $height_in_cm;
                                    echo $bmi = $nurseScreeningForm->weight / $height_in_meter;
                                @endphp
                            </td>
                        </tr>
                        <tr>
                            <th>Environmental Factor</th>
                            <td>{{ $nurseScreeningForm->environmental_factor }}</td>
                        </tr>
                        @if ($nurseScreeningForm->environmental_factor_comment != NULL)
                        <tr>
                            <th>Environmental Factor Comment</th>
                            <td>{{ $nurseScreeningForm->environmental_factor_comment }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Foods</th>
                            <td>{{ $nurseScreeningForm->food_allergie }}</td>
                        </tr>
                        @if ($nurseScreeningForm->food_allergie_comment != NULL)
                        <tr>
                            <th>Foods Comment</th>
                            <td>{{ $nurseScreeningForm->food_allergie_comment }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Durg Allergie</th>
                            <td>{{ $nurseScreeningForm->durg_allergie }}</td>
                        </tr>
                        @if ($nurseScreeningForm->durg_allergie_comment != NULL)
                        <tr>
                            <th>Drug Allergie Comment</th>
                            <td>{{ $nurseScreeningForm->durg_allergie_comment }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Insect Sting Allergie</th>
                            <td>{{ $nurseScreeningForm->insect_allergie }}</td>
                        </tr>
                        @if ($nurseScreeningForm->insect_allergie_comment != NULL)
                        <tr>
                            <th>Insect Sting Allergie Comment</th>
                            <td>{{ $nurseScreeningForm->insect_allergie_comment }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Drug History</th>
                            <td>{{ $nurseScreeningForm->drug_history }}</td>
                        </tr>
                        @if ($nurseScreeningForm->drug_history_comment != NULL)
                        <tr>
                            <th>Drug History Comment</th>
                            <td>{{ $nurseScreeningForm->drug_history_comment }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Menstural History</th>
                            <td>{{ $nurseScreeningForm->mentural_history }}</td>
                        </tr>
                        @if ($nurseScreeningForm->mentural_history_comment != NULL)
                        <tr>
                            <th>Menstural History Comment</th>
                            <td>{{ $nurseScreeningForm->mentural_history_comment }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Family History</th>
                            <td>{{ $nurseScreeningForm->family_history }}</td>
                        </tr>
                        @if ($nurseScreeningForm->family_history_details != NULL)
                        <tr>
                            <th>Family History Comment</th>
                            <td>{!! $nurseScreeningForm->family_history_details !!}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Childhood Disease/ Auto Immune Disease</th>
                            <td>{{ $nurseScreeningForm->childhood_disease }}</td>
                        </tr>
                        @if ($nurseScreeningForm->childhood_disease_comment != NULL)
                        <tr>
                            <th>Childhood Disease/ Auto Immune Disease Comment</th>
                            <td>{{ $nurseScreeningForm->childhood_disease_comment }}</td>
                        </tr>
                        @endif
                        <tr>
                            <th>Immunization</th>
                            <td>
                                @if($nurseScreeningForm->immunization)        
                                @foreach ($nurseScreeningForm->immunization as $w)
                                    {{ $w }}
                                    @if(!$loop->last)
                                    ,
                                    @endif
                                @endforeach
                                @endif
                            </td>
                        </tr>
                        <tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
