@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Lab Test</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('labtest.index') }}" class="breadcrumb-item">Lab Test</a>
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
        <form method="POST" action="{{ route('labtest.store') }}" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Lab Department<code>*</code></label>
                            <select name="department_id" id="" class="form-control" required>
                                <option value="">--Select Lab Department--</option>
                                @foreach ($labdepartment as $item)
                                    <option value="{{$item->id}}" {{old('department_id') == $item->id ? 'selected' : ''}}>{{$item->department}}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Lab Profile</label>
                            <select name="profile_id" id="" class="form-control">
                                <option value="">--Select Lab Profile--</option>
                                @foreach ($labprofile as $item)
                                    <option value="{{$item->id}}" {{old('profile_id') == $item->id ? 'selected' : ''}}>{{$item->profile_name}}</option>
                                @endforeach
                            </select>
                            @error('profile_id')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Lab Test Name<code>*</code></label>
                            <input type="text" class="form-control" required  name="tests" value="{{ old('tests') }}">
                            @error('tests')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Test Code<code>*</code></label>
                            <input type="text" class="form-control" required  name="code" value="{{ old('code') }}">
                            @error('code')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Unit</label>
                            <input type="text" name="unit" class="form-control" value="{{ old('unit') }}" >
                            @error('unit')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Price</label>
                            <input type="number" class="form-control" name="price" min='0' value="{{ old('price') }}" >
                            @error('price')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Test Result Type <code>*</code></label>
                            <select name="test_result_type" id="test_result_type" class="form-control" required>
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
                </div>
            </div>
            <div class="card-body range" style="display:none">
                <h6><b>Add Range</b></h6>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <th rowspan="2">Type</th>
                            <th colspan="2" class="text-center">Normal Range</th>
                            <th colspan="2" class="text-center">Amber Range</th>
                            <th colspan="2" class="text-center">Risk Range</th>
                        </tr>
                        <tr>
                            <th class="text-center">Min Range</th>
                            <th class="text-center">Max Range</th>
                            <th class="text-center">Min Range</th>
                            <th class="text-center">Max Range</th>
                            <th class="text-center">Min Range</th>
                            <th class="text-center">Max Range</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Male</td>
                            <td><input type="text" name="male_min_range" class="form-control"></td>
                            <td><input type="text" name="male_max_range" class="form-control"></td>
                            <td><input type="text" name="male_amber_min_range" class="form-control"></td>
                            <td><input type="text" name="male_amber_max_range" class="form-control"></td>
                            <td><input type="text" name="male_red_min_range" class="form-control"></td>
                            <td><input type="text" name="male_red_max_range" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Female</td>
                            <td><input type="text" name="female_min_range" class="form-control"></td>
                            <td><input type="text" name="female_max_range" class="form-control"></td>
                            <td><input type="text" name="female_amber_min_range" class="form-control"></td>
                            <td><input type="text" name="female_amber_max_range" class="form-control"></td>
                            <td><input type="text" name="female_red_min_range" class="form-control"></td>
                            <td><input type="text" name="female_red_max_range" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Child</td>
                            <td><input type="text" name="child_min_range" class="form-control"></td>
                            <td><input type="text" name="child_max_range" class="form-control"></td>
                            <td><input type="text" name="child_amber_min_range" class="form-control"></td>
                            <td><input type="text" name="child_amber_max_range" class="form-control"></td>
                            <td><input type="text" name="child_red_min_range" class="form-control"></td>
                            <td><input type="text" name="child_red_max_range" class="form-control"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-body value" style="display:none">
                <div class="form-group">
                    <h6 class="d-inline mr-3"><b>Add Test Particulars</b></h6>
                    <button type="button" class="btn btn-success valueBtn py-0 px-1 mb-2" ><i class="icon-plus2"></i></button>
                    <div class="row test">
                        <div class="col-md-4 mb-1">
                            <div class="form-group test_value">
                                <label for="">Tests</label>
                                <input type="text" class="form-control" name="result_name[]"  placeholder="Test Particular Name" >
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
    <script>
        $(document).ready(function() {
            $('#test_result_type').change(function(){
                let type = $(this).val();
                if(type == 'Range'){
                    $('.range').css('display','block');
                    $('.value').css('display','none');
                    $('.range').find('input').attr("required", true);
                    $('.value').find('input').attr("required", false);
                }else if(type == 'Value' || type == 'Value and Image'){
                    $('.value').css('display','block');
                    $('.range').css('display','none');
                    $('.value').find('input').attr("required", true);
                    $('.range').find('input').attr("required", false);
                }else if(type == 'Image'){
                    $('.range').css('display','none');
                    $('.value').css('display','none');
                    $('.value').find('input').attr("required", false);
                    $('.range').find('input').attr("required", false);
                } 
            })
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.valueBtn').on('click',function(){
                var tr = '<div class="col-md-4 mb-1">' +
                           ' <div class="form-group test_value">' +
                                '<label for="">Tests</label>' +
                                '<button type="button" class="btn btn-danger removeBtn px-1 py-0 float-right" ><i class="icon-minus2"></i></button>'+
                                '<input type="text" class="form-control" name="result_name[]" placeholder="Test Particular Name">' +
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
@endsection