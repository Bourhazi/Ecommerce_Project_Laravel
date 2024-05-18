<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\Category;

class AdminAddcat extends Component
{

    public $slug;
    public $name;

    public function generateslug(){
        $this->slug = str::slug($this->name);
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:categories'
        ]);
    }

    public function soreCategory(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories',
        ]);
        $category= new Category();
        $category->name=$this->name;
        $category->slug=$this->slug;
        $category->save();
        session()->flash('message','category has been created');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-ctegory-component')->layout("layouts.card");
    }

}
