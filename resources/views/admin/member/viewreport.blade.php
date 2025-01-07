@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">View Report</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('member.index') }}" class="breadcrumb-item">User Profile</a>
                    <span class="breadcrumb-item active">View Report</span>
                </div>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    @foreach ($report as $item)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <b>Report Type:</b> {{ $item->report_type }}
                    </div>
                    <div class="col-md-3">
                        <b>Department:</b> {{ $item->departments->department }}
                    </div>
                    <div class="col-md-3">
                        <b>Doctor:</b> {{ $item->doctor }}
                    </div>
                    <div class="col-md-3">
                        <b>Uploaded Date:</b> {{ $item->created_at->format('d M ,Y') }}
                    </div>
                </div>
                <h6 class="mt-4"><b>My Medical Reports</b></h6>
                <a href="{{ route('member.editupload', $item->id) }}" class="btn btn-primary mb-2">edit</a>
                <div class="row">
                    @foreach ($item->reportfiles as $file)
                        <div class="col-md-6">
                            <button type="button" class="border-0" data-toggle="modal"
                                data-target="#reportModal_{{ $file->id }}">
                                <img src="{{ asset('storage/images/' . $file->report) }}" alt="" class="img-fluid">
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="reportModal_{{ $file->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="reportModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div>
                                            <button type="button" class="close pr-1" style="font-size:30px !important"
                                                data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <img src="{{ asset('storage/images/' . $file->report) }}" alt=""
                                            class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
@endsection
