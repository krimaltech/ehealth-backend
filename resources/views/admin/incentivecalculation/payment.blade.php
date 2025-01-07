@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Incentive Calculation</span>
                </h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('family_referred.index') }}" class="breadcrumb-item">Family Member</a>
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
        <div class="card-header">
            <form action="{{ route('family_referred.detail', $id) }}" method="GET">
                <div class="row">
                    <div class="col-md-4">
                        <input type="date" name="start" class="form-control" value="{{ $start }}">
                        <label for="">Start Date</label>
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="end" class="form-control" value="{{ $end }}">
                        <label for="">End Date</label>
                    </div>
                    <div class="col-md-4">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>User Name</th>
                        <th>Package Name</th>
                        <th>Incentive Amount</th>
                </thead>
                <tbody>
                    @foreach ($incentiveManager as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->name }}</td>
                            <td>{{ $item->package_name->package->package_type }}</td>
                            <td>{{ $item->incentive_amount }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th></th>
                        <td></td>
                        <th>Total Receivable Family Incentive Amount</th>

                        <td><span style="font-weight:bold">{{ $total_amount_calculated_individual }}</span></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                        <th>Total Receivable Corporate Incentive Amount</th>
                        <td><span style="font-weight:bold">{{ $total_amount_calculated_corporate }}</span></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td></td>
                        <th>Total Receivable Incentive Amount</th>
                        <td><span style="font-weight:bold">{{ $total_amount_calculated_individual +  $total_amount_calculated_corporate }}</span>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
