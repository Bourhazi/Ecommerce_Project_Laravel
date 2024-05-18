<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;

class CartCountComponent extends Component
{
    protected $listeners=['refreshComponent'=>'$refresh'];
    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        //session()->flash('success message','Item has been removed');
        return redirect()->route('product.cart');
    }
    public function checkout()
    {
        if(Auth::check()){
            return redirect()->route('product.checkout');
        }
        else{
            return redirect()->route('login');
        }
    }
    public function render()
    {
        return view('livewire.cart-count-component');
    }
}
