@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Dental Screening Form</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('dental-screening-form.index') }}" class="breadcrumb-item">Dental Screening Form</a>
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
            <form method="POST" action="{{ route('physio-screening-form.update',$physioScreeningForm->id) }}" class="wizard-form steps-validation" enctype="multipart/form-data" data-fouc id="global_form_submitted">
                @csrf
                @method('patch')
                <h6>1. Physiotherapist History</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="chief_complaint">Chief Complaint:</label>
                                <textarea name="chief_complaint" class="summernote" cols="30" rows="10">{{ $physioScreeningForm->chief_complaint }}</textarea>
                                @error('chief_complaint')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hopi">History of Present Illness (HOPI):</label>
                                <textarea name="hopi" class="summernote" cols="30" rows="10">{{ $physioScreeningForm->hopi }}</textarea>
                                @error('hopi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-label">Posture:</label>
                                <input type="text" class="form-control" name="posture" value="{{ $physioScreeningForm->posture }}">
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
                                <input type="text" class="form-control" name="adl" value="{{ $physioScreeningForm->adl }}">
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
                                <input type="text" class="form-control" name="site_side" value="{{ $physioScreeningForm->site_side }}">
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
                                    <option value="Sudden" @if($physioScreeningForm->how_pain_start == 'Sudden') selected @endif>Sudden</option>
                                    <option value="Gradual" @if($physioScreeningForm->how_pain_start == 'Gradual') selected @endif>Gradual</option>
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
                                    <option value="Pricking" @if($physioScreeningForm->type == 'Pricking') selected @endif>Pricking</option>
                                    <option value="Burning" @if($physioScreeningForm->type == 'Burning') selected @endif>Burning</option>
                                    <option value="Sharp" @if($physioScreeningForm->type == 'Sharp') selected @endif>Sharp</option>
                                    <option value="Dull Aching" @if($physioScreeningForm->type == 'Dull Aching') selected @endif>Dull Aching</option>
                                    <option value="Radiating" @if($physioScreeningForm->type == 'Radiating') selected @endif>Radiating</option>
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
                                    <option value="{{$i}}" @if($physioScreeningForm->nrs == $i) selected @endif>{{$i}}</option>
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
                                    <option value="Early Morning" @if($physioScreeningForm->temporal_variation == 'Early Morning') selected @endif>Early Morning</option>
                                    <option value="Day" @if($physioScreeningForm->temporal_variation == 'Day') selected @endif>Day</option>
                                    <option value="Night" @if($physioScreeningForm->temporal_variation == 'Night') selected @endif>Night</option>
                                    <option value="All the time" @if($physioScreeningForm->temporal_variation == 'All the time') selected @endif>All the time</option>
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
                                    value="{{ $physioScreeningForm->aggravating_factor }}">
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
                                    value="{{ $physioScreeningForm->relieving_factor }}">
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
                                <textarea name="past_medical_history" class="summernote" cols="30" rows="10">{{ $physioScreeningForm->past_medical_history }}</textarea>
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
                                    <option value="Normal" @if($physioScreeningForm->sleep == 'Normal') selected @endif>Normal</option>
                                    <option value="Affected" @if($physioScreeningForm->sleep == 'Affected') selected @endif>Affected</option>
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
                                    <option value="Adequate" @if($physioScreeningForm->appetite == 'Adequate') selected @endif>Adequate</option>
                                    <option value="Reduced" @if($physioScreeningForm->appetite == 'Reduced') selected @endif>Reduced</option>
                                    <option value="Increased" @if($physioScreeningForm->appetite == 'Increased') selected @endif>Increased</option>
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
                                <input type="text" class="form-control" name="habit" value="{{ $physioScreeningForm->habit }}">
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
                                    <option value="Free and Full" @if($physioScreeningForm->range_of_motion == 'Free and Full') selected @endif>Free and Full</option>
                                    <option value="Reduced" @if($physioScreeningForm->range_of_motion == 'Reduced') selected @endif>Reduced</option>
                                    <option value="Passive Full" @if($physioScreeningForm->range_of_motion == 'Passive Full') selected @endif>Passive Full</option>
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
                                    <option value="Grade {{$i}}" @if($physioScreeningForm->mmt == 'Grade '.$i) selected @endif>Grade {{$i}}</option>
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
                                <textarea name="problem_list" class="summernote" cols="30" rows="10">{{ $physioScreeningForm->problem_list }}</textarea>
                                @error('problem_list')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="physio_management">Physiotherapy Management:</label>
                                <textarea name="physio_management" class="summernote" cols="30" rows="10">{{ $physioScreeningForm->physio_management }}</textarea>
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
@endsection