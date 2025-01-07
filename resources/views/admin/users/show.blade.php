@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"> Profile</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active"> Profile</span>
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
    {{-- employee --}}
    @if ($data->user->role == 3)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center">
                            @if ($data->image == null)
                                <img src="/logn/istockphoto.jpg" alt="" height="150px" width="150px">
                            @else
                                <img src="{{ $data->image_path }}" alt="" height="150px"
                                    width="150px" class="rounded-circle">
                            @endif
                        </div>
                        <div class="text-center">
                            <h6 class="mb-0">{{ $data->user->name }}</h6>
                            <h6 class="text-primary"><i class="icon-user mr-1"></i> GD - {{ $data->id }}</h6>
                        </div>
                    </div>
                    <div class="col-md-8">

                        <div class="card my-3 p-3 shadow-1">
                            <h4 class="card-title" style="border-bottom: 3px solid #007BFF">My Profile</h4>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $data->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $data->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $data->user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{ $data->gender }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $data->address }}</td>
                                </tr>
                                <tr>
                                    <th>Date Of Birth</th>
                                    <td>{{ $data->dob }}</td>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <td>
                                        @php
                                            $dob_year = \Carbon\Carbon::now()->format('Y') - \Carbon\Carbon::createFromTimeStamp(strtotime($data->dob))->isoFormat('Y');
                                            echo $dob_year;
                                        @endphp
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @if ($kyc)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card my-3 p-3 shadow-1">
                                <h4 class="card-title" style="border-bottom: 3px solid #007bff">KYC Details</h4>
                                <form action="{{ route('kyc.verify', $kyc->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">verify</button>
                                </form>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{ $kyc->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Middle Name</th>
                                        <td>{{ $kyc->middle_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td>{{ $kyc->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $kyc->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Birth Date</th>
                                        <td>{{ $kyc->birth_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Citizenship No</th>
                                        <td>{{ $kyc->citizenship_no }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    {{-- vendor --}}
    @if ($data->user->role == 5)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 d-flex justify-content-center align-items-center">
                        <div class="text-center">
                            <img src="{{$data->image_path }}" alt="" height="200px"
                                width="250px">
                            <div class="my-3">
                                <h6 class="mb-0">{{ $data->user->name }}</h6>
                                <h6 class="text-primary">{{ $data->user->email }}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">

                        <div class="card my-3 p-3 shadow-1">
                            <h4 class="card-title" style="border-bottom: 3px solid #007bff">My Profile</h4>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $data->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $data->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $data->user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $data->address }}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>{{ $data->types->data_type }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @if ($kyc)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card my-3 p-3 shadow-1">
                                <h4 class="card-title" style="border-bottom: 3px solid #007bff">KYC Details</h4>
                                <form action="{{ route('kyc.verify', $kyc->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">verify</button>
                                </form>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{ $kyc->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Middle Name</th>
                                        <td>{{ $kyc->middle_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td>{{ $kyc->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $kyc->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Birth Date</th>
                                        <td>{{ $kyc->birth_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Citizenship No</th>
                                        <td>{{ $kyc->citizenship_no }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    {{-- user --}}
    @if ($data->user->role == 6)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center">
                            @if ($data->image == null)
                                <img src="/logn/istockphoto.jpg" alt="" height="150px" width="150px">
                            @else
                                <img src="{{ $data->image_path }}" alt="" height="150px"
                                    width="150px" class="rounded-circle">
                            @endif
                        </div>
                        <div class="text-center">
                            <h6 class="mb-0">{{ $data->user->name }}</h6>
                            <h6 class="text-primary"><i class="icon-user mr-1"></i> GD - {{ $data->id }}</h6>
                        </div>
                        <table class="table table-borderless mx-3 my-4">
                            <tr>
                                <th>data Type</th>
                                <td>{{ $data->data_type }}</td>
                            </tr>
                            <tr>
                                <th>Blood Group</th>
                                <td>{{ $data->blood_group }}</td>
                            </tr>
                            <tr>
                                <th>Family Name</th>
                                @if ($data->data_type == 'Primary data')
                                    <td>{{ $data->family_name }}</td>
                                @elseif($data->data_type == 'Dependent data')
                                    @if ($family == null)
                                        <td class="text-danger">Not accepted in the family.</td>
                                    @elseif($family->rejected != 0)
                                        <td>{{ $family->user_2->family_name }}<span
                                                class=" ml-1 text-success">(Verified)</span></td>
                                    @else
                                        <td>{{ $family->user_2->family_name }}<div class="text-danger">(Waiting for
                                                Verification)</div>
                                        </td>
                                    @endif
                                @endif
                            </tr>
                            <tr>
                                <th>BMI</th>
                                @if ($data->height != null)
                                    <td>{{ round($data->weight / $data->height ** 2, 2) }}</td>
                                @else
                                    <td></td>
                                @endif
                            </tr>

                        </table>
                    </div>
                    <div class="col-md-8">

                        <div class="card my-3 p-3 shadow-1">
                            <h4 class="card-title" style="border-bottom: 3px solid #007BFF">My Profile</h4>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $data->user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $data->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $data->user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{ $data->gender }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $data->address }}</td>
                                </tr>
                                <tr>
                                    <th>Date Of Birth</th>
                                    <td>{{ $data->dob }}</td>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <td>
                                        @php
                                            $dob_year = \Carbon\Carbon::now()->format('Y') - \Carbon\Carbon::createFromTimeStamp(strtotime($data->dob))->isoFormat('Y');
                                            echo $dob_year;
                                        @endphp
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @if ($kyc)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card my-3 p-3 shadow-1">
                                <h4 class="card-title" style="border-bottom: 3px solid #007bff">KYC Details</h4>
                                <form action="{{ route('kyc.verify', $kyc->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">verify</button>
                                </form>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{ $kyc->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Middle Name</th>
                                        <td>{{ $kyc->middle_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td>{{ $kyc->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $kyc->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Birth Date</th>
                                        <td>{{ $kyc->birth_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Citizenship No</th>
                                        <td>{{ $kyc->citizenship_no }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    {{-- doctor --}}
    @if ($data->user->role == 4)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="text-center">
                            <img src="{{ $data->image_path }}" alt="" height="150px"
                                width="150px" class="rounded-circle">
                        </div>
                        <div class="text-center mt-2">
                            <h6 class="mb-0">{{ $data->salutation }} {{ $data->user->name }}</h6>
                            <h6 class="text-primary">{{ $data->specialization }}</h6>
                        </div>
                        <table class="table table-borderless mx-3 my-4">
                            <tr>
                                <th>Department</th>
                                <td>{{ $data->department == null ? '' : $data->departments->department }}</td>
                            </tr>
                            <tr>
                                <th>Qualification</th>
                                <td>{{ $data->qualification }}</td>
                            </tr>
                            <tr>
                                <th>Years Practiced</th>
                                <td>{{ $data->year_practiced }}</td>
                            </tr>
                            @if ($data->hospital != null)
                                @if ($data->hospital != 'null')
                                    <tr>
                                        <th>Hospital</th>
                                        <td>
                                            @foreach (json_decode($data->hospital) as $item)
                                                @foreach ($hospital as $hos)
                                                    @if ($hos->id == $item)
                                                        {{ $hos->name }}
                                                    @endif
                                                @endforeach
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @else
                                    <tr></tr>
                                @endif
                            @endif
                        </table>
                    </div>
                    <div class="col-md-7">

                        <div class="card my-3 p-3 shadow-1">
                            <h4 class="card-title" style="border-bottom: 3px solid #007bff">My Profile</h4>
                            <table class="table table-borderless">
                                <tr>
                                    <th>NMC/NAMC/NHPC No.</th>
                                    <td>{{ $data->nmc_no }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $data->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $data->user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{ $data->gender }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $data->address }}</td>
                                </tr>
                                <tr>
                                    <th>Consultation Fee</th>
                                    <td>Rs. {{ $data->fee }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                @if ($kyc)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card my-3 p-3 shadow-1">
                                <h4 class="card-title" style="border-bottom: 3px solid #007bff">KYC Details</h4>
                                <form action="{{ route('kyc.verify', $kyc->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">verify</button>
                                </form>

                                <table class="table table-borderless">
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{ $kyc->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Middle Name</th>
                                        <td>{{ $kyc->middle_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td>{{ $kyc->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $kyc->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Birth Date</th>
                                        <td>{{ $kyc->birth_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Citizenship No</th>
                                        <td>{{ $kyc->citizenship_no }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    {{-- nurse --}}
    @if ($data->user->role == 7)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="text-center">
                            <img src="{{ $data->image_path }}" alt="" height="150px"
                                width="150px" class="rounded-circle">
                        </div>
                        <div class="text-center mt-2">
                            <h6 class="mb-0">{{ $data->user->name }}</h6>
                        </div>
                        <table class="table table-borderless mx-3 my-4">
                            <tr>
                                <th>Nurse Type</th>
                                <td>{{ $data->nurse_type }}</td>
                            </tr>
                            <tr>
                                <th>Qualification</th>
                                <td>{{ $data->qualification }}</td>
                            </tr>
                            <tr>
                                <th>Years Practiced</th>
                                <td>{{ $data->year_practiced }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-7">
                        <div class="card my-3 p-3 shadow-1">
                            <h4 class="card-title" style="border-bottom: 3px solid #007bff">My Profile</h4>
                            <table class="table table-borderless">
                                <tr>
                                    <th>NNC No.</th>
                                    <td>{{ $data->nnc_no }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $data->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $data->user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{ $data->gender }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $data->address }}</td>
                                </tr>
                                @if ($data->fee != null)
                                    <tr>
                                        <th>Consultation Fee</th>
                                        <td>Rs. {{ $data->fee }}</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
                @if ($kyc)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card my-3 p-3 shadow-1">
                                <h4 class="card-title" style="border-bottom: 3px solid #007bff">KYC Details</h4>
                                <form action="{{ route('kyc.verify', $kyc->id) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-success">verify</button>
                                </form>
                                <table class="table table-borderless">
                                    <tr>
                                        <th>First Name</th>
                                        <td>{{ $kyc->first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Middle Name</th>
                                        <td>{{ $kyc->middle_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Name</th>
                                        <td>{{ $kyc->last_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ $kyc->gender }}</td>
                                    </tr>
                                    <tr>
                                        <th>Birth Date</th>
                                        <td>{{ $kyc->birth_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Citizenship No</th>
                                        <td>{{ $kyc->citizenship_no }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    @endif

    @if ($data->user->role == 8)
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="text-center">
                            <img src="{{ $data->image_path }}" alt="" height="150px"
                                width="150px" class="dataunded-circle">
                        </div>
                        <div class="text-center mt-2">
                            <h6 class="mb-0">{{ $data->user->name }}</h6>
                        </div>
                    </div>
                    <div class="col-md-7">

                        <div class="card my-3 p-3 shadow-1">
                            <h4 class="card-title" style="border-bottom: 3px solid #007bff">My Profile</h4>
                            <table class="table table-borderless">
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $data->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $data->user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{ $data->gender }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $data->address }}</td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
