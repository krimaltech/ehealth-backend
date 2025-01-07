@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Nurse Shift</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Nurse Shift</span>
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
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#shiftModal">
            Choose Shift
        </button>
        <div class="modal fade" id="shiftModal" tabindex="-1" role="dialog" aria-labelledby="shiftModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="shiftModalLabel">Choose Shift</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form action="{{route('nurseshift.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="nurse_id" value="{{$nurse}}">
                        <div class="form-group">
                            <label for="">Choose Date</label>
                            <input type="date" name="date" class="form-control" min="<?php echo \Carbon\Carbon::now()->format('Y-m-d')?>" required>
                        </div>
                        <div class="form-group shift">
                            <label for="">Available Shift</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="radio" class="btn-check" name="shift" value="7 AM - 1 PM" id="primary-outlined1" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="primary-outlined1">7 AM - 1 PM</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="radio" class="btn-check" name="shift" value="1 PM - 7 PM" id="primary-outlined2" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="primary-outlined2">1 PM - 7 PM</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="radio" class="btn-check" name="shift" value="7 AM - 7 PM" id="primary-outlined3" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="primary-outlined3">7 AM - 7 PM</label>
                                </div>
                                <div class="col-md-3">
                                    <input type="radio" class="btn-check" name="shift" value="No Shift" id="primary-outlined4" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="primary-outlined4">No Shift</label>
                                </div>
                            </div>
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
    <div class="card-body">
        <table class="table table-bordered table-hover datatable-colvis-basic">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <th>Date</th>
                    <th>Shift</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shift as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->date}}</td>
                        <td>{{$item->shift}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection