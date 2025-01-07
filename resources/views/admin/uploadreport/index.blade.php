@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Test Report Entry</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Test Report Entry</span>
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
    .fileinput-upload{
        display: none;
    }   
    .btn-file,.file-caption,.fileinput-remove{
        z-index:0 !important;
    }
    .brighttheme-success {
        background-color: #25b372; 
        border-color:#25b372;
        color: #fff;
    }
</style>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Users</label>
                    <select name="sample" id="" class="form-control select-search selectUser">
                        <option value="">---Select User (Sample No.)---</option>
                        @foreach ($sample as $item)
                            <option value="{{$item->id}}">{{$item->members->user->name}} ({{$item->sample_no}})</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body details border-top pt-3 d-none">
            <div class="row">
                <div class="col-md-4">
                    <h6><b>User Details</b></h6>
                    <div class="mt-4">
                        <p><b>Name :</b> <span id="name"> </span><br/></p>
                        <p><b>DOB :</b> <span id="dob"><span><br/></p>
                        <p><b>Age :</b> <span id="userage"></span><br/></p>
                        <p><b>Gender :</b> <span id="usergender"></span><br/></p>
                    </div>
                </div>
                <div class="col-md-4">
                    <h6><b>Screening Details</b></h6>
                    <div class="mt-4">
                        <p><b>Subscription Package :</b> <span id="package"> </span><br/></p>
                        <p><b>Screening :</b> <span id="screening"> </span> <br/></p>
                        <p><b>Screening Date :</b> <span id="screeningdate"> </span><br/></p> 

                    </div>
                </div>
                <div class="col-md-4">
                    <h6><b>Sample Details</b></h6>
                    <div class="mt-4">
                        <p><b>Sample No. :</b> <span id="sampleNo"> </span><br/></p>
                        <p><b>Sample Collected Date :</b> <span id="sampleDate"> </span><br/></p>
                        <p><b>Sample Collected By :</b> <span id="collectedBy"> </span><br/></p>
                        <p><b>Status :</b> <span id="status"> </span><br/></p>
                    </div>
                </div>
            </div>  
            <div class="card mt-3 uploadDiv">
                <form method="POST" action="{{route('uploadreport.store')}}" enctype="multipart/form-data" class="uploadForm">
                    @csrf
                    <input type="hidden" id="age">
                    <input type="hidden" id="gender">
                    <input type="hidden" name="report_id" id="report_id">
                    <div class="card-body">
                        <h6 class="mb-4" style="font-weight:600">Upload Test Report</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Select Lab Profile</label>
                                    <input type="hidden" id="packagescreening">
                                    <select name="profile_id" id="" class="form-control select-search selectProfile">
                                        <option value="" selected disabled>--Select Lab Profile--</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Select Lab Test</label>
                                    <select name="test_id" id="test_id" class="form-control select-search selectTest">
                                        <option value="" selected disabled>--Select Lab Test--</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="range d-none">
                            <div class="row" style="margin-left: auto;margin-right: auto">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="background-color:#063B9D; color:white">
                                            <th width="25%">Test</th>
                                            <th width="25%">Range</th>
                                            <th width="25%">Unit</th>
                                            <th width="25%">Result</th>
                                        </tr>
                                    </thead>
                                    <tbody id="results">  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="value d-none">
                            <div class="row" style="margin-left: auto;margin-right: auto">    
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="background-color:#063B9D; color:white">
                                            <th width="25%">Test Particulars</th>
                                            <th>Result</th>
                                        </tr>
                                    </thead>
                                    <tbody id="value_results">  
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="upload_report mt-1 d-none">
                            <div class="form-group">
                                <span id="inputs"></span>
                                <label for="">Upload Report</label>
                                <input type="file" class="file-input" name="report" id="report" >
                            </div>
                        </div>
                        <div class="text-danger error" style="display:none">
                            Please select either lab profile or lab test.
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-primary" id="skip">Skip</button>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form> 
                
                <div class="modal fade" id="skipModal" tabindex="-1" role="dialog" aria-labelledby="skipModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Test Skip Reason</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" method="post" class="skipForm">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Provide reason for skipping <span id="test_name"></span>.</label>
                                        <textarea name="skip_reason" cols="30" rows="10" class="form-control summernote" id="skip_reason"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Skip</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
             
            <div class=" mt-3 py-1 publishDiv" style="display:none">
                <div class="alert alert-success py-2 d-flex justify-content-between align-items-center">
                    <p class="mb-0">Reports of all tests have been generated. You may publish the report.</h6>                    
                    <form action="{{route('medicalreport.publish')}}" method="POST">
                        @csrf
                        <input type="hidden" name="report_id" id="reportId">
                        <button type="submit" class="btn btn-success">Publish Report</button>
                    </form>                    
                </div>
            </div>         
        </div>
    </div>
@endsection

