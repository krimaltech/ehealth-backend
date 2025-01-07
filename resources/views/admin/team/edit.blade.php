@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit</span> -Team Member</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('team.index') }}" class="breadcrumb-item">Our Team</a>
                    <span class="breadcrumb-item active">Edit</span>
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
        .fileinput-remove{
            display: none;
        }
        .btn-file{
            z-index:0 !important;
        }
    </style>
    <div class="card">
        <form method="POST" action="{{ route('team.update',$team->slug) }}" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Team Category<code>*</code></label>
                            <select name="category" id="" class="form-control select-search" required>
                                <option value="" selected disabled>-- Select Team Category --</option>
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}" @if($item->id == $team->category_id) selected @endif>{{$item->category_name}}</option>
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
                            <input type="text" class="form-control" name="member_id" required value="{{old('member_id') ?? $team->member_id }}">
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
                            <input type="text" class="form-control" required name="position" value="{{old('position') ?? $team->position }}">
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
                            <input type="text" class="form-control" name="name" required value="{{old('name') ?? $team->name }}">
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
                            <input type="email" class="form-control" name="email" required value="{{old('email') ?? $team->email }}">
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
                            <input type="number" class="form-control" required name="phone_no" value="{{old('phone_no') ?? $team->phone_no }}">
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
                            <input type="text" class="form-control" name="address" value="{{old('address') ?? $team->address }}">
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
                            <input type="number" min="1" class="form-control" name="is_user" value="{{old('is_user') ?? $team->is_user }}">
                            @error('is_user')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <label class="form-label">Image<code>*</code></label>
                        <input type="hidden" name="path" value="{{$team->image_path}}" id="path">
                        <input type="hidden" name="image_name" value="{{$team->image}}" id="image_name">
                        <input type="file" name="image" accept="image/*" class="file-input-overwrite">
                        @error('image')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="">Status</label><br/>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_active" value="1" {{$team->status == 1 ? 'checked' : ''}}>
                            <label class="form-check-label" for="status_active">Active</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="status_inactive" value="0" {{$team->status == 0 ? 'checked' : ''}}>
                            <label class="form-check-label" for="status_inactive">Inactive</label>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>

        </form>
    </div>
@endsection

@section('custom-script')
<script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
<script src="/global_assets/js/demo_pages/fileinput.min.js"></script>
<script>
    $('.file-input-overwrite').fileinput({
        browseLabel: 'Browse',
        browseIcon: '<i class="icon-file-plus mr-2"></i>',
        uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
        removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
        initialPreview: [
            $('#path').val(),
        ],
        initialPreviewConfig: [
            {caption: $('#image_name').val(), size: 930321},
        ],
        initialPreviewAsData: true,
        overwriteInitial: true,
    })
</script>
@endsection