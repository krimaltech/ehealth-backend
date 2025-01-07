@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Send Notification</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('sendnotification.index') }}" class="breadcrumb-item">Send Notification</a>
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
        <form action="{{route('sendnotification.store')}}" method="post">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="">Users <code>*</code></label>
                    <select name="user_id[]" id="" class="form-control select-search" required multiple>
                        @foreach ($members as $item)
                            <option value="{{$item->member_id}}">{{$item->user->name}}</option>
                        @endforeach
                    </select>
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
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
        </form>
    </div>
@endsection

@section('custom-script')
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
@endsection
