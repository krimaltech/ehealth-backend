@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Activated (Add First Screening) Package List</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Activated (Add First Screening) Package List</span>
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
                    <div class="col-md-4">
                        <label for="">Location</label>
                        {{-- <input type="text" name="autocomplete" id="autocomplete" class="form-control" placeholder="Choose Location" required> --}}
                        <select id="searchSelect" class="form-control"></select>
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">
                    </div>
                    <div class="col-md-4">
                        <label for="">Packages</label>
                        <select name="package" class="form-control selectPackage" id="package">
                            <option value=""><--Select Package Type--></option>
                            @foreach ($allpackages as $item)
                            <option value="{{$item->id}}">{{$item->package_type}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="col-md-4">
                        <label for="">Date</label>
                        <input type="date" name="booked_date" class="form-control" placeholder="Booking Date" value="{{ $booked_date}}">
                    </div> --}}
                    
                    <div class="col-md-12 mt-2">
                        <button type="submit" id="apply" class="btn btn-primary">Apply Filter</button> <span class="error text-danger"></span>
                        <p class="text-danger mt-1 mb-0">* Apply filter to add first screening date and assign Diagnostic and Lab Team.</p>
                    </div>
                </div>
            </form>
        </div>
        @if(Request::get('latitude') || Request::get('longitude') || Request::get('package'))
        <div class="card-body">
            <table class="table table-bordered datatable-colvis-basic">
                <thead>
                    <tr>
                        <th></th>
                        <th>S.N.</th>
                        <th>Family Name</th>
                        <th>User</th>
                        <th>Package <br/> (Family Size)</th>
                        <th>Joined Date</th>
                        <th>Payment Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $item)
                        <tr>
                            <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{ $item->id }}"></td>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->familyname->family_name??""}}</td>
                            <td>{{$item->familyname->primary->member->name??""}}</td>
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
                            <td>
                                <a href="{{route('booked.show',$item->id)}}" class="btn btn-primary">
                                    <i class="icon-eye2"></i>
                                </a>
                            </td>
                        </tr>
                      
                    @endforeach
                </tbody>
                @if(count($packages) > 0)
                <tfoot>
                    <tr>
                        <th colspan="10">
                            <button class="btn btn-primary" id="screeningBtn">
                                Add Screening Date and Lab Team
                            </button>
                            <p id="errorMsg" class="text-danger d-none">Please select user packages to add screening date.</p>
                            <div class="modal fade" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="packageModalTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="packageModalTitle">Add Screening Date and Lab Team</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <form action="" method="post" class="dateform">
                                        @csrf
                                        {{-- <input type="hidden" name="consultation_type" value="0"  id="consultation_type"> --}}
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="">Screening Date</label>
                                                <input type="date" required name="screening_date" class="form-control" id="screening_date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                                <span class="text-danger">* Please select screening date for diagnostic and lab team list.</span>
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
                                                    {{-- <div class="col-md-3">
                                                        <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Nurses</span>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <select class="form-control select nurse_ids" id="nurseId" name="nurse_ids[]" multiple="multiple">
                                                        </select>
                                                    </div> --}}
                                                </div>
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
                @endif
            </table>
        </div>
        @else
        <div class="card-body">
            <table class="table table-bordered datatable-colvis-basic">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Family Name</th>
                        <th>User</th>
                        <th>Package (Family Size)</th>
                        <th>Joined Date</th>
                        <th>Payment Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->familyname->family_name??""}}</td>
                            <td>{{$item->familyname->primary->member->name??""}}</td>
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
                            <td>
                                <a href="{{route('booked.show',$item->id)}}" class="btn btn-primary">
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
    <script>
        $(document).ready(function(){
            var allVals = [];
            $('#screeningBtn').on('click',function(){
                allVals.length = 0;
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
                // fd.append('consultation_type', $("#consultation_type").val());
                fd.append('screening_id',  $("#screening_id").val());
                fd.append('lab_ids',  $(".lab_ids").val());
                // fd.append('nurse_ids',  $(".nurse_ids").val());
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
                                    var url = "{{ route('booked.index') }}";
                                    window.location.href = url;
                                }
                            });
                        }
                    },
                });
            })
            $('#screening_date').on('change', function() {
                let screening_date = $(this).val();
                $('.lab_ids').empty();
                // $('.nurse_ids').empty();
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
                        // response.nurse.forEach(element => {
                        //     $('.nurse_ids').append(
                        //         `<option value="${element.id}">${element.user.name}</option>`
                        //     );
                        // });
                    }
                });
            });
            $('#apply').on('click',function(e){
                e.preventDefault();
                let latitude = $('#latitude').val();
                let longitude = $('#longitude').val();
                let package = $('#package').val();
                if(latitude == '' && longitude == '' && package == '' ){
                    $('.error').text('* Please select at least one filter.');
                }else{
                    var currentUrl = window.location.pathname ;
                    var newUrl = currentUrl + `?latitude=${latitude}&longitude=${longitude}&package=${package}`;
                    window.location.href = newUrl;
                }
            })
        });
    </script>

@endsection 