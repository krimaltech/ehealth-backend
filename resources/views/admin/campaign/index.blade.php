@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Campaign</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Campaign</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">  
        @if($status == 1)     
            <div class="card-header border-bottom">           
                <a href="{{ route('campaign.create') }}" type="button" class="btn btn-primary">
                    Add Campaign
                </a>            
            </div>  
        @endif      
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Campaign No.</th>
                        <th>Title</th>
                        <th>Address</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        @if($status == 1)
                            <th>Status</th>
                        @endif
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($campaign as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->campaign_no }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->start_date)->toDayDateTimeString() }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->end_date)->toDayDateTimeString() }}</td>
                            @if($status == 1)
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#closecampaignmodal{{$item->id}}">
                                        Close Campaign
                                    </button>
                                    <div class="modal fade" id="closecampaignmodal{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="closecampaignmodal{{$item->id}}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Close Campaign</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('campaign.changeStatus') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="data" value="{{$item->id}}">
                                                    <div class="modal-body">
                                                        <label for="">Do you want to close the campaign '{{$item->title}}'?</label>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Yes</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endif
                            <td>
                                @if($status == 1)
                                    <a href="{{route('campaign.edit',$item->id)}}" class="btn btn-primary"><i class="icon-pen"></i></a>                               
                                    <a href="{{route('campaign.show',$item->id)}}" class="btn btn-primary"><i class="icon-eye2"></i></a>
                            
                                    @if($item->employees->isEmpty())
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">
                                            <i class="icon-plus-circle2"></i>
                                        </button>
                                        <div class="modal fade" id="exampleModalCenter{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter{{$item->id}}Title" aria-hidden="true">
                                            <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Assign Clinical Team</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{route('campaignemployee.store',$item->id)}}" method="post">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="row align-items-center mb-2">
                                                                <div class="col-md-3">
                                                                    <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Doctor</span>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select class="form-control select " name="doctor" required>
                                                                        <option value="" selected disabled>---Select Doctor---</option>
                                                                        @foreach ($doctor as $item)
                                                                            <option value="{{$item->id}}">{{$item->user->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center mb-2">
                                                                <div class="col-md-3">
                                                                    <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Dentist</span>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select class="form-control select " name="dentist" required>
                                                                        <option value="" selected disabled>---Select Dentist---</option>
                                                                        @foreach ($dentist as $item)
                                                                            <option value="{{$item->id}}">{{$item->user->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center mb-2">
                                                                <div class="col-md-3">
                                                                    <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Dietician</span>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select class="form-control select " name="dietician" required>
                                                                        <option value="" selected disabled>---Select Dietician---</option>
                                                                        @foreach ($dietician as $item)
                                                                            <option value="{{$item->id}}">{{$item->user->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center mb-2">
                                                                <div class="col-md-3">
                                                                    <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Ophthalmologist</span>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select class="form-control select " name="ophthalmologist" required>
                                                                        <option value="" selected disabled>---Select Ophthalmologist---</option>
                                                                        @foreach ($eye as $item)
                                                                            <option value="{{$item->id}}">{{$item->user->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center mb-2">
                                                                <div class="col-md-3">
                                                                    <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Physiotherapist</span>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select class="form-control select " name="physiotherapist" required>
                                                                        <option value="" selected disabled>---Select Physiotherapist---</option>
                                                                        @foreach ($physiotherapist as $item)
                                                                            <option value="{{$item->id}}">{{$item->user->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row align-items-center mb-2">
                                                                <div class="col-md-3">
                                                                    <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Nurse</span>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <select class="form-control select" name="nurse" required>
                                                                        <option value="" selected disabled>---Select Nurse---</option>
                                                                        @foreach ($nurse as $item)
                                                                            <option value="{{$item->id}}">{{$item->user->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Assign</button>
                                                        </div>
                                                    </form>                                            
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @else
                                    <a href="{{route('completedcampaign.show',$item->id)}}" class="btn btn-primary"><i class="icon-eye2"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        function verify(id) {
            $.ajax({
                url: "{{ route('campaign.changeStatus') }}",
                type: "get", //send it through get method
                data: {
                    "id": id
                },
                success: function(response) {
                    var feature = "stockButton-" + response['id'];
                    if (response['value'] == "0") { // if true (1)
                        $('#' + feature).html("Inactive");
                        $('#' + feature).removeClass('btn btn-success btn-sm').addClass(
                            'btn btn-danger btn-sm');
                    } else {
                        $('#' + feature).html("Active");
                        $('#' + feature).removeClass('btn btn-danger btn-sm').addClass(
                            'btn btn-success btn-sm');
                    }
                },
                error: function(xhr) {

                }
            });
        }        
    </script>
@endsection
