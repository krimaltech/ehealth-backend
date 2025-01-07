<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pathology Report</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    
    <style>
        /** 
            Set the margins of the page to 0, so the footer and the header
            can be of the full height and width !
         **/
        @page {
            margin: 0cm 0cm;
        }
        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 4cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 4.2cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed; 
            bottom: 0cm; 
            left: 0cm; 
            right: 0cm;
            height: 2.5cm;
        }
        .table th,.table td, p{
            font-size:14px;
        }

        .table td,.table th{
            border: none;
            padding: 0.25rem;
            font-size:14px;
        }
    </style>
</head>
<body>
    <header class="mb-5">
        <img src="./images/header.png" width="100%" height="100%"/>
    </header>

    <footer>
        <img src="./images/footer.png" width="100%" height="100%"/>
    </footer>
    <div class="mt-3">
        <h5 class='text-center mb-5' style="color:#0d59a7;">Department of Pathology - {{$screenings->screening}} Report</h5>
        <div>
            {{-- <h5 style="font-weight: 500;color:#0d59a7;" class="mb-4">Patient Details</h5> --}}
            <table class="report-details table">
                <tr>
                    <td>                
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Name: </span>{{$member->user->name}}</p>
                    </td>
                    <td>
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Sex: </span>{{$member->gender}}</p>            
                    </td>
                    <td class="text-right">
                        <p class="mb-0"><span style="font-weight: 500;color:#252525">Sample No.: </span>{{$newreport->sample_no}}</p>            
                    </td>
                </tr>
                <tr>
                    <td>
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Blood Group: </span>{{$member->blood_group}}</p>
                    </td>
                    <td>                
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Contact No.: </span>{{$member->user->phone}}</p>
                    </td>
                    <td class="text-right">                
                        <p class="mb-0"><span style="font-weight: 500;color:#252525">Sample Collected Date: </span>{{$newreport->sample_date}}</p>
                    </td>
                </tr>
                <tr>                    
                    <td>
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">DOB: </span>{{$member->dob}}</p>          
                    </td>
                    <td>
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Age: </span>
                            @php
                            $dob_year = \Carbon\Carbon::now()->format('Y') - \Carbon\Carbon::createFromTimeStamp(strtotime($member->dob))->isoFormat('Y');
                            echo $dob_year;
                            @endphp
                        </p>         
                    </td>
                    <td class="text-right">
                        <p class="mb-0"><span style="font-weight: 500;color:#252525">Sample Deposited Date: </span>{{$newreport->deposited_date}}</p>          
                    </td>
                </tr>
                <tr>
                    <td>                        
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Weight: </span>
                            @if($member->weight != null)
                                {{$member->weight}}kg
                            @endif
                        </p>                        
                    </td>
                    <td>
                        <p class="mb-0"><span style="font-weight: 500;color:#0d59a7">Height: </span>
                            @if($member->height_feet != null && $member->height_inch != null)
                                {{$member->height_feet}} ft {{$member->height_inch}} in
                            @endif                        
                        </p>
                    </td>
                    <td class="text-right">
                        <p class="mb-0"><span style="font-weight: 500;color:#252525">Reporting Date: </span>{{$newreport->report_date}}</p>          
                    </td>
                </tr>
            </table>
        </div>
    
        <hr>
        <p style="font-weight: 500;color:#0d59a7;font-size:16px" class="my-3 text-center">Pathology Report</p>
        <hr>
        
        @if(count($range) > 0)
            <table class="table table-bordered mb-4">
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
            <table class="table table-bordered mb-4">
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
            <table class="table table-bordered mb-4">
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
            <table class="table table-bordered mb-4">
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
        @if(count($newreport->skip) > 0)
            <hr>
            <p style="font-weight: 500;color:#063b9d;font-size:16px" class="my-3 text-center">Skipped Test/Profile</p>
            <hr>
            <table class="table table-bordered mb-3">
                <thead style="background-color: #063b9d;color:#fff">
                    <tr>
                        <th width="50%">Test/Profile</th>
                        <th width="50%">Reason for skipping the test/profile</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($newreport->skip as $item)
                    <tr>
                        @if($item->labprofile_id != null)
                            <td style="color:#2196f3">{{$item->profile->profile_name}}</td>
                        @endif
                        @if($item->labtest_id != null)
                            <td style="color:#2196f3">{{$item->test->tests}}</td>
                        @endif
                        <td>{!!$item->skip_reason!!}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>  
        @endif
        {{-- @foreach ($report as $item)
            @if($item->service->test_result_type == 'Range')
                <div class="mt-4">
                    <h6 style='color:#0d59a7' class="mb-3">{{$item->service->service_name}}</h6>
                    <p><span style='color:#0d59a7'>Lab Test Date: </span>{{\Carbon\Carbon::parse($item->created_at)->format('Y-m-d')}}</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width='25%'>Test</th>
                                <th>Range</th>
                                <th>Unit</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->labreports as $labreport)
                                <tr>
                                    <td style="color:#0d59a7">{{$labreport->test->tests}}</td>
                                    <td>{{$labreport->min_range}} - {{$labreport->max_range}}</td>
                                    <td>{{$labreport->test->unit}}</td>
                                    @if($labreport->value > $labreport->max_range || $labreport->value < $labreport->min_range)
                                    <td class="text-danger">{{$labreport->value}}</td>
                                    @else
                                    <td>{{$labreport->value}}</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>            
                </div>
            @elseif($item->service->test_result_type == 'Value')
                <div class="mt-4">
                    <h6 style='color:#0d59a7' class="mb-3">{{$item->service->service_name}}</h6>
                    <p><span style='color:#0d59a7'>Lab Test Date: </span>{{\Carbon\Carbon::parse($item->created_at)->format('Y-m-d')}}</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width='25%'>Test Particulars</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->labreports as $labreport)
                                <tr>
                                    <td style="color:#0d59a7">{{$labreport->test->tests}}</td>
                                    <td>{{$labreport->result}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>            
                </div>
            @elseif($item->service->test_result_type == 'Image')
                <div class="mt-4">
                    <h6 style='color:#0d59a7' class="mb-3">{{$item->service->service_name}}</h6>
                    <p><span style='color:#0d59a7'>Lab Test Date: </span>{{\Carbon\Carbon::parse($item->created_at)->format('Y-m-d')}}</p>
                    @foreach($item->labreports as $labreport)
                        @if($labreport->test == null)
                            <div id="report" class="my-4">
                                <p>View Full Test Report <a href="{{$labreport->report_path}}" target="_blank">Click here</a><p>
                            </div>
                        @endif
                    @endforeach       
                </div>
            @elseif($item->service->test_result_type == 'Value and Image')
                <div class="mt-4">
                    <h6 style='color:#0d59a7' class="mb-3">{{$item->service->service_name}}</h6>
                    <p><span style='color:#0d59a7'>Lab Test Date: </span>{{\Carbon\Carbon::parse($item->created_at)->format('Y-m-d')}}</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width='25%'>Test Particulars</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->labreports as $labreport)
                                @if($labreport->test != null)
                                    <tr>
                                        <td style="color:#0d59a7">{{$labreport->test->tests}}</td>
                                        <td>{{$labreport->result}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>    
                    @foreach($item->labreports as $labreport)
                        @if($labreport->test == null)
                            <div id="report" class="my-4">
                                <p>View Full Test Report <a href="{{$labreport->report_path}}" target="_blank">Click here</a><p>
                            </div>
                        @endif
                    @endforeach       
                </div>
            @endif
        @endforeach --}}
    
        <div style="margin-top:60px">
            <table class="report-details table">
                <tr>
                    <td width="20%">           
                        <hr class="ml-0">     
                        <p class="mb-0 text-center"><span style="font-weight: 500;color:#0d59a7">Processed By</p>
                        <p style="font-weight:700" class="text-center">
                            <span>
                                {{$newreport->lab->user->name}}<br/>
                                {{$newreport->lab->subrole->subrole}}
                            </span>
                        </p>
                    </td>
                    <td width="60%"></td>
                    <td width="20%" class="text-right">           
                        <hr class="ml-0">     
                        <p class="mb-0 text-center"><span style="font-weight: 500;color:#0d59a7">Verified By</p>
                        <p style="font-weight:700" class="text-center">
                            <span>
                                {{$newreport->verifiedby->user->name}}<br/>
                                {{$newreport->verifiedby->subrole->subrole}}
                            </span>
                        </p>
                    </td>
                </tr>
            </table>
        </div>
    </div>
  
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>