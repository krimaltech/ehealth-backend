@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Not Booked Package List</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Not Booked Package List</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Family Name</th>
                        <th>User</th>
                        <th>Phone No.</th>
                        <th>Package <br/>(Family Size)</th>
                        <th>Joined Date </th>
                        <th>Package Status</th>
                        <th>Payment Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->familyname->family_name ?? NULL}}</td>
                        <td>{{$item->familyname->primary->member->name ?? NULL}}</td>
                        <td>{{$item->familyname->primary->member->phone ?? NULL}}</td>
                        <td>{{$item->package->package_type??''}} <br/>
                            @if($item->familyname != null )
                                @if($item->package_id != 10)
                                (
                                    {{$item->familyname->family->count() + 1}} 
                                    {{$item->familyname->family->count()+1 > 1  ? 'members' : 'member'}}
                                )
                                @else
                                (
                                    {{$item->familyname->family->count()}} 
                                    {{$item->familyname->family->count() > 1  ? 'members' : 'member'}}
                                )
                                @endif
                            @else
                            (
                                1 member
                            )
                            @endif
                        </td>
                        <td>{{$item->booked_date}}</td>
                        <td>{{$item->package_status}}</td>
                        @if($item->status == 0)
                        <td> 
                            <span class="badge text-danger">Payment Due</span>
                        </td>
                        @else
                        <td>
                            <span class="badge text-success">Paid</span>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
