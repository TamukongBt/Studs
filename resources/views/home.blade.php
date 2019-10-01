@extends('layouts.app')
@section('content')
    <section id="portfolio" class="content-section">
        <div class="container">
            <div class="content-section-heading text-center">
                <h3 class="text-secondary mb-0">Portfolio</h3>
                <h2 class="mb-5">Welcome {{ Auth::user()->name }}</h2>
            </div>
            <div class="row no-gutters">
                <div class="col-lg-6">
                    <a class="portfolio-item" href="/book">
                        <div class="caption">
                            <div class="caption-content">
                                <h2>See All Booked Halls</h2>
                                <p class="mb-0">Take a look at who is where Today </p>
                        </div>
                        </div>
                        <img class="img-fluid"
                             src="{{asset('image/portfolio-1.jpg?h=f2911623a5f1dddbd3135b8ecfe93633')}}"></a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item" href="/users">
                        <div class="caption">
                            <div class="caption-content">
                                <h2>Unapproved Users</h2>
                                <p class="mb-0">See all new users</p>
                            </div>
                        </div>
                        <img class="img-fluid"
                             src="{{asset('image/portfolio-2.jpg?h=ee725215485ad0888dec967bb2ab719a')}}"></a>
                </div>
                <div class="col-lg-6">
                    <a class="portfolio-item" href="/generate">
                        <div class="caption">
                            <div class="caption-content">
                                <h2>See the All Free Halls</h2>
                                <p class="mb-0">Which classes can we see today take a look</p>
                            </div>
                        </div>
                        <img class="img-fluid"
                             src="{{asset('image/portfolio-3.jpg?h=dac0fc6aa004db1c17158331305cd767')}}"></a>
            </div>
                <div class="col-lg-6">
                    <a class="portfolio-item" href="#">
                        <div class="caption">
                            <div class="caption-content">
                                <h2>Workspace....Coming Soon</h2>
                                <p class="mb-0">See who has booked what for the past weeks </p>
                            </div>
                        </div>
                        <img class="img-fluid"
                             src="{{asset('image/portfolio-4.jpg?h=33c1d034720bc92a7eb662caf27f10bb')}}"></a>
                </div>
            </div>
        </div>
    </section>
@endsection
