
<div class="shopping-cart section">

    <div class="container">
        <div class="row">

            <div class="wrap-breadcrumb">
                <ul>
                    <li class="item-link"><a href="#" class="link">Admin</a></li>
                    <li class="item-link"><span>Sales</span></li>
                </ul>
            </div>
            <div class="buttonv">
                {{-- <a href="{{route('Admin.category')}}"type="button" class="btn btn-success">All Categories</a> --}}
            </div>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-success">{{Session::get('message')}}</div>
            @endif
        <div class="row">

            <div class="col-12">

                <form wire:submit.prevent="updateSale" >

                    <div class="mb-3">
                        <label for="exampleInput" class="form-label" >category</label>
                        <select id="inputState" class="form-select" wire:model="status" >
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                        </select>
                    </div>
                    <div class="mb-3">
                            <label for="exampleInput" class="form-label">sale date</label>
                            <div class='input-group date' id='datetimepicker1'>
                                <input type='datetime-local' class="form-control" wire:model="sale_date" />
                                <span class="input-group-addon\">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>

                    </div>
                    <button type="submit" class="btn btn-primary">update</button>
                </form>

            </div>


        </div>

    </div>
</div>

<!-- this works OK -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
<!-- this does not! -->




        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css">
@push('scripts')
    <script>
        document.getElementById('inputState').style.display = "block"
        // $(function(){
        //     $('#sale-date').datetimepicker({
        //         format : 'Y-MM-DD h:m:s',
        //     })
        //     .on('dp.change',function(ev){
        //         var data= $('#sale-date').val();
        //         @this.set('sale_date',date);s
        //     });
        // });
        $(".date").datetimepicker({locale: "ru"});
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

@endpush
