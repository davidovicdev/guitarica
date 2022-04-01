@extends('layouts.layout')
@section('title')
    About Author 
@endsection
@section('main')
<div class="container">
    <div class="page-header page-header-big text-center" style="background-image: url('{{asset("assets/images/background_about_author.jpg")}}')">
        <h1 class="page-title text-white">About Author<span class="text-white">Who I am</span></h1>
    </div><!-- End .page-header -->
</div><!-- End .container -->

<div class="page-content pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-3 mb-lg-0">
                <h2 class="title">I am Matija Davidovic</h2><!-- End .title -->
                <p>Currently I'm studying Visoka ICT college and im on final third year. I can freely say that I enjoy every moment of my learning programming adventure. It takes so much time to get good at it and it has so many opportunities to get you advanced with programming logic . </p>
            </div><!-- End .col-lg-6 -->

            <div class="col-lg-6">
                <h2 class="title">About guitarica</h2><!-- End .title -->
              <p>This website represents a requirement for my exam of PHP2, the Laravel framework. It has been build with template (this is my first website using template). With this website i learned a lot, first about MVC then about migrations, seeders and so on.</p>
            </div><!-- End .col-lg-6 -->
        </div><!-- End .row -->

        <div class="mb-5"></div><!-- End .mb-4 -->
    </div><!-- End .container -->

    <div class="bg-light-2 pt-6 pb-5 mb-6 mb-lg-8">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 mb-3 mb-lg-0">
                    <h2 class="title mb-3">My Wish</h2><!-- End .title -->
                    <p>My desire is to one day become a successful laravel or any other back-end programmer. I have learned a lot in a past weeks or even a months and that is just like a drop of water comparing to ocean. There are many things to discover and learn in programming 
                        from fly to elephant </p>

                    <a href="#" class="btn btn-sm btn-minwidth btn-outline-primary-2 mt-2">
                        <span>CONTACT ME</span>
                        <i class="icon-long-arrow-right"></i>
                    </a>
                </div><!-- End .col-lg-5 -->

                <div class="col-lg-6 offset-lg-1">
                    <div class="about-images">
                        <img src="{{asset("img/author.jpg")}}" alt="Matija Davidovic" class="about-img-front">
                    </div><!-- End .about-images -->
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .bg-light-2 pt-6 pb-6 -->
</div><!-- End .page-content -->
@endsection