<div class="shopping-cart section">

    <div class="container">
        <div class="row">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">Admin</a></li>
                    <li class="item-link"><span>Add Category</span></li>
                </ul>
            </div>
            <div class="buttonv">
                <a href="{{route('Admin.category')}}"type="button" class="btn btn-success">All Categories</a>
            </div>
        </div>
        @if (Session::has('message'))
        <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif

        <div class="row">

            <div class="col-12">

                <form wire:submit.prevent="soreCategory" >
                    <div class="mb-3">
                      <label for="exampleInput" class="form-label">Category name</label>
                      <input type="text" class="form-control" placeholder="Category name" aria-describedby="emailHelp" wire:model="name" wire:keyup="generateslug">
                      @error('name') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label">Category slug</label>
                      <input  class="form-control" placeholder="Category slug" wire:model="slug" >
                      @error('slug') <p class="text-danger">{{$message}}</p>@enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>


        </div>

    </div>
</div>
