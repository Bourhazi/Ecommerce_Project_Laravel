<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Livewire\Component;

class AdmindeOrdersDetailsComponent extends Component
{
    public $order_id;
    public function mount($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        $order = Order::find($this->order_id);
        return view('livewire.admin.adminde-orders-details-component', ['order'=>$order])->layout("layouts.card");
    }
}
