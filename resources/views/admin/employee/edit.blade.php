@extends('admin.master')

@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit</span> - Profile
                </h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('employee.index') }}" class="breadcrumb-item">Profile</a>
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
        .btn-file, .file-caption{
            z-index:0 !important;
        }
    </style>
    <div class="card">
        <form method="POST" action="{{ route('employee.update', $employee->slug) }}" class="form-horizontal"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            @can('GD Doctor')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">NMC/ NHPC No. <code>*</code></label>
                            <input type="number" class="form-control" name="nmc_no" value="{{ $employee->nmc_no }}">
                            @error('nmc_no')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">Salutation</label>
                        <select class="form-control" name="salutation">
                            <option value="" selected disabled>--select--</option>
                            <option value="Dr." @if($employee->salutation == "Dr.") selected @endif>Dr.</option>
                            <option value="Asst. Prof." @if($employee->salutation == "Asst. Prof.") selected @endif>Asst. Prof.</option>
                            <option value="Prof." @if($employee->salutation == "Prof.") selected @endif>Prof.</option>
                        </select>
                        @error('salutation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">First Name <code>*</code></label>
                            <input type="text" class="form-control" name="first_name" value="{{ $employee->user->first_name }}">
                            @error('first_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Middle Name<code>*</code></label>
                            <input type="text" class="form-control" name="middle_name" value="{{ $employee->user->middle_name }}">
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
                            <input type="text" class="form-control" name="last_name" value="{{ $employee->user->last_name }}">
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
                            <input type="email" class="form-control" name="email" value="{{ $employee->user->email }}">
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
                            <input type="text" class="form-control" name="phone" value="{{ $employee->user->phone }}">
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
                            <select class="form-control" name="gender">
                                <option value="" selected disabled>--select--</option>
                                <option value="Male" @if ($employee->gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if ($employee->gender == 'Female') selected @endif>Female</option>
                                <option value="Other" @if ($employee->gender == 'Other') selected @endif>Other</option>
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
                            <label class="form-label">Address <code>*</code></label>
                            <input type="text" class="form-control" name="address" value="{{ $employee->address }}">
                            @error('address')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">Department</label>
                        <select class="form-control" name="department">
                            <option value="" selected disabled>--select--</option>
                            @foreach ($departments as $item)
                                <option value="{{ $item->id }}" @if($employee->department == $item->id) selected @endif>{{ $item->department }}</option>
                            @endforeach
                        </select>
                        @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-4">
                        <label class="form-label">Qualification</label>
                        <input type="text" class="form-control" name="qualification"
                            value="{{ $employee->qualification }}">
                        @error('qualification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">Years Practiced</label>
                        <input type="number" class="form-control" name="year_practiced"
                            value="{{ $employee->year_practiced }}">
                        @error('year_practiced')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">Specialization</label>
                        <input type="text" class="form-control" name="specialization"
                            value="{{ $employee->specialization }}" >
                        @error('specialization')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6 mt-3">
                        <div class="form-group">
                            <label class="form-label">Your Photo</label><br>
                            <img src="{{ asset('/storage/images/' . $employee->image) }}" alt="" height="200px"
                                width="250px">
                            <input type="file" name="image" onchange="readURL(this)">
                            <img src="" height="200px" width="250px" id="selectedImage" style="display: none;">
                            @error('image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <div class="form-group">
                            <label class="form-label">Your Signature</label><br>    
                            <input type="hidden" id="signature_path" value="{{$employee->signature_path}}" >
                            <input type="hidden" id="signature_name" value="{{$employee->signature}}">   
                            @if($employee->signature)                     
                            <input type="file" name="signature" class="file-input-overwrite">
                            @else
                            <input type="file" name="signature" class="file-input-overwrite" required>
                            @endif
                            @error('signature')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            @elsecan('GD Nurse')
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">NNC No. <code>*</code></label>
                            <input type="number" class="form-control" name="nnc_no" value="{{ $employee->nnc_no }}">
                            @error('nnc_no')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">First Name <code>*</code></label>
                            <input type="text" class="form-control" name="first_name" value="{{ $employee->user->first_name }}">
                            @error('first_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Middle Name<code>*</code></label>
                            <input type="text" class="form-control" name="middle_name" value="{{ $employee->user->middle_name }}">
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
                            <input type="text" class="form-control" name="last_name" value="{{ $employee->user->last_name }}">
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
                            <input type="email" class="form-control" name="email" value="{{ $employee->user->email }}">
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
                            <input type="text" class="form-control" name="phone" value="{{ $employee->user->phone }}">
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
                            <select class="form-control" name="gender">
                                <option value="" selected disabled>--select--</option>
                                <option value="Male" @if ($employee->gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if ($employee->gender == 'Female') selected @endif>Female</option>
                                <option value="Other" @if ($employee->gender == 'Other') selected @endif>Other</option>
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
                            <label class="form-label">Address <code>*</code></label>
                            <input type="text" class="form-control" name="address" value="{{ $employee->address }}">
                            @error('address')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">Qualification</label>
                        <input type="text" class="form-control" name="qualification"
                            value="{{ $employee->qualification }}">
                        @error('qualification')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">Years Practiced</label>
                        <input type="number" class="form-control" name="year_practiced"
                            value="{{ $employee->year_practiced }}">
                        @error('year_practiced')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-lg-6 mt-3">
                        <div class="form-group">
                            <label class="form-label">Your Photo</label><br>
                            <img src="{{ asset('/storage/signatures/' . $employee->image) }}" alt="" height="200px"
                                width="250px">
                            <input type="file" name="image" onchange="readURL(this)">
                            <img src="" height="200px" width="250px" id="selectedImage" style="display: none;">
                            @error('image')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <div class="form-group">
                            <label class="form-label">Your Signature</label><br>    
                            <input type="hidden" id="signature_path" value="{{$employee->signature_path}}" >
                            <input type="hidden" id="signature_name" value="{{$employee->signature}}">   
                            @if($employee->signature)                     
                            <input type="file" name="signature" class="file-input-overwrite">
                            @else
                            <input type="file" name="signature" class="file-input-overwrite" required>
                            @endif
                            @error('signature')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">First Name <code>*</code></label>
                            <input type="text" class="form-control" name="first_name" value="{{ $employee->user->first_name }}">
                            @error('first_name')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Middle Name<code>*</code></label>
                            <input type="text" class="form-control" name="middle_name" value="{{ $employee->user->middle_name }}">
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
                            <input type="text" class="form-control" name="last_name" value="{{ $employee->user->last_name }}">
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
                            <input type="email" class="form-control" name="email" value="{{ $employee->user->email }}" readonly>
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
                            <input type="text" class="form-control" name="phone" value="{{ $employee->user->phone }}" readonly>
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
                            <select class="form-control" name="gender">
                                <option value="" selected disabled>--select--</option>
                                <option value="Male" @if ($employee->gender == 'Male') selected @endif>Male</option>
                                <option value="Female" @if ($employee->gender == 'Female') selected @endif>Female</option>
                                <option value="Other" @if ($employee->gender == 'Other') selected @endif>Other</option>
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
                            <label class="form-label">Address <code>*</code></label>
                            <input type="text" class="form-control" name="address" value="{{ $employee->address }}">
                            @error('address')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-label">Employee Type <code>*</code></label>
                            <select class="form-control" name="employee_type_id">
                                <option value="" selected disabled>--select--</option>
                                @foreach ($employee_types as $item)
                                    <option value="{{ $item->id }}" @if ($employee->employee_type_id == $item->id) selected @endif>
                                        {{ $item->employee_type }}</option>
                                @endforeach
                            </select>
                            @error('employee_type_id')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div> --}}
                    <div class="col-lg-6">
                        <label class="form-label">Your Photo</label><br>
                        <img src="{{ asset('/storage/images/' . $employee->image) }}" alt="" height="200px"
                            width="250px">
                        <input type="file" name="image" onchange="readURL(this)">
                        <img src="" height="200px" width="250px" id="selectedImage" style="display: none;">
                        @error('image')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    @can('Dietician')
                    <div class="col-lg-6 mt-3">
                        <div class="form-group">
                            <label class="form-label">Your Signature</label><br>    
                            <input type="hidden" id="signature_path" value="{{$employee->signature_path}}" >
                            <input type="hidden" id="signature_name" value="{{$employee->signature}}">   
                            @if($employee->signature)                     
                            <input type="file" name="signature" class="file-input-overwrite">
                            @else
                            <input type="file" name="signature" class="file-input-overwrite" required>
                            @endif
                            @error('signature')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    @endcan
                </div>
            </div>
            @endcan
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
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
    <script src="/global_assets/js/demo_pages/uploader_bootstrap.js"></script>
    <script src="/global_assets/js/demo_pages/fileinput.min.js"></script>
    <script>
        $('.file-input-overwrite').fileinput({
            browseLabel: 'Browse',
            browseIcon: '<i class="icon-file-plus mr-2"></i>',
            uploadIcon: '<i class="icon-file-upload2 mr-2"></i>',
            removeIcon: '<i class="icon-cross2 font-size-base mr-2"></i>',
            initialPreview: [
                $('#signature_path').val(),
            ],
            initialPreviewConfig: [
                {caption: $('#signature_name').val(), size: 930321},
            ],
            initialPreviewAsData: true,
            overwriteInitial: true,
        })
    </script>
    
@endsection
