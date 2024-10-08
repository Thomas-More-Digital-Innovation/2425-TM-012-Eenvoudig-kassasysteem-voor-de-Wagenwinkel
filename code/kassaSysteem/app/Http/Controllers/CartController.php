<?php
namespace App\Http\Controllers;

use App\Helpers\Shopping_cart;
use App\Models\Organisatie;
use App\Models\Product;
use App\Models\Verkoop;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function emptyCart(Request $request)
    {
        Shopping_cart::emptySession();
        return redirect()->route('category');
    }

    public function addProduct(Request $request)
    {
        $amount = $request->input('amount');
        $productid = $request->input('productId');
        $product = Product::where('product_id', $productid)->first();

        Shopping_cart::addProduct($product, $amount);
        return redirect()->route('category');
    }

    public function showCart()
    {
        $items = Shopping_cart::getRecords();

        return view('winkelmand', compact('items'));
    }
}
