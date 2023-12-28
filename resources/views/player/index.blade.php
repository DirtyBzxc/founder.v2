@extends('layouts.main')
@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
      <div class="form-group">
           <form action="{{route('player.index')}}" method="get">
              <label for="sort"></label>
              <div class='d-flex justify-content-between'>
                <select name='sort' class="form-select" id="exampleFormControlSelect1">
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
                <button type="submit" class="btn btn-dark ms-2">Sort</button>
              </div>
              
           </form>
          </div>
            <div class="mt-3">
            @if (isset($user->player['id']))
               @if ($user->player['approved'] == true)
               <a class='btn btn-primary' href='{{route('player.show',$user->player['nickname'])}}'>Watch my profile</a>
               @else
               <p class='badge bg-secondary p-3'>Your profile is being reviewed by moderation</a>
               @endif

              @else
              <a class='btn btn-primary' href='{{route('player.create')}}'>Add my profile</a>
              @endif
            </div>
     </div>
     @if (!count($players))
     <div class="row d-flex align-items-center mt-2 mb-2 text-center"><p>Players not found...</p><a href="{{route('player.index')}}">Back</a></div>
    @else
    <div class="row d-flex align-items-center mt-2 mb-2 text-center">
      @if (!empty($sort))
           <div><h3>{{$sort}} rank players</h3></div>
      @endif
      @foreach ($players as $player)
      @if ($player->approved)
        
      <div class="col-md-2 text-center p-1 m-3">
             <ul class="list-group-flush list-group shadow-lg border rounded">
              <li class="list-group-item pl-0 bg-dark text-light"><strong>{{$player->nickname}}</strong></li>
              <li class="list-group-item">Age: {{$player->age}}</li>
              <li class="list-group-item"><img class='thumbnail w-25 h-25' src="images/ranks/{{$player->rank . '.png'}}" alt=""></li>
              <li class="list-group-item">{{$player->role}}</li>
              <li class="list-group-item"><a class='text-decoration-none' href="{{$player->link}}">Tracker Profile Link</a></li>
              <a href='{{route('player.show',$player->nickname)}}' class='btn btn-primary'>Read more</a>
            </ul>
      </div> 
       @endif
      @endforeach
    </div>
    @endif
</div>
<div>{{$players->links()}}</div>
@endsection