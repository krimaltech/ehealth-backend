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
                    <span class="breadcrumb-item active">Screening Team</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
@endsection



<!-- /page header -->


@section('content')
<div class="card">

    <div class="card-header border-bottom">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmodel"><i
                class="icon-add "></i> Add Screening Team</button>
    </div>

    <div class="modal fade" id="addmodel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Screening Team Create </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('steam.store') }}" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="_token" id="csrf" value="{{ csrf_token() }}">
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Team Name<code>*</code></label>
                                    <input type="text" placeholder="Team Name" name="name"
                                        value="{{ old('name') }}" class="form-control" required>
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="employee_id">Employees <code>*</code></label>

                                    <ul style="list-style-type:none;">
                                        @foreach ($employees as $emps)
                                            <li> <input type="checkbox" name="employees[]" value="{{ $emps->id }}"> {{$emps->user->name}} 
                                                 ({{$emps->subrole->subrole??''}}) @isset($emps->departments->department) ({{$emps->departments->department??''}}) @endisset
                                            </li>
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel
                                </button>
                                <button type="submit" id="addemergencyservicetypes"
                                    class="btn btn-primary">Submit</button>
                            </div>

                        </div>
                </form>


            </div>
        </div>
    </div>

    <div class="card-body">
        <table class="table table-bordered table-hover datatable-colvis-basic">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Team Name</th>
                    <th>Employee</th>

                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
              
                @foreach ($screeningteams as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>
                            <ul>
                                @foreach($item->screeningteam as $teamm)
                                <li> {{$teamm->user->name }}   
                                    ({{$teamm->subrole->subrole??''}}) @isset($teamm->departments->department) ({{$teamm->departments->department??''}}) @endisset</li>
                                @endforeach
                                
                                
                            </ul>
                        </td>

                        <td>
                            {{-- <a type="button" class="btn btn-primary" href="{{route('steam.edit',['id'=>$item->id])}}"><i class="icon-pen"></i></a> --}}
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addmodel{{$item->id}}"><i class="icon-pen"></i></button>
                        </td>

                    </tr>
                    
                    <div class="modal fade" id="addmodel{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Screening Team Edit </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                
                                <form action="{{ route('steam.update',['id'=>$item->id]) }}" method="POST" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" id="csrf" value="{{ csrf_token() }}">
                                    @method('put')
                                    <div class="modal-body">
                                        <div class="row">
                
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="name">Team Name <code>*</code></label>
                                                    <input type="text" placeholder="Team Name" name="name"
                                                        value="{{$item->name }}" class="form-control" required>
                                                    @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="employee_id">Employees<code>*</code> </label>
                                                    @php 
                                                     $screeningid=$item->screeningteam->pluck('id');
                                                    $screeningid= str_replace(array('[',']'),'',$screeningid);
                                                     @endphp
                                                    <ul style="list-style-type:none;">
                                                        @foreach ($employees as $emps)
                                                            <li> <input type="checkbox" @if(in_array($emps->id, explode(',',$screeningid))) checked @endif name="employees[]" value="{{ $emps->id }}"> {{$emps->user->name}} 
                                                                 ({{$emps->subrole->subrole??''}}) @isset($emps->departments->department) ({{$emps->departments->department??''}}) @endisset
                                                            </li>
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
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel
                                                </button>
                                                <button type="submit" id="addemergencyservicetypes"
                                                    class="btn btn-primary">Submit</button>
                                            </div>
                
                                        </div>
                                </form>
                
                
                            </div>
                        </div>
                    </div>
                     
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
