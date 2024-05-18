<?php

namespace App\Http\Livewire\Admin;

use App\Models\Sale;
use Livewire\Component;

class AdminSaleComponent extends Component
{
    public $sale_date;
    public $status;
    public function mount(){
        $sale = Sale::find(1);
        $this->sale_date=$sale->sale_date;
        $this->status=$sale->status;
    }
    // public function updated($fields){
    //     $this->validateOnly($fields,[
    //         'sale_date'=>'required',
    //         'status'=>'required|unique:sales'
    //     ]);
    // }
    public function updateSale(){
        // $this->validate([
        //     'sale_date'=>'required',
        //     'status'=>'required|unique:sales'
        // ]);
        $sale = Sale::find(1);
        $sale->sale_date=$this->sale_date;
        $sale->status=$this->status;
        $sale->save();
        session()->flash('message','Record has been update successfully!');
    }
    public function render()
    {
        return view('livewire.admin.admin-sale-component')->layout("layouts.card");
    }
}
