@extends('admin.dashboard')
@section('content')
    <div class="card border-top-primary border-bottom-0 rounded-0">
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light">
                <div class="breadcrumb breadcrumb-arrows">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
                    <a href="{{ route('language.index') }}" class="breadcrumb-item">Languages</a>
                    <span class="breadcrumb-item active">
                        @isset($language) Edit
                        @else
                            Create @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- @include('admin.alert') -->
        <div class="card" style="width:50%">
            <div class="card-header">

                <div class="card-body">
                    @isset($language)
                        <form method="POST" action="{{ route('language.update', $language->id) }}" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        @else
                            <form method="POST" action="{{ route('language.store') }}" class="form-horizontal"
                                enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                @endif
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="" class="required">Language</label>
                                        <input type="text" name="language" id="language" class="form-control"
                                            value="{{ null !== old('language') ? old('language') : (isset($language) ? $language->language : '') }}"
                                            required />
                                        @if ($errors->has('language'))
                                            <span class="text-danger">{{ $errors->first('language') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="required">Code</label>
                                        <input type="text" name="code" id="code" class="form-control"
                                            value="{{ null !== old('code') ? old('code') : (isset($language) ? $language->code : '') }}"
                                            @isset($language) disabled @else required @endisset />
                                        @if ($errors->has('code'))
                                            <span class="text-danger">{{ $errors->first('code') }}</span>
                                        @endif
                                    </div>




                                    <div class="col-md-8">
                                        <label for="">Flag</label>
                                        <br /> @isset($language)
                                            @if ($language->image != '')
                                                <a href="{{ asset('storage/images/' . $language->image) }}" target="_blank"><img
                                                        id="selectedImage3" src="{{ asset('storage/images/' . $language->image) }}"
                                                        height="100" width="100">
                                                </a>
                                            @endif

                                        @endisset
                                        <input type="file" onchange="readURL3(this);" name="image" accept="image/*"
                                            class="form-control" value="{{ old('image') }}" />

                                        @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif


                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mt-1">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status"
                                                @isset($language) @if ($language->status == 1) checked @endif @endisset />
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary">Submit<i
                                            class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>

            <script>
                function readURL3(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {

                            $('#selectedImage3').attr('src', e.target.result);
                            $('#selectedImage3').css('display', 'block');
                        }

                        reader.readAsDataURL(input.files[0]);
                    }
                }
                $("#selectedImage3").change(function() {
                    readURL3(this);
                });
            </script>
        @endsection
