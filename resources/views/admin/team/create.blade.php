@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add</span> -Team Member</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('team.index') }}" class="breadcrumb-item">Our Team</a>
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
        .fileinput-upload{
            display: none;
        }
        .btn-file{
            z-index:0 !important;
        }
    </style>
    <div class="card">
        <form method="POST" action="{{ route('team.store') }}" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Team Category<code>*</code></label>
                            <select name="category" required id="" class="form-control select-search">
                                <option value="" selected disabled>-- Select Team Category --</option>
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}" {{old('category')==$item->id ? 'selected':''}}>{{$item->category_name}}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Advisor ID<code>*</code></label>
                            <input type="text" class="form-control" required name="member_id" value="{{ old('member_id') }}">
                            @error('member_id')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Position<code>*</code></label>
                            <input type="text" class="form-control" required name="position" value="{{ old('position') }}">
                            @error('position')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Name<code>*</code></label>
                            <input type="text" required class="form-control" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>                    
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label class="form-label">Email<code>*</code></label>
                            <input type="email" class="form-control" required name="email" value="{{ old('email') }}">
                            @error('email')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Phone No.<code>*</code></label>
                            <input type="number" class="form-control" required name="phone_no" value="{{ old('phone_no') }}">
                            @error('phone_no')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Address<code>*</code></label>
                            <input type="text" class="form-control" required name="address" value="{{ old('address') }}">
                            @error('address')
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
                    <div class="col-lg-12">
                        <label class="form-label">Image<code>*</code></label>
                        <input type="file" class="file-input" required name="image">
                        @error('image')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-lg-12 mt-3">
                        <label for="">Service Status</label><br/>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_active" value="1" checked>
                            <label class="form-check-label" for="status_active">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0">
                            <label class="form-check-label" for="status_inactive">Inactive</label>
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
<script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
<script src="/global_assets/js/demo_pages/fileinput.min.js"></script>
@endsection