@extends('layouts.layout')
@section('title')
    Dashboard
@endsection
@section('main')
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">My Account<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <div class="page-content">
        <div class="dashboard">
            <div class="container">
                @if (session("msg"))
                    <h5 class="text-center text-success mt-2">{{session("msg")}}</h5>
                @endif
                <div class="row">
                    <aside class="col-md-4 col-lg-3">
                        <ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab-orders-link" data-toggle="tab" href="#tab-orders" role="tab" aria-controls="tab-orders" aria-selected="false">Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">My info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Edit info</a>
                            </li>
                        </ul>
                    </aside><!-- End .col-lg-3 -->

                    <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
                                @forelse ($orders as $order)
                                <div class="mt-2"></div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Order #{{$order->id}} : </h3><br><!-- End .card-title -->
                                                <p>
                                                    <span class="h6">Products: </span><br> 
                                                
                                                    <ul>
                                                    @foreach ($order->products as $product)
                                                        <li><span class="h6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;{{$product->product_name}} ({{$product->quantity}})</span></li>
                                                    @endforeach
                                                </ul>
                                                <span class="h6">Total Price:&nbsp;</span>{{$order->total}} EUR <br> 
                                                <span class="h6">Address:&nbsp;</span>{{session("user")->address}}<br>
                                                <span class="h6">Phone:&nbsp;</span>{{session("user")->phone}}<br>
                                                <span class="h6">Order datetime:&nbsp;</span>{{$order->created_at}}<br>
                                                </p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                                @empty
                                    
                                <p>No order has been made yet.</p>
                                <a href="{{route("products.index")}}" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
                                @endforelse
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
                                <div class="mt-2"></div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card card-dashboard">
                                            <div class="card-body">
                                                <h3 class="card-title">Shipping Address</h3><br><!-- End .card-title -->
                                                <p>
                                                    <span class="h6">Full Name:&nbsp;</span>{{session("user")->first_name}} {{session("user")->last_name}}<br>
                                                    <span class="h6">Address:&nbsp;</span>{{session("user")->address}}<br>
                                                    <span class="h6">Phone:&nbsp;</span>{{session("user")->phone}}<br>
                                                    <span class="h6">Email:&nbsp;</span>{{session("user")->email}}<br><br>
                                                </p>
                                            </div><!-- End .card-body -->
                                        </div><!-- End .card-dashboard -->
                                    </div><!-- End .col-lg-6 -->
                                </div><!-- End .row -->
                            </div><!-- .End .tab-pane -->

                            <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
                                <form action="#" class="mt-2">
                                    <label>Email address *</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{session("user")->email}}" required>
                                    <span class="text-danger" id="emailError"></span><br>
                                    <label>Address *</label>
                                    <input type="text" class="form-control" name="address" id="address" value="{{session("user")->address}}" required>
                                    <span class="text-danger" id="addressError"></span><br>
                                    <label>Phone *</label>
                                    <input type="text" class="form-control" name="phone" id="phone" value="{{session("user")->phone}}" required>
                                    <span class="text-danger" id="phoneError"></span><br>

                                    <button type="submit" class="btn btn-outline-primary-2 mt-2" id="editInfo">
                                        <span>SAVE CHANGES</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div>
                    </div><!-- End .col-lg-9 -->
                </div><!-- End .row -->
            </div><!-- End .container -->
        </div><!-- End .dashboard -->
    </div><!-- End .page-content -->
@endsection