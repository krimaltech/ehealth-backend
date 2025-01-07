@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">

                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Global Form </span></h4>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    {{-- @cannot('Doctor')
                    <a href="{{ route('kyc.index') }}" class="breadcrumb-item">Know Your Customer</a>
                    @endcan
                    @can('Doctor')
                    <a href="{{ route('kyc.index') }}" class="breadcrumb-item">Know Your Doctor</a>
                    @endcan --}}
                    <span class="breadcrumb-item active">Update</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    {{-- <link rel="stylesheet" href="{{asset('global_assets/leaflet/leaflet.css')}}" /> --}}

    <style>
        .alert {
            padding-top: 2px;
            padding-bottom: 2px;
        }



        .fileinput-upload {
            display: none;
        }
    </style>


    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('kyc.update') }}" class="form-horizontal wizard-form steps-validation"
                enctype="multipart/form-data" data-fouc id="global_form_submitted">
                @csrf
                @method('PATCH')

                <h6>Personal Info</h6>
                <fieldset>
                    {{-- <input type="checkbox" name="test_check" id="test_check"> CHeck --}}
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">First Name <code>*</code></label>
                                <input type="text" name="first_name" id="first_name"
                                    value="{{ old('first_name') ?? $kyc->first_name }}" class="form-control" required>
                                @error('first_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Middle Name </label>
                                <input type="text" name="middle_name"
                                    value="{{ old('middle_name') ?? $kyc->middle_name }}" id="middle_name"
                                    class="form-control">
                                @error('middle_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Last Name <code>*</code> </label>
                                <input type="text" name="last_name" value="{{ old('last_name') ?? $kyc->last_name }}"
                                    id="last_name" class="form-control" required>
                                @error('last_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label">Salutation <code>*</code></div>
                                <select name="salutation" class="form-control">
                                    <option value="Mr." @if ($kyc->salutation == 'Mr.') selected @endif>Mr.</option>
                                    <option value="Mrs." @if ($kyc->salutation == 'Mrs.') selected @endif>Mrs.</option>
                                    <option value="Ms" @if ($kyc->salutation == 'Ms') selected @endif>Ms</option>
                                </select>
                                @error('salutation')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label">Gender <code>*</code></div>
                                <select name="gender" class="form-control">
                                    <option value="Male" @if ($kyc->gender == 'Male') selected @endif>Male</option>
                                    <option value="Female" @if ($kyc->gender == 'Female') selected @endif>Female</option>
                                    <option value="Others" @if ($kyc->gender == 'Others') selected @endif>Others</option>
                                </select>
                                @error('gender')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label">Country <code>*</code></div>
                                <select name="country" class="form-control">
                                    <option value="Nepal" @if ($kyc->country == 'Nepal') selected @endif>Nepal</option>
                                    <option value="India" @if ($kyc->country == 'India') selected @endif>India</option>
                                    <option value="America" @if ($kyc->country == 'America') selected @endif>America
                                    </option>
                                    <option value="China" @if ($kyc->country == 'China') selected @endif>China</option>
                                </select>
                                @error('country')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Nationality <code>*</code> </label>
                                <input type="text" name="nationality"
                                    value="{{ old('nationality') ?? $kyc->nationality }}" id="nationality"
                                    class="form-control" required>
                                @error('nationality')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Date of Birth <code>*</code> </label>
                                <input type="date" name="birth_date" value="{{ old('birth_date') ?? $kyc->birth_date }}"
                                    id="birth_date" class="form-control" required>
                                @error('birth_date')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Mobile Number <code>*</code> </label>
                                <input type="text" pattern="[987][0-9]{9}" name="mobile_number"
                                    value="{{ old('mobile_number') ?? $kyc->mobile_number }}" id="mobile_number"
                                    class="form-control" required>
                                @error('mobile_no')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Email <code>*</code> </label>
                                <input type="email" name="email" value="{{ old('email') ?? $kyc->email }}"
                                    id="email" class="form-control" required>
                                @error('email')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Education <code>*</code> </label>
                                <input type="text" name="education" value="{{ old('education') ?? $kyc->education }}"
                                    id="education" class="form-control" required>
                                @error('education')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label">Identification Type <code>*</code></div>
                                <select name="identification_type" class="form-control" required>
                                    <option value="Citizenship" @if ($kyc->identification_type == 'Citizenship') selected @endif>
                                        Citizenship</option>
                                    <option value="Passport" @if ($kyc->identification_type == 'Passport') selected @endif>Passport
                                    </option>
                                    <option value="Driving License" @if ($kyc->identification_type == 'Driving License') selected @endif>
                                        Driving License</option>
                                    <option value="Voter Card" @if ($kyc->identification_type == 'Voter Card') selected @endif>Voter
                                        Card</option>
                                    <option value="National Identity Card"
                                        @if ($kyc->identification_type == 'National Identity Card ') selected @endif>National Identity Card </option>
                                    <option value="Birth Certificate"
                                        @if ($kyc->identification_type == 'Birth Certificate') selected @endif>Birth Certificate</option>
                                    <option value="Non-Resident Nepali Identity Card"
                                        @if ($kyc->identification_type == 'Non-Resident Nepali Identity Card') selected @endif>Non-Resident Nepali Identity
                                        Card</option>
                                    <option value="Other" @if ($kyc->identification_type == 'Other') selected @endif>Other
                                    </option>
                                    @error('identification_type')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Identification No: <code>*</code> </label>
                                <input type="text" name="identification_no"
                                    value="{{ old('identification_no') ?? $kyc->identification_no }}"
                                    id="identification_no" class="form-control" required>
                                @error('identification_no')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Citizenship Issued Date: <code>*</code> </label>
                                <input type="date" name="citizenship_date"
                                    value="{{ old('citizenship_date') ?? $kyc->citizenship_date }}" id="citizenship_date"
                                    class="form-control" required>
                                @error('citizenship_date')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Citizenship Issued District: <code>*</code> </label>
                                <input type="text" name="citizenship_issue_district"
                                    value="{{ old('citizenship_issue_district') ?? $kyc->citizenship_issue_district }}"
                                    id="citizenship_issue_district" class="form-control" required>
                                @error('citizenship_issue_district')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Latitude<code>*</code> </label>
                                <input type="number" step="0.*" name="latitude"
                                    value="{{ old('latitude') ?? $kyc->latitude }}" id="latitude" class="form-control"
                                    required>
                                @error('latitude')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Longitude<code>*</code> </label>
                                <input type="number" step="0.*" name="longitude"
                                    value="{{ old('longitude') ?? $kyc->longitude }}" id="longitude"
                                    class="form-control" required>
                                @error('longitude')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <style>
                                #map {
                                    height: 400px;
                                    z-index: 0;
                                }
                            </style>
                            <div id="map"></div>
                        </div>
                    </div><br />

                </fieldset>

                <h6>Address Info</h6>

                <fieldset>
                    <h5>Permanent Address:</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Province <code>*</code></label>
                                <select class="custom-select" name="perm_province_id" id="perm_province_id" required>
                                    <option value="" disabled selected>Choose Province</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}"
                                            @if ($province->id == $kyc->perm_province_id) selected @endif>
                                            {{ $province->english_name }}</option>
                                    @endforeach
                                </select>
                                @error('perm_province_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">District <code>*</code></label>
                                <select class="custom-select" name="perm_district_id" id="perm_district_id" required>
                                    @foreach ($perm_districts as $district)
                                        <option value="{{ $district->id }}"
                                            @if ($district->id == $kyc->perm_district_id) selected @endif>
                                            {{ $district->english_name }}</option>
                                    @endforeach
                                </select>
                                @error('perm_district_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">VDC/Municipality <code>*</code></label>
                                <select class="custom-select" name="perm_municipality_id" id="perm_municipality_id"
                                    required>
                                    @foreach ($perm_municipalities as $municipality)
                                        <option value="{{ $municipality->id }}"
                                            @if ($municipality->id == $kyc->perm_municipality_id) selected @endif>
                                            {{ $municipality->english_name }}</option>
                                    @endforeach

                                </select>
                                @error('perm_municipality_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Ward No <code>*</code></label>
                                <select class="custom-select" name="perm_ward_id" id="perm_ward_id" required>
                                    @foreach ($perm_wards as $ward)
                                        <option value="{{ $ward->id }}"
                                            @if ($ward->id == $kyc->perm_ward_id) selected @endif>{{ $ward->ward_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('perm_ward_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Street <code>*</code> </label>
                                <input type="text" name="perm_location"
                                    value="{{ old('perm_location') ?? $kyc->perm_location }}" id="perm_location"
                                    class="form-control" required>
                                @error('perm_location')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">House No: <code>*</code> </label>
                                <input type="text" name="perm_house_number"
                                    value="{{ old('perm_house_number') ?? $kyc->perm_house_number }}"
                                    id="perm_house_number" class="form-control" required>
                                @error('perm_house_number')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <h5>Temporary Address:</h5>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Province <code>*</code></label>
                                <select class="custom-select" name="temp_province_id" id="temp_province_id" required>
                                    <option value="" disabled selected>Choose Province</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}"
                                            @if ($province->id == $kyc->temp_province_id) selected @endif>
                                            {{ $province->english_name }}</option>
                                    @endforeach
                                </select>
                                @error('temp_province_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">District <code>*</code></label>
                                <select class="custom-select" name="temp_district_id" id="temp_district_id" required>
                                    @foreach ($temp_districts as $district)
                                        <option value="{{ $district->id }}"
                                            @if ($district->id == $kyc->temp_district_id) selected @endif>
                                            {{ $district->english_name }}</option>
                                    @endforeach
                                </select>
                                @error('temp_district_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">VDC/Municipality <code>*</code></label>
                                <select class="custom-select" name="temp_municipality_id" id="temp_municipality_id"
                                    required>
                                    @foreach ($temp_municipalities as $municipality)
                                        <option value="{{ $municipality->id }}"
                                            @if ($municipality->id == $kyc->temp_municipality_id) selected @endif>
                                            {{ $municipality->english_name }}</option>
                                    @endforeach
                                </select>
                                @error('temp_municipality_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Ward No <code>*</code></label>
                                <select class="custom-select" name="temp_ward_id" id="temp_ward_id" required>
                                    @foreach ($temp_wards as $ward)
                                        <option value="{{ $ward->id }}"
                                            @if ($ward->id == $kyc->temp_ward_id) selected @endif>{{ $ward->ward_name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('temp_ward_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Street <code>*</code> </label>
                                <input type="text" name="temp_location"
                                    value="{{ old('temp_location') ?? $kyc->temp_location }}" id="temp_location"
                                    class="form-control" required>
                                @error('temp_location')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">House No: <code>*</code> </label>
                                <input type="text" name="temp_house_number"
                                    value="{{ old('temp_house_number') ?? $kyc->temp_house_number }}"
                                    id="temp_house_number" class="form-control" required>
                                @error('temp_house_number')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </fieldset>

                <h6>Family Info</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Father Name <code>*</code></label>
                                <input type="text" name="father_full_name"
                                    value="{{ old('father_full_name') ?? $kyc->father_full_name }}" class="form-control"
                                    required>
                                @error('father_full_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Mother Name <code>*</code> </label>
                                <input type="text" name="mother_full_name"
                                    value="{{ old('mother_full_name') ?? $kyc->mother_full_name }}" id="mother_full_name"
                                    class="form-control" required>
                                @error('mother_full_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Grand Father Name <code>*</code> </label>
                                <input type="text" name="grandfather_full_name"
                                    value="{{ old('grandfather_full_name') ?? $kyc->grandfather_full_name }}"
                                    id="grandfather_full_name" class="form-control" required>
                                @error('grandfather_full_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Grand Mother Name <code>*</code> </label>
                                <input type="text" name="grandmother_full_name"
                                    value="{{ old('grandmother_full_name') ?? $kyc->grandmother_full_name }}"
                                    id="grandmother_full_name" class="form-control" required>
                                @error('grandmother_full_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="form-label">Maritual Status <code>*</code></div>
                                <select name="marital_status" class="form-control">
                                    <option value="Unmarried" @if ($kyc->marital_status == 'Unmarried') selected @endif>Unmarried
                                    </option>
                                    <option value="Married" @if ($kyc->marital_status == 'Married') selected @endif>Married
                                    </option>
                                    <option value="Widow" @if ($kyc->marital_status == 'Widow') selected @endif>Widow
                                    </option>
                                </select>
                                @error('marital_status')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Wife/Husband Name </label>
                                <input type="text" name="husband_wife_full_name"
                                    value="{{ old('husband_wife_full_name') ?? $kyc->husband_wife_full_name }}"
                                    id="husband_wife_full_name" class="form-control">
                                @error('husband_wife_full_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                    </div>
                </fieldset>

                <h6>Occupation Info</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Work Status <code>*</code></label>
                                <input type="text" name="work_status"
                                    value="{{ old('work_status') ?? $kyc->work_status }}" class="form-control" required>
                                @error('work_status')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Occupation <code>*</code> </label>
                                <select name="occupation" class="form-control">
                                    <option value="Student" @if ($kyc->occupation == 'Student') selected @endif>Student
                                    </option>
                                    <option value="Self Employed" @if ($kyc->occupation == 'Self Employed') selected @endif>Self Employed
                                    </option>
                                    <option value="Salary" @if ($kyc->occupation == 'Salary') selected @endif>Salary
                                    </option>
                                    <option value="Other" @if ($kyc->occupation == 'Other') selected @endif>Other
                                    </option>
                                </select>
                                @error('occupation')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Designation <code>*</code> </label>
                                <input type="text" name="designation"
                                    value="{{ old('designation') ?? $kyc->designation }}" id="designation"
                                    class="form-control" required>
                                @error('designation')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Source of Income <code>*</code> </label>
                                <input type="text" name="source_of_income"
                                    value="{{ old('source_of_income') ?? $kyc->source_of_income }}" id="source_of_income"
                                    class="form-control" required>
                                @error('source_of_income')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Annual Income (Rs.) <code>*</code> </label>
                                <input type="number" step="0.01" min="0" name="annual_income"
                                    value="{{ old('annual_income') ?? $kyc->annual_income }}" id="annual_income"
                                    class="form-control" required>
                                @error('annual_income')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">PAN No. <code>*</code> </label>
                                <input type="number" min="0" name="pan_number"
                                    value="{{ old('pan_number') ?? $kyc->pan_number }}" id="pan_number"
                                    class="form-control" required>
                                @error('pan_number')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Organization Name <code>*</code> </label>
                                <input type="text" name="organization_name"
                                    value="{{ old('organization_name') ?? $kyc->organization_name }}"
                                    id="organization_name" class="form-control" required>
                                @error('organization_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Organization Address <code>*</code> </label>
                                <input type="text" name="organization_address"
                                    value="{{ old('organization_address') ?? $kyc->organization_address }}"
                                    id="organization_address" class="form-control" required>
                                @error('organization_address')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Organization Phone Number <code>*</code> </label>
                                <input type="number" min="0" name="organization_number"
                                    value="{{ old('organization_number') ?? $kyc->organization_number }}"
                                    id="organization_number" class="form-control" required>
                                @error('organization_number')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>



                    </div>
                </fieldset>

                <h6>Transaction Info</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Account Branch <code>*</code></label>
                                <input type="text" name="account_branch" id="account_branch"
                                    value="{{ old('account_branch') ?? $kyc->account_branch }}" class="form-control"
                                    required>
                                @error('account_branch')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Purpose of Account <code>*</code> </label>
                                <input type="text" name="account_purpose"
                                    value="{{ old('account_purpose') ?? $kyc->account_purpose }}" id="account_purpose"
                                    class="form-control" required>
                                @error('account_purpose')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Currency Type<code>*</code> </label>
                                <input type="text" name="currency" value="{{ old('currency') ?? $kyc->currency }}"
                                    id="currency" class="form-control" required>
                                @error('currency')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Maximum Amount per Transaction (Rs.)<code>*</code> </label>
                                <input type="number" min="0" step="0.01" name="max_amount_per_tansaction"
                                    value="{{ old('max_amount_per_tansaction') ?? $kyc->max_amount_per_tansaction }}"
                                    id="max_amount_per_tansaction" class="form-control" required>
                                @error('max_amount_per_tansaction')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Number of Monthly Transaction <code>*</code> </label>
                                <input type="number" min="0" name="number_of_monthly_transaction"
                                    value="{{ old('number_of_monthly_transaction') ?? $kyc->number_of_monthly_transaction }}"
                                    id="number_of_monthly_transaction" class="form-control" required>
                                @error('number_of_monthly_transaction')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Monthly Amount of Transaction (Rs.) <code>*</code> </label>
                                <input type="number" step="0.01" min="0" name="monthly_amount_of_transaction"
                                    value="{{ old('monthly_amount_of_transaction') ?? $kyc->monthly_amount_of_transaction }}"
                                    id="monthly_amount_of_transaction" class="form-control" required>
                                @error('monthly_amount_of_transaction')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Number of Yearly Transaction <code>*</code> </label>
                                <input type="number" min="0" name="number_of_yearly_transaction"
                                    value="{{ old('number_of_yearly_transaction') ?? $kyc->number_of_yearly_transaction }}"
                                    id="number_of_yearly_transaction" class="form-control" required>
                                @error('number_of_yearly_transaction')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Yearly Amount of Transaction (Rs.) <code>*</code> </label>
                                <input type="number" step="0.01" min="0" name="yearly_amount_of_transaction"
                                    value="{{ old('yearly_amount_of_transaction') ?? $kyc->yearly_amount_of_transaction }}"
                                    id="yearly_amount_of_transaction" class="form-control" required>
                                @error('yearly_amount_of_transaction')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </fieldset>

                <h6>Nominee Info</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Nominee &nbsp; <input type="checkbox" name="is_nominee"
                                        id="is_nominee" @if ($kyc->nominee_name != null) checked @endif></label>


                            </div>
                        </div>
                    </div>

                    <div class="row" id="nominee_control"
                        @if ($kyc->nominee_name == null) style="display: none;" @endif>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Name <code>*</code> </label>
                                <input type="text" name="nominee_name"
                                    value="{{ old('nominee_name') ?? $kyc->nominee_name }}" id="nominee_name"
                                    class="form-control">
                                @error('nominee_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Father Name <code>*</code> </label>
                                <input type="text" name="nominee_father_name"
                                    value="{{ old('nominee_father_name') ?? $kyc->nominee_father_name }}"
                                    id="nominee_father_name" class="form-control">
                                @error('nominee_father_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Grand Father Name <code>*</code> </label>
                                <input type="text" name="nominee_grandfather_name"
                                    value="{{ old('nominee_grandfather_name') ?? $kyc->nominee_grandfather_name }}"
                                    id="nominee_grandfather_name" class="form-control">
                                @error('nominee_grandfather_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Relation <code>*</code> </label>
                                <input type="text" name="nominee_relation"
                                    value="{{ old('nominee_relation') ?? $kyc->nominee_relation }}" id="nominee_relation"
                                    class="form-control">
                                @error('nominee_relation')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Citizenship Issued Place <code>*</code> </label>
                                <input type="text" name="nominee_citizenship_issued_place"
                                    value="{{ old('nominee_citizenship_issued_place') ?? $kyc->nominee_citizenship_issued_place }}"
                                    id="nominee_citizenship_issued_place" class="form-control">
                                @error('nominee_citizenship_issued_place')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Citizenship Number <code>*</code> </label>
                                <input type="text" name="nominee_citizenship_number"
                                    value="{{ old('nominee_citizenship_number') ?? $kyc->nominee_citizenship_number }}"
                                    id="nominee_citizenship_number" class="form-control">
                                @error('nominee_citizenship_number')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Citizenship Issued Date <code>*</code> </label>
                                <input type="date" name="nominee_citizenship_issued_date"
                                    value="{{ old('nominee_citizenship_issued_date') ?? $kyc->nominee_citizenship_issued_date }}"
                                    id="nominee_citizenship_issued_date" class="form-control">
                                @error('nominee_citizenship_issued_date')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Date of Birth<code>*</code> </label>
                                <input type="date" name="nominee_birthdate"
                                    value="{{ old('nominee_birthdate') ?? $kyc->nominee_birthdate }}"
                                    id="nominee_birthdate" class="form-control">
                                @error('nominee_birthdate')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Permanent Address<code>*</code> </label>
                                <input type="text" name="nominee_permanent_address"
                                    value="{{ old('nominee_permanent_address') ?? $kyc->nominee_permanent_address }}"
                                    id="nominee_permanent_address" class="form-control">
                                @error('nominee_permanent_address')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Current Address<code>*</code> </label>
                                <input type="text" name="nominee_current_address"
                                    value="{{ old('nominee_current_address') ?? $kyc->nominee_current_address }}"
                                    id="nominee_current_address" class="form-control">
                                @error('nominee_current_address')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Phone Number<code>*</code> </label>
                                <input type="text" pattern="[789][0-9]{9}" name="nominee_phone_number"
                                    value="{{ old('nominee_phone_number') ?? $kyc->nominee_phone_number }}"
                                    id="nominee_phone_number" class="form-control">
                                @error('nominee_phone_number')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </fieldset>

                <h6>Beneficiary Info</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Beneficiary &nbsp; <input type="checkbox" name="is_beneficiary"
                                        id="is_beneficiary" @if ($kyc->beneficiary_name != null) checked @endif></label>


                            </div>
                        </div>
                    </div>

                    <div class="row" id="beneficiary_control"
                        @if ($kyc->beneficiary_name == null) style="display: none;" @endif>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Name <code>*</code> </label>
                                <input type="text" name="beneficiary_name"
                                    value="{{ old('beneficiary_name') ?? $kyc->beneficiary_name }}"
                                    id="beneficiary_name" class="form-control">
                                @error('beneficiary_name')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Address <code>*</code> </label>
                                <input type="text" name="beneficiary_address"
                                    value="{{ old('beneficiary_address') ?? $kyc->beneficiary_address }}"
                                    id="beneficiary_address" class="form-control">
                                @error('beneficiary_address')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Relation <code>*</code> </label>
                                <input type="text" name="beneficiary_relation"
                                    value="{{ old('beneficiary_relation') ?? $kyc->beneficiary_relation }}"
                                    id="beneficiary_relation" class="form-control">
                                @error('beneficiary_relation')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Phone Number<code>*</code> </label>
                                <input type="text" pattern="[789][0-9]{9}" name="beneficiary_contact_number"
                                    value="{{ old('beneficiary_contact_number') ?? $kyc->beneficiary_contact_number }}"
                                    id="beneficiary_contact_number" class="form-control">
                                @error('beneficiary_contact_number')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                    </div>
                </fieldset>

                <h6>Other Info</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Are You NRN ? &nbsp; <input type="checkbox" name="are_you_nrn"
                                        id="are_you_nrn" {{ $kyc->are_you_nrn == 1 ? 'checked' : '' }}></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Are You US Citizen ? &nbsp; <input type="checkbox"
                                        name="us_citizen" id="us_citizen"
                                        {{ $kyc->us_citizen == 1 ? 'checked' : '' }}></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Are You US Resident ? &nbsp; <input type="checkbox"
                                        name="us_residence" id="us_residence"
                                        {{ $kyc->us_residence == 1 ? 'checked' : '' }}></label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Have you been charged with criminal offense in Nepal or any other
                                    Country ? &nbsp; <input type="checkbox" name="criminal_offence" id="criminal_offence"
                                        {{ $kyc->criminal_offence == 1 ? 'checked' : '' }}></label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Did you hold US Permanent resident card (Green Card) ? &nbsp;
                                    <input type="checkbox" name="green_card" id="green_card"
                                        {{ $kyc->green_card == 1 ? 'checked' : '' }}></label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Do you have any account with other banks/Financial institution ?
                                    &nbsp; <input type="checkbox" name="account_in_other_banks"
                                        id="account_in_other_banks"
                                        {{ $kyc->account_in_other_banks == 1 ? 'checked' : '' }}></label>
                            </div>
                        </div>
                        {{-- //multiselect --}}

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Services Form <code>*</code></label><br />
                                <select name="service_form[]" class="form-control" multiple="multiple" required>
                                    @foreach (Helper::servicesform() as $service)
                                        <option value="{{ $service }}"
                                            @if (in_array($service, explode(',', $kyc->service_form))) selected @endif>{{ $service }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('service_form')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>


                </fieldset>

                <h6>Documents</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <img src="{{ $kyc->self_image_path }}" height="100px" width="auto"
                                    id="self_image_display">
                                <br />
                                <label class="form-label">Profile Picture <code>*</code> </label>
                                <input type="file" accept="image/*" name="self_image"
                                    value="{{ old('self_image') }}" id="self_image" class="form-control"
                                    onchange="selfImage(this);">
                                @error('self_image')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <img src="{{ $kyc->citizenship_front_path }}" height="100px" width="auto"
                                    id="citizenship_front_display">
                                <br /><label class="form-label">Citizenship Front <code>*</code> </label>
                                <input type="file" accept="image/*" name="citizenship_front"
                                    value="{{ old('citizenship_front') }}" id="citizenship_front" class="form-control"
                                    onchange="front(this);">

                                @error('citizenship_front')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <img src="{{ $kyc->citizenship_back_path }}" height="100px" width="auto"
                                    id="citizenship_back_display">
                                <br />
                                <label class="form-label">Citizenship Back <code>*</code> </label>
                                <input type="file" accept="image/*" name="citizenship_back"
                                    value="{{ old('citizenship_back') }}" id="citizenship_back" class="form-control"
                                    onchange="back(this);"><br />

                                @error('citizenship_back')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                </fieldset>
            </form>

        </div>


    </div>
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

    <script>
        function selfImage(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#self_image_display').attr('src', e.target.result);
                    $('#self_image_display').css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#self_image_display").change(function() {
            readURL(this);
        });
    </script>
    <script>
        function front(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#citizenship_front_display').attr('src', e.target.result);
                    $('#citizenship_front_display').css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#citizenship_front_display").change(function() {
            readURL(this);
        });
    </script>
    <script>
        function back(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#citizenship_back_display').attr('src', e.target.result);
                    $('#citizenship_back_display').css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#citizenship_back_display").change(function() {
            readURL(this);
        });
    </script>



    {{-- permanent addess --}}
    <script>
        $(document).ready(function() {
            $('#perm_province_id').on('change', function() {
                let id = $(this).val();
                $('#perm_district_id').empty();
                $('#perm_district_id').append('<option value="" disabled selected>Processing...</option>');
                var url = '{{ route('fetchdistrict', ':id') }}';
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        var response = JSON.parse(response);
                        // console.log(response);
                        $('#perm_district_id').empty();
                        $('#perm_district_id').append(
                            '<option value="" disabled selected>Choose District</option>');
                        response.forEach(element => {
                            // console.log(element);
                            $('#perm_district_id').append(
                                `<option value="${element['id']}">${element['english_name']}</option>`
                            );
                        });
                    }
                });
            });

            $('#perm_district_id').on('change', function() {
                let id = $(this).val();
                $('#perm_municipality_id').empty();
                $('#perm_municipality_id').append(
                    '<option value="" disabled selected>Processing...</option>');
                var url = '{{ route('fetchmun', ':id') }}';
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        var response = JSON.parse(response);
                        // console.log(response);
                        $('#perm_municipality_id').empty();
                        $('#perm_municipality_id').append(
                            '<option value="" disabled selected>Choose Municipality</option>'
                        );
                        response.forEach(element => {
                            $('#perm_municipality_id').append(
                                `<option value="${element['id']}">${element['english_name']}</option>`
                            );
                        });
                    }
                })
            });

            $('#perm_municipality_id').on('change', function() {
                let id = $(this).val();
                $('#perm_ward_id').empty();
                $('#perm_ward_id').append('<option value="" disabled selected>Processing...</option>');
                var url = '{{ route('fetchward', ':id') }}';
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        var response = JSON.parse(response);
                        console.log(response);
                        $('#perm_ward_id').empty();
                        $('#perm_ward_id').append(
                            '<option value="" disabled selected>Choose Ward</option>');
                        response.forEach(element => {
                            $('#perm_ward_id').append(
                                `<option value="${element['id']}">${element['ward_name']}</option>`
                            );
                        });
                    }
                })
            });
        });
    </script>

    {{-- temporary addess --}}
    <script>
        $(document).ready(function() {
            $('#temp_province_id').on('change', function() {
                let id = $(this).val();
                $('#temp_district_id').empty();
                $('#temp_district_id').append('<option value="" disabled selected>Processing...</option>');
                var url = '{{ route('fetchdistrict', ':id') }}';
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        var response = JSON.parse(response);
                        // console.log(response);
                        $('#temp_district_id').empty();
                        $('#temp_district_id').append(
                            '<option value="" disabled selected>Choose District</option>');
                        response.forEach(element => {
                            // console.log(element);
                            $('#temp_district_id').append(
                                `<option value="${element['id']}">${element['english_name']}</option>`
                            );
                        });
                    }
                });
            });

            $('#temp_district_id').on('change', function() {
                let id = $(this).val();
                $('#temp_municipality_id').empty();
                $('#temp_municipality_id').append(
                    '<option value="" disabled selected>Processing...</option>');
                var url = '{{ route('fetchmun', ':id') }}';
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        var response = JSON.parse(response);
                        // console.log(response);
                        $('#temp_municipality_id').empty();
                        $('#temp_municipality_id').append(
                            '<option value="" disabled selected>Choose Municipality</option>'
                        );
                        response.forEach(element => {
                            $('#temp_municipality_id').append(
                                `<option value="${element['id']}">${element['english_name']}</option>`
                            );
                        });
                    }
                })
            });

            $('#temp_municipality_id').on('change', function() {
                let id = $(this).val();
                $('#temp_ward_id').empty();
                $('#temp_ward_id').append('<option value="" disabled selected>Processing...</option>');
                var url = '{{ route('fetchward', ':id') }}';
                url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(response) {
                        var response = JSON.parse(response);
                        console.log(response);
                        $('#temp_ward_id').empty();
                        $('#temp_ward_id').append(
                            '<option value="" disabled selected>Choose Ward</option>');
                        response.forEach(element => {
                            $('#temp_ward_id').append(
                                `<option value="${element['id']}">${element['ward_name']}</option>`
                            );
                        });
                    }
                })
            });



            $('#is_nominee').click(function() {
                if ($('#is_nominee').is(':checked')) {
                    $("#nominee_control").css({
                        'display': "flex"
                    });
                    $("#nominee_name").prop("required", true);
                    $("#nominee_father_name").prop("required", true);
                    $("#nominee_grandfather_name").prop("required", true);
                    $("#nominee_relation").prop("required", true);
                    $("#nominee_citizenship_issued_place").prop("required", true);
                    $("#nominee_citizenship_number").prop("required", true);
                    $("#nominee_citizenship_issued_date").prop("required", true);
                    $("#nominee_birthdate").prop("required", true);
                    $("#nominee_permanent_address").prop("required", true);
                    $("#nominee_current_address").prop("required", true);
                    $("#nominee_phone_number").prop("required", true);
                } else {
                    $("#nominee_control").css({
                        'display': "none"
                    });
                    $("#nominee_name").prop("required", false);
                    $("#nominee_father_name").prop("required", false);
                    $("#nominee_grandfather_name").prop("required", false);
                    $("#nominee_relation").prop("required", false);
                    $("#nominee_citizenship_issued_place").prop("required", false);
                    $("#nominee_citizenship_number").prop("required", false);
                    $("#nominee_citizenship_issued_date").prop("required", false);
                    $("#nominee_birthdate").prop("required", false);
                    $("#nominee_permanent_address").prop("required", false);
                    $("#nominee_current_address").prop("required", false);
                    $("#nominee_phone_number").prop("required", false);
                }
            });

            $('#is_beneficiary').click(function() {

                if ($('#is_beneficiary').is(':checked')) {
                    $("#beneficiary_control").css({
                        'display': "flex"
                    });
                    $("#beneficiary_name").prop("required", true);
                    $("#beneficiary_address").prop("required", true);
                    $("#beneficiary_relation").prop("required", true);
                    $("#beneficiary_contact_number").prop("required", true);

                } else {
                    $("#beneficiary_control").css({
                        'display': "none"
                    });
                    $("#beneficiary_name").prop("required", false);
                    $("#beneficiary_address").prop("required", false);
                    $("#beneficiary_relation").prop("required", false);
                    $("#beneficiary_contact_number").prop("required", false);
                    s
                }
            });

        });
    </script>

    <script src="{{ asset('global_assets/form_wizard/js/steps.min.js') }}"></script>
    <script src="{{ asset('global_assets/form_wizard/js/validate.min.js') }}"></script>
    <script src="{{ asset('global_assets/form_wizard/js/form_wizard.js') }}"></script>
@endsection
