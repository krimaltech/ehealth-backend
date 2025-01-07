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
    <div class="card">
        <div class="card-body">
            <div class="row">
                @forelse ($upgrade_file as $item)
                    <div class="col md 6">
                        <h2>Upgrading File</h2>
                        <a href="{{ $item->level_file }}" target="_blank">
                            <h6 class="mb-0">Click here to view document</h6>
                        </a>
                        <iframe src="{{ $item->level_file_path }}" frameborder="0" width="400px" height="500px"></iframe>
                    </div>
                    <div class="col md 6">
                        <h2>Reason to upgrade or downgrade</h2>
                        <p>{{ $item->reason }}</p>
                    </div>
                @empty
                    <h4>No Data</h4>
                @endforelse
            </div>
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
