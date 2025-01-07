@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Incentive Manager</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('incentive.index') }}" class="breadcrumb-item">Incentive Manager</a>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<div class="card">
    <div class="card-header border-bottom">
        <a href="{{route('incentive.create')}}" type="button" class="btn btn-primary">
            Add Incentive
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover datatable-colvis-basic">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Incentive Receiver</th>
                    <th>Range</th>
                    <th>Incentive Percentage</th>
                    <th>Package Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($incentiveManager as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->incentivereceiver->subrole}}</td>
                        <td>{{ $item->minimum }}-{{ $item->maximum}} per family</td>
                        <td>{{$item->incentive_percentage}}</td>
                        <td>{{$item->package_type}}</td>
                        <td>
                            <a href="{{route('incentive.edit',$item->id)}}" class="btn btn-primary"><i class="icon-pen"></i> </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection