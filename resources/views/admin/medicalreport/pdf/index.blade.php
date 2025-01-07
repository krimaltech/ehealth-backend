@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Generate Report PDF</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Generate Report PDF</span>
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
            <form action="{{route('reportPdf.generatePdf')}}"  method='post'>
                @csrf
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="">Patient Name</label>
                            <select name="member_id" id="member" class="form-control select-search selectUser" required>
                                <option value="" selected disabled>Select Patient</option>
                                @foreach ($members as $item)
                                    <option value="{{$item->id}}">{{$item->user->name}} | {{$item->user->phone}}</option>
                                @endforeach
                                {{-- @foreach ($reports as $key=>$value)
                                    @foreach ($value as $memberId=>$report)
                                        @foreach ($members as $item)
                                            @if($item->id == $memberId)
                                                <option value="{{$item->id}}">{{$item->user->name}} | {{$item->user->phone}}</option>
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endforeach --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 screening d-none">
                        <div class="form-group">
                            <label for="">Select Screening</label>
                            <select name="screening_id" class="form-control select-search selectScreening" required>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12 pdf d-none">
                        <button class="btn btn-primary">
                            Generate PDF
                        </button>
                    </div>
                </div>
            </form>
        </div>
        @if(count($pdf)>0)
        <div class="card-body">
            <h4 style="font-weight: 500">View Pathology Reports</h4 >
            @foreach ($pdf as $item)
                <a href="{{$item->report_path}}" target="_blank">{{$item->report}}</a><br>
            @endforeach
        </div>
        @endif
    </div>
@endsection

@section('custom-script')
    <script>
        $(document).ready(function(){
            $('.selectUser').on('change',function(){
                let member_id = $(this).val();
                $('.screening').removeClass('d-none');
                $('.screening').addClass('d-block');
                $('.pdf').removeClass('d-none');
                $('.pdf').addClass('d-block');
                $('.selectScreening').empty();
                $('.selectScreening').append('<option value="" selected disabled>--Select Screening--</option>');
                $.ajax({
                    type:'get',
                    url:'/admin/report-pdf/fetchscreening/'+ member_id,
                    success:function(res) {
                        //console.log(res);
                        $.each(res, function(key,value){
                            $('.selectScreening').append(
                                `<option value="${key}">${value}</option>`
                            );
                        });
                    }
                });
            })
        })
    </script>
@endsection