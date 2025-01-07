@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Global Form</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('kyc.admin_index') }}" class="breadcrumb-item">Global Form</a>
                    <span class="breadcrumb-item active">Bank Form</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection
@section('content')
    <style>
        #map{
            height: 500px;
            z-index: 0;
        }
        .bank *{
            font-size: 14px;
        }
        .headers{
            margin-bottom: 0;
        }
        .headers,.bank .address thead{
            background-color: #027939;
            border: 1px solid #000;
        }
        .headers .card-body{
            color: #fff;
            text-align: center;
            padding-top: 2px;
            padding-bottom: 2px;
        }
        .bank hr{
            border-top: 1px solid #000;
        }
        .bank p{
            margin-bottom: 5px;
        }
        .bank .table-bordered, .bank tr,.bank td, .bank th{
            border: 1px solid #000 !important;
        }
        .bank td,.bank th{
            padding-top: 2px;
            padding-bottom: 2px;
        }
        .mention{
            border-bottom: 1px solid #000;
            font-weight: 500;
            font-size: 16px;
        }
        .bank hr{
            margin-top: 8px;
            margin-bottom: 8px;
        }
        .side_header{
            background-color: #027939;
            color: white;
            padding: 2px;
            font-weight: 500;
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
            ::-webkit-scrollbar{
                display: none;
            }
            .page-header{
                display: none;
            } 
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
            .bank{
                -webkit-print-color-adjust: exact !important;
            }
        }
    </style>
    <button onClick="window.print()" class="btn btn-primary print mb-2" ><i class="fa fa-print"></i> Print</button>

    <div class="bank">
        <!--Account Info-->
        <div class="row">
            <div class="col-6">
                <img src="/images/adbl_logo.jpg" alt="Agricultural Development Bank Ltd." width="300px">
            </div>
            <div class="col-6">
                <div class="image float-right" style="width: 130px; overflow: hidden;">
                    <img src="{{$kyc->self_image_path}}" width="100%" alt="{{$kyc->first_name}}">
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-4 mb-2 d-flex">
                <label for="" class="mr-2">Branch:</label>
                <input type="text" value="{{$kyc->account_branch}}" class="flex-grow-1">
            </div>
            <div class="col-4 mb-2 text-center d-flex">
                <label for="" class="mr-2">Customer Id:</label>
                <input type="text" value="" class="flex-grow-1">                    
            </div>
            <div class="col-4 mb-2 text-right d-flex">
                <label for="" class="mr-2">Date:</label>
                <input type="date" value="{{\Carbon\Carbon::parse($kyc->created_at)->format('Y-m-d')}}" class="flex-grow-1">
            </div>
            <div class="col-4 mb-2 d-flex">
                <label for="" class="mr-2">शाखा:</label>
                <input type="text" value="{{$kyc->account_branch}}" class="flex-grow-1">
            </div>
            <div class="col-4 mb-2 text-center d-flex">
                <label for="" class="mr-2">ग्राहक नं:</label>
                <input type="text" value="" class="flex-grow-1">
            </div>
            <div class="col-4 mb-2 text-right d-flex">
                <label for="" class="mr-2">मिति:</label>
                <input type="date" value="{{\Carbon\Carbon::parse($kyc->created_at)->format('Y-m-d')}}" class="flex-grow-1">
            </div>
            <div class="col-4 mb-2 d-flex">
                <label for="" class="mr-2">Account Category:</label>
                <input type="text" value="" class="flex-grow-1">
            </div>
            <div class="col-8 mb-2 d-flex">
                <label for="" class="mr-2">Account No:</label>
                <input type="text" value="" class="flex-grow-1">
            </div>
            <div class="col-4 mb-2 d-flex">
                <label for="" class="mr-2">खाताको नाम:</label>
                <input type="text" value="" class="flex-grow-1">
            </div>
            <div class="col-8 mb-2 d-flex">
                <label for="" class="mr-2">खाता नं:</label>
                <input type="text" value="" class="flex-grow-1">
            </div>
        </div>

        <!--Account Opening-->
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card headers">
                    <div class="card-body">
                        <h6 class="border-bottom">Personal/Joint Account Opening And Know Your Customer Form</h6>
                        <h6 style="font-weight: 600;">व्यक्तिगत/ संयुक्त खाता खोल्ने तथा ग्राहक पहिचान फारम</h6>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mt-0">
        <div>
            <p class="mb-0">I/We hereby request you to kindly open my/our account in this bank with following details:</p>
            <p>मेरो/हाम्रो निम्नानुसारको विवरण सहीत यस बैंकमा खाता खोलिदिनुहुन विनम्र अनुरोध गर्दछु/ गर्दछौं |</p>
            <div class="row">
                <div class="col-4 d-flex align-items-center">
                    <label for="" class="mr-4">Types of Account: <br> खाताको प्रकार</label>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3"> Current <br>चल्ती 
                    <span class="mr-3"></span>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">Saving <br>बचत
                </div>
                <div class="col-4 text-center">
                    <div class="row">
                        <div class="col-12 d-flex mb-2">
                            <label for="" class="mr-2">Please Mention Scheme</label>
                            <input type="text" class="flex-grow-1">
                        </div>
                        <div class="col-12 d-flex">
                            <label for="" class="mr-2">बचत योजना उल्लेख गर्ने</label>
                            <input type="text" class="flex-grow-1">
                        </div>
                    </div>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-end">
                    <label for="" class="mr-4">Currency: <br> मुद्रा</label>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->currency == 'NPR') checked @endif> NPR <br>ने.रु. 
                    <span class="mr-3"></span>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->currency != 'NPR') checked @endif>
                    Other: .............
                    <br>
                    अन्य: .............
                </div>
            </div>
        </div>
        <hr class="mb-0">

        <!--Application 1-->
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card headers">
                    <div class="card-body">
                        <h6>Personal/Joint Account Application-1 <span style="font-weight: 600;">(व्यक्तिगत/ संयुक्त खाता निवेदन-१)</span></h6>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <p class="mr-3">Mr. <br>श्रीमान् </p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3"  @if($kyc->salutation == 'Mr.') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Mrs. <br>श्रीमती</p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->salutation == 'Mrs.') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Ms. <br>स्रुश्री</p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->salutation == 'Ms.') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Minor. <br>नाबालक</p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->salutation == 'Minor.') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Dr. <br>डाक्टर</p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->salutation == 'Dr.') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">
                        Other(Please Specify)..............
                        <br>
                        अन्य(कृपया उल्लेख गर्नुहोस)..............
                    </p>
                </div> 
            </div>
            <div class="d-flex mb-2">
                <label for="" class="mr-2">Name in English (Use Uppercase):</label>
                <input type="text" class="flex-grow-1" value="{{$kyc->first_name . ' ' .$kyc->middle_name . ' ' . $kyc->last_name}}" style="text-transform: uppercase">
            </div>
            <div class="d-flex mb-2">
                <label for="" class="mr-2">नाम थर नेपालीमा</label>
                <input type="text" class="flex-grow-1" value="{{$kyc->first_name . ' ' .$kyc->middle_name . ' ' . $kyc->last_name}}">
            </div>
            <div class="row">
                <div class="col-6 d-flex">
                    <label for="" class="mr-2">Date of Birth (B.S.): <br> जन्म मिति (वि.सं.)</label>
                    <div class="flex-grow-1">
                        <input type="date" class="w-100" value="{{Helper::eng_to_nep_date($kyc->birth_date)}}">
                    </div>
                </div>
                <div class="col-6 d-flex">
                    <label for="" class="mr-2">Date of Birth (A.D.): <br> जन्म मिति (ई.सं.)</label>
                    <div class="flex-grow-1">
                        <input type="date" class="w-100" value="{{$kyc->birth_date}}">
                    </div>
                </div>
            </div>
        </div>
        <hr class="mb-0">

        <!--Application 2-->
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card headers">
                    <div class="card-body">
                        <h6>Personal/Joint Account Application-2 <span style="font-weight: 600;">(व्यक्तिगत/ संयुक्त खाता निवेदन-२)</span></h6>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <p class="mr-3">Mr. <br>श्रीमान् </p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Mrs. <br>श्रीमती</p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Ms. <br>स्रुश्री</p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Minor. <br>नाबालक</p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Dr. <br>डाक्टर</p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">
                        Other(Please Specify)..............
                        <br>
                        अन्य(कृपया उल्लेख गर्नुहोस)..............
                    </p>
                </div> 
            </div>
            <div class="d-flex mb-2">
                <label for="" class="mr-2">Name in English (Use Uppercase):</label>
                <input type="text" class="flex-grow-1">
            </div>
            <div class="d-flex mb-2">
                <label for="" class="mr-2">नाम थर नेपालीमा</label>
                <input type="text" class="flex-grow-1">
            </div>
            <div class="row">
                <div class="col-6 d-flex">
                    <label for="" class="mr-2">Date of Birth (B.S.): <br> जन्म मिति (वि.सं.)</label>
                    <div class="flex-grow-1">
                        <input type="date" class="w-100">
                    </div>
                </div>
                <div class="col-6 d-flex">
                    <label for="" class="mr-2">Date of Birth (A.D.): <br> जन्म मिति (ई.सं.)</label>
                    <div class="flex-grow-1">
                        <input type="date" class="w-100">
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <!--Guardian Info-->
        <div>
            <div class="row">
                <div class="col-8">
                    <div class="d-flex mb-2">
                        <label for="" class="mr-2">Guardian's Name (In case of Minor): <br> संरक्षकको नाम (खातावाला नाबालक भए)</label>
                        <div class="flex-grow-1">
                            <input type="text" class="w-100">
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <label for="" class="mr-2">Guardian's Relationship: <br> नाबालक सँगको नाता</label>
                        <div class="flex-grow-1">
                            <input type="text" name="" class="w-100">
                        </div>
                    </div>
                </div>
                <div class="col-4 mb-2">
                    <div class="image float-right" style="width: 130px; overflow: hidden;">
                        <img src="/images/doctor.jpg" width="100%">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex mb-2">
                    <label for="" class="mr-2">Birth Certificate No.: <br> जन्मदर्ता प्रमाणपत्र नं.</label>
                    <div class="flex-grow-1">
                        <input type="text" name="" class="w-100">
                    </div>
                </div>
                <div class="col-4 d-flex mb-2">
                    <label for="" class="mr-2">Issue Date: <br> जारी मिति</label>
                    <div class="flex-grow-1">
                        <input type="date" name="" class="w-100">
                    </div>
                </div>
                <div class="col-4 d-flex mb-2">
                    <label for="" class="mr-2">Issue Office: <br> जारी गर्ने निकाय</label>
                    <div class="flex-grow-1">
                        <input type="text" name="" class="w-100">
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-6 ml-auto">
                    <div class="row d-flex align-items-center">
                        <div class="col-6">
                            <table class="table table-bordered text-center">
                                <tr>
                                    <td colspan="2">औंठाको छाप (Thumb Print)</td>
                                </tr>
                                <tr>
                                    <td>दायाँ (Right)</td>
                                    <td>बायाँ (Left)</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6">
                            <p class="mb-0">..................................</p>
                            <p>खातावालाको दस्तखत/Signature</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="mb-0">

        <!--KYC-->
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="card headers">
                    <div class="card-body">
                        <h6>Know Your Customer <span style="font-weight: 600;">(ग्राहक पहिचान विवरण)</span></h6>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <p class="mr-3">Gender:<br>लिङ्ग </p>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Male <br>पुरुष </p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->gender == 'Male') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Female <br>महिला</p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->gender == 'Female') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Other <br>अन्य</p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->gender == 'Other') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">
                        Other please mention..............
                        <br>
                        अन्य कृपया उल्लेख गर्नुहोस..............
                    </p>
                </div> 
            </div>
            <hr>
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <p class="mr-3">Marital Status:<br>वैवाहिक अवस्था </p>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Single <br>अविवाहित </p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3"  @if($kyc->marital_status == 'Single') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Married <br>विवाहित</p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3"  @if($kyc->marital_status == 'Married') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Widow <br>विदुर/विधवा</p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3"  @if($kyc->marital_status == 'Widow') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Divorce <br>सम्बन्ध विच्छेद</p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3"  @if($kyc->marital_status == 'Divorce') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">
                        Other please mention..............
                        <br>
                        अन्य कृपया उल्लेख गर्नुहोस..............
                    </p>
                </div> 
            </div>
            <table class="table table-bordered address">
                <thead class="text-center text-white">
                    <tr>
                        <th width="33.33%">Address/ठेगाना</th>
                        <th width="33.33%">Permanent/स्थायी ठेगाना</th>
                        <th width="33.33%">Current/हालको ठेगाना</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Province/प्रदेश</td>
                        <td>{{$kyc->perm_province->nepali_name}}</td>
                        <td>{{$kyc->temp_province->nepali_name}}</td>
                    </tr>
                    <tr>
                        <td>District/जिल्ला</td>
                        <td>{{$kyc->perm_district->nepali_name}}</td>
                        <td>{{$kyc->temp_district->nepali_name}}</td>
                    </tr>
                    <tr>
                        <td>Rural/Municipality/गाउँपालिका/नगरपालिका</td>
                        <td>{{$kyc->perm_municipality->nepali_name}}</td>
                        <td>{{$kyc->temp_municipality->nepali_name}}</td>
                    </tr>
                    <tr>
                        <td>Ward No./वार्ड नं</td>
                        <td>{{$kyc->perm_ward->ward_name}}</td>
                        <td>{{$kyc->temp_ward->ward_name}}</td>
                    </tr>
                    <tr>
                        <td>Tole,Street,Road/गाउँ,टोल,पथ</td>
                        <td>{{$kyc->perm_location}}</td>
                        <td>{{$kyc->temp_location}}</td>
                    </tr>
                    <tr>
                        <td>House No./घर नं</td>
                        <td>{{$kyc->perm_house_number}}</td>
                        <td>{{$kyc->temp_house_number}}</td>
                    </tr>
                    <tr>
                        <td>Country/देश</td>
                        <td>{{$kyc->country}}</td>
                        <td>{{$kyc->country}}</td>
                    </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-center my-3">
                <div>
                    <label for="">Contact Address <br> सम्पर्क ठेगाना</label>
                </div>
                <div>
                    <div class="d-flex">
                        <label for="" class="mr-2">Office</label>
                        <div class="flex-grow-1">
                            <input type="text" class="w-100">
                        </div>
                    </div>
                    <label for="">कार्यालय बुझिने गरी उल्लेख गर्नुहोस</label>
                </div>
                <div>
                    <div class="d-flex">
                        <label for="" class="mr-2">Residence</label>
                        <div class="flex-grow-1">
                            <input type="text" class="w-100">
                        </div>
                    </div>
                    <label for="">निवास</label>
                </div>
                <div>
                    <div class="d-flex">
                        <label for="" class="mr-2">Post Box No.</label>
                        <div class="flex-grow-1">
                            <input type="text" class="w-100">
                        </div>
                    </div>
                    <label for=""> पोस्ट बक्स नं.</label>
                </div>
            </div>
            <div class="row">
                <div class="col-6 d-flex">
                    <label for="" class="mr-2">E-mail: <br> इमेल</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100" value="{{$kyc->email}}">
                    </div>
                </div>
                <div class="col-6 d-flex">
                    <label for="" class="mr-2">Mobile No.: <br> मोबाइल नं.</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100" value="{{$kyc->mobile_number}}">
                    </div>
                </div>
                <div class="col-6 d-flex">
                    <label for="" class="mr-2">Landline No.: <br> घरको फोन नं.</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100">
                    </div>
                </div>
                <div class="col-6 d-flex">
                    <label for="" class="mr-2">PAN No.: <br> स्थायी लेखा नं.</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100" value="{{$kyc->pan_number}}">
                    </div>
                </div>
                <div class="col-4 d-flex">
                    <label for="" class="mr-2">Citizenship No.: <br> नागरिकता नं.</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100" value="{{$kyc->identification_type == 'Citizenship' ?  $kyc->identification_no : ''}}">
                    </div>
                </div>
                <div class="col-4 d-flex">
                    <label for="" class="mr-2">Issue Date: <br> जारी मिति</label>
                    <div class="flex-grow-1">
                        <input type="date" class="w-100" value="{{$kyc->identification_type == 'Citizenship' ?  $kyc->citizenship_date : ''}}"> 
                    </div>
                </div>
                <div class="col-4 d-flex">
                    <label for="" class="mr-2">Issue Office: <br> जारी गर्ने निकाय</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100">
                    </div>
                </div>
                <div class="col-4 d-flex">
                    <label for="" class="mr-2">Voters ID: <br> मतदाता परिचयपत्र नं.</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100" value="{{$kyc->identification_type == 'Voter Card' ?  $kyc->identification_no : ''}}">
                    </div>
                </div>
                <div class="col-4 d-flex">
                    <label for="" class="mr-2">Issue Date: <br> जारी मिति</label>
                    <div class="flex-grow-1">
                        <input type="date" class="w-100">
                    </div>
                </div>
                <div class="col-4 d-flex">
                    <label for="" class="mr-2">Issue Office: <br> जारी गर्ने निकाय</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100">
                    </div>
                </div>
                <div class="col-3 d-flex">
                    <label for="" class="mr-2">Driving License No: <br> सवारीचालक नं.</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100" value="{{$kyc->identification_type == 'Driving License' ?  $kyc->identification_no : ''}}">
                    </div>
                </div>
                <div class="col-3 d-flex">
                    <label for="" class="mr-2">Issue Date: <br> जारी मिति</label>
                    <div class="flex-grow-1">
                        <input type="date" class="w-100">
                    </div>
                </div>
                <div class="col-3 d-flex">
                    <label for="" class="mr-2">Valid Date: <br> अन्तिम मिति</label>
                    <div class="flex-grow-1">
                        <input type="date" class="w-100">
                    </div>
                </div>
                <div class="col-3 d-flex">
                    <label for="" class="mr-2">Issue Office: <br> जारी गर्ने निकाय</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100">
                    </div>
                </div>
                <div class="col-3 d-flex">
                    <label for="" class="mr-2">Passport No: <br> राहदानी नं.</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100" value="{{$kyc->identification_type == 'Passport' ?  $kyc->identification_no : ''}}">
                    </div>
                </div>
                <div class="col-3 d-flex">
                    <label for="" class="mr-2">Issue Date: <br> जारी मिति</label>
                    <div class="flex-grow-1">
                        <input type="date" class="w-100">
                    </div>
                </div>
                <div class="col-3 d-flex">
                    <label for="" class="mr-2">Valid Date: <br> अन्तिम मिति</label>
                    <div class="flex-grow-1">
                        <input type="date" class="w-100">
                    </div>
                </div>
                <div class="col-3 d-flex">
                    <label for="" class="mr-2">Issue Office: <br> जारी गर्ने निकाय</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100">
                    </div>
                </div>
            </div>
            <span class="mention">Please Mention (कृपया उल्लेख गर्नुहोस)</span>
            <div class="row mt-2">
                <div class="col-4 d-flex">
                    <label for="" class="mr-2">Other Legal Identity Type: <br> अन्य अधिकारिक परिचयपत्रको प्रकार</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100">
                    </div>
                </div>
                <div class="col-4 d-flex">
                    <label for="" class="mr-2">Number: <br> प्रमाणपत्र नं</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100">
                    </div>
                </div>
                <div class="col-4 d-flex">
                    <label for="" class="mr-2">Issue Office: <br> जारी गर्ने निकाय</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100">
                    </div>
                </div>
            </div>
            <hr>
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <p class="mr-3">Education:<br>शिक्षा </p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->education == 'Illiterate') checked @endif>
                    <p class="mr-3">Illiterate <br>निरक्षर </p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->education == 'Literate') checked @endif>
                    <p class="mr-3">Literate <br>साक्षर</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->education == 'SLC/SEE') checked @endif>
                    <p class="mr-3">SLC/SEE <br>एस.ई.ई</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->education == '10+2 ') checked @endif>
                    <p class="mr-3">10+2 <br>१०+२</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->education == 'Diploma') checked @endif>
                    <p class="mr-3">Diploma <br>स्नातक</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->education == 'Master') checked @endif>
                    <p class="mr-3">Master <br>स्नातकोत्तर</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->education == 'Other') checked @endif>
                    <p class="mr-3">
                        Other..............
                        <br>
                        अन्य..............
                    </p>
                </div> 
            </div>
            <span class="mention">Tenant (भाडामा बस्ने भएमा)</span>
            <div class="row mt-2">
                <div class="col-4 d-flex">
                    <label for="" class="mr-2">Name of Owner: <br> घरधनीको नाम</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100">
                    </div>
                </div>
                <div class="col-4 d-flex">
                    <label for="" class="mr-2">Mobile No: <br> मोबाइल नं</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100">
                    </div>
                </div>
                <div class="col-4 d-flex">
                    <label for="" class="mr-2">Landline No: <br> घरधनीको घरको फोन नं</label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100">
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex">
                        <label for="" class="mr-2">Address</label>
                        <div class="flex-grow-1">
                            <input type="text" class="w-100">
                        </div>
                    </div>
                    <label for="">ठेगाना बुझिने गरी उल्लेख गर्नुहोस</label>
                </div>
            </div>
            <hr class="mb-0">
            <span class="side_header">Occupation/पेशा</span>
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->occupation == 'Govt. Service') checked @endif>
                    <p class="mr-3">Govt. Service <br>सरकारी सेवा </p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->occupation == 'Public/Private Sector') checked @endif>
                    <p class="mr-3">Public/Private Sector <br>सार्वजनिक/निजी कोष</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->occupation == 'NGO/INGO') checked @endif>
                    <p class="mr-3">NGO/INGO <br>एनजिओ/आइएनजिओ</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->occupation == 'Expert') checked @endif>
                    <p class="mr-3">Expert <br>बिशेषज्ञ</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->occupation == 'Student') checked @endif>
                    <p class="mr-3">Student <br>विद्यार्थी</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->occupation == 'Business') checked @endif>
                    <p class="mr-3">Business <br>व्यापारी</p>
                </div> 
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->occupation == 'Agriculture') checked @endif>
                    <p class="mr-3">Agriculture <br>कृषि </p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->occupation == 'Retired') checked @endif>
                    <p class="mr-3">Retired <br>सेवा निवृत्त</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->occupation == 'House Wife') checked @endif>
                    <p class="mr-3">House Wife <br>गृहणी</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->occupation == 'Minor') checked @endif>
                    <p class="mr-3">Minor<br>नाबालक</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->occupation == 'Senior Citizen') checked @endif>
                    <p class="mr-3">Senior Citizen <br>जेष्ठ नागरिक</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->occupation == 'Other') checked @endif>
                    <p class="mr-3">
                        Other..............
                        <br>
                        अन्य उल्लेख गर्नुहोस
                    </p>
                </div> 
            </div>
            <span class="side_header">Self Employee/स्वरोजगार</span>
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                    <p class="mr-3">Doctor <br>चिकित्सक </p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                    <p class="mr-3">Engineer <br>अभियानता</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                    <p class="mr-3">CA/Auditor <br>लेखा परिक्षक</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                    <p class="mr-3">Teaching<br>अध्यापन</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                    <p class="mr-3">Business <br>व्यवसाय</p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                    <p class="mr-3">Agriculture <br>कृषि </p>
                </div>
                <div class="d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                    <p class="mr-3">
                        Other..............
                        <br>
                        अन्य उल्लेख गर्नुहोस
                    </p>
                </div> 
            </div>
            <hr>
            <div class="row">
                <div class="col-3 ml-auto">
                    <p class="mb-0">..................................</p>
                    <p>खातावालाको दस्तखत/Signature</p>
                </div>
            </div>
        </div>

        <!--Family Details-->
        <div class="row">
            <div class="col-12">
                <div class="card headers">
                    <div class="card-body">
                        <h6>Family Details <span style="font-weight: 600;">(परिवारका सदस्यहरुको विवरण)</span></h6>
                    </div>
                </div>
            </div>
        </div>
        <table class="table table-bordered my-3">
            <thead class="text-center">
                <tr>
                    <th>S.N. <br> क्र.सं. </th>
                    <th>Relationship <br> नाता </th>
                    <th>Full Name * <br> पूरा नाम थर </th>
                    <th>Type of Document <br> परिचयपत्रको प्रकार </th>
                    <th>Document Number <br> प्रमाणपत्र नं. </th>
                    <th>Issue District <br> जारी गर्ने निकाय/जिल्ला </th>
                    <th>Issue Date <br> जारी मिति <br> YYYY-MM-DD</th>
                    <th>Valid Date <br> अन्तिम मिति <br> YYYY-MM-DD</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>१</td>
                    <td>Father*/बुवा</td>
                    <td>{{$kyc->father_full_name}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>२</td>
                    <td>Mother*/आमा</td>
                    <td>{{$kyc->mother_full_name}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>३</td>
                    <td>Grand Father*/बाजे</td>
                    <td>{{$kyc->grandfather_full_name}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>४</td>
                    <td>Spouse/पति,पत्नी</td>
                    <td>{{$kyc->husband_wife_full_name ?? ''}}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>५</td>
                    <td>Son/छोरा</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>६</td>
                    <td>Son/छोरा</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>७</td>
                    <td>Daughter/छोरी</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>८</td>
                    <td>Daughter/छोरी</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>९</td>
                    <td>Daugther in Law/बुहारी</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>१०</td>
                    <td>Father in Law/ससुरा</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>११</td>
                    <td>Mother in Law/सासू</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">
                        <b>Note:</b> If Document Type is selected then Document No. Should be Compulsory ( यदी परिचयपत्रको प्रकार छनोट गरेमा प्रमाणपत्र नं अनिवार्य राख्नु पर्ने छ )
                    </td>
                </tr>
            </tfoot>
        </table>

        <!--Income Details-->
        <span class="side_header">Associated Profession/Business and Estimated Annual Income ( संलग्न रहेको पेशा व्यवसाय र अनुमानित वार्षिक आम्दानी )</span>
        <p class="my-2">ग्राहक नाबालक, विद्यार्थी, गृहणी भएमा एकाघर परिवारको पेशा तथा आम्दानी उल्लेख गर्नुहोस |</p>
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Upto 1 Lakh <br>रु. १ लाख सम्म </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Upto 5 Lakh <br>रु. ५ लाख सम्म </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Upto 10 Lakh <br>रु. १० लाख सम्म </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Upto 25 Lakh <br>रु. २५ लाख सम्म </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Above 25 Lakh <br>रु. २५ लाखभन्दा माथि </p>
            </div>
        </div>
        <table class="table table-bordered my-3">
            <thead class="text-center">
                <tr>
                    <th>S.N. <br> क्र.सं. </th>
                    <th>Name of Income holder Family Member <br> आम्दानी गर्ने पारिवारिक सदस्यको नाम </th>
                    <th>Name of Organization <br> कार्यरत संस्थाको नाम </th>
                    <th>Address <br> ठेगाना </th>
                    <th>Designation <br> पद </th>
                    <th>Estimate Annual Income <br> अनुमानित वार्षिक आम्दानी </th>
                    <th>Phone No <br> पारिवारिक सदस्यको फोन </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>१</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>२</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>३</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <span class="side_header">Income Source Details ( आम्दानीको श्रोत विवरण )</span>
        <div>
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <p class="mr-3">Salary <br>तलब </p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->source_of_income == 'Salary') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Business <br>व्यापार </p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->source_of_income == 'Business') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Rental Income <br>भाडा आम्दानी </p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->source_of_income == 'Rental Income') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Commission <br>कमिशन </p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->source_of_income == 'Commission') checked @endif>
                </div>
                <div class="d-flex align-items-center">
                    <p class="mr-3">Return on Investment <br>लगानीमा प्रतिफल </p>
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->source_of_income == 'Return on Investment') checked @endif>
                </div>
            </div>
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <label for="" class="mr-2">Disposal of Assets <br> सम्पत्ति बेचबिखन </label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100">
                    </div>
                </div>
                <div class="col-6 d-flex align-items-center">
                    <label for="" class="mr-2">Others (Please specify) <br> अन्य उल्लेख गर्नुहोस </label>
                    <div class="flex-grow-1">
                        <input type="text" class="w-100">
                    </div>
                </div>
            </div>
        </div>
        <hr class="mb-0">
        <span class="side_header">Estimated Annual Transaction ( अनुमानित वार्षिक कारोबार )</span>
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->yearly_amount_of_transaction == 'Upto 1 Lakh') checked @endif>
                <p class="mr-3">Upto 1 Lakh <br>रु. १ लाख सम्म </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->yearly_amount_of_transaction == 'Upto 5 Lakh') checked @endif>
                <p class="mr-3">Upto 5 Lakh <br>रु. ५ लाख सम्म </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->yearly_amount_of_transaction == 'Upto 10 Lakh') checked @endif>
                <p class="mr-3">Upto 10 Lakh <br>रु. १० लाख सम्म </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->yearly_amount_of_transaction == 'Upto 25 Lakh') checked @endif>
                <p class="mr-3">Upto 25 Lakh <br>रु. २५ लाख सम्म </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->yearly_amount_of_transaction == 'Upto 50 Lakh') checked @endif>
                <p class="mr-3">Upto 50 Lakh <br>रु. ५० लाख सम्म </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->yearly_amount_of_transaction == 'Above 50 Lakh') checked @endif>
                <p class="mr-3">Above 50 Lakh <br>रु. ५० लाखभन्दा माथि </p>
            </div>
        </div>
        <span class="side_header">Estimated Annual Transaction No ( अनुमानित वार्षिक कारोबार संख्या )</span>
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <p class="mr-3">Upto 25 Transaction <br> २५ वटा सम्म </p>
                <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->number_of_yearly_transaction == 'Upto 25 Transaction') checked @endif>
            </div>
            <div class="d-flex align-items-center">
                <p class="mr-3">Upto 50 Transaction <br> ५० वटा सम्म </p>
                <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->number_of_yearly_transaction == 'Upto 50 Transaction') checked @endif>
            </div>
            <div class="d-flex align-items-center">
                <p class="mr-3">Upto 100 Transaction <br> १०० वटा सम्म </p>
                <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->number_of_yearly_transaction == 'Upto 100 Transaction') checked @endif>
            </div>
            <div class="d-flex align-items-center">
                <p class="mr-3">Above 100 Transaction <br> १०० भन्दा माथि </p>
                <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->number_of_yearly_transaction == 'Above 100 Transaction') checked @endif>
            </div>
        </div>
        <hr class="mb-0">
        <span class="side_header">Purpose of Account ( खाताको उद्दश्य )</span>
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <p class="mr-3">Saving <br>बचत </p>
                <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->account_purpose == 'Saving') checked @endif>
            </div>
            <div class="d-flex align-items-center">
                <p class="mr-3">Salary <br>तलब </p>
                <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->account_purpose == 'Salary') checked @endif>
            </div>
            <div class="d-flex align-items-center">
                <p class="mr-3">TR Payment <br>कारोबार भुक्तानी </p>
                <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->account_purpose == 'TR Payment') checked @endif>
            </div>
            <div class="d-flex align-items-center">
                <p class="mr-3">Remittance <br>विप्रेषण </p>
                <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->account_purpose == 'Remittance') checked @endif>
            </div>
            <div class="d-flex align-items-center">
                <p class="mr-3">Loan Payment <br>कर्जा भुक्तानी </p>
                <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->account_purpose == 'Loan Payment') checked @endif>
            </div>
            <div class="d-flex align-items-center">
                <p class="mr-3">
                    Other..............
                    <br>
                    अन्य उल्लेख गर्नुहोस..............
                </p>
            </div> 
        </div>
        <span class="side_header">Foreign Citizen Only ( विदेशी नागरिकको हकमा )</span>
        <div class="row my-3">
            <div class="col-5">
                <div>
                    <label for="">Passport No.:</label>
                    <input type="text" style="width: 310px;">
                </div>
                <div>
                    <label for="">Issued Date AD:</label>
                    <input type="date" style="width: 300px;">
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-5">
                <div>
                    <label for="">Issuing Country:</label>
                    <input type="text" style="width: 300px;">
                </div>
                <div>
                    <label for="">Visa Expiry Date AD:</label>
                    <input type="date" style="width: 300px;">
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-3 ml-auto">
                <p class="mb-0">..................................</p>
                <p>खातावालाको दस्तखत/Signature</p>
            </div>
        </div>
        <hr>
        <span class="side_header">Non Residence Nepalese Only ( गैर आवासीय नेपालीको हकमा )</span>
        <div class="row my-3">
            <div class="col-3 d-flex">
                <label for="" class="mr-2">NRN Code:</label>
                <input type="text" class="flex-grow-1">
            </div>
            <div class="col-3 d-flex">
                <label for="" class="mr-2">City:</label>
                <input type="text" class="flex-grow-1">
            </div>
            <div class="col-3 d-flex">
                <label for="" class="mr-2">State:</label>
                <input type="text" class="flex-grow-1">
            </div>
            <div class="col-3 d-flex">
                <label for="" class="mr-2">Country:</label>
                <input type="text" class="flex-grow-1">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-3 d-flex">
                <label for="" class="mr-2">Email:</label>
                <input type="text" class="flex-grow-1">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2">
                <label for="" class="mr-2">Contact Person In Nepal:</label>
            </div>
            <div class="col-5 d-flex">
                <label for="" class="mr-2">Name:</label>
                <input type="text" class="flex-grow-1">
            </div>
            <div class="col-5 d-flex">
                <label for="" class="mr-2">Mobile/Phone:</label>
                <input type="text" class="flex-grow-1">
            </div>
        </div>

        <!--Services-->
        <span class="side_header">Other Services and Facilities Please tick as per requirement ( अन्य सेवा तथा सुविधाहरु आवश्यकता अनुसार छनौट गर्नुहोस )</span>
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">SMS Alert <br>एसएमएस अलर्ट  </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Mobile Banking <br>मोबाइल बैंकिंग </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Internet Banking <br>इन्टरनेट बैंकिंग</p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">DMAT A/C <br>डिम्यात खाता </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Debit Card  <br>डेविट कार्ड </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Instant Prepaid Card  <br>इन्स्टान्ट प्रिपेड कार्ड </p>
            </div>
        </div>
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">QR Payment <br>क्यू.आर. पेमेन्ट  </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Connect IPS <br>कनेक्ट आइपिएस </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Locker <br>लकर </p>
            </div>
            <div class="d-flex align-items-center">
                <p class="mr-3">Locker Size:........................ <br>लकरको आकार </p>
            </div>
            <div class="d-flex align-items-center">
                <p class="mr-3">Other:............................ <br>अन्य उल्लेख गर्ने </p>
            </div>
        </div>
        <hr>

        <!--Other Info-->
        <div>
            <div class="d-flex">
                <label for="" class="mr-2">Please mention additional condition if any:</label>
                <input type="text" class="flex-grow-1">
            </div>
            <label for="" class="mr-2">थप निर्देशन भए उल्लेख गर्नुहोस:</label>
        </div>
        <hr>

        <!--Account Statement-->
        <div class="row">
            <div class="col-4 d-flex align-items-center">
                <p class="mr-3">Account Statement:<br>खाताको विवरण प्राप्त गर्ने </p>
            </div>
            <div class="col-2 d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Monthly <br>मासिक </p>
            </div>
            <div class="col-2 d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Quarterly <br>त्रैमासिक</p>
            </div>
            <div class="col-2 d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Half Yearly <br>अर्धवार्षिक</p>
            </div>
            <div class="col-2 d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Yearly <br>वार्षिक</p>
            </div> 
        </div>
        <hr>

        <!--Beneficiary-->
        <div>
            <div class="row">
                <div class="col-8 d-flex align-items-center">
                    <p class="mr-3">Is the Beneficial owner of this account a different person?:<br>यस खाताका वास्तविक धनी हिताधिकारी फरक व्यक्ति हुन्?</p>
                </div>
                <div class="col-2 d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->beneficiary_name != null) checked @endif>
                    <p class="mr-3">Yes <br>हो </p>
                </div>
                <div class="col-2 d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->beneficiary_name == null) checked @endif>
                    <p class="mr-3">No <br>होइन</p>
                </div>
            </div>
            <div class="row">
                <div class="col-8 d-flex align-items-center">
                    <p class="mr-3">If yes, name of beneficial owner: <br> येदी हो भने, हिताधिकारीको नाम</p>
                    <input type="text" class="flex-grow-1" value="{{$kyc->beneficiary_name}}">
                </div>
                <div class="col-4 d-flex align-items-center">
                    <p class="mr-3">Relation: <br> नाता</p>
                    <input type="text" class="flex-grow-1" value="{{$kyc->beneficiary_relation}}">
                </div>
            </div>
        </div>
        <hr>

        <!--Politician-->
        <div>
            <div class="row">
                <div class="col-8 d-flex align-items-center">
                    <p class="mr-3">Are you a politician/PEP or associate of Politician/PEP?:<br>के तपाईं राजनैतिक उच्चपदस्थ व्यक्ति सँग सम्बन्धित हुनुहुन्छ?</p>
                </div>
                <div class="col-2 d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                    <p class="mr-3">Yes <br>हो </p>
                </div>
                <div class="col-2 d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                    <p class="mr-3">No <br>होइन</p>
                </div>
            </div>
            <div class="row">
                <div class="col-4 d-flex align-items-center">
                    <p class="mr-3">If yes, name of political party: <br> येदी हो भने, राजनैतिक दलको नाम</p>
                    <input type="text" name="" class="flex-grow-1">
                </div>
                <div class="col-4 d-flex align-items-center">
                    <p class="mr-3">Present Designation: <br> वर्तमान पद</p>
                    <input type="text" name="" class="flex-grow-1">
                </div>
                <div class="col-4 d-flex align-items-center">
                    <p class="mr-3">Related Date: <br> लागेको मिति</p>
                    <input type="text" name="" class="flex-grow-1">
                </div>
            </div>
        </div>
        <hr>

        <!--Other accounts in this bank-->
        <div>
            <div class="row">
                <div class="col-8 d-flex align-items-center">
                    <p class="mr-3">Do you or any related parties maintain any accounts in this bank?:<br>के तपाईं तथा तपाईंको परिवार वा संलग्न रहेको व्यवसायको यस बैंकमा खाता छ?</p>
                </div>
                <div class="col-2 d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                    <p class="mr-3">Yes <br>छ </p>
                </div>
                <div class="col-2 d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                    <p class="mr-3">No <br>छैन</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <p class="mr-3">If yes, name of account holder: <br> येदी छ भने, खातावालाको नाम</p>
                    <input type="text" name="" class="flex-grow-1">
                </div>
                <div class="col-6 d-flex align-items-center">
                    <p class="mr-3">Account No.: <br> खाता नं</p>
                    <input type="text" name="" class="flex-grow-1">
                </div>
            </div>
        </div>
        <hr>

        <!--Another bank-->
        <div>
            <div class="row">
                <div class="col-8 d-flex align-items-center">
                    <p class="mr-3">Do you have account with another bank?:<br>के तपाईंको अन्य बैंकमा खाता छ?</p>
                </div>
                <div class="col-2 d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->account_in_other_banks == 1) checked @endif>
                    <p class="mr-3">Yes <br>छ </p>
                </div>
                <div class="col-2 d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3" @if($kyc->account_in_other_banks == 0) checked @endif>
                    <p class="mr-3">No <br>छैन</p>
                </div>
            </div>
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <p class="mr-3">If yes, name of bank: <br> येदी छ भने, बैंकको नाम</p>
                    <input type="text" name="" class="flex-grow-1">
                </div>
                <div class="col-6 d-flex align-items-center">
                    <p class="mr-3">Account No.: <br> खाता नं</p>
                    <input type="text" name="" class="flex-grow-1">
                </div>
            </div>
        </div>
        <hr>

        <!--read/write-->
        <div>
            <div class="row">
                <div class="col-8 d-flex align-items-center">
                    <p class="mr-3">Can you read and write yourself?:<br>तपाईं आँफै लेख्न पढ्न सक्नु हुन्छ?</p>
                </div>
                <div class="col-2 d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                    <p class="mr-3">Yes <br>सक्छु </p>
                </div>
                <div class="col-2 d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                    <p class="mr-3">No <br>सक्दिन</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-1 d-flex align-items-center">
                    <p class="mr-3">If no, mention detail of form filler:</p>
                    <input type="text" name="" class="flex-grow-1">
                </div>
                <div class="col-12 d-flex align-items-center">
                    <p class="mr-3">येदी सक्नु हुन्न भने विवरण लेखिदिने व्यक्तिको नाम (बैंक सँग सम्बन्धित व्यक्ति भए पद समेत उल्लेख गरी दस्तखत गर्नुहोस):</p>
                    <input type="text" name="" class="flex-grow-1">
                </div>
            </div>
        </div>

        <!--vision difficulty-->
        <div>
            <div class="row">
                <div class="col-8 d-flex align-items-center">
                    <p class="mr-3">Do you have vision difficulty?:<br>तपाईंलाई देख्न समस्या छ?</p>
                </div>
                <div class="col-2 d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                    <p class="mr-3">Yes <br>छ </p>
                </div>
                <div class="col-2 d-flex align-items-center">
                    <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                    <p class="mr-3">No <br>छैन</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-1 d-flex align-items-center">
                    <p class="mr-3">If yes, mention detail of form filler:</p>
                    <input type="text" name="" class="flex-grow-1">
                </div>
                <div class="col-12 d-flex align-items-center">
                    <p class="mr-3">येदी छ भने विवरण लेखिदिने व्यक्तिको नाम (बैंक सँग सम्बन्धित व्यक्ति भए पद समेत उल्लेख गरी दस्तखत गर्नुहोस):</p>
                    <input type="text" name="" class="flex-grow-1">
                </div>
            </div>
        </div>
        <hr>

        <!--Address verifying document-->
        <span class="side_header">Address Verifying Additional Documents ( ठेगाना सम्पुष्टि गर्ने थप कागज पत्र )</span>
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Electricity Bill <br>बिद्युत बिल </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Telephone Bill <br>टेलिफोन बिल </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Water Supply Bill <br>खानेपानी बिल </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Voter Id <br>मतदाता परिचय पत्र </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">PAN Card <br>स्थायी लेखा नं. </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Passport <br>राहदानी </p>
            </div>
            <div class="d-flex align-items-center">
                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                <p class="mr-3">Others specify:.............. <br>अन्य खुलाउनुहोस् </p>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6 ml-auto">
                <div class="row d-flex align-items-center">
                    <div class="col-6">
                        <table class="table table-bordered text-center">
                            <tr>
                                <td colspan="2">औंठाको छाप (Thumb Print)</td>
                            </tr>
                            <tr>
                                <td>दायाँ (Right)</td>
                                <td>बायाँ (Left)</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <p class="mb-0">..................................</p>
                        <p>खातावालाको दस्तखत/Signature</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <!--Nominee Details-->
        <span class="side_header">Nominee Details of Account/इच्छाएको व्यक्तिको  विवरण</span>
        <p class="mt-3">
            मेरो शेष पछि मेरो खातामा रहेको रकमको भुक्तानी लिन मैले उल्लेखित व्यक्तिलाई इच्छाएको व्यक्ति नियुक्त गरेको छु |
            <br>
            In the event of my death or incapacity, the following named nominee shall be entitled to receive balance sum of monies held with
            this account at Agricultural Development Bank Ltd.
        </p>
        <div class="row align-items-center">
            <div class="col-10">
                <div class="d-flex mb-2">
                    <label for="" class="mr-2">इच्छाएको व्यक्ति (Nominee Name):</label>
                    <input type="text" class="flex-grow-1" value="{{$kyc->nominee_name}}">
                </div>
                <div class="row mb-2">
                    <div class="d-flex col-6">
                        <label for="" class="mr-2">प्रमाणपत्रको प्रकार (Type of Document):</label>
                        <input type="text" class="flex-grow-1">
                    </div>
                    <div class="d-flex col-6">
                        <label for="" class="mr-2">प्रमाणपत्रको नं. (Document Ref. No):</label>
                        <input type="text" class="flex-grow-1">
                    </div>
                </div>
                <div class="d-flex mb-2">
                    <label for="" class="mr-2">नाबालकको हकमा जन्मदर्ता प्रमाणपत्र नं. (Birth Registration Certificate No.):</label>
                    <input type="text" class="flex-grow-1">
                </div>
                <div class="row mb-2">
                    <div class="d-flex col-6">
                        <label for="" class="mr-2">जारी मिति (Issued Date):</label>
                        <input type="text" class="flex-grow-1">
                    </div>
                    <div class="d-flex col-6">
                        <label for="" class="mr-2">जारी गर्ने संस्था/निकाय (Issued By):</label>
                        <input type="text" class="flex-grow-1">
                    </div>
                </div>                    
                <div class="d-flex mb-2">
                    <label for="" class="mr-2">इच्छाएको व्यक्तिसँगको नाता (Relationship with Nominee):</label>
                    <input type="text" class="flex-grow-1" value="{{$kyc->nominee_relation}}">
                </div>
                <div class="d-flex mb-2">
                    <label for="" class="mr-2">इच्छाएको व्यक्तिको पिताको नाम (Nominee's Father's Name):</label>
                    <input type="text" class="flex-grow-1" value="{{$kyc->nominee_father_name}}">
                </div>
                <div class="row mb-2">
                    <div class="d-flex col-4">
                        <label for="" class="mr-2">सम्पर्क ठेगाना (Contact Address):</label>
                        <input type="text" class="flex-grow-1" value="{{$kyc->nominee_current_address}}">
                    </div>
                    <div class="d-flex col-4">
                        <label for="" class="mr-2">मोबाइल (Mobile):</label>
                        <input type="text" class="flex-grow-1" value="{{$kyc->nominee_phone_number}}">
                    </div>
                    <div class="d-flex col-4">
                        <label for="" class="mr-2">इमेल (Email):</label>
                        <input type="text" class="flex-grow-1">
                    </div>
                </div>                   
            </div>
            <div class="col-2">
                <div class="image " style="width: 130px; overflow: hidden;">
                    <img src="/images/doctor.jpg" width="100%">
                </div>
            </div>
        </div>
        <hr>
        <p class="mt-3">
            ( इच्छाएको व्यक्ति थप गर्नु पर्ने भए कृपया थप पानाको प्रयोग गर्नुहोस )
            <br>
            इच्छाएको व्यक्ति नाबालक छदै मेरो मृत्यु भएमा मैले उल्लेखित व्यक्तिलाई इच्छाएको व्यक्तिको तर्फबाट भुक्तानी लिन नियुक्त गरेको छु | 
            <br>
            ( In the event of my death , if the above nominee(s) is a minor, I appoint the following person to receive monies dut to me. )
        </p>
        <div class="row align-items-center">
            <div class="col-10">
                <div class="d-flex mb-2">
                    <label for="" class="mr-2">नाम, थर (Name):</label>
                    <input type="text" class="flex-grow-1">
                </div>
                <div class="row mb-2">
                    <div class="d-flex col-6">
                        <label for="" class="mr-2">प्रमाणपत्रको प्रकार (Type of Document):</label>
                        <input type="text" class="flex-grow-1">
                    </div>
                    <div class="d-flex col-6">
                        <label for="" class="mr-2">प्रमाणपत्रको नं. (Document Ref. No):</label>
                        <input type="text" class="flex-grow-1">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="d-flex col-6">
                        <label for="" class="mr-2">जारी मिति (Issued Date):</label>
                        <input type="text" class="flex-grow-1">
                    </div>
                    <div class="d-flex col-6">
                        <label for="" class="mr-2">म संगको नाता (Relationship with me):</label>
                        <input type="text" class="flex-grow-1">
                    </div>
                </div>                    
                <div class="d-flex mb-2">
                    <label for="" class="mr-2">ठेगाना (Address):</label>
                    <input type="text" class="flex-grow-1">
                </div>
                <div class="row mb-2">
                    <div class="d-flex col-4">
                        <label for="" class="mr-2">फोन (Phone):</label>
                        <input type="text" class="flex-grow-1">
                    </div>
                    <div class="d-flex col-4">
                        <label for="" class="mr-2">मोबाइल (Mobile):</label>
                        <input type="text" class="flex-grow-1">
                    </div>
                    <div class="d-flex col-4">
                        <label for="" class="mr-2">इमेल (Email):</label>
                        <input type="text" class="flex-grow-1">
                    </div>
                </div>                   
            </div>
            <div class="col-2">
                <div class="image " style="width: 130px; overflow: hidden;">
                    <img src="/images/doctor.jpg" width="100%">
                </div>
            </div>
        </div>
        <hr>

        <div>
            <p>
                खाता परिचय गराउने (Introduced by)
            </p>
            <div class="row">
                <div class="col-5">
                    <div class="d-flex mb-2">
                        <label for="" class="mr-2">दस्तखत (Signature)</label>
                        <input type="text" class="flex-grow-1"> 
                    </div>
                    <div class="d-flex mb-2">
                        <label for="" class="mr-2">नाम (Name)</label>
                        <input type="text" class="flex-grow-1"> 
                    </div>                    
                    <div class="d-flex mb-2">
                        <label for="" class="mr-2">खाता नं. (Account No.)</label>
                        <input type="text" class="flex-grow-1"> 
                    </div>                    
                    <div class="d-flex mb-2">
                        <label for="" class="mr-2">खाताको प्रकार (Account Type)</label>
                        <input type="text" class="flex-grow-1"> 
                    </div>                    
                    <div class="d-flex mb-2">
                        <label for="" class="mr-2">ठेगाना (Address)</label>
                        <input type="text" class="flex-grow-1"> 
                    </div>                    
                </div>
            </div>
        </div>
        <hr>
        <div class="row mt-3">
            <div class="col-6 ml-auto">
                <div class="row d-flex align-items-center">
                    <div class="col-6">
                        <table class="table table-bordered text-center">
                            <tr>
                                <td colspan="2">औंठाको छाप (Thumb Print)</td>
                            </tr>
                            <tr>
                                <td>दायाँ (Right)</td>
                                <td>बायाँ (Left)</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <p class="mb-0">..................................</p>
                        <p>खातावालाको दस्तखत/Signature</p>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <!--Signature-->
        <div class="side_header text-center">
            Signature Specimen (दस्तखत नमुना) <br>
            Please sign with black ink ( कृपया कालो मसीले दस्तखत गर्नु होला )
        </div>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="py-2" colspan="4">
                        खाता नं. (Account No.):
                        <input type="text" style="width: 500px;">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <p class="mr-3">खाता संचालन (Account Operation): </p>
                            </div>
                            <div class="d-flex align-items-center">
                                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                                <p class="mr-3">Single <br>एकल </p>
                            </div>
                            <div class="d-flex align-items-center">
                                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                                <p class="mr-3">Joint <br>संयुक्त</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                                <p class="mr-3">Anyone <br>कुनै एक</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                                <p class="mr-3">Any Two <br>कुनै दुई</p>
                            </div>
                            <div class="d-flex align-items-center">
                                <input type="checkbox" style="width:20px;height:20px" class="mr-3">
                                <p class="mr-3">
                                    Other Specify..............
                                    <br>
                                    अन्य उल्लेख गर्ने..............
                                </p>
                            </div> 
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        १. नाम तथा ग्राहक नं.  (1. Name and Customer ID):
                        <span class="float-right" style="margin-right: 200px;">औंठाको छाप (Thumb Print)</span>
                    </td>
                </tr>
                <tr>
                    <td>दस्तखत (Signature):</td>
                    <td rowspan="2" class="text-center">
                        फोटो
                        <div class="image mx-auto" style="width: 130px; overflow: hidden;">
                            <img src="/images/doctor.jpg" width="100%">
                        </div>
                    </td>
                    <td rowspan="2" class="text-center">
                        दायाँ (Right)
                        <div class="image mx-auto" style="width: 130px; overflow: hidden;">
                            <img src="/images/doctor.jpg" width="100%">
                        </div>
                    </td>
                    <td rowspan="2" class="text-center">
                        बायाँ (Left)
                        <div class="image mx-auto" style="width: 130px; overflow: hidden;">
                            <img src="/images/doctor.jpg" width="100%">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>दस्तखत (Signature):</td>
                </tr>
                <tr>
                    <td colspan="4">
                        २. नाम तथा ग्राहक नं.  (2. Name and Customer ID):
                        <span class="float-right" style="margin-right: 200px;">औंठाको छाप (Thumb Print)</span>
                    </td>
                </tr>
                <tr>
                    <td>दस्तखत (Signature):</td>
                    <td rowspan="2" class="text-center">
                        फोटो
                        <div class="image mx-auto" style="width: 130px; overflow: hidden;">
                            <img src="/images/doctor.jpg" width="100%">
                        </div>
                    </td>
                    <td rowspan="2" class="text-center">
                        दायाँ (Right)
                        <div class="image mx-auto" style="width: 130px; overflow: hidden;">
                            <img src="/images/doctor.jpg" width="100%">
                        </div>
                    </td>
                    <td rowspan="2" class="text-center">
                        बायाँ (Left)
                        <div class="image mx-auto" style="width: 130px; overflow: hidden;">
                            <img src="/images/doctor.jpg" width="100%">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>दस्तखत (Signature):</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ३. नाम तथा ग्राहक नं.  (3. Name and Customer ID):
                        <span class="float-right" style="margin-right: 200px;">औंठाको छाप (Thumb Print)</span>
                    </td>
                </tr>
                <tr>
                    <td>दस्तखत (Signature):</td>
                    <td rowspan="2" class="text-center">
                        फोटो
                        <div class="image mx-auto" style="width: 130px; overflow: hidden;">
                            <img src="/images/doctor.jpg" width="100%">
                        </div>
                    </td>
                    <td rowspan="2" class="text-center">
                        दायाँ (Right)
                        <div class="image mx-auto" style="width: 130px; overflow: hidden;">
                            <img src="/images/doctor.jpg" width="100%">
                        </div>
                    </td>
                    <td rowspan="2" class="text-center">
                        बायाँ (Left)
                        <div class="image mx-auto" style="width: 130px; overflow: hidden;">
                            <img src="/images/doctor.jpg" width="100%">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>दस्तखत (Signature):</td>
                </tr>
                <tr>
                    <td colspan="4">
                        ४. नाम तथा ग्राहक नं.  (4. Name and Customer ID):
                        <span class="float-right" style="margin-right: 200px;">औंठाको छाप (Thumb Print)</span>
                    </td>
                </tr>
                <tr>
                    <td>दस्तखत (Signature):</td>
                    <td rowspan="2" class="text-center">
                        फोटो
                        <div class="image mx-auto" style="width: 130px; overflow: hidden;">
                            <img src="/images/doctor.jpg" width="100%">
                        </div>
                    </td>
                    <td rowspan="2" class="text-center">
                        दायाँ (Right)
                        <div class="image mx-auto" style="width: 130px; overflow: hidden;">
                            <img src="/images/doctor.jpg" width="100%">
                        </div>
                    </td>
                    <td rowspan="2" class="text-center">
                        बायाँ (Left)
                        <div class="image mx-auto" style="width: 130px; overflow: hidden;">
                            <img src="/images/doctor.jpg" width="100%">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>दस्तखत (Signature):</td>
                </tr>
            </tbody>
        </table>
        <div>
            <p>
                1. Account Operation Method (Please mention if operated by power of authority) <br>
                १. खाता संचालन तरिका ( अख्तियारनामाबाट संचालन गर्नु पर्ने भएमा उल्लेख गर्नुहोस ) <br>
                2. Signature Notification <br>
                २. कारोबार संचालन दस्तखत सम्बन्धि विशेष निर्देशन:....................................<br>
            </p>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                ........................ <br>
                रुजु गर्ने Signature Checked by
            </div>
            <div class="col-4 text-center">
                ........................ <br>
                बैंकको छाप Bank's Stamp
            </div>
            <div class="col-4 text-right">
                ........................ <br>
                प्रमाणित गर्ने Signature Approved by
            </div>
        </div>

        <!--Location Map-->
        <div class="side_header text-center">Location Map (घर सम्म पुग्ने नक्शा)</div>
        <input type="text" id="latitude" value="{{$kyc->latitude}}" hidden>
        <input type="text" id="longitude" value="{{$kyc->longitude}}" hidden>
        <div id="map">            
        </div>
        <hr>
        <p>
            एक भन्दा बढी आवेदक भएमा छुट्टै ग्राहक पहिचान फारम भर्नुहोला | In case of more than one applicant, please fill separate KYC Form.
        </p>
        <div class="row mt-3">
            <div class="col-6 ml-auto">
                <div class="row d-flex align-items-center">
                    <div class="col-6">
                        <table class="table table-bordered text-center">
                            <tr>
                                <td colspan="2">औंठाको छाप (Thumb Print)</td>
                            </tr>
                            <tr>
                                <td>दायाँ (Right)</td>
                                <td>बायाँ (Left)</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-6">
                        <p class="mb-0">..................................</p>
                        <p>खातावालाको दस्तखत/Signature</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
       
@endsection

@section('custom-script')
<script>
    var longitude = document.getElementById('longitude').value;
    var latitude = document.getElementById('latitude').value;
    var map = L.map('map',{
        center: [0,0],
        dragging: false,
        scrollWheelZoom: "center",
    }).setView([latitude, longitude], 20);
    var marker = L.marker([latitude, longitude]).addTo(map);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    L.marker([latitude, longitude]).addTo(map)
        .openPopup();
</script>
@endsection
