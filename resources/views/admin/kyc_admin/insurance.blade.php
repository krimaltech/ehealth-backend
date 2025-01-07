@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Insurance Form</span></h4>
                <button style="border-radius: 40%;" onClick="window.print()" class="btn btn-primary print" ><i class="fa fa-print"></i> Print</button>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('kyc.admin_index') }}" class="breadcrumb-item">Global Form</a>
                    <span class="breadcrumb-item active">Insurance Form</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection
@section('content')
<style>

    /* p {
        margin: 0;
        padding: 0;
    } */

    .area {
        display: flex;
        justify-content: space-between;
    }

    .flexItems {
        display: flex;
    }

    .flexItems:last-child {
        flex-shrink: 0;
    }

    .image {
        width: 300px;
        aspect-ratio: 2/1.2;
        border: 1px solid;
    }

    .flexgrow {
        flex-grow: 1;
        margin-right: 10px;
    }

    .areaitem {
        display: flex;
        flex-grow: 1;
    }

    .areaitem .value {
        min-width: 5px;
        flex-grow: 1;
        text-align: center;
        border-bottom: 1px dotted;
    }
    @media print {
        @page {
              size: A4;
              margin: 0px !important;
            }
            
            body {
            width: auto;
            height: auto;
            overflow: visible;
        }
        /* Hide scrollbar for Chrome, Safari and Opera */
::-webkit-scrollbar {
  display: none;
}

/* Hide scrollbar for IE, Edge add Firefox */
.scrollbar-hidden {
  -ms-overflow-style: none;
  scrollbar-width: none; /* Firefox */
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
<body>
    <div>
        <div class="header" style="display: flex; justify-content: space-between;">
            <div class="header1">
                <div class="heads" style="display: flex; align-items: center;">
                    <div class="logo">
                        {{-- <img src="https://www.financialnotices.com/pagegallery/nepal-life-insurance-company-ltd30.png"
                            alt="" style="height: 40px;"> --}}
                    </div>
                    <div class="head">
                        <p style="font-size: 25px; font-weight: bold;margin: 0;padding: 0;"> <a href=""
                                style="color: black; text-align: center;"> नेपाल
                                इन्स्योरेन्स कम्पनी ली. </a></p>
                        <p style="font-size: 20px; font-weight: bold;margin: 0;padding: 0;">Nepal Insurance Company Ltd.
                        </p>
                        <p>प्रधान कार्यालय:एन.आई.सी. बिल्डिंग कमलादी, पो .ब.न.३६२३, काठमाडौँ
                            नेपाल
                            <br>
                            फोन न. ४२२१३५३, ४२४५५६५, ४२४५५६९, ४२२८६९०, फ्याक्स:९७७-१-४२२५४४६ <br>
                            E-mail: nic@wlink.com.np, Web:www.nepalinsurance.com.np
                        </p>
                    </div>
                </div>

                <p style="text-align: center; margin-top: 10px;">सम्पति शुद्धिकरण (मनि लाउन्डरिंग)निवारण गर्ने सम्बन्धमा
                    पेश गर्नुपर्ने
                    विवरण र जोखिम व्यस्थापनका
                    सम्बन्धमा <br>
                    नेपाल राष्ट्र बैंक , वित्तीय जानकारी इकाइले सम्पति शुद्धिकरण निवारण ऐन , २०६४ बमोजिम बीमा सम्बन्धी
                    <br>
                    कम गर्ने बिमक, बीमा अभिकर्ता र सर्भेयरलाई जारी गरेको निर्देशन संग सम्बन्धित
                </p>
            </div>
            <div class="header2" style="height: 170px; width: 170px;border: 1px solid black;position: relative;"><img src="{{ asset('storage/images/' . $kyc->self_image) }}" alt="self-pht" width="200px" height="200px"></div>
        </div>
        <div class="flex" style="display: flex; margin-top: 10px;">
            <div class="left">
                <p>ग्राहक परिचय पत्र न.</p>
            </div>
            <div class="right" style="margin-left: 20%;">
                <p style="text-align: center; font-size: 20px;font-weight: bold;">ग्राहक परिचय-पत्र </p>
            </div>
        </div>
        <p style="font-weight: bold; font-size: 15px;"> क. व्यक्तिगत ग्राहकको लागि </p>
        <p> १) नाम थर (अंग्रेजीमा)
            <div class="area">
                <div class="areaitem">
                    <div class="value">{{$kyc->first_name}}</div>
                </div>
                <div class="areaitem">
                    <div class="value">{{$kyc->middle_name}}</div>
                </div>
                <div class="areaitem">
                    <div class="value">{{$kyc->last_name}}</div>
                </div>
            </div>
        </p>
        <p>
        <div class="areaitem">
            <div class="label">
                २)नाम थर (नेपालीमा):
            </div>
            <div class="value"></div>
        </div>
        </p>
        <p>
        <div class="areaitem">
            <div class="label">
                ३) पिताको / पतिको नाम:
            </div>
            <div class="value">{{$kyc->father_full_name}}</div>
        </div>
        </p>
        <p>
        <div class="areaitem">
            <div class="label">
                ३) बाजेको नाम, थर:
            </div>
            <div class="value">{{$kyc->grandfather_full_name}}</div>
        </div>
        </p>
        <p>४) स्थायी ठेगाना: <br>
        <div class="area ">
            <div class="areaitem">
                <div class="value">{{ $kyc->perm_province->english_name }}</div>
                <div class="label">
                    अंचल
                </div>
            </div>
            <div class="areaitem">
                <div class="value">{{ $kyc->perm_district->english_name }}</div>
                <div class="label">
                    जिल्ला
                </div>
            </div>
            <div class="areaitem">
                <div class="value">{{ $kyc->perm_municipality->english_name }}</div>
                <div class="label">
                    गा.बि.स../न.पा
                </div>
            </div>
            <div class="areaitem">
                <div class="value">{{ $kyc->perm_ward->ward_name }}</div>
                <div class="label">
                    न.वडा
                </div>
            </div>
        </div>
        <br>
        <!-- ...........अंचल............जिल्ला...............गा.बि.स../न.पा..................... न.वडा <br> -->
        <div class="area ">
            <div class="areaitem">
                <div class="label">
                    टोल
                </div>
                <div class="value">{{ $kyc->perm_location }}</div>
            </div>
            <div class="areaitem">
                <div class="label">
                    ब्लक न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    पो. ब.न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    घर न
                </div>
                <div class="value">{{ $kyc->perm_house_number }}</div>
            </div>
        </div>

        <div class="area ">
            <div class="areaitem">
                <div class="label">
                    फोन न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    मोबाइलन न.
                </div>
                <div class="value">{{ $kyc->mobile_number }}</div>
            </div>
            <div class="areaitem">
                <div class="label">
                    फ्याक्स न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    इमेल ठेगाना
                </div>
                <div class="value">{{ $kyc->email }}</div>
            </div>
        </div>

        <p>६) अस्थायी ठेगाना (स्थायी ठेगाना भन्दा फरक भएमा ): <br>
        <div class="area ">
            <div class="areaitem">
                <div class="value">{{ $kyc->temp_province->english_name }}</div>
                <div class="label">
                    अंचल
                </div>
            </div>
            <div class="areaitem">
                <div class="value">{{ $kyc->temp_district->english_name }}</div>
                <div class="label">
                    जिल्ला
                </div>
            </div>
            <div class="areaitem">
                <div class="value">{{ $kyc->temp_municipality->english_name }}</div>
                <div class="label">
                    गा.बि.स../न.पा
                </div>
            </div>
            <div class="areaitem">
                <div class="value">{{ $kyc->temp_ward->ward_name }}</div>
                <div class="label">
                    न.वडा
                </div>
            </div>
        </div>
        <div class="area ">
            <div class="areaitem">
                <div class="label">
                    टोल
                </div>
                <div class="value">{{ $kyc->temp_location }}</div>
            </div>
            <div class="areaitem">
                <div class="label">
                    ब्लक न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    पो. ब.न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    घर न
                </div>
                <div class="value">{{ $kyc->temp_house_number }}</div>
            </div>
        </div>
        <div class="area ">
            <div class="areaitem">
                <div class="label">
                    फोन न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    मोबाइलन न.
                </div>
                <div class="value">{{ $kyc->mobile_number }}</div>
            </div>
            <div class="areaitem">
                <div class="label">
                    फ्याक्स न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    इमेल ठेगाना
                </div>
                <div class="value">{{ $kyc->email }}</div>
            </div>
        </div>
        </p>
        <p>
        <div class="area ">
            ७) जन्म मिति : (वि.स.)
            <div class="areaitem">
                <div class="value"></div>
                <div class="label">
                    साल
                </div>
            </div>
            <div class="areaitem">
                <div class="value"></div>
                <div class="label">
                    महिना
                </div>
            </div>
            <div class="areaitem">
                <div class="value"></div>
                <div class="label">
                    गते(ई.स.)
                </div>

            </div>
            <div class="areaitem">
                <div class="value">{{ substr($kyc->birth_date, 5, 2) }}</div>
                <div class="label">
                    साल
                </div>

            </div>
            <div class="areaitem">
                <div class="value">{{ substr($kyc->birth_date, 8, 10) }}</div>
                <div class="label">
                    महिना
                </div>

            </div>
            <div class="areaitem">
                <div class="value">{{ substr($kyc->birth_date, 0, 4) }}</div>
                <div class="label">
                    गते
                </div>

            </div>


        </div>

        </p>
        <p>
        <div class="area ">
            ८) नागरिकता/पस्स्पोर्ट न.
            <div class="areaitem">
                <div class="value">{{ $kyc->identification_no }}</div>
                <div class="label">
                    जारी मिति
                </div>
            </div>
            <div class="areaitem">
                <div class="value">{{ $kyc->citizenship_date }}</div>
                <div class="label">
                    जारी गरिएको स्थान
                </div>
            </div>
            <div class="areaitem">
                <div class="value">{{ $kyc->citizenship_issue_district }}</div>
                <div class="label">
                </div>
            </div>


        </div>
        <div class="area ">
            ९) पेशा व्यवसाय:
            <div class="areaitem">
                <div class="value">{{$kyc->occupation}}</div>
                <div class="label">

                </div>
            </div>
        </div>



        माथी उल्लेखित विवरणहरु ठिक साचोछ | झुट्ठा ठहरिएमा कानुन बमोजिम सहुला बुझाउला |
        </p>
        <div class="sign"
            style="display: flex; justify-content: space-between; align-items: center; padding-bottom: 5px;">
            <div class="left1" style="width: 25%;">
                <div class="areaitem">
                    <div class="label">
                        दस्तखत:
                    </div>
                    <div class="value"></div>
                </div>
                <div class="areaitem">
                    <div class="label">
                        दस्तखत:
                    </div>
                    <div class="value"></div>
                </div>

            </div>
            <div class="dflex" style="display: flex;width: 25%; justify-content: end;">
                <div class="right1" style="height: 80px; width: 80px; border: 1px solid black; position: relative;">
                    <p style="position: absolute;  left: 35px; top: 25px;"> दा.</p>
                </div>
                <div class="left1" style="height: 80px; width: 80px; border: 1px solid black; position: relative; ">
                    <p style="position: absolute;  left: 35px; top: 25px;">बा.</p>

                </div>
            </div>
        </div>
        <p
            style="font-weight: bold ;border-top: 3px solid black; width: 100%;font-size: 20px;text-align: center; padding-top: 5px;">
            व्यक्तिगत ग्राहकहरुले अनिवार्य रुपमा बुझाउनु पर्ने कागजातहरु:</p>
        <p><span style="font-weight: bold;font-size: 20px;"> .</span> फोटो <span
                style="font-weight: bold;font-size: 20px;"> .</span>
            नागरिकता/पासपोर्टको प्रतिलिपि <span style="font-weight: bold;font-size: 20px;"> .</span> स्थायी लेखा न.
            लिएको भए सोको
            प्रतिलिपि </p>

        <p> नेपाल सरकार वा नेपाल सरकारको स्वामित्व रहेको संघ-संस्थामा काम गर्ने कर्मचारी भएमा परिचय पत्रको प्रतिलिपि
        </p>
        <p><span style="font-size: 15px; font-weight: bold;">ख. संस्थागत ग्राहकको लागि: </span>(सम्बन्धित संस्थामा चिन्ह
            <input type="checkbox">
            लगाउनु होला |)
        </p>

        <p><input type="checkbox" style="width: 20px;"> साझेदारी /व्यक्तिगत फर्म <input type="checkbox"
                style="width: 20px; margin-left: 20px;">
            प्राइभेट कम्पनी <input type="checkbox" style="width: 20px; margin-left: 20px;"> पब्लिक कम्पनी <input
                type="checkbox" style="width: 20px; margin-left: 20px;"> सहकारी <input type="checkbox"
                style="width: 20px; margin-left: 20px;"> बीमा कम्पनी <br><input type="checkbox" style="width: 20px;">
            गैर्ह\ सहकारी संघ-संस्था <input type="checkbox" style="width: 20px; margin-left: 20px;"> सार्बजनिक गुठी
            <input type="checkbox" style="width: 20px; margin-left: 20px;"> स्चूल/कलेज
        </p>
        <p>१) संस्थाको नाम (अंग्रेजीमा ):<input type="text" style="width:15px;height: 15px;margin-left: 5%;"><input
                type="text" style="width:15px;height: 15px"><input type="text" style="width:15px; height: 15px"><input
                type="text" style="width:15px;height: 15px"><input type="text" style="width:15px;height: 15px"><input
                type="text" style="width:15px;height: 15px"><input type="text" style="width:15px;height: 15px"><input
                type="text" style="width:15px;height: 15px"><input type="text" style="width:15px;height: 15px"><input
                type="text" style="width:15px;height: 15px"><input type="text" style="width:15px;height: 15px"><input
                type="text" style="width:15px;height: 15px"><input type="text" style="width:15px;height: 15px"><input
                type="text" style="width:15px;height: 15px"><input type="text" style="width:15px;height: 15px"><input
                type="text" style="width:15px;height: 15px"><input type="text" style="width:15px;height: 15px"><input
                type="text" style="width:15px;height: 15px"><input type="text" style="width:15px;height: 15px"><input
                type="text" style="width:15px;height: 15px"><input type="text" style="width:15px;height: 15px"><input
                type="text" style="width:15px;height: 15px"><input type="text" style="width:15px;height: 15px"><input
                type="text" style="width:15px;height: 15px"></p>
        <div class="areaitem">
            <div class="label">
                (नेपालीमा):
            </div>
            <div class="value"></div>
        </div>
        <p>२) स्थायी ठेगाना: <br>
        <div class="area ">
            <div class="areaitem">
                <div class="value"></div>
                <div class="label">
                    अंचल
                </div>
            </div>
            <div class="areaitem">
                <div class="value"></div>
                <div class="label">
                    जिल्ला
                </div>
            </div>
            <div class="areaitem">
                <div class="value"></div>
                <div class="label">
                    गा.बि.स../न.पा
                </div>
            </div>
            <div class="areaitem">
                <div class="value"></div>
                <div class="label">
                    न.वडा
                </div>
            </div>
        </div>
        <div class="area ">
            <div class="areaitem">
                <div class="label">
                    टोल
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    ब्लक न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    पो. ब.न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    घर न
                </div>
                <div class="value"></div>
            </div>
        </div>

        <div class="area ">
            <div class="areaitem">
                <div class="label">
                    फोन न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    मोबाइलन न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    फ्याक्स न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    इमेलठेगाना
                </div>
                <div class="value"></div>
            </div>
        </div>
        </p>

        <p>३) ३) केन्द्रिय कार्यालयको ठेगाना : <br>
        <div class="area ">
            <div class="areaitem">
                <div class="value"></div>
                <div class="label">
                    अंचल
                </div>
            </div>
            <div class="areaitem">
                <div class="value"></div>
                <div class="label">
                    जिल्ला
                </div>
            </div>
            <div class="areaitem">
                <div class="value"></div>
                <div class="label">
                    गा.बि.स../न.पा
                </div>
            </div>
            <div class="areaitem">
                <div class="value"></div>
                <div class="label">
                    न.वडा
                </div>
            </div>
        </div>

        <!-- ...........अंचल............जिल्ला...............गा.बि.स../न.पा..................... न.वडा <br> -->
        <div class="area ">
            <div class="areaitem">
                <div class="label">
                    टोल
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    ब्लक न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    पो. ब.न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    घर न
                </div>
                <div class="value"></div>
            </div>
        </div>

        <div class="area ">
            <div class="areaitem">
                <div class="label">
                    फोन न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    मोबाइलन न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    फ्याक्स न.
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">
                <div class="label">
                    इमेलठेगाना
                </div>
                <div class="value"></div>
            </div>
        </div>
        </p>
        <p>

        <div class="area ">
            ४) दर्ता प्रमाण-पत्र न.:
            <div class="areaitem">

                <div class="label">
                    कम्पनी रजिस्टार.:
                </div>
                <div class="value"></div>
            </div>
            <div class="areaitem">

                <div class="label">
                    अन्य
                </div>
                <div class="value"></div>
            </div>
        </div>
        </p>
        <p>
        <div class="areaitem" style="width: 20%;">
            <div class="label">
                ५) भ्याट न./प्यान न.
            </div>
            <div class="value"></div>
        </div>



        <p style="font-weight: bold;font-size: 20px; margin-top: 10px;">संचालक समिति/ कार्य समिति/ व्यस्थापन समिति/
            साझेदार/ पदाधिकारी/
            सदस्यहरुको नाम</p>
        <div class="swap1">
            <div class="flexItems">
                <div class="flexgrow">
                    <div> १) नाम (नेपालीमा ): <input type="text" style="width: 500px;"></div>
                    <div class="area ">
                        <div class="areaitem">

                            <div class="label">
                                ठेगाना</div>
                            <div class="value"></div>

                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                अंचल
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                जिल्ला
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                गा.बि.स../न.पा
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                न.वडा
                            </div>
                        </div>
                    </div>
                    <div class="area ">
                        <div class="areaitem">
                            <div class="label">
                                टोल
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                ब्लक न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                पो. ब.न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                घर न
                            </div>
                            <div class="value"></div>
                        </div>
                    </div>

                    <div class="area ">
                        <div class="areaitem">
                            <div class="label">
                                फोन न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                मोबाइलन न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                फ्याक्स न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                इमेलठेगाना
                            </div>
                            <div class="value"></div>
                        </div>
                    </div>
                </div>
                <div type="text"
                    style="width: 80px; height: 80px; position: relative;border: 1px solid black; margin-top: 15px;">
                    <p style="position: absolute; left: 30px; top: 35px;">फोटो</p>
                </div>
            </div>
            <div class="flexItems">
                <div class="flexgrow">
                    <div> २) नाम (नेपालीमा ): <input type="text" style="width:500px"></div>
                    <div class="area ">
                        <div class="areaitem">

                            <div class="label">
                                ठेगाना</div>
                            <div class="value"></div>
                        </div>

                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                अंचल
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                जिल्ला
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                गा.बि.स../न.पा
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                न.वडा
                            </div>
                        </div>
                    </div>
                    <div class="area ">
                        <div class="areaitem">
                            <div class="label">
                                टोल
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                ब्लक न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                पो. ब.न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                घर न
                            </div>
                            <div class="value"></div>
                        </div>
                    </div>

                    <div class="area ">
                        <div class="areaitem">
                            <div class="label">
                                फोन न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                मोबाइलन न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                फ्याक्स न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                इमेलठेगाना
                            </div>
                            <div class="value"></div>
                        </div>
                    </div>
                </div>
                <div type="text"
                    style="width: 80px; height: 80px;position: relative;border: 1px solid black; margin-top: 15px;">
                    <p style="position: absolute; left: 30px; top: 35px;">फोटो</p>
                </div>
            </div>
            <div class="flexItems">
                <div class="flexgrow">
                    <div> ३) नाम (नेपालीमा ): <input type="text" style="width: 500px;"></div>
                    <div class="area ">
                        <div class="areaitem">

                            <div class="label"> ठेगाना </div>
                            <div class="value"></div>

                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                अंचल
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                जिल्ला
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                गा.बि.स../न.पा
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                न.वडा
                            </div>
                        </div>
                    </div>
                    <div class="area ">
                        <div class="areaitem">
                            <div class="label">
                                टोल
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                ब्लक न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                पो. ब.न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                घर न
                            </div>
                            <div class="value"></div>
                        </div>
                    </div>

                    <div class="area ">
                        <div class="areaitem">
                            <div class="label">
                                फोन न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                मोबाइलन न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                फ्याक्स न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                इमेलठेगाना
                            </div>
                            <div class="value"></div>
                        </div>
                    </div>
                </div>
                <div type="text"
                    style="width: 80px; height: 80px;position: relative;border: 1px solid black; margin-top: 15px;">
                    <p style="position: absolute; left: 30px; top: 35px;">फोटो</p>
                </div>
            </div>
            <div class="flexItems">
                <div class="flexgrow">
                    <div> ४) नाम (नेपालीमा ): <input type="text" style="width: 500px;"></div>
                    <div class="area ">
                        <div class="areaitem">

                            <div class="label"> ठेगाना </div>
                            <div class="value"></div>

                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                अंचल
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                जिल्ला
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                गा.बि.स../न.पा
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                न.वडा
                            </div>
                        </div>
                    </div>
                    <div class="area ">
                        <div class="areaitem">
                            <div class="label">
                                टोल
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                ब्लक न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                पो. ब.न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                घर न
                            </div>
                            <div class="value"></div>
                        </div>
                    </div>

                    <div class="area ">
                        <div class="areaitem">
                            <div class="label">
                                फोन न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                मोबाइलन न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                फ्याक्स न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                इमेलठेगाना
                            </div>
                            <div class="value"></div>
                        </div>
                    </div>
                </div>
                <div type="text"
                    style="width: 80px; height: 80px;position: relative;border: 1px solid black; margin-top: 15px;">
                    <p style="position: absolute; left: 30px; top: 35px;">फोटो</p>
                </div>
            </div>
            <div class="flexItems">
                <div class="flexgrow">
                    <div> ५) नाम (नेपालीमा ): <input type="text" style="width:500px"></div>
                    <div class="area ">
                        <div class="areaitem">

                            <div class="label"> ठेगाना </div>
                            <div class="value"></div>
                        </div>

                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                अंचल
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                जिल्ला
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                गा.बि.स../न.पा
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                न.वडा
                            </div>
                        </div>
                    </div>
                    <div class="area ">
                        <div class="areaitem">
                            <div class="label">
                                टोल
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                ब्लक न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                पो. ब.न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                घर न
                            </div>
                            <div class="value"></div>
                        </div>
                    </div>

                    <div class="area ">
                        <div class="areaitem">
                            <div class="label">
                                फोन न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                मोबाइलन न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                फ्याक्स न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                इमेलठेगाना
                            </div>
                            <div class="value"></div>
                        </div>
                    </div>
                </div>
                <div type="text"
                    style="width: 80px; height: 80px; position: relative;border: 1px solid black; margin-top: 15px;">
                    <p style="position: absolute; left: 30px; top: 35px;">फोटो</p>
                </div>
            </div>
            <div class="flexItems">
                <div class="flexgrow">
                    <div> ६) नाम (नेपालीमा ): <input type="text" style="width: 500px;"></div>
                    <div class="area ">
                        <div class="areaitem">

                            <div class="label"> ठेगाना </div>
                            <div class="value"></div>

                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                अंचल
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                जिल्ला
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                गा.बि.स../न.पा
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                न.वडा
                            </div>
                        </div>
                    </div>
                    <div class="area ">
                        <div class="areaitem">
                            <div class="label">
                                टोल
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                ब्लक न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                पो. ब.न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                घर न
                            </div>
                            <div class="value"></div>
                        </div>
                    </div>

                    <div class="area ">
                        <div class="areaitem">
                            <div class="label">
                                फोन न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                मोबाइलन न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                फ्याक्स न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                इमेलठेगाना
                            </div>
                            <div class="value"></div>
                        </div>
                    </div>
                </div>
                <div type="text"
                    style="width: 80px; height: 80px;position: relative;border: 1px solid black; margin-top: 15px;">
                    <p style="position: absolute; left: 30px; top: 35px;">फोटो</p>
                </div>
            </div>
            <div class="flexItems">
                <div class="flexgrow">
                    <div> ७) नाम (नेपालीमा ): <input type="text" style="width:500px"></div>
                    <div class="area ">
                        <div class="areaitem">

                            <div class="label"> ठेगाना </div>
                            <div class="value"></div>

                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                अंचल
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                जिल्ला
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                गा.बि.स../न.पा
                            </div>
                        </div>
                        <div class="areaitem">
                            <div class="value"></div>
                            <div class="label">
                                न.वडा
                            </div>
                        </div>
                    </div>
                    <div class="area ">
                        <div class="areaitem">
                            <div class="label">
                                टोल
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                ब्लक न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                पो. ब.न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                घर न
                            </div>
                            <div class="value"></div>
                        </div>
                    </div>

                    <div class="area ">
                        <div class="areaitem">
                            <div class="label">
                                फोन न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                मोबाइलन न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                फ्याक्स न.
                            </div>
                            <div class="value"></div>
                        </div>
                        <div class="areaitem">
                            <div class="label">
                                इमेलठेगाना
                            </div>
                            <div class="value"></div>
                        </div>
                    </div>
                </div>
                <div type="text"
                    style="width: 80px; height: 80px;position: relative;border: 1px solid black; margin-top: 15px;">
                    <p style="position: absolute; left: 30px; top: 35px;">फोटो</p>
                </div>
            </div>


            <p
                style="font-weight: bold; text-align: center; font-size: 20px; border-top: 3px solid black; width: 100%;margin-top: 5px;">
                संस्थागत ग्राहकहरुले अनिवार्य रुपमा बुझाउनु
                पर्ने कागजातहरु
            </p>
            <p> <span style="font-size: 20px;font-weight: bold;">.</span> संचालक समितिका सदस्य / प्रमुख पदाधिकारीहरु
                /कार्य समितिका सदस्य / साझेदारहरुको फोटो</p>
            <p><span style="font-size: 20px;font-weight: bold;">.</span> संस्थापन र गठन सम्बन्धी प्रमाण-पत्र तथा
                प्रबन्ध-पत्र नियमावलीको प्रतिलिपि</p>
            <p><span style="font-size: 20px;font-weight: bold;">.</span> बिधान <span
                    style="font-size: 20px;font-weight: bold;">.</span>कबुलियतनामा <span
                    style="font-size: 20px;font-weight: bold;">.</span>दर्ता प्रमाण-पत्रको प्रतिलिपि </p>
            <p><span style="font-size: 20px;font-weight: bold;">.</span> बोर्ड / संचालक समिति /व्यवस्थापन समितिको निर्णय
                र कारोबार सम्बन्धी अख्तियारी</p>
            <p><span style="font-size: 20px;font-weight: bold;">.</span> संचालक समितिका ७ जना भन्दा बढी भएमा छुट्टै
                कागजमा निजहरुको नाम,थर र ठेगाना उपलब्ध गराउनु पर्नेछ |
            </p>
            <p
                style="text-align: center; font-size: 20px; border-top: 3px solid black; width: 100%;padding-bottom: 10px;">
                For Office Use Only
            </p>
            <div class="convert" style="display: flex;">
                <div class="branch" style="margin-left: 45%; margin-top: auto;">
                    <p style="font-size: 18px;">Branch Code: </p>
                </div>
                <div class="issue" style="margin-left: 25%;">
                    <p style="font-size: 18px;">Issue Date:</p>
                </div>
            </div>
            <div class="line" style="display: flex; justify-content: space-between;">
                <div class="line1" style="border-bottom: 2px solid black; width: 180px;padding-top: 10px;">

                </div>
                <div class="line2" style="border-bottom: 2px solid black; width: 180px;padding-top: 10px;">

                </div>
            </div>

        </div>
    </div>
</body>
           
@endsection
