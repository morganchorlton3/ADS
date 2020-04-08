<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class Search extends Component
{

    public $products;
    public $searchTerm;

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $this->products = Product::where('name', 'like', $searchTerm)->get();
        return view('livewire.search');
    }
}
