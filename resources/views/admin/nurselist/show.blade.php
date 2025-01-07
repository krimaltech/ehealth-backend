@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Nurse List</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('nurselist.index') }}" class="breadcrumb-item">Nurse List</a>
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
        .doctor-list .card,
        .doctor-list .card-body {
            border-radius: 15px;
        }

        .doctor-list h5,
        .doctor-list h3 {
            font-weight: 500;
        }

        .appointment-text {
            color: rgb(155, 153, 153);
        }

        .appointment-text:hover {
            text-decoration: underline;
        }
    </style>
    <div class="row doctor-list">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if ($nurse->image != null)
                        <div>
                            <img src="{{$nurse->image_path }}" alt="" class="rounded-circle"
                                width="125px">
                            <h3 class="my-3"><b> {{ $nurse->salutation }}{{ $nurse->user->name }}</b></h3>
                        </div>
                    @else
                        <div>
                            <img src="/images/profile.png" alt="" class="rounded-circle" width="125px">
                            <h3 class="my-3"><b> {{ $nurse->salutation }}{{ $nurse->user->name }}</b></h3>
                        </div>
                    @endif
                    <div class="d-flex align-items-center flex-wrap">
                        <div class=" flex-fill">
                            <div class="row">
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span>NNC No. {{ $nurse->nnc_no }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span>{{ $nurse->user->phone }}</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span>{{ $nurse->user->email }}</span></p>
                                </div>
                                @if ($nurse->address != null)
                                    <div class="col-sm-6">
                                        <p><i class="icon-arrow-right5"></i><span>{{ $nurse->address }}</span></p>
                                    </div>
                                @endif
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span>{{ $nurse->year_practiced }} Years
                                            Experience</span></p>
                                </div>
                                <div class="col-sm-6">
                                    <p><i class="icon-arrow-right5"></i><span>{{ $nurse->gender }} </span></p>
                                </div>
                                @if ($nurse->fee != null)
                                    <div class="col-sm-6">
                                        <p><i class="icon-arrow-right5"></i><span>Consultation Fee: Rs.{{ $nurse->fee }}
                                            </span></p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h3 class="mb-4"><b>About Nurse</b></h3>
                    <div class="mb-3">
                        <h5>Qualification</h5>
                        <p>{{ $nurse->qualification }}</p>
                    </div>
                    @if ($nurse->hospital != null)
                        @if ($nurse->hospital != 'null')
                            <div class="mb-3">
                                <h5>Hospital Practices</h5>
                                @foreach (json_decode($nurse->hospital) as $item)
                                    @foreach ($hospital as $hos)
                                        @if ($hos->id == $item)
                                            <p><i class="icon-arrow-right5"></i>{{ $hos->name }}</p>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
