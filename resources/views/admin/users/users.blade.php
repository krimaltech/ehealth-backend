@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Users</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Users</span>
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
            <a href="#" id="roledrop" class="btn"></a>
            <a class="btn btn-info" href="{{ route('export') }}">Export Users File</a>
        </div>

        <div class="card-body mt-3">
            <table id="example" class="table table-bordered">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Role</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Joined Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @can('Superadmin')
                        @foreach ($users->skip(1) as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @foreach ($item['roles'] as $role)
                                        {{ $role->role_type }}
                                    @endforeach
                                </td>
                                <td>{{ $item->first_name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->isoFormat('MMM Do, Y'); ?></td>
                                <td>
                                    <button id="stockButton-{{ $item->id }}" onclick="verify('{{ $item->id }}')"
                                        class="<?php echo $item->is_verified == 0 ? 'btn btn-danger btn-sm' : 'btn btn-success btn-sm'; ?>">
                                        <?php
                                        echo $item->is_verified == 1 ? 'Verified' : 'Not Verified';
                                        ?>
                                    </button>
                                    {{-- <a class="btn btn-primary" href="{{ route('users.show', $item->id) }}">profile</a> --}}
                                    @if ($item->kyc && $item->kyc->form_status == 'upload-document')
                                        @if ($item->kyc->status == 'Active')
                                            <button class="btn btn-success">KYC Verified</button>
                                        @else
                                            <button class="btn btn-warning">KYC Un-verified</button>
                                        @endif
                                    @endif
                                    @if ($item->role == 3)
                                        <a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary px-4"><i
                                                class="icon-pen"></i> Edit </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endcan
                    @can('Admin')
                        @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @foreach ($item['roles'] as $role)
                                        {{ $role->role_type }}
                                    @endforeach
                                </td>
                                <td>{{ $item->first_name }}</td>
                                <td>{{ $item->last_name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->phone }}</td>
                                <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($item->created_at))->isoFormat('MMM Do, Y'); ?></td>
                                <td>
                                    <button id="stockButton-{{ $item->id }}" onclick="verify('{{ $item->id }}')"
                                        class="<?php echo $item->is_verified == 0 ? 'btn btn-danger btn-sm' : 'btn btn-success btn-sm'; ?>">
                                        <?php
                                        echo $item->is_verified == 1 ? 'Verified' : 'Not Verified';
                                        ?>
                                    </button>
                                    {{-- <a class="btn btn-primary" href="{{ route('users.show', $item->id) }}">profile</a> --}}
                                    @if ($item->kyc && $item->kyc->form_status == 'upload-document')
                                        @if ($item->kyc->status == 'Active')
                                            <button class="btn btn-success">KYC Verified</button>
                                        @else
                                            <button class="btn btn-warning">KYC Un-verified</button>
                                        @endif
                                    @endif
                                    @if ($item->role == 3)
                                        <a href="{{ route('users.edit', $item->id) }}" class="btn btn-primary px-4"><i
                                                class="icon-pen"></i> Edit </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endcan
                </tbody>

                <tfoot>
                    <tr>
                        <th>S.N.</th>
                        <th>Role</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Joined Date</th>
                        <th>Actions</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>



@endsection
@section('custom-script')
    <script>
        $(document).ready(function() {

            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [0, ':visible']
                        }
                    },
                    'colvis'
                ],

                initComplete: function() {
                    this.api()
                        .columns([1])
                        .every(function() {
                            var column = this;
                            var select = $(
                                    '<select class="form-control"><option value="">Select Role</option></select>'
                                )
                                .appendTo($("#roledrop").empty())
                                .on('change', function() {
                                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                                    column.search(val ? '^' + val + '$' : '', true, false)
                                        .draw();
                                });

                            column
                                .data()
                                .unique()
                                .sort()
                                .each(function(d, j) {
                                    select.append('<option value="' + d + '">' + d +
                                        '</option>');
                                });
                        });
                },

            });
        });
    </script>
    <script>
        function verify(id) {
            console.log(id);
            $.ajax({
                url: "{{ route('users.changeStatus') }}",
                type: "get", //send it through get method
                data: {
                    "id": id
                },
                success: function(response) {
                    var feature = "stockButton-" + response['id'];
                    if (response['value'] == "0") { // if true (1)
                        $('#' + feature).html("Not Verified");
                        $('#' + feature).removeClass('btn btn-success btn-sm').addClass(
                            'btn btn-danger btn-sm');
                    } else {
                        $('#' + feature).html("Verified");
                        $('#' + feature).removeClass('btn btn-danger btn-sm').addClass(
                            'btn btn-success btn-sm');
                    }
                },
                error: function(xhr) {

                }
            });
        }
    </script>
@endsection
