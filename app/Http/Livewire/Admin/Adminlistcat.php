<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;


class Adminlistcat extends Component
{

    public function render()
    {
        return view('livewire.admin.admin-add-ctegory-component')->layout("layouts.card");
    }
}
