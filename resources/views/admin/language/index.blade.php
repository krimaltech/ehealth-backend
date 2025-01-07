@extends('admin.dashboard')
@section('content')
<div class="card border-top-primary border-bottom-0 rounded-0">
    <div class="page-header page-header-light">
          <div class="breadcrumb-line breadcrumb-line-light">
            <div class="breadcrumb breadcrumb-arrows">
                <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
                 <span class="breadcrumb-item active">Languages</span>
            </div>
        </div>
    </div>
</div>
@include('admin.alert')

    <!-- Basic example -->
    <div class="card">
        <div class="card-header">
             <h3 class="card-title title-text">

                <a href="{{route('language.create')}}" class="btn btn-primary"> 
               Create </a> </h3>
        </div>
            
        <table class="table datatable-colvis-basic">
            <thead>
                <tr>
                    <td>S.N</td>
                    <td>Language</td>
                    <td>Code</td>
                    <td>Flag</td>
                    <td>Status</td>
                    <td>Operation</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($languages as $index=>$item)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $item->language }}</td>
                        <td>{{ $item->code }}</td>
                        <td>@if($item->image!='')
                            <img src="{{asset('storage/images/'.$item->image)}}" height="50" width="50"> @endif</td>
                           <td><i class="fa-solid {{$item->status?'fa-check':'fa-xmark'}}" ></i></td>
                        <td style="display: flex; "><a href="{{ route('language.edit', $item->id) }}" class="btn btn-primary"><i class="fa fa-edit"> </i> Edit</a> &nbsp;
                            <form method="POST" action="{{route('language.destroy',$item->id)}}">
                                @csrf
                            @method('delete')
                            <button @if($item->code=='en') disabled @endif onclick="return confirm('Are you sure ?')" type="submit" class="btn btn-danger"><i class="fa fa-trash"> </i> Delete</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /basic example -->
@endsection


