<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        if (!$id)
        {
            $id = 1;
        }
        $producten = Product::where('product_id', $id)->get();
        return view('Product', compact('producten'));
    }
}

