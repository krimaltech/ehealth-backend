@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">View</span> - Insurance Claim Report - Death Insurance Claim</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('deathinsuranceclaim.index') }}" class="breadcrumb-item">Insurance Claim Report - Death Insurance Claim</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <style>
        ol {
            padding-inline-start: 15px;
        }
    </style>
    <div class="card my-3">
        <div class="card-header border-bottom" style="background-color: #063b9d">
            <h3 class="card-title text-white">Insurance Details</h3>
        </div>
        <div class="card-body mt-4">
            <h4 style="border-bottom:2px solid #063b9d">1. Insurance Details</h4>
            <table class="table my-3">
                <tr>
                    <th>User Name / Email / Phone</th>
                    <td>{{ $insuranceClaim->user->name }} / {{ $insuranceClaim->user->email }} / {{ $insuranceClaim->user->phone }}</td>
                </tr>
                <tr>
                    <th>Claiming User Name / Email / Phone</th>
                    <td>{{ $insuranceClaim->claim->name }} / {{ $insuranceClaim->claim->email }} / {{ $insuranceClaim->claim->phone }}</td>
                </tr>
                <tr>
                    <th>Insurance Type</th>
                    <td>{{ $insuranceClaim->insurance->insurancetype->type }}</td>
                </tr>
                <tr>
                    <th>Insurance Claim Amount</th>
                    <td>Rs. {{ $insuranceClaim->claim_amount }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{!! $insuranceClaim->insurance->insurancetype->description !!}</td>
                </tr>
                <tr>
                    <th>Required Papers</th>
                    <td>{!! $insuranceClaim->insurance->insurancetype->required_papers !!}</td>
                </tr>
                @if($insuranceClaim->insurance_status != 'Claim Settelled')
                <tr>
                    <h4>Change Insurance Claim Status</h4>
                    <form action="{{ route('deathinsuranceclaim.changestatus', $insuranceClaim->slug) }}" method="POST">
                        @csrf
                        @method('patch')
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select name="insurance_status" id="insurance_status" class="form-control">
                                        <option value="" selected disabled>--Select Insurance Type--</option>
                                        <option value="Pending" @if ('Pending' == $insuranceClaim->insurance_status) selected @endif>Pending
                                        </option>
                                        <option value="Approved" @if ('Approved' == $insuranceClaim->insurance_status) selected @endif>Approved
                                        </option>
                                        <option value="Processing(Insurance Partner)" @if ('Processing(Insurance Partner)' == $insuranceClaim->insurance_status) selected @endif>Insurance Partner
                                        </option>
                                        <option value="Processing(Insurance Company)" @if ('Processing(Insurance Company)' == $insuranceClaim->insurance_status) selected @endif>Insurance Company
                                        </option>
                                        <option value="Processing(Claim Department)" @if ('Processing(Claim Department)' == $insuranceClaim->insurance_status) selected @endif>Processing(Claim Department)
                                        </option>
                                        <option value="Processing(Finance Department)" @if ('Processing(Finance Department)' == $insuranceClaim->insurance_status) selected @endif>Processing(Finance Department)
                                        </option>
                                        <option value="Processing(Forward To GD)" @if ('Processing(Forward To GD)' == $insuranceClaim->insurance_status) selected @endif>Processing(Forward To GD)
                                        </option>
                                        <option value="Claim Settelled" @if ('Claim Settelled' == $insuranceClaim->insurance_status) selected @endif>Claim Settelled
                                        </option>
                                        <option value="Rejected" @if ('Rejected' == $insuranceClaim->insurance_status) selected @endif>Rejected
                                        </option>
                                    </select>
                                    @error('insurance_status')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </tr>
                @endif
            </table>
            <h4 style="border-bottom:2px solid #063b9d">2. Hand Written Letter</h4>
            <div class="my-4">
                <p>Click here to view your claim sheet: <a href="{{ $insuranceClaim->hand_written_letter_path }}"
                        target="_blank">{{ $insuranceClaim->hand_written_letter }}</a></p>
                <iframe src="{{ $insuranceClaim->hand_written_letter_path }}" height="600" width="600"></iframe>
            </div>
            <h4 style="border-bottom:2px solid #063b9d">3. Medical Report</h4>
            <div class="my-4">
                <p>Click here to view your claim sheet: <a href="{{ $insuranceClaim->medical_report_path }}"
                        target="_blank">{{ $insuranceClaim->medical_report }}</a></p>
                <iframe src="{{ $insuranceClaim->medical_report_path }}" height="600" width="600"></iframe>
            </div>
            <h4 style="border-bottom:2px solid #063b9d">4. Invoice</h4>
            <div class="my-4">
                <p>Click here to view your claim sheet: <a href="{{ $insuranceClaim->invoice_path }}"
                        target="_blank">{{ $insuranceClaim->invoice }}</a></p>
                <iframe src="{{ $insuranceClaim->invoice_path }}" height="600" width="600"></iframe>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        $(document).ready(function() {
            let insurance_status = $('#insurance_status').val();
            $('#insurance_status').find("option[value='"+insurance_status+"']").prevAll().prop("disabled", true); 
        });
    </script>
@endsection
