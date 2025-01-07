@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Skip Sample Collection</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('skipSample.index') }}" class="breadcrumb-item">Skip Sample Collection</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<div class="row">
    <div class="col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 style="font-weight: 600">Subscription Package Details</h6>
                <table class="table">
                    <tbody>
                        <tr>
                            <th width="50%">Package</th>
                            <td>{{$date->userpackage->package->package_type}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Total Visits</th>
                            <td>{{$date->userpackage->package->visits}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Family Name</th>
                            <td>{{$date->userpackage->familyname->family_name}}</td>
                        </tr>                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-3">
        <div class="card h-100">
            <div class="card-body">
                <h6 style="font-weight: 600">Screening Details</h6>
                <table class="table">
                    <tbody>
                        <tr>
                            <th width="50%">Screening</th>
                            <td>{{$date->screening->screening}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Screening Date</th>
                            <td>{{$date->screening_date}}</td>
                        </tr>
                        <tr>
                            <th width="50%">Screening Time</th>
                            <td>{{$date->screening_time}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h6 style="font-weight: 600" class="mb-4">Sample Uncollection Details</h6>
        <div>
            <p class="mb-0"><span style="font-weight: 500">Total Family Members :</span> {{count($date->userpackage->familyname->family) + 1}}</p>
            <p><span style="font-weight: 500">Total Sample Uncollection :</span> {{count($date->reports->where('status','Sample to be collected'))}}</p>
        </div>
        <table class="table table-bordered datatable-colvis-basic">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Family Member</th>
                    <th>Phone No.</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($date->reports as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->members->user->name}} 
                            @if($item->members->member_type == 'Primary Member')
                            ({{$item->members->member_type}})
                            @endif
                        </td>
                        <td>{{$item->members->user->phone}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                            @if($item->status == 'Sample to be collected')
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#skipModal_{{$item->id}}">
                                Skip
                            </button>
                            <div class="modal fade" id="skipModal_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="skipModal_{{$item->id}}Title" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Skip Family Member Sample Collection</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('skipSample.store')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="report" value="{{$item->id}}">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label class="form-label">Provide reason for skipping sample collection<code>*</code></label>
                                                    <textarea name="skip_reason" class="summernote form-control" cols="30" rows="10" required></textarea>
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
<!-- Summernote -->
<script>
    $(function() {
        // Summernote
        $('.summernote').summernote()
    })
</script>
@endsection