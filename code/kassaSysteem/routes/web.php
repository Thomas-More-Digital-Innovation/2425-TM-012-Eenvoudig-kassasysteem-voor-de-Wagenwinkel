<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\calculateChangeController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MembersBeheerController;
use App\Http\Controllers\ProductController;
use App\Livewire\InstellingenBeheer;
use App\Livewire\ManageProducts;
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
Route::view('/settings', 'settings')->name('settings');
Route::view('/success', 'success')->name('success');
Route::view('/payconic', 'Payconic')->name('payconic');
Route::view('/cash', 'cash')->name('cash');

// GET routes for Livewire and Controllers
Route::get('/verkooplijst', Verkooplijst::class)->name('verkooplijst');
Route::get('/members/{organisatie_id}', [MembersBeheerController::class, 'index'])->name('membersBeheer');
Route::get('/members/{organisatie_id}', \App\Livewire\MembersBeheer::class)->name('members-beheer');
Route::get('/organisatie-beheer', OrganisatieBeheer::class)->name('organisatie-beheer');
Route::get('/wisselgeld-beheer', WisselgeldBeheer::class)->name('wisselgeld-beheer');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show'); // Added name for product show route
Route::get('/winkelwagen', \App\Livewire\Winkelkar::class)->name('winkelkar');
Route::get('/userSession', \App\Livewire\UserSession::class)->name('userSession');
Route::get('/winkelmand', [CartController::class, 'showCart'])->name('winkelmand');
Route::get('/item-select/{categoryId?}', [ProductController::class, 'ProductAll'])->name('products');
Route::get('/item-select/product/{id?}', Product::class)->name('product');
Route::get('/instellingen-beheer', InstellingenBeheer::class)->name('instellingen-beheer');

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login'); // General user login
Route::post('/login', [LoginController::class, 'login'])->name('login.post'); // Handle general user login
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Logout

// Admin/Begeleider login routes
Route::get('/login-admin-begeleider', [AuthController::class, 'showLoginForm'])->name('loginAdminBegeleiderForm'); // Show admin/begeleider login form
Route::post('/login-admin-begeleider', [AuthController::class, 'login'])->name('loginAdminBegeleider'); // Handle admin/begeleider login

// Settings login routes
Route::get('/login-settings-admin-begeleider', [SettingsController::class, 'showLoginForm'])->name('loginSettingsAdminBegeleiderForm'); // Show settings login form
Route::post('/login-settings-admin-begeleider', [SettingsController::class, 'login'])->name('loginSettingsAdminBegeleider'); // Handle settings login

// Calculate change route
Route::get('/calculate-change', [calculateChangeController::class, 'calculateChange'])->name('calculate-change');

// Cart routes
Route::get('/removeProduct/{id?}', [CartController::class, 'delete'])->name('cart.remove-product');
Route::get('RemoveProduct/{id?}', [CartController::class, 'delete'])->name('cart.remove-product');
Route::post('/empty-cart', [CartController::class, 'emptyCart'])->name('empty.cart');
Route::post('/item-select/product/{id?}', [CartController::class, 'addProduct'])->name('cart.product-add');

// Change password
Route::get('passwordChangeForm', function () {
    return view('passwordChangeForm');
})->name('passwordChangeForm');

Route::post('password/change', [LoginController::class, 'changePassword'])->name('password.change');
Route::post('/password/reset/{user}', [LoginController::class, 'resetPassword'])->name('password.reset');

// Wisselgeld update
Route::post('/wisselgeldBeheer', [WisselgeldBeheer::class, 'updateWisselgeld'])->name('updateWisselgeld');

Route::get('/addProduct', function () {
    return view('addProduct');
})->name('addProduct');

// Route for managing products (no product_id needed here)
Route::get('/manage-products', ManageProducts::class)->name('manage-products');

// Route for editing a product (this route will pass the product_id)
Route::get('/producten/{product_id}/edit', [ProductController::class, 'edit'])->name('producten.edit');


// Store and Edit routes
Route::post('/products', [ManageProducts::class, 'store'])->name('products.store');

// Route voor het updaten van een product
Route::put('/producten/{product_id}', [ProductController::class, 'update'])->name('producten.update');

// Route voor het verwijderen van een product
Route::delete('/producten/{product_id}', [ManageProducts::class, 'destroy'])->name('producten.destroy');

// Database update route for change calculation
Route::post('/update-database', [calculateChangeController::class, 'updateDatabase'])->name('updateDatabase');
