<style>
/* The side navigation menu */
.sidenav {
  height: 100%; /* 100% Full-height */
  width: 0; /* 0 width - change this with JavaScript */
  position: fixed; /* Stay in place */
  z-index: 1; /* Stay on top */
  top: 0; /* Stay at the top */
  left: 0;
  background-color: #111; /* Black*/
  overflow-x: hidden; /* Disable horizontal scroll */
  padding-top: 60px; /* Place content 60px from the top */
  transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
}

/* The navigation menu links */
.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

/* When you mouse over the navigation links, change their color */
.sidenav a:hover {
  color: #f1f1f1;
}

/* Position and style the close button (top right corner) */
.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

/* Style page content - use this if you want to push the page content to the right when you open the side navigation */


/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

#sidebar ul li.active>a,
a[aria-expanded="true"] {
    color: #fff;
    background: #050507;
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
.li{
    font-size: 20px;
    font-weight: 300;
}

ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #050507;
}

</style>

<nav class="navbar navbar-dark bg-light navbar-inverse navbar-expand-md  shadow-sm">
    
        <div id="main">
        <span id="main" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
        </div>
        
        
              


        

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item ">
                            <a class="nav-link text-dark" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

<div id="mySidenav" class="sidenav">
    <ul class="list-unstyled components">
            
            <li class="active">
                <a href="/index"><span class="sr-only">Home </span></a>
            </li>
            </li>
            <li>
                <a  href="/about">About</a>
            </li>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        
        <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li class="li">
                        <a href= "/class"  aria-pressed="true">Classrooms</a>
                    </li >
                    <li class="li">
                        <a href="/lecturer"  aria-pressed="true">Lecturer </a>
                    </li>
                    <li class="li">
                        <a href="/option"  aria-pressed="true">Option </a>
                    </li>
                    <li class="li">
                        <a href="/schedule" aria-pressed="true">Schedule</a> 
                    </li>
                    <li class="li">
                        <a href="/generate"  aria-pressed="true">Free Halls</a>
                    </li>
                    <li class="li">
                        <a href="/book"  aria-pressed="true">Booked Hall</a> 
                    </li>
                </ul>
            </li class="li">
        <a href="#">Contact</a>
      </div>
      

      <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "0px";
      }
      
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
      }
      </script>


