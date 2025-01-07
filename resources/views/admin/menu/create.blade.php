@extends('admin.master')

@section('content')
    <style type="text/css">
        label {
            margin-top: 5px;
        }
    </style>
    <div class="card border-top-primary border-bottom-0 rounded-0">
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light">
                <div class="breadcrumb breadcrumb-arrows">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
                    <a href="{{ route('menu.index') }}" class="breadcrumb-item">Menus</a>
                    <span class="breadcrumb-item active">
                        @isset($menu) Edit
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
                    @isset($menu)
                        <form method="POST" action="{{ route('menu.update', $menu->id) }}" class="form-horizontal"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                        @else
                            <form method="POST" action="{{ route('menu.store') }}" class="form-horizontal"
                                enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                @endif

                                <fieldset class="mb-3">
                                    <ul class="nav nav-tabs" role="tablist">
                                        @foreach (Helper::languageAll() as $language)
                                            <li class="nav-item">
                                                <a class="nav-link @if ($language->code == 'en') active @endif"
                                                    data-toggle="tab" href="#{{ $language->code }}"
                                                    role="tab">{{ $language->language }}</a>
                                            </li>
                                        @endforeach

                                    </ul>
                                    <div class="tab-content">
                                        @foreach (Helper::languageAll() as $language)
                                            <div class="tab-pane @if ($language->code == 'en') active @endif"
                                                id="{{ $language->code }}" role="tabpanel">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for=""
                                                                    @if ($language->code == 'en') class="required" @endif>Title
                                                                    ({{ $language->code }})
                                                                </label>
                                                                <input type="text" name="title_{{ $language->code }}"
                                                                    id="title_{{ $language->code }}"
                                                                    @if ($language->code == 'np') onkeyup="engToNep(title_{{ $language->code }})" @endif
                                                                    class="form-control"
                                                                    value="{{ null !== old('title_' . $language->code) ? old('title_' . $language->code) : (isset($menu) ? $menu->{'title_' . $language->code} : '') }}"
                                                                    @if ($language->code == 'en') required @endif />
                                                                @if ($errors->has('title_' . $language->code))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first('title_' . $language->code) }}</span>
                                                                @endif
                                                            </div>

                                                            <div class="col-md-12">
                                                                <label for="description">Description
                                                                    ({{ $language->code }})</label>
                                                                <textarea type="text" name="description_{{ $language->code }}" id="description_{{ $language->code }}"
                                                                    class="form-control">{{ null !== old('description_' . $language->code) ? old('description_' . $language->code) : (isset($menu) ? $menu->{'description_' . $language->code} : '') }}</textarea>
                                                                @if ($errors->has('description_' . $language->code))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first('description_' . $language->code) }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <script>
                                                CKEDITOR.replace('description_{{ $language->code }}');
                                            </script>
                                        @endforeach

                                    </div>
                                </fieldset>

                                <div class="card">
                                    <div class="card-body">

                                        <div class="row">

                                            <div class="col-md-6">
                                                <label for="menu_id">Menu</label>
                                                <select class="form-control" name="menu_id" id="menu->id">
                                                    <option value="">--select menu--</option>
                                                    @foreach ($menus as $item)
                                                        <option @if (null !== old('menu_id') && old('menu_id') == $item->id) selected @endif
                                                            @if (isset($menu) && $menu->menu_id == $item->id) selected @endif
                                                            value="{{ $item->id }}">{{ $item->title_en }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('menu_id'))
                                                    <span class="text-danger">{{ $errors->first('menu_id') }}</span>
                                                @endif
                                            </div>



                                            <div class="col-md-6">
                                                <label for="image">Image</label>
                                                @isset($menu)
                                                    @if ($menu->image != '')
                                                        <a href="{{ asset('storage/images/' . $menu->image) }}" target="_blank"><img
                                                                src="{{ asset('storage/images/' . $menu->image) }}" height="100"
                                                                width="100">
                                                        </a>
                                                    @endif
                                                @endisset
                                                <input type="file" name="image" accept="image/*" class="form-control"
                                                    value="{{ old('image') }}" />

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
                                                        @isset($menu) @if ($menu->status == 1) checked @endif @endisset />
                                                </div>
                                            </div>
                                        </div>

                                        <hr />
                                        <b>Gallery</b>
                                        @isset($menu)
                                            <div class="row">
                                                @foreach ($menu->gallery as $gal)
                                                    <div class="col-md-3 col-sm-4 col-xs-12" id="removing_{{ $gal->id }}">
                                                        <img src="{{ asset('/storage/images/' . $gal->image) }}" height="auto"
                                                            width="300" style="border:1px solid green;"> <br />
                                                        <div style="padding: 5px;text-transform: capitalize;">
                                                            <a href="{{ asset('storage/images/' . $gal->image) }}" target="_blank"><i
                                                                    class="fa fa-eye tex-primary"> View</i></a>
                                                            <a style="cursor: pointer;" onclick="imagedelete({{ $gal->id }})"><i
                                                                    class="fa fa-trash text-danger"> Delete</i> </a>
                                                        </div>

                                                    </div>
                                                @endforeach
                                            </div>
                                            @endif
                                            <br />
                                            <div class="row">
                                                <div class="col-md-4">

                                                    <input type="file" name="gallery[]" class="form-control" multiple
                                                        accept="image/*" />
                                                </div>
                                            </div>




                                            <div class="text-right">
                                                <button type="submit" class="btn btn-primary">Submit<i
                                                        class="icon-paperplane ml-2"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                        </div>
                    </div>
                </div>
            @endsection
