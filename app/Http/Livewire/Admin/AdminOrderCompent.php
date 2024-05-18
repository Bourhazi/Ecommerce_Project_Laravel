<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AdminOrderCompent extends Component
{
    public function updateOrderStatus($order_id,$status)
    {
        $order = Order::find($order_id);
        $order->status = $status;
        if($status== "delivered")
        {
            $order->delivered_date = DB::raw('CURRENT_DATE');
        }else{
            $order->canceled_date = DB::raw('CURRENT_DATE');
        }
        $order->save();
        session()->flash('order_message','Order Status has been updated succesfully!');
    }
    public function render()
    {
        $order = Order::orderBy('created_at','DESC')->paginate(12);
        return view('livewire.admin.admin-order-compent',['order' => $order])->layout("layouts.shop");
    }
}
