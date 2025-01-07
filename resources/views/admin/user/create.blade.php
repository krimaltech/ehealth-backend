@extends('admin.dashboard')
@section('content')
<div class="card border-top-primary border-bottom-0 rounded-0">
    <div class="page-header page-header-light">
          <div class="breadcrumb-line breadcrumb-line-light">
            <div class="breadcrumb breadcrumb-arrows">
                <a href="{{route('home')}}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i>Dashboard</a>
                <a href="{{route('user.index')}}" class="breadcrumb-item">Users</a>
                <span class="breadcrumb-item active">@isset($user) Edit @else Create @endif</span>
            </div>
        </div>
    </div>
</div>
<!-- @include('admin.alert') -->
<div class="card" style=" width:50%;" >
    <div class="card-header">
           
    <div class="card-body">
    @isset($user)
        <form method="POST" action="{{route('user.update', $user->id)}}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @else
            <form method="POST" action="{{route('user.store')}}" class="form-horizontal" enctype="multipart/form-data">
            @csrf
            @method('post')
            @endif
            <div class="row">
                <div class="col-md-9">
                    <label for="" class="required">User Name</label>
                        <input type="text" name="name"  id="name" class="form-control" value="{{ null !== old('name') ? old('name') : (isset($user) ? $user->name : '') }}" required   />
                     @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <div class="col-md-9">
                    <label for="email" class="required">Email</label>
                        <input type="email" name="email"  id="email" class="form-control" value="{{ null !== old('email') ? old('email') : (isset($user) ? $user->email : '') }}" required   />
                     @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
          
             <div class="col-md-9">
                    <label for="password" >Password</label>
                        <input type="password" name="password"  id="password" class="form-control" @isset($user) @else required  @endisset />
                     @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
             </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="" >Profile</label><br/>
                    @isset($user)
                         @if($user->image !='')
                         <a href="{{asset('storage/images/'.$user->image)}}" target="_blank"><img id="selectedImage3" src="{{asset('storage/images/'.$user->image)}}" height="100" width="100">
                         </a>
                        @endif
                       
                        @endisset
              
                        
                        <input type="file" name="image" accept="image/*" onchange="readURL3(this);"  />
                    
                </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                <div class="mt-1">
                        <label for="" >Admin</label>
                        <input type="checkbox" name="role" @isset($user) @if($user->role==1) checked @endif @endisset />
                    </div>
                </div>
                </div>

           
           <div class="text-right">
                <button type="submit" class="btn btn-primary">Submit<i class="icon-paperplane ml-2"></i></button>
            </div>
        </form>
    </div>
</div>
</div>

<script>
        function readURL3(input) {
           if (input.files && input.files[0]) {
               var reader = new FileReader();
                  reader.onload = function(e) {

                    $('#selectedImage3').attr('src', e.target.result);
                    $('#selectedImage3').css('display', 'block');
                }

                reader.readAsDataURL(input.files[0]);
            }
        }
      $("#selectedImage3").change(function() {
            readURL3(this);
        });
    </script>

@endsection