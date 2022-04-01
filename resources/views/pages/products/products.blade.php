@extends('layouts.layout')
@section('title')
    Shop
@endsection
@section('main')
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">List<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <div class="page-content">
        <div class="container">
            <div class="row mt-2">
                <div class="col-lg-9">
                    @if ($products->search != null)
                    <h3 class="title">Results for: "{{$products->search}}"</h3>
                    @endif
                    @if (session()->has("user") AND session("user")->role_id == 2)
                        <a href="{{route("products.create")}}" class="btn btn-success ml-2 mb-2">Add Product</a>
                    @endif
                    <div class="products mb-3" id="products_container">
                        @include('inc.products')
                        
                    </div><!-- End .products -->
                     <div id="pagination">{{$products->withQueryString()->links("pagination::bootstrap-5")}}</div> 
                </div><!-- End .col-lg-9 -->
                @include('inc.aside')
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
@endsection