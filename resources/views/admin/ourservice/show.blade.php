@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">View</span> - Our Services</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('ourservice.index') }}" class="breadcrumb-item">Our Services</a>
                    <span class="breadcrumb-item active">View</span>
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
            <table class="table">
                <tbody>
                    <tr>
                        <th width="30%">Service Title</th>
                        <td>{{$service->service_title}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Slug</th>
                        <td>{{$service->slug}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Short Description</th>
                        <td>{{$service->short_description}}</td>
                    </tr>
                    <tr>
                        <th width="30%">Long Description</th>
                        <td>{!!$service->long_description!!}</td>
                    </tr>
                    <tr>
                        <th width="30%">Status</th>
                        <td>
                            @if($service->status == 1)
                            <span class="badge badge-pill badge-success">Active</span>
                            @else
                            <span class="badge badge-pill badge-danger">Inactive</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th width="30%">SEO Keyword</th>
                        <td>{{$service->seo_keyword}}</td>
                    </tr>
                    <tr>
                        <th width="30%">SEO Description</th>
                        <td>{{$service->seo_description}}</td>
                    </tr>
                </tbody>
            </table>
        </div>          
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <p style="font-weight: 500"> Service Image</p>
                    <img src="{{$service->image_path}}" alt="{{$service->service_title}}" style="width:100%">
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100">
                <div class="card-body">
                    <p style="font-weight: 500"> Service Icon</p>
                    <img src="{{$service->icon_path}}" alt="{{$service->service_title}}" style="width:100%">
                </div>
            </div>
        </div>
    </div>
@endsection
