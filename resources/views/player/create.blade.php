@extends('layouts.main')
@section('content')
<div class="d-flex justify-content-center p-5">
    <form action="{{route('player.store')}}" method='post' class='border rounded p-5 shadow-lg'>
      @csrf
        <h3 class='text-center'>Add new profile</h3>
        <div class="form-group">
          <label for="nickname">Nickname</label>
          <input name='nickname' type="text" class="form-control" placeholder="Enter nickname">
        </div>
        <div class="form-group">
            <label for="rank">Rank</label>
              <select name='rank' class="form-control" id="exampleFormControlSelect1">
                <option>Radiant</option>
                <option>Immortal</option>
                <option>Ascendant</option>
                <option>Diamond</option>
                <option>Platinum</option>
                <option>Gold</option>
                <option>Silver</option>
                <option>Bronze</option>
                <option>Iron</option>
              
              </select>
        </div>
        <div class="form-group">
          <label for="role">Main role</label>
            <select name='role' class="form-control" id="exampleFormControlSelect1">
              <option>Duelist</option>
              <option>Sentinel</option>
              <option>Initiator</option>
              <option>Controller</option>
            </select>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input name='age' type="number" class="form-control" placeholder="Enter your age" min='1' max='50' >
        </div>

        <div class="form-group">
          <label for="link">Link Profile</label>
          <input name='link' type="text" class="form-control" placeholder="Enter your profile link">
        </div>

        <div class="form-group">
          <label for="contact">Contact link</label>
          <input name='contact' type="text" class="form-control" placeholder="Enter your contact link">
        </div>

        <div class="form-group">
            <label for="description">About you</label>
            <textarea name='description' type="text" class="form-control" placeholder="Enter description"></textarea>
            <small id="emailHelp" class="form-text tsext-muted">We'll never share your email with anyone else.</small>
        </div>
      
        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>

</div>
@endsection