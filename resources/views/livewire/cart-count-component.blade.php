<div class="sinlge-bar shopping">
    @if (Cart::instance('cart')->Count() > 0)
        <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Cart::instance('cart')->Count()}}</span></a>


        <!-- Shopping Item -->
        <div class="shopping-item">
            <div class="dropdown-cart-header">
                <span>{{Cart::Count()}} Items</span>
                <a href="/cart">View Cart</a>
            </div>
            <ul class="shopping-list">
            @foreach (Cart::content() as $item)
                <li>
                    <a href="#" wire:click.prevent="destroy('{{$item->rowId}}')" class="remove" title="Remove this item"><i class="fa fa-remove"></i></a>
                    <a class="cart-img" href="#"><img src="{{asset('images/products')}}/{{$item->model->image}}" alt="#"></a>
                    <h4><a href="#">{{$item->name}}</a></h4>
                    <p class="quantity">{{$item->qty}}x - <span class="amount">${{$item->model->regular_price}}w</span></p>
                </li>

            @endforeach
            </ul>
            <div class="bottom">
                <div class="total">
                    <span>Total</span>
                    <span class="total-amount">{{Cart::total()}}</span>
                </div>
                <a href="" wire:click.prevent="checkout" class="btn animate">Checkout</a>
            </div>
        </div>
    @else
    <a href="#" class="single-icon"><i class="ti-bag"></i> </a>
    @endif
</div>
