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
            <form method="POST" action="{{ route('nurse-screening-form.update',$nurseScreeningForm->id) }}" class="wizard-form steps-validation" enctype="multipart/form-data" data-fouc id="global_form_submitted">
                @csrf
                @method('PATCH')
                <h6>1. Past Medical History</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Past Illness</label>
                                    <select name="past_illness" class="form-control" id="past_illness">
                                        <option value="">select</option>
                                        <option value="Yes" @if ($nurseScreeningForm->past_illness == "Yes") selected @endif>Yes</option>
                                        <option value="No"  @if ($nurseScreeningForm->past_illness == "No") selected @endif>No</option>
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
                                <input type="text" class="form-control past_illness_comment" name="past_illness_comment"  value="{{ $nurseScreeningForm->past_illness_comment }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Hospitalization</label>
                                    <select name="hospitalization" class="form-control">
                                        <option value="">select</option>
                                        <option value="Yes" @if ($nurseScreeningForm->hospitalization == "Yes") selected @endif>Yes</option>
                                        <option value="No"  @if ($nurseScreeningForm->hospitalization == "No") selected @endif>No</option>
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
                                <input type="text" class="form-control" name="hospitalization_comment"  value="{{ $nurseScreeningForm->hospitalization_comment }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Injuries Or Accident</label>
                                    <select name="injuries_accident" class="form-control">
                                        <option value="">select</option>
                                        <option value="Yes" @if ($nurseScreeningForm->injuries_accident == "Yes") selected @endif>Yes</option>
                                        <option value="No"  @if ($nurseScreeningForm->injuries_accident == "No") selected @endif>No</option>
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
                                <input type="text" class="form-control" name="injuries_accident_comment"  value="{{ $nurseScreeningForm->injuries_accident_comment }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Surgeries</label>
                                <select name="surgeries" class="form-control">
                                    <option value="">select</option>
                                    <option value="Yes" @if ($nurseScreeningForm->surgeries == "Yes") selected @endif>Yes</option>
                                    <option value="No"  @if ($nurseScreeningForm->surgeries == "No") selected @endif>No</option>
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
                                <input type="text" class="form-control" name="surgeries_comment"  value="{{ $nurseScreeningForm->surgeries_comment }}">
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
                                    value="{{ $nurseScreeningForm->temperature }}">
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
                                <input type="text" class="form-control" name="pulse" value="{{ $nurseScreeningForm->pulse }}">
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
                                <input type="text" class="form-control" name="resp" value="{{ $nurseScreeningForm->resp }}">
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
                                <input type="text" class="form-control" name="spo2" value="{{ $nurseScreeningForm->spo2 }}">
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
                                <input type="text" class="form-control" name="bp" value="{{ $nurseScreeningForm->bp }}">
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
                                <input type="text" class="form-control" name="muac" value="{{ $nurseScreeningForm->muac }}" >
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
                                <input type="text" class="form-control" name="height" value="{{ $nurseScreeningForm->height }}">
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
                                <input type="text" class="form-control" name="weight" value="{{ $nurseScreeningForm->weight }}">
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
                                    <option value="Yes" @if ($nurseScreeningForm->environmental_factor == "Yes") selected @endif>Yes</option>
                                    <option value="No"  @if ($nurseScreeningForm->environmental_factor == "No") selected @endif>No</option>
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
                                <input type="text" class="form-control" name="environmental_factor_comment" value="{{ $nurseScreeningForm->environmental_factor_comment }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Foods</label>
                                <select name="food_allergie" class="form-control">
                                    <option value="">select</option>
                                    <option value="Yes" @if ($nurseScreeningForm->food_allergie == "Yes") selected @endif>Yes</option>
                                    <option value="No"  @if ($nurseScreeningForm->food_allergie == "No") selected @endif>No</option>
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
                                <input type="text" class="form-control" name="food_allergie_comment" value="{{ $nurseScreeningForm->food_allergie_comment }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Durg Allergie</label>
                                <select name="durg_allergie" class="form-control">
                                    <option value="">select</option>
                                    <option value="Yes" @if ($nurseScreeningForm->durg_allergie == "Yes") selected @endif>Yes</option>
                                    <option value="No"  @if ($nurseScreeningForm->durg_allergie == "No") selected @endif>No</option>
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
                                <input type="text" class="form-control" name="durg_allergie_comment" value="{{ $nurseScreeningForm->durg_allergie_comment }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Insect Sting Allergie</label>
                                <select name="insect_allergie" class="form-control">
                                    <option value="">select</option>
                                    <option value="Yes" @if ($nurseScreeningForm->insect_allergie == "Yes") selected @endif>Yes</option>
                                    <option value="No"  @if ($nurseScreeningForm->insect_allergie == "No") selected @endif>No</option>
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
                                <input type="text" class="form-control" name="insect_allergie_comment" value="{{ $nurseScreeningForm->insect_allergie_comment }}">
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
                                    <option value="Yes" @if ($nurseScreeningForm->drug_history == "Yes") selected @endif>Yes</option>
                                    <option value="No" @if ($nurseScreeningForm->drug_history == "No") selected @endif>No</option>
                                </select>
                                @error('drug_history')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control" name="drug_history_comment" value="{{ $nurseScreeningForm->drug_history_comment }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="mentural_history">Menstural History</label>
                                <select name="mentural_history" class="form-control">
                                    <option value="">select</option>
                                    <option value="Regular" @if ($nurseScreeningForm->mentural_history == "Regular") selected @endif>Regular</option>
                                    <option value="Irregular" @if ($nurseScreeningForm->mentural_history == "Irregular") selected @endif>Irregular</option>
                                    <option value="None" @if ($nurseScreeningForm->mentural_history == "None") selected @endif>None</option>
                                </select>
                                @error('mentural_history')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control" name="mentural_history_comment"  value="{{ $nurseScreeningForm->mentural_history_comment }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="family_history">Family History</label>
                                <select name="family_history" class="form-control">
                                    <option value="">select</option>
                                    <option value="Yes" @if ($nurseScreeningForm->family_history == "Yes") selected @endif>Yes</option>
                                    <option value="No" @if ($nurseScreeningForm->family_history == "No") selected @endif>No</option>
                                </select>
                                @error('family_history')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="family_history_details">Family History Details</label>
                                <textarea name="family_history_details" class="summernote" cols="30" rows="10">{{ $nurseScreeningForm->family_history_details }}</textarea>
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
                                    <option value="Yes" @if ($nurseScreeningForm->childhood_disease == "Yes") selected @endif>Yes</option>
                                    <option value="No"  @if ($nurseScreeningForm->childhood_disease == "No") selected @endif>No</option>
                                </select>
                                @error('childhood_disease')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control" name="childhood_disease_comment" value="{{ $nurseScreeningForm->childhood_disease_comment }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-label">Immunization</label>
                                <select name="immunization[]" class="form-control select" multiple="multiple" required>
                                    <option value="" disabled>select</option>
                                    <option value="BCD/Measles,Rubella/JE" @if(in_array('BCD/Measles,Rubella/JE',$nurseScreeningForm->immunization)) selected @endif>BCD/Measles,Rubella/JE</option>
                                    <option value="Typhoid/Influenza" @if(in_array('Typhoid/Influenza',$nurseScreeningForm->immunization)) selected @endif>Typhoid/Influenza</option>
                                    <option value="Covid-19" @if(in_array('Covid-19',$nurseScreeningForm->immunization)) selected @endif>Covid-19</option>
                                    <option value="None" @if(in_array('None',$nurseScreeningForm->immunization)) selected @endif>None</option>
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.checkUser').click(function(e) {
                var bla = $('#gd_id').val();
                e.preventDefault();
                var url = '/admin/director/user-details?gd_id=' + bla;
                $.ajax({
                    type: "GET",
                    url: url,
                    data: "data",
                    success: function(response) {
                        $("#first_name").val(response.user.first_name);
                        $("#middle_name").val(response.user.middle_name);
                        $("#last_name").val(response.user.last_name);
                        $("#email").val(response.user.email);
                        $("#phone").val(response.user.phone);
                        $("#address").val(response.address);
                        $("#gender").val(response.gender);
                    },
                    error: function() {
                        swal({
                            title: "Server Error",
                            icon: "Error",
                        })
                    }
                });
            })
        });
    </script>
@endsection
