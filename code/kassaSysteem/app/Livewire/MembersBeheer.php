<?php

namespace App\Livewire;

use App\Models\Organisatie;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class MembersBeheer extends Component
{
    public $organisatie_id;
    public $users;
    public $organisaties;

    public function mount($organisatie_id)
    {
        $this->organisatie_id = $organisatie_id;
        $this->users = User::where('organisatie_id', $this->organisatie_id)->get();
    }


    public function deleteMember($user_Id)
    {
        // Find the member in the users table by user_Id
        $user = User::where('user_Id', $user_Id)->first();
        $userId = \App\Helpers\Login::getUser()['user_id'];

        // Check if user exists and delete
        if ($user) {
            $user->delete();
        }

        session()->flash('message', 'Gebruiker succesvol verwijdert');
        $this->users = User::where('organisatie_id', $this->organisatie_id)->get();
        if( $userId == $user_Id)
        {
            Auth::logout();
            session(['userInfo' => [
                'user_id' => null,  // Assuming 'id' is the user_id
                'organisatie_id' => null,    // You can modify this as needed
            ]]);
            return redirect('/');
        }
        else{
            return redirect()->route('members-beheer', ['organisatie_id' => $this->organisatie_id]);
        }

    }

    public function isAdmin()
    {
        // Check if the user is an admin
        return $this->organisatie_id === '1'; // Adjust based on your logic
    }

    public function updatePassword($user_Id)
    {
        // Zoek de gebruiker in de database
        $user = User::where('user_Id', $user_Id)->first();

        // Controleer of de gebruiker bestaat
        if ($user) {
            // Stel het wachtwoord in op '1234'
            $user->wachtwoord = '1234'; // Vergeet niet bcrypt te gebruiken om het wachtwoord te hashen
            $user->wachtwoordWijzigen = 1; // Stel de reset-password indicator in
            $user->save(); // Sla de wijzigingen op
        }

        // Vernieuw de ledenlijst voor de huidige organisatie
        $this->users = User::where('organisatie_id', $this->organisatie_id)->get();
        return redirect()->route('members-beheer', ['organisatie_id' => $this->organisatie_id]);
    }



    public function render()
    {
        // No need to redefine users here since they are set in mount
        return view('livewire.members-beheer', ['users' => $this->users]);
    }

    public function deleteOrganizationAndMembers($organisatie_id)
    {
        // Delete the organization and its members
        Organisatie::where('organisatie_id', $organisatie_id)->delete();
        User::where('organisatie_id', $organisatie_id)->delete();

        return redirect()->route('organisatie-beheer');
    }
}
