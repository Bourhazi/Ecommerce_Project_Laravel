<section class="shop checkout section shopping-cart section">
    <div class="container">

            <div class="row">
                <div class="wrap-breadcrumb">
                    <ul>
                        <li class="item-link"><a href="" class="link">Admin</a></li>
                        <li class="item-link"><span>Order Details</span></li>
                    </ul>
                </div>
                <div class="buttonv">
                    <a href="{{route('user.order')}}" type="button" class="btn btn-success">my Orders</a>
                    @if ($order->status == "delivered")
                         <a  href="#" type="button" wire:click.prevent="canceledOrder" class="btn btn-success">canceled order</a>
                    @endif

                </div>

            </div>
            <div class="row">

                <div class="col-md-12">
                     @if (Session::has('order_message'))
                        <div class="alert alert-success">{{Session::get('order_message')}}</div>
                    @endif
                    <div class="order-details">
                        <!-- Order Widget -->
                        <div class="single-widget">
                            <h2>Order Details</h2>
                            <br>
                            <table class="table shopping-summery">
                                <thead>
                                    <tr class="main-hading">
                                        <th>Order ID</th>
                                        <th>Order date</th>
                                        <th class="text-center">Status</th>
                                        @if ($order->status == "delivered")
                                        <th class="text-center">Delivery Date</th>
                                        @elseif ($order->status == "canceled")
                                        <th class="text-center">Canceled Date</th>
                                        @endif

                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td style="padding:8px; border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Description"><p class="product-name">{{$order->id}}</p></td>
                                            <td style="padding:8px;border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Description"><p class="product-name">{{$order->created_at}}</p></td>
                                            <td style="padding:8px;border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;"  class="product-des" data-title="Description"><p class="product-name">{{$order->status}}</p></td>
                                            @if ($order->status == "delivered")
                                            <td style="padding:8px;border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Description"><p class="product-name">{{$order->delivered_date}}</p></td>
                                            @elseif ($order->status == "canceled")
                                            <td style="padding:8px;border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Description"><p class="product-name">{{$order->canceled_date}}</p></td>
                                            @endif


                                        </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="order-details">
                        <!-- Order Widget -->
                        <div class="single-widget">
                            <h2>Order items</h2>

                            <br>
                            <div class="content">
                                <table class="table2 shopping-summery">
                                    <tbody>
                                        @foreach ($order->OrderItem as $item)

                                            <tr class="main-hading">
                                                <td class="image" style="width:100px;" data-title="No"><img src="{{asset('images/products')}}/{{$item->product->image}}" alt="#"></td>
                                                <td class="product-des" >
                                                    <p class="product-name"><a href="#">{{$item->product->name}}</a></p>
                                                    {{-- <p class="product-des">{{$item->model->short_description}}</p> --}}
                                                </td>
                                                <td class="price"><span>${{$item->price}}</span></td>
                                                <td class="qty"><!-- Input Order -->
                                                    <div class="input-group">
                                                        <p>{{$item->quantity}}</p>
                                                    </div>
                                                    <!--/ End Input Order -->
                                                </td>
                                                <td class="total-amount"><span>${{$item->price * $item->quantity}}</span></td>

                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                                    <div class="content">
                                        <ul>

                                            <li>Sub Total<span>${{$order->subtotal}}</span></li>
                                            <li>Tax<span>${{$order->tax}}</span></li>
                                            <li>Shipping<span>Free Shipping</span></li>
                                            <li>Total<span>${{$order->total}}</span></li>


                                        </ul>
                                    </div>

                            </div>
                        </div>
                    </div>
                    <div class="order-details">

                       <div class="single-widget">
                            <h2>Billing Details</h2>
                            <br>
                            <table class="table shopping-summery">
                                <thead>
                                    <tr class="main-hading">
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Mail</th>
                                        <th class="text-center">Line1</th>
                                        <th class="text-center">Line2</th>
                                        <th class="text-center">City</th>
                                        <th class="text-center">Province</th>
                                        <th class="text-center">Country</th>
                                        <th class="text-center">Code postal</th>

                                    </tr>
                                </thead>
                                <tbody>

                                        <tr >

                                            <td style="padding:8px; border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Description"><p class="product-name">{{$order->firstname}}</p></td>
                                            <td style="padding:8px;border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Description"><p class="product-name">{{$order->lastname}}</p></td>
                                            <td style="padding:8px;border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;"  class="product-des" data-title="Description"><p class="product-name">{{$order->mobile}}</p></td>
                                            <td style="padding:8px;border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Description"><p class="product-name">{{$order->email}}</p></td>
                                            <td style="padding:8px;border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Description"><p class="product-name">{{$order->line1}}</p></td>
                                            <td style="padding:8px;border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Description"><p class="product-name">{{$order->line2}}</p></td>
                                            <td style="padding:8px;border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Description"><p class="product-name">{{$order->city}}</p></td>
                                            <td style="padding:8px;border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Description"><p class="product-name">{{$order->province}}</p></td>
                                            <td style="padding:8px;border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Description"><p class="product-name">{{$order->country}}</p></td>
                                            <td style="padding:8px;border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Description"><p class="product-name">{{$order->codepostal}}</p></td>

                                        </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="order-details">

                        <div class="single-widget">
                            <h2>Shipping Details</h2>
                            <br>
                            <table class="table shopping-summery">
                                <thead>
                                    <tr class="main-hading">
                                        <th>First name</th>
                                        <th>Last name</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Mail</th>
                                        <th class="text-center">Line1</th>
                                        <th class="text-center">Line2</th>
                                        <th class="text-center">City</th>
                                        <th class="text-center">Province</th>
                                        <th class="text-center">Country</th>
                                        <th class="text-center">Code postal</th>

                                    </tr>
                                </thead>
                                <tbody>

                                        <tr >

                                            <td style="padding:8px; border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="First name"><p class="product-name">{{$order->Shipping->firstname}}</p></td>
                                            <td style="padding:8px; border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Last name"><p class="product-name">{{$order->Shipping->lastname}}</p></td>
                                            <td style="padding:8px; border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Phone"><p class="product-name">{{$order->Shipping->mobile}}</p></td>
                                            <td style="padding:8px; border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Mail"><p class="product-name">{{$order->Shipping->email}}</p></td>
                                            <td style="padding:8px; border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Line1"><p class="product-name">{{$order->Shipping->line1}}</p></td>
                                            <td style="padding:8px; border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Line2"><p class="product-name">{{$order->Shipping->line2}}</p></td>
                                            <td style="padding:8px; border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="City"><p class="product-name">{{$order->Shipping->city}}</p></td>
                                            <td style="padding:8px; border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Province"><p class="product-name">{{$order->Shipping->province}}</p></td>
                                            <td style="padding:8px; border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Country"><p class="product-name">{{$order->Shipping->country}}</p></td>
                                            <td style="padding:8px; border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" class="product-des" data-title="Code postal"><p class="product-name">{{$order->Shipping->codepostal}}</p></td>

                                        </tr>

                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="order-details">
                        <div class="single-widget">
                            <h2>Transaction</h2>
                            <br>
                            <table class="table shopping-summery">
                                <thead>
                                    <tr class="main-hading">
                                        <th >Mode</th>
                                        <th >Status</th>
                                        <th >Transaction Date</th>

                                    </tr>
                                </thead>
                                <tbody>
                                        <tr >
                                            <td  style="padding:8px; border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" data-title="Mode" class="text-center"><p class="product-name">{{$order->Transaction->mode}}</p></td>
                                            <td  style="padding:8px; border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;" data-title="Status" class="text-center"><p class="product-name">{{$order->Transaction->status}}</p></td>
                                            <td  style="padding:8px; border-left:1px solid rgba(114, 114, 114, 0.19); border-right:1px solid rgba(114, 114, 114, 0.19) ;"data-title="Transaction Date" class="text-center"><p class="product-name">{{$order->Transaction->created_at}}</p></td>
                                        </tr>
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>
            </div>

    </div>
</section>
