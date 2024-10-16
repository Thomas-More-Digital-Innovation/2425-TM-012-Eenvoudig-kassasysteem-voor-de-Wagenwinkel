<?php

namespace App\Livewire;

use App\Models\Organisatie;
use App\Models\Verkoop;
use Livewire\Component;

class DatabaseTesting extends Component
{
    public function render()
    {
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        $products = Verkoop::where('organisatie_id', 1)
            ->orderBy('datetime', 'desc')
            ->pluck('verkoop_id')
            ->first();
            /*\App\Models\Product::with('categorie')
                                ->get();*/
        $organisaties = \App\Models\User::with('organisatie')
                                    ->get();
        return view('livewire.database-testing', compact('products', 'organisaties'));
    }
}
