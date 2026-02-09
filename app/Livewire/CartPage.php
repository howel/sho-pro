<?php

namespace App\Livewire;

use App\Helpers\CartManagement;
use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Carrito - Salazar')]
class CartPage extends Component
{
    public $cart_items = [];
    public $grand_total;

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cart_items = CartManagement::getCartItemsFromCookie();
        $this->grand_total = array_sum(array_column($this->cart_items, 'total_amount'));
    }

    public function increment($product_id)
    {
        $total_count = CartManagement::updateQuantity($product_id, 'increment');
        $this->dispatch('update-cart-count', total_count: $total_count);
        $this->loadCart();
    }

    public function decrement($product_id)
    {
        $total_count = CartManagement::updateQuantity($product_id, 'decrement');
        $this->dispatch('update-cart-count', total_count: $total_count);
        $this->loadCart();
    }

    public function removeItem($product_id)
    {
        $total_count = CartManagement::removeItem($product_id);
        $this->dispatch('update-cart-count', total_count: $total_count);
        $this->loadCart();
        
        $this->dispatch('notify', [
            'message' => 'Producto eliminado',
            'type' => 'info'
        ]);
    }

    // NUEVO: Método para limpiar todo el carrito
    public function clearCart()
    {
        // 1. Limpia las cookies
        CartManagement::clearCartItems();
        
        // 2. IMPORTANTE: Limpia las variables locales para que la vista se actualice
        $this->cart_items = [];
        $this->grand_total = 0;

        // 3. Notifica al Navbar
        $this->dispatch('update-cart-count', total_count: 0);
        
        // Opcional: Notificación visual
        $this->dispatch('notify', [
            'message' => 'Carrito vaciado correctamente',
            'type' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}