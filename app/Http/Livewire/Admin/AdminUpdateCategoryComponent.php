<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminUpdateCategoryComponent extends Component
{
    public $slug;
    public $name;
    public $category_slug;
    public $category_id;

    public function mount($category_slug){
        $this->category_slug=$category_slug;
        $category=Category::where('slug',$category_slug)->first();
        $this->category_id=$category->id;
        $this->name=$category->name;
        $this->slug=$category->slug;
    }

    public function generateslug(){
        $this->slug = str::slug($this->name);
    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
    }
    public function UpdateCategory(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
        $category= Category::find($this->category_id);
        $category->name=$this->name;
        $category->slug=$this->slug;
        $category->save();
        session()->flash('message','category has been updated successflly!');
    }
    public function render()
    {
        return view('livewire.admin.admin-update-category-component')->layout("layouts.shop");
    }
}
