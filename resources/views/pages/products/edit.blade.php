@extends('layouts.layout')
@section('title')
    Edit Product
@endsection
@section('main')
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Edit<span>Product</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <div class="page-content">
        <div class="container">
            @if (session("msg"))
            <h3 class="text-center mt-2 text-success">{{session("msg")}}</h3>    
            @endif
            @if (session("error"))
            <h3 class="text-center mt-2 text-danger">{{session("error")}}</h3>    
            @endif
            <h3 class="text-center mt-2">Product: #{{$product->id}}</h3>
            <div class="row mt-2">
                <form action="{{route("products.update",$product->id)}}" class="col-md-6" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="form-group col-md-12">
                        <label for="product_name">Product Name * </label>
                        <input class='form-control' type="text" id="product_name"  name="product_name" value="{{$product->name}}" required >
                        @if(session("product_name"))<span class="text-danger mt-2">{{session("product_name")}}</span> @endif
                    </div>
                    <div class="form-group col-md-12">
                        <label for="product_description">Description </label>
                        <textarea  class='form-control'name="product_description" id="product_description" style="resize: none">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="product_quantity">Quantity in stock *</label>
                        <input class="form-control" type="number" id="product_quantity" min="1" name="product_quantity" value="{{$product->quantity}}" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="product_price">Price *</label>
                        <input class="form-control" type="number" min="1" id="product_price"  name="product_price" value="{{$product->price()->where("active",1)->first()->price}}" required>
                    </div>
                    <input type="submit" value="UPDATE" class="btn btn-primary col-md-12">
                </form>
                <div class="image mt-2">
                    <img src="{{asset("img/".$product->images()->first()->src)}}" alt="{{$product->name}}"  width="400" height="400">
                </div>
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
@endsection