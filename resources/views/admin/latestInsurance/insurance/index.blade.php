@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Insurance Company Details</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Insurance Company Details</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        @if($insurance == null)
        <div class="card-header border-bottom">
            <a href="{{route('insurance.create')}}" type="button" class="btn btn-primary">
                Add Insurance
            </a>
        </div>
        <div class="card-body  mt-3">
            <div class="alert alert-danger text-center">
                Insurance Company Details Not Added.
            </div>
        </div>
        @else
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <tbody>
                    <tr>
                        <th>Company Name</th>
                        <td>{{$insurance->company_name}}</td>
                    </tr>
                    <tr>
                        <th>Address</th>
                        <td>{{$insurance->address}}</td>
                    </tr>
                        <th>Phone</th>
                        <td>{{$insurance->phone}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer text-right">
            <a href="{{route('insurance.edit',$insurance->slug)}}" class="btn btn-primary"><i class="icon-pen mr-1"></i> Edit</a>
        </div>
        @endif
    </div>
@endsection