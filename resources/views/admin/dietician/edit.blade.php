@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit</span> -Dietician Screening Form</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('dietician.index') }}" class="breadcrumb-item">Dietician Screening Form</a>
                    <span class="breadcrumb-item active">Edit</span>
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
    <!-- Horizontal Form -->
    <div class="card">
        <div class="card-body">
            <div>
                <h6 style="font-weight: 600">User Details</h6>
                <p><span style="font-weight: 500">Name : </span>{{$screening->campaignuser->name}}</p>
                <p><span style="font-weight: 500">Gender : </span>{{$screening->campaignuser->gender}}</p>
                <p><span style="font-weight: 500">DOB : </span>{{\Carbon\Carbon::parse($screening->campaignuser->dob)->format('M d, Y')}}</p>
                <p><span style="font-weight: 500">Age : </span>{{\Carbon\Carbon::parse($screening->campaignuser->dob)->diffInYears(\Carbon\Carbon::now())}}</p>
            </div>
            <hr>
            <form method="POST" action="{{ route('dietician.update',$screening->id) }}" enctype="multipart/form-data" >
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="" style="font-weight: 600">Chief Complaint</label>
                    <textarea name="chief_complaint" class="form-control summernote" cols="30" rows="10" required>{{$screening->chief_complaint}}</textarea>
                </div>
                <h6 style="font-weight: 600">Attitude and food intake habit:</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">1. How many times do you eat in a daily basis?</label>
                            <select name="how_eat_daily"  class="form-control" required>
                                <option value="" selected disabled>---Select---</option>
                                <option value="2 times" @if($screening->how_eat_daily == '2 times') selected @endif>2 times</option>
                                <option value="3 times" @if($screening->how_eat_daily == '3 times') selected @endif>3 times</option>
                                <option value="4 times" @if($screening->how_eat_daily == '4 times') selected @endif>4 times</option>
                                <option value="5 times" @if($screening->how_eat_daily == '5 times') selected @endif>5 times</option>
                                <option value="More than 5 times" @if($screening->how_eat_daily == 'More than 5 times') selected @endif>More than 5 times</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">2. What do you eat in a daily basis?</label>
                            <select name="what_eat_daily"  class="form-control" required>
                                <option value="" selected disabled>---Select---</option>
                                <option value="Vegetarian food" @if($screening->what_eat_daily == 'Vegetarian food') selected @endif>Vegetarian food</option>
                                <option value="Non-vegetarian food" @if($screening->what_eat_daily == 'Non-vegetarian food') selected @endif>Non-vegetarian food</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">3. Do you know about junk food? </label> <br>
                            <div class="custom-control custom-radio custom-control-inline" style="z-index: 0">
                                <input type="radio" id="junk_food1" value="Yes" name="junk_food" class="custom-control-input" @if($screening->junk_food == 'Yes') checked @endif required>
                                <label class="custom-control-label" for="junk_food1">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline" style="z-index: 0">
                                <input type="radio" id="junk_food2" value="No" name="junk_food" class="custom-control-input" @if($screening->junk_food == 'No') checked @endif required>
                                <label class="custom-control-label" for="junk_food2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">4. Participation in extracurricular activities? </label> <br>
                            <div class="custom-control custom-radio custom-control-inline" style="z-index: 0">
                                <input type="radio" id="extracurricular1" value="Yes" name="extracurricular" class="custom-control-input" @if($screening->extracurricular == 'Yes') checked @endif required>
                                <label class="custom-control-label" for="extracurricular1">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline" style="z-index: 0">
                                <input type="radio" id="extracurricular2" value="No" name="extracurricular" class="custom-control-input" @if($screening->extracurricular == 'No') checked @endif required>
                                <label class="custom-control-label" for="extracurricular2">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" style="font-weight: 600">Problem List</label>
                    <textarea name="problems" class="form-control summernote" cols="30" rows="10" required>{{$screening->problems}}</textarea>
                </div>                
                <div class="form-group">
                    <label for="" style="font-weight: 600">Dietary Management</label>
                    <textarea name="dietary_management" class="form-control summernote" cols="30" rows="10" required>{{$screening->dietary_management}}</textarea>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary" type="submit"><i class="icon-paperplane"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote({
                height: 100,
                toolbar: [
                    ['style', ['bold', 'italic']], //Specific toolbar display
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
        })
    </script>
@endsection