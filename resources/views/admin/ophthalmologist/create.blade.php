@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add</span> -Ophthalmologist Screening Form</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('ophthalmologist.index') }}" class="breadcrumb-item">Ophthalmologist Screening Form</a>
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
            <h6 style="font-weight: 600">Screening Form</h6>
            <form method="POST" action="{{ route('ophthalmologist.store') }}" class="wizard-form steps-validation" enctype="multipart/form-data" data-fouc id="global_form_submitted">
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
                <h6>History</h6>            
                <fieldset>
                    <div class="form-group">
                        <label for="">Ocular History <code>*</code></label>
                        <select name="ocular_history" id="ocular_history" class="form-control" required>
                            <option value="" disabled selected>---Select Ocular History---</option>
                            <option value="Normal">Normal</option>
                            <option value="Positive">Positive</option>
                        </select>
                    </div>
                    <div class="form-group positivediv" style="display: none">
                        <label for="">Ocular History Positive For: <code>*</code></label>
                        <input type="text" name="ocular_history_positive" class="ocular_history_positive form-control">
                    </div>
                </fieldset>

                <h6>Examination </h6>
                <fieldset>
                    <table class="table table-bordered mb-2">
                        <thead>
                            <tr>
                                <th rowspan="2">1.Examination</th>
                                <th colspan="2" class="text-center">Distance</th>
                            </tr>
                            <tr>
                                <th>Right</th>
                                <th>Left</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Visual Acuity</td>
                                <td>6/ <input type="number" name="visual_distance_right"  required></td>
                                <td>6/ <input type="number" name="visual_distance_left"  required></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">2. External Exam (Lids, Lashes, Cornea, etc.) </label>
                                <select name="external_exam" id="external_exam" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                    <option value="Not Able to Assess">Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 external_exam_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control external_exam_comment" name="external_exam_comment">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">3. Internal Exam (Vitreous, Lens, Fundus, etc.) </label>
                                <select name="internal_exam" id="internal_exam" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                    <option value="Not Able to Assess">Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 internal_exam_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control internal_exam_comment" name="internal_exam_comment">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">4. Pupillary Reflex (Pupils) </label>
                                <select name="pupillary_reflex" id="pupillary_reflex" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                    <option value="Not Able to Assess">Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 pupillary_reflex_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control pupillary_reflex_comment" name="pupillary_reflex_comment">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">5. Binocular Function (Stereopsis) </label>
                                <select name="binocular_function" id="binocular_function" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                    <option value="Not Able to Assess">Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 binocular_function_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control binocular_function_comment" name="binocular_function_comment">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">6. Accommodation and Vergence </label>
                                <select name="accommodation_vergence" id="accommodation_vergence" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                    <option value="Not Able to Assess">Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 accommodation_vergence_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control accommodation_vergence_comment" name="accommodation_vergence_comment">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">7. Color Vision </label>
                                <select name="color_vision" id="color_vision" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                    <option value="Not Able to Assess">Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 color_vision_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control color_vision_comment" name="color_vision_comment">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">8. Glaucoma Evaluation </label>
                                <select name="glaucoma_evaluation" id="glaucoma_evaluation" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                    <option value="Not Able to Assess">Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 glaucoma_evaluation_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control glaucoma_evaluation_comment" name="glaucoma_evaluation_comment">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">9. Oculomotor Evaluation </label>
                                <select name="oculomotor_assessment" id="oculomotor_assessment" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Abnormal">Abnormal</option>
                                    <option value="Not Able to Assess">Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 oculomotor_assessment_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control oculomotor_assessment_comment" name="oculomotor_assessment_comment">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <label for="" class="mr-3">10.Other</label>
                        <input type="text" name="other_comment" class="form-control">
                    </div>
                </fieldset>

                <h6>Diagnosis</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Diagnosis</label>
                                <select name="diagnosis" id="diagnosis" class="form-control" required>
                                    <option value="" selected disabled>---Select Diagnosis---</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Myopia">Myopia</option>
                                    <option value="Hyperopia">Hyperopia</option>
                                    <option value="Astigmatism">Astigmatism</option>
                                    <option value="Strabismus">Strabismus</option>
                                    <option value="Amblyopia">Amblyopia</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 other_diagnosis_div" style="display: none">
                            <div class="form-group">
                                <label for="">Other Diagnosis</label>
                                <input type="text" class="form-control other_diagnosis" name="other_diagnosis">
                            </div>
                        </div>
                    </div>              
                </fieldset>

                <h6>Recommendations</h6>
                <fieldset>
                    <div class="form-group">
                        <label for="">1. Corrective Lenses </label> <br>
                        <div class="custom-control custom-radio custom-control-inline" style="z-index:0">
                            <input type="radio" id="corrective_lenses1" value="Yes" name="corrective_lenses" class="custom-control-input" required>
                            <label class="custom-control-label" for="corrective_lenses1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline" style="z-index:0">
                            <input type="radio" id="corrective_lenses2" value="No" name="corrective_lenses" class="custom-control-input" required>
                            <label class="custom-control-label" for="corrective_lenses2">No</label>
                        </div>
                    </div>
                    <div class=" glass_contact_div" style="display: none">
                        <div class="form-group">
                            <label for="">Glass or contact should be worn for</label>
                            <select name="glass_contact" id="" class="form-control glass_contact">
                                <option value="" selected disabled>---Select---</option>
                                <option value="Contact Wear">Contact Wear</option>
                                <option value="Near Vision">Near Vision</option>
                                <option value="Far Vision">Far Vision</option>
                                <option value="May be removed for Physical Education/Recess">May be removed for Physical Education/Recess</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">2. Recommended Re-examination</label>
                                <select name="reexamination" id="reexamination" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="3 months">3 months</option>
                                    <option value="6 months">6 months</option>
                                    <option value="12 months">12 months</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 reexamination_other_div" style="display: none">
                            <div class="form-group">
                                <label for="">Other Re-examination</label>
                                <input type="text" class="form-control reexamination_other" name="reexamination_other">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Advice</label>
                                <select name="advice[]" class="form-control select" multiple="multiple" required>
                                    <option value="Eat more green vegetables and yellow fruits">Eat more green vegetables and yellow fruits</option>
                                    <option value="Wear sunglasses">Wear sunglasses</option>                                   
                                    <option value="Quit smoking/drinking alcohol">Quit smoking/drinking alcohol</option>
                                    <option value="Do eye exercises">Do eye exercises</option>
                                    <option value="Use safety eyewear">Use safety eyewear</option>
                                    <option value="Follow 20-20-20 rules">Follow 20-20-20 rules</option>
                                    <option value="Take a cold compress">Take a cold compress</option>
                                    <option value="Take a hot compress">Take a hot compress</option>
                                    <option value="Don't rub your eyes">Don't rub your eyes</option>
                                    <option value="Lubricate your eyes">Lubricate your eyes</option>
                                    <option value="Avoid blowing air">Avoid blowing air</option>
                                    <option value="Wear wraparound sunglasses">Wear wraparound sunglasses</option>
                                    <option value="Limit screen time">Limit screen time</option>
                                    <option value="Better sleep">Better sleep</option>
                                    <option value="Contact lens care">Contact lens care</option>
                                    <option value="Rest your eyes">Rest your eyes</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </fieldset>

            </form>
        </div>
    </div>
