<?php

namespace App\Http\Livewire;

use App\Category;
use Livewire\Component;

class Slots extends Component
{
    public $solts = [];

    public function render()
    {
        
        return view('livewire.slots');
    }
}
