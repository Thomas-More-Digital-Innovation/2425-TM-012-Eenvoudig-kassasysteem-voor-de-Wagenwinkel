<?php

use App\Http\Controllers\calculateChangeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MembersBeheerController;
use App\Http\Controllers\ProductController;
use App\Livewire\OrganisatieBeheer;
use App\Livewire\Product;
use App\Livewire\WisselgeldBeheer;
use App\Livewire\Verkooplijst;
use Illuminate\Support\Facades\Route;
use App\Livewire\DatabaseTesting;
use App\Http\Controllers\Auth\LoginController;

// VIEW
Route::view('/', 'loginSystem')->name('loginSystem');

Route::view('/category', 'category')->name('category');

Route::view('/begeleiderSettings', 'begeleiderSettings')->name('begeleiderSettings');

Route::view('/cashIngeven', 'cashIngeven')->name('cashIngeven');


Route::view('soortBetalen', 'soortBetalen')->name('soortBetalen');

Route::view('loginSystem', 'loginSystem')->name('loginSystem');


// GET
Route::get('Verkooplijst', Verkooplijst::class)->name('verkooplijst');

Route::get('/members/{organisatie_id}', [MembersBeheerController::class, 'index'])->name('membersBeheer');

Route::get('/organisatie-beheer', OrganisatieBeheer::class)->name('organisatie-beheer');

Route::get('/wisselgeld-beheer', wisselgeldBeheer::class)->name('wisselgeld-beheer');

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

Route::get('products', DatabaseTesting::class)->name('producten');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('betaalmethode', function () {
    return view('betaalmethode');
});

Route::get('RemoveProduct/{id?}', [CartController::class, 'delete'])->name('cart.remove-product');

Route::post('empty-cart', [CartController::class, 'emptyCart'])->name('empty.cart');

Route::post('item-select/product/{id?}', [CartController::class, 'addProduct'])->name('cart.product-add');

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

Route::post('/login', [LoginController::class, 'login']);

Route::post('/loginSystem', [LoginController::class, 'logout'])->name('logout');

Route::post('wisselgeldBeheer', [wisselgeldBeheer::class, 'updateWisselgeld'])->name('updateWisselgeld');

Route::post('/update-database', [calculateChangeController::class, 'updateDatabase'])->name('updateDatabase');


