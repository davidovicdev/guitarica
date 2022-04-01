
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="widget widget-about">
                        <img src="{{asset('assets/images/demos/demo-3/logo-footer.png')}}" class="footer-logo" alt="Guitarica Logo" width="220px" height="35px">
                        <p>We are Guitarica. Best music instrument shop located in Belgrade. Feel free to visit us !</p>

                        <div class="widget-call">
                            <i class="icon-phone"></i>
                            Got Question? Call us 24/7
                            <a href="tel:#">+381/62-583-1125</a>
                        </div><!-- End .widget-call -->
                    </div><!-- End .widget about-widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            <li><a href="about.php">About us</a></li>
                            <li><a href="faq.php">FAQ</a></li>
                            <li><a href="contact.php">Contact us</a></li>
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                        <ul class="widget-list">
                            @if(session()->has("user"))
                            <li><a href="{{route("cart.index")}}">View Cart</a></li>
                            <li><a href="{{route("wishlist")}}">My Wishlist</a></li>
                            @else
                            <li><a href="#signin-modal" data-toggle="modal">Sign In</a></li>
                            @endif  
                        </ul><!-- End .widget-list -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->
                <div class="col-sm-6 col-lg-3">
                    <div class="widget">
                        <h4 class="widget-title"><a href="{{asset("guitarica.docx")}}" target="_blank">Documentation</a></h4><!-- End .widget-title -->
                    </div><!-- End .widget -->
                </div><!-- End .col-sm-6 col-lg-3 -->

               
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .footer-middle -->

    <div class="footer-bottom">
        <div class="container">
            <p class="footer-copyright">Copyright © 2021 Guitarica Store. All Rights Reserved.</p><!-- End .footer-copyright -->
            <figure class="footer-payments">
                <img src="{{asset('assets/images/payments.png')}}" alt="Payment methods" width="272" height="20">
            </figure><!-- End .footer-payments -->
        </div><!-- End .container -->
    </div><!-- End .footer-bottom -->