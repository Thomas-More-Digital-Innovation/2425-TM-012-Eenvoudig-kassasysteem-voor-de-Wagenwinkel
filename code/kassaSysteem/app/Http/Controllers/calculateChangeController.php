<?php
namespace App\Http\Controllers;

use App\Models\Organisatie;
use App\Models\Wisselgeld;
use Illuminate\Http\Request;

class calculateChangeController extends Controller
{
    public function calculateChange(Request $request)
    {
        $totalGeld = $request->input('totalGeld');
        $selectedMoneyArray = json_decode($request->input('selectedMoneyArray'), true); // Decode the selectedMoneyArray

        $totalCost = \App\Helpers\Shopping_cart::getPrice();
        $amountGiven = $totalGeld;

        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        $wisselgeldRecords = Wisselgeld::with('muntstuk')
            ->where('organisatie_id', $organisation)
            ->get();

        $wisselgeldAangeven = Organisatie::where('organisatie_id', $organisation)
            ->value('wisselgeldAangeven');

        $change = $amountGiven - $totalCost;
        $result = [];

        foreach ($wisselgeldRecords as $wissel) {
            $muntstuk = $wissel->muntstuk;

            if ($wisselgeldAangeven && $change >= $muntstuk->waarde && $wissel->hoeveelheid > 0) {
                $quantity = min(floor($change / $muntstuk->waarde), $wissel->hoeveelheid);
                if ($quantity > 0) {
                    $result[] = ['name' => $muntstuk->naam, 'quantity' => $quantity];
                    $change -= $quantity * $muntstuk->waarde;
                    $change = round($change, 2);
                }
            } elseif (!$wisselgeldAangeven && $change >= $muntstuk->waarde) {
                $quantity = floor($change / $muntstuk->waarde);
                if ($quantity > 0) {
                    $result[] = ['name' => $muntstuk->naam, 'quantity' => $quantity];
                    $change -= $quantity * $muntstuk->waarde;
                    $change = round($change, 2);
                }
            }
        }

        if ($change > 0) {
            foreach ($wisselgeldRecords as $wissel) {
                $muntstuk = $wissel->muntstuk;

                if ($wissel->hoeveelheid == 0 && $wisselgeldAangeven) {
                    continue;
                }
                while ($change > 0) {
                    if ($muntstuk->waarde > $change) {
                        break;
                    }

                    $result[] = ['name' => $muntstuk->naam, 'quantity' => 1];
                    $change -= $muntstuk->waarde;
                    $change = round($change, 2);

                    if ($wisselgeldAangeven && $wissel->hoeveelheid <= 0) {
                        break;
                    }
                }
            }
        }

        return view('calculateChange', [
            'result' => $result,
            'total_cost' => $totalCost,
            'amount_given' => $amountGiven,
            'selectedMoneyArray' => $selectedMoneyArray,
            'totalGeld' => $totalGeld,
        ]);
    }


    public function updateDatabase(Request $request)
    {
        $totalGeld = $request->input('totalGeld');
        $selectedMoneyArray = json_decode($request->input('selectedMoneyArray'), true);

        $totalCost = \App\Helpers\Shopping_cart::getPrice();
        $amountGiven = $totalGeld;

        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        $wisselgeldRecords = Wisselgeld::with('muntstuk')
            ->where('organisatie_id', $organisation)
            ->get();

        $wisselgeldAangeven = Organisatie::where('organisatie_id', $organisation)
            ->value('wisselgeldAangeven');

        $change = $amountGiven - $totalCost;
        $result = [];

        foreach ($selectedMoneyArray as $selectedValue) {
            $wisselgeldRecord = $wisselgeldRecords->firstWhere('muntstuk.waarde', $selectedValue);

            if ($wisselgeldRecord) {
                $wisselgeldRecord->hoeveelheid++;
                Wisselgeld::where('muntstuk_id', $wisselgeldRecord->muntstuk_id)
                    ->where('organisatie_id', $organisation)
                    ->update(['hoeveelheid' => $wisselgeldRecord->hoeveelheid]);
            }
        }

        foreach ($wisselgeldRecords as $wissel) {
            $muntstuk = $wissel->muntstuk;

            if ($wisselgeldAangeven && $change >= $muntstuk->waarde && $wissel->hoeveelheid > 0) {
                $quantity = min(floor($change / $muntstuk->waarde), $wissel->hoeveelheid);
                if ($quantity > 0) {
                    $result[] = ['name' => $muntstuk->naam, 'quantity' => $quantity];
                    $change -= $quantity * $muntstuk->waarde;
                    $change = round($change, 2);

                    $wissel->hoeveelheid -= $quantity;
                    Wisselgeld::where('muntstuk_id', $wissel->muntstuk_id)
                        ->where('organisatie_id', $organisation)
                        ->update(['hoeveelheid' => $wissel->hoeveelheid]);
                }
            } elseif (!$wisselgeldAangeven && $change >= $muntstuk->waarde) {
                $quantity = floor($change / $muntstuk->waarde);
                if ($quantity > 0) {
                    $result[] = ['name' => $muntstuk->naam, 'quantity' => $quantity];
                    $change -= $quantity * $muntstuk->waarde;
                    $change = round($change, 2);
                }
            }
        }

        if ($change > 0) {
            foreach ($wisselgeldRecords as $wissel) {
                $muntstuk = $wissel->muntstuk;

                if ($wissel->hoeveelheid == 0 && $wisselgeldAangeven) {
                    continue;
                }
                while ($change > 0) {
                    if ($muntstuk->waarde > $change) {
                        break;
                    }

                    if ($wisselgeldAangeven && $wissel->hoeveelheid > 0) {
                        $wissel->hoeveelheid--;
                        Wisselgeld::where('muntstuk_id', $wissel->muntstuk_id)
                            ->where('organisatie_id', $organisation)
                            ->update(['hoeveelheid' => $wissel->hoeveelheid]);
                    }

                    $result[] = ['name' => $muntstuk->naam, 'quantity' => 1];
                    $change -= $muntstuk->waarde;
                    $change = round($change, 2);

                    if ($wisselgeldAangeven && $wissel->hoeveelheid <= 0) {
                        break;
                    }
                }
            }
        }

        return view('success');
    }

}
