@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Authentication Log</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Authentication Log</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection
@php use Jenssegers\Agent\Agent; @endphp
@section('content')
   <div class="card">
        
        <div class="card-body mt-4">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>User</th>
                        <th>IP Address</th>
                        <th>Location</th>
                        <th>Browser</th>
                        <th>Login At</th>
                        <th>Login Successful</th>
                        <th>Logout At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $item)
                    @php $location= json_decode($item->location, true); @endphp
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->user->name??''}}</td>
                            <td>{{$item->ip_address}}</td>
                            <td>{{$location['city']??""}}</td>
                            <td> @php $agent = tap(new Agent, fn($agent) => $agent->setUserAgent($item->user_agent)); @endphp
                              {{ $agent->platform() . ' - ' . $agent->browser()}}</td>
                            <td>{{$item->login_at}}</td>
                            <td>{{$item->login_successful==true ?'Yes':'No'}}</td>
                            <td>{{$item->logout_at}}</td>
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection


