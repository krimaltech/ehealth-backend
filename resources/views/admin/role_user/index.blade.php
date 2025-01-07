@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">User Role</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">User Role</span>
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
            <a href="{{ route('user-role.archive') }}" type="button" class="btn btn-primary">
                View Archive History
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>GD-ID / Employee Id</th>
                        <th>Role</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_role->skip(2) as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            @if ($item->employee == null)
                            <td>GD-{{ $item->id }}</td>
                            @else
                            <td>@if($item->employee != null){{ $item->employee->employee_code }}@endif</td>
                            @endif
                            <td>{{ $item->roles->role_type }}</td>
                            <td>@if($item->users != null){{$item->users->name }}@endif</td>
                            <td>@if($item->users != null){{$item->users->email }}@endif</td>
                            <td>@if($item->users != null){{$item->users->phone }}@endif</td>
                            <td>
                                <form action="{{route('user-role.destroy',$item->id)}}" method="post">
                                    @csrf
                                    @method("delete")
                                   <button class="btn btn-danger"><i class="icon-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
