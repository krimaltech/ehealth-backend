@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">First Screening Pending Package List</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">First Screening Pending Package List</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Family Name</th>
                        <th>User</th>
                        <th>Package <br/> (Family Size)</th>
                        <th>Joined Date</th>
                        <th>Lab Visit Date</th>
                        <th>Lab Visit Time</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->familyname->family_name}}</td>
                        <td>{{$item->familyname->primary->member->name}}</td>
                        <td>{{$item->package->package_type}} <br/> ({{$item->familyfee->family_size}} {{$item->familyfee->family_size > 1  ? 'members' : 'member'}})</td>
                        <td>{{$item->booked_date}}</td>
                        <td>{{$item->dates[0]->screening_date}}</td>
                        <td>{{$item->dates[0]->screening_time ?? $item->dates[0]->screening_time }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#screeningTimeCenter_{{$item->dates[0]->id}}">
                                Update Screening Time
                            </button>
                            <div class="modal fade" id="screeningTimeCenter_{{$item->dates[0]->id}}" tabindex="-1" role="dialog" aria-labelledby="screeningTimeCenter_{{$item->dates[0]->id}}Title" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Update Screening Time</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="{{route('pending.screeningtime',$item->dates[0]->id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Screening Time</label>
                                                <input type="time" name="screening_time" class="form-control">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                            </div>
                            <a href="{{route('pending.show',$item->id)}}" class="btn btn-primary">
                                <i class="icon-eye2"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
