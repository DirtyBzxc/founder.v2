@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row d-flex align-items-center mt-2 mb-2 text-center">
       <form action="{{route('profile.update',$user->login)}}" method='post' class='border rounded p-5 shadow-lg'>
        @csrf
        @method('put')
        <h3 class='text-center'>Change your account information</h3>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" name='email' class="form-control" value='{{$user->email}}'>
        </div>
          <div class="form-group">
            <label for="name">Login</label>
            <input name='login' type="login" class="form-control" value='{{$user->login}}' >
          </div>
        <button type="submit" class="btn btn-primary mt-3 w-25">Update</button>
            <br>
        <a href="{{route('profile.change_password',$user->login)}}" class='btn btn-success mt-3 w-25'>Change password</a>
        @if ($errors->any())
      
          <div class ='alert alert-danger mt-2'>
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
      
        @endif
      </form>
    </div>
</div>
@endsection