@extends('layouts.layout')
@section('title')
    404
@endsection
@section('main')
<div class="error-content text-center" style="background-image: url(assets/images/backgrounds/error-bg.jpg)">
    <div class="container">
        <h1 class="error-title">Error 404</h1><!-- End .error-title -->
        <p>We are sorry, the page you've requested is not available.</p>
        <a href="index.php" class="btn btn-outline-primary-2 btn-minwidth-lg">
            <span>BACK TO HOMEPAGE</span>
            <i class="icon-long-arrow-right"></i>
        </a>
    </div>
</div>
@endsection