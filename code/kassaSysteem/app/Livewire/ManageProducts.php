<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Http\Request;
use Livewire\Component;

class ManageProducts extends Component
{
    public $product_id;
    public $product; // Add this to store the product
    public $naam;
    public $actuele_prijs;
    public $afbeeldingen;
    public $categorie_id;
    public $positie;
    public $voorraad;
    public $voorraadAanvullen;

    public function mount($product_id = null) // Set $product_id to null by default
    {
        $this->product_id = $product_id;

        if ($this->product_id) {
            $this->product = Product::where('product_id', $this->product_id)
                ->where('organisatie_id', \App\Helpers\Login::getUser()['organisatie_id'])
                ->firstOrFail(); // Haal het product op
        }
    }

    public function store()
    {
        // Validatie en opslaan van product
        $this->validate([
            'naam' => 'required|string|max:255',
            'actuele_prijs' => 'required|numeric',
            'afbeeldingen' => 'nullable|string',
            'categorie_id' => 'required|integer',
            'positie' => 'nullable|integer',
            'voorraad' => 'required|integer',
            'voorraadAanvullen' => 'boolean',
        ]);

        $product = Product::create([
            'naam' => $this->naam,
            'actuele_prijs' => $this->actuele_prijs,
            'afbeeldingen' => $this->afbeeldingen,
            'organisatie_id' => \App\Helpers\Login::getUser()['organisatie_id'],
            'categorie_id' => $this->categorie_id,
            'positie' => $this->positie,
            'voorraad' => $this->voorraad,
            'voorraadAanvullen' => $this->voorraadAanvullen,
        ]);

        session()->flash('success', 'Product succesvol toegevoegd.');
        return redirect()->route('manage-products');
    }

    public function update(Request $request, $id)
    {
        // Validatie
        $validatedData = $request->validate([
            'naam' => 'required|string|max:255',
            'actuele_prijs' => 'required|numeric',
            'afbeeldingen' => 'required|string|max:255', // Maak het een string met een maximale lengte
            'categorie_id' => 'required|integer',
            'positie' => 'required|integer',
            'voorraad' => 'required|integer',
        ]);

        // Product bijwerken
        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('producten.index')->with('success', 'Product succesvol bijgewerkt!');
    }

    public function destroy($product_id)
    {
        Product::where('product_id', $product_id)->delete();
        session()->flash('success', 'Product succesvol verwijderd.');
        return redirect()->route('manage-products');
    }

    public function render()
    {
        $producten = Product::where('organisatie_id', \App\Helpers\Login::getUser()['organisatie_id'])->get(); // Get all products for the organization
        return view('livewire.manage-products', [
            'producten' => $producten,
            'product' => $this->product,
        ]);
    }
}
