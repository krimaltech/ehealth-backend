@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Lab Test Bookings</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{route('labtestbookings.index')}}" class="breadcrumb-item">Lab Test Bookings</a>
                    <span class="breadcrumb-item active">Upload Report</span>
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
        <form method="POST" action="{{route('labtestbookings.store')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="book_id" value="{{$bookings->id}}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h6><b>User Details</b></h6>
                        <div class="mt-4">
                            <p><b>Name :</b> {{$bookings->member->user->name}}<br/></p>
                            <p><b>Email :</b> {{$bookings->member->user->email}}<br/></p>
                            <p><b>Phone :</b> {{$bookings->member->user->phone}}<br/></p>
                            <p><b>DOB :</b> {{$bookings->member->dob}}<br/></p>
                            <p><b>Gender :</b> {{$bookings->member->gender}}<br/></p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h6><b>Booking Details</b></h6>
                        @if($bookings->labtest_id == null)
                        <div class="mt-4">
                            <p><b>Profile Name :</b> {{$bookings->labprofile->profile_name}}<br/></p>
                            <p><b>Department :</b> {{$bookings->labprofile->labdepartment->department}}<br/></p>
                            <p><b>Price :</b> Rs.{{$bookings->labprofile->price}}<br/></p>
                            <p><b>Included Tests :</b></p>
                            <ul>
                                @foreach ($bookings->labprofile->labtest as $item)
                                    <li>{{$item->tests}}</li>
                                @endforeach
                            </ul>
                            <p><b>Booked Date :</b> {{$bookings->date}}</p>
                            <p><b>Booked Time :</b> {{$bookings->time}}</p>
                        </div>
                        @endif
                        @if($bookings->labprofile_id == null)
                        <div class="mt-4">
                            <p><b>Lab Test Name :</b> {{$bookings->labtest->tests}}<br/></p>
                            <p><b>Department :</b> {{$bookings->labtest->labdepartment->department}}<br/></p>
                            <p><b>Price :</b> Rs.{{$bookings->labtest->price}}<br/></p>
                            <p><b>Booked Date :</b> {{$bookings->date}}</p>
                            <p><b>Booked Time :</b> {{$bookings->time}}</p>
                        </div>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <h6><b>Sample Details</b></h6>
                        <div class="mt-4">
                            <p><b>Sample No. :</b> {{$bookings->sample_no}}<br/></p>
                            <p><b>Sample Date :</b> {{\Carbon\Carbon::parse($bookings->sample_date)->format('Y/m/d g:i A')}}<br/></p>
                        </div>
                    </div>
                </div>
               
            </div>
            @if($bookings->labtest_id == null)
            <div class="card-body">
                <h6><b>Upload {{$bookings->labprofile->profile_name}} Report</b></h6>
                @foreach ($bookings->labprofile->labtest as $item)
                    <input type="hidden" name="test_result_type[{{$item->id}}]" value="{{$item->test_result_type}}">
                    @if ($item->test_result_type == 'Range')
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h6><b>Test Name: {{$item->tests}}</b></h6>
                                <table class="table table-bordered table-hover" >
                                    <thead>
                                        <tr style="background-color:#063B9D; color:white">
                                            <th>Test</th>
                                            <th>Range</th>
                                            <th>Unit</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>  
                                        <tr>
                                            <input type="hidden" name="labtest_id[{{$item->id}}]" value="{{$item->id}}">
                                            <td>{{$item->tests}}</td>
                                            @if(\Carbon\Carbon::now()->format('Y') - substr($bookings->member->dob,0,4) <= 16)
                                                <td>{{$item->child_min_range}} - {{$item->child_max_range}}</td>
                                                <input type="hidden" name="min_range[{{$item->id}}]" value="{{$item->child_min_range}}">
                                                <input type="hidden" name="max_range[{{$item->id}}]" value="{{$item->child_max_range}}">
                                            @elseif($bookings->member->gender == 'Female')
                                                <td>{{$item->female_min_range}} - {{$item->female_max_range}}</td>
                                                <input type="hidden" name="min_range[{{$item->id}}]" value="{{$item->female_min_range}}">
                                                <input type="hidden" name="max_range[{{$item->id}}]" value="{{$item->female_max_range}}">
                                            @elseif($bookings->member->gender == 'Male' || $bookings->member->gender == 'Other')
                                                <td>{{$item->male_min_range}} - {{$item->male_max_range}}</td>
                                                <input type="hidden" name="min_range[{{$item->id}}]" value="{{$item->male_min_range}}">
                                                <input type="hidden" name="max_range[{{$item->id}}]" value="{{$item->male_max_range}}">
                                            @endif
                                            <td>{{$item->unit}}</td>
                                            <td>
                                                <input type="text" name="value[{{$item->id}}]" class="form-control" required>
                                            </td>
                                        </tr>        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @elseif($item->test_result_type == 'Value')
                        <input type="hidden" name="labtest_id[{{$item->id}}]" value="{{$item->id}}">
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h6><b>Test Name: {{$item->tests}}</b></h6>
                                <table class="table table-bordered table-hover" >
                                    <thead>
                                        <tr style="background-color:#063B9D; color:white">
                                            <th>Test Particulars</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>  
                                        @foreach ($item->labvalue as $value)
                                        <tr>
                                            <input type="hidden" name="labvalue_id[{{$item->id}}][{{$value->id}}]" value="{{$value->id}}">
                                            <td>{{$value->result_name}}</td>
                                            <td>
                                                <textarea name="result[{{$item->id}}][{{$value->id}}]" id="" cols="30" rows="3" class="form-control"  required></textarea>
                                            </td>
                                        </tr> 
                                        @endforeach                                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @elseif($item->test_result_type == 'Value and Image')
                        <input type="hidden" name="labtest_id[{{$item->id}}]" value="{{$item->id}}">
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h6><b>Test Name: {{$item->tests}}</b></h6>
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr style="background-color:#063B9D; color:white">
                                            <th>Test Particulars</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody>  
                                        @foreach ($item->labvalue as $value)
                                        <tr>
                                            <input type="hidden" name="labvalue_id[{{$item->id}}][{{$value->id}}]" value="{{$value->id}}">
                                            <td>{{$value->result_name}}</td>
                                            <td>
                                                <textarea name="result[{{$item->id}}][{{$value->id}}]" id="" cols="30" rows="3" class="form-control"></textarea>
                                            </td>
                                        </tr> 
                                        @endforeach                                               
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="upload_report my-3">
                            <div class="row">
                                <div class="col-md-8 text-center">
                                    <div class="form-group">
                                        <label for="">Upload Report</label>
                                        <input type="file" class="file-input" name="report[{{$item->id}}]" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($item->test_result_type == 'Image')
                        <input type="hidden" name="labtest_id[{{$item->id}}]" value="{{$item->id}}">
                        <div class="upload_report mt-4">
                            <h6><b>Test Name: {{$item->tests}}</b></h6>
                            <div class="row">
                                <div class="col-md-8 text-center">
                                    <div class="form-group">
                                        <label for="">Upload Report</label>
                                        <input type="file" class="file-input" name="report[{{$item->id}}]" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach   
            </div>
            @endif
            @if($bookings->labprofile_id == null)
            <div class="card-body">
                <h6><b>Upload {{$bookings->labtest->tests}} Report</b></h6>
                <input type="hidden" name="test_result_type" value="{{$bookings->labtest->test_result_type}}">
                @if ($bookings->labtest->test_result_type == 'Range')
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <table class="table table-bordered table-hover" >
                                <thead>
                                    <tr style="background-color:#063B9D; color:white">
                                        <th>Test</th>
                                        <th>Range</th>
                                        <th>Unit</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                    <tr>
                                        <td>{{$bookings->labtest->tests}}</td>
                                        @if(\Carbon\Carbon::now()->format('Y') - substr($bookings->member->dob,0,4) <= 16)
                                            <td>{{$bookings->labtest->child_min_range}} - {{$bookings->labtest->child_max_range}}</td>
                                            <input type="hidden" name="min_range" value="{{$bookings->labtest->child_min_range}}">
                                            <input type="hidden" name="max_range" value="{{$bookings->labtest->child_max_range}}">
                                        @elseif($bookings->member->gender == 'Female')
                                            <td>{{$bookings->labtest->female_min_range}} - {{$bookings->labtest->female_max_range}}</td>
                                            <input type="hidden" name="min_range" value="{{$bookings->labtest->female_min_range}}">
                                            <input type="hidden" name="max_range" value="{{$bookings->labtest->female_max_range}}">
                                        @elseif($bookings->member->gender == 'Male' || $bookings->member->gender == 'Other')
                                            <td>{{$bookings->labtest->male_min_range}} - {{$bookings->labtest->male_max_range}}</td>
                                            <input type="hidden" name="min_range" value="{{$bookings->labtest->male_min_range}}">
                                            <input type="hidden" name="max_range" value="{{$bookings->labtest->male_max_range}}">
                                        @endif
                                        <td>{{$bookings->labtest->unit}}</td>
                                        <td>
                                            <input type="text" name="value" class="form-control" required>
                                        </td>
                                    </tr>        
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif($bookings->labtest->test_result_type == 'Value')
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <table class="table table-bordered table-hover" >
                                <thead>
                                    <tr style="background-color:#063B9D; color:white">
                                        <th>Test Particulars</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                    @foreach ($bookings->labtest->labvalue as $item)
                                    <tr>
                                        <input type="hidden" name="labvalue_id[{{$item->id}}]" value="{{$item->id}}">
                                        <td>{{$item->result_name}}</td>
                                        <td>
                                            <textarea name="result[{{$item->id}}]" id="" cols="30" rows="3" class="form-control" required></textarea>
                                        </td>
                                    </tr> 
                                    @endforeach                                            
                                </tbody>
                            </table>
                        </div>
                    </div>
                @elseif($bookings->labtest->test_result_type == 'Value and Image')
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr style="background-color:#063B9D; color:white">
                                        <th>Test Particular</th>
                                        <th>Result</th>
                                    </tr>
                                </thead>
                                <tbody>  
                                    @foreach ($bookings->labtest->labvalue as $item)
                                    <tr>
                                        <input type="hidden" name="labvalue_id[{{$item->id}}]" value="{{$item->id}}">
                                        <td>{{$item->result_name}}</td>
                                        <td>
                                            <textarea name="result[{{$item->id}}]" id="" cols="30" rows="3" class="form-control" required></textarea>
                                        </td>
                                    </tr> 
                                    @endforeach                                               
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="upload_report my-3">
                        <div class="row">
                            <div class="col-md-8 text-center">
                                <div class="form-group">
                                    <label for="">Upload Report</label>
                                    <input type="file" class="file-input" name="report" required>
                                </div>
                            </div>
                        </div>
                    </div>
                @elseif($bookings->labtest->test_result_type == 'Image')
                    <div class="upload_report mt-4">
                        <div class="row">
                            <div class="col-md-8 text-center">
                                <div class="form-group">
                                    <label for="">Upload Report</label>
                                    <input type="file" class="file-input" name="report" required>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @endif
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