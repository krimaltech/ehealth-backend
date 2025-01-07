@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Individual Sample Collection</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Individual Sample Collection</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Family Name</th>
                        <th>Package</th>
                        <th>Screening</th>
                        <th>User</th>
                        <th>Assigned Lab User</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sample as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->familyname->family_name}}</td>
                            <td>{{$item->screeningdate->userpackage->package->package_type}}</td>
                            <td>{{$item->screeningdate->screening->screening}}</td>
                            <td>{{$item->medicalreport->members->user->name}}</td>
                            <td>{{$item->employee->user->name}}</td>
                            <td>
                                @if($item->collection_status == 0)
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sampleModalCenter_{{$item->id}}">
                                        <i class="icon-plus-circle2"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="sampleModalCenter_{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="sampleModalCenter_{{$item->id}}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add Sample Collected Date</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('individualSample.store',$item->id)}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="report" value="{{$item->medicalreport_id}}">
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label class="form-label">Sample Collected Date and Time<code>*</code></label>
                                                            <input id="sample_date" class="form-control" value="{{\Carbon\Carbon::now()->format('Y-m-d H:i:s')}}" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="form-label">Any information regarding sample collection<code>*</code></label>
                                                            <textarea name="sample_info" cols="30" rows="10" class="form-control summernote"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>    
                                @else
                                    <span class="badge badge-success">
                                        Sample Collected
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('custom-script')
<!-- Summernote -->
<script>
    $(function() {
        // Summernote
        $('.summernote').summernote()
    })
</script>
@endsection