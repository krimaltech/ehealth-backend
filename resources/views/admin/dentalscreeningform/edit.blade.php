@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Dental Screening Form</span>
                </h4>
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
        <form method="POST" action="{{ route('dental-screening-form.update', $dentalScreeningForm->id) }}"
            class="wizard-form steps-validation" enctype="multipart/form-data" data-fouc id="global_form_submitted">
            @csrf
            @method('patch')
            <h6>1. Dental History</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="dental_history">Dental History:</label>
                            <textarea name="dental_history" class="summernote" cols="30" rows="10">{{ $dentalScreeningForm->dental_history }}</textarea>
                            @error('dental_history')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Last dental visit:</label>
                            <select name="last_visit_date" id="" class="form-control">
                                <option value="" selected disabled>---Select---</option>
                                <option value="6 months" @if($dentalScreeningForm->last_visit_date == '6 months') selected @endif>6 months</option>
                                <option value="1 year" @if($dentalScreeningForm->last_visit_date == '1 year') selected @endif>1 year</option>
                                <option value="2 years" @if($dentalScreeningForm->last_visit_date == '2 years') selected @endif>2 years</option>
                                <option value="3 years" @if($dentalScreeningForm->last_visit_date == '3 years') selected @endif>3 years</option>
                                <option value="1st Dental Visit" @if($dentalScreeningForm->last_visit_date == '1st Dental Visit') selected @endif>1st Dental Visit</option>
                            </select>
                            @error('last_visit_date')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Have you ever been treated for any of the (four) conditions below?:</label>
                            <select name="treated_condition[]" class="form-control select" multiple="multiple" required>
                                <option value="Peridontal Treatment (gum surgery/scaling & root planning/op ohis)" @if(in_array('Peridontal Treatment (gum surgery/scaling & root planning/op ohis)',$dentalScreeningForm->treated_condition)) selected @endif>Peridontal Treatment (gum surgery/scaling & root planning/op ohis)
                                </option>
                                <option value="Orthodontics braces" @if(in_array('Orthodontics braces',$dentalScreeningForm->treated_condition)) selected @endif>Orthodontics braces
                                </option>
                                <option value="Prosthodontics cap bridge implant" @if(in_array('Prosthodontics cap bridge implant',$dentalScreeningForm->treated_condition)) selected @endif>Prosthodontics cap bridge implant
                                </option>
                                <option value="Endodontics (root canal and restorations)" @if(in_array('Endodontics (root canal and restorations)',$dentalScreeningForm->treated_condition)) selected @endif>Endodontics (root canal and restorations)</option>
                                <option value="Dental Extrations, Fillings Pain in the jaw joints" @if(in_array('Dental Extrations, Fillings Pain in the jaw joints',$dentalScreeningForm->treated_condition)) selected @endif>Dental Extrations,
                                    Fillings Pain in the jaw joints</option>
                                    <option value="None"  @if(in_array('None',$dentalScreeningForm->treated_condition)) selected @endif>None</option>
                            </select>
                            @error('treated_condition')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </fieldset>
            <h6>2. Physical Examination</h6>
            <fieldset>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Do you have any of the following dental habits:</label>
                            <select name="dental_habit[]" class="form-control select" multiple="multiple" required>
                                <option value="Grinding"  @if(in_array('Grinding',$dentalScreeningForm->dental_habit)) selected @endif>Grinding
                                </option>
                                <option value="Bruxism"  @if(in_array('Bruxism',$dentalScreeningForm->dental_habit)) selected @endif>Bruxism</option>
                                <option value="Thumb sucking"  @if(in_array('Thumb sucking',$dentalScreeningForm->dental_habit)) selected @endif>Thumb
                                    sucking</option>
                                <option value="Mouth breathing"  @if(in_array('Mouth breathing',$dentalScreeningForm->dental_habit)) selected @endif>Mouth
                                    breathing</option>
                                <option value="Nail Biting"  @if(in_array('Nail Biting',$dentalScreeningForm->dental_habit)) selected @endif>Nail Biting
                                </option>
                                <option value="None"  @if(in_array('None',$dentalScreeningForm->dental_habit)) selected @endif>None</option>
                            </select>
                            @error('dental_habit')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Do you use any tobacco products?</label>
                            <select name="tobacco_products" class="form-control">
                                <option value="">select</option>
                                <option value="Yes" @if ($dentalScreeningForm->tobacco_products == 'Yes') selected @endif>Yes</option>
                                <option value="No" @if ($dentalScreeningForm->tobacco_products == 'No') selected @endif>No</option>
                            </select>
                            @error('tobacco_products')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">What interdental aid do you use?</label>
                            <select name="dental_floss" class="form-control">
                                <option value="">select</option>
                                <option value="Floss" @if ($dentalScreeningForm->dental_floss == 'Floss') selected @endif>Floss</option>
                                <option value="Toothpick" @if ($dentalScreeningForm->dental_floss == 'Toothpick') selected @endif>Toothpick
                                </option>
                                <option value="Interdental Brush" @if ($dentalScreeningForm->dental_floss == 'Interdental Brush') selected @endif>
                                    Interdental Brush</option>
                                <option value="Mouthwash" @if ($dentalScreeningForm->dental_floss == 'Mouthwash') selected @endif>Mouthwash</option>
                                <option value="None" @if ($dentalScreeningForm->dental_floss == 'None') selected @endif>None</option>
                            </select>
                            @error('dental_floss')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">How often do you brush?</label>
                            <select name="dental_brush" class="form-control">
                                <option value="">select</option>
                                <option value="0 times in a day" @if ($dentalScreeningForm->dental_brush == '0 times in a day') selected @endif>0 times in a day
                                </option>
                                <option value="1 times in a day" @if ($dentalScreeningForm->dental_brush == '1 times in a day') selected @endif>1 times in a day
                                </option>
                                <option value="2 times in a day" @if ($dentalScreeningForm->dental_brush == '2 times in a day') selected @endif>2 times in a day
                                </option>
                                <option value="3 times in a day" @if ($dentalScreeningForm->dental_brush == '3 times in a day') selected @endif>3 times in a day
                                </option>
                            </select>
                            @error('dental_brush')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">How would you describe your current dental health?</label>
                            <select name="current_dental" class="form-control">
                                <option value="">select</option>
                                <option value="Good" @if ($dentalScreeningForm->current_dental == 'Good') selected @endif>Good</option>
                                <option value="Fair" @if ($dentalScreeningForm->current_dental == 'Fair') selected @endif>Fair</option>
                                <option value="Poor" @if ($dentalScreeningForm->current_dental == 'Poor') selected @endif>Poor</option>
                            </select>
                            @error('current_dental')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">What type of brush do you use?</label>
                            <select name="brush_type" class="form-control">
                                <option value="">select</option>
                                <option value="soft" @if ($dentalScreeningForm->brush_type == 'soft') selected @endif>soft</option>
                                <option value="medium" @if ($dentalScreeningForm->brush_type == 'medium') selected @endif>medium</option>
                                <option value="hard" @if ($dentalScreeningForm->brush_type == 'hard') selected @endif>hard</option>
                            </select>
                            @error('brush_type')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">What kind of toothpaste do you use?</label>
                            <select name="toothpaste_type" class="form-control">
                                <option value="">select</option>
                                <option value="Fluoridated" @if ($dentalScreeningForm->toothpaste_type == 'Fluoridated') selected @endif>Fluoridated
                                </option>
                                <option value=" Non Fluoridated" @if ($dentalScreeningForm->toothpaste_type == 'Non Fluoridated') selected @endif> Non
                                    Fluoridated</option>
                            </select>
                            @error('toothpaste_type')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="diagnosis">Diagnosis:</label>
                            <textarea name="diagnosis" class="summernote" cols="30" rows="10">{{ $dentalScreeningForm->diagnosis }}</textarea>
                            @error('diagnosis')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="prevention">Advice:</label>
                            <select name="prevention[]" class="form-control select" multiple="multiple" required>
                                <option value="Maintain Good Oral Hygiene" @if(in_array('Maintain Good Oral Hygiene',$dentalScreeningForm->prevention)) selected @endif>Maintain Good Oral Hygiene</option>
                                <option value="Scaling/Polishing" @if(in_array('Scaling/Polishing',$dentalScreeningForm->prevention)) selected @endif>Scaling/Polishing</option>
                                <option value="Restoration of Offending Tooth" @if(in_array('Restoration of Offending Tooth',$dentalScreeningForm->prevention)) selected @endif>Restoration of Offending Tooth</option>
                                <option value="RCT of Offending Tooth" @if(in_array('RCT of Offending Tooth',$dentalScreeningForm->prevention)) selected @endif>RCT of Offending Tooth</option>
                                <option value="Extraction of Offending Tooth" @if(in_array('Extraction of Offending Tooth',$dentalScreeningForm->prevention)) selected @endif>Extraction of Offending Tooth</option>
                                <option value="Replacement of Missing Tooth" @if(in_array('Replacement of Missing Tooth',$dentalScreeningForm->prevention)) selected @endif>Replacement of Missing Tooth</option>
                                <option value="Use Correct Brushing Technique" @if(in_array('Use Correct Brushing Technique',$dentalScreeningForm->prevention)) selected @endif>Use Correct Brushing Technique</option>
                                <option value="Eat Nutritious Food" @if(in_array('Eat Nutritious Food',$dentalScreeningForm->prevention)) selected @endif>Eat Nutritious Food</option>
                            </select>                            
                            @error('prevention')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="file_id">Recommended Files:</label>
                            <select name="file_id[]" class="form-control select" multiple="multiple" required>
                                @foreach ($recommendfiles as $item)
                                <option value="{{ $item->id }}" @if(in_array($item->id ,$selected_files_ids)) selected @endif>{{$loop->iteration}}.{{ $item->title }}</option>
                                @endforeach
                            </select>
                            @error('file_id')
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
