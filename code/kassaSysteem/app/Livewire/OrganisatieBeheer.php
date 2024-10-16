<?php

namespace App\Livewire;

use App\Models\Organisatie;
use App\Models\User;
use App\Models\Verkoop;
use App\Models\Wisselgeld;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class OrganisatieBeheer extends Component
{
    public function goMemberPage($organisatie_id)
    {
        return redirect()->route('members-beheer', ['organisatie_id' => $organisatie_id]);
    }

    public $organisatieNaam;
    public $organisaties;
    public $organisatieKeuze;
    public $memberWachtwoord;
    public $memberNaam;

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



            $organisatie = Organisatie::where('naam', $this->organisatieNaam)->first();
            $hoeveelheid = 99;

            foreach (range(1, 10) as $muntstukId) {
                Wisselgeld::create([
                    'muntstuk_id' => $muntstukId,
                    'hoeveelheid' => $hoeveelheid,
                    'organisatie_id' => $organisatie->organisatie_id,
                    'datum' => now()->format('Y-m-d')
                ]);
            }

            Verkoop::create([
                'datum_tijd' => now(),
                'organisatie_id' => $organisatie->organisatie_id
            ]);


            $this->organisatieNaam = '';

            $this->organisaties = Organisatie::all();


            return redirect()->to('organisatie-beheer');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->to('organisatie-beheer');
        }
    }

    public function addMember() {
        try {
        $this->validate([
            'organisatieKeuze' => 'required|string|max:255',
            'memberWachtwoord' => 'required|string|max:255',
            'memberNaam' => 'required|string|max:255',
        ]);

        if ($this->organisatieKeuze == 1) {
            User::create([
                'naam' => $this->memberNaam,
                'wachtwoord' => Hash::make($this->memberWachtwoord),
                'rol_id' => 1,
                'organisatie_id' => $this->organisatieKeuze,
                'wachtwoordWijzigen' => 1
            ]);
        }
        else{
            User::create([
                'naam' => $this->memberNaam,
                'wachtwoord' => Hash::make($this->memberWachtwoord),
                'rol_id' => 2,
                'organisatie_id' => $this->organisatieKeuze,
                'wachtwoordWijzigen' => 1
            ]);
        }

            $this->memberNaam = '';
            $this->memberWachtwoord = '';

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
    public function toggleResetPassword($user_Id)
    {
        $user = User::find($user_Id);
        $user->reset_password = !$user->reset_password;
        $user->save();
    }

    public function destroy($user_Id)
    {
        $user = User::find($user_Id);
        $user->delete();
        return redirect()->route('livewire.members-beheer');
    }
}


