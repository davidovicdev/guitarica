@extends('layouts.layout')
@section('title')
    Homepage
@endsection
@section('main')


    <div class="mb-7 mb-lg-11"></div><!-- End .mb-7 -->

    <div class="container">
        <div class="cta cta-border cta-border-image mb-5 mb-lg-7" style="background-image: url(assets/images/demos/demo-3/bg-1.jpg);">
            <div class="cta-border-wrapper bg-white">
                <div class="row justify-content-center">
                    <div class="col-md-11 col-xl-11">
                        <div class="cta-content">
                            <div class="cta-heading">
                                <h3 class="cta-title text-right"><span class="text-primary">New Deals</span> <br>Start Daily at 12pm e.t.</h3><!-- End .cta-title -->
                            </div><!-- End .cta-heading -->

                            <div class="cta-text">
                                <p>Get <span class="text-dark font-weight-normal">FREE SHIPPING* & 5% rewards</span> on <br>every order with Guitarica program</p>
                            </div><!-- End .cta-text -->
                            <a href="{{route("products.index")}}" class="btn btn-primary btn-round"><span>Check out products!</span><i class="icon-long-arrow-right"></i></a>
                        </div><!-- End .cta-content -->
                    </div><!-- End .col-xl-7 -->
                </div><!-- End .row -->
            </div><!-- End .bg-white -->
        </div><!-- End .cta -->
    </div><!-- End .container -->

    <div class="bg-light deal-container pt-7 pb-7 mb-5">
        <div class="container">
            <div class="heading text-center mb-4">
                <h2 class="title">We recommend</h2><!-- End .title -->
                <p class="title-desc">Today’s deal and more</p><!-- End .title-desc -->
            </div><!-- End .heading -->

            <div class="row">
               
                <div class="col-lg-12">
                    <div class="products">
                        <div class="row">
                            @foreach ($products as $product)
                            <div class="col-3 d-flex flex-column justify-space-evenly">
                                <div class="product product-2">
                                    <figure class="product-media">
                                        <a href="product.php">
                                            <img src="{{asset("img/".$product->images()->first()->src)}}" alt="{{$product->name}}" class="product-image">
                                        </a>
                                    </figure><!-- End .product-media -->

                                    <div class="product-body">
                                        <div class="product-cat">
                                            <a href="#">{{$product->subCategory->name}}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{route("products.show",$product->id)}}">{{$product->name}}</a></h3><!-- End .product-title -->
                                        <div class="product-price">
                                            <span class="new-price">{{$product->price()->where("active",1)->first()->price}} EUR</span>
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                 <div class="ratings-val" style="width: {{$product->reviews()->avg("mark_id")*20}}%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">(  {{$product->reviews()->count()}} Reviews )</span>
                                        </div><!-- End .rating-container -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .product -->
                            </div><!-- End .col-sm-6 -->
                            @endforeach

                        </div><!-- End .row -->
                    </div><!-- End .products -->
                </div><!-- End .col-lg-6 -->
            </div><!-- End .row -->

            <div class="more-container text-center mt-3 mb-0">
                <a href="{{route("products.index")}}" class="btn btn-outline-dark-2 btn-round btn-more"><span>Show me more products</span><i class="icon-long-arrow-right"></i></a>
            </div><!-- End .more-container -->
        </div><!-- End .container -->
    </div><!-- End .deal-container -->
    <div class="icon-boxes-container mt-2 mb-2 bg-transparent">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-rocket"></i>
                        </span>
                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Free Shipping</h3><!-- End .icon-box-title -->
                            <p>No matter of distance</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-rotate-left"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Free Returns</h3><!-- End .icon-box-title -->
                            <p>Within 30 days</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-info-circle"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">Get 20% Off 1 Item</h3><!-- End .icon-box-title -->
                            <p>when you sign up</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="icon-box icon-box-side">
                        <span class="icon-box-icon text-dark">
                            <i class="icon-life-ring"></i>
                        </span>

                        <div class="icon-box-content">
                            <h3 class="icon-box-title">We Support</h3><!-- End .icon-box-title -->
                            <p>24/7 amazing services</p>
                        </div><!-- End .icon-box-content -->
                    </div><!-- End .icon-box -->
                </div><!-- End .col-sm-6 col-lg-3 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .icon-boxes-container -->

    <div class="container">
        <div class="cta cta-separator cta-border-image cta-half mb-0" style="background-image: url(assets/images/demos/demo-3/bg-2.jpg);">
            <div class="cta-border-wrapper bg-white">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="cta-wrapper cta-text text-center">
                            <h3 class="cta-title">Shop Social</h3><br><!-- End .cta-title -->
                            <p class="cta-desc">Follow us on Facebook, Twitter and other social platforms ! </p><!-- End .cta-desc -->

                            <div class="social-icons social-icons-colored justify-content-center">
                                <a href="https://www.facebook.com/" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                <a href="https://www.twitter.com/" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                <a href="https://www.instagram.com/" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                <a href="https://www.youtube.com/" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                                <a href="https://www.pinterest.com/" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                            </div><!-- End .soial-icons -->
                        </div><!-- End .cta-wrapper -->
                    </div><!-- End .col-lg-6 -->

                    <div class="col-lg-6">
                        <div class="cta-wrapper text-center">
                            <h3 class="cta-title">Get the Latest Deals</h3><br><!-- End .cta-title -->
                            <p class="cta-desc">subscribe and get <span class="text-primary">20 EUR coupon</span> for first shopping</p><!-- End .cta-desc -->

                            <form action="#">
                                <div class="input-group">
                                    <input type="email" id="subscribe_email" class="form-control" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-rounded" id="subscribe" type="submit"><i class="icon-long-arrow-right"></i></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                        </div><!-- End .cta-wrapper -->
                    </div><!-- End .col-lg-6 -->
                </div><!-- End .row -->
            </div><!-- End .bg-white -->
        </div><!-- End .cta -->
    </div><!-- End .container -->


@endsection