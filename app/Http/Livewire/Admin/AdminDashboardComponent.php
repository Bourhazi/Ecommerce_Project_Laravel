<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;
use App\Models\HomeSlider;

class AdminDashboardComponent extends Component
{
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
