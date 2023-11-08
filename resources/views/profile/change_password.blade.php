@extends('layouts.main')
@section('content')
<div class="d-flex justify-content-center p-5">  
    <form action="{{route('profile.update_password',$user->login)}}" method='post' class='border rounded p-5 shadow-lg'>
      @csrf
      @method('put')
      <h3 class='text-center'>Change password</h3>
      <div class="form-group">
        <label for="password">Current Password</label>
        <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="new_password">New Password</label>
        <input type="password" name='new_password' class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
             <div class="form-group">
              <label for="new_password_confirm">New Password confirm</label>
              <input type="password" name='new_password_confirm' class="form-control" placeholder="Enter password">
              <small id="emailHelp" class="form-text text-muted">We'll never share your data with anyone else.</small>
            </div>
            
        <button type="submit" class="btn btn-primary mt-3">Change password</button>
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