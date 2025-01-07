@extends('admin.dashboard')
@section('content')
<div class="card border-top-primary border-bottom-0 rounded-0">
    <div class="page-header page-header-light">
          <div class="breadcrumb-line breadcrumb-line-light">
            <div class="breadcrumb breadcrumb-arrows">
                <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
                 <span class="breadcrumb-item active">Contact Message</span>
            </div>
        </div>
    </div>
</div>
@include('admin.alert')
    <!-- Basic example -->
    <div class="card">
        
        <table class="table datatable-colvis-basic">
            <thead>
                <tr>
                    <td>S.N.</td>
                    <td>Name</td>
                    <td>Phone</td>
                    <td>Email</td>
                    <td>Address</td>
                     <td>Operation</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($contacts as $index=>$item)
                    <tr @if($item->seen==0) style="background-color:lightgray;" @endif>
                        <td>{{ ++$index }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{$item->phone}} </td>
                        <td>{{$item->email}} </td>
                        <td>{{$item->address}} </td>
                        

                        <td style="display: flex;"><a href="{{ route('contact.show', $item->id) }}" class="btn btn-primary"><i class="fa fa-eye"> </i> View</a> &nbsp;
                         <form method="POST" action="{{route('contact.destroy',$item->id)}}">
                                @csrf
                            @method('delete')
                            <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"> </i> Delete</button>
                        </form>
                       
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic example -->
@endsection


