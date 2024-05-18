<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Coupon;

class AdminCouponsComponent extends Component
{
    public function deleteCoupon($id){
        $coupon= Coupon::find($id);
        $coupon->delete();
        session()->flash('message','coupon has been deleted successflly!');
        return redirect(route('Admin.Coupons'));

    }

    public function render()
    {
        $Coupons= Coupon::all();
        return view('livewire.admin.admin-coupons-component',['Coupons'=>$Coupons])->layout("layouts.shop");
    }
}
