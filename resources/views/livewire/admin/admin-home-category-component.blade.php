<div class="shopping-cart section">

    <div class="container">
        <div class="row">
            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">Admin</a></li>
                    <li class="item-link"><span>home categories</span></li>
                </ul>
            </div>
        </div>
        @if (Session::has('message'))
                <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
        <div class="row">


            <div class="col-12">

                <form wire:submit.prevent="updateHomeCategory">

                    <div class="mb-3" wire:ignore >
                        <label for="exampleInput" class="form-label" >Choose Categories</label>
                        <select  class="sel_categories form-select"  multiple aria-label="multiple select example" wire:model=selected_categories>
                            <option value="shose" selected>shose</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>

                        <!-- dribbble -->
                    </div>
                    <div class="mb-3">
                        <label for="exampleInput" class="form-label">No of Products</label>
                        <input type="text" class="form-control" placeholder="tap No of Products" wire:model=numberofproduct  >
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>

            </div>

        </div>

    </div>

</div>

@push('scripts')
    <script>
        $(document).ready(function(){
            $('.sel_categories').select2();
            $('.sel_categories').on('change',function(e){
                var data=$('.sel_categories').select2("val");
                @this.set('selected_categories',data);
            });
        });
    </script>
@endpush
