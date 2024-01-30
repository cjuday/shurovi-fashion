@extends('layouts.admin')
@section('topline','Add New Client Image')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
         @foreach ($errors->all() as $error)
            <i class="fas fa-exclamation-triangle"></i> {{ $error }}<br/>
         @endforeach
    </div>
@endif    

<form method="post" action="{{route('store.client')}}" enctype="multipart/form-data">
@csrf

<div class="form-group">
   <label for="offer_name"><b>Serial Number</b></label>
   <input type="text" name="vsbl" class="form-control" value="{{$data}}" readonly>        
</div>

<div class="form-group">
   <label for="image"><b>Image</b></label><br/>
   (Use <a href="https://squaremyimage.com/">Image Squarer</a> to make the image square for beauty and reducing size below 1MB for faster page load)
   <input type="file" name="image" class="form-control">
</div>

<input type="hidden" name="id" value="{{Auth()->id()}}">
<button class="btn btn-primary" name="submit" value="submit">Add Client Image</button>
<br/><br/>

</form>
@endsection