<x-layouts.app>
    {{-- Header Tienda --}}
    <div class="bg-gray-900 py-16 relative">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl md:text-5xl font-black text-white uppercase tracking-tighter">
                Catálogo <span class="text-orange-500 italic">Oficial</span>
            </h1>
            <p class="text-gray-400 mt-2 uppercase text-[10px] tracking-[0.3em] font-bold">Respaldo total en cada pieza</p>
        </div>
    </div>

    <div class="bg-gray-50 min-h-screen py-12">
        <div class="container mx-auto px-4">
            
            <div class="flex flex-col lg:flex-row gap-10">
                
                {{-- LADO IZQUIERDO: FILTROS --}}
                <aside class="w-full lg:w-1/4 space-y-8">
                    {{-- Buscador --}}
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100">
                        <h4 class="text-xs font-black uppercase tracking-widest mb-4 text-gray-900">Buscar Producto</h4>
                        <form action="{{ route('tienda') }}" method="GET" class="relative">
                            <input type="text" name="search" value="{{ request('search') }}" 
                                   placeholder="¿Qué necesitas?" 
                                   class="w-full bg-gray-100 border-none rounded-2xl py-3 pl-4 pr-10 text-sm focus:ring-2 focus:ring-orange-500">
                            <button type="submit" class="absolute right-3 top-3 text-gray-400">🔍</button>
                        </form>
                    </div>

                    {{-- Categorías --}}
                    <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-gray-100">
                        <h4 class="text-xs font-black uppercase tracking-widest mb-4 text-gray-900">Categorías</h4>
                        <div class="space-y-2">
                            <a href="{{ route('tienda') }}" 
                               class="block px-4 py-2 rounded-xl text-sm font-bold uppercase transition {{ !request('category') ? 'bg-orange-500 text-white shadow-lg' : 'text-gray-500 hover:bg-gray-100' }}">
                                Todos los productos
                            </a>
                            @foreach($categories as $cat)
                                <a href="{{ route('tienda', ['category' => $cat->id]) }}" 
                                   class="block px-4 py-2 rounded-xl text-sm font-bold uppercase transition {{ request('category') == $cat->id ? 'bg-orange-500 text-white shadow-lg' : 'text-gray-500 hover:bg-gray-100' }}">
                                    {{ $cat->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </aside>

                {{-- LADO DERECHO: RESULTADOS --}}
                <main class="w-full lg:w-3/4">
                    @if($products->count() > 0)
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($products as $product)
                                <div class="bg-white rounded-[2.5rem] p-4 shadow-sm hover:shadow-xl transition-all border border-gray-100 group">
                                    <div class="relative h-64 bg-gray-100 rounded-[2rem] overflow-hidden mb-4">
                                        <img src="{{ asset('storage/' . $product->image) }}" 
                                             class="w-full h-full object-cover group-hover:scale-110 transition duration-500" 
                                             alt="{{ $product->name }}">
                                        @if($product->price_offer)
                                            <span class="absolute top-4 left-4 bg-orange-600 text-white text-[9px] font-black px-3 py-1 rounded-full uppercase">Oferta</span>
                                        @endif
                                    </div>
                                    <div class="px-2">
                                        <p class="text-[10px] text-orange-500 font-black uppercase tracking-widest mb-1">{{ $product->category->name }}</p>
                                        <h3 class="text-lg font-black text-gray-900 uppercase leading-tight mb-2">{{ $product->name }}</h3>
                                        <div class="flex items-center justify-between mt-4">
                                            <span class="text-xl font-black text-gray-900 italic">S/ {{ number_format($product->price, 2) }}</span>
                                            <a href="/producto/{{ $product->slug }}" class="w-10 h-10 bg-gray-900 text-white rounded-full flex items-center justify-center hover:bg-orange-600 transition-colors">
                                                →
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- Paginación --}}
                        <div class="mt-12">
                            {{ $products->links() }}
                        </div>
                    @else
                        <div class="bg-white rounded-[3rem] p-20 text-center border-2 border-dashed border-gray-200">
                            <span class="text-5xl">📦</span>
                            <h3 class="text-xl font-black text-gray-900 uppercase mt-4">No encontramos productos</h3>
                            <p class="text-gray-500 mt-2">Prueba con otros filtros o términos de búsqueda.</p>
                            <a href="{{ route('tienda') }}" class="inline-block mt-6 text-orange-600 font-bold uppercase text-xs border-b-2 border-orange-600">Ver todo el catálogo</a>
                        </div>
                    @endif
                </main>

            </div>
        </div>
    </div>
</x-layouts.app>