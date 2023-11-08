@extends('layouts.main')
@section('content')
<div class="d-flex justify-content-center p-5">
    <form action="{{route('player.update',$currentPlayer->nickname)}}" method='post' class='border rounded p-5 shadow-lg'>
        @method('put')
        @csrf
        <h3 class='text-center'>Change new profile</h3>
        <div class="form-group">
          <label for="nickname">Nickname</label>
          <input name='nickname' type="text" class="form-control" placeholder="Enter nickname" value='{{$currentPlayer->nickname}}'>
        </div>
        <div class="form-group">
            <label for="rank">Rank</label>
              <select name='rank' class="form-control">
                <option {{$currentPlayer->rank == 'Radiant' ? 'selected' : ''}}>Radiant</option>
                <option {{$currentPlayer->rank == 'Immortal' ? 'selected' : ''}}>Immortal</option>
                <option {{$currentPlayer->rank == 'Ascendant' ? 'selected' : ''}}>Ascendant</option>
                <option {{$currentPlayer->rank == 'Diamond' ? 'selected' : ''}}>Diamond</option>
                <option {{$currentPlayer->rank == 'Platinum' ? 'selected' : ''}}>Platinum</option>
                <option {{$currentPlayer->rank == 'Gold' ? 'selected' : ''}}>Gold</option>
                <option {{$currentPlayer->rank == 'Silver' ? 'selected' : ''}}>Silver</option>
                <option {{$currentPlayer->rank == 'Bronze' ? 'selected' : ''}}>Bronze</option>
                <option {{$currentPlayer->rank == 'Iron' ? 'selected' : ''}}>Iron</option>
              </select>
        </div>
        <div class="form-group">
          <label for="role">Main role</label>
            <select name='role' class="form-control">
              <option {{$currentPlayer->role == 'Duelist' ? 'selected' : ''}}>Duelist</option>
              <option {{$currentPlayer->role == 'Sentinel' ? 'selected' : ''}}>Sentinel</option>
              <option {{$currentPlayer->role == 'Initiator' ? 'selected' : ''}}>Initiator</option>
              <option {{$currentPlayer->role == 'Controller' ? 'selected' : ''}}>Controller</option>
            </select>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input name='age' type="number" class="form-control" placeholder="Enter your age" min='1' max='50' value='{{$currentPlayer->age}}' >
        </div>

        <div class="form-group">
          <label for="link">Link Profile</label>
          <input name='link' type="text" class="form-control" placeholder="Enter your profile link" value='{{$currentPlayer->link}}'>
        </div>

        <div class="form-group">
          <label for="contact">Contact link</label>
          <input name='contact' type="text" class="form-control" placeholder="Enter your contact link" value='{{$currentPlayer->contact}}'>
        </div>

        <div class="form-group">
            <label for="description">About you</label>
            <textarea name='description' type="text" class="form-control" placeholder="Enter description">{{$currentPlayer->description}}</textarea>
            <small id="emailHelp" class="form-text tsext-muted">We'll never share your email with anyone else.</small>
        </div>
      
        <button type="submit" class="btn btn-primary mt-3">Edit</button>
    </form>

</div>
@endsection