<div class="container mx-auto px-4 py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 bg-white p-8 rounded-xl shadow-sm">
        
        {{-- SECCIÓN DE IMÁGENES --}}
        <div class="flex flex-col space-y-4">
            {{-- Imagen Principal --}}
            <div class="relative flex justify-center bg-gray-50 rounded-lg p-4 border border-gray-100 overflow-hidden" id="product-image-container">
                @if($product->sale_price)
                    <span class="absolute top-4 left-4 bg-red-600 text-white text-xs font-bold px-3 py-1 rounded-full shadow-lg z-10">
                        OFERTA
                    </span>
                @endif

                @if($product->image)
                    <img id="main-display-image" src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" 
                         class="rounded-lg max-h-[500px] object-contain shadow-sm product-image-for-animation transition-all duration-300">
                @else
                    <img src="https://via.placeholder.com/500" class="rounded-lg shadow-md product-image-for-animation">
                @endif
            </div>

            {{-- MINIATURAS --}}
            @if(is_array($product->images) && count($product->images) > 0)
                <div class="grid grid-cols-5 gap-2">
                    <div class="cursor-pointer border-2 border-orange-500 rounded-md overflow-hidden thumb-gallery bg-white" 
                         onclick="changeProductImage('{{ asset('storage/' . $product->image) }}', this)">
                        <img src="{{ asset('storage/' . $product->image) }}" class="h-16 w-full object-contain p-1">
                    </div>
                    @foreach($product->images as $photo)
                        <div class="cursor-pointer border-2 border-transparent hover:border-orange-300 rounded-md overflow-hidden thumb-gallery bg-white transition-all" 
                             onclick="changeProductImage('{{ asset('storage/' . $photo) }}', this)">
                            <img src="{{ asset('storage/' . $photo) }}" class="h-16 w-full object-contain p-1">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- SECCIÓN DE INFORMACIÓN --}}
        <div>
            <nav class="text-sm text-gray-500 mb-4">
                <a href="/" class="hover:text-orange-600">Inicio</a> / 
                <span class="font-medium">{{ $product->category->name ?? 'General' }}</span>
            </nav>
            
            <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $product->name }}</h1>
            
            <div class="flex items-baseline gap-3 mb-6">
                <p class="text-4xl font-bold text-orange-600">
                    S/ {{ number_format($product->price, 2) }}
                </p>
                @if($product->sale_price)
                    <p class="text-xl text-gray-400 line-through">
                        S/ {{ number_format($product->sale_price, 2) }}
                    </p>
                @endif
            </div>

            <div class="prose prose-orange max-w-none mb-8 text-gray-800 leading-relaxed">
                {!! $product->description !!} 
            </div>

            <div class="flex flex-col sm:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4 border-t pt-6">
                <div class="flex flex-col w-full sm:w-auto">
                    <label class="text-xs font-bold text-gray-400 uppercase mb-1">Cantidad</label>
                    <input type="number" wire:model="quantity" min="1" class="w-full sm:w-20 p-2 border rounded-lg focus:ring-2 focus:ring-orange-500 outline-none">
                </div>
                
                <button 
                    wire:click.prevent="addToCart" 
                    wire:loading.attr="disabled"
                    wire:target="addToCart"
                    class="w-full flex-1 bg-orange-600 text-white font-bold py-3 px-6 rounded-xl hover:bg-orange-700 active:scale-95 transition-all shadow-lg shadow-orange-200 flex items-center justify-center min-h-[56px] disabled:opacity-70 disabled:cursor-not-allowed"
                >
                    <span wire:loading.remove wire:target="addToCart">
                        Añadir al carrito
                    </span>

                    <div wire:loading wire:target="addToCart">
                        <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                </button>
            </div>
        </div>
    </div>

    {{-- PRODUCTOS RELACIONADOS --}}
    <div class="mt-16">
        <h2 class="text-2xl font-bold mb-8 text-gray-800 flex items-center">
            <span class="w-2 h-8 bg-orange-500 mr-3 rounded-full"></span>
            También te puede interesar
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @forelse($related_products as $related)
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-md transition-all">
                    <a href="{{ route('product.detail', $related->slug) }}" class="block overflow-hidden bg-gray-50">
                        <img src="{{ asset('storage/' . $related->image) }}" 
                             alt="{{ $related->name }}"
                             class="w-full h-44 object-contain p-4 group-hover:scale-110 transition duration-500">
                    </a>
                    <div class="p-4">
                        <a href="{{ route('product.detail', $related->slug) }}">
                            <h3 class="font-bold text-gray-800 truncate group-hover:text-orange-600 transition-colors">
                                {{ $related->name }}
                            </h3>
                        </a>
                        <p class="text-orange-600 font-black mt-2">
                            S/ {{ number_format($related->price, 2) }}
                        </p>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-10 text-center bg-gray-50 rounded-xl border border-dashed">
                   <p class="text-gray-400 italic">No hay productos similares en esta categoría.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

<script>
    function changeProductImage(src, element) {
        const mainImg = document.getElementById('main-display-image');
        mainImg.style.opacity = '0';
        setTimeout(() => {
            mainImg.src = src;
            mainImg.style.opacity = '1';
        }, 150);
        
        document.querySelectorAll('.thumb-gallery').forEach(el => {
            el.classList.remove('border-orange-500');
            el.classList.add('border-transparent');
        });
        element.classList.remove('border-transparent');
        element.classList.add('border-orange-500');
    }
</script>

@script
<script>
    Livewire.on('show-product-modal', (event) => {
        // En Livewire 3, 'event' ya contiene las propiedades despachadas
        // Accedemos directamente a event.name, event.image, etc.
        
        Swal.fire({
            title: '<span class="text-xl font-bold">¡Añadido al carrito!</span>',
            html: `
                <div class="flex items-center text-left py-4 bg-gray-50 px-4 rounded-xl border border-gray-100 mt-2">
                    <img src="${event.image}" class="w-20 h-20 object-contain rounded-lg bg-white shadow-sm mr-4 border border-gray-200" onerror="this.src='https://via.placeholder.com/80'">
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-900 text-base leading-tight mb-1 truncate">${event.name}</p>
                        <p class="text-gray-500 text-sm mb-1">Cantidad: <span class="text-gray-800 font-medium">${event.quantity}</span></p>
                        <p class="text-orange-600 font-extrabold text-xl">S/ ${event.price}</p>
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonColor: '#ea580c',
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Finalizar Compra 🛒',
            cancelButtonText: 'Seguir viendo',
            reverseButtons: true,
            customClass: {
                popup: 'rounded-2xl',
                confirmButton: 'rounded-xl font-bold py-3 px-6',
                cancelButton: 'rounded-xl font-bold py-3 px-6'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "{{ route('cart') }}"; 
            }
        });
    });
</script>
@endscript