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
        $request->validate([
            'naam' => 'required|string|max:255',
            'actuele_prijs' => 'required|numeric',
            'afbeeldingen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MB max
            'categorie_id' => 'required|integer',
            'positie' => 'required|integer',
            'voorraad' => 'required|integer',
        ]);

        // Zoek het product op
        $product = Product::findOrFail($product_id);

        // Haal de waarde op uit de request
        $naam = $request->input('naam');
        $actuele_prijs = $request->input('actuele_prijs');
        $categorie_id = $request->input('categorie_id');
        $positie = $request->input('positie');
        $voorraad = $request->input('voorraad');

        // Upload de afbeelding indien gekozen
        if ($request->hasFile('afbeeldingen')) {
            $file = $request->file('afbeeldingen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('images', $filename, 'public'); // Opslaan in de public/images map
            $afbeeldingen = 'storage/images/' . $filename; // Sla de pad op in de database
        } else {
            $afbeeldingen = $product->afbeeldingen; // Gebruik de bestaande afbeelding als er geen nieuwe is
        }

        // Update de productgegevens in de database
        $product->update([
            'naam' => $naam,
            'actuele_prijs' => $actuele_prijs,
            'afbeeldingen' => $afbeeldingen,
            'categorie_id' => $categorie_id,
            'positie' => $positie,
            'voorraad' => $voorraad,
        ]);

        // Redirect of geef een succesbericht terug
        return redirect()->route('manage-products')->with('success', 'Product succesvol bijgewerkt.');
    }


    public function destroy($product_id)
    {
        $product = Product::where('product_id', $product_id)->delete();
        return redirect()->route('manageProducts');
    }
}
