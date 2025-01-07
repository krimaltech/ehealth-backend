@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit</span> -Ophthalmologist Screening Form</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('ophthalmologist.index') }}" class="breadcrumb-item">Ophthalmologist Screening Form</a>
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
            <h6 style="font-weight: 600">Screening Form</h6>
            <form method="POST" action="{{ route('ophthalmologist.update',$screening->id) }}" class="wizard-form steps-validation" enctype="multipart/form-data" data-fouc id="global_form_submitted">
                @csrf
                @method('PATCH')
                <h6>History</h6>            
                <fieldset>
                    <div class="form-group">
                        <label for="">Ocular History <code>*</code></label>
                        <select name="ocular_history" id="ocular_history" class="form-control" required>
                            <option value="" disabled selected>---Select Ocular History---</option>
                            <option value="Normal" @if($screening->ocular_history == 'Normal') selected @endif>Normal</option>
                            <option value="Positive" @if($screening->ocular_history == 'Positive') selected @endif>Positive</option>
                        </select>
                    </div>
                    @if($screening->ocular_history == 'Positive')
                    <div class="form-group valuepositivediv">
                        <label for="">Ocular History Positive For: <code>*</code></label>
                        <input type="text" name="ocular_history_positive" class="ocular_history_positive form-control" value="{{$screening->ocular_history_positive}}">
                    </div>
                    @endif
                    <div class="form-group positivediv" style="display: none">
                        <label for="">Ocular History Positive For: <code>*</code></label>
                        <input type="text" name="ocular_history_positive" class="ocular_history_positive form-control" value="{{$screening->ocular_history_positive}}">
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
                                <td>6/ <input type="number" name="visual_distance_right" value="{{$screening->visual_distance_right}}" required></td>
                                <td>6/ <input type="number" name="visual_distance_left" value="{{$screening->visual_distance_left}}" required></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">2. External Exam (Lids, Lashes, Cornea, etc.) </label>
                                <select name="external_exam" id="external_exam" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal" @if($screening->external_exam == 'Normal') selected @endif>Normal</option>
                                    <option value="Abnormal" @if($screening->external_exam == 'Abnormal') selected @endif>Abnormal</option>
                                    <option value="Not Able to Assess" @if($screening->external_exam == 'Not Able to Assess') selected @endif>Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        @if($screening->external_exam == 'Abnormal' || $screening->external_exam == 'Not Able to Assess')
                        <div class="col-md-6 value_external_exam_comment_div">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control external_exam_comment" name="external_exam_comment" value="{{$screening->external_exam_comment}}">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6 external_exam_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control external_exam_comment" name="external_exam_comment" value="{{$screening->external_exam_comment}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">3. Internal Exam (Vitreous, Lens, Fundus, etc.) </label>
                                <select name="internal_exam" id="internal_exam" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal" @if($screening->internal_exam == 'Normal') selected @endif>Normal</option>
                                    <option value="Abnormal" @if($screening->internal_exam == 'Abnormal') selected @endif>Abnormal</option>
                                    <option value="Not Able to Assess" @if($screening->internal_exam == 'Not Able to Assess') selected @endif>Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        @if($screening->internal_exam == 'Abnormal' || $screening->internal_exam == 'Not Able to Assess')
                        <div class="col-md-6 value_internal_exam_comment_div">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control internal_exam_comment" name="internal_exam_comment" value="{{$screening->internal_exam_comment}}">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6 internal_exam_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control internal_exam_comment" name="internal_exam_comment" value="{{$screening->internal_exam_comment}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">4. Pupillary Reflex (Pupils) </label>
                                <select name="pupillary_reflex" id="pupillary_reflex" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal" @if($screening->pupillary_reflex == 'Normal') selected @endif>Normal</option>
                                    <option value="Abnormal" @if($screening->pupillary_reflex == 'Abnormal') selected @endif>Abnormal</option>
                                    <option value="Not Able to Assess" @if($screening->pupillary_reflex == 'Not Able to Assess') selected @endif>Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        @if($screening->pupillary_reflex == 'Abnormal' || $screening->pupillary_reflex == 'Not Able to Assess')
                        <div class="col-md-6 value_pupillary_reflex_comment_div">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control pupillary_reflex_comment" name="pupillary_reflex_comment" value="{{$screening->pupillary_reflex_comment}}">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6 pupillary_reflex_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control pupillary_reflex_comment" name="pupillary_reflex_comment" value="{{$screening->pupillary_reflex_comment}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">5. Binocular Function (Stereopsis) </label>
                                <select name="binocular_function" id="binocular_function" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal" @if($screening->binocular_function == 'Normal') selected @endif>Normal</option>
                                    <option value="Abnormal" @if($screening->binocular_function == 'Abnormal') selected @endif>Abnormal</option>
                                    <option value="Not Able to Assess" @if($screening->binocular_function == 'Not Able to Assess') selected @endif>Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        @if($screening->binocular_function == 'Abnormal' || $screening->binocular_function == 'Not Able to Assess')
                        <div class="col-md-6 value_binocular_function_comment_div">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control binocular_function_comment" name="binocular_function_comment" value="{{$screening->binocular_function_comment}}">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6 binocular_function_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control binocular_function_comment" name="binocular_function_comment" value="{{$screening->binocular_function_comment}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">6. Accommodation and Vergence </label>
                                <select name="accommodation_vergence" id="accommodation_vergence" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal" @if($screening->accommodation_vergence == 'Normal') selected @endif>Normal</option>
                                    <option value="Abnormal" @if($screening->accommodation_vergence == 'Abnormal') selected @endif>Abnormal</option>
                                    <option value="Not Able to Assess" @if($screening->accommodation_vergence == 'Not Able to Assess') selected @endif>Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        @if($screening->accommodation_vergence == 'Abnormal' || $screening->accommodation_vergence == 'Not Able to Assess')
                        <div class="col-md-6 value_accommodation_vergence_comment_div">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control accommodation_vergence_comment" name="accommodation_vergence_comment" value="{{$screening->accommodation_vergence_comment}}">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6 accommodation_vergence_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control accommodation_vergence_comment" name="accommodation_vergence_comment" value="{{$screening->accommodation_vergence_comment}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">7. Color Vision </label>
                                <select name="color_vision" id="color_vision" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal" @if($screening->color_vision == 'Normal') selected @endif>Normal</option>
                                    <option value="Abnormal" @if($screening->color_vision == 'Abnormal') selected @endif>Abnormal</option>
                                    <option value="Not Able to Assess" @if($screening->color_vision == 'Not Able to Assess') selected @endif>Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        @if($screening->color_vision == 'Abnormal' || $screening->color_vision == 'Not Able to Assess')
                        <div class="col-md-6 value_color_vision_comment_div">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control color_vision_comment" name="color_vision_comment" value="{{$screening->color_vision_comment}}">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6 color_vision_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control color_vision_comment" name="color_vision_comment" value="{{$screening->color_vision_comment}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">8. Glaucoma Evaluation </label>
                                <select name="glaucoma_evaluation" id="glaucoma_evaluation" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal" @if($screening->glaucoma_evaluation == 'Normal') selected @endif>Normal</option>
                                    <option value="Abnormal" @if($screening->glaucoma_evaluation == 'Abnormal') selected @endif>Abnormal</option>
                                    <option value="Not Able to Assess" @if($screening->glaucoma_evaluation == 'Not Able to Assess') selected @endif>Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        @if($screening->glaucoma_evaluation == 'Abnormal' || $screening->glaucoma_evaluation == 'Not Able to Assess')
                        <div class="col-md-6 value_glaucoma_evaluation_comment_div">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control glaucoma_evaluation_comment" name="glaucoma_evaluation_comment" value="{{$screening->glaucoma_evaluation_comment}}">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6 glaucoma_evaluation_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control glaucoma_evaluation_comment" name="glaucoma_evaluation_comment" value="{{$screening->glaucoma_evaluation_comment}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">9. Oculomotor Evaluation </label>
                                <select name="oculomotor_assessment" id="oculomotor_assessment" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="Normal" @if($screening->oculomotor_assessment == 'Normal') selected @endif>Normal</option>
                                    <option value="Abnormal" @if($screening->oculomotor_assessment == 'Abnormal') selected @endif>Abnormal</option>
                                    <option value="Not Able to Assess" @if($screening->oculomotor_assessment == 'Not Able to Assess') selected @endif>Not Able to Assess</option>
                                </select>
                            </div>
                        </div>
                        @if($screening->oculomotor_assessment == 'Abnormal' || $screening->oculomotor_assessment == 'Not Able to Assess')
                        <div class="col-md-6 value_oculomotor_assessment_comment_div">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control oculomotor_assessment_comment" name="oculomotor_assessment_comment" value="{{$screening->oculomotor_assessment_comment}}">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6 oculomotor_assessment_comment_div" style="display: none">
                            <div class="form-group">
                                <label for="">Comment</label>
                                <input type="text" class="form-control oculomotor_assessment_comment" name="oculomotor_assessment_comment" value="{{$screening->oculomotor_assessment_comment}}">
                            </div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <label for="" class="mr-3">10.Other</label>
                        <input type="text" name="other_comment" class="form-control" value="{{$screening->other_comment}}">
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
                                    <option value="Normal" @if($screening->diagnosis == 'Normal') selected @endif>Normal</option>
                                    <option value="Myopia" @if($screening->diagnosis == 'Myopia') selected @endif>Myopia</option>
                                    <option value="Hyperopia" @if($screening->diagnosis == 'Hyperopia') selected @endif>Hyperopia</option>
                                    <option value="Astigmatism" @if($screening->diagnosis == 'Astigmatism') selected @endif>Astigmatism</option>
                                    <option value="Strabismus" @if($screening->diagnosis == 'Strabismus') selected @endif>Strabismus</option>
                                    <option value="Amblyopia" @if($screening->diagnosis == 'Amblyopia') selected @endif>Amblyopia</option>
                                    <option value="Other" @if($screening->diagnosis == 'Other') selected @endif>Other</option>
                                </select>
                            </div>
                        </div>
                        @if($screening->diagnosis == 'Other')
                        <div class="col-md-6 value_other_diagnosis_div" >
                            <div class="form-group">
                                <label for="">Other Diagnosis</label>
                                <input type="text" class="form-control other_diagnosis" name="other_diagnosis" value="{{$screening->other_diagnosis}}">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6 other_diagnosis_div" style="display: none">
                            <div class="form-group">
                                <label for="">Other Diagnosis</label>
                                <input type="text" class="form-control other_diagnosis" name="other_diagnosis" value="{{$screening->other_diagnosis}}">
                            </div>
                        </div>
                    </div>              
                </fieldset>

                <h6>Recommendations</h6>
                <fieldset>
                    <div class="form-group">
                        <label for="">1. Corrective Lenses </label> <br>
                        <div class="custom-control custom-radio custom-control-inline" style="z-index: 0">
                            <input type="radio" id="corrective_lenses1" value="Yes" name="corrective_lenses" class="custom-control-input" @if($screening->corrective_lenses == 'Yes') checked @endif required>
                            <label class="custom-control-label" for="corrective_lenses1">Yes</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline" style="z-index: 0">
                            <input type="radio" id="corrective_lenses2" value="No" name="corrective_lenses" class="custom-control-input" @if($screening->corrective_lenses == 'No') checked @endif required>
                            <label class="custom-control-label" for="corrective_lenses2">No</label>
                        </div>
                    </div>
                    @if($screening->corrective_lenses == 'Yes')
                    <div class="value_glass_contact_div">
                        <div class="form-group">
                            <label for="">Glass or contact should be worn for</label>
                            <select name="glass_contact" id="" class="form-control glass_contact">
                                <option value="" selected disabled>---Select---</option>
                                <option value="Contact Wear" @if($screening->glass_contact == 'Contact Wear') selected @endif>Contact Wear</option>
                                <option value="Near Vision" @if($screening->glass_contact == 'Near Vision') selected @endif>Near Vision</option>
                                <option value="Far Vision" @if($screening->glass_contact == 'Far Vision') selected @endif>Far Vision</option>
                                <option value="May be removed for Physical Education/Recess" @if($screening->glass_contact == 'May be removed for Physical Education/Recess') selected @endif>May be removed for Physical Education/Recess</option>
                            </select>
                        </div>
                    </div>
                    @endif
                    <div class=" glass_contact_div" style="display: none">
                        <div class="form-group">
                            <label for="">Glass or contact should be worn for</label>
                            <select name="glass_contact" id="" class="form-control glass_contact">
                                <option value="" selected disabled>---Select---</option>
                                <option value="Contact Wear" @if($screening->glass_contact == 'Contact Wear') selected @endif>Contact Wear</option>
                                <option value="Near Vision" @if($screening->glass_contact == 'Near Vision') selected @endif>Near Vision</option>
                                <option value="Far Vision" @if($screening->glass_contact == 'Far Vision') selected @endif>Far Vision</option>
                                <option value="May be removed for Physical Education/Recess" @if($screening->glass_contact == 'May be removed for Physical Education/Recess') selected @endif>May be removed for Physical Education/Recess</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">2. Recommended Re-examination</label>
                                <select name="reexamination" id="reexamination" class="form-control" required>
                                    <option value="" disabled selected>---Select---</option>
                                    <option value="3 months" @if($screening->reexamination == '3 months') selected @endif>3 months</option>
                                    <option value="6 months" @if($screening->reexamination == '6 months') selected @endif>6 months</option>
                                    <option value="12 months" @if($screening->reexamination == '12 months') selected @endif>12 months</option>
                                    <option value="Other" @if($screening->reexamination == 'Other') selected @endif>Other</option>
                                </select>
                            </div>
                        </div>
                        @if($screening->reexamination == 'Other')
                        <div class="col-md-6 value_reexamination_other_div">
                            <div class="form-group">
                                <label for="">Other Re-examination</label>
                                <input type="text" class="form-control reexamination_other" name="reexamination_other" value="{{$screening->reexamination_other}}">
                            </div>
                        </div>
                        @endif
                        <div class="col-md-6 reexamination_other_div" style="display: none">
                            <div class="form-group">
                                <label for="">Other Re-examination</label>
                                <input type="text" class="form-control reexamination_other" name="reexamination_other" value="{{$screening->reexamination_other}}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Advice</label>
                                <select name="advice[]" class="form-control select" multiple="multiple" required>
                                    <option value="Eat more green vegetables and yellow fruits" @if(in_array('Eat more green vegetables and yellow fruits',$screening->advice)) selected @endif>Eat more green vegetables and yellow fruits</option>
                                    <option value="Wear sunglasses" @if(in_array('Wear sunglasses',$screening->advice)) selected @endif>Wear sunglasses</option>                                   
                                    <option value="Quit smoking/drinking alcohol" @if(in_array('Quit smoking/drinking alcohol',$screening->advice)) selected @endif>Quit smoking/drinking alcohol</option>
                                    <option value="Do eye exercises" @if(in_array('Do eye exercises',$screening->advice)) selected @endif>Do eye exercises</option>
                                    <option value="Use safety eyewear" @if(in_array('Use safety eyewear',$screening->advice)) selected @endif>Use safety eyewear</option>
                                    <option value="Follow 20-20-20 rules" @if(in_array('Follow 20-20-20 rules',$screening->advice)) selected @endif>Follow 20-20-20 rules</option>
                                    <option value="Take a cold compress" @if(in_array('Take a cold compress',$screening->advice)) selected @endif>Take a cold compress</option>
                                    <option value="Take a hot compress" @if(in_array('Take a hot compress',$screening->advice)) selected @endif>Take a hot compress</option>
                                    <option value="Don't rub your eyes" @if(in_array("Don't rub your eyes",$screening->advice)) selected @endif>Don't rub your eyes</option>
                                    <option value="Lubricate your eyes" @if(in_array('Lubricate your eyes',$screening->advice)) selected @endif>Lubricate your eyes</option>
                                    <option value="Avoid blowing air" @if(in_array('Avoid blowing air',$screening->advice)) selected @endif>Avoid blowing air</option>
                                    <option value="Wear wraparound sunglasses" @if(in_array('Wear wraparound sunglasses',$screening->advice)) selected @endif>Wear wraparound sunglasses</option>
                                    <option value="Limit screen time" @if(in_array('Limit screen time',$screening->advice)) selected @endif>Limit screen time</option>
                                    <option value="Better sleep" @if(in_array('Better sleep',$screening->advice)) selected @endif>Better sleep</option>
                                    <option value="Contact lens care" @if(in_array('Contact lens care',$screening->advice)) selected @endif>Contact lens care</option>
                                    <option value="Rest your eyes" @if(in_array('Rest your eyes',$screening->advice)) selected @endif>Rest your eyes</option>
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
                    $('.valuepositivediv').css('display','none');
                    $('.ocular_history_positive').attr('required',false);
                }
            });
            
            $('#external_exam').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.external_exam_comment_div').css('display','block');
                    $('.external_exam_comment').attr('required',true);
                }else{
                    $('.external_exam_comment_div').css('display','none');
                    $('.value_external_exam_comment_div').css('display','none');
                    $('.external_exam_comment').attr('required',false);
                }
            });

            $('#internal_exam').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.internal_exam_comment_div').css('display','block');
                    $('.internal_exam_comment').attr('required',true);
                }else{
                    $('.internal_exam_comment_div').css('display','none');
                    $('.value_internal_exam_comment_div').css('display','none');
                    $('.internal_exam_comment').attr('required',false);
                }
            });

            $('#pupillary_reflex').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.pupillary_reflex_comment_div').css('display','block');
                    $('.pupillary_reflex_comment').attr('required',true);
                }else{
                    $('.pupillary_reflex_comment_div').css('display','none');
                    $('.value_pupillary_reflex_comment_div').css('display','none');
                    $('.pupillary_reflex_comment').attr('required',false);
                }
            });

            $('#binocular_function').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.binocular_function_comment_div').css('display','block');
                    $('.binocular_function_comment').attr('required',true);
                }else{
                    $('.binocular_function_comment_div').css('display','none');
                    $('.value_binocular_function_comment_div').css('display','none');
                    $('.binocular_function_comment').attr('required',false);
                }
            });

            $('#accommodation_vergence').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.accommodation_vergence_comment_div').css('display','block');
                    $('.accommodation_vergence_comment').attr('required',true);
                }else{
                    $('.accommodation_vergence_comment_div').css('display','none');
                    $('.value_accommodation_vergence_comment_div').css('display','none');
                    $('.accommodation_vergence_comment').attr('required',false);
                }
            });

            $('#color_vision').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.color_vision_comment_div').css('display','block');
                    $('.color_vision_comment').attr('required',true);
                }else{
                    $('.color_vision_comment_div').css('display','none');
                    $('.value_color_vision_comment_div').css('display','none');
                    $('.color_vision_comment').attr('required',false);
                }
            });

            $('#glaucoma_evaluation').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.glaucoma_evaluation_comment_div').css('display','block');
                    $('.glaucoma_evaluation_comment').attr('required',true);
                }else{
                    $('.glaucoma_evaluation_comment_div').css('display','none');
                    $('.value_glaucoma_evaluation_comment_div').css('display','none');
                    $('.glaucoma_evaluation_comment').attr('required',false);
                }
            });

            $('#oculomotor_assessment').change(function(){
                let value = $(this).val();
                if(value == 'Abnormal' || value == 'Not Able to Assess'){
                    $('.oculomotor_assessment_comment_div').css('display','block');
                    $('.oculomotor_assessment_comment').attr('required',true);
                }else{
                    $('.oculomotor_assessment_comment_div').css('display','none');
                    $('.value_oculomotor_assessment_comment_div').css('display','none');
                    $('.oculomotor_assessment_comment').attr('required',false);
                }
            });

            $('#diagnosis').change(function(){
                let value = $(this).val();
                if(value == 'Other'){
                    $('.other_diagnosis_div').css('display','block');
                    $('.other_diagnosis').attr('required',true);
                }else{
                    $('.other_diagnosis_div').css('display','none');
                    $('.value_other_diagnosis_div').css('display','none');
                    $('.other_diagnosis').attr('required',false);
                }
            });

            $('input[name="corrective_lenses"]').change(function(){
                let value = $(this).val();
                if(value == 'Yes'){
                    $('.glass_contact_div').css('display','block');
                    $('.glass_contact').attr('required',true);
                }else{
                    $('.glass_contact_div').css('display','none');
                    $('.value_glass_contact_div').css('display','none');
                    $('.glass_contact').attr('required',false);
                }
            });

            $('#reexamination').change(function(){
                let value = $(this).val();
                if(value == 'Other'){
                    $('.reexamination_other_div').css('display','block');
                    $('.reexamination_other').attr('required',true);
                }else{
                    $('.reexamination_other_div').css('display','none');
                    $('.value_reexamination_other_div').css('display','none');
                    $('.reexamination_other').attr('required',false);
                }
            });

        });        
    </script>
@endsection