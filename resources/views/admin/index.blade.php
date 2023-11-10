@extends('layouts.main')
@section('content')
<div class="container">
 <h1 class='p-2'>Admin panel</h1>
 <div class = 'mb-4'>
  <ul class = 'list-group col-5'>
    <li class = 'list-group-item d-flex  justify-content-between  align-items-center bg-warning mb-2'>
    <a class='link-dark text-decoration-none' href="{{route('admin.request')}}">Requests to add a player</a>
    <span class="badge bg-success  rounded-pill">{{count($players)}}</span>
   </li>
   <li class = 'list-group-item d-flex justify-content-between align-items-center bg-warning mb-2'>
    <a class='link-dark text-decoration-none' href="{{route('admin.list')}}">User list</a>

   </li>
   @if (Auth::user()->role == 2)
   <li class = 'list-group-item d-flex  justify-content-between  align-items-center bg-warning'>
    <a class='link-dark text-decoration-none' href="{{route('admin.role')}}">Role panel</a>

   </li>
    @endif
   </ul>
 </div>
</div>
@endsection
