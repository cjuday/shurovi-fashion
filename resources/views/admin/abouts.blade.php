@extends('layouts.admin')
@section('topline')
    {{$data->title}} Settings
@endsection
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
         @foreach ($errors->all() as $error)
            <i class="fas fa-exclamation-triangle"></i> {{ $error }}<br/>
         @endforeach
    </div>
@endif

<form method="post" action="{{route('update.slider')}}" enctype="multipart/form-data">
@csrf

<div class="form-group">
   <label for="offer_name"><b>Section Name</b></label><br/>
   <b class="text-success text-sm">{{$data->title}}</b>      
</div>

<div class="form-group">
   <label for="image"><b>Image 1 (Image in the back)</b></label><br/>
   (Use <a href="https://www.reduceimages.com/">Image Reducer</a> to reduce the image size below 1MB for faster page load)
   <input type="file" name="image1" class="form-control">
   <br/><br/>

   <b>Current Image:</b><br/>
   <img src="{{$data->img1}}" height="200px" width="400px"/>
</div>

<div class="form-group">
   <label for="image"><b>Image 2 (Image in the front)</b></label><br/>
   (Use <a href="https://www.reduceimages.com/">Image Reducer</a> to reduce the image size below 1MB for faster page load)
   <input type="file" name="image2" class="form-control">
   <br/><br/>

   <b>Current Image:</b><br/>
   <img src="{{$data->img2}}" height="200px" width="400px"/>
</div>
     
<div class="form-group">
   <label for="image"><b>Descriptions</b></label><br/>
   <textarea rows="10" cols="100" class="form-control" name="details">{{$data->details}}</textarea>       
</div>



<input type="hidden" name="id" value="{{Auth()->id()}}">
<input type="hidden" name="eid" value="{{$data->id}}">
<button class="btn btn-primary" name="submit" value="submit">Update {{$data->title}}</button>
<br/><br/>

</form>
@endsection