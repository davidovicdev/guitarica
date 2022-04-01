@extends('layouts.layout')
@section('title')
    Cart
@endsection
@section('main')
<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
    <div class="container">
        <h1 class="page-title">Shopping Cart<span>Shop</span></h1>
    </div><!-- End .container -->
</div><!-- End .page-header -->

<div class="page-content">
    <div class="cart">
        @if (session("msg"))
            <h1>{{session("msg")}}</h1>
        @endif
        <div class="container">
            <form action="{{route("order")}}" method="POST">
                @csrf
            <div class="row">
                <div class="col-lg-9">
                    
                    <table class="table table-cart table-mobile">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($products as $product)
                            <input type="hidden" name="product_id[]" value="{{$product->id}}">
                            <tr>
                               <td class="product-col">
                                   <div class="product">
                                       <figure class="product-media">
                                           <a href="#">
                                               <img src="{{asset("img/$product->firstImage")}}" alt="{{$product->name}}">
                                           </a>
                                       </figure>

                                       <h3 class="product-title">
                                           <a href="#">{{$product->name}}</a>
                                       </h3><!-- End .product-title -->
                                   </div><!-- End .product -->
                               </td>
                               <td class="price-col">{{$product->price}} EUR</td>
                               <td class="quantity-col">
                                   <div class="cart-product-quantity">
                                       <input type="number" class="form-control quantity" name="quantities[]" data-id="{{$product->id}}" value="{{$product->quantity}}" min="1" max="10" step="1" data-decimals="0" required>
                                   </div><!-- End .cart-product-quantity -->
                               </td>
                               <td class="total-col">{{$product->price * $product->quantity}} EUR</td>
                               <td class="remove-col"><button class="btn-remove remove-cart-item" data-id="{{$product->id}}"><i class="icon-close"></i></button></td>
                           </tr>
                                
                            @empty
                                <h3 class="text-center mt-2">No products in your cart</h3>
                            @endforelse
                        </tbody>
                    </table><!-- End .table table-wishlist -->
              
                   
                </div><!-- End .col-lg-9 -->
                @if(count($products) > 0)
                <aside class="col-lg-3 mt-2">
                    <div class="summary summary-cart">
                        <h3 class="summary-title">Cart Total</h3><!-- End .summary-title -->

                        <table class="table table-summary">
                            <tbody>
                                <tr class="summary-total">
                                    <td>Total:</td>
                                    <td id="totalPrice">{{$products->totalPrice}} EUR</td>
                                </tr><!-- End .summary-total -->
                            </tbody>
                        </table><!-- End .table table-summary -->
                        <input type="submit" class="btn btn-outline-primary-2 btn-order btn-block" value="ORDER NOW">
                    </div><!-- End .summary -->

                    <a href="{{route("products.index")}}" class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUE SHOPPING</span><i class="icon-refresh"></i></a>
                </aside><!-- End .col-lg-3 -->
                @endif
            </div><!-- End .row -->
        </form>
        </div><!-- End .container -->
    </div><!-- End .cart -->
</div><!-- End .page-content -->
@endsection