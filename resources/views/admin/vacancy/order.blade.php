@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Order</span> -Vacancy</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('vacancy.index') }}" class="breadcrumb-item">Vacancy</a>
                    <span class="breadcrumb-item active">Order</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection
@section('content')
<style>
    .alert {
        padding-top: 2px;
        padding-bottom: 2px;
    }
</style>
<!-- Horizontal Form -->
<div class="card card-primary card-outline">
    <!-- form start -->
    <form enctype="multipart/form-data" method="POST" action="{{route('vacancy.orderStore')}}" class="form-horizontal">
        @csrf
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Vacancies</th>
                        <th>Order</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vacancy as $item)
                        <tr>
                            <td>{{$item->job_title}}</td>
                            <td>
                                <input type="number" class="form-control" name="order[{{$item->id}}]" value="{{$item->order}}" required>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

</div>
<!-- /.card -->
@endsection