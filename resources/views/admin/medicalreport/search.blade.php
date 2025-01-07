@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Search Report</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Search Report</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div>
        <form action="{{route('report.search')}}" method="post" >
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <select name="member" id="member" class="form-control select-search" required>
                            <option value="" selected disabled>Select Patient</option>
                            @foreach ($member as $item)
                                <option value="{{$item->id}}">{{$item->user->name}} | {{$item->user->phone}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <input type="submit" value="Search" class="btn btn-primary form-control">
                </div>
            </div>
        </form>
    </div>
@endsection

