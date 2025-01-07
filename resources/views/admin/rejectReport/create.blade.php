@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Rejected Pathology Report</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('rejectReport.index') }}" class="breadcrumb-item">Rejected Pathology Report</a>
                    <a href="{{ route('rejectReport.show',$rejectId) }}" class="breadcrumb-item">View</a>
                    <span class="breadcrumb-item active">
                        Edit Skipped Test
                    </span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<style>
    .fileinput-upload{
        display: none;
    }   
    .btn-file,.file-caption,.fileinput-remove{
        z-index:0 !important;
    }
</style>
    <div class="card">
        <div class="card-header">
            <h6>
                Edit 
                @if($skip->labprofile_id != null)
                    {{$skip->profile->profile_name}}
                @endif
                @if($skip->labtest_id != null)
                    {{$skip->test->tests}}
                @endif
            </h6>            
        </div>
        <form action="{{route('rejectReport.store',$skip->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="reject" value="{{$rejectId}}">
            <input type="hidden" name="type" value="{{$type}}">
            <div class="card-body">
                <div class="alert alert-info">
                    <p><span style="font-weight: 600">Skip Reason : </span>{!!$skip->skip_reason!!}</p>
                </div>
                @if($skip->labprofile_id != null)
                <div class="row">
                    @foreach ($skip->profile->labtest as $item)
                        @if($item->test_result_type == 'Range')
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>{{$item->tests}}</h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <input type="hidden" name="test_id[{{$item->id}}]" value="{{$item->id}}">
                                            <input type="hidden" name="test_result_type[{{$item->id}}]" value="{{$item->test_result_type}}">
                                            <tr>
                                                <th width="50%">Range</th>
                                                @if($age <= 16)
                                                    <input type="hidden" name="min_range[{{$item->id}}]" value="{{$item->child_min_range}}">
                                                    <input type="hidden" name="max_range[{{$item->id}}]" value="{{$item->child_max_range}}">
                                                    <input type="hidden" name="amber_min_range[{{$item->id}}]" value="{{$item->child_amber_min_range}}">
                                                    <input type="hidden" name="amber_max_range[{{$item->id}}]" value="{{$item->child_amber_max_range}}">
                                                    <input type="hidden" name="red_min_range[{{$item->id}}]" value="{{$item->child_red_min_range}}">
                                                    <input type="hidden" name="red_max_range[{{$item->id}}]" value="{{$item->child_red_max_range}}">
                                                    <td>{{$item->child_min_range}} - {{$item->child_max_range}}</td>
                                                @else
                                                    @if($gender == 'Male' || $gender == 'Other')
                                                        <input type="hidden" name="min_range[{{$item->id}}]" value="{{$item->male_min_range}}">
                                                        <input type="hidden" name="max_range[{{$item->id}}]" value="{{$item->male_max_range}}">
                                                        <input type="hidden" name="amber_min_range[{{$item->id}}]" value="{{$item->male_amber_min_range}}">
                                                        <input type="hidden" name="amber_max_range[{{$item->id}}]" value="{{$item->male_amber_max_range}}">
                                                        <input type="hidden" name="red_min_range[{{$item->id}}]" value="{{$item->male_red_min_range}}">
                                                        <input type="hidden" name="red_max_range[{{$item->id}}]" value="{{$item->male_red_max_range}}">
                                                        <td>{{$item->male_min_range}} - {{$item->male_max_range}}</td>
                                                    @else
                                                        <input type="hidden" name="min_range[{{$item->id}}]" value="{{$item->female_min_range}}">
                                                        <input type="hidden" name="max_range[{{$item->id}}]" value="{{$item->female_max_range}}">
                                                        <input type="hidden" name="amber_min_range[{{$item->id}}]" value="{{$item->female_amber_min_range}}">
                                                        <input type="hidden" name="amber_max_range[{{$item->id}}]" value="{{$item->female_amber_max_range}}">
                                                        <input type="hidden" name="red_min_range[{{$item->id}}]" value="{{$item->female_red_min_range}}">
                                                        <input type="hidden" name="red_max_range[{{$item->id}}]" value="{{$item->female_red_max_range}}">
                                                        <td>{{$item->female_min_range}} - {{$item->female_max_range}}</td>
                                                    @endif
                                                @endif
                                            </tr>
                                            <tr>
                                                <th width="50%">Unit</th>
                                                <td>{{$item->unit}}</td>
                                            </tr>
                                            <tr>
                                                <th width="50%">Value</th>
                                                <td>
                                                    <input type="number" name="value[{{$item->id}}]" class="form-control" step="any" required>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                @endif

                @if($skip->labtest_id != null)
                    <input type="hidden" id="test_id" name="test_id" value="{{$skip->test->id}}">
                    <input type="hidden" id="test_result_type" name="test_result_type" value="{{$skip->test->test_result_type}}">
                    @if($skip->test->test_result_type == 'Range')
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:#063B9D; color:white">
                                    <th width="25%">Test</th>
                                    <th width="25%">Range</th>
                                    <th width="25%">Unit</th>
                                    <th width="25%">Result</th>
                                </tr>
                            </thead>
                            <tbody id="results">  
                                <tr>
                                    <td>{{$skip->test->tests}}</td>
                                    @if($age <= 16)
                                        <input type="hidden" id="min_range" name="min_range" value="{{$skip->test->child_min_range}}">
                                        <input type="hidden" id="max_range" name="max_range" value="{{$skip->test->child_max_range}}">
                                        <input type="hidden" id="amber_min_range" name="amber_min_range" value="{{$skip->test->child_amber_min_range}}">
                                        <input type="hidden" id="amber_max_range" name="amber_max_range" value="{{$skip->test->child_amber_max_range}}">
                                        <input type="hidden" id="red_min_range" name="red_min_range" value="{{$skip->test->child_red_min_range}}">
                                        <input type="hidden" id="red_max_range" name="red_max_range" value="{{$skip->test->child_red_max_range}}">
                                        <td>{{$skip->test->child_min_range}} - {{$skip->test->child_max_range}}</td>
                                    @else
                                        @if($gender == 'Male' || $gender == 'Other')
                                            <input type="hidden" id="min_range" name="min_range" value="{{$skip->test->male_min_range}}">
                                            <input type="hidden" id="max_range" name="max_range" value="{{$skip->test->male_max_range}}">
                                            <input type="hidden" id="amber_min_range" name="amber_min_range" value="{{$skip->test->male_amber_min_range}}">
                                            <input type="hidden" id="amber_max_range" name="amber_max_range" value="{{$skip->test->male_amber_max_range}}">
                                            <input type="hidden" id="red_min_range" name="red_min_range" value="{{$skip->test->male_red_min_range}}">
                                            <input type="hidden" id="red_max_range" name="red_max_range" value="{{$skip->test->male_red_max_range}}">
                                            <td>{{$skip->test->male_min_range}} - {{$skip->test->male_max_range}}</td>
                                        @else
                                            <input type="hidden" id="min_range" name="min_range" value="{{$skip->test->female_min_range}}">
                                            <input type="hidden" id="max_range" name="max_range" value="{{$skip->test->female_max_range}}">
                                            <input type="hidden" id="amber_min_range" name="amber_min_range" value="{{$skip->test->female_amber_min_range}}">
                                            <input type="hidden" id="amber_max_range" name="amber_max_range" value="{{$skip->test->female_amber_max_range}}">
                                            <input type="hidden" id="red_min_range" name="red_min_range" value="{{$skip->test->female_red_min_range}}">
                                            <input type="hidden" id="red_max_range" name="red_max_range" value="{{$skip->test->female_red_max_range}}">
                                            <td>{{$skip->test->female_min_range}} - {{$skip->test->female_max_range}}</td>
                                        @endif
                                    @endif
                                    <td>{{$skip->test->unit}}</td>
                                    <td>
                                        <input type="number" id="value" name="value" class="form-control" step="any" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    @elseif($skip->test->test_result_type == 'Value')
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:#063B9D; color:white">
                                    <th width="25%">Test Particulars</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody id="results">  
                                @foreach ($skip->test->labvalue as $item)
                                    <tr>
                                        <input type="hidden" name="labvalue[]" value="{{$item->id}}">
                                        <input type="hidden" name="labvalue_id[{{$item->id}}]" value="{{$item->id}}">
                                        <td>{{$item->result_name}}</td>
                                        <td><textarea name="result[{{$item->id}}]" cols="30" rows="3" class="form-control" required></textarea></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @elseif($skip->test->test_result_type == 'Value and Image')
                        <table class="table table-bordered">
                            <thead>
                                <tr style="background-color:#063B9D; color:white">
                                    <th width="25%">Test Particulars</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody id="results">  
                                @foreach ($skip->test->labvalue as $item)
                                    <tr>
                                        <input type="hidden" name="labvalue[]" value="{{$item->id}}">
                                        <input type="hidden" name="labvalue_id[{{$item->id}}]" value="{{$item->id}}">
                                        <td>{{$item->result_name}}</td>
                                        <td><textarea name="result[{{$item->id}}]" cols="30" rows="3" class="form-control" required></textarea></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-3">
                            <label for="">Upload Report</label>
                            <input type="file" class="file-input" name="report" id="report" >
                        </div>
                    @elseif($skip->test->test_result_type == 'Image')
                        <label for="">Upload Report</label>
                        <input type="file" class="file-input" name="report" id="report" >
                    @endif
                @endif
            </div>
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection

@section('custom-script')
<script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
<script src="/global_assets/js/demo_pages/fileinput.min.js"></script>
@endsection
