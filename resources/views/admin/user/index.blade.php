@extends('admin.dashboard')
@section('content')
<div class="card border-top-primary border-bottom-0 rounded-0">
    <div class="page-header page-header-light">
          <div class="breadcrumb-line breadcrumb-line-light">
            <div class="breadcrumb breadcrumb-arrows">
                <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
                 <span class="breadcrumb-item active">Users</span>
            </div>
        </div>
    </div>
</div>
@include('admin.alert')
    <!-- Basic example -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title title-text"><a class="btn btn-primary" href="{{route('user.create')}}">Create</a></h3>
        </div>
        <table class="table datatable-colvis-basic">
            <thead>
                <tr>
                    <td>S.N.</td>
                    <td>Name</td>
                    <td>Image</td>
                    <td>Email</td>
                    <td>Role</td>
                    <td>Operation</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $index=>$item)
                    <tr>
                        <td>{{ ++$index}}</td>
                        <td>{{ $item->name }}</td>
                        <td>@isset($item->image)<img src="{{asset('storage/images/'.$item->image)}}" width="100" height="auto"> @endisset </td>
                        <td>{{ $item->email }}</td>
                        <td> {{$item->role?'Admin':'User'}}</td>
                        <td style="display:inline-flex;"><a @if($item->id==1) style="pointer-events: none;" @endif href="{{ route('user.edit', $item->id) }}" class="btn btn-primary"><i class="fa fa-edit"> </i> Edit</a> &nbsp;
                            <form method="post" action="{{route('user.destroy',$item->id)}}">
                                @csrf
                                @method('delete')
                               <button @if($item->id==1) disabled @endif type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-trase"></i> Delete</button>
                                
                            </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic example -->
@endsection

