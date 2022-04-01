@extends('layouts.layout')
@section('title')
    Product
@endsection
@php
    function time_elapsed_string($datetime, $full = false) {
                                            $now = new DateTime;
                                            $ago = new DateTime($datetime);
                                            $diff = $now->diff($ago);

                                            $diff->w = floor($diff->d / 7);
                                            $diff->d -= $diff->w * 7;

                                            $string = array(
                                                'y' => 'year',
                                                'm' => 'month',
                                                'w' => 'week',
                                                'd' => 'day',
                                                'h' => 'hour',
                                                'i' => 'minute',
                                                's' => 'second',
                                            );
                                            foreach ($string as $k => &$v) {
                                                if ($diff->$k) {
                                                    $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
                                                } else {
                                                    unset($string[$k]);
                                                }
                                            }
                                            if (!$full) $string = array_slice($string, 0, 1);
                                            return $string ? implode(', ', $string) . ' ago' : 'just now';
                                        }
@endphp
@section('main')
<div class="page-content">
    <div class="container">
        <div class="product-details-top">
            @if (session("msg"))
                <h3 class="text-success mt-2 text-center">{{session("msg")}}</h3>
            @endif
            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="product-gallery product-gallery-vertical">
                        <div class="row">
                                <figure class="product-main-image">
                                    <a href="{{asset("img/$product->firstImage")}}"  data-lightbox="{{$product->name}}">
                                    <img id="product-zoom" src="{{asset("img/$product->firstImage")}}" alt="{{$product->name}}"></a>
                                </figure><!-- End .product-main-image -->
                                <div id="product-zoom-gallery" class="product-image-gallery">
                                    @foreach ($product->images as $image)
                                    <a class="product-gallery-item active" href="{{asset("img/$image->src")}}" data-lightbox="{{$product->name}}">
                                        <img src="{{asset("img/$image->src")}}" width="108" height="108" alt="{{$product->name}}">
                                    </a>  
                                    @endforeach 
                                </div><!-- End .product-image-gallery -->
                            </div><!-- End .row -->
                        </div><!-- End .product-gallery -->
                    </div><!-- End .col-md-6 -->

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{$product->name}}</h1><!-- End .product-title -->

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: {{$product->reviews()->avg("mark_id")*20}}%;"></div><!-- End .ratings-val -->
                                </div><!-- End .ratings -->
                                <a class="ratings-text" href="#product-review-link" id="review-link">( @if($product->reviews()->count() > 0){{$product->reviews()->count()}} @else No @endif Reviews )</a>
                            </div><!-- End .rating-container -->

                            <div class="product-price">
                                {{$product->price->price}}EUR
                            </div><!-- End .product-price -->

                            <div class="product-content">
                                <p>{{$product->description}}</p>
                            </div><!-- End .product-content -->
                            <br><br>
                            @if (session()->has("user"))
                            <div class="product-details-action">
                                <a href="#" class="btn-product btn-cart" data-id="{{$product->id}}"><span>add to cart</span></a>

                                <div class="details-action-wrapper">
                                    <a href="#" data-id="{{$product->id}}"class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                
                                </div><!-- End .details-action-wrapper -->
                            </div><!-- End .product-details-action -->
                            @endif
                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Category:</span>
                                    <a href="#">{{$product->category}}</a> > 
                                    <a href="#">{{$product->sub_category}}</a>
                                </div><!-- End .product-cat -->
                                <br>
                               

                                <div class="social-icons social-icons-sm">
                                    <div class="product-cat">
                                        <span>Brand:</span>
                                        <a href="#">{{$product->brand}}</a>
                                    </div><!-- End .product-cat -->
                                </div>
                            </div><!-- End .product-details-footer -->
                        </div><!-- End .product-details -->
                    </div><!-- End .col-md-6 -->
                </div><!-- End .row -->
            </div><!-- End .product-details-top -->
            <div class="product-details-tab">
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                        <div class="reviews" id="reviews">
                           
                            @if($product->reviews()->count() > 0 )
                            <h3 class="text-center">Reviews ({{$product->reviews()->count()}})</h3>
                            @else
                            <h3 class="text-center">No Reviews</h3>
                            @endif
                            @forelse ($product->reviews as $review)
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        @php 
                                            
                                        if(session()->has("user") AND session("user")->first_name == $review->getUser($review->user_id)->first_name AND session("user")->last_name == $review->getUser($review->user_id)->last_name){
                                            $class = " text-danger";
                                        }
                                        else{
                                            $class="";
                                        }
                                        @endphp
                                        <h4 class="{{$class}}"><a href="#">{{$review->getUser($review->user_id)->first_name}} {{$review->getUser($review->user_id)->last_name}}</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: {{$review->mark_id * 20}}%;"></div><!-- End .ratings-val -->
                                            </div><!-- End .ratings -->
                                        </div><!-- End .rating-container -->
                                        <span class="review-date">{{time_elapsed_string($review->created_at)}}</span>
                                    </div><!-- End .col -->
                                    <div class="col">
                                        <h4 class="{{$class}}">{{$review->title}}</h4>
                                        <div class="review-content">
                                            <p class="{{$class}}">{{$review->description}}</p>
                                        </div><!-- End .review-content -->
                                    </div><!-- End .col-auto -->
                                     
                                    @if(session()->has("user") AND session("user")->first_name == $review->getUser($review->user_id)->first_name AND session("user")->last_name == $review->getUser($review->user_id)->last_name)
                                        <td class="remove-col"><button class="btn-remove remove-comment" data-id="{{$product->id}}"><i class="icon-close"></i></button></td>
                                    
                                    @endif
                                    
                                </div><!-- End .row -->
                            </div><!-- End .review -->
                            @empty
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h3 class="text-center">No reviews</h3>
                                    </div>
                                </div>
                            </div>
                            @endforelse
                            @if (session()->has("user"))
                            <div id="comment" class="review"><h3 class="text-center">Add Comment</h3><form action="" method="">
                                @csrf
                                <div class="form-group">
                                  <label for="comment-title">Title</label>
                                  <input type="email" class="form-control" id="comment-title" placeholder="Your title">
                                  <span class="text-danger" id="comment-title-error"></span>
                                </div>
                                <div class="form-group">
                                    <label for="comment-mark">Mark</label>
                                    <select class="form-control" id="comment-mark">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="comment-description">Description</label>
                                    <textarea class="form-control" id="comment-description" rows="3"></textarea>
                                    <span class="text-danger" id="comment-description-error"></span>
                                </div>
                                <button class="btn btn-primary" id="add-comment" data-id="{{$product->id}}">Add comment</button>
                            </form></div>
                            @endif
                        </div><!-- End .reviews -->
                    </div><!-- .End .tab-pane -->
                </div><!-- End .tab-content -->
            </div><!-- End .product-details-tab -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
@endsection