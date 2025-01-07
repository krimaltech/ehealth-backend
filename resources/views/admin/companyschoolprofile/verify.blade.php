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
        <div class="card-body">
            @if ($companySchoolProfile->member->files->status == 2)
                <table class="table table-borderless">
                    <tr>
                        <th>Reject Reason</th>
                        <td>
                            <div class="alert alert-danger" role="alert">
                                {{ $companySchoolProfile->member->files->reject_reason }}
                            </div>
                        </td>
                    </tr>
                </table>
            @endif
        </div>
    </div>
    <div class="card">
        @if ($companySchoolProfile->member->files->status == 1)
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>User Name</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Date Of Birth</th>
                        <th>Parent Email</th>
                        <th>Parent Phone</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allStudents as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->member->user->user_name }}</td>
                            <td>{{ $item->member->user->name }}</td>
                            <td>{{ $item->member->gender }}</td>
                            <td>{{ $item->member->dob }}</td>
                            <td>{{ $item->parent_email }}</td>
                            <td>{{ $item->parent_phone }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="card-header">
                <h1>List of Students Imported </h1>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover datatable-colvis-basic">
                        <thead>
                            <tr>
                                <th>S.N.</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Gender</th>
                                <th>DOB</th>
                                <th>Address</th>
                                <th>Parent Email</th>
                                <th>Parent Phone</th>
                                <th>Class</th>
                                <th>Section</th>
                                <th>Roll</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rows as $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>                                
                                    @foreach ($row as $columnIndex => $value)
                                        @if (!empty($value))
                                            <td>{{ $value }}</td>
                                        @else
                                            <td style="background-color: #ADC4CE;">{{ $value }}</td>
                                        @endif
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>                
                <span style="color: #ADC4CE">Student uploaded in the latest CSV.</span>
            </div>
            @if (!empty($nullValues))
                <div class="card-header">
                    <h1>List of Null Student</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover datatable-colvis-basic">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>DOB</th>
                                    <th>Address</th>
                                    <th>Parent Email</th>
                                    <th>Parent Phone</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Roll</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nullValues as $row)
                                    <tr>
                                        @foreach ($row as $value)
                                            <td>{{ $value }}</td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <span style="color: #ADC4CE">All Student with missing data columns</span>
                </div>
            @endif
            @if (!empty($duplicateRows))
                <div class="card-header">
                    <h1>List of Duplicate Student</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover datatable-colvis-basic">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>DOB</th>
                                    <th>Address</th>
                                    <th>Parent Email</th>
                                    <th>Parent Phone</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Roll</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($duplicateRows as $row)
                                    <tr>
                                        @foreach ($row as $columnIndex => $value)
                                            <td><span>{{ $value }}</span></td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <span style="color: #ADC4CE">These Student have uploded twice in the same CSV.</span>
                </div>
            @endif
            @if (!empty($duplicateRows2))
                <div class="card-header">
                    <h1>List of Added Duplicate Student</h1>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover datatable-colvis-basic">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Gender</th>
                                    <th>DOB</th>
                                    <th>Address</th>
                                    <th>Parent Email</th>
                                    <th>Parent Phone</th>
                                    <th>Year</th>
                                    <th>Class</th>
                                    <th>Section</th>
                                    <th>Roll</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($duplicateRows2 as $item)
                                    <tr>
                                        <td>{{ $item->member->user->first_name }}</td>
                                        <td>{{ $item->member->user->middle_name }}</td>
                                        <td>{{ $item->member->user->last_name }}</td>
                                        <td>{{ $item->member->gender }}</td>
                                        <td>{{ $item->member->dob }}</td>
                                        <td>{{ $item->member->address }}</td>
                                        <td>{{ $item->parent_email }}</td>
                                        <td>{{ $item->parent_phone }}</td>
                                        <td>{{ $item->year }}</td>
                                        <td>{{ $item->class }}</td>
                                        <td>{{ $item->section }}</td>
                                        <td>{{ $item->roll }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <span style="color: #ADC4CE">These students records has been matched with students in the system.</span>
                </div>
            @endif
            <div class="card-footer">
                @if ($companySchoolProfile->member->files != null)
                    @if (Str::contains($companySchoolProfile->user_name, 'GD-KTM-S'))
                        @if (empty($duplicateRows2) && empty($duplicateRows) && empty($nullValues))
                            @if ($countArray == 11)
                                <button style="float: right" type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#verifyModal_{{ $companySchoolProfile->member_id }}">
                                    Approve School CSV File
                                </button>
                            @endif
                        @endif
                        @if ($companySchoolProfile->member->files->status != 2)
                            <a style="float: right" data-toggle="modal"
                                data-target="#exampleModalCenterReject_{{ $companySchoolProfile->id }}"
                                href="{{ route('company-profile.reject', $companySchoolProfile->id) }}"
                                class="btn btn-danger"><i class="icon-check"></i>Reject School CSV File</a>
                        @endif
                        <div class="modal fade" id="verifyModal_{{ $companySchoolProfile->member_id }}" tabindex="-1"
                            role="dialog" aria-labelledby="verifyModal_{{ $companySchoolProfile->member_id }}Title"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Are You Sure That You have
                                            Verified
                                            Students Details?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('company-profile.upload', $companySchoolProfile->member_id) }}"
                                        method="post" enctype="multipart/form-data" id="appointment_form">
                                        @csrf
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">No</button>
                                            <button type="submit" id="register" class="btn btn-primary">Yes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenterReject_{{ $companySchoolProfile->id }}"
                            tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Are You Sure You Want To
                                            Reject
                                            CSV?
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('company-profile.reject_csv', $companySchoolProfile->id) }}"
                                        method="POST">
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
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">No</button>
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        @endif
    </div>
@endsection
@section('custom-script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#appointment_form').on('submit', function() {
                $('#register').attr('disabled', 'true');
            });
        });
    </script>
@endsection
