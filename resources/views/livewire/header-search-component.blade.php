
<style>
    .show {display: block;}
</style>
<div class="col-lg-8 col-md-7 col-12" >
    <div class="search-bar-top">
        <div class="search-bar">
                <div class="wrap-list-cate">
                    <form action="{{route('product.search')}}" id="form-search-top" name="form-search-top">
                        <input name="search" placeholder="Search Products Here....." type="search" value="{{$search}}">
                        <button  type="submit" class="btnn"><i class="ti-search"></i></button>

                    <div class="nice-select" >

                        <a href="#" class="link-control" >{{str_split($product_cat,12)[0]}} </a>
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
                            <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659 4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
                          </svg> --}}
                        <input type="hidden" name="product_cat" value="{{$product_cat}} " id="product-cate">
                        <input type="hidden" name="product_cat_id" value="{{$product_cat_id}}" id="product-cate-id  ">
                        <ul class="dropdown-menu" id="dropdown-menu">
                            <li id="drop"><a class="drop" href="#">All Category</a></li>
                            @foreach ( $categories as $categorie)
                                <li id="drop" data-id="{{$categorie->id}}"><a class="drop" href="#">{{$categorie->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </form>
                </div>
        </div>
    </div>
</div>



@push('scripts')
    <script>
        /*function myFunction() {
                    test2 = document.getElementById("nice-select");
                    test =document.getElementById("dropdown-menu");
                    if (test.style.display == "block"){
                        console.log('block')
                        test2.closest('ul').style.display = "none";
                    }else{
                        console.log('none')
                        test2.children().style.display = "block";
                    }

                }*/
        window.onclick = function(event) {
                //

                if (!event.target.matches('.link-control')) {

                    var dropdowns = document.getElementsByClassName("dropdown-menu");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.style.display == "block")
                            openDropdown.style.display = "none";
                        }
                    }
                }

        //document.getElementById('select').style.display = "block";
        console.log($('.wrap-list-cate .nice-select').length);

        if($('.wrap-list-cate .nice-select ').length > 0){
                $('.wrap-list-cate .nice-select').on('click', '.link-control', function (event) {
                    console.log('aaaaaaaaaaaa');
					event.preventDefault();
					$(this).siblings('ul').slideToggle();
                });
                $('.wrap-list-cate .nice-select .dropdown-menu').on('click', 'li', function (event) {
                    var _this 	 = $(this),
						_value 	 = _this.text(),
						_content = _this.text(),
						_title 	 = _this.text();
                    _content = _content.slice(0, 12);
                    _this.parent().siblings('a').text(_content).attr('title',_title);
                    _this.parent().siblings('input[name="product_cat"]').val(_value);
                    _this.parent().siblings('input[name="product_cat_id"]').val(_this.data("id"));
                    _this.parent().slideUp();
                });
			}
			if($("select:not(.except-chosen)").length > 0){
				$("select:not(.except-chosen)").each(function(){
					$(this).chosen();
				});
			}
            // search=document.getElementById('search-bar');


    </script>
@endpush
