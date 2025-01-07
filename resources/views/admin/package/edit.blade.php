@extends('admin.master')
@section('header')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-lg-inline">
            <div class="page-title d-flex">
                <h4><i class="icon-arrow-left52 mr-2"></i> <span class="font-weight-semibold">Edit</span> - {{$package->package_type}}</h4>
                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>

        <div class="breadcrumb-line breadcrumb-line-light header-elements-lg-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                    <a href="{{ route('package.index') }}" class="breadcrumb-item">Package</a>
                    <span class="breadcrumb-item active">Edit</span>
                </div>

                <a href="#" class="header-elements-toggle text-body d-lg-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->
@endsection

@section('content')
    <style>
        .alert {
            padding-top: 2px;
            padding-bottom: 2px;
        }
    </style>
     <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="packages-tab" data-toggle="tab" href="#packages" role="tab" aria-controls="packages" aria-selected="true">Package Details</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="seo-tab" data-toggle="tab" href="#seo" role="tab" aria-controls="seo" aria-selected="false">SEO</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="packages" role="tabpanel" aria-labelledby="packages-tab">
                    <form method="POST" action="{{ route('package.update',$package->slug) }}" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Package Name<code>*</code></label>
                                    <input type="text" class="form-control" name="package_type" id="package_type" value="{{ $package->package_type }}">
                                    @error('package_type')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Slug<code>*</code></label>
                                    <input type="text" class="form-control" name="slug" id="slug" value="{{ $package->slug }}">
                                    <span id="result"></span>
                                    @error('slug')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            @if($package->visits == null)
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">No. of visits<code>*</code></label>
                                    <input type="number" class="form-control" name="visits" value="{{ $package->visits }}">
                                    @error('visits')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            @else
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">No. of visits<code>*</code></label>
                                    <input type="number" class="form-control" name="visits" value="{{ $package->visits }}" readonly>
                                    @error('visits')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            @endif
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Package Type <code>*</code></label>
                                    <select name="type" id="" class="form-control">
                                        <option value="" selected disabled>--Select Package Type--</option>
                                        <option value="1" @if($package->type == '1') selected @endif>Budget Package</option>
                                        <option value="2" @if($package->type == '2') selected @endif>Premium Package</option>
                                        <option value="3" @if($package->type == '3') selected @endif>Corporate Package</option>
                                        <option value="4" @if($package->type == '4') selected @endif>School Package</option>
                                    </select>
                                    @error('visits')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Registration fee</label>
                                    <input type="text" class="form-control" name="registration_fee" value="{{ $package->registration_fee }}">
                                    @error('registration_fee')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Monthly Fee</label>
                                    <input type="text" class="form-control" name="monthly_fee" value="{{ $package->monthly_fee }}">
                                    @error('monthly_fee')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">No. of tests</label>
                                    <input type="number" class="form-control" name="tests" value="{{ $package->tests }}">
                                    @error('tests')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-label">Order (in number)</label>
                                    <input type="number" class="form-control" name="order" value="{{$package->order}}">
                                    @error('order')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description">Package Description<code>*</code></label>
                                    <textarea name="description" class="summernote" cols="30" rows="10">{{$package->description}}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h6 style="font-weight:600">Services</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Pathological Screening<code>*</code></label> <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="screening1" name="screening" value="1" {{$package->screening == '1'? 'checked' : ''}}>
                                            <label class="form-check-label" for="screening1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="screening2" name="screening" value="0" {{$package->screening == '0'? 'checked' : ''}}>
                                            <label class="form-check-label" for="screening2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Medical Checkup<code>*</code></label> <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="medicalcheckup1" name="checkup" value="1" {{$package->checkup == '1' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="medicalcheckup1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="medicalcheckup2" name="checkup" value="0" {{$package->checkup == '0' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="medicalcheckup2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Free Ambulance Service<code>*</code></label> <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="ambulance1" name="ambulance" value="1" {{$package->ambulance == '1' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="ambulance1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="ambulance2" name="ambulance" value="0" {{$package->ambulance == '0' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="ambulance2">No</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Insurance Service<code>*</code></label> <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="insurance1" name="insurance" value="1" {{$package->insurance == '1' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="insurance1">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="insurance2" name="insurance" value="0" {{$package->insurance == '0' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="insurance2">No</label>
                                        </div>
                                    </div>
                                </div>
                                @if($package->insurance == 1)
                                <div class="col-md-4 insurance">
                                    <div class="form-group">
                                        <label for="">Insurance Coverage Amount <code>*</code></label>
                                        <input type="number" name="insurance_amount" class="form-control" value="{{$package->insurance_amount}}">
                                    </div>
                                </div>
                                @else
                                <div class="col-md-4 insurance" style="display:none">
                                    <div class="form-group">
                                        <label for="">Insurance Coverage Amount</label>
                                        <input type="number" name="insurance_amount" class="form-control">
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Schedule Flexibility<code>*</code></label> <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="flexibility_yes" name="schedule_flexibility" value="1" {{$package->schedule_flexibility == '1' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="flexibility_yes">Yes</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="flexibility_no" name="schedule_flexibility" value="0" {{$package->schedule_flexibility == '0' ? 'checked' : ''}}>
                                            <label class="form-check-label" for="flexibility_no">No</label>
                                        </div>
                                    </div>
                                </div>
                                @if($package->schedule_flexibility == 1)
                                <div class="col-md-4 flexible">
                                    <div class="form-group">
                                        <label for="">Schedule Flexibility (Times)<code>*</code></label> <br>
                                       <input type="number" class="form-control" name="schedule_times" value="{{$package->schedule_times}}">
                                    </div>
                                </div>
                                @else
                                <div class="col-md-4 flexible" style="display:none">
                                    <div class="form-group">
                                        <label for="">Schedule Flexibility (Times)<code>*</code></label> <br>
                                       <input type="number" class="form-control" name="schedule_times">
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Online Doctor Consultation (Times)<code>*</code></label> <br>
                                       <input type="number" class="form-control" name="online_consultation" value="{{$package->online_consultation}}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>            
                    </form>
                </div>
                <div class="tab-pane fade" id="seo" role="tabpanel" aria-labelledby="seo-tab">
                    <form method="POST" action="{{ route('package.updateSeo',$package->slug) }}" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label class="form-label">SEO Keyword<code>*</code></label>
                            <input type="text" class="form-control" required name="seo_keyword" value="{{old('seo_keyword') ?? $package->seo_keyword}}">
                            @error('seo_keyword')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">SEO Description<code>*</code></label>
                            <textarea name="seo_description" class="form-control" cols="30" rows="3">{{old('seo_description') ?? $package->seo_description}}</textarea>
                            @error('seo_keyword')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <!-- /.card-body -->
            
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
            
                    </form>
                </div>
            </div>
        </div>
        <input type="hidden" id="package" value="{{$package->id}}">
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
<script>
    $(document).ready(function(){
        $('input[name=insurance]').change(function(){
            let insurance = $(this).val();
            if(insurance == 1){
                $('.insurance').css('display','block');
                $('.insurance input').attr('required','true');
            }else{
                $('.insurance').css('display','none');
                $('.insurance input').removeAttr('required');
            }
        })
        $('input[name=schedule_flexibility]').change(function(){
            let flexible = $(this).val();
            if(flexible == 1){
                $('.flexible').css('display','block');
                $('.flexible input').attr('required','true');
            }else{
                $('.flexible').css('display','none');
                $('.flexible input').removeAttr('required');
            }
        })
    })
</script>
<script>
    $(document).ready(function(){
        $("#package_type").keyup(function() {
            $('#result').empty();
            var slug = $(this).val();
            var trimmed = $.trim(slug);
            slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            slug = slug.toLowerCase();
            $("#slug").val(slug);
        });
        $("#slug").keyup(function() {
            $('#result').empty();
            var slug = $(this).val();
            var trimmed = $.trim($(this).val());
            slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '-');
            slug = slug.toLowerCase();
            $("#slug").val(slug);
        });
        $("#slug").blur(function() {
            let slug = $(this).val();
            let id = $('#package').val();
            $.ajax({
                url:'{{route("package.checkSlug")}}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { 
                    id: id, 
                    slug: slug 
                },
                success: function(response) {
                    if(response == false){
                        $('#result').html('<i class="icon-checkmark text-success mr-1"></i><span class="text-success">Valid</span>');
                    }else{
                        $('#result').html('<i class="icon-cross text-danger mr-1"></i><span class="text-danger">Invalid</span>');
                    }
                }
            })
        });
        $("#package_type").blur(function() {
            let slug = $('#slug').val();
            let id = $('#package').val();
            $.ajax({
                url:'{{route("package.checkSlug")}}',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: { 
                    id: id, 
                    slug: slug 
                },
                success: function(response) {
                    if(response == false){
                        $('#result').html('<i class="icon-checkmark text-success mr-1"></i><span class="text-success">Valid</span>');
                    }else{
                        $('#result').html('<i class="icon-cross text-danger mr-1"></i><span class="text-danger">Invalid</span>');
                    }
                }
            })
        });
    })
</script>
@endsection