<div>
    <div class="pb-20"> 
        {{-- 1. Hero Banner Dinámico --}}
        <div class="relative group px-4 mt-6">
            <div class="swiper main-slider rounded-[3rem] overflow-hidden shadow-2xl h-[450px] md:h-[600px]">
                <div class="swiper-wrapper">
                    @foreach($banners as $banner)
                        <div class="swiper-slide relative bg-gray-900">
                            <img src="{{ asset('storage/' . $banner->image) }}" 
                                 class="absolute inset-0 w-full h-full object-cover opacity-70 transition-transform duration-[5000ms] group-hover:scale-110"
                                 alt="{{ strip_tags($banner->title) }}">
                            
                            <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/40 to-transparent"></div>

                            <div class="relative h-full flex flex-col items-start justify-center px-12 md:px-24">
                                @if($banner->label)
                                    <span class="bg-[#EA1B09] text-white px-4 py-1 rounded-full text-[10px] font-black uppercase tracking-[0.3em] mb-4">
                                        {{ $banner->label }}
                                    </span>
                                @endif

                                <h2 class="text-4xl md:text-7xl font-black text-white mb-4 tracking-tighter leading-none uppercase">
                                    {!! $banner->title !!}
                                </h2>

                                @if($banner->subtitle)
                                    <p class="text-lg text-gray-300 mb-8 max-w-lg font-medium">
                                        {{ $banner->subtitle }}
                                    </p>
                                @endif

                                @if($banner->link)
                                    <a href="{{ $banner->link }}" class="bg-white text-gray-900 hover:bg-[#EA1B09] hover:text-white px-10 py-4 rounded-full font-black uppercase text-xs tracking-widest transition-all active:scale-95 shadow-xl">
                                        Ver Promoción
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="swiper-pagination !bottom-8"></div>
                <div class="swiper-button-next !text-white !right-8 opacity-0 group-hover:opacity-100 transition-opacity hidden md:flex"></div>
                <div class="swiper-button-prev !text-white !left-8 opacity-0 group-hover:opacity-100 transition-opacity hidden md:flex"></div>
            </div>
        </div>

        {{-- 2. Filtro de Categorías --}}
        <div class="container mx-auto px-4 mt-16 mb-8">
            <div class="flex flex-wrap justify-center gap-3">
                <button wire:click.prevent="selectCategory(null)" 
                    class="{{ is_null($selectedCategory) ? 'bg-[#EA1B09] text-white border-[#EA1B09]' : 'bg-white text-gray-600 hover:border-[#EA1B09]' }} 
                    px-7 py-3 rounded-2xl font-black uppercase text-[10px] tracking-widest shadow-sm border-2 transition-all">
                    Todos
                </button>

                @foreach($categories as $category)
                    <button wire:click.prevent="selectCategory({{ $category->id }})" 
                        class="{{ $selectedCategory == $category->id ? 'bg-[#EA1B09] text-white border-[#EA1B09]' : 'bg-white text-gray-600 hover:border-[#EA1B09]' }} 
                        px-7 py-3 rounded-2xl font-black uppercase text-[10px] tracking-widest shadow-sm border-2 transition-all">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>
        </div>

        {{-- 3. Productos --}}
        <div id="productos" class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-end mb-10 gap-4">
                <div>
                    <span class="text-[#EA1B09] font-black uppercase text-[10px] tracking-[0.3em]">Selección Premium</span>
                    <h2 class="text-4xl font-black text-gray-900 uppercase tracking-tighter">
                        Lo más <span class="text-[#EA1B09]">Vendido</span>
                    </h2>
                </div>
                <a href="{{ route('tienda') }}" class="text-xs font-black uppercase tracking-widest border-b-2 border-[#EA1B09] pb-1 hover:text-[#EA1B09] transition-colors">
                    Ver toda la tienda →
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-8 transition-opacity duration-300" wire:loading.class="opacity-50">
                @forelse($products as $product)
                    <div class="bg-white rounded-[2.5rem] shadow-sm hover:shadow-2xl transition-all border border-gray-50 overflow-hidden group flex flex-col p-3">
                        <a href="/producto/{{ $product->slug }}" class="overflow-hidden bg-gray-50 rounded-[2rem] relative block">
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}"
                                     class="w-full h-64 md:h-72 object-cover group-hover:scale-110 transition duration-700">
                            @endif
                        </a>

                        <div class="p-5 flex flex-col flex-grow text-center">
                            <span class="text-[9px] font-black text-[#EA1B09] uppercase tracking-[0.2em] mb-2">
                                {{ $product->category->name ?? 'Motos' }}
                            </span>

                            <a href="/producto/{{ $product->slug }}">
                                <h3 class="font-black text-gray-900 mb-3 uppercase tracking-tighter text-lg leading-tight h-14 overflow-hidden hover:text-[#EA1B09] transition-colors">
                                    {{ $product->name }}
                                </h3>
                            </a>

                            <div class="mt-auto">
                                <p class="text-gray-900 font-black text-2xl italic mb-4">
                                    S/ {{ number_format($product->price, 2) }}
                                </p>
                                
                                <button wire:click.prevent="addToCart({{ $product->id }})" 
                                        wire:loading.attr="disabled"
                                        class="w-full bg-gray-900 text-white py-4 rounded-2xl font-black uppercase text-[10px] tracking-widest hover:bg-[#EA1B09] transition-all active:scale-95 disabled:opacity-50">
                                    <span wire:loading.remove wire:target="addToCart({{ $product->id }})">Añadir al carrito</span>
                                    <span wire:loading wire:target="addToCart({{ $product->id }})">Agregando...</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20">
                        <p class="text-gray-400 font-bold uppercase tracking-widest">No hay productos en esta categoría.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

{{-- SCRIPTS --}}
{{-- Pegar esto al final de home.blade.php, debajo del script del Swiper --}}

@script
<script>
    Livewire.on('show-product-modal', (event) => {
        // En Livewire 3, los datos vienen directamente en el primer argumento (event)
        const data = Array.isArray(event) ? event[0] : event;

        Swal.fire({
            title: '<span class="text-xl font-bold">¡Añadido al carrito!</span>',
            html: `
                <div class="flex items-center text-left py-4 bg-gray-50 px-4 rounded-xl border border-gray-100 mt-2">
                    <img src="${data.image}" class="w-20 h-20 object-contain rounded-lg bg-white shadow-sm mr-4 border border-gray-200" onerror="this.src='https://via.placeholder.com/80'">
                    <div class="flex-1 min-w-0">
                        <p class="font-bold text-gray-900 text-base leading-tight mb-1 truncate">${data.name}</p>
                        <p class="text-gray-500 text-sm mb-1">Cantidad: <span class="text-gray-800 font-medium">${data.quantity}</span></p>
                        <p class="text-[#EA1B09] font-extrabold text-xl">S/ ${data.price}</p>
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonColor: '#000000', // Negro para combinar con tu Home
            cancelButtonColor: '#6b7280',
            confirmButtonText: 'Finalizar Compra 🛒',
            cancelButtonText: 'Seguir viendo',
            reverseButtons: true,
            customClass: {
                popup: 'rounded-[2rem]',
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