@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Multiple Product Image</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Home</a>
                    <a href="{{ route('product.index') }}" class="breadcrumb-item">Multiple Product Image</a>
                    <span class="breadcrumb-item active">Add</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Reload Page To Get Image</h3>
        </div>
        <div class="card-body">
            <div class="row">
                @foreach ($gallery as $item)
                <div class="col-md-3">
                    <object data="{{asset('/storage/images/'.$item->image)}}" alt="product" height="300px" width="300px"></object>
                    <div>
                        <form method="post" onsubmit="return confirm('Are you sure ?')" action="{{route('product.delete',$item->id)}}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <form action="{{ route('product.filestore') }}" class="dropzone" id="dropzone_multiple" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="product_id" id="" value="{{$product->id}}">
        {{-- <input type="submit"> --}}
    </form>
@endsection
@section('custom-script')
<script src="/global_assets/dropzone/dropzone.min.js"></script>
<script src="/global_assets/dropzone/uploader_dropzone.js"></script>
<script>
      Dropzone.options.dropzoneMultiple = {
            paramName: "image", // The name that will be used to transfer the file
            dictDefaultMessage: 'Drop files to upload <span>or CLICK</span>',
            // maxFilesize: 1.2 ,// MB
            maxFiles: 4,
        };
</script>
@endsection
