@extends('layouts.main')
@section('content')
<div class="d-flex justify-content-center p-5">
    <form action="{{route('login.store')}}" method='post' class='border rounded p-5 shadow-lg'>
      @csrf
        <h3 class='text-center'>Login</h3>
        <div class="form-group">
          <label for="email">Email address</label>
          <input name='email' type="email" class="form-control" placeholder="Enter email">
          <small id="emailHelp" class="form-text tsext-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input name='password' type="password" class="form-control"  placeholder="Password">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
        @if ($errors->any())
        <div class ='alert alert-danger mt-2 p-3 text-start'>
          <ul class='align-middle'>
            @foreach ($errors->all() as $error)
              <li class='list-group-item p-0 align-middle'>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      </form>
@endif

</div>
@endsection