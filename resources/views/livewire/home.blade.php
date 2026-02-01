<div class="pb-10"> <div class="relative bg-gray-900 h-[400px] mb-12 overflow-hidden rounded-2xl mx-4 mt-6 shadow-2xl">
        <img src="https://images.unsplash.com/photo-1607082348824-0a96f2a4b9da?ixlib=rb-4.0.3&auto=format&fit=crop&w=1470&q=80" 
             class="absolute inset-0 w-full h-full object-cover opacity-60">
        
        <div class="relative h-full flex flex-col items-center justify-center text-center px-4">
            <h2 class="text-4xl md:text-6xl font-extrabold text-white mb-4 tracking-tight">
                TECNOLOGÍA A UN <span class="text-orange-500 italic">CLICK</span>
            </h2>
            <p class="text-xl text-gray-200 mb-8 max-w-2xl">
                Descubre lo último en celulares, impresoras y gadgets con los mejores precios del mercado.
            </p>
            <div class="flex gap-4">
                <a href="#productos" class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-3 rounded-full font-bold transition duration-300 transform hover:scale-105 shadow-lg">
                    Ver Ofertas
                </a>
                <span class="bg-white/10 backdrop-blur-md border border-white/20 text-white px-8 py-3 rounded-full font-bold">
                    🚀 Envíos a todo el Perú
                </span>
            </div>
        </div>
    </div>

    <div id="productos" class="container mx-auto px-4">
        <h2 class="text-2xl font-bold mb-8 text-gray-800 flex items-center">
            <span class="w-2 h-8 bg-orange-500 mr-3 rounded-full"></span>
            Nuestros Productos
        </h2>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
                <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition-all border border-gray-100 overflow-hidden group flex flex-col">
                    
                    <a href="{{ route('product.detail', $product->slug) }}" class="overflow-hidden block">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 class="w-full h-48 object-cover group-hover:scale-110 transition duration-500">
                        @else
                            <img src="https://via.placeholder.com/300" class="w-full h-48 object-cover">
                        @endif
                    </a>

                    <div class="p-4 flex flex-col flex-grow">
                        <span class="text-[10px] font-bold text-orange-500 uppercase tracking-widest mb-1">
                            {{ $product->category->name ?? 'Gadget' }}
                        </span>
                        
                        <a href="{{ route('product.detail', $product->slug) }}">
                            <h3 class="font-bold text-gray-800 mb-2 truncate group-hover:text-orange-600 transition-colors">
                                {{ $product->name }}
                            </h3>
                        </a>

                        <div class="mt-auto">
                            <p class="text-gray-900 font-black text-2xl mb-4">
                                <span class="text-sm font-normal text-gray-400 mr-1">$</span>{{ number_format($product->price, 2) }}
                            </p>
                            
                            <button wire:click="addToCart({{ $product->id }})" 
                                    class="w-full bg-gray-900 text-white py-2.5 rounded-xl font-bold hover:bg-orange-600 transition-all active:scale-95 flex items-center justify-center gap-2">
                                🛒 Añadir
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>