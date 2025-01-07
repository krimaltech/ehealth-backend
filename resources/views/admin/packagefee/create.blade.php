@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add Fee Structure</span> - {{$package->package_type}}</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('package.index') }}" class="breadcrumb-item">Package</a>
                    <span class="breadcrumb-item active">Add Fee Details</span>
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
        .fee th{
            text-align: center;
        }
        .fee td{
            padding:4px;
        }
    </style>
    @if($package->id != 7 && $package->id != 8 && $package->id != 9 && $package->id != 10 && $package->id != 11)
        <div class="card fee">
            <form method="POST" action="{{ route('packagefee.store') }}" class="form-horizontal"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="package_id" value="{{$package->id}}">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>                        
                            <tr>
                                <th>Family Size <code>*</code></th>
                                <th>Total Registration Fee<code>*</code></th>
                                <th>Monthly Fee/Person<code>*</code></th>
                                <th rowspan="2"><button type="button" class="btn btn-success addBtn" ><i class="icon-plus2"></i></button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="number" name="family_size[]" class="form-control" min="0" required></td>
                                <td><input type="number" name="one_registration_fee[]" class="form-control" min="0" required>
                                <td><input type="number" name="one_monthly_fee[]" class="form-control" min="0" required></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    @else
        <div class="card fee">
            <form method="POST" action="{{ route('packagefee.store') }}" class="form-horizontal"
            enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="package_id" value="{{$package->id}}">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mininum Size <code>*</code></th>
                                <th>Maximum Size <code>*</code></th>
                                <th>Registration Fee/Person<code>*</code></th>
                                <th>Monthly Fee/Person<code>*</code></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="number" name="min_size" class="form-control" min="0" required></td>
                                <td><input type="number" name="max_size" class="form-control" min="0" required></td>
                                <td><input type="number" name="registration_fee" class="form-control" min="0" required></td>
                                <td><input type="number" name="monthly_fee" class="form-control" min="0" required></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    @endif
    <!--comment because of changes (continuation fee not needed)-->
    {{-- @if($package->id != 6 && $package->id != 7)
    <div class="card fee">
        <form method="POST" action="{{ route('packagefee.store') }}" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="package_id" value="{{$package->id}}">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th rowspan="2">Family Size <code>*</code></th>
                            <th colspan="1">Total Registration Fee<code>*</code></th>
                            <th colspan="2">Total Continuation Fee<code>*</code></th>
                            <th colspan="3">Monthly Fee/Person<code>*</code></th>
                            <th rowspan="2"><button type="button" class="btn btn-success addBtn" ><i class="icon-plus2"></i></button></th>
                        </tr>
                        <tr>
                            <th>Year 1</th>
                            <th>Year 2</th>
                            <th>Year 3 & Onwards</th>
                            <th>Year 1</th>
                            <th>Year 2</th>
                            <th>Year 3 & Onwards</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="number" name="family_size[]" class="form-control" min="0" required></td>
                            <td><input type="number" name="one_registration_fee[]" class="form-control" min="0" required></td>
                            <td><input type="number" name="two_continuation_fee[]" class="form-control" min="0" required></td>
                            <td><input type="number" name="three_continuation_fee[]" class="form-control" min="0" required></td>
                            <td><input type="number" name="one_monthly_fee[]" class="form-control" min="0" required></td>
                            <td><input type="number" name="two_monthly_fee[]" class="form-control" min="0" required></td>
                            <td><input type="number" name="three_monthly_fee[]" class="form-control" min="0" required></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->

            <div class="card-footer text-right">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
    @else
        <div class="card fee">
            <form method="POST" action="{{ route('packagefee.store') }}" class="form-horizontal"
            enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="package_id" value="{{$package->id}}">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mininum Size <code>*</code></th>
                                <th>Maximum Size <code>*</code></th>
                                <th>Registration Fee/Person<code>*</code></th>
                                <th>Monthly Fee/Person<code>*</code></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="number" name="min_size" class="form-control" min="0" required></td>
                                <td><input type="number" name="max_size" class="form-control" min="0" required></td>
                                <td><input type="number" name="registration_fee" class="form-control" min="0" required></td>
                                <td><input type="number" name="monthly_fee" class="form-control" min="0" required></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    @endif --}}
@endsection

@section('custom-script')
<!-- Summernote -->
<script>
    $(function() {
        // Summernote
        $('.summernote').summernote()
    })
</script>
<script>
    $(document).ready(function(){
        $('.addBtn').on('click',function(){
            var tr = '<tr>' +
                '<td><input type="number" class="form-control" name="family_size[]" min="0" required></td>' +
                '<td><input type="number" class="form-control" name="one_registration_fee[]" min="0" required></td>' +
                '<td><input type="number" class="form-control" name="one_monthly_fee[]" min="0" required></td>' +
                '<td style="text-align: center"><button type="button" class="btn btn-danger removeBtn" ><i class="icon-minus2"></i></button></td>' +
                '</tr>';
            $('tbody').append(tr);
        })
        $("tbody").on('click', '.removeBtn', function() {
            $(this).parent().parent().remove();
        });
    })
</script>
@endsection