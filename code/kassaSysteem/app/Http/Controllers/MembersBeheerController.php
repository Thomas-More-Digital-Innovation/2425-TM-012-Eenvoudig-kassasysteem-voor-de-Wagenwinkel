<?php
namespace App\Http\Controllers;

use App\Models\Organisatie;
use App\Models\User; // Assuming you have a Member model
use Illuminate\Http\Request;

class MembersBeheerController extends Controller
{
    public function index($organisatie_id)
    {
        $users = User::all()->where('organisatie_id', $organisatie_id);

        return view('membersBeheer', compact('users'));
    }
}
