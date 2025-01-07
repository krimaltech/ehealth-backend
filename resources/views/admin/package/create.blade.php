@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add</span> - Package</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('package.index') }}" class="breadcrumb-item">Package</a>
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
        <form method="POST" action="{{ route('package.store') }}" class="wizard-form steps-validation" enctype="multipart/form-data" data-fouc id="global_form_submitted">
            @csrf
            <h6>Package Details</h6>
            <fieldset>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label">Package Name<code>*</code></label>
                            <input type="text" class="form-control" name="package_type" id="package_type" value="{{ old('package_type') }}" required>
                            @error('package_type')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label">Slug<code>*</code></label>
                            <input type="text" class="form-control" name="slug" id="slug" value="{{ old('slug') }}" required>
                            <span id="result"></span>
                            @error('slug')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label">No. of visits<code>*</code></label>
                            <input type="number" class="form-control" name="visits" value="{{ old('visits') }}" required>
                            @error('visits')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label">Package Type <code>*</code></label>
                            <select name="type" id="" class="form-control" required>
                                <option value="" selected disabled>--Select Package Type--</option>
                                <option value="1" @if(old('type') == 1) selected @endif>Budget Package</option>
                                <option value="2" @if(old('type') == 2) selected @endif>Premium Package</option>
                                <option value="3" @if(old('type') == 3) selected @endif>Corporate Package</option>
                                <option value="4" @if(old('type') == 4) selected @endif>School Package</option>
                            </select>
                            @error('type')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label">Registration fee <code>*</code></label>
                            <input type="text" class="form-control" name="registration_fee" value="{{ old('registration_fee') }}" required>
                            @error('registration_fee')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label">Monthly Fee <code>*</code></label>
                            <input type="text" class="form-control" name="monthly_fee" value="{{ old('monthly_fee') }}" required>
                            @error('monthly_fee')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label">No. of tests <code>*</code></label>
                            <input type="number" class="form-control" name="tests" value="{{ old('tests') }}" required>
                            @error('tests')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-label">Order (in number) <code>*</code></label>
                            <input type="number" class="form-control" name="order" value="{{old('order')}}">
                            @error('order')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Package Description<code>*</code></label>
                            <textarea name="description" class="summernote" cols="30" rows="10" required>{{old('description')}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </fieldset>

            <h6>Services</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Pathological Screening<code>*</code></label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="screening1" name="screening" required value="1" {{old('screening') == '1'? 'checked' : ''}}>
                                <label class="form-check-label" for="screening1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="screening2" name="screening" required value="0" {{old('screening') == '0'? 'checked' : ''}}>
                                <label class="form-check-label" for="screening2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Medical Checkup<code>*</code></label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="medicalcheckup1" name="checkup" required value="1" {{old('checkup') == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="medicalcheckup1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="medicalcheckup2" name="checkup" required value="0" {{old('checkup') == '0' ? 'checked' : ''}}>
                                <label class="form-check-label" for="medicalcheckup2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Free Ambulance Service<code>*</code></label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="ambulance1" name="ambulance" required value="1" {{old('ambulance') == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="ambulance1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="ambulance2" name="ambulance" required value="0" {{old('ambulance') == '0' ? 'checked' : ''}}>
                                <label class="form-check-label" for="ambulance2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Insurance Service<code>*</code></label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="insurance1" name="insurance" required value="1" {{old('insurance') == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="insurance1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="insurance2" name="insurance" required value="0" {{old('insurance') == '0' ? 'checked' : ''}}>
                                <label class="form-check-label" for="insurance2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 insurance" style="display:none">
                        <div class="form-group">
                            <label for="">Insurance Coverage Amount <code>*</code></label>
                            <input type="number" name="insurance_amount" class="form-control" id="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Schedule Flexibility<code>*</code></label> <br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="flexibility_yes" name="schedule_flexibility" required value="1" {{old('schedule_flexibility') == '1' ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexibility_yes">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="flexibility_no" name="schedule_flexibility" required value="0" {{old('schedule_flexibility') == '0' ? 'checked' : ''}}>
                                <label class="form-check-label" for="flexibility_no">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 flexible" style="display:none">
                        <div class="form-group">
                            <label for="">Schedule Flexibility (Times)<code>*</code></label> <br>
                           <input type="number" class="form-control" name="schedule_times">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Online Doctor Consultation (Times)</label> <br>
                           <input type="number" class="form-control" name="online_consultation" required>
                        </div>
                    </div>
                </div>
            </fieldset>

            <h6>SEO</h6>
            <fieldset>
                <div class="form-group">
                    <label class="form-label">SEO Keyword<code>*</code></label>
                    <input type="text" class="form-control" required name="seo_keyword" value="{{ old('seo_keyword') }}">
                    @error('seo_keyword')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="form-label">SEO Description<code>*</code></label>
                    <textarea name="seo_description" class="form-control" cols="30" rows="3">{{ old('seo_description') }}</textarea>
                    @error('seo_keyword')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </fieldset>
        </form>
    </div>
@endsection

@section('custom-script')
<!-- Summernote -->
<script src="{{ asset('global_assets/form_wizard/js/form_wizard.js') }}"></script>
<script src="{{ asset('global_assets/form_wizard/js/steps.min.js') }}"></script>
<script src="{{ asset('global_assets/form_wizard/js/validate.min.js') }}"></script>
<script>
    $(function() {
        // Summernote
        $('.summernote').summernote()
    })
</script>
<script>
    $(document).ready(function(){
        $('input[name=insurance]').change(function(){
            let insurance = $(this).val();
            if(insurance == 1){
                $('.insurance').css('display','block');
                $('.insurance input').attr('required','true');
            }else{
                $('.insurance').css('display','none');
                $('.insurance input').removeAttr('required');
            }
        })
        $('input[name=schedule_flexibility]').change(function(){
            let flexible = $(this).val();
            if(flexible == 1){
                $('.flexible').css('display','block');
                $('.flexible input').attr('required','true');
            }else{
                $('.flexible').css('display','none');
                $('.flexible input').removeAttr('required');
            }
        })
    })
</script>
<script>
    $(document).ready(function(){
        $("#package_type").keyup(function() {
            $('#result').empty();
            var slug = $(this).val();
            var trimmed = $.trim(slug);
            slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            slug = slug.toLowerCase();
            $("#slug").val(slug);
        });
        $("#slug").keyup(function() {
            $('#result').empty();
            var slug = $(this).val();
            var trimmed = $.trim($(this).val());
            slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '-');
            slug = slug.toLowerCase();
            $("#slug").val(slug);
        });
        $("#slug").blur(function() {
            let slug = $(this).val();
            $.ajax({
                url:'{{route("package.checkSlug")}}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { 
                    slug: slug 
                },
                success: function(response) {
                    if(response == false){
                        $('#result').html('<i class="icon-checkmark text-success mr-1"></i><span class="text-success">Valid</span>');
                    }else{
                        $('#result').html('<i class="icon-cross text-danger mr-1"></i><span class="text-danger">Invalid</span>');
                    }
                }
            })
        });
        $("#package_type").blur(function() {
            let slug = $('#slug').val();
            $.ajax({
                url:'{{route("package.checkSlug")}}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { 
                    slug: slug 
                },
                success: function(response) {
                    if(response == false){
                        $('#result').html('<i class="icon-checkmark text-success mr-1"></i><span class="text-success">Valid</span>');
                    }else{
                        $('#result').html('<i class="icon-cross text-danger mr-1"></i><span class="text-danger">Invalid</span>');
                    }
                }
            })
        });
    })
</script>
@endsection