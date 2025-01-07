@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit</span> -Service</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('service.index') }}" class="breadcrumb-item">Service</a>
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
        <form method="POST" action="{{ route('service.update',$service->slug) }}" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="row">
                    <div class={{$service->price != null ?' col-lg-6':'col-lg-12'}}>
                        <div class="form-group">
                            <label class="form-label">Service Name<code>*</code></label>
                            <input type="text" class="form-control" name="service_name" value="{{ $service->service_name }}">
                            @error('service_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
               @if($service->price != null)     
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Price<code>*</code></label>
                            <input type="number" class="form-control" name="price" value="{{ $service->price }}">
                            @error('price')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    @endif
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Description<code>*</code></label>
                            <textarea name="description" id="summernote" cols="30" rows="10">{{$service->description}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="hidden" name="path" value="{{$service->image_path}}" id="path">
                            <input type="hidden" name="name" value="{{$service->image}}" id="name">
                            <label class="form-label">Image<code>*</code></label>
                            <input type="file" name="image" class="file-input-overwrite" data-fouc>
                            @error('image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>
@endsection

@section('custom-script')
<!-- Summernote -->
<script>
    $(function() {
        // Summernote
        $('#summernote').summernote()
    })
</script>
<script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
<script src="/global_assets/js/demo_pages/fileinput.min.js"></script>
<script>
    $('.file-input-overwrite').fileinput({
        browseLabel: 'Browse',
        browseIcon: '<i class="icon-file-plus mr-2"></i>',
        uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
        removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
        initialPreview: [
            $('#path').val(),
        ],
        initialPreviewConfig: [
            {caption: $('#name').val(), size: 930321},
        ],
        initialPreviewAsData: true,
        overwriteInitial: true,
    })
</script>
@endsection
