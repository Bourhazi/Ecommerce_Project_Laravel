@if (Cart::instance('wishlist')->count() > 0)
    <div class="sinlge-bar">
        <a href="{{route('product.wishlist')}}" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i><span class="total-count">{{Cart::instance('wishlist')->count()}}</span></a>
    </div>
@else
<div class="sinlge-bar">
    <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
</div>
@endif
