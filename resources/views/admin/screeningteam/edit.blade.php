@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Screening Teams</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('steam.index') }}" class="breadcrumb-item">Screening Team</a>
                    <span class="breadcrumb-item active">Edit</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
@endsection



<!-- /page header -->


@section('content')
<div class="card">

    <form action="{{ route('steam.update',['id'=>$team->id]) }}" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" id="csrf" value="{{ csrf_token() }}">
        @method('put')
        <div class="modal-body">
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name">Team Name <code>*</code></label>
                        <input type="text" placeholder="Team Name" name="name"
                            value="{{old('name') ?? $team->name }}" class="form-control" required>
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label for="employee_id">Employees </label>

                        <ul style="list-style-type:none;">
                            @foreach ($employees as $emps)
                                <li> <input type="checkbox"  
                                    @if(in_array($emps->id,explode(',',$screeningid))) checked @endif 
                                    name="employees[]" value="{{ $emps->id }}"> {{$emps->user->name}} 
                                     ({{$emps->subrole->subrole??''}}) @isset($emps->departments->department) ({{$emps->departments->department??''}}) @endisset
                                </li><br/>
                            @endforeach
                        </ul>
                        @error('employee_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>



                <!-- /.card-body -->
                <div class="modal-footer">
                 
                    <button type="submit" id="addemergencyservicetypes"
                        class="btn btn-primary">Submit</button>
                </div>

            </div>
    </form>
</div>
@endsection
