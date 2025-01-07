@extends('admin.master')
@section('content')
    <div class="card border-top-primary border-bottom-0 rounded-0">
        <div class="page-header page-header-light">
            <div class="breadcrumb-line breadcrumb-line-light">
                <div class="breadcrumb breadcrumb-arrows">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
                    <a href="{{ route('news.index') }}" class="breadcrumb-item">News</a>
                    <span class="breadcrumb-item active">Video</span>
                </div>
            </div>
        </div>
    </div>
    {{-- @include('admin.alert') --}}
    <div class="card">
        <div class="card-header">
            <h3> <a class="btn btn-primary" href="{{ route('video.create', $news->id) }}">Create</a></h3>
        </div>
        <div class="row">
            @foreach ($videos as $index => $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="card" id="removing_{{ $item->id }}" style="width: 18rem;text-align: center;">
                        <p class="card-img-top"><iframe width="280" height="200"
                                src="https://www.youtube.com/embed/{{ $item->video }}?controls=0">
                            </iframe></p>

                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title_en }} <i
                                    class="fa-solid {{ $item->status ? 'text-primary fa-check' : 'text-danger fa-xmark' }}"></i>
                            </h5>

                            <a href="{{ route('video.edit', [$news->id, $item->id]) }}" class="btn btn-primary"><i
                                    class="fa fa-edit"> </i> Edit</a> &nbsp;
                            <button class="btn btn-danger" onclick="imagedelete({{ $item->id }})">
                                <i class="fa fa-trash"> </i> Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Basic example -->
    <!-- <div class="card">
                <div class="card-header">
                    <h3> <a class="btn btn-primary" href="{{ route('video.create', $news->id) }}">Create</a></h3>
                </div>
                <table class="table datatable-colvis-basic">
                    <thead>
                        <tr>
                            <td>S.N.</td>
                            <td>News</td>
                            <td>Caption</td>
                            <td>Video</td>
                            <td>Status</td>
                             <td>Operation</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $index => $item)
    <tr >
                                <td>{{ ++$index }}</td>
                                <td>{{ $item->news ? $item->news['title'] : '' }}</td>
                                <td>{{ $item->title }}</td>
                               <td>{!! $item->video !!}</td>
                                <td><i class="fa-solid {{ $item->status ? 'text-primary fa-check' : 'text-danger fa-xmark' }}" ></i></td>
                                <td >
                                    <a href="{{ route('video.edit', [$news->id, $item->id]) }}" class="btn btn-primary"><i class="fa fa-edit"> </i> Edit</a> &nbsp;
                                 <button class="btn btn-danger"  onclick="imagedelete({{ $item->id }})">
                                    <i class="fa fa-trash"> </i> Delete</button>
                            </td>
                            </tr>
    @endforeach
                    </tbody>
                </table>
            </div> -->


    <script>
        function imagedelete(id) {

            var deleteFile = confirm("Are you sure ?");
            if (deleteFile == true) {
                // AJAX request
                $.ajax({
                    url: "{{ route('video.destroy') }}",
                    type: 'delete',

                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id
                    },
                    success: function(data) {

                        $("#removing_" + data).css({
                            'display': 'none'
                        });
                    }
                });
            }

        }
    </script>
    <!-- /basic example -->
@endsection
