@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Activated Package List</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('activated.index') }}" class="breadcrumb-item">Activated Package List</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 style="font-weight:600">Family Details</h6>
                <table class="table table-bordered datatable-colvis-basic">
                    <thead>
                        <tr>
                            <th colspan="3">Family Name : {{$package->familyname->family_name}}</th>
                        </tr>
                        <tr>
                            <th>S.N.</th>
                            <th width="48%">Members</th>
                            <th width="48%">Phone No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{$package->familyname->primary->member->name}} <br/> ({{$package->familyname->primary->member_type}})</td>
                            <td>{{$package->familyname->primary->member->phone}}</td>
                        </tr>
                        @if(count($package->familyname->family) > 0)
                            @foreach ($package->familyname->family as $item)
                                <tr>
                                    <td>{{$loop->iteration + 1}}</td>
                                    <td>{{$item->member->user->name}}</td>
                                    <td>{{$item->member->user->phone}}</td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>                             
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 style="font-weight:600">Subscription Package Details</h6>
                <table class="table table-bordered mt-4">
                    <tbody>
                        <tr>
                            <th>Package</th>
                            <td>{{$package->package->package_type}}</td>
                        </tr>
                        <tr>
                            <th>Joined Date</th>
                            <td>{{$package->booked_date}}</td>
                        </tr>
                        <tr>
                            <th>Activated Date</th>
                            <td>{{$package->dates[0]->screening_date}}</td>
                        </tr>
                        <tr>
                            <th>Expiry Date</th>
                            <td>{{$package->expiry_date}}</td>
                        </tr>
                        <tr>
                            <th>Package Status</th>
                            <td>{{$package->package_status}}</td>
                        </tr>
                        <tr>
                            <th>Payment Status</th>
                            @if($package->status == 0)
                            <td> 
                                <span class="badge text-danger">Payment Due</span>
                            </td>
                            @else
                            <td>
                                <span class="badge text-success">Paid</span>
                            </td>
                            @endif
                        </tr>
                        <tr>
                            <th>Payment Interval</th>
                            <td>{{$package->payment[0]->payment_interval}}</td>
                        </tr>
                        <tr>
                            <th>Payment Method</th>
                            <td>{{$package->payment[0]->payment_method}}</td>
                        </tr>
                    </tbody>
                </table>   
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-3">
        <h6 style="font-weight:600">Screening Details</h6>
        @foreach ($package->dates->reverse() as $item)
            <div class="card mb-2">
                <div class="card-body">
                    <div  class="d-flex justify-content-between align-items-start">
                        <div @if($item->is_verified == 0) class="flex-grow-1" @endif>
                            <p><span style="font-weight:500">Screening :</span> {{$item->screening->screening}}</p>
                            <p><span style="font-weight:500">Lab Screening Date :</span> {{$item->screening_date}}</p>  
                                @if($item->screening_time != null)
                                <p><span style="font-weight:500">Lab Screening Time :</span> {{$item->screening_time }}</p>  
                                @endif
                                @if($item->doctorvisit_date != null)
                                <p><span style="font-weight:500">Doctor Visit Date :</span> {{$item->doctorvisit_date }}</p>  
                                @endif
                                @if($item->doctorvisit_time != null)
                                <p><span style="font-weight:500">Doctor Visit Time :</span> {{$item->doctorvisit_time }}</p>  
                                @endif
                            <p><span style="font-weight:500">Screening Status :</span>
                                @if($item->status == 'Pending') 
                                    <span class="badge badge-warning">
                                        In Progress 
                                    </span> 
                                @elseif($item->status == 'Completed') 
                                    <span class="badge badge-success">
                                        {{$item->status}} 
                                    </span> 
                                @else
                                    <span class="badge badge-warning">
                                        {{$item->status}} 
                                    </span> 
                                @endif 
                            </p>  
                            @if($item->is_verified == 0)
                                <div class="alert alert-info d-flex justify-content-between align-items-center">
                                    <p>Please confirm the lab screening date.</p>
                                    <div>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verifyModal">
                                            Confirm
                                        </button>

                                        <div class="modal fade text-dark" id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="verifyModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="verifyModalTitle">Confirm Lab Screening Date</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <form action="{{route('next.verify',$item->id)}}" method="post">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-body">
                                                            <label for="">Are you sure you want to confirm {{$item->screening_date}} as lab screening date?</label>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Confirm</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>  
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#rescheduleModal">
                                            Reschedule
                                        </button>

                                        <div class="modal fade text-dark" id="rescheduleModal" tabindex="-1" role="dialog" aria-labelledby="rescheduleModalTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="rescheduleModalTitle">Reschedule Lab Screening Date</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <form action="{{route('next.reschedule',$item->id)}}" method="post">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="">New Lab Screening Date</label>
                                                                <input type="date" name="screening_date" class="form-control" id="screening_date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Reschedule</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            {{-- @if(count($item->employees) != 0 && $item->screening_time == null)
                                <!-- Modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#screeningTimeCenter_{{$item->id}}">
                                    Update Lab Screening Time
                                </button>
                                <div class="modal fade" id="screeningTimeCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="screeningTimeCenter_{{$item->id}}Title" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Update Lab Screening Time</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <form action="{{route('pending.screeningtime',$item->id)}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Screening Time</label>
                                                    <input type="time" name="screening_time" class="form-control">
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
                            @endif --}}
                            {{-- @if(count($item->online) == 0)
                                @if($item->consultation_type == 2)
                                    <!-- Modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#onlinescreeningTimeCenter_{{$item->id}}">
                                        Update Online Consultation Time
                                    </button>
                                    <div class="modal fade" id="onlinescreeningTimeCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="onlinescreeningTimeCenter_{{$item->id}}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Update Online Consultation Time</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <form action="{{route('onlineconsultation.store',$item->id)}}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">No. of family members</label>
                                                        <input type="number" name="family_no" class="form-control" value="{{count($item->reports)}}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Screening Start Time</label>
                                                        <input type="time" name="screening_time" class="form-control" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Limit for each family members</label>
                                                        <select name="limit" id="" class="form-control" required>
                                                            <option value="">--Select Limit--</option>
                                                            <option value="5">5 minutes</option>
                                                            <option value="10">10 minutes</option>
                                                            <option value="15">15 minutes</option>
                                                            <option value="20">20 minutes</option>
                                                            <option value="25">25 minutes</option>
                                                            <option value="30">30 minutes</option>
                                                            <option value="35">35 minutes</option>
                                                            <option value="40">40 minutes</option>
                                                            <option value="45">45 minutes</option>
                                                            <option value="50">50 minutes</option>
                                                            <option value="55">55 minutes</option>
                                                            <option value="60">60 minutes</option>
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
                            @endif --}}
                        </div>
                        @if ($item->reschedule_status == 1)
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#rescheduleModal">
                                Reschedule Lab Screening Date
                            </button>
                            <div class="modal fade" id="rescheduleModal" tabindex="-1" role="dialog" aria-labelledby="rescheduleModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="rescheduleModalTitle">Reschedule Lab Screening Date</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <form action="{{route('reschedule',$item->id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">New Lab Screening Date</label>
                                                <input type="date" name="screening_date" class="form-control" id="screening_date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
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
                        @if($item->status == 'Doctor Visit Completed')
                            <a href="{{route('activated.changeStatus',$item->id)}}" class="btn btn-primary">
                               <i class="icon-check"></i>  Complete Screening
                            </a>
                        @endif
                    </div>
                    @if(count($item->employees)>0)
                    <h6 style="font-weight:600" class="mt-4 mb-3">Screening Team Details</h6>
                    <div class="row">
                        @if(count($item->employees->filter(function ($emp) {
                            return $emp->type == 'Lab Technician' || $emp->type == 'Lab Nurse';
                        })) > 0)
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 style="font-weight:600;background-color:#063b9d;color:white" class="p-2 rounded">Diagnostic and Lab Team</h6>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Employee</th>
                                                <th>Employee Type</th>
                                                <th>Phone No.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($item->employees as $emp)
                                                @if($emp->type == 'Lab Technician' || $emp->type == 'Lab Nurse')
                                                <tr>
                                                    <td>{{$emp->employee->user->name}}</td>
                                                    <td>{{$emp->type}}</td>
                                                    <td>{{$emp->employee->user->phone}}</td>
                                                </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(count($item->employees->filter(function ($emp) {
                            return $emp->type != 'Lab Technician' && $emp->type != 'Lab Nurse';
                        })) > 0)
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h6 style="font-weight:600;background-color:#063b9d;color:white" class="p-2 rounded">Doctor and Advisors Team</h6>
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Employee</th>
                                                <th>Employee Type</th>
                                                <th>Phone No.</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($item->employees as $emp)
                                            @if($emp->type != 'Lab Technician' && $emp->type != 'Lab Nurse')
                                            <tr>
                                                <td>{{$emp->employee->user->name}}</td>
                                                <td>{{$emp->type}}</td>
                                                <td>{{$emp->employee->user->phone}}</td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>   
                    @endif    
                    {{-- @if(count($item->online) > 0)
                    <h6 style="font-weight:600" class="mt-4 mb-3">Online Consultation Details</h6>
                    <table class="table table-bordered">
                        <thead style="font-weight:600;background-color:#063b9d;color:white">
                            <tr>
                                <th>Family Member</th>
                                <th>Phone No.</th>
                                <th>Meeting Start Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->online as $on)
                                <tr>
                                    <td>{{$on->member->user->name}} @if($on->member->member_type == 'Primary Member')({{$on->member->member_type}})@endif</td>
                                    <td>{{$on->member->user->phone}}</td>
                                    <td>{{$on->start_time}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif --}}
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

@section('custom-script')
    <script>
        $(document).ready(function(){
            $('#screeningBtn').on('click',function(){
                let screening_date = $('#screening_date').val();
                $('.lab_ids').empty();
                $.ajax({
                    url: "{{ route('screeningteam.team') }}",
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    cache: false,
                    dataType: 'json',

                    data: {
                        screening_date: screening_date
                    },
                    success: function(response) {
                        console.log(response);                        
                        response.forEach(element => {
                            $('.lab_ids').append(
                                `<option value="${element.id}">${element.user.name}</option>`
                            );
                        });
                    }
                });
            })
            $('#consultation_type').on('change',function(){
                let consultation_type  = $(this).val();
                let screening_date  = $('#screening_date').val();
                if(consultation_type == 0){
                    $('.doctorteam').css('display','block');
                    $('.onlinedoctorteam').css('display','none');
                    $.ajax({
                        url: "{{ route('screeningteam.doctor') }}",
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        cache: false,
                        dataType: 'json',
                        data: {
                            screening_date: screening_date,
                            consultation_type: consultation_type
                        },
                        success: function(response) {                  
                            response.doctor.forEach(element => {
                                $('.doctor_ids').append(
                                    `<option value="${element.id}">${element.user.name}</option>`
                                );
                            });
                            response.dentist.forEach(element => {
                                $('.dentist_ids').append(
                                    `<option value="${element.id}">${element.user.name}</option>`
                                );
                            });
                            response.dietician.forEach(element => {
                                $('.dietician_ids').append(
                                    `<option value="${element.id}">${element.user.name}</option>`
                                );
                            });
                            response.eye.forEach(element => {
                                $('.ophthalmologist_ids').append(
                                    `<option value="${element.id}">${element.user.name}</option>`
                                );
                            });
                            response.fitness.forEach(element => {
                                $('.fitness_ids').append(
                                    `<option value="${element.id}">${element.user.name}</option>`
                                );
                            });
                        }
                    });
                }
                if(consultation_type == 1){
                    $('.onlinedoctorteam').css('display','block');
                    $('.doctorteam').css('display','none');
                    $.ajax({
                        url: "{{ route('screeningteam.doctor') }}",
                        type: 'post',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        cache: false,
                        dataType: 'json',

                        data: {
                            screening_date: screening_date,
                            consultation_type: consultation_type,
                        },
                        success: function(response) {
                            response.forEach(element => {
                                $('.onlinedoctor_ids').append(
                                    `<option value="${element.id}">${element.user.name} ${element.department ? `(${element.departments.department})`:''}</option>`
                                );
                            });
                        }
                    });
                }
            })
        })
    </script>
@endsection