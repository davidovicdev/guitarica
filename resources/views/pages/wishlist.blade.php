@extends('layouts.layout')
@section('title')
    Wishlish
@endsection
@section('main')
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Wishlist<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <div class="page-content">
        <div class="container">
            <table class="table table-wishlist table-mobile">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Stock Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($products as $product)
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
                            @if ($product->quantity > 0)
                            <td class="stock-col"><span class="in-stock">In stock</span></td>
                            <td class="action-col">
                                <a href="#" class="btn-product btn-cart" data-id="{{$product->id}}" ><span>add to cart</span></a>
                            </td>
                            @else
                            <td class="stock-col"><span class="out-of-stock">Out of stock</span></td>
                        <td class="action-col">
                            <button class="btn btn-block btn-outline-primary-2 disabled">Out of Stock</button>
                        </td>
                        @endif
                            <td class="remove-col"><button class="btn-remove remove-wishlist-item" data-id="{{$product->id}}"><i class="icon-close"></i></button></td>
                        </tr>
                       
                    @empty
                        <h3 class="text-center mt-2">No products added in wishlist.</h3>
                    @endforelse
                    
                </tbody>
            </table><!-- End .table table-wishlist -->
            <div class="text-center">{{$products->links("pagination::bootstrap-5")}}</div>
            <div class="wishlist-share">
                <div class="social-icons social-icons-sm mb-2">
                    <label class="social-label">Share on:</label>
                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                    <a href="#" class="social-icon" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                </div><!-- End .soial-icons -->
            </div><!-- End .wishlist-share -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
@endsection