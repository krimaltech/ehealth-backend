@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">View</span> -Campaign</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    @if($campaign->status == 1)
                    <a href="{{ route('campaign.index') }}" class="breadcrumb-item">Campaign</a>
                    @else
                    <a href="{{ route('completedcampaign.index') }}" class="breadcrumb-item">Campaign</a>
                    @endif
                    <span class="breadcrumb-item active">View</span>
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
            <table class="table">
                <tr>
                    <th>Campaign No.</th>
                    <td>{{ $campaign->campaign_no }}</td>
                </tr>
                <tr>
                    <th>Campaign Type</th>
                    <td>{{ $campaign->campaign_type }}</td>
                </tr>
                <tr>
                    <th>Campaign Title</th>
                    <td>{{ $campaign->title }}</td>
                </tr>
                <tr>
                    <th>Venue</th>
                    <td>{{ $campaign->venue }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $campaign->address }}</td>
                </tr>
                <tr>
                    <th>Start Date</th>
                    <td>{{ \Carbon\Carbon::parse($campaign->start_date)->toDayDateTimeString() }}</td>
                </tr>
                <tr>
                    <th>End Date</th>
                    <td>{{ \Carbon\Carbon::parse($campaign->end_date)->toDayDateTimeString() }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{!!$campaign->description!!}</td>
                </tr>
                @if($campaign->image != null)
                <tr>
                    <th>Image</th>
                    <td><img src="{{$campaign->image_path}}" alt="" width="300px"></td>
                </tr>
                @endif
            </table>
        </div>
        @if($campaign->employees->isNotEmpty())
        <div class="card-body">
            <h6 style="font-weight: 600">Clinical Team</h6>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10%">S.N.</th>
                        <th width="30%">Doctor/Nurse Name</th>
                        <th width="30%">Department</th>
                        @if($campaign->status == 1)
                        <th width="30%">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($campaign->employees as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->employee->user->name}}</td>
                            @if($item->employee->sub_role_id == 7)
                            <td>Nurse</td>
                            @else
                            <td>{{$item->employee->departments ? $item->employee->departments->department : 'Dietician'}}</td>
                            @endif
                            @if($campaign->status == 1)
                            <td>
                                <button type="button" class="btn btn-primary modal-btn" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}" data-id="{{$item->employee_id}}">
                                    Switch
                                </button>
                                <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter{{$item->id}}Title" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Switch {{$item->employee->user->name}} (@if($item->employee->sub_role_id == 7) Nurse @elseif($item->employee->sub_role_id == 18) Dietician @else {{$item->employee->departments->department}} @endif) ?</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('campaignemployee.switch')}}" method="POST">
                                                @csrf
                                                <input type="hidden" name="employee_id" value="{{$item->employee_id}}">
                                                <input type="hidden" name="campaign_id" value="{{$campaign->id}}">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Select @if($item->employee->sub_role_id == 7) Nurse @else Doctor @endif</label>
                                                        <select name="new_employee_id" class="form-control select new_employee" required>
                                                            <option value="" selected disabled>---Select---</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Switch Reason</label>
                                                        <textarea name="reason" class="summernote form-control" cols="30" rows="10" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Switch</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
        @if($campaign->switch->isNotEmpty())
        <div class="card-body">
            <h6 style="font-weight: 600">Switched Clinical Team Member</h6>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10%">S.N.</th>
                        <th width="20%">Department</th>
                        <th width="20%">Doctor/Nurse Name</th>
                        <th width="20%">Switched Doctor/Nurse Name</th>
                        <th width="20%">Reason</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($campaign->switch as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            @if($item->employee->sub_role_id == 7)
                            <td>Nurse</td>
                            @else
                            <td>{{$item->employee->departments ? $item->employee->departments->department : 'Dietician'}}</td>
                            @endif
                            <td>{{$item->employee->user->name}}</td>
                            <td>{{$item->newemployee->user->name}}</td>
                            <td>{!!$item->reason!!}</td>                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
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

        $(document).ready(function(){
            $('.modal-btn').click(function(){
                var employee = $(this).attr('data-id');
                $('.new_employee').empty();
                $('.new_employee').append('<option value="" selected disabled>---Select---</option>');
                $.ajax({
                    url: '{{route("campaignemployee.getEmployee")}}',
                    type: 'GET', 
                    data: {data:employee}, 
                    success: function(response) {
                        $.each(response, function(index, option) {
                            $('.new_employee').append('<option value="' + option.id + '">' + option.user.name + '</option>');
                        });
                    }
                });
            })
        })
    </script>
@endsection