@extends('admin.master')

@section('custom-style')
    <link rel="stylesheet" href="{{asset('assets/css/datepicker.css')}}">
@endsection
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add</span> - Campaign Users</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('campaignusers.index') }}" class="breadcrumb-item">Campaign Users</a>
                    <span class="breadcrumb-item active">Register</span>
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
        <div class="d-flex align-items-center">
            <input type="number" class="form-control" placeholder="Enter phone number to check user existence..." id="verify_email">
            <button class="btn btn-primary ml-3" id="verify_btn">Verify</button>
        </div>
        <div class="text-danger no_email_data mt-2" style="display: none">
            * User with the entered phone does not exist. Please add the user.
        </div>
        <div class="text-danger email mt-2" style="display: none">
            * Please enter the phone.
        </div>
        <hr>
        
        <form action="{{ route('campaignusers.store') }}" method="POST" style="display: none" id="campaign_user_form">
            @csrf
            <div class="existing_data" style="display: none">
                <div class="form-group mt-3">
                    <label for="">User profiles with the entered phone </label>
                    <select class="form-control" id="user_profiles" name="campaign_user_id">
                        <option value="" selected disabled>---Select User Profile---</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="campaign_div">
                    <div class="form-group">
                        <label for="">Campaign <code>*</code></label>
                        <select name="campaign_id" id="campaign" class="form-control" required>
                            <option value="">---Select Campaign--</option>
                            @foreach ($campaign as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4" style="display: none" id="user_type_div">
                    <div class="form-group">
                        <label for="">Type <code>*</code></label>
                        <select name="user_type" id="user_type" class="form-control">
                            <option value="">---Select User Type--</option>
                            <option value="Parent">Parent</option>
                            <option value="Child">Child</option>
                            <option value="Staff">Staff</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">First Name  <code>*</code></label>
                        <input type="text" name="first_name" id="first_name" class="form-control" required value="{{old('first_name')}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Middle Name</label>
                        <input type="text" name="middle_name" id="middle_name" class="form-control" value="{{old('middle_name')}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="">Last Name <code>*</code></label>
                        <input type="text" name="last_name" id="last_name" class="form-control" required value="{{old('last_name')}}">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="">Gender <code>*</code></label>
                        <select name="gender" id="gender" class="form-control" required>
                            <option value="" disabled selected>---Select Gender---</option>
                            <option value="Male" @if(old('gender') == 'Male') selected @endif>Male</option>
                            <option value="Female" @if(old('gender') == 'Female') selected @endif>Female</option>
                            <option value="Other" @if(old('gender') == 'Other') selected @endif>Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Date of Birth (BS)</label>                
                        <input type="text" class="form-control" name="dob_bs" id="dob_bs" value="{{old('dob_bs')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Date of Birth (AD) <code>*</code></label>
                        <input type="date" class="form-control" name="dob" id="dob" max="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required value="{{old('dob')}}">
                    </div>
                </div>
            </div>  
            <div style="display:none" class="school_form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Class <code>*</code></label>
                            <input type="text" name="class" id="class" class="form-control" value="{{old('class')}}">
                        </div> 
                    </div> 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Parent Name <code>*</code></label>
                            <select name="parent_id" id="parent" class="form-control select-search">
                                <option value="" selected disabled>---Select Parent---</option>                        
                            </select>
                        </div>  
                    </div>
                </div>
            </div>          
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Phone No. <code>*</code></label>
                        <input type="number" name="phone" id="phone" class="form-control" required value="{{old('phone')}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Email </label>
                        <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
                    </div>
                </div>
            </div>  
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Address <code>*</code></label>
                        <input type="text" name="address" id="address" class="form-control" required value="{{old('address')}}">
                    </div>    
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Occupation </label>
                        <input type="text" name="occupation" id="occupation" class="form-control" value="{{old('occupation')}}">
                    </div>    
                </div>
            </div>  
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('custom-script')
    <script src="{{asset('assets/js/datepicker.js')}}"></script>  
    <script>
        $(document).ready(function(){
            $('#verify_btn').click(function(){
                let phone =  $('#verify_email').val();
                if(phone == ''){
                    $('.email').css('display','block');
                }else{
                    $('.email').css('display','none');
                    $.ajax({
                        url:'{{route("campaignusers.verifyPhone")}}',
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: { data:phone },
                        success: function(response) {
                            $('#campaign_user_form').css('display','block');
                            if (response.error) {
                                $('.no_email_data').css('display', 'block');
                                $('.existing_data').css('display', 'none');
                            } else {
                                $('.no_email_data').css('display', 'none');
                                $('.existing_data').css('display', 'block');
                                $.each(response, function(index, option) {
                                    $('#user_profiles').append('<option value="' + option.id + '">' + option.name + '</option>');
                                });
                            }
                        }
                    })
                }
            })

            $('#user_profiles').change(function(){
                let profile = $(this).val();
                $.ajax({
                    url:'{{route("campaignusers.getProfile")}}',
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { data:profile },
                    success: function(response) {
                        $('#first_name').val(response.first_name);
                        $('#middle_name').val(response.middle_name);
                        $('#last_name').val(response.last_name);
                        $('#gender').val(response.gender);
                        $('#dob').val(response.dob);
                        $('#phone').val(response.phone);
                        $('#email').val(response.email);
                        $('#address').val(response.address);
                        $('#occupation').val(response.occupation);
                    }
                })
            })

            $('#verify_email').on('input',function(){
                $('#campaign_user_form').css('display','none');
                $('.no_email_data').css('display', 'none');
                $('.existing_data').css('display', 'none');
            })

            $('#campaign').change(function(){
                let campaign = $(this).val();
                $.ajax({
                    url:'{{route("campaign.getCampaign")}}',
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { data:campaign },
                    success: function(response) {
                        if(response.campaign_type == 'School'){
                            $('#campaign_div').removeClass('col-md-12'); 
                            $('#campaign_div').addClass('col-md-8'); 
                            $('#user_type_div').css('display','block'); 
                            $('#user_type').val('');
                            $('#user_type').attr('required',true);      
                            $('#parent').empty();
                            $('#parent').append('<option value="" selected disabled>---Select Parent---</option>');
                            $.each(response.registercampaign, function(index, option) {
                                $('#parent').append('<option value="' + option.campaignuser
                                    .id + '">' + option.campaignuser
                                    .name + ' (' + option.campaignuser.phone + ')' +
                                    '</option>');
                            });   
                            $('#phone').val('')
                            $('#email').val('');
                            $('#address').val('');             
                        }else{
                            $('#campaign_div').addClass('col-md-12'); 
                            $('#campaign_div').removeClass('col-md-8'); 
                            $('#user_type_div').css('display','none'); 
                            $('#user_type').removeAttr('required');
                            $('#user_type').val('');
                            $('#parent').empty();
                            $('#parent').append('<option value="" selected disabled>---Select Parent---</option>');
                            $('.school_form').css('display','none');                        
                            $('#parent_name').removeAttr('required');
                            $('#class').removeAttr('required');  
                            $('#parent_name').val('');
                            $('#class').val('');
                            $('#phone').val('')
                            $('#email').val('');
                            $('#address').val(''); 
                        }
                    }
                })
            })

            $('#user_type').change(function(){
                let type = $(this).val();
                if(type == 'Child'){
                    $('.school_form').css('display','block'); 
                    $('#parent_name').attr('required',true);
                    $('#class').attr('required',true);
                }else{
                    $('.school_form').css('display','none');                        
                    $('#parent_name').removeAttr('required');
                    $('#class').removeAttr('required');
                    $('#parent_name').val('');
                    $('#class').val('');
                }
            })

            $('#parent').change(function(){
                let profile = $(this).val();
                $.ajax({
                    url:'{{route("campaignusers.getProfile")}}',
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { data:profile },
                    success: function(response) {
                        $('#phone').val(response.phone);
                        $('#email').val(response.email);
                        $('#address').val(response.address);
                    }
                })
            })

            $("#dob_bs").on("dateSelect", function (event) {
                eventLog(event);
            });

            function eventLog(event){
                var datePickerData = event.datePickerData;
                $.ajax({
                    type: 'GET',
                    url: '{{ route("convertDate") }}',
                    data: {
                        date: datePickerData.formattedDate,
                    },
                    success: function(response) {
                        $('#dob').val(response);
                    }
                })
              
            }

        }) 
    </script>
    <script>
        $(document).ready(function() {
            var currentDate = new Date();
            var currentNepaliDate = calendarFunctions.getBsDateByAdDate(currentDate.getFullYear(), currentDate.getMonth() + 1, currentDate.getDate());
            var formatedNepaliDate = calendarFunctions.bsDateFormat("%y-%m-%d", currentNepaliDate.bsYear, currentNepaliDate.bsMonth, currentNepaliDate.bsDate);
            $("#dob_bs").nepaliDatePicker({
                dateFormat: "%y-%m-%d",
                maxDate: formatedNepaliDate
            });
        });
    </script>
@endsection