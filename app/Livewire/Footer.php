<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Setting;

class Footer extends Component
{
    // No pases variables aquí, deja que la vista las llame directamente
    public function render()
    {
        return view('livewire.footer');
    }
}