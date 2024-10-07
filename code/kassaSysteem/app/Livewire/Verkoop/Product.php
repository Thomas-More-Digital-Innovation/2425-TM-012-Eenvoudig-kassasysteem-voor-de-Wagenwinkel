<?php

namespace App\Livewire\Verkoop;

use Livewire\Component;

class Product extends Component
{
    public $product = null;
    public function mount($id = null)
    {
        if ($id) {
            $this->product = \App\Models\Product::where('product_id', $id)->firstOrFail();
        }
    }

    public function render()
    {
        return view('livewire.verkoop.product');
    }
}
