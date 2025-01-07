@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Nurse Screening Form</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('nurse-screening-form.index') }}" class="breadcrumb-item">Nurse Screening Form</a>
                    <span class="breadcrumb-item active">Add</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <style>
        .alert {
            padding-top: 2px;
            padding-bottom: 2px;
        }
    </style>
    <div class="card">
        <form method="POST" action="{{ route('nurse-screening-form.store') }}" class="wizard-form steps-validation"
            enctype="multipart/form-data" data-fouc id="global_form_submitted">
            @csrf
            <h6>User Verification</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Select Campaign <code>*</code> <span class="text-info">* Please select
                                    campaign to get users list.</span></label>
                            <select name="campaign" class="form-control select-search" id="campaigns_select" required>
                                <option value="" selected disabled>---Select Campaign---</option>
                                @foreach ($campaign as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Users <code>*</code></label>
                            <select name="users" id="users_select" class="form-control select-search" required>
                                <option value="" selected disabled>---Select User---</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row" id="user_verification">
                    <input type="hidden" name="campaign_user_id" id="campaign_user_id">
                    <input type="hidden" name="register_campaign_user_id" id="register_campaign_user_id">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Name <code>*</code></label>
                            <input type="text" id="name" class="form-control" name="name" required readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Phone <code>*</code></label>
                            <input type="number" id="phone" class="form-control" name="phone" required readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Email </label>
                            <input type="email" id="email" class="form-control" name="email" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Address <code>*</code></label>
                            <input type="text" id="address" class="form-control" name="address" required readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Gender <code>*</code></label>
                            <input type="text" id="gender" class="form-control" name="gender" required readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">DOB <code>*</code></label>
                            <input type="date" id="dob" class="form-control" name="dob" required readonly>
                        </div>
                    </div>
                </div>
            </fieldset>

            <h6>1. Past Medical History</h6>
            <fieldset>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Past Illness</label>
                            <select name="past_illness" class="form-control">
                                <option value="">select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @error('past_illness')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Comment</label>
                            <input type="text" class="form-control past_illness_comment" name="past_illness_comment">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Hospitalization</label>
                            <select name="hospitalization" class="form-control">
                                <option value="">select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @error('hospitalization')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Comment</label>
                            <input type="text" class="form-control" name="hospitalization_comment">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Injuries Or Accident</label>
                            <select name="injuries_accident" class="form-control">
                                <option value="">select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @error('injuries_accident')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Comment</label>
                            <input type="text" class="form-control" name="injuries_accident_comment">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Surgeries</label>
                            <select name="surgeries" class="form-control">
                                <option value="">select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @error('surgeries')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Comment</label>
                            <input type="text" class="form-control" name="surgeries_comment">
                        </div>
                    </div>
                </div>
            </fieldset>
            <h6>2. Physical Examination</h6>
            <fieldset>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Temperature</label>
                            <input type="text" class="form-control" name="temperature"
                                value="{{ old('temperature') }}" placeholder="in F">
                            @error('temperature')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Pulse</label>
                            <input type="text" class="form-control" name="pulse" value="{{ old('pulse') }}"
                                placeholder="in BPM">
                            @error('pulse')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Resp</label>
                            <input type="text" class="form-control" name="resp" value="{{ old('resp') }}"
                                placeholder="in BPM">
                            @error('resp')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Spo2</label>
                            <input type="text" class="form-control" name="spo2" value="{{ old('spo2') }}">
                            @error('spo2')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Blood Pressure</label>
                            <input type="text" class="form-control" name="bp" value="{{ old('bp') }}"
                                placeholder="in mm Hg">
                            @error('bp')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">MUAC</label>
                            <input type="text" class="form-control" name="muac" value="{{ old('muac') }}"
                                placeholder="in cm">
                            @error('muac')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </fieldset>
            <h6>3. General Condition</h6>
            <fieldset>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Height</label>
                            <input type="text" class="form-control" name="height" value="{{ old('height') }}"
                                placeholder="in cm">
                            @error('height')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Weight</label>
                            <input type="text" class="form-control" name="weight" value="{{ old('weight') }}"
                                placeholder="in KG">
                            @error('weight')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </fieldset>
            <h6>4. Allergies</h6>
            <fieldset>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Environmental Factor</label>
                            <select name="environmental_factor" class="form-control">
                                <option value="">select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @error('environmental_factor')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Comment</label>
                            <input type="text" class="form-control" name="environmental_factor_comment">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Foods</label>
                            <select name="food_allergie" class="form-control">
                                <option value="">select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @error('food_allergie')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Comment</label>
                            <input type="text" class="form-control" name="food_allergie_comment">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Durg Allergie</label>
                            <select name="durg_allergie" class="form-control">
                                <option value="">select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @error('durg_allergie')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Comment</label>
                            <input type="text" class="form-control" name="durg_allergie_comment">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Insect Sting Allergie</label>
                            <select name="insect_allergie" class="form-control">
                                <option value="">select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @error('insect_allergie')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Comment</label>
                            <input type="text" class="form-control" name="insect_allergie_comment">
                        </div>
                    </div>
                </div>
            </fieldset>
            <h6>History</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="drug_history">Drug History</label>
                            <select name="drug_history" class="form-control">
                                <option value="">select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @error('drug_history')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Comment</label>
                            <input type="text" class="form-control" name="drug_history_comment">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="mentural_history">Menstural History</label>
                            <select name="mentural_history" class="form-control">
                                <option value="">select</option>
                                <option value="Regular">Regular</option>
                                <option value="Irregular">Irregular</option>
                                <option value="None">None</option>
                            </select>
                            @error('mentural_history')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Comment</label>
                            <input type="text" class="form-control" name="mentural_history_comment">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="family_history">Family History</label>
                            <select name="family_history" class="form-control">
                                <option value="">select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @error('family_history')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="family_history_details">Family History Details</label>
                            <textarea name="family_history_details" class="summernote" cols="30" rows="10">{{ old('family_history_details') }}</textarea>
                            @error('family_history_details')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </fieldset>
            <h6>Yes No Question</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="childhood_disease">Childhood Disease /Auto Immune Disease</label>
                            <select name="childhood_disease" class="form-control">
                                <option value="">select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @error('childhood_disease')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Comment</label>
                            <input type="text" class="form-control" name="childhood_disease_comment">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Immunization</label>
                            <select name="immunization[]" class="form-control select" multiple="multiple" required>
                                <option value="">select</option>
                                <option value="BCD/Measles,Rubella/JE">BCD/Measles,Rubella/JE</option>
                                <option value="Typhoid/Influenza">Typhoid/Influenza</option>
                                <option value="Covid-19">Covid-19</option>
                                <option value="None">None</option>
                            </select>
                            @error('immunization')
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
@endsection

@section('custom-script')
    <script src="{{ asset('global_assets/form_wizard/js/form_wizard.js') }}"></script>
    <script src="{{ asset('global_assets/form_wizard/js/steps.min.js') }}"></script>
    <script src="{{ asset('global_assets/form_wizard/js/validate.min.js') }}"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#selectedImage').attr('src', e.target.result);
                    $('#selectedImage').css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#selectedImage').change(function() {
            readURL(this);
        })
    </script>
    <!-- Summernote -->
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote()
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#campaigns_select').change(function() {
                let campaign = $(this).val();
                $.ajax({
                    url: '{{ route('campaign.userList') }}',
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        data: campaign
                    },
                    success: function(response) {
                        $('#users_select').empty();
                        $('#users_select').append(
                            '<option value="" selected disabled>---Select User---</option>');
                        $.each(response, function(index, option) {
                            $('#users_select').append(
                                `<option value="${option.campaign_user_id}" ${option.nurse !== null ? 'disabled' : ''}>${option.campaignuser.name} (${option.campaignuser.phone})</option>`
                                );
                        });
                    }
                })
            })

            $('#users_select').change(function() {
                let user = $(this).val();
                let campaign = $('#campaigns_select').val();
                $.ajax({
                    url: '{{ route('campaign.getProfile') }}',
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        user: user,
                        campaign: campaign
                    },
                    success: function(response) {
                        $('#register_campaign_user_id').val(response.id);
                        $('#campaign_user_id').val(response.campaignuser.id);
                        $('#name').val(response.campaignuser.name);
                        $('#phone').val(response.campaignuser.phone);
                        $('#email').val(response.campaignuser.email);
                        $('#address').val(response.campaignuser.address);
                        $('#gender').val(response.campaignuser.gender);
                        $('#dob').val(response.campaignuser.dob);
                        $('#address').val(response.campaignuser.address);
                    }
                })
            });

            $('#users_select').select2({
                templateResult: function(option) {
                    // check if the option is disabled and add an icon if it is
                    if (option.disabled && !option.selected) {
                        return $('<span >' + option.text +
                            ' <i class="icon-checkmark text-success"></i> </span>');
                    } else {
                        return option.text;
                    }
                }
            })
        })
    </script>
@endsection
