<div class="container mx-auto px-4 py-10">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">Tu Carrito de Compras</h1>

    @if(empty($cart_items))
        {{-- ESTADO VACÍO --}}
        <div class="bg-white p-12 rounded-xl shadow-sm text-center border border-gray-100">
            <div class="flex justify-center mb-6">
                <div class="p-4 bg-orange-50 rounded-full">
                    <svg class="w-16 h-16 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-bold text-gray-800 mb-2">¡Tu carrito está vacío!</p>
            <p class="text-gray-500 mb-8">Parece que aún no has añadido nada a tu pedido.</p>
            <a href="/" class="inline-block bg-orange-600 text-white px-8 py-3 rounded-xl font-bold hover:bg-orange-700 transition-all shadow-lg shadow-orange-200">
                Volver a la tienda
            </a>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            {{-- SECCIÓN IZQUIERDA: PRODUCTOS Y BOTÓN VACIAR --}}
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
                    <table class="w-full text-left">
                        <thead class="bg-gray-50 border-b border-gray-100">
                            <tr>
                                <th class="p-4 font-bold text-gray-600 text-sm uppercase">Producto</th>
                                <th class="p-4 font-bold text-gray-600 text-sm uppercase text-center">Cantidad</th>
                                <th class="p-4 font-bold text-gray-600 text-sm uppercase text-right">Subtotal</th>
                                <th class="p-4"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($cart_items as $item)
                                <tr wire:key="cart-item-{{ $item['product_id'] }}" class="hover:bg-gray-50/50 transition">
                                    <td class="p-4">
                                        <div class="flex items-center">
                                            <div class="w-16 h-16 bg-gray-50 rounded-lg p-2 mr-4 flex-shrink-0 border border-gray-100">
                                                <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-full h-full object-contain">
                                            </div>
                                            <div>
                                                <h3 class="font-bold text-gray-800 leading-tight">{{ $item['name'] }}</h3>
                                                <p class="text-gray-500 text-sm">S/ {{ number_format($item['unit_amount'], 2) }} c/u</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4">
                                        <div class="flex items-center justify-center space-x-3">
                                            <button wire:click="decrement('{{ $item['product_id'] }}')" class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center hover:bg-orange-50 hover:text-orange-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
                                            </button>
                                            <span class="font-bold text-gray-800 text-lg w-6 text-center">{{ $item['quantity'] }}</span>
                                            <button wire:click="increment('{{ $item['product_id'] }}')" class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center hover:bg-orange-50 hover:text-orange-600">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="p-4 text-right font-black text-gray-900 text-lg">
                                        S/ {{ number_format($item['total_amount'], 2) }}
                                    </td>
                                    <td class="p-4 text-center">
                                        <button wire:click="removeItem('{{ $item['product_id'] }}')" class="text-gray-400 hover:text-red-500 p-2">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- BOTÓN VACIAR: AHORA DEBAJO DE LOS PRODUCTOS --}}
                <div class="flex justify-end">
                    <button 
                        wire:click="clearCart" 
                        wire:confirm="¿Estás seguro de que deseas vaciar todo el carrito?"
                        class="flex items-center text-gray-400 hover:text-red-600 font-bold text-xs uppercase tracking-widest transition-colors group"
                    >
                        <svg class="w-4 h-4 mr-2 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Vaciar Carrito de Compras
                    </button>
                </div>
            </div>

            {{-- RESUMEN DE PAGO (Columna derecha) --}}
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sticky top-24">
                    <h2 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                        Resumen del Pedido
                    </h2>
                    <div class="space-y-4">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal</span>
                            <span class="font-medium">S/ {{ number_format($grand_total, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-gray-600 border-b border-gray-50 pb-4">
                            <span>Envío</span>
                            <span class="text-green-600 font-bold text-xs uppercase">A convenir</span>
                        </div>
                        <div class="pt-2 flex justify-between items-end">
                            <span class="text-gray-800 font-bold text-lg">Total</span>
                            <div class="text-right">
                                <span class="block text-3xl font-black text-orange-600">S/ {{ number_format($grand_total, 2) }}</span>
                            </div>
                        </div>
                        <a href="{{ route('checkout') }}" class="w-full bg-orange-600 text-white mt-6 py-4 rounded-xl font-bold text-lg flex items-center justify-center hover:bg-orange-700 transition-all shadow-lg shadow-orange-100 group">
                            Continuar al Pago
                            <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>