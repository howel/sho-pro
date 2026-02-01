<?php

namespace App\Livewire;

use Livewire\Component;

class CartPage extends Component
{
    // Función para aumentar cantidad
    public function increment($id)
    {
        \Cart::update($id, [
            'quantity' => 1,
        ]);
        $this->dispatch('cartUpdated');
    }

    // Función para disminuir cantidad
    public function decrement($id)
    {
        $item = \Cart::get($id);
        if ($item->quantity > 1) {
            \Cart::update($id, [
                'quantity' => -1,
            ]);
            $this->dispatch('cartUpdated');
        }
    }

    // Función para eliminar un producto
    public function removeItem($id)
    {
        \Cart::remove($id);
        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        return view('livewire.cart-page', [
            'cartItems' => \Cart::getContent()->sortBy('name'),
            'total' => \Cart::getTotal()
        ]);
    }
/*
    public function checkout()
    {
    $cartItems = \Cart::getContent();
    $total = \Cart::getTotal();
    
    // 1. Construimos el cuerpo del mensaje
    $text = "¡Hola! Me gustaría realizar el siguiente pedido:\n\n";
    
    foreach ($cartItems as $item) {
        $text .= "• " . $item->name . " (Cant: " . $item->quantity . ") - $" . number_format($item->getPriceSum(), 2) . "\n";
    }
    
    $text .= "\n*Total a pagar: $" . number_format($total, 2) . "*";
    
    // 2. Tu número de teléfono (con código de país, ej: 51 para Perú)
    $phone = "51969979954"; // <--- CAMBIA ESTO POR TU NÚMERO
    
    // 3. Creamos el link de WhatsApp
    $url = "https://wa.me/" . $phone . "?text=" . urlencode($text);
    
    // 4. Redirigimos al cliente
    return redirect()->away($url);
    }
*/

    public function checkout()
    {
    $cartItems = \Cart::getContent();
    $total = \Cart::getTotal();

    if ($cartItems->isEmpty()) return;

    // 1. Construir el mensaje
    $text = "*NUEVO PEDIDO - SHOPPRO*\n";
    $text .= "--------------------------\n";
    
    foreach ($cartItems as $item) {
        $text .= "✅ *" . $item->name . "*\n";
        $text .= "   Cant: " . $item->quantity . " x $" . number_format($item->price, 2) . "\n";
    }

    $text .= "--------------------------\n";
    $text .= "*TOTAL A PAGAR: $" . number_format($total, 2) . "*\n\n";
    $text .= "¿Podrían confirmarme la disponibilidad y el método de pago?";

    // 2. Tu número de teléfono con código de país (Ej: 51 para Perú)
    $phone = "51969979954"; // <--- CAMBIA ESTO POR TU NÚMERO REAL

    // 3. Generar URL de WhatsApp
    $url = "https://wa.me/" . $phone . "?text=" . urlencode($text);

    return redirect()->away($url);
    }
}