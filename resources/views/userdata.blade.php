@extends('base')

@section('main')
<div class="container"> 
<div class="row">
 <div class="col-sm-6 col-md-6 offset-sm-2">
    <h1 class="display-3">Add a contact</h1>
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
      <form method="post" action="{{ route('store') }}">
          @csrf
          <div class="form-group">    
              <label for="email">Email:</label>
              <input type="email" class="form-control" name="email"/>
          </div>

          <div class="form-group">
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name"/>
          </div>

          <div class="form-group">
              <label for="surname">Surname:</label>
              <input type="text" class="form-control" name="surname"/>
          </div>                        
          <button type="submit" class="btn btn-primary">Primary</button>
      </form>
  </div>
</div>
</div>

<!-- Show user details -->

<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Contacts</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>No.</td>
          <td>Email</td>
          <td>Surname</td>
          <td>First Name</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @if(count($userdatas) > 0 )
        @foreach($userdatas as $userdata)
        <tr>
            <td>{{$userdata->id}}</td>
            <td>{{$userdata->email}}</td>
            <td>{{$userdata->surname}}</td>
            <td>{{$userdata->first_name}}</td>
            <td>
                <a href="{{ route('edit',$userdata->id)}}" class="btn btn-primary">Edit</a>
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
         No contact 
        @endif
    </tbody>
  </table>
<div>
</div>
</div>
@endsection