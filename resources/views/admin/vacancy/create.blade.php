@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add</span> -Vacancy</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('vacancy.index') }}" class="breadcrumb-item">Vacancy</a>
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
    <!-- Horizontal Form -->
    <div class="card">
        <form method="POST" action="{{ route('vacancy.store') }}" class="wizard-form steps-validation" enctype="multipart/form-data" data-fouc id="global_form_submitted">
            @csrf
            <h6>Vacancy Details</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Job Title <code>*</code></label>
                            <input type="text" name="job_title" required class="form-control" id="job_title" value="{{old('job_title')}}" placeholder="Enter Job Title">
                            @error('job_title')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Slug <code>*</code></label>
                            <input type="text" name="slug" required class="form-control" id="slug" value="{{old('slug')}}">
                            <span id="result"></span>
                            @error('slug')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="job_type">Job Type <code>*</code></label>
                            <select class="form-control" required name="job_type" id="job_type">
                                <option selected disabled>Select Job Type</option>
                                <option value="Full-Time" @if(old('job_type')=='Full-Time') selected @endif>Full-Time</option>
                                <option value="Part-Time"  @if(old('job_type')=='Part-Time') selected @endif>Part-Time</option>
                                <option value="Intern"  @if(old('job_type')=='Intern') selected @endif>Intern</option>
                                <option value="Other"  @if(old('job_type')=='Other') selected @endif>Other</option>
                            </select>
                            @error('job_type')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="status">Vacancy Status <code>*</code></label>
                            <select name="status" required id="" class="form-control">
                                <option value="" selected disabled>Select Status</option>
                                <option value="1" @if(old('status')==1) selected @endif>Active</option>
                                <option value="0"  @if(old('status')==0) selected @endif>Inactive</option>
                            </select>
                            @error('status')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>No. of Vacancies <code>*</code></label>
                            <input type="number" required name="no_of_vacancy" class="form-control" value="{{old('no_of_vacancy')}}">
                            @error('no_of_vacancy')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Experience <code>*</code></label>
                            <input type="text" required name="experience" class="form-control" value="{{old('experience')}}">
                            @error('experience')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Job Deadline <code>*</code></label>
                            <input type="date" required name="job_deadline" class="form-control" value="{{old('job_deadline')}}" min="{{\Carbon\Carbon::now()->addDay()->format('Y-m-d')}}">
                            @error('job_deadline')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="">Job Skills<code>*</code></label><br/>
                            <select class="lab_ids form-control " name="skills[]" multiple="multiple" required>
                                @foreach ($skills as $item)
                                    <option value="{{$item->id}}" {{in_array($item->id,old('skills',[])) ? 'selected' : ''}}>{{$item->skill}}</option>
                                @endforeach
                            </select> 
                        </div>
                    </div> 
                </div>  
                <div class="form-group">
                    <label>Job Description</label>
                    <textarea name="job_description" class="form-control summernote" placeholder="Describe in short..." rows="3">{{old('job_description')}}</textarea>
                </div>
    
                <div class="form-group">
                    <label>Job Responsibilities</label>
                    <textarea name="job_responsibility" class="form-control summernote" placeholder="Describe Job Responsibilities...">{{old('job_responsibility')}}</textarea>
                </div>
    
                <div class="form-group">
                    <label>Job Requirements <code>*</code></label>
                    <textarea name="job_requirements" class="form-control summernote" placeholder="Describe Job Requirements..." required>{{old('job_requirements')}}</textarea>
                    @error('job_requirements')
                        <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Salary<code>*</code></label>
                            <select name="salary" id="salary" class="form-control" required>
                                <option value="" selected disabled>---Select Salary Preference---</option>
                                <option value="Negotiable" @if(old('salary')=='Negotiable') selected @endif>Negotiable</option>
                                <option value="Amount(Range)" @if(old('salary')=='Amount(Range)') selected @endif>Amount(Range)</option>
                            </select>
                            @error('salary')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 rangediv" style="display:none">
                        <div class="form-group">
                            <label>Salary Range <code>*</code></label>
                            <input type="text" name="salary_range" class="form-control range" value="{{old('salary_range')}}">
                            @error('salary_range')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Education Level<code>*</code></label>
                            <select name="education_level" id="" class="form-control" required>
                                <option value="" selected disabled>---Select Education Level---</option>
                                <option value="+2" @if(old('education_level')=='+2') selected @endif>+2</option>
                                <option value="Bachelor" @if(old('education_level')=='Bachelor') selected @endif>Bachelor</option>
                                <option value="Masters" @if(old('education_level')=='Masters') selected @endif>Masters</option>
                                <option value="PHD" @if(old('education_level')=='PHD') selected @endif>PHD</option>
                            </select>
                            @error('education_level')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job Location<code>*</code></label>
                            <input type="text" required name="job_location" class="form-control" value="{{old('job_location')}}">
                            @error('job_location')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Google Form Link <code>*</code></label>
                            <input type="url" required name="link" class="form-control" value="{{old('link')}}">
                            @error('link')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </fieldset>

            <h6>SEO</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">SEO Keyword<code>*</code></label>
                            <input type="text" class="form-control" required name="seo_keyword" value="{{ old('seo_keyword') }}">
                            @error('seo_keyword')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label">SEO Description<code>*</code></label>
                            <textarea name="seo_description" class="form-control" cols="30" rows="3">{{ old('seo_description') }}</textarea>
                            @error('seo_keyword')
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
        $(document).ready(function() {
            $('#salary').change(function(){
                let value = $(this).val();
                if(value == 'Amount(Range)'){
                    $('.rangediv').css('display','block');
                    $('.range').attr('required',true);
                }else{
                    $('.rangediv').css('display','none');
                    $('.range').attr('required',false);
                }
            })
            $('.lab_ids').select2();
        });
        
    </script>
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic']], //Specific toolbar display
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
        })
    </script>
    <script>
        $(document).ready(function(){
            $("#job_title").keyup(function() {
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
                    url:'{{route("vacancy.checkSlug")}}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { slug: slug },
                    success: function(response) {
                        if(response == false){
                            $('#result').html('<i class="icon-checkmark text-success mr-1"></i><span class="text-success">Valid</span>');
                        }else{
                            $('#result').html('<i class="icon-cross text-danger mr-1"></i><span class="text-danger">Invalid</span>');
                        }
                    }
                })
            });
            $("#job_title").blur(function() {
                let slug = $('#slug').val();
                $.ajax({
                    url:'{{route("vacancy.checkSlug")}}',
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { slug: slug },
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