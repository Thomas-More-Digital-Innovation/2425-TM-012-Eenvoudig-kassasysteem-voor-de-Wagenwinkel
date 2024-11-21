<?php

namespace App\Http\Controllers;

use App\Helpers\Shopping_cart;
use Illuminate\Http\Request;

class CashIngevenController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        Shopping_cart::addPayMethod('Cash');
        return view('cashIngeven');
    }
}
