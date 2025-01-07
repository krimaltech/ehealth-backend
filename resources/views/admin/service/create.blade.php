@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add</span> -Service</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('service.index') }}" class="breadcrumb-item">Service</a>
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
        .btn-file{
            z-index:0 !important;
        }
        .tests .table th{
            text-align: center;
        }
        .tests tbody td{
            padding:3px;
        }
    </style>
    <div class="card tests">
        <form method="POST" action="{{ route('service.store') }}" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Service Name<code>*</code></label>
                            <input type="text" class="form-control" name="service_name" value="{{ old('service_name') }}">
                            @error('service_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Description<code>*</code></label>
                            <textarea name="description" id="summernote" cols="30" rows="10">{{old('description')}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-label">Image<code>*</code></label>
                            <input type="file" class="file-input" name="image">
                            @error('image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Test Result Type <code>*</code></label>
                            <select name="test_result_type" id="test_result_type" class="form-control" >
                                <option value="" selected disabled>--Select Test Result Type--</option>
                                <option value="Range">Range</option>
                                <option value="Value">Value</option>
                                <option value="Image">Image</option>
                                <option value="Value and Image">Value and Image</option>
                            </select>
                            @error('test_result_type')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 range" style="display:none">
                        <div class="form-group">
                            <h4>Add Test Particulars</h4>
                            <table class="table table-responsive table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2">Tests</th>
                                        <th colspan="3">Male Range</th>
                                        <th colspan="3">Female Range</th>
                                        <th colspan="3">Child Range</th>
                                        <th rowspan="2">Unit</th>
                                        <th rowspan="2">Price</th>
                                        <th rowspan="2" style="text-align: center"><button type="button" class="btn btn-success addBtn" ><i class="icon-plus2"></i></button></th>
                                    </tr>
                                    <tr>
                                        <th>Normal</th>
                                        <th>Amber</th>
                                        <th>Risk</th>
                                        <th>Normal</th>
                                        <th>Amber</th>
                                        <th>Risk</th>
                                        <th>Normal</th>
                                        <th>Amber</th>
                                        <th>Risk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="range_test">
                                        <td><input type="text" name="tests[]" class="form-control" placeholder="Test Name" ></td>
                                        <td><input type="text" name="male_min_range[]" class="form-control" placeholder="Min Range" ><input type="text" name="male_max_range[]" class="form-control" placeholder="Max Range" ></td>
                                        <td><input type="text" name="male_amber_min_range[]" class="form-control" placeholder="Min Range" ><input type="text" name="male_amber_max_range[]" class="form-control" placeholder="Max Range" ></td>
                                        <td><input type="text" name="male_red_min_range[]" class="form-control" placeholder="Min Range" ><input type="text" name="male_red_max_range[]" class="form-control" placeholder="Max Range" ></td>
                                        <td><input type="text" name="female_min_range[]" class="form-control" placeholder="Min Range" ><input type="text" name="female_max_range[]" class="form-control" placeholder="Max Range" ></td>
                                        <td><input type="text" name="female_amber_min_range[]" class="form-control" placeholder="Min Range" ><input type="text" name="female_amber_max_range[]" class="form-control" placeholder="Max Range" ></td>
                                        <td><input type="text" name="female_red_min_range[]" class="form-control" placeholder="Min Range" ><input type="text" name="female_red_max_range[]" class="form-control" placeholder="Max Range" ></td>
                                        <td><input type="text" name="child_min_range[]" class="form-control" placeholder="Min Range" ><input type="text" name="child_max_range[]" class="form-control" placeholder="Max Range" ></td>
                                        <td><input type="text" name="child_amber_min_range[]" class="form-control" placeholder="Min Range" ><input type="text" name="child_amber_max_range[]" class="form-control" placeholder="Max Range" ></td>
                                        <td><input type="text" name="child_red_min_range[]" class="form-control" placeholder="Min Range" ><input type="text" name="child_red_max_range[]" class="form-control" placeholder="Max Range" ></td>
                                        <td><input type="text" name="unit[]" class="form-control" placeholder="Unit" ></td>
                                        <td><input type="text" name="range_price[]" class="form-control" placeholder="Price" ></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-lg-4 price" style="display:none">
                        <div class="form-group">
                            <label class="form-label">Price<code>*</code></label>
                            <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                            @error('price')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12 value" style="display:none">
                        <div class="form-group">
                            <h4>Add Test Particulars</h4>
                            <button type="button" class="btn btn-success valueBtn py-0 px-1 mb-2" ><i class="icon-plus2"></i></button>
                            <div class="row test">
                                <div class="col-md-4 mb-1">
                                    <div class="form-group test_value">
                                        <label for="">Tests</label>
                                        <input type="text" class="form-control" name="values[]"  placeholder="Test Particular Name" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 image" style="display:none">
                        <div class="form-group">
                            <h4>Add Test Particulars</h4>
                            <button type="button" class="btn btn-success imageBtn py-0 px-1 mb-2" ><i class="icon-plus2"></i></button>
                            <div class="row image_test">
                                <div class="col-md-4 mb-1">
                                    <div class="form-group image_value">
                                        <label for="">Tests</label>
                                        <input type="text" class="form-control" name="testvalues[]"  placeholder="Test Particular Name">
                                    </div>
                                </div>
                            </div>
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
        $('#summernote').summernote()
    })
</script>
<script>
    $('#test_result_type').change(function(){
        let type = $(this).val();
        if(type == 'Range'){
            $('.range').css('display','block');
            $('.value').css('display','none');
            $('.image').css('display','none');
            $('.price').css('display','none');
            $('.range_test').find('input').attr("required", true);
            $('.price').find('input').attr("required", false);
            $('.test_value').find('input').attr("required", false);
            $('.image_value').find('input').attr("required", false);
        }else if(type == 'Value'){
            $('.value').css('display','block');
            $('.price').css('display','block');
            $('.range').css('display','none');
            $('.image').css('display','none');
            $('.test_value').find('input').attr("required", true);
            $('.price').find('input').attr("required", true);
            $('.range_test').find('input').attr("required", false);
            $('.image_value').find('input').attr("required", false);
        }else if(type == 'Value and Image'){
            $('.image').css('display','block');
            $('.price').css('display','block');
            $('.value').css('display','none');
            $('.range').css('display','none');
            $('.image_value').find('input').attr("required", true);
            $('.price').find('input').attr("required", true);
            $('.test_value').find('input').attr("required", false);
            $('.range_test').find('input').attr("required", false);
        }else if(type == 'Image'){
            $('.price').css('display','block');
            $('.range').css('display','none');
            $('.value').css('display','none');
            $('.image').css('display','none');
            $('.price').find('input').attr("required", true);
            $('.test_value').find('input').attr("required", false);
            $('.range_test').find('input').attr("required", false);
            $('.image_value').find('input').attr("required", false);
        }
    })
</script>
<script>
    $(document).ready(function(){
        $('.valueBtn').on('click',function(){
            var tr = '<div class="col-md-4 mb-1">' +
                       ' <div class="form-group test_value">' +
                            '<label for="">Tests</label>' +
                            '<button type="button" class="btn btn-danger removeBtn px-1 py-0 float-right" ><i class="icon-minus2"></i></button>'+
                            '<input type="text" class="form-control" name="values[]" placeholder="Test Particular Name">' +
                       ' </div>' +
                    '</div>';
            $('.test').append(tr);
            $('.test_value').find('input').attr("required", true);
        })
        $('.test').on('click', '.removeBtn', function() {
            $(this).parent().parent().remove();
        });
    })
</script>
<script>
    $(document).ready(function(){
        $('.imageBtn').on('click',function(){
            var tr = '<div class="col-md-4 mb-1">' +
                       ' <div class="form-group image_value">' +
                            '<label for="">Tests</label>' +
                            '<button type="button" class="btn btn-danger removeBtn px-1 py-0 float-right" ><i class="icon-minus2"></i></button>'+
                            '<input type="text" class="form-control" name="testvalues[]" placeholder="Test Particular Name">' +
                       ' </div>' +
                    '</div>';
            $('.image_test').append(tr);
            $('.image_value').find('input').attr("required", true);
        })
        $('.image_test').on('click', '.removeBtn', function() {
            $(this).parent().parent().remove();
        });
    })
</script>
<script>
    $(document).ready(function(){
        $('.addBtn').on('click',function(){
            var tr = '<tr class="range_test">' +
                '<td><input type="text" name="tests[]" class="form-control" placeholder="Test Name"></td>' +
                '<td><input type="text" name="male_min_range[]" class="form-control" placeholder="Min Range"><input type="text" name="male_max_range[]" class="form-control" placeholder="Max Range"></td>' +
                '<td><input type="text" name="male_amber_min_range[]" class="form-control" placeholder="Min Range"><input type="text" name="male_amber_max_range[]" class="form-control" placeholder="Max Range"></td>' +
                '<td><input type="text" name="male_red_min_range[]" class="form-control" placeholder="Min Range"><input type="text" name="male_red_max_range[]" class="form-control" placeholder="Max Range"></td>' +
                '<td><input type="text" name="female_min_range[]" class="form-control" placeholder="Min Range"><input type="text" name="female_max_range[]" class="form-control" placeholder="Max Range"></td>' +
                '<td><input type="text" name="female_amber_min_range[]" class="form-control" placeholder="Min Range"><input type="text" name="female_amber_max_range[]" class="form-control" placeholder="Max Range"></td>' +
                '<td><input type="text" name="female_red_min_range[]" class="form-control" placeholder="Min Range"><input type="text" name="female_red_max_range[]" class="form-control" placeholder="Max Range"></td>' +
                '<td><input type="text" name="child_min_range[]" class="form-control" placeholder="Min Range"><input type="text" name="child_max_range[]" class="form-control" placeholder="Max Range"></td>' +
                '<td><input type="text" name="child_amber_min_range[]" class="form-control" placeholder="Min Range"><input type="text" name="child_amber_max_range[]" class="form-control" placeholder="Max Range"></td>' +
                '<td><input type="text" name="child_red_min_range[]" class="form-control" placeholder="Min Range"><input type="text" name="child_red_max_range[]" class="form-control" placeholder="Max Range"></td>' +
                '<td><input type="text" name="unit[]" class="form-control" placeholder="Unit"></td>' +
                '<td><input type="text" name="range_price[]" class="form-control" placeholder="Price"></td>' +
                '<td style="text-align: center"><button type="button" class="btn btn-danger removeBtn" ><i class="icon-minus2"></i></button></td>' +
                '</tr>';
            $('tbody').append(tr);
            $('.range_test').find('input').attr("required", true);
        })
        $("tbody").on('click', '.removeBtn', function() {
            $(this).parent().parent().remove();
        });
    })
</script>
<script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
<script src="/global_assets/js/demo_pages/fileinput.min.js"></script>
@endsection
