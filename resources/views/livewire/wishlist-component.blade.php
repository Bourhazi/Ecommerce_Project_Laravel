<main id="main" class="main-site left-sidebar">
    <div class="container">

        <div class="wrap-breadcrumb">
            <ul>
                <li class="item-link"><a href="#" class="link">hwome</a></li>
                <li class="item-link"><span>wishlist</span></li>
            </ul>
        </div>
        <div class="rows">
        @if (Cart::instance('wishlist')->content()->count() > 0 )
            <ul class="product-list grid-products equal-container">

                @foreach ( Cart::instance('wishlist')->content() as $item )
                    <li class="col-lg-4 col-md-6 col-sm-6 col-xs-6 ">
                        <div class="product product-style-3 equal-elem ">
                            <div class="product-thumnail">
                                <a href="{{route('product.details',['slug'=>$item->model->slug])}}" title="{{$item->model->name}}">
                                    <figure><img src="{{asset('images/products')}}/{{$item->model->image}}" alt="{{$item->model->name}}"></figure>
                                </a>
                            </div>
                            <div class="product-info">
                                <a href="#" class="product-name"><span>{{$item->model->name}}</span></a>
                                <div class="wrap-price"><span class="product-price">${{$item->model->regular_price}}</span></div>
                                <a href="#" class="btn add-to-cart" wire:click.prevent="store({{$item->model->id}},'{{$item->model->name}}',{{$item->model->regular_price}})">Add To Cart</a>
                                <div class="product-wish">
                                        <a href="" wire:click.prevent="deleteTowishlist({{$item->model->id}})"><i class="fa fa-heart fill-heart"></i></a>

                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
        </div>
    </div>

</main>
