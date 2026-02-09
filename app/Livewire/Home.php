<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\Banner;
use App\Helpers\CartManagement; // Importamos tu Helper
use Livewire\Component;

class Home extends Component
{
    public $selectedCategory = null;

    public function selectCategory($id = null)
    {
        $this->selectedCategory = $id;
    }

    /**
     * Función para añadir productos al carrito usando COOKIES
     */
    public function addToCart($productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            return;
        }

        // 1. Usamos tu método exacto del Helper: addCartItem
        // Esto devuelve el total de productos en el carrito
        $total_count = CartManagement::addCartItem($product->id, 1);

        // 2. Emitimos el evento que tu Navigation.php ya sabe escuchar
        $this->dispatch('update-cart-count', total_count: $total_count);

        // 3. Lanzamos el modal con el formato que ya usas en el Detalle
        $this->dispatch('show-product-modal', [
            'name'     => $product->name,
            'image'    => asset('storage/' . $product->image),
            'price'    => number_format($product->price, 2),
            'quantity' => 1
        ]);
    }

    public function render()
    {
        return view('livewire.home', [
            'banners' => Banner::where('is_active', true)->orderBy('sort_order')->get(),
            'categories' => Category::all(),
            'products' => Product::where('is_active', true)
                ->when($this->selectedCategory, function ($query) {
                    return $query->where('category_id', $this->selectedCategory);
                })
                ->latest()
                ->take(8)
                ->get(),
        ]);
    }
}