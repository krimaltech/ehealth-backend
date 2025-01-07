@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Filter Notification</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('filternotification.index') }}" class="breadcrumb-item">Filter Notification</a>
                    <span class="breadcrumb-item active">Send</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <form action="{{route('filternotification.store')}}" method="post" >
            @csrf
            <div class="card-body">
                <h6 style="font-weight: 600">Apply filter to send notification</h6>
                <div class="form-group row mt-3 align-items-center">
                    <label class="col-lg-3">Packages</label>
                    <div class="col-lg-9">
                        <select name="package_id[]" id="packages" class="form-control select-search" multiple>
                            @foreach ($packages as $item)
                                <option value="{{$item->id}}" {{in_array( $item->id,(array)old('package_id')) ?'selected':''}}>{{$item->package_type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row mt-3 align-items-center">
                    <label class="col-lg-3">Location</label>
                    <div class="col-lg-7">
                        <select id="searchSelect" class="form-control"></select>
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                    </div>
                    <div class="col-lg-2">
                        <input type="number" name="radius" class="form-control" placeholder="in km" step="0.01" id="radius" disabled>
                    </div>
                </div>
                <div class="text-right">
                    <p id="radius_error" class="text-danger mb-0" style="font-weight: 500"></p>
                </div>
                <div class="form-group row mt-3 align-items-center">
                    <label class="col-lg-3">Platforms</label>
                    <div class="col-lg-9">
                        <select name="platforms[]" id="platforms" class="form-control select-search" multiple>
                            <option value="Web">Web</option>
                            <option value="Android">Android</option>
                            <option value="iOS">iOS</option>
                        </select>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" id="view">
                        View User Count
                    </button>
                    <p id="error" class="text-danger" style="font-weight: 500"></p>
                    <div id="result" class="alert alert-info" style="font-weight: 500;display:none">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <input type="checkbox" id="app" name="type[app]"><span style="font-weight:600" class="ml-2">App Notification</span>
                <div class="mt-3 app_notification" style="display:none">
                    <div class="form-group">
                        <label for="">Notification Title <code>*</code></label>
                        <input type="text" class="form-control" name="title" id="notification_title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Notification Message <code>*</code></label>
                        <textarea name="message" cols="30" rows="4" id="notification_message" class="form-control">{{old('message')}}</textarea>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <input type="checkbox" id="sms" name="type[sms]"><span style="font-weight:600" class="ml-2">SMS Notification</span>
                <div class="mt-3 sms_notification" style="display:none">
                    <div class="form-group">
                        <label for="">SMS Text <code>*</code></label>
                        <input type="text" class="form-control" name="sms_text" id="sms_text" value="{{old('sms_text')}}" >
                    </div>
                </div>
            </div>
            <div class="card-body">
                <input type="checkbox" id="email" name="type[email]"><span style="font-weight:600" class="ml-2">Email Notification</span>
                <div class="mt-3 email_notification" style="display:none">
                    <div class="form-group">
                        <label for="">Subject <code>*</code></label>
                        <input type="text" class="form-control" name="email_subject" id="email_subject" value="{{old('email_subject')}}" >
                    </div>
                    <div class="form-group">
                        <label for="">Message <code>*</code></label>
                        <textarea name="email_message" cols="30" rows="4" id="email_message" class="form-control">{{old('email_message')}}</textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary" id="send">Send</button>
            </div>
        </form>
    </div>
@endsection

@section('custom-script')
    <script>
        $(document).ready(function() {
            const searchSelect = $('#searchSelect');
            const apiKey = "{{ env('GEOAPIFY_API_KEY') }}";

            searchSelect.select2({
                placeholder: 'Search...',
                ajax: {
                    url: 'https://api.geoapify.com/v1/geocode/autocomplete',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            text: params.term,
                            apiKey: apiKey,
                            filter: 'countrycode:np',
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.features.map(feature => ({
                                id: JSON.stringify(feature),
                                text: feature.properties.formatted
                            }))
                        };
                    },
                    cache: true
                },
                minimumInputLength: 2
            });

            searchSelect.on('select2:select', function(event) {
                const selectedFeature = JSON.parse(event.params.data.id);
                $('#latitude').val(selectedFeature.properties.lat);
                $('#longitude').val(selectedFeature.properties.lon);
                $('#radius').removeAttr('disabled');
                $('#radius').attr('required', true);
                $('#error').empty();
                $('#result').css('display','none');
            });

            searchSelect.on('input', function(event) {
                const searchTerm = event.target.value.trim();
                if (searchTerm.length > 0) {
                    searchSelect.select2('open');
                    searchSelect.select2('search', searchTerm);
                }
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#app').change(function(){
                let app = $(this).prop('checked');
                if(app == true){
                    $('.app_notification').css('display','block');
                    $('#notification_title').prop('required','true');
                    $('#notification_message').prop('required','true');
                }else{
                    $('#notification_title').removeAttr('required');
                    $('#notification_message').removeAttr('required');
                    $('.app_notification').css('display','none');
                }
            })
            $('#sms').change(function(){
                let sms = $(this).prop('checked');
                if(sms == true){
                    $('.sms_notification').css('display','block');
                    $('#sms_text').prop('required','true');
                }else{
                    $('#sms_text').removeAttr('required');
                    $('.sms_notification').css('display','none');
                }
            })
            $('#email').change(function(){
                let email = $(this).prop('checked');
                if(email == true){
                    $('.email_notification').css('display','block');
                    $('#email_subject').prop('required','true');
                    $('#email_message').prop('required','true');
                }else{
                    $('#email_subject').removeAttr('required');
                    $('#email_message').removeAttr('required');
                    $('.email_notification').css('display','none');
                }
            })
        })
    </script>
    <script>
        $(document).ready(function(){
            $('#packages,#platforms').change(function(){
                $('#error').empty();
                $('#result').css('display','none');
            })
            $('#radius').keyup(function(event){
                if (event.key >= '0' && event.key <= '9') {
                    $('#radius_error').empty();
                }
            })
            $('#view').click(function(){
                let packages = $('#packages').val();
                let latitude = $('#latitude').val();
                let longitude = $('#longitude').val();
                let platforms = $('#platforms').val();
                let radius = $('#radius').val();
                if(latitude && longitude && radius == ''){
                    $('#radius_error').html('Please enter the location radius.');
                }else{
                    if(packages.length == 0 && latitude == '' && longitude == '' && platforms.length == 0){
                        $('#error').html('Please select at least one filter to get user count.');
                    }else{
                        $.ajax({
                            type:'get',
                            url:'/admin/filter-notification/fetch-user-count',
                            data:{
                                packages:packages,
                                latitude:latitude,
                                longitude:longitude,
                                radius:radius,
                                platforms:platforms
                            },
                            success:function(res) {
                                $('#result').css('display','block');
                                if(res == 0){
                                    $('#result').html('User Count: '+res+ '<br> No records found with this filter so sending notifications is disabled.' );
                                    $('#send').attr('disabled','true');
                                }else{
                                    $('#result').html('User Count: '+res);
                                    $('#send').removeAttr('disabled');
                                }
                            }
                        });
                    }
                }
            })
        });
    </script>
@endsection
