<style>
    .d-block{
        height: 500px;
    }
</style>

<main>
	<!-- Slider Area -->

	<section class="hero-slider">
		<!-- Single Slider -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            {{-- <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol> --}}
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('images/Sliders/Slider1.jpg')}}" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <div class="container">
                            <div class="row no-gutters">
                                <div class="col-lg-9 offset-lg-3 col-12">
                                    <div class="text-inner">
                                        <div class="row">
                                            <div class="col-lg-7 col-12">
                                                <div class="hero-text">
                                                    <h1><span>UP TO 50% OFF </span>Shirt For Man</h1>
                                                    <p>Maboriosam in a nesciung eget magnae <br> dapibus disting tloctio in the find it pereri <br> odiy maboriosm.</p>
                                                    <div class="button">
                                                        <a href="/shop" class="btn">Shop Now!</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
              </div>
              @foreach ($sliders as $slide )
				<div class="carousel-item">
					<img class="d-block w-100" src="{{ asset('images/Sliders')}}/{{$slide->image}}" alt="First slide">
					<div class="carousel-caption d-none d-md-block">
						<div class="container">
							<div class="row no-gutters">
								<div class="col-lg-9 offset-lg-3 col-12">
									<div class="text-inner">
										<div class="row">
											<div class="col-lg-7 col-12">
												<div class="hero-text">
													<h1><span>Price : {{$slide->price}}</span>{{$slide->title}}</h1>
													<p>{{$slide->subtitle}}</p>
													<div class="button">
														<a href="{{$slide->link}}" class="btn">Shop Now!</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			@endforeach

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>


		<!--/ End Single Slider -->
	</section>
	<!--/ End Slider Area -->
    @if ($product->count() > 0 && $Sale->status == 1 && $Sale->sale_date > Carbon\Carbon::now() )
        <div class="product-area most-popular section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>ON SALE</h2>
                        </div>
                    </div>
                </div>
                <div id="timer" class="flex-wrap d-flex justify-content-center">
                    <div id="days" class="align-items-center flex-column d-flex justify-content-center" ></div>
                    <div id="hours" class="align-items-center flex-column d-flex justify-content-center" ></div>
                    <div id="minutes" class="align-items-center flex-column d-flex justify-content-center"></div>
                    <div id="seconds" class="align-items-center flex-column d-flex justify-content-center" ></div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel popular-slider">
                            <!-- Start Single Product -->
                            @foreach ($product as $productes )
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{route('product.details',['slug'=>$productes->slug])}}">

                                        <img class="default-img" src="{{ asset('images/products')}}/{{$productes->image}}" alt="{{$productes->name}}">
                                        <img class="hover-img"  src="{{ asset('images/products')}}/{{$productes->image}}" alt="{{$productes->name}}">
                                        {{-- <span class="out-of-stock">Hot</span> --}}
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a href="{{route('product.details',['slug'=>$productes->slug])}}"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a href="{{route('product.details',['slug'=>$productes->slug])}}">Add to cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="product-details.html">{{$productes->name}}</a></h3>

                                    @if ($productes->sale_price > 0)
                                        <span class="new" >${{$productes->sale_price}}</span>
                                        <span class="old"> <del>${{$productes->regular_price}}</del></span>
                                    @else
                                        <span>${{$productes->regular_price}}</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach

                            <!-- End Single Product -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
	<!-- Start Small Banner  -->

	<!-- End Small Banner -->

        <div class="product-area most-popular section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <h2>Hot Item</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel popular-slider">
                            <!-- Start Single Product -->
                            @foreach ($products as $product )
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{route('product.details',['slug'=>$product->slug])}}">

                                        <img class="default-img" src="{{ asset('images/products')}}/{{$product->image}}" alt="{{$product->name}}">
                                        <img class="hover-img"  src="{{ asset('images/products')}}/{{$product->image}}" alt="{{$product->name}}">
                                        {{-- <span class="out-of-stock">Hot</span> --}}
                                    </a>
                                    <div class="button-head">
                                        <div class="product-action">
                                            <a  href="{{route('product.details',['slug'=>$product->slug])}}"><i class=" ti-eye"></i><span>Quick Shop</span></a>
                                        </div>
                                        <div class="product-action-2">
                                            <a title="Add to cart" href="{{route('product.details',['slug'=>$product->slug])}}">show details</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h3><a href="#">{{$product->name}}</a></h3>
                                    <div class="product-price">
                                        {{-- <span class="old">$60.00</span> --}}
                                        <span>${{$product->regular_price}}</span>

                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <!-- End Single Product -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


	<!-- Start Product Area -->
    {{-- <div class="product-area section">
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Trending Item</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    @foreach ($categories as $key=>$category)
                                                <li class="nav-item"><a href="#category_{{$category->id}}" class="nav-link {{$key==0 ? 'active':''}}" data-toggle="tab"  role="tab">{{$category->name}}</a></li>
                                    @endforeach
                                </ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
                                @foreach ($categories as $key=>$category)
                                    <div class="tab-pane {{$key==0 ? 'active':''}}" id="category_{{$category->id}}" id role="tabpanel">
                                        <div class="tab-single">
                                            <div class="row">
                                                    @php
                                                        $c_products = DB::table('products')->where('category_id',$category->id)->get()->take($no_of_products);
                                                    @endphp
                                                    @foreach ($c_products as $c_product)
                                                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                                                            <div class="single-product">
                                                                <div class="product-img">
                                                                    <a href="{{route('product.details',['slug'=>$c_product->slug])}}">
                                                                        <img class="default-img" src="{{ asset('images/products')}}/{{$c_product->image}}" alt="#">
                                                                        <img class="hover-img" src="{{ asset('images/products')}}/{{$c_product->image}}" alt="#">
                                                                    </a>
                                                                    <div class="button-head">
                                                                        <div class="product-action">
                                                                            <a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>{{$c_product->name}}</span></a>
                                                                            <a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
                                                                            <a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
                                                                        </div>
                                                                        <div class="product-action-2">
                                                                            <a title="Add to cart" href="#">Add to cart</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="product-content">
                                                                    <h3><a href="{{route('product.details',['slug'=>$c_product->slug])}}">{{$c_product->name}}</a></h3>
                                                                    <div class="product-price">
                                                                        <span>{{$c_product->regular_price}}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
										    </div>
									    </div>
								    </div>
                                @endforeach
                            </div>
						</div>
					</div>
				</div>
			</div>
        </div> --}}



	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
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
	<!-- End Shop Services Area -->

	<!-- Start Shop Newsletter  -->
	{{-- <section class="shop-newsletter section">
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
	</section> --}}
	<!-- End Shop Newsletter -->

	<!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row no-gutters">
							<div class="col-lg-6 offset-lg-3 col-12">
								<h4 style="margin-top:100px;font-size:14px; font-weight:500; color:#F7941D; display:block; margin-bottom:5px;">Eshop Free Lite</h4>
								<h3 style="font-size:30px;color:#333;">Currently You are using free lite Version of Eshop.<h3>
								<p style="display:block; margin-top:20px; color:#888; font-size:14px; font-weight:400;">Please, purchase full version of the template to get all pages, features and commercial license</p>
								<div class="button" style="margin-top:30px;">
									<a href="https://wpthemesgrid.com/downloads/eshop-ecommerce-html5-template/" target="_blank" class="btn" style="color:#fff;">Buy Now!</a>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
    </div> --}}
    <!-- Modal end -->
</main>

<script>
function makeTimer() {
    var endTime = new Date("{{$Sale->sale_date}} ");
    var endTime = (Date.parse(endTime)) / 1000;
    var now = new Date();
    var now = (Date.parse(now) / 1000);
    var timeLeft = endTime - now;
    var days = Math.floor(timeLeft / 86400);
    var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
    var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600 )) / 60);
    var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));
    if (hours < "10") { hours = "0" + hours; }
    if (minutes < "10") { minutes = "0" + minutes; }
    if (seconds < "10") { seconds = "0" + seconds; }
    $("#days").html(days + "<span>Days</span>");
    $("#hours").html(hours + "<span>Hours</span>");
    $("#minutes").html(minutes + "<span>Minutes</span>");
    $("#seconds").html(seconds + "<span>Seconds</span>");
 }
 setInterval(function() { makeTimer(); }, 0);
</script>
