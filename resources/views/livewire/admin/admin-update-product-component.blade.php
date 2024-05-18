<div class="shopping-cart section">

    <div class="container">
        <div class="row">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">Admin</a></li>
                    <li class="item-link"><span>Edit Products</span></li>
                </ul>
            </div>
            <div class="buttonv">
                <a href="{{route('Admin.Product')}}"type="button" class="btn btn-success">All Products</a>
            </div>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
        @endif
        <div class="row">


            <div class="col-12">

                <form wire:submit.prevent="soreProduct" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">Product name</label>
                        <input type="text" class="form-control" placeholder="Product name"  wire:model="name" wire:keyup="generateslug" >
                        @error('name') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">Product slug</label>
                        <input type="text" class="form-control" placeholder="Product slug"  wire:model="slug" >
                        @error('slug') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">short_description</label>
                        <textarea type="text" class="form-control" placeholder="short description" wire:model="short_description" ></textarea>
                        @error('short_description') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">description</label>
                        <textarea type="text" class="form-control" placeholder="description" wire:model="description" ></textarea>
                        @error('description') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">regular price</label>
                        <input type="text" class="form-control"  placeholder="regular price" wire:model="regular_price">
                        @error('regular_price') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">sale Price</label>
                        <input type="text" class="form-control" placeholder="sale price" wire:model="sale_price" >
                        @error('sale_price') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">SKU</label>
                        <input type="text" class="form-control" placeholder="sku"  wire:model="sku" >
                        @error('sku') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label" >Product statut</label>
                        <select id="inputState" class="form-select" wire:model="stock">
                          <option value="instock">instock</option>
                          <option value="outofstock">out of stock</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label" >featured</label>
                        <select id="inputState" class="form-select" wire:model="featured">
                          <option value="0">No</option>
                          <option value="1">Yes</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">Quantity</label>
                        <input type="text" class="form-control" placeholder="quantity" wire:model="quantity" >
                        @error('quantity') <p class="text-danger">{{$message}}</p>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">image</label>
                        <input type="file" class="form-control" placeholder="image" wire:model="image" >
                        @error('image') <p class="text-danger">{{$message}}</p>@enderror
                        @if ($image)
                            <img src="{{$image->temporaryUrl()}}" width="120"/>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label" >category</label>
                        <select id="inputState2" class="form-select" placeholder="category" wire:model="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>

    </div>

</div>
<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
</div>

@push('scripts')
<script>
    console.log()
     for(i=0;i<3;i++){
        document.getElementsByClassName('form-select')[i].style.display = "block"
     }
     document.getElementById('inputState2').style.display = "block"
     document.getElementsByClassName('nice-select form-select')[0].style.display = "none"

</script>
@endpush
