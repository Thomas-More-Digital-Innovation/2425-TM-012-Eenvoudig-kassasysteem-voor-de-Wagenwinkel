<?php
namespace App\Http\Controllers;

use App\Models\Organisatie;

class Organisaties extends Controller
{
    public function beheer()
    {
        $organisaties = Organisatie::all();

        return view('organisatieBeheer', compact('organisaties'));
    }
}
