<?php
namespace App\Http\Controllers;

use App\Helpers\Shopping_cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function emptyCart(Request $request)
    {
        Shopping_cart::emptySession();
        return redirect()->route('success');
    }
}
