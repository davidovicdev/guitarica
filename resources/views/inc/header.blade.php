
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <a href="tel:#"><i class="icon-phone"></i>Call: +381/62-583-1125</a>
            </div><!-- End .header-left -->

            <div class="header-right">

                <ul class="top-menu">
                    <li>

                        <ul>
                            @if(session("user"))
                            <li><a href="{{route("dashboard")}}">My Account</a></li>
                            <li><form action="{{route("logout")}}" method="POST"><button type="submit" class="btn btn-dark">Logout</button> @csrf</form></li>
                            @else
                            <li><a href="#signin-modal" data-toggle="modal">Log in / Register</a></li>
                            @endif
                        </ul>
                    </li>
                </ul><!-- End .top-menu -->
            </div><!-- End .header-right -->

        </div><!-- End .container -->
    </div><!-- End .header-top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{route("index")}}" class="logo">
                    <img src="{{asset('assets/images/demos/demo-3/logo.png')}}" alt="Guitarica Logo" width="250px" height="48px">
                </a>
            </div><!-- End .header-left -->

            <div class="header-center">
                <div class="header-search header-search-extended header-search-visible d-none d-lg-block">
                    <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                    <form action="{{route("products.index")}}" method="GET">
                        <div class="header-search-wrapper search-wrapper-wide">
                            <label for="q" class="sr-only">Search</label>
                                <input type="search" class="form-control" name="search" id="search" placeholder="Search product ..." required>
                                <button class="btn btn-primary" type="submit" id="search-button"><i class="icon-search"></i></button>
                        </div><!-- End .header-search-wrapper -->
                    </form>
                </div><!-- End .header-search -->
            </div>

            <div class="header-right">


                @if(session()->has("user"))
                <div class="wishlist">
                    <a href="{{route('wishlist')}}" title="Wishlist">
                        <div class="icon">
                            <i class="icon-heart-o"></i>
                            <span class="wishlist-count badge" id="wishlistCounter">{{$wishlistCounter}}</span>
                        </div>
                        <p>Wishlist</p>
                    </a>
                </div>
                <div class="dropdown cart-dropdown">
                    <a href="{{route("cart.index")}}" class="dropdown-toggle">
                        <div class="icon">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count" id="cartCounter">{{$cartCounter}}</span>
                        </div>
                        <p>Cart</p>
                    </a>
                </div><!-- End .cart-dropdown -->
                @endif
            </div><!-- End .header-right -->
        </div><!-- End .container -->
    </div><!-- End .header-middle -->

    <div class="header-bottom sticky-header">
        <div class="container">
            
            <div class="header-center">
                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        @foreach ($menu as $m)
                        
                        <li class="@if(Route::is($m->route))
                            active
                            @endif"><a href="{{route($m->route)}}">{{$m->title}}</a></li>
                        @endforeach
                        @if(session()->has("user") AND session()->get("user")->role_id == 2)
                         <li class="@if(Route::is("adminpanel.index"))
                            active
                            @endif"><a href="{{route("adminpanel.index")}}">Admin Panel</a></li>
                        @endif
                    </ul><!-- End .menu -->
                </nav><!-- End .main-nav -->
            </div><!-- End .header-center -->

            <div class="header-right">
                <i class="la la-lightbulb-o"></i>
                <p>Clearance<span class="highlight">&nbsp;Up to 30% Off</span></p>
            </div>
        </div><!-- End .container -->
    </div><!-- End .header-bottom -->
