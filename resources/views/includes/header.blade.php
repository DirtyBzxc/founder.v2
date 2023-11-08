<header class='mb-auto masthead'>
    <nav class="navbar navbar-expand-md navbar-light bg-light border-bottom">
        <div class="collapse navbar-collapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link text-dark ps-0 btn btn-light" aria-current="page" href="{{route('welcome.index')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark btn btn-light" aria-current="page" href="{{route('team.index')}}">Find a team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-dark btn btn-light" aria-current="page" href="{{route('player.index')}}">Find a player</a>
            </li>
          </ul>
          @if (!Auth::user())
            
          <ul class="navbar-nav ms-auto mb-2 mb-md-0">
              <li class="nav-item">
                <a class="nav-link text-dark btn btn-light" aria-current="page" href="{{route('register.index')}}">Register</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark pe-0 btn btn-light" aria-current="page" href="{{route('login.index')}}">Login</a>
              </li>
            </ul>
          @else

          <ul class="navbar-nav ms-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link text-dark btn btn-light" href='{{route('profile.show',session()->get('username'))}}' aria-current="page">Welcome, <strong>{{session()->get('username')}}</strong></a>
            </li>
            @if (Auth::user()->role == 2 or Auth::user()->role == 1)
            <li class="nav-item">
              <a class="nav-link text-dark btn btn-light" aria-current="page" href="{{route('admin.index')}}">Admin panel</a>
            </li>   
            @endif
            <li class="nav-item">
              <a class="nav-link text-dark btn btn-light" aria-current="page" href="{{route('login.logout')}}">Logout</a>
            </li>
           
          </ul>

          @endif
        </div>
    </nav>
</header>
