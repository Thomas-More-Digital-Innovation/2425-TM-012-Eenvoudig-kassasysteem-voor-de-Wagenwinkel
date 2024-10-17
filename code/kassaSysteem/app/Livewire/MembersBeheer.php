<?php

namespace App\Livewire;

use App\Models\Organisatie;
use App\Models\User;
use Livewire\Component;

class MembersBeheer extends Component
{
    public $organisatie_id;
    public $users;
    public $organisaties;
    public $checked;


    public function mount($organisatie_id)
    {
        $this->organisatie_id = $organisatie_id;
        $this->users = User::where('organisatie_id', $organisatie_id)->get();
        $this->organisaties = Organisatie::where('organisatie_id', $organisatie_id)->get();
    }

    public function deleteMember($user_Id)
    {
        // Find the member in the users table by user_Id
        $user = User::where('user_Id', $user_Id)->first();

        // Check if user exists and delete
        if ($user) {
            $user->delete();
        }

        // Refresh the members list for the current organization
        $this->users = User::where('organisatie_id', $this->organisatie_id)->get();
        return redirect()->route('members-beheer', ['organisatie_id' => $this->organisatie_id]);
    }

    public function isAdmin()
    {
        // Assuming you have a way to get the current user's organization
        return $this->organisatie_id === '1'; // Replace 'ADMIN' with the actual ID or logic to check
    }
    // In your controller method for updating the password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $username = $request->username;
        $newPassword = $request->password;

        // Use the Login helper to reset the password
        if (Login::resetPassword($username, $newPassword)) {
            return redirect()->route('login')->with('status', 'Password updated successfully. You can now log in.');
        }

        return back()->withErrors(['username' => 'User not found.']);
    }


    public function render()
    {
        return view('livewire.members-beheer', [
            'members' => $this->users,
        ]);
    }
    public function deleteOrganizationAndMembers($organisatie_id)
    {
        // Delete the organization itself
        Organisatie::where('organisatie_id', $organisatie_id)->delete();

        // Optionally: Add logic to refresh the page or redirect
        session()->flash('message', 'Organization and its members have been successfully deleted.');
        return redirect()->route('organisatie-beheer');
    }

}
