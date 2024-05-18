<?php

namespace App\Http\Livewire\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserOrderCompent extends Component
{
    public function render()
    {
        $order = Order::where('user_id',Auth::user()->id)->paginate(12);
        return view('livewire.user.user-order-compent',['order'=>$order])->layout("layouts.shop");
    }
}
