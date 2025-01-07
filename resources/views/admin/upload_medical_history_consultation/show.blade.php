@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">External Medical History</span>
                </h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">External Medical History</span>
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
            <table>
                @if ($consultation->status == 2 || $consultation->reject_reason != null)
                    <tr>
                        <td>Status:</td>
                        <td><button class="btn btn-danger">Rejected</button></td>
                    </tr>
                    <tr>
                        <td>Reject Reason:</td>
                        @if ($consultation->reject_reason != null)
                            <td style="color: red">{{ $consultation->reject_reason }}</td>
                        @endif
                    </tr>
                @elseif ($consultation->status == 0)
                    <tr>
                        <td>Status:</td>
                        <td><button class="btn btn-secondary">Pending</button></td>
                    </tr>
                @else
                    <tr>
                        <td>Status:</td>
                        <td><button class="btn btn-success">Approved</button></td>
                    </tr>
                @endif
            </table>
            <div class="row">
                <div class="col-md-4 d-flex justify-content-center align-items-center">
                    <div class="text-center">
                        <img src="{{ $consultation->member->image_path }}" alt=""
                            height="200px" width="250px">
                        <div class="my-3">
                            <h6 class="mb-0">{{ $consultation->member->user->name }}</h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card my-3 p-3 shadow-1">
                        <h4 class="card-title" style="border-bottom: 3px solid #007bff">User Doctor Details</h4>
                        <table class="table table-borderless">
                            <tr>
                                <th>User Name</th>
                                <td>{{ $consultation->member->user->name }}</td>
                            </tr>
                            <tr>
                                <th>Doctor Name</th>
                                <td>{{ $consultation->doctor->user->name ?? ' ' }}</td>
                            </tr>
                            <tr>
                                <th>Doctor Checked Date</th>
                                <td>{{ $consultation->check_date }}</td>
                            </tr>
                            <tr>
                                <th>Hospital</th>
                                <td>{{ $consultation->hospital }}</td>
                            </tr>
                            <tr>
                                <th>Department</th>
                                <td>{{ $consultation->department->department ?? $consultation->is_other }}</td>
                            </tr>
                            <tr>
                                <th>Medication</th>
                                <td>{{ $consultation->medication }}</td>
                            </tr>
                            <tr>
                                <th>Findings</th>
                                <td>{{ $consultation->finding }}</td>
                            </tr>
                            <tr>
                                <th>Observation</th>
                                <td>{{ $consultation->medication }}</td>
                            </tr>
                            <tr>
                                @if ($consultation->doctor_reject_reason != null)
                                    <th>Doctor Reject Reason</th>
                                    <td style="color: red">{!! $consultation->doctor_reject_reason !!}</td>
                                @endif
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            @foreach ($consultation->medical_report as $item)
                <div class="col md 6">
                    <h2>Uploaded Medical File</h2>
                    <a href="{{ $item->report_path }}#toolbar=0" target="_blank">
                        <h6 class="mb-0">Click here to view document</h6>
                    </a>
                    <iframe src="{{ $item->report_path }}#toolbar=0" frameborder="0" width="400px"
                        height="500px"></iframe>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            @can('Admin')
                @if (Helper::check_userpackage($consultation->member_id) == 1 && $consultation->reject_reason == null)
                    @if ($consultation->doctor_id == null)
                        <a style="float: right" data-toggle="modal"
                            data-target="#exampleModalCenterDoctorAssign_{{ $consultation->id }}"
                            href="{{ route('upload_medical_history_consultation.assign_doctor', $consultation->id) }}"
                            class="btn btn-primary"><i class="icon-check"></i>Assign Doctor</a>
                    @else
                        <a style="float: right" data-toggle="modal"
                            data-target="#exampleModalCenterDoctorAssign_{{ $consultation->id }}"
                            href="{{ route('upload_medical_history_consultation.assign_doctor', $consultation->id) }}"
                            class="btn btn-primary"><i class="icon-check"></i>Re-Assign Doctor</a>
                    @endif
                @endif
                @if (Helper::check_userpackage($consultation->member_id) == 1)
                    @if ($consultation->status != 2)
                        <a style="float: right" data-toggle="modal"
                            data-target="#exampleModalCenterReject_{{ $consultation->id }}"
                            href="{{ route('upload_medical_history_consultation.reject_reason', $consultation->id) }}"
                            class="btn btn-danger"><i class="icon-cross"></i>Admin Reject Conclusion</a>
                    @endif
                @endif
            @endcan
            @can('GD Doctor')
                @if ($consultation->check_date == null && $consultation->doctor_reject_reason == null)
                    <a style="float: right" data-toggle="modal"
                        data-target="#exampleModalCenterConsultation_{{ $consultation->id }}"
                        href="{{ route('upload_medical_history_consultation.upload', $consultation->id) }}"
                        class="btn btn-primary"><i class="icon-check"></i>Upload Conclusion</a>
                @endif
                @if ($consultation->doctor_reject_reason == null && $consultation->check_date == null)
                    <a style="float: right" data-toggle="modal"
                        data-target="#exampleModalCenterDoctorReject_{{ $consultation->id }}"
                        href="{{ route('upload_medical_history_consultation.reject_reason_doctor', $consultation->id) }}"
                        class="btn btn-danger"><i class="icon-cross"></i>Doctor Reject Conclusion</a>
                @endif
            @endcan
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenterConsultation_{{ $consultation->id }}" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Upload Consultation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('upload_medical_history_consultation.upload', $consultation->id) }}"
                            method="POST">
                            <div class="modal-body">
                                @csrf
                                @method('patch')
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Date <code>*</code></label>
                                        <input type="date" class="form-control" name="check_date" required max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                        @error('observation')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Hospital<code>*</code></label>
                                        <input type="text" class="form-control" name="hospital">
                                        @error('observation')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2">
                                        <div class="form-group">
                                            <label class="form-label">Salutation<code>*</code></label>
                                            <select name="salutation" class="form-control">
                                                <option value="Dr.">Dr.</option>
                                            </select>
                                            @error('salutation')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-10">
                                        <div class="form-group">
                                            <label class="form-label">Doctor Name<code>*</code></label>
                                            <input type="text" class="form-control" name="doctor_name">
                                            @error('observation')
                                                <div class="alert alert-danger">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Doctor NMC<code>*</code></label>
                                        <input type="text" class="form-control" name="doctor_nmc">
                                        @error('observation')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Doctor Department<code>*</code></label>
                                        <select name="department_id" id="myDropdown" class="form-control">
                                            <option value=""><<-- select -->></option>
                                            @foreach ($department as $depart)
                                                <option value="{{ $depart->id }}">{{ $depart->department }}</option>
                                            @endforeach
                                            <option value="Other">Other</option>
                                        </select>
                                        @error('department_id')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12" id="showOther" style="display: none;">
                                    <div class="form-group">
                                        <label class="form-label">if Other Write Here</label>
                                        <input type="text" class="form-control" name="is_other">
                                        @error('is_other')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Observation<code>*</code></label>
                                        <textarea name="observation" id="" cols="50" rows="10"></textarea>
                                        @error('observation')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Findings<code>*</code></label>
                                        <textarea name="finding" id="" cols="50" rows="10"></textarea>
                                        @error('finding')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Medication<code>*</code></label>
                                        <textarea name="medication" id="" cols="50" rows="10"></textarea>
                                        @error('medication')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenterReject_{{ $consultation->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Reject Consultation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('upload_medical_history_consultation.reject_reason', $consultation->id) }}"
                            method="POST">
                            <div class="modal-body">
                                @csrf
                                @method('patch')
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Rejection Reason<code>*</code></label>
                                        <select name="reject_reason" id="" class="form-control">
                                            <option value=""><--select--></option>
                                            @if ($consultation->doctor_reject_reason != null)
                                                <option value="{{ $consultation->doctor_reject_reason }}">
                                                    {{ $consultation->doctor_reject_reason }}</option>
                                            @else
                                                <option value="Uploaded document is blurry">Uploaded document is blurry
                                                </option>
                                                <option value="Uploaded document is incomplete">Uploaded document is
                                                    incomplete</option>
                                                <option value="Uploaded document is not understandable">Uploaded document
                                                    is not understandable</option>
                                            @endif
                                        </select>
                                        @error('reject_reason')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenterDoctorReject_{{ $consultation->id }}" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Reject Consultation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form
                            action="{{ route('upload_medical_history_consultation.reject_reason_doctor', $consultation->id) }}"
                            method="POST">
                            <div class="modal-body">
                                @csrf
                                @method('patch')
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Rejection Reason<code>*</code></label>
                                        <select name="doctor_reject_reason" id="" class="form-control">
                                            <option value=""><--select--></option>
                                            <option value="Uploaded document is blurry">Uploaded document is blurry
                                            </option>
                                            <option value="Uploaded document is incomplete">Uploaded document is incomplete
                                            </option>
                                            <option value="Uploaded document is not understandable">Uploaded document is
                                                not understandable</option>
                                        </select>
                                        @error('doctor_reject_reason')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenterDoctorAssign_{{ $consultation->id }}" tabindex="-1"
                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Assign Doctor</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('upload_medical_history_consultation.assign_doctor', $consultation->id) }}"
                            method="POST">
                            <div class="modal-body">
                                @csrf
                                @method('patch')
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <select name="doctor_id" class="form-control">
                                            <option value=""><--select--></option>
                                            @foreach ($doctor as $item)
                                                <option value="{{ $item->id }}">{{ $item->user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('doctor_id')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('custom-script')
<script>
$(document).ready(function(){
    $('#myDropdown').on('change', function(){
    	var demovalue = $(this).val();
        if (demovalue == 'Other') {
            $("#show"+demovalue).show();
        } else {
            $("#show"+demovalue).hide();
        }
    });
});
    </script>
@endsection
