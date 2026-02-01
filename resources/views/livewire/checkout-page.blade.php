<div class="container mx-auto px-4 py-10">
    @if (session()->has('order_completed'))
        <div class="max-w-2xl mx-auto text-center bg-white p-12 rounded-3xl shadow-xl border border-green-100">
            <div class="mb-6 flex justify-center">
                <div class="bg-green-100 p-4 rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
            </div>
            
            <h2 class="text-3xl font-black text-gray-800 mb-2">¡PEDIDO RECIBIDO!</h2>
            <p class="text-gray-600 mb-8 text-lg">
                {{ session('order_completed') }} <br>
                En breve nos pondremos en contacto contigo para coordinar la entrega.
            </p>

            <div class="space-y-4">
                <a href="/" class="block w-full bg-orange-600 text-white py-4 rounded-xl font-bold hover:bg-orange-700 transition shadow-lg">
                    Volver a la Tienda Principal
                </a>
                <p class="text-xs text-gray-400 font-medium uppercase tracking-widest">
                    SHOPPRO - Tecnología a un click
                </p>
            </div>
        </div>
    @else
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                
                <div class="mb-4">
                    <a href="/" class="inline-flex items-center text-gray-500 hover:text-orange-600 transition-colors text-xs font-bold uppercase tracking-widest group">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Regresar al catálogo
                    </a>
                </div>

                <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b pb-2">Datos de Envío</h2>
                                
                <form wire:submit.prevent="placeOrder" class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                        <input type="text" wire:model.blur="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        @error('name') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Teléfono / WhatsApp</label>
                        <input type="text" wire:model.blur="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        @error('phone') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                        <input type="email" wire:model.blur="email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        @error('email') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Dirección Exacta</label>
                        <input type="text" wire:model.blur="address" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                        @error('address') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Ciudad / Distrito</label>
                        <select wire:model.live="city" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500">
                            <option value="">Selecciona tu ciudad...</option>
                            @foreach($cities as $nombre => $precio)
                                <option value="{{ $nombre }}">{{ $nombre }} (S/ {{ number_format($precio, 2) }})</option>
                            @endforeach
                        </select>
                        @error('city') <span class="text-red-500 text-xs italic">{{ $message }}</span> @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700">Notas Adicionales (Opcional)</label>
                        <textarea wire:model.blur="notes" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500"></textarea>
                    </div>

                    @if(!$showPaymentOptions)
                    <div class="md:col-span-2 mt-8">
                        <button type="submit" class="w-full bg-orange-600 text-white py-4 rounded-xl font-black text-lg hover:bg-orange-700 transition shadow-lg mb-4">
                            CONFIRMAR DATOS Y VER PAGOS
                        </button>

                        <div class="text-center">
                            <a href="/" class="text-gray-400 hover:text-gray-600 text-sm transition-all border-b border-transparent hover:border-gray-300">
                                ¿Olvidaste agregar algo más? Volver a la tienda
                            </a>
                        </div>
                    </div>
                    @endif
                </form>

                @if($showPaymentOptions)
                <div class="mt-10 p-6 bg-green-50 border-2 border-green-200 rounded-xl">
                    <h3 class="text-xl font-bold text-green-800 mb-4 tracking-tight">💳 ¡Casi listo! Paga tu pedido</h3>
                    <p class="text-sm text-green-700 mb-4">Realiza la transferencia y envíanos el comprobante por WhatsApp:</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-white p-4 rounded shadow-sm border border-green-100">
                            <p class="font-bold text-gray-800">BCP (Soles)</p>
                            <p class="text-lg font-mono text-green-700 tracking-tighter">193-xxxxxx-0-xx</p>
                            <p class="text-xs text-gray-500 italic">Titular: ShopPro S.A.C.</p>
                        </div>
                        <div class="bg-white p-4 rounded shadow-sm border border-green-100">
                            <p class="font-bold text-gray-800">YAPE / PLIN</p>
                            <p class="text-lg font-mono text-green-700">969 979 954</p>
                            <p class="text-xs text-gray-500 italic">Nombre: Juan Pérez</p>
                        </div>
                    </div>

                    <div class="mt-8 text-center border-t border-green-100 pt-6">
                        <p class="text-sm text-gray-600 mb-4 flex items-center justify-center gap-2 italic">
                            Al hacer clic, se abrirá tu WhatsApp para enviarnos la foto de tu comprobante y confirmar el envío.
                        </p>

                        <button wire:click="finalize" 
                                class="w-full bg-green-600 text-white py-4 rounded-xl font-black text-xl hover:bg-green-700 transition shadow-xl transform hover:scale-105 flex items-center justify-center gap-3">
                            <span>✅ ENVIAR COMPROBANTE</span>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.319 1.592 5.548 0 10.064-4.516 10.066-10.066.002-2.686-1.047-5.212-2.952-7.115s-4.432-2.956-7.118-2.957c-5.549 0-10.063 4.515-10.066 10.065-.003 1.902.504 3.756 1.471 5.44l-1.015 3.703 3.832-1.004-.537.342z"/>
                            </svg>
                        </button>
                    </div>
                </div>
                @endif
            </div>

            <div class="bg-gray-50 p-6 rounded-xl border h-fit sticky top-6">
                <h3 class="font-bold text-lg mb-4 text-gray-800">Resumen del Pedido</h3>
                <div class="border-t border-gray-200 mt-4 pt-4 space-y-2">
                    <div class="flex justify-between text-sm text-gray-600">
                        <span>Subtotal Productos:</span>
                        <span class="font-semibold">${{ number_format($total, 2) }}</span>
                    </div>

                    <div class="flex justify-between text-sm text-gray-600 italic">
                        <span>Costo de Envío:</span>
                        <span class="font-bold text-green-600">+ ${{ number_format($shippingCost, 2) }}</span>
                    </div>

                    <div class="flex justify-between text-2xl font-black pt-2 border-t border-gray-300">
                        <span>Total:</span>
                        <span class="text-orange-600">${{ number_format($total + $shippingCost, 2) }}</span>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>