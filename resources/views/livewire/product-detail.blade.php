<div class="container mx-auto px-4 py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 bg-white p-8 rounded-xl shadow-sm">
        
        <div class="flex justify-center" id="product-image-container">
            @if($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                     class="rounded-lg max-h-[500px] object-cover shadow-md product-image-for-animation">
            @else
                <img src="https://via.placeholder.com/500" class="rounded-lg shadow-md product-image-for-animation">
            @endif
        </div>

        <div>
            <nav class="text-sm text-gray-500 mb-4">
                <a href="/" class="hover:text-orange-600">Inicio</a> / 
                <span>{{ $product->category->name }}</span>
            </nav>
            
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
            
            <p class="text-4xl font-bold text-orange-600 mb-6">
                ${{ number_format($product->price, 2) }}
            </p>

            <div class="prose prose-orange max-w-none mb-8 text-gray-700">
                {!! $product->description !!} 
            </div>

            <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4">
                {{-- Input limpio --}}
                <input type="number" wire:model="quantity" min="1" class="w-full sm:w-20 p-2 border rounded-lg focus:ring-orange-500">
                
                <button 
                    wire:click.prevent="addToCart" 
                    wire:loading.attr="disabled"
                    wire:target="addToCart"
                    class="w-full flex-1 bg-orange-600 text-white font-bold py-3 px-6 rounded-lg hover:bg-orange-700 active:bg-orange-800 transition flex items-center justify-center min-h-[52px]"
                >
                    {{-- Contenedor del texto normal --}}
                    <div wire:loading.remove wire:target="addToCart">
                        Añadir al carrito
                    </div>

                </button>
            </div>

            @if (session()->has('success'))
                <div class="mt-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm font-medium border border-green-200">
                    ✅ {{ session('success') }}
                </div>
            @endif
        </div>
    </div>
</div>

{{-- Script para la animación --}}
@script
<script>
    Livewire.on('show-product-modal', (data) => {
        const product = data[0];

        Swal.fire({
            title: '¡Producto añadido!',
            html: `
                <div class="flex items-center text-left py-2">
                    <img src="${product.image}" class="w-20 h-20 object-cover rounded shadow-sm mr-4">
                    <div>
                        <p class="font-bold text-gray-800 text-lg leading-tight">${product.name}</p>
                        <p class="text-gray-500 mt-1">Cantidad: ${product.quantity}</p>
                        <p class="text-orange-600 font-bold text-xl mt-1">Total: $${product.price}</p>
                    </div>
                </div>
            `,
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#ea580c', // orange-600
            cancelButtonColor: '#6b7280', // gray-500
            confirmButtonText: 'Ir al pago',
            cancelButtonText: 'Seguir comprando',
            reverseButtons: true,
            heightAuto: false // Evita saltos visuales en el scroll
        }).then((result) => {
            
            // ... dentro de tu SweetAlert .then((result) => { ...
            if (result.isConfirmed) {
                // Usamos el nombre 'cart' que definiste en web.php
                window.location.href = "{{ route('cart') }}"; 
            } else {
                /* Si el cliente decide "Seguir comprando", recargamos el componente 
                   para limpiar el estado "Procesando" del botón.
                */
                window.location.reload(); 
            }
        });
    });
</script>
@endscript