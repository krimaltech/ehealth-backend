@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Screening Consultation Package List</span></h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <span class="breadcrumb-item active">Screening Consultation Package List</span>
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
                        <label for="">Lab Visit Date</label>
                        <input type="date" class="form-control" name="date" id="date">
                        {{-- <input type="date" class="form-control" name="date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}" required> --}}
                    </div>
                    
                    <div class="col-md-12 mt-2">
                        <button type="submit" id="apply" class="btn btn-primary">Apply Filter</button> <span class="error text-danger"></span>
                        <p class="text-danger mt-1 mb-0">* Apply filter to assign Doctor and Advisors Team.</p>
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
                            <td><input type="checkbox" name="ids" class="checkBoxClass" value="{{ $item->id }}" data-id="{{$item->dates->last()->id}}"></td>
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
                                @if($item->dates->last()->status == 'Completed') 
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
                                <a href="{{route('consultant.show',$item->id)}}" class="btn btn-primary">
                                    <i class="icon-eye2"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @if(count($packages) > 0)
                        <tfoot>
                            <tr>
                                <th colspan="11">
                                    <button class="btn btn-primary" id="screeningBtn">
                                        Add Doctor and Advisors Team
                                    </button>
                                    <p id="errorMsg" class="text-danger d-none">Please select user packages to assign Doctor and Advisors Team.</p>
                                    <div class="modal fade" id="packageModal" tabindex="-1" role="dialog" aria-labelledby="packageModalTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="packageModalTitle">Add Doctor and Advisors Team</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <form action="" method="post" class="dateform">
                                                @csrf
                                                <div class="modal-body">
                                                    {{-- <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Package Type</label>
                                                                <input type="text" required class="form-control" id="" value="{{$packageinput->package_type}}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="">Screening</label>
                                                                <input type="text" required class="form-control" id="" value="{{$screeninginput->screening}}" disabled>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    <div class="form-group visitDate">
                                                        <label for="">Doctor Visit Date</label>
                                                        <input type="date" name="doctorvisit_date" class="form-control" id="doctorvisit_date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                                        <span class="text-danger">* Please select doctor visit date for doctor and advisors list.</span>
                                                    </div>
                                                    <div class="form-group physicalTeam">
                                                        <label for="">Doctor and Advisors Team</label>
                                                        <div class="row align-items-center">
                                                            <div class="col-md-3">
                                                                <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Doctor/Counselor</span>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select multiple class="form-control select doctor_ids" name="doctor_ids[]" >
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Dentist</span>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select multiple class="form-control select dentist_ids" name="dentist_ids[]" >
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Dietician</span>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select multiple class="form-control select dietician_ids" name="dietician_ids[]" >
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Ophthalmologist</span>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select multiple class="form-control select ophthalmologist_ids" name="ophthalmologist_ids[]" >
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Nurse</span>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select multiple class="form-control select nurse_ids" name="nurse_ids[]" >
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Fitness Trainer</span>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select multiple class="form-control select fitness_ids" name="fitness_ids[]" >
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>   

                                                    {{--comment because of changes in doctor consultation as online consultation was removed--}}
                                                    {{-- <div class="form-group">
                                                        <label for="">Consultation Type</label>
                                                        <select name="consultation_type" id="consultationType" class="form-control" disabled>
                                                            <option value="{{$type->consultation_type}}">
                                                                @if($type->consultation_type == 1)
                                                                    Physical Consultation
                                                                @endif
                                                                @if($type->consultation_type == 2)
                                                                    Online Consultation
                                                                @endif
                                                            </option>
                                                        </select>
                                                    </div> --}}
                                                    {{--Online Consultation--}}
                                                    {{-- <div class="form-group onlineDate" style="display:none">
                                                        <label for="">Online Doctor Consultation Date</label>
                                                        <input type="date" name="online_date" class="form-control" id="online_date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                                        <span class="text-danger">* Please select online doctor consultation date for doctors list.</span>
                                                    </div>
                                                    <div class="form-group onlineTeam" style="display:none">
                                                        <label for="">Doctor and Advisors Team</label>
                                                        <div class="row align-items-center">
                                                            <div class="col-md-3">
                                                                <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Doctor/Counselor</span>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select class="form-control doctor_id" name="doctor_id">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                    {{--Physical Consultation--}}
                                                    {{-- <div class="form-group visitDate" style="display:none">
                                                        <label for="">Doctor Visit Date</label>
                                                        <input type="date" name="doctorvisit_date" class="form-control" id="doctorvisit_date" min="{{\Carbon\Carbon::now()->format('Y-m-d')}}">
                                                        <span class="text-danger">* Please select doctor visit date for doctor and advisors list.</span>
                                                    </div>
                                                    <div class="form-group physicalTeam" style="display:none">
                                                        <label for="">Doctor and Advisors Team</label>
                                                        <div class="row align-items-center">
                                                            <div class="col-md-3">
                                                                <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Doctor/Counselor</span>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select multiple class="form-control select doctor_ids" name="doctor_ids[]" >
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Dentist</span>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select multiple class="form-control select dentist_ids" name="dentist_ids[]" >
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Dietician</span>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select multiple class="form-control select dietician_ids" name="dietician_ids[]" >
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Ophthalmologist</span>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select multiple class="form-control select ophthalmologist_ids" name="ophthalmologist_ids[]" >
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Nurse</span>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select multiple class="form-control select nurse_ids" name="nurse_ids[]" >
                                                                </select>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <span class="badge badge-light p-2 w-100 text-left" style="font-size:13px">Fitness Trainer</span>
                                                            </div>
                                                            <div class="col-md-9">
                                                                <select multiple class="form-control select fitness_ids" name="fitness_ids[]" >
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div> --}}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save and Forward Report</button>
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
                            <th>Lab Visit Date</th>
                            <th>Screening Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packages as $item)
                        <tr>
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
                                @if($item->dates->last()->status == 'Completed') 
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
                                <a href="{{route('consultant.show',$item->id)}}" class="btn btn-primary">
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
    {{-- google map
    <script type="text/javascript"
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
                            // type: 'locality',
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
            var dateVals = [];
            $('#screeningBtn').on('click',function(){
                allVals.length = 0;
                dateVals.length = 0;
                if ($('input:checkbox[name=ids]:checked').is(':checked', true)) {
                    $('#errorMsg').addClass('d-none');
                    $('#errorMsg').removeClass('d-block');
                    $("input:checkbox[name=ids]:checked").each(function() {
                        allVals.push($(this).val());
                        dateVals.push($(this).attr('data-id'));
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
                fd.append('screeningdateids',dateVals);
                fd.append('doctorvisit_date', $("#doctorvisit_date").val());
                fd.append('doctor_ids',  $(".doctor_ids").val());
                fd.append('dentist_ids',  $(".dentist_ids").val());
                fd.append('dietician_ids',  $(".dietician_ids").val());
                fd.append('ophthalmologist_ids',  $(".ophthalmologist_ids").val());
                fd.append('nurse_ids',  $(".nurse_ids").val());
                fd.append('fitness_ids',  $(".fitness_ids").val());

                // comment because of changes in doctor consultation as online consultation was removed
                // fd.append('consultation_type', $("#consultationType").val());
                // fd.append('online_date', $("#online_date").val());
                // fd.append('doctor_id',  $(".doctor_id").val());
                
                $.ajax({
                    url: '{{route("userpackages.storeConsultantDate")}}',
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
                                    var url = "{{ route('consultant.index') }}";
                                    window.location.href = url;                  
                                }
                            });
                        }
                    },
                });
            })

            $('#doctorvisit_date').on('change', function() {
                let doctorvisit_date = $(this).val();
                $('.doctor_ids').empty();
                $('.dentist_ids').empty();
                $('.dietician_ids').empty();
                $('.ophthalmologist_ids').empty();
                $('.fitness_ids').empty();
                $('.nurse_ids').empty();
                $.ajax({
                    url: "{{ route('getpackage.consultantEmployee') }}",
                    type: 'post',
                    cache: false,
                    dataType: 'json',

                    data: {
                        "_token": "{{ csrf_token() }}",
                        screening_date: doctorvisit_date
                    },
                    success: function(response) {
                        //console.log(response); 
                        response.doctor.forEach(element => {
                            $('.doctor_ids').append(
                                `<option value="${element.id}">${element.user.name}</option>`
                            );
                        });
                        response.dentist.forEach(element => {
                            $('.dentist_ids').append(
                                `<option value="${element.id}">${element.user.name}</option>`
                            );
                        });
                        response.dietician.forEach(element => {
                            $('.dietician_ids').append(
                                `<option value="${element.id}">${element.user.name}</option>`
                            );
                        });
                        response.eye.forEach(element => {
                            $('.ophthalmologist_ids').append(
                                `<option value="${element.id}">${element.user.name}</option>`
                            );
                        });
                        response.fitness.forEach(element => {
                            $('.fitness_ids').append(
                                `<option value="${element.id}">${element.user.name}</option>`
                            );
                        });
                        response.nurse.forEach(element => {
                            $('.nurse_ids').append(
                                `<option value="${element.id}">${element.user.name}</option>`
                            );
                        });
                    }
                });
            });

            $('#apply').on('click',function(e){
                e.preventDefault();
                let latitude = $('#latitude').val();
                let longitude = $('#longitude').val();
                let package = $('#package').val();
                let screening = $('#screening').val();
                let date = $('#date').val();
                if(latitude == '' && longitude == '' && package == '' && screening == '' && date == '' ){
                    $('.error').text('* Please select at least one filter.');
                }else{
                    var currentUrl = window.location.pathname ;
                    var newUrl = currentUrl + `?latitude=${latitude}&longitude=${longitude}&package=${package}&screening=${screening}&date=${date}`;
                    window.location.href = newUrl;
                }
            })

            // comment because of changes in doctor consultation as online consultation was removed
            // $('#online_date').on('change', function() {
            //     let online_date = $(this).val();
            //     $('.doctor_id').empty();
            //     $.ajax({
            //         url: "{{ route('getpackage.consultantEmployee') }}",
            //         type: 'post',
            //         cache: false,
            //         dataType: 'json',

            //         data: {
            //             "_token": "{{ csrf_token() }}",
            //             screening_date: online_date
            //         },
            //         success: function(response) {
            //             $('.doctor_id').append(`<option value="" selected disabled>---Select Doctor/Counselor---</option>`);
            //             response.doctor.forEach(element => {
            //                 $('.doctor_id').append(
            //                     `<option value="${element.id}">${element.user.name}</option>`
            //                 );
            //             });
            //         }
            //     });
            // });

            // comment because of changes in doctor consultation as online consultation was removed
            // $('#packageModal').on('shown.bs.modal', function () {
            //     if($('#consultationType').val()){
            //         let type = $('#consultationType').val();
            //         if(type == 1){
            //             $('.physicalTeam').css('display','block');
            //             $('.visitDate').css('display','block');
            //             $('.onlineDate').css('display','none');
            //             $('.onlineTeam').css('display','none');   
            //             $('#doctorvisit_date').attr('required',true);  
            //             $('.physicalTeam').find('select').attr('required',true);                       
            //             $('#online_date').val('');  
            //             $('.doctor_id').val(''); 
            //             $('#online_date').attr('required',false);  
            //             $('.doctor_id').attr('required',false);                                  
            //         }else if(type == 2){
            //             $('.onlineTeam').css('display','block');
            //             $('.onlineDate').css('display','block');
            //             $('.visitDate').css('display','none');
            //             $('.physicalTeam').css('display','none');
            //             $('#online_date').attr('required',true);
            //             $('.doctor_id').attr('required',true);
            //             $('#doctorvisit_date').val('');  
            //             $('.physicalTeam').find('select').empty(); 
            //             $('#doctorvisit_date').attr('required',false);  
            //             $('.physicalTeam').find('select').attr('required',false);                     
            //         }
            //     }
            // })
            
            // comment because of changes in doctor consultation as online consultation was removed
            // $('#consultationType').on('change',function(){
            //     let type = $(this).val();
            //     if(type == 0){
            //         $('.physicalTeam').css('display','block');
            //         $('.visitDate').css('display','block');
            //         $('.onlineDate').css('display','none');
            //         $('.onlineTeam').css('display','none');   
            //         $('#doctorvisit_date').attr('required',true);  
            //         $('.physicalTeam').find('select').attr('required',true);                       
            //         $('#online_date').val('');  
            //         $('.doctor_id').val(''); 
            //         $('#online_date').attr('required',false);  
            //         $('.doctor_id').attr('required',false);                                  
            //     }else if(type == 1){
            //         $('.onlineTeam').css('display','block');
            //         $('.onlineDate').css('display','block');
            //         $('.visitDate').css('display','none');
            //         $('.physicalTeam').css('display','none');
            //         $('#online_date').attr('required',true);
            //         $('.doctor_id').attr('required',true);
            //         $('#doctorvisit_date').val('');  
            //         $('.physicalTeam').find('select').empty(); 
            //         $('#doctorvisit_date').attr('required',false);  
            //         $('.physicalTeam').find('select').attr('required',false);                     
            //     }
            // })
        });
    </script>

@endsection 