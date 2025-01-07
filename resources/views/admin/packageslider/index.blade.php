@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Package Slider</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Package Slider</span>
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
            <a href="{{route('packageslider.create')}}" type="button" class="btn btn-primary">
                Add Slider
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Slider Title</th>
                        <th>Slider Body</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($banner as $item)
                        <tr>
                            <input type="hidden" name="id" id="delete_id" value="{{$item->id}}">
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->banner_title}}</td>
                            <td>{{$item->banner_body}}</td>
                            <td><img src="{{$item->image_path}}" alt="" width="300px"></td>
                            <td>
                                <a href="{{route('packageslider.edit',$item->slug)}}" class="btn btn-primary"><i class="icon-pen"></i></a>
                                <a href="{{route('packageslider.destroy',$item->id)}}" class="btn btn-danger deleteBtn"><i class="icon-trash"></i></a>
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
    $(document).ready(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.deleteBtn').click(function(e) {
            e.preventDefault();

            var id = $(this).closest("tr").find('#delete_id').val();

            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this record!",
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

                    var url = '{{ route("packageslider.destroy", ":id") }}';
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
        });
    });
</script>
@endsection
