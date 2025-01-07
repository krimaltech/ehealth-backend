@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit</span> -Campaign</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('campaign.index') }}" class="breadcrumb-item">Campaign</a>
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
        .btn-file,.fileinput-remove,.file-caption{
            z-index:0 !important;
        }
    </style>
    <div class="card">
        <form method="POST" action="{{ route('campaign.update', $campaign->id) }}" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Campaign No.<code>*</code></label>
                            <input type="text" class="form-control" name="campaign_no" required value="{{  $campaign->campaign_no }}">
                            @error('campaign_no')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Campaign Type<code>*</code></label>
                            <select name="campaign_type" class="form-control" required>
                                <option value="" selected disabled>---Select Campaign Type---</option>
                                <option value="Family" @if($campaign->campaign_type == 'Family') selected @endif>Family</option>
                                <option value="School" @if($campaign->campaign_type == 'School') selected @endif>School</option>
                                <option value="Corporate" @if($campaign->campaign_type == 'Corporate') selected @endif>Corporate</option>
                            </select>
                            @error('campaign_type')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Campaign Title<code>*</code></label>
                            <input type="text" class="form-control" name="title" required value="{{  $campaign->title }}">
                            @error('title')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Campaign Venue<code>*</code></label>
                            <input type="text" class="form-control" name="venue" required value="{{  $campaign->venue }}">
                            @error('venue')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Campaign Address<code>*</code></label>
                            <input type="text" class="form-control" name="address" required value="{{  $campaign->address }}">
                            @error('address')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Start Date and Time<code>*</code></label>
                            <input type="datetime-local" class="form-control" name="start_date" required value="{{  $campaign->start_date }}">
                            @error('start_date')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">End Date and Time<code>*</code></label>
                            <input type="datetime-local" class="form-control" name="end_date" required value="{{  $campaign->end_date }}">
                            @error('end_date')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Description<code>*</code></label>
                            <textarea name="description" class="summernote form-control" cols="30" rows="10">{{ $campaign->description }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Image</label>
                            <input type="hidden" name="path" value="{{$campaign->image_path}}" id="path">
                            <input type="hidden" name="name" value="{{$campaign->image}}" id="name">
                            <input type="file" accept="image/*" name="image" class="file-input-overwrite">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
@endsection
@section('custom-script')
<script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
<script src="/global_assets/js/demo_pages/fileinput.min.js"></script>

<script>
    $(function() {
        // Summernote
        $('.summernote').summernote({
            height: 210,
            toolbar: [
                ['style', ['bold', 'italic']], //Specific toolbar display
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
            ]
        });
    })
</script>
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
