<?php

namespace App\Livewire;

use App\Models\Verkoop;
use App\Models\Verkooplijn;
use Livewire\Component;

class Verkooplijst extends Component
{
    public function render()
    {
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        $verkoop_id = Verkoop::where('organisatie_id', $organisation)
            ->orderBy('datetime', 'desc')
            ->pluck('verkoop_id')
            ->first();
        $verkochteProducten = Verkooplijn::where('verkoop_id', $verkoop_id)->with('product')->get();
        return view('livewire.verkooplijst', compact('verkochteProducten'));
    }
}
