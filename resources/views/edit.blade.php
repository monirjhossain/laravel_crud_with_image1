@extends('layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Edit Student</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ url('/') }}"> Back</a>
        </div>
    </div>
</div>
     
<div class="col-md-12">
    @if ($errors->any())
        <div class="alert alert-danger">
                 @foreach ($errors->all() as $error)
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> {{ $error }}
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
                 </button>
             </div>
                @endforeach
         </div>
     @endif
                        
</div>
     
<form action="{{ url('update-student/'.$student->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $student->name }}" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="text" name="email" value="{{ $student->email }}" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                <input type="text" name="phone" value="{{ $student->phone }}" class="form-control" placeholder="Phone">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <input type="text" name="phone" value="{{ $student->address }}" class="form-control" placeholder="Address">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="photo" class="form-control">
                <img src="{{ asset('uploads/students/'.$student->photo) }}" width="100px">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary form-control">Update Information</button>
        </div>
    </div>
     
</form>
@endsection