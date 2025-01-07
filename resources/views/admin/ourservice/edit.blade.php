@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit</span> - Our Services</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('ourservice.index') }}" class="breadcrumb-item">Our Services</a>
                    <span class="breadcrumb-item active">Edit</span>
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
        .fileinput-remove{
            display: none;
        }
        .btn-file{
            z-index:0 !important;
        }
    </style>
    
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="services-tab" data-toggle="tab" href="#services" role="tab" aria-controls="services" aria-selected="true">Service Details</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">SEO</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="services" role="tabpanel" aria-labelledby="services-tab">
                    <form method="POST" action="{{ route('ourservice.update',$service->slug) }}" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-label">Service Title<code>*</code></label>
                                    <input type="text" class="form-control" required name="service_title" id="service_title" value="{{old('service_title') ?? $service->service_title }}">
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
                                    <input type="text" class="form-control" required name="slug" id="slug" value="{{old('slug') ?? $service->slug }}">
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
                                    <input type="text" class="form-control" required name="short_description" value="{{old('short_description') ?? $service->short_description}}">
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
                                    <textarea name="long_description" class="summernote" cols="30" rows="5">{{old('long_description') ?? $service->long_description}}</textarea>
                                    @error('long_description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="hidden" name="image_path" value="{{$service->image_path}}" id="image_path">
                                    <input type="hidden" name="icon_name" value="{{$service->image}}" id="image_name">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="file-input-overwrite image" accept="image/*" name="image">
                                    @error('image')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="hidden" name="icon_path" value="{{$service->icon_path}}" id="icon_path">
                                    <input type="hidden" name="icon_name" value="{{$service->icon}}" id="icon_name">
                                    <label class="form-label">Icon</label>
                                    <input type="file" class="file-input-overwrite icon" accept="image/*" name="icon">
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
                                    <input class="form-check-input" type="radio" name="status" id="status_active" value="1" {{$service->status == 1 ? 'checked' : ''}}>
                                    <label class="form-check-label" for="status_active">Active</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0" {{$service->status == 0 ? 'checked' : ''}}>
                                    <label class="form-check-label" for="status_inactive">Inactive</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>            
                    </form>
                </div>
                <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                    <form method="POST" action="{{ route('ourservice.updateSeo',$service->slug) }}" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label class="form-label">SEO Keyword<code>*</code></label>
                            <input type="text" class="form-control" required name="seo_keyword" value="{{old('seo_keyword') ?? $service->seo_keyword}}">
                            @error('seo_keyword')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">SEO Description<code>*</code></label>
                            <textarea name="seo_description" class="form-control" cols="30" rows="3">{{old('seo_description') ?? $service->seo_description}}</textarea>
                            @error('seo_keyword')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- /.card-body -->
            
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
            
                    </form>
                </div>
            </div>
        </div>
        <input type="hidden" id="service" value="{{$service->id}}">
    </div>
@endsection

@section('custom-script')
<!-- Summernote -->
<script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
<script src="/global_assets/js/demo_pages/fileinput.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('.summernote').summernote({
            height:200,
            toolbar: [
                ['style', ['bold', 'italic']], //Specific toolbar display
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
        });
    })
</script>
<script>
    $('.file-input-overwrite.image').fileinput({
        browseLabel: 'Browse',
        browseIcon: '<i class="icon-file-plus mr-2"></i>',
        uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
        removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
        initialPreview: [
            $('#image_path').val(),
        ],
        initialPreviewConfig: [
            {caption: $('#image_name').val(), size: 930321},
        ],
        initialPreviewAsData: true,
        overwriteInitial: true,
    })
</script>
<script>
    $('.file-input-overwrite.icon').fileinput({
        browseLabel: 'Browse',
        browseIcon: '<i class="icon-file-plus mr-2"></i>',
        uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
        removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
        initialPreview: [
            $('#icon_path').val(),
        ],
        initialPreviewConfig: [
            {caption: $('#icon_name').val(), size: 930321},
        ],
        initialPreviewAsData: true,
        overwriteInitial: true,
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
            let id = $('#service').val();
            $.ajax({
                url:'{{route("ourservice.checkSlug")}}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { 
                    id: id, 
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
        $("#service_title").blur(function() {
            let slug = $('#slug').val();
            let id = $('#service').val();
            $.ajax({
                url:'{{route("ourservice.checkSlug")}}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { 
                    id: id, 
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
    });
</script>
@endsection
