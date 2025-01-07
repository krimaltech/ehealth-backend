@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add</span> -Brand</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('brand.index') }}" class="breadcrumb-item">Brand</a>
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
        <form method="POST" action="{{ route('brand.update',$brand->id) }}" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Brand<code>*</code></label>
                            <input type="text" class="form-control" required name="brand_name" value="{{old('brand_name') ?? $brand->brand_name }}" required>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">Image</label><br>
                        <input type="file" name="image" onchange="readURL(this)">
                       @if($brand->image) <img src="{{$brand->image_path}}" alt="" height="200px" width="250px"> @endif
                        <img src="" height="200px" width="250px" id="selectedImage" style="display: none;">
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
    <script src="/global_assets/countrycode/js/intlTelInput.js"></script>
    <script src="/global_assets/countrycode/js/isValidNumber.js"></script>
    <script src="/global_assets/countrycode/js/prism.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#selectedImage').attr('src', e.target.result);
                    $('#selectedImage').css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#selectedImage').change(function() {
            readURL(this);
        })
    </script>
@endsection
