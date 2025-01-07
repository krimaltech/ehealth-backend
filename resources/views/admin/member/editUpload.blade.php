@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Upload Report</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('member.index') }}" class="breadcrumb-item">User Profile</a>
                    <span class="breadcrumb-item active">Upload Report</span>
                </div>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection
@section('content')
    <style>
        th,
        td {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        .alert {
            padding-top: 2px;
            padding-bottom: 2px;
        }

        .fileinput-upload {
            display: none;
        }

        .btn-file {
            z-index: 0 !important;
        }
    </style>
    <form action="{{ route('member.uploadStore') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="member_id" value="{{ $member->id }}">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Report Type <code>*</code></label>
                            <select name="report_type" id="" class="form-control">
                                <option value="" selected disabled>--Select Report Type--</option>
                                <option value="Prescription" {{ $report->report_type == 'Prescription' ? 'selected' : '' }}>
                                    Prescription</option>
                                <option value="Investigation"
                                    {{ $report->report_type == 'Investigation' ? 'selected' : '' }}>
                                    Investigation</option>
                            </select>
                            @error('report_type')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Department <code>*</code></label>
                            <select name="department" id="" class="form-control select-search">
                                <option value="" selected disabled>--Select Department--</option>
                                @foreach ($department as $item)
                                    <option value="{{ $item->id }}"
                                        {{ $report->department == $item->id ? 'selected' : '' }}>
                                        {{ $item->department }}</option>
                                @endforeach
                            </select>
                            @error('department')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Doctor Name <code>*</code></label>
                            <input type="text" name="doctor" value="{{ $report->doctor }}" class="form-control">
                            @error('doctor')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Upload Report <code>*</code></label>
                            <input type="file" class="file-input" name="report[]" multiple>
                            @error('report')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
@endsection

@section('custom-script')
    <script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
    <script src="/global_assets/js/demo_pages/fileinput.min.js"></script>
@endsection
