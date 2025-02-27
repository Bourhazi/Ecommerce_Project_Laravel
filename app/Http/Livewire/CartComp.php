<?php

namespace App\Http\Livewire;

use App\Models\Coupon;
use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
class CartComp extends Component
{
    public $couponCode;
    public $discount;
    public $subtotalAfterDiscount;
    public $taxAfterDiscount;
    public $totalAfterDiscount;

    public function increaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function decreaseQuantity($rowId){
        $product = Cart::instance('cart')->get($rowId);
        $qty = $product->qty - 1;
        Cart::instance('cart')->update($rowId,$qty);
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function destroy($rowId)
    {
        Cart::instance('cart')->remove($rowId);
        session()->flash('d_success_message','Item has been removed successfully!');
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function destroyall()
    {
        Cart::instance('cart')->destroy();
        session()->flash('da_success_message','all Items has been removed successfully!');
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function switchToSaveForLeter($rowId){
        $item=Cart::instance('cart')->get($rowId);
        Cart::instance('cart')->remove($rowId);
        Cart::instance('saveForLater')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('success_message','Item has been saved for later successfully!');
    }
    public function MoveToCart($rowId){
        $item=Cart::instance('saveForLater')->get($rowId);
        Cart::instance('saveForLater')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Product');
        $this->emitTo('cart-count-component','refreshComponent');
        session()->flash('s_success_message','Item has been moved to cart successfully!');
    }
    public function deleteFromSaveFolder($rowId)
    {
        Cart::instance('saveForLater')->remove($rowId);
        session()->flash('dff_success_message','Item has been removed from save for later successfully!');
        $this->emitTo('cart-count-component','refreshComponent');
    }
    public function applyCouponCode(){
        $coupon = Coupon::where('code',$this->couponCode)->where('cart_value','<=',Cart::instance('cart')->subtotal())->first();
        if(!$coupon)
        {
            session()->flash('coupon message','Coupon code is invalid!');
        }else{
            session()->put('coupon',[
                'code' => $coupon->code,
                'type' => $coupon->type,
                'value' => $coupon->value,
                'cart_value' => $coupon->cart_value
            ]);
        }

    }
    public function calculatDiscount(){
        if(session()->has('coupon'))
        {
            if(session()->get('coupon')['type'] == 'fixed')
            {
                $this->discount=session()->get('coupon')['value'];
            }
            else
            {
                $this->discount=(Cart::instance('cart')->subtotal() * session()->get('coupon')['value']) / 100;
            }
            $this->subtotalAfterDiscount=Cart::instance('cart')->subtotal()-$this->discount;
            $this->taxAfterDiscount= ($this->subtotalAfterDiscount * config('cart.tax'))/100;
            $this->totalAfterDiscount=$this->subtotalAfterDiscount+$this->taxAfterDiscount;
        }
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
    public function setAmountForCheckout(){
        if(!Cart::instance('cart')->count() > 0){
            session()->forget('checkout');
            return;
        }
        if(session()->has('coupon')){
            session()->put('checkout',[
                'discount' => $this->discount,
                'subtotal' => $this->subtotalAfterDiscount,
                'tax'=> $this->taxAfterDiscount,
                'total' =>$this->totalAfterDiscount
            ]);

        }else{
            session()->put('checkout',[
                'discount' => 0,
                'subtotal' => Cart::instance('cart')->subtotal(),
                'tax'=> Cart::instance('cart')->tax(),
                'total' =>Cart::instance('cart')->total()
            ]);
        }
    }
    public function render()
    {
        if(session()->has('coupon'))
        {
            if(Cart::instance('cart')->subtotal() < session()->get('coupon')['cart_value'])
            {
                session()->forget('coupon');
            }
            else
            {
                $this->calculatDiscount();
            }
        }
        $this->setAmountForCheckout();
        return view('livewire.cart-comp')->layout("layouts.shop");
    }
}
