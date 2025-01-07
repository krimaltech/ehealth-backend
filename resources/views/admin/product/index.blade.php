@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Products</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Products</span>
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
            <a href="{{ route('product.create') }}" type="button" class="btn btn-primary">
                Add Products
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Image</th>
                        <th>Main Category</th>
                        <th>Product Name</th>
                        <th>Featured</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Views</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ $item->image_path }}" alt="" height="150px"
                                    width="150px" class="rounded-circle"></td>
                            <td>
                                @if ($item->category_id == 0)
                                    Main Category
                                @else
                                    {{ $item->parents->name }}
                                @endif
                            </td>
                            <td>{{ $item->productName }}</td>
                            <td>
                                @if ($item->featured == 1)
                                    <span class="badge badge-pill badge-success">Published</span>
                                @else
                                    <span class="adge badge-pill badge-danger">Draft</span>
                                @endif
                            </td>
                            <td>{{ $item->stock }}</td>
                            <td>Rs.{{ $item->actualRate }}</td>
                            <td>{{ $item->views }}</td>
                            <td>
                                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary"><i
                                        class="icon-pen"></i></a>
                                <a href="" data-id="{{ $item->id }}" class="btn btn-danger deleteBtn"><i
                                        class="icon-trash"></i></a>
                                <a href="{{ route('product.gallery', $item->id) }}" class="btn btn-danger"><i
                                        class="icon-file-picture"></i></a>
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModalCenter_{{ $item->id }}">
                                    <i class="icon-stack"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter_{{ $item->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalCenterTitle">Add Stock</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form method="POST" action="{{ route('product.updatestock', $item->id) }}"
                                                    enctype="multipart/form-data">
                                                <div class="modal-body">
                                                    @csrf
                                                    @method('patch')
                                                    <div class="form-group">
                                                        <label class="form-label">Add
                                                            Stock<code>*</code></label>
                                                        <input type="text" class="form-control"
                                                            name="updated_stock_quantity"
                                                            value="{{ old('updated_stock_quantity') }}"
                                                            required>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                  <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </form>
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.deleteBtn').click(function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                swal({
                        title: "Are you sure?",
                        text: "Once deleted, you will not be able to recover this Product!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            var data = {
                                "_token": $('input[name= _token]').val(),
                                "id": id,
                            };
                            var url = '{{ route('product.destroy', ':id') }}';
                            url = url.replace(':id', id);
                            $.ajax({
                                type: "DELETE",
                                url: url,
                                data: "data",
                                success: function() {
                                    swal({
                                        title: "Your Product Deleted",
                                        icon: "danger",
                                    })
                                    window.location.reload();
                                }
                            });
                        }
                    });
            })
        });
    </script>
@endsection
