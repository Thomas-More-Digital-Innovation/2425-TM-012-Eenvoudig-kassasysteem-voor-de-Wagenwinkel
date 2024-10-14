<?php

namespace App\Livewire;

use App\Models\Organisatie;
use Livewire\Component;

class OrganisatieBeheer extends Component
{
    public function goMemberPage($organisatie_id)
    {
        return redirect()->route('membersBeheer', ['organisatie_id' => $organisatie_id]);
    }

    public $organisatieNaam;
    public $organisaties;

    public function mount() {
        $this->organisaties = Organisatie::all();
        $this->organisatieNaam = '';
    }

    public function updateOrganisatieNaam($value)
    {
        $this->organisatieNaam = $value;
    }

    public function addOrganisatie() {
        try {
            $this->validate([
                'organisatieNaam' => 'required|string|max:255',
            ]);

            Organisatie::create([
                'naam' => $this->organisatieNaam,
            ]);

            $this->organisatieNaam = '';

            $this->organisaties = Organisatie::all();


            return redirect()->to('organisatie-beheer');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->to('organisatie-beheer');
        }
    }


    public function render()
    {
        $organisaties = Organisatie::all();
        return view('livewire.organisatie-beheer', compact('organisaties'));
    }
}
