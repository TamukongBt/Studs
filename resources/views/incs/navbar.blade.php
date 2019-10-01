{{-- The style sheet for the index page  --}}
@include('incs.styles')

<nav class="navbar navbar-expand-md ">

    <div class="container-fluid text-dark">
        @guest
            <a id="brand" class="navbar-brand  align-self-end " href="{{ url('/') }}"
               style="display:block; font-weight:bolder;">
                <img src="{{asset('image/None.png')}}" alt="Upworks Logo" height="47px" width="120px">
            </a>
        @endguest

        @auth
            <div id="main">
                <span id="main" style="font-size:30px;cursor:pointer; display:block;" onclick="openNav()">&#9776;
                    @if (Auth::user()->admin==1)
                        <span id="shoo"></span>
                    @endif
                </span>
            </div>
    @endauth


    <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto navStyle ">
            <!-- Authentication Links -->
            @guest
                <div id="main2">
                <span id="main2" onclick="openNav1()">&#9776;
                </span>
                </div>
                <div id="mySidenav1" class="sidenav">
                    <a class="navbar-brand  align-self-end " href="{{ url('/') }}">
                        <img src="{{asset('image/None.png')}}" alt="Upworks Logo" height="50px" width="140px">
                    </a>
                    <ul class="list-unstyled components">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav1()">&times;</a>
                        <li class="li">
                            <a
                                    href="/schedule"><span>Timetable</span></a>
                        </li>

                        <li class="li">
                            <a
                                    href="{{ route('login') }}"><span>{{ __('Login') }}</span></a>
                        </li>
                    </ul>

                </div>

                <li id="longnav1" class="nav-item wrap ttable">
                    <a class="nav-link   text-dark "
                       href="/schedule"><span>Timetable</span></a>
                </li>

                <li id="longnav2" class="nav-item wrap">
                    <a class="nav-link  buton  text-dark "
                       href="{{ route('login') }}"><span>{{ __('Login') }}</span></a>
                </li>





                {{-- <li class="nav-item wrap">
                    <a class="nav-link buton text-dark" href="{{ route('register') }}"><i class="fa fa-user"
                                                                                          aria-hidden="true"></i> {{ __('Register') }}
                    </a>
                </li> --}}
            @else

                <a>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>



            @endguest
        </ul>
    </div>

</nav>
@if (isset(Auth::user()->name))
<div id="mySidenav" class="sidenav">
    <a class="navbar-brand  align-self-end " href="{{ url('/') }}">
        <img src="{{asset('image/None.png')}}" alt="Upworks Logo" height="50px" width="140px">
    </a>
    <ul class="list-unstyled components">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <li class="li">
            <a href="/about">About</a>
        </li>
        @if (Auth::user()->admin==0)
            <li class="li">
                <a href="/lindex" aria-pressed="true">Your Timetable</a>
            </li>
        @endif 
        <li class="li">
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle ">Pages</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">

                <li class="li">
                    <a href="/class" aria-pressed="true">Classrooms</a>
                </li>
                <li class="li">
                    <a href="/lecturer" aria-pressed="true">Lecturer </a>
                </li>
                <li class="li">
                    <a href="/option" aria-pressed="true">Option </a>
                </li>
                <li class="li">
                    <a href="/schedule" aria-pressed="true">Schedule</a>
                </li>
                <li class="li">
                    <a href="/generate" aria-pressed="true">Free Halls</a>
                </li>
                <li class="li">
                    <a href="/book" aria-pressed="true">Booked Hall</a>
                </li>

            </ul>
        </li>
        <li class="li">
            <a href="#">Contact</a>
        </li>

        <li class=" li bottom">
            {{-- check if user is logged in  --}}
            @if (isset(Auth::user()->name))
                <a class="dropdown-item text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }} <i class="fa fa-sign-out" aria-hidden="true"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
        {{-- check for users role to display List Of approval option --}}
        @if (Auth::user()->admin==1)
            <li class="li">
                <a href="/users" aria-pressed="true">Unapproved Users <span id="show"></span> </a>

            </li>
            @endif

            </li>
        @elseif (Route::has('register'))

            <li class="li bottom">
                <a class="nav-link text-dark" href="{{ route('register') }}"><i class="fa fa-user"
                                                                                aria-hidden="true"></i> {{ __('Register') }}
                </a>
            </li>
        @endif
    </ul>

</div>

@else





@endif


<script>
    function openNav() {
        var x = window.matchMedia("(max-width:768px)");
        myFunction(x);
        console.log(x);
        x.addListener(myFunction);

        function myFunction(x) {
            if (x.matches) {
                document.getElementById("mySidenav").style.width = "100%";
                document.getElementById("main").style.marginLeft = "0px";
            } else {
                document.getElementById("mySidenav").style.width = "30%";
                document.getElementById("main").style.marginLeft = "0px";
            }


        }
    }

                

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>
