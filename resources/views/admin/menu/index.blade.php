@extends('admin.master')
@section('content')
<div class="card border-top-primary border-bottom-0 rounded-0">
    <div class="page-header page-header-light">
          <div class="breadcrumb-line breadcrumb-line-light">
            <div class="breadcrumb breadcrumb-arrows">
                <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
                 <span class="breadcrumb-item active">Menus</span>
            </div>
        </div>
    </div>
</div>
{{-- @include('admin.alert') --}}
<div class="row">
    <div class="col-md-9">
    <!-- Basic example -->
    <div class="card">
        <div class="card-header">

             <h3 class="card-title title-text">
           <a href="{{route('menu.create')}}" class="btn btn-primary"> 
               Create </a> </h3>
        </div>
            
        <table class="table datatable-colvis-basic">
            <thead>
                <tr>
                    <td>S.N.</td>
                    <td>Title</td>
                    <td>Image</td>
                    <td>Submenu</td>
                     <td>Status</td>
                    <td>Operation</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($menus as $index=>$item)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td><a href="{{route('submenu.index',$item->id)}}"> {{ $item->title_en }}</a></td>
                        <td>@if($item->image!='')
                            <img src="{{asset('storage/images/'.$item->image)}}" height="50" width="50"> @endif
                        </td>
                           
                         <td> @foreach($item->children as $child)
                            <span style="display:inline-flex;"><a href="{{route('menu.edit',$child->id)}}">{{$child->title_en}} </a> <a onclick="return confirm('Are you sure ?')"  href="{{route('children.delete',$child->id)}}"> &nbsp;&nbsp;<i class="fa fa-trash text-danger"></i> </a></span><br/>
                         @endforeach</td>
                           <td><i class="fa-solid {{$item->status?'text-primary fa-check':'text-danger fa-xmark'}}" ></i></td>

                        <td style="display: flex;"><a href="{{ route('menu.edit', $item->id) }}" class="btn btn-primary"><i class="fa fa-edit"> </i> Edit</a> &nbsp;
                         <form method="POST" action="{{route('menu.destroy',$item->id)}}">
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
</div>
 <div class="col-md-3">
 <div class="card">
    <div class="card-header">Menu Order</div>
    <div class="card-body">
        <div class="box-body table-responsive">
             @if(count($menus) > 0)
        <form class="form-validate" method="POST" action="{{route('menu.reorder')}}">
            @csrf
               
               
                     <ul style="list-style:none;">
                        @foreach($menus as $menu)
                        <li id="{{$menu->id}}" > {{$menu->title_en}}
                           <input type="number" class="form-control" required min="0" name="position[]" value="{{$menu->position}}" style="width:80px;">
                           <input type="hidden" name="id[]" value="{{$menu->id}}">
                        </li><br/>
                        @endforeach
                    </ul>
                   
                    
                    <button type="submit" class="btn btn-primary" style="margin-left: 50px;">Reorder</button>
                </form>
                 @endif
                </div>
    </div>
    </div>
</div>
</div>
    <!-- /basic example -->
@endsection

