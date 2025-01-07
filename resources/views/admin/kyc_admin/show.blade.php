@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"> Global Form</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('kyc.admin_index') }}" class="breadcrumb-item">Global Form</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <style>
        .doctor-list .card,
        .doctor-list .card-body {
            border-radius: 15px;
        }

        .doctor-list h5,
        .doctor-list h3 {
            font-weight: 500;
        }

        .appointment-text {
            color: rgb(155, 153, 153);
        }

        .appointment-text:hover {
            text-decoration: underline;
        }

        #map {
            height: 300px;
            z-index: 0;
        }

        @media print {
            @page {
                size: A4;
                margin: 0;
                margin-top: 0px !important;
            }

            body {
                width: 100%;
                height: auto;
                overflow: visible;
            }

            .nonDisplay {
                display: none;
            }

            .page-header {
                display: none;
            }

            /* @page{
                                
                                size: auto;
                                margin: 0px !important;
                                
                            } */
            .navbar-toggler {
                display: none !important;
            }

            .navbar {
                display: none !important;
            }

            .sidebar {
                display: none !important;
            }

            .print {
                display: none !important;
            }

            .card {


                -webkit-print-color-adjust: exact !important;

            }
        }
    </style>
    <div class="row doctor-list">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex ">
                        <img style="padding-left: 30%;" src="/images/blue-logo.png" alt="doctor" height="70px"
                            width="auto" />
                        <h1 style="" class="ml-2 mb-0">GHARGHARMA DOCTOR</h1>
                    </div>

                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="mb-4"><b> Personal Info</b></h3>
                                </div>
                                <div class="col-sm-6 nonDisplay" style="text-align: right !important;">
                                    @if ($kyc->status == 'Pending')
                                        <button class="btn btn-warning">In Progress</button>
                                    @elseif($kyc->status == 'Active')
                                        <button class="btn btn-success">Verified</button>
                                    @else
                                        <a href="#cancelDetail" class="btn btn-danger">Rejected</a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Salutation: </b>
                                            {{ $kyc->salutation }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>First Name: </b>
                                            {{ $kyc->first_name }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>Middle Name:
                                            </b>{{ $kyc->middle_name }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Last Name: </b>{{ $kyc->last_name }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>Gender: </b> {{ $kyc->gender }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>Birth Date:
                                            </b>{{ $kyc->birth_date }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Country: </b>{{ $kyc->country }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Nationality:
                                            </b>{{ $kyc->nationality }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Mobile No:
                                            </b>{{ $kyc->mobile_number }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Email: </b>{{ $kyc->email }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>Education:
                                            </b>{{ $kyc->education }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>Identification Type:
                                            </b>{{ $kyc->identification_type }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Identification No.:
                                            </b>{{ $kyc->identification_no }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b> Citizenship Issued Date:
                                            </b>{{ $kyc->citizenship_date }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Citizenship Issued District:
                                            </b>{{ $kyc->citizenship_issue_district }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4"><b> Address Info</b></h3>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h6><span> <b>Permanent Address: </b></span></h6>
                                </div>
                                <div class="col-sm-6">
                                    <h6><span><b>Temporary Address: </b></span>
                                    </h6>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Province: </b>
                                            {{ $kyc->perm_province['english_name'] ?? '' }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Province: </b>
                                            {{ $kyc->temp_province['english_name'] ?? '' }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>District: </b>
                                            {{ $kyc->perm_district['english_name'] ?? '' }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>District: </b>
                                            {{ $kyc->temp_district['english_name'] ?? '' }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Municipality: </b>
                                            {{ $kyc->perm_municipality['english_name'] ?? '' }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Municipality: </b>
                                            {{ $kyc->temp_municipality['english_name'] ?? '' }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Ward No.: </b>
                                            {{ $kyc->perm_ward['ward_name'] ?? '' }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Ward No.: </b>
                                            {{ $kyc->temp_ward['ward_name'] ?? '' }}</span></p>
                                </div>

                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Street:
                                            </b>{{ $kyc->perm_location }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Street:
                                            </b>{{ $kyc->temp_location }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>House No.: </b>
                                            {{ $kyc->perm_house_number }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>House No.: </b>
                                            {{ $kyc->temp_house_number }}</span></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4"><b> Family Info</b></h3>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            <div class="row">

                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Father Name: </b>
                                            {{ $kyc->father_full_name }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Mother Name: </b>
                                            {{ $kyc->mother_full_name }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Grand Father Name: </b>
                                            {{ $kyc->grandfather_full_name }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Grand Mother Name: </b>
                                            {{ $kyc->grandmother_full_name }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Maritual Status: </b>
                                            {{ $kyc->marital_status }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Husband/Wife Name: </b>
                                            {{ $kyc->husband_wife_full_name }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4"><b> Occupation Info</b></h3>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            <div class="row">

                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Work Status: </b>
                                            {{ $kyc->work_status }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Occupation: </b>
                                            {{ $kyc->occupation }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Designation: </b>
                                            {{ $kyc->designation }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Source of Income: </b>
                                            {{ $kyc->source_of_income }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Annual Income: </b>
                                            {{ $kyc->annual_income }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>PAN No.: </b>
                                            {{ $kyc->pan_number }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Organization Name: </b>
                                            {{ $kyc->organization_name }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Organization Address: </b>
                                            {{ $kyc->organization_address }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Organization Contact No.: </b>
                                            {{ $kyc->organization_number }}</span></p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4"><b> Transaction Info</b></h3>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            <div class="row">

                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Account Branch: </b>
                                            {{ $kyc->account_branch }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Purpose of Account: </b>
                                            {{ $kyc->account_purpose }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>Currency:
                                            </b>{{ $kyc->currency }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Maximum Amount per Transaction: </b>
                                            {{ $kyc->max_amount_per_tansaction }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>Number of Monthly Transaction: </b>
                                            {{ $kyc->number_of_monthly_transaction }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Monthly Amount of Transaction: </b>
                                            {{ $kyc->monthly_amount_of_transaction }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Number of Yearly Transaction: </b>
                                            {{ $kyc->number_of_yearly_transaction }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Yearly Amount of Transaction: </b>
                                            {{ $kyc->yearly_amount_of_transaction }}</span></p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4"><b> Nominee Info</b></h3>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            <div class="row">

                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Name: </b>
                                            {{ $kyc->nominee_name }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Father Name: </b>
                                            {{ $kyc->nominee_father_name }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Grand Father Name: </b>
                                            {{ $kyc->nominee_grandfather_name }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Relation: </b>
                                            {{ $kyc->nominee_relation }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Citizenship No.: </b>
                                            {{ $kyc->nominee_citizenship_number }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>Citizenship Issued District: </b>
                                            {{ $kyc->nominee_citizenship_issued_place }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Citizenship Issued Date: </b>
                                            {{ $kyc->nominee_citizenship_issued_date }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b> Date of Birth: </b>
                                            {{ $kyc->nominee_birthdate }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b> Permanent Address: </b>
                                            {{ $kyc->nominee_permanent_address }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>Current Address: </b>
                                            {{ $kyc->nominee_current_address }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>Phone No.: </b>
                                            {{ $kyc->nominee_phone_number }}</span></p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4"><b> Beneficiary Info</b></h3>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            <div class="row">

                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Name: </b>
                                            {{ $kyc->beneficiary_name }}</span>
                                    </p>
                                </div>

                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Address: </b>
                                            {{ $kyc->beneficiary_address }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Contact No.: </b>
                                            {{ $kyc->beneficiary_contact_number }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Relation: </b>
                                            {{ $kyc->beneficiary_relation }}</span></p>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4"><b> Others Info</b></h3>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            <div class="row">

                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Are You NRN ?: </b>
                                            <input type="checkbox" @if ($kyc->are_you_nrn == 1) checked @endif
                                                disabled="true"></span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Are You US Citizen ?: </b>
                                            <input type="checkbox" @if ($kyc->us_citizen == 1) checked @endif
                                                disabled="true"></span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Are You US Resident ?: </b>
                                            <input type="checkbox" @if ($kyc->us_residence == 1) checked @endif
                                                disabled="true"></span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Have you been charged with criminal
                                                offense
                                                in Nepal or any other Country ?: </b>
                                            <input type="checkbox" @if ($kyc->criminal_offence == 1) checked @endif
                                                disabled="true"></span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b> Did you hold US Permanent resident card
                                                (Green Card) ?: </b>
                                            <input type="checkbox" @if ($kyc->green_card == 1) checked @endif
                                                disabled="true"></span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b> Do you have any account with other
                                                banks/Financial institution ?: </b>
                                            <input type="checkbox" @if ($kyc->account_in_other_banks == 1) checked @endif
                                                disabled="true"></span>
                                    </p>
                                </div>
                            </div><br />

                            <h3 class="mb-4"><b> Services Form</b></h3>
                            <div class="row">
                                @php $service_form= explode(",",$kyc->service_form); @endphp
                                @if (count($service_form) > 0)
                                    @foreach ($service_form as $item)
                                        <div class="col-sm-12">
                                            <p><i class="icon-arrow-right5"></i><span><b>{{ $item }}: </b>
                                                    <input type="checkbox" checked disabled="true"></span></p>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        <div class="col-lg-12 nonDisplay">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4"><b> Documents</b></h3>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="card">

                                        <img src="{{ $kyc->self_image_path }}" class="img-fluid"> <br />
                                        <div class="card-footer text-center">
                                            <a href="#" download="{{ $kyc->self_image_path }}">Applicant Image
                                                &nbsp; <i class="icon-cloud-download"></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="card">

                                        <img src="{{ $kyc->citizenship_front_path }}" class="img-fluid"> <br />
                                        <div class="card-footer text-center">
                                            <a href="#" download="{{ $kyc->citizenship_front_path }}"> Citizenship
                                                Front &nbsp; <i class="icon-cloud-download"></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="card">

                                        <img src="{{ $kyc->citizenship_back_path }}" class="img-fluid"> <br />
                                        <div class="card-footer text-center">
                                            <a href="#" download="{{ $kyc->citizenship_back_path }}"> Citizenship
                                                Back &nbsp; <i class="icon-cloud-download"></i> </a>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-sm-12">
                                    <p><i class="icon-arrow-right5"></i><span><a target="_blank"
                                                href="{{ $kyc->self_image_path }}"> Applicant Image </a></span> </p>
                                </div>
                                <div class="col-sm-12">
                                    <p><i class="icon-arrow-right5"></i><span><a target="_blank"
                                                href="{{ $kyc->citizenship_front_path }}"> Citizenship(Front) </a></span>
                                    </p>
                                </div>

                                <div class="col-sm-12">
                                    <p><i class="icon-arrow-right5"></i><span><a target="_blank"
                                                href="{{ $kyc->citizenship_back_path }}"> Citizenship(Back) </a></span>
                                    </p>
                                </div> --}}


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4"><b> Customer Location</b></h3>
                    <div class="shadow border border-3 p-3 rounded my-3">
                        <div id="map"></div>
                    </div>
                </div>
            </div>
        </div>
        @if ($kyc->nic_file_path != null)
            <div class="col-lg-12 nonDisplay">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4"><b>View Upload Files</b></h3>
                        <div class="d-flex align-items-center flex-wrap">
                            <div class=" flex-fill">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <a href="{{ $kyc->nic_file_path }}" target="_blank">
                                                <h6 class="mb-0">Click here to view document</h6>
                                            </a>
                                            <iframe src="{{ $kyc->nic_file_path }}" frameborder="0" width="400px"
                                                height="500px"></iframe>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <a href="{{ $kyc->insurance_file_path }}" target="_blank">
                                                <h6 class="mb-0">Click here to view document</h6>
                                            </a>
                                            <iframe src="{{ $kyc->insurance_file_path }}" frameborder="0" width="400px"
                                                height="500px"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter_{{ $kyc->slug }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Upload Files</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('kyc.admin_upload', ['slug' => $kyc->slug]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Insurance
                                            Form<code>*</code></label>
                                        <input type="file" class="file-input" name="insurance_file"
                                            accept="application/pdf" required>
                                        @error('report')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Bank
                                            Form<code>*</code></label>
                                        <input type="file" class="file-input" name="nic_file"
                                            accept="application/pdf" required>
                                        @error('report')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ $kyc->insurance_file_path }}" target="_blank">
                                        <h6 class="mb-0">Click here to view document</h6>
                                    </a>
                                    <iframe src="{{ $kyc->insurance_file_path }}" frameborder="0" width="200px"
                                        height="200px"></iframe>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ $kyc->nic_file_path }}" target="_blank">
                                        <h6 class="mb-0">Click here to view document</h6>
                                    </a>
                                    <iframe src="{{ $kyc->nic_file_path }}" frameborder="0" width="200px"
                                        height="200px"></iframe>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save
                                changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-12 nonDisplay" id="cancelDetail">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            @if ($kyc->status == 'Pending')
                                <div style="text-align: right !important;">
                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#exampleModalLong">
                                        Reject
                                    </button>
                                    @if ($kyc->insurance_file == NULL)
                                    <a type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenter_{{ $kyc->slug }}">Upload Files</a>
                                    @else
                                    <a type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenter_{{ $kyc->slug }}">Edit Upload Files</a>
                                    @endif
                                    @if ($kyc->insurance_file != NULL)
                                    <a href="{{ route('kyc.admin_verify', $kyc->slug) }}"
                                        onclick="return confirm('Are You sure ? Do you want to Approved this KYC ?')"
                                        class="btn btn-primary"> Approve </a>
                                    @endif
                                </div>
                            @elseif($kyc->status == 'Rejected')
                                <h3 class="mb-4"><b> Reason of Rejection</b></h3>
                                <p class="text-justify">{{ $kyc->reject_reason }}</p>
                            @else
                                <div style="text-align: right !important;">
                                    {{-- <button style="border-radius: 40%;" onClick="window.print()" class="btn btn-primary print" ><i class="fa fa-print"></i> Print</button> --}}
                                    <button style="border-radius: 40%;" type="button" class="btn btn-secondary"
                                        data-toggle="modal" data-target="#exampleModalLong">
                                        Reject
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Reject Reason</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('kyc.admin_reject', ['slug' => $kyc->slug]) }}">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <textarea type="text" class="form-control" rows="6" required name="reject_reason"
                            value="{{ old('reject_reason') }}"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Reject</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <input type="hidden" id="latitude" value="{{ $kyc->latitude }}">
    <input type="hidden" id="longitude" value="{{ $kyc->longitude }}">
@endsection

@section('custom-script')
<script>
    var longitude = document.getElementById('longitude').value;
    var latitude = document.getElementById('latitude').value;
    var map = L.map('map').setView([latitude, longitude], 20);
    var marker = L.marker([latitude, longitude]).addTo(map);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);
    const apiKey = "{{ env('GEOAPIFY_API_KEY') }}";
    const reverseGeocodingUrl = `https://api.geoapify.com/v1/geocode/reverse?lat=${latitude}&lon=${longitude}&format=json&apiKey=${apiKey}`;
    fetch(reverseGeocodingUrl)
    .then(response => response.json())
    .then(result => {
        var address = result.results[0].formatted;
        L.marker([latitude, longitude]).addTo(map)
        .bindPopup(address)
        .openPopup();
    });
</script>
@endsection
