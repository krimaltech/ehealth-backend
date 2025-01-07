@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add</span>-Refer</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('referral.index') }}" class="breadcrumb-item">Refer</a>
                    <span class="breadcrumb-item active">Add</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        @canany(['Employee','RO'])
        <div class="card-header border-bottom">
            <a href="{{ route('referral.create') }}" type="button" class="btn btn-primary">
                Refer a member
            </a>
        </div>
        @endcanany
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Referral Name</th>
                        <th>Referred Name</th>
                        <th>Referred Email</th>
                        <th>Referred Phone</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($referral as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->refferal->name }}</td>
                            <td>{{ $item->first_name }}</td>
                            <td><b>{{ $item->referral_email }}</b></td>
                            <td><b>{{ $item->phone }}</b></td>
                            <td><span class="badge badge-info"><b>{{ $item->status }}</b></span></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
