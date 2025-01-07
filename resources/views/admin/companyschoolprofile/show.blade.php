@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Company / School Profile</span>
                </h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('company-profile.index') }}" class="breadcrumb-item">Company / School Profile</a>
                    <span class="breadcrumb-item active">Company / School Details</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            @if ($companySchoolProfile->status == 'pending')
                <a data-toggle="modal" data-target="#exampleModalCenter_{{ $companySchoolProfile->id }}"
                    href="{{ route('company-profile.verify_profile', $companySchoolProfile->id) }}"
                    class="btn btn-primary"><i class="icon-check"></i>Verify Company / School Profile</a>
            @endif
            <a data-toggle="modal" data-target="#exampleModalCenterReject_{{ $companySchoolProfile->id }}"
                href="{{ route('company-profile.reject', $companySchoolProfile->id) }}" class="btn btn-danger"><i
                    class="icon-check"></i>Reject Company / School Profile</a>
        </div>
        <div class="row">
            <div class="col-md-4 d-flex justify-content-center align-items-center">
                <div class="text-center">
                    <img src="{{ $companySchoolProfile->company_image_path }}" alt="" height="200px" width="250px">
                    <div class="my-3">
                        <h6 class="mb-0">{{ $companySchoolProfile->user_name }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card my-3 p-3 shadow-1">
                    <h4 class="card-title" style="border-bottom: 3px solid #007bff">Company / School Details</h4>
                    <table class="table table-borderless">
                        <tr>
                            <th>Company / School Id</th>
                            <td>{{ $companySchoolProfile->user_name }}</td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td>{{ $companySchoolProfile->member->user->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $companySchoolProfile->member->user->email }}</td>
                        </tr>
                        <tr>
                            <th>Company / School Owner Name</th>
                            <td>{{ $companySchoolProfile->owner_name }}</td>
                        </tr>
                        <tr>
                            <th>Company / School Name</th>
                            <td>{{ $companySchoolProfile->company_name }}</td>
                        </tr>
                        <tr>
                            <th>Company / School Address</th>
                            <td>{{ $companySchoolProfile->company_address }}</td>
                        </tr>
                        <tr>
                            <th>Company / School Start Date</th>
                            <td>{{ $companySchoolProfile->company_start_date }}</td>
                        </tr>
                        <tr>
                            <th>Pan Number</th>
                            <td>{{ $companySchoolProfile->pan_number }}</td>
                        </tr>
                        <tr>
                            <th>Contact Number</th>
                            <td>{{ $companySchoolProfile->contact_number }}</td>
                        </tr>
                        <tr>
                            <th>Company / School Description</th>
                            <td>{{ $companySchoolProfile->description }}</td>
                        </tr>
                        <tr>
                            <th>Company / School Status</th>
                            <td>
                                @if ($companySchoolProfile->status == 'pending')
                                    <span class="badge bg-danger">{{ $companySchoolProfile->status }}</span>
                                @elseif($companySchoolProfile->status == 'rejected')
                                    <span class="badge bg-primary">{{ $companySchoolProfile->status }}</span>
                                @else
                                    <span class="badge bg-success">{{ $companySchoolProfile->status }}</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Reject Reason</th>
                            <td>
                                <div class="alert alert-danger" role="alert">
                                    {{ $companySchoolProfile->reject_reason }}
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col md 6" style="margin-left: 20px">
                <h2>Company / School Registration File</h2>
                <a href="{{ $companySchoolProfile->school_regd_file_path }}" target="_blank">
                    <h6 class="mb-0">Click here to view document</h6>
                </a>
                <iframe src="{{ $companySchoolProfile->school_regd_file_path }}" frameborder="0" width="400px"
                    height="500px"></iframe>
            </div>
            <div class="col md 6">
                <h2>Company / School File</h2>
                <a href="{{ $companySchoolProfile->paper_work_pdf_path }}" target="_blank">
                    <h6 class="mb-0">Click here to view document</h6>
                </a>
                <iframe src="{{ $companySchoolProfile->paper_work_pdf_path }}" frameborder="0" width="400px"
                    height="500px"></iframe>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter_{{ $companySchoolProfile->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Are You Sure You Want To Verify ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('company-profile.verify', $companySchoolProfile->id) }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            @method('patch')
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenterReject_{{ $companySchoolProfile->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Are You Sure You Want To Reject ?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('company-profile.reject', $companySchoolProfile->id) }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            @method('patch')
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-label">Reject Reason<code>*</code></label>
                                    <textarea name="reject_reason" id="" cols="50" rows="10"></textarea>
                                    @error('reject_reason')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-primary">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
