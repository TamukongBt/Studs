<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#218eee">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Studs') }}</title>
    <link href="{{asset('css/preloader.css')}}" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
          integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="{{asset('css/fab.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/kc.fab.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/backtotop.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/aos.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('fonts/simple-line-icons.min.css?h=03ab36d1dde930b7d44a712f19075641')}}">


    <!-- Styles -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/tablesaw.stackonly.css')}}">
    <link rel="stylesheet" href="{{asset('css/tablesaw.css')}}">

    <!-- Compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> --}}
</head>

<body>
<div id="loader">
    <img src="{{asset('image/Book.gif')}}" alt="Loading" width="24%">
</div>

@include('incs.styles')


<body id="page-top">
<nav class="navbar navbar-expand-md navbar-light">
    @guest
        <a id="brand" class="navbar-brand  align-self-end text-light " href="{{ url('/') }}"
           style="display:block; font-weight:bolder;">
            <img src="{{asset('image/None.png')}}" alt="Upworks Logo" height="47px" width="120px">
        </a>
    @endguest

    @auth
        <div id="main">
                                <span id="main" style="font-size:30px;cursor:pointer; display:block;"
                                      onclick="openNav()">&#9776;
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
        @else

            <a>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>



            @endguest
            </div>

</nav>
@if (isset(Auth::user()->name))
    <div id="mySidenav" class="sidenav">
        <a class="navbar-brand  align-self-end " href="{{ url('/') }}">
            <img src="{{asset('image/None.png')}}" alt="Upworks Logo" height="47px" width="120px">
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
            {{-- check for users role to display List Of approval option --}}
            @if (Auth::user()->admin==1)
                <li class="li">
                    <a href="/users" aria-pressed="true">Unapproved Users <span id="show"></span> </a>

                </li>
            @endif

            {{-- check if user is logged in  --}}
            @if (isset(Auth::user()->name))
                <a class="dropdown-item text-dark" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }} <i class="fa fa-sign-out" aria-hidden="true"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
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

<div class="backgdiv row ">
    <img src="{{asset('image/homep.png')}}" alt="home elephant" class="backg col">
    <div class="col-lg-7 col-xl-3 mx-auto captione"><h2>Welcome To UPWorks</h2><br></div>
</div>
<section id="about" class="content-section bg-light">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-10 col-xl-3 mx-auto" style="padding: 9px;padding-top: 110px;padding-left: 37px;">
                <h5 style="font-family: Montserrat, sans-serif;">Stylish Portfolio is the perfect theme for your next
                    project!</h5>
                <p class="lead mb-5"><span style="font-family: Montserrat, sans-serif;font-size: 16px;margin: -3px;">This theme features a flexible, UX friendly sidebar menu and stock photos from our friends at&nbsp;</span><a
                            href="https://unsplash.com/">Unsplash</a><span>!</span></p>
            </div>
            <div class="col"><img class="resized"
                                  src="{{asset('image/Artboard%203@2x.png?h=84bb7813d8bb4f3584fdb7a2c79dd640')}}"></div>
        </div>
    </div>
</section>
<section id="services" class="content-section text-white text-center" style="background-color: #ffffff;">
    <div class="container">
        <div class="content-section-heading">
            <h2 class="mb-5" style="font-family: Montserrat, sans-serif;color: rgb(33,142,238);">What We Offer</h2>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0"><span
                        class="text-primary border-primary mx-auto service-icon rounded-circle mb-3"
                        style="color: #218eee;"><i class="icon-screen-smartphone"></i></span>
                <h4><strong style="color: #080707;font-family: Montserrat, sans-serif;">Responsive</strong></h4>
                <p class="mb-0 text-faded"
                   style="color: rgba(7,6,6,0.7);font-family: 'Montserrat Alternates', sans-serif;">Looks great on any
                    screen size!</p>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0"><span class="mx-auto service-icon rounded-circle mb-3"
                                                              style="color: #218eee;"><i class="icon-pencil"></i></span>
                <h4><strong style="color: rgb(6,4,4);font-family: Montserrat, sans-serif;">Redesigned</strong></h4>
                <p class="mb-0 text-faded"
                   style="color: rgba(8,7,7,0.7);font-family: 'Montserrat Alternates', sans-serif;">Freshly redesigned
                    for Bootstrap 4.</p>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0"><span class="mx-auto service-icon rounded-circle mb-3"
                                                              style="color: #218eee;"><i class="icon-like"></i></span>
                <h4><strong style="color: rgb(7,6,6);font-family: Montserrat, sans-serif;">Favorited</strong></h4>
                <p class="mb-0 text-faded"
                   style="color: rgba(3,2,2,0.7);font-family: 'Montserrat Alternates', sans-serif;"><span>Milions of users&nbsp;</span><i
                            class="fa fa-heart"></i><span>&nbsp;us!</span></p>
            </div>
            <div class="col-md-6 col-lg-3 mb-5 mb-lg-0"><span class="mx-auto service-icon rounded-circle mb-3"
                                                              style="color: #218eee;"><i
                            class="icon-mustache"></i></span>
                <h4><strong style="color: rgb(7,6,6);font-family: Montserrat, sans-serif;">Question</strong></h4>
                <p class="mb-0 text-faded"
                   style="color: rgba(7,6,6,0.7);font-family: 'Montserrat Alternates', sans-serif;">I mustache you a
                    question...</p>
            </div>
        </div>
    </div>
