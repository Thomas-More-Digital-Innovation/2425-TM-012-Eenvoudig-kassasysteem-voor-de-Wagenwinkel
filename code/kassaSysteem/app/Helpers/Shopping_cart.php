<?php

namespace App\Helpers;
use Storage;
use App\Models\Product;

class Shopping_cart
{
    /**
     * Create a new class instance.
     */
    private static array $cart = [
        'products' => [],
        'amount' => [],
        'totalPrice' => 0
    ];

    public static function init(): void
    {
        self::$cart = session()->get('cart') ?? self::$cart;
    }

    public static function addProduct(): void
    {

    }

    public static function getPrice(): float
    {
        return self::$cart['totalPrice'];
    }

    public static function emptySession(): void
    {
        session()->forget('cart');
    }
}

Shopping_cart::init();
