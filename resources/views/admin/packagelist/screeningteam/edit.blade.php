@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Screening Team</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Edit Screening Team</span>
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
<div class="row">
    <div class="col-md-6  mb-2">
        <div class="card h-100">
            <div class="card-body">
                <h6 style="font-weight:600">Edit Diagnostic and Lab Team</h6>
                <form action="{{route('screeningteam.updateLabTeam')}}" method="post" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" name="labdate" id="labdate" class="form-control" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
                        <span class="text-danger">* Please select date to get the assigned and available lab technician list.</span>
                        @error('labdate')
                            <div class="alert alert-danger">
                                This field is required.
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Assigned Lab Technician</label>
                        <select class="assignedlab form-control select-search" name="assignedlab_id" required>
                            <option value="" selected disabled>--Select Assigned Lab Technician--</option>
                        </select>
                        @error('assignedlab_id')
                            <div class="alert alert-danger">
                                This field is required.
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">New Lab Technician</label>
                        <select class="newlab form-control select-search" name="newlab_id" required>
                            <option value="" selected disabled>--Select New Lab Technician--</option>
                        </select>
                        @error('newlab_id')
                            <div class="alert alert-danger">
                                This field is required.
                            </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-block">Switch Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-2">
        <div class="card h-100 ">
            <div class="card-body">
                <h6 style="font-weight:600">Edit Doctor and Advisors Team</h6>
                <form action="{{route('screeningteam.updateDoctorTeam')}}" method="post" class="mt-4">
                    @csrf
                    <div class="form-group">
                        <label for="">Date</label>
                        <input type="date" name="doctordate" id="doctordate" class="form-control" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required>
                        <span class="text-danger">* Please select to get the assigned and available doctors and advisors list.</span>
                        @error('doctordate')
                            <div class="alert alert-danger">
                                This field is required.
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Assigned Doctor and Advisor</label>
                        <select class="assigneddoctor form-control select-search" name="assigneddoctor_id" required>
                            <option value="" selected disabled>--Select Assigned Doctor and Advisor--</option>
                        </select>
                        @error('assigneddoctor_id')
                            <div class="alert alert-danger">
                                This field is required.
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">New Doctor and Advisor</label>
                        <select class="newdoctor form-control select-search" name="newdoctor_id" required>
                            <option value="" selected disabled>--Select New Doctor and Advisor--</option>
                        </select>
                        @error('newdoctor_id')
                            <div class="alert alert-danger">
                                This field is required.
                            </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-block">Switch Employee</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-script')
    <script>
         $(document).ready(function() {
            $('#labdate').on('change', function() {
                let labdate = $(this).val();
                $('.assignedlab').empty();
                $('.newlab').empty();
                $('.assignedlab').append( `<option value="" selected disabled>--Select Assigned Lab Technician--</option>`);
                $('.newlab').append(`<option value="" selected disabled>--Select New Lab Technician--</option>` );
                $.ajax({
                    url: "{{ route('screeningteam.labteam') }}",
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    cache: false,
                    data: {
                        labdate: labdate
                    },
                    success: function(response) {
                        //console.log(response); 
                        if(response.labteam.length == 0){
                            $('.assignedlab').append(`<option value="" disabled>No Assigned Lab Technician</option>`);
                        }else{
                            response.labteam.forEach(element => {
                                $('.assignedlab').append(
                                    `<option value="${element.id}">${element.user.name}</option>`
                                );
                            });
                        }
                        if(response.newlabteam.length == 0){
                            $('.newlab').append(`<option value="" disabled>No Lab Technician</option>`);
                        }else{
                            response.newlabteam.forEach(element => {
                                $('.newlab').append(
                                    `<option value="${element.id}">${element.user.name}</option>`
                                );
                            });
                        }
                    }
                });
            });
            $('#doctordate').on('change', function() {
                let doctordate = $(this).val();
                $('.assigneddoctor').empty();
                $('.newdoctor').empty();
                $('.assigneddoctor').append( `<option value="" selected disabled>--Select Assigned Doctor and Advisor--</option>`);
                $('.newdoctor').append(`<option value="" selected disabled>--Select New Doctor and Advisor--</option>` );
                $.ajax({
                    url: "{{ route('screeningteam.doctorteam') }}",
                    type: 'post',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    cache: false,
                    data: {
                        doctordate: doctordate
                    },
                    success: function(response) {
                        //console.log(response); 
                        if(response.doctorteam.length == 0){
                            $('.assigneddoctor').append(`<option value="" disabled>No Assigned Doctor and Advisor</option>`);
                        }else{
                            response.doctorteam.forEach(element => {
                                $('.assigneddoctor').append(
                                    `<option value="${element.id}">${element.user.name} ${element.department ? `(${element.departments.department})`:''}</option>`
                                );
                            });
                        }
                        if(response.newdoctorteam.length == 0){
                            $('.newdoctor').append(`<option value="" disabled>No Doctor and Advisor</option>`);
                        }else{
                            response.newdoctorteam.forEach(element => {
                                $('.newdoctor').append(
                                    `<option value="${element.id}">${element.user.name} ${element.department ? `(${element.departments.department})`:''}</option>`
                                );
                            });
                        }
                    }
                });
            });
        });
    </script>
@endsection
