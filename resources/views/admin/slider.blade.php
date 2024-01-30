@extends('layouts.admin')
@section('topline','Slider Settings')
@section('btn')
    <div class="col-6 text-right">
        <button class="btn btn-success btn-sm" onclick="location.href='{{route('add.slider')}}'">+ Add New Slider Image</button>
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
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Title 1st Line</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Title 2nd Line</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Title 3rd Line</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Title 4th Line</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Text Align</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Options</div></th>
      </tr>
  </thead>
  <tbody>
  	@foreach($data as $img)
    <tr>
      <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$img->visiblity}}</div></td>
      <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1"><img src="{{$img->img}}" height="100" width="200"/></div></td>
      @if(empty($img->title))
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Empty</div></td>
      @else
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$img->title}}</div></td>
      @endif
      @if(empty($img->title_2))
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Empty</div></td>
      @else
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$img->title_2}}</div></td>
      @endif
      @if(empty($img->title_3))
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Empty</div></td>
      @else
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$img->title_3}}</div></td>
      @endif
      @if(empty($img->title_4))
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Empty</div></td>
      @else
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$img->title_4}}</div></td>
      @endif
      @if($img->text_align=='left')
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Left</div></td>
      @elseif($img->text_align=='end')
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Right</div></td>
      @else
        <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">Center</div></td>
      @endif
      <td><a href="{{route('edit.slider',['id'=>$img->id])}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a> <a data-target="#deleteSli_{{$img->id}}" data-toggle="modal" data-id="{{$img->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
      
      
      
      
      <!-- Delete Employee Modal-->
    <div class="modal fade" id="deleteSli_{{$img->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete the slider image?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{route('delete.slider',['id'=>$img->id])}}" >Delete</a>
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
<p><h1 class="text-center">No Slider Image Added Yet.</h1></p>
@endif
@endsection