@extends('layouts.admin')
@section('topline','Edit Client Image')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
         @foreach ($errors->all() as $error)
            <i class="fas fa-exclamation-triangle"></i> {{ $error }}<br/>
         @endforeach
    </div>
@endif

<form method="post" action="{{route('update.client')}}" enctype="multipart/form-data">
@csrf

<div class="form-group">
   <label for="offer_name"><b>Serial Number</b></label>
   <input type="text" name="vsbl" class="form-control" value="{{$data->visiblity}}">        
</div>

<div class="form-group">
   <label for="image"><b>Image</b></label><br/>
   (Use <a href="https://www.reduceimages.com/">Image Reducer</a> to reduce the image size below 1MB for faster page load)
   <input type="file" name="image" class="form-control">
   <br/><br/>

   <b>Current Image:</b><br/>
   <img src="{{$data->img_src}}" height="200px" width="200px"/>
</div>

<input type="hidden" name="id" value="{{Auth()->id()}}">
<input type="hidden" name="eid" value="{{$data->id}}">
<button class="btn btn-primary" name="submit" value="submit">Update Client Image</button>
<br/><br/>

</form>
@endsection