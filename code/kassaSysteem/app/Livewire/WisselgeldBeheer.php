<?php

namespace App\Livewire;

use App\Helpers\Login;
use App\Models\Wisselgeld;
use Livewire\Component;

class WisselgeldBeheer extends Component
{
    public $wisselgeldRecords = [];
    public $stockChange = [];

    public function mount()
    {
        $this->loadWisselgeld();

        $this->stockChange = collect(range(0, 9))->mapWithKeys(function ($index) {
            return [$index + 1 => $this->wisselgeldRecords[$index]['hoeveelheid']];
        })->toArray();
    }

    public function loadWisselgeld()
    {
        $organisationId = Login::getCart()['organisatie_id'];
        $this->wisselgeldRecords = Wisselgeld::where('organisatie_id', $organisationId)
            ->orderBy('muntstuk_id')
            ->get()
            ->toArray();
    }

    public function updateWisselgeld()
    {
        $this->validate(
            collect(range(1, 10))->mapWithKeys(function ($index) {
                return ["stockChange.$index" => 'required|integer|max:255'];
            })->toArray()
        );

        $organisationId = Login::getCart()['organisatie_id'];

        $index = 1;
        foreach ($this->wisselgeldRecords as $record) {
            Wisselgeld::where('muntstuk_id', $record['muntstuk_id'])
                ->where('organisatie_id', $organisationId)
                ->update(['hoeveelheid' => $this->stockChange[$index]]);

            $index++;
        }

        $this->loadWisselgeld();
        session()->flash('success', 'Wisselgeld is geupdate.');
        return redirect()->to('wisselgeld-beheer');
    }

    public function render()
    {
        return view('livewire.wisselgeld-beheer');
    }
}
