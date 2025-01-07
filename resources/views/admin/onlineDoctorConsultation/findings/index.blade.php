@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Online Doctor Consultation</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Online Doctor Consultation</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<style>
    .fileinput-upload{
       display: none;
   }
   .btn-file,.file-caption,.fileinput-remove{
       z-index:0 !important;
   }
   </style>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>User Name</th>
                        <th>Family Name</th>
                        <th>Package</th>
                        <th>Screening</th>
                        <th>Meeting Date and Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($consultation as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->member->user->name }}</td>
                            <td>{{ $item->report->screeningdate->userpackage->familyname->family_name }}</td>
                            <td>{{ $item->report->screeningdate->userpackage->package->package_type }}</td>
                            <td>{{ $item->report->screeningdate->screening->screening }}</td>
                            <td>{{ $item->start_time }}</td>
                            <td>
                                @if($item->status == 0)
                                    <span class="badge badge-secondary">Meeting Status : Pending</span>
                                @else
                                    <span class="badge badge-success">Meeting Status : Completed</span>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Actions
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        @if($item->status == 0)
                                            <a href="{{ $item->start_url }}" target="_blank"
                                                class="dropdown-item"><i class="icon-play"></i>
                                                Start Meeting</a>
                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                data-target="#reportFindingsModal_{{ $item->id }}">
                                                <i class="icon-plus-circle2"></i>Add Report Findings
                                            </button>
                                            <button type="button" class="dropdown-item" data-toggle="modal"
                                                data-target="#memberUnavailableModal_{{ $item->id }}">
                                                <i class="icon-cross2"></i> Member Unavailable
                                            </button>
                                        @else
                                            <a href="{{ route('onlineDoctorConsultation.findingsShow',$item->medicalreport_id) }}"
                                                class="dropdown-item"><i class="icon-eye"></i>
                                                View</a>
                                        @endif
                                    </div>                                    
                                    <div class="modal fade" id="reportFindingsModal_{{ $item->id }}"
                                        tabindex="-1" role="dialog" aria-labelledby="reportFindingModalTitle"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 id="exampleModalLongTitle" style="font-weight:600" >Add Report Findings</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{route('onlineDoctorConsultation.findingsStore', $item->id)}}" class="form-horizontal" enctype="multipart/form-data">
                                                    @csrf
                                                        <input type="hidden" name="report_id" value="{{$item->medicalreport_id}}">
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label for="">Report Findings<code>*</code></label>
                                                                        <textarea name="feedback" class="summernote form-control" cols="30" rows="8" required>{{ old('feedback') }}</textarea>
                                                                        @error('feedback')
                                                                        <div class="alert alert-danger">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group">
                                                                        <label class="form-label">Report (if you have any ??)</label>
                                                                        <input  type="file" class="file-input" name="file" data-fouc accept="image/gif,image/jpeg,image/png,application/pdf">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                    
                                                        <div class="modal-footer text-right">
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal fade" id="memberUnavailableModal_{{ $item->id }}"
                                        tabindex="-1" role="dialog" aria-labelledby="memberUnavailableModalTitle"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                        Add Member Unavailable Reason
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('onlineDoctorConsultation.unavailable', $item->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="report_id" value="{{$item->medicalreport_id}}">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Reason <code>*</code></label>
                                                            <textarea name="reason" class="summernote form-control" cols="30" rows="8" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>   
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
    $(document).ready(function() {
        $('.summernote').summernote({
            placeholder: 'Description....',
            toolbar:[            ['style', ['bold', 'italic']], //Specific toolbar display
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],] 

        });
    });
</script>
<script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
<script src="/global_assets/js/demo_pages/fileinput.min.js"></script>
@endsection