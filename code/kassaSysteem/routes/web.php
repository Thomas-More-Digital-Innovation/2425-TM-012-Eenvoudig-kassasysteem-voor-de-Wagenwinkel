<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;

Route::get('/', function (){
    $organistaties = [
        'Buso',
        'test',
    ];

    return view('select', [
        'organistaties' => $organistaties
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

