<?php

namespace App\Http\Livewire;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Shipping;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Symfony\Contracts\Service\Attribute\Required;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Validation\Rule;
use Stripe;
use Exception;


class CheckoutComp extends Component
{
    public $ship_to_different;


    public $firstname;
    public $lastname;
    public $email;
    public $mobile;
    public $line1;
    public $line2;
    public $city;
    public $province;
    public $country;
    public $codepostal;

    public $s_firstname;
    public $s_lastname;
    public $s_email;
    public $s_mobile;
    public $s_line1;
    public $s_line2;
    public $s_city;
    public $s_province;
    public $s_country;
    public $s_codepostal;

    public $paymentmode;
    public $thankyou;

    public $cartenumber;
    public $expirymonth;
    public $expiryyear;
    public $cvc;

    public function updated($fields){
        $this->validateOnly($fields,[
        'firstname' => 'required',
        'lastname'=> 'required',
        'email'=> 'required|email',
        'mobile'=> 'required|numeric',
        'line1'=> 'required',
        'city'=> 'required',
        'province'=> 'required',
        'country'=> 'required',
        'codepostal'=> 'required',
        'paymentmode'=> 'required'
        ]);
        if($this->ship_to_different)
        {
            $this->validateOnly($fields,[
                's_firstname' => 'required',
                's_lastname'=> 'required',
                's_email'=> 'required|email',
                's_mobile'=> 'required|numeric',
                's_line1'=> 'required',
                's_city'=> 'required',
                's_province'=> 'required',
                's_country'=> 'required',
                's_codepostal'=> 'required'
                ]);
        }
    }
    public function placeOrder()
    {
        $this->validate([
        'firstname' => 'required',
        'lastname'=> 'required',
        'email'=> 'required|email',
        'mobile'=> 'required|numeric',
        'line1'=> 'required',
        'city'=> 'required',
        'province'=> 'required',
        'country'=> 'required',
        'codepostal'=> 'required',
        'paymentmode'=> 'required'
        ]);
        $order = new Order();
        $order->user_id= Auth::user()->id;
        $order->subtotal=session()->get('checkout')['subtotal'];
        $order->discout=session()->get('checkout')['discount'];
        $order->tax=session()->get('checkout')['tax'];
        $order->total=session()->get('checkout')['total'];
        $order->firstname=$this->firstname;
        $order->lastname=$this->lastname;
        $order->mobile=$this->mobile;
        $order->line1=$this->line1;
        $order->line2=$this->line2;
        $order->city=$this->city;
        $order->province=$this->province;
        $order->country=$this->country;
        $order->codepostal=$this->codepostal;
        $order->status='ordered';
        $order->is_shipping_different= $this->ship_to_different ? 1:0;
        $order->email=$this->email;
        $order->save();

        foreach(Cart::instance('cart')->content() as $item)
        {
            $orderItem = new OrderItem();
            $orderItem->product_id = $item->id;
            $orderItem->order_id=$order->id;
            $orderItem->price= $item->price;
            $orderItem->quantity= $item->qty;
            $orderItem->save();
        }
        if($this->ship_to_different)
        {
            $this->validate([
                's_firstname' => 'required',
                's_lastname'=> 'required',
                's_email'=> 'required|email',
                's_mobile'=> 'required|numeric',
                's_line1'=> 'required',
                's_city'=> 'required',
                's_province'=> 'required',
                's_country'=> 'required',
                's_codepostal'=> 'required'
                ]);
            $Shipping= new Shipping();
            $Shipping->order_id= $order->id;
            $Shipping->firstname=$this->s_firstname;
            $Shipping->lastname=$this->s_lastname;
            $Shipping->mobile=$this->s_mobile;
            $Shipping->line1=$this->s_line1;
            $Shipping->line2=$this->s_line2;
            $Shipping->city=$this->s_city;
            $Shipping->province=$this->s_province;
            $Shipping->country=$this->s_country;
            $Shipping->codepostal=$this->s_codepostal;
            $Shipping->email=$this->s_email;
            $Shipping->save();
        }

        if($this->paymentmode == 'cod')
        {
            $this->makeTransaction($order->id,'pending');
            $this->resetCart();
        }
        elseif($this->paymentmode == 'card')
        {
            $stripe = Stripe::make(env('STRIPE_KEY'));

            try{
                $token = $stripe->tokens()->create([
                    'card' =>[
                        'number' => $this->cartenumber,
                        'exp_month' =>$this->expirymonth,
                        'exp_year' => $this->expiryyear,
                        'cvc' => $this->cvc
                    ]
                ]);
                if(!isset($token['id']))
                {
                    session()->flash('stripe_error','The stripe token was not generate correctly!');
                    $this->thankyou=0;
                }
                $customer = $stripe->customers()->create([
                    'name' => $this->firstname.' '.$this->lastname,
                    'email'=>$this->email,
                    'phone'=>$this->mobile,
                    'address' =>[
                        'line1' => $this->line1,
                        'postal_code' =>$this->codepostal,
                        'city' => $this->city,
                        'state' => $this->province,
                        'country' => $this->country
                    ],
                    'shipping' =>[
                        'name' => $this->firstname.' '.$this->lastname,
                        'address' =>[
                            'line1' => $this->line1,
                            'postal_code' =>$this->codepostal,
                            'city' => $this->city,
                            'state' => $this->province,
                            'country' => $this->country
                        ],
                    ],
                    'source' => $token['id']
                ]);
                $charge = $stripe->charges()->create([
                    'customer' => $customer['id'],
                    'currency' =>'USD',
                    'amount' =>session()->get('checkout')['total'],
                    'description' =>'Payment for order no' . $order->id
                ]);
                if($charge['status']='succeeded'){
                    $this->makeTransaction($order->id,'approved');
                    $this->resetCart();
                }else{
                    session()->flash('stripe_error','error in transaction!');
                    $this->thankyou=0;
                }

            }catch(Exception $e){
                session()->flash('stripe_error',$e->getMessage());
                $this->thankyou=0;
            }
        }
    }
    public function resetCart(){
        $this->thankyou=1;
        Cart::instance('cart')->destroy();
        session()->forget('checkout');
    }

    public function makeTransaction($order_id,$status){
        $transactions = new Transaction();
        $transactions->user_id= Auth::user()->id;
        $transactions->order_id= $order_id;
        $transactions->mode=$this->paymentmode;
        $transactions->status = $status;
        $transactions->save();
    }

    public function verifyForcheckout(){
        if(!Auth::check())
        {
            return redirect()->route('login');
        }elseif($this->thankyou)
        {
            return redirect()->route('thankyou');
        }elseif(!session()->get('checkout'))
        {
            return redirect()->route('product.cart');
        }
    }

    public function render()
    {
        $this->verifyForcheckout();
        return view('livewire.checkout-comp')->layout("layouts.shop");
    }
}
