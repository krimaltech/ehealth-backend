@extends('admin.dashboard')
@section('content')
<div class="card border-top-primary border-bottom-0 rounded-0">
    <div class="page-header page-header-light">
          <div class="breadcrumb-line breadcrumb-line-light">
            <div class="breadcrumb breadcrumb-arrows">
                <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
            <a href="{{route('contact.index')}}" class="breadcrumb-item">Contact Message</a>

                 <span class="breadcrumb-item active">Contact Message Details</span>
            </div>
        </div>
    </div>
</div>
<div class="card" style=" width: 50%;">
        <div class="card-body">
            <span><b>Name:</b> {{$contact->name}}</span><br/>
            <span><b>Email:</b> {{$contact->email}}</span><br>
            <span><b>Phone:</b> {{$contact->phone}}</span><br>
            <span><b>Address:</b>{{$contact->address}}</span><br/>
            <span><b>Message:</b><br/>

            <p>{{$contact->description}}</p>
        </div>
    </div>
    <!-- /basic example -->
@endsection


