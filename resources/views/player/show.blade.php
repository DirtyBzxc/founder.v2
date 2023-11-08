@extends('layouts.main')
@section('content')
<div class="container">
    <div class="row d-flex align-items-center mt-2 mb-2 text-center">
        <div class="col-md-12 text-center p-1 mt-3">
              <ul class="list-group-flush list-group shadow-lg border rounded">
                <li class="list-group-item pl-0 bg-dark text-light"><strong>{{$currentPlayer->nickname}}</strong></li>
                <li class="list-group-item">Age: {{$currentPlayer->age}}</li>
                <li class="list-group-item">Rank: {{$currentPlayer->rank}}</li>
                <li class="list-group-item">Main Role: {{$currentPlayer->role}}</li>
                <li class="list-group-item"><a class='text-decoration-none' href="{{$currentPlayer->link}}">Tracker Profile Link</a></li>
                <li class='list-group-item '>About me: <br> <strong class='text-dark'>{{$currentPlayer->description}}</strong></li>
                <a href='{{$currentPlayer->contact}}' class='btn btn-primary'>Contact me</a>
              </ul>
    </div>
    @can('edit-player',$currentPlayer)
    <div class="d-flex justify-content-center">
      <a class='btn btn-success w-100' href='{{route('player.edit',$currentPlayer->nickname)}}'>Edit my game profile</a>
    </div>  
    @endcan
    
</div>
@endsection