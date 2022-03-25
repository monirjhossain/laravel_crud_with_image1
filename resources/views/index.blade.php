@extends('layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Student Information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('/create') }}"> Create Profile</a>
            </div>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('monir'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    @if ($message = Session::get('delete'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($students as $key=> $item)
        <tr>
            <td>{{ $key+1 }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->address }}</td>
            <td><img src="{{ asset('uploads/students/'.$item->photo) }}" width="100px"></td> 
            <td>
                <form action="" method="POST">
     
                    {{-- <a class="btn btn-info" href="">Show</a> --}}
                    @csrf
      
                    <a class="btn btn-primary" href="{{ url('edit-student/'.$item->id) }}">Edit</a>

                    <a class="btn btn-danger" href="{{ url('delete-student/'.$item->id) }}">Delete</a>
     
        
                    {{-- <button type="submit" class="btn btn-danger">Delete</button> --}}
                </form>
            </td>
        </tr>
        @endforeach
    </table>
     
@endsection