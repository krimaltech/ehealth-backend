@extends('admin.master')
@section('header')
<link rel="stylesheet" href="/global_assets/countrycode/css/intlTelInput.css"> 
<link rel="stylesheet" href="/global_assets/countrycode/css/isValidNumber.css"> 
<link rel="stylesheet" href="/global_assets/countrycode/css/prism.css"> 
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">User Profile</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('member.index') }}" class="breadcrumb-item">User Profile</a>
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
        th,
        td {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
    </style>
    <form action="{{ route('member.update', $member->slug) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $member->member->name }}" class="form-control"
                                required>
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="text" name="email" value="{{ $member->member->email }}" class="form-control"
                                required>
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" id="phone1" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{$member->member->phone}}" >
                            <span id="valid-msg1" class="hide valid">✓ Valid</span>
                            <span id="error-msg1" class="hide error"></span>
                            @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="form-label">Gender <code>*</code></label>
                            <select class="form-control" name="gender" required>
                                <option value="" selected disabled>--select--</option>
                                <option value="Male" @if ($member->gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if ($member->gender == 'Female') selected @endif>Female</option>
                                <option value="Other" @if ($member->gender == 'Other') selected @endif>Other</option>
                            </select>
                            @error('gender')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="gender">Address</label>
                            <input type="text" name="address" value="{{ $member->address }}" class="form-control">
                            @error('address')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="dob">Date Of Birth<code>*</code></label>
                            <input type="date" name="dob" value="{{ $member->dob }}" class="form-control" required>
                            @error('dob')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="blood_group">Blood Group</label>
                            <select class="form-control" name="blood_group">
                                <option value="" selected disabled>--select--</option>
                                <option value="A+" @if ($member->blood_group == 'A+') selected @endif>A+</option>
                                <option value="A-" @if ($member->blood_group == 'A-') selected @endif>A-</option>
                                <option value="B+" @if ($member->blood_group == 'B+') selected @endif>B+</option>
                                <option value="B-" @if ($member->blood_group == 'B-') selected @endif>B-</option>
                                <option value="O+" @if ($member->blood_group == 'O+') selected @endif>O+</option>
                                <option value="O-" @if ($member->blood_group == 'O-') selected @endif>O-</option>
                                <option value="AB+" @if ($member->blood_group == 'AB+') selected @endif>AB+</option>
                                <option value="AB-" @if ($member->blood_group == 'AB-') selected @endif>AB-</option>
                            </select>
                            @error('blood_group')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="weight">Weight</label>
                            <input type="text" name="weight" value="{{ $member->weight }}" class="form-control"
                                placeholder="Weight in kg">
                            @error('weight')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="height">Height</label>
                            <input type="text" name="height" value="{{ $member->height }}" class="form-control"
                                placeholder="Height in meter">
                            @error('height')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="image">Image</label><br>
                            @if ($member->image != null)
                                <img src="{{ asset('/storage/images/' . $member->image) }}" alt=""
                                    height="200px" width="250px">
                            @endif
                            <input type="file" name="image" onchange="readURL(this)">
                            <img src="" height="200px" width="250px" id="selectedImage"
                                style="display: none;">
                            @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    {{-- @if($member->member_type == null)
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="member_type">Member Type<code>*</code></label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="member_type" id="primary_member" value="Primary Member" required>
                                <label class="form-check-label" for="primary_member">
                                    Primary Member
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="member_type" id="dependent_member" value="Dependent Member" required>
                                <label class="form-check-label" for="dependent_member">
                                    Dependent Member
                                </label>
                            </div>
                            @error('height')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 d-none primary">
                        <div class="form-group">
                            <label for="family_name">Enter Family Name<code>*</code></label>
                            <input type="text" name="family_name" class="form-control"
                                placeholder="Eg: DemoFamily12" >
                            @error('family_name')
                                <div class="alert alert-danger">This family name already exists.</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4 d-none dependent">
                        <div class="form-group">
                            <label for="family_name">Enter Family Name added by your primary member<code>*</code></label>
                            <input type="text" name="family_name" class="form-control"
                                placeholder="Eg: DemoFamily12" >
                            @error('family_name')
                                <div class="alert alert-danger">The family name does not exist.</div>
                            @enderror
                        </div>
                    </div>
                    @else
                    <input type="hidden" name="member_type" value="{{$member->member_type}}">
                    @endif --}}
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
@endsection

@section('custom-script')
<script src="/global_assets/countrycode/js/intlTelInput.js"></script>
    <script src="/global_assets/countrycode/js/isValidNumber.js"></script>
    <script src="/global_assets/countrycode/js/prism.js"></script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#selectedImage').attr('src', e.target.result);
                    $('#selectedImage').css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#selectedImage').change(function() {
            readURL(this);
        })
    </script>
    <script>
        function readFile(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#selectedImages').attr('src', e.target.result);
                    $('#selectedImages').css('display', 'block');
                }
                reader.readAsDataFile(input.files[0]);
            }
        }

        $('#selectedImages').change(function() {
            readFile(this);
        })
        function readThat(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#image').attr('src', e.target.result);
                    $('#image').css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image").change(function() {
            readThat(this);
        });
    </script>
    <script>
        $(document).ready(function(){
            $("input[name='member_type']").on("click" , function () {
                let type = $("input[name='member_type']:checked").val();
                if(type == 'Primary Member'){
                    $('.primary').removeClass('d-none');
                    $('.primary').addClass('d-block');
                    $('.primary input[name="family_name"]').attr("required", true);
                    $('.primary input[name="family_name"]').attr("disabled", false);
                    $('.dependent').removeClass('d-block');
                    $('.dependent').addClass('d-none');
                    $('.dependent input[name="family_name"]').attr("disabled", true);
                }
                if(type == 'Dependent Member'){
                    $('.dependent').removeClass('d-none');
                    $('.dependent').addClass('d-block');
                    $('.dependent input[name="family_name"]').attr("required", true);
                    $('.dependent input[name="family_name"]').attr("disabled", false);
                    $('.primary').removeClass('d-block');
                    $('.primary').addClass('d-none');
                    $('.primary input[name="family_name"]').attr("disabled", true);
                }
            })
        })
    </script>
@endsection
