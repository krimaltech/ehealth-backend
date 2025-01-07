@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">View</span> - {{$package->package_type}}</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('package.index') }}" class="breadcrumb-item">Package</a>
                    <span class="breadcrumb-item active">{{$package->package_type}}</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<style>
    .screening th,.screening tr{
            text-align: center;
        }
</style>
<div>
    @if($package->visits == null)  
    <div class="card">
        <div class="card-body">
            <div>
                <p><b>Package Name: </b> {{$package->package_type}}</p>
                @if($package->type == 1)
                <p><b>Package Type: </b> Family Package</p>
                @elseif($package->type == 2)
                <p><b>Package Type: </b> Corporate Package</p>
                @elseif($package->type == 3)
                <p><b>Package Type: </b> Budget Package</p>
                @endif
                <p><b>Registration Fee: </b> Rs.{{$package->registration_fee}}</p>
                <p><b>Monthly Fee: </b> Rs.{{$package->monthly_fee}}</p>
                <p><b>No. of visits in a year: </b> {{$package->visits}} visits</p>
                @if($package->tests != null)
                    <p><b>No. of tests: </b> {{$package->tests }} tests</p>
                @endif
            </div>
            <div class="mt-3">
                <h6 class="mb-0"><b>Description</b></h6>
                <span>{!!$package->description!!}</span>  
            </div>
        </div>
    </div>
    @else
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <div>
                            <p><b>Package Name: </b> {{$package->package_type}}</p>
                            @if($package->type == 1)
                            <p><b>Package Type: </b> Family Package</p>
                            @elseif($package->type == 2)
                            <p><b>Package Type: </b> Corporate Package</p>
                            @elseif($package->type == 3)
                            <p><b>Package Type: </b> Budget Package</p>
                            @endif
                            <p><b>Registration Fee: </b> Rs.{{$package->registration_fee}}</p>
                            <p><b>Monthly Fee: </b> Rs.{{$package->monthly_fee}}</p>
                            <p><b>No. of visits in a year: </b> {{$package->visits}} visits</p>
                            @if($package->tests != null)
                                <p><b>No. of tests: </b> {{$package->tests }} tests</p>
                            @endif
                            <p><b>SEO Keyword: </b> {{$package->seo_keyword}}</p>
                            <p><b>SEO Description: </b> {!!$package->seo_description!!}</p>
                        </div>
                        <div class="mt-3">
                            <h6 class="mb-0"><b>Description</b></h6>
                            <span>{!!$package->description!!}</span>  
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                {{-- <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><b>Screening Details</b></h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Screening</th>
                                    <th>Doctor Consultation Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($package->packagescreening as $item)
                                    <tr>
                                        <td>{{$item->screening->screening}}</td>
                                        <td>
                                            @if($item->consultation_type == 1)
                                                Physical Consultation
                                            @elseif($item->consultation_type == 2)
                                                Online Consultation
                                            @else
                                            @endif
                                        </td>
                                        <td>
                                            @if($item->consultation_type == null)
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addconsultationModalCenter_{{$item->id}}">
                                                    Update Consultation Type
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="addconsultationModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="addconsultationModalCenter_{{$item->id}}Title" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Add Consultation Type</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{route('package.consultationtype',$item->id)}}" method="post">
                                                                @csrf
                                                                @method('PATCH')
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="">Screening</label>
                                                                        <input type="text" class="form-control" value="{{$item->screening->screening}}" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Consultation Type</label>
                                                                        <select name="consultation_type" id="" class="form-control">
                                                                            <option value="" selected disabled>---Select Consultation Type---</option>
                                                                            <option value="1">Physical Consultation</option>
                                                                            <option value="2">Online Consultation</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editconsultationModalCenter_{{$item->id}}">
                                                    Update Consultation Type
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="editconsultationModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editconsultationModalCenter_{{$item->id}}Title" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Consultation Type</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form action="{{route('package.consultationtype',$item->id)}}" method="post">
                                                                @csrf
                                                                @method('PATCH')
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="">Screening</label>
                                                                        <input type="text" class="form-control" value="{{$item->screening->screening}}" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="">Consultation Type</label>
                                                                        <select name="consultation_type" id="" class="form-control">
                                                                            <option value="" selected disabled>---Select Consultation Type---</option>
                                                                            <option value="1" {{$item->consultation_type == '1' ? 'selected':''}}>Physical Consultation</option>
                                                                            <option value="2" {{$item->consultation_type == '2' ? 'selected':''}}>Online Consultation</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>  --}}
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><b>Services</b></h5>
                        <ul style="padding-inline-start:20px">
                            @if($package->screening == 1)
                            <li>Pathological Screening</li>
                            @endif
    
                            @if($package->checkup == 1)
                            <li>Medical Checkup</li>
                            @endif
    
                            @if($package->ambulance == 1)
                            <li>Free Ambulance Service</li>
                            @endif
    
                            @if($package->insurance == 1)
                            <li>Insurance Service (Insurance Coverage : Rs. {{$package->insurance_amount}})</li>
                            @endif

                            @if($package->schedule_flexibility == 1)
                            <li>Schedule Flexibility ({{$package->schedule_times}} times)</li>
                            @endif

                            <li>Online Doctor Consultation : {{$package->online_consultation}} times</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="card screening">
        <div class="card-body">
            <h5 class="card-title"><b>Fee Structure</b></h5>
            <table class="table table-striped table-bordered datatable-colvis-basic">
                <thead style="background-color:#063b9d;color:white">
                    <tr>
                        <th>Family Size</th>
                        <th>Registration Fee per family</th>
                        <th>Monthly Fee per person</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($package->fees as $item)
                        <tr>
                            <td>{{$item->family_size}}</td>
                            <td>{{$item->one_registration_fee}}</td>
                            <td>{{$item->one_monthly_fee}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>  
    {{-- <div class="card fee">
        <div class="card-body">
            <h5 class="card-title"><b>Fee Structure</b></h5>
            <table class="table table-striped table-bordered datatable-colvis-basic">
                <thead style="background-color:#063b9d;color:white">
                    <tr>
                        <th rowspan="2">Family Size</th>
                        <th colspan="1">Registration Fee per family</th>
                        <th colspan="2">Continuation Fee per family</th>
                        <th colspan="3">Monthly Fee per person</th>
                    </tr>
                    <tr>
                        <th>Year 1</th>
                        <th>Year 2</th>
                        <th>Year 3 & onwards</th>
                        <th>Year 1</th>
                        <th>Year 2</th>
                        <th>Year 3 & onwards</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($package->fees as $item)
                        <tr>
                            <td>{{$item->family_size}}</td>
                            <td>{{$item->one_registration_fee}}</td>
                            <td>{{$item->two_continuation_fee}}</td>
                            <td>{{$item->three_continuation_fee}}</td>
                            <td>{{$item->one_monthly_fee}}</td>
                            <td>{{$item->two_monthly_fee}}</td>
                            <td>{{$item->three_monthly_fee}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>   --}}
    @if($package->visits != null)  
        @if($detail!= null && !$detail->tests->isEmpty() )
        <div class="card">
            <div class="card-body screening">
                <h5 class="card-title"><b>{{$detail->category}}</b></h5>
                <table class="table table-bordered">
                    <thead style="background-color:#063b9d;color:white">
                        <tr>
                            <th colspan='3' class="text-center">Test Details</th>
                            <th rowspan='2' width="12%">Man</th>
                            <th rowspan='2' width="12%">Woman</th>
                            <th rowspan='2' width="12%">Child</th>
                        </tr>
                        <tr>
                            <th width="20%">Test</th>
                            <th width="20%">Department</th>
                            <th width="20%">Profile</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail->tests as $item)
                            <tr>
                                <td>{{$item->labtest->tests}}</td>
                                <td> {{$item->labtest->labdepartment->department}}</td>
                                <td> {{$item->labtest->profile_id != null ? $item->labtest->labprofile->profile_name :''}}</td>
                                <td>
                                    @if($item->man == 1)
                                        <i class="icon-check text-success"></i>
                                    @else
                                        <i class="icon-cross  text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($item->woman == 1)
                                        <i class="icon-check text-success"></i>
                                    @else
                                        <i class="icon-cross  text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($item->child == 1)
                                        <i class="icon-check text-success"></i>
                                    @else
                                        <i class="icon-cross  text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>          
            </div>
        </div>       
        @endif
        @if($regular != null && !$regular->tests->isEmpty())
        <div class="card">
            <div class="card-body screening">
                <h5 class="card-title"><b>{{$regular->category}} - {{$package->visits - 1}}</b></h5>
                <table class="table table-bordered">
                    <thead style="background-color:#063b9d;color:white">
                        <tr>
                            <th colspan='3' class="text-center">Test Details</th>
                            <th rowspan='2' width="12%">Man</th>
                            <th rowspan='2' width="12%">Woman</th>
                            <th rowspan='2' width="12%">Child</th>
                        </tr>
                        <tr>
                            <th width="20%">Test</th>
                            <th width="20%">Department</th>
                            <th width="20%">Profile</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($regular->tests as $item)
                            <tr>
                                <td>{{$item->labtest->tests}}</td>
                                <td> {{$item->labtest->labdepartment->department}}</td>
                                <td> {{$item->labtest->profile_id != null ? $item->labtest->labprofile->profile_name :''}}</td>     
                                <td>
                                    @if($item->man == 1)
                                        <i class="icon-check text-success"></i>
                                    @else
                                        <i class="icon-cross  text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($item->woman == 1)
                                        <i class="icon-check text-success"></i>
                                    @else
                                        <i class="icon-cross  text-danger"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($item->child == 1)
                                        <i class="icon-check text-success"></i>
                                    @else
                                        <i class="icon-cross  text-danger"></i>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>          
            </div>
        </div>   
        @endif    
    @endif    
</div>

@endsection