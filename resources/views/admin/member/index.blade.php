@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">User Profile</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">User Profile</span>
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
    </style>
    {{-- <a href="{{ route('member.upload', $member->id) }}" class="btn btn-primary mb-3"><i class="icon-plus2 mr-1"></i>Upload
        Medical Reports</a>
    @if ($report > 0)
        <a href="{{ route('member.viewReport', $member->id) }}" class="btn btn-success mb-3"><i
                class="icon-eye2 mr-1"></i>My
            Uploaded Medical Reports</a>
    @endif --}}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="text-center">
                        @if ($member->image == null)
                            <img src="/logn/istockphoto.jpg" alt="" height="150px" width="150px">
                        @else
                            <img src="{{ asset('/storage/images/' . $member->image) }}" alt="" height="150px"
                                width="150px" class="rounded-circle">
                        @endif
                    </div>
                    <div class="text-center">
                        <h6 class="mb-0">{{ $member->member->name }}</h6>
                        <h6 class="text-primary"><i class="icon-user mr-1"></i> GD - {{ $member->id }}</h6>
                    </div>
                    <table class="table table-borderless mx-3 my-4">
                        <tr>
                            <th>Member Type</th>
                            <td>{{ $member->member_type }}</td>
                        </tr>
                        <tr>
                            <th>Blood Group</th>
                            <td>{{ $member->blood_group }}</td>
                        </tr>
                        <tr>
                            <th>Family Name</th>
                            @if ($member->member_type == 'Primary Member')
                                <td>{{ $member->family_name }}</td>
                            @elseif($member->member_type == 'Dependent Member')
                                @if ($family == null)
                                    <td class="text-danger">Not accepted in the family.</td>
                                @elseif($family->rejected != 0)
                                    <td>{{ $family->user_2->family_name }}<span class=" ml-1 text-success">(Verified)</span>
                                    </td>
                                @else
                                    <td>{{ $family->user_2->family_name }}<div class="text-danger">(Waiting for
                                            Verification)</div>
                                    </td>
                                @endif
                            @endif
                        </tr>
                        <tr>
                            <th>BMI</th>
                            @if ($member->height != null)
                                <td>{{ round($member->weight / $member->height ** 2, 2) }}</td>
                            @else
                                <td></td>
                            @endif
                        </tr>
                        {{-- <tr>
                            <th>Blood Pressure (BP)</th>
                            @if ($member->bp != null)
                                <td>{{ $member->bp }} mm Hg
                                    <button type="button" class="btn btn-primary py-0" style="font-size:14px"
                                        data-toggle="modal" data-target="#updatebpModal">
                                        Update BP
                                    </button>
                                </td>
                                <!-- Modal -->
                                <div class="modal fade bd-example-modal-sm" id="updatebpModal" tabindex="-1" role="dialog"
                                    aria-labelledby="updatebpModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updatebpModalLabel">Update Your BP</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('member.updatebp', $member->id) }}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <div class="d-flex align-items-center flex-wrap">
                                                            <div class="col-md-4 pl-0">
                                                                <label for="" class="mb-0">Blood Pressure</label>
                                                            </div>
                                                            <div class="col-md-8 px-0">
                                                                <div class="d-flex align-items-center">
                                                                    <input type="integer" name="upper" id=""
                                                                        class="form-control" placeholder="Upper No."
                                                                        required>
                                                                    <span class="px-2">/</span>
                                                                    <input type="integer" name="lower" id=""
                                                                        class="form-control" placeholder="Lower No."
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#updatebpModal">
                                        Update BP
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade bd-example-modal-sm" id="updatebpModal" tabindex="-1"
                                        role="dialog" aria-labelledby="updatebpModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updatebpModalLabel">Update Your BP</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('member.updatebp', $member->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <div class="d-flex align-items-center flex-wrap">
                                                                <div class="col-md-4 pl-0">
                                                                    <label for="" class="mb-0">Blood
                                                                        Pressure</label>
                                                                </div>
                                                                <div class="col-md-8 px-0">
                                                                    <div class="d-flex align-items-center">
                                                                        <input type="integer" name="upper"
                                                                            id="" class="form-control"
                                                                            placeholder="Upper No." required>
                                                                        <span class="px-2">/</span>
                                                                        <input type="integer" name="lower"
                                                                            id="" class="form-control"
                                                                            placeholder="Lower No." required>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                </td>
                            @endif

                        </tr> --}}
                    </table>
                </div>
                <div class="col-md-8">
                    <div class="text-right">
                        <a href="{{ route('kyc.create') }}" class="btn btn-success px-4"> KYC</a>
                        {{-- <a href="{{ route('member.edit', $member->slug) }}" class="btn btn-primary px-4"><i
                                class="icon-pen"></i> Edit Profile</a> --}}
                    </div>
                    <div class="card my-3 p-3 shadow-1">
                        <h4 class="card-title" style="border-bottom: 3px solid #007BFF">My Profile</h4>
                        <table class="table table-borderless">
                            <tr>
                                <th>Name</th>
                                <td>{{ $member->member->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $member->member->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $member->member->phone }}</td>
                            </tr>
                            <tr>
                                <th>Gender</th>
                                <td>{{ $member->gender }}</td>
                            </tr>
                            <tr>
                                <th>Address</th>
                                <td>{{ $member->address }}</td>
                            </tr>
                            <tr>
                                <th>Date Of Birth</th>
                                <td>{{ $member->dob }}</td>
                            </tr>
                            <tr>
                                <th>Age</th>
                                <td>
                                    @php
                                        $dob_year = \Carbon\Carbon::now()->format('Y') - \Carbon\Carbon::createFromTimeStamp(strtotime($member->dob))->isoFormat('Y');
                                        echo $dob_year;
                                    @endphp
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
