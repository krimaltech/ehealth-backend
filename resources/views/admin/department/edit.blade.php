@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Departments</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('department.index') }}" class="breadcrumb-item">Departments</a>
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
        .fileinput-remove{
            display: none;
        }
        .btn-file{
            z-index:0 !important;
        }
    </style>
    <div class="card">
        <form method="POST" action="{{ route('department.update', $department->id) }}" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Department<code>*</code></label>
                            <input type="text" required class="form-control" name="department"
                                value="{{old('department') ?? $department->department }}">
                            @error('department')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Department(Nepali)<code>*</code></label>
                            <input type="text" class="form-control" required name="department_nepali"
                                value="{{old('department_nepali') ?? $department->department_nepali }}">
                            @error('department_nepali')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Symptoms<code>*</code></label>
                            <select name="symptoms[]" class="form-control multiselect" multiple="multiple">
                                @if ($department->symptoms == null || $department->symptoms == 'null')
                                    @foreach ($symptoms as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                @else
                                    @foreach ($symptoms as $item)
                                        <option value="{{ $item->id }}"
                                            @if (in_array($item->id, $department->symptoms)) selected @endif>
                                            {{ $item->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('symptoms')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Department Icon<code>*</code></label>
                            <input type="hidden" name="path" value="{{$department->image_path}}" id="path">
                            <input type="hidden" name="name" value="{{$department->image}}" id="name">
                            <input type="file" name="image" accept="image/*" class="file-input-overwrite" data-fouc>
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
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
@endsection

@section('custom-script')
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
