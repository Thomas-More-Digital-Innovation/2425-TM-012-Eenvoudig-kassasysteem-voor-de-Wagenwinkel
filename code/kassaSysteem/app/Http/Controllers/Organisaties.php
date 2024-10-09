<?php
// app/Http/Controllers/YourController.php
namespace App\Http\Controllers;

use App\Models\Organisatie;
use Illuminate\Http\Request;

class Organisaties extends Controller
{
    public function index()
    {
        $organisaties = Organisatie::all();


        return view('select', ['organisaties' => $organisaties]);
    }
}
