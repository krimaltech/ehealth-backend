@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Packages</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Packages</span>
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
            <a href="{{route('package.create')}}" class="btn btn-primary">
                <i class="icon-plus-circle2 mr-1"></i> Add Package
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Package Type</th>
                        <th>No. of visits</th>
                        <th>Fee Structure</th>
                        <th>Screening Test</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->package_type}}</td>
                        <td>{{$item->visits}}</td>

                        <td class="text-center">
                            @if($item->fees->isEmpty())
                            <a href="{{route('packagefee.create',$item->id)}}" class="btn btn-success">Add</a>
                            @else
                            <a href="{{route('packagefee.edit',$item->id)}}" class="btn btn-warning">Edit</a>
                            @endif
                        </td>         
                        <td>
                            @if($item->visits != null)
                            <a href="{{route('screeningtest.create',$item->id)}}" class="btn btn-primary">Add</a>
                            <a href="{{route('screeningtest.edit',$item->id)}}" class="btn btn-primary">Edit</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('package.edit',$item->slug)}}" class="btn btn-primary"><i class="icon-pen"></i></a>
                            <a href="{{route('package.show',$item->slug)}}" class="btn btn-primary"><i class="icon-eye2"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
