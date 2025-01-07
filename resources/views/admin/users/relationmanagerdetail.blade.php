@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Relationship Officer List</span>
                </h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Relationship Officer List</span>
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
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>MS CODE</th>
                        <th>Define Role</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($relation_manager as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <img src="{{ $item->image_path }}"
                                    alt="{{ $item->relation_manager->name }}" height="80px">
                            </td>
                            <td>{{ $item->relation_manager->name }}</td>
                            <td>{{ $item->relation_manager->email }}</td>
                            <td>{{ $item->relation_manager->phone }}</td>
                            @if ($item->marketing_supervisor_id != null)
                                <td>{{ $item->employee_code->employee_code ?? '' }}</td>
                            @else
                                <td> <a style="float: right" data-toggle="modal"
                                        data-target="#exampleModalCenterDoctorReject_{{ $item->id }}"
                                        href="{{ route('users.addmscode', $item->id) }}"
                                        class="btn btn-primary">Add MS CODE</a>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenterDoctorReject_{{ $item->id }}"
                                        tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add MS CODE
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form
                                                    action="{{ route('users.addmscode', $item->id) }}"
                                                    method="POST">
                                                    <div class="modal-body">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="col-lg-12">
                                                            <div class="form-group">
                                                                <label class="form-label">MS CODE<code>*</code></label>
                                                                <select name="marketing_supervisor_id" id=""
                                                                    class="form-control">
                                                                    <option value=""><--select--></option>
                                                                    @foreach ($employees as $emp)
                                                                        <option value="{{ $emp->id }}">
                                                                            {{ $emp->employee_code }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('marketing_supervisor_id')
                                                                    <div class="alert alert-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            @endif
                            @if (Helper::role_count($item->user_id) == 2)
                                <td><span>RO Role Assigned</span></td>
                            @else
                                <td>
                                    @if ($item->agreement_file == null)
                                        <span>After Agreement</span>
                                    @elseif ($item->agreement_file != null)
                                        <a data-id="{{ $item->user_id }}" data-role="{{ 8 }}"
                                            class="btn btn-primary deleteBtn">Role assign</a>
                                    @endif
                                </td>
                            @endif
                            <td>
                                <a href="{{ route('users.relationmanagershow', $item->id) }}" class="btn btn-primary"><i
                                        class="icon-eye"></i></a>
                                <a href="{{ route('family_referred.detail', $item->user_id) }}" class="btn btn-primary"><i
                                        class="icon-cash"></i></a>
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
                let role = $(this).attr('data-role');
                swal({
                        title: "Are you sure?",
                        text: "You want to give this user an RO role!",
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
