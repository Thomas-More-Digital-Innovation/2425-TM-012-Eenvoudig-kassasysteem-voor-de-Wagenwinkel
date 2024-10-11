<?php

namespace App\Livewire;

use App\Models\Organisatie;
use Livewire\Component;

class OrganisatieBeheer extends Component
{
    public $selectedOrganisation;
    public function goMemberPage($organisatieId)
    {
        return redirect()->route('membersBeheer', ['organisatie_id' => $organisatieId]);
    }
    public function render()
    {
        $organisaties = Organisatie::all();
        return view('livewire.organisatie-beheer', compact('organisaties'));
    }
}
