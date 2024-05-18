<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use resources\views\layouts;
use Gloudemans\Shoppingcart\Facades\Cart;

class HomeComponent extends Component
{

    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success message','Item added in Cart');
        return redirect()->route('product.cart');
    }


    public function render()
    {
        $products=Product::orderby('created_at','DESC')->get()->take(8);
        $category = HomeCategory::find(1);
        $cats = explode(',',$category->sel_categories);
        $categories = Category::whereIn('id',$cats)->get();
        $no_of_products = $category->no_of_products;
        $product= Product::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        $Sale= Sale::find(1);
        $sliders = HomeSlider::where('status',1)->get();
        return view('livewire.home-component',['sliders'=>$sliders,'products'=>$products,'categories'=>$categories,'no_of_products'=>$no_of_products,'product'=>$product,'Sale'=>$Sale])->layout("layouts.shop");
    }
}
?>
