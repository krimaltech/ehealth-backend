@extends('admin.master')
@section('content')
    <div class="card border-top-primary border-bottom-0 rounded-0">
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light">
                <div class="breadcrumb breadcrumb-arrows">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
                    <span class="breadcrumb-item active">Advertisements</span>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('admin.alert') --}}

    <!-- Basic example -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title title-text">

                <a href="{{ route('advertisement.create') }}" class="btn btn-primary">
                    Create </a>
            </h3>
        </div>

        <table class="table datatable-colvis-basic">
            <thead>
                <tr>
                    <td>S.No</td>
                    <td>Title</td>
                    <td>Image</td>
                    <td>Position</td>
                    <td>Status</td>
                    <td>Operation</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($advertisements as $index => $item)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $item->title_en }}</td>
                        <td>
                            @if ($item->image != '')
                                <img src="{{ asset('storage/images/' . $item->image) }}" height="50" width="50">
                            @endif
                        </td>
                        <td>{{ $item->position ? $item->position['title'] : '' }}</td>
                        <td><i class="fa-solid {{ $item->status ? 'fa-check' : 'fa-xmark' }}"></i></td>
                        <td style="display: flex;"><a href="{{ route('advertisement.edit', $item->id) }}"
                                class="btn btn-primary"><i class="fa fa-edit"> </i> Edit</a> &nbsp;
                            <form method="POST" action="{{ route('advertisement.destroy', $item->id) }}">
                                @csrf
                                @method('delete')
                                <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-danger"><i
                                        class="fa fa-trash"> </i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic example -->
@endsection
