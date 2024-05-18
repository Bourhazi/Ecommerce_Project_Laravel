<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{
    public function deleteCategory($id){
        $category= Category::find($id);
        $category->delete();
        session()->flash('message','category has been deleted successflly!');
        return redirect(route('Admin.category'));

    }
    public function render()
    {
        $categories= Category::paginate(5);
        return view('livewire.admin.admin-category-component',['categories'=>$categories])->layout("layouts.shop");
    }
}
