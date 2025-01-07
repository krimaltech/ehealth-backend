@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">View</span> - My Package</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('userpackage.index') }}" class="breadcrumb-item">My Package</a>
                    <span class="breadcrumb-item active">View</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
<style>
    ol{
        padding-inline-start: 15px;
    }
</style>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <h4>1. Package Description</h4>
                <table class="table mt-3">
                    <tr>
                        <th>Package Type</th>
                        <td>{{$package->package->package_type}}</td>
                    </tr>
                    <tr>
                        <th>Description</th>
                        <td>{!!$package->package->description!!}</td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <p style="font-size:1.25rem">2. Payment Status: 
                        @if($package->status == 0)
                        <span class="badge badge-danger" style="font-size:1rem"> Pending</span>
                        @else
                        <span class="badge badge-success" style="font-size:1rem"> Completed</span>  
                        @endif     
                    </p>
                    @if($package->status == 0 && ($member->member_type == 'Primary Member'))
                    <div class="card">
                        <div class="card-body">
                            <h4 style="border-bottom:2px solid #063b9d">Pay for your package</h4>
                            <div class="my-4">
                                <h6>{{$package->package->package_type}}</h6>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                    Complete Payment
                                </button>
        
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Complete Payment</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{route('userpackage.payment',$package->slug)}}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="">Select Payment Interval</label>
                                                        <select name="payment_interval" id="" class="form-control">
                                                            <option value="" selected disabled>--Select Payment Interval--</option>
                                                            <option value="Monthly">Monthly</option>
                                                            <option value="Quarterly">Quarterly</option>
                                                            <option value="Half Yearly">Half Yearly</option>
                                                            <option value="Yearly">Yearly</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                      
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @if ($package->status == 1)
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>3. Booking Details</h4> 
                    <div id="donutchart" style="width: 250px"></div>
                    <table class="table my-3 table-bordered">
                        <tr>
                            <th>Payment Interval</th>
                            <td>{{$package->payment_interval}}</td>
                        </tr>
                        <tr>
                            <th>Booked Date</th>
                            <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($package->payment_date))->isoFormat('MMM Do YYYY (H:m A)') ?></td>
                        </tr>
                        <tr>
                            <th>Expiry Date</th>
                            <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($package->expiry_date))->isoFormat('MMM Do YYYY (H:m A)') ?></td>
                        </tr>
                        <tr>
                            <th>Remaining Days</th>
                            <td>
                                @if ($remaining <= 0 )                                
                                    0 days remaining <span class="text-danger">(Expired)</span>                                                             
                                @else
                                    {{$remaining}} days remaining
                                @endif
                            </td>  
                        </tr>
                    </table> 
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>4. Screening Details</h4> 
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table">
                                <tr>
                                    <th>Screening</th>
                                    <th>Screening Date</th>
                                </tr>
                                @foreach ($screenings as $key => $item)
                                    <tr>
                                        <td>{{$key}}</td>
                                        <td><?php echo \Carbon\Carbon::createFromTimeStamp(strtotime($item))->isoFormat('MMM Do YYYY') ?></td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection

@section('custom-script')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['Days', 'Value'],
      ['Remaining',     {{$remaining}}],
      ['Completed',     {{$completed}}],
    ]);

    var options = {
        title: 'Package Remaining Days',
        pieHole: 0.5,
        pieSliceBorderColor:'none',
        pieSliceText:'value',
        legend:'none',
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>
@endsection