@endsection

@section('custom-script')
    <script src="{{ asset('global_assets/form_wizard/js/form_wizard.js') }}"></script>
    <script src="{{ asset('global_assets/form_wizard/js/steps.min.js') }}"></script>
    <script src="{{ asset('global_assets/form_wizard/js/validate.min.js') }}"></script>    
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote({
                height: 200,
                toolbar: [
                    ['style', ['bold', 'italic']], //Specific toolbar display
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#ocular_history').change(function(){
                let value = $(this).val();
                if(value == 'Positive'){
                    $('.positivediv').css('display','block');
                    $('.ocular_history_positive').attr('required',true);
                }else{
                    $('.positivediv').css('display','none');
                    $('.ocular_history_positive').attr('required',false);
                    $('.ocular_history_positive').val('');
                }
            });
            
            $('#external_exam').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.external_exam_comment_div').css('display','block');
                    $('.external_exam_comment').attr('required',true);
                }else{
                    $('.external_exam_comment_div').css('display','none');
                    $('.external_exam_comment').attr('required',false);
                    $('.external_exam_comment').val('');
                }
            });

            $('#internal_exam').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.internal_exam_comment_div').css('display','block');
                    $('.internal_exam_comment').attr('required',true);
                }else{
                    $('.internal_exam_comment_div').css('display','none');
                    $('.internal_exam_comment').attr('required',false);
                    $('.internal_exam_comment').val('');
                }
            });

            $('#pupillary_reflex').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.pupillary_reflex_comment_div').css('display','block');
                    $('.pupillary_reflex_comment').attr('required',true);
                }else{
                    $('.pupillary_reflex_comment_div').css('display','none');
                    $('.pupillary_reflex_comment').attr('required',false);
                    $('.pupillary_reflex_comment').val('');
                }
            });

            $('#binocular_function').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.binocular_function_comment_div').css('display','block');
                    $('.binocular_function_comment').attr('required',true);
                }else{
                    $('.binocular_function_comment_div').css('display','none');
                    $('.binocular_function_comment').attr('required',false);
                    $('.binocular_function_comment').val('');
                }
            });

            $('#accommodation_vergence').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.accommodation_vergence_comment_div').css('display','block');
                    $('.accommodation_vergence_comment').attr('required',true);
                }else{
                    $('.accommodation_vergence_comment_div').css('display','none');
                    $('.accommodation_vergence_comment').attr('required',false);
                    $('.accommodation_vergence_comment').val('');
                }
            });
http://127.0.0.1:8000/admin/online-doctor-consultation/findings
            $('#color_vision').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.color_vision_comment_div').css('display','block');
                    $('.color_vision_comment').attr('required',true);
                }else{
                    $('.color_vision_comment_div').css('display','none');
                    $('.color_vision_comment').attr('required',false);
                    $('.color_vision_comment').val('');
                }
            });

            $('#glaucoma_evaluation').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.glaucoma_evaluation_comment_div').css('display','block');
                    $('.glaucoma_evaluation_comment').attr('required',true);
                }else{
                    $('.glaucoma_evaluation_comment_div').css('display','none');
                    $('.glaucoma_evaluation_comment').attr('required',false);
                    $('.glaucoma_evaluation_comment').val('');
                }
            });

            $('#oculomotor_assessment').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.oculomotor_assessment_comment_div').css('display','block');
                    $('.oculomotor_assessment_comment').attr('required',true);
                }else{
                    $('.oculomotor_assessment_comment_div').css('display','none');
                    $('.oculomotor_assessment_comment').attr('required',false);
                    $('.oculomotor_assessment_comment').val('');
                }
            });

            $('#diagnosis').change(function(){
                let value = $(this).val();
                if(value == 'Other'){
                    $('.other_diagnosis_div').css('display','block');
                    $('.other_diagnosis').attr('required',true);
                }else{
                    $('.other_diagnosis_div').css('display','none');
                    $('.other_diagnosis').attr('required',false);
                    $('.other_diagnosis').val('');
                }
            });

            $('input[name="corrective_lenses"]').change(function(){
                let value = $(this).val();
                if(value == 'Yes'){
                    $('.glass_contact_div').css('display','block');
                    $('.glass_contact').attr('required',true);
                }else{
                    $('.glass_contact_div').css('display','none');
                    $('.glass_contact').attr('required',false);
                    $('.glass_contact').val('');
                }
            });

            $('#reexamination').change(function(){
                let value = $(this).val();
                if(value == 'Other'){
                    $('.reexamination_other_div').css('display','block');
                    $('.reexamination_other').attr('required',true);
                }else{
                    $('.reexamination_other_div').css('display','none');
                    $('.reexamination_other').attr('required',false);
                    $('.reexamination_other').val('');
                }
            });

        });        
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
                        console.log(response)

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