@extends('admin.master')
@section('content')
<style>
   @media only screen and (max-width: 1200px){
    .image-notfound {
    height: 400px;
    }
}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <img class="image-notfound" src="/images/404-error.svg" width="100%" height="600px">
        </div>
        <div class="col-md-12">
            <h1 class="text-center page">OOPS! PAGE NOT FOUND</h1>
        </div>
    </div>
</div>
@endsection