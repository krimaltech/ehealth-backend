@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Pathology Report</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('findings.reportIndex') }}" class="breadcrumb-item">Pathology Report</a>
                    <a href="{{ route('findings.reportView',$package) }}" class="breadcrumb-item">Screening and Family Details</a>
                    <span class="breadcrumb-item active">View</span>
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
    @media only screen and (min-width: 769px) and (max-width:1000px) {
        .chartReport #curve_chart{
            width: 200px;
        }
    }
    @media only screen and (max-width: 500px) {
        .chartReport #curve_chart{
            width: 350px;
        }
    }
    @media only screen and (max-width: 500px) {
        .chartReport #curve_chart{
            width: 350px;
        }
    }
    @media only screen and (max-width: 400px) {
        .chartReport #curve_chart{
            width: 250px;
        }
    }

    .chart_container {
        width: 100%;
        height: 400px;
    }

    @media (max-width: 767px) {
        .chart_container {
            height: 300px;
        }
    }

    @media (max-width: 480px) {
        .chart_container {
            height: 200px;
        }
    }
</style>
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-md-4">
                <h6><b>User Details</b></h6>
                <input type="hidden" id="member" value="{{$report->members->id}}">
                <input type="hidden" id="screeningdate" value="{{$report->screeningdate_id}}">
                <div class="mt-4">
                    <p><b>Name :</b> {{$report->members->user->name}}<br/></p>
                    <p><b>DOB :</b> {{$report->members->dob}}<br/></p>
                    <p><b>Gender :</b> {{$report->members->gender}}<br/></p>
                </div>
            </div>
            <div class="col-md-4">
                <h6><b>Screening Details</b></h6>
                <div class="mt-4">
                    <p><b>Subscription Package :</b> {{$report->screeningdate->userpackage->package->package_type}}<br/></p>
                    <p><b>Screening :</b> {{$report->screeningdate->screening->screening}}<br/></p>
                    <p><b>Screening Date :</b> {{\Carbon\Carbon::parse($report->screeningdate->screening_date)->format('Y/m/d')}}<br/></p>
                    @if($report->screeningdate->doctorvisit_date != null)
                        <p><b>Doctor Visit Date :</b> {{\Carbon\Carbon::parse($report->screeningdate->doctorvisit_date)->format('Y/m/d')}}<br/></p>
                    @endif
                    <p><span style="font-weight:500">Screening Time :</span> {{$report->screeningdate->screening_time ?? $report->screeningdate->screening_time }}</p> 
                </div>
            </div>
            <div class="col-md-4">
                <h6><b>Report Details</b></h6>
                <div class="mt-4">
                    <p><b>Sample No. :</b> {{$report->sample_no}}<br/></p>
                    @if($report->sample_date != null)
                        <p><b>Sample Collected Date :</b> {{\Carbon\Carbon::parse($report->sample_date)->format('Y/m/d g:i A')}}<br/></p>
                    @endif
                    @if($report->collected_by != null)
                        <p><b>Sample Collected By :</b> {{$report->collectedby->user->name}}<br/></p>
                    @endif
                    @if($report->report_date != null)
                        <p><b>Report Date :</b> {{\Carbon\Carbon::parse($report->report_date)->format('Y/m/d g:i A')}}<br/></p>
                        <p><b>Reporting By :</b> {{$report->lab->user->name}}<br/></p>
                    @endif
                </div>
            </div>
        </div>   
    </div>
    <hr>
    <h6 style="font-weight:600" class="mx-auto">Pathology Report</h6>
    <hr>
    @if(count($range) > 0 || count($value) > 0 || count($valueImage) > 0 || count($image) > 0)
    <div class="card-body">
        <div class="row">
            <div class="col-lg-7">
                @if(count($range) > 0)
                    <table class="table table-bordered mb-3">
                        <thead style="background-color: #063b9d;color:#fff">
                            <tr>
                                <th width="25%">Test</th>
                                <th width="25%">Range</th>
                                <th width="25%">Unit</th>
                                <th width="25%">Result</th>
                            </tr>
                        </thead>
                        <tbody id="results">
                            @foreach($range as $department=>$profiles)
                                <tr>
                                    @foreach ($labdepartment as $dep)
                                        @if($dep->id == $department)
                                            <td class="text-center" colspan="4" style="color:#2196f3">{{$dep->department}}</td>
                                            @break
                                        @endif
                                    @endforeach
                                </tr>
                                @foreach ($profiles as $profile => $tests)
                                    <tr>
                                        @foreach ($labprofile as $pro)
                                            @if($pro->id == $profile)
                                                <td colspan="4" style="font-weight:600">Profile : {{$pro->profile_name}}</td>
                                                @break
                                            @endif
                                        @endforeach
                                    </tr>
                                    @foreach ($tests as $item)
                                        <tr>
                                            <td style="color:#2196f3">{{$item->labtest->tests}}</td>
                                            <td>{{$item->min_range}} - {{$item->max_range}}</td>
                                            <td>{{$item->labtest->unit}}</td>
                                            @if($item->value > $item->max_range || $item->value < $item->min_range)
                                            <td class="text-danger">{{$item->value}}</td>
                                            @else
                                            <td>{{$item->value}}</td>
                                            @endif
                                        </tr>
                                    @endforeach
                                
                                @endforeach
                            
                            @endforeach
                        </tbody>
                    </table>
                @endif
                @if(count($value) > 0)
                    <table class="table table-bordered mb-3">
                        <thead style="background-color: #063b9d;color:#fff">
                            <tr>
                                <th width="50%">Test Particulars</th>
                                <th width="50%">Result</th>
                            </tr>
                        </thead>
                        <tbody id="values">
                            @foreach($value as $department=>$profiles)
                                <tr>
                                    @foreach ($labdepartment as $dep)
                                        @if($dep->id == $department)
                                            <td class="text-center" colspan="4" style="color:#2196f3">{{$dep->department}}</td>
                                            @break
                                        @endif
                                    @endforeach
                                </tr>
                                @foreach ($profiles as $profile => $tests)
                                    <tr>
                                        @foreach ($labprofile as $pro)
                                            @if($pro->id == $profile)
                                                <td colspan="4" style="font-weight:600">Profile : {{$pro->profile_name}}</td>
                                                @break
                                            @endif
                                        @endforeach
                                    </tr>
                                    @foreach ($tests as $test=>$value)
                                        <tr>
                                            @foreach ($labtest as $tst)
                                                @if($tst->id == $test)
                                                    <td colspan="4" style="font-weight:600">Test : {{$tst->tests}}</td>
                                                    @break
                                                @endif
                                            @endforeach
                                        </tr>
                                        @foreach ($value as $item)
                                        <tr>
                                            <td style="color:#2196f3">{{$item->labvalue->result_name}}</td>
                                            <td>{{$item->result}}</td>
                                        </tr>
                                        @endforeach
                                    @endforeach
                                
                                @endforeach
                            
                            @endforeach
                        </tbody>
                    </table>
                @endif
                @if(count($valueImage) > 0)
                    <table class="table table-bordered mb-3">
                        <thead style="background-color: #063b9d;color:#fff">
                            <tr>
                                <th width="50%">Test Particulars</th>
                                <th width="50%">Result</th>
                            </tr>
                        </thead>
                        <tbody id="valueImage">
                            @foreach($valueImage as $department=>$profiles)
                                <tr>
                                    @foreach ($labdepartment as $dep)
                                        @if($dep->id == $department)
                                            <td class="text-center" colspan="4" style="color:#2196f3">{{$dep->department}}</td>
                                            @break
                                        @endif
                                    @endforeach
                                </tr>
                                @foreach ($profiles as $profile => $tests)
                                    <tr>
                                        @foreach ($labprofile as $pro)
                                            @if($pro->id == $profile)
                                                <td colspan="4" style="font-weight:600">Profile : {{$pro->profile_name}}</td>
                                                @break
                                            @endif
                                        @endforeach
                                    </tr>
                                    @foreach ($tests as $test=>$val)
                                        <tr>
                                            @foreach ($labtest as $tst)
                                                @if($tst->id == $test)
                                                    <td colspan="4" style="font-weight:600">Test : {{$tst->tests}}</td>
                                                    @break
                                                @endif
                                            @endforeach
                                        </tr>
                                        @foreach ($val as $item)
                                            @if($item->labvalue_id != null)
                                            <tr>
                                                <td style="color:#2196f3">{{$item->labvalue->result_name}}</td>
                                                <td>{{$item->result}}</td>
                                            </tr>
                                            @endif
                                            @if($item->labvalue_id == null)
                                            <tr>
                                                <td colspan="2">
                                                    <h6 style="font-weight:600">Related Documents</h6>
                                                    <div id="report">
                                                        <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                                                        View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>  
                @endif
                @if(count($image) > 0)
                    <table class="table table-bordered mb-3">
                        <thead style="background-color: #063b9d;color:#fff">
                            <tr>
                                <th width="50%">Test</th>
                            </tr>
                        </thead>
                        <tbody id="image">
                            @foreach($image as $department=>$profiles)                            
                                <tr>
                                    @foreach ($labdepartment as $dep)
                                        @if($dep->id == $department)
                                            <td style="color:#2196f3">Lab department: {{$dep->department}}</td>
                                            @break
                                        @endif
                                    @endforeach
                                </tr>
                                @foreach ($profiles as $profile => $tests)
                                    <tr>
                                        @foreach ($labprofile as $pro)
                                            @if($pro->id == $profile)
                                                <td colspan="4" style="font-weight:600">Profile : {{$pro->profile_name}}</td>
                                                @break
                                            @endif
                                        @endforeach
                                    </tr>
                                    @foreach ($tests as $item)
                                        <tr>
                                            <td style="font-weight:600">Test: {{$item->labtest->tests}}</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div id="report">
                                                    <iframe src="{{$item->report_path}}" width="100%" height="500px"></iframe>
                                                    View Full Test Report <a href="{{$item->report_path}}" target="_blank">Click here</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>  
                @endif
            </div>
            @if(count($charttests) > 0)
            <div class="col-lg-5 chartReport">
                <div class="card">
                    <div class="card-body">
                        <h6 style="font-weight:600;color:#063b9d" class="mb-4">View Test Chart</h6>
                        <div class="form-group">
                            <select name="test" id="test" class="form-control select-search" onchange="getTest()">
                                <option value="" selected disabled>--Select Test--</option>
                                @foreach($charttests as $test)
                                <option value="{{$test->test_id}}">{{$test->labtest->tests}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div id="curve_chart" class="chart_container"></div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
    @else
    <div class="card-body">
        <div class="alert alert-danger">
            No test reports added yet.
        </div>
    </div>
    @endif
</div>
@if($report->sample_date != null)
    @if($report->screeningdate->doctorvisit_date <= \Carbon\Carbon::now()->format('Y-m-d'))
        @if($advice == null && $report->homeskip == null)
            @if($report->advice->isEmpty())
            <form method="POST" action="{{route('screening_advice.skipStore')}}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="report" value="{{$report->id}}">
                <input type="hidden" name="screeningdate" value="{{$report->screeningdate_id}}">
                <input type="hidden" name="familyname" value="{{$report->screeningdate->userpackage->familyname_id}}">
                <div class="card">
                    <div class="card-body">
                        <h6 style="font-weight:600" class="mb-3">Add Skip Reason (in case the family member has missed the home visit)</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Skip Reason (in case the family member has missed the home visit)<code>*</code></label>
                                    <textarea name="reason" class="summernote form-control" cols="30" rows="8">{{ old('reason') }}</textarea>
                                    @error('reason')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
            @endif
            <form method="POST" action="{{route('screening_advice.store')}}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="report_id" value="{{$report->id}}">
                <input type="hidden" name="screeningdate_id" value="{{$report->screeningdate_id}}">
                <div class="card">
                    <div class="card-body">
                        <h6 style="font-weight:600" class="mb-3">Add Report Findings</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Report Findings<code>*</code></label>
                                    <textarea name="feedback" class="summernote form-control" cols="30" rows="8" required>{{ old('feedback') }}</textarea>
                                    @error('feedback')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Report (if you have any ??)</label>
                                    <input  type="file" class="file-input" name="file" data-fouc accept="image/gif,image/jpeg,image/png,application/pdf">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        @else
            @if($advice != null)
                <div class="card">
                    <div class="card-body">
                        <h6 style="font-weight:600">Report Findings</h6>
                        <p>{!!$advice->feedback!!}</p>
                        @if($advice->file != null)
                        <div>
                            <h6 style="font-weight:600">Related Reports</h6>
                            <a href="{{ $advice->file_path }}" target="_blank">
                                <h6 class="mb-2">Click here to view full document</h6>
                            </a>
                            <iframe src="{{ $advice->file_path }}" frameborder="0" width="100%"
                                height="400px"></iframe>
                        </div>
                        @endif
                    </div>
                </div>
            @endif
            @if($report->homeskip != null)
                <div class="card">
                    <div class="card-body">
                        <h6 style="font-weight:600">Home Visit Skipped</h6>
                        <div class="alert alert-danger">
                            <span style="font-weight:600">Skip Reason :</span>
                            {!!$report->homeskip->reason!!}
                        </div>
                    </div>
                </div>
            @endif
        @endif
    @else
        <div class="alert alert-info">
            You may provide your report findings in {{$report->screeningdate->doctorvisit_date}}.
        </div>
    @endif
@endif
@endsection


@section('custom-script')
<script type="text/javascript" src="{{asset('global_assets/linechart/loader.js')}}"></script>
<script>
    function getTest(){
        var member = document.getElementById('member').value;
        var test = document.getElementById('test').value;
        var screeningdate = document.getElementById('screeningdate').value;
        $.ajax({
            type :'get',
            url : '/admin/medicalreport/'+ screeningdate +'/chart/'+ test +'/' + member ,
            success:function(res) {
                //console.log(res);
                google.charts.load('current', {packages:['corechart'], 'callback' : function(){
                    var data = new google.visualization.DataTable();
                    data.addColumn("string",'Month');
                    data.addColumn("number",'Min');
                    data.addColumn("number",'Max');
                    data.addColumn("number",'Result');
                    for (var i = 0; i < res.chart.length; i++) {
                        data.addRow([res.chart[i][0],parseFloat(res.chart[i][1]),parseFloat(res.chart[i][2]),parseFloat(res.chart[i][3])]);
                    }

                    var options = {
                        title: res.name,
                        curveType: 'function',
                        legend: { position: 'bottom' },
                        pointSize: 5,
                    };

                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                    chart.draw(data, options);
                }});
            }
        })
    }
    // function getId(test_id){
    //     var user_id = document.getElementById('user').value;
    //     google.charts.load('current', {'packages':['corechart']})
    //     console.log(test_id);
        // $.ajax({
        //     type :'get',
        //     url : '/admin/medicalreport/'+ service_id +'/chart/' + test_id + '/' + user_id ,
        //     success:function(res) {
        //         console.log(res);
        //         var data = new google.visualization.DataTable();
        //         data.addColumn("string",'Month');
        //         data.addColumn("number",'Min');
        //         data.addColumn("number",'Max');
        //         data.addColumn("number",'Result');
        //         for (var i = 0; i < res.chart_data.length; i++) {
        //             data.addRow([res.chart_data[i][0],parseFloat(res.chart_data[i][1]),parseFloat(res.chart_data[i][2]),parseFloat(res.chart_data[i][3])]);
        //         }

        //         var options = {
        //         title: res.name.tests,
        //         curveType: 'function',
        //         legend: { position: 'bottom' },
        //         pointSize: 5,
        //         };

        //         var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
        //         chart.draw(data, options);
        //     }
        // })
    // }
</script>
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
<script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
<script src="/global_assets/js/demo_pages/fileinput.min.js"></script>
@endsection