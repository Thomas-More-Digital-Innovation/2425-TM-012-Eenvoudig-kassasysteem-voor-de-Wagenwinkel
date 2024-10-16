<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ToggleButton extends Component
{
    public $checked;

    public function __construct($checked = false)
    {
        $this->checked = $checked;
    }

    public function render()
    {
        return view('components.toggle-button');
    }
}
