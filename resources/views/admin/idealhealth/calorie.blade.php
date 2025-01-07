@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Calorie Intake Calculator</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Calorie Intake Calculator</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <form action="{{route('users.calculateCalorie')}}" method="post" id="calculate">
                @csrf
                <div class="card-body">
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-3">Gender</div>
                        <div class="col-md-9">
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="" selected disabled>--Select Gender--</option>
                                <option value="Male" @if($member->gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if($member->gender == 'Female') selected @endif>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-3">Age</div>
                        <div class="col-md-9">
                            <input type="number" name="age" id="age" class="form-control" value="{{$age}}" required>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-3">Weight</div>
                        <div class="col-md-9">
                            <input type="text" name="weight" id="weight" class="form-control" placeholder="Enter weight in kg" value="{{$member->weight}}" required>
                        </div>
                    </div>
                    <div class="row mb-3 align-items-center">
                        <div class="col-md-3">Height</div>
                        <div class="col-md-9">
                            <input type="text" name="height" id="height" class="form-control" placeholder="Enter height in meters" value="{{$member->height}}" required>
                        </div>
                    </div>
                    <div class="row align-items-center mt-4">
                        <div class="col-md-12">Activity Factor</div>
                        <div class="col-md-12 mt-2">
                            <div>
                                <input type="radio" name="activity" value="Sedentary" required>
                                <label >
                                    Sedentary (Little or no exercise)
                                </label>
                            </div>
                            <div>
                                <input type="radio" name="activity" value="Lightly active" required>
                                <label >
                                    Lightly active (Light excercise 1-2 times a week)
                                </label>
                            </div>
                            <div>
                                <input type="radio" name="activity" value="Moderately active" required>
                                <label >
                                    Moderately active (Moderate exercise 2-3 times/week)
                                </label>
                            </div>
                            <div>
                                <input type="radio" name="activity" value="Very active" required>
                                <label >
                                    Very active (Hard exercise 3-5 times/week)
                                </label>
                            </div>
                            <div>
                                <input type="radio" name="activity" value="Extra active" required>
                                <label >
                                    Extra active (Physical job or hard exercise 6-7 times/week)
                                </label>
                            </div>
                            <div>
                                <input type="radio" name="activity" value="Professional athlete" required>
                                <label >
                                    Professional athlete
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <input type="submit" class="btn btn-primary " value="Calculate">
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-6 d-none results">
        <div class="card">
            <div class="card-body">
                <h5>Calorie Intake to maintain current weight</h5>
                <h5 id="calorie" class="text-success"></h5>
            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-script')
    <script>
        $(document).ready(function(){
           $('#calculate').on('submit',function(e){
                e.preventDefault();
                var gender = $('#gender').val();
                var age = $('#age').val();
                var weight = $('#weight').val();
                var height = $('#height').val();
                var activity = $('input[name=activity]:checked').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'post',
                    url:'/admin/users/calorie-intake/calculate',
                    data:{
                        gender:gender,
                        age:age,
                        weight:weight,
                        height:height,
                        activity:activity,
                    },
                    success:function(res){
                        $('.results').removeClass('d-none');
                        $('.results').addClass('d-block');
                        $('#calorie').text(res + ' kcal/day');
                    }
                })
           })
        })
    </script>
@endsection