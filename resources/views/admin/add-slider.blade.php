@extends('layouts.admin')
@section('topline','Add New Slider Image')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
         @foreach ($errors->all() as $error)
            <i class="fas fa-exclamation-triangle"></i> {{ $error }}<br/>
         @endforeach
    </div>
@endif
<form method="post" action="{{route('store.slider')}}" enctype="multipart/form-data">
@csrf

<div class="form-group">
   <label for="offer_name"><b>Serial Number</b></label>
   <input type="text" name="vsbl" class="form-control" value="{{$data}}" readonly>        
</div>

<div class="form-group">
   <label for="image"><b>Image</b></label><br/>
   (Use <a href="https://www.reduceimages.com/">Image Reducer</a> to reduce the image size below 1MB for faster page load)
   <input type="file" name="image" class="form-control">
</div>
     
<div class="form-group">
   <label for="offer_name"><b>Title 1st Line</b></label>
   <input type="text" name="tt1" class="form-control" Placeholder="Title 1st Line..">        
</div>

<div class="form-group">
   <label for="offer_name"><b>Title 2nd Line</b></label>
   <input type="text" name="tt2" class="form-control" Placeholder="Title 2nd Line..">        
</div>

<div class="form-group">
   <label for="offer_name"><b>Title 3rd Line</b></label>
   <input type="text" name="tt3" class="form-control" Placeholder="Title 3rd Line..">        
</div>

<div class="form-group">
   <label for="offer_name"><b>Title 4th Line</b></label>
   <input type="text" name="tt4" class="form-control" Placeholder="Title 4th Line..">        
</div>

<div class="form-group">
   <label for="offer_name"><b>Text Align</b></label>
   <select name="text_align" class="form-control">
      <option value="left">Left</option>
      <option value="center">Center</option>
      <option value="end">Right</option>
   </select>
</div>
<input type="hidden" name="id" value="{{Auth()->id()}}">
<button class="btn btn-primary" name="submit" value="submit">Add Slider Image</button>
<br/><br/>

</form>
@endsection