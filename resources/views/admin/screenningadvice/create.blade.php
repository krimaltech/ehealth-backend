@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Permission</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Home</a>
                    <a href="{{ route('permission.index') }}" class="breadcrumb-item">Doctor Advice</a>
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
        <style>
        .alert {
            padding-top: 2px;
            padding-bottom: 2px;
        }
    </style>
    </style>
    <div class="card">
        <form method="POST" action="{{ route('screening_advice.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Doctor Advices<code>*</code></label>
                            <textarea name="feedback" class="summernote form-control" cols="30" rows="8">{{ old('feedback') }}</textarea>
                            @error('feedback')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Report (if you have any ??)</label>
                            <input  type="file" class="file-input" name="file" data-fouc accept="image/gif,image/jpeg,image/png,application/pdf">
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
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: 'Description....',
            toolbar:[            ['style', ['bold', 'italic']], //Specific toolbar display
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],] 

        });
    });
    </script>
    <script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
    <script src="/global_assets/js/demo_pages/fileinput.min.js"></script>
@endsection