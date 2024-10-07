<?php

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

Route::post('submit', [OrganizationController::class, 'submit'])->name('submit');

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
});

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
});


Route::get('/settings', function () {
    return view('settings');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
