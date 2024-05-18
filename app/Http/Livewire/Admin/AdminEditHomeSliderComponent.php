<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $tite;
    public $Subtite;
    public $Price;
    public $Link;
    public $statut;
    public $image;
    public $newimage;
    public $slider_id;

    public function mount($slide_id){
        $slider = HomeSlider::find($slide_id);
        $this->tite=$slider->title;
        $this->Subtite=$slider->subtitle;
        $this->Price=$slider->price;
        $this->Link=$slider->link;
        $this->statut=$slider->status;
        $this->image=$slider->image;
        $this->slider_id=$slider->id;
    }
    public function updateSlider(){
        $slider = HomeSlider::find($this->slider_id);
        $slider->title = $this->tite;
        $slider->subtitle = $this->Subtite;
        $slider->price = $this->Price;
        $slider->link = $this->Link;
        $slider->status = $this->statut;
        if($this->newimage){
            $imagename = Carbon::now()->timestamp.'.'.$this->newimage->extension();
            $this->newimage->storeAs('Sliders',$imagename);
            $slider->image = $imagename;
        }
        //$slider->image = $this->image;
        $slider->save();
        session()->flash('message','slider has been updated Successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.shop');
    }
}
