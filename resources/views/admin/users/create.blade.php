@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Employees</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('users.index') }}" class="breadcrumb-item">Employees</a>
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
        <form method="POST" action="{{ route('users.store') }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">First Name <code>*</code></label>
                            <input type="text" class="form-control" name="first_name" value="{{ old('first_name') }}">
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
                            <input type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}">
                            @error('middle_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Last Name<code>*</code></label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}">
                            @error('last_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Employee Type <code>*</code></label>
                            <select name="subrole" class="form-control">
                                <option value="">Select Employee type</option>
                                @foreach ($subrole as $item)
                                    <option value="{{ $item->id }}" {{old('subrole')==$item->id? 'selected':''}}>{{ $item->subrole }}</option>
                                @endforeach
                            </select>
                            @error('subrole')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Company Email <code>*</code></label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Company Phone <code>*</code></label>
                            <input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Password <code>*</code></label>
                            <input id="password" type="password" class="form-control" name="password">
                            @error('password')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label for="password-confirm" class="form-label">Confirm Password <code>*</code></label>
                            <input id="password-confirm" type="password" class="form-control " name="password_confirmation">
                            @error('password_confirmation')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Are you a User( if yes provide GD-Id)</label>
                            <input type="number" min="1" class="form-control" name="is_user">
                            @error('is_user')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Discount Percentage<code>*</code></label>
                            <input type="number" min="1" max="10" class="form-control" name="percentage" value="10" readonly>
                            @error('percentage')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Employee Id<code>*</code></label>
                            <input type="text" max="10" min="0" class="form-control" name="employee_code" value="{{ old('employee_code') }}" required>
                            @error('employee_code')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Employee Image <code>*</code></label>
                            <input type="file" class="form-control" name="image" value="{{ old('image') }}" accept="image/jpeg,image/gif,image/png">
                            @error('image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Employee Contract Paper <code>*</code></label>
                            <input type="file" class="form-control" name="file" value="{{ old('file') }}" accept="application/pdf">
                            @error('file')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Employee Non Disclosure Agreement Paper <code>*</code></label>
                            <input type="file" class="form-control" name="nda_file" value="{{ old('nda_file') }}" accept="application/pdf">
                            @error('nda_file')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
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
@endsection
