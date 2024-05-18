<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;

class ShowCategorieComp extends Component
{
    public function render()
    {
        $category = Category::all();
        return view('livewire.show-categorie-comp',['category'=>$category])->layout('layouts.shop');
    }
}
