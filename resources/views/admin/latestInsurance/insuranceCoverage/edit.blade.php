@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Insurance Type - {{$insuranceType->type}} Coverage</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{route('insurancetype.index')}}" class="breadcrumb-item">Insurance Type</a>
                    <span class="breadcrumb-item active">Edit {{$insuranceType->type}} Coverage</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<div class="card">
    <form action="{{route('coverage.update',$insuranceType->id)}}" method="post">
        @csrf
        @method('PATCH')
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Package</th>
                        <th>Coverage Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($insuranceType->coverage as $item)
                        <tr>
                            <td>{{$item->package->package_type}}</td>
                            <td>
                                <input type="number" name="update_amount[{{$item->id}}]" class="form-control" value="{{$item->amount}}">
                            </td>
                        </tr>
                    @endforeach
                    @foreach ($packages as $item)
                        <tr>
                            <td>{{$item->package_type}}</td>
                            <td>
                                <input type="number" name="amount[{{$item->id}}]" class="form-control">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-right">
            <input type="submit" class="btn btn-primary" value="Save">
        </div>
    </form>
</div>
@endsection