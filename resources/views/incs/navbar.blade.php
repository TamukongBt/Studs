<style>
    /* The side navigation menu */
    .sidenav {
        height: 100%;
        /* 100% Full-height */
        width: 0;
        /* 0 width - change this with JavaScript */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Stay on top */
        top: 0;
        /* Stay at the top */
        left: 0;
        background-color: #fff;
        /* Black*/
        overflow-x: hidden;
        /* Disable horizontal scroll */
        padding-top: 60px;
        /* Place content 60px from the top */
        transition: 0.5s;
        /* 0.5 second transition effect to slide in the sidenav */
    }

    /* The navigation menu links */
    .sidenav a {

        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 30px;
        color: #1b1e21;
        display: block;
        transition: 0.3s;
        text-align: center;
    }

    /* When you mouse over the navigation links, change their color */
    .li :hover {
        font-size: 20px;

        transition: 0.3s;
    }

    /* Position and style the close button (top right corner) */
    .sidenav .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        float: left;

    }

    /* Style page content - use this if you want to push the page content to the right when you open the side navigation */


    /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
    @media screen and (max-height: 450px) {
        .sidenav {
            padding-top: 15px;
        }

        .sidenav a {
            font-size: 18px;
        }
    }

    #sidebar ul li.active > a,
    a[aria-expanded="true"] {
        color: #fff;
        background: dodgerblue;
    }

    a[data-toggle="collapse"] {
        position: relative;
    }

    .dropdown-toggle::after {
        display: block;
        position: absolute;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }

    .li {
        font-size: 25px;
        font-weight: 300;
    }

    ul ul a {
        font-size: 0.9em !important;
        padding-left: 30px !important;
        background: ghostwhite;
    }

    .bottom {
        bottom: 20px;
        position: absolute;
        padding: 4px;
        width: 100%;


    }


    .buton {
        -webkit-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
        -moz-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
        -ms-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
        -o-transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
        transition: all 200ms cubic-bezier(0.390, 0.500, 0.150, 1.360);
        display: block;
        font-size-adjust: inherit;
        max-width: 180px;
        text-decoration: none;
        border-radius: 20px;

    }

    .buton span {
        font-weight: bold;
        padding-left: 10px;
        padding-right: 10px;
    }

    .buton {
        color: dodgerblue;
        box-shadow: dodgerblue 0 0px 0px 2px inset;
    }

    .buton:hover {
        color: dodgerblue;
        box-shadow: dodgerblue 0 0px 0px 40px inset;
    }

    .badge {
        position: relative;
        top: -10px;
        right: -10px;
        padding: 0px 4px;
        border-radius: 50%;
        background: red;
        color: white;
    }
</style>

<nav class="navbar navbar-expand-md navbar-light      ">

    <div class="container-fluid text-dark">
        @guest
            <a id="brand" class="navbar-brand  align-self-end " href="{{ url('/') }}"
               style="display:block; font-weight:bolder;">
                {{ config('app.name') }}
            </a>
        @endguest

        @auth
            <div id="main">
                <span id="main" style="font-size:30px;cursor:pointer; display:block;" onclick="openNav()">&#9776;<span
                            id="shoo"></span></span>
            </div>
    @endauth


    <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item wrap">
                    <a class="nav-link  buton  text-dark "
                       href="{{ route('login') }}"><span>{{ __('Login') }}</span></a>
                </li>

                <li class="nav-item wrap">
                    <a class="nav-link buton text-dark" href="{{ route('register') }}"><i class="fa fa-user"
                                                                                          aria-hidden="true"></i> {{ __('Register') }}
                    </a>
                </li>
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
        {{ config('app.name') }}
    </a>
    <ul class="list-unstyled components">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <li class="li">
            <a href="/about">About</a>
        </li>
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
        document.getElementById("mySidenav").style.width = "100%";
        document.getElementById("main").style.marginLeft = "0px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>