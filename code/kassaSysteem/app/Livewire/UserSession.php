<?php

namespace App\Livewire;

use App\Helpers\Login;
use App\Models\Product;
use Livewire\Component;

class UserSession extends Component
{
    public $userInfo = [];

    public function mount()
    {
        $this->userInfo = session()->get('userInfo', []);
    }

    public function render()
    {
        return view('livewire.userSession', [
            'userInfo' => $this->userInfo,
        ]);
    }
}

