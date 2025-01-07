@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Enquiry</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Enquiry</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        @if(count($enquiry) == 0)
        <div class="card-header border-bottom">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#enquiryModalCenter">
                Add Enquiry Link
            </button>
            <!-- Modal -->
            <div class="modal fade" id="enquiryModalCenter" tabindex="-1" role="dialog" aria-labelledby="enquiryModalCenterTitle" aria-hidden="true">
                <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add Enquiry Link</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('enquiry.store')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Enquiry Google Form Link <code>*</code></label>
                                    <input type="url" class="form-control" name="form_link" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>                      
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Enquiry Links</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enquiry as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->form_link}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editEnquiryModalCenter_{{$item->id}}">
                                    <i class="icon-pen"></i>
                                </button>
                                <!-- Modal -->
                                <div class="modal fade" id="editEnquiryModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editEnquiryModalCenter_{{$item->id}}Title" aria-hidden="true">
                                    <div class="modal-sm modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Enquiry Link</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{route('enquiry.update',$item->id)}}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Enquiry Google Form Link <code>*</code></label>
                                                        <input type="url" class="form-control" name="form_link" value="{{$item->form_link}}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update changes</button>
                                                </div>
                                            </form>                      
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection