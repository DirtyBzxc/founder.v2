@extends('layouts.main')
@section('content')
<div class="container">
    <div class = 'd-flex justify-content-between'>
        <h1 class='p-2'>User requests</h1>
        <a class='mt-3' href="{{route('admin.index')}}">Back</a>
    </div>
    <ul class="list-group mb-4"> 
        @foreach ($players as $player)
        <div class=''>
          <li class="list-group-item mb-2"> Username: {{$player->user['login']  }} 
            <br>
             Player: {{$player->nickname}} 
             <br> 
             Description:  {{ $player->description }}
             <br>
             Link: <a href="{{$player->link}}">{{$player->link}}</a>
             <br>
             Contact: <a href="{{$player->contact}}">{{$player->contact}}</a>
            <form action="{{route('admin.request.store',$player->id)}}" method="post">
            <button type="submit" class="btn btn-success mt-3">Approve</button></li>
            @csrf
          </form>

        </div>
    @endforeach
</div>
<div>{{$players->links()}}</div>
@endsection
