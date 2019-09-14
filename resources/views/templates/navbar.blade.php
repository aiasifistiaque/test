<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ url('app/home') }}">TestMate</a>
    <ul class="navbar-nav text-right">
                    
        @if (Auth::guest())
            <li class="nav-item w3-allerta ai-nav" ><a class="nav-link" href="/login">Login</a></li>
        @else
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle w3-allerta" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                   Signed in as {{ Auth::user()->name }} 
                </a>
                              
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item w3-allerta" href="/profile">Profile</a>
                    <a class="dropdown-item w3-allerta" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                        Logout 
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                       {{ csrf_field() }}
                    </form>
                </div>
            </li>      
        @endif
    </ul>
</nav>