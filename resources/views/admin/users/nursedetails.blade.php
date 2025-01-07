@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Nurses</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Nurses</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')

    <div class="card">
        <div class="card-body mt-3">
            <table id="example" class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Assign Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @canany(['Superadmin', 'Admin'])
                        @foreach ($nurses as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ $item->image_path }}" height="50" width="auto"></td>
                                <td>{{ $item->user->name ?? '' }} </td>
                                <td>{{ $item->user->email ?? '' }}</td>
                                <td>{{ $item->user->phone ?? '' }} {{ Helper::role_count($item->nurse_id) }}</td>
                                @if (Helper::role_count($item->driver_id) == 2)
                                    <td><span>Nurse Assigned</span></td>
                                @else
                                    <td>
                                        @if ($item->agreement_file == null)
                                            <span>After Agreement</span>
                                        @elseif ($item->agreement_file != null)
                                            <a data-id="{{ $item->nurse_id }}" data-role="{{ 7 }}"
                                                class="btn btn-primary deleteBtn">Role assign</a>
                                        @endif
                                    </td>
                                @endif
                                <td>
                                    <a href="{{ route('users.nurseshow', $item->id) }}" class="btn btn-primary"><i
                                            class="icon-eye"></i></a>
                                </td>

                            </tr>
                        @endforeach
                    @endcanany
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
                let role = $(this).attr('data-role');
                swal({
                        title: "Are you sure?",
                        text: "You want to give this user an Nurse role!",
                        icon: "info",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            var data = {
                                "_token": $('input[name= _token]').val(),
                                "id": id,
                                "role": role,

                            };
                            var url =
                                '{{ route('users.roleupdate', ['id' => ':id', 'role' => ':role']) }}';
                            url = url.replace(':id', id);
                            url = url.replace(':role', role);
                            $.ajax({
                                type: "POST",
                                url: url,
                                data: "data",
                                success: function(response) {
                                    if (response.success) {
                                        swal({
                                            title: response.success,
                                            icon: "success",
                                        }).then((result) => {
                                            if (result) {
                                                window.location.reload();
                                            }
                                        })
                                    }
                                    if (response.error) {
                                        swal({
                                            title: response.error,
                                            icon: "error",
                                        }).then((result) => {
                                            if (result) {
                                                window.location.reload();
                                            }
                                        })
                                    }

                                    // window.location.reload();
                                },
                                error: function() {
                                    swal({
                                        title: "User Role Should Not Exceeds More Than Two",
                                        icon: "Error",
                                    })
                                }
                            });
                        }
                    });
            })
        });
    </script>
@endsection
