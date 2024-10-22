<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
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

    public static function ProductAll($categoryId = null)
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
                return $product->voorraad > 0 && $product->visible;
            });

        }

        $producten = $producten->filter(function ($product) {
            return $product->visible;
        });


        return view('itemsOverzicht', compact('producten'));
    }

    public static function getAllProducts($categoryId)
    {
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];

        if ($categoryId == 1) {
            $producten = Product::where('categorie_id', '1')->where('organisatie_id', $organisation)->get();
        } elseif ($categoryId == 2) {
            $producten = Product::where('categorie_id', '2')->where('organisatie_id', $organisation)->get();
        } else {
            $producten = Product::all();
        }

        return $producten;
    }

    public function index()
    {
        $organisatie_id = $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        $producten = Product::where('organisatie_id', $organisatie_id)->get();
        return view('manageProducts', compact('producten'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'categorie_id' => 'required|integer',
            'voorraad' => 'nullable|integer',
            'actuele_prijs' => 'required|numeric',
            'afbeeldingen' => 'nullable|image|mimes:png|max:2048',
            'voorraadAanvullen' => 'required|integer',
        ]);

        $categorie_id = (int) $request->input('categorie_id');
        $usedPositions = Product::where('categorie_id', $categorie_id)
            ->pluck('positie')
            ->toArray();

        $availablePosition = null;
        for ($i = 1; $i <= 15; $i++) {
            if (!in_array($i, $usedPositions)) {
                $availablePosition = $i;
                break;
            }
        }

        if ($availablePosition === null) {
            return redirect()->back()->withErrors(['positie' => 'No available positions in this category.']);
        }

        $afbeeldingen = null;
        if ($request->hasFile('afbeeldingen')) {
            $file = $request->file('afbeeldingen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('images', $filename, 'public');
            $afbeeldingen = 'storage/images/' . $filename;
        }else {
            $afbeeldingen = asset('assets/images/addPhoto.svg'); // Set the default image path
        }

        $voorraad = $request->input('voorraad') ?? 0;

        Product::create([
            'naam' => $request->input('naam'),
            'organisatie_id' => \App\Helpers\Login::getUser()['organisatie_id'],
            'positie' => $availablePosition,
            'categorie_id' => $categorie_id,
            'voorraad' => (int)$voorraad,
            'voorraadAanvullen' => $request->input('voorraadAanvullen') ? 1 : 0,
            'actuele_prijs' => $request->input('actuele_prijs'),
            'afbeeldingen' => $afbeeldingen,
            'visible' => 1,
        ]);

        return redirect()->route('manage-products')->with('success', 'Product successfully added');
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
            'afbeeldingen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'categorie_id' => 'required|integer',
            'positie' => 'required|integer',
            'voorraad' => 'required|integer',
            'voorraadAanvullen' => 'required|in:0,1',
        ]);

        $product = Product::findOrFail($product_id);

        $naam = $request->input('naam');
        $actuele_prijs = $request->input('actuele_prijs');
        $categorie_id = $request->input('categorie_id');
        $positie = $request->input('positie');
        $voorraad = $request->input('voorraad');
        $voorraadAanvullen = $request->input('voorraadAanvullen');


        if ($request->hasFile('afbeeldingen')) {
            $file = $request->file('afbeeldingen');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('images', $filename, 'public');
            $afbeeldingen = 'storage/images/' . $filename;
        } else {
            $afbeeldingen = $product->afbeeldingen;
        }

        $product->update([
            'naam' => $naam,
            'actuele_prijs' => $actuele_prijs,
            'afbeeldingen' => $afbeeldingen,
            'categorie_id' => $categorie_id,
            'positie' => $positie,
            'voorraad' => $voorraad,
            'voorraadAanvullen' => $voorraadAanvullen,
        ]);

        // Redirect of geef een succesbericht terug
        return redirect()->route('manage-products')->with('success', 'Product succesvol bijgewerkt.');
    }


    public function destroy($product_id)
    {
        $product = Product::where('product_id', $product_id)->delete();
        return redirect()->route('manage-products');
    }

    public static function getCategory()
    {
        $categorie = Categorie::all()->toArray();
        return $categorie;
    }
}
