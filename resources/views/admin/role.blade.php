@extends('layouts.main')
@section('content')
<div class="container">
    <div class = 'd-flex justify-content-between'>
        <h1>Role panel</h1>
        <a class='mt-3' href="{{route('admin.index')}}">Back</a>
    </div>
    <div class="d-flex justify-content-center p-5">
    <form action="" method='post' class='border rounded p-5 shadow-lg'>
        @csrf
        <h3 class='text-center'>Change permitions</h3>
           <div class="form-group">
            <label for="username">Username</label>
            <input name='username' type="text" class="form-control" placeholder="Enter username">
          </div>
          <div class="form-group">
            <label for="role">Role</label>
              <select name='role' class="form-control">
                <option>0</option>
                <option>1</option>
                <option>2</option>
              </select>
              <small class = 'form-text text-muted'> 0 - User <br> 1 - Moderator <br> 2 - Administrator</small>
         </div>
         <button type="submit" class="btn btn-primary mt-3">Edit</button>
    <form>
    </div>
</div>
@endsection
