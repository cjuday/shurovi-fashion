@extends('layouts.admin')
@section('topline','Add New Category')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
         @foreach ($errors->all() as $error)
            <i class="fas fa-exclamation-triangle"></i> {{ $error }}<br/>
         @endforeach
    </div>
@endif    

<form method="post" action="{{route('store.cats')}}" enctype="multipart/form-data">
@csrf

<div class="form-group">
   <label for="offer_name"><b>Category Name</b></label>
   <input type="text" name="name" class="form-control" Placeholder="Category Name..">        
</div>

<div class="form-group">
   <label for="image"><b>Image</b></label><br/>
   <input type="file" name="image" class="form-control">
</div>

<input type="hidden" name="id" value="{{Auth()->id()}}">
<button class="btn btn-primary" name="submit" value="submit">Add Category</button>
<br/><br/>

</form>
@endsection