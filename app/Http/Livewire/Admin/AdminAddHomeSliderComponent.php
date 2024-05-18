<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $tite;
    public $Subtite;
    public $Price;
    public $Link;
    public $statut;
    public $image;

    public function mount(){

        $this->statut=0;
    }

    public function addSlider(){
        $slider = new HomeSlider();
        $slider->title = $this->tite;
        $slider->subtitle = $this->Subtite;
        $slider->price = $this->Price;
        $slider->link = $this->Link;
        $slider->status = $this->statut;
        $imagename = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('Sliders',$imagename);
        $slider->image = $imagename;

        $slider->save();
        session()->flash('message','slider has been created Successfully!');

    }

    public function render()
    {
        return view('livewire.admin.admin-add-home-slider-component')->layout('layouts.shop');
    }
}
