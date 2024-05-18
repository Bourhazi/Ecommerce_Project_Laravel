<?php
namespace App\Http\Livewire;
use Livewire\Component;
use Config\app;
class Click extends Component
{
    public $msg = '';
    public $studentId = 55;

    public function render()
    {
        return view('livewire.click')->extends('app');
    }

    public function clickEvt()
    {
        $this->msg = "Button has been clicked.";
    }

    public function trackClickEvt($studentId)
    {
        $this->msg = $studentId;
    }
}
