<?php

namespace App\Livewire;

use Livewire\Component;
use App\Helpers\CartManagement;
use App\Models\City; // Importamos el modelo

class CheckoutPage extends Component
{
    public $name;
    public $phone;
    public $email;
    public $address;
    public $city; // Aquí guardaremos el nombre de la ciudad seleccionada
    public $notes;
    
    public $cart_items = [];
    public $subtotal;
    public $shipping_cost = 0;
    public $total;
    public $showPaymentOptions = false;

    // Propiedad para almacenar las ciudades de la BD
    public $available_cities = [];

    public function mount()
    {
        // Cargamos solo las ciudades activas desde la BD
        $this->available_cities = City::where('is_active', true)->get();
        
        $this->cart_items = CartManagement::getCartItemsFromCookie();
        
        if (empty($this->cart_items)) {
            return redirect()->route('cart');
        }

        $this->calculateTotals();
    }

    // Se ejecuta al cambiar la ciudad en el select
    public function updatedCity($cityName)
    {
        // Buscamos la ciudad en la BD para obtener su costo de envío
        $cityData = City::where('name', $cityName)->first();
        
        $this->shipping_cost = $cityData ? $cityData->shipping_cost : 0;
        
        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        $this->subtotal = array_sum(array_column($this->cart_items, 'total_amount'));
        $this->total = $this->subtotal + $this->shipping_cost;
    }

    public function placeOrder()
    {
        $this->validate([
            'name' => 'required|min:3',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'address' => 'required',
            'city' => 'required',
        ]);

        $this->showPaymentOptions = true;
    }

    public function finalize()
    {
        $text = "*NUEVO PEDIDO - IMPORTACIONES SALAZAR*\n";
        $text .= "--------------------------\n";
        $text .= "👤 *Cliente:* {$this->name}\n";
        $text .= "📞 *WhatsApp:* {$this->phone}\n";
        $text .= "📍 *Ciudad:* {$this->city}\n";
        $text .= "🏠 *Dirección:* {$this->address}\n";
        if($this->notes) $text .= "📝 *Notas:* {$this->notes}\n";
        $text .= "--------------------------\n";
        
        foreach ($this->cart_items as $item) {
            $text .= "• " . $item['name'] . " (x" . $item['quantity'] . ")\n";
        }

        $text .= "--------------------------\n";
        $text .= "*Subtotal:* S/ " . number_format($this->subtotal, 2) . "\n";
        $text .= "*Envío:* S/ " . number_format($this->shipping_cost, 2) . "\n";
        $text .= "*TOTAL A PAGAR: S/ " . number_format($this->total, 2) . "*\n\n";
        $text .= "✅ _Ya realicé el pago, adjunto el comprobante._";

        $phone = "51969979954"; 
        $url = "https://wa.me/" . $phone . "?text=" . urlencode($text);

        CartManagement::clearCartItems();
        session()->flash('order_completed', '¡Gracias por tu compra, ' . $this->name . '!');
        
        return redirect()->away($url);
    }

    public function render()
    {
        return view('livewire.checkout-page');
    }
}