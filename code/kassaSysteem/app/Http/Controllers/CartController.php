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
        sleep(3);
        Shopping_cart::emptySession();
        return redirect()->route('category');
    }

    public function addProduct(Request $request, $id = null)
    {
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        $setting = \App\Http\Controllers\Controller::getSetting($organisation);;

        $amount = $request->input('amount');
        $productid = $request->route('id');
        $product = Product::where('product_id', $productid)->first();

        $amountUpdate = $product->voorraad - $amount;


        if($setting->voorraadAangeven && $product->voorraadAanvullen)
        {
            Product::where('product_id', $productid)
                ->update(['voorraad' => $amountUpdate]);
        }

        Shopping_cart::addProduct($product, $amount);
        return redirect()->route('category');
    }


    public function delete(Request $request, $id = null)
    {
        $productid = $request->route('id');
        $product = Product::where('product_id', $productid)->first();

        if ($product) {
            // Increase the stock of the deleted product
            $product->voorraad += 1;
            $product->save();

            // Delete the product from the shopping cart
            Shopping_cart::delete($product);
        }

        return redirect()->route('winkelmand')->with('success', 'Product successfully removed and stock updated.');
    }

    public function showCart()
    {
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        $items = Shopping_cart::getRecords();
        return view('winkelmand', compact('items'));
    }
}
