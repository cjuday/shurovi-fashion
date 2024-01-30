@extends('layouts.admin')
@section('topline')
    Add New Service
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
   <label for="image"><b>Icon/Image</b></label><br/>
   (Transparent Background for Better Style)
   <input type="file" name="image1" class="form-control">
   <br/><br/>
</div>
     
<div class="form-group">
   <label for="image"><b>Descriptions</b></label><br/>
   <textarea rows="10" cols="100" class="form-control" name="details" Placeholder="Description.."></textarea>       
</div>



<input type="hidden" name="id" value="{{Auth()->id()}}">
<button class="btn btn-primary" name="submit" value="submit">Add New Service</button>
<br/><br/>

</form>
@endsection