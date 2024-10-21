<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($id)
    {
        if (!$id) {
            $id = 1;
        }
        $producten = Product::where('product_id', $id)->get();
        return view('Product', compact('producten'));
    }

    public function ProductAll($categoryId = null)
    {
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        $setting = \App\Http\Controllers\Controller::getSetting($organisation);


        if ($categoryId == 1) {
            $producten = Product::where('categorie_id', '1')->where('organisatie_id', $organisation)->get();
        } elseif ($categoryId == 2) {
            $producten = Product::where('categorie_id', '2')->where('organisatie_id', $organisation)->get();
        } else {
            $producten = Product::all();
        }

        if ($setting->voorraadAangeven) {
            $producten = $producten->filter(function ($product) {
                return $product->voorraad > 0;
            });

        }
        return view('itemsOverzicht', compact('producten'));
    }

    public function index()
    {
        $organisatie_id = $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        $producten = Product::where('organisatie_id', $organisatie_id)->get();
        return view('manageProducts', compact('producten'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'actuele_prijs' => 'required|numeric',
            'afbeeldingen' => 'nullable|string',
            'organisatie_id' => 'required|integer',
            'categorie_id' => 'required|integer',
            'positie' => 'nullable|integer',
            'voorraad' => 'required|integer',
            'voorraadAanvullen' => 'boolean',
        ]);

        $product = new Product();
        $product->naam = $validatedData['name'];
        $product->actuele_prijs = $validatedData['actuele_prijs'];
        $product->afbeeldingen = $validatedData['afbeeldingen'] ?? null;
        $product->organisatie_id = $validatedData['organisatie_id'];
        $product->categorie_id = $validatedData['categorie_id'];
        $product->positie = $validatedData['positie'] ?? null;
        $product->voorraad = $validatedData['voorraad'];
        $product->voorraadAanvullen = $validatedData['voorraadAanvullen'] ?? false;
        $product->save();

        return redirect()->route('manageProducts');
    }

    public function edit($product_id)
    {
        $product = Product::where('product_id', $product_id)->firstOrFail();
        return view('updateProduct', compact('product'));
    }

    public function update(Request $request, $product_id)
    {
        $product = Product::where('product_id', $product_id)->firstOrFail();

        $naam = $request->input('naam');
        $actuele_prijs = $request->input('actuele_prijs');
        $afbeeldingen = $request->input('afbeeldingen');
        $organisatie_id = $request->input('organisatie_id');
        $categorie_id = $request->input('categorie_id');
        $positie = $request->input('positie');
        $voorraad = $request->input('voorraad');
        $voorraadAanvullen = $request->input('voorraadAanvullen');

        Product::where('organisatie_id', $organisatie_id)
            ->update([
                'naam' => $naam,
                'actuele_prijs' => $actuele_prijs,
                'afbeeldingen' => $afbeeldingen,
                'organisatie_id' => $organisatie_id,
                'categorie_id' => $categorie_id,
                'positie' => $positie,
                'voorraad' => $voorraad,
                'voorraadAanvullen' => $voorraadAanvullen
            ]);

        $product->save();
        return redirect()->route('manageProducts');
    }

    public function destroy($product_id)
    {
        $product = Product::where('product_id', $product_id)->delete();
        return redirect()->route('manageProducts');
    }
}
