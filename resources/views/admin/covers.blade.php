@extends('layouts.admin')
@section('topline','Cover Settings')
@section('content')

@if(session('success'))
  <div class="alert alert-success">
    <i class="fas fa-check-circle"></i> {{session('success')}}
  </div>
@endif

@if(count($data)>0)
<div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
      <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Page Name</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Page Title</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Image</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Options</div></th>
      </tr>
  </thead>
  <tbody>
  	@foreach($data as $img)
    <tr>
      <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$img->name}}</div></td>
      <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$img->title}}</div></td>
      <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1"><img src="{{$img->src}}" height="100" width="200"/></div></td>
      <td><a href="{{route('edit.cover',['id'=>$img->id])}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a></td>
    </tr>
    @endforeach
  </tbody>
</table>  
      </div>
    </div>
</div>
@else
<p><h1 class="text-center">No Cover Image Added Yet.</h1></p>
@endif
@endsection