<?php

namespace App\Livewire;

use App\Exports\VerkochteProductenExport;
use App\Models\Organisatie;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\Login;
use App\Models\Verkoop;
use App\Models\Verkooplijn;
use Livewire\Component;

class Verkooplijst extends Component
{
    public $selectedDate;
    public function render()
    {
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        $this->selectedDate = request()->get('date') ?? null;
        if (!empty($this->selectedDate)) {
            $verkoopIds = Verkoop::where('organisatie_id', $organisation)
                ->whereDate('datum_tijd', $this->selectedDate)
                ->pluck('verkoop_id');
        } else
        {
            $verkoopIds = Verkoop::where('organisatie_id', $organisation)
                ->pluck('verkoop_id');
        }
        $verkochteProducten = Verkooplijn::whereIn('verkoop_id', $verkoopIds)->with(['product', 'verkoop'])->get();
        //Verkooplijn::whereIn('verkoop_id', $verkoopIds)->orderBy('verkoop_id')->downloadExcel('query-download.xlsx');
        return view('livewire.verkooplijst', compact('verkochteProducten'));
    }

    public function exportToExcel()
    {
        $organisation = Login::getUser()['organisatie_id'];

        if (!empty($this->selectedDate)) {
            $verkoopIds = Verkoop::where('organisatie_id', $organisation)
                ->whereDate('datum_tijd', $this->selectedDate)
                ->pluck('verkoop_id')
                ->toArray();
        } else {
            $verkoopIds = Verkoop::where('organisatie_id', $organisation)
                ->pluck('verkoop_id')
                ->toArray();
        }
        $organisatie_naam = Organisatie::where('organisatie_id', $organisation)
                            ->pluck('naam')
                            ->first();
        $timestamp = now()->format('Y-m-d_H-i-s');
        $filename = "verkochte_producten_{$organisatie_naam}_{$timestamp}.xlsx";

        if($verkoopIds != null)
        {
            return Excel::download(new VerkochteProductenExport($verkoopIds), $filename);
        }
        else
        {
            return view('livewire.verkooplijst');
        }
    }

}
