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
                    <span class="breadcrumb-item active">Details</span>
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
        #map{
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
        .nonDisplay{
            display: none;
        }
           .page-header{
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
                    <img style="padding-left: 30%;" src="/images/blue-logo.png" alt="doctor" height="70px" width="auto" />
                    <h1 style="" class="ml-2 mb-0">GHARGHARMA DOCTOR</h1>
                 </div>

                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            <div class="row">
                                <div class="col-sm-6">
                                    <h3 class="mb-4"><b> Personal Info</b></h3>
                                </div>
                                <div class="col-sm-6 nonDisplay" style="text-align: right !important;">
                                    @if ($kyc->status == "Pending")
                                        <button class="btn btn-warning">In Progress</button>
                                    @elseif($kyc->status == "Active")
                                        <button class="btn btn-success">Verified</button>
                                    @else
                                        <a href="#cancelDetail"  class="btn btn-danger">Rejected</a>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Salutation: </b> {{ $kyc->salutation }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>First Name: </b> {{ $kyc->first_name }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>Middle Name: </b>{{ $kyc->middle_name }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Last Name: </b>{{ $kyc->last_name }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>Gender: </b> {{ $kyc->gender }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>Birth Date: </b>{{ $kyc->birth_date }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Country: </b>{{ $kyc->country }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Nationality: </b>{{ $kyc->nationality }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Mobile No: </b>{{ $kyc->mobile_number }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Email: </b>{{ $kyc->email }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>Education: </b>{{ $kyc->education }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span> <b>Identification Type: </b>{{ $kyc->identification_type }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Identification No.: </b>{{ $kyc->identification_no }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b> Citizenship Issued Date: </b>{{ $kyc->citizenship_date }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Citizenship Issued District: </b>{{ $kyc->citizenship_issue_district }}</span></p>
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
                                    <p><i class="icon-arrow-right5"></i><span><b>Street: </b>{{ $kyc->perm_location }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Street: </b>{{ $kyc->temp_location }}</span></p>
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
                                    <p><i class="icon-arrow-right5"></i><span><b>Work Status: </b> {{ $kyc->work_status }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Occupation: </b> {{ $kyc->occupation }}</span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Designation: </b> {{ $kyc->designation }}</span>
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
                                    <p><i class="icon-arrow-right5"></i><span><b>PAN No.: </b> {{ $kyc->pan_number }}</span></p>
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
                                    <p><i class="icon-arrow-right5"></i><span> <b>Currency: </b>{{ $kyc->currency }}</span></p>
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
                                    <p><i class="icon-arrow-right5"></i><span><b>Name: </b> {{ $kyc->nominee_name }}</span></p>
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
                                    <p><i class="icon-arrow-right5"></i><span><b>Name: </b> {{ $kyc->beneficiary_name }}</span>
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
                                            <input type="checkbox" @if ($kyc->are_you_nrn == 1) checked @endif></span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Are You US Citizen ?: </b>
                                            <input type="checkbox" @if ($kyc->us_citizen == 1) checked @endif></span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Are You US Resident ?: </b>
                                            <input type="checkbox" @if ($kyc->us_residence == 1) checked @endif></span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b>Have you been charged with criminal offense
                                            in Nepal or any other Country ?: </b>
                                            <input type="checkbox" @if ($kyc->criminal_offence == 1) checked @endif></span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b> Did you hold US Permanent resident card
                                            (Green Card) ?: </b>
                                            <input type="checkbox" @if ($kyc->green_card == 1) checked @endif></span>
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span><b> Do you have any account with other
                                            banks/Financial institution ?: </b>
                                            <input type="checkbox" @if ($kyc->account_in_other_banks == 1) checked @endif></span>
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
                                                    <input type="checkbox" checked></span></p>
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
                                      
                                         <img src="{{$kyc->self_image_path}}" class="img-fluid" > <br/>
                                         <div class="card-footer text-center">
                                            <a  href="#" download="{{ $kyc->self_image_path }}">Applicant Image &nbsp; <i class="icon-cloud-download"></i> </a>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="card">
                                       
                                         <img src="{{$kyc->citizenship_front_path}}" class="img-fluid" > <br/>
                                         <div class="card-footer text-center">
                                            <a  href="#" download="{{ $kyc->citizenship_front_path }}"> Citizenship Front &nbsp; <i class="icon-cloud-download"></i> </a>
                                         </div>
                                     </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-4">
                                    <div class="card">
                                      
                                         <img src="{{$kyc->citizenship_back_path}}" class="img-fluid" > <br/>
                                         <div class="card-footer text-center">
                                           <a  href="#" download="{{ $kyc->citizenship_back_path }}"> Citizenship Back &nbsp; <i class="icon-cloud-download"></i> </a>
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

        <div class="col-lg-12" id="cancelDetail">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            
                              
                            @if ($kyc->status == "Rejected")
                                <h3 class="mb-4"><b> Reason of Rejection</b></h3>
                                <p class="text-justify">{{ $kyc->reject_reason }}</p>
                               <br/>
                                <div style="text-align: right !important;">
                                <a style="border-radius: 40%;"  href="{{route('kyc.edit')}}" class="btn btn-primary" ><i class="icon-pen"></i> Edit</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  

   

    <input type="hidden" id="latitude" value="{{$kyc->latitude}}">
    <input type="hidden" id="longitude" value="{{$kyc->longitude}}">
@endsection

@section('custom-script')

<script>
    window.onload = function() {
        getLocation();
    };

    var tileLayer = new L.TileLayer(
        'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        }
    );

    pre_lon = document.getElementById("longitude").value;
    pre_lat = document.getElementById("latitude").value;

    if (pre_lat && pre_lon) {
        var map = new L.Map("map", {
            center: [pre_lat, pre_lon],
            zoom: 20,
            layers: [tileLayer],
            scrollWheelZoom: false
        });

        var marker = L.marker(
            [pre_lat, pre_lon], {
                draggable: true,
            }
        ).addTo(map).bindTooltip('Drag me to select location').openTooltip();

        marker.on("dragend", function(e) {
            document.getElementById("latitude").value = marker.getLatLng().lat;
            document.getElementById("longitude").value = marker.getLatLng().lng;
        });
    } else {
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            var map = new L.Map("map", {
                center: [position.coords.latitude, position.coords.longitude],
                zoom: 20,
                layers: [tileLayer],
                scrollWheelZoom: false
            });

            var marker = L.marker(
                [position.coords.latitude, position.coords.longitude], {
                    draggable: true,
                }
            ).addTo(map).bindTooltip('Drag me to select location').openTooltip();

            marker.on("dragend", function(e) {
                document.getElementById("latitude").value = marker.getLatLng().lat;
                document.getElementById("longitude").value = marker.getLatLng().lng;
            });
        }
    }
</script>
@endsection


