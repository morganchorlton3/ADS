<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class ProductSearch extends Component
{
    public $search;
    public $products = [];

    public function render()
    {
        //if(strlen($this->search >= 2)){
            $searchTerm =  '%' . $this->search .'%';
            $this->products = Product::where('name', 'like', $searchTerm)->get();
        //}

        return view('livewire.product-search');
    }
}
