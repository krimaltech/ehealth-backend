@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"> Sub-Roles</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Sub Roles</span>
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
            <h2>Sub Roles</h2>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic text-center">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Role</th>
                        <th>Sub Role</th>
                        <th>Refer Percentage (%)</th>
                         <th>Update Refer Percentage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subroles as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->role->role_type??'' }}</td>
                            <td>{{ $item->subrole }}</td>
                            <td>{{ $item->percentage }} </td>
                            <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter{{$item->id}}">
                               <i class="icon-pen  mr-1"></i>Edit
                              </button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
