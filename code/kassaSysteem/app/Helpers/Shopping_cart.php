<?php

namespace App\Helpers;

use App\Models\Organisatie;
use App\Models\Verkoop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class Shopping_cart
{
    /**
     * Create a new class instance.
     */
    private static array $cart = [
        'products' => [],
        'totalPrice' => 0
    ];

    public static function init(): void
    {
        // Get the organization ID of the logged-in user
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];

        // Retrieve the cart specific to the organization
        self::$cart = session()->get("cart{$organisation}") ?? self::$cart;
    }

    public static function addProduct(Product $product, int $amount): void
    {
        if ($amount > 0) {
            $organisation = \App\Helpers\Login::getUser()['organisatie_id'];

            // Add or update product in the cart
            if (isset(self::$cart['products'][$product->product_id])) {
                self::$cart['products'][$product->product_id]['aantal'] += $amount;
            } else {
                self::$cart['products'][$product->product_id] = [
                    'id' => $product->product_id,
                    'naam' => $product->naam,
                    'afbeelding' => $product->afbeeldingen,
                    'actuele_prijs' => $product->actuele_prijs,
                    'organisatie' => $organisation,
                    'aantal' => $amount
                ];
            }
            self::updateTotal();
        }
    }

    public static function delete(Product $product): void
    {
        if (array_key_exists($product->product_id, self::$cart['products'])) {
            self::$cart['products'][$product->product_id]['aantal']--;

            if (self::$cart['products'][$product->product_id]['aantal'] <= 0) {
                unset(self::$cart['products'][$product->product_id]);
            }
        }
        self::updateTotal();
    }

    public static function updateTotal(): void
    {
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        $totalPrice = 0;

        foreach (self::$cart['products'] as $product) {
            // Debugging: Output the product details
            Log::info('Calculating price for product', [
                'naam' => $product['naam'],
                'prijs' => $product['actuele_prijs'],
                'aantal' => $product['aantal']
            ]);

            $totalPrice += $product['actuele_prijs'] * $product['aantal'];
        }

        self::$cart['totalPrice'] = $totalPrice;

        // Store the updated cart in the session with the organization-specific key
        session()->put("cart{$organisation}", self::$cart);
    }

    public static function emptySession(): void
    {
        $products = self::$cart['products'];

        // Insert products into the verkooplijnen table
        foreach ($products as $product) {
            $verkoop_id = Verkoop::where('organisatie_id', $product['organisatie'])
                ->orderBy('datetime', 'desc')
                ->pluck('verkoop_id')
                ->first();

            DB::insert('insert into verkooplijnen (hoeveelheid, verkoopprijs, verkoop_id, product_id) values (?, ?, ?, ?)', [
                $product['aantal'],
                $product['actuele_prijs'],
                $verkoop_id,
                $product['id']
            ]);
        }

        // Forget the cart for the organization
        $organisation = \App\Helpers\Login::getUser()['organisatie_id'];
        session()->forget("cart{$organisation}");

        // Reset the cart
        self::$cart = [
            'products' => [],
            'totalPrice' => 0
        ];
    }

    public static function getCart(): array
    {
        return self::$cart;
    }

    public static function getRecords(): array
    {
        return self::$cart['products'];
    }

    public static function getPrice(): float
    {
        return self::$cart['totalPrice'];
    }
}

// Initialize the shopping cart
Shopping_cart::init();
