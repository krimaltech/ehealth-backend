@extends('admin.master')

@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add</span> - About Us</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{route('about.index')}}" class="breadcrumb-item">About Us</a>
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
    .alert{
        padding-top:2px;
        padding-bottom:2px;
    }
</style>
    <div class="card">
        <form method="POST" action="{{route('about.store')}}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tagline">Tagline<code>*</code></label>
                            <input type="text" name="tagline" id="" value="{{old('tagline')}}" required class="form-control">
                            @error('tagline')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="what_we_do">What We Do<code>*</code></label>
                            <textarea name="what_we_do" class="summernote" cols="30" rows="10">{{old('what_we_do')}}</textarea>
                            @error('what_we_do')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="mission">Mission<code>*</code></label>
                            <textarea name="mission" class="summernote" cols="30" rows="10">{{old('mission')}}</textarea>
                            @error('mission')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="vision">Vision<code>*</code></label>
                            <textarea name="vision" class="summernote" cols="30" rows="10">{{old('vision')}}</textarea>
                            @error('vision')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="goal">Goal<code>*</code></label>
                            <textarea name="goal" class="summernote" cols="30" rows="10">{{old('goal')}}</textarea>
                            @error('goal')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="objective">Objective<code>*</code></label>
                            <textarea name="objective" class="summernote" cols="30" rows="10">{{old('objective')}}</textarea>
                            @error('objective')
                            <div class="alert alert-danger">{{ $message }}</div>
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
<!-- Summernote -->
<script>
    $(function() {
        // Summernote
        $('.summernote').summernote()
    })
</script>
@endsection
