<div class="shopping-cart section">

    <div class="container">
        <div class="row">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="" class="link">Admin</a></li>
                    <li class="item-link"><span>All Orders</span></li>
                </ul>
            </div>

        </div>

        <div class="row">

                <div class="col-md-12">
                    @if (Session::has('order_message'))
                        <div class="alert alert-success">{{Session::get('order_message')}}</div>
                    @endif
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
                                <th class="text-center" colspan="2">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $i=0;
                        @endphp

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
                                        <td style="padding:8px; display:flex;" class="action" data-title="action">
                                            <div class="btn-group" style="margin-right: 5px">
                                                <button type="button" class="btn btn-danger dropdown-toggle" onclick="costumdrop({{$i}})" id="boutom" data-bs-toggle="dropdown" aria-expanded="false">
                                                  Action
                                                </button>
                                                <ul class=" customdrop">
                                                  <li><a class="dropdown-item" wire:click.prevent="updateOrderStatus({{$orders->id}},'delivered')" href="#">delivered</a></li>
                                                  <li><a class="dropdown-item" wire:click.prevent="updateOrderStatus({{$orders->id}},'canceled')" href="#">canceled</a></li>

                                                </ul>
                                              </div>
                                              <div class="btn-group">
                                                <a href="{{route('Admin.orderDetails',['order_id'=>$orders->id])}}" type="button" class="btn btn-success">Details</a>
                                             </div>
                                        </td>
                                        {{-- <td style="padding:8px;" class="action">



                                        </td> --}}


                                    </tr>
                                    @php
                                        $i++
                                    @endphp

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


<script>
 const drop=document.getElementsByClassName("customdrop");
 function dropnone(){
    for(i=0;i<drop.length;i++){
    drop[i].style.display="none";
 }
 }
 dropnone();
 function costumdrop(i){
     console.log(i);
    if(drop[i].style.display=="block"){
        dropnone();
    }else{
        dropnone();
        drop[i].style.display="block";
    }
 }
</script>
