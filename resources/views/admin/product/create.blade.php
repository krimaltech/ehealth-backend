@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add</span> -Product</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('product.index') }}" class="breadcrumb-item">Product</a>
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
        <form method="POST" action="{{ route('product.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Product Name<code>*</code></label>
                            <input type="text" class="form-control" name="productName" value="{{ old('productName') }}" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Category<code>*</code></label>
                            <select name="category_id" class="form-control">
                                @php
                                    echo $categories_dropdown;
                                @endphp
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                           @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Brand</label>
                        <select name="brand" class="form-control">
                            <option value="" disabled selected>Select</option>
                            @foreach ($brand as $item)
                            @if (old('brand') == $item->id)
                            <option value="{{$item->id}}" selected>{{$item->brand_name}}</option> 
                            @else
                            <option value="{{$item->id}}">{{$item->brand_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Unit<code>*</code></label>
                            <select name="unit" class="form-control" required>
                                <option value="" selected disabled>Select Unit</option>
                                <option value="packet">Packet</option>
                                <option value="piece">Piece</option>
                                <option value="kg">K.G</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Actual Rate*:</label>
                        <input type="number" min="0" name="actualRate" value="{{ old('actualRate') }}" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>Discount Or Stock  (%)</label>
                        <input type="number" min="0" name="discountPercent" value="{{ old('discountPercent') }}" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>Selling Price</label>
                        <input type="number" min="0" name="sale_price" value="{{ old('sale_price') }}" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>Quantity:<code>*</code></label>
                        <input type="number" min="0" name="stock" value="{{ old('stock') }}" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label>Featured <code>*</code></label>
                        <select name="featured" class="form-control">
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>
                    @if (Helper::is_phaymacy() == "2")
                    <div class="col-md-3">
                        <label>Drug Type</label>
                        <select name="drug_type" class="form-control">
                            <option value=""><--select--></option>
                            <option value="Narcotics">Narcotics</option>
                            <option value="Anti-Narcotics">Anti-Narcotics</option>
                        </select>
                    </div>
                    @endif
                    <div class="col-md-4">
                        <label>Product Stock?</label>
                        <select name="have_stock" class="form-control">
                            <option value="0">Out Of Stock</option>
                            <option value="1">In Stock</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Featured Image: <code>*</code></label>
                        <input type="file" name="image" value="{{ old('image') }}" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>Tags:</label>
                        <select name="tags[]" id="" class="form-control multiselect" multiple="multiple">
                            @foreach ($tags as $item)
                                <option value="{{$item->id}}">{{$item->tag_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @if (Helper::is_phaymacy() == "2")
                    <div class="col-md-4">
                        <label>Size</label>
                        <select name="size" class="form-control">
                            <option value=""><--select--></option>
                            <option value="xs">XS</option>
                            <option value="s">S</option>
                            <option value="m">M</option>
                            <option value="l">L</option>
                            <option value="xl">Xl</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Color</label>
                        <select name="color" class="form-control">
                            <option value=""><--select--></option>
                            <option value="red">Red</option>
                            <option value="white">White</option>
                            <option value="black">Black</option>
                            <option value="green">Green</option>
                            <option value="blue">Blue</option>
                            <option value="grey">Grey</option>
                        </select>
                    </div>
                    @endif
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Short Description *:</label>    
                            <textarea name="shortDesc" rows="3" class="summernote form-control" required>{{ old('shortDesc') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>More Details ( थप / लामो विवरण ):</label>
                            <textarea name="description" class="summernote form-control" cols="30" rows="10">{!! old('description') !!}</textarea>
                        </div>
                    </div>
                    @if (Helper::is_phaymacy() == "2")
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Precaution</label>
                            <textarea name="precaution" class="summernote form-control" cols="30" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Side Effect</label>
                            <textarea name="side_effect" class="summernote form-control" cols="30" rows="8"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">How To Use</label>
                            <textarea name="how_to_use" class="summernote form-control" cols="30" rows="8"></textarea>
                        </div>
                    </div>
                        @endif
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
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
@endsection
