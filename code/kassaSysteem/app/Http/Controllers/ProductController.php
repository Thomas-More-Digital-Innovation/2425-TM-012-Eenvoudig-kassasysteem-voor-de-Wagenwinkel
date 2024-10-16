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
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        if ($categoryId == 1) {
            $producten = Product::where('categorie_id', '1')
                                ->where('organisatie_id', $organisation)
                                ->get();
        } elseif ($categoryId == 2) {
            $producten = Product::where('categorie_id', '2')
                                ->where('organisatie_id', $organisation)
                                ->get();
        } else {
            $producten = Product::all();
        }

        return view('itemsOverzicht', compact('producten'));
    }

}