</section>

<section class="content-section bg-primary text-white"></section>
<footer class="footer text-center">
    <div class="container">
        <ul class="list-inline mb-5">
            <li class="list-inline-item">&nbsp;<a class="text-white social-link rounded-circle" href="#"><i
                            class="icon-social-facebook"></i></a></li>
            <li class="list-inline-item">&nbsp;<a class="text-white social-link rounded-circle" href="#"><i
                            class="icon-social-twitter"></i></a></li>
            <li class="list-inline-item">&nbsp;<a class="text-white social-link rounded-circle" href="#"><i
                            class="icon-social-github"></i></a></li>
        </ul>
        <p class="text-muted mb-0 small">Copyright &nbsp;© UPWorks 2018</p>
    </div>
    <a class="js-scroll-trigger scroll-to-top rounded" href="#page-top"><i class="fa fa-angle-up"></i></a></footer>

</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

<script src="{{asset('js/tableToCards.js')}}"></script>
<script src="{{asset('js/tablesaw.jquery.js')}}"></script>
<script src="{{asset('js/kc.fab.min.js')}}"></script>
<script src="{{asset('js/tablesaw-init.js')}}"></script>
<script src="{{asset('js/aos.js')}}"></script>
<script src="{{asset('js/script.min.js?h=1cce0f8a2c230c0491eb97f5e991598a')}}"></script>
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
{{-- preloader  --}}
<script type="text/javascript">
    var loader = document.getElementById("loader");
    window.addEventListener("load", function () {
        $("#loader").fadeOut("slow");
        loader.style.visibility = "hidden";

    });
    AOS.init();
</script>
{{-- Datatable to control tables --}}
<script type="text/javascript">
    $(document).ready(function () {
        $('#datatable').DataTable({
            "paging": false,
            "ordering": false,
            "info": false
        });

    });
</script>
{{-- Back To Top --}}
<script>
    $(window).scroll(function () {
        if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
            $('#return-to-top').fadeIn(200);    // Fade in the arrow
        } else {
            $('#return-to-top').fadeOut(200);   // Else fade out the arrow
        }
    });
    $('#return-to-top').click(function () {      // When arrow is clicked
        $('body,html').animate({
            scrollTop: 0                       // Scroll to top of body
        }, 500);
    });
</script>

<script>
    $(document).ready(function () {
        $('#fab1').hide();
        $('#fab2').hide();
        $('#bars').click(function () {
            $('#fab1').toggle("fast");
            $('#fab2').toggle("fast");
        });
        $.ajax({
            url: '/count',
            type: 'get',
            success: function (response) {

                var len = null;
                if (response != 0) {
                    len = response;
                    $("#show").html("<span class=" + "badge" + ">" + len + "</span>");
                    $("#shoo").html("<span class=" + "badge" + ">!</span>");

                }

            },
            error: function (xhr) {
                console.log("error weyy");
            }
        });
    });
</script>
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
<script>
    function openNav1() {
        document.getElementById("mySidenav1").style.width = "100%";
        document.getElementById("main").style.marginLeft = "0px";
    }


    function closeNav1() {
        document.getElementById("mySidenav1").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }
</script>


@include('incs.bookhall')


</html>
    
