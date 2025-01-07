@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Ophthalmologist Screening Form</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Ophthalmologist Screening Form</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            {{-- <a href="{{ route('ophthalmologist.create') }}" type="button" class="btn btn-primary">
                Add Ophthalmologist Screening
            </a> --}}
            <form action="{{ route('ophthalmologist.index')}}" method="GET">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Select Campaign <code>*</code> <span class="text-info">* Please select
                                    campaign to
                                    get users list.</span></label>
                            <select name="campaign" class="form-control select-search" id="campaigns_select" required>
                                <option value="" selected disabled>---Select Campaign---</option>
                                @foreach ($campaign as $item)
                                    <option value="{{ $item->id }}">{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Users <code>*</code></label>
                            <select name="users" id="users_select" class="form-control select-search" required>
                                <option value="" selected disabled>---Select User---</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <label for=""></label>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Name</th>
                        <th>Contact Number</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(Request::get('campaign') && Request::get('users')) 
                        <tr>
                            <td>1</td>
                            <td>{{$screening->campaignuser->name}}</td>
                            <td>{{$screening->campaignuser->phone}}</td>
                            <td>{{$screening->campaignuser->email}}</td>
                            <td>
                                @if($screening->ophthalmologist)
                                <a href="{{route('ophthalmologist.edit',$screening->ophthalmologist->id)}}" class="btn btn-primary"><i class="icon-pen2"></i></a>
                                @else
                                <a href="{{route('ophthalmologist.create',$screening->id)}}" class="btn btn-primary"><i class="icon-plus-circle2"></i></a>
                                @endif
                                <a href="{{route('ophthalmologist.show',$screening->id)}}" class="btn btn-primary" target="_blank"><i class="icon-eye2"></i></a>
                            </td>
                        </tr>
                    @else
                        @foreach ($screening as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->campaignuser->name}}</td>
                                <td>{{$item->campaignuser->phone}}</td>
                                <td>{{$item->campaignuser->email}}</td>
                                <td>
                                    {{-- @if($item->ophthalmologist)
                                    <a href="{{route('ophthalmologist.edit',$item->ophthalmologist->id)}}" class="btn btn-primary"><i class="icon-pen2"></i></a>
                                    @else
                                    <a href="{{route('ophthalmologist.create',$item->id)}}" class="btn btn-primary"><i class="icon-plus-circle2"></i></a>
                                    @endif --}}
                                    <a href="{{route('ophthalmologist.show',$item->id)}}" class="btn btn-primary" target="_blank"><i class="icon-eye2"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        $(document).ready(function(){

            $('#campaigns_select').change(function(){
                let campaign = $(this).val();
                $.ajax({
                    url:'{{route("campaign.userList")}}',
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        data: campaign,
                        type:'ophthalmologist'
                    },
                    success: function(response) {
                        $('#users_select').empty();
                        $('#users_select').append('<option value="" selected disabled>---Select User---</option>');
                        $.each(response, function(index, option) {
                            $('#users_select').append(
                                `<option value="${option.campaign_user_id}" ${option.ophthalmologist !== null ? `title="${option.campaign_user_id}"` : ''}>${option.campaignuser.name} (${option.campaignuser.phone})</option>`
                                );
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

            $('#users_select').select2({
                templateResult: function(option) {
                    if (option.title && !option.selected) {
                        return $('<span >' + option.text +
                            ' <i class="icon-checkmark text-success"></i> </span>');
                    } else {
                        return option.text;
                    }
                }
            })
        })
    </script>
@endsection

