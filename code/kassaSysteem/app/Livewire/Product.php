<?php

namespace App\Livewire;

use AllowDynamicProperties;
use App\Helpers\Shopping_cart;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

#[AllowDynamicProperties] class Product extends Component
{
    public $product = null;
    public function mount($id = null)
    {
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        if ($id) {
            $this->product = \App\Models\Product::where('product_id', $id)->firstOrFail();
            $this->setting = \App\Http\Controllers\Controller::getSetting($organisation);;
        }

    }

    public function addToBasket(Product $product): void
    {

        /*$product = \App\Models\Product::where('product_id', $productId)->first();*/

        if ($product) {
            Shopping_cart::addProduct($product, 5);
        } else {
            session()->flash('error', 'Product not found.');
        }
    }

    public function getRoute()
    {
        return $this->product;
    }


    public function render($id = null)
    {
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        $setting = \App\Http\Controllers\Controller::getSetting($organisation);;

        $product = \App\Models\Product::where('product_id', $id)
            ->get();


        return view('Product', compact('product', 'setting'));
    }
}
