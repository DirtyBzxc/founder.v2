@extends('layouts.main')
@section('content')
<div class="container">
    <div class = 'd-flex justify-content-between'>
        <h1>User list</h1>
        <a class='mt-3' href="{{route('admin.index')}}">Back</a>
    </div>
 <ul class="list-group mb-4"> 
    @foreach ($players as $player)
    <div class=''>
      <li class="list-group-item mb-2"> Username: {{$player->user['login']  .  ' Player nickname: ' . $player->nickname . ' User email: ' . $player->user['email']}}</li>
    </div>

    @endforeach
  </ul>
</div>
<div>{{$players->links()}}</div>
@endsection
