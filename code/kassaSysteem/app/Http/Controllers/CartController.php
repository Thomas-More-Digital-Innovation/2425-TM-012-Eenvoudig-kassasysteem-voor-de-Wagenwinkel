<?php
namespace App\Http\Controllers;

use App\Helpers\Shopping_cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function emptyCart(Request $request)
    {
        Shopping_cart::emptySession();
        return redirect()->route('success');
    }

    public function addProduct(Request $request)
    {
        $productId = $request->input('productId');
        $amount = $request->input('amount');

        $product = \App\Models\Product::where('product_id', $productId)->first();

        Shopping_cart::addProduct($product, $amount);
        return redirect()->route('category');
    }
}
