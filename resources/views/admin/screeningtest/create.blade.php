@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold"></span>{{$package->package_type}} - Add Screening Test</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('package.index') }}" class="breadcrumb-item">{{$package->package_type}}</a>
                    <span class="breadcrumb-item active">Add Screening Test</span>
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
    .screening-service th, .screening-service td{
        width: 25%;
    }
    .screening-service .form-check-input{
        margin-right: 0;
        width: 2.5em;
        height: 1.5em;
    }
</style>
<div class="screening-service">
    <form method="POST" action="{{ route('screeningtest.store') }}" class="form-horizontal"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="package_id" id="packageId" value="{{$package->id}}">
       
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Screening Type</label>
                            <select name="screening_type" id="screening_type" class="form-control" required>
                                <option value="">--Select Screening Type--</option>
                                <option value="Detail Screening">Detail Screening</option>
                                <option value="Follow Up Screening">Follow Up Screening</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>     
            <div class="card-body" id="testTable"  style="display:none">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Test</th>
                            <th>Man</th>
                            <th>Woman</th>
                            <th>Child</th>
                        </tr>
                    </thead>
                    <tbody id="tests">

                    </tbody>
                </table>
            </div>       
            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </div>
    </form>
</div>
@endsection

@section('custom-script')
    <script>
        $(document).ready(function(){
            $('#screening_type').change(function(){
                let packageId = $('#packageId').val();
                let type = $(this).val();
                $('#tests').empty();
                $.ajax({
                    type:'get',
                    url:'/admin/package/screening-tests/addfetchtest/'+ packageId ,
                    data: {type:type},
                    success:function(res) {
                        //console.log(res);
                        $('#testTable').css('display','block');
                        res.forEach(element => {
                            $('#tests').append(
                                `<tr> 
                                    <input type="hidden" name="labtest_id[${element['id']}]" value="${element['id']}">
                                    <td>${element['tests']}</td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="1" id="man_${element['id']}" name="man[${element['id']}]">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="1" id="woman_${element['id']}" name="woman[${element['id']}]">
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="1" id="child_${element['id']}" name="child[${element['id']}]">
                                        </div>
                                    </td>
                                </tr>`
                            );
                        });
                    }
                });
            })
        })
    </script>
@endsection
