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


    public function index()
    {
        $producten = Product::all();
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

    public function edit($id)
    {
        $product = Product::where('product_id', $id)->firstOrFail();

        return view('updateProduct', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::where('product_id', $id)->firstOrFail();


        $naam = $request->input('naam');
        $actuele_prijs = $request->input('actuele_prijs');
        $afbeeldingen = $request->input('afbeeldingen');
        $organisatie_id = $request->input('organisatie_id');
        $categorie_id = $request->input('categorie_id');
        $positie = $request->input('positie');
        $voorraad = $request->input('voorraad');
        $voorraadAanvullen = $request->input('voorraadAanvullen');

        Product::where('organisatie_id', $id)
            ->update(['naam', 'actuele_prijs', 'afbeeldingen', 'organisatie_id', 'categorie_id', 'positie', 'voorraad', 'voorraadAanvullen' => $naam,
                $actuele_prijs, $afbeeldingen, $organisatie_id, $categorie_id, $positie, $voorraad, $voorraadAanvullen]
    );

        $product->save();
        return redirect()->route('manageProducts');
    }
    /*public function update(Request $request, $id)
    {
        // Haal het product op basis van de product_id
        $product = Product::where('product_id', $id)->firstOrFail();

        // Valideer de inkomende request
        $request->validate([
            'naam' => 'required|string|max:255',
            'actuele_prijs' => 'required|numeric',
            'afbeeldingen' => 'nullable|string',
            'organisatie_id' => 'required|integer',
            'categorie_id' => 'required|integer',
            'positie' => 'nullable|integer',
            'voorraad' => 'required|integer',
            'voorraadAanvullen' => 'boolean',
        ]);

        // Update de velden
        $product->naam = $request->input('naam');
        $product->actuele_prijs = $request->input('actuele_prijs');
        $product->afbeeldingen = $request->input('afbeeldingen') ?? null;
        $product->organisatie_id = $request->input('organisatie_id');
        $product->categorie_id = $request->input('categorie_id');
        $product->positie = $request->input('positie') ?? null;
        $product->voorraad = $request->input('voorraad');
        $product->voorraadAanvullen = $request->input('voorraadAanvullen') ?? false;

        // Sla de wijzigingen op
        $product->save();

        // Redirect naar de beheerpagina met een succesbericht
        return redirect()->route('manageProducts')->with('success', 'Product succesvol geüpdatet.');
    }*/


    public function destroy($product_id)
    {
        $product = Product::where('product_id', $product_id)->firstOrFail();
        $product->delete();
        return redirect()->route('manageProducts');
    }
}

