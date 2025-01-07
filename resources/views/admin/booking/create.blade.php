@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Doctor Scheduling</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('booking.index') }}" class="breadcrumb-item">Doctor Scheduling</a>
                    <span class="breadcrumb-item active">Add</span>
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
    <div class="card">
        <form method="POST" action="{{ route('booking.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Date<code>*</code></label>
                            <input type="date" class="form-control" name="date" min="{{\Carbon\Carbon::now()->addDays(2)->format('Y-m-d')}}" max="{{\Carbon\Carbon::now()->addDays(15)->format('Y-m-d')}}" required>
                            @error('date')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Start Time<code>*</code></label>
                            <input type="time" class="form-control" name="start_time" required>
                            @error('date')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">End Time<code>*</code></label>
                            <input type="time" class="form-control" name="end_time" required>
                            @error('date')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Service Type<code>*</code></label>
                            <select name="service_type" class="form-control" required id="showhospital">
                                <option selected disabled value=""><--Select-->></option>
                                <option value="In Video">In Video</option>
                                <option value="In Person">In Person</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4" id="hospital">
                        <div class="form-group">
                            <label class="form-label">Hospital<code>*</code>(Update Your Profile Before Adding Hospital)</label>
                            <select name="hospital" class="form-control" id="validatehospital">
                                <option selected disabled value=""><--Select-->></option>
                                @foreach ($hospital as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">SUBMIT<i class="icon-enter"></i></button>
            </div>

        </form>
    </div>
@endsection

@section('custom-script')
<script>
    $(document).ready(function(){
        $("#hospital").hide();
        $("#showhospital").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue == 'In Person'){
                $("#hospital").show();
                $("#validatehospital").prop('required',true)
            } else{
                $("#hospital").hide();
                $("#validatehospital").prop('required',false)
            }
        });
    }).change();
    });
    </script>
@endsection