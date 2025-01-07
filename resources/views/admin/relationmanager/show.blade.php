@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Relationship Officer</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('relationmanager.index') }}" class="breadcrumb-item">Relationship Officer</a>
                    <span class="breadcrumb-item active">Add</span>
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
    </style>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('relationmanager.viewall', $relationmanager->id) }}" class="btn btn-primary">View All
                Files</a>
            @if (Helper::upgrade_or_downgrade($relationmanager->id) != 0)
                <a href="#" class="btn btn-danger">In-Progress</a>
            @endif
            @canany(['Superadmin', 'Admin'])
                @if (Helper::upgrade_or_downgrade($relationmanager->id) != 0)
                    @if ($relationmanager->rm_tag == 'Relationship Officer')
                        <a data-id="{{ $relationmanager->id }}" class="btn btn-primary upgradeBtn">Upgrade</a>
                    @else
                        <a data-id="{{ $relationmanager->id }}" class="btn btn-primary downgradeBtn">Downgrade</a>
                    @endif
                @endif
            @endcanany
        </div>

    </div>
    <div class="card">
        <!-- card-body -->
        <div class="card-body">
            <table>
                @if ($relationmanager->status == 'rejected')
                    <tr>
                        <td>Status:</td>
                        <td><button class="btn btn-danger">Rejected</button></td>
                    </tr>
                    <tr>
                        <td>Reject Reason:</td>
                        <td style="color: red">{{ $relationmanager->reject_reason }}</td>
                    </tr>
                @elseif ($relationmanager->status == 'pending')
                    <tr>
                        <td>Status:</td>
                        <td><button class="btn btn-secondary">Pending</button></td>
                        <a style="float: right" data-toggle="modal"
                            data-target="#exampleModalCenterROReject_{{ $relationmanager->id }}"
                            href="{{ route('relationmanager.reject_ro', $relationmanager->id) }}"
                            class="btn btn-danger"><i class="icon-cross"></i>Reject Relationship Officer</a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalCenterROReject_{{ $relationmanager->id }}" tabindex="-1"
                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLongTitle">Reject Consultation</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form
                                        action="{{ route('relationmanager.reject_ro', $relationmanager->id) }}"
                                        method="POST">
                                        <div class="modal-body">
                                            @csrf
                                            @method('patch')
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-label">Rejection Reason<code>*</code></label>
                                                    <textarea name="reject_reason" id="" cols="50" rows="10"></textarea>
                                                    @error('doctor_reject_reason')
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
                    </tr>
                @else
                    <tr>
                        <td>Status:</td>
                        <td><button class="btn btn-success">Approved</button></td>
                    </tr>
                @endif
            </table>
            <div class="row" style="margin-top: 20px">
                <div class="col-md-6">
                    <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                        <div>
                            <ul class="list list-unstyled mb-0">
                                <li>User Name</li>
                                <li>Phone Number</li>
                                <li>Email</li>
                                <li>Gender</li>
                                <li>Address</li>
                            </ul>
                        </div>

                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                            <ul class="list list-unstyled mb-0">
                                <li><span
                                        class="font-weight-semibold">{{ $relationmanager->relation_manager->name }}</span>
                                </li>
                                <li><span
                                        class="font-weight-semibold">{{ $relationmanager->relation_manager->phone }}</span>
                                </li>
                                <li><span
                                        class="font-weight-semibold">{{ $relationmanager->relation_manager->email }}</span>
                                </li>
                                <li><span class="font-weight-semibold">{{ $relationmanager->gender }}</span></li>
                                <li><span class="font-weight-semibold">{{ $relationmanager->address }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-sm-flex align-item-sm-center flex-sm-nowrap">
                        <div>
                            <ul class="list list-unstyled mb-0">
                                <li><span class="font-weight-semibold">Image</span></li>
                            </ul>
                        </div>
                        <div class="text-sm-right mb-0 mt-3 mt-sm-0 ml-auto">
                            <ul class="list list-unstyled mb-0">
                                <li><span class="font-weight-semibold"><img src="{{ $relationmanager->image_path }}"
                                            alt="{{ $relationmanager->image }}" width="200px" height="200px"></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <h2>User File</h2>
                    <iframe src="{{ $relationmanager->file_path }}" frameborder="0" width="400px"
                        height="500px"></iframe>
                </div>
                <div class="col-md-6">
                    <h2>Agreement File</h2>
                    <iframe src="{{ $relationmanager->agreement_file_path }}" frameborder="0" width="400px"
                        height="500px"></iframe>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
        @can('Marketing Supervisor')
            @if (Helper::upgrade_or_downgrade($relationmanager->id) == 0)
                <form action="{{ route('relationmanager.upload_file_relation_manager') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h2>Upload File</h2>
                            @if ($relationmanager->rm_tag == 'Relationship Officer')
                                <p><code>**</code>Do You Want To Upgrade as Relationship Manager ?</p>
                            @else
                                <p><code>**</code>Do You Want To Downgrade as Relationship Officer ?</p>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <input type="hidden" name="relation_manager_id" value="{{ $relationmanager->id }}">
                                <div class="col-md-6">
                                    @if ($relationmanager->rm_tag == 'Relationship Officer')
                                        <label for="">Upgrade File<code>*</code></label>
                                    @else
                                        <label for="">Downgrade File<code>*</code></label>
                                    @endif
                                    <input type="file" name="level_file" class="form-control" accept="application/pdf"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    @if ($relationmanager->rm_tag == 'Relationship Officer')
                                        <label for="">Upgrade Reason<code>*</code></label>
                                    @else
                                        <label for="">Downgrade Reason<code>*</code></label>
                                    @endif
                                    <textarea name="reason" cols="60" rows="10" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            @endif
        @endcan
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
            $('.upgradeBtn').click(function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                swal({
                        title: "Are you sure?",
                        text: "You want to Upgrade Relation Manager!",
                        icon: "info",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willUpdate) => {
                        if (willUpdate) {
                            var data = {
                                "_token": $('input[name= _token]').val(),
                                "id": id,

                            };
                            var url = '{{ route('relationmanager.upgrade_relation_manager', ':id') }}';
                            url = url.replace(':id', id);
                            $.ajax({
                                type: "PATCH",
                                url: url,
                                data: "data",
                                success: function(response) {
                                    console.log(response);
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
                                        title: "Your Does Not Meet Your Condition To That Position",
                                        icon: "Error",
                                    })
                                }
                            });
                        }
                    });
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.downgradeBtn').click(function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                console.log(id);
                swal({
                        title: "Are you sure?",
                        text: "You want to Downgrade Relation Manager!",
                        icon: "info",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willUpdate) => {
                        if (willUpdate) {
                            var data = {
                                "_token": $('input[name= _token]').val(),
                                "id": id,

                            };
                            var url =
                                '{{ route('relationmanager.downgrade_relation_manager', ':id') }}';
                            url = url.replace(':id', id);
                            $.ajax({
                                type: "PATCH",
                                url: url,
                                data: "data",
                                success: function(response) {
                                    console.log(response);
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
                                        title: "Your Does Not Meet Your Condition To That Position",
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
