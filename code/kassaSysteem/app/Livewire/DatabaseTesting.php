<?php

namespace App\Livewire;

use App\Models\Organisatie;
use Livewire\Component;

class DatabaseTesting extends Component
{
    public function render()
    {
        $products = \App\Models\Product::with('categorie')
                                ->get();
        $organisaties = \App\Models\User::with('organisatie')
                                    ->get();
        return view('livewire.database-testing', compact('products', 'organisaties'));
    }
}
