<div class="shopping-cart section">

    <div class="container">
        <div class="row">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">Admin</a></li>
                    <li class="item-link"><span>edit Coupon</span></li>
                </ul>
            </div>
            <div class="buttonv">
                <a href="{{route('Admin.Coupons')}}"type="button" class="btn btn-success">All Coupons</a>
            </div>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        <div class="row">

            <div class="col-12">

                <form wire:submit.prevent="UpdateCoupon" >
                    <div class="mb-3">
                      <label for="exampleInput" class="form-label">Coupon Code</label>
                      <input type="text" class="form-control" placeholder="Category name" aria-describedby="emailHelp" wire:model="code" >
                      @error('code') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Coupon Type</label>
                      <select id="inputState2" class="form-select" wire:model="type">
                        <option value="instock">Select</option>
                        <option value="fixed">fixed</option>
                        <option value="Percent">Percent</option>
                      </select>
                      @error('type') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">Coupon Value</label>
                        <input type="text" class="form-control" placeholder="Category name" aria-describedby="emailHelp" wire:model="value" >
                        @error('value') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">Cart Value</label>
                        <input type="text" class="form-control" placeholder="Category name" aria-describedby="emailHelp" wire:model="cart_value" >
                        @error('cart_value') <p class="text-danger">{{$message}}</p>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary">update</button>
                </form>

            </div>


        </div>

    </div>
</div>

@push('scripts')
<script>
    // console.log()
    //  for(i=0;i<3;i++){
    //     document.getElementsByClassName('form-select')[i].style.display = "block"
    //  }
     document.getElementById('inputState2').style.display = "block"
     document.getElementsByClassName('nice-select form-select')[0].style.display = "none"

</script>
@endpush
