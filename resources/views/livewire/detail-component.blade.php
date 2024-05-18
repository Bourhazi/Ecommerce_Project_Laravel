<main id="main" class="main-site">

    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">home</a></li>
                <li class="item-link"><span>detail</span></li>
            </ul>
        </div>
        <div class="row">

            <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 main-content-area">

                <div class="wrap-product-detail">
                    <div class="detail-media">
                        <div class="product-gallery">
                          <ul class="slides">

                            <li data-thumb="{{asset('images/products')}}/{{$product->image}}">
                                <img src="{{asset('images/products')}}/{{$product->image}}" alt={{$product->name}} />
                            </li>
                          </ul>
                        </div>
                    </div>
                    <div class="detail-info">
                        {{-- <div class="product-rating">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <a href="#" class="count-review">(05 review)</a>
                        </div> --}}
                        <h2 class="product-name">{{$product->name}}</h2>
                        <div class="short-desc">

                                {{$product->short_description}}

                        </div>
                        <div class="wrap-social">
                            <a class="link-socail" href="#"><img src="assets/images/social-list.png" alt=""></a>
                        </div>
                         @if ($product->sale_price > 0  && $Sale->status == 1 && $Sale->sale_date > Carbon\Carbon::now() )
                            <div class="wrap-price">
                                <span class="product-price">${{$product->sale_price}}</span>
                                <span class="product-price"><del>${{$product->regular_price}}</del></span>
                            </div>
                        @else
                            <div class="wrap-price"><span class="product-price">${{$product->regular_price}}</span></div>
                        @endif

                        <div class="stock-info in-stock">
                            <p class="availability">Availability: <b>{{$product->stock_status}}</b></p>
                        </div>
                        {{-- <div class="quantity">
                            <span>Quantity:</span>
                            <div class="quantity-input">
                                <input type="text" name="product-quality" value="1" data-max="100" pattern="[0-9]*" step="1"/>
                                <a class="btn btn-reduce" href="#"></a>
                                <a class="btn btn-increase" href="#"></a>
                            </div>
                        </div> --}}
                        @php
                            $switems= Cart::instance('wishlist')->content()->pluck('id');
                        @endphp
                        <div class="wrap-butons">
                            <a href="#" wire:click.prevent="store({{$product->id}},'{{$product->name}}',{{$product->regular_price}})" class="btn add-to-cart" >Add to Cart</a>
                            <div class="wrap-btn">
                                {{-- <a href="#"  class="btn btn-compare">Add Compare</a> --}}
                                @if ($switems->contains($product->id))
                                    <a href="#" wire:click.prevent="deleteTowishlist({{$product->id}})" class="btn btn-wishlist">remove Wishlist</a>
                                @else
                                <a href="#" wire:click.prevent="addTowishlist({{$product->id}},'{{$product->name}}',{{$product->regular_price}})" class="btn btn-wishlist">Add Wishlist</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="advance-info">
                        <div class="tab-control normal">
                            <a href="#" class="tab-control-item active">description</a>
                        </div>
                        <div class="tab-contents">
                            <div class="tab-content-item active" id="description">
                                <p>{{$product->description}}</p>

                            </div>


                        </div>
                    </div>
                </div>

            </div><!--end main products area-->

             <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12 sitebar">
                <div class="widget widget-our-services ">
                    <div class="widget-content">
                        <ul class="our-services">

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-truck" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Free Shipping</b>
                                        <span class="subtitle">On Oder Over $99</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-gift" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Special Offer</b>
                                        <span class="subtitle">Get a gift!</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>

                            <li class="service">
                                <a class="link-to-service" href="#">
                                    <i class="fa fa-reply" aria-hidden="true"></i>
                                    <div class="right-content">
                                        <b class="title">Order Return</b>
                                        <span class="subtitle">Return within 7 days</span>
                                        <p class="desc">Lorem Ipsum is simply dummy text of the printing...</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- Categories widget-->

            </div>


        </div>

    </div>

</main>
<!--main area-->
