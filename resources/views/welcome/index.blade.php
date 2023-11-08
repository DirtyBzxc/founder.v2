@extends('layouts.main')
@section('title','Founder')
@section('content')
   <main role="main" class="inner cover text-center">
    <h1 class="cover-heading mt-2">Welcome to Founder</h1>
    <p class="lead">Founder is website for finding teams and creating one. Search, communicate, and become a natural professional player.</p>
    <img src="images/welcome.jpg" class='img w-50 shadow-lg rounded img-thumbnail' alt="">
    <br>
      <a href="{{route('register.index')}}" class="btn btn-lg btn-outline-dark mt-2">Get started</a>
    </p>
  </main>
@endsection