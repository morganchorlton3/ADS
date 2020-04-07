<?php

namespace App\Http\Livewire;

use App\Category;
use Livewire\Component;

class Slots extends Component
{
    public $def = [];

    public function render()
    {
        $this->def = Category::all();
        dd($this->def);
        return view('livewire.slots');
    }
}
