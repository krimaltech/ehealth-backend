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
                    <a href="{{ route('rejectReport.show',$rejectReport->id) }}" class="breadcrumb-item">View</a>
                    <span class="breadcrumb-item active">
                        Edit Uploaded Test
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
                @if($type == 'profile')
                    {{$profile->profile_name}}
                @elseif($type == 'test')
                    {{$test->tests}}
                @endif
            </h6>            
        </div>
        <form action="{{route('rejectReport.update',$rejectReport->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <input type="hidden" name="type" value="{{$type}}">
            <div class="card-body">
                <div class="row">
                    @foreach ($tests as $item)
                        @if($item->labtest->test_result_type == 'Range')
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>{{$item->labtest->tests}}</h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <tr>
                                                <th width="50%">Range</th>
                                                <td>{{$item->min_range}} - {{$item->max_range}}</td>
                                            </tr>
                                            <tr>
                                                <th width="50%">Unit</th>
                                                <td>{{$item->labtest->unit}}</td>
                                            </tr>
                                            <tr>
                                                <th width="50%">Value</th>
                                                <td>
                                                    <input type="number" id="value" name="value[{{$item->id}}]" class="form-control" step="any" value="{{$item->value}}" required>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @elseif($item->labtest->test_result_type == 'Value')
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>{{$item->labvalue->result_name}}</h6>
                                    </div>
                                    <div class="card-body">
                                        <label for="">Result</label>
                                        <textarea name="value[{{$item->id}}]" cols="30" rows="3" class="form-control" required>{{$item->result}}</textarea>
                                    </div>
                                </div>
                            </div>
                        @elseif($item->labtest->test_result_type == 'Value and Image')
                            @if($item->labvalue != null)
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-header">
                                        <h6>{{$item->labvalue->result_name}}</h6>
                                    </div>
                                    <div class="card-body">
                                        <label for="">Result</label>
                                        <textarea name="value[{{$item->id}}]" cols="30" rows="3" class="form-control" required>{{$item->result}}</textarea>
                                    </div>
                                </div>
                            </div>
                            @else
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="">Uploaded Report</label>
                                            <div id="report">
                                                <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe><br>
                                                View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                            </div>  
                                        </div>
                                        <div class="col-md-6">
                                            <label for="">Reupload and Update Report</label>
                                            <div id="report">
                                                <input type="file" class="file-input" name="value[{{$item->id}}]">
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @elseif($item->labtest->test_result_type == 'Image')
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Uploaded Report</label>
                                        <div id="report">
                                            <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe><br>
                                            View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                        </div>  
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Reupload and Update Report</label>
                                        <div id="report">
                                            <input type="file" class="file-input" name="value[{{$item->id}}]" required>
                                        </div>  
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
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
