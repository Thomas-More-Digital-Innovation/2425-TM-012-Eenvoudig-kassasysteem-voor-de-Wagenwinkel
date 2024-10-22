<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;

class ManageProducts extends Component
{


    public function mount($product_id = null) // Set $product_id to null by default
    {
    }

    public function toggleVisibility($productId)
    {
        // Find the product by ID and toggle its visibility
        $product = Product::find($productId);
        if ($product) {
            $product->visible = !$product->visible;
            $product->save();
        }
        return redirect()->to('manage-products');
    }

    public function destroy($product_id)
    {
        $product = Product::where('product_id', $product_id)->delete();
        return redirect()->route('manage-products');
    }

    public function render()
    {
        $producten = Product::where('organisatie_id', \App\Helpers\Login::getUser()['organisatie_id'])->get(); // Get all products for the organization
        return view('livewire.manage-products', [
            'producten' => $producten,
        ]);
    }
}
