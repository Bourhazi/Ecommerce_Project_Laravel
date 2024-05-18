<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\HomeSlider;
use Illuminate\Support\Facades\DB;

class AdminHomeSliderComponent extends Component
{
    public function deleteSlider($slide_id){
        $slider = HomeSlider::find($slide_id);
        $slider->delete();
        session()->flash('message','Slider has been deleted successflly !');
    }
    public function render()
    {
        $sliders = HomeSlider::orderBy('created_at','DESC')->paginate(12);
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('layouts.shop');
    }
}
