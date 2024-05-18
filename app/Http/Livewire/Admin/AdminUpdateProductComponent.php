<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;

class AdminUpdateProductComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $short_description;
    public $description;
    public $regular_price;
    public $sale_price;
    public $sku;
    public $stock;
    public $featured;
    public $quantity;
    public $image;
    public $category_id;
    public $product_id;


    public function mount($product_slug){
        $this->slug=$product_slug;
        $product=Product::where('slug',$product_slug)->first();
        $this->name=$product->name;
        $this->slug=$product->slug;
        $this->short_description=$product->short_description;
        $this->description=$product->description;
        $this->regular_price=$product->regular_price;
        $this->sale_price=$product->sale_price;
        $this->sku=$product->SKU;
        $this->stock=$product->stock_status;
        $this->featured=$product->featured;
        $this->quantity=$product->quantity;

        $this->category_id=$product->category_id;
        $this->product_id=$product->id;
    }

    public function generateslug(){
        $this->slug = str::slug($this->name,'-');
    }

    public function soreProduct(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:products',
            'short_description'=>'required',
            'description'=>'required',
            'regular_price'=>'required|numeric',
            'sale_price'=>'required',
            'sku'=>'required',
            'featured'=>'required',
            'quantity'=>'required|numeric',
            'image'=>'required',
    ]);
        $product= Product::find($this->product_id);
        $product->name=$this->name;
        $product->slug=$this->slug;
        $product->short_description=$this->short_description;
        $product->description=$this->description;
        $product->regular_price=$this->regular_price;
        $product->sale_price=$this->sale_price;
        $product->SKU=$this->sku;
        $product->stock_status=$this->stock;
        $product->featured=$this->featured;
        $product->quantity=$this->quantity;
        $imageName= Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('products',$imageName);
        $product->image=$imageName;
        $product->category_id=$this->category_id;
        $product->save();
        session()->flash('message','category has been updated successflly!');
    }
    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin.admin-update-product-component',['categories'=>$categories])->layout("layouts.shop");
    }
}
