@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Add Family</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('addfamily.index') }}" class="breadcrumb-item">Add Family</a>
                    <span class="breadcrumb-item active">Add</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        {{-- <div class="card-header border-bottom">
            <a href="{{ route('addfamily.create') }}" type="button" class="btn btn-primary">
                Add Family
            </a>
        </div> --}}
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Family Member Name</th>
                        <th>Phone No.</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($family as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user_1->member->name }}</td>
                        <td>{{ $item->user_1->member->phone }}</td>
                        <td>
                            @if ($item->rejected == 0)
                            <button id="approved-{{ $item->id }}"
                                onclick="verify('{{ $item->id }}')" class="btn btn-success btn-sm">Accept</button>
                            <button class="deleteRecord btn btn-danger btn-sm" data-id="{{ $item->id }}" >Reject</button>
                            @else
                            <span class="badge badge-pill badge-success">We Are Family Member</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Own Name</th>
                        <th>Family Member Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($family as $item)
                    @if (Auth::user()->id == $item->user_id || Auth::user()->id == $item->family_id)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user_1->name }}</td>
                        <td>{{ $item->user_2->name }}</td>
                        <td>
                            @if ($item->rejected == 0)
                            @if ($item->rejected == 0 && Auth::user()->id == $item->user_id)

                            @elseif ($item->rejected == 0 && Auth::user()->id != $item->user_id)
                            <button id="approved-{{ $item->id }}"
                                onclick="verify('{{ $item->id }}')" class="btn btn-success btn-sm">Accept</button>
                            @endif
                            <button class="deleteRecord btn btn-danger btn-sm" data-id="{{ $item->id }}" >Reject</button>
                            @else
                            <span class="badge badge-pill badge-success">We Are Family Member</span>
                            @endif
                        </td>
                    </tr>
                    @else
                        
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div> --}}
    </div>
@endsection
@section('custom-script')
<script>
    function verify(id) {
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: "{{ route('addfamily.approved') }}",
            type: "GET", //send it through get method
            data: {
                "id": id,
                "_token": token,
            },
            success: function(response) {
                window.location.reload();
            },
            error: function(xhr) {

            }
        });
    }
</script>
<script>
    $(".deleteRecord").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");

    $.ajax(
    {
        url: "addfamily/destroy/"+id,
        type: 'DELETE',
        data: {
            "id": id,
            "_token": token,
        },
        success: function (){
            window.location.reload();
        }
    });
   
});
</script>
@endsection