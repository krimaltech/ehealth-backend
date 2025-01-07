@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Director</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('relationmanager.index') }}" class="breadcrumb-item">Director</a>
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
        <form method="POST" action="{{ route('director.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-11">
                        <div class="form-group">
                            <label class="form-label">If You Have GD-ID Provide It And Save It Or Fill The Entire Form With
                                Out GD-ID</label>
                            <input type="text" class="form-control" name="users_id" id="gd_id">
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group">
                            <label class="form-label">Click !!</label>
                            <input type="button" class="btn btn-primary checkUser" value="Verify User">
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">First Name <code>*</code></label>
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}"
                                id="first_name" readonly>
                            @error('first_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}"
                                id="middle_name" readonly>
                            @error('middle_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Last Name <code>*</code></label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"
                                id="last_name" readonly>
                            @error('last_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Email <code>*</code></label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}"
                                id="email" readonly>
                            @error('email')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Phone <code>*</code></label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}"
                                id="phone" readonly>
                            @error('phone')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Gender <code>*</code></label>
                            <select class="form-control" name="gender" id="gender" readonly>
                                <option value="" selected disabled>--select--</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            @error('gender')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Address<code>*</code></label>
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                                id="address" readonly>
                            @error('address')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Director Types<code>*</code></label>
                            <select class="form-control" name="director_type">
                                <option value="" selected disabled>--select--</option>
                                <option value="1">Normal</option>
                                <option value="2">Chairperson</option>
                            </select>
                            @error('director_type')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Image<code>*</code></label>
                            <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                            @error('image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Director Image<code>*</code></label>
                            <input type="file" class="form-control" name="director_image"
                                value="{{ old('director_image') }}">
                            @error('director_image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Letter<code>*</code></label>
                            <input type="file" class="form-control" name="letter" value="{{ old('letter') }}">
                            @error('letter')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Share Document<code>*</code></label>
                            <input type="file" class="form-control" name="share_docs"
                                value="{{ old('share_docs') }}">
                            @error('share_docs')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Share Amount</label>
                            <input type="number" min="0" class="form-control" name="share_amt"
                                value="{{ old('share_amt') }}">
                            @error('share_amt')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Discount percentage</label>
                            <input type="number" min="0" class="form-control" name="discount_per"
                                value="30" readonly>
                            @error('discount_per')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="message">Message From Director<code>*</code></label>
                            <textarea name="message" class="summernote" cols="30" rows="10">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
@endsection

@section('custom-script')
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#selectedImage').attr('src', e.target.result);
                    $('#selectedImage').css('display', 'block');
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $('#selectedImage').change(function() {
            readURL(this);
        })
    </script>
    <!-- Summernote -->
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote()
        })
    </script>
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.checkUser').click(function(e) {
                var bla = $('#gd_id').val();
                e.preventDefault();
                var url = '/admin/director/user-details?gd_id=' + bla;
                $.ajax({
                    type: "GET",
                    url: url,
                    data: "data",
                    success: function(response) {
                        $("#first_name").val(response.user.first_name);
                        $("#middle_name").val(response.user.middle_name);
                        $("#last_name").val(response.user.last_name);
                        $("#email").val(response.user.email);
                        $("#phone").val(response.user.phone);
                        $("#address").val(response.address);
                        $("#gender").val(response.gender);
                    },
                    error: function() {
                        swal({
                            title: "Server Error",
                            icon: "Error",
                        })
                    }
                });
            })
        });
    </script>
@endsection