@section('custom-script')
    <script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
    <script src="/global_assets/js/demo_pages/fileinput.min.js"></script>
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote()
        })
    </script>
    <script>
        $(document).ready(function(){
            $('.selectUser').change(function(){
                let sampleId = $(this).val();
                $.ajax({
                    type:'get',
                    url:'/admin/upload-report/fetchdetails/'+ sampleId,
                    success:function(res) {
                        //console.log(res);
                        $('.selectProfile').empty();
                        $('.selectTest').empty();
                        $('.value').removeClass('d-block');
                        $('.value').addClass('d-none');
                        $('.upload_report').removeClass('d-block');
                        $('.upload_report').addClass('d-none');
                        $('.range').removeClass('d-block');
                        $('.range').addClass('d-none');
                        $('.selectProfile').append('<option value="" selected disabled>--Select Lab Profile--</option>');
                        $('.selectTest').append('<option value="" selected disabled>--Select Lab Test--</option>');
                        $('#name').text(res.sample.members.user.name)
                        $('#dob').text(res.sample.members.dob)
                        $('#userage').text(res.age)
                        $('#usergender').text(res.sample.members.gender)
                        $('#package').text(res.sample.screeningdate.userpackage.package.package_type)
                        $('#screening').text(res.sample.screeningdate.screening.screening)
                        $('#screeningdate').text(res.sample.screeningdate.screening_date)
                        $('#sampleNo').text(res.sample.sample_no)
                        $('#sampleDate').text(res.sample.sample_date)
                        $('#collectedBy').text(res.sample.collectedby.user.name)
                        $('#status').text(res.sample.status)
                        $('#age').val(res.age)
                        $('#gender').val(res.sample.members.gender)
                        $('#report_id').val(res.sample.id)
                        $('#reportId').val(res.sample.id)
                        $('#packagescreening').val(res.packagescreening)
                        if(res.sample.labreports.length != 0 && res.alltests.length == 0 && res.allprofiles.length == 0){
                            $('.uploadDiv').css('display','none');
                            $('.publishDiv').css('display','block');
                        }else{
                            $('.uploadDiv').css('display','block');
                            $('.publishDiv').css('display','none');
                            res.allprofiles.forEach(element =>{
                                $('.selectProfile').append(
                                    `<option value="${element['id']}">${element['profile_name']}</option>`
                                )
                            })
                            res.alltests.forEach(element =>{
                                $('.selectTest').append(
                                    `<option value="${element['labtest_id']}">${element['labtest']['tests']}</option>`
                                )
                            })
                            if(res.completedprofiles.length != 0){
                                res.completedprofiles.forEach(element =>{
                                    $('.selectProfile').append(
                                        `<option value="${element['id']}" disabled>${element['profile_name']}</option>`
                                    )
                                })
                            }
                            if(res.completedtests.length != 0){
                                res.completedtests.forEach(element =>{
                                    $('.selectTest').append(
                                        `<option value="${element['id']}" disabled>${element['tests']}</option>`
                                    )
                                })
                            }
                            if(res.skip.length != 0){
                                res.skip.forEach(element =>{
                                    if(element.labprofile_id != null){
                                        $('.selectProfile').append(
                                            `<option value="${element['labprofile_id']}" title="${element['labprofile_id']}" disabled>${element['profile']['profile_name']}</option>`
                                        )
                                    }
                                    if(element.labtest_id != null){
                                        $('.selectTest').append(
                                            `<option value="${element['labtest_id']}" title="${element['labtest_id']}" disabled>${element['test']['tests']}</option>`
                                        )
                                    }
                                })
                            }       
                        }
                        $('.selectProfile').select2({
                            templateResult: function (option) {
                                // check if the option is disabled and add an icon if it is
                                if (option.disabled && !option.selected && option.title) {
                                    return $('<span >' + option.text + ' <i class="icon-cross text-danger mr-1"></i><span class="text-danger">(Skipped)</span></span>');
                                } else if(option.disabled && !option.selected ){
                                    return $('<span >' + option.text + ' <i class="icon-checkmark text-success"></i> </span>');
                                }else{
                                    return option.text;
                                }
                            }
                        })
                        $('.selectTest').select2({
                            templateResult: function (option) {
                                // check if the option is disabled and add an icon if it is
                                if (option.disabled && !option.selected && option.title ) {
                                    return $('<span >' + option.text + ' <i class="icon-cross text-danger mr-1"></i><span class="text-danger">(Skipped)</span> </span>');
                                } else if(option.disabled && !option.selected ){
                                    return $('<span >' + option.text + ' <i class="icon-checkmark text-success"></i> </span>');
                                }else{
                                    return option.text;
                                }
                            }
                        })
                        $('.details').addClass('d-block');
                        $('.details').removeClass('d-none');
                    }
                });
            })
            $('.selectProfile').change(function(){
                if($(this).val() != null){
                    let profile = $(this).val();
                    let packagescreening = $('#packagescreening').val();
                    let age = $('#age').val();
                    let gender = $('#gender').val();
                    $('.error').css('display','none');
                    $.ajax({
                        type:'get',
                        url:'/admin/upload-report/'+ packagescreening + '/fetchprofiletest/'+ profile,
                        data:{
                            age : age,
                            gender : gender,
                        },
                        success:function(res) {
                            //console.log(res);
                            $('#results').empty();
                            $('#value_results').empty();
                            $('#report').fileinput('clear'); 
                            res.forEach(element =>{
                                if(element.labtest.test_result_type == 'Range'){
                                    $('#report').attr('required',false);
                                    $('.range').removeClass('d-none');
                                    $('.range').addClass('d-block');
                                    $('.value').removeClass('d-block');
                                    $('.value').addClass('d-none');
                                    $('.upload_report').removeClass('d-block');
                                    $('.upload_report').addClass('d-none');
                                    let min_range = '';
                                    let max_range = '';
                                    let amber_min_range = '';
                                    let amber_max_range = '';
                                    let red_min_range = '';
                                    let red_max_range = '';
                                    if(age <= 16){
                                        min_range = element['labtest']['child_min_range'];
                                        max_range = element['labtest']['child_max_range'];
                                        amber_min_range = element['labtest']['child_amber_min_range'];
                                        amber_max_range = element['labtest']['child_amber_max_range'];
                                        red_min_range = element['labtest']['child_red_min_range'];
                                        red_max_range = element['labtest']['child_red_max_range'];
                                    }else{
                                        if(gender == 'Male' || gender == 'Others'){
                                            min_range = element['labtest']['male_min_range'];
                                            max_range = element['labtest']['male_max_range'];
                                            amber_min_range = element['labtest']['male_amber_min_range'];
                                            amber_max_range = element['labtest']['male_amber_max_range'];
                                            red_min_range = element['labtest']['male_red_min_range'];
                                            red_max_range = element['labtest']['male_red_max_range'];
                                        }
                                        if(gender == 'Female'){
                                            min_range = element['labtest']['female_min_range'];
                                            max_range = element['labtest']['female_max_range'];
                                            amber_min_range = element['labtest']['female_amber_min_range'];
                                            amber_max_range = element['labtest']['female_amber_max_range'];
                                            red_min_range = element['labtest']['female_red_min_range'];
                                            red_max_range = element['labtest']['female_red_max_range'];
                                        }
                                    }

                                    $('#results').append(
                                        '<tr>' +
                                            '<input type="hidden" name="test_id[]" value="'+ element['labtest_id'] +'">' +
                                            '<input type="hidden" id="test_result_type'+element['labtest_id']+'" name="test_result_type[' + element['labtest_id'] +']" value="'+ element['labtest']['test_result_type'] +'">' +
                                            '<input type="hidden" id="min_range'+element['labtest_id']+'" name="min_range[' + element['labtest_id'] +']" value="'+ min_range +'">' +
                                            '<input type="hidden" id="max_range'+element['labtest_id']+'" name="max_range[' + element['labtest_id'] +']" value="'+ max_range +'">' +
                                            '<input type="hidden" id="amber_min_range'+element['labtest_id']+'" name="amber_min_range[' + element['labtest_id'] +']" value="'+ amber_min_range +'">' +
                                            '<input type="hidden" id="amber_max_range'+element['labtest_id']+'" name="amber_max_range[' + element['labtest_id'] +']" value="'+ amber_max_range +'">' +
                                            '<input type="hidden" id="red_min_range'+element['labtest_id']+'" name="red_min_range[' + element['labtest_id'] +']" value="'+ red_min_range +'">' +
                                            '<input type="hidden" id="red_max_range'+element['labtest_id']+'" name="red_max_range[' + element['labtest_id'] +']" value="'+ red_max_range +'">' +
                                            '<td>'+ element['labtest']['tests'] +'</td>'+
                                            '<td>'+ min_range + ' - ' + max_range +'</td>'+
                                            '<td>'+ element['labtest']['unit'] +'</td>'+
                                            '<td><input type="number" id="value'+element['labtest_id']+'" name="value[' + element['labtest_id'] +']" class="form-control" step="any" required></td>'+
                                        '</tr>'
                                    );
                                }else if(element.labtest.test_result_type == 'Value'){
                                    $('.value').addClass('d-block');
                                    $('.value').removeClass('d-none');
                                    $('.range').removeClass('d-block');
                                    $('.range').addClass('d-none');
                                    $('.upload_report').removeClass('d-block');
                                    $('.upload_report').addClass('d-none');
                                    $('#report').attr('required',false);
                                    $('#value_results').append('<input type="hidden" name="test_id[]" value="'+ element['labtest_id'] +'">');
                                    $('#value_results').append('<input type="hidden" id="test_result_type'+element['labtest_id']+'" name="test_result_type[' + element['labtest_id'] +']" value="'+ element['labtest']['test_result_type'] +'">');
                                    $('#value_results').append(
                                        `<tr>
                                            <td colspan="2">
                                                <b>Lab Test : ${element.labtest.tests}</b>
                                            </td>
                                        </tr>`
                                    );
                                    element.labtest.labvalue.forEach(value => {
                                        $('#value_results').append(                                    
                                            '<tr>' +
                                                '<input type="hidden" name="labvalue[' + element['labtest_id'] +']" value="'+ value['id'] +'">' +
                                                '<input type="hidden" id="labvalue_id'+value['id']+'" name="labvalue_id[' + value['id'] +']" value="'+ value['id'] +'">' +
                                                '<td>'+ value['result_name'] +'</td>'+
                                                '<td><textarea name="result[' + value['id'] +']" id="result'+value['id']+'" cols="30" rows="3" class="form-control" required></textarea></td>'+
                                            '</tr>'
                                        );
                                    })   
                                }
                                // else if(element.labtest.test_result_type == 'Image'){
                                //     $('.upload_report').removeClass('d-none');
                                //     $('.upload_report').addClass('d-block');
                                //     $('.range').removeClass('d-block');
                                //     $('.range').addClass('d-none');
                                //     $('.value').removeClass('d-block');
                                //     $('.value').addClass('d-none');
                                //     $('#report').attr('required',true);
                                //     $('#inputs').append('<input type="hidden" id="test_id" name="test_id[]" value="'+ element['labtest_id'] +'">');
                                //     $('#inputs').append('<input type="hidden" id="test_result_type" name="test_result_type" value="'+ element['labtest']['test_result_type'] +'">');
                                //     $('#inputs').append(`<p><b>Lab Test : ${element['labtest']['tests']}</b></p>`)
                                // }  
                            })              
                        }
                    });
                    if($('.selectTest').val() != null){
                        $('.selectTest').val('').trigger('change');
                    }
                }
            })
            $('.selectTest').change(function(){
                if($(this).val() != null){
                    let test = $(this).val();
                    let age = $('#age').val();
                    let gender = $('#gender').val();
                    $('.error').css('display','none');
                    $.ajax({
                        type:'get',
                        url:'/admin/upload-report/fetchtest/'+ test,
                        success:function(res) {
                           // console.log(res);
                            $('#results').empty();
                            $('#value_results').empty();
                            $('#report').fileinput('clear'); 
                            if(res.test_result_type == 'Range'){
                                $('#report').attr('required',false);
                                $('.range').removeClass('d-none');
                                $('.range').addClass('d-block');
                                $('.value').removeClass('d-block');
                                $('.value').addClass('d-none');
                                $('.upload_report').removeClass('d-block');
                                $('.upload_report').addClass('d-none');
                                let min_range = '';
                                let max_range = '';
                                let amber_min_range = '';
                                let amber_max_range = '';
                                let red_min_range = '';
                                let red_max_range = '';
                                if(age <= 16){
                                    min_range = res['child_min_range'];
                                    max_range = res['child_max_range'];
                                    amber_min_range = res['child_amber_min_range'];
                                    amber_max_range = res['child_amber_max_range'];
                                    red_min_range = res['child_red_min_range'];
                                    red_max_range = res['child_red_max_range'];
                                }else{
                                    if(gender == 'Male' || gender == 'Others'){
                                        min_range = res['male_min_range'];
                                        max_range = res['male_max_range'];
                                        amber_min_range = res['male_amber_min_range'];
                                        amber_max_range = res['male_amber_max_range'];
                                        red_min_range = res['male_red_min_range'];
                                        red_max_range = res['male_red_max_range'];
                                    }
                                    if(gender == 'Female'){
                                        min_range = res['female_min_range'];
                                        max_range = res['female_max_range'];
                                        amber_min_range = res['female_amber_min_range'];
                                        amber_max_range = res['female_amber_max_range'];
                                        red_min_range = res['female_red_min_range'];
                                        red_max_range = res['female_red_max_range'];
                                    }
                                }

                                $('#results').append(
                                    '<tr>' +
                                        '<input type="hidden" id="min_range" name="min_range" value="'+ min_range +'">' +
                                        '<input type="hidden" id="max_range" name="max_range" value="'+ max_range +'">' +
                                        '<input type="hidden" id="amber_min_range" name="amber_min_range" value="'+ amber_min_range +'">' +
                                        '<input type="hidden" id="amber_max_range" name="amber_max_range" value="'+ amber_max_range +'">' +
                                        '<input type="hidden" id="red_min_range" name="red_min_range" value="'+ red_min_range +'">' +
                                        '<input type="hidden" id="red_max_range" name="red_max_range" value="'+ red_max_range +'">' +
                                        '<input type="hidden" id="test_id" name="test_id" value="'+ res['id'] +'">' +
                                        '<input type="hidden" id="test_result_type" name="test_result_type" value="'+ res['test_result_type'] +'">' +
                                        '<td>'+ res['tests'] +'</td>'+
                                        '<td>'+ min_range + ' - ' + max_range +'</td>'+
                                        '<td>'+ res['unit'] +'</td>'+
                                        '<td><input type="number" id="value" name="value" class="form-control" step="any" required></td>'+
                                    '</tr>'
                                );
                            }else if(res.test_result_type == 'Value'){
                                $('.value').addClass('d-block');
                                $('.value').removeClass('d-none');
                                $('.range').removeClass('d-block');
                                $('.range').addClass('d-none');
                                $('.upload_report').removeClass('d-block');
                                $('.upload_report').addClass('d-none');
                                $('#report').attr('required',false);
                                $('#value_results').append('<input type="hidden" id="test_id" name="test_id" value="'+ res['id'] +'">');
                                $('#value_results').append('<input type="hidden" id="test_result_type"  name="test_result_type" value="'+ res['test_result_type'] +'">');
                                res.labvalue.forEach(element => {
                                    $('#value_results').append(                                    
                                        '<tr>' +
                                            '<input type="hidden" id="labvalue" name="labvalue[]" value="'+ element['id'] +'">' +
                                            '<input type="hidden" id="labvalue_id'+element['id']+'" name="labvalue_id[' + element['id'] +']" value="'+ element['id'] +'">' +
                                            '<td>'+ element['result_name'] +'</td>'+
                                            '<td><textarea name="result[' + element['id'] +']" id="result'+element['id']+'" cols="30" rows="3" class="form-control" required></textarea></td>'+
                                        '</tr>'
                                    );
                                })   
                            }else if(res.test_result_type == 'Value and Image'){                            
                                $('.upload_report').removeClass('d-none');
                                $('.upload_report').addClass('d-block');
                                $('.value').removeClass('d-none');
                                $('.value').addClass('d-block');
                                $('.range').removeClass('d-block');
                                $('.range').addClass('d-none');
                                $('#report').attr('required',true);
                                $('#value_results').append('<input type="hidden" id="test_id" name="test_id" value="'+ res['id'] +'">');
                                $('#value_results').append('<input type="hidden" id="test_result_type" name="test_result_type" value="'+ res['test_result_type'] +'">');
                                res.labvalue.forEach(element => {
                                    $('#value_results').append(                                    
                                        '<tr>' +
                                            '<input type="hidden" id="labvalue" name="labvalue[]" value="'+ element['id'] +'">' +
                                            '<input type="hidden" id="labvalue_id'+element['id']+'" name="labvalue_id[' + element['id'] +']" value="'+ element['id'] +'">' +
                                            '<td>'+ element['result_name'] +'</td>'+
                                            '<td><textarea name="result[' + element['id'] +']" id="result'+element['id']+'" cols="30" rows="3" class="form-control" required></textarea></td>'+
                                        '</tr>'
                                    );
                                })   
                            }else if(res.test_result_type == 'Image'){
                                $('.upload_report').removeClass('d-none');
                                $('.upload_report').addClass('d-block');
                                $('.range').removeClass('d-block');
                                $('.range').addClass('d-none');
                                $('.value').removeClass('d-block');
                                $('.value').addClass('d-none');
                                $('#report').attr('required',true);
                                $('#inputs').append('<input type="hidden" id="test_id" name="test_id" value="'+ res['id'] +'">');
                                $('#inputs').append('<input type="hidden" id="test_result_type" name="test_result_type" value="'+ res['test_result_type'] +'">');
                            }                
                        }
                    });
                    if($('.selectProfile').val() != null){
                        $('.selectProfile').val('').trigger('change');
                    }
                }
            })
            $('.uploadForm').submit(function(e){
                e.preventDefault();
                let profile = $('.selectProfile').val();
                let test = $('.selectTest').val();
                if(profile == null && test == null){
                    $('.error').css('display','block');
                }else{
                    if(test != null){
                        let image = document.getElementById('report');
                        let labvalue = document.querySelectorAll('input[name="labvalue[]"]');                        
                        const labvalues = [];
                        for (let i = 0; i < labvalue.length; i++) {
                            labvalues.push(labvalue[i].value);
                        }
                        var fd = new FormData();
                        fd.append('test_result_type',$('#test_result_type').val());
                        fd.append('report_id', $("#report_id").val());
                        fd.append('test_id', test);
                        fd.append('min_range', $("#min_range").val());
                        fd.append('max_range', $("#max_range").val());
                        fd.append('amber_min_range', $("#amber_min_range").val());
                        fd.append('amber_max_range', $("#amber_max_range").val());
                        fd.append('red_min_range', $("#red_min_range").val());
                        fd.append('red_max_range', $("#red_max_range").val());
                        fd.append('value',  $("#value").val());
                        labvalues.forEach(element => {
                            fd.append(`labvalue_id[${element}]`,  $(`#labvalue_id${element}`).val());
                            fd.append(`result[${element}]`,  $(`#result${element}`).val());
                        });
                        fd.append('report', image.files[0]);
                        $.ajax({
                            url: "{{route('uploadreport.store')}}",
                            type: 'POST',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: fd,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                //console.log(response);
                                new PNotify({
                                    title: "Success",
                                    text: response.success,
                                    type: "success",
                                    delay: 3000 // Optional: set a delay to automatically close the notification
                                });

                                $.ajax({
                                    type:'get',
                                    url:'/admin/upload-report/fetchdetails/'+ $("#report_id").val(),
                                    success:function(res) {
                                        //console.log(res);
                                        $('.selectProfile').empty();
                                        $('.selectTest').empty();
                                        $('.value').removeClass('d-block');
                                        $('.value').addClass('d-none');
                                        $('.upload_report').removeClass('d-block');
                                        $('.upload_report').addClass('d-none');
                                        $('.range').removeClass('d-block');
                                        $('.range').addClass('d-none');
                                         $('#report').fileinput('clear'); 
                                        $('.selectProfile').append('<option value="" selected disabled>--Select Lab Profile--</option>');
                                        $('.selectTest').append('<option value="" selected disabled>--Select Lab Test--</option>');
                                        $('#status').text(res.sample.status)
                                        if(res.alltests.length == 0 && res.allprofiles.length == 0){
                                            $('.uploadDiv').css('display','none');
                                            $('.publishDiv').css('display','block');
                                        }else{
                                            res.allprofiles.forEach(element =>{
                                                $('.selectProfile').append(
                                                    `<option value="${element['id']}">${element['profile_name']}</option>`
                                                )
                                            })
                                            res.alltests.forEach(element =>{
                                                $('.selectTest').append(
                                                    `<option value="${element['labtest_id']}">${element['labtest']['tests']}</option>`
                                                )
                                            })
                                            if(res.completedprofiles.length != 0){
                                                res.completedprofiles.forEach(element =>{
                                                    $('.selectProfile').append(
                                                        `<option value="${element['id']}" disabled>${element['profile_name']}</option>`
                                                    )
                                                })
                                            }
                                            if(res.completedtests.length != 0){
                                                res.completedtests.forEach(element =>{
                                                    $('.selectTest').append(
                                                        `<option value="${element['id']}" disabled>${element['tests']}</option>`
                                                    )
                                                })
                                            }
                                            if(res.skip.length != 0){
                                                res.skip.forEach(element =>{
                                                    if(element.labprofile_id != null){
                                                        $('.selectProfile').append(
                                                            `<option value="${element['labprofile_id']}" title="${element['labprofile_id']}" disabled>${element['profile']['profile_name']}</option>`
                                                        )
                                                    }
                                                    if(element.labtest_id != null){
                                                        $('.selectTest').append(
                                                            `<option value="${element['labtest_id']}" title="${element['labtest_id']}" disabled>${element['test']['tests']}</option>`
                                                        )
                                                    }
                                                })
                                            }       
                                        }
                                        $('.selectProfile').select2({
                                            templateResult: function (option) {
                                                // check if the option is disabled and add an icon if it is
                                                if (option.disabled && !option.selected && option.title) {
                                                    return $('<span >' + option.text + ' <i class="icon-cross text-danger mr-1"></i><span class="text-danger">(Skipped)</span></span>');
                                                } else if(option.disabled && !option.selected ){
                                                    return $('<span >' + option.text + ' <i class="icon-checkmark text-success"></i> </span>');
                                                }else{
                                                    return option.text;
                                                }
                                            }
                                        })
                                        $('.selectTest').select2({
                                            templateResult: function (option) {
                                                // check if the option is disabled and add an icon if it is
                                                if (option.disabled && !option.selected && option.title) {
                                                    return $('<span >' + option.text + ' <i class="icon-cross text-danger mr-1"></i><span class="text-danger">(Skipped)</span></span>');
                                                } else if(option.disabled && !option.selected ){
                                                    return $('<span >' + option.text + ' <i class="icon-checkmark text-success"></i> </span>');
                                                }else{
                                                    return option.text;
                                                }
                                            }
                                        })
                                        $('.details').addClass('d-block');
                                        $('.details').removeClass('d-none');
                                    }
                                });   
                            }
                        });
                    }
                    if(profile != null){
                        let test = document.querySelectorAll('input[name="test_id[]"]');   
                        let image = document.getElementById('report');                                         
                        const tests = [];
                        for (let i = 0; i < test.length; i++) {
                            tests.push(test[i].value);
                        }
                        var fd = new FormData();
                        tests.forEach(element => {
                            let labvalue = document.querySelectorAll(`input[name="labvalue[${element}]"]`);     
                            const labvalues = [];
                            for (let i = 0; i < labvalue.length; i++) {
                                labvalues.push(labvalue[i].value);
                            }           
                            fd.append('report_id', $('#report_id').val());
                            fd.append(`test_result_type[${element}]`, $(`#test_result_type${element}`).val());
                            fd.append(`test_id[${element}]`, element);
                            fd.append(`min_range[${element}]`, $(`#min_range${element}`).val());
                            fd.append(`max_range[${element}]`, $(`#max_range${element}`).val());
                            fd.append(`amber_min_range[${element}]`, $(`#amber_min_range${element}`).val());
                            fd.append(`amber_max_range[${element}]`, $(`#amber_max_range${element}`).val());
                            fd.append(`red_min_range[${element}]`, $(`#red_min_range${element}`).val());
                            fd.append(`red_max_range[${element}]`, $(`#red_max_range${element}`).val());
                            fd.append(`value[${element}]`, $(`#value${element}`).val());
                            labvalues.forEach(val => {
                                fd.append(`labvalue_id[${element}][${val}]`,  $(`#labvalue_id${val}`).val());
                                fd.append(`result[${element}][${val}]`,  $(`#result${val}`).val());
                            });
                        });

                        $.ajax({
                            url: "{{route('uploadreport.storeTests')}}",
                            type: 'POST',
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: fd,
                            contentType: false,
                            processData: false,
                            success: function(response) {
                                //console.log(response);   
                                new PNotify({
                                    title: "Success",
                                    text: response.success,
                                    type: "success",
                                    delay: 3000 // Optional: set a delay to automatically close the notification
                                });

                                $.ajax({
                                    type:'get',
                                    url:'/admin/upload-report/fetchdetails/'+ $("#report_id").val(),
                                    success:function(res) {
                                        //console.log(res);
                                        $('.selectProfile').empty();
                                        $('.selectTest').empty();
                                        $('.value').removeClass('d-block');
                                        $('.value').addClass('d-none');
                                        $('.upload_report').removeClass('d-block');
                                        $('.upload_report').addClass('d-none');
                                        $('.range').removeClass('d-block');
                                        $('.range').addClass('d-none');
                                         $('#report').fileinput('clear'); 
                                        $('.selectProfile').append('<option value="" selected disabled>--Select Lab Profile--</option>');
                                        $('.selectTest').append('<option value="" selected disabled>--Select Lab Test--</option>');
                                        $('#status').text(res.sample.status)
                                        if(res.alltests.length == 0 && res.allprofiles.length == 0){
                                            $('.uploadDiv').css('display','none');
                                            $('.publishDiv').css('display','block');
                                        }else{
                                            res.allprofiles.forEach(element =>{
                                                $('.selectProfile').append(
                                                    `<option value="${element['id']}">${element['profile_name']}</option>`
                                                )
                                            })
                                            res.alltests.forEach(element =>{
                                                $('.selectTest').append(
                                                    `<option value="${element['labtest_id']}">${element['labtest']['tests']}</option>`
                                                )
                                            })
                                            if(res.completedprofiles.length != 0){
                                                res.completedprofiles.forEach(element =>{
                                                    $('.selectProfile').append(
                                                        `<option value="${element['id']}" disabled>${element['profile_name']}</option>`
                                                    )
                                                })
                                            }
                                            if(res.completedtests.length != 0){
                                                res.completedtests.forEach(element =>{
                                                    $('.selectTest').append(
                                                        `<option value="${element['id']}" disabled>${element['tests']}</option>`
                                                    )
                                                })
                                            }
                                            if(res.skip.length != 0){
                                                res.skip.forEach(element =>{
                                                    if(element.labprofile_id != null){
                                                        $('.selectProfile').append(
                                                            `<option value="${element['labprofile_id']}" title="${element['labprofile_id']}" disabled>${element['profile']['profile_name']}</option>`
                                                        )
                                                    }
                                                    if(element.labtest_id != null){
                                                        $('.selectTest').append(
                                                            `<option value="${element['labtest_id']}" title="${element['labtest_id']}" disabled>${element['test']['tests']}</option>`
                                                        )
                                                    }
                                                })
                                            }                                                   
                                        }
                                        $('.selectProfile').select2({
                                            templateResult: function (option) {
                                                // check if the option is disabled and add an icon if it is
                                                if (option.disabled && !option.selected && option.title) {
                                                    return $('<span >' + option.text + ' <i class="icon-cross text-danger mr-1"></i><span class="text-danger">(Skipped)</span></span>');
                                                } else if(option.disabled && !option.selected ){
                                                    return $('<span >' + option.text + ' <i class="icon-checkmark text-success"></i> </span>');
                                                }else{
                                                    return option.text;
                                                }
                                            }
                                        })
                                        $('.selectTest').select2({
                                            templateResult: function (option) {
                                                // check if the option is disabled and add an icon if it is
                                                if (option.disabled && !option.selected && option.title) {
                                                    return $('<span >' + option.text + ' <i class="icon-cross text-danger mr-1"></i><span class="text-danger">(Skipped)</span></span>');
                                                } else if(option.disabled && !option.selected ){
                                                    return $('<span >' + option.text + ' <i class="icon-checkmark text-success"></i> </span>');
                                                }else{
                                                    return option.text;
                                                }
                                            }
                                        })
                                        $('.details').addClass('d-block');
                                        $('.details').removeClass('d-none');
                                    }
                                });                           
                            }
                        });
                    }
                }
            })

            $('#skip').click(function(e){
                e.preventDefault();
                let profile = $('.selectProfile').val();
                let test = $('.selectTest').val();
                if(profile == null && test == null){
                    $('.error').css('display','block');
                }else{
                    $('#skipModal').modal('show');
                    if(profile != null){
                        $('#test_name').text($('.selectProfile').find('option:selected').text());
                    }else if(test != null){
                        $('#test_name').text($('.selectTest').find('option:selected').text());
                    }
                }
            })

            $('.skipForm').submit(function(e){
                e.preventDefault();
                let profile = $('.selectProfile').val();
                let test = $('.selectTest').val();
                let reportId = $('#report_id').val();
                let reason = $('#skip_reason').val();
                if(test != null){
                    $.ajax({
                        url: "{{route('uploadreport.skip')}}",
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                            id : test,
                            reportId : reportId,
                            skip_reason : reason,
                            type : 'Test'
                        },
                        success: function (response){
                            success(response,reportId);
                        }
                    });
                }
                if(profile != null){
                    $.ajax({
                        url: "{{route('uploadreport.skip')}}",
                        type: 'POST',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {
                            id : profile,
                            reportId : reportId,
                            skip_reason : reason,
                            type : 'Profile'
                        },
                        success: function (response){
                            success(response,reportId);
                        }
                    });
                }
            })
        })
    </script>
    <script>
        function success(response,reportId){
            if(response.success){
                $('.summernote').summernote('reset');
                $('#skipModal').modal('hide');
            }
            new PNotify({
                title: "Success",
                text: response.success,
                type: "success",
                delay: 3000 // Optional: set a delay to automatically close the notification
            });

            $.ajax({
                type:'get',
                url:'/admin/upload-report/fetchdetails/'+ reportId,
                success:function(res) {
                    //console.log(res);
                    $('.selectProfile').empty();
                    $('.selectTest').empty();
                    $('.value').removeClass('d-block');
                    $('.value').addClass('d-none');
                    $('.upload_report').removeClass('d-block');
                    $('.upload_report').addClass('d-none');
                    $('.range').removeClass('d-block');
                    $('.range').addClass('d-none');
                     $('#report').fileinput('clear'); 
                    $('.selectProfile').append('<option value="" selected disabled>--Select Lab Profile--</option>');
                    $('.selectTest').append('<option value="" selected disabled>--Select Lab Test--</option>');
                    $('#status').text(res.sample.status)
                    if(res.alltests.length == 0 && res.allprofiles.length == 0){
                        $('.uploadDiv').css('display','none');
                        $('.publishDiv').css('display','block');
                    }else{
                        res.allprofiles.forEach(element =>{
                            $('.selectProfile').append(
                                `<option value="${element['id']}">${element['profile_name']}</option>`
                            )
                        })
                        res.alltests.forEach(element =>{
                            $('.selectTest').append(
                                `<option value="${element['labtest_id']}">${element['labtest']['tests']}</option>`
                            )
                        })
                        if(res.completedprofiles.length != 0){
                            res.completedprofiles.forEach(element =>{
                                $('.selectProfile').append(
                                    `<option value="${element['id']}" disabled>${element['profile_name']}</option>`
                                )
                            })
                        }
                        if(res.completedtests.length != 0){
                            res.completedtests.forEach(element =>{
                                $('.selectTest').append(
                                    `<option value="${element['id']}" disabled>${element['tests']}</option>`
                                )
                            })
                        }                                            
                        if(res.skip.length != 0){
                            res.skip.forEach(element =>{
                                if(element.labprofile_id != null){
                                    $('.selectProfile').append(
                                        `<option value="${element['labprofile_id']}" title="${element['labprofile_id']}" disabled>${element['profile']['profile_name']}</option>`
                                    )
                                }
                                if(element.labtest_id != null){
                                    $('.selectTest').append(
                                        `<option value="${element['labtest_id']}" title="${element['labtest_id']}" disabled>${element['test']['tests']}</option>`
                                    )
                                }
                            })
                        }                                           
                    }
                    $('.selectProfile').select2({
                        templateResult: function (option) {
                            // check if the option is disabled and add an icon if it is
                            if (option.disabled && !option.selected && option.title) {
                                return $('<span >' + option.text + ' <i class="icon-cross text-danger mr-1"></i><span class="text-danger">(Skipped)</span></span>');
                            } else if(option.disabled && !option.selected ){
                                return $('<span >' + option.text + ' <i class="icon-checkmark text-success"></i> </span>');
                            }else{
                                return option.text;
                            }
                        }
                    })
                    $('.selectTest').select2({
                        templateResult: function (option) {
                            // check if the option is disabled and add an icon if it is
                            if (option.disabled && !option.selected && option.title) {
                                return $('<span >' + option.text + ' <i class="icon-cross text-danger mr-1"></i><span class="text-danger">(Skipped)</span></span>');
                            } else if(option.disabled && !option.selected ){
                                return $('<span >' + option.text + ' <i class="icon-checkmark text-success"></i> </span>');
                            }else{
                                return option.text;
                            }
                        }
                    })
                    $('.details').addClass('d-block');
                    $('.details').removeClass('d-none');
                }
            });   
        }
    </script>
@endsection
