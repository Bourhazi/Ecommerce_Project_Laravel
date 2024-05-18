<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Eshop - eCommerce HTML5 Template.</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="images/favicon.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<!-- StyleSheet -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.min.css')}}">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css')}}">
	<!-- Fancybox -->
	<link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css')}}">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('css/themify-icons.css')}}">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('css/niceselect.css')}}">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('css/flex-slider.min.css')}}">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl-carousel.css')}}">
	<!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('css/slicknav.min.css')}}">

	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="{{ asset('css/reset.css')}}">
	<link rel="stylesheet" href="{{ asset('style.css')}}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">
    @livewireStyles


</head>
<body class="js">

	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->

		<!-- Header -->
		<header class="header shop">
			<!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-12 col-12">
							<!-- Top Left -->
							<div class="top-left">
								<ul class="list-main">
									<li><i class="ti-headphone-alt"></i> +060 (800) 801-582</li>
									<li><i class="ti-email"></i> support@shophub.com</li>
								</ul>
							</div>
							<!--/ End Top Left -->
						</div>
						<div class="col-lg-7 col-md-12 col-12">
							<!-- Top Right -->
							<div class="right-content">
								<ul class="list-main">
									<li><i class="ti-location-pin"></i> Store location</li>
									<li><i class="ti-alarm-clock"></i> <a href="#">Daily deal</a></li>
									@if(Route::has('login'))
                                    @auth
                                        @if (Auth::user()->utype === 'ADM')
                                            <li>
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My account ({{Auth::user()->name}}) </a>
                                                <ul class="dropdown-menu" >
                                                    <li >
                                                        <a title="Dashboard" href="{{route('Admin.dashboard')}}">Dashboard</a>
                                                    </li>
                                                    <li >
                                                        <a title="Dashboard" href="{{route('Admin.category')}}">Categories</a>
                                                    </li>
                                                    <li >
                                                        <a title="Product" href="{{route('Admin.Product')}}">Products</a>
                                                    </li>
                                                    <li >
                                                        <a title="Product" href="{{route('Admin.Homecategory')}}">HomeCategories</a>
                                                    </li>
                                                    <li >
                                                        <a title="Product" href="{{route('Admin.Sale')}}">Sale Setting</a>
                                                    </li>
                                                    <li>
                                                        <a title="Product" href="{{route('Admin.Coupons')}}">All Coupons</a>
                                                    </li>
                                                    <li>
                                                        <a title="Product" href="{{route('Admin.order')}}">All Orders</a>
                                                    </li>
                                                    <li>
                                                        <a title="Manage home slider" href="{{route('Admin.homeslider')}}">Manage home slider</a>
                                                    </li>
													<li >
														<form  class=" text-white nav-item" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
															@csrf
															<button class="dropdown-items" type="submit">logout</button>
														</form>
													</li>
                                                </ul>
                                            </li>
                                        @elseif (Auth::user()->utype === 'USR')

                                            <li>
                                                {{-- <a  title="My account" href="#">My account ({{Auth::user()->name}})<i class="fa fa-angle-down" aria-hidden="true"></i></a> --}}
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My account ({{Auth::user()->name}}) </a>
                                                <ul class="dropdown-menu" >
                                                    <li>
                                                        <a  title="Dashboard" href="{{route('user.dashboard')}}">Dashboard</a>
                                                    </li>

													<li >
															<form  class=" text-white nav-item" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
																@csrf
																<button class="dropdown-item rounded " type="submit">logout</button>
															</form>
													</li>

                                                </ul>
                                            </li>
                                        @endif

                                    @else
                                        <li><i class="ti-user"></i> <a href="{{route('register')}}">My account</a></li>
								        <li><i class="ti-power-off"></i><a href="{{route('login')}}">Login</a></li>
                                    @endif

                                @endif
								</ul>
							</div>
							<!-- End Top Right -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
			<div class="middle-inner">
				<div class="container">
					<div class="row">
						<div class="col-lg-2 col-md-2 col-12">
							<!-- Logo -->
							<div class="logo">
								<a href="/"><img class ="logo" src="{{asset('images/Logo3.jpeg')}}" alt="logo"></a>
							</div>
							<!--/ End Logo -->
							<!-- Search Form -->
							<div class="search-top">
								<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
								<!-- Search Form -->
								<div class="search-top">
									<form class="search-form">
										<input type="text" placeholder="Search here..." name="search">
										<button value="search" type="submit"><i class="ti-search"></i></button>
									</form>
								</div>
								<!--/ End Search Form -->
							</div>
							<!--/ End Search Form -->
							<div class="mobile-nav"></div>
						</div>
						@livewire('header-search-component')

						<div class="col-lg-2 col-md-3 col-12">
							<div class="right-bar">
								<!-- Search Form -->
								<div class="sinlge-bar">
									<a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a>
								</div>
								<div class="sinlge-bar">
									<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i></a>
								</div>
								<div class="sinlge-bar shopping">
                                    @if (Cart::Count() > 0)
                                    <a href="#" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Cart::Count()}}</span></a>


									<!-- Shopping Item -->
									<div class="shopping-item">
										<div class="dropdown-cart-header">
											<span>{{Cart::Count()}} Items</span>
											<a href="#">View Cart</a>
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
											<a href="checkout.html" class="btn animate">Checkout</a>
										</div>
									</div>
									<!--/ End Shopping Item -->
                                    @endif
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="cat-nav-head">
						<div class="row">
							<div class="col-12">
								<div class="menu-area">
									<!-- Main Menu -->
									<nav class="navbar navbar-expand-lg">
										<div class="navbar-collapse">
											<div class="nav-inner">
												<ul class="nav main-menu menu navbar-nav">
													<li class="active"><a href="/">Home</a></li>
													<li><a href="#">Product</a></li>
													<li><a href="#">Service</a></li>
													<li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<li><a href="cart.html">Cart</a></li>
															<li><a href="checkout.html">Checkout</a></li>
														</ul>
													</li>
													<li><a href="#">Pages</a></li>
													<li><a href="#">Blog<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
														</ul>
													</li>
													<li><a href="contact.html">Contact Us</a></li>
												</ul>
											</div>
										</div>
									</nav>
									<!--/ End Main Menu -->
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>
		<!--/ End Header -->
            {{$slot}}
		<!-- Start Footer Area -->
		<footer class="footer">
			<!-- Footer Top -->
			<div class="footer-top section">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer about">
								<div class="logo">
									<a href="index.html"><img src="images/logo2.png" alt="#"></a>
								</div>
								<p class="text">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue,  magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis, accumsan porttitor, facilisis luctus, metus.</p>
								<p class="call">Got Question? Call us 24/7<span><a href="tel:123456789">+0123 456 789</a></span></p>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-2 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer links">
								<h4>Information</h4>
								<ul>
									<li><a href="#">About Us</a></li>
									<li><a href="#">Faq</a></li>
									<li><a href="#">Terms & Conditions</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-2 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer links">
								<h4>Customer Service</h4>
								<ul>
									<li><a href="#">Payment Methods</a></li>
									<li><a href="#">Money-back</a></li>
									<li><a href="#">Returns</a></li>
									<li><a href="#">Shipping</a></li>
									<li><a href="#">Privacy Policy</a></li>
								</ul>
							</div>
							<!-- End Single Widget -->
						</div>
						<div class="col-lg-3 col-md-6 col-12">
							<!-- Single Widget -->
							<div class="single-footer social">
								<h4>Get In Tuch</h4>
								<!-- Single Widget -->
								<div class="contact">
									<ul>
										<li>NO. 342 - London Oxford Street.</li>
										<li>012 United Kingdom.</li>
										<li>info@eshop.com</li>
										<li>+032 3456 7890</li>
									</ul>
								</div>
								<!-- End Single Widget -->
								<ul>
									<li><a href="#"><i class="ti-facebook"></i></a></li>
									<li><a href="#"><i class="ti-twitter"></i></a></li>
									<li><a href="#"><i class="ti-flickr"></i></a></li>
									<li><a href="#"><i class="ti-instagram"></i></a></li>
								</ul>
							</div>
							<!-- End Single Widget -->
						</div>
					</div>
				</div>
			</div>
			<!-- End Footer Top -->
			<div class="copyright">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-6 col-12">
								<div class="left">
									<p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved.</p>
								</div>
							</div>
							<div class="col-lg-6 col-12">
								<div class="right">
									<img src="images/payments.png" alt="#">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- /End Footer Area -->

	<!-- Jquery -->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.0.js')}}"></script>
	<script src="{{ asset('js/jquery-ui.min.js')}}"></script>

	<script src="{{ asset('js/popper.min.js')}}"></script>
	<!-- Bootstrap JS -->
	<script src="{{ asset('js/bootstrap.min.js')}}"></script>
	<!-- Color JS -->
	<script src="{{ asset('js/colors.js')}}"></script>
	<!-- Slicknav JS -->
	<script src="{{ asset('js/slicknav.min.js')}}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{ asset('js/owl-carousel.js')}}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{ asset('js/magnific-popup.js')}}"></script>
	<!-- Fancybox JS -->
	<script src="{{ asset('js/facnybox.min.js')}}"></script>
	<!-- Waypoints JS -->
	<script src="{{ asset('js/waypoints.min.js')}}"></script>
	<!-- Countdown JS -->
	<script src="{{ asset('js/finalcountdown.min.js')}}"></script>
	<!-- Nice Select JS -->
	<script src="{{ asset('js/nicesellect.js')}}"></script>
	<!-- Ytplayer JS -->
	<script src="{{ asset('js/ytplayer.min.js')}}"></script>
	<!-- Flex Slider JS -->
	<script src="{{ asset('js/flex-slider.js')}}"></script>
	<!-- ScrollUp JS -->
	<script src="{{ asset('js/scrollup.js')}}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{ asset('js/onepage-nav.min.js')}}"></script>
	<!-- Easing JS -->
	<script src="{{ asset('js/easing.js')}}"></script>
	<!-- Active JS -->
	<script src="{{ asset('js/active.js')}}"></script>
    @livewireScripts
</body>
</html>
