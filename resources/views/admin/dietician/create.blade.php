@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add</span> -Dietician Screening Form</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('dietician.index') }}" class="breadcrumb-item">Dietician Screening Form</a>
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
    <!-- Horizontal Form -->
    <div class="card">
        <div class="card-body">
            <div>
                <h6 style="font-weight: 600">User Details</h6>
                <p><span style="font-weight: 500">Name : </span>{{$register->campaignuser->name}}</p>
                <p><span style="font-weight: 500">Gender : </span>{{$register->campaignuser->gender}}</p>
                <p><span style="font-weight: 500">DOB : </span>{{\Carbon\Carbon::parse($register->campaignuser->dob)->format('M d, Y')}}</p>
                <p><span style="font-weight: 500">Age : </span>{{\Carbon\Carbon::parse($register->campaignuser->dob)->diffInYears(\Carbon\Carbon::now())}}</p>
            </div>
            <hr>
            <form method="POST" action="{{ route('dietician.store') }}" enctype="multipart/form-data" >
                @csrf
                {{-- <h6>User Verification</h6>            
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Select Campaign <code>*</code>  <span class="text-info">* Please select campaign to get users list.</span></label>
                                <select name="campaign" class="form-control select-search" id="campaigns_select" required >
                                    <option value="" selected disabled>---Select Campaign---</option>
                                    @foreach ($campaign as $item)
                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Users <code>*</code></label>
                                <select name="users" id="users_select" class="form-control select-search" required>
                                    <option value="" selected disabled>---Select User---</option>
                                </select>
                            </div>
                        </div>
                    </div>            
                 
                    <div class="row" id="user_verification">
                        <input type="hidden" name="campaign_user_id" id="campaign_user_id">
                        <input type="hidden" name="register_campaign_user_id" id="register_campaign_user_id">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Name <code>*</code></label>
                                <input type="text" id="name" class="form-control" name="name" required readonly>                    
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Phone <code>*</code></label>
                                <input type="number" id="phone" class="form-control" name="phone" required readonly>                    
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Email <code>*</code></label>
                                <input type="email" id="email" class="form-control" name="email" required readonly>                    
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Address <code>*</code></label>
                                <input type="text" id="address" class="form-control" name="address" required readonly>                    
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Gender <code>*</code></label>
                                <input type="text" id="gender" class="form-control" name="gender" required readonly>                    
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">DOB <code>*</code></label>
                                <input type="date" id="dob" class="form-control" name="dob" required readonly>                    
                            </div>
                        </div>
                    </div>
                </fieldset> --}}
                <input type="hidden" name="campaign_user_id" value="{{$register->campaign_user_id}}">
                <input type="hidden" name="register_campaign_user_id" value="{{$register->id}}">
                <div class="form-group">
                    <label for="" style="font-weight: 600">Chief Complaint</label>
                    <textarea name="chief_complaint" class="form-control summernote" cols="30" rows="10" required></textarea>
                </div>
                <h6 style="font-weight: 600">Attitude and food intake habit:</h6>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">1. How many times do you eat in a daily basis?</label>
                            <select name="how_eat_daily"  class="form-control" required>
                                <option value="" selected disabled>---Select---</option>
                                <option value="2 times">2 times</option>
                                <option value="3 times">3 times</option>
                                <option value="4 times">4 times</option>
                                <option value="5 times">5 times</option>
                                <option value="More than 5 times">More than 5 times</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">2. What do you eat in a daily basis?</label>
                            <select name="what_eat_daily"  class="form-control" required>
                                <option value="" selected disabled>---Select---</option>
                                <option value="Vegetarian food">Vegetarian food</option>
                                <option value="Non-vegetarian food">Non-vegetarian food</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">3. Do you know about junk food? </label> <br>
                            <div class="custom-control custom-radio custom-control-inline" style="z-index: 0">
                                <input type="radio" id="junk_food1" value="Yes" name="junk_food" class="custom-control-input" required>
                                <label class="custom-control-label" for="junk_food1">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline" style="z-index: 0">
                                <input type="radio" id="junk_food2" value="No" name="junk_food" class="custom-control-input" required>
                                <label class="custom-control-label" for="junk_food2">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">4. Participation in extracurricular activities? </label> <br>
                            <div class="custom-control custom-radio custom-control-inline" style="z-index: 0">
                                <input type="radio" id="extracurricular1" value="Yes" name="extracurricular" class="custom-control-input" required>
                                <label class="custom-control-label" for="extracurricular1">Yes</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline" style="z-index: 0">
                                <input type="radio" id="extracurricular2" value="No" name="extracurricular" class="custom-control-input" required>
                                <label class="custom-control-label" for="extracurricular2">No</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" style="font-weight: 600">Problem List</label>
                    <textarea name="problems" class="form-control summernote" cols="30" rows="10" required></textarea>
                </div>                
                <div class="form-group">
                    <label for="" style="font-weight: 600">Dietary Management</label>
                    <textarea name="dietary_management" class="form-control summernote" cols="30" rows="10" required></textarea>
                </div>
                <div class="form-group text-right">
                    <button class="btn btn-primary" type="submit"><i class="icon-paperplane"></i> Submit</button>
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
    {{-- <script>
        $(document).ready(function(){

            $('#campaigns_select').change(function(){
                let campaign = $(this).val();
                $.ajax({
                    url:'{{route("campaign.userList")}}',
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { data:campaign },
                    success: function(response) {
                        $('#users_select').empty();
                        $('#users_select').append('<option value="" selected disabled>---Select User---</option>');
                        $.each(response, function(index, option) {
                            $('#users_select').append('<option value="' + option.campaign_user_id + '">' + option.campaignuser.name + ' (' + option.campaignuser.phone + ')' + '</option>');
                        });
                    }
                })
            })

            $('#users_select').change(function(){
                let user = $(this).val();
                let campaign = $('#campaigns_select').val();
                $.ajax({
                    url:'{{route("campaign.getProfile")}}',
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { user:user, campaign:campaign },
                    success: function(response) {
                        $('#register_campaign_user_id').val(response.id);
                        $('#campaign_user_id').val(response.campaignuser.id);
                        $('#name').val(response.campaignuser.name);
                        $('#phone').val(response.campaignuser.phone);
                        $('#email').val(response.campaignuser.email);
                        $('#address').val(response.campaignuser.address);
                        $('#gender').val(response.campaignuser.gender);
                        $('#dob').val(response.campaignuser.dob);
                        $('#address').val(response.campaignuser.address);
                    }
                })
            });
        })
    </script> --}}
@endsection