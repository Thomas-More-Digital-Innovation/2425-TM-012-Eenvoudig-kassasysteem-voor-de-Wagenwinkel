<?php
namespace App\Livewire;

use App\Helpers\Login;
use App\Models\Organisatie;
use Livewire\Component;

class InstellingenBeheer extends Component
{
    public $settings = [
        'acties_met_spraak' => false,
        'kleurenblind' => false,
        'voorraad_aangeven' => false,
        'wisselgeld_aangeven' => false,
        'trillen_bij_acties' => false,
        'printen_gebruiken' => false,
    ];

    public function mount()
    {
        $organisationId = Login::getUser()['organisatie_id'];
        $organisation = Organisatie::where('organisatie_id', $organisationId)->first();

        if ($organisation) {
            $this->settings = [
                'acties_met_spraak' => (bool) $organisation->actiesMetSpraak,
                'kleurenblind' => (bool) $organisation->kleurenBlind,
                'voorraad_aangeven' => (bool) $organisation->voorraadAangeven,
                'wisselgeld_aangeven' => (bool) $organisation->wisselgeldAangeven,
                'trillen_bij_acties' => (bool) $organisation->trillenBijActies,
                'printen_gebruiken' => (bool) $organisation->printerGebruiken,
            ];
        }
    }

    public function updateSettings($propertyName)
    {
        $value = $this->settings[$propertyName];

        $columnMap = [
            'acties_met_spraak' => 'actiesMetSpraak',
            'kleurenblind' => 'kleurenBlind',
            'voorraad_aangeven' => 'voorraadAangeven',
            'wisselgeld_aangeven' => 'wisselgeldAangeven',
            'trillen_bij_acties' => 'trillenBijActies',
            'printen_gebruiken' => 'printerGebruiken',
        ];


        if (isset($columnMap[$propertyName])) {
            $column = $columnMap[$propertyName];
            $organisationId = Login::getUser()['organisatie_id'];

            Organisatie::where('organisatie_id', $organisationId)
                ->update([$column => $value]);
        }
        return redirect()->to('instellingen-beheer');
    }


    public function render()
    {
        return view('livewire.instellingen-beheer');
    }
}
