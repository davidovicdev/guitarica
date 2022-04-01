@foreach ($products as $product)
                        <div class="product product-list">
                            <div class="row">
                                <div class="col-6 col-lg-3">
                                    <figure class="product-media">
                                        {{-- <span class="product-label label-new">New</span> --}}
                                        <a href="{{route("products.show",$product->id)}}">
                                            <img src="{{asset("img/$product->src")}}" alt="{{$product->name}}"  width="100" height="100" class="product-image">
                                        </a>
                                    </figure><!-- End .product-media -->
                                </div><!-- End .col-sm-6 col-lg-3 -->
                    
                                <div class="col-6 col-lg-3 order-lg-last">
                                    <div class="product-list-action">
                                        <div class="product-price">
                                            {{$product->price}} EUR
                                        </div><!-- End .product-price -->
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: {{$product->stars * 20}}%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                            <span class="ratings-text">( {{$product->reviews()->count()}} Reviews )</span>
                                        </div><br><!-- End .rating-container -->
                                        
                                        @if (session()->has("user") AND session("user")->role_id == 2)
                                            <form action=""><input type="button" value="DELETE" class="btn btn-danger text-light delete-product" data-id="{{$product->id}}"></form>
                                            <a href="{{route("products.edit",$product->id)}}" class="btn btn-warning mt-1">EDIT</a>
                                        @endif
                                        @if (session()->has("user"))
                                        <a href="#" class="btn-product btn-cart mt-1" data-id="{{$product->id}}" ><span>add to cart</span></a>
                                        <div class="details-action-wrapper">
                                            <a href="#" data-id="{{$product->id}}" class="btn-product btn-wishlist mt-2" title="Wishlist"><span>Add to Wishlist</span></a>
                                        </div>
                                        @endif
                                    </div><!-- End .product-list-action -->
                                </div><!-- End .col-sm-6 col-lg-3 -->
                    
                                <div class="col-lg-6">
                                    <div class="product-body product-action-inner">
                                        <div class="product-cat">
                                            <a href="#">{{$product->sub_category}}</a>
                                        </div><!-- End .product-cat -->
                                        <h3 class="product-title"><a href="{{route("products.show",$product->id)}}">{{$product->brand}} {{$product->name}}</a></h3><!-- End .product-title -->
                    
                                        <div class="product-content">
                                            <p>{{$product->description}}</p>
                                        </div><!-- End .product-content -->
                    
                                        <div class="product-nav product-nav-thumbs">
                                            @foreach ($product->images as $src)
                                            @if($loop->index != 0)
                                            <a href="#" class="active">
                                                <img src="{{asset("img/$src->src")}}" alt="{{$product->name}}">
                                            </a>
                                            @endif
                                            @endforeach
                                            {{-- @for ($i = 1; $i < count($product->images); $i++)
                                                
                                            @endfor --}}
                                        </div><!-- End .product-nav -->
                                    </div><!-- End .product-body -->
                                </div><!-- End .col-lg-6 -->
                            </div><!-- End .row -->
                        </div><!-- End .product -->
                        @endforeach
                        