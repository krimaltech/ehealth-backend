@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Legal</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Legal</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="card-title">Legal</h3>
                </div>
                <div class="col-sm-6 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#countryModal">
                            <i class="icon-add"></i>Legal
                        </button>

                </div>
            </div>




            <!-- Button trigger modal -->


            <!-- Modal -->
            <div class="modal fade" id="countryModal" tabindex="-1" role="dialog" aria-labelledby="countryModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="countryModalLabel">Add Legal</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('termcondition.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Types<code>*</code></label>
                                            <input type="text" class="form-control" name="type" value="{{ old('type') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="details">Term of use<code>*</code></label>
                                            <textarea name="details" class="summernote1">{{ old('details') }}</textarea>
                                            @error('details')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            <label for="policy">Privacy Policy<code>*</code></label>
                                            <textarea name="policy" class="summernote1">{{ old('policy') }}</textarea>
                                            @error('policy')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>



                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary text-white">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Modal -->

        </div>
            <div class="card-body">

                <table class="table table-bordered table-hover datatable-colvis-basic">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Type</th> 
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($termcondition as $item)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$item->type}}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#modal_full_{{ $item->id }}"><i class="icon-database-edit2" aria-hidden="true"></i>
                                    Edit</button>
                                </td>
                                <div id="modal_full_{{ $item->id }}" class="modal fade" tabindex="-1">
                                    <div class="modal-dialog modal-lg modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Legal</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                    
                                            <form method="POST" action="{{ route('termcondition.update',$item->id) }}" class="form-horizontal"
                                                enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="id" value="{{ $item->id }}" />
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="modal-body">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="">Types<code>*</code></label>
                                                                    <input type="text" class="form-control" name="type" value="{{ $item->type }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="details">Term of use<code>*</code></label>
                                                                <textarea name="details" class="summernote">{{ $item->details }}</textarea>
                                                                @error('details')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                    
                                                            <div class="form-group">
                                                                <label for="policy">Privacy policy<code>*</code></label>
                                                                <textarea name="policy" class="summernote">{{ $item->policy }}</textarea>
                                                                @error('policy')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                    
                                                </div>
                                                <!-- /.card-body -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn bg-primary text-white">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </div>
    </div>
@endsection
@section('custom-script')
    @isset($termcondition)
    @else
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#countryModal').modal('show');
            });
        </script>
    @endisset
    <!-- Summernote -->
    <script>
        $(function() {
            // Summernote
            $('.summernote1').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic']], //Specific toolbar display
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
        })
    </script>

    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote({
                height: 300,
                toolbar: [
                    ['style', ['bold', 'italic']], //Specific toolbar display
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                ]
            });
        })
    </script>
@endsection
