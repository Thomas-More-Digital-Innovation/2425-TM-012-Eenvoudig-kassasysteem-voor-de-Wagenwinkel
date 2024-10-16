<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingsController;// Assuming this is your AuthController
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

// VIEW Routes
Route::view('/', 'loginSystem')->name('loginSystem');
Route::view('/category', 'category')->name('category');
Route::view('/begeleiderSettings', 'begeleiderSettings')->name('begeleiderSettings');
Route::view('/cashIngeven', 'cashIngeven')->name('cashIngeven');
Route::view('/soortBetalen', 'soortBetalen')->name('soortBetalen');
Route::view('/loginAdminBegeleider', 'loginSystemAdminBegeleider')->name('loginAdminBegeleider');
Route::view('/loginSettingsAdminBegeleider', 'loginSettingsAdminBegeleider')->name('loginSettingsAdminBegeleider');
Route::view('/settings', 'settings')->name('settings'); // Assuming there is a settings view

// GET routes for Livewire and controllers
Route::get('/verkooplijst', Verkooplijst::class)->name('verkooplijst');
Route::get('/members/{organisatie_id}', [MembersBeheerController::class, 'index'])->name('membersBeheer');
Route::get('/organisatie-beheer', OrganisatieBeheer::class)->name('organisatie-beheer');
Route::get('/wisselgeld-beheer', WisselgeldBeheer::class)->name('wisselgeld-beheer');

Route::get('/success', fn() => view('success'))->name('success');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show'); // Added name for the product show route
Route::get('/winkelwagen', \App\Livewire\Winkelkar::class)->name('winkelkar');
Route::get('/userSession', \App\Livewire\UserSession::class)->name('userSession');
Route::get('/payconic', fn() => view('Payconic'))->name('payconic');
Route::get('/cash', fn() => view('cash'))->name('cash');
Route::get('/winkelmand', [CartController::class, 'showCart'])->name('winkelmand');
Route::get('/item-select/{categoryId?}', [ProductController::class, 'ProductAll'])->name('products');
Route::get('/item-select/product/{id?}', Product::class)->name('product');

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // General user login
Route::post('/login', [LoginController::class, 'login'])->name('login.post'); // Handle general user login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Logout

Route::get('/login-admin-begeleider', [AuthController::class, 'showLoginForm'])->name('loginAdminBegeleiderForm'); // Show admin/begeleider login form
Route::post('/login-admin-begeleider', [AuthController::class, 'login'])->name('loginAdminBegeleider'); // Handle admin/begeleider login

// New login routes for SettingsController
Route::get('/login-settings-admin-begeleider', [SettingsController::class, 'showLoginForm'])->name('loginSettingsAdminBegeleiderForm'); // Show settings login form
Route::post('/login-settings-admin-begeleider', [SettingsController::class, 'login'])->name('loginSettingsAdminBegeleider'); // Handle settings login

// Calculate change
Route::get('/calculate-change', [calculateChangeController::class, 'calculateChange'])->name('calculate-change');

// Cart routes
Route::get('/removeProduct/{id?}', [CartController::class, 'delete'])->name('cart.remove-product');
Route::post('/empty-cart', [CartController::class, 'emptyCart'])->name('empty.cart');
Route::post('/item-select/product/{id?}', [CartController::class, 'addProduct'])->name('cart.product-add');
Route::post('/wisselgeldBeheer', [WisselgeldBeheer::class, 'updateWisselgeld'])->name('updateWisselgeld');
Route::post('/update-database', [calculateChangeController::class, 'updateDatabase'])->name('updateDatabase');
