<?php

namespace App\Http\Livewire;
use App\Models\Product;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Category;

class WishlistComponent extends Component
{
    public function store($product_id,$product_name,$product_price)
    {
        Cart::instance('cart')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        session()->flash('success message','Item added in Cart');
        return redirect()->route('product.cart');
    }
    public function addTowishlist($product_id,$product_name,$product_price)
    {
        Cart::instance('wishlist')->add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        $this->emitTo('wishlist-count-component','refreshComponent');
        // session()->flash('success message','Item added in Cart');
        // return redirect()->route('product.cart');
    }
    public function deleteTowishlist($product_id)
    {
        foreach(Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id == $product_id){
                Cart::instance('wishlist')->remove($witem->rowId);
                $this->emitTo('wishlist-count-component','refreshComponent');
                return;
            }

        }
    }
    public function render()
    {
        return view('livewire.wishlist-component')->layout("layouts.shop");
    }
}
