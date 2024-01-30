@extends('layouts.admin')
@section('topline','Add New Sub-category')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
         @foreach ($errors->all() as $error)
            <i class="fas fa-exclamation-triangle"></i> {{ $error }}<br/>
         @endforeach
    </div>
@endif
<form method="post" action="{{route('store.subcats')}}">
@csrf

     
<div class="form-group">
   <label for="offer_name"><b>Name</b></label>
   <input type="text" name="name" class="form-control" Placeholder="Name..">        
</div>

<div class="form-group">
   <label for="offer_name"><b>Text Align</b></label>
   <select name="group_id" class="form-control">
      @foreach($data as $dt)
        <option value="{{$dt->id}}">{{$dt->name}}</div>
      @endforeach
   </select>
</div>
<input type="hidden" name="id" value="{{Auth()->id()}}">
<button class="btn btn-primary" name="submit" value="submit">Add Sub-category</button>
<br/><br/>

</form>
@endsection