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

<div id="app">
    @include('incs.navbar')
    <div class="container">
        @include('incs.messages')


        <main class="py-4">
        @yield('content')
        <!-- Scripts -->

        </main>


    </div>
</div>
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
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/dt-1.10.18/b-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/rr-1.2.4/sc-2.0.0/sl-1.3.0/datatables.min.js"></script>
{{-- preloader  --}}
<script type="text/javascript">
    var loader = document.getElementById("loader");
    window.addEventListener("load", function () {
        $("#loader").fadeOut("slow");
        loader.style.visibility = "hidden";

    })
</script>
{{-- Datatable to control tables --}}
<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTable').DataTable({
            "info": false,
            "paging": false,
            "lengthChange": false,
            "searching": true
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


@include('incs.bookhall')


</html>