@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Activated Package List</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Activated Package List</span>
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
            <form action="">
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Location</label>
                        {{-- <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Choose Location" required> --}}
                        <select id="searchSelect" class="form-control"></select>
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                    </div>
                    <div class="col-md-3">
                        <label for="">Packages</label>
                        <select name="package" class="form-control selectPackage" id="package">
                            <option value=""><--Select Package Type--></option>
                            @foreach ($allpackages as $item)
                            <option value="{{$item->id}}">{{$item->package_type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Screening</label>
                        <select name="screening" class="form-control selectScreening" id="screening">
                            <option value=""><--Select Screening--></option>
                            @foreach ($allscreening as $item)
                            <option value="{{$item->id}}">{{$item->screening}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="">Lab Visit Date <code>*</code></label>
                        <input type="date" class="form-control" name="date" id="date" required>
                        {{-- <input type="date" class="form-control" name="date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required> --}}
                    </div>
                    
                    <div class="col-md-12 mt-2">
                        <button type="submit" id="apply" class="btn btn-primary">Apply Filter</button> <span class="error text-danger"></span>
                        <p class="text-danger mt-1 mb-0">* Apply filter to assign Diagnostic and Lab Team for follow up screening.</p>
                    </div>
                </div>
            </form>
        </div>
        @if(Request::get('latitude') || Request::get('longitude') || Request::get('package') || Request::get('screening') || Request::get('date') )
            <input type="hidden" name="screening_date" id="screening_date" value="{{Request::get('date')}}">
            <div class="card-body">
                <table class="table table-bordered table-hover datatable-colvis-basic">
                    <thead>
                        <tr>
                            <th></th>
                            <th>S.N.</th>
                            <th>Family Name</th>
                            <th>User</th>
                            <th>Package <br/>(Family Size)</th>
                            <th>Joined Date</th>
                            <th>Payment Status</th>
                            <th>Latest Screening</th>
                            <th>Lab Visit Date</th>
                            <th>Screening Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packages as $item)
                        <tr>
                            <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{ $item->id }}"></td>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->familyname->family_name}}</td>
                            <td>{{$item->familyname->primary->member->name}}</td>
                            <td>{{$item->package->package_type??''}} <br/>
                                @if($item->familyname != null )
                                    @if($item->package_id != 10)
                                    (
                                        {{$item->familyname->family->count() + 1}} 
                                        {{$item->familyname->family->count()+1 > 1  ? 'members' : 'member'}}
                                    )
                                    @else
                                    (
                                        {{$item->familyname->family->count()}} 
                                        {{$item->familyname->family->count() > 1  ? 'members' : 'member'}}
                                    )
                                    @endif
                                @else
                                (
                                    1 member
                                )
                                @endif
                            </td>
                            <td>{{$item->booked_date}}</td>
                            @if($item->status == 0)
                            <td> 
                                <span class="badge text-danger">Payment Due</span>
                            </td>
                            @else
                            <td>
                                <span class="badge text-success">Completed</span>
                            </td>
                            @endif
                            <td><span style="background-color:{{$item->dates->last()->screening->color}}" class="p-1 rounded">{{$item->dates->last()->screening->screening}}</span></td>
                            <td>{{$item->dates->last()->screening_date}}</td>
                            <td>
                                @if($item->dates->last()->status == 'Pending') 
                                    <span class="badge badge-warning">
                                        In Progress 
                                    </span> 
                                @elseif($item->dates->last()->status == 'Completed') 
                                    <span class="badge badge-success">
                                        {{$item->dates->last()->status}} 
                                    </span> 
                                @else
                                    <span class="badge badge-warning">
                                        {{$item->dates->last()->status}} 
                                    </span> 
                                @endif
                            </td>
                            <td>
                                <a href="{{route('activated.show',$item->id)}}" class="btn btn-primary">
                                    <i class="icon-eye2"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="11">
                                <button class="btn btn-primary" id="assignLabBtn">
                                    Assign Lab Team
                                </button>
                                <p id="errorMsg" class="text-danger d-none">Please select user packages to assign lab team.</p>
                                <div class="modal fade" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="packageModalTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="packageModalTitle"> Assign Lab Team</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <form action="" method="post" class="dateform">
                                            @csrf
                                            <input type="hidden" name="consultation_type" value="0" id="consultation_type">
                                            <input type="hidden" name="screening_id" value="{{Request::get('screening')}}" id="screening_id">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="">Date</label>
                                                    <input type="text" required class="form-control" id="" value="{{Request::get('date')}}" disabled>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Diagnostic and Lab Team</label>
                                                    <div class="row align-items-center">
                                                        <div class="col-md-4">
                                                            <span class="badge badge-light p-2  w-100 text-left" style="font-size:13px">Lab Technician/GD Nurse</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <select class="lab_ids form-control select" name="lab_ids[]" multiple="multiple" required>
                                                            </select>
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
                            </th>
                        </tr>                 
                    </tfoot>
                </table>
            </div>
        @else
            <div class="card-body">
                <table class="table table-bordered table-hover datatable-colvis-basic">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Family Name</th>
                            <th>User</th>
                            <th>Package <br/>(Family Size)</th>
                            <th>Joined Date</th>
                            <th>Payment Status</th>
                            <th>Latest Screening</th>
                            <th>Lab Visit Date and Time</th>
                            <th>Screening Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packages as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>
                                @if($item->dates->last()->reschedule_status == 1)
                                    <span class="badge badge-warning mr-2">
                                        <i class="icon-calendar"></i>
                                    </span>
                                @endif
                                {{$item->familyname->family_name}}
                            </td>
                            <td>{{$item->familyname->primary->member->name}}</td>
                            <td>{{$item->package->package_type??''}} <br/>
                                @if($item->familyname != null )
                                    @if($item->package_id != 10)
                                    (
                                        {{$item->familyname->family->count() + 1}} 
                                        {{$item->familyname->family->count()+1 > 1  ? 'members' : 'member'}}
                                    )
                                    @else
                                    (
                                        {{$item->familyname->family->count()}} 
                                        {{$item->familyname->family->count() > 1  ? 'members' : 'member'}}
                                    )
                                    @endif
                                @else
                                (
                                    1 member
                                )
                                @endif
                            </td>
                            <td>{{$item->booked_date}}</td>
                            @if($item->status == 0)
                            <td> 
                                <span class="badge text-danger">Payment Due</span>
                            </td>
                            @else
                            <td>
                                <span class="badge text-success">Completed</span>
                            </td>
                            @endif
                            <td><span style="background-color:{{$item->dates->last()->screening->color}}" class="p-1 rounded">{{$item->dates->last()->screening->screening}}</span></td>
                            <td>
                                {{$item->dates->last()->screening_date}}
                                @if($item->dates->last()->screening_time == null)
                                    @if(count($item->dates->last()->employees) != 0 && $item->screening_time == null)
                                    <!-- Modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#screeningTimeCenter_{{$item->dates->last()->id}}">
                                        Update Lab Screening Time
                                    </button>
                                    <div class="modal fade" id="screeningTimeCenter_{{$item->dates->last()->id}}" tabindex="-1" role="dialog" aria-labelledby="screeningTimeCenter_{{$item->dates->last()->id}}Title" aria-hidden="true">
                                        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Lab Screening Time</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <form action="{{route('pending.screeningtime',$item->dates->last()->id)}}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Screening Time</label>
                                                            <input type="time" name="screening_time" class="form-control">
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
                                    @endif
                                @else
                                    {{$item->dates->last()->screening_time}}
                                @endif
                            
                            </td>

                            <td>
                                @if($item->dates->last()->status == 'Pending') 
                                    <span class="badge badge-warning">
                                        In Progress 
                                    </span> 
                                @elseif($item->dates->last()->status == 'Doctor Visit') 
                                    <span class="badge badge-warning">
                                        {{$item->dates->last()->status}} 
                                    </span> 
                                    @if($item->dates->last()->doctorvisit_time == null)
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#screeningTimeCenter_{{$item->dates->last()->id}}">
                                            Update Home Visit Time
                                        </button>
                                        <div class="modal fade" id="screeningTimeCenter_{{$item->dates->last()->id}}" tabindex="-1" role="dialog" aria-labelledby="screeningTimeCenter_{{$item->dates->last()->id}}Title" aria-hidden="true">
                                            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLongTitle">Update Home Visit Time</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <form action="{{route('activated.doctorTime',$item->dates->last()->id)}}" method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Home Visit Time</label>
                                                            <input type="time" name="doctorvisit_time" class="form-control">
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
                                    @endif
                                @elseif($item->dates->last()->status == 'Completed') 
                                    <span class="badge badge-success">
                                        {{$item->dates->last()->status}} 
                                    </span> 
                                @else
                                    <span class="badge badge-warning">
                                        {{$item->dates->last()->status}} 
                                    </span> 
                                @endif
                           </td>
                            <td>
                                <a href="{{route('activated.show',$item->id)}}" class="btn btn-primary">
                                    <i class="icon-eye2"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection

@section('custom-script')
    {{-- <script type="text/javascript"
    src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&libraries=places" ></script>
    <script>
        google.maps.event.addDomListener(window, 'load', initialize);
  
        function initialize() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input, {
                componentRestrictions: { country: ["NP"] },
                fields: ["address_components", "geometry"],
            });
  
            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                $('#latitude').val(place.geometry['location'].lat());
                $('#longitude').val(place.geometry['location'].lng());
            });
        }
    </script> --}}
    <script>
        $(document).ready(function() {
            const searchSelect = $('#searchSelect');
            const apiKey = "{{ env('GEOAPIFY_API_KEY') }}";

            searchSelect.select2({
                placeholder: 'Search...',
                ajax: {
                    url: 'https://api.geoapify.com/v1/geocode/autocomplete',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            text: params.term,
                            apiKey: apiKey,
                            filter: 'countrycode:np',
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data.features.map(feature => ({
                                id: JSON.stringify(feature),
                                text: feature.properties.formatted
                            }))
                        };
                    },
                    cache: true
                },
                minimumInputLength: 2
            });

            searchSelect.on('select2:select', function(event) {
                const selectedFeature = JSON.parse(event.params.data.id);
                console.log(selectedFeature);
                $('#latitude').val(selectedFeature.properties.lat);
                $('#longitude').val(selectedFeature.properties.lon);
            });

            searchSelect.on('input', function(event) {
                const searchTerm = event.target.value.trim();
                if (searchTerm.length > 0) {
                    searchSelect.select2('open');
                    searchSelect.select2('search', searchTerm);
                }
            });
        });
    </script>
    {{-- <script>
        $(document).ready(function(){
            $('.selectPackage').change(function(){
                let package = $(this).val();
                $.ajax({
                    url: "{{ route('getScreening') }}",
                    type: 'get',
                    cache: false,
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        package_id: package
                    },
                    success: function(response) {
                        //console.log(response);  
                        $('.selectScreening').empty();
                        $('.selectScreening').append(`<option value=""><--Select Screening--></option>`);                  
                        response.forEach(element => {
                            $('.selectScreening').append(
                                `<option value="${element.screening_id}">${element.screening.screening}</option>`
                            );
                        });
                    }
                });
            })
        })
    </script> --}}
    <script>
         $(document).ready(function(){
            var allVals = [];
            $('#assignLabBtn').on('click',function(){
                allVals.length = 0;
                if ($('input:checkbox[name=ids]:checked').is(':checked', true)) {
                    $('#errorMsg').addClass('d-none');
                    $('#errorMsg').removeClass('d-block');
                    $("input:checkbox[name=ids]:checked").each(function() {
                        allVals.push($(this).val());
                        $('#packageModal').modal('show')
                    });
                    let screening_date = $('#screening_date').val();
                    $('.lab_ids').empty();
                    $.ajax({
                        url: "{{ route('getpackage.employee') }}",
                        type: 'post',
                        cache: false,
                        dataType: 'json',

                        data: {
                            "_token": "{{ csrf_token() }}",
                            screening_date: screening_date
                        },
                        success: function(response) {
                            //console.log(response);                        
                            response.lab.forEach(element => {
                                $('.lab_ids').append(
                                    `<option value="${element.id}">${element.user.name} (${element.subrole.subrole})</option>`
                                );
                            });
                        }
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
                fd.append('consultation_type', $("#consultation_type").val());
                fd.append('screening_id',  $("#screening_id").val());
                fd.append('lab_ids',  $(".lab_ids").val());
                $.ajax({
                    url: '{{route("userpackages.storeDate")}}',
                    type: 'POST',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: fd,
                    success: function(data) {
                        //console.log(data);
                        $('#packageModal').modal('hide');
                        if(data.success){
                            swal({
                                title: 'Screening Details',
                                text: data.success,
                                icon: "success",
                            })
                            .then((value) => {
                                if (value) {
                                    var url = "{{ route('activated.index') }}";
                                    window.location.href = url;                   
                                }
                            });
                        }
                    },
                });
            })
            // $('#apply').on('click',function(e){
            //     e.preventDefault();
            //     let latitude = $('#latitude').val();
            //     let longitude = $('#longitude').val();
            //     let package = $('#package').val();
            //     let screening = $('#screening').val();
            //     let date = $('#date').val();
            //     if(latitude == '' && longitude == '' && package == '' && screening == '' && date == '' ){
            //         $('.error').text('* No filters applied. You must apply lab visit date filter.');
            //     }else{
            //         var currentUrl = window.location.pathname ;
            //         var newUrl = currentUrl + `?latitude=${latitude}&longitude=${longitude}&package=${package}&screening=${screening}&date=${date}`;
            //         window.location.href = newUrl;
            //     }
            // })
        })
    </script>
@endsection
