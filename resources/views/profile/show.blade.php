@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row d-flex align-items-center mt-2 mb-2 text-center">
       <form class='border rounded p-5 shadow-lg pt-3'>
        @csrf
        <h3 class='text-center'>Account information</h3>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" name='email' class="form-control" value='{{$user->email}}' placeholder="Enter email" disabled>
        </div>
          <div class="form-group">
            <label for="name">Login</label>
            <input name='login' type="login" class="form-control" value='{{$user->login}}' placeholder="Enter login" disabled>
          </div>
            @if (isset($user->player['id']))

            <a href="{{route('player.show',$user->player['nickname'])}}" class='btn btn-success mt-3 w-100'>My Game Profile</a>
            
            @else
            
            <a href="{{route('player.create')}}" class='btn btn-success mt-3 w-100'>Create game Profile</a>
            
            @endif
           
            <a href="{{route('profile.edit',$user->login)}}" class="btn btn-primary mt-3 w-100">Edit my account</a>

            <a href="{{route('profile.destroy',$user->login)}}" class="btn btn-danger mt-3 w-100">Delete my account</a>

      </form>
                  
    </div>
</div>
@endsection