<?php

namespace App\Livewire;

use Livewire\Component;

class CheckoutPage extends Component
{
    public $name, $phone, $email, $address, $city, $notes;
    public $showPaymentOptions = false; 
    public $shippingCost = 0;

    public $cities = [
        'Soritor' => 0,
        'Moyobamba' => 10,
        'Rioja' => 15,
        'Tarapoto' => 20,
        'Lima' => 45
    ];

    // ESTO CORRIGE EL ERROR: Redirigimos antes de intentar renderizar
    public function mount()
    {
        if (\Cart::isEmpty()) {
            return redirect()->to('/');
        }
    }

    protected $rules = [
        'name'    => 'required|min:3|max:50|regex:/^[a-zA-Z\s]+$/',
        'phone'   => 'required|digits:9',
        'email'   => 'required|email',
        'address' => 'required|min:10',
        'city'    => 'required',
    ];

    public function updatedCity($value)
    {
        $this->shippingCost = $this->cities[$value] ?? 50;
    }

    public function placeOrder()
    {
        $this->validate();
        $this->showPaymentOptions = true; 
        session()->flash('success', '¡Datos confirmados!');
    }

    public function finalize()
    {
        $this->validate();
        $miTelefono = "51969979954";
        
        $cartItems = \Cart::getContent();
        $totalProductos = \Cart::getTotal();
        $totalFinal = $totalProductos + $this->shippingCost;

        $listaProductos = "";
        foreach ($cartItems as $item) {
            $listaProductos .= "• " . $item->name . " (x" . $item->quantity . ") - $" . number_format($item->getPriceSum(), 2) . "\n";
        }

        $texto = "¡Hola! Nuevo pedido en SHOPPRO. 🚀\n\n";
        $texto .= "*CLIENTE:* " . $this->name . "\n";
        $texto .= "*CELULAR:* " . $this->phone . "\n";
        $texto .= "--------------------------\n";
        $texto .= "*PRODUCTOS:*\n" . $listaProductos . "\n";
        $texto .= "--------------------------\n";
        $texto .= "*SUBTOTAL:* $" . number_format($totalProductos, 2) . "\n";
        $texto .= "*ENVÍO:* $" . number_format($this->shippingCost, 2) . " (" . $this->city . ")\n";
        $texto .= "*TOTAL A PAGAR:* $" . number_format($totalFinal, 2) . "\n\n";
        $texto .= "📍 *DIRECCIÓN:* " . $this->address . "\n\n";
        $texto .= "Adjunto mi comprobante de pago.";

        $urlWhatsapp = "https://wa.me/" . $miTelefono . "?text=" . urlencode($texto);

        // 1. Limpiamos el carrito
        \Cart::clear();

        // 2. Guardamos una marca de "Compra Exitosa" en la sesión
        session()->flash('order_completed', '¡Gracias por tu compra! Tu pedido ha sido enviado por WhatsApp.');

        // 3. Redirigimos
        return redirect()->away($urlWhatsapp);


    }

    public function render()
    {
        return view('livewire.checkout-page', [
            'cartItems' => \Cart::getContent(),
            'total' => \Cart::getTotal()
        ]);
    }
}