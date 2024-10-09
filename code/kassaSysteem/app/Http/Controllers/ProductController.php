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

    public function ProductAll($categoryId = null)
    {


        if ($categoryId == 1) {
            $producten = Product::where('categorie_id', '1')->get();
        } elseif ($categoryId == 2) {
            $producten = Product::where('categorie_id', '2')->get();
        } else {
            $producten = Product::all();
        }

        return view('itemsOverzicht', compact('producten'));
    }

}

