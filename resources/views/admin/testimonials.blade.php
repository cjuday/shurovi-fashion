@extends('layouts.admin')
@section('topline','Testimonials Settings')
@section('btn')
    <div class="col-6 text-right">
        <button class="btn btn-success btn-sm" onclick="location.href='{{route('add.testimonials')}}'">+ Add New Testimonials</button>
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
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Name</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Designation</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Image</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Details</div></th>
      <th scope="col"><div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Options</div></th>
      </tr>
  </thead>
  <tbody>
  	@foreach($data as $img)
    <tr>
      <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$img->name}}</div></td>
      <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$img->designation}}</div></td>
      <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1"><img src="{{$img->image}}" height="100" width="100"/></div></td>
      <td><div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{$img->details}}</div></td>
      <td><a href="{{route('edit.testimonials',['id'=>$img->id])}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a> <a data-target="#deleteTest_{{$img->id}}" data-toggle="modal" data-id="{{$img->id}}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a></td>
      
      
      
      
      <!-- Delete Employee Modal-->
    <div class="modal fade" id="deleteTest_{{$img->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure to delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to delete the Testimonial?</div>
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
<p><h1 class="text-center">No Testimonials Added Yet.</h1></p>
@endif
@endsection