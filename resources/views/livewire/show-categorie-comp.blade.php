<div class="col-lg-3" >
    <div class="all-category">
        <h3 class="cat-heading" class="col-sm-8"><i class="fa fa-bars" aria-hidden="false"></i>CATEGORIES</h3>
             <ul class="main-category">
                @foreach ( $category as  $categorie)
                <li><a href="#">{{$categorie->name}}</a></li>
                @endforeach
            </ul>
    </div>
</div>
