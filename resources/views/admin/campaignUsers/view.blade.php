@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">View</span> - Screening Report
                </h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route($route) }}" class="breadcrumb-item">{{ $screening_name }}</a>
                    <span class="breadcrumb-item active">View Screening Report</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection
@section('content')
    <style>
        .top-tab {
            background-color: white;

        }

        .top-tab .nav-link {
            border: none;
            border-bottom: 3px solid transparent;
            font-weight: 500;
        }

        .top-tab .nav-link.active {
            border: none;
            border-bottom: 3px solid #063b9d;
            color: #063b9d;
        }
    </style>
    <div class="card">
        <div class="card-body">
            <p><span style="font-weight:600">Date of Examination:
                </span>{{ \Carbon\Carbon::parse($screening->created_at)->format('M d, Y') }}</p>
            <hr>
            <h6 style="font-weight: 600">Campaign User Details</h6>
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td>{{ $screening->campaignuser->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    @if ($screening->campaignuser->email)
                        <td>{{ $screening->campaignuser->email }}</td>
                    @else
                        <td>-</td>
                    @endif
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{ $screening->campaignuser->phone }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $screening->campaignuser->address }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ $screening->campaignuser->gender }}</td>
                </tr>
                <tr>
                    <th>DOB</th>
                    <td>{{ \Carbon\Carbon::parse($screening->campaignuser->dob)->format('M d, Y') }} </td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td>{{ \Carbon\Carbon::parse($screening->campaignuser->dob)->diffInYears(\Carbon\Carbon::now()) }}
                    </td>
                </tr>
                <tr>
                    <th>Occupation</th>
                    @if ($screening->campaignuser->occupation)
                        <td>{{ $screening->campaignuser->occupation }}</td>
                    @else
                        <td>-</td>
                    @endif
                </tr>
                @if ($screening->campaign->campaign_type == 'School')
                    @if ($screening->campaignuser->parent_id)
                        <tr>
                            <th>Parent Name</th>
                            <td>{{ $screening->campaignuser->parent->name }}</td>
                        </tr>
                    @endif
                    @if ($screening->campaignuser->class)
                        <tr>
                            <th>Class</th>
                            <td>{{ $screening->campaignuser->class }}</td>
                        </tr>
                    @endif
                @endif
            </table>
        </div>
        <div class="card-body">
            <h6 style="font-weight: 600">Screening Report</h6>
            <ul class="nav nav-tabs top-tab" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="nurse-tab" data-toggle="tab" data-target="#nurse" type="button"
                        role="tab" aria-controls="nurse" aria-selected="true">
                        Nurse
                    </a>
                </li>
                @if ($screening->doctor)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="doctor-tab" data-toggle="tab" data-target="#doctor" type="button"
                            role="tab" aria-controls="doctor" aria-selected="false">
                            Doctor
                        </a>
                    </li>
                @endif
                @if ($screening->ophthalmologist)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ophthalmologist-tab" data-toggle="tab" data-target="#ophthalmologist"
                            type="button" role="tab" aria-controls="ophthalmologist" aria-selected="false">
                            Ophthalmologist
                        </a>
                    </li>
                @endif
                @if ($screening->dentist)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dental-tab" data-toggle="tab" data-target="#dental" type="button"
                            role="tab" aria-controls="dental" aria-selected="false">
                            Dentist
                        </a>
                    </li>
                @endif
                @if ($screening->physio)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="physio-tab" data-toggle="tab" data-target="#physio" type="button"
                            role="tab" aria-controls="physio" aria-selected="false">
                            Physiotherapist
                        </a>
                    </li>
                @endif
                @if ($screening->dietician)
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dietician-tab" data-toggle="tab" data-target="#dietician" type="button"
                            role="tab" aria-controls="dietician" aria-selected="false">
                            Dietician
                        </a>
                    </li>
                @endif
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="nurse" role="tabpanel" aria-labelledby="nurse-tab">
                    <p style="font-weight: 600">1. Past Medical History</p>
                    <table class="table">
                        <tr>
                            <th width="50%">Past Illness</th>
                            <td>{{ $screening->nurse->past_illness }}</td>
                        </tr>
                        @if ($screening->nurse->past_illness_comment != null)
                            <tr>
                                <th width="50%">Past Illness Comment</th>
                                <td>{{ $screening->nurse->past_illness_comment }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th width="50%">Hospitalization</th>
                            <td>{{ $screening->nurse->hospitalization }}</td>
                        </tr>
                        @if ($screening->nurse->hospitalization_comment != null)
                            <tr>
                                <th width="50%">Hospitalization Comment</th>
                                <td>{{ $screening->nurse->hospitalization_comment }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th width="50%">Injuries Or Accident</th>
                            <td>{{ $screening->nurse->injuries_accident }}</td>
                        </tr>
                        @if ($screening->nurse->injuries_accident_comment != null)
                            <tr>
                                <th width="50%">Injuries Or Accident Comment</th>
                                <td>{{ $screening->nurse->injuries_accident_comment }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th width="50%">Surgeries</th>
                            <td>{{ $screening->nurse->surgeries }}</td>
                        </tr>
                        @if ($screening->nurse->surgeries_comment != null)
                            <tr>
                                <th>Surgeries Comment</th>
                                <td>{{ $screening->nurse->surgeries_comment }}</td>
                            </tr>
                        @endif
                    </table>

                    <p style="font-weight: 600">2. Physical Examination</p>
                    <table class="table">
                        <tr>
                            <th width="50%">Temperature</th>
                            <td>{{ $screening->nurse->temperature }}°F</td>
                        </tr>
                        <tr>
                            <th width="50%">Pulse</th>
                            <td>{{ $screening->nurse->pulse }} BPM</td>
                        </tr>
                        <tr>
                            <th width="50%">Resp</th>
                            <td>{{ $screening->nurse->resp }} BPM</td>
                        </tr>
                        <tr>
                            <th width="50%">Spo2</th>
                            <td>{{ $screening->nurse->spo2 }}%</td>
                        </tr>
                        <tr>
                            <th width="50%">Blood Pressure</th>
                            <td>{{ $screening->nurse->bp }} mmHg</td>
                        </tr>
                        <tr>
                            <th width="50%">MUAC</th>
                            <td>{{ $screening->nurse->muac }} mm</td>
                        </tr>
                    </table>

                    <p style="font-weight: 600">3. General Condition</p>
                    <table class="table">
                        <tr>
                            <th width="50%">Height</th>
                            <td>{{ $screening->nurse->height }} cm</td>
                        </tr>
                        <tr>
                            <th width="50%">Weight</th>
                            <td>{{ $screening->nurse->weight }} kg</td>
                        </tr>
                        <tr>
                            <th width="50%">BMI</th>
                            <td>
                                @if ($screening->nurse->height)
                                    @php
                                        $height_in_cm = $screening->nurse->height / 100;
                                        $height_in_meter = $height_in_cm * $height_in_cm;
                                        echo $bmi = $screening->nurse->weight / $height_in_meter;
                                    @endphp
                                @endif
                            </td>
                        </tr>
                    </table>

                    <p style="font-weight: 600">4. Allergies</p>
                    <table class="table">
                        <tr>
                            <th width="50%">Environmental Factor</th>
                            <td>{{ $screening->nurse->environmental_factor }}</td>
                        </tr>
                        <tr>
                            <th width="50%">Foods</th>
                            <td>{{ $screening->nurse->food_allergie }}</td>
                        </tr>
                        <tr>
                            <th width="50%">Drug Allergies</th>
                            <td>{{ $screening->nurse->durg_allergie }}</td>
                        </tr>
                        <tr>
                            <th width="50%">Insect Sting Allergies</th>
                            <td>{{ $screening->nurse->insect_allergie }}</td>
                        </tr>
                    </table>
                    <p><span style="font-weight: 600">5. Drug History : </span>{{ $screening->nurse->drug_history }}</p>
                    @if ($screening->nurse->drug_history_comment != null)
                        <p><span style="font-weight: 600">6. Drug History Comment :
                            </span>{{ $screening->nurse->drug_history_comment }}</p>
                    @endif
                    <p><span style="font-weight: 600">7. Menstural History :
                        </span>{{ $screening->nurse->mentural_history }}</p>
                    @if ($screening->nurse->mentural_history_comment != null)
                        <p><span style="font-weight: 600">8. Menstural History Comment :
                            </span>{{ $screening->nurse->mentural_history_comment }}</p>
                    @endif
                    <p><span style="font-weight: 500;color:#0d59a7;">9. Family History : </span>{!! $screening->nurse->family_history !!}
                    </p>
                    @if ($screening->nurse->family_history_details != null)
                        <p><span style="font-weight: 500;color:#0d59a7;">8. Family History Comment :
                            </span>{{ $screening->nurse->family_history_details }}</p>
                    @endif
                    <p><span style="font-weight: 500;color:#0d59a7;">10. Any Childhood Disease/Any Autoimmune Disease :
                        </span>{{ $screening->nurse->childhood_disease }}</p>
                    @if ($screening->nurse->childhood_disease_comment != null)
                        <p><span style="font-weight: 500;color:#0d59a7;">11. Any Childhood Disease/Any Autoimmune Disease
                                Comment :
                            </span>{{ $screening->nurse->childhood_disease_comment }}</p>
                    @endif
                    <p><span style="font-weight: 500;color:#0d59a7;">12. Immunization : </span>
                        @if ($screening->nurse->immunization)
                            @foreach ($screening->nurse->immunization as $w)
                                {{ $w }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        @endif
                    </p>
                    <div class="text-right">
                        <p><span style="font-weight: 500;color:#0d59a7;">Nurse:
                            </span>RN.{{ $screening->nurse->doctor->user->name }}</p>
                        <p><span style="font-weight: 500;color:#0d59a7;">NNC No.:
                            </span>{{ $screening->nurse->doctor->nnc_no }}</p>
                    </div>
                </div>
                @if ($screening->doctor)
                    <div class="tab-pane fade" id="doctor" role="tabpanel" aria-labelledby="doctor-tab">
                        <table class="table">
                            <tr>
                                <th width="50%">Chief Complaint:</th>
                                <td>{!! $screening->doctor->chief_complaint !!}</td>
                            </tr>
                            <tr>
                                <th width="50%">Investigation:</th>
                                <td>{!! $screening->doctor->investigation !!}</td>
                            </tr>
                            <tr>
                                <th width="50%">Treatment / Medication:</th>
                                <td>{!! $screening->doctor->treatment_medication !!}</td>
                            </tr>
                            <tr>
                                <th width="50%">Advice</th>
                                <td>{!! $screening->doctor->prevention !!}</td>
                            </tr>
                        </table>
                        <div class="text-right">
                            <p><span style="font-weight: 500;color:#0d59a7;">Doctor:
                                </span>{{ $screening->doctor->doctor->salutation }}
                                {{ $screening->doctor->doctor->user->name }}</p>
                            <p><span style="font-weight: 500;color:#0d59a7;">NMC No.:
                                </span>{{ $screening->doctor->doctor->nmc_no }}</p>
                        </div>
                    </div>
                @endif
                @if ($screening->ophthalmologist)
                    <div class="tab-pane fade" id="ophthalmologist" role="tabpanel"
                        aria-labelledby="ophthalmologist-tab">
                        <p class="mb-0">
                            <span style="font-weight:600">Ocular History: </span>
                            @if ($screening->ophthalmologist->ocular_history == 'Positive')
                                {{ $screening->ophthalmologist->ocular_history }} for
                                {{ $screening->ophthalmologist->ocular_history_positive }}
                            @else
                                {{ $screening->ophthalmologist->ocular_history }}
                            @endif
                        </p>
                        <hr>
                        <p style="font-weight: 600">Examination Details</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th rowspan="2" width="30%">Examination</th>
                                    <th colspan="2" class="text-center">Distance</th>
                                </tr>
                                <tr>
                                    <th>Right</th>
                                    <th>Left</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Visual Acuity</td>
                                    <td>6/ {{ $screening->ophthalmologist->visual_distance_right }}</td>
                                    <td>6/ {{ $screening->ophthalmologist->visual_distance_left }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>Examination</th>
                                    <th>Result</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1. External Exam (Lids, Lashes, Cornea, etc.)</td>
                                    <td>{{ $screening->ophthalmologist->external_exam }}</td>
                                    <td>{{ $screening->ophthalmologist->external_exam_comment }}</td>
                                </tr>
                                <tr>
                                    <td>2. Internal Exam (Vitreous, Lens, Fundus, etc.)</td>
                                    <td>{{ $screening->ophthalmologist->internal_exam }}</td>
                                    <td>{{ $screening->ophthalmologist->internal_exam_comment }}</td>
                                </tr>
                                <tr>
                                    <td>3. Pupillary Reflex (Pupils)</td>
                                    <td>{{ $screening->ophthalmologist->pupillary_reflex }}</td>
                                    <td>{{ $screening->ophthalmologist->pupillary_reflex_comment }}</td>
                                </tr>
                                <tr>
                                    <td>4. Binocular Function (Stereopsis)</td>
                                    <td>{{ $screening->ophthalmologist->binocular_function }}</td>
                                    <td>{{ $screening->ophthalmologist->binocular_function_comment }}</td>
                                </tr>
                                <tr>
                                    <td>5. Accommodation and Vergence</td>
                                    <td>{{ $screening->ophthalmologist->accommodation_vergence }}</td>
                                    <td>{{ $screening->ophthalmologist->accommodation_vergence_comment }}</td>
                                </tr>
                                <tr>
                                    <td>6. Color Vision</td>
                                    <td>{{ $screening->ophthalmologist->color_vision }}</td>
                                    <td>{{ $screening->ophthalmologist->color_vision_comment }}</td>
                                </tr>
                                <tr>
                                    <td>7. Glaucoma Evaluation</td>
                                    <td>{{ $screening->ophthalmologist->glaucoma_evaluation }}</td>
                                    <td>{{ $screening->ophthalmologist->glaucoma_evaluation_comment }}</td>
                                </tr>
                                <tr>
                                    <td>8. Oculomotor Evaluation</td>
                                    <td>{{ $screening->ophthalmologist->oculomotor_assessment }}</td>
                                    <td>{{ $screening->ophthalmologist->oculomotor_assessment_comment }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2">9. Other</td>
                                    <td>{{ $screening->ophthalmologist->other_comment }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <p style="font-weight: 600">Diagnosis</p>
                        <i class="icon-dash"></i> {{ $screening->ophthalmologist->diagnosis }} @if ($screening->ophthalmologist->other_diagnosis != null)
                            ({{ $screening->ophthalmologist->other_diagnosis }})
                        @endif
                        <hr>
                        <p style="font-weight: 600">Recommendations</p>
                        <table class="table table-bordered mt-3">
                            <thead>
                                <tr>
                                    <th>Recommendations</th>
                                    <th>Result</th>
                                    <th>Comment/Other</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1. Corrective Lenses</td>
                                    <td>{{ $screening->ophthalmologist->corrective_lenses }}</td>
                                    @if ($screening->ophthalmologist->corrective_lenses == 'Yes')
                                        <td>Glass or contact should be worn for:
                                            {{ $screening->ophthalmologist->glass_contact }}</td>
                                    @else
                                        <td></td>
                                    @endif
                                </tr>
                                <tr>
                                    <td>2. Recommended Re-examination</td>
                                    <td>{{ $screening->ophthalmologist->reexamination }}</td>
                                    <td>{{ $screening->ophthalmologist->reexamination_other }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <p style="font-weight: 600">Advice</p>
                        @if ($screening->ophthalmologist->advice)
                            @foreach ($screening->ophthalmologist->advice as $w)
                            <i class="icon-dash mr-1"></i>{{ $w }} <br>
                            @endforeach
                        @endif
                        <div class="text-right">
                            <p><span style="font-weight: 500;color:#0d59a7;">Ophthalmic Assistant:
                                </span>OA.
                                {{ $screening->ophthalmologist->doctor->user->name }}</p>
                            <p><span style="font-weight: 500;color:#0d59a7;">NMC No.:
                                </span>{{ $screening->ophthalmologist->doctor->nmc_no }}</p>
                        </div>
                    </div>
                @endif
                @if ($screening->dentist)
                    <div class="tab-pane fade" id="dental" role="tabpanel" aria-labelledby="dental-tab">
                        <table class="table">
                            <tr>
                                <th>Dental History</th>
                                <td>{!! $screening->dentist->dental_history !!}</td>
                            </tr>
                            <tr>
                                <th>Last dental visit</th>
                                <td>{{ $screening->dentist->last_visit_date }}</td>
                            </tr>
                            <tr>
                                <th>Have you ever been treated for any of the (four) conditions below?:</th>
                                <td>
                                    @if ($screening->dentist->treated_condition)
                                        @foreach ($screening->dentist->treated_condition as $w)
                                            {{ $w }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Do you have any of the following dental habits</th>
                                <td>
                                    @if ($screening->dentist->dental_habit)
                                        @foreach ($screening->dentist->dental_habit as $w)
                                            {{ $w }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Do you use any tobacco products?</th>
                                <td>{{ $screening->dentist->tobacco_products }}</td>
                            </tr>
                            <tr>
                                <th>What interdental aid do you use?</th>
                                <td>{{ $screening->dentist->dental_floss }}</td>
                            </tr>
                            <tr>
                                <th>How often do you brush?</th>
                                <td>{{ $screening->dentist->dental_brush }}</td>
                            </tr>
                            <tr>
                                <th>How would you describe your current dental health?</th>
                                <td>{{ $screening->dentist->current_dental }}</td>
                            </tr>
                            <tr>
                                <th>What type of brush do you use?</th>
                                <td>{{ $screening->dentist->brush_type }}</td>
                            </tr>
                            <tr>
                                <th>What kind of toothpaste do you use?</th>
                                <td>{{ $screening->dentist->toothpaste_type }}</td>
                            </tr>
                            <tr>
                                <th>Diagnosis</th>
                                <td>{!! $screening->dentist->diagnosis !!}</td>
                            </tr>
                            <tr>
                                <th>Advise</th>
                                <td>
                                    @if ($screening->dentist->prevention)
                                        @foreach ($screening->dentist->prevention as $w)
                                            {{ $w }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                        </table>
                        <div class="text-right">
                            <p><span style="font-weight: 500;color:#0d59a7;">Dentist:
                                </span>{{ $screening->dentist->doctor->salutation }}
                                {{ $screening->dentist->doctor->user->name }}</p>
                            <p><span style="font-weight: 500;color:#0d59a7;">NMC No.:
                                </span>{{ $screening->dentist->doctor->nmc_no }}</p>
                        </div>
                    </div>
                @endif
                @if ($screening->physio)
                    <div class="tab-pane fade" id="physio" role="tabpanel" aria-labelledby="physio-tab">
                        <table class="table">
                            <tr>
                                <th>Chief Complaint</th>
                                <td>{!! $screening->physio->chief_complaint !!}</td>
                            </tr>
                            <tr>
                                <th>History of Present Illness (HOPI)</th>
                                <td>{!! $screening->physio->hopi !!}</td>
                            </tr>
                            <tr>
                                <th>Posture</th>
                                <td>{{ $screening->physio->posture }}</td>
                            </tr>
                            <tr>
                                <th>ADL</th>
                                <td>{{ $screening->physio->adl }}</td>
                            </tr>
                            <tr>
                                <th>Site and Side</th>
                                <td>{{ $screening->physio->site_side }}</td>
                            </tr>
                            <tr>
                                <th>How does the pain start?</th>
                                <td>{{ $screening->physio->how_pain_start }}</td>
                            </tr>
                            <tr>
                                <th>Type of pain</th>
                                <td>{{ $screening->physio->type }}</td>
                            </tr>
                            <tr>
                                <th>NRS</th>
                                <td>{{ $screening->physio->nrs }}</td>
                            </tr>
                            <tr>
                                <th>Temporal Variation</th>
                                <td>{{ $screening->physio->temporal_variation }}</td>
                            </tr>
                            <tr>
                                <th>Aggravating factor</th>
                                <td>{{ $screening->physio->aggravating_factor }}</td>
                            </tr>
                            <tr>
                                <th>Relieving factor</th>
                                <td>{{ $screening->physio->relieving_factor }}</td>
                            </tr>
                            <tr>
                                <th>Past Medical, Drug and Surgical History</th>
                                <td>{!! $screening->physio->past_medical_history !!}</td>
                            </tr>
                            <tr>
                                <th>Sleep</th>
                                <td>{{ $screening->physio->sleep }}</td>
                            </tr>
                            <tr>
                                <th>Appetite</th>
                                <td>{{ $screening->physio->appetite }}</td>
                            </tr>
                            <tr>
                                <th>Habits</th>
                                <td>{{ $screening->physio->habit }}</td>
                            </tr>
                            <tr>
                                <th>Range of motion</th>
                                <td>{{ $screening->physio->range_of_motion }}</td>
                            </tr>
                            <tr>
                                <th>MMT (Manual Muscle Testing/Muscle Power)</th>
                                <td>{{ $screening->physio->mmt }}</td>
                            </tr>
                            <tr>
                                <th>Problem List</th>
                                <td>{!! $screening->physio->problem_list !!}</td>
                            </tr>
                            <tr>
                                <th>Physiotherapy Management</th>
                                <td>{!! $screening->physio->physio_management !!}</td>
                            </tr>
                        </table>
                        <div class="text-right">
                            <p><span style="font-weight: 500;color:#0d59a7;">Physiotherapist:
                                </span>{{ $screening->physio->doctor->salutation }}
                                {{ $screening->physio->doctor->user->name }}</p>
                            <p><span style="font-weight: 500;color:#0d59a7;">NMC No.:
                                </span>{{ $screening->physio->doctor->nmc_no }}</p>
                        </div>
                    </div>
                @endif
                @if ($screening->dietician)
                    <div class="tab-pane fade" id="dietician" role="tabpanel" aria-labelledby="dietician-tab">
                        <p class="mb-0" style="font-weight:600">
                            Chief Complaint
                        </p>
                        <p>{!! $screening->dietician->chief_complaint !!}</p>
                        <hr>
                        <p style="font-weight: 600">Attitude and food intake habit</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="50%">Questions</th>
                                    <th>Answers</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1. How many times do you eat in a daily basis?</td>
                                    <td>{{ $screening->dietician->how_eat_daily }}</td>
                                </tr>
                                <tr>
                                    <td>2. What do you eat in a daily basis?</td>
                                    <td>{{ $screening->dietician->what_eat_daily }}</td>
                                </tr>
                                <tr>
                                    <td>3. Do you know about junk food?</td>
                                    <td>{{ $screening->dietician->junk_food }}</td>
                                </tr>
                                <tr>
                                    <td>4. Participation in extracurricular activities?</td>
                                    <td>{{ $screening->dietician->extracurricular }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <p class="mb-0" style="font-weight:600">
                            Problem List
                        </p>
                        <p>{!! $screening->dietician->problems !!}</p>
                        <hr>
                        <p class="mb-0" style="font-weight:600">
                            Dietary Management
                        </p>
                        <p>{!! $screening->dietician->dietary_management !!}</p>
                        <div class="text-right">
                            <p><span style="font-weight: 500;color:#0d59a7;">Food, Nutrition and Diet Expert:
                                </span>{{ $screening->dietician->doctor->user->name }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
