<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Product;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddProductComponent extends Component
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


    public function mount(){
        $this->stock ='instock';
        $this->featured=0;
    }

    public function generateslug(){
        $this->slug = str::slug($this->name);
    }
    // public function updated($fields){
    //     $this->validateOnly($fields,[
    //         'name'=>'required',
    //         'slug'=>'required|unique:categories'
    //     ]);
    // }
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

        $product= new Product();
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
        session()->flash('message','category has been created successflly!');
    }
    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin.admin-add-product-component',['categories'=>$categories])->layout("layouts.shop");
    }
}
