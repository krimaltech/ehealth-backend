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
        <form method="POST" action="{{ route('product.update',$product->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Product Name<code>*</code></label>
                            <input type="text" class="form-control" name="productName" value="{{ $product->productName }}" required>
                            @error('productName')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Category<code>*</code></label>
                            <select name="category_id" class="form-control" required>
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
                            <option value="">Brand</option>
                            @foreach($brand as $item)
                            <option value="{{$item->id}}" {{$item->id == $product->brand ? 'selected' : ' '}}> {{$item->brand_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Unit<code>*</code></label>
                            <select name="unit" class="form-control">

                                <option value="" selected disabled>Select Unit</option>
                                <option value="packet" @if ($product->unit == 'packet') selected @endif>Packet</option>
                                <option value="piece" @if ($product->unit == 'piece') selected @endif>Piece</option>
                                <option value="kg" @if ($product->unit == 'kg') selected @endif>K.G</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Actual Rate*:</label>
                        <input type="number" min="0" name="actualRate" value="{{ $product->actualRate }}" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <label>Discount Or Stock (%)</label>
                        <input type="number" min="0" name="discountPercent" value="{{ $product->discountPercent }}" class="form-control">
                    </div>
                    <div class="col-md-3">
                        <label>Selling Price</label>
                        <input type="number" min="0" name="sale_price" value="{{ $product->sale_price }}" class="form-control" required>
                    </div>
                    <div class="col-md-3">
                        <label>Quantity:<code>*</code></label>
                        <input type="number" min="0" name="stock" value="{{ $product->stock }}" class="form-control" required disabled>
                    </div>
                    <div class="col-md-3">
                        <label>Featured <code>*</code></label>
                        <select name="featured" class="form-control">
                            <option value="0"  @if ($product->featured == '0') selected @endif>No</option>
                            <option value="1"  @if ($product->featured == '1') selected @endif>Yes</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Drug Type</label>
                        <select name="drug_type" class="form-control">
                            <option value=""><--select--></option>
                            <option value="Narcotics" @if ($product->drug_type == 'Narcotics') selected @endif>Narcotics</option>
                            <option value="Anti-Narcotics" @if ($product->drug_type == 'Anti-Narcotics') selected @endif>Anti-Narcotics</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Product Stock?</label>
                        <select name="have_stock" class="form-control">
                            <option value="0"  @if ($product->have_stock == '0') selected @endif>Out Of Stock</option>
                            <option value="1"  @if ($product->have_stock == '1') selected @endif>In Stock</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Tags:</label>
                        <select name="tags[]" id="" class="form-control multiselect" multiple="multiple">
                            @foreach($tags as $item)
                            @if ($product->tags == NULL)
                            <option value="{{$item->id}}"> {{$item->tag_name}}</option>
                            @else
                            <option value="{{$item->id}}" @if(in_array($item->id,$product->tags)) selected @endif> {{$item->tag_name}}</option>
                            @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Size</label>
                        <select name="size" class="form-control">
                            <option value=""><--select--></option>
                            <option value="xs" @if ($product->size == 'xs') selected @endif>XS</option>
                            <option value="s" @if ($product->size == 's') selected @endif>S</option>
                            <option value="m" @if ($product->size == 'm') selected @endif>M</option>
                            <option value="l" @if ($product->size == 'l') selected @endif>L</option>
                            <option value="xl" @if ($product->size == 'xl') selected @endif>Xl</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Color</label>
                        <select name="color" class="form-control">
                            <option value=""><--select--></option>
                            <option value="red" @if ($product->color == 'red') selected @endif>Red</option>
                            <option value="white" @if ($product->color == 'white') selected @endif>White</option>
                            <option value="black" @if ($product->color == 'black') selected @endif>Black</option>
                            <option value="green" @if ($product->color == 'green') selected @endif>Green</option>
                            <option value="blue" @if ($product->color == 'blue') selected @endif>Blue</option>
                            <option value="grey" @if ($product->color == 'grey') selected @endif>Grey</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Featured Image: <code>*</code></label>
                        <input type="file" name="image" value="{{ old('image') }}" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Short Description*:</label>    
                            <textarea name="shortDesc" autofocus="autofocus rows="3" class="summernote form-control" required>{{ $product->shortDesc }}</textarea>
                            @error('shortDesc')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>More Details ( थप / लामो विवरण ):</label>
                            <textarea name="description" class="summernote form-control" cols="30" rows="10">{{ $product->description }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Precaution</label>
                            <textarea name="precaution" class="summernote form-control" cols="30" rows="8">{{ $product->precaution }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Side Effect</label>
                            <textarea name="side_effect" class="summernote form-control" cols="30" rows="8">{{ $product->side_effect }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">How To Use</label>
                            <textarea name="how_to_use" class="summernote form-control" cols="30" rows="8">{{ $product->how_to_use }}</textarea>
                        </div>
                    </div>
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
    <!-- Summernote -->
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