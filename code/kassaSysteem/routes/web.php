<?php

use App\Livewire\Verkoop\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\CartController;

Route::get('/', function (){
    $organistaties = [
        'Buso',
        'test',
    ];

    return view('select', [
        'organistaties' => $organistaties
    ]);
});

Route::get('success', function() {
    return view('success');
})->name('success');

Route::post('empty-cart', [CartController::class, 'emptyCart'])->name('empty.cart');


Route::get('payconic', function() {
    return view('Payconic');
})->name('payconic');

Route::get('wisselgeldBeheer', function() {
    $money = [
        [
            'id' => 1,
            'name' => '50euro',
            'amount' => 50,
        ],
        [
            'id' => 2,
            'name' => '20euro',
            'amount' => 20,
        ],

        [
            'id' => 3,
            'name' => '10euro',
            'amount' => 10,
        ],
        [
            'id' => 4,
            'name' => '5euro',
            'amount' => 5,
        ],
        [
            'id' => 5,
            'name' => '2euro',
            'amount' => 2,
        ],
        [
            'id' => 6,
            'name' => '1euro',
            'amount' => 1,
        ],
        [
            'id' => 7,
            'name' => '50cent',
            'amount' => 50,
        ],
        [
            'id' => 8,
            'name' => '20cent',
            'amount' => 20,
        ],
        [
            'id' => 9,
            'name' => '10cent',
            'amount' => 10,
        ],
        [
            'id' => 10,
            'name' => '5cent',
            'amount' => 5,
        ],

    ];
    return view('wisselgeldBeheer', [
        'money' => $money,
    ]);
});

Route::post('category', [OrganizationController::class, 'submit'])->name('submit');

Route::get('/foodSelect', function () {
    $items = [
        [
            'id' => 1,
            'name' => 'Appel',
            'imagePath' => asset('assets/images/items/appel.png'),
            'position' => 1,
        ],
        [
            'id' => 2,
            'name' => 'Koekje',
            'imagePath' => asset('assets/images/items/koekje.png'),
            'position' => 2,
        ],

    ];
    return view('itemsOverzicht', [
        'items' => $items,
    ]);
})->name('food');

Route::get('/nonFoodSelect', function () {
    $items = [
        [
            'id' => 1,
            'name' => 'Kaartje',
            'imagePath' => asset('assets/images/items/kaartje.png'),
            'position' => 1,
        ],

    ];
    return view('itemsOverzicht', [
        'items' => $items,
    ]);
})->name('noFood');

Route::get('category', function () {
    return view('category');
})->name('category');

Route::get('product/{id?}', Product::class)->name('product');

Route::get('/settings', function () {
    return view('settings');
});

Route::get('calculate-change', function() {
    $totalCost = 8.5;
    $amountGiven = 20.00;

    $denominations = [
        ['name' => '50', 'value' => 50, 'count' => 99],
        ['name' => '20', 'value' => 20, 'count' => 99],
        ['name' => '10', 'value' => 10, 'count' => 99],
        ['name' => '5', 'value' => 5, 'count' => 99],
        ['name' => '2', 'value' => 2, 'count' => 99],
        ['name' => '1', 'value' => 1, 'count' => 99],
        ['name' => '_50', 'value' => 0.50, 'count' => 99],
        ['name' => '_20', 'value' => 0.20, 'count' => 99],
        ['name' => '_10', 'value' => 0.10, 'count' => 99],
        ['name' => '_5', 'value' => 0.05, 'count' => 99],
    ];

    $change = $amountGiven - $totalCost;
    $result = [];

    foreach ($denominations as &$denom) {
        if ($change >= $denom['value'] && $denom['count'] > 0) {
            $quantity = min(floor($change / $denom['value']), $denom['count']);
            if ($quantity > 0) {
                $result[] = ['name' => $denom['name'], 'quantity' => $quantity];
                $change -= $quantity * $denom['value'];
                $change = round($change, 2);
            }
        }
    }

    if ($change > 0) {
        foreach ($denominations as &$denom) {
            if ($denom['count'] == 0) {
                continue;
            }
            while ($change > 0 && $denom['count'] > 0) {
                if ($denom['value'] > $change) {
                    continue;
                }
                $denom['count']--;
                $result[] = ['name' => $denom['name'], 'quantity' => 1];
                $change -= $denom['value'];
                $change = round($change, 2);
            }
        }
    }

    return view('calculateChange', [
        'result' => $result,
        'total_cost' => $totalCost,
        'amount_given' => $amountGiven,
    ]);
});
