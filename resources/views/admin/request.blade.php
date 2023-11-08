@extends('layouts.main')
@section('content')
<div class="container">
    <div class = 'd-flex justify-content-between'>
        <h1>User requests</h1>
        <a class='mt-3' href="{{route('admin.index')}}">Back</a>
    </div>
    <ul class="list-group mb-4"> 
        @foreach ($players as $player)
        <div class=''>
          <li class="list-group-item mb-2"> Username: {{$player->user['login']  .  ' Player nickname: ' . $player->nickname . ' User email: ' . $player->user['email']}}
            <form action="{{route('admin.request.store',$player->id)}}" method="post">
            <button type="submit" class="btn btn-success mt-3">Approve</button>
            @csrf
          </form>

        </div>
    @endforeach
</div>
<div>{{$players->links()}}</div>
@endsection
