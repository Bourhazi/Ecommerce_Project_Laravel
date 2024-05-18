<main>
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
                    <div class="wrap-breadcrumb">
                        <ul>
                            <li class="item-link"><a href="#" class="link">home</a></li>
                            <li class="item-link"><span>Cart</span></li>
                        </ul>
                    </div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
            @if (Cart::instance('cart')->count() > 0)


            @if (Session::has('success message'))
                <div class="alert alert-success">
                    <strong>Success</strong> {{Session::get('success message')}}
                </div>
            @elseif (Session::has('success_message'))
                <div class="alert alert-success">
                    <strong>Success</strong> {{Session::get('success_message')}}
                </div>
            @elseif (Session::has('s_success_message'))
                <div class="alert alert-success">
                    <strong>Success</strong> {{Session::get('s_success_message')}}
                </div>
            @elseif (Session::has('d_success_message'))
                <div class="alert alert-danger">
                    <strong>Success</strong> {{Session::get('d_success_message')}}
                </div>
            @elseif (Session::has('da_success_message'))
            <div class="alert alert-danger">
                <strong>Success</strong> {{Session::get('da_success_message')}}
            </div>
            @endif

			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th>
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
                            @if (Cart::instance('cart')->count() > 0)

                                    @foreach (Cart::instance('cart')->content() as $item)
                                    <tr>
                                    <td class="image" data-title="No"><img src="{{asset('images/products')}}/{{$item->model->image}}" alt="#"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="#">{{$item->name}}</a></p>
                                        {{-- <p class="product-des">{{$item->model->short_description}}</p> --}}
                                    </td>
                                    <td class="price" data-title="Price"><span>${{$item->model->regular_price}}</span></td>
                                    <td class="qty" data-title="Qty"><!-- Input Order -->
                                        <div class="input-group">
                                            <div class="button minus">
                                                <button type="button" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')" class="btn btn-primary btn-number"  data-type="minus" data-field="quant[{{$item->qty}}]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="quant[{{$item->qty}}]" class="input-number"  data-min="1" data-max="100" value="{{$item->qty}}">
                                            <div class="button plus">
                                                <button type="button" wire:click.prevent="increaseQuantity('{{$item->rowId}}')" class="btn btn-primary btn-number" data-type="plus" data-field="quant[{{$item->qty}}]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div>
                                            <p class="text-center"><a href="" wire:click.prevent="switchToSaveForLeter('{{$item->rowId}}')">Save For Later</a></p>
                                        </div>

                                        <!--/ End Input Order -->
                                    </td>
                                    <td class="total-amount" data-title="Total"><span>${{$item->subtotal}}</span></td>
                                    <td class="action" wire:click.prevent="destroy('{{$item->rowId}}')" data-title="Remove"><a href="#"><i class="ti-trash remove-icon"></i></a></td>
                                    </tr>
                                    @endforeach


                            @endif

						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
                                    @if (!Session::has('coupon'))
                                        <div class="coupon" >
                                            <form  wire:submit.prevent="applyCouponCode">
                                                @if (Session::has('coupon message'))
                                                <div class="alert alert-danger" role="danger">
                                                    {{Session::get('coupon message')}}
                                                </div>
                                                @endif
                                                <input name="Coupon" placeholder="Enter Your Coupon" wire:model="couponCode" />
                                                <button class="btn">Apply</button>
                                            </form>
                                        </div>
                                    @endif
                                        {{-- <div class="checkbox">
                                            <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (+10$)</label>
                                        </div> --}}
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										    <li>Cart Subtotal<span>{{Cart::instance('cart')->subtotal()}}</span></li>
                                        @if (Session::has('coupon'))
                                            <li>Discount({{Session::get('coupon')['code']}})<span>${{$discount}}</span></li>
                                            <li>Tax({{config('cart.tax')}}%) <span>${{$taxAfterDiscount}}</span></li>
                                            <li>Subtotal with Discount<span>${{$subtotalAfterDiscount}}</span></li>
                                            <li>Total<span>${{$totalAfterDiscount}}</span></li>
                                        @else
                                            <li>Tax<span>${{Cart::instance('cart')->tax()}}</span></li>
                                            <li>Shipping<span>Free Shipping</span></li>
                                            <li>Total<span>${{Cart::instance('cart')->total()}}</span></li>
                                            {{-- <li>You Save<span>$20.00</span></li>
                                            <li class="last">You Pay<span>$310.00</span></li> --}}
                                        @endif
									</ul>
									<div class="button5">
										<a href="#" wire:click.prevent="checkout" class="btn">Checkout</a>
										<a href="/shop" class="btn">Continue shopping</a>
                                        <a href="#" wire:click.prevent="destroyall()" class="btn">Clear Shopping Cart</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
            @else
            <div class="text-center">
                <h1 style="padding:15px;">Your cart is empty</h1>
                <p style="padding:15px;">add items to it now</p>
                <a href="/shop" class="btn btn-success">Shop Now</a>
            </div>
            @endif
		</div>
	</div>
	<!--/ End Shopping Cart -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <h2>{{Cart::instance('saveForLater')->count()}} item(s) Save For Later</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shopping-cart section">
		<div class="container">
            @if (Session::has('dff_success_message'))
            <div class="alert alert-danger">
                <strong>Success</strong> {{Session::get('dff_success_message')}}
            </div>
            @endif
            <div class="row">


                <div class="col-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>PRODUCT</th>
                                <th>NAME</th>
                                <th class="text-center">UNIT PRICE</th>
                                <th class="text-center"></th>

                                <th class="text-center"><i class="ti-trash remove-icon"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (Cart::instance('saveForLater')->count() > 0)

                                    @foreach (Cart::instance('saveForLater')->content() as $item)
                                    <tr>
                                    <td class="image" data-title="No"><img src="{{asset('images/products')}}/{{$item->model->image}}" alt="#"></td>
                                    <td class="product-des" data-title="Description">
                                        <p class="product-name"><a href="#">{{$item->name}}</a></p>
                                        {{-- <p class="product-des">{{$item->model->short_description}}</p> --}}
                                    </td>
                                    <td class="price" data-title="Price"><span>${{$item->model->regular_price}}</span></td>
                                    <td class="qty" data-title="Qty"><!-- Input Order -->
                                        <div class="input-group">
                                            {{-- <div class="button minus">
                                                <button type="button" wire:click.prevent="decreaseQuantity('{{$item->rowId}}')" class="btn btn-primary btn-number"  data-type="minus" data-field="quant[{{$item->qty}}]">
                                                    <i class="ti-minus"></i>
                                                </button>
                                            </div>
                                            <input type="text" name="quant[{{$item->qty}}]" class="input-number"  data-min="1" data-max="100" value="{{$item->qty}}">
                                            <div class="button plus">
                                                <button type="button" wire:click.prevent="increaseQuantity('{{$item->rowId}}')" class="btn btn-primary btn-number" data-type="plus" data-field="quant[{{$item->qty}}]">
                                                    <i class="ti-plus"></i>
                                                </button>
                                            </div> --}}
                                            <p class="text-center"><a href="" wire:click.prevent="MoveToCart('{{$item->rowId}}')">Move To cart</a></p>
                                        </div>

                                        <!--/ End Input Order -->
                                    </td>

                                    <td class="action" wire:click.prevent="deleteFromSaveFolder('{{$item->rowId}}')" data-title="Remove"><a href="#"><i class="ti-trash remove-icon"></i></a></td>
                                    </tr>
                                    @endforeach


                            @endif

                        </tbody>
                    </table>
                    <!--/ End Shopping Summery -->
                </div>
            </div>
        </div>
    </div>
	<!-- Start Shop Services Area  -->
	<section class="shop-services section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->

	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>10%</span> off your first purchase</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" required="" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->

</main>
