@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Online Doctor Consultation</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('onlineDoctorConsultation.index') }}" class="breadcrumb-item">Online Doctor Consultation</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h6 style="font-weight: 600">User, Package and Screening Details</h6>
            <table class="table table-boredered">
                <tbody>
                    <tr>
                        <th>User</th>
                        <td>{{$report->members->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Family Name</th>
                        <td>{{$report->screeningdate->userpackage->familyname->family_name}}</td>
                    </tr>
                    <tr>
                        <th>Package</th>
                        <td>{{$report->screeningdate->userpackage->package->package_type}}</td>
                    </tr>
                    <tr>
                        <th>Screening</th>
                        <td>{{$report->screeningdate->screening->screening}}</td>
                    </tr>
                    <tr>
                        <th>Skip Reason</th>
                        <td>{!!$report->homeskip->reason!!}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    @if($report->online == null)
    <div class="card">
        <div class="card-body">
            <h6 style="font-weight: 600">Schedule Meeting</h6>
            <form action="{{route('onlineDoctorConsultation.store',$report->id)}}" method="post">
                @csrf
                <input type="hidden" name="member" value="{{$report->member_id}}">
                <div class="form-group">
                    <label for="">Doctor Consultation Date and Time</label>
                    <input type="datetime-local" name="online_date" class="form-control" id="date" required>
                    <span class="text-danger ">* Please select doctor consultation date for doctor list.</span>
                </div>
                <div class="form-group">
                    <label for="">Doctor</label>
                    <select name="doctor_id" id="doctor" class="form-control" required>
                        <option value="" selected disabled>---Choose Doctor---</option>
                    </select>
                </div>
                <div class="text-right">
                    <input type="submit" class="btn btn-primary" value="Save Meeting">
                </div>
            </form>
        </div>
    </div>
    @else
        <div class="card">
            <div class="card-body">
                <h6 style="font-weight: 600">Meeting Details</h6>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Meeting Date and Time</th>
                            <th>Assigned Doctor</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$report->online->start_time}}</td>
                            <td>{{$report->online->doctor->user->name}} ({{$report->online->doctor->user->phone}})</td>
                            <td>
                                @if($report->online->status == 0)
                                    <span class="badge badge-secondary">Pending</span>
                                @else
                                    <span class="badge badge-success">Completed</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif
@endsection

@section('custom-script')
    <script>
        $(document).ready(function(){
            $('#date').change(function(){
                let date = $(this).val();
                $.ajax({
                    url: "{{ route('onlineDoctorConsultation.employee') }}",
                    type: 'post',
                    cache: false,
                    dataType: 'json',

                    data: {
                        "_token": "{{ csrf_token() }}",
                        date: date
                    },
                    success: function(response) {
                        //console.log(response); 
                        $('#doctor').empty();
                        $('#doctor').append('<option value=""  selected disabled>---Choose Doctor---</option>');
                        response.forEach(element => {
                            $('#doctor').append(
                                `<option value="${element.id}">${element.user.name}</option>`
                            );
                        });
                    }
                });
            })
        })
    </script>
@endsection