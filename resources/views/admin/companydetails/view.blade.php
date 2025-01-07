@extends('admin.master')

@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">E-brochure</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{route('details.index')}}" class="breadcrumb-item">Company Details</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<style>
    #map{
        height: 500px;
        z-index: 0;
    }
    .fileinput-upload {
        display: none;
    }

    .btn-file {
        z-index: 0 !important;
    }
</style>
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#brochure">
        <i class="icon-plus2 mr-1"></i>Edit e-brochure
    </button>
    <!-- Modal -->
    <div class="modal fade" id="brochure" tabindex="-1" role="dialog" aria-labelledby="brochureTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="brochureTitle">Upload e-brochure</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('ebrochure',$details->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="file" class="file-input" name="brochure" required>
                            <span class="mt-1"><i>(File must be of type .pdf)</i> </span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>            
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <h3>E-brochure</h3>
            <p>View e-brochure<a href="{{$details->brochure_path}}" class="ml-1" target="_blank">Click Here</a></p>
            <iframe src="{{$details->brochure_path}}" frameborder="0" width="100%" height="500px"></iframe>
        </div>
    </div>
@endsection

@section('custom-script')
<script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
<script src="/global_assets/js/demo_pages/fileinput.min.js"></script>
@endsection