@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Company / School Profiles</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('company-profile.index') }}" class="breadcrumb-item">Company / School Profiles</a>
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
        <form method="POST" action="{{ route('company-profile.update',$companySchoolProfile->id) }}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">User Email<code>*</code></label>
                            <select class="form-control select-search" name="member_id">
                                <option value="" selected disabled>--select--</option>
                                @foreach ($user as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $companySchoolProfile->member_id) selected @endif>{{ $item->user->email }}</option>
                                @endforeach
                            </select>
                            @error('member_id')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">User Name<code>*</code></label>
                            <input type="text" class="form-control" name="user_name" value="{{ $companySchoolProfile->user_name }}" readonly>
                            @error('user_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Owner Name<code>*</code></label>
                            <input type="text" class="form-control" name="owner_name" value="{{ $companySchoolProfile->owner_name }}">
                            @error('owner_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Company Address</label>
                            <input type="text" class="form-control" name="company_address" value="{{ $companySchoolProfile->company_address }}">
                            @error('company_address')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Company Start Date<code>*</code></label>
                            <input type="date" class="form-control" name="company_start_date" value="{{ $companySchoolProfile->company_start_date }}">
                            @error('company_start_date')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Pan Number<code>*</code></label>
                            <input type="text" class="form-control" name="pan_number" value="{{ $companySchoolProfile->pan_number }}">
                            @error('pan_number')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Contact Number<code>*</code></label>
                            <input type="number" class="form-control" name="contact_number" value="{{ $companySchoolProfile->contact_number }}">
                            @error('contact_number')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Profile Types<code>*</code></label>
                            <select class="form-control" name="types">
                                <option value="" selected disabled>--select--</option>
                                <option value="school" @if ($companySchoolProfile->types == 'school') selected @endif disabled>School</option>
                                <option value="company" @if ($companySchoolProfile->types == 'company') selected @endif disabled>Company</option>
                            </select>
                            @error('types')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Company Image<code>*</code></label>
                            <input type="file" class="form-control" name="company_image" value="{{ old('company_image') }}">
                            <img src="{{ $companySchoolProfile->company_image_path}}" alt="" width="150px" height="150px">
                            @error('company_image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Paper Work<code>*</code></label>
                            <input type="file" class="form-control" name="letter" value="{{ old('letter') }}">
                            <iframe src="{{ $companySchoolProfile->paper_work_pdf_path}}" width="150px" height="150px" frameborder="0"></iframe>
                            @error('letter')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="message">Company Description<code>*</code></label>
                            <textarea name="description" class="summernote" cols="30" rows="10">{{ $companySchoolProfile->description }}</textarea>
                            @error('description')
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
@endsection
