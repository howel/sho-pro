<?php

namespace App\Livewire\Admin;

use App\Models\Setting;
use Livewire\Component;
use Livewire\WithFileUploads; // Indispensable para que funcione el $file->store

class Settings extends Component
{
    use WithFileUploads;

    public $logo; 

    public function saveLogo()
    {
        $this->validate([
            'logo' => 'image|max:2048', // Valida que sea imagen y no pese más de 2MB
        ]);

        // 1. Guardar la imagen físicamente en storage/app/public/settings
        $path = $this->logo->store('settings', 'public');

        // 2. Guardar o actualizar la ruta en la tabla 'settings'
        Setting::updateOrCreate(
            ['key' => 'site_logo'],
            ['value' => $path]
        );

        session()->flash('message', '¡Logo actualizado correctamente!');
    }

    public function render()
    {
        return view('livewire.admin.settings');
    }
}