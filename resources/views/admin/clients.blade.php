@extends('layouts.admin')
@section('topline','Client Settings')
@section('btn')
    <div class="col-6 text-right">
        <button class="btn btn-success btn-sm" onclick="location.href='{{route('add.client')}}'">+ Add New Client Image</button>
    </div>
@endsection
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
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sl</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Image</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Options</div></th>
      </tr>
  </thead>
  <tbody>
  	@foreach($data as $img)
    <tr>
      <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$img->visiblity}}</div></td>
      <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1"><img src="{{$img->img_src}}" height="100" width="100"/></div></td>
      <td><a href="{{route('edit.client',['id'=>$img->id])}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a> <a data-target="#deleteCli_{{$img->id}}" data-toggle="modal" data-id="{{$img->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
      
      
      
      
      <!-- Delete Employee Modal-->
    <div class="modal fade" id="deleteCli_{{$img->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete the Client image?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('delete.client',['id'=>$img->id])}}" >Delete</a>
                </div>
            </div>
        </div>
    </div>
</tr>
    @endforeach
  </tbody>
</table>  
      </div>
    </div>
</div>
@else
<p><h1 class="text-center">No Client Image Added Yet.</h1></p>
@endif
@endsection