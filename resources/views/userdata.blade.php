@extends('base')

@section('main')
<div class="container"> 
<div class="row">
 <div class="col-sm-6 col-md-6 offset-sm-2">
    <h1 class="display-6">Add a List</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <div class="col-sm-12">
<!-- Show success message -->
    @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}  
        </div>
    @endif
    </div>
      <form method="post" action="{{ route('store') }}">
          @csrf
          <div class="form-group">    
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email" value="{{old('email')}}"/>
          </div>

          <div class="form-group">
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name" value="{{old('first_name')}}"/>
          </div>

          <div class="form-group">
              <label for="surname">Surname:</label>
              <input type="text" class="form-control" name="surname" value="{{old('surname')}}"/>
          </div>                        
          <button type="submit" class="btn btn-primary">Create</button>
      </form>
  </div>
</div>
</div>

<!-- Show users -->

<div class="row">
<div class="col-sm-12">
    <h1 class="display-6">Users List</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>No.</td>
          <td>Email</td>
          <td>Names</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @if(count($userdatas) > 0 )
        @foreach($userdatas as $userdata)
        <tr>
            <td>{{$userdata->id}}</td>
            <td>{{$userdata->email}}</td>
            <td>{{$userdata->first_name}} {{$userdata->surname}}</td>
            <td>
                <a href="{{ route('edit', $userdata->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('destroy', $userdata->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        @else
        <div class="card">
        <div class="card-body">
            No contact available yet!
        </div>
        </div>
        @endif
    </tbody>
  </table>
  {{ $userdatas->links() }}
<div>
</div>
</div>
@endsection