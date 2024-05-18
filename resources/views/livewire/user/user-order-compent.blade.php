<div class="shopping-cart section">

    <div class="container">
        <div class="row">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="" class="link">User</a></li>
                    <li class="item-link"><span>My Orders</span></li>
                </ul>
            </div>

        </div>

        <div class="row">

                <div class="col-md-12">
                    <!-- Shopping Summery -->
                    <table class="table shopping-summery">
                        <thead>
                            <tr class="main-hading">
                                <th>Order Id</th>
                                <th>Subtotal</th>
                                <th class="text-center">Discount</th>
                                <th class="text-center">Tax</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">First name</th>
                                <th class="text-center">Last name</th>
                                <th class="text-center">Mobile</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">code postal</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Order date</th>
                                <th class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody>


                                    @foreach ($order as $orders)
                                    <tr>

                                        <td style="padding:8px;" class="price" data-title="Order Id"><span>{{$orders->id}}</span></td>
                                        <td style="padding:8px;" class="price" data-title="Subtotal"><span>{{$orders->subtotal}}</span></td>
                                        <td style="padding:8px;" class="price" data-title="Discount"><span>{{$orders->discount}}</span></td>
                                        <td style="padding:8px;" class="price" data-title="Tax"><span>{{$orders->tax}}</span></td>
                                        <td style="padding:8px;" class="price" data-title="Total"><span>{{$orders->total}}</span></td>
                                        <td style="padding:8px;" class="price" data-title="First name"><span>{{$orders->firstname}}</span></td>
                                        <td style="padding:8px;" class="price" data-title="Last name"><span>{{$orders->lastname}}</span></td>
                                        <td style="padding:8px;" class="price" data-title="Mobile"><span>{{$orders->mobile}}</span></td>
                                        <td style="padding:8px;" class="price" data-title="Email"><span>{{$orders->email}}</span></td>
                                        <td style="padding:8px;" class="price" data-title="code postal"><span>{{$orders->codepostal}}</span></td>
                                        <td style="padding:8px;" class="price" data-title="Status"><span>{{$orders->status}}</span></td>
                                        <td style="padding:8px;" class="price" data-title="Order date"><span>{{$orders->created_at}}</span></td>
                                        <td style="padding:8px;" class="action" data-title="action">

                                            <a href="{{route('user.orderDetails',['order_id'=>$orders->id])}}" type="button" class="btn btn-success">Details</a>

                                        </td>
                                    </tr>
                                    @endforeach


                        </tbody>
                    </table>

                </div>

            <div id="link">
                {{$order->links()}}
            </div>

        </div>

    </div>
</div>
