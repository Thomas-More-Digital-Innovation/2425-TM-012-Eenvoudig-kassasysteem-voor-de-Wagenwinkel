<?php

namespace App\Livewire;

use App\Helpers\Shopping_cart;
use App\Models\Product;
use Livewire\Component;

class Winkelkar extends Component
{
    public $cart = [];

    public function mount()
    {
        // Load the cart from session
        $this->cart = session()->get('cart', []);
    }

   /* public function addToBasket($productId): void
    {
        $product = Product::where('product_id', $productId)->first();

        if ($product) {
            Shopping_cart::addProduct($product, 5);
        } else {
            session()->flash('error', 'Product not found.');
        }
    }*/

    public function render()
    {
        return view('livewire.winkelkar', [
            'cart' => $this->cart,
        ]);
    }
}

