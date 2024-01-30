@extends('layouts.admin')
@section('topline')
    Add New Testimonial
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
   <input type="text" name="name" class="form-control" Placeholder="Name..">        
</div>

<div class="form-group">
   <label for="offer_name"><b>Designation</b></label>
   <input type="text" name="name" class="form-control" Placeholder="Designation..">        
</div>

<div class="form-group">
   <label for="image"><b>Image</b></label><br/>
   <input type="file" name="image1" class="form-control">
   <br/><br/>
</div>
     
<div class="form-group">
   <label for="image"><b>Descriptions</b></label><br/>
   <textarea rows="10" cols="100" name="details" class="form-control" Placeholder="Description.."></textarea>       
</div>



<input type="hidden" name="id" value="{{Auth()->id()}}">
<button class="btn btn-primary" name="submit" value="submit">Add New Testimonial</button>
<br/><br/>

</form>
@endsection