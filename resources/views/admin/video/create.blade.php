@extends('admin.master')

@section('content')
    <div class="card border-top-primary border-bottom-0 rounded-0">
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light">
                <div class="breadcrumb breadcrumb-arrows">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
                    <a href="{{ route('news.index') }}" class="breadcrumb-item">News</a>
                    <a href="{{ route('video.index', $news->id) }}" class="breadcrumb-item">Videos</a>
                    <span class="breadcrumb-item active">
                        @isset($video) Edit
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
                    @isset($video)
                        <form method="POST" action="{{ route('video.update', [$news->id, $video->id]) }}" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        @else
                            <form method="POST" action="{{ route('video.store', $news->id) }}" class="form-horizontal"
                                enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                @endif
                                <div class="row">
                                    @foreach (Helper::languageAll() as $language)
                                        <div class="col-md-10">
                                            <label for="" class="required">Title/Caption ({{ $language->code }})</label>
                                            <input type="text" name="title_{{ $language->code }}"
                                                id="title_{{ $language->code }}"
                                                @if ($language->code == 'np') onkeyup="engToNep(title_{{ $language->code }})" @endif
                                                class="form-control"
                                                value="{{ null !== old('title_' . $language->code) ? old('title_' . $language->code) : (isset($video) ? $video->{'title_' . $language->code} : '') }}"
                                                required />
                                            @if ($errors->has('title_' . $language->code))
                                                <span class="text-danger">{{ $errors->first('title_' . $language->code) }}</span>
                                            @endif
                                        </div>
                                    @endforeach
                                    <div class="col-md-10">
                                        <label for="" class="required">Youtube Video</label>
                                        <input type="text" name="video" id="video" class="form-control"
                                            value="{{ null !== old('video') ? old('video') : (isset($video) ? $video->video : '') }}"
                                            required />

                                        @if ($errors->has('video'))
                                            <span class="text-danger">{{ $errors->first('video') }}</span>
                                        @endif
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mt-1">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="status"
                                                @isset($video) @if ($video->status == 1) checked @endif @endisset />
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
