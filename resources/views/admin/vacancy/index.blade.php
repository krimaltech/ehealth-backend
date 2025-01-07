@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Vacancy</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Vacancy</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<style>
    .brighttheme-success {
        background-color: #25b372; 
        border-color:#25b372;
        color: #fff;
    }
</style>
<div class="card">
    <div class="card-header border-bottom">
        <a href="{{route('vacancy.create')}}" type="button" class="btn btn-primary">
            Add Vacancy
        </a>
        <a href="{{route('vacancy.orderCreate')}}" type="button" class="btn btn-primary">
            Order Vacancy
        </a>
    </div>

    <div class="card-body">
        <table id="example1" class="table table-bordered table-hover datatable-colvis-basic">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Order</th>
                    <th>Job Title</th>
                    <th>Job Type</th>
                    <th>No of Vacancies</th>
                    <th>Job Deadline</th>
                    <th>View Count</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vacancy as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->order}}</td>
                        <td>{{$item->job_title}}</td>
                        <td>{{$item->job_type}}</td>
                        <td>{{$item->no_of_vacancy}}</td>
                        <td>{{$item->job_deadline}}</td>
                        <th>
                            <span class="badge badge-pill badge-info">
                                {{$item->visits->count()}}
                            </span>
                        </th>
                        <td>
                            @if(\Carbon\Carbon::parse($item->job_deadline)->format('Y-m-d') <= \Carbon\Carbon::now()->format('Y-m-d'))
                            <button class="btn btn-danger">Expired</button>
                            @else
                            <button class="{{$item->status == 1 ?  'btn btn-success' : 'btn btn-danger'}}" id="statusToggle-{{$item->id}}" onclick="changeStatus('{{$item->id}}')">{{$item->status == 1 ?  'Active' : 'Inactive'}}</button>
                            @endif
                        </td>               
                        <td>
                            <a href="{{route('vacancy.edit',$item->slug)}}" class="btn btn-primary"><i class="icon-pen"></i></a>
                            <a href="{{route('vacancy.show',$item->slug)}}" class="btn btn-primary"><i class="icon-eye2"></i></a>
                            <a href="" data-id="{{$item->id}}" class="btn btn-danger deleteBtn"><i class="icon-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection

@section('custom-script')
<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.deleteBtn').click(function(e){
            e.preventDefault();
            let id = $(this).attr('data-id');
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this vacancy!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var data = {
                            "_token" : $('input[name= _token]').val(),
                            "id" : id,
                        };
                    var url = '{{ route("vacancy.delete", ":id") }}';
                    url = url.replace(':id',id);
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        data: "data",
                        success: function(response) {
                            swal(response.success, {
                                icon: "success",
                            })
                            .then((result) => {
                                location.reload();
                            });
                        }
                    });    
                } 
            });
        })
    });
</script>
<script>
    function changeStatus($id){
        var url = '{{ route("vacancy.updateStatus", ":id") }}';
        url = url.replace(':id', $id);
        $.ajax({
            url: url,
            type: 'GET',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response) { 
                var status = "statusToggle-" + response.id;
                if(response.status == false){
                    $('#'+status).html('Inactive');
                    $('#'+status).removeClass('btn btn-success').addClass(
                    'btn btn-danger');
                } else{
                    $('#'+status).html('Active');
                    $('#'+status).removeClass('btn btn-danger').addClass(
                    'btn btn-success');
                }
                new PNotify({
                    title: "Success",
                    text: response.success,
                    type: "success",
                    delay: 3000 // Optional: set a delay to automatically close the notification
                });                       
            }
        });
    }
</script>
@endsection