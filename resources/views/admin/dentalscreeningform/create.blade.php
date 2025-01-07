@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Dental Screening Form</span>
                </h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('dental-screening-form.index') }}" class="breadcrumb-item">Dental Screening Form</a>
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
        <form method="POST" action="{{ route('dental-screening-form.store') }}" class="wizard-form steps-validation"
            enctype="multipart/form-data" data-fouc id="global_form_submitted">
            @csrf
            {{-- <h6>User Verification</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Select Campaign <code>*</code> <span class="text-info">* Please select
                                    campaign to get users list.</span></label>
                            <select name="campaign" class="form-control select-search" id="campaigns_select" required>
                                <option value="" selected disabled>---Select Campaign---</option>
                                @foreach ($campaign as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
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
            <input type="hidden" name="campaign_user_id" value="{{$screening->campaign_user_id}}">
            <input type="hidden" name="register_campaign_user_id" value="{{$screening->id}}">
            <h6>1. Dental History</h6>
            <fieldset>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="dental_history">Dental History:</label>
                            <textarea name="dental_history" class="summernote" cols="30" rows="10">{{ old('dental_history') }}</textarea>
                            @error('dental_history')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Last dental visit:</label>
                            <select name="last_visit_date" id="" class="form-control">
                                <option value="" selected disabled>---Select---</option>
                                <option value="6 months">6 months</option>
                                <option value="1 year">1 year</option>
                                <option value="2 years">2 years</option>
                                <option value="3 years">3 years</option>
                                <option value="1st Dental Visit">1st Dental Visit</option>
                            </select>
                            @error('last_visit_date')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>Have you ever been treated for any of the (four) conditions below?:</label>
                            <select name="treated_condition[]" class="form-control select" multiple="multiple" required>
                                <option value="Peridontal Treatment (gum surgery/scaling & root planning/op ohis)">Peridontal Treatment (gum surgery/scaling & root planning/op ohis)
                                </option>
                                <option value="Orthodontics braces">Orthodontics braces
                                </option>
                                <option value="Prosthodontics cap bridge implant">Prosthodontics cap bridge implant
                                </option>
                                <option value="Endodontics (root canal and restorations)">Endodontics (root canal and restorations)</option>
                                <option value="Dental Extrations, Fillings Pain in the jaw joints">Dental Extrations,
                                    Fillings Pain in the jaw joints</option>
                                    <option value="None">None</option>
                            </select>
                            @error('treated_condition')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </fieldset>
            <h6>2. Physical Examination</h6>
            <fieldset>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label>Do you have any of the following dental habits:</label>
                            <select name="dental_habit[]" class="form-control select" multiple="multiple" required>
                                <option value="Grinding">Grinding</option>
                                <option value="Bruxism">Bruxism</option>
                                <option value="Thumb sucking">Thumb sucking</option>
                                <option value="Mouth breathing">Mouth breathing</option>
                                <option value="Nail Biting">Nail Biting</option>
                                <option value="None">None</option>
                            </select>
                            @error('dental_habit')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Do you use any tobacco products?</label>
                            <select name="tobacco_products" class="form-control">
                                <option value="">select</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                            @error('tobacco_products')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">What interdental aid do you use?</label>
                            <select name="dental_floss" class="form-control">
                                <option value="">select</option>
                                <option value="Floss">Floss</option>
                                <option value="Toothpick">Toothpick</option>
                                <option value="Interdental Brush">Interdental Brush</option>
                                <option value="Mouthwash">Mouthwash</option>
                                <option value="None">None</option>
                            </select>
                            @error('dental_floss')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">How often do you brush?</label>
                            <select name="dental_brush" class="form-control">
                                <option value="">select</option>
                                <option value="0 times in a day">0 times in a day</option>
                                <option value="1 times in a day">1 times in a day</option>
                                <option value="2 times in a day">2 times in a day</option>
                                <option value="3 times in a day">3 times in a day</option>
                            </select>
                            @error('dental_brush')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">How would you describe your current dental health?</label>
                            <select name="current_dental" class="form-control">
                                <option value="">select</option>
                                <option value="Good">Good</option>
                                <option value="Fair">Fair</option>
                                <option value="Poor">Poor</option>
                            </select>
                            @error('current_dental')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">What type of brush do you use?</label>
                            <select name="brush_type" class="form-control">
                                <option value="">select</option>
                                <option value="soft">soft</option>
                                <option value="medium">medium</option>
                                <option value="hard">hard</option>
                            </select>
                            @error('brush_type')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">What kind of toothpaste do you use?</label>
                            <select name="toothpaste_type" class="form-control">
                                <option value="">select</option>
                                <option value="Fluoridated">Fluoridated</option>
                                <option value=" Non Fluoridated"> Non Fluoridated</option>
                            </select>
                            @error('toothpaste_type')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="diagnosis">Diagnosis:</label>
                            <textarea name="diagnosis" class="summernote" cols="30" rows="10">{{ old('diagnosis') }}</textarea>
                            @error('diagnosis')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="prevention">Advice:</label>
                            <select name="prevention[]" class="form-control select" multiple="multiple" required>
                                <option value="Maintain Good Oral Hygiene">Maintain Good Oral Hygiene</option>
                                <option value="Scaling/Polishing">Scaling/Polishing</option>
                                <option value="Restoration of Offending Tooth">Restoration of Offending Tooth</option>
                                <option value="RCT of Offending Tooth">RCT of Offending Tooth</option>
                                <option value="Extraction of Offending Tooth">Extraction of Offending Tooth</option>
                                <option value="Replacement of Missing Tooth">Replacement of Missing Tooth</option>
                                <option value="Use Correct Brushing Technique">Use Correct Brushing Technique</option>
                                <option value="Eat Nutritious Food">Eat Nutritious Food</option>
                            </select>
                            @error('prevention')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="file_id">Recommended Files:</label>
                            <select name="file_id[]" class="form-control select" multiple="multiple" required>
                                @foreach ($recommendfiles as $item)
                                <option value="{{ $item->id }}">{{$loop->iteration}}.{{ $item->title }}</option>
                                @endforeach
                            </select>
                            @error('file_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
@endsection

@section('custom-script')
    <script src="{{ asset('global_assets/form_wizard/js/form_wizard.js') }}"></script>
    <script src="{{ asset('global_assets/form_wizard/js/steps.min.js') }}"></script>
    <script src="{{ asset('global_assets/form_wizard/js/validate.min.js') }}"></script>
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
    <!-- Summernote -->
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote()
        })
    </script>

    <script>
        $(document).ready(function() {

            $('#campaigns_select').change(function() {
                let campaign = $(this).val();
                $.ajax({
                    url: '{{ route("campaign.userList") }}',
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        data: campaign
                    },
                    success: function(response) {
                        $('#users_select').empty();
                        $('#users_select').append('<option value="" selected disabled>---Select User---</option>');
                        $.each(response, function(index, option) {
                            $('#users_select').append('<option value="' + option
                                .campaign_user_id + '">' + option.campaignuser
                                .name + ' (' + option.campaignuser.phone + ')' +
                                '</option>');
                        });
                    }
                })
            })

            $('#users_select').change(function() {
                let user = $(this).val();
                let campaign = $('#campaigns_select').val();
                $.ajax({
                    url: '{{ route("campaign.getProfile") }}',
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        user: user,
                        campaign: campaign
                    },
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
    </script>
@endsection
