@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Assign Sample Drop Team</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('sampleDrop.index') }}" class="breadcrumb-item">Assign Sample Drop Team</a>
                    <span class="breadcrumb-item active">Assign</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<div class="card">    
    <form action="{{route('sampleDrop.store')}}" method="post">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Select User</label>
                    <select name="user" id="user" class="form-control select-search" required>
                        <option value="" selected disabled>---Select User---</option>
                        @foreach ($user as $item)
                            <option value="{{$item->medicalreport_id}}">{{$item->medicalreport->members->user->name}} | {{$item->medicalreport->members->user->phone}} | {{$item->medicalreport->members->gd_id}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body details" style="display:none">
            <h6 style="font-weight: 600">Package and Screening Details</h6>
            <input type="hidden" name="familyname" id="family">
            <input type="hidden" name="screeningdate" id="screeningdate">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Family Name</label>
                    <input type="text" class="form-control" id="familyname" readonly>
                </div>
                <div class="col-md-4">
                    <label for="">Package</label>
                    <input type="text" class="form-control" id="package" readonly>
                </div>
                <div class="col-md-4">
                    <label for="">Screening</label>
                    <input type="text" class="form-control" id="screening" readonly>
                </div>
            </div>
            <h6 style="font-weight: 600" class="mt-3">Assign Lab User for Sample Collection</h6>
            <div class="row">
                <div class="col-md-4">
                    <label for="">Lab User</label>
                    <select name="employee_id" id="" class="form-control select-search" required>
                        <option value="" selected disabled>---Select Lab User---</option>
                        @foreach ($labuser as $item)
                            <option value="{{$item->id}}">{{$item->user->name}} ({{$item->subrole->subrole}})</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-primary" value="Assign Lab User">
        </div>
    </form>
</div>
@endsection

@section('custom-script')
    <script>
        $(document).ready(function(){
            $('#user').change(function(){
                let id = $(this).val();
                $.ajax({
                    type:'get',
                    url:'/admin/sample-drop-team/fetchdetails/'+ id,
                    success:function(res) {
                        //console.log(res);
                        $('#family').val(res.screeningdate.userpackage.familyname_id);
                        $('#screeningdate').val(res.screeningdate.id);
                        $('#familyname').val(res.screeningdate.userpackage.familyname.family_name);
                        $('#package').val(res.screeningdate.userpackage.package.package_type);
                        $('#screening').val(res.screeningdate.screening.screening);
                        $('.details').css('display','block');
                    }
                });
            })
        })
    </script>
@endsection