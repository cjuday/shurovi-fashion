@extends('layouts.admin')
@section('topline','Edit Slider Image')
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
   <label for="offer_name"><b>Serial Number</b></label>
   <input type="text" name="vsbl" class="form-control" value="{{$data->visiblity}}">        
</div>

<div class="form-group">
   <label for="image"><b>Image</b></label><br/>
   (Use <a href="https://www.reduceimages.com/">Image Reducer</a> to reduce the image size below 1MB for faster page load)
   <input type="file" name="image" class="form-control">
   <br/><br/>

   <b>Current Image:</b><br/>
   <img src="{{$data->img}}" height="400px" width="800px"/>
</div>
     
<div class="form-group">
   <label for="offer_name"><b>Title 1st Line</b></label>
   <input type="text" name="tt1" class="form-control" value="{{$data->title}}">        
</div>

<div class="form-group">
   <label for="offer_name"><b>Title 2nd Line</b></label>
   <input type="text" name="tt2" class="form-control" value="{{$data->title_2}}">        
</div>

<div class="form-group">
   <label for="offer_name"><b>Title 3rd Line</b></label>
   <input type="text" name="tt3" class="form-control" value="{{$data->title_3}}">        
</div>

<div class="form-group">
   <label for="offer_name"><b>Title 4th Line</b></label>
   <input type="text" name="tt4" class="form-control" value="{{$data->title_4}}">        
</div>

<div class="form-group">
   <label for="offer_name"><b>Text Align</b></label>
   <select name="text_align" class="form-control">
      @if($data->text_align=='left')
         <option value="left">Left</option>
         <option value="center">Center</option>
         <option value="end">Right</option>
      @elseif($data->text_align=='end')
         <option value="end">Right</option>
         <option value="left">Left</option>
         <option value="center">Center</option>
      @else
         <option value="center">Center</option>
         <option value="end">Right</option>
         <option value="left">Left</option>
      @endif
   </select>
</div>

<input type="hidden" name="id" value="{{Auth()->id()}}">
<input type="hidden" name="eid" value="{{$data->id}}">
<button class="btn btn-primary" name="submit" value="submit">Update Slider Image</button>
<br/><br/>

</form>
@endsection