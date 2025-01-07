@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Package List</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Package List</span>
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
            {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Booked</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Activated</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Deactivated</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Not Booked</a>
                </li>
            </ul> --}}
            {{-- <form action="">
                <div class="form-group">
                    <label for="">Location</label>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <button type="sumbit" name="" class="btn btn-primary">Apply Filter</button>
                        </div>
                    </div>
                </div>
            </form> --}}
            <table class="table table-bordered table-hover datatable-colvis-basic">
                <thead>
                    <tr>
                        <th></th>
                        <th>S.N.</th>
                        <th>User</th>
                        <th>Phone No.</th>
                        <th>Email</th>
                        <th>Package</th>
                        <th>Booked Date</th>
                        <th>Package Status</th>
                        <th>Payment Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $item)
                    <tr>
                        <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{ $item->id }}"></td>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->user->member->name}}</td>
                        <td>{{$item->user->member->phone}}</td>
                        <td>{{$item->user->member->email}}</td>
                        <td>{{$item->package->package_type}}</td>
                        <td>{{$item->booked_date}}</td>
                        <td>{{$item->package_status}}</td>
                        @if($item->status == 0)
                        <td> 
                            <span class="badge text-danger">Payment Due</span>
                        </td>
                        @else
                        <td>
                            <span class="badge text-success">Paid</span>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="9">
                            <button class="btn btn-primary" id="screeningBtn">
                                Add Screening Date
                            </button>
                            <p id="errorMsg" class="text-danger d-none">Please select user packages to add screening date.</p>
                            <div class="modal fade" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="packageModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="packageModalTitle">Add Screening Date</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="" method="post" class="dateform">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Screening Date</label>
                                                <input type="date" name="screening_date" class="form-control" id="screening_date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                            </div>
                                            <input type="hidden" name="screening_id" value="1" id="screening_id">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                        </th>
                    </tr>                 
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        $(document).ready(function(){
            var allVals = [];
            $('#screeningBtn').on('click',function(){
                if ($('input:checkbox[name=ids]:checked').is(':checked', true)) {
                    $('#errorMsg').addClass('d-none');
                    $('#errorMsg').removeClass('d-block');
                    $("input:checkbox[name=ids]:checked").each(function() {
                        allVals.push($(this).val());
                        $('#packageModal').modal('show')
                    });
                }else{
                    $('#errorMsg').addClass('d-block');
                    $('#errorMsg').removeClass('d-none');
                }
            })
            $('.dateform').on('submit',function(e){
                e.preventDefault();
                var fd = new FormData();
                fd.append('ids',allVals);
                fd.append('screening_date', $("#screening_date").val());
                fd.append('screening_id',  $("#screening_id").val());
                $.ajax({
                    url: '{{route("userpackages.storeDate")}}',
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: fd,
                    success: function(data) {
                        $('#packageModal').modal('hide');
                        if(data.success){
                            swal({
                                title: 'Screening Date',
                                text: data.success,
                                icon: "success",
                                buttons: true,
                            })
                            .then((value) => {
                                if (value) {
                                    window.location.reload();                    
                                }
                            });
                        }
                    },
                });
            })
        })
        
    </script>
@endsection 