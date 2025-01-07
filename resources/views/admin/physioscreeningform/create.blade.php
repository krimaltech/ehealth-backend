@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Physiotherapist Screening
                        Form</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('physio-screening-form.index') }}" class="breadcrumb-item">Physiotherapist Screening
                        Form</a>
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
        <form method="POST" action="{{ route('physio-screening-form.store') }}" class="wizard-form steps-validation"
            enctype="multipart/form-data" data-fouc id="global_form_submitted">
            @csrf
            {{-- <h6>User Verification</h6>            
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Select Campaign <code>*</code>  <span class="text-info">* Please select campaign to get users list.</span></label>
                            <select name="campaign" class="form-control select-search" id="campaigns_select" required >
                                <option value="" selected disabled>---Select Campaign---</option>
                                @foreach ($campaign as $item)
                                    <option value="{{$item->id}}">{{$item->title}}</option>
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
                            <label for="">Email <code>*</code></label>
                            <input type="email" id="email" class="form-control" name="email" required readonly>                    
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
            </fieldset> --}}
            <input type="hidden" name="campaign_user_id" value="{{$screening->campaign_user_id}}">
            <input type="hidden" name="register_campaign_user_id" value="{{$screening->id}}">
            <h6>1. Physiotherapist History</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="chief_complaint">Chief Complaint:</label>
                            <textarea name="chief_complaint" class="summernote" cols="30" rows="10">{{ old('chief_complaint') }}</textarea>
                            @error('chief_complaint')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="hopi">History of Present Illness (HOPI):</label>
                            <textarea name="hopi" class="summernote" cols="30" rows="10">{{ old('hopi') }}</textarea>
                            @error('hopi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Posture:</label>
                            <input type="text" class="form-control" name="posture" value="{{ old('posture') }}">
                            @error('posture')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">ADL:</label>
                            <input type="text" class="form-control" name="adl" value="{{ old('adl') }}">
                            @error('adl')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </fieldset>
            <h6>2. Pain History</h6>
            <fieldset>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Site and Side:</label>
                            <input type="text" class="form-control" name="site_side" value="{{ old('site_side') }}">
                            @error('site_side')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">How does the pain start?</label>
                            <select name="how_pain_start" class="form-control" id="">
                                <option value="" selected disabled>---Select---</option>
                                <option value="Sudden" @if(old('how_pain_start') == 'Sudden') selected @endif>Sudden</option>
                                <option value="Gradual" @if(old('how_pain_start') == 'Gradual') selected @endif>Gradual</option>
                            </select>
                            @error('how_pain_start')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Type of pain</label>
                            <select name="type" class="form-control" id="">
                                <option value="" selected disabled>---Select---</option>
                                <option value="Pricking" @if(old('type') == 'Pricking') selected @endif>Pricking</option>
                                <option value="Burning" @if(old('type') == 'Burning') selected @endif>Burning</option>
                                <option value="Sharp" @if(old('type') == 'Sharp') selected @endif>Sharp</option>
                                <option value="Dull Aching" @if(old('type') == 'Dull Aching') selected @endif>Dull Aching</option>
                                <option value="Radiating" @if(old('type') == 'Radiating') selected @endif>Radiating</option>
                            </select>
                            @error('type')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">NRS:</label>
                            <select name="nrs" class="form-control" id="">
                                <option value="" selected disabled>---Select---</option>
                                @for($i = 0; $i <= 10; $i++)
                                <option value="{{$i}}" @if(old('nrs') == $i) selected @endif>{{$i}}</option>
                                @endfor
                            </select>
                            @error('nrs')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Temporal Variation:</label>
                            <select name="temporal_variation" class="form-control" id="">
                                <option value="" selected disabled>---Select---</option>
                                <option value="Early Morning" @if(old('temporal_variation') == 'Early Morning') selected @endif>Early Morning</option>
                                <option value="Day" @if(old('temporal_variation') == 'Day') selected @endif>Day</option>
                                <option value="Night" @if(old('temporal_variation') == 'Night') selected @endif>Night</option>
                                <option value="All the time" @if(old('temporal_variation') == 'All the time') selected @endif>All the time</option>
                            </select>
                            @error('temporal_variation')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Aggravating factor:</label>
                            <input type="text" class="form-control" name="aggravating_factor"
                                value="{{ old('aggravating_factor') }}">
                            @error('aggravating_factor')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Relieving factor:</label>
                            <input type="text" class="form-control" name="relieving_factor"
                                value="{{ old('relieving_factor') }}">
                            @error('relieving_factor')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </fieldset>
            <h6>2. Past Medical History</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="past_medical_history">Past Medical, Drug and Surgical History:</label>
                            <textarea name="past_medical_history" class="summernote" cols="30" rows="10">{{ old('past_medical_history') }}</textarea>
                            @error('past_medical_history')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Sleep:</label>
                            <select name="sleep" class="form-control" id="">
                                <option value="" selected disabled>---Select---</option>
                                <option value="Normal" @if(old('sleep') == 'Normal') selected @endif>Normal</option>
                                <option value="Affected" @if(old('sleep') == 'Affected') selected @endif>Affected</option>
                            </select>
                            @error('sleep')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Appetite:</label>
                            <select name="appetite" class="form-control" id="">
                                <option value="" selected disabled>---Select---</option>
                                <option value="Adequate" @if(old('appetite') == 'Adequate') selected @endif>Adequate</option>
                                <option value="Reduced" @if(old('appetite') == 'Reduced') selected @endif>Reduced</option>
                                <option value="Increased" @if(old('appetite') == 'Increased') selected @endif>Increased</option>
                            </select>
                            @error('appetite')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Habits:</label>
                            <input type="text" class="form-control" name="habit" value="{{ old('habit') }}">
                            @error('habit')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Range of motion:</label>
                            <select name="range_of_motion" class="form-control" id="">
                                <option value="" selected disabled>---Select---</option>
                                <option value="Free and Full" @if(old('range_of_motion') == 'Free and Full') selected @endif>Free and Full</option>
                                <option value="Reduced" @if(old('range_of_motion') == 'Reduced') selected @endif>Reduced</option>
                                <option value="Passive Full" @if(old('range_of_motion') == 'Passive Full') selected @endif>Passive Full</option>
                            </select>
                            @error('range_of_motion')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">MMT (Manual Muscle Testing/Muscle Power):</label>
                            <select name="mmt" class="form-control" id="">
                                <option value="" selected disabled>---Select---</option>
                                @for($i = 1; $i <= 5; $i++)
                                <option value="Grade {{$i}}" @if(old('mmt') == 'Grade '.$i) selected @endif>Grade {{$i}}</option>
                                @endfor
                            </select>
                            @error('mmt')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="problem_list">Problem List:</label>
                            <textarea name="problem_list" class="summernote" cols="30" rows="10">{{ old('problem_list') }}</textarea>
                            @error('problem_list')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="physio_management">Physiotherapy Management:</label>
                            <textarea name="physio_management" class="summernote" cols="30" rows="10">{{ old('physio_management') }}</textarea>
                            @error('physio_management')
                                <div class="alert alert-danger">{{ $message }}</div>
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
            $(document).ready(function(){
    
                $('#campaigns_select').change(function(){
                    let campaign = $(this).val();
                    $.ajax({
                        url:'{{route("campaign.userList")}}',
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { data:campaign },
                        success: function(response) {
                            $('#users_select').empty();
                            $('#users_select').append('<option value="" selected disabled>---Select User---</option>');
                            $.each(response, function(index, option) {
                                $('#users_select').append('<option value="' + option.campaign_user_id + '">' + option.campaignuser.name + ' (' + option.campaignuser.phone + ')' + '</option>');
                            });
                        }
                    })
                })
    
                $('#users_select').change(function(){
                    let user = $(this).val();
                    let campaign = $('#campaigns_select').val();
                    $.ajax({
                        url:'{{route("campaign.getProfile")}}',
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { user:user, campaign:campaign },
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
            })
        </script>
@endsection
