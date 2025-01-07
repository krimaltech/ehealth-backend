@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"> Campaign Users</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Campaign Users</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<style>
    .icon-spinner2{ 
        animation-name: spin;
        animation-duration: 1s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
    }
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }

    }
</style>
    <div class="card">
        <div class="card-header border-bottom">
            @if($status == 1)
                <a href="{{ route('campaignusers.create') }}" type="button" class="btn btn-primary">
                    Register Campaign User
                </a>
                <a class="btn btn-warning" href="{{ route('export-users') }}">
                    Register Campaign User Excel
                </a>
            @else
                <form action="{{route('completedcampaignusers.index')}}" method="get" id="filter_form">                    
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <label for="">Campaign Name</label>
                            <select name="title" id="title" class="form-control select-search">
                                <option value="" selected disabled>---Select Campaign---</option>
                                @foreach ($campaign as $item)
                                <option value="{{$item->id}}" @if($title == $item->id) selected @endif>{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="">Address</label>
                            <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" value="{{$address}}">
                        </div>
                        <div class="col-md-4 mb-2">
                            <label for="">Status</label>
                            <select name="status" id="status" class="form-control select">
                                <option value="" selected disabled>---Select Status---</option>
                                <option value="1" @if($stat == '1') selected @endif>Newly Added</option>
                                <option value="2" @if($stat == '2') selected @endif>Report Generated</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Date Filter</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">From:</span>
                                        </div>
                                        <input type="date" class="form-control" id="start_date" name="start_date" value="{{$start_date}}" max="{{\Carbon\Carbon::now()->format('Y-m-d')}}"> 
                                    </div>   
                                </div>
                                <div class="col-md-4">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1">To:</span>
                                        </div>
                                        <input type="date" class="form-control" id="end_date" name="end_date" value="{{$end_date}}" max="{{\Carbon\Carbon::now()->format('Y-m-d')}}"> 
                                    </div> 
                                </div>
                            </div>
                            <p class="text-danger mb-0" id="date_error"></p>                
                                                  
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary" id="apply">
                            Apply Filter
                        </button>
                        <a href="{{route('completedcampaignusers.index')}}" class="btn btn-danger" id="clear">
                            Clear Filter
                        </a>
                    </div>
                   
                    <p class="text-danger mt-1 mb-0" id="error"></p>
                </form>
            @endif            
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover" id="example">
                @if(Request::get('title') || Request::get('date') || Request::get('address') || Request::get('status'))
                    <thead>
                        <tr>
                            @if(Request::get('status') == '1')
                            <th><input type="checkbox" class="allCheckBoxClass" style="height:18px;width:18px"></th>
                            @endif
                            <th>S.N.</th>
                            @if($status == 0)
                            <th>Status</th>
                            @endif
                            <th>Campaign / Campaign No.</th>
                            <th>User Name</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>DOB (Age)</th>
                            <th>Action</th>
                        </tr>
                    </thead>                
                    <tbody>
                        @foreach ($campaignUser as $item)
                            <tr>
                                @if(Request::get('status') == '1')
                                <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{ $item->id }}" style="height:18px;width:18px"></td>
                                @endif
                                <td>{{ $loop->iteration }}</td>
                                @if($status == 0)
                                <td>
                                    @if($item->status == 1)
                                    <span class="badge badge-primary">Newly Added</span>
                                    @else
                                    <span class="badge badge-success">Report Generated</span>
                                    @endif
                                </td>                               
                                @endif
                                <td>{{ $item->campaign->title }} ({{ $item->campaign->campaign_no }})</td>
                                <td>{{ $item->user_name }}</td>
                                <td>{{ $item->campaignuser->name }}</td>
                                <td>{{ $item->campaignuser->email }}</td>
                                <td>{{ $item->campaignuser->phone }}</td>
                                <td>{{ $item->campaignuser->address }}</td>
                                <td>{{ $item->campaignuser->gender }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->campaignuser->dob)->format('M d, Y') }}
                                    ({{ \Carbon\Carbon::parse($item->campaignuser->dob)->diffInYears(\Carbon\Carbon::now()) }})
                                </td>
                                <td>
                                    @if($item->campaign->status == 1)
                                    <a href="{{ route('campaignusers.show', $item->id) }}" class="btn btn-primary">
                                        <i class="icon-eye2"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('completedcampaignusers.show', $item->id) }}" class="btn btn-primary">
                                        <i class="icon-eye2"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>   
                @else
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            @if($status == 0)
                            <th>Status</th>
                            @endif
                            <th>Campaign / Campaign No.</th>
                            <th>User Name</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th>DOB (Age)</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($campaignUser as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                @if($status == 0)
                                <td>
                                    @if($item->status == 1)
                                    <span class="badge badge-primary">Newly Added</span>
                                    @else
                                    <span class="badge badge-success">Report Generated</span>
                                    @endif
                                </td>                               
                                @endif
                                <td>{{ $item->campaign->title }} ({{ $item->campaign->campaign_no }})</td>
                                <td>{{ $item->user_name }}</td>
                                <td>{{ $item->campaignuser->name }}</td>
                                <td>{{ $item->campaignuser->email }}</td>
                                <td>{{ $item->campaignuser->phone }}</td>
                                <td>{{ $item->campaignuser->address }}</td>
                                <td>{{ $item->campaignuser->gender }}</td>
                                <td>{{ \Carbon\Carbon::parse($item->campaignuser->dob)->format('M d, Y') }}
                                    ({{ \Carbon\Carbon::parse($item->campaignuser->dob)->diffInYears(\Carbon\Carbon::now()) }})
                                </td>
                                <td>
                                    @if($item->campaign->status == 1)
                                    <a href="{{ route('campaignusers.show', $item->id) }}" class="btn btn-primary">
                                        <i class="icon-eye2"></i>
                                    </a>
                                    @else
                                    <a href="{{ route('completedcampaignusers.show', $item->id) }}" class="btn btn-primary">
                                        <i class="icon-eye2"></i>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                @endif
            </table>
            @if(Request::get('status') == '1')
                <button class="btn btn-primary" id="generateReport">
                    Generate Report PDF
                </button>
                <p id="errorMsg" class="text-danger d-none">Please select campaign users to generate report.</p>
                <div class="modal fade" id="generateReportModal" tabindex="-1" role="dialog" aria-labelledby="generateReportModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="generateReportModalTitle"> Generate Report</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('campaignusers.generateReport')}}" method="post" class="generate">
                                @csrf
                                <div class="modal-body">
                                    <label for="">Do you want to generate report ?</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="generate-btn">Generate Report</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        $(document).ready(function(){
            $('#apply').on('click',function(e){
                e.preventDefault();
                let title = $('#title').val();
                let start_date = $('#start_date').val();                
                let end_date = $('#end_date').val();
                let address = $('#address').val();
                let status = $('#status').val();
                $('#error').text('')
                $('#date_error').text('')
                if(title == null && start_date == '' && end_date == '' && address == '' && status == null ){
                    $('#error').text('* No filters applied. You must apply at least one filter.');
                }else{
                    if ((start_date === '' && end_date !== '') || (start_date !== '' && end_date === '')) {
                        $('#date_error').text('* Both start date and end date must be filled or left empty.');
                    } else {
                        $('#filter_form').submit();
                    }
                }
            })
        })        
    </script>
    <script>
        $(document).ready(function(){
            $('#example').DataTable({
                buttons: []
            });
            var table = $('#example').DataTable();
            var allVals = [];
            //select or deselect individual checkbox
            table.on('click', 'tbody tr .checkBoxClass', function () {
                if ($(this).is(':checked')) {
                    allVals.push($(this).val());
                }else{
                    allVals.splice(allVals.indexOf($(this).val()), 1);
                }
            });
            //select or deselect all checkboxes
            table.on('click', 'thead tr .allCheckBoxClass', function () {
                allVals = [];
                if ($(this).is(':checked')) {
                    table.rows().every(function() {
                        let checkbox = this.nodes().to$().find('.checkBoxClass');
                        checkbox.prop('checked',true);
                        allVals.push(checkbox.val());
                    });
                } else {
                    table.rows().every(function() {
                        this.nodes().to$().find('.checkBoxClass').prop('checked',false);
                    });
               }
            });
            $('#generateReport').on('click',function(){
                if (allVals.length != 0) {
                    $('#errorMsg').addClass('d-none');
                    $('#errorMsg').removeClass('d-block');
                    $('#generateReportModal').modal('show')
                }else{
                    $('#errorMsg').addClass('d-block');
                    $('#errorMsg').removeClass('d-none');
                }
            })
            $('.generate').on('submit',function(e){
                e.preventDefault();
                $('#generate-btn').attr('disabled',true);
                $('#generate-btn').html('<i class="icon-spinner2"></i>');
                var fd = new FormData();
                fd.append('ids',allVals);
                $.ajax({
                    url: '{{route("campaignusers.generateReport")}}',
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: fd,
                    success: function(data) {
                        $('#generateReportModal').modal('hide');
                        if(data.success){
                            swal({
                                title: 'Report Generation',
                                text: data.success,
                                icon: "success",
                            })
                            .then((value) => {
                                if (value) {
                                    var url = "{{ route('completedcampaignusers.index') }}";
                                    window.location.href = url;                   
                                }
                            });
                        }
                    },
                });
            })            
        })
   </script>
@endsection

