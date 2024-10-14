<?php

use App\Http\Controllers\calculateChangeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MembersBeheerController;
use App\Http\Controllers\ProductController;
use App\Livewire\OrganisatieBeheer;
use App\Livewire\Product;
use Illuminate\Support\Facades\Route;
use App\Livewire\DatabaseTesting;

// VIEW
Route::view('/', 'loginSystem')->name('loginSystem');

Route::view('/category', 'category')->name('category');

Route::view('/cashIngeven', 'cashIngeven')->name('cashIngeven');


Route::view('soortBetalen', 'soortBetalen')->name('soortBetalen');

Route::view('loginSystem', 'loginSystem')->name('loginSystem');


// GET
Route::get('/members/{organisatie_id}', [MembersBeheerController::class, 'index'])->name('membersBeheer');

Route::get('/organisatie-beheer', OrganisatieBeheer::class)->name('organisatie-beheer');

Route::get('success', function() {
    return view('success');
})->name('success');

Route::get('product/{id}', [ProductController::class, 'show']);

Route::get('winkelwagen', \App\Livewire\Winkelkar::class)->name('winkelkar');

/*moet nog weg*/
Route::get('userSession', \App\Livewire\UserSession::class)->name('userSession');

Route::get('payconic', function() {
    return view('Payconic');
})->name('payconic');

Route::get('cash', function() {
    return view('cash');
})->name('cash');

Route::get('winkelmand', [CartController::class, 'showCart'])->name('winkelmand');


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

Route::get('/item-select/{categoryId?}', [ProductController::class, 'ProductAll'])->name('products');

Route::get('item-select/product/{id?}', Product::class)->name('product');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');


Route::get('/calculate-change', [calculateChangeController::class, 'calculateChange'])->name('calculate-change');


Route::get('begeleiderLogin', function () {
    return view('begeleiderLogin');
})->name('begeleiderLoginForm');

Route::get('betaalmethode', function () {
    return view('betaalmethode');
})->name('soortBetalen');

Route::post('empty-cart', [CartController::class, 'emptyCart'])->name('empty.cart');

Route::post('item-select/product/{id?}', [CartController::class, 'addProduct'])->name('cart.product-add');
Route::get('RemoveProduct/{id?}', [CartController::class, 'delete'])->name('cart.remove-product');

Route::post('begeleiderLogin', function () {

    $logins = [
        ['naam' => 'maxim', 'wachtwoord' => '123']
    ];

    $naam = request('name');
    $wachtwoord = request('password');


    $is_valid = false;
    foreach ($logins as $login) {
        if ($login['naam'] === $naam && $login['wachtwoord'] === $wachtwoord) {
            $is_valid = true;
            break;
        }
    }


    if ($is_valid) {
        return view('settings', ['naam' => $naam]);
    } else {
        return back()->withErrors(['error' => 'Ongeldige naam of wachtwoord.']);
    }
})->name('begeleiderLogin');

Route::get('betaalmethode', function () {
    return view('betaalmethode');
});



Route::get('products', DatabaseTesting::class)->name('producten');

use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/loginSystem', [LoginController::class, 'logout'])->name('logout');

