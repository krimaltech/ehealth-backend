@extends('admin.master')
@section('content')
    <div class="card border-top-primary border-bottom-0 rounded-0">
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light">
                <div class="breadcrumb breadcrumb-arrows">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
                    <span class="breadcrumb-item active">Gallery</span>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('admin.alert') --}}
    <!-- Basic example -->
    <div class="card">
        <div class="card-header">
            <h3> <a class="btn btn-primary" href="{{ route('gallery.create') }}">Create</a></h3>
        </div>
        <table class="table datatable-colvis-basic">
            <thead>
                <tr>
                    <td>S.N.</td>
                    <td>Caption</td>
                    <td>Image</td>
                    <td>New Related</td>
                    <td>Status</td>
                    <td>Operation</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($galleries as $index => $item)
                    <tr id="removing_{{ $item->id }}">
                        <td>{{ ++$index }}</td>
                        <td>{{ $item->title_en }}</td>
                        <td>
                            @if ($item->image != '')
                                <img src="{{ asset('storage/images/' . $item->image) }}" height="50" width="50">
                            @endif
                        </td>
                        <td><i class="fa-solid {{ $item->code ? 'text-primary fa-check' : 'text-danger fa-xmark' }}"></i>
                        </td>
                        <td><i class="fa-solid {{ $item->status ? 'text-primary fa-check' : 'text-danger fa-xmark' }}"></i>
                        </td>
                        <td>
                            <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-primary"><i class="fa fa-edit">
                                </i> Edit</a> &nbsp;
                            <button class="btn btn-danger" onclick="imagedelete({{ $item->id }})">
                                <i class="fa fa-trash"> </i> Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


    <script>
        function imagedelete(id) {

            var deleteFile = confirm("Are you sure ?");
            if (deleteFile == true) {
                // AJAX request
                $.ajax({
                    url: "{{ route('gallery.delete') }}",
                    type: 'post',

                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id
                    },
                    success: function(data) {

                        $("#removing_" + data).css({
                            'display': 'none'
                        });
                    }
                });
            }

        }
    </script>
    <!-- /basic example -->
@endsection
