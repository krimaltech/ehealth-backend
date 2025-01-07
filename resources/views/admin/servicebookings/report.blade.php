@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Test Report</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{route('servicebookings.index')}}" class="breadcrumb-item">Lab Test Report</a>
                    <span class="breadcrumb-item active">Test Report</span>
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

        /* Apply this to your `table` element. */
        #page {
            border-collapse: collapse;
        }

        /* And this to your table's `td` elements. */
        #page td {
            padding: 5px;
            margin: 0;
        }

        .fileinput-upload{
            display: none;
        }
        .btn-file{
            z-index:0 !important;
        }
    </style>
    <div class="card">
        <form method="POST" action="{{route('servicebookings.uploadReport')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="book_id" value="{{$service->id}}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h4>User Details</h4>
                        <div class="my-4">
                            <p><b>Name :</b> {{$service->member->user->name}}<br/></p>
                            <p><b>Email :</b> {{$service->member->user->email}}<br/></p>
                            <p><b>Phone :</b> {{$service->member->user->phone}}<br/></p>
                            <p><b>DOB :</b> {{$service->member->dob}}<br/></p>
                            <p><b>Gender :</b> {{$service->member->gender}}<br/></p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h4>Service Details: {{$service->service->service_name}}</h4>
                        <input type="hidden" name="test_result_type" value="{{$service->service->test_result_type}}">
                        @if ($service->service->test_result_type == 'Range')
                            <div class="test_result">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-bordered table-hover" id="page">
                                            <thead>
                                                <tr style="background-color:#063B9D; color:white">
                                                    <th>Test</th>
                                                    <th>Range</th>
                                                    <th>Unit</th>
                                                    <th>Result</th>
                                                </tr>
                                            </thead>
                                            <tbody id="results">  
                                                @foreach ($service->tests as $item)
                                                <tr>
                                                    <input type="hidden" name="test_id[{{$item->test->id}}]" value="{{$item->test->id}}">
                                                    <td>{{$item->test->tests}}</td>
                                                    @if(\Carbon\Carbon::now()->format('Y') - substr($service->member->dob,0,4) <= 16)
                                                        <td>{{$item->test->child_min_range}} - {{$item->test->child_max_range}}</td>
                                                        <input type="hidden" name="min_range[{{$item->test->id}}]" value="{{$item->test->child_min_range}}">
                                                        <input type="hidden" name="max_range[{{$item->test->id}}]" value="{{$item->test->child_max_range}}">
                                                    @elseif($service->member->gender == 'Female')
                                                        <td>{{$item->test->female_min_range}} - {{$item->test->female_max_range}}</td>
                                                        <input type="hidden" name="min_range[{{$item->test->id}}]" value="{{$item->test->female_min_range}}">
                                                        <input type="hidden" name="max_range[{{$item->test->id}}]" value="{{$item->test->female_max_range}}">
                                                    @elseif($service->member->gender == 'Male' || $service->member->gender == 'Other')
                                                        <td>{{$item->test->male_min_range}} - {{$item->test->male_max_range}}</td>
                                                        <input type="hidden" name="min_range[{{$item->test->id}}]" value="{{$item->test->male_min_range}}">
                                                        <input type="hidden" name="max_range[{{$item->test->id}}]" value="{{$item->test->male_max_range}}">
                                                    @endif
                                                    <td>{{$item->test->unit}}</td>
                                                    <td>
                                                        <input type="text" name="value[{{$item->test->id}}]" value="{{$item->value}}" class="form-control" required>
                                                    </td>
                                                </tr> 
                                                @endforeach                                            
                                                {{-- @foreach ($service->service->tests as $item)
                                                <tr>
                                                    <input type="hidden" name="test_id[{{$item->id}}]" value="{{$item->id}}">
                                                    <td>{{$item->tests}}</td>
                                                    @if(\Carbon\Carbon::now()->format('Y') - substr($service->member->dob,0,4) <= 16)
                                                        <td>{{$item->child_min_range}} - {{$item->child_max_range}}</td>
                                                        <input type="hidden" name="min_range[{{$item->id}}]" value="{{$item->child_min_range}}">
                                                        <input type="hidden" name="max_range[{{$item->id}}]" value="{{$item->child_max_range}}">
                                                    @elseif($service->member->gender == 'Female')
                                                        <td>{{$item->female_min_range}} - {{$item->female_max_range}}</td>
                                                        <input type="hidden" name="min_range[{{$item->id}}]" value="{{$item->female_min_range}}">
                                                        <input type="hidden" name="max_range[{{$item->id}}]" value="{{$item->female_max_range}}">
                                                    @elseif($service->member->gender == 'Male' || $service->member->gender == 'Other')
                                                        <td>{{$item->male_min_range}} - {{$item->male_max_range}}</td>
                                                        <input type="hidden" name="min_range[{{$item->id}}]" value="{{$item->male_min_range}}">
                                                        <input type="hidden" name="max_range[{{$item->id}}]" value="{{$item->male_max_range}}">
                                                    @endif
                                                    <td>{{$item->unit}}</td>
                                                    <td>
                                                        <input type="text" name="value[{{$item->id}}]" value="{{$item->value}}" class="form-control" required>
                                                    </td>
                                                </tr> 
                                                @endforeach                                             --}}
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @elseif($service->service->test_result_type == 'Value')
                            <div class="test_result">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-bordered table-hover" id="page">
                                            <thead>
                                                <tr style="background-color:#063B9D; color:white">
                                                    <th>Test Particulars</th>
                                                    <th>Result</th>
                                                </tr>
                                            </thead>
                                            <tbody id="results">  
                                                @foreach ($service->service->tests as $item)
                                                <tr>
                                                    <input type="hidden" name="test_id[{{$item->id}}]" value="{{$item->id}}">
                                                    <td>{{$item->tests}}</td>
                                                    <td>
                                                        <textarea name="result[{{$item->id}}]" id="" cols="30" rows="3" class="form-control"></textarea>
                                                    </td>
                                                </tr> 
                                                @endforeach                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @elseif($service->service->test_result_type == 'Value and Image')
                            <div class="test_result">
                                <div class="row">
                                    <div class="col-md-6">
                                        <table class="table table-bordered table-hover" id="page">
                                            <thead>
                                                <tr style="background-color:#063B9D; color:white">
                                                    <th>Test Particular</th>
                                                    <th>Result</th>
                                                </tr>
                                            </thead>
                                            <tbody id="results">  
                                                @foreach ($service->service->tests as $item)
                                                <tr>
                                                    <input type="hidden" name="test_id[{{$item->id}}]" value="{{$item->id}}">
                                                    <td>{{$item->tests}}</td>
                                                    <td>
                                                        <textarea name="result[{{$item->id}}]" id="" cols="30" rows="3" class="form-control"></textarea>
                                                    </td>
                                                </tr> 
                                                @endforeach                                            
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="upload_report my-3">
                                <div class="row">
                                    <div class="col-md-8 text-center">
                                        <div class="form-group">
                                            <label for="">Upload Report</label>
                                            <input type="file" class="file-input" name="report" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @elseif($service->service->test_result_type == 'Image')
                            <div class="upload_report my-3">
                                <div class="row">
                                    <div class="col-md-8 text-center">
                                        <div class="form-group">
                                            <label for="">Upload Report</label>
                                            <input type="file" class="file-input" name="report" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        {{-- @if(!$service->service->tests->isEmpty())
                        <div class="test_result">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered table-hover" id="page">
                                        <thead>
                                            <tr style="background-color:#063B9D; color:white">
                                                <th class="col-md-3">Test</th>
                                                <th class="col-md-3">Range</th>
                                                <th class="col-md-3">Unit</th>
                                                <th class="col-md-3">Result</th>
                                            </tr>
                                        </thead>
                                        <tbody id="results">  
                                            @foreach ($service->service->tests as $item)
                                             <tr>
                                                <input type="hidden" name="test_id[{{$item->id}}]" value="{{$item->id}}">
                                                <td>{{$item->tests}}</td>
                                                @if(\Carbon\Carbon::now()->format('Y') - substr($service->member->dob,0,4) <= 16)
                                                    <td>{{$item->child_min_range}} - {{$item->child_max_range}}</td>
                                                    <input type="hidden" name="min_range[{{$item->id}}]" value="{{$item->child_min_range}}">
                                                    <input type="hidden" name="max_range[{{$item->id}}]" value="{{$item->child_max_range}}">
                                                @elseif($service->member->gender == 'Female')
                                                    <td>{{$item->female_min_range}} - {{$item->female_max_range}}</td>
                                                    <input type="hidden" name="min_range[{{$item->id}}]" value="{{$item->female_min_range}}">
                                                    <input type="hidden" name="max_range[{{$item->id}}]" value="{{$item->female_max_range}}">
                                                @elseif($service->member->gender == 'Male' || $service->member->gender == 'Other')
                                                    <td>{{$item->male_min_range}} - {{$item->male_max_range}}</td>
                                                    <input type="hidden" name="min_range[{{$item->id}}]" value="{{$item->male_min_range}}">
                                                    <input type="hidden" name="max_range[{{$item->id}}]" value="{{$item->male_max_range}}">
                                                @endif
                                                <td>{{$item->unit}}</td>
                                                <td>
                                                    <input type="text" name="value[{{$item->id}}]" value="{{$item->value}}" class="form-control" required>
                                                </td>
                                            </tr> 
                                            @endforeach                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="upload_report">
                            <div class="row">
                                <div class="col-md-8 text-center">
                                    <div class="form-group">
                                        <label for="">Upload Report</label>
                                        <input type="file" class="file-input" name="report" >
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif --}}
                    </div>
                </div>
            </div>
           
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>

        </form>
    </div>
@endsection

@section('custom-script')
    <script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
    <script src="/global_assets/js/demo_pages/fileinput.min.js"></script>
@endsection