@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Insurance Type - {{$insuranceType->type}} Coverage</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{route('insurancetype.index')}}" class="breadcrumb-item">Insurance Type</a>
                    <span class="breadcrumb-item active">View {{$insuranceType->type}} Coverage</span>
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
        <h6 style="font-weight: 500" class="card-title">Insurance Type : {{$insuranceType->type}}</h6>
        @if($insuranceType->is_death_insurance == 1)
        <p class="mb-0">Death Related Insurance</p>
        @endif
    </div>
    <div class="card-body mt-3">
        <div class="mb-4">
            <h6 style="font-weight: 500">Insurance Claim Description/Instruction</h6>
            {!!$insuranceType->description!!}
        </div>
        <div>
            <h6 style="font-weight: 500">Required Papers Description</h6>
            {!!$insuranceType->required_papers!!}
        </div>
        <h6 style="font-weight: 500" class="mt-4">Insurance Coverage</h6>
        @if(count($insuranceType->coverage) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Package</th>
                    <th>Coverage Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($insuranceType->coverage as $item)
                    <tr>
                        <td>{{$item->package->package_type}}</td>
                        <td>
                            Rs. {{$item->amount}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="alert alert-danger">
            Insurance Coverage Not Added.
        </div>
        @endif
    </div>
</div>
@endsection