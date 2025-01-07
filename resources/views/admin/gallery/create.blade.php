@extends('admin.master')

@section('content')
    <div class="card border-top-primary border-bottom-0 rounded-0">
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light">
                <div class="breadcrumb breadcrumb-arrows">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
                    <a href="{{ route('gallery.index') }}" class="breadcrumb-item">Gallery</a>
                    <span class="breadcrumb-item active">
                        @isset($gallery) Edit
                        @else
                            Create @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
        {{-- <!-- @include('admin.alert') --> --}}
        <div class="card" style="width:50%">
            <div class="card-header">

                <div class="card-body">
                    @isset($gallery)
                        <form method="POST" action="{{ route('gallery.update', $gallery->id) }}" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        @else
                            <form method="POST" action="{{ route('gallery.store') }}" class="form-horizontal"
                                enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                @endif
                                <div class="row">
                                    @foreach (Helper::languageAll() as $language)
                                        <div class="col-md-8">
                                            <label for="" class="required">Title/Caption ({{ $language->code }})</label>
                                            <input type="text" name="title_{{ $language->code }}"
                                                id="title_{{ $language->code }}"
                                                @if ($language->code == 'np') onkeyup="engToNep(title_{{ $language->code }})" @endif
                                                class="form-control"
                                                value="{{ null !== old('title_' . $language->code) ? old('title_' . $language->code) : (isset($gallery) ? $gallery->{'title_' . $language->code} : '') }}"
                                                required />
                                            @if ($errors->has('title_' . $language->code))
                                                <span class="text-danger">{{ $errors->first('title_' . $language->code) }}</span>
                                            @endif
                                        </div>
                                    @endforeach

                                    <div class="col-md-8">

                                        <label for="" class="required">Image</label>
                                        @isset($gallery)
                                            @if ($gallery->image != '')
                                                <a href="{{ asset('storage/images/' . $gallery->image) }}" target="_blank"><img
                                                        src="{{ asset('storage/images/' . $gallery->image) }}" height="100"
                                                        width="100">
                                                </a>
                                            @endif
                                        @endisset
                                        <input type="file" name="image" accept="image/*" class="form-control"
                                            value="{{ old('image') }}"
                                            @isset($gallery)@if ($gallery->image == '') required @endif @else required @endisset />

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
                                                @isset($gallery) @if ($gallery->status == 1) checked @endif @endisset />
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
        @endsection
