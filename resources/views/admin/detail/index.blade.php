@extends('admin.dashboard')
@section('content')
<div class="card border-top-primary border-bottom-0 rounded-0">
    <div class="page-header page-header-light">
          <div class="breadcrumb-line breadcrumb-line-light">
            <div class="breadcrumb breadcrumb-arrows">
                <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
                 <span class="breadcrumb-item active">Company Details</span>
            </div>
        </div>
    </div>
</div>
@include('admin.alert')

    <!-- Basic example -->
    <div class="card">
        <div class="card-header">

             <h3 class="card-title title-text">

               @if(count($details)<1)<a href="{{route('detail.create')}}" class="btn btn-primary"> 
               Create </a> @endif
           </h3>
        </div>
            
        <table class="table datatable-colvis-basic">
            <thead>
                <tr>
                    <td>S.N</td>
                    <td>Title</td>
                    <td>Logo</td>
                    <td>Phone</td>
                    <td>Email</td>
                    <td>Operation</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $index=>$item)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $item->title_en }}</td>
                        <td>@if($item->image!='')
                            <img src="{{asset('storage/images/'.$item->image)}}" height="50" width="50"> @endif
                        </td>
                           
                         <td>{{ $item->phone }}</td>
                         <td> {{ $item->email }}</td>
                          <td style="display: flex;"><a href="{{ route('detail.edit', $item->id) }}" class="btn btn-primary"><i class="fa fa-edit"> </i> Edit</a> &nbsp;
                           @if(count($details)>1) <form method="POST" action="{{route('detail.destroy',$item->id)}}">
                                @csrf
                            @method('delete')
                            <button onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"> </i> Delete</button>
                        </form>
                        @endif
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic example -->
@endsection


