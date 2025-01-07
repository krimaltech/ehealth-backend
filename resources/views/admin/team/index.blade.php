@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Our Team</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Our Team</span>
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
        <a href="{{route('team.create')}}" type="button" class="btn btn-primary">
            Add Team Member
        </a>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-hover datatable-colvis-basic">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Team Category</th> 
                    <th>Advisor ID</th> 
                    <th>Name</th>
                    <th>Position</th>
                    <th>Phone No</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($team as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->category->category_name}}</td>
                        <td>{{$item->member_id}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->position}}</td>
                        <td>{{$item->phone_no}}</td>
                        <td>
                            <button class="{{$item->status == 1 ?  'btn btn-success' : 'btn btn-danger'}}" id="statusToggle-{{$item->id}}" onclick="changeStatus('{{$item->id}}')">{{$item->status == 1 ?  'Active' : 'Inactive'}}</button>
                        </td>
                        <td>
                            <a href="{{route('team.edit',$item->slug)}}" class="btn btn-primary"><i class="icon-pen"></i> </a>
                            <a href="{{route('team.show',$item->slug)}}" class="btn btn-primary"><i class="icon-eye2"></i> </a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#teamModalCenter_{{$item->id}}">
                                <i class="icon-trash"></i>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="teamModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="teamModalCenter_{{$item->id}}Title" aria-hidden="true">
                                <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete Team Member</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('team.destroy',$item->slug)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">
                                                <label for="">Are you sure you want to delete this team member?</label>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>                      
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection


@section('custom-script')
    <script>
        function changeStatus($id){
            var url = '{{ route("team.updateStatus", ":id") }}';
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

