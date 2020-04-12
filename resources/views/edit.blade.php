@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-6">Update user details</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('update', $userdata->id) }}">
            @method('PUT') 
            @csrf
            <div class="form-group">

                <label for="Email">Email:</label>
                <input type="email" class="form-control" name="email" value={{ $userdata->email }} />
            </div>

            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value={{ $userdata->first_name }} />
            </div>

            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" class="form-control" name="surname" value={{ $userdata->surname }} />
            </div>
            <button class="btn btn-primary" type="submit">Update Details</button>
        </form>
    </div>
</div>
@endsection