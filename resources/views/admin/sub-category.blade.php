@extends('layouts.admin')
@section('topline','Sub-categories')
@section('btn')
    <div class="col-6 text-right">
        <button class="btn btn-success btn-sm" onclick="location.href='{{route('add.subcats')}}'">+ Add New Sub-category</button>
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
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Sub-category Name</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Main Category</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Options</div></th>
    </tr>
  </thead>
  <tbody>
  	@foreach($data as $img)
    <tr>
      <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$img->name}}</div></td>
      <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{get_group_name($img->group_id)}}</div></td>
      <td><a href="{{route('edit.cats',['id'=>$img->id])}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a> <a data-target="#deleteCat_{{$img->id}}" data-toggle="modal" data-id="{{$img->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
      <div class="modal fade" id="deleteCat_{{$img->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete the category?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('delete.cat',['id'=>$img->id])}}" >Delete</a>
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
    <div class="text-center">
      {{$data->links()}}
      <br/>
    </div>
@else
<p><h1 class="text-center">No Category Added Yet.</h1></p>
@endif
@endsection