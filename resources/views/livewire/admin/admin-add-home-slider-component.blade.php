
<div class="shopping-cart section">

    <div class="container">
        <div class="row">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">Admin</a></li>
                    <li class="item-link"><span>All Products</span></li>
                </ul>
            </div>
            <div class="buttonv">
                <a href="{{route('Admin.homeslider')}}"type="button" class="btn btn-success">All Sliders</a>
            </div>
        </div>

        <div class="row">
            @if (Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif

            <div class="col-12">

                <form wire:submit.prevent="addSlider" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">Tite</label>
                        <input type="text" class="form-control" placeholder=" tite"  wire:model="tite" >
                        {{-- @error('name') <p class="text-danger">{{$message}}</p>@enderror --}}
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">Subtite</label>
                        <input type="text" class="form-control" placeholder=" Subtite"  wire:model="Subtite" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">Price</label>
                        <input type="text" class="form-control" placeholder="Price"  wire:model="Price" >
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">Link</label>
                        <input type="text" class="form-control" placeholder="Link"  wire:model="Link" >
                    </div>

                    <div class="mb-3">
                        <label for="exampleInput" class="form-label" >statut</label>
                        <select id="inputState" class="form-select" wire:model="statut">
                          <option value="1">Active</option>
                          <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">image</label>
                        <input type="file" class="form-control" placeholder="image" wire:model="image" >
                        @error('image') <p class="text-danger">{{$message}}</p>@enderror
                        @if ($image)
                            <img src="{{$image->temporaryUrl()}}" width="120"/>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>

    </div>

</div>

@push('scripts')
<script>

     document.getElementById('inputState').style.display = "block"
     document.getElementsByClassName('nice-select form-select')[0].style.display = "none"

</script>
@endpush
