@extends('layouts.layout')
@section('title')
    Add Product
@endsection
@section('main')
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Add new<span>Product</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <div class="page-content">
        <div class="container">
            @if (session("error"))
                <h3 class="mt-2 text-danger">{{session("error")}}</h3>
            @endif
            <div class="row mt-2">
                @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{$error}}</li>   
                    @endforeach
                </ul>
                @endif
                <form action="{{route("products.store")}}" class="col-md-12" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group col-md-12">
                        <label for="product_name">Product Name * </label>
                        <input class='form-control' type="text" id="product_name"  name="product_name" value="{{old("product_name")}}" required >
                    </div>
                    <div class="form-group col-md-12">
                        <label for="product_description">Description </label>
                        <textarea  class='form-control'name="product_description" id="product_description" style="resize: none">{{old("product_description")}}</textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="brand">Brand *</label>
                        <select class='form-control form-select form-select-lg' name="brand" id="brand">
                            <option value="0">Choose</option>
                            @foreach ($brands as $brand)
                            @if ($brand->id == old("brand"))
                            <option value="{{$brand->id}}" selected>{{$brand->name}}</option>
                            @endif
                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="subCategory">Category *</label>
                        <select class='form-control form-select form-select-lg' name="subCategory" id="subCategory">
                            <option value="0">Choose</option>
                            @foreach ($subCategories as $subCategory)
                            @if ($subCategory->id == old("subCategory"))
                            <option value="{{$subCategory->id}}" selected>{{$subCategory->name}}</option>
                            @endif
                            <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="product_quantity">Quantity *</label>
                        <input class="form-control" type="number" min="1" id="product_quantity"  name="product_quantity" value="{{old("product_quantity")}}" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="product_price">Price *</label>
                        <input class="form-control" type="number" min="1" id="product_price"  name="product_price" value="{{old("product_price")}}" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="images" class="form-label">Upload images *</label>
                        <input class="form-control" type="file" name="images[]" id="images" multiple required>
                    </div>
                    <input type="submit" value="INSERT" class="btn btn-primary col-md-12">
                </form>
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
@endsection