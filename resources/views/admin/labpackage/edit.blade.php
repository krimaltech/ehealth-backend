@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Lab Package</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('labpackage.index') }}" class="breadcrumb-item">Lab Package</a>
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
    .labpackage .form-check-input{
        margin-right: 0;
        width: 2.5em;
        height: 1.5em;
    }
</style>
<div class="card labpackage">
    <form method="POST" action="{{ route('labpackage.update',$labpackage->id) }}" class="form-horizontal"
        enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Package Name<code>*</code></label>
                        <input type="text" class="form-control" name="package_name" value="{{$labpackage->package_name}}" required>
                        @error('package_name')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label class="form-label">Price<code>*</code></label>
                        <input type="number" class="form-control" name="price" min="0" value="{{$labpackage->price}}"  required>
                        @error('price')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        @if(count($labpackage->labcontents) > 0)
        <div class="card-body">
            <h6 class="mb-4"><b>Edit Package Contents</b></h6>
            @if(!$labpackageprofile->isEmpty())
            <div class="form-group">
                <label for="">Lab Profiles</label> <br/>
                @foreach ($labpackage->labcontents as $item)
                    @if($item->labtest == null)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="{{$item->id}}" name="editlabprofile_id[]" checked>
                        <label class="form-check-label" >
                            {{$item->labprofile->profile_name}}
                            @if(!$item->labprofile->labtest->isEmpty())
                                (
                                @foreach ($item->labprofile->labtest as $test)
                                    {{$test->tests}}
                                    @if($loop->last)                                    
                                    @else
                                        ,
                                    @endif
                                @endforeach
                                )
                            @endif
                        </label>
                    </div>
                    @endif
                @endforeach
            </div>
            @endif
            @if(!$labpackagetest->isEmpty())
            <div class="form-group">
                <label for="">Lab Tests</label> <br/>
                @foreach ($labpackage->labcontents as $item)
                    @if($item->labprofile == null)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" value="{{$item->id}}" name="editlabtest_id[]" checked>
                        <label class="form-check-label" >
                            {{$item->labtest->tests}}
                        </label>
                    </div>
                    @endif
                @endforeach
            </div>
            @endif
        </div>
        @endif
        <div class="card-body">
            <h6 class="mb-4"><b>Add Package Contents</b></h6>
            @if(!$labprofile->isEmpty())
            <div class="form-group">
                <label for="">Select Lab Profile</label> <br/>
                @foreach ($labprofile as $item)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="{{$item->id}}" name="labprofile_id[]">
                    <label class="form-check-label" >
                        {{$item->profile_name}}
                        @if(!$item->labtest->isEmpty())
                            (
                            @foreach ($item->labtest as $test)
                                {{$test->tests}}
                                @if($loop->last)                                    
                                @else
                                    ,
                                @endif
                            @endforeach
                            )
                        @endif
                    </label>
                </div>
                @endforeach
            </div>
            @endif
            @if(!$labtest->isEmpty())
            <div class="form-group">
                <label for="">Select Lab Test</label> <br/>
                @foreach ($labtest as $item)
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="{{$item->id}}" name="labtest_id[]">
                    <label class="form-check-label" >
                        {{$item->tests}}
                    </label>
                </div>
                @endforeach
            </div>
            @endif
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
</div>
@endsection