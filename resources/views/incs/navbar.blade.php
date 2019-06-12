<nav class="navbar navbar-dark bg-dark navbar-inverse navbar-expand-md  shadow-sm">
    
       
        <a class="navbar-brand" href="{{ url('/index') }}">
             <img src="https://fontmeme.com/temporary/37ee445d89899081b98188f557b9f7fa.png" width="100" height="40" class="d-inline-block align-top glow" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/index">Home <span class="sr-only"></span></a>
                  </li>
                <li> <a class="nav-link" href="/about">About</a></li>
                <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Pages
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a href= "/class" class="dropdown-item  " role="button" aria-pressed="true">Classrooms</a>
                                <a href= "/course" class="dropdown-item  " role="button" aria-pressed="true">Course</a>
                                <a href= "/department" class="dropdown-item  " role="button" aria-pressed="true">Department</a>
                                <a href="/lecturer" class="dropdown-item" role="button" aria-pressed="true">Lecturer </a>
                                <a href="/option" class="dropdown-item" role="button" aria-pressed="true">Option </a>
                                <a href="/schedule" class="dropdown-item" role="button" aria-pressed="true">Schedule</a>
                                <a href="/generate" class="dropdown-item" role="button" aria-pressed="true">Free Halls</a>
                                <a href="/book" class="dropdown-item" role="button" aria-pressed="true">Booked Hall</a>
                            </div>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
   
</nav>
<hr> 


