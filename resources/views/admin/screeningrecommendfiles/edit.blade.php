@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Doctor Screening Form</span>
                </h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('doctor-screening-form.index') }}" class="breadcrumb-item">Doctor Screening Form</a>
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
        <form method="POST" action="{{ route('doctor-screening-form.update',$doctorScreeningForm->id) }}" class="wizard-form steps-validation"
            enctype="multipart/form-data" data-fouc id="global_form_submitted">
            @csrf
            @method('patch')
            <h6>1. Doctor Screening</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="chief_complaint">Chief Complaint:</label>
                            <textarea name="chief_complaint" class="summernote" cols="30" rows="10">{{ $doctorScreeningForm->chief_complaint }}</textarea>
                            @error('chief_complaint')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="investigation">Investigation:</label>
                            <textarea name="investigation" class="summernote" cols="30" rows="10">{{ $doctorScreeningForm->investigation }}</textarea>
                            @error('investigation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="treatment_medication">Treatment / Medication:</label>
                            <textarea name="treatment_medication" class="summernote" cols="30" rows="10">{{ $doctorScreeningForm->treatment_medication }}</textarea>
                            @error('treatment_medication')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="prevention">Advice:</label>
                            <textarea name="prevention" class="summernote" cols="30" rows="10">{{ $doctorScreeningForm->prevention }}</textarea>
                            @error('prevention')
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