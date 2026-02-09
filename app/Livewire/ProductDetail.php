<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Helpers\CartManagement; // IMPORTANTE: Importar el Helper

class ProductDetail extends Component
{
    public $product;
    public $quantity = 1;

    public function mount($slug)
    {
        $this->product = Product::where('slug', $slug)->firstOrFail();
    }

    public function render()
    {
        // Buscamos 4 productos de la misma categoría, excluyendo el actual
        $related_products = Product::where('category_id', $this->product->category_id)
            ->where('id', '!=', $this->product->id)
            ->where('is_active', true)
            ->limit(4)
            ->get();

        return view('livewire.product-detail', [
            'related_products' => $related_products
        ]);
    }

    public function addToCart()
    {
        try {
            $total_count = CartManagement::addCartItem($this->product->id, $this->quantity);

            $this->dispatch('update-cart-count', total_count: $total_count);

            // ENVIAR ASÍ: Parámetros directos para que Livewire 3 los mapee correctamente
            $this->dispatch('show-product-modal', 
                name: $this->product->name,
                image: asset('storage/' . $this->product->image),
                quantity: $this->quantity,
                price: number_format($this->product->price * $this->quantity, 2)
            );

        } catch (\Exception $e) {
            session()->flash('error', 'Error al añadir: ' . $e->getMessage());
        }
    }
}