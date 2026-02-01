<div class="container mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">Tu Carrito de Compras</h1>

    @if($cartItems->isEmpty())
        <div class="bg-white p-8 rounded-xl shadow-sm text-center">
            <p class="text-xl text-gray-600 mb-6">Tu carrito está vacío.</p>
            <a href="/" class="bg-orange-600 text-white px-6 py-3 rounded-lg font-bold">Volver a la tienda</a>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 bg-white rounded-xl shadow-sm overflow-hidden h-fit">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-600 uppercase">Producto</th>
                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-600 uppercase">Cantidad</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-600 uppercase">Subtotal</th>
                            <th class="px-6 py-4"></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($cartItems as $item)
                            <tr>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <img src="{{ Storage::url($item->attributes->image) }}" class="w-16 h-16 object-cover rounded mr-4">
                                        <span class="font-medium text-gray-900">{{ $item->name }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <div class="flex justify-center items-center space-x-2">
                                        <button wire:click="decrement('{{ $item->id }}')" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">-</button>
                                        <span class="w-8 font-bold">{{ $item->quantity }}</span>
                                        <button wire:click="increment('{{ $item->id }}')" class="px-2 py-1 bg-gray-200 rounded hover:bg-gray-300">+</button>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-right font-semibold text-gray-900">
                                    ${{ number_format($item->getPriceSum(), 2) }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <button wire:click="removeItem('{{ $item->id }}')" class="text-red-500 hover:text-red-700">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm h-fit border border-gray-100">
                <h2 class="text-xl font-bold mb-4">Resumen del pedido</h2>
                
                <div class="flex justify-between border-t border-b py-3 mb-6 text-2xl font-bold">
                    <span>Total:</span>
                    <span class="text-orange-600">${{ number_format($total, 2) }}</span>
                </div>

                <div class="space-y-4">
                    <a href="{{ route('checkout.form') }}" 
                       class="w-full bg-gray-900 text-white py-4 rounded-xl font-bold text-lg hover:bg-black transition flex items-center justify-center">
                        Continuar con el pago
                    </a>

                    <div class="relative flex py-2 items-center">
                        <div class="flex-grow border-t border-gray-200"></div>
                        <span class="flex-shrink mx-4 text-gray-400 text-sm font-medium">O</span>
                        <div class="flex-grow border-t border-gray-200"></div>
                    </div>

                    <button wire:click="checkout" class="w-full bg-green-500 text-white py-4 rounded-xl font-bold text-lg hover:bg-green-600 transition flex items-center justify-center shadow-md">
                        Comprar por WhatsApp
                    </button>
                </div>
            </div>
        </div> @endif
</div>