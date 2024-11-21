<?php

namespace App\Http\Controllers;

use App\Helpers\Shopping_cart;
use Illuminate\Http\Request;

class PayconicController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        Shopping_cart::addPayMethod('Payconic');
        return view('Payconic');
    }
}
