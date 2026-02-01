<?php

namespace App\Livewire;

use App\Models\Product; 
use Livewire\Component;
// Importamos la librería del carrito
use Jantinnerezo\LivewireAlert\LivewireAlert; // Opcional si usas alertas

class Home extends Component
{
    //use LivewireAlert; // Opcional

    // FUNCIÓN PARA AÑADIR AL CARRITO
    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        // Añadimos el producto usando la librería Darryldecode Cart
        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                'image' => $product->image,
            ]
        ]);

        // Emitimos un evento para que el contador del carrito en el navbar se actualice
        $this->dispatch('cartUpdated');

        // Mostramos un mensaje de éxito (puedes usar un simple flash si no tienes LivewireAlert)
        session()->flash('success', 'Producto añadido al carrito');
    }

    public function render()
    {
        return view('livewire.home', [
            'products' => Product::where('is_active', true)->latest()->get()
        ]);
    }
}