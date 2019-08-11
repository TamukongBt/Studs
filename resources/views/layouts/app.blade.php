<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Studs') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/af-2.3.3/b-1.5.6/cr-1.5.0/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/datatables.min.css"/>
    <link href="{{asset('css/fab.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/preloader.css')}}" rel="stylesheet" type="text/css">


    <!-- Styles -->
    <link rel="stylesheet" type="text/css"
          href="https://cdn.datatables.net/v/bs4/dt-1.10.18/af-2.3.3/b-1.5.6/cr-1.5.0/fc-3.2.5/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/datatables.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- Compiled and minified CSS -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css"> --}}
</head>
<body>
        <div id="loader">
                <img src="{{asset('image/Book.gif')}}" alt="Loading" width="24%" >
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
<script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.18/af-2.3.3/b-1.5.6/cr-1.5.0/fh-3.1.4/kt-2.5.0/r-2.2.2/rg-1.1.0/datatables.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="{{asset('js/tableToCards.js')}}"></script>
<script type="text/javascript">
    var loader = document.getElementById("loader");

    window.addEventListener("load",function(){
        $("#loader").fadeOut("slow");
        loader.style.visibility="hidden";

    })
</script>
</html>
