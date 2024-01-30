@extends('layouts.admin')
@section('topline')
    Update Testimonial
@endsection
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
         @foreach ($errors->all() as $error)
            <i class="fas fa-exclamation-triangle"></i> {{ $error }}<br/>
         @endforeach
    </div>
@endif

<form method="post" action="" enctype="multipart/form-data">
@csrf

<div class="form-group">
   <label for="offer_name"><b>Name</b></label>
   <input type="text" name="name" class="form-control" value="{{$data->name}}">        
</div>

<div class="form-group">
   <label for="offer_name"><b>Designation</b></label>
   <input type="text" name="name" class="form-control" value="{{$data->designation}}">        
</div>

<div class="form-group">
   <label for="image"><b>Image</b></label><br/>
   <input type="file" name="image1" class="form-control">
    <br/><br/>
   <b>Current Image:</b><br/>
   <img src="{{$data->image}}" height="100px" width="100px"/>
</div>
     
<div class="form-group">
   <label for="image"><b>Descriptions</b></label><br/>
   <textarea rows="10" cols="100" name="details" class="form-control">{{$data->details}}</textarea>       
</div>



<input type="hidden" name="id" value="{{Auth()->id()}}">
<button class="btn btn-primary" name="submit" value="submit">Update Testimonial</button>
<br/><br/>

</form>
@endsection