@extends('admin.dashboard')

@section('content')
<style type="text/css">
    label {
        margin-top: 5px;
    }
</style>
<div class="card border-top-primary border-bottom-0 rounded-0">
    <div class="page-header page-header-light">
      <div class="breadcrumb-line breadcrumb-line-light">
        <div class="breadcrumb breadcrumb-arrows">
            <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
            <a href="{{route('detail.index')}}" class="breadcrumb-item">Company Info</a>
            <span class="breadcrumb-item active">@isset($detail) Edit @else Create @endif</span>
        </div>
    </div>
</div>
</div>
<!-- @include('admin.alert') -->
<div class="card">
    <div class="card-header">
        <div class="card-body">
            @isset($detail)
            <form method="POST" action="{{route('detail.update', $detail->id)}}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                @else
                <form method="POST" action="{{route('detail.store')}}" class="form-horizontal" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    @endif

                    <fieldset class="mb-3">
                      <ul class="nav nav-tabs" role="tablist">
                          @foreach(Helper::languageAll() as $language)
                          <li class="nav-item">
                            <a class="nav-link @if($language->code=='en') active @endif"  data-toggle="tab" href="#{{$language->code}}" role="tab">{{$language->language}}</a>
                        </li>
                        @endforeach
                        
                    </ul>
                    <div class="tab-content">
                       @foreach(Helper::languageAll() as $language)
                       <div class="tab-pane @if($language->code=='en')active @endif" id="{{$language->code}}" role="tabpanel">
                         <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" @if($language->code=='en') class="required" @endif>Title ({{$language->code}})</label>
                                        <input type="text" name="title_{{$language->code}}"  id="title_{{$language->code}}" class="form-control" @if($language->code=='np') onkeyup="engToNep(title_{{$language->code}})" @endif value="{{ null !== old('title_'.$language->code) ? old('title_'.$language->code) : (isset($detail) ? $detail->{'title_'.$language->code} : '') }}" @if($language->code=='en') required @endif  />
                                        @if ($errors->has('title_'.$language->code))
                                        <span class="text-danger">{{ $errors->first('title_'.$language->code) }}</span>
                                        @endif
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" >Address ({{$language->code}})</label>
                                        <input type="text" name="address_{{$language->code}}"  id="address_{{$language->code}}" class="form-control" @if($language->code=='np') onkeyup="engToNep(address_{{$language->code}})" @endif value="{{ null !== old('address_'.$language->code) ? old('address_'.$language->code) : (isset($detail) ? $detail->{'address_'.$language->code} : '') }}" @if($language->code=='en') required @endif  />
                                        @if ($errors->has('address_'.$language->code))
                                        <span class="text-danger">{{ $errors->first('address_'.$language->code) }}</span>
                                        @endif
                                        
                                    </div>

                                    <div class="col-md-12">
                                        <label for="description" >Description ({{$language->code}})</label>
                                        <textarea type="text" name="description_{{$language->code}}"  id="description_{{$language->code}}"  class="form-control" >{{ null !== old('description_'.$language->code) ? old('description_'.$language->code) : (isset($detail) ? $detail->{'description_'.$language->code} : '') }}</textarea>
                                        @if ($errors->has('description_'.$language->code))
                                        <span class="text-danger">{{ $errors->first('description_'.$language->code) }}</span>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                     CKEDITOR.replace( 'description_{{$language->code}}' );
                 </script>
                 @endforeach
                 
             </div>
         </fieldset>
          <div class="card">
                    <div class="card-body">
                    <div class="row">
                          <div class="col-md-6">
                            <label for="" class="required">Phone</label>
                            <input type="number" minlength="9" maxlength="10" name="phone"  id="phone" class="form-control" value="{{ null !== old('phone') ? old('phone') : (isset($detail) ? $detail->phone : '') }}" required   />
                            @if ($errors->has('phone'))
                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="" class="required">Email</label>
                            <input type="email" name="email"  id="email" class="form-control" value="{{ null !== old('email') ? old('email') : (isset($detail) ? $detail->email : '') }}" required   />
                            @if ($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                         <label for="" class="required">Image</label>
                         @isset($detail)
                         @if($detail->image !='')
                         <a href="{{asset('storage/images/'.$detail->image)}}" target="_blank"><img id="imageselect" src="{{asset('storage/images/'.$detail->image)}}" height="100" width="100">
                         </a>
                         @endif
                         @endisset
                         <input type="file" onchange="readURL3(this);" name="image" accept="image/*"  class="form-control" value="{{old('image')}}"  @isset($detail)@if($detail->image=='') required @endif @else required @endisset />

                         @if ($errors->has('image'))
                     <span class="text-danger">{{ $errors->first('image') }}</span>
                     @endif
                     </div>
                     

               

                  <div class="col-md-6">
                            <label for="" class="required">Darta No.</label>
                            <input type="text" name="darta_no"  id="darta_no" class="form-control" value="{{ null !== old('darta_no') ? old('darta_no') : (isset($detail) ? $detail->darta_no : '') }}" required   />
                            @if ($errors->has('darta_no'))
                            <span class="text-danger">{{ $errors->first('darta_no') }}</span>
                            @endif
                        </div>

                
                <div class="col-md-6">
                    <label for="facebook" >Facebook</label>
                    <input type="url" name="facebook"  id="facebook" class="form-control" value="{{ null !== old('facebook') ? old('facebook') : (isset($detail) ? $detail->facebook : '') }}" />
                    @if ($errors->has('facebook'))
                    <span class="text-danger">{{ $errors->first('facebook') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="youtube" >Youtube</label>
                    <input type="url" name="youtube"  id="youtube" class="form-control" value="{{ null !== old('youtube') ? old('youtube') : (isset($detail) ? $detail->youtube : '') }}" />
                    @if ($errors->has('youtube'))
                    <span class="text-danger">{{ $errors->first('youtube') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="instagram" >Instagram</label>
                    <input type="url" name="instagram"  id="instagram" class="form-control" value="{{ null !== old('facebook') ? old('instagram') : (isset($detail) ? $detail->instagram : '') }}" />
                    @if ($errors->has('instagram'))
                    <span class="text-danger">{{ $errors->first('instagram') }}</span>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="twitter" >Twitter</label>
                    <input type="url" name="twitter"  id="twitter" class="form-control" value="{{ null !== old('twitter') ? old('twitter') : (isset($detail) ? $detail->twitter : '') }}" required   />
                    @if ($errors->has('twitter'))
                    <span class="text-danger">{{ $errors->first('twitter') }}</span>
                    @endif
                </div>
            </div><br/>
         
                <div class="text-right">
                    <button type="submit" class="btn btn-primary">Submit<i class="icon-paperplane ml-2"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
        CKEDITOR.replace( 'description' );
</script>
<script>
        function readURL3(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();
                  reader.onload = function(e) {

                    $('#imageselect').attr('src', e.target.result);
                    $('#imageselect').css('display', 'block');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
      $("#imageselect").change(function() {
            readURL3(this);
        });
    </script>
    @endsection