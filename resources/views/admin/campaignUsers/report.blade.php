<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Campaign Screening Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        /**
            Set the margins of the page to 0, so the footer and the header
            can be of the full height and width !
         **/
        @page {
            margin: 0cm 0cm;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 5cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 5cm;
            font-size: 14px;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 4.2cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2.5cm;
        }

        .table th,
        .table td,
        p {
            font-size: 14px;
        }

        .table td,
        .table th {
            border: none;
            padding: 0.25rem;
            font-size: 14px;
        }

        .page-break {
            page-break-before: always;
        }
    </style>
</head>

<body>
    <header class="mb-5">
        <img src="./images/header.jpg" width="100%" height="100%" />
    </header>

    <footer>
        <img src="./images/footer.png" width="100%" height="100%" />
    </footer>
    <div class="mt-2">
        <div class="text-center">
            <img src="./images/blue-logo.png" alt="GD Stamp" width="60px" height="70px">
        </div>
        <p style="font-weight: 500;color:#0d59a7;font-size:16px" class="my-3 text-center">Campaign User Details</p>
        <div>
            <table class="table">
                <tr>
                    <td>
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Username:
                            </span>{{ $screening->user_name }}</p>
                    </td>
                    <td>
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Name:
                            </span>{{ $screening->campaignuser->name }}</p>
                    </td>
                    <td>
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Sex:
                            </span>{{ $screening->campaignuser->gender }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Email:
                            </span>{{ $screening->campaignuser->email ?? '-' }}</p>
                    </td>
                    <td>
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Contact No.:
                            </span>{{ $screening->campaignuser->phone }}</p>
                    </td>
                    <td>
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Address:
                            </span>{{ $screening->campaignuser->address }}</p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">DOB:
                            </span>{{ \Carbon\Carbon::parse($screening->campaignuser->dob)->format('M d, Y') }}</p>
                    </td>
                    <td>
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Age: </span>
                            {{ \Carbon\Carbon::parse($screening->campaignuser->dob)->diffInYears(\Carbon\Carbon::now()) }}
                            years
                        </p>
                    </td>
                    <td>
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Occupation:
                            </span>{{ $screening->campaignuser->occupation ?? '-' }}</p>
                    </td>
                </tr>
                @if ($screening->campaign->campaign_type == 'School')
                    <tr>
                        @if ($screening->campaignuser->parent_id)
                            <td>
                                <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Parent Name:
                                    </span>{{ $screening->campaignuser->parent->name }}</p>
                            </td>
                        @endif
                        @if ($screening->campaignuser->class)
                            <td>
                                <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Class:
                                    </span>{{ $screening->campaignuser->class }}</p>
                            </td>
                        @endif
                    </tr>
                @endif
            </table>
        </div>
        @if ($screening->nurse)
            <div>
                <hr>
                <p style="font-weight: 500;color:#0d59a7;font-size:16px" class="my-3 text-center">Nurse Screening Report
                </p>
                <hr>
                <p><span style="font-weight: 500;color:#0d59a7;">Examination Date and Time:</span>
                    {{ \Carbon\Carbon::parse($screening->nurse->created_at)->format('M d, Y H:i a') }}</p>
                <div>
                    <p style="font-weight: 500;color:#0d59a7;">1. Past Medical History</p>
                    <table class="table">
                        <tr>
                            <th width="50%">Past Illness</th>
                            <td>{{ $screening->nurse->past_illness }}</td>
                        </tr>
                        @if ($screening->nurse->past_illness_comment != null)
                            <tr>
                                <th>Past Illness Comment</th>
                                <td>{{ $screening->nurse->past_illness_comment }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th width="50%">Hospitalization</th>
                            <td>{{ $screening->nurse->hospitalization }}</td>
                        </tr>
                        @if ($screening->nurse->hospitalization_comment != null)
                            <tr>
                                <th>Hospitalization Comment</th>
                                <td>{{ $screening->nurse->hospitalization_comment }}</td>
                            </tr>
                        @endif
                        <tr>
                            <th width="50%">Injuries Or Accident</th>
                            <td>{{ $screening->nurse->injuries_accident }}</td>
                        </tr>
                        @if ($screening->nurse->injuries_accident_comment != null)
                            <tr>
                                <th>Injuries Or Accident Comment</th>
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

                    <p style="font-weight: 500;color:#0d59a7;">2. Physical Examination</p>
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

                    <p style="font-weight: 500;color:#0d59a7;">3. General Condition</p>
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

                    <p style="font-weight: 500;color:#0d59a7;">4. Allergies</p>
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
                    <p><span style="font-weight: 500;color:#0d59a7;">5. Drug History :
                        </span>{{ $screening->nurse->drug_history }}</p>
                    @if ($screening->nurse->drug_history_comment != null)
                        <p><span style="font-weight: 500;color:#0d59a7;">6. Drug History Comment :
                            </span>{{ $screening->nurse->drug_history_comment }}</p>
                    @endif
                    <p><span style="font-weight: 500;color:#0d59a7;">7. Menstural History :
                        </span>{{ $screening->nurse->mentural_history }}</p>
                    @if ($screening->nurse->mentural_history_comment != null)
                        <p><span style="font-weight: 500;color:#0d59a7;">8. Menstural History Comment :
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
                </div>
                <div class="text-right">
                    <p><span style="font-weight: 500;color:#0d59a7;">Nurse:
                        </span>RN.{{ $screening->nurse->doctor->user->name }}</p>
                    <p><span style="font-weight: 500;color:#0d59a7;">Designation: </span>Nurse</p>
                    <p><span style="font-weight: 500;color:#0d59a7;">NNC No.:
                        </span>{{ $screening->nurse->doctor->nnc_no }}</p>
                    @if ($screening->nurse->doctor->signature_path)
                        <p><span style="font-weight: 500;color:#0d59a7;">Signature: </span> <br> <img
                                src="{{ $screening->nurse->doctor->signature_path }}" alt="" height="60px"
                                width="auto"></p>
                    @endif
                </div>
            </div>
        @endif
        @if ($screening->doctor)
            <div>
                <hr>
                <p style="font-weight: 500;color:#0d59a7;font-size:16px" class="my-3 text-center">Doctor Screening
                    Report</p>
                <hr>
                <p><span style="font-weight: 500;color:#0d59a7;">Examination Date and Time:</span>
                    {{ \Carbon\Carbon::parse($screening->doctor->created_at)->format('M d, Y H:i a') }}</p>
                <table class="table">
                    <tr>
                        <th width="50%">Chief Complaint</th>
                        <td>{!! $screening->doctor->chief_complaint !!}</td>
                    </tr>
                    <tr>
                        <th width="50%">Investigation</th>
                        <td>{!! $screening->doctor->investigation !!}</td>
                    </tr>
                    <tr>
                        <th width="50%">Treatment / Medications</th>
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
                    <p><span style="font-weight: 500;color:#0d59a7;">Designation: </span>General Doctor</p>
                    <p><span style="font-weight: 500;color:#0d59a7;">NMC No.:
                        </span>{{ $screening->doctor->doctor->nmc_no }}</p>
                    @if ($screening->doctor->doctor->signature_path)
                        <p><span style="font-weight: 500;color:#0d59a7;">Signature: </span> <br> <img
                                src="{{ $screening->doctor->doctor->signature_path }}" alt="" height="60px"
                                width="auto"></p>
                    @endif
                </div>
            </div>
        @endif
        @if ($screening->ophthalmologist)
            <div>
                <hr>
                <p style="font-weight: 500;color:#0d59a7;font-size:16px" class="my-3 text-center">Ophthalmologist
                    Screening Report</p>
                <hr>
                <p><span style="font-weight: 500;color:#0d59a7;">Examination Date and Time:</span>
                    {{ \Carbon\Carbon::parse($screening->ophthalmologist->created_at)->format('M d, Y H:i a') }}</p>
                <div>
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
                </div>
                <div class="text-right">
                    <p><span style="font-weight: 500;color:#0d59a7;">Doctor:
                        </span>OA.
                        {{ $screening->ophthalmologist->doctor->user->name }}</p>
                    <p><span style="font-weight: 500;color:#0d59a7;">Designation: </span>Ophthalmic Assistant</p>
                    <p><span style="font-weight: 500;color:#0d59a7;">NHPC No.:
                        </span>{{ $screening->ophthalmologist->doctor->nmc_no }}</p>
                    @if ($screening->ophthalmologist->doctor->signature_path)
                        <p><span style="font-weight: 500;color:#0d59a7;">Signature: </span> <br> <img
                                src="{{ $screening->ophthalmologist->doctor->signature_path }}" alt=""
                                height="60px" width="auto"></p>
                    @endif
                </div>
            </div>
        @endif
        @if ($screening->dentist)
            <div>
                <hr>
                <p style="font-weight: 500;color:#0d59a7;font-size:16px" class="my-3 text-center">Dentist Screening
                    Report</p>
                <hr>
                <p><span style="font-weight: 500;color:#0d59a7;">Examination Date and Time:</span>
                    {{ \Carbon\Carbon::parse($screening->dentist->created_at)->format('M d, Y H:i a') }}</p>
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
                        @if ($screening->dentist->prevention)
                            @foreach ($screening->dentist->prevention as $w)
                                {{ $w }}
                                @if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        @endif
                    </tr>
                </table>
                <div class="text-right">
                    <p><span style="font-weight: 500;color:#0d59a7;">Doctor:
                        </span>{{ $screening->dentist->doctor->salutation }}
                        {{ $screening->dentist->doctor->user->name }}</p>
                    <p><span style="font-weight: 500;color:#0d59a7;">Designation: </span>Dentist</p>
                    <p><span style="font-weight: 500;color:#0d59a7;">NMC No.:
                        </span>{{ $screening->dentist->doctor->nmc_no }}</p>
                    @if ($screening->dentist->doctor->signature_path)
                        <p><span style="font-weight: 500;color:#0d59a7;">Signature: </span> <br> <img
                                src="{{ $screening->dentist->doctor->signature_path }}" alt=""
                                height="60px" width="auto"></p>
                    @endif
                </div>
            </div>
        @endif
        @if ($screening->physio)
            <div>
                <hr>
                <p style="font-weight: 500;color:#0d59a7;font-size:16px" class="my-3 text-center">Physiotherapist
                    Screening Report</p>
                <hr>
                <p><span style="font-weight: 500;color:#0d59a7;">Examination Date and Time:</span>
                    {{ \Carbon\Carbon::parse($screening->physio->created_at)->format('M d, Y H:i a') }}</p>
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
                    <p><span style="font-weight: 500;color:#0d59a7;">Doctor:
                        </span>{{ $screening->physio->doctor->salutation }}
                        {{ $screening->physio->doctor->user->name }}</p>
                    <p><span style="font-weight: 500;color:#0d59a7;">Designation: </span>Physiotherapist</p>
                    <p><span style="font-weight: 500;color:#0d59a7;">NMC No.:
                        </span>{{ $screening->physio->doctor->nmc_no }}</p>
                    @if ($screening->physio->doctor->signature_path)
                        <p><span style="font-weight: 500;color:#0d59a7;">Signature: </span> <br> <img
                                src="{{ $screening->physio->doctor->signature_path }}" alt=""
                                height="60px" width="auto"></p>
                    @endif
                </div>
            </div>
        @endif
        @if ($screening->dietician)
            <div>
                <hr>
                <p style="font-weight: 500;color:#0d59a7;font-size:16px" class="my-3 text-center">Food Nutrition and Diet
                    Expert Screening Report</p>
                <hr>
                <p><span style="font-weight: 500;color:#0d59a7;">Examination Date and Time:</span>
                    {{ \Carbon\Carbon::parse($screening->dietician->created_at)->format('M d, Y H:i a') }}</p>
                <div>
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
                </div>
                <div class="text-right">
                    <p><span style="font-weight: 500;color:#0d59a7;">Dietician:
                        </span>{{ $screening->dietician->doctor->user->name }}</p>
                    <p><span style="font-weight: 500;color:#0d59a7;">Designation: </span>Food,Nutrition and Diet Expert</p>
                    @if ($screening->dietician->doctor->signature_path)
                        <p><span style="font-weight: 500;color:#0d59a7;">Signature: </span> <br> <img
                                src="{{ $screening->dietician->doctor->signature_path }}" alt=""
                                height="60px" width="auto"></p>
                    @endif
                </div>
            </div>
        @endif
        <div class="page-break">
            <h6 class="text-uppercase text-center"><b><i>Disclaimer</i></b></h6>
            <p>
                <b>
                    <i>
                        Ghargharma Doctor Pvt. Ltd. is specialized in Preventive Health Care Services and focused on
                        general well-being
                        of an individual for preventive health care measures. Our suggestions are not a substitute for
                        professional medical advice,
                        diagnosis or treatment. You are suggested to look forward for specialized consultant for
                        professional health care treatment of
                        personalized care or guidance.
                    </i>
                </b>
            </p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>
