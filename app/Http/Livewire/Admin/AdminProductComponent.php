<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;

class AdminProductComponent extends Component
{
    public function deleteProduct($id){
        $product=Product::find($id);
        $product->delete();
        session()->flash('message','category has been deleted successflly!');
        return redirect(route('Admin.Product'));
    }
    public function render()
    {
        $product=Product::paginate(10);
        return view('livewire.admin.admin-product-component',['product'=>$product])->layout("layouts.shop");
    }
}
