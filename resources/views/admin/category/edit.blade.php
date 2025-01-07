@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add</span> -Category</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('category.index') }}" class="breadcrumb-item">Category</a>
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
    </style>
    <div class="card">
        <form method="POST" action="{{ route('category.update',$categories->id) }}" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Name<code>*</code></label>
                            <input type="text" class="form-control" name="name" required value="{{old('name') ?? $categories->name }}">
                            @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Parent Category<code>*</code></label>
                            <select name="parent_id" class="form-control">
                                <option value="">Select</option>
                                @foreach ($category as $item)
                                <option value="{{ $item->id }}"  @if($item->id == $categories->parent_id) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                            @error('parent_id')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Vendor Type<code>*</code></label>
                            <select name="vendor_type_id" class="form-control" required>
                                <option value="">Select</option>
                                @foreach ($vendorType as $item)
                                <option value="{{$item->id}}"  @if($item->id == $categories->vendor_type_id) selected @endif>{{$item->vendor_type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Description<code>*</code></label>
                            <textarea name="description" class="form-control" cols="30" rows="10">{{old('description') ?? $categories->description }}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Featured<code>*</code></label>
                            <input type="checkbox"  name="featured" value="1"  {{$categories->featured == 1 ? "checked" : ''}}>
                            @error('featured')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Status<code>*</code></label>
                            <input type="checkbox"  name="status" value="1" {{$categories->status == 1 ? "checked" : ''}}>
                            @error('status')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Image</label>
                            <input type="file" accept="image/*"  name="image" class="form-control" onchange="readURL(this)">
                            <img src="" height="200px" width="250px" id="selectedImage" style="display: none;">
                            <td> @if($categories->image)<img src="{{$categories->image_path}}" height="75px" width="75px"> @endif</td>
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
    $("#selectedImage").change(function() {
        readURL(this);
    });
</script>
@endsection