@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Vendor List</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{route('users.vendordetail')}}" class="breadcrumb-item"> Vendor List</a>
                    <span class="breadcrumb-item active">Agreement</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<style>
    .head {
        height: 4.2cm;
    }

    .foot {
        height: 2.5cm;
    }
</style>
    @if($vendor->agreement_file_path == null)
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered mt-4">
                <thead>
                    <tr>
                        <th width="50%">Expression</th>
                        <th width="50%">Details</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <tr>
                        <td>
                            PRINCIPAL (Name, PAN Number, Address, Contact Number)
                        </td>
                        <td>
                            <p>Ghargharma Doctor Pvt. Ltd. <br>
                                (PAN No. 610285424) <br>
                                Sinamangal-09, Kathmandu <br>
                                +977 01 5917322<br>
                        </td>
                    </tr> --}}
                    <tr>
                        <td>
                            COMPANY (Name, Registration Number, Address, Contact Number)
                        </td>
                        <td>
                            <p>{{$vendor->store_name}} <br>
                                (Registration No. {{$vendor->agreement->registration_no}}) <br>
                                {{$vendor->address}} <br>
                                {{$vendor->agreement->company_contact}}<br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            GUARANTOR (Name, Address, Mobile Number)
                        </td>
                        <td>
                            <p>{{$vendor->agreement->guarantor_name}} <br>
                                {{$vendor->agreement->guarantor_address}} <br>
                                {{$vendor->agreement->guarantor_contact}}<br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            BUSINESS
                        </td>
                        <td>
                            {{$vendor->types->vendor_type}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            NOMINATED PERSON (Name, Address, Mobile Number)
                        </td>
                        <td>
                            <p>{{$vendor->agreement->nominator_name}} <br>
                                {{$vendor->agreement->nominator_address}} <br>
                                {{$vendor->agreement->nominator_contact}}<br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            MEMBERSHIP (FEE AND TIME FRAME)
                        </td>
                        <td>
                            Fee : Rs.{{$vendor->agreement->membership_fee}} <br>
                            Time Frame : {{$vendor->agreement->membership_time_frame}}
                        </td>
                    </tr>
                    <tr>
                        <td>
                            PAYMENT TIME FRAME
                        </td>
                        <td>
                            {{$vendor->agreement->payment_time_frame}} 
                        </td>
                    </tr>
                    <tr>
                        <td>
                            TERMINATION NOTICE
                        </td>
                        <td>
                            {{$vendor->agreement->termination_time_frame}}
                        </td>
                    </tr>
                </tbody>                    
            </table>
        </div>
        <div class="card-footer">
            <form action="{{route('users.approveagreement')}}" method="post">
                @csrf
                <input type="hidden" name="agreement" value="{{$vendor->agreement->id}}">
                <button class="btn btn-primary" type="submit">
                    Approve Agreement
                </button>
            </form>
        </div>
    </div>
    @else
        <iframe src="{{$vendor->agreement_file_path}}" frameborder="0" width="100%" height="600px"></iframe>
    @endif
@endsection