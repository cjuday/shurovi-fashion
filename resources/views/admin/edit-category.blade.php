@extends('layouts.admin')
@section('topline','Edit Category')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
         @foreach ($errors->all() as $error)
            <i class="fas fa-exclamation-triangle"></i> {{ $error }}<br/>
         @endforeach
    </div>
@endif    

<form method="post" action="{{route('update.cats')}}" enctype="multipart/form-data">
@csrf

<div class="form-group">
   <label for="offer_name"><b>Category Name</b></label>
   <input type="text" name="name" class="form-control" value="{{$data->name}}">        
</div>

<div class="form-group">
   <label for="image"><b>Image</b></label><br/>
   <input type="file" name="image" class="form-control">

   <b>Current Image:</b><br/>
   <img src="{{$data->src}}" height="200px" width="200px"/>
</div>

<input type="hidden" name="id" value="{{Auth()->id()}}">
<input type="hidden" name="eid" value="{{$data->id}}">
<button class="btn btn-primary" name="submit" value="submit">Edit Category</button>
<br/><br/>

</form>
@endsection