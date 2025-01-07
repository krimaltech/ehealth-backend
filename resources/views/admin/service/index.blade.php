@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Services</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Services</span>
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
            <a href="{{route('service.create')}}" type="button" class="btn btn-primary">
                Add Service
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Service Name</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($services as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->service_name}}</td>
                        @if($item->price != null)
                        <td>Rs. {{$item->price}}</td>
                        @else
                        <td></td>
                        @endif
                        <td>
                            <a href="{{route('service.edit',$item->slug)}}" class="btn btn-primary"><i class="icon-pen"></i></a>
                            <a href="{{route('service.show',$item->slug)}}" class="btn btn-primary"><i class="icon-eye2"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
