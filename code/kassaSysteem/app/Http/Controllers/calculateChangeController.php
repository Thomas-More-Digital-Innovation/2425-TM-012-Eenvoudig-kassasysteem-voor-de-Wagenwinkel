<?php
namespace App\Http\Controllers;

use App\Models\Wisselgeld;
use Illuminate\Http\Request;

class calculateChangeController extends Controller
{
    public function calculateChange(Request $request)
    {
        $totalGeld = $request->input('totalGeld');

        $totalCost = \App\Helpers\Shopping_cart::getPrice();
        $amountGiven = $totalGeld;

        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        $wisselgeldRecords = Wisselgeld::with('muntstuk')
            ->where('organisatie_id', $organisation)
            ->get();



        $change = $amountGiven - $totalCost;
        $result = [];

        foreach ($wisselgeldRecords as $wissel) {
            $muntstuk = $wissel->muntstuk;

            if ($change >= $muntstuk->waarde && $wissel->hoeveelheid > 0) {
                $quantity = min(floor($change / $muntstuk->waarde), $wissel->hoeveelheid);
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

                if ($wissel->hoeveelheid == 0) {
                    continue;
                }
                while ($change > 0 && $wissel->hoeveelheid > 0) {
                    if ($muntstuk->waarde > $change) {
                        continue;
                    }
                    $wissel->hoeveelheid--;
                    $result[] = ['name' => $muntstuk->naam, 'quantity' => 1];
                    $change -= $muntstuk->waarde;
                    $change = round($change, 2);
                }
            }
        }

        return view('calculateChange', [
            'result' => $result,
            'total_cost' => $totalCost,
            'amount_given' => $amountGiven,
        ]);
    }

}
