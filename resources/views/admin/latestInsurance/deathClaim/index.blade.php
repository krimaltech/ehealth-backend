@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Insurance Claim Report - Separate Death Insurance Claim</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Insurance Claim Report - Separate Death Insurance Claim</span>
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
                        <th>Name</th>
                        <th>Claiming By</th>
                        <th>Insurance Type</th>
                        <th>Claim Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($insuranceClaim as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->claiming_name}}</td>
                        <td>{{$item->insurance->insurancetype->type}}</td>
                        <td>Rs. {{$item->insurance->amount}}</td>
                        @if ($item->insurance_status == 'Pending')
                        <td><span class="badge badge-danger">Pending</span></td>
                        @elseif ($item->insurance_status == 'Approved')
                        <td><span class="badge badge-info">Approved Date::{{$item->approved_date}}</span></td>
                        @elseif ($item->insurance_status == 'Processing(Insurance Partner)')
                        <td><span class="badge badge-info">Processing(Insurance Partner)</span></td>
                        @elseif ($item->insurance_status == 'Processing(Claim Department)')
                        <td><span class="badge badge-info">Processing(Claim Department)</span></td>
                        @elseif ($item->insurance_status == 'Processing(Finance Department)')
                        <td><span class="badge badge-info">Processing(Finance Department)</span></td>
                        @elseif ($item->insurance_status == 'Processing(Forward To GD)')
                        <td><span class="badge badge-info">Processing(Forward To GD)</span></td>
                        @elseif ($item->insurance_status == 'Rejected')
                        <td><span class="badge badge-danger">Rejected Date::{{$item->rejected_date}}</span></td>
                        @else
                        <td><span class="badge badge-success">Claim Settelled Date::{{$item->setelled_date}}</span></td>
                        @endif
                        <td>
                            <a href="{{route('deathclaim.show',$item->id)}}" class="btn btn-primary"><i class="icon-eye2"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection