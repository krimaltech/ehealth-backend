@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add</span> - Our Services</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('ourservice.index') }}" class="breadcrumb-item">Our Services</a>
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
        .fileinput-upload{
            display: none;
        }
        .btn-file{
            z-index:0 !important;
        }
    </style>
    <div class="card">
        <form method="POST" action="{{ route('ourservice.store') }}" class="wizard-form steps-validation" enctype="multipart/form-data" data-fouc id="global_form_submitted">
            @csrf
            <h6>Service Details</h6>
            <fieldset>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Service Title<code>*</code></label>
                            <input type="text" class="form-control" required name="service_title" id="service_title" value="{{ old('service_title') }}">
                            @error('service_title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Slug<code>*</code></label>
                            <input type="text" class="form-control" required name="slug" id="slug" value="{{ old('slug') }}">
                            <span id="result"></span>
                            @error('slug')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Short Description<code>*</code></label>
                            <input type="text" class="form-control" name="short_description" value="{{ old('short_description') }}" required>
                            @error('short_description')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description">Long Description<code>*</code></label>
                            <textarea name="long_description" class="summernote" cols="30" rows="5" required>{{old('long_description')}}</textarea>
                            @error('long_description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Image<code>*</code></label>
                            <input type="file" accept="image/*" required class="file-input" name="image"> <br>
                            @error('image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Icon<code>*</code></label>
                            <input type="file" accept="image/*" class="file-input" required name="icon"> <br>
                            @error('icon')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="">Service Status</label><br/>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_active" value="1" checked>
                            <label class="form-check-label" for="status_active">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0">
                            <label class="form-check-label" for="status_inactive">Inactive</label>
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
<!-- Summernote -->
<script src="{{ asset('global_assets/form_wizard/js/form_wizard.js') }}"></script>
<script src="{{ asset('global_assets/form_wizard/js/steps.min.js') }}"></script>
<script src="{{ asset('global_assets/form_wizard/js/validate.min.js') }}"></script>
<script src="{{ asset('global_assets/js/demo_pages/uploader_bootstrap.js') }}"></script>
<script src="{{ asset('global_assets/js/demo_pages/fileinput.min.js') }}"></script>
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
        $("#service_title").keyup(function() {
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
                url:'{{route("ourservice.checkSlug")}}',
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
        $("#service_title").blur(function() {
            let slug = $('#slug').val();
            $.ajax({
                url:'{{route("ourservice.checkSlug")}}',
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
