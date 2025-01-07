@extends('admin.master')

@section('content') 
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card">
            <div class="card-header">
                <h6 style="font-weight:600">All Notifications</h6>
            </div>
            <div class="card-body px-0 pb-0">
                <ul class="media-list">
                    @foreach ($bookingNotification as $item)
                        @if($item->watched == 'unseen')
                        <li class="p-2 my-0" style="background-color: #ddd">
                            {{-- <div class="mr-3 position-relative">
                                <img src="" width="36" height="36" class="rounded-circle" alt="">
                            </div> --}}
                            <a href="{{route('notification.view',['type'=>$item->type,'id'=>$item->id])}}" class=" d-flex flex-nowrap">
                                <span class="mr-2">
                                    <i class="icon-circle"></i>
                                </span>
                                <div class="media-body">
                                    <div class="media-title">
                                        <span class="font-weight-semibold">{{$item->title}}</span>
                                        <span class="text-muted float-right font-size-sm">
                                            {{\Carbon\Carbon::parse($item->created_at)->format('d M')}} at {{\Carbon\Carbon::parse($item->created_at)->format('g:i A')}}
                                        </span>                                          
                                    </div>

                                    <span class="text-muted">{{$item->body}}</span>
                                </div>
                            </a>
                        </li>
                        @else
                        <li class=" p-2 my-0">
                            {{-- <div class="mr-3 position-relative">
                                <img src="" width="36" height="36" class="rounded-circle" alt="">
                            </div> --}}
                            <a href="{{route('notification.view',['type'=>$item->type,'id'=>$item->id])}}" class="d-flex flex-nowrap">
                                <span class="mr-2">
                                    <i class="icon-circle"></i>
                                </span>
                                <div class="media-body">
                                    <div class="media-title">
                                        <span class="font-weight-semibold">{{$item->title}}</span>
                                        <span class="text-muted float-right font-size-sm">
                                            {{\Carbon\Carbon::parse($item->created_at)->format('d M')}} at {{\Carbon\Carbon::parse($item->created_at)->format('g:i A')}}
                                        </span>                                          
                                    </div>

                                    <span class="text-muted">{{$item->body}}</span>
                                </div>
                            </a>
                        </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
