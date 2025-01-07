@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Symptoms</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Symptoms</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection
@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <a href="{{ route('symptom.create') }}" type="button" class="btn btn-primary">
                Add Symptoms
            </a>
        </div>
        <div class="card-body mt-4">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th> Name</th>
                        <th> Name(Nepali)</th>
                        <th>Icon</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($symptoms as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->name_nepali }}</td>
                            <td><img src="{{$item->image_path }}" height="100" width="120"
                                    alt="" class="rounded-circle" /></td>
                            <td>
                                <a href="{{ route('symptom.edit', $item->id) }}" class="btn btn-primary"><i
                                        class="icon-pen"></i></a>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModalCenter_{{$item->id}}">
                                    <i class="icon-trash"></i>
                                </button>
                                <div class="modal fade" id="deleteModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModalCenter_{{$item->id}}Title" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Confirm Deletion </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('symptom.delete', $item->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-body">
                                                    <h6>Are you sure that you want to delete this symptom?</h6>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- <a href="{{ route('symptom.delete', $item->id) }}" class="btn btn-danger"><i
                                        class="icon-pen"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
