@extends('layouts.main')
@section('content')
<div class="container">
 <h1>Admin panel</h1>
 <div class = 'd-flex'>
  <ul class = 'list-group'>
    <li class = 'list-group-item mb-2'><a class='link-primary' href="{{route('admin.request')}}">Requests to add a player</a></li>
    <li class = 'list-group-item mb-2'><a href="{{route('admin.list')}}">User list</a></li>
    @if (Auth::user()->role == 2)
    <li class = 'list-group-item'><a href="{{route('admin.role')}}">Role panel</a></li>
    @endif
   </ul>
 </div>
</div>
@endsection
