
<div class="shopping-cart section">

    <div class="container">
        <div class="row">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">Admin</a></li>
                    <li class="item-link"><span>All Coupons</span></li>
                </ul>
            </div>
            <div class="buttonv">
                <a href="{{route('Admin.AddCoupon')}}" type="button" class="btn btn-success">Add Coupon</a>
            </div>
        </div>
        @if (Session::has('message'))
                <div class="alert alert-danger">{{Session::get('message')}}</div>
        @endif
        <div class="row">

            <div class="col-12">
                <!-- Shopping Summery -->
                <table class="table shopping-summery">
                    <thead>
                        <tr class="main-hading">
                            <th>Id</th>
                            <th>Coupon Code</th>
                            <th>Coupon Type</th>
                            <th>Coupon Value</th>
                            <th>Cart Value</th>
                            <th class="text-center">action</th>
                        </tr>
                    </thead>
                    <tbody>


                                @foreach ($Coupons as $Coupon)
                                <tr>

                                <td class="price" data-title="Price"><span>{{$Coupon->id}}</span></td>
                                <td class="price" data-title="Price"><span>{{$Coupon->code}}</span></td>
                                <td class="price" data-title="Price"><span>{{$Coupon->type}}</span></td>
                                @if ($Coupon->type == 'fixed')
                                    <td class="price" data-title="Price"><span>{{$Coupon->value}}</span></td>
                                @else
                                <td class="price" data-title="Price"><span>{{$Coupon->value}} %</span></td>
                                @endif
                                <td class="price" data-title="Price"><span>{{$Coupon->cart_value}}</span></td>
                                <td class="action" >
                                    <a href="{{route('Admin.EditCoupon',['coupon_id'=>$Coupon->id])}}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                      </svg></a>
                                    <a href="#" onclick="confirm('Are you sure, You want to delete this coupon?') || event.stopImmediatePropagation()" wire:click.prevent=deleteCoupon({{$Coupon->id}})><i class="ti-trash remove-icon"></i></a>

                                </td>
                                </tr>
                                @endforeach

                    </tbody>
                </table>

            </div>
            {{-- <div id="link">
                {{$Coupons->links()}}
            </div> --}}

        </div>

    </div>
</div>
