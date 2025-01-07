@extends('admin.master')
@section('content')
    <div class="card border-top-primary border-bottom-0 rounded-0">
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light">
                <div class="breadcrumb breadcrumb-arrows">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
                    <a href="{{ route('advertisement.index') }}" class="breadcrumb-item">Advertisements</a>
                    <span class="breadcrumb-item active">
                        @isset($advertisement) Edit
                        @else
                            Create @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
        {{-- <!-- @include('admin.alert') --> --}}
        <div class="card">
            <div class="card-header">

                <div class="card-body">
                    @isset($advertisement)
                        <form method="POST" action="{{ route('advertisement.update', $advertisement->id) }}"
                            class="form-horizontal" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        @else
                            <form method="POST" action="{{ route('advertisement.store') }}" class="form-horizontal"
                                enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                @endif
                                <div class="row">
                                    @foreach (Helper::languageAll() as $language)
                                        <div class="col-md-6">
                                            <label for="" class="required">Title ({{ $language->code }})</label>
                                            <input type="text" name="title_{{ $language->code }}"
                                                id="title_{{ $language->code }}"
                                                @if ($language->code == 'np') onkeyup="engToNep(title_{{ $language->code }})" @endif
                                                class="form-control"
                                                value="{{ null !== old('title_' . $language->code) ? old('title_' . $language->code) : (isset($advertisement) ? $advertisement->{'title_' . $language->code} : '') }}"
                                                required />
                                            @if ($errors->has('title_' . $language->code))
                                                <span class="text-danger">{{ $errors->first('title_' . $language->code) }}</span>
                                            @endif
                                        </div>
                                    @endforeach

                                    <div class="col-md-6">
                                        <label for="slug" class="required">URL</label>
                                        <input type="url" name="slug" id="slug" class="form-control"
                                            value="{{ null !== old('slug') ? old('slug') : (isset($advertisement) ? $advertisement->slug : '') }}"
                                            required />
                                        @if ($errors->has('slug'))
                                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                                        @endif
                                    </div>
                                    <div class="col-md-6">
                                        <label for="slug" class="required">Position</label>
                                        <select class="form-control" id="position_id" name="position_id" required>
                                            @foreach ($positions as $item)
                                                <option @if (null !== old('position_id') && old('position_id') == $item->id) selected @endif
                                                    @if (isset($advertisement) && $advertisement->position_id == $item->id) selected @endif value="{{ $item->id }}">
                                                    {{ $item->title }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('position_id'))
                                            <span class="text-danger">{{ $errors->first('position_id') }}</span>
                                        @endif
                                    </div>


                                    <div class="col-md-6">
                                        <label for="" class="required">Image</label>
                                        <br /> @isset($advertisement)
                                            @if ($advertisement->image != '')
                                                <a href="{{ asset('storage/images/' . $advertisement->image) }}" target="_blank"><img
                                                        id="selectedImage3" src="{{ asset('storage/images/' . $advertisement->image) }}"
                                                        height="100" width="100">
                                                </a>
                                            @endif

                                        @endisset
                                        <input type="file" onchange="readURL3(this);" name="image" accept="image/*"
                                            class="form-control" value="{{ old('image') }}"
                                            @isset($advertisement)@if ($advertisement->image == '') required @endif @else required @endisset />

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
                                                @isset($advertisement) @if ($advertisement->status == 1) checked @endif @endisset />
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
