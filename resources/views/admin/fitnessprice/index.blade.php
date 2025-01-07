@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add</span> -Fitness Price</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('fitness-price.index') }}" class="breadcrumb-item">Fitness Price</a>
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
        <div class="card-header border-bottom">
            <a href="{{ route('fitness-price.create') }}" type="button" class="btn btn-primary">
                Add Fitness Price
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Fitness Type</th>
                        <th>1 Month</th>
                        <th>3 Month</th>
                        <th>6 Monthe</th>
                        <th>1 Year</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pricing as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->fitnesstype->fitness_name }}</td>
                            <td>{{ $item->one_month }}</td>
                            <td>{{ $item->three_month }}</td>
                            <td>{{ $item->six_month }}</td>
                            <td>{{ $item->one_year }}</td>
                            <td>
                                <a href="{{route('fitness-price.edit',$item->id)}}" class="btn btn-primary"><i class="icon-pen"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection