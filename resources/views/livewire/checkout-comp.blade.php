<main>
    <section class="shop checkout section">
        <div class="container">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">Admin</a></li>
                    <li class="item-link"><span>All Coupons</span></li>
                </ul>
            </div>
            <form  wire:submit.prevent="placeOrder">
                <div class="row">

                    <div class="col-lg-8 col-12">
                        <div class="checkout-form">
                            <h2>Make Your Checkout Here</h2>
                            <p>Please register in order to checkout more quickly</p>
                            <!-- Form -->
                            <div class="form" >
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>First Name<span>*</span></label>
                                            <input type="text" name="firstname" placeholder="" required="required" wire:model="firstname">
                                            @error('firstname')
                                                <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Last Name<span>*</span></label>
                                            <input type="text" name="lastname" placeholder="" required="required" wire:model="lastname">
                                            @error('lastname')
                                                <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Email Address<span>*</span></label>
                                            <input type="email" name="email" placeholder="" required="required" wire:model="email">
                                            @error('email')
                                                <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Phone Number<span>*</span></label>
                                            <input type="number" name="mobile" placeholder="" required="required" wire:model="mobile">
                                            @error('mobile')
                                                <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Address Line 1<span>*</span></label>
                                            <input type="text" name="line1" placeholder="" required="required" wire:model="line1">
                                            @error('line1')
                                                <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Address Line 2</label>
                                            <input type="text" name="line2" placeholder=""  wire:model="line2">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Town / City<span>*</span></label>
                                            <input type="text" name="city" placeholder="" required="required" wire:model="city">
                                            @error('city')
                                                <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                            {{-- <select name="state-province" id="state-province">
                                                <option value="divition" selected="selected">New Yourk</option>
                                                <option>Los Angeles</option>
                                                <option>Chicago</option>
                                                <option>Houston</option>
                                                <option>San Diego</option>
                                                <option>Dallas</option>
                                                <option>Charlotte</option>
                                            </select> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Province<span>*</span></label>
                                            <input type="text" name="province" placeholder="" required="required" wire:model="province">
                                            @error('province')
                                                <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Country<span>*</span></label>
                                            <input type="text" name="country" placeholder="" required="required" wire:model="country">
                                            @error('country')
                                                <span class="text-danger"> {{$message}}</span>
                                            @enderror

                                        </div>
                                    </div>


                                    <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Postal Code<span>*</span></label>
                                            <input type="text" name="codepostal" placeholder="" required="required" wire:model="codepostal">
                                            @error('codepostal')
                                                <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="col-lg-6 col-md-6 col-12">
                                        <div class="form-group">
                                            <label>Company<span>*</span></label>
                                            <select name="company_name" id="company">
                                                <option value="company" selected="selected">Microsoft</option>
                                                <option>Apple</option>
                                                <option>Xaiomi</option>
                                                <option>Huawer</option>
                                                <option>Wpthemesgrid</option>
                                                <option>Samsung</option>
                                                <option>Motorola</option>
                                            </select>
                                        </div>
                                    </div> --}}
                                    <div class="col-12">
                                        <div class="form-group create-account">
                                            <input id="cbox" type="checkbox" wire:model="ship_to_different">
                                            <label>Ship to a different address?</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Form -->
                        </div>
                    </div>
                    @if ($ship_to_different)
                        <div class="col-lg-8 col-12">
                            <div class="checkout-form">
                                <h2>Shipping Address</h2>

                                <!-- Form -->
                                <div class="form" >
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>First Name<span>*</span></label>
                                                <input type="text" name="s_firstname" placeholder="" required="required" wire:model="s_firstname">
                                                @error('s_firstname')
                                                    <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Last Name<span>*</span></label>
                                                <input type="text" name="s_lastname" placeholder="" required="required" wire:model="s_lastname">
                                                @error('s_lastname')
                                                    <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Email Address<span>*</span></label>
                                                <input type="email" name="s_email" placeholder="" required="required" wire:model="s_email">
                                                @error('s_email')
                                                <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Phone Number<span>*</span></label>
                                                <input type="number" name="s_mobile" placeholder="" required="required" wire:model="s_mobile">
                                                @error('s_mobile')
                                                <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Address Line 1<span>*</span></label>
                                                <input type="text" name="s_line1" placeholder="" required="required" wire:model="s_line1">
                                                @error('s_line1')
                                                <span class="text-danger"> {{$message}}</span>
                                            @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Address Line 2</label>
                                                <input type="text" name="s_line2" placeholder=""  wire:model="s_line2">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Town / City<span>*</span></label>
                                                <input type="text" name="s_city" placeholder="" required="required" wire:model="s_city">
                                                @error('s_city')
                                                    <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                                {{-- <select name="state-province" id="state-province">
                                                    <option value="divition" selected="selected">New Yourk</option>
                                                    <option>Los Angeles</option>
                                                    <option>Chicago</option>
                                                    <option>Houston</option>
                                                    <option>San Diego</option>
                                                    <option>Dallas</option>
                                                    <option>Charlotte</option>
                                                </select> --}}
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Province<span>*</span></label>
                                                <input type="text" name="s_province" placeholder="" required="required" wire:model="s_province">
                                                @error('s_province')
                                                    <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Country<span>*</span></label>
                                                <input type="text" name="s_country" placeholder="" required="required" wire:model="s_country">
                                                @error('s_country')
                                                    <span class="text-danger"> {{$message}}</span>
                                                @enderror

                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Postal Code<span>*</span></label>
                                                <input type="text" name="s_codepostal" placeholder="" required="required" wire:model="s_codepostal">
                                                @error('s_codepostal')
                                                    <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        {{-- <div class="col-lg-6 col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Company<span>*</span></label>
                                                <select name="company_name" id="company">
                                                    <option value="company" selected="selected">Microsoft</option>
                                                    <option>Apple</option>
                                                    <option>Xaiomi</option>
                                                    <option>Huawer</option>
                                                    <option>Wpthemesgrid</option>
                                                    <option>Samsung</option>
                                                    <option>Motorola</option>
                                                </select>
                                            </div>
                                        </div> --}}

                                    </div>
                                </div>
                                <!--/ End Form -->
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-4 col-12">
                        <div class="order-details">
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>CART  TOTALS</h2>
                                <div class="content">
                                    <ul>
                                    @if (Session::has('checkout'))
                                        <li>Sub Total<span>{{session()->get('checkout')['subtotal']}}</span></li>
                                        <li>(+) Shipping<span>$10.00</span></li>
                                        <li class="last">Total<span>{{session()->get('checkout')['total'] + 10}}</span></li>
                                    @endif

                                    </ul>
                                </div>
                            </div>
                            <!--/ End Order Widget -->
                            <!-- Order Widget -->
                            <div class="single-widget">
                                <h2>Payments</h2>

                                <div class="content">
                                    <div class="checkbox">
                                        <label class="checkbox-inline" ><input  type="checkbox" id="cbox" value="cod" wire:model="paymentmode"> Cash On Delivery</label>

                                        <label class="checkbox-inline" for="1"><input name="updates" id="1" type="checkbox" value="card" wire:model="paymentmode"> Debit / Credit Card</label>

                                        {{-- <label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox" value="paypal" wire:model="paymentmode"> PayPal</label> --}}
                                        @error('paymentmode')
                                                <span class="text-danger"> {{$message}}</span>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <!--/ End Order Widget -->
                            <!-- Payment Method Widget -->
                            @if($paymentmode && $this->paymentmode == 'card')
                            @if (Session::has('stripe_error'))
                                <div class="alert alert-danger" role="alert">{{session::get('stripe_error')}}</div>
                            @endif
                                <div class="container">
                                    <div class="form" >
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Carte number:</label>
                                                    <input  type="number" name="cartenumber" placeholder="Carte number" required="required" wire:model="cartenumber" >

                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Expiry Month:</label>
                                                    <input  type="number" name="expirymonth" placeholder="MM" required="required" wire:model="expirymonth">
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>Expiry Year:</label>
                                                    <input type="number" name="expiryyear" placeholder="YYYY" required="required" wire:model="expiryyear">

                                                </div>

                                            </div>
                                            <div class="col-lg-6 col-md-6 col-12">
                                                <div class="form-group">
                                                    <label>CVC:</label>
                                                    <input type="password" name="cvc" placeholder="****" required="required" wire:model="cvc">

                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="single-widget payement">
                                <div class="content">
                                    <img src="images/payment-method.png" alt="#">
                                </div>
                            </div>
                            <!--/ End Payment Method Widget -->
                            <!-- Button Widget -->
                            <div class="single-widget get-button">
                                <div class="content">
                                    <div class="button">
                                        <button  type="submit" class="btn">proceed to checkout</button>
                                    </div>
                                </div>
                            </div>
                            <!--/ End Button Widget -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!--/ End Checkout -->

    <!-- Start Shop Services Area  -->
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
    <!-- End Shop Services -->

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
