<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetail extends Component
{
    public $product;
    public $quantity = 1; // 1. DEBES declarar la propiedad para que wire:model funcione

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        return view('livewire.product-detail');
    }

    public function addToCart()
    {
        try {
            \Cart::add([
                'id' => $this->product->id,
                'name' => $this->product->name,
                'price' => $this->product->price,
                'quantity' => (int) $this->quantity,
                'attributes' => [
                    'image' => $this->product->image,
                ]
            ]);

            $this->dispatch('cartUpdated'); 
            
            // Enviamos los datos del producto al navegador para el Modal
            $this->dispatch('show-product-modal', [
                'name' => $this->product->name,
                'image' => asset('storage/' . $this->product->image),
                'quantity' => $this->quantity,
                'price' => number_format($this->product->price * $this->quantity, 2)
            ]);
            
        } catch (\Exception $e) {
            session()->flash('error', 'Hubo un problema.');
        }
    } 
}