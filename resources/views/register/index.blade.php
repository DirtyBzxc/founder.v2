@extends('layouts.main')
@section('content')
<div class="d-flex justify-content-center p-5">  
    <form action="{{route('register.store')}}" method='post' class='border rounded p-5 shadow-lg'>
        @csrf
        <h3 class='text-center'>Join us</h3>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" name='email' class="form-control" value='{{old('email')}}' placeholder="Enter email">
        </div>
          <div class="form-group">
            <label for="name">Login</label>
            <input name='login' type="login" class="form-control" value='{{old('login')}}' placeholder="Enter login">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>
          <div class="form-group">
              <label for="password_confirm">Password confirm</label>
              <input type="password" name='password_confirm' class="form-control" placeholder="Enter password">
              <small id="emailHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>
            </div>
            
        <button type="submit" class="btn btn-primary mt-3">Register</button>

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
@endsection