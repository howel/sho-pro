<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class Navigation extends Component
{
    // Cambiamos 'cartUpdated' por 'item-added-to-cart'
    protected $listeners = ['item-added-to-cart' => '$refresh']; 
    
    public function render()
    {
        return view('livewire.navigation', [
            // Mantenemos tus categorías
            'categories' => Category::where('is_visible', true)->get(),
            // Mantenemos el conteo
            'cartCount' => \Cart::getContent()->count() 
        ]);
    }
}